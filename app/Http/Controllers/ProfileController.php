<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
  public function index()
  {
    $user = Auth::user(); // get the currently authenticated user
    // dd($user->toArray());
    return view('profile', ['user' => $user]);
  }

  public function edit(User $user)
  {
    return view('Profile.edit', ['user' => $user]);
  }

  public function update(Request $request, User $user)
  {
    $validatedData = $request->validate([
      'name' => 'required|max:255',
      'email' => 'required|email|max:255',
      'password' => 'required|min:8',
    ]);


    $validatedData['password'] = bcrypt($request->password);
    $user->update($validatedData);

    return redirect('/Profile')->with('success', 'Profile updated successfully!');
  }
}
