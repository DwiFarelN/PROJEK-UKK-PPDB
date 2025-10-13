<?php
// app/Http/Controllers/AdminController.php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    public function dashboard()
    {
        $totalUsers = User::count();
        $totalPendaftaran = Pendaftaran::count();
        $pendingPendaftaran = Pendaftaran::where('status', 'pending')->count();
        
        return view('admin.dashboard', compact('totalUsers', 'totalPendaftaran', 'pendingPendaftaran'));
    }

    public function manageUsers()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function updateUserRole(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update(['role' => $request->role]);
        
        return back()->with('success', 'Role user berhasil diupdate');
    }
}