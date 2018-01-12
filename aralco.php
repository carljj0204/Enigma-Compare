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
                            <th>Product Code</th>                     
              				<th>Product Name</th>  		
              				<th>Quantity Available</th>  								  											
                    </tr>   
                  </thead>                 
            <?php              
       				include 'controller/config.php';
                    $aralco_sql = "SELECT * FROM aralco";
                    $aralco_result =  mysqli_query($db,$aralco_sql);
                    while($aralco_row = mysqli_fetch_array($aralco_result))

                    {   
                      $aralco_product_code = $aralco_row['product_code'];
                      $aralco_product_name = $aralco_row['product_name'];
                      $aralco_quantity_available = $aralco_row['quantity_available'];
                    ?>                 
                    <tr>
                           <td><?php echo $aralco_product_code;?></td>
                           <td><?php echo $aralco_product_name;?></td>
                           <td><?php echo $aralco_quantity_available;?></td>
                           
                            
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