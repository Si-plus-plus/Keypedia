<?php

namespace App\Http\Controllers;

use App\Models\KeyboardCategory;
use App\Models\User;
use App\Rules\MatchPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showRegisterForm() {
        return view('user.register');
    }

    public function register(Request $request) {
        $this->validate($request, [
            'username' => [ 'required', 'string', 'min:5' ],
            'email' => [ 'required', 'string', 'email', 'unique:users,email' ],
            'password' => [ 'required', 'string', 'confirmed', 'min:8' ],
            'address' => [ 'required', 'string', 'min:10' ],
            'gender' => [ 'required' ],
            'dob' => [ 'required' ],
        ]);

        $user = new User;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->dob = $request->dob;
        $user->is_manager = false;
        $user->save();

        return redirect()->route('user.login');
    }

    public function showPasswordForm() {
        return view('user.account');
    }

    public function change(Request $request) {
        $this->validate($request, [
            'oldPassword' => [ 'required', new MatchPassword ],
            'password' => [ 'required', 'string', 'confirmed', 'min:8' ],
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('status', 'Password changed successfully');
    }

    public function showLoginForm() {
        return view('user.login');
    }

    public function login(Request $request) {
        $result = Auth::attempt(
            $request->only('email', 'password'),
            $request->input('remember') === 'on',
        );

        if ($result === false) {
            return redirect()->route('login')->withErrors([
                'message1' => 'Invalid Credentials',
            ]);
        }


        if ($request->remember === 'on') {
            Cookie::queue('rememberedEmail', $request->email, 7 * 24 * 60);
        }

        return redirect()->route('home');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('user.login');
    }
}
