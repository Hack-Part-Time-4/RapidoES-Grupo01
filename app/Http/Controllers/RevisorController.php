<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function index()
    {
        $ad = Ad::where('is_accepted',false)->orderBy('created_at','desc')->first();
        return view('revisor.home',compact('ad'));
    }

    public function acceptAd()
    {
        dd("Solo para revisores");
    }

    public function rejectAd()
    {
        dd("Solo para revisores");
    }
}
