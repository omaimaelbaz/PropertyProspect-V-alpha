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
                            </span> Category
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
                        <h2 class="my-4">Ajouter un categories</h2>
                        <form method="POST" action="/CreateCategory">
                            @csrf
                          <div class="form-group">
                            <label for="username">Nom de Categories</label>
                            <input name="name" type="text" class="form-control" id="username" placeholder="Entrez le nom d'utilisateur">
                          </div>

                          </div>
                          <button type="submit" class="btn btn-primary">Ajouter</button>
                        </form>
                      </div>


                    @include('Admin.partials._footer')
                </div>
            </div>
        </div>
    @endsection
