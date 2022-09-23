@extends('layouts.admin')
@section('content')
    <div class="container mt-5">
        <!-- Button trigger addUserModal -->
        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
            Pievienot jaunu kategoriju
        </button>
        <div>
            <table class="table table-striped mt-3">
                <thead class="thead-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Kategorija</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{$category->id}}</th>
                        <td>{{$category->type}}</td>
                        <td>
                            <!-- Button trigger editUserModal -->
                            <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal"
                                    data-bs-target="#editCategory{{$category->id}}">
                                Labot
                            </button>
                        </td>
                        <td>
                            <form method="post" action="{{asset('/admin/categories-delete')}}">
                                @csrf
                                <input type="hidden" name="id" value="{{$category->id}}"/>
                                <button class="btn btn-outline-danger" type="submit">Dzēst</button>
                            </form>
                        </td>
                    </tr>
                    <!-- editCategoryModal -->
                    <div class="modal fade" id="editCategory{{$category->id}}" tabindex="-1"
                         aria-labelledby="editCategoryModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editCategoryModalLabel">Labot kategoriju</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <form method="post" action="{{asset('/admin/categories-update/'. $category->id)}}">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="text" name="categoryType" class="form-control"
                                                   value="{{$category->type}}"/>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Aizvērt
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
        <!-- addCategoryModal -->
        <div class="modal fade" id="addCategoryModal" tabindex="-1"
             aria-labelledby="addCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCategoryModalLabel">Pievienot kategoriju</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <form method="post" action="{{asset('/admin/categories-create')}}">
                        @csrf
                        <div class="modal-body">
                            <div>
                                <label for="categoryType">Jaunā kategorija: </label>
                                <input name="categoryType">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Aizvērt
                            </button>
                            <button type="submit" class="btn btn-primary">Pievienot</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
