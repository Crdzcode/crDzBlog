@extends('layouts.app')

@section('content')
    <div class="container">
        <div width="100%;" class="row justify-content-center">
            <div width="100%;" class="col-md m-0 p-0">
                <div width="100%;" class="card shadow">
                    <div style="border-radius: 0;" class="card-header headers"><i class="fas fa-user"></i> {{$post->creator}}</div>

                    <div class="card-body darkbg">
                    <a href="{{ route('welcome') }}" style="width: fit-content;" class="btn btn-primary post-button"><i class="fas fa-long-arrow-alt-left"></i></a>
                        <div class="card-body darkbg">
                        <h4 class="card-title h4">{{$post->title}}</h4>
                        <p class="card-text">{!! $post->body !!}</p>
                        <div class="d-flex mt-5 flex-wrap">
                            <strong style="width: fit-content;" class="mr-2">Tags:</strong>
                            @foreach($post->tags as $tag)
                                <strong class="tag mx-1 my-1">{{ $tag->name }}</strong>
                            @endforeach   
                        </div>
                    </div>
                    <div style="border-top: 1px solid #2fc65c!important;" class="card-footer text-muted darkbg">
                        <span>Criado {{$post->created_at->diffForHumans()}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
