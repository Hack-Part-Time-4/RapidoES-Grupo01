<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

use function PHPSTORM_META\type;

class RevisorController extends Controller
{

    public function __construct()
    {
        $this->middleware('isRevisor');
    }

    public function index()
    {
        $ad = Ad::where('is_accepted',null)->orderBy('created_at','desc')->first();
        return view('revisor.home',compact('ad'));
    }

    

    public function acceptAd(Ad $ad)
    {
        $ad->is_accepted = true;
        $ad->save();
        return redirect()->back()->withMessage(['type'=>'success','text'=>'Anuncio aceptado']);
    }

    public function rejectAd(Ad $ad)
    {
        $ad->is_accepted = false;
        $ad->save();
        return redirect()->back()->withMessage(['type'=>'danger','text'=>'Anuncio no aceptado']);
    }
    
}
