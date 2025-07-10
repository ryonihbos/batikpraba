<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        // Ambil semua user, kecuali admin
        $users = User::where('email', '!=', 'sintia@admin.com')->get();

        return view('admin.pengguna', compact('users'));
    }
}