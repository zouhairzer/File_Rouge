<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function Dashboard()
    {
        return view('admin.Dashboard');
    }


//////////////////////////////////  Register  ////////////////////////////////////


    public function register(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'cpassword' => 'required',
        ]);

        $createAccount = new User();

        $createAccount->name = $request->nom;
        $createAccount->email = $request->email;

        $password = trim($request->password);
        $cpassword = trim($request->cpassword);

        $createAccount->password = $password;
        $createAccount->cpassword = Hash::make($cpassword);

        if($cpassword !== $password)
        {
            return redirect()->back()->withErrors(['cpassword' => 'The password and Confirm password must be the same']);
        }
        else{
            $_SESSION['nom'] = $createAccount->name;
            $_SESSION['email'] = $createAccount->email;
            $createAccount->save();
            return redirect()->back();
        }
    }

/////////////////////////// Afficher la page de login ////////////////////////////////
    

    public function AfficherLogin()
    {
        return view('/login');
    }


//////////////////////////////////////// login //////////////////////////////////////

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if($user && Hash::check($request->password, $user->password))
        {
            $_SESSION['nom'] = $user->name;
            $_SESSION['email'] = $user->email;
            return redirect('/');
        }
        else{
            return redirect()->back();
        }
        
    }
//////////////////////////////////////// logout //////////////////////////////////////

    public function logout()
    {
        session::flush();
        Auth::logout(); 
        return redirect('/');
    }
}
