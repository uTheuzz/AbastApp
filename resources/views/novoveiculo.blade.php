<x-app-layout>
    <x-slot name="content">
        <div class="py-12">
            <div class="mx-12 sm:px-12 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="main">
                            <form id="new-form" class="form" method="POST" action="{{ url('/veiculos/new') }}">
                                @csrf
                                <h4 class="text-center">Cadastro de novos veículos</h4>
                                <div class="form-group">
                                    <label for="username">Nome</label><br>
                                    <input type="text" name="name" id="name" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="username">Placa</label><br>
                                    <input type="text" name="placa" id="placa" class="form-control">
                                </div>
                                <div class="form-group btn-submit center btn-padding">
                                    <input type="submit" name="submit" class="btn btn-success" value="Salvar">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>