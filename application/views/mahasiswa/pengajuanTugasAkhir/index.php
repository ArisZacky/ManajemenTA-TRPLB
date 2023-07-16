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
      <h1>Pengajuan Tugas Akhir</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Dashboard</li>
          <li class="breadcrumb-item active">Pengajuan Tugas Akhir</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

      <?php if ($status == null) { ?>
        <h1>Anda belum menyelesaikan ujian proposal!</h1>
        <?php } else {?>        
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Dosen Pembimbing</h5>
                <!-- Default Table -->
                <div class="row">
                  <div class="col">
                  <h5>Dosen Pembimbing 1</h5>
                  <table>
                      <tr>
                        <td>NIP</td>
                        <td>:</td>
                        <td><?php echo $output->NIP1?></td>
                      </tr>
                      <tr>
                        <td>Nama Dosen</td>
                        <td>:</td>
                        <td><?php echo $output->namaDosen1?></td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?php echo $output->emailDosen1?></td>
                      </tr>
                  </table>
                  </div>
                  <div class="col">
                  <h5>Dosen Pembimbing 2</h5>
                  <table>
                      <tr>
                        <td>NIP</td>
                        <td>:</td>
                        <td><?php if($status->pembimbing2 == NULL){ echo "";}else{ echo $output->NIP2;}?> </td>
                      </tr>
                      <tr>
                        <td>Nama Dosen</td>
                        <td>:</td>
                        <td><?php if($status->pembimbing2 == NULL){ echo "";}else{ echo $output->namaDosen2;}?></td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?php if($status->pembimbing2 == NULL){ echo "";}else{ echo $output->emailDosen2;}?></td>
                      </tr>
                  </table>
                  </div>
                </div>             
                <!-- End Default Table Example -->
              </div>
            </div>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Mahasiswa</h5>

              <!-- Default Table -->
              <table>
                  <tr>
                    <td>Nama Mahasiswa</td>
                    <td>:</td>
                    <td><?php echo $output->namaMahasiswa?></td>
                  </tr>
                  <tr>
                    <td>NIM</td>
                    <td>:</td>
                    <td><?php echo $output->NIM?></td>
                  </tr>
                  <tr>
                    <td>Prodi</td>
                    <td>:</td>
                    <td><?php echo $output->prodi?></td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><?php echo $output->email?></td>
                  </tr>
                  <tr>
                    <td>Judul Proposal</td>
                    <td>:</td>
                    <td><?php echo $output->judulProposal?></td>
                  </tr>
                  <tr>
                    <td>Berkas Proposal</td>
                    <td>:</td>
                    <td><?php echo $output->fileTugasAkhir?></td>
                  </tr>
                  <tr>
                    <td>Model Tugas Akhir</td>
                    <td>:</td>
                    <td><?php echo $output->modelTa?> </td>
                  </tr>
                  <tr>
                    <td>Surat Kesediaan Pembimbing 1</td>
                    <td>:</td>
                    <td><?php echo $output-> suratKesediaanPembimbing1 ?></td>
                  </tr>
                  <tr>
                    <td>Surat Kesediaan Pembimbing 2</td>
                    <td>:</td>
                    <td><?php echo $output-> suratKesediaanPembimbing2 ?></td>
                  </tr>
                  <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td><?php echo $output->status?></td>
                  </tr>
                  <tr>
                    <td>Status Bimbingan</td>
                    <td>:</td>
                    <td><?php echo $output->statusBimbingan?></td>
                  </tr>
              </table>
              
              <!-- End Default Table Example -->
            </div>
          </div>  

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Abstrak</h5>
              <p><?php echo $output->abstrak?></p>
              <!-- End Default Table Example -->
            </div>
          </div> 
          <?php if($output->fileTugasAkhir == null){?><a href="<?php echo base_url('mahasiswa/CPengajuanTugasAkhir/add'); ?>" class="btn btn-primary">Buat Pengajuan Tugas Akhir</a>
          <?php }}?>
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