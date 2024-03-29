<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Str;
use DB;
use PDF;
use Mail;
use Response;


class HomeController extends Controller
{


      public function dashboard()
    {
       return view('frontend.index');
    }

    public function login_post(Request $request)
    {
//         print($request->remmenber);
// print_r($request->all());
//         die();
        $request->validate([
            'email' => 'required|exists:users,email',
            // 'password' => 'required|min:8'
        ], [
            'email.exists' => 'This user does not Exist.'
        ]);
        $remember = false;
if($request->remmenber !=""){ $remember = true ; }
        $mail = $request->email;

        $creds = $request->only('email', 'password');
        $creds['status']=1;
        if (Auth::guard('users')->attempt($creds,$remember)) {
           return redirect('/dashboard');
        }else{
                $msg = 'Invalid Password!';
                $alert = 'error';
                Session::flash('msg', $msg);
                Session::flash('alert', $alert);
                return redirect('/');
        }

    }
//getLocationVotes
public function getLocationVotes(Request $request){
    //echo 'getLocationVotes';
    //echo '<pre>';
    //print_r($request->all());
    $u_id = Auth::guard('users')->user()->id;
    $ids = $request->ids;
    $ids_arr = explode('_',$ids);
    $q_id = $ids_arr[0];
    $vote_no = $ids_arr[1];
    //$area_name = Session::get('area_name');
    $area_name = $request->area_name;
    $status = false;
    //Case - 1:New User and not vote for any question
    $chkVote = DB::table('answer')->where(['u_id'=>$u_id,'q_id'=>$q_id, 'area_name'=>$area_name])->get();
    if($chkVote->count() > 0){
        //Update previous vote number $chkVote
        $ans_id = $chkVote->first()->ans_id;
        DB::table('answer')->where(['ans_id'=>$ans_id])->update([ 'opt'=>$vote_no, 'updated_at'=>date('Y-m-d h:i:s')]);
    }else{
        //Add new answer of vote on that question
        DB::table('answer')->insert(['u_id'=>$u_id, 'q_id'=>$q_id, 'opt'=>$vote_no, 'area_name'=>$area_name, 'created_at'=>date('Y-m-d h:i:s')]);
        $status = true;
    }
    //gte count of question and vote no.
    $totalVotes = DB::table('answer')->where(['q_id'=>$q_id, 'opt'=>$vote_no])->count();
    echo json_encode(['status'=>$status, 'q_id'=>$q_id, 'vote_no'=>$vote_no, 'area_name'=>$area_name, 'u_id'=>$u_id, 't_votes'=>$totalVotes]);
}
//getVoteCountPercentage
public function getVoteCountPercentage(Request $request){
        //echo '<pre>';
        //print_r($request->all());
        /*
        <pre>Array
        (
            [question_id] => 8
            [voteno] => 1
            [_token] => YkkD8Q8DrnqJEgmuj8TEQiFVIEndMVbi7gyPRJvc
        )
        */
        $u_id = Auth::guard('users')->user()->id;
        $question_id = $request->question_id;
        $voteno = $request->voteno;
        $area_name = $request->area_name;
        $totalQuesVotes = DB::table('answer')->where(['q_id'=>$question_id,'area_name'=>$area_name])->count();
        $totalVotes = DB::table('answer')->where(['q_id'=>$question_id, 'opt'=>$voteno,'area_name'=>$area_name])->count();
        $per = 0;
        if($totalQuesVotes > 0){
            $per = ($totalVotes/$totalQuesVotes)*100;
        }
        echo json_encode(['q_id'=>$question_id, 'vote_no'=>$voteno,'u_id'=>$u_id, 't_votes'=>$totalVotes, 'per'=>$per]);
}//getVoteCountPercentage

//uncheckVote
public function uncheckVote(Request $request){
    //echo '<pre>'; 
    //print_r($request->all());
    $u_id = Auth::guard('users')->user()->id;
    $ids = $request->ids;
    $ids_arr = explode('_',$ids);
    $q_id = $ids_arr[0];
    $vote_no = $ids_arr[1];
    //$area_name = Session::get('area_name');
    $area_name = $request->area_name;
    $status = false;
    $chkVote = DB::table('answer')->where(['u_id'=>$u_id,'q_id'=>$q_id, 'area_name'=>$area_name])->get();
    if($chkVote->count() > 0){
        $ans_id = $chkVote->first()->ans_id;
        DB::table('answer')->where(['ans_id'=>$ans_id])->delete();
        $status = true;
    }
    echo json_encode(['status'=>$status, 'q_id'=>$q_id, 'vote_no'=>$vote_no, 'area_name'=>$area_name, 'u_id'=>$u_id]);
}



