<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\ForgotPassword;
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

    public function AfficherRegister()
    {
        return view('/register');
    }


    public function register(Request $request)
    {

        $createAccount = new User();

        $createAccount->name = $request->nom;
        $createAccount->email = $request->email;
        $createAccount->role_id = 2;

        $password = trim($request->password);
        $cpassword = trim($request->cpassword);

        $createAccount->password = $password;
        $createAccount->cpassword = Hash::make($cpassword);

        if($cpassword !== $password)
        {
            return redirect()->back()->with('Errors','The password and Confirm password must be the same');
        }
        else{
            $createAccount->save();
            return redirect('/login');
        }
    }


//////////////////////////////////////// login //////////////////////////////////////

    public function afficherLogin()
    {
        return view('/login');
    }


    public function login(Request $request)
    {

        $user = User::where('email', $request->email)->first();

        if($user && Hash::check($request->password, $user->password))
        {
            Session(['user'=> $user]);
            return redirect('/');
        }
        else{
            return redirect()->back()->with('Error', 'The Account Already Exist');
        }
    }

//////////////////////////////////////// logout ////////////////////////////////////////

    public function logout()
    {
        session::flush();
        return redirect('/');
    }

///////////////////////////////////// Forgot Password //////////////////////////////////////


    public function forgot()
    {
        return view('forgot_password');
    }


    public function forgotPasword(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if(!empty($user))
        {
            $user->remember_token = str::random(49);
            $user->save();
            Mail::to($user->email)->send(new ForgotPassword($user));
            // dd(Mail::to($user->email)->send(new ForgotPassword($user)));
            return redirect()->back()->with('check', 'Check Your Email');
        }
        else{
            return redirect()->back()->with('invalidEmail', 'Invalid Email');
        }

    }

///////////////////////////////////// Reset Password ///////////////////////////////////////

    public function afficheReset($token)
    {
        $user = User::where('remember_token','=',$token)->first();

        if(!empty($user)){

            $data['user'] = $user;

            return view('/reset',$data);

        }
        else{
            abort(404);
        }

    }



    public function ResetPassword($token, Request $request)
    {
        $user = User::where('remember_token','=',$token)->first();

        if(!empty($user))
        {
            if($request->password == $request->cpassword){
                $user->password = Hash::make($request->cpassword);
                $user->remember_token = str::random(49);
                $user->save();

                return redirect('/login');
            }
            else{
                return redirect()->back()->with('Error','Pssword and Confirm Password Incorrect');
            }
        }
    }
}
