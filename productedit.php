<?php include_once("../backend_abc/library/admin_session_header.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<?php include_once("../backend_abc/library/header.php");?>
	
	
	<style>
	table-striped>tbody>tr:nth-child(odd)>td, 
.table-striped>tbody>tr:nth-child(odd)>th {
   background-color: red; // Choose your own color here
}
	
	</style>
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
		<?php 
			include_once("../backend_abc/library/sidebar.php");
			include_once('../backend_abc/library/top_navigation.php'); 
		?>

            <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Manage products</h3>
				<?php
				if ($_REQUEST["r"]==1)
				{
				?>
				<div class="alert alert-success alert-dismissible fade in" role="alert">
                    <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="fa fa-close"></i></span>
                    </button>-->
                    <strong>Successfully added.</strong>
                  </div>
				<?php 
				}
				?>
				
				<?php
				if ($_REQUEST["e"]==1)
				{
				?>
				<div class="alert alert-success alert-dismissible fade in" role="alert">
                   <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="fa fa-close"></i></span>
                    </button>-->
                    <strong>Successfully Updated.</strong>
                  </div>
				<?php 
				}
				?>
				
				 <?php
				if(isset($_REQUEST["del"])){
					$del=$_REQUEST["del"];
			$sqldel="update product_master set active_status=0 where product_id=$del";
			//echo $sqldel;
				$conn->query($sqldel);
	
			
				?>
				<div class="alert alert-success alert-dismissible fade in" role="alert">
                    <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>-->
                    <strong>Successfully Record Deactivated.</strong>
                  </div>
				<?php 
			
				}
				?>
				<?php
				if(isset($_REQUEST["act"])){
					$act=$_REQUEST["act"];
			$sqldel="update product_master set active_status=1 where product_id=$act";
			//echo $sqldel;
				$conn->query($sqldel);
	
			
				?>
				<div class="alert alert-success alert-dismissible fade in" role="alert">
                   <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>-->
                    <strong>Successfully Record Activated.</strong>
                  </div>
				<?php 
			
				}
				?>
              </div>

              <div class="title_right">
			  
			       
					 
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <!-- <div class="input-group"> -->
                    <!-- <input type="text" class="form-control" placeholder="Search for..."> -->
                    <!-- <span class="input-group-btn"> -->
                      <!-- <button class="btn btn-default" type="button">Go!</button> -->
                    <!-- </span> -->
                  <!-- </div> -->
				    <!--<a href="add-users.php" class="btn btn-sm btn-primary pull-right">Add New Users</a>-->
				  
                </div>
				
              </div>
            </div>
            
            <div class="clearfix"></div>

            <div class="row" style="height:600px;">
           <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
               <div class="x_title">
                   
                   <!-- <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>-->
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
<form id="myForm" name="myForm" method="post" action="productedit.php" enctype="multipart/form-data">
			<table  class="table table-striped projects">
			<tr>					
					  <td width=10%>
					  <p><b>products</p></b>
                      </td>
					  
					  
					  <td width=30%>
					  
                        <select class="form-control has-feedback-left js-example-basic-single" id="product_name"  name="product_name">
							<option value="">---Choose products---</option>
							<?php 
							$res2 = $conn->query("select * from product_master where active_status=1 order by `product_name` asc");
							while ($row1 = $res2->fetch_array())
							{
								if($product_name==$row1[0])
									echo "<option value='$row1[0]' selected>$row1[2]</option>";
								else
								echo "<option value='$row1[0]'>$row1[2]</option>";
							}
							?>
										
						</select>
				
                      </td>
					  <td width=60%>
					  &nbsp;
					  </td>
					  
					  </tr>
					  <tr>
					 
						<td colspan=2>	  				
					  <center>
					  
					   <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
					   
					   <center><input type="submit" class="btn  btn-success" value="Search" >
					
                        
                       </div> </center>
						</td>
						
					</tr>
					</table>
                    						
					</form> 
                    
					<?php	

//new code starts
	//new code starts
	include_once "../backend_abc/library/abc_pagination.php";
	if(isset($_GET["page"]))
		$page = (int)$_GET["page"];
	else
		$page = 1;

	if(isset($_GET["product_name"]))
		$product = (int)$_GET["product_name"];
	else
		$product = "";

	$setLimit = 15;
	$pageLimit = ($page * $setLimit) - $setLimit;
	$product="";
	$product=$_POST["product_name"];

	
if ($_SERVER["REQUEST_METHOD"] == "POST" ) 
{	


	
}
	if($product==""){
	
	$sql = "SELECT * FROM  `product_master` where  active_status=1 order by product_name  ASC LIMIT ".$pageLimit." , ".$setLimit;
	
	$query = "SELECT COUNT(*) as totalCount from `product_master`  where active_status=1 order by product_id";
	}
	else{
	$sql = "SELECT * FROM  `product_master` where  active_status= 1 and product_id='$product' order by product_name desc LIMIT ".$pageLimit." , ".$setLimit;
	$query = "SELECT COUNT(*) as totalCount from `product_master` where  active_status= 1 and product_id='$product'  order by product_name";
	}


	
		$result = $conn->query($sql);
//new code ends
?>

					
					
					
					<div class="table-responsive">
                    <!-- start project list -->
                    <table class="table table-striped">
                      <thead class="thead-dark">
                        <tr>
 <th >#</th>
                         <th>Product Name</th>
						<!--  <th >password	</th>-->
						  
						 
						 <!-- <th >Usertype</th>-->
						  <th >Product Description</th>
						  						  
						  <th >Product Out Of Stock Order</th>
						  
						  <!--<th >Alternate Mobile</th>-->
						  <th >Product Tax</th>
						  
						  
						  <th >Avg Delivery Days</th>
						  
						 
						  				  
                          <th>Manage</th>
                        </tr>
                      </thead>
                      <tbody>

					  <?php
	$flag=0;
	$i=1;
	$serial = $pageLimit+1;//10+1=11
	
	
	if ($result->num_rows >0 ) 
	{
	while($row = $result->fetch_array())// boy
	{
		$product_id=md5($row[0]);
		$product_id = $row[0];
		
		?>		  
                        <tr>
                          <td>
								<?php echo $serial; ?>
						  </td>
						  <td>
								
								<?php echo $row['product_name']; ?>	
                          </td>
						 
						<!--  <td>
								<?php //echo $row['vendor_password']; ?>	
                          </td>-->
						 
 <td>
								<?php echo $row['product_description']; ?>	
                          </td>
						  <!-- <td>
								<?php //echo $row['usertype_id']; ?>	
                          </td>-->
						  
						  <td>
								<?php echo $row['product_out_of_stock_order']; ?>	
                          </td>
						 						 
						  <td>
								<?php echo $row['product_tax']; ?>	
                          </td>
						   
						  <td>
								<?php echo $row['avg_delivery_days']; ?>	
                          </td>

						  							                         
                          <td>
					
                            <a href="edit-product.php?e=<?php echo md5($row[0]); ?>" class="btn btn-info btn-xs"><i class="far fa-edit"></i> Edit </a>
                           
                          </td>
                        </tr>
		<?php
			$serial = $serial+1;
		}
	}else{?>
		<tr>
        <td colspan=5>
		There are no users.
		</td>
                        </tr>
		
	<?}
		?>
						
                      </tbody>
                    </table>
					
					
						<script>
		function delete_entry(del)
		{
			if(confirm("Are you sure to Edit ?"))
			{
				window.location="productedit.php?del="+del;
			}
		}
			
		function active_entry(act)
		{
			if(confirm("Are you sure to Update ?"))
			{
				window.location="productedit.php?act="+act;
			}
		}
</script>	
					</div>
					
					
					
					<div class="text-center">
    <ul class="pagination">
	<?php
		
		$page_url="productedit.php?product_name=".$product."&product_id=".$product."&";
		
		echo displayPaginationBelow($setLimit,$page,$page_url,$query,$conn);
	?>
	</ul>
	</div>
                    <!-- end project list -->

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

      <?php include_once('../backend_abc/library/copyright.php');?>
      </div>
    </div>

<?php include_once('../backend_abc/library/footer.php');?>
	
  </body>
</html>
