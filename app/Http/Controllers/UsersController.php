<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
Use App\Technician;
use Illuminate\Support\Arr;

class UsersController extends Controller
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
        $user = User::orderBy('id', 'desc')->get();
        return view('user.index')->with('user', $user)->with('access', $access);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $z = auth()->user()->id;
        // $access = technician::find($z)->position;
        // $a = auth()->user()->id;
        // $b = Technician::where('id', '=', $a)->get();
        $c = Technician::where('id', '=', $id)->get();
        $user = User::find($id);
        // $job = Job::find($id);
        // return view('job.show')->with('job', $job)->with('user', $user);
        return view('user.show')->with('user', $user)->with('c', $c);
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
        $user = User::find($id);
        $user->delete();
        return redirect('/user')->with('success', 'User Deleted');
    }
}
