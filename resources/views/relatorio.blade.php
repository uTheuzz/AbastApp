<x-app-layout>
    <x-slot name="content">
        <div class="py-12">
            <div class="mx-12 sm:px-12 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg card">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="main">
                            <div class="row">
                                <div class="col amounts card">
                                    <h3 class="title">Gasto Total </h3>
                                    <div class="amount-box">R$ {{$gastoTotal}}</div>
                                </div>
                                <div class="col amounts card">
                                    <h3 class="title">Quantidade Total</h3>
                                    <div class="amount-box">{{$quantidadeTotal}}L</div>
                                </div>
                                <div class="col amounts card">
                                    <h3 class="title">V. Médio Por Litro</h3>
                                    <div class="amount-box">R$ {{$valorMedio}}</div>
                                </div>
                            </div>
                            <table class="table table-hover align-middle table-bordered">
                                <thead class="table-dark">
                                    <tr class="center">
                                        @can('admin')<th>USUÁRIO</th>@endcan
                                        <th>VEÍCULO</th>
                                        <th>PLACA</th>
                                        <th>DATA</th>
                                        <th>VALOR</th>
                                        <th>QTD </th>
                                        <th>VALOR/LITRO R$</th>
                                        <th>ENDEREÇO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($relatorio) < 1)
                                        <tr>
                                            <td colspan="9" class="center" style="font-size: 25px">Sem registros...</td>
                                        </tr>
                                    @else 
                                        @foreach($relatorio as $rel)
                                            <tr>
                                                @can('admin')<td>{{$rel->relUser === null ? 'Deletado' : $rel->relUser->name}}</td>@endcan
                                                <td>{{$rel->relVehicles === null ? 'Deletado' : $rel->relVehicles->nome}}</td>
                                                <td>{{$rel->relVehicles === null ? '-' : $rel->relVehicles->placa}}</td>
                                                <td>{{$rel->dt_abastecimento}}</td>
                                                <td>R$ {{$rel->valor}}</td>
                                                <td>{{$rel->qtd_litros}}L</td>
                                                <td>R$ {{$rel->valor_por_litro}}</td>
                                                <td>{{$rel->endereco}}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            <div class="flex">   
                                {{$relatorio->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>