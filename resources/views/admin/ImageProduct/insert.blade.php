
@extends('giao_dien_admin.index')
@section('content')

    <h1 style="text-align: center">Thêm Ảnh Sản Phẩm</h1>
    <form class="needs-validation" action="{{ route('page_admin.image_product.processInsert') }}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Sản phẩm</label>
        <select class="custom-select my-1 mr-sm-2" name="product_id" id="inlineFormCustomSelectPref">
            @foreach($products as $product)
                <option value="{{$product->id}}">{{$product->name}}</option>
            @endforeach
        </select>
        <div class="form-group">
            <label for="exampleFormControlFile1">Ảnh</label>
            <input type="file" multiple name="picture[]"  class="form-control-file" id="exampleFormControlFile1"  accept="image/*"  required>
        </div>

        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>

@endsection
@push('js')

@endpush

