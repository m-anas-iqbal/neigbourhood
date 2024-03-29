<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Session;
use DB;
use Mail;
use Socialite;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class FacebookController extends Controller
{


    public function fb_login(){
            return Socialite::driver('facebook')->redirect();
    }
	 public function callback(){
		$users=Socialite::driver('facebook')->stateless()->user();
        $email = $users->getemail();
        $name = $users->getName();
          $user = User::where('email', '=', $email)->first();
                 if($user){
                    Auth::guard('users')->login($user, True);
                    return redirect('/dashboard');
                }
                else
                {
                  $password = Str::random(8);
                  $password_hash =   Hash::make($password);
                  $user=['email'=>$email,'login_with'=>'gmail','name'=>$name,'status'=>1,'password'=>$password_hash];
                   $query= DB::table('users')->insert($user);
                   Auth::guard('users')->attempt($user, Ture);
                   $data= array( 'password'=>$password);
                   Mail::send('mail.google_login', $data, function($message) use ($email)  {
                        $message->to($email, 'Email has Verified on MapBirdy')->subject
                            ('Email Verification from mapbirdy.com');
                        $message->from(env('MAIL_FROM_ADDRESS'),env('APP_URL'));
                    });
                    $msg = 'Your account has been created and password has been send for form login!
                    Login Successfully';
                          $alert = 'success';
                          Session::flash('msg', $msg);
                          Session::flash('alert', $alert);
                                  return redirect('/dashboard');

                }
	}

public function privacy_policy(){
    echo 'privacy_policy';
}

public function deletionurl(){
    echo 'deletion url';
}

}//end of class
