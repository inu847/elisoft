<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function todoLogin()
    {
        // dd(\Auth::guard('user')->check());
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = $request->all();
        unset($user['_token']);

        if(\Auth::guard('user')->attempt($user)){
            $user = \Auth::guard('user')->user();
            $user->status_account = 'online';
            $user->save();
            
            return redirect()->route('dasboard');
        }else{
            return redirect()->back()->with('status', 'password atau username salah!!');
        }
    }

    public function todoRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'email' => 'required',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);

        $new_user = new User;
        $new_user->username = $request->get('username');
        $new_user->email = $request->get('email');
        $new_user->password = \Hash::make($request->get('password'));
        $new_user->status = 'ACTIVE';
        $new_user->save();

        return redirect()->route('auth.todoLogin')->with('status', 'Registrasi Success!!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('dashboard.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->username = $request->get('username');
        $user->email = $request->get('email');
        $user->status = $request->get('status');
        $user->status_account = $request->get('status_account');
        if ($request->get('password')) {
            $user->password = \Hash::make($request->get('password'));
        }
        $user->save();

        return redirect()->route('dasboard')->with('status', 'Update Data Success!!');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        if($user->status_account != 'online'){
            $user->delete();
            return redirect()->route('dasboard')->with('statusdel', 'Delete Data Success!!');
        }else{
            return redirect()->route('dasboard')->with('statusdel', 'Account is Online Delete Data Failed!!');
        }
    }

    public function logout()
    {
        $user = \Auth::guard('user')->user();
        $user->status_account = 'offline';
        $user->save();

        $user_logout = \Auth::guard('user');
        $user_logout->logout();

        return redirect()->route('auth.todoLogin');
    }
}
