<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

use Illuminate\Support\Facades\Hash; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\Modules\User\Model\User;

class UserController extends BaseController
{   
  /**
 
  * Display a listing of the resource.

  *

  * @return \Illuminate\Http\Response

  */
 
  public function authenticate(Request $request)
 
  {

    $this->validate($request, [

      'username' => 'required',

      'password' => 'required'

    ]);

    $user = User::where('username', $request->input('username'))->first();

  if(Hash::check($request->input('password'), $user->password)){
      $apikey = base64_encode(str_random(40));

      User::where('username', $request->input('username'))->update(['api_token' => "$apikey"]);;

      return response()->json(['status' => 'success','api_token' => $apikey]);

    }else{

        return response()->json(['status' => 'fail'],401);

    }

  }

  public function getUsers(Request $request) {

    $user = DB::table('users')->get();
    return $user;

  }




}
