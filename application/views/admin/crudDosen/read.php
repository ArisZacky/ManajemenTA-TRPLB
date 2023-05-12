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
          <li class="breadcrumb-item active">CRUD Dosen</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Dosen</h5>

                <a href="<?php echo base_url('admin/CCrudDosen/add'); ?>" class="btn btn-primary">Tambah Data</a>
                <a href = "<?php echo base_url('admin/CPrint'); ?>" class="btn btn-success" target="_blank">
                  <i class="bi bi-box-arrow-right"></i>
                  <span>Print</span>
                </a>

              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                      <th>No</th>
                      <th>NIP</th>
                      <th>Nama Dosen</th>
                      <th>Prodi</th>
                      <th>Email</th>
                      <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $no=1;
                    foreach ($dosen as $row): ?>
                    <tr>
                      <td>
                        <?php echo $no ?>
                      </td>
                      <td>
                        <?php echo $row->NIP ?>
                      </td>
                      <td>
                        <?php echo $row->namaDosen ?>
                      </td>
                      <td>
                        <?php echo $row->prodi ?>
                      </td>
                      <td>
                        <?php echo $row->email ?>
                      </td>
                      <td>
                        <a class="btn btn-warning" href="<?php echo base_url('admin/CCrudDosen/edit/'.$row->NIP); ?>">Edit</a>
                        <a class="btn btn-danger" onclick="hapusdata('<?php echo $row->NIP ?>')">Hapus</a>
                      </td>
                    </tr>
                  <?php 
                    $no++;
                    endforeach; ?>
                </tbody>
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