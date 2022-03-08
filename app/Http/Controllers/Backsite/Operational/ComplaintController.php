<?php

namespace App\Http\Controllers\Backsite\Operational;

use App\Exports\ComplaintExport;
use App\Http\Controllers\Controller;
use App\Models\MasterData\CategoryComplaint;
use App\Models\Operational\AttachmentComplaint;
use App\Models\Operational\Complaint;

use Illuminate\Http\Request;

use Gate;
use File;

use Symfony\Component\HttpFoundation\Response;

class ComplaintController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('complaint_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // if is complainant view complaint seft
        $user = auth()->user();
        $is_complainant = $user->roles->contains(3);

        if ($is_complainant) {
            $complaint = Complaint::with(['users', 'category_complaint'])->where('users_id', $user->id)->orderBy('created_at', 'desc')->paginate(500);
        } else {
            $complaint = Complaint::with(['users', 'category_complaint'])->orderBy('created_at', 'desc')->paginate(500);
        }

        $category_complaint = CategoryComplaint::orderBy('name', 'asc')->get();

        return view('pages.backsite.operational.complaint.index', compact('complaint', 'category_complaint'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Complaint $complaint)
    {
        abort_if(Gate::denies('complaint_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $complaint->load(['users', 'provinces', 'regencies', 'districts', 'category_complaint', 'attachment_complaint', 'complaint_response']);

        return view('pages.backsite.operational.complaint.show', compact('complaint'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Complaint $complaint)
    {
       return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complaint $complaint)
    {
        abort_if(Gate::denies('complaint_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $attachment_complaint = AttachmentComplaint::where('complaint_id', $complaint->id)->get();
        
        // file delete
        foreach ($attachment_complaint as $attachment) {

            $data = 'storage/' . $attachment['path'];

            if (File::exists($data)) {
                File::delete($data);
            } else {
                File::delete('storage/app/public/' . $attachment['path']);
            }
        }

        $complaint->forceDelete();

        alert()->success('Success Message', 'Delete data has been success');
        return back();
    }

    // custom function
    public function filter(Request $request, Complaint $complaint)
    {
        // abort_if(Gate::denies('complaint_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->all();

        // validation date ---------------------------
        if (isset($data['from'])) {
            $ds = substr($data['from'], 0, 2);
            $ms = substr($data['from'], 3, 2);
            $ys = substr($data['from'], 6, 4);
            $ss = substr($data['from'], 11);

            $from = $ys . '-' . $ms . '-' . $ds . ' ' . $ss;
        } else {
            $from = date('Y-m-d H:i:s');
        }

        if (isset($data['to'])) {
            $de = substr($data['to'], 0, 2);
            $me = substr($data['to'], 3, 2);
            $ye = substr($data['to'], 6, 4);
            $se = substr($data['to'], 11);

            $to = $ye . '-' . $me . '-' . $de . ' ' . $se;
        } else {
            $to = date('Y-m-d H:i:s');
        }
        // end validation date ---------------------------

        // get value from input
        $find = $data['find'];

        // query builder 
        $complaint_query = $complaint->newQuery();

        $complaint_query = $complaint_query->where('title', 'LIKE', '%' . $find . '%');

        if (isset($data['category_complaint_id'])) {
            $complaint_query->where('category_complaint_id', $data['category_complaint_id']);
        }

        if (isset($data['status'])) {
            $complaint_query->where('status', $data['status']);
        }

        if (isset($data['from']) && isset($data['to'])) {
            $complaint_query->whereBetween('created_at', [$from, $to]);
        }


        $complaint_query = $complaint_query->orderBy('created_at', 'desc');
        if ($data['process'] != 2) {
            // search
            $complaint = $complaint_query->paginate(500);
        } else {
            // export                              
            $complaint = $complaint_query->get();

            // generate file name
            $file_name = 'Complaint_' . date('YmdHis') . '.xlsx';

            return (new ComplaintExport($complaint))->download($file_name);
        }

    

        $category_complaint = CategoryComplaint::orderBy('name', 'asc')->get();

        return view('pages.backsite.operational.complaint.index', compact('complaint', 'category_complaint'));
    }
}
