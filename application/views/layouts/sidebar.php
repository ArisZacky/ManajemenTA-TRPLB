  <!-- ======= Sidebar ======= -->

  <!-- Start Sidebar Mahasiswa -->
  <?php if ($this->session->userdata('level') == 'Mahasiswa') { ?>
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.html">
          <i class="bi bi-card-list"></i>
          <span>Pengajuan Tugas Akhir</span>
        </a>
      </li><!-- End Pengajuan Tugas Akhir Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.html">
          <i class="bi bi-file-earmark-text"></i>
          <span>Bimbingan Tugas Akhir</span>
        </a>
      </li><!-- End Bimbingan Tugas Akhir Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.html">
          <i class="bi bi-journals"></i>
          <span>Pengajuan Ujian Tugas Akhir</span>
        </a>
      </li><!-- End Pengajuan Ujian Tugas Akhir Nav -->
    </ul>
</aside><!-- End Sidebar Mahasiswa-->


  <!-- Start Sidebar Dosen -->
  <?php }
        if ($this->session->userdata('level') == 'Dosen') { ?>
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.html">
          <i class="bi bi-clipboard"></i>
          <span>Mahasiswa Bimbingan</span>
        </a>
      </li><!-- End Mahasiswa Bimbingan Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.html">
          <i class="bi bi-mortarboard"></i>
          <span>Mahasiswa Ujian</span>
        </a>
      </li><!-- End Mahasiswa Ujian Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.html">
          <i class="bi bi-calendar-event"></i>
          <span>Jadwal Pengujian Tugas Akhir</span>
        </a>
      </li><!-- End Jadwal Pengujian Tugas Akhir Nav -->
    </ul>

  </aside><!-- End Sidebar Dosen-->

<!-- Start Sidebar Kaprodi -->
<?php }
        if ($this->session->userdata('level') == 'Kaprodi') { ?>
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.html">
          <i class="bi bi-card-list"></i>
          <span>Pengajuan Tugas Akhir</span>
        </a>
      </li><!-- End Pengajuan Tugas Akhir Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.html">
          <i class="bi bi-file-earmark-text"></i>
          <span>Bimbingan Tugas Akhir</span>
        </a>
      </li><!-- End Bimbingan Tugas Akhir Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.html">
          <i class="bi bi-journals"></i>
          <span>Pengajuan Ujian Tugas Akhir</span>
        </a>
      </li><!-- End Pengajuan Ujian Tugas Akhir Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.html">
          <i class="bi bi-clipboard"></i>
          <span>Mahasiswa Bimbingan</span>
        </a>
      </li><!-- End Mahasiswa Bimbingan Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.html">
          <i class="bi bi-mortarboard"></i>
          <span>Mahasiswa Ujian</span>
        </a>
      </li><!-- End Mahasiswa Ujian Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.html">
          <i class="bi bi-calendar-event"></i>
          <span>Jadwal Pengujian Tugas Akhir</span>
        </a>
      </li><!-- End Jadwal Pengujian Tugas Akhir Nav -->
    </ul>
  </aside><!-- End Sidebar Kaprodi-->


  <!-- Start Sidebar Admin -->
<?php }
        if ($this->session->userdata('level') == 'Admin') { ?>
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.html">
          <i class="bi bi-card-list"></i>
          <span>Pengajuan Tugas Akhir</span>
        </a>
      </li><!-- End Pengajuan Tugas Akhir Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.html">
          <i class="bi bi-file-earmark-text"></i>
          <span>Bimbingan Tugas Akhir</span>
        </a>
      </li><!-- End Bimbingan Tugas Akhir Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.html">
          <i class="bi bi-journals"></i>
          <span>Pengajuan Ujian Tugas Akhir</span>
        </a>
      </li><!-- End Pengajuan Ujian Tugas Akhir Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.html">
          <i class="bi bi-clipboard"></i>
          <span>Mahasiswa Bimbingan</span>
        </a>
      </li><!-- End Mahasiswa Bimbingan Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.html">
          <i class="bi bi-mortarboard"></i>
          <span>Mahasiswa Ujian</span>
        </a>
      </li><!-- End Mahasiswa Ujian Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.html">
          <i class="bi bi-calendar-event"></i>
          <span>Jadwal Pengujian Tugas Akhir</span>
        </a>
      </li><!-- End Jadwal Pengujian Tugas Akhir Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo site_url('admin/ccrudmahasiswa'); ?>">
          <i class="bi bi-person"></i>
          <span>CRUD Mahasiswa</span>
        </a>
      </li><!-- End CRUD Mahasiswa Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.html">
          <i class="bi bi-person"></i>
          <span>CRUD Dosen</span>
        </a>
      </li><!-- End CRUD Mahasiswa Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.html">
          <i class="bi bi-person"></i>
          <span>CRUD Kaprodi</span>
        </a>
      </li><!-- End CRUD Mahasiswa Nav -->
    </ul>

  </aside><!-- End Sidebar Admin-->
<?php }; ?>