@extends('layouts.admin')
@section('content')
    <div class="container mt-5">
        <div>
            <table class="table table-striped mt-3">
                <thead class="thead-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Autors</th>
                    <th scope="col">Ziņas virsraksts</th>
                    <th scope="col">Komentāra saturs</th>
                    <th scope="col">Publicēšanas datums</th>
                </tr>
                </thead>
                <tbody>
                @foreach($comments as $comment)
                    <tr>
                        <th scope="row">{{$comment->id}}</th>
                        @if(isset($comment->user->nickname))
                            <td>{{$comment->user->nickname}}</td>
                        @else
                            <td>Dzēsts lietotājs</td>
                        @endif
                        <td>{{$comment->article->title}}</td>
                        <td>{{$comment->content}}</td>
                        <td>{{$comment->created_at}}</td>
                        <td>
                            <!-- Button trigger editCommentModal -->
                            <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal"
                                    data-bs-target="#editCommentModal{{$comment->id}}">
                                Labot
                            </button>
                        </td>
                        <td>
                            <form method="post" action="{{asset('/admin/comments-delete')}}">
                                @csrf
                                <input type="hidden" name="id" value="{{$comment->id}}"/>
                                <button class="btn btn-outline-danger" type="submit">Dzēst</button>
                            </form>
                        </td>
                    </tr>
                    <!-- editCommentModal -->
                    <div class="modal fade" id="editCommentModal{{$comment->id}}" tabindex="-1"
                         aria-labelledby="editCommentModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editCommentModalLabel">Labot komentāru</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <form method="post" action="{{asset('/admin/comments-update/'.$comment->id)}}">
                                    <div class="modal-body">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="commentBody" class="form-control"
                                                   value="{{$comment->content}}"/>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Aizvērt
                                        </button>
                                        <button type="submit" class="btn btn-primary">Labot</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
