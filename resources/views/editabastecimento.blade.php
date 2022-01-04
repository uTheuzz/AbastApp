<x-app-layout>
    <x-slot name="content">
        <div class="py-12">
            <div class="mx-12 sm:px-12 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="main">
                            <h4 class="text-center">Edição de abastecimento</h4>
                            <div id="map"></div>
                            <div class="form">
                                <form id="new-form" class="form" method="POST" action="{{ url("/abastecimento/$abastecimento->id") }}">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-9">
                                            <label>Endereço</label><br>
                                            <input type="text" name="endereco" id="endereco" class="form-control" value="{{$abastecimento->endereco}}" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Data</label><br>
                                            <input type="text" name="timestamp" id="timestamp" class="form-control" value="{{$abastecimento->dt_abastecimento}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label>Latitude</label><br>
                                            <input type="text" name="latitude" id="latitude" class="form-control" value="{{$abastecimento->latitude}}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Longitude</label><br>
                                            <input type="text" name="longitude" id="longitude" class="form-control" value="{{$abastecimento->longitude}}">
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
                                            <input type="number" name="qtd" id="qtd" class="form-control" onchange="setTwoNumberDecimal()" min="0" step="1" value="{{$abastecimento->qtd_litros}}">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Valor R$</label><br>
                                            <input type="number" name="valor" id="valor" class="form-control" onchange="setTwoNumberDecimal()" min="0" step="0.1" value="{{$abastecimento->valor}}">
                                        </div>
                                    </div>
                                    <div class="form-group btn-submit center btn-padding flex">
                                        <input type="submit" name="submit" id="btn-save" class="btn btn-warning btn-save btn-personal" value="Editar">
                                        <a class="btn btn-primary btn-personal" value="Buscar" onclick="searchAddress()">Buscar</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>