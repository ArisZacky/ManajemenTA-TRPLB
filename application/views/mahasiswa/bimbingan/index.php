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
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Bimbingan Tugas Akhir</h5>

              <!-- Pills Tabs -->
              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="pills-pembimbing1-tab" data-bs-toggle="pill" data-bs-target="#pills-pembimbing1" type="button" role="tab" aria-controls="pills-pembimbing1" aria-selected="true">Pembimbing 1</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-pembimbing2-tab" data-bs-toggle="pill" data-bs-target="#pills-pembimbing2" type="button" role="tab" aria-controls="pills-pembimbing2" aria-selected="false">Pembimbing 2</button>
                </li>
              </ul>

              <div class="tab-content pt-2" id="myTabContent">
                <div class="tab-pane fade show active" id="pills-pembimbing1" role="tabpanel" aria-labelledby="pembimbing1-tab">
                <button class ="btn btn-primary" onclick="uploadRevisi(<?= $pengajuan->idPengajuanTA;?>)" type="button" data-bs-toggle="modal" data-bs-target="#modalPembimbing1">Buat Bimbingan</button>
                <h5>Nama Pembimbing : <?php echo $p1->namaDosen?></h5>
                <h5>Judul Proposal  : <?php echo $pengajuan->judulProposal?></h5>
                  Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.
                </div>
                <div class="tab-pane fade" id="pills-pembimbing2" role="tabpanel" aria-labelledby="profile-tab">
                  Nesciunt totam et. Consequuntur magnam aliquid eos nulla dolor iure eos quia. Accusantium distinctio omnis et atque fugiat. Itaque doloremque aliquid sint quasi quia distinctio similique. Voluptate nihil recusandae mollitia dolores. Ut laboriosam voluptatum dicta.
                </div>
              </div><!-- End Pills Tabs -->

            </div>
          </div>
      </div>
    </section>

<!-- MODAL BIMBINGAN -->
    <div class="modal fade" id="modalPembimbing1" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Buat Revisi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <?php echo form_open_multipart('mahasiswa/CUjianProposal/addRevisi');?>
          <form action="<?php echo base_url('mahasiswa/CUjianProposal/addRevisi'); ?>" method="POST" enctype="multipart/form-data">
            <label for="fileProposal" class="">Upload Revisi</label>
            <input type="hidden" id="revisi-idUjianProposal" name="idUjianProposal">
            <input type="hidden" name="status" value="Tahap Revisi">
            <input class="form-control" type="file" name="fileRevisi" required>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" id="submit" class="btn btn-primary" value="Simpan"></input>
          </div>
          </form>
        </div>
      </div>
    </div><!-- End Vertically centered Modal-->
    
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