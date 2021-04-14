<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   

    public function index()
    {
        $users = User::get();        
        return view('users.index', compact('users'));

    }
    
    public function show($id){
        $user = User::where('id',$id)->first();        
        return view('users.show',compact('user'));
    }
    
    public function create(){
        return view('users.create');
    }
    public function store(Request $request, User $user)
    { 
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/users');
    }


}