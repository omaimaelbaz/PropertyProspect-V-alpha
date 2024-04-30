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

                                <div class="table-responsive">


                                    <table class="table table-striped">


                                        <thead>
                                            <tr>
                                                <th>images</th>
                                                <th>Property name</th>
                                                <th>Property price</th>
                                                <th>listed By</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             @foreach ($property as $props)
                                             {{-- @dd($props->images); --}}
                                                <tr>
                                                    <td class="py-1">
                                                        <img src="{{$props->images->url}}"
                                                     />
                                                    </td>
                                                    <td>{{$props->name}}</td>
                                                    <td>{{$props->price}}</td>
                                                    <td>{{$props->price}}</td>



                                                    <td>
                                                        {{-- <a href="/banuser/{{$user->id}}" class="badge badge-{{$user->IsBan ? 'danger' :'success'}}">{{$user->IsBan ? 'ban': 'unban'}}</a> --}}
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
