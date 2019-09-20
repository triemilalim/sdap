<aside class="main-sidebar">

	<section class="sidebar">
		
		<ul class="sidebar-menu">
			
			<li class="active">

				<a href="home">

					<i class="fa fa-home"></i>

					<span>Home</span>

				</a>

			</li>

			
			<!-- Pengumuman -->
			<?php 
			if($_SESSION["role"]=="opr_wil"){
				echo'
				<li>

						<a href="Pengumuman">

							<i class="fa fa-bullhorn"></i>

							<span>Pengumuman</span>

						</a>

					</li>
				';
			}
			?>
					
			<!-- User management -->
				<?php 
					if ($_SESSION["role"] == "admin"){
					echo'
					<li>

					<a href="users">

						<i class="fa fa-user"></i>

						<span>User management</span>

					</a>

				  </li>
					';
						
					}
				
				?>
				
			<!-- Input Data -->
			<?php 
				if ($_SESSION["role"] == "opr_kab"){
					echo '
					<li class="treeview">

					<a href="#">
		
						<i class="fa fa-list-ul"></i>
		
						<span>Input Data</span>
		
						<span class="pull-right-container">
		
							<i class="fa fa-angle-left pull-right"></i>
		
						</span>
		
					</a>
		
					<ul class="treeview-menu">
		
						<li>
		
							<a href="input-data">
		
								<i class="fa fa-circle"></i>
		
								<span>Input Data Tahunan</span>
		
							</a>
		
						</li>
		
		
						<li>
		
							<a href="create-sales">
		
								<i class="fa fa-circle"></i>
		
								<span>Input Data Bulanan</span>
		
							</a>
		
						</li>
						
		
					</ul>

					';
			
				}

			
			?>

			<!-- Approval -->
			<?php 
				if($_SESSION["role"]=="apr_kab"){
					echo'
					<li>

						<a href="approval">

							<i class="fa fa-check"></i>

							<span>Approval</span>

						</a>

					</li>
					';
				}
			?>
			
					

			
		</ul>

	</section>
	
</aside>