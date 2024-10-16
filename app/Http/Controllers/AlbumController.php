<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\User;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::all();
        return view('albums.index', compact('albums'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();  // Mengambil semua data pengguna
        return view('albums.create', compact('users')); 
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Album::create($request->all());
        return redirect()->route('albums.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
{
    $users = User::all(); // Mengambil semua data pengguna
    return view('albums.edit', compact('album', 'users')); // Mengirim data album dan users ke view
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
    {
    // Validasi data yang dikirimkan (opsional, tapi disarankan)
    $validated = $request->validate([
        'NamaAlbum' => 'required|string|max:255',
        'DeskripsiFoto' => 'required|string|max:255',
        'TanggalDibuat' => 'required|date',
        'UserId' => 'required|exists:users,id',  // Pastikan UserId ada di tabel 'users'
    ]);

    // Update data album
    $album->update($validated);

    // Redirect ke halaman album index (atau halaman lain setelah update)
    return redirect()->route('albums.index')->with('success', 'Album updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        $album->delete();
        return redirect()->route('albums.index');
    }
}