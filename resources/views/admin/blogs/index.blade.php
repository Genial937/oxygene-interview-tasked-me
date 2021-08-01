@extends('layouts.app')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
         {{-- Page header --}}
         <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Blogs</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Blogs</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="{{ route('blogs.create') }}" class="btn btn-dark btn-sm"><i class="fa fa-plus"></i> Add Blog</a>

                </div>
            </div>
        </div>
        {{-- page header --}}
        <div class="page-body">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Blogs</h2>
                </div>
                <div class="card-body">
                    <table class="table table-sm">
                        <thead>
                            <th>#</th>
                            <th>Blog Photo</th>
                            <th>Headline</th>
                            <th>Content</th>
                            <th>Posted On</th>
                            <th>By</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @php($count = 1)
                            @foreach ($blogs as $blog)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td><img src="{{ asset($blog->photo) }}" width="60px" height="70px" alt=""></td>
                                <td>{{ $blog->title }}</td>
                                <td>{{ substr($blog->content, 0, 150) }}</td>
                                <td>{{ date('M d, Y', strtotime($blog->created_at)) }}</td>
                                <td>{{ $blog->users->first_name }}</td>
                                 <td class="d-flex">
                                     <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-success mr-1"><i class="fa fa-pencil"></i></a>
                                     <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                                     </form>
                                 </td>
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
