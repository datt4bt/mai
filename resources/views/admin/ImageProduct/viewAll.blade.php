@extends('giao_dien_admin.index')
@section('content')
    <a href="{{ route('page_admin.image_product.insert') }}">Add Image Product</a>
    <table id="table" class="table">
        <tr>
            <td>Mã</td>
            <td>Ảnh</td>
            <td>Thể loại</td>
            <td></td>
        </tr>

        @foreach($imageProducts as $imageProduct)
            <tr data-id="{{ $imageProduct->id }}">
                <td>{{$imageProduct->id}}</td>
                <td><img src="{{ asset('storage').'/'. $imageProduct->name }}" alt="" class="img-thumbnail"></td>
                <td>{{ $imageProduct->product->name }}</td>
                <td><a class="delete btn btn-primary " id="{{ $imageProduct->id }}"
                       onclick="return confirm('Are you sure you want to delete this item?');" href="#">Xóa</a></td>
            </tr>

        @endforeach


    </table>
@endsection
@push('js')

    <script src="{{ asset('js1/imageProduct/delete.js') }}"></script>
@endpush