    // comment_post
    public function comment_post(Request $request){

        $u_id = Auth::guard('users')->user()->id;
        $request->validate([
             'comment'     => 'required',
            'area_name'      => 'required'
        ]);

if ($request->method() == 'POST') {

    $email =$request->email;
$contact = [
    'comment' =>$request->comment,
    'area_name' =>$request->area_name,
    'u_id' => $u_id,
    'q_id' => $request->q_id,
    'created_at' =>date("Y-m-d h:i")
];
DB::table('comments')->insert($contact);
Session::put('area_name', $request->area_name);
Session::put('current_q_id', $request->q_id);
   return redirect('/dashboard');
}
    }

    public function ajax_search_area(Request $request){

    Session::put('area_name', $request->search_area);
    return "successfully".$request->search_area;
    }
    
        public function setUserDefaultLocation(Request $request)
        {
            //echo '<pre>';
            //print_r($request->all());
            /*
            <pre>Array
            (
                [address] => 601 - Wind Song Palace، Shaheed Milat Service Road, Jinnah Housing Society PECHS, Karachi, Karachi City, Sindh, Pakistan
                [_token] => utf7ITgVVh3FrWq6oQNBwVXtsNzxIk59BgXx3ZJa
            )
            */
            $address = $request->input('address');
            Session::put('area_name',$address);
            // Perform any desired operations with the address
            
            // Return a response
            //return response()->json(['message' => 'Address received successfully']);
            echo json_encode([ 'status'=>true, 'address'=>$address ]);
        }

    public function search_area(Request $request){
        // print_r($request->all());
        // die();
        $request->validate(
            ['search_area'      => 'required']
        ,['search_area.required'=> "you have search a place"]
    );
if ($request->method() == 'POST') {
    // session(['area_name' => $request->area_name]);
    Session::put('area_name', $request->search_area);
// Session::set('area_name', $request->area_name);
   return redirect('/dashboard');
}
    }
        // answer_post
        public function answer_post(Request $request){

            // print_r($request->all());
            $u_id = Auth::guard('users')->user()->id;
            // echo $u_id;
            // die();
            $request->validate([
                 'comment'     => 'required',
                'area_name'      => 'required'
            ]);

    if ($request->method() == 'POST') {

        $email =$request->email;
    $contact = [
        'comment' =>$request->comment,
        'area_name' =>mysql_real_escape_string($request->area_name),
        'u_id' => $u_id,
        'q_id' => $request->q_id,
        'created_at' =>date("Y-m-d h:i")
    ];
    DB::table('comments')->insert($contact);
    // $msg = 'Thank you For Your Message';
    //                   $alert = 'success';
    //                   Session::flash('msg', $msg);
    //                   Session::flash('alert', $alert);

       return redirect('/dashboard');
    }
        }
    public function logout()
    {
        $id = Auth::guard('users')->user()->id;
        if ($id !="") {
            DB::table('users')->where('id', $id);
            Auth::guard('users')->logout();
             Session::forget('area_name'); 
        }
        $msg = 'Logged out successfully';
                  $alert = 'success';
                  Session::flash('msg', $msg);
                  Session::flash('alert', $alert);
        return redirect('/');
    }
// contact us
    public function contact_post(Request $request){

        // print_r($request->all);
        // die();
        $request->validate([
             'email'     => 'required',
            'name'      => 'required',
            'description' => 'required',
        ]);
if ($request->method() == 'POST') {

    $email =$request->email;
$contact = [
    'name' =>$request->name,
    'email' =>$email,
    'description' => $request->description,
    'created_at' =>date("Y-m-d h:i")
];
DB::table('contactus')->insert($contact);
$adminEmail = env('MAIL_FROM_ADDRESS');
    $data = array('name'=>$request->name, 'email'=>$email ,'description' => $request->description,'date'=>date("Y-m-d h:i"));
Mail::send('mail.contact', $data, function($message) use ($adminEmail)  {
    $message->to($adminEmail, 'Your message has been forward. Thanks for your message')->subject
        ('Message from user');
    //$message->from('MapBirdy',env('APP_URL'));
    $message->from(env('MAIL_FROM_ADDRESS'),'MapBirdy');
});
$msg = 'Thank you for your message. We will be in touch shortly!';
                  $alert = 'success';
                  Session::flash('msg', $msg);
                  Session::flash('alert', $alert);

   return redirect('/');
}
    }

