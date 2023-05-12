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
          <li class="breadcrumb-item">CRUD Dosen</li>
          <li class="breadcrumb-item active">Edit Dosen</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section create dosen">
      <div class="row">
      <div class="w3-panel w3-blue w3-display-container">
            <?php echo $this->session->flashdata('success'); ?>
      </div>
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Dosen</h5>

              <!-- Multi Columns Form -->
              <form name="createDosen" class="row g-3" method="POST" action="" enctype="multipart/form-data">
                <div class="col-md-12">
                  <label for="namaDosen" class="form-label">Nama Dosen</label>
                  <input type="text" class="form-control" id="namaDosen" name="namaDosen" value="<?php echo $dosen->namaDosen ?>">
                </div>
                <div class="col-md-6">
                  <label for="NIP" class="form-label">NIP</label>
                  <input type="text" class="form-control" id="NIP" name="NIP" value="<?php echo $dosen->NIP ?>">
                </div>
                <div class="col-md-6">
                  <label for="prodi" class="form-label">Prodi</label>
                  <input type="text" class="form-control" id="prodi" name="prodi" value="<?php echo $dosen->prodi ?>">
                </div>
                <div class="col-12">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" name="email" value="<?php echo $dosen->email ?>">
                </div>
                <div class="text-center">
                  <input class="btn btn-primary" type="submit" name="submit" value="Submit" />
                  <input class="btn btn-secondary" type="reset" value="Reset">
                  <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                  <!-- <button type="reset" class="btn btn-secondary">Reset</button> -->
                </div>
              </form><!-- End Multi Columns Form -->

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