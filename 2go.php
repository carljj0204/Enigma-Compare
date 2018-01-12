<!DOCTYPE html>
<html>
<head>
	<title>Compare Prices</title>

	 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <title>Pixel Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- Animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
	
	 <link href="datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <!-- color CSS you can use different color css from css/colors folder -->
    <!-- We have chosen the skin-blue (blue.css) for this starter
          page. However, you can choose any other skin from folder css / colors .
-->
    <link href="css/colors/blue-dark.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			
			<div>
				<ul class="nav navbar-nav">
				<li>
					<a href="index.php">Compare Price</a>	
				</li>
				<li>					
				<a href="aralco.php">Aralco</a>
				</li>
          <li>
          <a href="web_check_quantity.php">Website Quantity Check</a> 
        </li>
        
				
			</ul>	
			</div>		
		</div>
	</nav>
<div class = "container">
	  
                     
                <div class="row">
                   
                 <div class="white-box">                    
				<table class="table" id="dataTables-example">
                  	<thead>
                    <tr>
                            <th>Region</th>                     
              				<th>PROVINCE</th>
                            <th>MUNICIPALITY</th>   
                            <th>BARANGAY</th>   
                          <th>AREA CODE</th>     		
             				<th>PORT CODE</th>  				
                        <th>OUTLET CODE</th>
                      <th>DELIVERY CATEGORY</th>   
                     <th>LEADTIME AIR</th>      
                     <th>LEADTIME SUPREME</th>   
                    <th>LEADTIME REGULAR</th>     				  											
                    </tr>   
                  </thead>                 
            <?php              
       				include 'controller/config.php';
                    $services_sql = "SELECT * FROM services_2go";
                    $services_result =  mysqli_query($db,$services_sql);
                    while($services_row = mysqli_fetch_array($services_result))

                    {   
                      $region = $services_row['REGION'];
                      $province = $services_row['PROVINCE'];
                      $municipality = $services_row['MUNICIPALITY'];
                      $barangay = $services_row['BARANGAY'];
                      $area_code = $services_row['AREA_CODE'];
                       $port_code = $services_row['PORT_CODE'];
                                $outlet_code = $services_row['OUTLET_CODE'];
                        $delivery_category = $services_row['DELIVERY_CATEGORY'];
                        $leadtime_air = $services_row['LEADTIME _IR'];
                         $leadtime_supreme = $services_row['LEADTIME_SUPREME'];
                          $leadtime_regular = $services_row['LEADTIME_REGULAR'];
                    ?>                 
                    <tr>
                           <td><?php echo $region;?></td>
                           <td><?php echo $province;?></td>
                           <td><?php echo $municipality;?></td>
                               <td><?php echo $barangay;?></td>
                           
                               <td><?php echo $area_code;?></td>
                           
                               <td><?php echo $port_code;?></td>
                           <td><?php echo $outlet_code;?></td>
                               <td><?php echo $delivery_category;?></td>
                           
                               <td><?php echo $leadtime_air;?></td>
                               <td><?php echo $leadtime_supreme;?></td>
                                  <td><?php echo $leadtime_regular;?></td>
                           
                           
                            
                    </tr>
				
                <?php
                    }  
                             
            ?>
       			 </table>
            	</div> 
            
            
            
                </div>
</div>
	 <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
  
  
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
  
    <script src="datatables/js/jquery.dataTables.min.js"></script>
    <script src="datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="datatables-responsive/dataTables.responsive.js"></script> 
</body>
</html>