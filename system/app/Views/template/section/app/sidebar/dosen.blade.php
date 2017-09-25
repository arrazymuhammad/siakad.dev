                <li class="start {{\App\Helper\ViewHelper::activeRoute('dosen/absen')}}">
                    <a href="{{url('/dosen/absen')}}">
                        <i class="fa fa-list"></i>
                        <span class="title">Absensi</span>
                    </a>
                </li>               
                <li class="start {{\App\Helper\ViewHelper::activeRoute('dosen/matakuliah')}}">
                    <a href="{{url('/dosen/matakuliah')}}">
                        <i class="icon-list-1"></i>
                        <span class="title">Mata Kuliah</span>
                    </a>
                </li>               
                <li class="start {{\App\Helper\ViewHelper::activeRoute('dosen/mahasiswa')}}">
                    <a href="{{url('/dosen/mahasiswa')}}">
                        <i class="fa fa-user"></i>
                        <span class="title">    Mahasiswa </span>
                    </a>
                </li>
                <li class="start {{\App\Helper\ViewHelper::activeRoute('dosen/setting')}}">
                    <a href="#setting" aria-expanded="false" data-toggle="collapse">
                        <i class="fa fa-cog"></i>
                        <span class="title">Setting</span>
                    </a>
                    <ul id="setting" class="collapse list-unstyled">
                        <li><a href="#">Kartu</a></li>
                        <li><a href="#">Profile</a></li>
                    </ul>
                </li>