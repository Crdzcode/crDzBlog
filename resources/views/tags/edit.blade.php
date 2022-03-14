@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div style="border-radius: 0;" class="card-header headers">Editar tag</div>

                    <div class="card-body darkbg">
                        <form action="{{ route('atualizarTag', ['tag' => $tag]) }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="text-muted">Nome</label>
                                <input id="name" type="text" value="{{ $tag->name }}" name="name"
                                    class="form-control">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary post-button">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
