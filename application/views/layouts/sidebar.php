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
        <a class="nav-link collapsed" data-bs-target="#proposal-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Proposal</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="proposal-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a class="<?php if($title == 'Pengajuan Proposal'){ echo "active";}else{ echo "";}?>" href="<?php echo site_url('mahasiswa/CPengajuanProposal'); ?>">
              <i class="bi bi-circle"></i>
              <span>Pengajuan Proposal</span>
            </a>
          </li>
          <li>
            <a class="<?php if($title == 'Ujian Proposal'){ echo "active";}else{ echo "";}?>" href="<?php echo site_url('mahasiswa/CUjianProposal'); ?>">
              <i class="bi bi-circle"></i>
              <span>Ujian Proposal</span>
            </a>
          </li>
        </ul>
      </li><!-- End Pengajuan Tugas Akhir Nav --> 

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tugasAkhir-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Tugas Akhir</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tugasAkhir-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a class="<?php if($title == 'Pengajuan Tugas Akhir'){ echo "active";}else{ echo "";}?>" href="<?php echo site_url('mahasiswa/CPengajuanTugasAkhir'); ?>">
              <i class="bi bi-circle"></i>
              <span>Pengajuan Tugas Akhir</span>
            </a>
          </li>
          <li>
            <a class="<?php if($title == 'Bimbingan Tugas Akhir'){ echo "active";}else{ echo "";}?>" href="<?php echo site_url('mahasiswa/CBimbingan'); ?>">
              <i class="bi bi-circle"></i>
              <span>Bimbingan Tugas Akhir</span>
            </a>
          </li>
          <li>
            <a class="<?php if($title == 'Ujian Tugas Akhir'){ echo "active";}else{ echo "";}?>" href="<?php echo site_url('mahasiswa/CUjianTugasAkhir'); ?>">
              <i class="bi bi-circle"></i>
              <span>Ujian Tugas Akhir</span>
            </a>
          </li>
        </ul>
      </li><!-- End Pengajuan Tugas Akhir Nav --> 
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
        <a class="nav-link collapsed" data-bs-target="#ujianproposal-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Jadwal Ujian Proposal</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="ujianproposal-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a class="<?php if($title == 'Ujian Proposal Belum Dinilai'){ echo "active";}else{ echo "";}?>" href="<?php echo site_url('dosen/CUjianProposal/index'); ?>">
              <i class="bi bi-circle"></i>
              <span>Belum Dinilai</span>
            </a>
          </li>
          <li>
            <a class="<?php if($title == 'Ujian Proposal Sudah Dinilai'){ echo "active";}else{ echo "";}?>" href="<?php echo site_url('dosen/CUjianProposal/sudahDinilai'); ?>">
              <i class="bi bi-circle"></i>
              <span>Sudah Dinilai</span>
            </a>
          </li>
        </ul>
      </li><!-- End Pengajuan Tugas Akhir Nav -->    

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#bimbingan-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-clipboard"></i><span>Mahasiswa Bimbingan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="bimbingan-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a class="<?php if($title == 'Bimbingan Belum Diterima'){ echo "active";}else{ echo "";}?>" href="<?php echo site_url('dosen/CBimbingan/index'); ?>">
              <i class="bi bi-circle"></i>
              <span>Belum Diterima</span>
            </a>
          </li>
          <li>
            <a class="<?php if($title == 'Bimbingan Sudah Diterima'){ echo "active";}else{ echo "";}?>" href="<?php echo site_url('dosen/CBimbingan/sudahDinilai'); ?>">
              <i class="bi bi-circle"></i>
              <span>Sudah Diterima</span>
            </a>
          </li>
        </ul>
      </li><!-- End Pengajuan Tugas Akhir Nav -->    

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
        <a class="nav-link collapsed" data-bs-target="#proposal-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Pengajuan Proposal</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="proposal-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a class="<?php if($title == 'Pengajuan Proposal Belum Diterima'){ echo "active";}else{ echo "";}?>" href="<?php echo site_url('kaprodi/CPengajuanProposal/belumDiterima'); ?>">
              <i class="bi bi-circle"></i>
              <span>Belum Diterima</span>
            </a>
          </li>
          <li>
            <a class="<?php if($title == 'Pengajuan Proposal Sudah Diterima'){ echo "active";}else{ echo "";}?>" href="<?php echo site_url('kaprodi/CPengajuanProposal/sudahDiterima'); ?>">
              <i class="bi bi-circle"></i>
              <span>Sudah Diterima</span>
            </a>
          </li>
        </ul>

      </li><!-- End Pengajuan Tugas Akhir Nav -->    
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#ujianproposal-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Ujian Proposal</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="ujianproposal-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a class="<?php if($title == 'Ujian Proposal Sudah Dijadwal'){ echo "active";}else{ echo "";}?>" href="<?php echo site_url('kaprodi/CUjianProposal/sudahDinilai'); ?>">
              <i class="bi bi-circle"></i>
              <span>Sudah Dinilai</span>
            </a>
          </li>
          <li>
            <a class="<?php if($title == 'Ujian Proposal Belum Diterima'){ echo "active";}else{ echo "";}?>" href="<?php echo site_url('kaprodi/CUjianProposal/index'); ?>">
              <i class="bi bi-circle"></i>
              <span>Sudah Dinilai menunggu Konfirmasi</span>
            </a>
          </li>
          <li>
            <a class="<?php if($title == 'Ujian Proposal Sudah Diterima'){ echo "active";}else{ echo "";}?>" href="<?php echo site_url('kaprodi/CUjianProposal/sudahDiterima'); ?>">
              <i class="bi bi-circle"></i>
              <span>Sudah Dinilai sudah Dikonfirmasi</span>
            </a>
          </li>
        </ul>
      </li><!-- End Pengajuan Tugas Akhir Nav -->    

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tugasAkhir-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Pengajuan Tugas Akhir</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tugasAkhir-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a class="<?php if($title == 'Pengajuan Tugas Akhir Belum Diterima'){ echo "active";}else{ echo "";}?>" href="<?php echo site_url('kaprodi/CPengajuanTugasAkhir/belumDiterima'); ?>">
              <i class="bi bi-circle"></i>
              <span>Belum Diterima</span>
            </a>
          </li>
          <li>
            <a class="<?php if($title == 'Pengajuan Tugas Akhir Sudah Diterima'){ echo "active";}else{ echo "";}?>" href="<?php echo site_url('kaprodi/CPengajuanTugasAkhir/sudahDiterima'); ?>">
              <i class="bi bi-circle"></i>
              <span>Sudah Diterima</span>
            </a>
          </li>
        </ul>
      </li><!-- End Pengajuan Tugas Akhir Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#ujianTA-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Ujian Tugas Akhir</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="ujianTA-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a class="<?php if($title == 'Ujian Tugas Akhir Menunggu'){ echo "active";}else{ echo "";}?>" href="<?php echo site_url('kaprodi/CUjianTugasAkhir/menunggu'); ?>">
              <i class="bi bi-circle"></i>
              <span>Menunggu</span>
            </a>
          </li>
          <li>
            <a class="<?php if($title == 'Ujian Tugas Akhir Dijadwalkan'){ echo "active";}else{ echo "";}?>" href="<?php echo site_url('kaprodi/CUjianTugasAkhir/dijadwalkan'); ?>">
              <i class="bi bi-circle"></i>
              <span>Dijadwalkan</span>
            </a>
          </li>
          <li>
            <a class="<?php if($title == 'Ujian Tugas Akhir Lulus'){ echo "active";}else{ echo "";}?>" href="<?php echo site_url('kaprodi/CUjianTugasAkhir/lulus'); ?>">
              <i class="bi bi-circle"></i>
              <span>Lulus</span>
            </a>
          </li>
          <li>
            <a class="<?php if($title == 'Ujian Tugas Akhir Lulus Revisi'){ echo "active";}else{ echo "";}?>" href="<?php echo site_url('kaprodi/CUjianTugasAkhir/lulusRevisi'); ?>">
              <i class="bi bi-circle"></i>
              <span>Lulus Revisi</span>
            </a>
          </li>
        </ul>
      </li><!-- End Pengajuan Tugas Akhir Nav -->
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