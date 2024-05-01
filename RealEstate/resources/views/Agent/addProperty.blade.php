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
                        <h2 class="my-4">Ajouter un properties</h2>
                        <ul class="alert alert-warning">
                            @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        @endif
                        </ul>


                            <form class="row g-3" method="POST" action="/addproperty" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">name</label>
                                    <input type="text" name="name" class="form-control" id="inputEmail4">
                                </div>
                                <div class="col-md-6">
                                    <label for="photoUpload" class="form-label">Images</label>
                                    <input type="file" name="url[]" multiple class="form-control" id="photoUpload"
                                        multiple accept=".*">
                                    <small class="text-muted">Select multiple photos by holding Ctrl (Cmd on Mac) while
                                        selecting</small>
                                </div>

                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">Address</label>
                                    <input name="address" type="text" class="form-control" id="inputAddress"
                                        placeholder="1234 Main St">
                                </div>

                                <div class="col-md-12">
                                    <label for="inputCity" class="form-label">City</label>
                                    <input name="city" type="text" class="form-control" id="inputCity">
                                </div>

                                <div class="col-md-4">
                                    <label for="inputZip" class="form-label">year_built</label>
                                    <input name="year_built" type="number" class="form-control" id="inputZip">
                                </div>
                                <div class="col-md-4">
                                    <label for="inputZip" class="form-label">size_area</label>
                                    <input name="size_area" type="number" class="form-control" id="inputZip">
                                </div>
                                <div class="col-md-4">
                                    <label for="inputZip" class="form-label">num_bedrooms</label>
                                    <input name="num_bedrooms" type="number" class="form-control" id="inputZip">
                                </div>
                                <div class="col-md-4">
                                    <label for="inputZip" class="form-label">num_bathrooms</label>
                                    <input name="num_bathrooms" type="number" class="form-control" id="inputZip">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Status</label>
                                    <select name="status" id="inputState" class="form-select">
                                        <option selected>Choose...</option>
                                        <option selected>rent</option>
                                        <option selected>sale</option>
                                        <option selected>soldout</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Price</label>
                                    <input name="price" type="number" class="form-control" id="inputZip">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" class="form-control" id="inputZip"></textarea>
                                </div>

                                <div class="col-md-4">
                                    <label for="inputState" class="form-label">Category</label>
                                    <select name="category_id" class="form-select">
                                        <option selected>Choose...</option>

                                        @foreach ($categories as $categoey)
                                            {{-- @dd($categories) --}}
                                            <option value="{{ $categoey->id }}">{{ $categoey->name }}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Ajouter</button>
                                </div>
                            </form>
                    </div>

                </div>


                @include('Admin.partials._footer')
            </div>
        </div>
    </div>
@endsection
