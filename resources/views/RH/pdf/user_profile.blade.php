<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User Profile</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap');
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
        }
        .profile-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .profile-image {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }
        h1, h2 {
            margin-bottom: 10px;
        }
        .info-section {
            margin-bottom: 20px;
        }
        .info-item {
            margin-bottom: 5px;
        }
        .info-label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="profile-header">
            <img src="{{ public_path('upload_files/photos/' . $user->photo) }}" alt="Profile Image" class="profile-image">
            <h1>{{ $user->nomFr }} {{ $user->prenomFr }}</h1>
            <p>{{ $user->categoryFonctionnaire->nomFr }} / {{ $user->division->nomFr }}</p>
        </div>

        <div class="info-section">
            <h2>Informations du profile</h2>
            <p>Bonjour, je suis {{ $user->nomFr }}. Voici quelques informations sur moi.</p>
            <div class="info-item"><span class="info-label">Nom Complet EN FRANCAIS:</span> {{ $user->nomFr . ' ' . $user->prenomFr }}</div>
            <div class="info-item"><span class="info-label">EMAIL:</span> {{ $user->email }}</div>
            <div class="info-item"><span class="info-label">LIEU DE NAISSANCE:</span> {{ $user->lieu_naissance }}</div>
            <div class="info-item"><span class="info-label">DATE DE NAISSANCE:</span> {{ $user->date_naissance }}</div>
            <div class="info-item"><span class="info-label">ÂGE:</span> {{ $user->age->age }}</div>
            <div class="info-item"><span class="info-label">CIN:</span> {{ $user->CINE }}</div>
            <div class="info-item"><span class="info-label">STATUS:</span> {{ $user->statusFonctionnaire->status_fonctionnaire }}</div>
            <div class="info-item"><span class="info-label">MATRICULE:</span> {{ $user->matricule->nemuro }}</div>
            <div class="info-item"><span class="info-label">DE Division:</span> {{ $user->division->nomFr }}</div>
            @if($user->service)
            <div class="info-item"><span class="info-label">DE SERVICE:</span> {{ $user->service->nomFr }}</div>
            @endif
            <div class="info-item"><span class="info-label">GRADE:</span> {{ $user->grade->nomFr }}</div>
            <div class="info-item"><span class="info-label">FILIERE:</span> {{ $user->filiere }}</div>
            <div class="info-item"><span class="info-label">Solde de Congé:</span> {{ $user->solde_conger }}</div>
        </div>
    </div>
</body>
</html>