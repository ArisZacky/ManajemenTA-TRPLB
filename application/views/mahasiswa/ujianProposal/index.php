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
              </table>
              <!-- End Default Table Example -->
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