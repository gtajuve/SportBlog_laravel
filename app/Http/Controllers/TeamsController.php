<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use App\Http\Requests\TeamRequest;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
//        $this->middleware('auth',['except'=>'index']);
        $this->middleware('admin',['except'=>'index']);
    }

    public function index()
    {
        $countrys=\App\Country::lists('country_name','id');
        $countryId=Input::get('country_id');
        if($countryId==null){
            $team=\App\Team::orderBy("country_id")->orderBy("team_name");

        }else{
            $team=\App\Team::where("country_id",'=',$countryId)->orderBy("team_name");

        }

        $perPage=Input::get('perPage');

        $teams=$team->paginate($perPage);
        $teams->appends(['perPage'=>$perPage,'country_id'=>$countryId]);
        return View::make('teams',['teams'=>$teams,'countrys'=>$countrys,'perPage'=>$perPage,'countryId'=>$countryId]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $countrys=\App\Country::orderBy("country_name")->get();
//        $newCountryArray=array();
//        foreach($countrys as $country){
//            $newCountryArray[$country->id]=$country->country_name;
//        }
        $countrys=\App\Country::lists('country_name','id');


        return View::make('createteam',['countrys'=>$countrys]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $request)
    {

        Team::create($request->all());
       return redirect('team');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {

        return View::make('singleteam',['team'=>$team]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {

        $countrys=\App\Country::lists('country_name','id');
        return View::make('teamedit',compact('team'),['countrys'=>$countrys]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeamRequest $request, Team $team)
    {

        $team->update($request->all());
        return redirect('team');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();
        return redirect('team');
    }
}
