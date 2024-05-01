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
                            </span> Accept or refuse property
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
                                <h4 class="card-title">Proprties Table</h4>
                                @if (session('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif


                                <div class="table-responsive">


                                    <table class="table table-striped">

                                        <thead>
                                            <tr>
                                                <th>Images</th>
                                                <th>Property Name</th>
                                                <th>Property Price</th>
                                                <th>Listed By</th>
                                                <th>Post Status</th>
                                                <th> Status Accept</th>
                                                <th> Status Reject</th>



                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            @foreach ($property as $prop)


                                                <tr>
                                                    <td>
                                                        @foreach ($prop->images->take(1) as $image)
                                                            <img src="{{ asset($image->url) }}" alt="Property Image" />
                                                        @endforeach
                                                    </td>
                                                    <td>{{ $prop->name }}</td>
                                                    <td>{{ $prop->price }}</td>
                                                    <td>{{ $prop->user->name }}</td>
                                                    <td>
                                                        {{ $prop->postStatus }}
                                                    </td>


                                                    <td>
                                                        <a
                                                            href="/accept/{{ $prop->id }}"class="badge badge-primary">Accept</a>
                                                    </td>

                                                    <td>
                                                        <a
                                                            href="/reject/{{ $prop->id }}"class="badge badge-danger">Reject</a>
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
