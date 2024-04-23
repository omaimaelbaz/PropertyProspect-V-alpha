@extends('Admin.partials._tagshtml')

@section('content')
<div class="container-scroller">
    @include('Admin.partials._navbar')
    <div class="container-fluid page-body-wrapper">
    @include('Admin.partials._sidebar')
    <div class="main-panel">
        <div class="content-wrapper">

            <div class="card-body">
                <h4 class="card-title">Add User</h4>
                <form class="forms-sample">
                  <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail3">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword4">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" id="role">
                        <option value=""></option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>File upload</label>
                    <input type="file" name="img[]" class="file-upload-default">
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                      </span>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                  <button class="btn btn-light">Cancel</button>
                </form>
              </div>

        </div>

    @include('Admin.partials._footer')
    </div>
    </div>
</div>
@endsection
