@extends('admin.layout.layout')
@section('title', 'Dashboard')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h3>Asign Permissions</h3>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <br>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Permissions</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($asign_permissions as $permission)
                                        @if ($i % 2 == 1)
                                            <tr class="table-success">
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $permission->name }}</td>
                                                <td>{{ $permission->email }}</td>
                                                <td>{{ $permission->role }}</td>
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
