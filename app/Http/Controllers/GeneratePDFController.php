<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use PDF;

class GeneratePDFController extends Controller
{
    public function generateUserProfilePDF($userId)
    {
        $user = User::findOrFail($userId);
        
        $pdf = PDF::loadView('RH.pdf.user_profile', ['user' => $user]);
        
        return $pdf->download('user_profile.pdf');
    }
}
