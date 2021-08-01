@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            {{-- Page header --}}
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Edit Blog</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Blog</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                    <a href="{{ route('blogs.index') }}" class="btn btn-dark btn-sm"><i class="fa fa-chevron-left"></i> Back</a>

                </div>
                </div>
            </div>

            {{-- page header --}}
            <div class="page-body">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Edit Blog</h2>
                    </div>
                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                <p>{{ session('message') }}</p>
                            </div>
                        @endif
                        <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Blog Title</label>
                                        <textarea name="title" id="" cols="30" rows="1" class="form-control"
                                            required>{{ $blog->title }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Update Photo</label>
                                        <input type="file" name="photo" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <img src="{{ asset($blog->photo) }}" width="60" height="60" alt="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Blog Content</label>
                                        <textarea name="content" id="" cols="30" rows="5" class="form-control"
                                            required>{{ $blog->content }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
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
