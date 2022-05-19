 <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{route('home')}}" style="height: 60px" class="brand-link">
                <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">{{Helper::GeneralSiteSettings('name')}}</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ Auth::user()->photo ? asset('uploads/users/'.Auth::user()->photo) : asset('uploads/users/user.png') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="{{route('profile')}}" class="d-block">{{Auth::user()->name}}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item">
                            <a href="{{route('home')}}" class="nav-link @yield('home')">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                  الرئيسية
                            </p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{route('setting')}}" class="nav-link @yield('setting')">
                            <i class="nav-icon far fa-calendar-alt"></i>
                            <p>
                                الاعدادات العامة
                            </p>
                            </a>
                        </li> --}}

                        {{-- clinic --}}

                        <li class="nav-item has-treeview  @yield('sections_open')">
                            <a href="#" class="nav-link @yield('sections')">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                المستشفيات
                                <i class="right fas fa-angle-left"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview" >
                                <li class="nav-item">
                                    <a href="{{route('clinic.index')}}" class="nav-link @yield('clinic_index')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>كل المستشفيات</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('clinic.create')}}" class="nav-link @yield('clinic_create')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>إضافة مستشفى جديد</p>
                                    </a>
                                </li>

                            </ul>
                        </li>



                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
