@extends('layouts.app')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
         {{-- Page header --}}
         <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Products</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Products</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="{{ route('products.create') }}" class="btn btn-dark btn-sm"><i class="fa fa-plus"></i> Add Product</a>

                </div>
            </div>
        </div>
        {{-- page header --}}
        <div class="page-body">
             <div class="card">
                 <div class="card-header">
                     <h2 class="card-title">Products</h2>
                 </div>
                 <div class="card-body">
                     <table class="table table-sm">
                         <thead>
                             <th>Product name</th>
                             <th>Photo</th>
                             <th>Earlier Price</th>
                             <th>Current Price</th>
                             <th>Collection</th>
                             <th>Action</th>
                         </thead>
                         <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->product_name }}</td>
                                <td><img src="{{ asset($product->photo) }}" width="60px" height="60px" alt=""></td>
                                <td>${{ $product->former_price }}</td>
                                <td>${{ $product->new_price }}</td>
                                <td>{{ $product->collections->collection_name }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-success mr-2"><i class="fa fa-pencil"></i></a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
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
