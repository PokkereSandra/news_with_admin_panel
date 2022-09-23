@extends('layouts.news-page')
@section('content')
    <div class="container">
        @if($errors->any())
            <h4 class="alert alert-danger error-transaction">{{$errors->first()}}</h4>
        @endif
        @section('content')
            <div class="container">
                <div class="row">
                    @foreach($articles as $article)
                        <div class="col-md-6">
                            <img class="news-image" src="{{asset('storage/'. $article->image)}}" alt="foto">
                            <a href="{{asset('article/' . $article->id)}}">
                                <h3>{{$article->title}}</h3>
                            </a>
                            <p>Publicēts: {{$article->created_at}}</p>
                        </div>
                    @endforeach
                </div>
            </div>
    </div>
@endsection
