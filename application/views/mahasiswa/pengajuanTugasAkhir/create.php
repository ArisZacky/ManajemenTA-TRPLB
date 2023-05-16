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
      <h1>Buat Pengajuan Tugas Akhir</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Dashboard</li>
          <li class="breadcrumb-item">Pengajuan Tugas Akhir</li>
          <li class="breadcrumb-item active">Buat Pengajuan Tugas Akhir</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Buat Pengajuan Tugas Akhir</h5>

              <!-- General Form Elements -->
              <?php echo form_open_multipart('mahasiswa/CPengajuanTugasAkhir/add');?>
              <!-- <form name="createPengajuanTugasAkhir" method="POST" action="<?php echo base_url('mahasiswa/CPengajuanTugasAkhir/add'); ?>" > -->
                <div class="row mb-3">
                  <label for="namaMahasiswa" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $this->session->userdata('nama'); ?>" readonly>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="NIM" class="col-sm-2 col-form-label">NIM</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $this->session->userdata('NIM/NIP'); ?>" name="NIM" id="NIM" readonly>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="prodi" class="col-sm-2 col-form-label">Prodi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $this->session->userdata('prodi'); ?>" readonly>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="email" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" value="<?php echo $this->session->userdata('email'); ?>" readonly>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="judulProposal" class="col-sm-2 col-form-label">Judul Proposal</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="judulProposal" id="judulProposal">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="abstrak" class="col-sm-2 col-form-label">Abstrak</label>
                  <div class="col-sm-10">
                  <textarea class="form-control" style="height: 100px" name="abstrak" id="abstrak"></textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="pembimbing1" class="col-sm-2 col-form-label">Dosen Pembimbing 1</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="pembimbing1" id="pembimbing1">
                        <option value="">Pilih Dosen Pembimbing 1</option>
                    <?php foreach($dosen as $row):?>
                        <option value="<?php echo $row->NIP; ?>"><?php echo $row->namaDosen?> - <?php echo $row->NIP?></option>
                    <?php endforeach;?>
                    </select>                    
                  </div>
                </div>
                <!-- <div class="row mb-3">
                  <label for="judulProposal" class="col-sm-2 col-form-label">Berkas Proposal</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="berkasProposal" id="berkasProposal">
                  </div>
                </div> -->
                <div class="row mb-3">
                  <label for="berkasProposal" class="col-sm-2 col-form-label">Berkas Proposal</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile" name="berkasProposal" id="berkasProposal">
                  </div>
                </div>
                <input type="hidden" name="status" id="status" value="Diproses">
                
                <div class="row mb-3">
                    <div class="text-center">
                        <input class="btn btn-primary" type="submit" name="submit" value="Ajukan Proposal" />
                        <input class="btn btn-secondary" type="reset" value="Reset">
                    </div>
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


  <script language= "javascript" >
  function hapusdata(NIP){
    if(confirm("Apakah yakin menghapus data ini ?")){
      window.open("<?php echo base_url()?>admin/CCrudDosen/delete/"+NIP,"_self");
    }
  }

</script>
</body>

</html>