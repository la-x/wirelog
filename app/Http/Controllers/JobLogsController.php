<?php

namespace App\Http\Controllers;
use App\JobLog;
use App\Job;
use App\Technician;
use App\User;
use Illuminate\Support\Arr;

use Illuminate\Http\Request;

class JobLogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $z = auth()->user()->id;
        $x = technician::select('position')->where('id', '=', $z)->pluck('position');
        $access = Arr::get($x, 0);
        // $z = auth()->user()->id;
        // $access = technician::find($z)->position;
        // $a = auth()->user()->id;
        // $b = Technician::where('id', '=', $a)->get();
        $allLogs = JobLog::orderBy('job_logID', 'desc')
        ->Join('technician', 'technician.id', '=', 'job_log.id')
        ->get();

        // $job_log = JobLog::orderBy('job_logID', 'desc')->get();

        return view('job_log.index')->with('allLogs', $allLogs)->with('access', $access);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('job_log.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required|min:3',
            'jobID' => 'required',
            // 'technicianID' => 'required',
            'id' => 'required',
        ]);

        // create post
        $job_log = new JobLog;
        $job_log->comment = $request->input('comment');
        $job_log->jobID = $request->input('jobID');
        // $job_log->technicianID = $request->input('technicianID');
        $job_log->id = $request->input('id');
        $job_log->save();

        return redirect('/job')->with('success', 'Comment Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
