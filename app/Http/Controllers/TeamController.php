<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::latest()->paginate(4);
        return view('admin.teams.index',compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'image'=>'required',
            'job'=>'required'
        ]);

        $ex = $request->file('image')->getClientOriginalExtension();
        $new_image = 'Team_'.'.'.rand().$ex;
        $request->file('image')->move(public_path('uplods'),$new_image);

        Team::create([
            'name'=>$request->name,
            'image'=>$new_image,
            'job'=>$request->job
        ]);
        return redirect()->route('teams.index')->with('success','Team Add Successfuly')
        ->with('type','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Team::findOrFail($id);
        return view('admin.teams.edit',compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'image'=>'required',
            'job'=>'required'
        ]);
        $team = Team::findOrFail($id);
        $new_image= $team->image;

        if($request->has('image')){
            $ex = $request->file('image')->getClientOriginalExtension();
            $new_image = 'Team_'.'.'.rand().$ex;
            $request->file('image')->move(public_path('uplods'),$new_image);
        }
        Team::findOrFail($id)->update([
            'name'=>$request->name,
            'image'=>$new_image,
            'job'=>$request->job
        ]);
        return redirect()->route('teams.index')->with('success','Team Update Success ')
        ->with('type','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Team::findOrFail($id)->delete();
        return redirect()->route('teams.index')->with('success','Member Delete Success')
        ->with('type','danger');
    }
}
