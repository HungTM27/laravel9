<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RequestLoginForm;
use Auth;
use App\Models\User;
class LoginController extends Controller
{
    public function index(){
        return view('admin.auth.login');
    }
    public function login (request  $request){
        $this->validate($request,[
            'username'=>'required',
            'password'=>'required'
        ]);
        $username = $request->input('username');
        $password = $request->input('password');
        if(Auth::attempt(['email' => $username, 'password' => $password])){
            $use = User::where('email', $username)->first();
            // nếu mà đúng tài khoản xác thực thì thực hiện login và đăng nhập còn nếu sai thì sẽ false
                Auth::login($use);
                return redirect()->route('dashboard');
        }
        return redirect('login')->with('erorr','Tên tài khoản MK không chính xác');
    }
    public function store(){
        return view('admin.auth.register');
    }
    public function create(RequestLoginForm $request){
       $register = new User();
       $register->username = $request->input('username');
       $register->email = $request->input('email');
       $register->role = 2;
       $register->password =bcrypt($request->password);
        $register->save();
        return redirect('login');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('welcome');
    }
}