    public function registration_post(Request $request){

        $request->validate([
             'email'     => 'required|unique:users,email',
            'name'      => 'required',
            'new_password' => 'min:8|required_with:cnew_password|same:cnew_password',
        ], [
            'new_password.min'=> "Password should be atleast 8 characters.",
            'new_password.same'=> "Passwords must match. Please try again.",
        ]);
$email_verify = Str::random(20);
if ($request->method() == 'POST') {

    $email =$request->email;
$user = [
    'name' =>$request->name,
    'email' =>$email,
    'password' => Hash::make($request->new_password),
    'login_with' =>"form",
    'status' =>0,
    'email_verify'=>$email_verify
];
$id =  DB::table('users')->insertGetId($user);
if($id){
    $data = array('id'=>$id, 'email'=>$email, 'email_verify'=>$email_verify);
Mail::send('mail.user_mail', $data, function($message) use ($email)  {
    $message->to($email, 'Email has Verified on mapbirdy.com')->subject
        ('Email Verification from mapbirdy.com');
    //$message->from('Mapbirdy',env('APP_URL'));
    $message->from(env('MAIL_FROM_ADDRESS'),'Mapbirdy');
});
$msg = 'Thank you for signing up. Please check your email and verify your account.';
                  $alert = 'success';
                  Session::flash('msg', $msg);
                  Session::flash('alert', $alert);
} else {
    $msg = 'Some thing went wrong';
    $alert = 'error';
    Session::flash('msg', $msg);
    Session::flash('alert', $alert);
}
   return redirect('/');
}
    }
//registrationEmailVerification
public function registrationEmailVerification($code=0){
//echo $code;die;
    if($code != '' && $code != 0){
        //echo 'come';die;
            //get new registration request data
            $userExist = DB::table('users')->where('email_verify',$code)->get();
            if($userExist->count() > 0){
                //echo 'user present';die;
                $user = $userExist->first();
                    DB::table('users')->where('email_verify',$code)->update(['status'=>1]);
                   
                  //$msg = " Your Registration Email has Verified. Welcome to Dashboard" ;
                  //$alert = 'success';
                  //Session::flash('msg', $msg);
                  //Session::flash('alert', $alert);
                  
                  
                
                 $email = $user->email;
                 $user = User::where('email', '=', $email)->first();
                 if($user){
                    Auth::guard('users')->login($user);
                    return redirect('/dashboard');
                }
            
                
            }else{
                $msg = 'Some thing went wrong';
                $alert = 'error';
                Session::flash('msg', $msg);
                Session::flash('alert', $alert);
              return redirect('/');
            }
    }else {
        $msg = 'Some thing went wrong';
        $alert = 'error';
        Session::flash('msg', $msg);
        Session::flash('alert', $alert);
      return redirect('/');
    }
}

