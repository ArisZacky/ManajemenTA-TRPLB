<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pengajuan Tugas Akhir</title>
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
      <h1>Bimbingan Tugas Akhir</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Dashboard</li>
          <li class="breadcrumb-item active">Bimbingan Tugas Akhir</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

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