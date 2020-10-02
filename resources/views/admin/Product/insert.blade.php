
@extends('giao_dien_admin.index')
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1 style="text-align: center">Thêm Sản Phẩm</h1>
    <form class="needs-validation" action="{{ route('page_admin.product.processInsert') }}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="exampleInputEmail1">Tên</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Ảnh</label>
            <input type="file" name="picture" class="form-control-file" id="exampleFormControlFile1" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Tóm tắt</label>
            <textarea class="form-control" name="summary" id="summary" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Mô tả</label>
            <textarea class="form-control"  name="description" id="description" rows="3" required></textarea>
        </div>


        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>

@endsection
@push('js')
    <script src={{ url('ckeditor/ckeditor.js') }}></script>
    <script>
        CKEDITOR.replace( 'summary', {
            filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',

        } );
        //
        CKEDITOR.replace( 'description', {
            filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',

        } );
    </script>
    @include('ckfinder::setup')
@endpush

