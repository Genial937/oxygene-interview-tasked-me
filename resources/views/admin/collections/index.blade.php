@extends('layouts.app')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
         {{-- Page header --}}
         <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Collections</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ul>
                </div>
                {{-- <div class="col-auto float-right ml-auto">
                    <a href="{{ route('users.create') }}" class="btn btn-dark btn-sm"><i class="fa fa-plus"></i> Add User</a>

                </div> --}}
            </div>
        </div>
        {{-- page header --}}
        <div class="page-body">
           <div class="row">
               <div class="col-md-4">
                   <div class="card">
                       <div class="card-header">
                           <h2 class="card-title">Add Collection</h2>
                       </div>
                       <div class="card-body">
                           @if (session('message'))
                               <div class="alert alert-success">
                                   <a href="" data-dismiss="alert" class="close">&times;</a>
                                   <p>{{ session('message') }}</p>
                               </div>
                           @endif
                           <form action="{{ route('collections.store') }}" method="POST">
                            @csrf
                               <div class="form-group">
                                   <label for="">Collection name</label>
                                   <input type="text" name="collection_name" class="form-control" required>
                               </div>
                               <div class="from-group">
                                   <button type="submit" class="btn btn-primary pull-left">Submit</button>
                               </div>
                           </form>
                       </div>
                   </div>
               </div>
               <div class="col-md-8">
                   <div class="card">
                       <div class="card-header">
                           <h2 class="card-title">Collection List</h2>
                       </div>
                       <div class="card-body">
                           <table class="table table-sm">
                               <thead>
                                   <th>#</th>
                                   <th>Collection Name</th>
                                   <th>Action</th>
                               </thead>
                               <tbody>
                                   @php($count = 1)
                                   @foreach ($collections as $item)
                                   <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>{{ $item->collection_name }}</td>
                                    <td class="d-flex">
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#edit{{ $item->id }}" class="btn btn-success mr-2"><i class="fa fa-pencil"></i></a>
                                        <form action="{{ route('collections.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                                        </form>
                                    </td>
                                    <div class="modal fade" id="edit{{ $item->id }}">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <form action="{{ route('collections.update', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('put')
                                                    <div class="modal-header">
                                                        <h2 class="modal-title">Edit Collection</h2>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="">Collection Name</label>
                                                            <input type="text" class="form-control" name="collection_name" value="{{ $item->collection_name }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="#" data-dismiss="modal" class="btn btn-danger">Close</a>
                                                        <button type="submit" class="btn btn-success">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                                   @endforeach
                               </tbody>
                           </table>
                       </div>
                   </div>
               </div>
           </div>
        </div>
    </div>
</div>
@endsection
