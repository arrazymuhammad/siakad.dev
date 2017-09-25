<nav class="side-navbar " style="">
                    <div class="sidebar-header d-flex align-items-center">
                        <div class="avatar"><img src="{{url('public')}}/img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="title">
                            <h1 class="h4">{{Auth::user()->nama}}</h1>
                            <p>{{Auth::user()->jabatan}}</p>
                        </div>
                    </div>
                    <ul class="list-unstyled slimscroll">
                        <span class="heading">Main</span>
                        <li class="{{\App\Helper\ViewHelper::activeRoute()}}"> <a href="{{url('/')}}"><i class="icon-home"></i>Dashboard</a></li>
                        @if(Auth::user()->level == 1)
                            @include('template.section.app.sidebar.mahasiswa')
                        @elseif(Auth::user()->level == 2)
                            @include('template.section.app.sidebar.dosen')
                        @elseif(Auth::user()->level == 3)
                            @include('template.section.app.sidebar.kajur')
                        @else
                            @include('template.section.app.sidebar.admin')
                        @endif
                    </ul>
                </nav>