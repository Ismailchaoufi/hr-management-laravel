<?php

namespace App\Http\Controllers\Division;

use App\Http\Controllers\Controller;
use App\Models\Demande;
use App\Models\Division;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class FrontendControllerDivision extends Controller
{
    public function index(){
        $showCharts=true;
        $chefdivision = auth()->user();
        $division=Division::where('chefdivision',$chefdivision->email)->firstOrFail();
        $users=User::where('id_division',$division->id)->where('role','!=', 2)->get();
        
        $totalUsers = User::where('role', '!=', '1')
            ->where('role', '!=', '2')
            ->where('id_division', $division->id)
            ->count();
        $userIds = $users->pluck('id'); 
        $demandes=Demande::whereIn('id_user', $userIds);
        $totalDemandes = $demandes->count();
        $demandesNonTraitees = Demande::whereIn('id_user', $userIds)->where('id_status', '1')->count();
        $demandesTraitees = Demande::whereIn('id_user', $userIds)->where('id_status','!=', '1')->count();
        $Atesstationtravail = Demande::whereIn('id_user', $userIds)->where('id_typeDemande', '1')->count();
        $congéexeptionnel = Demande::whereIn('id_user', $userIds)->where('id_typeDemande', '2')->count();
        $congé = Demande::whereIn('id_user', $userIds)->where('id_typeDemande', '3')->count();
        $permissionabs = Demande::whereIn('id_user', $userIds)->where('id_typeDemande', '4')->count();
        
         // Calcul des pourcentages
         $pourcentageNonTraitees = $totalDemandes > 0 ? ($demandesNonTraitees / $totalDemandes) * 100 : 0;
         $pourcentageTraitees = $totalDemandes > 0 ? ($demandesTraitees / $totalDemandes) * 100 : 0;
         $pourcentageAttestation = $totalDemandes > 0 ? ($Atesstationtravail / $totalDemandes) * 100 : 0;
         $pourcentageDocument = $totalDemandes > 0 ? ($congéexeptionnel / $totalDemandes) * 100 : 0;
         $pourcentageCongé = $totalDemandes > 0 ? ($congé / $totalDemandes) * 100 : 0;
         $pourcentageCongé = $totalDemandes > 0 ? ($permissionabs / $totalDemandes) * 100 : 0;

                 // Obtenir le mois dernier
        $lastMonth = now()->subMonth()->month;
        $lastYear = now()->subMonth()->year;

        // Nombre d'utilisateurs créés le mois dernier
        $usersLastMonth = User::where('id_division',$division->id)->where('role','!=', 2)->whereMonth('created_at', $lastMonth)
                                ->whereYear('created_at', $lastYear)
                                ->count();

        // Nombre de demandes créées le mois dernier
        $demandesLastMonth = Demande::whereIn('id_user', $userIds)->whereMonth('created_at', $lastMonth)
                                    ->whereYear('created_at', $lastYear)
                                    ->count();
 

        return view('Chefdivision.dashboard.dashboard', compact('showCharts','totalUsers', 'totalDemandes', 'demandesNonTraitees', 'demandesTraitees','pourcentageNonTraitees',
                    'pourcentageTraitees','Atesstationtravail','congéexeptionnel','congé',
                    'pourcentageAttestation','pourcentageDocument','pourcentageCongé','permissionabs','usersLastMonth','demandesLastMonth'));
    }
}
