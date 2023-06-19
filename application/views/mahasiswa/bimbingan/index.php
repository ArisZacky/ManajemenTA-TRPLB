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
                <!-- uploadBimbingan() -->
                <button class ="btn btn-primary" onclick="bimbingan('<?= $pengajuan->idPengajuanTA?>', '<?=$p1->namaDosen?>', '<?=$p1->NIP?>')" type="button" data-bs-toggle="modal" data-bs-target="#modalPembimbing1">Buat Bimbingan</button>
                <h5>Nama Pembimbing : <?php echo $p1->namaDosen?></h5>
                <h5>Judul Proposal  : <?php echo $pengajuan->judulProposal?></h5>
                
                  <!-- Default Table -->
                  <table class="table">
                    <thead>
                      <tr>
                          <th>No</th>
                          <th>Tanggal</th>
                          <th>Keterangan Bimbingan</th>
                          <th>File Bimbingan</th>
                          <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        if(empty($b1)){
                          echo "";
                        }else{
                        $no=1;
                        foreach ($b1 as $row): ?>
                        <tr>
                          <td>
                            <?php echo $no ?>
                          </td>
                          <td>
                            <?php echo $row->tanggal ?>
                          </td>
                          <td>
                            <?php echo $row->keteranganRevisi ?>
                          </td>
                          <td>
                            <?php echo $row->berkasBimbingan ?>
                          </td>
                          <td>
                            <?php echo $row->status ?>
                          </td>
                        </tr>
                      <?php 
                        $no++;
                        endforeach;
                      } ?>
                    </tbody>
                  </table>
                  <!-- End Default Table Example -->
                </div>
                <div class="tab-pane fade" id="pills-pembimbing2" role="tabpanel" aria-labelledby="profile-tab">
                <button class ="btn btn-primary" onclick="bimbingan('<?= $pengajuan->idPengajuanTA?>', '<?=$p2->namaDosen?>', '<?=$p2->NIP?>')" type="button" data-bs-toggle="modal" data-bs-target="#modalPembimbing1">Buat Bimbingan</button>
                <h5>Nama Pembimbing : <?php echo $p2->namaDosen?></h5>
                <h5>Judul Proposal  : <?php echo $pengajuan->judulProposal?></h5>
                  <!-- Default Table -->
                  <table class="table">
                    <thead>
                      <tr>
                          <th>No</th>
                          <th>Tanggal</th>
                          <th>Keterangan Bimbingan</th>
                          <th>File Bimbingan</th>
                          <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        if(empty($b2)){
                          echo "";
                        }else{
                        $no=1;
                        foreach ($b2 as $row2): ?>
                        <tr>
                          <td>
                            <?php echo $no ?>
                          </td>
                          <td>
                            <?php echo $row2->tanggal ?>
                          </td>
                          <td>
                            <?php echo $row2->keteranganRevisi ?>
                          </td>
                          <td>
                            <?php echo $row2->berkasBimbingan ?>
                          </td>
                          <td>
                            <?php echo $row2->status ?>
                          </td>
                        </tr>
                      <?php 
                        $no++;
                        endforeach;
                      } ?>
                    </tbody>
                  </table>
                  <!-- End Default Table Example -->

                </div>
              </div><!-- End Pills Tabs -->

            </div>
          </div>
      </div>
    </section>

  <!-- MODAL BIMBINGAN -->
    <div class="modal fade" id="modalPembimbing1" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Buat Bimbingan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <?php echo form_open_multipart('mahasiswa/CBimbingan/add');?>
          <form action="<?php echo base_url('mahasiswa/CBimbingan/add'); ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" id="revisi-idPengajuanTA" name="idPengajuanTA" value="">
            <input type="hidden" name="status" value="Diproses">
            <div class="row mb-3">
                  <label for="" class="col-sm-2 col-form-label">NIM</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="" id="" disabled value="<?php echo $this->session->userdata('NIM/NIP') ?>">
                  </div>
            </div>
            <div class="row mb-3">
                  <label for="" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="" id="" disabled value="<?php echo $this->session->userdata('nama') ?>">
                  </div>
            </div>
            <div class="row mb-3">
                  <label for="" class="col-sm-2 col-form-label">Prodi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="" id="" disabled value="<?php echo $this->session->userdata('prodi') ?>">
                  </div>
            </div>
            <div class="row mb-3">
                  <label for="" class="col-sm-2 col-form-label">Pembimbing</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="pembimbing" id="pembimbing" value="" disabled>
                  </div>
            </div>
            <input type="hidden" name="NIP" id="NIP" value="">
            <div class="row mb-3">
                  <label for="" class="col-sm-2 col-form-label">Judul Tugas Akhir</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="" id="" disabled value="<?php echo $pengajuan->judulProposal ?>">
                  </div>
            </div>
            <div class="row mb-3">
                  <label for="" class="col-sm-2 col-form-label">Tanggal Bimbingan</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="tanggal">
                  </div>
            </div>
            <div class="row mb-3">
                  <label for="" class="col-sm-2 col-form-label">Berkas Bimbingan</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" name="berkasBimbingan" required>
                  </div>
            </div>
            <div class="row mb-3">
                  <label for="" class="col-sm-2 col-form-label">Keterangan Revisi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="keteranganRevisi">
                  </div>
            </div>            
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
  <script language= "javascript" >
    function bimbingan(id, nama, nip){
      // alert('WOI')
      document.getElementById('revisi-idPengajuanTA').value = id;
      document.getElementById('pembimbing').value = nama;
      document.getElementById('NIP').value = nip;
    }

  </script>
  <script language= "javascript" >
    function tes(){
      alert("tes")
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