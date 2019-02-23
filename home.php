<?php

session_start();

if($_SESSION['loggedin'] != true){
    header("location: index.php");
}
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: index.php");
}

?>

<?php
 include 'db_connection.php';


//$p_factor=0;
//if(isset($GET['pf']))
//{
//	$p_factor = $_GET['pf']; }
 	$conn= OpenCon();
 $sql= "select * from smart_meter order by id desc limit 1;";
 $result = $conn->query($sql);
 $row= $result->fetch_assoc(); 
//print_r($row);
//echo gettype($row)."\n";     

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Dashboard</title>

    <!-- Bootstrap core CSS-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet" type="text/css">


    <!-- Page level plugin CSS-->
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">




  </head>

  <body id="page-top" >

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="home.php">Smart Meter</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>
      

      <!-- Navbar -->
	  <?php include 'sidebar.php' ?>
      <ul class="navbar-nav ml-auto ml-md-0">
        
       
         
        
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Activity Log</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
     

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
		  <div class="col-xl-12 col-sm-12 mb-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="home.php">Home</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
			  
	
          </ol>
</div>
          <!-- Icon Cards-->
          <div class="row">
          
			
			<div class="col-xl-2 col-sm-2 mb-2">
              <div class="card text-white bg-primary o-hidden h-100" style="background-color:#a1edf7 !important;">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-bolt"></i>
                  </div>
                  <div class="mr-5"><?php echo $row['Active_Total_Import']; ?>kwh</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">unit(kwh)</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
		
			<div class="col-xl-2 col-sm-2 mb-2">
              <div class="card text-white bg-primary o-hidden h-100" style="background-color:#fa8072 !important;">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-bolt"></i> 
                  </div>
                  <div class="mr-5"><?php echo $row['Frequency_Hz']; ?>Hz</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">frequency</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
			
			<div class="col-xl-2 col-sm-2 mb-2">
              <div class="card text-white bg-primary o-hidden h-100" style="background-color:#D6C3C9 !important;">
                <div class="card-body">
                  <div class="card-body-icon">
						<i class="fas fa-bolt"></i>
                  </div>
                  <div class="mr-5"><?php echo $row['Average_Voltage']; ?>volts</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">voltage</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-2 col-sm-2 mb-2">
              <div class="card text-white bg-warning o-hidden h-100" style="background-color:#A5B2D7 !important;">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-list"></i>
                  </div>
                  <div class="mr-5"><?php echo $row['Neutral_Line_current']; ?>amp</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">current</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
           <div class="col-xl-2 col-sm-2 mb-2">
              <div class="card text-white bg-success o-hidden h-100" style="background-color:#D5E494 !important;" >
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                  </div>
                  <div class="mr-5"><?php echo $row['Avg_power_factor'];?>kw</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="graph1.php">
                  <span class="float-left">powerfactor</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
        
		  <div class="col-xl-2 col-sm-2 mb-2">
              <div class="card text-white bg-success o-hidden h-100" style="background-color:#7FD1B9 !important;">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                  </div>
                  <div class="mr-5"> <?php $time = date( "Y-M-d H:i:s", strtotime( $row['Record_Time'] ) + 60*60*5 + 30*60 );?>
                <td><?php echo $time  ;?></td></div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="graph1.php">
                  <span class="float-left">Time</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>

          <!-- Area Chart Example-->
        

          <!-- DataTables Example -->
        <?php 
		$sql = "select * from smart_meter order by Record_Time desc limit 100";
		?>
                    
      <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data ENTRIES</div>
            <div class="card-header">
                <a class="btn btn-outline-dark" href='home.php?Yesterday=true' role="button">Yesterday</a>
                <a class="btn btn-outline-dark" href='home.php?Today=true' role="button">Today</a>
                <a class="btn btn-outline-dark" href="home.php?Month=true" role="button">Month</a>
            </div>
              
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
					 <th>TIME</th>
                      <th>ID</th>
					  <th>FREQUENCY</th>
                     <th>UNIT(kwh)</th>
                      <th>VOLTAGE</th>
                      <th>POWER_FACTOR</th>
					  <th>CURRENT</th>
                        <th>COST</th>
					 
                     </tr>
                  </thead>
          
        
</div>
        <?php
        function Yesterday()
        {
          $sql="select * from smart_meter where Record_Time >= CURDATE() - INTERVAL 1 DAY and Record_Time <CURDATE();";
          return $sql;
        }
        if (isset($_GET['Yesterday']))
        {
          $sql=Yesterday();
        }
        function Today()
        {
          $sql="select * from smart_meter where date(Record_Time)  = CURDATE();";
          return $sql;
        }
        if (isset($_GET['Today']))
        {
          $sql=Today();
        }
        function Month()
        {
          $sql="select * from smart_meter where month(Record_Time)=month(now()) order by id desc;";
          return $sql;
        }
        if (isset($_GET['Month']))
        {
          $sql=Month();
        }



        $result = $conn->query($sql);
        if($result->num_rows  > 0){

            while($row= $result->fetch_assoc())
            {

            ?>
                 
            <tr>
       <!-- <td><?php //echo $row['Record_Time']  ;?></td> -->
       <?php 
       $time = date( "Y-M-d H:i:s", strtotime( $row['Record_Time'] ) + 60*60*5 + 30*60 );
       ?>
                <td><?php echo $time  ;?></td>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['Frequency_Hz']; ?></td>
                <td><?php echo $row['Active_Total_Import']; ?></td>
                <td><?php echo $row['Average_Voltage']; ?></td>
                <td><?php echo $row['Avg_power_factor'] ;?></td>
				        <td><?php echo $row['Neutral_Line_current']; ?></td>
                <td><?php echo (float)($row['Active_Total_Import']*8.35);?></td>
               
              
            </tr>
        <?php
            }
          
             }
			 CloseCon($conn);
             ?>

             </table>
                  
                      
                   
                   </div>
               
               
          
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>
	</div>
</div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>

  </body>
  
</html>
