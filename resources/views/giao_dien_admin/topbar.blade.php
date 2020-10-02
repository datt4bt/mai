<div class="topbar">

    <div class="topbar-left	d-none d-lg-block">
        <div class="text-center">

           <a href="{{ route('page_admin.home') }}"> <img src="{{ asset('images/bkacad.jpg') }}" class="logo" width="255px"  height="70px" alt="logo"></a>
        </div>
    </div>

    <nav class="navbar-custom">

        <ul class="list-inline float-right mb-0">
            <li class="list-inline-item notification-list dropdown d-none d-sm-inline-block">
                <form  role="search" class="app-search" method="GET">
                    <div class="form-group mb-0">
                    <input type="text" class="form-control"  placeholder="Bạn muốn tìm gì?">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </li>






                <li class="list-inline-item dropdown notification-list">





                 <a class="mdi mdi-bell-outline noti-icon" data-toggle="dropdown" href="#" role="button"
                 aria-haspopup="false" aria-expanded="false">

                  <span class="mdi mdi-account-circle"></span>
              </a>




                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                    <a class="dropdown-item" href=""><i class="mdi mdi-account-circle m-r-5 text-muted"></i>Thông tin tài khoản</a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                             onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                            {{ __('Logout') }}
                        </x-jet-dropdown-link>
                    </form>
                </div>
            </li>

        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="list-inline-item">
                <button type="button" class="button-menu-mobile open-left waves-effect">
                    <i class="ion-navicon"></i>
                </button>
            </li>
        </ul>

        <div class="clearfix"></div>

    </nav>

</div>
