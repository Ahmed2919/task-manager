<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function update()
    {

        $user_id = auth()->id();

        $data = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'nullable|confirmed|min:3',
            'image' => 'mimes:jpeg,jpg,png'
        ]);

        if (request()->has('password')) {
            $data['password'] = Hash::make(request('password'));
        }

        if (request()->hasFile('image')) {
            $path = request('image')->store('/users');
            $data['image'] = $path;
        }
        //  dd($data);
        User::findOrFail($user_id)->update($data);

        return back();
    }
}
