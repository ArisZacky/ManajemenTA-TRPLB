<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- HEAD LOAD ASSETS -->
  <?php $this->load->view('layouts/assets');?>
  <!-- HEAD LOAD ASSETS END! -->
  
</head>

<body>

  <!-- HEADER NAVBAR -->
  <?php $this->load->view('layouts/header');?>
  <!-- HEADER NAVBAR END! -->

  <!-- SIDEBAR -->
  <?php $this->load->view('layouts/sidebar');?>
  <!-- SIDEBAR END! -->

  <!-- Start #Main -->
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Dashboard</li>
          <li class="breadcrumb-item">Ujian Tugas Akhir</li>
          <li class="breadcrumb-item active">Menunggu</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
      <div class="w3-panel w3-blue w3-display-container">
            <?php echo $this->session->flashdata('success'); ?>
      </div>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Ujian Tugas Akhir Menunggu</h5>
              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                      <th>No</th>
                      <th>Nama Mahasiswa</th>
                      <th>NIM</th>
                      <th>Judul Proposal</th>
                      <th>Model Tugas Akhir</th>
                      <th>Pembimbing 1</th>
                      <th>Pembimbing 2</th>
                      <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    if(empty($ujianTa)){
                      echo "";
                    }else{
                    $no=1;
                    foreach ($ujianTa as $row): ?>
                    <tr id="baris<?= $no?>">
                      <td>
                        <?php echo $no ?>
                      </td>
                      <td>
                        <?php echo $row->namaMahasiswa ?>
                      </td>
                      <td>
                        <?php echo $row->NIM ?>
                      </td>
                      <td>
                        <?php echo $row->judulProposal ?>
                      </td>
                      <td>
                        <?php echo $row->modelTa ?>
                      </td>
                      <td>
                        <?php echo $row->namaPem1 ?>
                      </td>
                      <td>
                        <?php echo $row->namaPem2 ?>
                      </td>
                      <td>
                        <a class="btn btn-success" href="<?php echo base_url('kaprodi/CUjianTugasAkhir/prosesJadwal/'.$row->idUjianTA);?>">Jadwalkan</a>
                      </td>
                    </tr>
                  <?php 
                    $no++;
                    endforeach;
                  } ?>
                </tbody>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- FOOTER -->
  <?php $this->load->view('layouts/footer') ?>
  <!-- END FOOTER -->
  <!-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> -->

  <!-- LOAD JAVASCRIPT -->
  <?php $this->load->view('layouts/script') ?>
  <!-- END LOAD JAVASCRIPT -->

</body>

</html>