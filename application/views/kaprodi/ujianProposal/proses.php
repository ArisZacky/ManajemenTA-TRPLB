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
                <h5 class="card-title">Penguji</h5>
                <!-- Default Table -->
                <div class="row">
                    <?php
                    $no=1;
                    foreach ($nilaiProposal as $nilai): ?>
                    <div class="col">
                    <h5>Dosen Penguji <?php echo $no ?></h5>
                    <table>
                        <tr>
                        <td>NIP</td>
                        <td>:</td>
                        <td><?php if($nilai != null){ echo $nilai->NIP;}else{ echo "";}?></td>
                        </tr>
                        <tr>
                        <td>Nilai Komponen 1</td>
                        <td>:</td>
                        <td><?php if($nilai != null){ echo $nilai->k1;}else{ echo "";}?></td>
                        </tr>
                        <td>Nilai Komponen 2</td>
                        <td>:</td>
                        <td><?php if($nilai != null){ echo $nilai->k2;}else{ echo "";}?></td>
                        </tr>
                        <td>Nilai Komponen 3</td>
                        <td>:</td>
                        <td><?php if($nilai != null){ echo $nilai->k3;}else{ echo "";}?></td>
                        </tr>
                        <td>Nilai Komponen 4</td>
                        <td>:</td>
                        <td><?php if($nilai != null){ echo $nilai->k4;}else{ echo "";}?></td>
                        </tr>
                        <td>Nilai Komponen 5</td>
                        <td>:</td>
                        <td><?php if($nilai != null){ echo $nilai->k5;}else{ echo "";}?></td>
                        </tr>
                        <td>Nilai Komponen 6</td>
                        <td>:</td>
                        <td><?php if($nilai != null){ echo $nilai->k6;}else{ echo "";}?></td>
                        </tr>
                        <tr>
                        <td>Total</td>
                        <td>:</td>
                        <td><?php if($nilai != null){ echo $nilai->total;}else{ echo "";}?></td>
                        </tr>
                    </table>
                    </div>
                    <?php 
                    $no++;
                    endforeach;
                    ?>     
                </div>  
                <!-- End Default Table Example -->
            </div>
        </div>



        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Approve Ujian Proposal</h5>
              <!-- Multi Columns Form -->
              <form name="approveUjianProposal" id="approveUjianProposal" class="row g-3" method="POST" action="" enctype="multipart/form-data">
                <input type="hidden" name="idUjianProposal" value="<?php echo $ujianProposal->idUjianProposal?>">
                <div class="col-md-12">
                  <label for="namaMahasiswa" class="form-label">Nama Mahasiswa</label>
                  <input type="text" class="form-control" id="namaMahasiswa" name="namaMahasiswa" value="<?php echo $ujianProposal->namaMahasiswa; ?>" readonly>
                </div>
                <div class="col-md-12">
                  <label for="NIM" class="form-label">NIM</label>
                  <input type="text" class="form-control" id="NIM" name="NIM" value="<?php echo $ujianProposal->NIM; ?>" readonly>
                </div>  
                <div class="col-md-12">
                  <label for="judulProposal" class="form-label">Judul Proposal</label>
                  <input type="text" class="form-control" id="judulProposal" name="judulProposal" value="<?php echo $ujianProposal->judulProposal; ?>" readonly>
                </div>
                <div class="col-md-12">
                  <label for="pembimbing1" class="form-label">Pembimbing 1</label>
                  <input type="text" class="form-control" id="pembimbing1A" name="pembimbing1" value="<?php echo $ujianProposal->pembimbing1; ?>" readonly>
                </div> 
                <div class="col-md-12">
                  <label for="fileProposal" class="form-label">File Proposal :</label>
                  <a href="<?php echo base_url('kaprodi/CUjianProposal/downloadFileProposal/'.$ujianProposal->NIM); ?>"><?php echo $ujianProposal->fileProposal; ?></a>
                </div>
                <div class="col-md-12">
                  <label for="fileProposal" class="form-label">Surat Pembimbing1 :</label>
                  <a href="<?php echo base_url('kaprodi/CUjianProposal/downloadSuratKetersediaanPembimbing1/'.$ujianProposal->NIM); ?>"><?php echo $ujianProposal->fileProposal; ?></a>
                </div>
                <div class="col-md-12">
                  <label for="fileProposal" class="form-label">File Revisi :</label>
                  <a href="<?php echo base_url('kaprodi/CUjianProposal/downloadFileRevisi/'.$ujianProposal->idUjianProposal); ?>"><?php echo $ujianProposal->fileRevisi; ?></a>
                </div>
                <div class="col-md-12">
                  <label for="judulProposal" class="form-label">Judul Proposal</label>
                  <input type="text" class="form-control" id="judulProposal" name="judulProposal" value="<?php echo $ujianProposal->judulProposal; ?>" readonly>
                </div> 
                <div class="col-md-12">
                  <label for="modelProposal" class="form-label">Model Proposal</label>
                  <input type="text" class="form-control" id="modelProposal" name="modelProposal" value="<?php echo $ujianProposal->modelProposal; ?>" readonly>
                </div>
                <div class="row mb-3">
                  <label for="status" class="col-sm-2 col-form-label">Status</label>
                  <div class="col-sm-12">
                    <select class="form-select" aria-label="Default select example" name="status" id="status" onchange="showHide(this.value)">
                        <option value="">-- Pilih Status --</option>
                        <option value="Telah Selesai Ujian" id="Telah Selesai Ujian">Selesai Ujian (Lanjut ke Tugas Akhir)</option>
                        <option value="Revisi Ditolak" id="Revisi Ditolak">Tolak Revisi</option>
                    </select>                    
                  </div>
                </div> 

                <div class="col-md-12">
                  <label for="pembimbing1" class="form-label" id="labelPembimbing1" style="display:none;">Pembimbing 1</label>
                  <input type="text" class="form-control" id="pembimbing1" name="" style="display:none;" value="<?php echo $ujianProposal->namaDosen4; ?>" readonly>
                  <input type="hidden" class="form-control" id="" name="pembimbing1" style="display:none;" value="<?php echo $ujianProposal->pembimbing1; ?>" readonly>
                </div>
                <div class="row mb-3">
                  <label for="pembimbing2" class="col-sm-2 col-form-label" id="labelPembimbing2" style="display:none;">Pembimbing 2</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="pembimbing2" id="pembimbing2" style="display:none;">
                        <option value="">-- Pilih Pembimbing 2 --</option>
                    <?php foreach($dosen as $row):?>
                        <option value="<?php echo $row->NIP; ?>"><?php echo $row->namaDosen?> - <?php echo $row->NIP?></option>
                    <?php endforeach;?>
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
                          <h5 class="modal-title">Approve Revisi Proposal</h5>
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


      if (elm == "Telah Selesai Ujian") {
      //display textbox
        document.getElementById('pembimbing1').style.display = "block";
        document.getElementById('labelPembimbing1').style.display = "block";
        document.getElementById('pembimbing2').style.display = "block";
        document.getElementById('labelPembimbing2').style.display = "block";
      } else {
      //hide textbox
        document.getElementById('pembimbing1').style.display = "none";
        document.getElementById('labelPembimbing1').style.display = "none";
        document.getElementById('pembimbing2').style.display = "none";
        document.getElementById('labelPembimbing2').style.display = "none";
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