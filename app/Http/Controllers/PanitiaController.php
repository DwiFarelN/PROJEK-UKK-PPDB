<?php
// app/Http/Controllers/PanitiaController.php
namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PanitiaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:panitia']);
    }

    public function dashboard()
    {
        $pendaftaran = Pendaftaran::with('user')->latest()->get();
        $pendingCount = Pendaftaran::where('status', 'pending')->count();
        $acceptedCount = Pendaftaran::where('status', 'diterima')->count();
        
        return view('panitia.dashboard', compact('pendaftaran', 'pendingCount', 'acceptedCount'));
    }

    public function verifikasiPendaftaran($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->update(['status' => 'diterima']);
        
        return back()->with('success', 'Pendaftaran berhasil diverifikasi');
    }

    public function tolakPendaftaran(Request $request, $id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->update([
            'status' => 'ditolak',
            'catatan' => $request->catatan
        ]);
        
        return back()->with('success', 'Pendaftaran ditolak');
    }
}