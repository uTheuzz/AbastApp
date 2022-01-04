<x-app-layout>
    <x-slot name="content">
        <div class="py-12">
            <div class="mx-12 sm:px-12 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="main">
                            <h4 class="text-center">Cadastro de abastecimento</h4>
                            <div id="map"></div>
                            <div class="form">
                                <form id="new-form" class="form" method="POST" action="{{ url('/abastecimento/new') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group">
                                            <label>Endereço</label><br>
                                            <input type="text" name="endereco" id="endereco" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label>Latitude</label><br>
                                            <input type="text" name="latitude" id="latitude" class="form-control">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Longitude</label><br>
                                            <input type="text" name="longitude" id="longitude" class="form-control">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="username">Carro</label><br>
                                            <select class="form-select" name="carro" id="carro">
                                                <option value="">Selecione</option>
                                                @foreach($cars as $car)
                                                    <option value="{{$car->id}}">{{$car->nome}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Quantidade L</label><br>
                                            <input type="number" name="qtd" id="qtd" class="form-control" onchange="setTwoNumberDecimal()" min="0" step="1">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Valor R$</label><br>
                                            <input type="number" name="valor" id="valor" class="form-control" onchange="setTwoNumberDecimal()" min="0" step="0.1">
                                        </div>
                                    </div>
                                    <div class="form-group btn-submit center btn-padding flex">
                                        <input type="submit" name="submit" id="btn-save" class="btn btn-success btn-save btn-personal" value="Salvar">
                                        <a class="btn btn-primary btn-personal" value="Buscar" onclick="searchAddress()">Buscar</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mx-12 sm:px12 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @csrf
                    <table class="table table-hover align-middle table-bordered">
                        <thead class="table-dark">
                            <tr class="center">
                                <th>USUÁRIO</th>
                                <th>VEÍCULO</th>
                                <th>PLACA</th>
                                <th>DATA</th>
                                <th>VALOR</th>
                                <th>QTD</th>
                                <th>VALOR/LITRO</th>
                                <th>ENDEREÇO</th>
                                <th>AÇÕES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($abastecimentos) < 1)
                                <tr>
                                    <td colspan="9" class="center" style="font-size: 25px">Sem registros...</td>
                                </tr>
                            @else 
                                @foreach($abastecimentos as $abastecimento)
                                    <tr>
                                        <td>{{$abastecimento->relUser === null ? 'Deletado' : $abastecimento->relUser->name}}</td>
                                        <td>{{$abastecimento->relVehicles === null ? 'Deletado' : $abastecimento->relVehicles->nome}}</td>
                                        <td>{{$abastecimento->relVehicles === null ? '-' : $abastecimento->relVehicles->placa}}</td>
                                        <td>{{$abastecimento->dt_abastecimento}}</td>
                                        <td>R$ {{$abastecimento->valor}}</td>
                                        <td>{{$abastecimento->qtd_litros}}L</td>
                                        <td>R$ {{$abastecimento->valor_por_litro}}</td>
                                        <td>{{$abastecimento->endereco}}</td>
                                        <td class="center">
                                            <a href="{{url("abastecimento/$abastecimento->id/edit")}}"> 
                                                <button class="btn btn-warning"><i class="lni lni-pencil-alt"></i></button>
                                            </a>
                                            <a href="{{url("abastecimento/$abastecimento->id")}}">
                                                <button class="btn btn-danger js-del"><i class="lni lni-trash-can"></i></button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div class="flex">   
                        {{$abastecimentos->links()}}
                    </div>
                </div>
            </div>
        </div>
        @if(Session::get('errors'))
            <div class="my-alert">
                <div class="error">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{Session::get('errors')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @else
        @endif
    </x-slot>
</x-app-layout>