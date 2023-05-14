  <!-- ======= Sidebar ======= -->

  <!-- Start Sidebar Mahasiswa -->
  <?php if ($this->session->userdata('level') == 'Mahasiswa') { ?>
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link <?php if($title == 'Dashboard'){ echo "";}else{ echo "collapsed";}?> " href="<?php echo base_url('cdashboard'); ?>">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link <?php if($title == 'Pengajuan Tugas Akhir'){ echo "";}else{ echo "collapsed";}?> " href="<?php echo base_url('mahasiswa/CPengajuanTugasAkhir'); ?>">
          <i class="bi bi-card-list"></i>
          <span>Pengajuan Tugas Akhir</span>
        </a>
      </li><!-- End Pengajuan Tugas Akhir Nav -->

      <li class="nav-item">
        <a class="nav-link <?php if($title == 'Bimbingan Tugas Akhir'){ echo "";}else{ echo "collapsed";}?> " href="<?php echo base_url('cdashboard'); ?>">
          <i class="bi bi-file-earmark-text"></i>
          <span>Bimbingan Tugas Akhir</span>
        </a>
      </li><!-- End Bimbingan Tugas Akhir Nav -->

      <li class="nav-item">
        <a class="nav-link <?php if($title == 'Ujian Tugas Akhir'){ echo "";}else{ echo "collapsed";}?> " href="<?php echo base_url('cdashboard'); ?>">
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
        <a class="nav-link <?php if($title == 'Dashboard'){ echo "";}else{ echo "collapsed";}?> " href="<?php echo base_url('cdashboard'); ?>">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url('cdashboard'); ?>">
          <i class="bi bi-clipboard"></i>
          <span>Mahasiswa Bimbingan</span>
        </a>
      </li><!-- End Mahasiswa Bimbingan Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url('cdashboard'); ?>">
          <i class="bi bi-mortarboard"></i>
          <span>Mahasiswa Ujian</span>
        </a>
      </li><!-- End Mahasiswa Ujian Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url('cdashboard'); ?>">
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
        <a class="nav-link <?php if($title == 'Dashboard'){ echo "";}else{ echo "collapsed";}?> " href="<?php echo base_url('cdashboard'); ?>">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url('cdashboard'); ?>">
          <i class="bi bi-card-list"></i>
          <span>Pengajuan Tugas Akhir</span>
        </a>
      </li><!-- End Pengajuan Tugas Akhir Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url('cdashboard'); ?>">
          <i class="bi bi-file-earmark-text"></i>
          <span>Bimbingan Tugas Akhir</span>
        </a>
      </li><!-- End Bimbingan Tugas Akhir Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url('cdashboard'); ?>">
          <i class="bi bi-journals"></i>
          <span>Pengajuan Ujian Tugas Akhir</span>
        </a>
      </li><!-- End Pengajuan Ujian Tugas Akhir Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url('cdashboard'); ?>">
          <i class="bi bi-clipboard"></i>
          <span>Mahasiswa Bimbingan</span>
        </a>
      </li><!-- End Mahasiswa Bimbingan Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url('cdashboard'); ?>">
          <i class="bi bi-mortarboard"></i>
          <span>Mahasiswa Ujian</span>
        </a>
      </li><!-- End Mahasiswa Ujian Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url('cdashboard'); ?>">
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
        <a class="nav-link <?php if($title == 'Dashboard'){ echo "";}else{ echo "collapsed";}?>" href="<?php echo base_url('cdashboard'); ?>">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#crud-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Master Data</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="crud-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a class="<?php if($title == 'CRUD Mahasiswa'){ echo "active";}else{ echo "";}?>" href="<?php echo site_url('admin/ccrudmahasiswa'); ?>">
              <i class="bi bi-circle"></i>
              <span>CRUD Mahasiswa</span>
            </a>
          </li>
          <li>
            <a class="<?php if($title == 'CRUD Dosen'){ echo "active";}else{ echo "";}?>" href="<?php echo site_url('admin/ccruddosen'); ?>">
              <i class="bi bi-circle"></i>
              <span>CRUD Dosen</span>
            </a>
          </li>
          <li>
            <a class="<?php if($title == 'CRUD Kaprodi'){ echo "active";}else{ echo "";}?>" href="<?php echo site_url('admin/ccrudkaprodi'); ?>">
              <i class="bi bi-circle"></i>
              <span>CRUD Kaprodi</span>
            </a>
          </li>
          <li>
            <a class="<?php if($title == 'CRUD Admin'){ echo "active";}else{ echo "";}?>" href="<?php echo site_url('admin/ccrudadmin'); ?>">
              <i class="bi bi-circle"></i>
              <span>CRUD Admin</span>
            </a>
          </li>
        </ul>
      </li><!-- End Master Data Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tugasAkhir-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journals"></i><span>Tugas Akhir</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tugasAkhir-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a class="<?php if($title == 'Pengajuan Tugas Akhir'){ echo "active";}else{ echo "";}?>" href="<?php echo site_url('admin/ccrudmahasiswa'); ?>">
                <i class="bi bi-circle"></i>
                <span>Pengajuan Tugas Akhir</span>
            </a>
          </li>
          <li>
            <a class="<?php if($title == 'Bimbingan Tugas Akhir'){ echo "active";}else{ echo "";}?>" href="<?php echo site_url('admin/ccruddosen'); ?>">
                <i class="bi bi-circle"></i>
                <span>Bimbingan Tugas Akhir</span>
            </a>
          </li>
          <li>
            <a class="<?php if($title == 'Pengajuan Tugas Akhir'){ echo "active";}else{ echo "";}?>" href="<?php echo site_url('admin/ccrudkaprodi'); ?>">
                <i class="bi bi-circle"></i>
                <span>Pengajuan Ujian Tugas Akhir</span>
            </a>
          </li>
          <li>
            <a class="<?php if($title == 'Jadwal Pengujian Tugas Akhir'){ echo "active";}else{ echo "";}?>" href="<?php echo site_url('admin/ccrudadmin'); ?>">
                <i class="bi bi-circle"></i>
                <span>Jadwal Pengujian Tugas Akhir</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tugas Akhir Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url('cdashboard'); ?>">
          <i class="bi bi-clipboard"></i>
          <span>Mahasiswa Bimbingan</span>
        </a>
      </li><!-- End Mahasiswa Bimbingan Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url('cdashboard'); ?>">
          <i class="bi bi-mortarboard"></i>
          <span>Mahasiswa Ujian</span>
        </a>
      </li><!-- End Mahasiswa Ujian Nav -->

    </ul>

  </aside><!-- End Sidebar Admin-->
<?php }; ?>