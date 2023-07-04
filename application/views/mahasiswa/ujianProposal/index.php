<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Ujian Proposal</title>
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
          <li class="breadcrumb-item active">Pengajuan Proposal</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
      <?php if ($output == null) { ?>
        <h1>Anda belum menyelesaikan pengajuan proposal!</h1>
        <?php } else {?>   
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
                        <td><?php if($output != null){ echo $output->NIP1;}else{ echo "";}?></td>
                        </tr>
                        <tr>
                        <td>Nama Dosen</td>
                        <td>:</td>
                        <td><?php if($output != null){ echo $output->namaDosen1;}else{ echo "";}?></td>
                        </tr>
                        <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?php if($output != null){ echo $output->emailDosen1;}else{ echo "";}?></td>
                        </tr>
                    </table>
                    </div>
                    <div class="col">
                    <h5>Dosen Penguji 2</h5>
                    <table>
                        <tr>
                        <td>NIP</td>
                        <td>:</td>
                        <td><?php if($output != null){ echo $output->NIP2;}else{ echo "";}?></td>
                        </tr>
                        <tr>
                        <td>Nama Dosen</td>
                        <td>:</td>
                        <td><?php if($output != null){ echo $output->namaDosen2;}else{ echo "";}?></td>
                        </tr>
                        <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?php if($output != null){ echo $output->emailDosen2;}else{ echo "";}?></td>
                        </tr>
                    </table>
                    </div>
                    <div class="col">
                    <h5>Dosen Penguji 3</h5>
                    <table>
                        <tr>
                        <td>NIP</td>
                        <td>:</td>
                        <td><?php if($output != null){ echo $output->NIP3;}else{ echo "";}?></td>
                        </tr>
                        <tr>
                        <td>Nama Dosen</td>
                        <td>:</td>
                        <td><?php if($output != null){ echo $output->namaDosen3;}else{ echo "";}?></td>
                        </tr>
                        <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?php if($output != null){ echo $output->emailDosen3;}else{ echo "";}?></td>
                        </tr>
                    </table>
                    </div>
                </div>             
                <!-- End Default Table Example -->
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Jadwal Ujian</h5>
              
              <!-- Default Table -->
              <table>
                    <tr>
                        <td>Status Registrasi</td>
                        <td>:</td>
                        <td>
                          <b class="<?php if($output != null){ echo "btn btn-success text-light";}else{ echo "btn btn-danger text-light";}?>">
                            <?php if($output != null){ echo $output->status;}else{ echo "";}?>
                          </b>
                        </td>
                    </tr>
                    <tr>
                        <td>Waktu Ujian</td>
                        <td>:</td>
                        <td><?php if($output != null){ echo $output->waktu;}else{ echo "";}?></td>
                    </tr>
                    <tr>
                        <td>Ruangan Ujian</td>
                        <td>:</td>
                        <td><?php if($output != null){ echo $output->ruangan;}else{ echo "";}?></td>
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
                        <td>Pembimbing 1</td>
                        <td>:</td>
                        <td><?php if($output != null){ echo $output->namaDosen4;}else{ echo "";}?></td>
                    </tr>
                    <tr>
                        <td>Judul Proposal</td>
                        <td>:</td>
                        <td><?php if($output != null){ echo $output->judulProposal;}else{ echo "";}?></td>
                    </tr>
                    <tr>
                        <td>File Proposal</td>
                        <td>:</td>
                        <td><?php if($output != null){ echo $output->fileProposal;}else{ echo "";}?></td>
                    </tr>
                    <tr>
                        <td>Model Proposal</td>
                        <td>:</td>
                        <td><?php if($output != null){ echo $output->modelProposal;}else{ echo "";}?></td>
                    </tr>
                    <tr>
                      <td>Revisi Proposal</td>
                      <td>:</td>
                      <td><?php if($output != null){ echo $output->fileRevisi;}else{ echo "";}?></td>
                    </tr>
                    <?php if($count->cnt == 3 && $output->status != 'Telah Selesai Ujian'){ ?>
                      <button class ="btn btn-primary" onclick="uploadRevisi(<?= $output->idUjianProposal;?>)" type="button" data-bs-toggle="modal" data-bs-target="#confirm-submit">Revisi Proposal</button>
                    <?php }?>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>
          <?php } ?>
      </div>
    </section>


<!-- MODAL REVISI -->
    <div class="modal fade" id="confirm-submit" tabindex="-1">
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


  <script language= "javascript" >
  function uploadRevisi(id){
    document.getElementById('revisi-idUjianProposal').value = id;
  }

</script>
</body>

</html>