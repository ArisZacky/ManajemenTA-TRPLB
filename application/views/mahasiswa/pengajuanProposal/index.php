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
      <h1>Pengajuan Proposal</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Dashboard</li>
          <li class="breadcrumb-item">Proposal</li>
          <li class="breadcrumb-item active">Pengajuan Proposal</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

      <?php if ($status == null) { ?>
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
                        <td></td>
                        </tr>
                        <tr>
                        <td>Nama Dosen</td>
                        <td>:</td>
                        <td></td>
                        </tr>
                        <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td></td>
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
                        <td>Status Registrasi</td>
                        <td>:</td>
                        <td><b class="bg-danger text-light">Belum Mendaftar</b></td>
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
                        <td>Judul Proposal</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>File Proposal</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Surat Ketersediaan Pembimbing 1</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Model Proposal</td>
                        <td>:</td>
                        <td></td>
                    </tr>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>  

          <a href="<?php echo base_url('mahasiswa/CPengajuanProposal/add'); ?>" class="btn btn-primary">Buat Pengajuan Proposal</a>
        <?php } else {?>        
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Dosen Pembimbing</h5>
                <!-- Default Table -->
                <div class="row">
                    <div class="col">
                    <h5>Dosen Pembimbing 1</h5>
                    <?php foreach($output as $outputs):?>
                        <table>
                            <tr>
                                <td>NIP</td>
                                <td>:</td>
                                <td><?php echo $outputs->NIP1?></td>
                            </tr>
                            <tr>
                                <td>Nama Dosen</td>
                                <td>:</td>
                                <td><?php echo $outputs->namaDosen1?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td><?php echo $outputs->emailDosen1?></td>
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
                        <td>Status Registrasi</td>
                        <td>:</td>
                        <td><?php echo $outputs->status?></b></td>
                    </tr>
                    <tr>
                        <td>Nama Mahasiswa</td>
                        <td>:</td>
                        <td><?php echo $outputs->namaMahasiswa?></td>
                    </tr>
                    <tr>
                        <td>NIM</td>
                        <td>:</td>
                        <td><?php echo $outputs->NIM?></td>
                    </tr>
                    <tr>
                        <td>Prodi</td>
                        <td>:</td>
                        <td><?php echo $outputs->prodi?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?php echo $outputs->email?></td>
                    </tr>
                    <tr>
                        <td>Judul Proposal</td>
                        <td>:</td>
                        <td><?php echo $outputs->judulProposal?></td>
                    </tr>
                    <tr>
                        <td>Berkas Proposal</td>
                        <td>:</td>
                        <td><a href="<?php echo base_url('mahasiswa/CPengajuanProposal/downloadFileProposal/'.$outputs->NIM); ?>" target="__blank"><?php echo $outputs->fileProposal?></a></td>
                    </tr>
                    <tr>
                        <td>Surat Ketersediaan Pembimbing 1</td>
                        <td>:</td>
                        <td><a href="<?php echo base_url('mahasiswa/CPengajuanProposal/downloadSuratKetersediaanPembimbing1/'.$outputs->NIM); ?>" target="__blank"><?php echo $outputs->suratKetersediaanPembimbing1?></a></td>
                    </tr>
                    <tr>
                        <td>Model Proposal</td>
                        <td>:</td>
                        <td><?php echo $outputs->modelProposal?></td>
                    </tr>

              </table>
              
              <!-- End Default Table Example -->
            </div>
          </div>  

          <?php endforeach;?>
          <?php }?>
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