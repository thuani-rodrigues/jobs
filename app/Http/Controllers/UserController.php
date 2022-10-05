<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View as FacadesView;

class UserController extends Controller
{

    public function index(): View
    {
        $users = User::all();

        return view('users.index', [
            'users' => $users,
        ]);
    }


    public function create():View
    {
        return view('users.create');
    }

    
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => ['required', 'confirmed'],
        ]);

        User::create($data);

        return redirect()->route('users.index');
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit( User $user)
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }

   
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => ['confirmed']
            
        ]);
         
        $user->fill($data);
        $user->save;

        return redirect()->route('users.index');
    }

    
    public function destroy( User $user ): RedirectResponse
    {
        $user->delete();

        return redirect()->route('users.index');
    }
}
