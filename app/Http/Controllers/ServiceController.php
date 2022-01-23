<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services =Service::latest()->paginate(4);
        return view('admin.Services.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Services.create');
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
            'Welc'=>'required',
            'E_Commerce'=>'required',
            'Design'=>'required',
            'Web'=>'required'
        ]);
        Service::create([
           'Welc'=>$request->Welc,
           'E_Commerce'=>$request->E_Commerce,
            'Design'=>$request->Design,
            'Web'=>$request->Web
        ]);
        return redirect()->route('services.index')->with('success','Service Add Successfuly')
        ->with('type','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.Services.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'Welc'=>'required',
            'E_Commerce'=>'required',
            'Design'=>'required',
            'Web'=>'required'
        ]);
        Service::findOrFail($id)->update([
            'Welc'=>$request->Welc,
            'E_Commerce'=>$request->E_Commerce,
            'Design'=>$request->Design,
            'Web'=>$request->Web
        ]);
        return redirect()->route('services.index')->with('success','Service Update Successfuly')
        ->with('type','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::findOrFail($id)->delete();
        return redirect()->route('services.index')->with('success','Service Delete Successfuly')
        ->with('type','danger');
    }
}
