<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
  public function index()
  {
    return view('Member');
  }
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      "name" => "required|string|min:4|unique:users",
      "email" => "required|email:dns|unique:users",
      "password" => "required|min:6",
    ]);

    $validatedData['password'] = bcrypt($validatedData['password']);
    $validatedData['role'] = 'member';

    User::create($validatedData);

    return redirect('/Login')->with('success', 'Registration Success!')->send();
  }
}
