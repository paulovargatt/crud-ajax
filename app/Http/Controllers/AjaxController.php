<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function index(){

        return view('ajax.index');
    }

    public function readData(){
       $users = User::all();

        return response($users);
    }
}
