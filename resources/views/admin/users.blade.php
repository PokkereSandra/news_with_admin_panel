@extends('layouts.admin')
@section('content')
    <div class="container mt-5">
        <!-- Button trigger addUserModal -->
        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addUserModal">
            Pievienot jaunu lietotāju
        </button>
        <div>
            <table class="table table-striped mt-3">
                <thead class="thead-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Lietotājvārds</th>
                    <th scope="col">E-pasts</th>
                    <th scope="col">Administrators</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->nickname}}</td>
                        <td>{{$user->email}}</td>
                        @if($user->is_admin)
                            <td>
                                &#9989;
                            </td>
                        @else
                            <td></td>
                        @endif
                        <td>
                            <!-- Button trigger editUserModal -->
                            <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal"
                                    data-bs-target="#editUserModal{{$user->id}}">
                                Labot
                            </button>
                        </td>
                        <td>
                            <form method="post" action="{{asset('/admin/users-delete')}}">
                                @csrf
                                <input type="hidden" name="id" value="{{$user->id}}"/>
                                <button class="btn btn-outline-danger" type="submit">Dzēst</button>
                            </form>
                        </td>
                    </tr>
                    <!-- editUserModal -->
                    <div class="modal fade" id="editUserModal{{$user->id}}" tabindex="-1"
                         aria-labelledby="editUserModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editUserModalLabel">Mainīt datus</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <form method="post" action="{{asset('/admin/users-update/'. $user->id)}}">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="text" name="userNickname" class="form-control"
                                                   value="{{$user->nickname}}"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="userEmail" class="form-control"
                                                   value="{{$user->email}}"/>
                                        </div>
                                        <label for="isAdmin">Pievienot kā administratoru? </label>
                                        <select name="isAdmin">
                                            <option value="1">Jā</option>
                                            <option value="0">Nē</option>
                                        </select>
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
        <!-- addUserModal -->
        <div class="modal fade" id="addUserModal" tabindex="-1"
             aria-labelledby="addUserModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addUserModalLabel">Mainīt datus</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <form method="post" action="{{asset('/admin/users-create')}}">
                        @csrf
                        <div class="modal-body">
                            <div>
                                <label for="nickname">Lietotājvārds: </label>
                                <input name="nickname">
                            </div>
                            <div>
                                <label for="email">E-pasts: </label>
                                <input name="email">
                            </div>
                            <div>
                                <label for="password">Parole: </label>
                                <input name="password">
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
    </div>
@endsection
