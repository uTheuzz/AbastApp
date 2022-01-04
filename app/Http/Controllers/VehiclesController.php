<?php

namespace App\Http\Controllers;

use App\Models\Vehicles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loggedUser = Auth::user();
        $admin = false;
        if($admin){
            $cars = Vehicles::paginate(10);
        }else{
            $user = User::where('id',$loggedUser->id)->first();  
            $cars = $user->relVehicles()->paginate(10);
        }
        return view('veiculos', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('novoveiculo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Vehicles::create([
            'nome' => $request->name,
            'placa' => $request->placa,
            'user' => Auth::user()->id
        ]);

        return redirect('veiculos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicles  $vehicles
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicles $vehicles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicles  $vehicles
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Vehicles::find($id);
        $users = User::All();

        return view('editveiculo',compact('car','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicles  $vehicles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        Vehicles::where('id',$id)->update([
            'nome' => $request->name,
            'placa' => $request->placa,
            'user' => $request->id_user
        ]);

        return redirect('veiculos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicles  $vehicles
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = Vehicles::destroy($id);
            return($del)?"sim":"não";
    }
}
