@extends('Layouts.layout')

@section('content')
<style>
  /* Style pour la photo de profil */
  .avatar {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 120px;
    height: 120px; 
    border-radius: 50%;
    border: 4px solid #fff; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
    overflow: hidden; 
    position: relative; 
    margin-bottom: 20px;
  }

  .avatar img {
    width: 100%; 
    height: 100%;
    object-fit: cover; 
  }
</style>

<div class="container-fluid px-2 px-md-4">
  <div class="mt-5">
  </div>
  <div class="card card-body mx-3 mx-md-4 mt-n6">
    <div class="row justify-content-center">
      <div class="col-auto">
        <div class="avatar position-relative">
          <img src="{{ asset('upload_files/photos/' . $user->photo) }}" alt="profile_image">
        </div>
      </div>
      <div class="col-auto my-auto">
        <div class="h-100">
          <h5 class="mb-1">
            {{ $user->nomFr . ' ' . $user->prenomFr }}
          </h5>
          <p class="mb-0 font-weight-normal text-sm">
            Division: {{ $user->division->nomFr }} | {{$user->division->nomAr}}
          </p>
        </div>
      </div>
    </div>
    
    <!-- Messages d'erreur et de confirmation -->
    @if (session('message'))
      <div class="alert alert-{{ session('alertType') }} alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    
    <div class="row justify-content-center">
      <div class="col-12 col-xl-6">
        <div class="card card-plain h-100">
          <div class="card-header pb-0 p-3">
            <div class="row">
              <div class="col-md-8 d-flex align-items-center">
                <h6 class="mb-0">Informations du Profil</h6>
              </div>
              <div class="col-md-4 text-end">
              </div>
            </div>
          </div>
          <div class="card-body p-3">
            <p class="text-sm">
              Bonjour, je suis {{ $user->nomFr }}. Voici quelques informations sur moi.
            </p>
            <hr class="horizontal gray-light my-4">
            <ul class="list-group">
              <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Nom Complet (FR):</strong> &nbsp; {{ $user->nomFr . ' ' . $user->prenomFr }}</li>
              <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Nom Complet (AR):</strong> &nbsp; {{ $user->nomAr . ' ' . $user->prenomAr }}</li>
              <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; {{ $user->email }}</li>
              <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Catégorie fonctionnaire / Division:</strong> &nbsp; {{ $user->categoryFonctionnaire->nomFr }} / {{ $user->division->nomFr }}</li>
              <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">SERVICE:</strong> &nbsp; {{ $user->service->nomFr }}</li>
              <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">GRADE:</strong> &nbsp; {{ $user->grade->nomFr }}</li>
              <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">STATUS DE FONCTIONNAIRE:</strong> &nbsp; {{ $user->statusFonctionnaire->status_fonctionnaire }}</li>
              <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">MATRICULE:</strong> &nbsp; {{ $user->matricule->numero }}</li>
              <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Solde de Congé:</strong> &nbsp; {{ $user->solde_conger }}</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    
    <div class="row justify-content-center">
      <div class="col-12 col-xl-6">
        <div class="card card-plain h-100">
          <div class="card-header pb-0 p-3">
            <h6 class="mb-0">Actions</h6>
          </div>
          <div class="card-body p-3">
            <form action="{{ route('listdemandes.update', $demande->id) }}" method="POST">
              @csrf
              @method('PATCH')
              <input type="hidden" name="status" value="accepté">
              <button type="submit" class="btn btn-success w-100 mb-2">Accepté</button>
            </form>
            <form action="{{ route('listdemandes.update', $demande->id) }}" method="POST">
              @csrf
              @method('PATCH')
              <input type="hidden" name="status" value="refusé">
              <button type="submit" class="btn btn-danger w-100">Refusé</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
