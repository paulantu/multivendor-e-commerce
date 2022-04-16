@extends('admin.layout.layout')
@section('title', 'Dashboard')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h3>Role update</h3>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-4 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ url('admin/update-role/' . $roles->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="name">Role Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ $roles->name }}"
                                    aria-describedby="emailHelp" placeholder="Enter permission name" required>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="permission">Permission</label>
                                <br>
                                @foreach ($permissions as $permission)
                                    <div class="custom-control custom-control-inline">
                                        <input type="checkbox" id="permission{{ $permission->name }}"
                                            @foreach ($permissions_checked as $checked) @foreach ($checked as $value)
                                                {{ $value === $permission->id ? 'checked' : '' }} @endforeach
                                            @endforeach
                                        name="permission[]" value="{{ $permission->id }}"
                                        class="custom-control-input">
                                        <label class="custom-control-label"
                                            for="permission{{ $permission->name }}">{{ $permission->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
