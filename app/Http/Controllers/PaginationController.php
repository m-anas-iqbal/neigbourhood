<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PaginationController extends Controller
{

  public function index(){
    $data = DB::table('comments')->paginate(5);
    return view('frontend/pagination', compact('data'));
  }
        
  public function fetch_data(Request $request){
      if($request->ajax()){
        $data = DB::table('comments')->paginate(5);
        return view('frontend/pagination_data', ['data'=>$data, 'q_id'=>$request->id])->render();
      }
  }




  function index2()
  {
   $data = DB::table('posts')->paginate(5);
   return view('pagination', compact('data'));
  }

  function fetch_data2(Request $request)
  {
   if($request->ajax())
   {
    $data = DB::table('posts')->paginate(5);
    return view('pagination_data', compact('data'))->render();
   }
  }





}

