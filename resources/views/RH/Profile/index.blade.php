@extends('layouts.layout') <!-- Replace with your main layout name -->

@section('content')
<style>
/* Style pour la photo de profil */
.avatar {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 120px; /* Ajustez la taille de l'élément contenant l'image */
  height: 120px; /* Assurez-vous que la hauteur est égale à la largeur */
  border-radius: 50%; /* Forme ronde */
  border: 4px solid #fff; /* Bordure blanche pour faire ressortir l'image */
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Ombre portée pour donner de la profondeur */
  overflow: hidden; /* Assure que l'image ne dépasse pas du cercle */
  position: relative; /* Pour le positionnement de l'image */
}

.avatar img {
  width: 100%; /* Prend toute la largeur du conteneur */
  height: 100%; /* Prend toute la hauteur du conteneur */
  object-fit: cover; /* Assure que l'image couvre bien le cercle */
}
</style>

<div class="container-fluid py-4">
    <!-- Page Header -->
    <div class="mt-4" >

    </div>
    
    <!-- Profile Card -->
    <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2">
            <!-- Profile Image -->
            <div class="col-auto">
                <div class="avatar position-relative">
                    <img src="{{ asset('upload_files/photos/' . $user->photo) }}" alt="profile_image">
                </div>
            </div>
            
            <!-- Profile Info -->
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">{{ $user->nomFr }} {{ $user->prenomFr }}</h5>
                    <p class="mb-0 font-weight-normal text-sm">{{ $user->roles->role }}</p>
                </div>
            </div>
            
            <!-- Profile Actions -->
            <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                <div class="nav-wrapper position-relative end-0">
                    <ul class="nav nav-pills nav-fill p-1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                                <i class="material-icons text-lg position-relative">home</i>
                                <span class="ms-1">App</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                                <i class="material-icons text-lg position-relative">email</i>
                                <span class="ms-1">Messages</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                                <i class="material-icons text-lg position-relative">settings</i>
                                <span class="ms-1">Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- Profile Details -->
        <div class="row">
            <!-- Profile Information -->
            <div class="col-12 col-xl-6">
                <div class="card h-100">
                    <div class="card-header pb-0">
                        <h6>Informations du profile</h6>
                    </div>
                    <div class="card-body">
                        <p class="text-sm">Bonjour, je suis {{ $user->nomFr }}. Voici quelques informations sur moi.</p>
                        <hr class="horizontal gray-light my-4">
                        <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong>Nom Complet (Français):</strong> &nbsp; {{ $user->nomFr . ' ' . $user->prenomFr }}</li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong>Nom Complet (Arabe):</strong> &nbsp; {{ $user->nomAr . ' ' . $user->prenomAr }}</li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; {{ $user->email }}</li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong>Lieu de Naissance:</strong> &nbsp; {{ $user->lieu_naissance }}</li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong>Date de Naissance:</strong> &nbsp; {{ $user->date_naissance }}</li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong>Âge:</strong> &nbsp; {{ $user->age->age}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Additional Info -->
            <div class="col-12 col-xl-6">
                <div class="card h-100">
                    <div class="card-header pb-0">
                        <h6>Informations supplémentaires</h6>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong>Status de l'Admin:</strong> &nbsp; Active</li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong>Filière:</strong> &nbsp; {{ $user->filiere }}</li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong>CIN:</strong> &nbsp; {{ $user->CINE }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
