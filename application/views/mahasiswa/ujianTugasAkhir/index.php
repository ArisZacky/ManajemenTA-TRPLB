<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Ujian Tugas Akhir</title>
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
      <h1>Ujian Proposal</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Dashboard</li>
          <li class="breadcrumb-item">Tugas Akhir</li>
          <li class="breadcrumb-item">Ujian Tugas Akhir</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
      <?php if ($pengajuan == null) { ?>
        <h1>Anda belum menyelesaikan pengajuan proposal!</h1>
        <?php } else {?>
            <?php if($pengajuan->statusBimbingan != "Selesai Bimbingan"){ ?>
            <h1>Anda Belum Menyelesaikan Bimbingan Tugas Akhir!</h1>
            <?php }else { ?>   
          <?php if($ujianTa ==  null){?>
            <button class ="btn btn-primary" onclick="uploadSuratSelesaiBimbingan(<?= $pengajuan->idPengajuanTA;?>)" type="button" data-bs-toggle="modal" data-bs-target="#confirm-submit">Daftar Ujian Tugas Akhir</button>
          <?php }else { ?>
          <?php if($ujianTa->status != "Menunggu"){?>
          <div class="card">
            <div class="card-body">
                <h5 class="card-title">Penguji</h5>
                <!-- Default Table -->
                <div class="row">
                    <div class="col">
                    <h5>Dosen Penguji 1</h5>
                    <table>
                        <tr>
                        <td>NIP</td>
                        <td>:</td>
                        <td><?php if($penguji1 != null){ echo $penguji1->NIP;}else{ echo "";}?></td>
                        </tr>
                        <tr>
                        <td>Nama Dosen</td>
                        <td>:</td>
                        <td><?php if($penguji1 != null){ echo $penguji1->namaDosen;}else{ echo "";}?></td>
                        </tr>
                        <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?php if($penguji1 != null){ echo $penguji1->email;}else{ echo "";}?></td>
                        </tr>
                    </table>
                    </div>
                    <div class="col">
                    <h5>Dosen Penguji 2</h5>
                    <table>
                        <tr>
                        <td>NIP</td>
                        <td>:</td>
                        <td><?php if($penguji2 != null){ echo $penguji2->NIP;}else{ echo "";}?></td>
                        </tr>
                        <tr>
                        <td>Nama Dosen</td>
                        <td>:</td>
                        <td><?php if($penguji2 != null){ echo $penguji2->namaDosen;}else{ echo "";}?></td>
                        </tr>
                        <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?php if($penguji2 != null){ echo $penguji2->email;}else{ echo "";}?></td>
                        </tr>
                    </table>
                    </div>
                    <div class="col">
                    <h5>Dosen Penguji 3</h5>
                    <table>
                        <tr>
                        <td>NIP</td>
                        <td>:</td>
                        <td><?php if($penguji3 != null){ echo $penguji3->NIP;}else{ echo "";}?></td>
                        </tr>
                        <tr>
                        <td>Nama Dosen</td>
                        <td>:</td>
                        <td><?php if($penguji3 != null){ echo $penguji3->namaDosen;}else{ echo "";}?></td>
                        </tr>
                        <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?php if($penguji3 != null){ echo $penguji3->email;}else{ echo "";}?></td>
                        </tr>
                    </table>
                    </div>
                </div>             
                <!-- End Default Table Example -->
            </div>
          </div>
          <?php } ?>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Jadwal Ujian Tugas Akhir</h5>
                <?php if($ujianTa->waktu != NULL) {?>
                <a href = "<?php echo base_url('mahasiswa/CPrintJadwalUjianTA'); ?>" class="btn btn-primary" target="_blank">
                  <i class="bi bi-box-arrow-right"></i>
                  <span>Print Jadwal</span>
                </a>
                <?php }?>
              <!-- Default Table -->
              <table>
                    <tr>
                        <td>Status Registrasi TA</td>
                        <td>:</td>
                        <td>
                          <b class="<?php if($ujianTa != null){ echo "btn btn-success text-light";}else{ echo "btn btn-danger text-light";}?>">
                            <?php if($ujianTa != null){ echo $ujianTa->status;}else{ echo "";}?>
                          </b>
                        </td>
                    </tr>
                    <tr>
                        <td>Waktu Ujian</td>
                        <td>:</td>
                        <td><?php if($ujianTa != null){ echo $ujianTa->waktu;}else{ echo "";}?></td>
                    </tr>
                    <tr>
                        <td>Ruangan Ujian</td>
                        <td>:</td>
                        <td><?php if($ujianTa != null){ echo $ujianTa->ruangan;}else{ echo "";}?></td>
                    </tr>
                    <tr>
                        <td>Nama Mahasiswa</td>
                        <td>:</td>
                        <td><?php echo $this->session->userdata('nama'); ?></td>
                    </tr>
                    <tr>
                        <td>NIM</td>
                        <td>:</td>
                        <td><?php echo $this->session->userdata('NIM/NIP'); ?></td>
                    </tr>
                    <tr>
                        <td>Prodi</td>
                        <td>:</td>
                        <td><?php echo $this->session->userdata('prodi'); ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?php echo $this->session->userdata('email'); ?></td>
                    </tr>
                    <tr>
                        <td>Judul Tugas Akhir</td>
                        <td>:</td>
                        <td><?php if($pengajuan != null){ echo $pengajuan->judulProposal;}else{ echo "";}?></td>
                    </tr>
                    <tr>
                        <td>Abstrak</td>
                        <td>:</td>
                        <td><?php if($pengajuan != null){ echo $pengajuan->abstrak;}else{ echo "";}?></td>
                    </tr>
                    <tr>
                        <td>Pembimbing 1</td>
                        <td>:</td>
                        <td><?php if($pembimbing1 != null){ echo $pembimbing1->namaDosen;}else{ echo "";}?></td>
                    </tr>
                    <tr>
                        <td>Pembimbing 2</td>
                        <td>:</td>
                        <td><?php if($pembimbing2 != null){ echo $pembimbing2->namaDosen;}else{ echo "";}?></td>
                    </tr>
                    <tr>
                        <td>Surat Selesai Bimbingan</td>
                        <td>:</td>
                        <td>
                          <a href="<?php echo base_url('mahasiswa/CUjianTugasAkhir/downloadSuratSelesaiBimbingan/'.$ujianTa->idUjianTA)?>"><?php if($ujianTa != null){ echo $ujianTa->suratSelesaiBimbingan;}else{ echo "";}?></a>  
                        </td>
                    </tr>
                    <tr>
                        <td>Laporan Tugas Akhir</td>
                        <td>:</td>
                        <td>
                        <a href="<?php echo base_url('mahasiswa/CUjianTugasAkhir/downloadFileLaporanTugasAkhir/'.$ujianTa->idUjianTA)?>"><?php if($ujianTa != null){ echo $ujianTa->fileLaporanTA;}else{ echo "";}?></a>  
                        </td>
                    </tr>
                    <tr>
                        <td>Model Tugas Akhir</td>
                        <td>:</td>
                        <td><?php if($pengajuan != null){ echo $pengajuan->modelTa;}else{ echo "";}?></td>
                    </tr>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>
          <?php }}} ?>
      </div>
    </section>


