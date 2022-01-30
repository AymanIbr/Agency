<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Team;
use App\Models\Service;
use App\Models\portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class PagesController extends Controller
{
    public function index(){
        return view('Front.index');
    }
    public function service(){
        $services = Service::all();
        return view('Front.Service',compact('services'));
    }
    public function portfolio(){
        $portfolios = portfolio::all();
        return view('Front.portfolio',compact('portfolios'));
    }
    public function team(){
        $teams= Team::select(['name','image','job'])->get();
        return view('Front.team',compact('teams'));
    }
    public function contact(){
        return view('Front.content');
    }
    public function ContactSubmit(Request $request){

        $request->validate([
            'name'=> 'required',
            'email'=>'required',
            'phone' => 'required',
            'message' => 'required'
        ]);
        Mail::to('admin@admin.com')->send(new ContactMail($request->except('_token')));
        return view('Front.index');
    }
}
