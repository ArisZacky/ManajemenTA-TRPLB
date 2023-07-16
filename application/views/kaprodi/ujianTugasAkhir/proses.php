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
              <h5 class="card-title">Proses Ujian Tugas Akhir</h5>

                <form class="row g-3" method='POST' action="<?php echo base_url('kaprodi/CUjianTugasAkhir/kaprodiAddJadwal')?>">
                    <input type="hidden" name="idUjianTA" value="<?php echo $ujianTa->idUjianTA?>">
                    <input type="hidden" name="status" value="Dijadwalkan">
                    <div class="col-md-12">
                        <label for="proses-namaMahasiswa" class="form-label">Nama Mahasiswa</label>
                        <input type="text" class="form-control" id="proses-namaMahasiswa" value="<?php echo $ujianTa->namaMahasiswa?>" disabled>
                    </div>
                    <div class="col-md-12">
                        <label for="proses-NIM" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="proses-NIM" disabled value="<?php echo $ujianTa->NIM?>">
                    </div>
                    <div class="col-md-12">
                        <label for="proses-judulProposal" class="form-label">Judul Proposal</label>
                        <input type="text" class="form-control" id="proses-judulProposal" disabled value="<?php echo $ujianTa->judulProposal?>">
                    </div>
                    <div class="col-md-6">
                        <label for="proses-pembimbing1" class="form-label">Pembimbing 1</label>
                        <input type="text" class="form-control" id="proses-pembimbing1" disabled value="<?php echo $ujianTa->namaPem1?>">
                    </div>
                    <div class="col-md-6">
                        <label for="proses-pembimbing2" class="form-label">Pembimbing 2</label>
                        <input type="text" class="form-control" id="proses-pembimbing2" disabled value="<?php echo $ujianTa->namaPem2?>">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress5" class="form-label">Abstrak</label>
                        <textarea class="form-control" id="proses-Abstrak" cols="30" rows="10" disabled><?php echo $ujianTa->abstrak?></textarea>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label">File Laporan TA</label>
                        <a href="<?php echo base_url('kaprodi/CUjianTugasAkhir/downloadFileLaporanTugasAkhir/'.$ujianTa->idUjianTA)?>">Download</a>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label">Surat Selesai Bimbingan</label>
                        <a href="<?php echo base_url('kaprodi/CUjianTugasAkhir/downloadSuratSelesaiBimbingan/'.$ujianTa->idUjianTA)?>">Download</a>
                    </div>
                    <div class="col-md-12">
                        <label for="waktu" class="form-label">Waktu</label>
                        <input type="datetime-local" class="form-control" id="waktu" name="waktu" required>
                    </div>
                    <div class="col-md-12">
                        <label for="ruangan" class="form-label">Ruangan</label>
                        <input type="text" class="form-control" id="ruangan" name="ruangan" required>
                    </div>
                    <div class="col-md-12">
                        <label for="Penguji 1" class="form-label">Penguji 1</label>
                        <select class="form-select" aria-label="Default select example" name="penguji1" id="penguji1" required>
                            <option value="">-- Pilih Penguji 1 --</option>
                            <?php foreach($dosen as $row):?>
                                <option value="<?php echo $row->NIP; ?>"><?php echo $row->namaDosen?> - <?php echo $row->NIP?></option>
                            <?php endforeach;?>
                        </select>                    
                    </div>
                    <div class="col-md-12">
                        <label for="Penguji 2" class="form-label">Penguji 2</label>
                        <select class="form-select" aria-label="Default select example" name="penguji2" id="penguji2" required>
                            <option value="">-- Pilih Penguji 2 --</option>
                            <?php foreach($dosen as $row):?>
                                <option value="<?php echo $row->NIP; ?>"><?php echo $row->namaDosen?> - <?php echo $row->NIP?></option>
                            <?php endforeach;?>
                        </select>                    
                    </div>
                    <div class="col-md-12">
                        <label for="Penguji 3" class="form-label">Penguji 3</label>
                        <select class="form-select" aria-label="Default select example" name="penguji3" id="penguji3" required>
                            <option value="">-- Pilih Penguji 3 --</option>
                            <?php foreach($dosen as $row):?>
                                <option value="<?php echo $row->NIP; ?>"><?php echo $row->namaDosen?> - <?php echo $row->NIP?></option>
                            <?php endforeach;?>
                        </select>                    
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirm-submit">
                            Simpan
                        </button>

                        <div class="modal fade" id="confirm-submit" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title">Jadwalkan Ujian</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                Apakah anda yakin untuk melakukan aksi ini?
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

                </form>

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