<?php

namespace App\Http\Controllers;

use App\Facades\Toast;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::id())->get();
        return Inertia::render('Account', [
            'title' => 'My Account',
            'user' => $user[0],
        ]);
    }

    public function store(Request $request)
    {

        try {

            $request->validate([
                'name' => 'required|string|max:255'
            ]);

            ray($request->all());
            $user = User::find(Auth::id());

            $user->update([
                'name' => $request->name,
            ], ['touch' => false]);
            ray($user);

            return back()->toast('This notification comes from the server side =)', 'success');
        } catch (\Throwable $th) {
            return back()->toast('This notification comes from the server side =) ' . $th->getMessage(), 'error');
        }
    }
}
