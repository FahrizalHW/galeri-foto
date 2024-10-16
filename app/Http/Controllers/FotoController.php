<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Album;
use App\Models\User;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $fotos = Foto::all();  // Mengambil data foto beserta relasi user dan album
        return view('fotos.index', compact('fotos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $albums = Album::all();  // Mengambil semua album
        $users = User::all();    // Mengambil semua user
        return view('fotos.create', compact('albums', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'JudulFoto' => 'required|string',
            'DeskripsiFoto' => 'nullable|string',
            'TanggalUnggah' => 'required|date',
            'LokasiFile' => 'required|file|mimes:jpeg,png,jpg,webp,gif',
            'AlbumId' => 'required|exists:albums,id', // Menggunakan AlbumId sebagai foreign key
            'UserId' => 'required|exists:users,id', // Memastikan UserId ada di tabel users
        ]);
        
        // Proses upload file jika ada
        if ($request->hasFile('LokasiFile')) {
            $path = $request->file('LokasiFile')->store('uploads', 'public');
        } else {
            $path = null; // Jika tidak ada file
        }
        
        // Simpan data foto
        Foto::create([
            'JudulFoto' => $request->JudulFoto,
            'DeskripsiFoto' => $request->DeskripsiFoto,
            'TanggalUnggah' => $request->TanggalUnggah,
            'LokasiFile' => $path, // Menyimpan path file gambar
            'AlbumId' => $request->AlbumId,  // Menggunakan AlbumId
            'UserId' => $request->UserId,
        ]);

    return redirect()->route('fotos.index');

    }
    /**
     * Display the specified resource.
     */
    public function show(Foto $foto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Menampilkan form edit untuk foto tertentu
public function edit(Foto $foto)
{
    // Mengambil data album dan user untuk dropdown pada form edit
    $albums = Album::all();  // Ambil semua album dari database
    $users = User::all();    // Ambil semua user dari database
    
    // Menampilkan view 'fotos.edit' dengan membawa data foto, albums, dan users
    return view('fotos.edit', compact('foto', 'albums', 'users'));
}

// Mengupdate foto yang sudah ada
public function update(Request $request, Foto $foto)
{
    // Validasi input yang diterima dari form
    $validated = $request->validate([
        'JudulFoto' => 'required|string|max:255',
        'DeskripsiFoto' => 'required|string|max:255',
        'AlbumId' => 'required|exists:albums,id',  // Pastikan album ada di tabel albums
        'UserId' => 'required|exists:users,id',    // Pastikan user ada di tabel users
        'LokasiFile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar (optional)
    ]);

    // Update data foto yang sudah ada
    $foto->JudulFoto = $validated['JudulFoto'];
    $foto->DeskripsiFoto = $validated['DeskripsiFoto'];
    $foto->AlbumId = $validated['AlbumId'];
    $foto->UserId = $validated['UserId'];

    // Mengecek jika ada file gambar baru yang diupload
    if ($request->hasFile('LokasiFile')) {
        // Hapus gambar lama jika ada
        if ($foto->LokasiFile) {
            Storage::delete('public/' . $foto->LokasiFile);
        }

        // Simpan gambar baru
        $path = $request->file('LokasiFile')->store('fotos', 'public');
        $foto->LokasiFile = $path;
    }

    // Simpan perubahan ke database
    $foto->save();

    // Redirect ke halaman index fotos dengan pesan sukses
    return redirect()->route('fotos.index')->with('success', 'Foto updated successfully');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Foto $foto)
    {
        //
    }
}
