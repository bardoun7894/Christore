<?php

namespace App\Http\Controllers;

use App\Models\NavLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NavLinkController extends Controller
{
    public function navlinks(){
       Session::put('page','navlinks');
        $navLinks = NavLink::get();
        return view('admin.nav_links.nav_links')->with(compact('navLinks'));

    }
}
