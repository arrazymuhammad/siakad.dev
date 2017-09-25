                <li class="start {{\App\Helper\ViewHelper::activeRoute('absen')}}">
                    <a href="{{url('absen')}}">
                        <i class="fa fa-list"></i>
                        <span class="title">Absensi</span>
                    </a>
                </li>               
                <li class="start {{\App\Helper\ViewHelper::activeRoute('matakuliah')}}">
                    <a href="{{url('matakuliah')}}">
                        <i class="icon-list-1"></i>
                        <span class="title">Mata Kuliah</span>
                    </a>
                </li>               
                <li class="start {{\App\Helper\ViewHelper::activeRoute('mahasiswa')}}">
                    <a href="{{url('mahasiswa')}}">
                        <i class="fa fa-user"></i>
                        <span class="title">    Mahasiswa </span>
                    </a>
                </li>
                <li class="start {{\App\Helper\ViewHelper::activeRoute('setting')}}">
                    <a href="#setting" aria-expanded="false" data-toggle="collapse">
                        <i class="fa fa-cog"></i>
                        <span class="title">Setting</span>
                    </a>
                    <ul id="setting" class="collapse list-unstyled">
                        <li><a href="#">Kartu</a></li>
                        <li><a href="#">Profile</a></li>
                    </ul>
                </li>