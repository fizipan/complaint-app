<?php

namespace App\Http\Controllers\Backsite\Operational;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backsite\Operational\ComplaintResponseRequest;
use App\Models\Operational\Complaint;
use App\Models\Operational\ComplaintResponse;
use Illuminate\Http\Request;

use Gate;

use Symfony\Component\HttpFoundation\Response;

class ComplaintResponseController extends Controller
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
        return abort(404);
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
    public function store(ComplaintResponseRequest $request)
    {
        $data = $request->all();

        $data['users_id'] = auth()->user()->id;

        ComplaintResponse::create($data);

        // update complaint status
        $complaint = Complaint::findOrFail($data['complaint_id']);
        $complaint->status = $data['status'];
        $complaint->save();

        alert()->success('Success Message', 'Response complaint has been success');
        return redirect()->route('backsite.complaint.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function destroy($id)
    {
        return abort(404);
    }

    // custom function
    public function complaint_response($id)
    {
        abort_if(Gate::denies('complaint_response_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $complaint = Complaint::with(['users', 'provinces', 'regencies', 'districts', 'category_complaint', 'attachment_complaint'])->findOrFail($id);

        return view('pages.backsite.operational.complaint-response.index', compact('complaint'));
    }
}
