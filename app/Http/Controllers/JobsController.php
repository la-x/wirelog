<?php

namespace App\Http\Controllers;
use App\Job;
use App\Technician;
use App\User;
use App\JobLog;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;

class JobsController extends Controller
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
        $job = Job::orderBy('jobID', 'desc')->get();
        return view('job.index')->with('job', $job)->with('access', $access);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $z = auth()->user()->id;
        $x = technician::select('position')->where('id', '=', $z)->pluck('position');
        $access = Arr::get($x, 0);
        // $z = auth()->user()->id;
        // $access = technician::find($z)->position;
        return view('job.create')->with('access', $access);
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
            'cover_image' => 'image|nullable|max:1999'
        ]);

        // Handle file upload

        if($request->hasFile('cover_image')) {
            // get filename with extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

        } else {
            $fileNameToStore = 'default.png';
        }

        // create post
        $job = new Job;
        $job->contractor = $request->input('contractor');
        $job->location = $request->input('location');
        $job->id = $request->input('id');
        $job->cover_image = $fileNameToStore;
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

    // SELECT technician.name, technician.surname, technician.email, job_log.comment, job_log.created_at
    // FROM job_log
    // JOIN technician
    // ON technician.id = job_log.id
    // WHERE job_log.jobID = 52;

    
    {   

        $z = auth()->user()->id;
        $x = technician::select('position')->where('id', '=', $z)->pluck('position');
        $access = Arr::get($x, 0);

        $a = auth()->user()->id;
        $b = Technician::where('id', '=', $a)->get();
        // return JobLog::where('jobID', '=', $a);
        // $a = JobLog::select('id')->where('jobID', '=', $id)->get();
        // $t = Technician::find($a);
        // return JobLog::where('jobID', '=', $id)->Join('technician', 'technician.id', '=', 'job_log', 'job_log.id')->get();

        // $comment = JobLog::where('jobID', '=', $id)
        // ->rightJoin('users', 'users.id', '=', 'job_log.id')->get();

        // $comment = JobLog::where('jobID', '=', $id)                         // SELECT * FROM job_log
        // ->rightJoin('users', 'users.id', '=', 'job_log.id')->get();         // RIGHT JOIN users ON user.id = job_log.id
                                                                            // WHERE jobID = 51

        $te = JobLog::where('jobID', '=', $id)
        ->Join('technician', 'technician.id', '=', 'job_log.id')
        ->orderBy('job_log.c_at', 'desc')
        ->get();

        // $te = Technician::all();

        // return Technicain::all();
        // return Technicain::all();
        // $a = JobLog::select('id')->where('jobID', '=', $id)->get();
        // return Technician::where('id', '=', $a)->get();
        // return JobLog::select('id', 'comment', 'created_at')->where('jobID', '=', $id)->get();
        // $a = JobLog::where('jobID', '=', $id)->get();
        // return Technician::where('id', '=', $a)->get();
        // return User::where('id', $id)->get();
        // $jl = JobLog::where('jobID', '=', $id)->get();
        $userID = auth()->user()->id;
        $user = User::find($userID);
        $job = Job::find($id);
        // return view('job.show')->with('job', $job)->with('user', $user);
        return view('job.show')->with('job', $job)->with('te', $te)->with('b', $b)->with('access', $access);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $z = auth()->user()->id;
        $x = technician::select('position')->where('id', '=', $z)->pluck('position');
        $access = Arr::get($x, 0);

        $job = Job::find($id);
        return view('job.edit')->with('job', $job)->with('access', $access);
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

        if($request->hasFile('cover_image')) {
            // get filename with extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

        }

        // create post
        $job = Job::find($id);
        $job->contractor = $request->input('contractor');
        $job->location = $request->input('location');
        $job->id = $request->input('id');
        if($request->hasFile('cover_image')) {
            // delete original image and replace with updated image
            if ($job->cover_image != 'default.png') {
                Storage::delete('public/cover_images/'.$job->cover_image);
            }
            // saves storage upload, although deletes data
            $job->cover_image = $fileNameToStore;
        }
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

        if($job->cover_image != 'default.png') {
            // delete image
            Storage::delete('public/cover_images/'.$job->cover_image);
        }

        $job->delete();
        return redirect('/job')->with('success', 'Job Deleted');
    }
}
