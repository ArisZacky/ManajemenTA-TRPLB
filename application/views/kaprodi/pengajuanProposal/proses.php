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
          <li class="breadcrumb-item">Pengajuan Proposal</li>
          <li class="breadcrumb-item active">Approve Proposal</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section proses approve">
      <div class="row">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Approve Proposal</h5>
              <!-- Multi Columns Form -->
              <form name="approveProposal" id="approveProposal" class="row g-3" method="POST" action="" enctype="multipart/form-data">

                <input type="hidden" class="form-control" id="idProposal" name="idProposal" value="<?php echo $pengajuan->idProposal; ?>" readonly>

                <div class="col-md-12">
                  <label for="namaMahasiswa" class="form-label">Nama Mahasiswa</label>
                  <input type="text" class="form-control" id="namaMahasiswa" name="namaMahasiswa" value="<?php echo $pengajuan->namaMahasiswa; ?>" readonly>
                </div>
                <div class="col-md-12">
                  <label for="NIM" class="form-label">NIM</label>
                  <input type="text" class="form-control" id="NIM" name="NIM" value="<?php echo $pengajuan->NIM; ?>" readonly>
                </div>
                <div class="col-md-12">
                  <label for="judulProposal" class="form-label">Judul Proposal</label>
                  <input type="text" class="form-control" id="judulProposal" name="judulProposal" value="<?php echo $pengajuan->judulProposal; ?>" readonly>
                </div>
                <div class="col-md-12">
                  <label for="pembimbing1" class="form-label">Pembimbing 1</label>
                  <input type="text" class="form-control" id="pembimbing1" name="pembimbing1" value="<?php echo $pengajuan->namaDosen1; ?>" readonly>
                </div>
                <div class="col-md-12">
                  <label for="fileProposal" class="form-label">File Proposal :</label>
                  <a href="<?php echo base_url('kaprodi/CPengajuanProposal/downloadFileProposal/'.$pengajuan->NIM); ?>"><?php echo $pengajuan->fileProposal; ?></a>
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

                <div class="col-12">
                  <label for="waktu" class="form-label" id="labelWaktu" style="display:none;">Waktu Ujian</label>
                  <div class="col-md-12">
                  <input type="datetime-local" class="form-control" id="waktu" name="waktu" style="display:none;">
                  </div>
                </div>
                <div class="col-12">
                  <label for="catatan" class="form-label" id="labelRuangan" style="display:none;">Ruangan Ujian</label>
                  <div class="col-md-12">
                  <input type="text" class="form-control" id="ruangan" name="ruangan" style="display:none;">
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="penguji1" class="form-label" id="labelPenguji1" style="display:none;">Penguji 1</label>
                  <input type="text" class="form-control" id="penguji1" name="" style="display:none;" value="<?php echo $pengajuan->namaDosen1; ?>" readonly>
                  <input type="hidden" class="form-control" id="" name="penguji1" style="display:none;" value="<?php echo $pengajuan->pembimbing1; ?>" readonly>
                </div>
                <div class="row mb-3">
                  <label for="penguji2" class="col-sm-2 col-form-label" id="labelPenguji2" style="display:none;">Penguji 2</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="penguji2" id="penguji2" style="display:none;">
                        <option value="">-- Pilih Penguji 2 --</option>
                    <?php foreach($dosen as $row):?>
                        <option value="<?php echo $row->NIP; ?>"><?php echo $row->namaDosen?> - <?php echo $row->NIP?></option>
                    <?php endforeach;?>
                    </select>                    
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="penguji3" class="col-sm-2 col-form-label" id="labelPenguji3" style="display:none;">Penguji 3</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="penguji3" id="penguji3" style="display:none;">
                        <option value="">-- Pilih Penguji 2 --</option>
                    <?php foreach($dosen as $row):?>
                        <option value="<?php echo $row->NIP; ?>"><?php echo $row->namaDosen?> - <?php echo $row->NIP?></option>
                    <?php endforeach;?>
                    </select>                    
                  </div>
                </div>
                <input type="hidden" class="form-control" id="" name="statusUjianProposal" style="display:none;" value="Dijadwalkan" readonly>
                <div class="text-center">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirm-submit">
                    Simpan
                  </button>
                  <div class="modal fade" id="confirm-submit" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Terima Proposal</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Apakah anda yakin untuk menerima proposal ini?
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
              </form><!-- End Multi Columns Form -->

            </div>
          </div>
      </div>
    </section>

  </main><!-- End #main -->
  <script>
    $('#submit').click(function(){
      /* when the submit button in the modal is clicked, submit the form */
      $('#approveProposal').submit();
    });

    function showHide(elm) {


      if (elm == "Diterima") {
      //display textbox
        document.getElementById('waktu').style.display = "block";
        document.getElementById('labelWaktu').style.display = "block";
        document.getElementById('ruangan').style.display = "block";
        document.getElementById('labelRuangan').style.display = "block";
        document.getElementById('penguji1').style.display = "block";
        document.getElementById('labelPenguji1').style.display = "block";
        document.getElementById('penguji2').style.display = "block";
        document.getElementById('labelPenguji2').style.display = "block";
        document.getElementById('penguji3').style.display = "block";
        document.getElementById('labelPenguji3').style.display = "block";
      } else {
      //hide textbox
        document.getElementById('waktu').style.display = "none";
        document.getElementById('labelWaktu').style.display = "none";
        document.getElementById('ruangan').style.display = "none";
        document.getElementById('labelRuangan').style.display = "none";
        document.getElementById('penguji1').style.display = "none";
        document.getElementById('labelPenguji1').style.display = "none";
        document.getElementById('penguji2').style.display = "none";
        document.getElementById('labelPenguji2').style.display = "none";
        document.getElementById('penguji3').style.display = "none";
        document.getElementById('labelPenguji3').style.display = "none";
      }

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