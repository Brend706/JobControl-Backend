<?php

namespace App\Http\Controllers;
use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $shifts = Shift::where('user_id', $id)->get();
        //$shifts = Shift::all();
        return $shifts;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //CREA UN TURNO...
        $shift = new Shift();
        $shift->date = $request->date;
        $shift->start_time = $request->start_time;
        $shift->end_time = $request->end_time;
        $shift->user_id = $request->user_id;
        $shift->save();
        return ["Message" => "Shift Created!"];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Muestra el truno con ese ID
        $shift = Shift::find($id);
        return $shift;
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
        //Actualiza el turno...
        $shift = Shift::findOrFail($request->id);
        $shift->date = $request->date;
        $shift->start_time = $request->start_time;
        $shift->end_time = $request->end_time;
        $shift->save();
        return $shift;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //BORRA UN TURNO...
        $shift = Shift::destroy($id);
        return $shift;
    }
}
