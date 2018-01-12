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
					<a href="#">Pakibura toh thanks! hahahaha. VIRUS!!!</a>	
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
                   <div class="col-md-12">
                 <div class="white-box">
			 	<table class="table" id="dataTables-example">
                  	<thead>
                    <tr>
              <th>Product Code</th>
               <th>Quantity</th>
              <th>Web DP</th>
							<th>Web Loyale</th>
							<th>Web Walk In</th>
              <th>Pricelist Reseller</th>
							<th>Pricelist Loyale</th>
							<th>Pricelist Walk In</th>
							<th>Result</th>

                    </tr>
                  </thead>
            <?php
       				include 'controller/config.php';

                    $web_sql = "SELECT * FROM cixtv_hikashop_product where product_published = '1'";
                    $web_result =  mysqli_query($db,$web_sql);
                    while($web_row = mysqli_fetch_array($web_result))

                    {
                    	$web_productcode = $web_row['product_code'];
                       $web_productid = $web_row['product_id'];
                      $product_quantity = $web_row['product_quantity'];

                    $pricelist_sql = "SELECT * FROM pricelist where product_code = '$web_productcode'";
                    $pricelist_result =  mysqli_query($db,$pricelist_sql);
                    while($price_row = mysqli_fetch_array($pricelist_result))

                    {
                       $pricelist_reseller = $price_row['reseller'];
                    	 $pricelist_loyale = $price_row['loyale'];
                       $pricelist_walkinprice = $price_row['walkinprice'];

                    ?>
                    <tr>
                           <td><?php echo $web_productcode;?></td>
                           <td><?php echo $product_quantity;?></td>
                           <td><?php

                  $web_dp_sql = "SELECT * FROM cixtv_hikashop_price where price_product_id = '$web_productid' AND price_access = ',12,'";
                    $web_dp_price_result =  mysqli_query($db,$web_dp_sql);
                    while($web_dp_price_row = mysqli_fetch_array($web_dp_price_result))

                    {
                      $web_dp = $web_dp_price_row['price_value'];
                    }
                    Echo $web_dp;

                           ?></td>
                           <td><?php

                              $web_loyale_price_sql = "SELECT * FROM cixtv_hikashop_price where price_product_id = '$web_productid' AND price_access = ',11,'";
                    $web_loyale_price_result =  mysqli_query($db,$web_loyale_price_sql);
                    while($web_loyale_price_row = mysqli_fetch_array($web_loyale_price_result))

                    {
                      $web_loyale = $web_loyale_price_row['price_value'];
                    }
                    Echo $web_loyale;

                           ?></td>
                           <td><?php

                 $web_walkin_price_sql = "SELECT * FROM cixtv_hikashop_price where price_product_id = '$web_productid' AND price_access = ',9,10,'";
                    $web_walkin_price_result =  mysqli_query($db,$web_walkin_price_sql);
                    while($web_walkin_price_row = mysqli_fetch_array($web_walkin_price_result))

                    {
                      $web_walkinprice = $web_walkin_price_row['price_value'];
                    }
                    Echo $web_walkinprice;


                           ?></td>


                          <?php
           if($web_dp === $pricelist_reseller && $web_loyale ===  $pricelist_loyale && $web_walkinprice ===  $pricelist_walkinprice )
                     {

                      $result = 'Equal';
                     }else{
                      $result = '<P style = "background-color:red; color:white;">Not Equal';
                     }
                          ?>
                            <td><?php echo $pricelist_reseller;?></td>
                           <td><?php echo $pricelist_loyale;?></td>
                           <td><?php echo $pricelist_walkinprice;?></td>
                           <td><?php echo $result;?></td>

                    </tr>

                <?php
                    }
                     }

            ?>
       			 </table>
            	</div>

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
