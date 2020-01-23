@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Product Create
                    @include('includes.nav')
                </div>
                @include('includes.flash_message_error')

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Product SKU Number</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter SKU NUmber" name="sku_number">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Part Number</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Part Number" name="part_number">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Product Description</label>
                            <textarea class="form-control" id="exampleInputPassword1" placeholder="Product Description" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Product Specifiaction</label>
                            <textarea class="form-control" id="exampleInputPassword1" placeholder="Product Description" name="specification"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Image</label>
                            <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