<!-- MODAL REVISI -->
    <div class="modal fade" id="confirm-submit" tabindex="-1">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Daftar Ujian</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <?php echo form_open_multipart('mahasiswa/CUjianTugasAkhir/add');?>
          <div class="row mb-3">
              <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="Nama" id="Nama" required value="<?php echo $this->session->userdata('nama') ?>" disabled>
              </div>
          </div>
          <div class="row mb-3">
              <label for="NIM" class="col-sm-2 col-form-label">NIM</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="NIM" id="NIM" required value="<?php echo $pengajuan->NIM ?>" disabled>
              </div>
          </div>
          <div class="row mb-3">
              <label for="judulProposal" class="col-sm-2 col-form-label">Judul Proposal</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="judulProposal" id="judulProposal" required value="<?php echo $pengajuan->judulProposal ?>" disabled>
              </div>
          </div>
          <div class="row mb-3">
              <label for="abstrak" class="col-sm-2 col-form-label">Abstrak</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="abstrak" id="abstrak" required value="<?php echo $pengajuan->abstrak ?>" disabled>
              </div>
          </div>
          <div class="row mb-3">
              <label for="pembimbing1" class="col-sm-2 col-form-label">Pembimbing 1</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="pembimbing1" id="pembimbing1" required value="<?php echo $pembimbing1->namaDosen ?>" disabled>
              </div>
          </div>
          <div class="row mb-3">
              <label for="pembimbing2" class="col-sm-2 col-form-label">Pembimbing 2</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="pembimbing2" id="pembimbing2" required value="<?php echo $pembimbing2->namaDosen ?>" disabled>
              </div>
          </div>
          <div class="row mb-3">
              <label for="modelTa" class="col-sm-2 col-form-label">Model TA</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="modelTa" id="modelTa" required value="<?php echo $pengajuan->modelTa ?>" disabled>
              </div>
          </div>
          <div class="row mb-3">
              <label for="fileLaporanTA" class="col-sm-2 col-form-label">File Laporan TA</label>
              <div class="col-sm-10">
                <input class="form-control" type="file" name="fileLaporanTA" required>
              </div>
          </div>            
          <div class="row mb-3">
              <label for="suratSelesaiBimbingan" class="col-sm-2 col-form-label">Surat Selesai Bimbingan</label>
              <div class="col-sm-10">
                <input type="hidden" id="revisi-idPengajuanTA" name="idPengajuanTA">
                <input class="form-control" type="file" name="suratSelesaiBimbingan" required>
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

  <!-- FOOTER -->
  <?php $this->load->view('layouts/footer') ?>
  <!-- END FOOTER -->
  <!-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> -->

  <!-- LOAD JAVASCRIPT -->
  <?php $this->load->view('layouts/script') ?>
  <!-- END LOAD JAVASCRIPT -->


<script language= "javascript" >
  function uploadSuratSelesaiBimbingan(id){
    document.getElementById('revisi-idPengajuanTA').value = id;
  }

</script>
</body>

</html>