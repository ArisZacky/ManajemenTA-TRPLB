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
          <li class="breadcrumb-item">Pengajuan Tugas Akhir</li>
          <li class="breadcrumb-item active">Approve Proposal</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section proses approve">
      <div class="row">
      <?php var_dump($pengajuan)?>
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Approve Proposal</h5>
              <!-- Multi Columns Form -->
              <form name="approveProposal" id="approveProposal" class="row g-3" method="POST" action="" enctype="multipart/form-data">

                <input type="hidden" class="form-control" id="idPengajuanTA" name="idPengajuanTA" value="<?php echo $pengajuan->idPengajuanTA; ?>" readonly>

                <div class="col-md-12">
                  <label for="NIM" class="form-label">NIM</label>
                  <input type="text" class="form-control" id="NIM" name="NIM" value="<?php echo $pengajuan->NIM; ?>" readonly>
                </div>
                <div class="col-md-12">
                  <label for="namaMahasiswa" class="form-label">Nama Mahasiswa</label>
                  <input type="text" class="form-control" id="namaMahasiswa" name="namaMahasiswa" value="<?php echo $pengajuan->namaMahasiswa; ?>" readonly>
                </div>
                <div class="col-md-12">
                  <label for="judulProposal" class="form-label">Judul Proposal</label>
                  <input type="text" class="form-control" id="judulProposal" name="judulProposal" value="<?php echo $pengajuan->judulProposal; ?>">
                </div>
                <div class="col-12">
                  <label for="abstrak" class="form-label">Abstrak</label>
                  <div class="col-md-12">
                  <textarea class="form-control" style="height: 100px" name="abstrak" id="abstrak" readonly><?php echo $pengajuan->abstrak; ?></textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="pembimbing1" class="form-label">Pembimbing 1</label>
                  <input type="text" class="form-control" id="pembimbing1" name="pembimbing1" value="<?php echo $pengajuan->namaDosen1; ?>" readonly>
                </div>
                <div class="col-md-12">
                  <label for="pembimbing1" class="form-label">Berkas : </label>
                  <a href=""><?php echo $pengajuan->berkasProposal; ?></a>
                </div>
                <div class="row mb-3">
                  <label for="pembimbing2" class="col-sm-2 col-form-label">Dosen Pembimbing 2</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="pembimbing2" id="pembimbing2">
                        <option value="">-- Pilih Dosen Pembimbing 2 --</option>
                    <?php foreach($dosen as $row):?>
                        <option value="<?php echo $row->NIP; ?>"><?php echo $row->namaDosen?> - <?php echo $row->NIP?></option>
                    <?php endforeach;?>
                    </select>                    
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="pembimbing1" class="col-sm-2 col-form-label">Status</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="status" id="status"  onchange="showHide(this.value)">
                        <option value="">-- Pilih Status --</option>
                        <option value="Diterima" id="Diterima">Diterima</option>
                        <option value="Diterima Dengan Catatan" id="Diterima Dengan Catatan">Diterima dengan Catatan</option>
                    </select>                    
                  </div>
                </div>
                <div class="col-12">
                  <!-- <label for="catatan" class="form-label"></label> -->
                  <div class="col-md-12">
                  <textarea class="form-control" style="display:none;height:100px" value="" name="catatan" id="catatan"></textarea>
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


      if (elm == "Diterima Dengan Catatan") {
      //display textbox
        document.getElementById('catatan').style.display = "block";
      } else {
      //hide textbox
        document.getElementById('catatan').style.display = "none";
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