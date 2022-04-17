@extends('admin.layout.layout')
@section('title', 'Dashboard')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h3>Asign Role</h3>
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
                                    @foreach ($users as $user)
                                        @if ($i % 2 == 1)
                                            <tr class="table-success">
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td> {{ $user->email }}</td>
                                                <td>
                                                    <a href="{{url('admin/user-asign-role/'.$user->id)}}" title="asign a role" class="btn btn-primary btn-xs"><i
                                                            class="ti-slice"></i></a>
                                                </td>
                                            </tr>
                                        @else
                                            <tr class="table-primary">
                                                <td>{{ $i++ }}</td>
                                                <td> {{ $user->name }}</td>
                                                <td> {{ $user->email }}</td>
                                                <td> {{ $user->email }}</td>
                                                <td> {{ $user->email }}</td>
                                                <td>
                                                    <a href="{{url('admin/edit-permission/'.$user->id)}}" title="asign a role" class="btn btn-primary btn-xs"><i
                                                            class="ti-slice"></i></a>
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
