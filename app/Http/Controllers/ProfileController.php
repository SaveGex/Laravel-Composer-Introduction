<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        return view('pages.profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(Request $request)
    {
        $user = $request->user();

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'avatar' => ['nullable', 'image', 'max:2048'], // макс 2МБ
            'password' => ['nullable', 'confirmed', 'min:8'],
        ]);

        if ($request->hasFile('avatar')) {
            if ($user->icon_url) {
                Storage::disk('public')->delete($user->icon_url);
            }
            $data['icon_url'] = $request->file('avatar')->store('avatars', 'public');
        }

        if ($request->filled('password')) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully!');
    }

    public function show(Request $request)
    {
        return view('pages.profile.show', ['user' => $request->user()]);
    }
}
