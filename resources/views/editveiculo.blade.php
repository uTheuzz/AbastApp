<x-app-layout>
    <x-slot name="content">
        <div class="py-12">
            <div class="mx-12 sm:px-12 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="main">
                            <form id="edit-form" class="form" method="POST" action="{{ url("veiculos/$car->id") }}">
                                @method('PUT')
                                @csrf
                                <h4 class="text-center">Edição de veículos</h4>
                                <div class="form-group">
                                    <label for="username">Nome</label><br>
                                    <input type="text" name="name" id="name" class="form-control" value="{{$car->nome}}">
                                </div>
                                <div class="form-group">
                                    <label for="username">Placa</label><br>
                                    <input type="text" name="placa" id="placa" class="form-control" value="{{$car->placa}}">
                                </div>
                                <div class="form-group">
                                    <label for="username">Usuário</label><br>
                                    <select class="form-select" name="id_user" id="id_user">
                                        <option value="{{$car->relUser->id}}">{{$car->relUser->name}}</option>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group btn-submit center btn-padding">
                                    <input type="submit" name="submit" class="btn btn-warning" value="Editar">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>