 <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{route('home')}}" style="height: 60px" class="brand-link">

                <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="" class="brand-image img-circle elevation-3"
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

                        {{-- hospital --}}
                        @if (auth()->user()->role =='admin')
                        <li class="nav-item has-treeview  @yield('hospital_open')">
                            <a href="#" class="nav-link @yield('hospital')">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                المستشفيات
                                <i class="right fas fa-angle-left"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview" >
                                <li class="nav-item">
                                    <a href="{{route('hospital.index')}}" class="nav-link @yield('hospital_index')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>كل المستشفيات</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('hospital.create')}}" class="nav-link @yield('hospital_create')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>إضافة مستشفى جديد</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        {{-- specialies --}}
                        <li class="nav-item has-treeview  @yield('specialies_open')">
                            <a href="#" class="nav-link @yield('specialies')">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                التخصصات
                                <i class="right fas fa-angle-left"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview" >
                                <li class="nav-item">
                                    <a href="{{route('specialies.index')}}" class="nav-link @yield('specialies_index')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>كل التخصصات</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('specialies.create')}}" class="nav-link @yield('specialies_create')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>إضافة تخصص جديد</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        @endif



                        @if (auth()->user()->role =='hospital')
                        {{-- doctor --}}
                        <li class="nav-item has-treeview  @yield('doctor_open')">
                            <a href="#" class="nav-link @yield('doctor')">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                الاطباء
                                <i class="right fas fa-angle-left"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview" >
                                <li class="nav-item">
                                    <a href="{{route('doctor.index')}}" class="nav-link @yield('doctor_index')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>كل الاطباء</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('doctor.create')}}" class="nav-link @yield('doctor_create')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>إضافة طبيب جديد</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        @endif


                        @if (auth()->user()->role =='doctor')
                        {{-- doctor --}}
                        <li class="nav-item has-treeview  @yield('reservations_open')">
                            <a href="#" class="nav-link @yield('reservations')">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                الكشوفات
                                <i class="right fas fa-angle-left"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview" >
                                <li class="nav-item">
                                    <a href="{{route('reservations.index')}}" class="nav-link @yield('reservations_index')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>كل الكشوفات</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('reservations.new')}}" class="nav-link @yield('reservations_create')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>الكشوفات الجديدة</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        @endif



                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
