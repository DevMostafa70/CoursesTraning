<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
     public function asd1(){
        return view('welcome');
     }

      public function age1(){
        return "welcome your age is 35";
     }

      // 15------------------
      public function get_login(){
        return  view('loginpages.login');
     }
 // 18----------------------------

}
