<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Aboutbanner;
use App\Models\Blogs;
use App\Models\Brand;
use App\Models\Services;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
   
    public function show($slug)
    {
        $service = Services::where('slug',$slug)->first();        
        if (!$service) {
            return back()->with('error','Service Not Found!');
        }
        $decodedTabs = json_decode($service->tabs,true);
        // dd($decodedTabs);
        return view('website.pages.service.view', compact('service','decodedTabs'));
    }
}
