                <li class="{{\App\Helper\ViewHelper::activeRoute('admin/dosen_pengampu')}}">
                    <a href="{{url('/admin/dosen_pengampu')}}">
                        <i class="fa fa-tasks"></i>
                        Dosen Pengampu
                    </a>
                </li>
                <li class="start {{\App\Helper\ViewHelper::activeRoute('admin/master')}}">
                    <a href="#master" aria-expanded="false" data-toggle="collapse">
                        <i class="fa fa-cog"></i>
                        <span class="title">Master</span>
                    </a>
                    <ul id="master" class="collapse list-unstyled">
                        <li><a href="{{url('admin/master/mahasiswa')}}">Mahasiswa</a></li>
                        <li><a href="{{url('admin/master/dosen')}}">Dosen</a></li>
                        <li><a href="{{url('admin/master/matakuliah')}}">Mata Kuliah</a></li>
                        <li><a href="{{url('admin/master/kelas')}}">Kelas</a></li>
                        <li><a href="{{url('admin/master/tahun_ajar')}}">Tahun Ajar</a></li>
                    </ul>
                </li>
                <li class="start {{\App\Helper\ViewHelper::activeRoute('admin/setting')}}">
                    <a href="#setting" aria-expanded="false" data-toggle="collapse">
                        <i class="fa fa-cog"></i>
                        <span class="title">Setting</span>
                    </a>
                    <ul id="setting" class="collapse list-unstyled">
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Kartu</a></li>
                    </ul>
                </li>                