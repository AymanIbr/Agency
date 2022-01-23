<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\portfolio;
use App\Models\Service;
use App\Models\Team;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $Cout_category = Category::count();
        $Cout_portfolio = portfolio::count();
        $Cout_Serv = Service::count();
        $Cout_team = Team::count();
        return view('admin.index',compact('Cout_category','Cout_portfolio','Cout_Serv','Cout_team'));
    }
}
