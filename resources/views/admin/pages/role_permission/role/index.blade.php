@extends('admin.layout.layout')
@section('title', 'Dashboard')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h3>Roles</h3>
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
                                data-target="#add-permission">Add Role</button>
                                <a type="button" href="{{ url('admin/asign-role') }}" class="btn btn-primary">Asign Role</a>
                            </div>

                            <div class="modal fade" id="add-permission" tabindex="-1" role="dialog"
                                aria-labelledby="addPermissionLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addRoleLabel">Add Role</h5>
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
                                                <div class="form-group">
                                                    <label class="form-control-label" for="permission">Permission</label>
                                                    <br>
                                                    @foreach ($permissions as $permission)
                                                            <div class="custom-control custom-control-inline">
                                                                <input type="checkbox" id="permission{{$permission->name}}" name="permission[]" value="{{ $permission->id}}"
                                                                    class="custom-control-input">
                                                                <label class="custom-control-label" for="permission{{$permission->name}}">{{ $permission->name }}</label>
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
                        <br>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="table-info">
                                        <th>#</th>
                                        <th>Role</th>
                                        <th>Permissions</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($roles as $role)
                                        @if ($i % 2 == 1)
                                            <tr class="table-success">
                                                <td>{{ $i++ }}</td>
                                                <td> {{ $role->name }}</td>
                                                <td>
                                                    @php
                                                        $role_base_permissions = Illuminate\Support\Facades\DB::table('role_has_permissions')->where('role_id',$role->id)->get();
                                                    @endphp
                                                    @foreach ($role_base_permissions as $permissions)
                                                        @php
                                                            $permission_names = Illuminate\Support\Facades\DB::table('permissions')->where('id',$permissions->permission_id)->get();
                                                        @endphp
                                                        @foreach ($permission_names as $name)
                                                        <span class="badge badge-info">{{ $name->name }}</span>
                                                        @endforeach
                                                    @endforeach

                                                </td>
                                                @if ( $role->name == "supper_admin")
                                                <td>

                                                </td>
                                                @else
                                                <td>
                                                    <a href="{{url('admin/edit-role/'.$role->id)}}" class="btn btn-primary btn-xs"><i
                                                            class="ti-slice"></i></a>
                                                    <form id="delete-form-{{ $role->id }}" method="post" action="{{url('admin/delete-role/'.$role->id)}}" style="display: none">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                    <button title="Delete role " onclick="if(confirm('Are you sure to delete this role?')){
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{ $role->id }}').submit();
                                                        }else{
                                                        event.preventDefault();
                                                        } "class="btn btn-danger btn-xs">
                                                        <i class="ti-trash" aria-hidden="true"></i>
                                                    </button>
                                                </td>
                                                @endif
                                            </tr>
                                        @else
                                            <tr class="table-primary">
                                                <td>{{ $i++ }}</td>
                                                <td> {{ $role->name }}</td>
                                                <td>
                                                    @php
                                                        $role_base_permissions = Illuminate\Support\Facades\DB::table('role_has_permissions')->where('role_id',$role->id)->get();
                                                    @endphp
                                                    @foreach ($role_base_permissions as $permissions)
                                                        @php
                                                            $permission_names = Illuminate\Support\Facades\DB::table('permissions')->where('id',$permissions->permission_id)->get();
                                                        @endphp
                                                        @foreach ($permission_names as $name)
                                                        <span class="badge badge-info">{{ $name->name }}</span>
                                                        @endforeach
                                                    @endforeach

                                                </td>
                                                <td>
                                                    <a href="{{url('admin/edit-role/'.$role->id)}}" class="btn btn-primary btn-xs"><i
                                                            class="ti-slice"></i></a>

                                                    <form id="delete-form-{{ $role->id }}" method="post" action="{{url('admin/delete-role/'.$role->id)}}" style="display: none">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                    <button title="Delete role " onclick="if(confirm('Are you sure to delete this role?')){
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{ $role->id }}').submit();
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
