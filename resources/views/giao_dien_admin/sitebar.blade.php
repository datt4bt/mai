<div class="left side-menu">
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
        <i class="ion-close"></i>
    </button>

    <div class="left-side-logo d-block d-lg-none">
        <div class="text-center">

            <a href="{{ route('page_admin.home') }}" class="logo"><img src="{{ asset('images/logo-dark.png') }}" height="20" alt="logo"></a>
        </div>
    </div>

    <div class="sidebar-inner slimscrollleft">

        <div id="sidebar-menu">
            <ul>


                <li>
                    <a href="{{ route('page_admin.home') }}" class="waves-effect">
                        <i class="mdi mdi-home"></i>
                        <span> Trang Chủ <span class="badge badge-success badge-pill float-right"></span></span>
                    </a>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-book-minus"></i> <span>Sản phẩm</span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('page_admin.product.insert') }}">Thêm Sản phẩm</a></li>
                        <li><a href="{{ route('page_admin.product.getAll') }}">Quản lí Sản phẩm</a></li>

                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-book-minus"></i> <span>Ảnh sản phẩm</span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('page_admin.image_product.insert') }}">Thêm Ảnh sản phẩm</a></li>
                        <li><a href="">Quản lí Ảnh sản phẩm</a></li>

                    </ul>
                </li>






                @if (Session::get('cap_do')==0)
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-book-minus"></i> <span>Admin</span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="">Thêm Admin</a></li>
                        <li><a href="">Quản lí Admin</a></li>

                    </ul>
                </li>

                @endif
            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>
