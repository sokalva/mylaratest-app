@extends('layouts.app')
@section('content')
{{--    <div id="app">--}}
        <div class="row mt-5">
            <div class="col-12 p-3">
                <img src="{{$article->img}}" alt="...">
                <h5 class="mt-5">{{$article->id}}_{{$article->title}}</h5>
                <p>
                    @foreach($article->tags as $tag)
                        @if($loop->last)
                            <span class="tag">{{$tag->label}}</span>
                        @else
                            <span class="tag">{{$tag->label}}  |  </span>
                        @endif
                    @endforeach
                </p>
                <p class="card-text">{{$article->body}}</p>
                <p>Опубликовано: <i>{{$article->created_at}}</i></p>
                <div class="mt-3">
                    <span class="badge bg-primary">{{$article->state->likes}} <i class="far fa-thumbs-up"></i></span>
                    <span class="badge bg-danger">{{$article->state->views}} <i class="far fa-eye"></i></span>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <form action="">
                <div class="mb-3">
                    <label for="commentSubject" class="form-label">Тема комментария</label>
                    <input id="commentSubject" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="commentBody" class="form-label">Комментарий</label>
                    <textarea id="commentBody" type="text" class="form-control" rows="3"></textarea>
                </div>
                <button class="btn btn-success" type="submit">Отправить</button>
            </form>
            <div class="pb-2 mt-5 mx-auto">
                @foreach($article->comments as $comment)
                    <div class="toast show mb-2">
                        <div class="toast-header">
                            <img src="https://via.placeholder.com/50/5F113B/FFFFFF/?text=User" class="rounded me-2" alt="...">
                            <strong class="me-auto">{{$comment->subject}}</strong>
                            <small class="text-muted">{{$comment->created_at}}</small>
                        </div>
                        <div class="toast-body">
                            {{$comment->body}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
{{--    </div>--}}
@endsection
@section('view')
    @vite(['resources/js/app.js'])

    <div id="app">
        <example-component></example-component>
        <article-component></article-component>
    </div>

@endsection


