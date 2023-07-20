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
          <li class="breadcrumb-item active">SK</li>
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
              <h5 class="card-title">File SK</h5>
              <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalBuatSK">Tambah SK</button>

              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                      <th>No</th>
                      <th>Judul SK</th>
                      <th>Jenis SK</th>
                      <th>File SK</th>
                      <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    if(empty($SK)){
                      echo "";
                    }else{
                    $no=1;
                    foreach ($SK as $row): ?>
                    <tr id="<?php echo "baris".$no?>">
                      <td>
                        <?php echo $no ?>
                      </td>
                      <td>
                        <?php echo $row->judulSK ?>
                      </td>
                      <td>
                        <?php echo $row->jenisSK ?>
                      </td>
                      <td>
                        <a href="<?php echo base_url('kaprodi/CSK/downloadFileSK/'.$row->idSK)?>">Download</a>

                        
                      </td>
                      <td>
                      <button class="btn btn-warning" onclick="editSK('<?php echo 'baris'.$no?>', '<?php echo $row->idSK ?>')" type="button" data-bs-toggle="modal" data-bs-target="#modalEditSK">Edit</button>
                      <button class="btn btn-danger" onclick="hapusSK('<?php echo 'baris'.$no?>', '<?php echo $row->idSK ?>')" type="button" data-bs-toggle="modal" data-bs-target="#modalHapusSK">Hapus</button>
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

  <!-- MODAL BUAT SK -->
  <div class="modal fade" id="modalBuatSK" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Buat SK</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <form action="<?php echo base_url('kaprodi/CSK/add'); ?>" method="POST" enctype="multipart/form-data">
            <div class="row mb-3">
                  <label for="" class="col-sm-2 col-form-label">Judul SK</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="judulSK" id="judulSK" required>
                  </div>
            </div>
            <div class="row mb-3">
                  <label for="" class="col-sm-2 col-form-label">Jenis SK</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="jenisSK" id="jenisSK" required>
                  </div>
            </div>
            <div class="row mb-3">
                  <label for="" class="col-sm-2 col-form-label">Jenis SK</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="jenisSK" id="jenisSK" required>
                        <option value="">Pilih Jenis SK</option>
                        <option value="Pembimbing">Pembimbing</option>
                        <option value="Penguji">Penguji</option>
                        <option value="Petugas">Petugas</option>
                    </select>                    
                  </div>
            </div>
            <div class="row mb-3">
                  <label for="" class="col-sm-2 col-form-label">File SK</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" name="fileSK" required>
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

    <!-- MODAL EDIT SK -->
  <div class="modal fade" id="modalEditSK" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit SK</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <form action="<?php echo base_url('kaprodi/CSK/edit'); ?>" method="POST" enctype="multipart/form-data">
          <input type="text" name="idSK" id="edit-idSK">
            <div class="row mb-3">
                  <label for="" class="col-sm-2 col-form-label">Judul SK</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="judulSK" id="edit-judulSK">
                  </div>
            </div>
            <div class="row mb-3">
                  <label for="" class="col-sm-2 col-form-label">Jenis SK</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="jenisSK" id="edit-jenisSK" required>
                        <option value="">Pilih Jenis SK</option>
                        <option value="Pembimbing">Pembimbing</option>
                        <option value="Penguji">Penguji</option>
                        <option value="Petugas">Petugas</option>
                    </select>                    
                  </div>
            </div>
            <div class="row mb-3">
                  <label for="" class="col-sm-2 col-form-label">File SK</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" name="fileSK">
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

    <!-- MODAL HAPUS SK -->
  <div class="modal fade" id="modalHapusSK" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Hapus SK</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <h2>Apakah Anda Yakin Untuk Menghapus SK ini?</h2>
          <form action="<?php echo base_url('kaprodi/CSK/delete'); ?>" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="idSK" id=hapus-idSK>
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
    
    function editSK(baris, id){
        const td = document.querySelectorAll('#' + baris + ' td');

        document.getElementById('edit-judulSK').value = td[1].innerText
        document.getElementById('edit-jenisSK').value = td[2].innerText

        document.getElementById('edit-idSK').value = id;
    }

    function hapusSK(baris, id){
        const td = document.querySelectorAll('#' + baris + ' td');

        document.getElementById('hapus-idSK').value = id;
    }

</script>
</body>

</html>