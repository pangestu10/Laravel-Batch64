<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showregister()
    {
        return view('auth.register');
    }

    public function registeruser(Request $request)
    {
        $request->validate([
            'name'=>'required|min:5',
            'email'=>'required|email',
            'password'=>'required|confirmed|min:8',
        ]);

        $userCount=User::count();

        $user=new User;
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->password=Hash::make($request->input('password'));
        $user->role=$userCount === 0 ?'admin':'user';

        $user->save();

        return redirect('/welcome')->with('success','Registrasi Berhasil');
    }

    public function showlogin()
    {
        return view('auth.login');
    }

        public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        // Debug: Cek apakah user dengan email tersebut ada
        $user = User::where('email', $request->email)->first();
        
        if (!$user) {
            // Debug: User tidak ditemukan
            return back()->withErrors([
                'email' => 'User not found with this email.',
            ])->onlyInput('email');
        }
        
        // Debug: Cek apakah password cocok
        if (!Hash::check($request->password, $user->password)) {
            // Debug: Password tidak cocok
            return back()->withErrors([
                'email' => 'Password does not match.',
            ])->onlyInput('email');
        }
        
        // Jika sampai di sini, berarti user dan password cocok
        Auth::login($user);
        $request->session()->regenerate();
        
        return redirect()->intended('/')->with('success','Login Berhasil');
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/')->with('success','Logout Berhasil');
    }

    public function getprofile()
    {
        $userAuth=Auth::User()->profile;

        $userId=Auth::id();

        $profileData=profile::where('users_id', $userId)->first();

        if($userAuth)
        {
            return view('profile.edit', ['profile'=>$profileData]);
        } else{
            
            return view('profile.create');

        }
    }

    public function create(Request $request)
    {
        $request->validate([
            'age'=>'required|numeric',
            'address'=>'required|min:5',
            
        ]);

        $userId=Auth::id();

        $profile=new profile;
        $profile->age=$request->input('age');
        $profile->address=$request->input('address');
        $profile->users_id=$userId;

        $profile->save();

        return redirect('/profile');
    }

    public function updateprofile(Request $request, $id)
    {
        $request->validate([
            'age'=>'required|numeric',
            'address'=>'required|min:5',
            
        ]);

        $profile=profile::find($id);
        $profile->age=$request->input('age');
        $profile->address=$request->input('address');

        $profile->save();

        return redirect('/profile')->with('success','Berhasil Update Profile');
    }
}
