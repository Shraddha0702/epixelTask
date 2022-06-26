<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomAuthModel;
use App\Models\CustomAuthModelRole;
//use Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use App\Models\user_auth;
use Session;

class CustomAuthController extends Controller
{
    //
    public function login()
    {
        return view("auth.login");
    }
    public function registration()
    {
        return view("auth.registration");
    }
    public function registerUser(Request $request)
    {
        // return $request;
        $request->validate([
            'fname'=>'required',
            'email'=>'required|email|unique:users',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
            'mobile'=>'required|digits:10'
        ]);

        $CustomAuthModel=new user_auth();
        $CustomAuthModel->fname=$request->fname;
        $CustomAuthModel->lname=$request->lname;
        $CustomAuthModel->password=Hash::make($request->password);
        $CustomAuthModel->email=$request->email;
        $CustomAuthModel->phone=$request->mobile;

        $res=$CustomAuthModel->save();

              return redirect()->route('productList');
    }
        
    function userid(Request $request)
    {

        $CustomAuthModel=new CustomAuthModel();
        $a=$request->a;
        
        $id = $CustomAuthModel::where('email', $request->email)->value('user_id');
       
    }

    public function loginUser(Request $request)
    {
       
        $request->validate([
            
            'email'=>'required|email',
            'password'=>'required|min:5|max:12'
        ]);
        $CustomAuthModel=user_auth::where('email',"=",$request->email)->first();
        if($CustomAuthModel)
        {
            if(Hash::check($request->password,$CustomAuthModel->password))
            {
                $request->session()->put('loginId',$CustomAuthModel->userid);
                $name=DB::table('users')->select('fname')->where('email',$request->email)->value('name');
                session(['name'=>$name]);
                return redirect('dashboard');
            }
            else
            {
                return back()->with('fail','Password is not matching');
            }
        }
        else
        {
            return back()->with('fail','This email is not registered');
        }
        
    }

    public function dashboard()
    {
        return redirect()->route('productList');
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('productList');
    }

}
