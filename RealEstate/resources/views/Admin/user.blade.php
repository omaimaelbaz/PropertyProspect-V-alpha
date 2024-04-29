{{-- @dd($Role); --}}
@extends('Admin.partials._tagshtml')

@section('content')
    <div class="container-scroller">
        @include('Admin.partials._navbar')
        <div class="container-fluid page-body-wrapper">
            @include('Admin.partials._sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">

                        <h3 class="page-title">
                            <span class="page-title-icon bg-gradient-primary text-white me-2">
                                <i class="mdi mdi-home menu-icon"></i>
                            </span> Users
                        </h3>

                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span></span>Overview <i
                                        class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                                </li>
                            </ul>
                        </nav>

                    </div>
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">User Table</h4>

                                <div class="table-responsive">
                                    <a href="/CreateUser" class="btn btn bg-primary">Add User</a>


                                    <table class="table table-striped">


                                        <thead>
                                            <tr>
                                                <th>User</th>
                                                <th>First name</th>
                                                <th>Role</th>
                                                <th>IsBan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td class="py-1">
                                                        <img src="../../assets/images/faces-clipart/pic-1.png"
                                                            alt="image" />
                                                    </td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>

                                                        {{ $user->role->name }}

                                                    </td>
                                                    <td>
                                                        <a href="/banuser/{{$user->id}}" class="badge badge-{{$user->IsBan ? 'danger' :'success'}}">{{$user->IsBan ? 'ban': 'unban'}}</a>
                                                    </td>




                                                    <td>
                                                        <a href="/update/{{$user->id}}" class="badge badge-info">Update</a>
                                                        <a href="/delete/{{ $user->id }}"
                                                            class="badge badge-warning">delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>





                    @include('Admin.partials._footer')
                </div>
            </div>
        </div>
    @endsection
