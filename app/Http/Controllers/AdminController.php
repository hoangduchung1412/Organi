<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Account;
class AdminController extends Controller
{
    //
    public function register() {
        return view('admin.register');
    }
    public function check_register() {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);
        $data = request()->all('name', 'email');
        $data['password'] = bcrypt(request('password'));
        User::create($data);
        return redirect()->route('admin.login');
    }
    public function login() {
        return view('admin.login');
    }
    public function check_login() {
        request()->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ]);
        $data = request()->only('email', 'password');
        if(Auth::attempt($data)) {
            $user = Auth::user();
            session(['name' => $user->name]);
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back();
        }
    }
    public function logout() {
        Auth::logout();
        session()->flush();
        return redirect()->route('admin.login');
    }
    public function dashboard() {
        $product_count= Product::count();
        $account_count= Account::count();
        return view('admin.dashboard', compact('product_count', 'account_count'));
    }
    public function file() {
        return view('admin.file');
    }
}
