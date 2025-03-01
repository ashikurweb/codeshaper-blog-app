<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail; 
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register ( RegisterRequest $request )
    {
        $validatedData = $request->validated();
        $user = $this->createUser( $validatedData );
        $this->loginUser( $user );

        return redirect()->route('home')->with('success', 'Account Created Successfully');
    }

    private function loginUser ( $user )
    {
        Auth::login( $user );
    }

    private function createUser ( $validatedData )
    {
        return User::create([
            'name'      => $validatedData['name'],
            'email'     => $validatedData['email'],
            'password'  => Hash::make($validatedData['password']),
        ]);
    }

    public function login ( LoginRequest $request )
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->remember)) {
            return redirect()->route('home')->with('success', 'Login Successfully');
        }
        return back()->withErrors(['failed' => 'The provided credentials do not match our records.',]);
    }

    public function forgot ( Request $request )
    {
        $request->validate(['email' => 'required|email|exists:users,email'],['email.exists' => 'Email not found!']);
        $user = User::where('email', $request->email)->firstOrFail();
        $user->remember_token = Str::random(50);
        $user->save();

        Mail::to($user->email)->send(new ForgotPasswordMail($user));
        return back()->with('success', 'A password reset email has been sent to your email address.');
    }

    public function resetPassword ( $token )
    {
        $user = User::where('remember_token', $token)->firstOrFail();
        return view('auth.reset', compact('token'));
    }


    public function resetPasswordStore ( $token, ResetPasswordRequest $request )
    {
        $user = User::where('remember_token', $token)->firstOrFail();

        $user->update([
            'password' => $request->password,
            'remember_token' => Str::random(50)
        ]);

        return redirect()->route('login')->with('success', 'Password has been successfully reset');
    }

    public function logout ( Request $request )
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('error', 'Logout Successfully');
    }
}