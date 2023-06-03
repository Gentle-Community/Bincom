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
        <h1 class="h3 mb-2 text-gray-800">Polling Unit for given LGA</h1>
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
                      <th>Polling Unit Number</th>
                      <th>Polling Unit Name</th>
                      <th>Polling Unit Description</th>
                      <th>latitude</th>
                      <th>Longitude</th>
                      <th>Check</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $table = 'polling_unit';
                    $uid = $crud->db->real_escape_string($_GET['poll']);
                    $where = array(
                        "lga_id" => $uid,
                        );
                    $data = $crud->selectWhere($table, $where);
                    $i = 1;

                    foreach ($data as $key => $row) {
                    ?>
                    <tr>
                      <td><?php echo $i++; ?></td>
                      <td><?php echo $row['polling_unit_number']; ?></td>
                      <td><?php echo $row['polling_unit_name']; ?></td>
                      <td><?php echo $row['polling_unit_description']; ?></td>
                      <td><?php echo $row['lat']; ?></td>
                      <td><?php echo $row['long']; ?></td>
                      <td><a href="agent.php?poll=<?php echo $row['uniqueid']; ?>" class="btn btn-success">Check</a></td>
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

    