   public function forgotPasswordProcess(Request $request){

    $request->validate([
        'email' => 'required|exists:users,email'
    ], [
        'email.exists' => 'This user does not Exist.'
    ]);

        $email = $request->email;
        $emailExist = DB::table('users')->where('email', $email)->get();
        if($emailExist->count() > 0){
            $pemail =  $emailExist->first();

            $email_verify_code = Str::random(20);
            $id = $pemail->id;
            $email= $pemail->email;

            $this->sendFPEmail($id, $email, $email_verify_code);
            $msg = 'Please check your email and set a new password.';
            $alert = 'success';
                  Session::flash('msg', $msg);
                  Session::flash('alert', $alert);
        }else{
            $msg = 'Email Not Exist!';
            $alert = 'error';
            Session::flash('msg', $msg);
            Session::flash('alert', $alert);
        }
        return redirect('/');
    }

    //newPasswordProcess
    public function newPasswordProcess(Request $request){
        $new_password = $request->new_password;
        $cnew_password = $request->cnew_password;
        $np_code = $request->np_code;

        $request->validate([
            'new_password' => 'min:8|required_with:cnew_password|same:cnew_password',
        ],[
            'new_password.same'=> "Passwords must match. Please try again.",
            'new_password.min' => 'Password should be atleast 8 characters.'
        ]);
        $npExist = DB::table('users')->where('email_fp_code',$np_code)->get();
        if($npExist->count() > 0){
            $id = $npExist->first()->id;
            $new_password = Hash::make($new_password);
            DB::table('users')->where('id', $id)->update(['password'=>$new_password]);
            $msg = 'Your password has been successfully changed. Please log in to continue.';
            $alert = 'success';
        }else{
            $msg = 'Not updated';
            $alert = 'error';
        }
        Session::flash('msg', $msg);
        Session::flash('alert', $alert);
        return redirect('/');
    }

    //sendFPEmail
    public function sendFPEmail($id, $email, $email_verify_code){

        $data = array('id'=>$id, 'email'=>$email, 'email_verify'=>$email_verify_code);
        Mail::send('mail.mail_forgot_password', $data, function($message) use ($email)  {
            $message->to($email, 'Forgot Password FROM mapbirdy.com')->subject
                ('Forgot Password from mapbirdy.com');
            //$message->from(env('MAIL_FROM_ADDRESS'),env('APP_URL'));
            $message->from(env('MAIL_FROM_ADDRESS'), 'Mapbirdy');
            
        });
        DB::table('users')->where('id',$id)->update(['email_fp_code'=>$email_verify_code]);

    }//sendFPEmail
    public function profile_post(Request $request){
if ($request->password !="") {
        $request->validate([
                'password' => 'required|min:8|same:cpassword',
            ], [
                 'password.min' => 'Password should be atleast 8 characters.',
               'password.same'=> "Passwords must match. Please try again.",

            ]);
}
$name = Auth::guard('users')->user()->name;
if ($request->name != $name ) {
    Auth::guard('users')->user()->name = $request->name;
}
$request->validate([
    'name' => 'required',
]);

    if ($request->method() == 'POST') {
        $data =[
            'name'     => $request->name,
           'updated_at' => date("Y-m-d h:i")
       ];
       if ($request->password !="") {
       $data['password'] =Hash::make($request->password);
       }
       $data_bool =  DB::table('users')->where("id",$request->id)->update($data);
       if($data_bool){
        $msg = 'Your Profile has been updated.';
        $alert = 'success';
       }else{
        $msg = 'Some thing went wrong.';
        $alert = 'error';
       }

        Session::flash('msg', $msg);
        Session::flash('alert', $alert);
       return redirect('/dashboard');
    }
}


}
