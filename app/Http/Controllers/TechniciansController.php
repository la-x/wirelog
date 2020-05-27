<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Technician;
use App\User;

class TechniciansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::orderBy('id', 'asc')->get();
        return view('technician.index')->with('user', $user);
        // $technician = Technician::orderBy('technicianID', 'asc')->get();
        // return view('technician.index')->with('technician', $technician);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $idEmail = \DB::table('users')->pluck('email', 'email');
        // $idUsername = \DB::table('users')->pluck('email', 'id');
        // $idlist = ['0' => 'Select an id'] + collect($idlist)->toArray();
        // $idlist = Technician::orderBy('id')->pluck('name', 'id');
        return view('technician.create');
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
            'name' => 'required|min:3',
            'surname' => 'required|min:3',
            'email' => 'required',
            'phone' => 'required|between:10,12',
            'position' => 'required|min:3',
            'id' => 'required',
        ]);

        // create post
        $technician = new Technician;
        $technician->name = $request->input('name');
        $technician->surname = $request->input('surname');
        $technician->email = $request->input('email');
        $technician->phone = $request->input('phone');
        $technician->position = $request->input('position');
        $technician->id = $request->input('id');
        $technician->save();

        return redirect('/technician')->with('success', 'Technician Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userID = auth()->user()->id;
        $user = User::find($userID);
        $technician = Technician::find($id);
        return view('technician.show')->with('technician', $technician);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $idUsername = \DB::table('users')->pluck('username', 'id');
        $technician = Technician::find($id);
        return view('technician.edit')->with('technician', $technician)->with('idUsername', $idUsername);
        // return view('technician.edit')->with('technician', $technician);
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
            'name' => 'required|min:3',
            'surname' => 'required|min:3',
            'email' => 'required',
            'phone' => 'required|between:10,12',
            'position' => 'required|min:3',
            'id' => 'required',
        ]);

        // create post
        $technician = Technician::find($id);
        $technician->name = $request->input('name');
        $technician->surname = $request->input('surname');
        $technician->email = $request->input('email');
        $technician->phone = $request->input('phone');
        $technician->position = $request->input('position');
        $technician->id = $request->input('id');
        $technician->save();

        return redirect('/technician')->with('success', 'Technician Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $technician = Technician::find($id);
        $technician->delete();
        return redirect('/technician')->with('success', 'Technician Deleted');
    }
}
