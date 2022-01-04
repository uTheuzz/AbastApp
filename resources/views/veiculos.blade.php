<x-app-layout>
    <x-slot name="content">
        <div class="py-12">
            <div class="mx-12 sm:px-12 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        @if(count($cars) < 1)
                            <div class="container-fluid" style="padding-bottom: 20px">
                                <div class="row center">
                                    <div class="col-md-12">
                                        <h4>Nenhum veículo cadastrado para seu usuário!</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <a href="{{url("veiculos/new")}}">
                                            <button class="btn btn-success">Novo<i class="lni lni-car icon"></i></button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @else 
                            <div class="main">
                                <div class="container-fluid" style="padding-bottom: 20px">
                                    <div class="row center">
                                        <div class="col-md-6">
                                            <h4>Lista de Veículos</h4>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{url("veiculos/new")}}">
                                                <button class="btn btn-success">Novo<i class="lni lni-car icon"></i></button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @csrf
                                <table class="table table-hover align-middle table-bordered">
                                    <thead class="table-dark">
                                        <tr class="center">
                                            <th>NOME</th>
                                            <th>PLACA</th>
                                            <th>USUÁRIO</th>
                                            <th>AÇÕES</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cars as $car)
                                            <tr>
                                                <td>{{$car->nome}}</td>
                                                <td>{{$car->placa}}</td>
                                                <td>{{$car->relUser->name}}</td>
                                                <td class="center">
                                                    <a href="{{url("veiculos/$car->id/edit")}}">
                                                        <button class="btn btn-warning"><i class="lni lni-pencil-alt"></i></button>
                                                    </a>
                                                    <a href="{{url("veiculos/$car->id")}}">
                                                        <button class="btn btn-danger js-del"><i class="lni lni-trash-can"></i></button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="flex">   
                                    {{$cars->links()}}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>