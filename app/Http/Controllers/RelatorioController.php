<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Abastecimento;

class RelatorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loggedUser = Auth::user();
        $abastecimentos = new Abastecimento();
        if($loggedUser->hasPermissionTo('admin')){
            $abastecimentos = $abastecimentos;
        }else{
            $abastecimentos = $abastecimentos->where('id_usuario',$loggedUser->id);
        }

        $gastoTotal = array_sum($abastecimentos->pluck('valor')->toArray());
        $quantidadeTotal = array_sum($abastecimentos->pluck('qtd_litros')->toArray());

        if($quantidadeTotal < 1){
            $valorMedio = $gastoTotal;
        }else{
            $valorMedio = $gastoTotal/$quantidadeTotal;
        }

        $valorMedio = number_format($valorMedio, 2, '.', ',');
        $gastoTotal = number_format($gastoTotal, 2, '.', ',');
        $quantidadeTotal = number_format($quantidadeTotal, 2, '.', ',');
        
        $relatorio = $abastecimentos->paginate(8);

        return view('relatorio', compact('relatorio','gastoTotal','quantidadeTotal','valorMedio'));
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
        //
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
}
