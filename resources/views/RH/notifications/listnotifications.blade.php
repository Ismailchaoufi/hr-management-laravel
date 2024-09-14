@extends('Layouts.layout')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Notifications</h1>
    @if(count($filteredNotifications) > 0)
        <div class="list-group">
            @foreach($filteredNotifications as $notification)
                <a href="{{ route('notifications.show', $notification->id) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">
                            @if(isset($notification->data['status']))
                                {{ $notification->data['type_demande'] }}
                            @else
                                Nouvelle demande
                            @endif
                        </div>
                        @if(isset($notification->data['status']))
                            Votre demande de type <strong>{{ $notification->data['type_demande'] }}</strong> a été <strong>{{ $notification->data['status'] }}</strong>.
                        @else
                            Nouvelle demande de type <strong>{{ $notification->data['type_demande'] }}</strong> par l'utilisateur <strong>{{ $notification->data['user_name'] }}</strong>
                        @endif
                    </div>
                    <span class="badge bg-primary rounded-pill">{{ $notification->created_at->diffForHumans() }}</span>
                </a>
            @endforeach
        </div>
    @else
        <div class="alert alert-info" role="alert">
            Aucune demande en attente.
        </div>
    @endif
</div>
@endsection
