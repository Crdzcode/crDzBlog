@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div style="border-radius: 0;" class="card-header headers">Posts</div>

                    <div class="card-body darkbg">
                        <a class="btn btn-primary post-button" href="{{ route('criarPost') }}">Novo post</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Titulo</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>
                                            {{ $post->title }}
                                            <br>
                                            <strong>
                                                {{ $post->published == "0" ? 'Não publicado' : '' }}
                                            </strong>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary post-button" href="{{ route('editarPost', ['id' => $post->id]) }}">Editar</a>
                                            <a class="btn btn-primary post-button" href="{{ route('deletarPost', ['id' => $post->id]) }}">Deletar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
