<aside class="main-sidebar">

	<section class="sidebar">
		
		<ul class="sidebar-menu">
			
			<li class="active">

				<a href="home">

					<i class="fa fa-home"></i>

					<span>Home</span>

				</a>

			</li>
			
			<?php 

			if ($_SESSION["role"] == "admin"){
				echo '			
				<li>

					<a href="edit-jatuh-tempo">

						<i class="fa fa-clock-o"></i>

						<span>Edit Tanggal Periode</span>

					</a>

				</li>

				<li>

					<a href="users">

						<i class="fa fa-user"></i>

						<span>Manajemen User</span>

					</a>

				</li>';
			}


			if ($_SESSION["role"] == "opr_kab") {
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

							<a href="input-data-bulanan">

								<i class="fa fa-circle"></i>

								<span>Input Data Bulanan</span>

							</a>

						</li>


					</ul>
				<li>';
			}
			if ($_SESSION["role"] == "apr_kab"){
				echo '	
					<li>
						<a href="approval">

							<i class="fa fa-check"></i>

							<span>Approval</span>

						</a>

					</li>';
			}

			if ($_SESSION["role"] == "opr_kab"){
				echo '	
					<li>
						<a href="cetak-laporan">
						
							<i class="fa fa-product-hunt"></i>

							<span>Cetak Laporan</span>

						</a>

					</li>';
			}

			if ($_SESSION["role"] == "opr_wil"){
				echo '	
					<li>
						<a href="cetak-laporan-provinsi">

							<i class="fa fa-product-hunt"></i>

							<span>Cetak Laporan</span>

						</a>

					</li>';
			}
			?>
			</ul>

		</section>

	</aside>