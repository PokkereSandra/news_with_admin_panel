@extends('layouts.admin')
@section('content')
<h1>{{$article->title}}</h1>
<img src="{{asset("storage/".$article->image)}}" alt="foto"/>
<p>{{$article->content}}</p>
<h5>{{$article->created_at}}</h5>
<h5>{{$article->user->nickname}}</h5>

<a href="{{asset('/admin/articles')}}">atpakaļ pie saraksta</a>
@endsection
