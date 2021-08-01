@extends('layouts.app')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
         {{-- Page header --}}
         <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Contacts</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Contacts</li>
                    </ul>
                </div>
                {{-- <div class="col-auto float-right ml-auto">
                    <a href="{{ route('users.index') }}" class="btn btn-dark btn-sm"><i class="fa fa-plus"></i> Add Product</a>

                </div> --}}
            </div>
        </div>
        {{-- page header --}}
        <div class="page-body">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">contacts</h2>
                </div>
                <div class="card-body">
                    <table class="table table-sm">
                        <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                        </thead>
                        <tbody>
                            @php($count = 1)
                            @foreach ($contacts as $contact)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->message }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
