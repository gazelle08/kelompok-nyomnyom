<?php require('../config.php');
    if(is_logged_in()){
?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- SEARCH FORM -->
    

    <!-- Right navbar links -->
    
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php
    include 'menu-bar.php';
    ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Laporan Pelanggan</h1>
          </div>

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb item">
                
              </li>
              
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> </h3>
                    <div class="card-tools" >
                        <div class="input-group input-group-sm" style="width: 250px">
                            <a href="form_laporan.php" class="btn btn-success float-right">
                            <i class="fas fa-plus"> Buat Laporan</i>
                            </a>
                        </div>
                    </div>

                </div>
              <!-- /.card-header -->
              

              <!-- form start -->
              
              
              
              <!-- /.card-body -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover table-nowrap">
                <tbody>
                    <tr>
                        <th>Id Laporan</th>
                        <th>Id Pesanan</th>
                        <th>Status Laporan</th>
                        <th>Keterangan</th>

                    </tr> 
                
                    <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM laporan_pelanggan
                                                            JOIN pesanan
                                                                ON pesanan.id_pesanan = laporan_pelanggan.id_pesanan
                                                            ");
                            $no = 1;
                            while ($data = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $data['id_laporan']; ?></td>
                                    <td><?php echo $data['id_pesanan']; ?></td>
                                    <td><?php echo $data['status_laporan']; ?></td>
                                    <td><?php echo $data['keterangan']; ?></td>
                                </tr>
                            <?php
                                $no++;
                            }
                            ?>
                </tbody>
	
                

                </table>

              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
        <!-- Small boxes (Stat box) -->
      
          
          <!-- ./col -->
          
          <!-- ./col -->
          
          <!-- ./col -->
          
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php  } else {
    header('Location: ../index.php');
}
