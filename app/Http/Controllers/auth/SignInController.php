<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignInController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageConfigs = ['myLayout' => 'blank'];
        return view('content.authentications.auth-login-basic', ['pageConfigs' => $pageConfigs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->session()->flush();

        // Retrieve credentials from the request
        $credentials = $request->only('email', 'password');

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            // Authentication passed, store user information in session
            $user = Auth::user(); // Retrieve authenticated user
            $request->session()->put('user', $user); // Store user in session
            $role = Role::find($user->role_id); // Retrieve role of the user
            $request->session()->put('role', $role); // Store role in session

            if($user->role_id == 3){
                return redirect()->route('order.create');
            }

            // Redirect to the intended destination (e.g., dashboard)
            return redirect()->intended('/admin/dashboard');
        } else {
            // Authentication failed, redirect back to login page with error message
            return redirect()->route('sign-in.index')->with('error', 'Invalid credentials');
        }
    }
    
    public function signOut(){
        Auth::logout();

        return redirect()->route('sign-in.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
