@extends('admin.layout.layout')
@section('title', 'Dashboard')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h3>Permissions</h3>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <div class="text-right">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#add-permission">Add Permission</button>
                            </div>

                            <div class="modal fade" id="add-permission" tabindex="-1" role="dialog"
                                aria-labelledby="addPermissionLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addPermissionLabel">Add Role</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('admin/add-role') }}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="name">Role Name</label>
                                                    <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter permission name" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Permissions</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($permissions as $permission)
                                        @if ($i % 2 == 1)
                                            <tr class="table-success">
                                                <td>{{ $i++ }}</td>
                                                <td> {{ $permission->name }}</td>
                                                <td>
                                                    <a href="{{url('admin/edit-permission/'.$permission->id)}}" class="btn btn-primary btn-xs"><i
                                                            class="ti-slice"></i></a>
                                                    <form id="delete-form-{{ $permission->id }}" method="post" action="{{url('admin/delete-permission/'.$permission->id)}}" style="display: none">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                    <button title="Delete permission " onclick="if(confirm('Are you sure to delete this permission?')){
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{ $permission->id }}').submit();
                                                        }else{
                                                        event.preventDefault();
                                                        } "class="btn btn-danger btn-xs">
                                                        <i class="ti-trash" aria-hidden="true"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @else
                                            <tr class="table-primary">
                                                <td>{{ $i++ }}</td>
                                                <td> {{ $permission->name }}</td>
                                                <td>
                                                    <a href="{{url('admin/edit-permission/'.$permission->id)}}" class="btn btn-primary btn-xs"><i
                                                            class="ti-slice"></i></a>

                                                    <form id="delete-form-{{ $permission->id }}" method="post" action="{{url('admin/delete-permission/'.$permission->id)}}" style="display: none">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                    <button title="Delete permission " onclick="if(confirm('Are you sure to delete this permission?')){
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{ $permission->id }}').submit();
                                                        }else{
                                                        event.preventDefault();
                                                        } "class="btn btn-danger btn-xs">
                                                        <i class="ti-trash" aria-hidden="true"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
