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
          <li class="breadcrumb-item">Ujian Proposal</li>
          <li class="breadcrumb-item active">Belum Diterima</li>
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
              <h5 class="card-title">Data Ujian Proposal Selesai Dinilai</h5>
              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                      <th>No</th>
                      <th>Nama Mahasiswa</th>
                      <th>NIM</th>
                      <th>Judul Proposal</th>
                      <th>File Proposal</th>
                      <th>Waktu</th>
                      <th>Ruangan</th>
                      <th>Model Proposal</th>
                      <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    if(empty($ujianProposal)){
                      echo "";
                    }else{
                    $no=1;
                    foreach ($ujianProposal as $row): ?>
                    <tr>
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
                        <?php echo $row->fileProposal ?>
                      </td>
                      <td>
                        <?php echo $row->waktu ?>
                      </td>
                      <td>
                        <?php echo $row->ruangan ?>
                      </td>
                      <td>
                        <?php echo $row->modelProposal ?>
                      </td>
                      <td>
                        <a class="btn btn-success" href="<?php echo base_url('kaprodi/CUjianProposal/proses/'.$row->idUjianProposal);?>">Terima Proposal</a>
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


  <script language= "javascript" >
  function hapusdata(NIP){
    if(confirm("Apakah yakin menghapus data ini ?")){
      window.open("<?php echo base_url()?>admin/CCrudDosen/delete/"+NIP,"_self");
    }
  }

</script>
</body>

</html>