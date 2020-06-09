<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Technician;
use Illuminate\Support\Arr;

class TechniciansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $z = auth()->user()->id;
        // $x = technician::select('position')->where('id', '=', $z)->pluck('position');
        // $access = Arr::get($x, 0);

        // return \DB::table('technician')->pluck('position');

        $a = auth()->user()->id;
        $b = Technician::where('id', '=', $a)->get();
        $technician = Technician::orderBy('technicianID', 'desc')->get();
        return view('technician.index')->with('technician', $technician)->with('b', $b);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $z = auth()->user()->id;
        // $access = technician::find($z)->position;
        $idUsername = \DB::table('users')->pluck('username', 'id');
        $idEmail = \DB::table('users')->pluck('email', 'email');
        // $idlist = ['0' => 'Select an id'] + collect($idlist)->toArray();
        // $idlist = Technician::orderBy('id')->pluck('name', 'id');
        return view('technician.create')->with('idUsername', $idUsername)->with('idEmail', $idEmail);
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
        $e = Technician::select('id')->orderBy('id', 'desc')->pluck('id');
        $lastID = Arr::get($e, 0);

        if ($id > $lastID)  {
            // echo 'id does not exist';
            // die;
            abort(403, 'Unauthorized action.');
        }

        // $z = auth()->user()->id;
        // $access = technician::find($z)->position;
        // return technician::find($id)->position;
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
        $e = Technician::select('id')->orderBy('id', 'desc')->pluck('id');
        $lastID = Arr::get($e, 0);

        if ($id > $lastID)  {
            // echo 'id does not exist';
            // die;
            abort(403, 'Unauthorized action.');
        }
        // $z = auth()->user()->id;
        // $access = technician::find($z)->position;
        $idUsername = \DB::table('users')->pluck('email', 'id');
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
