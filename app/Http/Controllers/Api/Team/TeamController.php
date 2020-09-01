<?php

namespace App\Http\Controllers\Api\Team;

use App\Games;
use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;
use App\Team;
use App\Player;
use App\User;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();

        return response()->json(['data' => $teams], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:teams',
            'about' => 'required',
            'game_category_id' => 'required',

        ];

        $this->validate($request, $rules);

       $user = $this->authUser();

       $team = Team::create([
           'name' => $request->name,
           'about' => $request->about,
           'user_id' => $user->id,
           'game_category_id' => $request->game_category_id
       ]);

        return $team;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function self()
    {
//        $user = auth()->user()->name;

       $user = $this->authUser();

        return $user->teams;

    }

// query za timove promjeniti kada se ubaci api za biranje timova prijavljenog kosinika -> $team_id..
    public function addPlayer(Request $request)
    {

        $user = $this->authUser();

        $player = Player::create([
            'player_id' => $request->player_id,
            'team_id' => $request->team_id,
        ]);


        return response()->json(['data' => 'Poziv za ulazak u tim je poslan.'], 200);
    }
}
