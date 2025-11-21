@extends('template')
@section('title') Erreur @endsection
@section('content')
<p>
    Aïe !!! Vous avez essayé d'accéder à une ressource inexistante...
    C'est pas de chance ! Par contre, <strong>ne passez pas la souris sur l'image !!!</strong>
</p>
<img onmouseenter="party.sparkles(this, { count: party.variation.range(20, 40), size: party.variation.range(0.8, 1.2) })" src="{{ asset('images/chat.webp') }}" title="Une image de chat"/><br/>
<a href="{{ route('home') }}">Accueil</a>
@endsection