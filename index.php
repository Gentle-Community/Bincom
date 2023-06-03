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
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Results -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">LGA Results</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $auth->getTableCount('announced_lga_results'); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Results -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Poll Unit Result</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $auth->getTableCount('announced_pu_results'); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          
            <!-- Results -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Party Total</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $auth->getTableCount('party'); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Results -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Polling Units</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $auth->getTableCount('polling_unit'); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          
          </div>

          <div class="card col-md-6 ">
            <div class="card-header">
              Check polling units from LGA
            </div>
            <div class="card-body">
              <form action="connect/connect.php" method="post">
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
                        <button name="search" class="btn btn-success">Submit</button>
                    </div>
              </form>
            </div>
            <div class="card-footer">
              Total polling Units for <b><u><?php $Val = (isset($_GET['name'])) ? $_GET['name'] : 'None' ; echo $Val;?> </u></b> is: 
                <?php $retVal = (isset($_GET['search'])) ? $_GET['search'] : 'None' ; echo $retVal;?>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php require 'includes/footer.php'; ?>
