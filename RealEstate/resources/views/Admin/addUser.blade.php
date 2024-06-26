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

                    <div class="container">
                        <h2 class="my-4">Ajouter un utilisateur</h2>
                        <form method="POST" action="/createUser">
                            @csrf
                          <div class="form-group">
                            <label for="username">Nom d'utilisateur</label>
                            <input name="name" type="text" class="form-control" id="username" placeholder="Entrez le nom d'utilisateur">
                          </div>
                          <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" type="email" class="form-control" id="email" placeholder="Entrez votre email">
                          </div>
                          <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input  name="password"  type="password" class="form-control" id="password" placeholder="Entrez votre mot de passe">
                          </div>
                          <div class="form-group">
                            <label for="role">Role</label> <br>




                            <select class="form-control" name="role" id="role">
                                @foreach($roles as $role)
                                <option  value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>

                          </div>
                          <button type="submit" class="btn btn-primary">Ajouter</button>
                        </form>
                      </div>


                    @include('Admin.partials._footer')
                </div>
            </div>
        </div>
    @endsection
