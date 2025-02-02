@extends('layouts.app')

@section('title', 'Tableau de bord')

@section('content')
<div class="bg-white p-8 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6">Créer votre boutique</h1>
    <form method="POST" action="{{ route('stores.store') }}" class="space-y-4">
        @csrf
        
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Nom de la boutique</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" 
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
            Créer la boutique
        </button>
    </form>


    @if(auth()->user()->stores->count() > 0)
        <div class="mt-8">
            <h2 class="text-xl font-bold mb-4">Vos boutiques</h2>
            <ul class="space-y-2">
                @foreach(auth()->user()->stores as $store)
                    <li class="bg-gray-50 p-4 rounded">
                        <a href="http://{{ $store->subdomain }}.{{env('APP_DOMAIN')}}" class="text-blue-500 hover:text-blue-600" target="_blank">
                            {{ $store->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
@endsection