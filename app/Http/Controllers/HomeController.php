<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FooterSetting;

class HomeController extends Controller
{
    public function landingPage(){
         $footerSettings = FooterSetting::first();
         return view('pages.landing', compact('footerSettings'));
    }

     public function aboutPage(){
         return view('pages.about');
    }

    public function othersProjects(){
         return view('pages.othersProject');
    }

     public function dashboard(Request $request){
         if (!$request->session()->get('is_admin')) {
             return redirect()->route('login');
         }
         return view('admin.dashboard');
    }
}
