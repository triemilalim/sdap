<header class="main-header">
	<!--==========================
	=            logo            =
	===========================-->
	<a href="" class="logo">
		
		<!-- mini logo -->

		<span class="logo-mini">

			<img class="img-responsive" src="views/img/template/SDAPLogoputih.png" style="padding: 10px" >

		</span>

		<!-- logo -->

		<span class="logo-lg">

			<img class="img-responsive" src="views/img/template/SDAPlogo-blanco-lineal.png" style="padding: 10px" >

		</span>

	</a>
	
	<!--=====================================
	=            navigation         =
	======================================-->
	
	<nav class="navbar navbar-static-top" role="navigation">
		
		<!-- Navigation button -->

		<a class="sidebar-toggle" data-toggle="push-menu" role="button" href="#">

			<span class="sr-only">Toggle Navigation</span>

		</a>

		<!-- User Profile -->

		<div class="navbar-custom-menu">

			<ul class="nav navbar-nav">

				<li class="dropdown user user-menu">

					<a class="dropdown-toggle" data-toggle="dropdown" href="#">

						<?php 

							if ($_SESSION["file_foto"] != "") {
								
								echo '<img src="'.$_SESSION["file_foto"].'"class="user-image">';
							
							}else{

								echo '<img class="user-image" src="views/img/users/default/anonymous.png">';
							}

						?>
						
						<span class="hidden-xs"><?php echo $_SESSION["nama"]; ?></span>

					</a>

					<!-- dropdown toggle -->

					<ul class="dropdown-menu">

						<li class="user-body">
							<p>
							Role: 
							</p>
							<?php 

							if ($_SESSION["role"] == "opr_kab") {
								echo "Operator Kabupaten";
							} elseif ($_SESSION["role"] == "apr_kab") {
								echo "Approval Kabupaten";
							} elseif ($_SESSION["role"] == "opr_wil") {
								echo "Operator Kanwil";
							} else {
								echo $_SESSION["role"];
							}

							?>

							<div class="pull-right">

								<a class="btn btn-default btn-flat" href="logout">Logout</a>

							</div>

						</li>

					</ul>

				</li>

			</ul>
			
		</div>
		
	</nav>
	
</header>