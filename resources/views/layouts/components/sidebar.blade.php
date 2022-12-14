<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Universitas Bina Darma</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Rekrutmen
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.lowongan-kerja.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Pengajuan Lowongan
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/data_pelamar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Pelamar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.jadwal-tes.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jadwal Tes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.hasil-interview.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hasil Interview</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Pegawai
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.data-pegawai.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Data Pegawai
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.data-karyawan.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Data Karyawan
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.kontrak-pegawai.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kontrak Pegawai</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.re-kontrak-pegawai.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Re-Kontrak Pegawai</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.pengajuan-kontrak-pegawai.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengajuan Kontrak Pegawai</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Unit Kerja
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.kategori-unit-kerja.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Kategori Unit Kerja
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.data-unitkerja.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Data Unit Kerja
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.kontrak-unitkerja.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kontrak Unit Kerja</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.re-kontrak-unitkerja.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Re-Kontrak Unit Kerja</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.pengajuan-kontrak-unitkerja.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengajuan Kontrak Unit Kerja</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Training
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.training-pegawai.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Pegawai
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.training-unitkerja.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unit Kerja</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Permohonan Penugasan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.permohonan-penugasan-pegawai.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Pegawai
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.permohonan-penugasan-unitkerja.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unit Kerja</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Penugasan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.penugasan-pegawai.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Pegawai
                  </p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="{{route('admin.penugasan-unitkerja.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unit Kerja</p>
                </a>
              </li> --}}
            </ul>
          </li>
          <li class="nav-item menu">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Pesan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.pesan.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Buat Pesan
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.pesan-masuk.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pesan Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.pesan-keluar.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pesan Keluar</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Mutasi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.mutasi-pegawai.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Pegawai
                  </p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="{{route('admin.mutasi-unitkerja.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unit Kerja</p>
                </a>
              </li> --}}
            </ul>
          </li>
          <li class="nav-item menu">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Lembur
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.lembur-pegawai.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Pegawai
                  </p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="{{route('admin.lembur-unitkerja.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unit Kerja</p>
                </a>
              </li> --}}
            </ul>
          </li>
          <li class="nav-item menu">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Pensiun
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.pensiun-pegawai.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Pegawai
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.pengajuan-pensiun-pegawai.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Pengajuan Pensiun Pegawai
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.pensiun-unitkerja.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Unit Kerja
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.pengajuan-pensiun-unitkerja.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Pengajuan Pensiun Unit Kerja
                  </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Resign
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.resign-pegawai.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Pegawai
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.resign-unitkerja.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unit Kerja</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- <li class="nav-item">
            <a href="/pensiun" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Mutasi Pekerja
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/pensiun" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Pensiun
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Kontrak Pegawai
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kontrak Calon Pegawai</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/boxed.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Re-Kontrak Pegawai</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/datapegawai" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Pegawai
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/mutasipegawai" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Mutasi Pegawai
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/lembur" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Lembur
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/training" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                Training
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/penugasan" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Penugasan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/resign" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Resign
              </p>
            </a>
          </li> -->
          <li class="nav-header">Pembuatan Akun</li>
          <li class="nav-item">
            <a href="/daftarakun" class="nav-link active">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Pendaftaran Akun
                <span class="badge badge-info right"></span>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
