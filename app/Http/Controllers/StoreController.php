<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
    }

    public function create()
    {
        return view('dashboard');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:stores',
            ]
        ]);

        $store = Store::create([
            'name' => $request->name,
            'subdomain' => Str::slug($request->name),
            'user_id' => auth()->id()
        ]);

        return redirect()->route('dashboard')
            ->with('success', 'Votre boutique a été créée avec succès !');
    }

    public function show($subdomain)
    {
        $store = Store::where('subdomain', $subdomain)->firstOrFail();
        $user = $store->user;

        return view('store.show', compact('user'));
    }
}
