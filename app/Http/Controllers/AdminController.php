<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Str;
use DB;
use PDF;
use Response;


class AdminController extends Controller
{
    public function login_post(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:admin,email',
            'password' => 'required|min:2'
        ], [
            'email.exists' => 'This Email is not Exists! Try again..'
        ]);

        $mail = $request->email;
        $remember = false;
        if($request->remmenber !=""){ $remember = true ; }
        $creds = $request->only('email', 'password');
        $creds['status']=1;
        if (Auth::guard('admin')->attempt($creds,$remember)) {
                 $msg = 'Logged In';
                 $alert = 'success';
                 Session::flash('msg', $msg);
                 Session::flash('alert', $alert);
           return redirect('/admin/dashboard');

        }else{
                $msg = 'Invalid Password!';
                $alert = 'error';
                Session::flash('msg', $msg);
                Session::flash('alert', $alert);
                return redirect('/admin');
        }

    }
    public function logout()
    {
        $id = Auth::guard('admin')->user()->id;
        if ($id !="") {
            DB::table('admin')->where('id', $id);
            Auth::guard('admin')->logout();
        }
        $msg = 'Logout Successfully';
                  $alert = 'success';
                  Session::flash('msg', $msg);
                  Session::flash('alert', $alert);
        return redirect('/admin');
    }

    public function comment_s(Request $request)
    {
        $comments = DB::table('comments as c')->join('question as q','c.q_id','q.q_id')->join('users as u', 'c.u_id', 'u.id')->select('c.*','q.question as question','u.name as username');

         if($request->date != '')
        {
            if($request->date_to == ''){ $request->date_to = date("d-m-Y") ;}
            $comments->whereBetween(DB::raw('DATE_FORMAT(c.created_at, "%Y-%m-%d")'), [date("Y-m-d" , strtotime($request->date)), date("Y-m-d" , strtotime($request->date_to))]);
        }
        $comments = $comments->orderby('c.created_at', 'DESC')->get();
      return view('admin.question.answer',['comments'=>$comments,'date'=>$request->date,'date_to'=>$request->date_to]);
    }
    // question
    public function addquestion_post(Request $request)
    {
        $request->validate([
            'question'     => 'required',
            'opt1'      => 'required',
            'opt2'      => 'required',
            'status'      => 'required',
           'order_no' => 'required'
       ]);
       $question =[
            'question'     => $request->question,
            'opt1'      => $request->opt1,
            'opt2'      => $request->opt2,
            'opt3'      => $request->opt3,
            'opt4'      => $request->opt4,
            'status'      => $request->status,
           'listing_order' => $request->order_no
       ];
       $question_bool =  DB::table('question')->insert($question);
       if($question_bool){
        $msg = 'Added Successfully.';
        $alert = 'success';
       }else{
        $msg = 'Some thing went wrong.';
        $alert = 'error';
       }

        Session::flash('msg', $msg);
        Session::flash('alert', $alert);
       return redirect('/admin/addquestion');
    }
    public function editquestion_post(Request $request)
    {
        $request->validate([
            'question'     => 'required',
            'opt1'      => 'required',
            'opt2'      => 'required',
            'status'      => 'required',
           'order_no' => 'required'
       ]);
       $id = $request->id;
       $question =[
            'question'     => $request->question,
            'opt1'      => $request->opt1,
            'opt2'      => $request->opt2,
            'opt3'      => $request->opt3,
            'opt4'      => $request->opt4,
            'status'      => $request->status,
           'listing_order' => $request->order_no,
           'updated_at' => date("Y-m-d h:i")
       ];
       $question_bool =  DB::table('question')->where("q_id",$id)->update($question);
       if($question_bool){
        $msg = 'Updated Successfully.';
        $alert = 'success';
       }else{
        $msg = 'Some thing went wrong.';
        $alert = 'error';
       }

        Session::flash('msg', $msg);
        Session::flash('alert', $alert);
       return redirect('/admin/question');
    }
    public function delquestion_post(Request $request)
    {
        $id = $request->id;
        $question_bool =  DB::table('question')->where("q_id",$id)->delete();
       if($question_bool){
        DB::table('answer')->where("q_id",$id)->delete();
        DB::table('comments')->where("q_id",$id)->delete();
        $msg = 'Updated Successfully.';
        $alert = 'success';
       }else{
        $msg = 'Some thing went wrong.';
        $alert = 'error';
       }

        Session::flash('msg', $msg);
        Session::flash('alert', $alert);
        echo true;
    //    return redirect('/admin/addquestion');
    }
    public function delcomment(Request $request)
    {
        $id = $request->id;
        $question_bool =  DB::table('comments')->where("c_id",$id)->delete();
       if($question_bool){
        $msg = 'Your comment was deleted.';
        $alert = 'success';
       }else{
        $msg = 'Some thing went wrong.';
        $alert = 'error';
       }

        Session::flash('msg', $msg);
        Session::flash('alert', $alert);
        echo true;
    //    return redirect('/admin/comment');
    }

    public function delcontact(Request $request)
    {
        $id = $request->id;
        $question_bool =  DB::table('contactus')->where("id",$id)->delete();
       if($question_bool){
        $msg = 'Updated Successfully.';
        $alert = 'success';
       }else{
        $msg = 'Some thing went wrong.';
        $alert = 'error';
       }

        Session::flash('msg', $msg);
        Session::flash('alert', $alert);
        echo true;
    //    return redirect('/admin/comment');
    }

        public function profile_post(Request $request){


            $request->validate([
                    'password' => 'required|same:cpassword|min:6',
                ], [
                   'password.same'=> "Password and confirm password must be same",
                    'password.min' => 'Must be 6 character',
                ]);



        if ($request->method() == 'POST') {
            $data =[
                'password'     => Hash::make($request->password),
               'updated_at' => date("Y-m-d h:i")
           ];
           $data_bool =  DB::table('admin')->where("id",1)->update($data);
           if($data_bool){
            $msg = 'Your password has been updated Successfully.';
            $alert = 'success';
           }else{
            $msg = 'Some thing went wrong.';
            $alert = 'error';
           }

            Session::flash('msg', $msg);
            Session::flash('alert', $alert);
           return redirect('/admin/dashboard');
        }
    }
}
