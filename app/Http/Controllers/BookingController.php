<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Ruangan;
use App\Models\User;

class BookingController extends Controller
{
    public function index()
    {
        $ruangans = Booking::all();
        return view('bookings.index', compact('ruangans'));
    }

    public function create()
    {
        $ruangans = Ruangan::all();
        $users = User::all();
        return view('bookings.create', compact('ruangans', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_peminjam' => 'required',
            'ruangan_dipinjam' => 'required',
            'tanggal_peminjaman' => 'required|date',
            'akhir_peminjaman' => 'required|date',
        ]);

        $data = $request->all();

        Booking::create([
            'user_id' => $data['nama_peminjam'],
            'ruangan_id' => $data['ruangan_dipinjam'],
            'start_book' => $data['tanggal_peminjaman'],
            'end_book' => $data['akhir_peminjaman'],
        ]);

        return redirect()->route('bookings.index')->withSuccess('Pemesanan baru telah berhasil dibuat');
    }

    public function edit(Booking $booking)
    {
        $ruangans = Ruangan::all();
        $users = User::all();
        return view('bookings.edit', compact('booking', 'ruangans', 'users'));
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'nama_peminjam' => 'required',
            'ruangan_dipinjam' => 'required',
            'tanggal_peminjaman' => 'required|date',
            'akhir_peminjaman' => 'required|date',
        ]);

        $data = $request->all();

        $booking->update([
            'user_id' => $data['nama_peminjam'],
            'ruangan_id' => $data['ruangan_dipinjam'],
            'start_book' => $data['tanggal_peminjaman'],
            'end_book' => $data['akhir_peminjaman'],
        ]);

        return redirect()->route('bookings.index')->withSuccess('Pemesanan telah berhasil diperbarui');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('bookings.index')->with('success', 'Pemesanan telah berhasil dihapus');
    }
}
