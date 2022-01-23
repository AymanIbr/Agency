<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\portfolio;
use Illuminate\Http\Request;
use Nette\Utils\Random;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = portfolio::latest()->paginate(4);
        return view('admin.portfolios.index',compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select(['name','id'])->get();
        return view('admin.portfolios.create',compact('categories'));
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
            'Client'=>'required',
            'image'=>'required',
            'category_id'=>'required',
            'content'=>'required'
        ]);
        $ex = $request->file('image')->getClientOriginalExtension();
        $new_image = 'Agency .'.'_ '.'image'. rand().$ex;
        $request->file('image')->move(public_path('uplods'),$new_image );

        portfolio::create([
            'name'=>$request->name,
            'Client'=>$request->Client,
            'image'=>$new_image,
            'category_id'=>$request->category_id,
            'content'=>$request->content
        ]);
        return redirect()->route('portfolios.index')->with('success','Portfolio Add Successfully')
        ->with('type','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(portfolio $portfolio)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $portfolio = portfolio::findOrFail($id);
        $category = Category::all();
        return view('admin.portfolios.edit',compact('portfolio','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'Client'=>'required',
            'image'=>'required',
            'category_id'=>'required',
            'content'=>'required'
        ]);
        $portfolio =portfolio::findOrFail($id);
        $new_image = $portfolio->image ;
        if($request->has('image')){
            $ex = $request->file('image')->getClientOriginalExtension();
            $new_image = 'Agency .'.'_ '.'image'. rand().$ex;
            $request->file('image')->move(public_path('uplods'),$new_image);
        }
        portfolio::findOrFail($id)->update([
            'name'=>$request->name,
            'Client'=>$request->Client,
            'image'=>$new_image,
            'category_id'=>$request->category_id,
            'content'=>$request->content
        ]);
        return redirect()->route('portfolios.index')->with('success','Portfolio Update Successfuly')
        ->with('type','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        portfolio::findOrFail($id)->delete();
        return redirect()->route('portfolios.index')->with('success','Portfolio Deleted Successfuly')
        ->with('type','danger');
    }
}
