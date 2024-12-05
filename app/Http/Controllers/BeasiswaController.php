<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beasiswa;

class BeasiswaController extends Controller
{
    /**
     * Menampilkan daftar beasiswa di dashboard admin.
     */
    public function index()
    {
        // Ambil semua data beasiswa dari database
        $beasiswas = Beasiswa::all();

        // Kirim data ke view
        return view('admin.dashboard', compact('beasiswas'));
    }

    /**
     * Menampilkan form tambah beasiswa.
     */
    public function create()
    {
        return view('admin.tambahbeasiswa'); // Halaman tambah beasiswa
    }

    /**
     * Menyimpan data beasiswa baru.
     */
    public function store(Request $request)
    {
        // Validasi input data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'application_link' => 'required|url',
            'image_url' => 'nullable|image|max:2048',
            'expired_date' => 'required|date',
        ]);

        // Simpan data ke database
        $imagePath = $request->file('image_url') 
            ? $request->file('image_url')->store('beasiswa_images', 'public') 
            : 'default-img.jpg';

        Beasiswa::create([
            'title' => $request->title,
            'description' => $request->description,
            'application_link' => $request->application_link,
            'image_url' => $imagePath,
            'expired_date' => $request->expired_date,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Beasiswa berhasil ditambahkan!');
    }

    /**
     * Menampilkan halaman edit beasiswa.
     */
    public function edit($id)
    {
        $beasiswa = Beasiswa::findOrFail($id);
        return view('admin.editbeasiswa', compact('beasiswa'));
    }

    /**
     * Memperbarui data beasiswa.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'application_link' => 'required|url',
            'image_url' => 'nullable|image|max:2048',
            'expired_date' => 'required|date',
        ]);

        $beasiswa = Beasiswa::findOrFail($id);

        // Jika ada gambar baru, update path-nya
        if ($request->file('image_url')) {
            $imagePath = $request->file('image_url')->store('beasiswa_images', 'public');
            $beasiswa->image_url = $imagePath;
        }

        $beasiswa->update([
            'title' => $request->title,
            'description' => $request->description,
            'application_link' => $request->application_link,
            'expired_date' => $request->expired_date,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Beasiswa berhasil diperbarui!');
    }

    /**
     * Menghapus data beasiswa.
     */
    public function destroy($id)
    {
        $beasiswa = Beasiswa::findOrFail($id);
        $beasiswa->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Beasiswa berhasil dihapus!');
    }

    public function userDashboard()
    {
        $beasiswas = Beasiswa::all(); // Mengambil semua data beasiswa dari database
        return view('dashboard', compact('beasiswas'));
    }

    public function show($id)
{
    $beasiswa = Beasiswa::findOrFail($id);
    return view('detail', compact('beasiswa'));
}


}
