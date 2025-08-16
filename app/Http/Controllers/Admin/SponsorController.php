<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    public function index()
    {
        $sponsors = Sponsor::latest()->paginate(12);
        return view('admin.sponsors.index', compact('sponsors'));
    }

    public function create()
    {
        return view('admin.sponsors.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'required|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('sponsors', 'public');
            // Stocke le chemin relatif dans le champ 'logo' (ou adaptez selon votre migration)
            $data['logo'] = 'sponsors/' . basename($path);
        }

        // S'assurer que le champ 'logo' est bien présent dans l'insert
        \App\Models\Sponsor::create([
            'name' => $data['name'],
            'logo' => $data['logo'],
        ]);

        return redirect()->route('admin.sponsors.index')->with('success', 'Sponsor ajouté avec succès.');
    }

    public function destroy(Sponsor $sponsor)
    {
        $sponsor->delete();
        return redirect()->route('admin.sponsors.index')->with('success', 'Sponsor supprimé.');
    }
}
