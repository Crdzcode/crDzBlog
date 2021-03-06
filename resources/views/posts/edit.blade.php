@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div style="border-radius: 0;" class="card-header headers">Editar post</div>

                    <div class="card-body darkbg">
                        <form action="{{ route('atualizarPost', ['post' => $post]) }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group has-feedback{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title" class="text-muted">Titulo</label>
                                <input id="title" type="text" value="{{ $post->title }}" name="title"
                                    class="form-control">
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group has-feedback{{ $errors->has('body') ? ' has-error' : '' }}">
                                <label for="body" class="text-muted">Corpo</label>
                                <textarea id="body" name="body" rows="10" class="form-control">{{ $post->body }}</textarea>
                                @if ($errors->has('body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group select-dropdown has-feedback{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="tags" class="text-muted">Tags</label>
                                <select id="tags" type="text" name="tags[]" data-virtual-scroll='true' data-dropup-auto='false' multiple class="form-control selectpicker custom-select" data-style="custom-select">
                                    @foreach (\App\Tag::all() as $tag)
                                        <option class="custom-option" value="{{ $tag->id }}"
                                            @if ($post->tags->contains($tag)) selected @endif>{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('tags'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tags') }}</strong>
                                    </span>
                                @endif
                            </div>
                            @if(auth()->user()->id == 1)
                                <div class="form-check has-feedback{{ $errors->has('title') ? ' has-error' : '' }}">
                                    <input name="publish" class="form-check-input" type="checkbox" value="1" id="publish" {{$post->published == 1 ? 'checked' : ''}}>
                                    <label for="publish" class="form-check-label">Publicar</label>
                                    @if ($errors->has('publish'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('publish') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            @endif
                            <button type="submit" class="btn btn-primary post-button">Salvar</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
