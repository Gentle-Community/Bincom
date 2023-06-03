<?php require 'includes/header.php';
require 'auth/auth.php'; 
$polling = $auth->getName($_GET['poll'])
?>
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
        <h1 class="h3 mb-2 text-gray-800">Agents for Polling Unit</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

             <!-- Agent Name -->
             <div class="card col-md-6 ">
                <div class="card-header">
                  Add Agents
                </div>
                <div class="card-body">
                <form action="connect/connect.php" method="post">
                    <div class="form-group">
                        <label for="colFormLabel">Firstname</label>
                        <input type="text" class="form-control form-control-sm" name="firstname">
                    </div>
                    <div class="form-group">
                        <label for="colFormLabel">Lastname</label>
                        <input type="text" class="form-control form-control-sm" name="lastname">
                    </div>
                    <div class="form-group">
                        <label for="colFormLabel">Email</label>
                        <input type="email" class="form-control form-control-sm" name="email">
                    </div>
                    <div class="form-group">
                        <label for="colFormLabel">Phone</label>
                        <input type="tel" class="form-control form-control-sm" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="colFormLabel">Polling Units</label>
                        <select class="form-control" name="poll_id" id="ml" class="ed">
                        <?php
                        $data = $crud->view('polling_unit');
                        foreach ($data as $key => $res) 
                        {
                        ?>
                        <option value="<?php echo $res['uniqueid'];?>">
                        <?php echo $res['polling_unit_name'];?>
                        </option>
                        <?php }?>
                        </select>
                    </div>
                    <div>
                        <button name="agent" class="btn btn-success">Submit</button>
                    </div>
                </form>  
                </div>
              </div>
          <hr />

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><b>Polling: </b> <?php echo $polling; ?></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Firstname</th>
                      <th>Lastname</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $table = 'agentname';
                    $uid = $crud->db->real_escape_string($_GET['poll']);
                    $where = array(
                        "pollingunit_uniqueid" => $uid,
                        );
                    $data = $crud->selectWhere($table, $where);
                    $i = 1;

                    foreach ($data as $key => $row) {
                    ?>
                    <tr>
                      <td><?php echo $i++; ?></td>
                      <td><?php echo $row['firstname']; ?></td>
                      <td><?php echo $row['lastname']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                      <td><?php echo $row['phone']; ?></td>
                      <td><a href="connect/connect.php?delete=<?php echo $row['name_id']; ?>" class="btn btn-danger">Delete</a></td>
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

    
