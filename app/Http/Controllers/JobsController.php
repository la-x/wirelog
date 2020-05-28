<?php

namespace App\Http\Controllers;
use App\Job;
use App\Technician;
use App\User;
use App\JobLog;

use Illuminate\Http\Request;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $job = Job::orderBy('jobID', 'asc')->get();
        return view('job.index')->with('job', $job);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('job.create');
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
            'contractor' => 'required|min:3',
            'location' => 'required|min:3',
            'id' => 'required',
        ]);

        // create post
        $job = new Job;
        $job->contractor = $request->input('contractor');
        $job->location = $request->input('location');
        $job->id = $request->input('id');
        $job->save();

        return redirect('/job')->with('success', 'Job Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        // $a = JobLog::where('jobID', '=', $id)->get();
        // return Technician::where('id', '=', $a)->get();
        // return User::where('id', $id)->get();
        $comment = JobLog::where('jobID', '=', $id)->get();
        $userID = auth()->user()->id;
        $user = User::find($userID);
        $job = Job::find($id);
        // return view('job.show')->with('job', $job)->with('user', $user);
        return view('job.show')->with('job', $job)->with('comment', $comment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::find($id);
        return view('job.edit')->with('job', $job);
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
        $this->validate($request, [
            'contractor' => 'required|min:3',
            'location' => 'required|min:3',
            'id' => 'required',
        ]);

        // create post
        $job = Job::find($id);
        $job->contractor = $request->input('contractor');
        $job->location = $request->input('location');
        $job->id = $request->input('id');
        $job->save();

        return redirect('/job')->with('success', 'Job Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::find($id);
        $job->delete();
        return redirect('/job')->with('success', 'Job Deleted');
    }
}
