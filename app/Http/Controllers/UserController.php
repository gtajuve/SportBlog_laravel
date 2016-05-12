<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    public function index()
    {
        $users=\App\User::all();
        return View::make('user',['users'=>$users]);
    }
    public function create()
    {
        return View::make('register');
    }
    public function store()
    {
        $rules=[
            'username'=>'required|min:3',
            'email'=>'required|email|min:3',
            'password'=>'required|min:3',
        ];
        $data=Input::all();
        $data['reg-time']=time();
        $validator=Validator::make($data,$rules);
        if(User::where('username','=',$data['username'])->exists()){

            return Redirect::to('/user/create')->withErrors(['username'=>'Потребителското име е заето'])->withInput();
        }else{

            if($validator->fails()){
                return Redirect::to('/user/create')->withErrors($validator)->withInput();
            }else{
                $data['password']=bcrypt($data['password']);
                User::create($data);

            }
            return redirect('user');
        }


    }
    public function show(User $user)
    {

        return View::make('usersingle',['user'=>$user]);

    }
    public function edit(User $user)
    {

        $teams=\App\Team::lists('team_name','id');
        $favatitesTeams=$user->team()->lists('id')->toArray();
        $user->setAttribute('teams',$favatitesTeams);

        return View::make('useredit',compact('user','teams'));
    }
    public function update(Request $request,User $user)
    {
        $user->team()->sync($request->input('teams'));
        return redirect('user/'.$user->id);
    }
    public function destroy($id)
    {
    }
    public function isAdmin(){
       if( Auth::user()->permition==1){
           return true;
       }
        return false;
    }
}
