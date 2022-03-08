<?php

namespace App\Http\Controllers\Frontsite\Operational;

use App\Http\Controllers\Controller;

use App\Http\Requests\Frontsite\Operational\ComplaintReportRequest;
use App\Models\Operational\AttachmentComplaint;
use App\Models\Operational\Complaint;
use Illuminate\Http\Request;

class ComplaintReportController extends Controller
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
    public function store(ComplaintReportRequest $request)
    {
        $data = $request->all();

        $data['users_id'] = auth()->user()->id;

        // incident date ------------------------------
        $date = $data['incident_date'];
        $dj = substr($date, 0, 2);
        $mj = substr($date, 3, 2);
        $yj = substr($date, 6);
        $date = $yj . '-' . $mj . '-' . $dj;
        $data['incident_date'] = $date; //change format
        // -----------------------------------------------

        $complaint = Complaint::create($data);
        
        if ($request->hasFile('files')) {

            foreach ($request->file('files') as $file) {
                AttachmentComplaint::create([
                    'complaint_id' => $complaint->id,
                    'path' => $file->store('assets/complaint/', 'public'),
                ]);
            }
            
        }

        alert()->success('Success Message', 'Your complaint has been submitted');
        return redirect()->route('home');
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
}
