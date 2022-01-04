<x-app-layout>
    <x-slot name="content">
        <div class="py-12">
            <div class="mx-12 sm:px-12 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="main">
                            <form id="edit-form" class="form" method="POST" action="{{ url("usuarios/$user->id") }}">
                                @method('PUT')
                                @csrf
                                <h4 class="text-center">Edição de usuário</h4>
                                <div class="form-group">
                                    <label for="username">Nome</label><br>
                                    <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="username">Email</label><br>
                                    <input type="text" name="email" id="email" class="form-control" value="{{$user->email}}">
                                </div>
                                <div class="form-group">
                                    <label for="password">Nova senha</label><br>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="password">Confirme a nova senha</label><br>
                                    <input type="password" name="password_confirmation" id="password" class="form-control">
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