@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div style="background-color: inherit;" class="card shadow">
                    <div style="border-radius: 0;" class="card-header headers">Posts</div>

                    <div class="card-body darkbg">
                        <a class="btn btn-primary post-button mb-2" href="{{ route('criarPost') }}">Novo post</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Titulo</th>
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
                                        <td class="d-flex justify-content-end">
                                            <a style="background: none; color: #2bc65e;" class="btn btn-primary post-button" href="{{ route('editarPost', ['post' => $post]) }}"><i class="fas fa-edit"></i></a>
                                            <a style="background: none; color: #2bc65e;" class="btn btn-primary post-button" href="{{ route('deletarPost', ['post' => $post]) }}"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div style="border-radius: 0;" class="card-header headers mt-3">Tags</div>

                    <div class="card-body darkbg">
                        <a class="btn btn-primary post-button mb-2" href="{{ route('criarTag') }}">Nova tag</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Tag</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tags as $tag)
                                    <tr>
                                        <td>
                                            {{ $tag->name }}
                                        </td>
                                        <td class="d-flex justify-content-end">
                                            <a style="background: none; color: #2bc65e;" class="btn btn-primary post-button" href="{{ route('editarTag', ['tag' => $tag]) }}"><i class="fas fa-edit"></i></a>
                                            <a style="background: none; color: #2bc65e;" class="btn btn-primary post-button" href="{{ route('deletarTag', ['tag' => $tag]) }}"><i class="fas fa-trash"></i></a>
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
