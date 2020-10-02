@extends('giao_dien_admin.index')
@section('content')
    <a href="{{ route('page_admin.product.insert') }}">Add Product</a>
    <table id="table" class="table">
        <tr>
            <td>Mã</td>
            <td>Tên</td>
            <td>Tóm tắt</td>
            <td>Mô tả</td>
            <td></td>
            <td></td>

        </tr>

        @foreach($products as $product)
            <tr  data-id="{{ $product->id }}">
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{!! $product->summary  !!}</td>
                <td>{!! $product->description  !!}</td>

                <td><a  href="{{ route('page_admin.product.update', ['id'=>$product->id]) }}">Sửa</a></td>
                <td><a id="{{$product->id}}" onclick="return confirm('Are you sure you want to delete this item?');" class="delete"  href="#">Xóa</a></td>
            </tr>

        @endforeach


    </table>
@endsection
@push('js')

    <script src="{{ asset('js1/product/delete.js') }}"></script>
@endpush
