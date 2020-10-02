@extends('giao_dien_admin.index')
@section('content')
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-jet-dropdown-link href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                                            this.closest('form').submit();">
            {{ __('Logout') }}
        </x-jet-dropdown-link>
    </form>
    <a href="{{ route('product.insert') }}"><button type="button" class="btn btn-primary">Add Product</button></a>
@endsection
