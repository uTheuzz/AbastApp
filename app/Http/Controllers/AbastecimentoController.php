<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Abastecimento;
use App\Models\Vehicles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;
use App\Models\User;

class AbastecimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loggedUser = Auth::user();

        if($loggedUser->hasPermissionTo('admin')){
            $cars = Vehicles::All();
            $abastecimentos = Abastecimento::paginate(5);
        }else{
            $user = User::where('id',$loggedUser->id)->first();  
            $cars = $user->relVehicles()->get();
            $abastecimentos = Abastecimento::where('id_usuario',$loggedUser->id)->paginate(5);
        }

        return view('dashboard', compact('cars','abastecimentos'));
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
        try {
            $dadosCarro = Abastecimento::where('id_veiculo',$request->carro)->first();

            if(is_null($dadosCarro)){
                $kmAtual = $request->qtd;
            }else{
                $kmAtual = $dadosCarro['km_atual'] + $request->qtd;
            }

            $valor_por_litro = $request->valor/$request->qtd;
            
            $timestamp = Carbon::now();

            Abastecimento::create([
                'id_veiculo' => $request->carro,
                'id_usuario' => Auth::user()->id,
                'dt_abastecimento' => $timestamp,
                'km_atual' => $kmAtual,
                'valor' => $request->valor,
                'qtd_litros' => $request->qtd,
                'valor_por_litro' => $valor_por_litro,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'endereco' => $request->endereco  
            ]);

            return redirect('dashboard');
        }catch(Throwable $e){

            if(is_null($request->valor) || is_null($request->qtd)){
                $error = 'Os campos Quantidade e Valor devem ser preenchidos corretamente.';
            }else{
                $error = $e->errorInfo[2];
            }

            return redirect('dashboard')->with('errors',$error);
        }
        
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Abastecimento  $abastecimento
     * @return \Illuminate\Http\Response
     */
    public function show(Abastecimento $abastecimento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Abastecimento  $abastecimento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $abastecimento = Abastecimento::find($id);
        $loggedUser = Auth::user();
        $admin = false;
        if($admin){
            $cars = Vehicles::All();
        }else{
            $user = User::where('id',$loggedUser->id)->first();  
            $cars = $user->relVehicles()->get();
        }

        return view('editabastecimento', compact('abastecimento', 'cars'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Abastecimento  $abastecimento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dadosCarro = Abastecimento::where('id_veiculo',$request->carro)->first();

        if(is_null($dadosCarro)){
            $kmAtual = $request->qtd;
        }else{
            $kmAtual = $dadosCarro['km_atual'] + $request->qtd;
        }

        $valor_por_litro = $request->valor/$request->qtd;

        Abastecimento::where('id', $id)->update([
            'id_veiculo' => $request->carro,
            'dt_abastecimento' => $request->timestamp,
            'km_atual' => $kmAtual,
            'valor' => $request->valor,
            'qtd_litros' => $request->qtd,
            'valor_por_litro' => $valor_por_litro,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'endereco' => $request->endereco
        ]);

        return redirect('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Abastecimento  $abastecimento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = Abastecimento::destroy($id);
            return($del)?"sim":"não";
    }
}
