<?php

namespace App\Http\Controllers;

use App\Player;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\View;
use App\Http\Requests\PlayerRequest;

class PlayersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>'index']);
    }

    public function index()
    {
        $players= \App\Player::orderBy("last_name")->paginate(10);;
        return View::make('players',['players'=>$players]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams=\App\Team::orderBy("country_id")->orderBy("team_name")->get();
        $newTeamsArray=array();
        $countryId=0;
        foreach($teams as $team){
            if($countryId!=$team->country_id){
                $newTeamsArray[$team->country->country_name]=array();
                $newTeamsArray[$team->country->country_name][$team->id]=$team->team_name;
                $countryId=$team->country_id;
            }else{
                $newTeamsArray[$team->country->country_name][$team->id]=$team->team_name;
            }

        }
        $teams=\App\Team::orderBy("country_id")->orderBy("team_name")->lists('team_name','id','country_id');

        return View::make('playercreate',['teams'=>$newTeamsArray]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlayerRequest $request)
    {
        Player::create($request->all());
        return redirect('player');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {

        dd($player->game);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {

        $teams=\App\Team::orderBy("country_id")->orderBy("team_name")->get();
        $newTeamsArray=array();
        $countryId=0;
        foreach($teams as $team){
            if($countryId!=$team->country_id){
                $newTeamsArray[$team->country->country_name]=array();
                $newTeamsArray[$team->country->country_name][$team->id]=$team->team_name;
                $countryId=$team->country_id;
            }else{
                $newTeamsArray[$team->country->country_name][$team->id]=$team->team_name;
            }

        }
//        $teams=\App\Team::orderBy("country_id")->orderBy("team_name")->lists('team_name','id','country_id');
//        dd($teams);
        return View::make('playeredit',compact('player'),['teams'=>$newTeamsArray]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlayerRequest $request, Player $player)
    {

        $player->update($request->all());
        return redirect('player');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {

        $player->delete();
        return redirect('player');
    }
}
