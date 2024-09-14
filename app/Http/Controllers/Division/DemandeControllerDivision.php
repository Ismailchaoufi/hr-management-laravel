<?php

namespace App\Http\Controllers\Division;

use App\Http\Controllers\Controller;
use App\Models\Demande;
use App\Models\User;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TypeDemande;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class DemandeControllerDivision extends Controller
{
    public function index(Request $request)
    {
        $chefdivision = auth()->user();
        $division=Division::where('chefdivision',$chefdivision->email)->first();
        $users=User::where('id_division',$division->id)->where('role','!=', 2)->get();
        $userIds = $users->pluck('id');
        if ($request->ajax()) {
 
            $data=Demande::whereIn('id_user', $userIds)->with(['typeDemande', 'statusDemande', 'user'])->get();
            if($request->filled('from_date') && $request->filled('to_date'))
            {
                $data = $data->whereBetween('created_at', [$request->from_date, $request->to_date]);
            }

            return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('created_at', function ($demande) {
                return $demande->created_at->format('Y-m-d');
            })
            ->editColumn('type_demande', function ($demande) {
                return $demande->typeDemande->type_demande;
            })
            ->editColumn('status_demande', function ($demande) {
                $badgeClass = '';
            
                switch ($demande->id_status) {
                    case 2:
                        $badgeClass = 'bg-success';
                        break;
                    case 3:
                        $badgeClass = 'bg-danger';
                        break;
                    default:
                        $badgeClass = 'bg-secondary';
                        break;
                }
            
                return '
                        <span class="badge ' . $badgeClass . '">' . htmlspecialchars($demande->statusDemande->status_demande, ENT_QUOTES, 'UTF-8') . '</span>
                    ';
            })            
            ->editColumn('date_debut', function ($demande) {
                return in_array($demande->id_typeDemande, [2, 3, 4]) ? $demande->date_debut->format('Y-m-d') : 'N/A';
            })
            ->editColumn('nbr_jours', function ($demande) {
                return in_array($demande->id_typeDemande, [2, 3, 4]) ? $demande->nbr_jours : 'N/A';
            })
            ->editColumn('solde_conger', function ($demande) {
                return $demande->user->solde_conger;
            })
            ->editColumn('user_name', function ($demande) {
                return $demande->user->nomFr . ' ' . $demande->user->prenomFr ;
            })
            ->editColumn('date_fin', function ($demande) {
                return in_array($demande->id_typeDemande, [2, 3, 4]) ? $demande->date_fin->format('Y-m-d') : 'N/A';
            })
            ->editColumn('photo', function ($demande) {
                return $demande->user->photo ? '<img src="' . asset('upload_files/photos/' . $demande->user->photo) . '" alt="Photo" style="width: 50px; height: 50px; object-fit: cover;">' : 'N/A';
            })
            ->addColumn('action', function ($demande) {
                if ($demande->id_status == 2) {
                    return '
                        <a href="' . route('demande/exportword', $demande->id) . '" class="btn btn-info btn-sm">Imprimer Word</a>
                    ';
                } else {
                    return '
                        <button class="btn btn-info btn-sm" disabled>Imprimer Word</button>
                    ';
                }
            })
            ->rawColumns(['photo','status_demande', 'action'])
            ->make(true);
        }



        return view('Chefdivision.demandes.listdemandes',compact('division'));

    }
}
