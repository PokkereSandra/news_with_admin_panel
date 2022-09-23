@extends('layouts.news-page')
@section('content')
        <div class="col-md-6">
            <img class ="news-image" src="{{asset('storage/'. $article->image)}}" alt="foto">
            <h3>{{$article->title}}</h3>
            <p>{{$article->content}}</p>
            <p>Autors:
                @if(isset($article->user->nickname))
                    {{$article->user->nickname}}</p>
            @else
                Dzēsts lietotājs</p>
            @endif
            <h5>Komentāri:</h5>
            @foreach($article->comments as $comment)
                <div class="display-comment">
                    @if(isset($comment->user->nickname))
                        <strong>{{$comment->user->nickname}}</strong>
                    @else
                        <strong>Dzēsts lietotājs</strong>
                    @endif
                    <p>{{ $comment->content }}</p>
                </div>
            @endforeach
            <form method="post" action="{{asset('news-add-comment')}}">
                @csrf
                <div class="form-group">
                    <input type="text" name="comment_body" class="form-control"/>
                    <input type="hidden" name="article_id" value="{{ $article->id }}"/>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Pievienot komentāru"/>
                </div>
            </form>
        </div>
@endsection
