@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Products
                    @include('includes.nav')

                </div>
                @include('includes.flash_message_error')

                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">SKU Number</th>
                            <th scope="col">Part Number</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if(isset($data['rows']))
                            @foreach($data['rows'] as $row)
                          <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->sku_number }}</td>
                            <td>{{ $row->part_number }}</td>
                            <td>
                                <a href="{{ route('product.edit', ['id'=>$row->id])}}">Edit</a>
                                <form id="delete-form" method="POST" action="{{ route('product.destroy', ['id'=>$row->id])}}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <div class="form-group">
                                      <input type="submit" class="btn btn-danger" value="Delete">
                                    </div>
                                </form>
                            </td>
                          </tr>
                          @endforeach
                          @endif
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
