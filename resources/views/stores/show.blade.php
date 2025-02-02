@extends('layouts.app')

@section('title', $user->name)

@section('content')
<div class="bg-white p-8 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6">Boutique de {{ $user->name }}</h1>
    <div class="space-y-4">
        <p class="text-gray-700"><span class="font-medium">Nom :</span> {{ $user->name }}</p>
        <p class="text-gray-700"><span class="font-medium">Email :</span> {{ $user->email }}</p>
        <p class="text-gray-700"><span class="font-medium">Âge :</span> {{ $user->age }} ans</p>
    </div>
</div>
@endsection