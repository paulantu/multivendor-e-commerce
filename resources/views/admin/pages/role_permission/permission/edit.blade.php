@extends('admin.layout.layout')
@section('title', 'Dashboard')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h3>Permissions update</h3>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-4 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ url('admin/update-permission/'.$permissions->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="name">Permission Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{$permissions->name}}" aria-describedby="emailHelp" placeholder="Enter permission name" required>
                              </div>
                              <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
