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
          <li class="breadcrumb-item">Ujian Proposal</li>
          <li class="breadcrumb-item active">Dijadwalkan</li>
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
              <h5 class="card-title">Data Ujian Proposal Dijadwalkan</h5>
              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                      <th>No</th>
                      <th>Nama Mahasiswa</th>
                      <th>NIM</th>
                      <th>Judul Proposal</th>
                      <th>File Proposal</th>
                      <th>Waktu</th>
                      <th>Ruangan</th>
                      <th>Model Proposal</th>
                      <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    if(empty($ujianProposal)){
                      echo "";
                    }else{
                    $no=1;
                    foreach ($ujianProposal as $row): ?>
                    <tr>
                      <td>
                        <?php echo $no ?>
                      </td>
                      <td>
                        <?php echo $row->namaMahasiswa ?>
                      </td>
                      <td>
                        <?php echo $row->NIM ?>
                      </td>
                      <td>
                        <?php echo $row->judulProposal ?>
                      </td>
                      <td>
                        <?php echo $row->fileProposal ?>
                      </td>
                      <td>
                        <?php echo $row->waktu ?>
                      </td>
                      <td>
                        <?php echo $row->ruangan ?>
                      </td>
                      <td>
                        <?php echo $row->modelProposal ?>
                      </td>
                      <td>
                          <button class="btn btn-success" onclick="lanjutRevisi('<?= $row->idUjianProposal?>')" data-bs-toggle="modal" data-bs-target="#lanjutRevisi" type="button" role="tab" aria-selected="false">Tahap Revisi</button>
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
          </div>
      </div>
    </section>

      <!-- MODAL LANJUT REVISI -->
      <div class="modal fade" id="lanjutRevisi" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Selesai Ujian</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <?php echo form_open_multipart('kaprodi/CUjianProposal/lanjutRevisi');?>
            <input type="hidden" id="lanjutRevisi-idUjianProposal" name="idUjianProposal" value="">
            <input type="hidden" id="" name="status" value="Tahap Revisi">
            <div>
              <h1>Apakah Anda Yakin Melanjutkan ke Tahap Revisi?</h1>
              <p>Proses ini tidak dapat dikembalikan lagi</p>
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

<script>
    function lanjutRevisi(id){
      document.getElementById('lanjutRevisi-idUjianProposal').value = id;
    }
</script>


</body>

</html>