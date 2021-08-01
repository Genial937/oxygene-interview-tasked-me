@extends('layouts.app')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
         {{-- Page header --}}
         <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Create User</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Create User</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="{{ route('users.index') }}" class="btn btn-dark btn-sm"><i class="fa fa-chevron-left"></i> Back</a>

                </div>
            </div>
        </div>
        {{-- page header --}}
        <div class="page-body">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Create User</h2>
                </div>
                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <p>{{ session('message') }}</p>
                        </div>
                    @endif
                       <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                           <div class="row">
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <label for="">First Name</label>
                                     <input type="text" name="first_name" class="form-control" required>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Last Name</label>
                                    <input type="text" name="last_name" class="form-control">
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" name="phone" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" name="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                           </div>
                       </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
