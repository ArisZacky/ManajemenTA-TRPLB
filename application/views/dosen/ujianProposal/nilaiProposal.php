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
              <h5 class="card-title">Penilaian Proposal</h5>

              <!-- General Form Elements -->

              <form name="createPengajuanTugasAkhir" method="POST" action="<?php echo base_url('dosen/CUjianProposal/tambahNilaiProposal'); ?>" >
              <input type="hidden" class="form-control" value="<?php echo $this->session->userdata('NIM/NIP'); ?>" name="NIP">
              <input type="hidden" class="form-control" value="<?php echo $output->idUjianProposal; ?>" name="idUjianProposal">
                <div class="row mb-3">
                  <label for="namaMahasiswa" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $output->namaMahasiswa; ?>" readonly>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="NIM" class="col-sm-2 col-form-label">NIM</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $output->NIM; ?>" name="NIM" id="NIM" readonly>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="judulProposal" class="col-sm-2 col-form-label">Judul Proposal</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $output->judulProposal; ?>" readonly>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="fileProposal" class="col-sm-2 col-form-label">File Proposal</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $output->fileProposal; ?>" readonly>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="pembimbing1" class="col-sm-2 col-form-label">Model Proposal</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" value="<?php echo $output->modelProposal; ?>" id="modelProposal" name="modelProposal" readonly>                 
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="pembimbing1" class="col-sm-2 col-form-label">Nilai Penampilan (10%)</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="k1">                 
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="pembimbing1" class="col-sm-2 col-form-label">Nilai Kesiapan Pengetahuan (20%)</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="k2">                 
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="pembimbing1" class="col-sm-2 col-form-label">Nilai Kesiapan Sumber Daya Pendukung (20%)</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="k3">                 
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="pembimbing1" class="col-sm-2 col-form-label">Nilai Keterkaitan Permasalahan, Tujuan, dan Hasil (10%)</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="k4">                 
                  </div>
                </div>

                <div class="row mb-3">
                  <label id="labelkPerencanaan" for="pembimbing1" class="col-sm-2 col-form-label">Nilai Kesiapan Perencanaan (20%)</label>
                  <label id="labelKLTP"for="pembimbing1" class="col-sm-2 col-form-label">Nilai Kesiapan Landasan Teoritis Perencanaan (20%)</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="k5" id="kPerencanaan">                 
                  </div>
                </div>

                <div class="row mb-3">
                  <label id="labelkRancangan" for="pembimbing1" class="col-sm-2 col-form-label">Nilai Kesiapan Rancangan (20%)</label>
                  <label id="labelKMPA"for="pembimbing1" class="col-sm-2 col-form-label">Nilai Kesiapan Metode Perencanaan dan Analisis (20%)</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="k6" id="kRancangan">                 
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
                          Apakah nilai yang anda masukkan sudah benar?
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
  <script>
      model = document.getElementById('modelProposal')
      if (model.value == "Analisa Sistem") {
      //display textbox
        document.getElementById('labelKMPA').style.display = "block";
        document.getElementById('labelKLTP').style.display = "block";
      } else {
      //hide textbox
        document.getElementById('labelKMPA').style.display = "none";
        document.getElementById('labelKLTP').style.display = "none";
      }

      if (model.value == "Pembuatan Alat") {
      //display textbox
        document.getElementById('labelkPerencanaan').style.display = "block";
        document.getElementById('labelkPerencanaan').style.display = "block";
      } else {
      //hide textbox
        document.getElementById('labelkPerencanaan').style.display = "none";
        document.getElementById('labelkRancangan').style.display = "none";
      }

  </script>
  <!-- FOOTER -->
  <?php $this->load->view('layouts/footer') ?>
  <!-- END FOOTER -->
  <!-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> -->

  <!-- LOAD JAVASCRIPT -->
  <?php $this->load->view('layouts/script') ?>
  <!-- END LOAD JAVASCRIPT -->
</body>

</html>