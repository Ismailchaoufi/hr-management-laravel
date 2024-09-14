<?php

namespace App\Http\Controllers\Division;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\Service;

class ServiceControllerDivision extends Controller
{
    public function index(){
        $chefdivision=auth()->user();
        $division=Division::where('chefdivision',$chefdivision->email)->first();
        $services = Service::where('id_division',$division->id)->orderBy('created_at', 'desc')->paginate(10);
        return view('chefdivision.services.services', compact('services'));
    }
}
