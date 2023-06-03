<?php require 'includes/header.php';
require 'auth/auth.php'; ?>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php require 'includes/sidebar.php';?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php require 'includes/topbar.php'; ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Local Govement Area</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th></th>
                      <th>LGA Name</th>
                      <th>LGA DESC</th>
                      <th>User</th>
                      <th>Poll Units</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $table = 'lga';
                    
                    $data = $crud->view($table);
                    $i = 1;

                    foreach ($data as $key => $row) {
                    ?>
                    <tr>
                      <td><?php echo $i++; ?></td>
                      <td><?php echo $row['lga_name']; ?></td>
                      <td><?php echo $row['lga_description']; ?></td>
                      <td><?php echo $row['entered_by_user']; ?></td>
                      <td><a href="check_poll.php?poll=<?php echo $row['lga_id']; ?>" class="btn btn-info">Check</a></td>
                    </tr>
                   <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php require 'includes/footer.php'; ?>

    
