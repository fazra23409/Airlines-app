<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    public function show()
    {
         if (Auth::user()->role === 'admin') {
            return redirect('/admin/dashboard')->with('info', 'Silakan gunakan dashboard admin.');
        }
        $user = Auth::user();
        return view('profile', [
            'title' => 'Profile',
            'user' => $user
        ]);
    }
    public function update(Request $request)
    {
         if (Auth::user()->role === 'admin') {
            return redirect('/admin/dashboard')->with('info', 'Silakan gunakan dashboard admin.');
        }
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'password' => 'nullable|min:6|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect('/profile')->with('success', 'Profil berhasil diperbarui');
    }
}
