@extends('layouts.admin')
@section('content')
    <div class="container mt-5">
        <!-- Button trigger addArticleModal -->
        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addArticleModal">
            Pievienot jaunu ziņu
        </button>
        <div>
            <table class="table table-striped mt-3">
                <thead class="thead-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Autors</th>
                    <th scope="col">Kategorija</th>
                    <th scope="col">Virsraksts</th>
                    <th scope="col">Bilde</th>
                    <th scope="col">Publicēšanas datums</th>
                </tr>
                </thead>
                <tbody>
                @foreach($articles as $article)
                    <tr>
                        <th scope="row">{{$article->id}}</th>
                        @if(isset($article->user->nickname))
                            <td>{{$article->user->nickname}}</td>
                        @else
                            <td>Dzēsts lietotājs</td>
                        @endif
                        <td>{{$article->category->type}}</td>
                        <td>{{$article->title}}</td>
                        @if($article->image=='')
                            <td><img class="admin-img" src="{{asset("/img/no-image.jpg")}}" alt="foto"></td>
                        @else
                            <td><img class="admin-img" src="{{asset("storage/".$article->image)}}" alt="foto"></td>
                        @endif
                        <td>{{$article->created_at}}</td>
                        <td>
                            <a href="{{asset('/admin/articles-show/'.$article->id)}}">
                                <button type="submit" class="btn btn-outline-warning">
                                    Skatīt
                                </button>
                            </a>
                        </td>
                        <td>
                            <!-- Button trigger editArticleModal -->
                            <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal"
                                    data-bs-target="#editArticle{{$article->id}}">
                                Labot
                            </button>
                        </td>
                        <td>
                            <form method="post" action="{{asset('/admin/articles-delete')}}">
                                @csrf
                                <input type="hidden" name="id" value="{{$article->id}}"/>
                                <button class="btn btn-outline-danger" type="submit">Dzēst</button>
                            </form>
                        </td>
                    </tr>
                    <!-- editArticleModal -->
                    <div class="modal fade" id="editArticle{{$article->id}}" tabindex="-1"
                         aria-labelledby="editArticleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editArticleModalLabel">Labot ziņu</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <form method="post" action="{{asset('/admin/articles-update/'. $article->id)}}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div>
                                            <label for="category">Mainīt kategoriju: </label>
                                            <select name="category">
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->type}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div>
                                            <input name="title" value="{{$article->title}}">
                                        </div>
                                        <div>
                                            <input name="articleContent" value="{{$article->content}}">
                                        </div>
                                        <div>
                                            <label for="image">Augšupielādēt bildi: </label>
                                            <input type="file" name="image"/>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Aizvērt
                                        </button>
                                        <button type="submit" class="btn btn-primary">Saglabāt</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- addArticleModal -->
        <div class="modal fade" id="addArticleModal" tabindex="-1"
             aria-labelledby="addArticleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addArticleModalLabel">Pievienot ziņu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <form method="post" action="{{asset('/admin/articles-create')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div>
                                <label for="category">Izvēlies kategoriju: </label>
                                <select name="category">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->type}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="title">Virsraksts: </label>
                                <input name="title">
                            </div>
                            <div>
                                <label for="articleContent">Ziņa: </label>
                                <input name="articleContent">
                            </div>
                            <div>
                                <label for="image">Augšupielādēt bildi: </label>
                                <input type="file" name="image"/>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Aizvērt
                            </button>
                            <button type="submit" class="btn btn-primary">Saglabāt</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
