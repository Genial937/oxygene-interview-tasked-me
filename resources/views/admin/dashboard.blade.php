@extends('layouts.app')


@section('content')
<div class="page-wrapper">

    <!-- Page Content -->
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Welcome Admin!</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                <div class="card dash-widget">
                    <div class="card-body">
                        <span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
                        <div class="dash-widget-info">
                            <h3>{{ $blog }}</h3>
                            <span>Blogs</span>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="card dash-widget">
                    <div class="card-body">
                        <span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
                        <div class="dash-widget-info">
                            <h3>3</h3>
                            <span>orders</span>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                <div class="card dash-widget">
                    <div class="card-body">
                        <span class="dash-widget-icon"><i class="fa fa-diamond"></i></span>
                        <div class="dash-widget-info">
                            <h3>{{ $contact }}</h3>
                            <span>Contacts</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                <div class="card dash-widget">
                    <div class="card-body">
                        <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                        <div class="dash-widget-info">
                            <h3>{{ $users }}</h3>
                            <span>users</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div class="row">
            <div class="col-md-12 d-flex">
                <div class="card card-table flex-fill">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Latest Blogs</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive p-3">
                            <table class="table table-sm mb-0">
                                <thead>
                                    <tr>
                                        <th>Blog Photo</th>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Posted On</th>
                                        <th>Posted By</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach ($blogs as $blog)
                                   <tr>
                                    <td><img src="{{ asset($blog->photo) }}" width="60px" height="60px" alt=""></td>
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
                    <div class="card-footer">
                        <a href="{{ route('blogs.index') }}">View all blogs</a>
                    </div>
                </div>
            </div>
            <div class="col-md-12 d-flex">
                <div class="card card-table flex-fill">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Contacts</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive p-3">
                            <table class="table table-sm mb-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        {{-- <th class="text-right">Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contacts as $contact)
                                    <tr>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->message }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('contacts.index') }}">View all contacts</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /Page Content -->

</div>
@endsection
