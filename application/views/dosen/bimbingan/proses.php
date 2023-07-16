<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Penilaian Proposal</title>
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
      <h1>Penilaian Proposal</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Dashboard</li>
          <li class="breadcrumb-item">Pengajuan Proposal</li>
          <li class="breadcrumb-item active">Penilaian Proposal</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Proses Bimbingan</h5>

              <!-- General Form Elements -->

              <form name="prosesBimbingan" method="POST" action="<?php echo base_url('dosen/CBimbingan/updateBimbingan'); ?>" >
              <input type="hidden" class="form-control" value="<?php echo $output->idBimbingan; ?>" name="idBimbingan">
                <div class="row mb-3">
                  <label for="namaMahasiswa" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $output->namaMahasiswa; ?>" readonly disabled>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="judulProposal" class="col-sm-2 col-form-label">Judul Proposal</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $output->judulProposal; ?>" name="judulProposal" id="judulProposal" readonly disabled>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="modelTa" class="col-sm-2 col-form-label">Model TA</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $output->modelTa; ?>" readonly disabled>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Bimbingan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $output->tanggal; ?>" readonly disabled>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="berkasBimbingan" class="col-sm-2 col-form-label">Berkas Bimbingan</label>
                  <div class="col-sm-10">
                    <a href="<?php echo base_url('dosen/CBimbingan/downloadFileBimbingan/'.$output->idBimbingan); ?>" target="__blank"><?php echo $output->berkasBimbingan ?></a>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="status" class="col-sm-2 col-form-label">Status</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="status" id="status"  onchange="showHide(this.value)">
                        <option value="">-- Pilih Status --</option>
                        <option value="Diterima" id="Diterima">Diterima</option>
                        <!-- <option value="Diterima Dengan Catatan" id="Diterima Dengan Catatan">Diterima dengan Catatan</option> -->
                    </select>                    
                  </div>
                </div>

                <div class="text-center">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirm-submit">
                    Simpan
                  </button>
                  <div class="modal fade" id="confirm-submit" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Konfirmasi</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Apakah anda yakin melakukan aksi ini?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <input type="submit" id="submit" class="btn btn-primary" value="Simpan"></input>
                        </div>
                      </div>
                    </div>
                  </div><!-- End Vertically centered Modal-->
                  <input class="btn btn-secondary" type="reset" value="Reset">
                  <!-- <button type="submit" class="btn btn-primary" >Submit</button> -->
                  <!-- <button type="reset" class="btn btn-secondary">Reset</button> -->
                </div>

              </form><!-- End General Form Elements -->

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