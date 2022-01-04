<x-app-layout>
    <x-slot name="content">
        <div class="py-12">
            <div class="mx-12 sm:px-12 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        @if(count($users) < 1)
                            <div class="container-fluid" style="padding-bottom: 20px">
                                <div class="row center">
                                    <div class="col-md-12">
                                        <h4>Nenhum usuário cadastrado!</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <a href="{{url("usuarios/new")}}">
                                            @can('admin')
                                                <button class="btn btn-success">Novo<i class="lni lni-user icon"></i></button>
                                            @endcan
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="main">
                                <div class="container-fluid" style="padding-bottom: 20px">
                                    <div class="row center">
                                        <div class="col-md-6">
                                            <h4>Lista de Usuários</h4>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{url("usuarios/new")}}">
                                                @can('admin')
                                                    <button class="btn btn-success">Novo<i class="lni lni-user icon"></i></button>
                                                @endcan
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @csrf
                                <table class="table table-hover align-middle table-bordered">
                                    <thead class="table-dark">
                                        <tr class="center">
                                            <th>NOME</th>
                                            <th>EMAIL</th>
                                            <th>AÇÕES</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td class="center">
                                                    @can('admin')
                                                        <a href="{{url("usuarios/$user->id/edit")}}">
                                                            <button class="btn btn-warning"><i class="lni lni-pencil-alt"></i></button>
                                                        </a>
                                                        @if(Auth::user()->id == $user->id)
                                                            <a href="#" style="pointer-events: none;">
                                                                <button class="btn btn-danger js-del" disabled><i class="lni lni-trash-can"></i></button>
                                                            </a>
                                                        @else
                                                            <a href="{{url("usuarios/$user->id")}}">
                                                                <button class="btn btn-danger js-del"><i class="lni lni-trash-can"></i></button>
                                                            </a>
                                                        @endif
                                                    @endcan
                                                    @can('user')
                                                        @if(Auth::user()->id != $user->id)
                                                            <a style="pointer-events: none;" href="{{url("usuarios/$user->id/edit")}}">
                                                                <button class="btn btn-warning" disabled><i class="lni lni-pencil-alt"></i></button>
                                                            </a>
                                                        @else
                                                            <a href="{{url("usuarios/$user->id/edit")}}">
                                                                <button class="btn btn-warning"><i class="lni lni-pencil-alt"></i></button>
                                                            </a>
                                                        @endif
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="flex">   
                                    {{$users->links()}}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>