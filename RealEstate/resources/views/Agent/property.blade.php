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
                            </span> Properties Gestion
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
                                <h4 class="card-title">Properties Table</h4>

                                <div class="table-responsive">
                                    <a href="/add/" class="btn btn bg-primary">Add Property</a>


                                    <table class="table table-striped">


                                        <thead>
                                            <tr>
                                                <th>Property Images</th>
                                                <th>Property name</th>
                                                <th>address</th>
                                                <th>city</th>
                                                <th>year_built</th>
                                                <th>num_bedrooms</th>
                                                <th>num_bathrooms</th>
                                                <th>status</th>
                                                <th>price</th>
                                                <th>description</th>
                                                <th>Category</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($properties as $props)
                                                <tr>

                                                    <td class="py-1">
                                                        @if ($props->images->isNotEmpty())
                                                            <img src="{{asset('assets/images/'.$props->images->first()->url) }}" alt="Property Image" />
                                                        @endif
                                                    </td>


                                                    </td>
                                                    <td>{{ $props->name }}</td>
                                                    <td>{{ $props->address }}</td>
                                                    <td>{{ $props->city }}</td>
                                                    <td>{{ $props->year_built }}</td>
                                                    <td>{{ $props->num_bedrooms }}</td>
                                                    <td>{{ $props->num_bathrooms }}</td>
                                                    <td>{{ $props->status }}</td>
                                                    <td>{{ $props->price }}</td>
                                                    <td>{{ $props->description }}</td>
                                                    <td>{{ $props->category->name }}</td>
                                                    <td>
                                                        <a href="/update/{{ $props->id }}"
                                                            class="badge badge-info">Update</a>
                                                        <a href="/delete/{{ $props->id }}"
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
