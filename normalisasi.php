			  <table class="table">
				  <thead class="thead-light">
						<th>#</th>
					<?php
						$noP = 1;
						$sql1 = "SELECT * FROM tbl_parameter";
						$result = mysqli_query($conn, $sql1);

						if (mysqli_num_rows($result) > 0) {
							while($row = mysqli_fetch_array($result)) {
							$prm = $row['parameter'];
					?>			
					  <th scope="col"><?=$row['parameter']?></th>
						
					<?php	
							}
						}
					?>
				  </thead>
								
						<?php
							$sql1 = "SELECT * FROM tbl_pendaftar";
							$resultPend = mysqli_query($conn, $sql1);
							while($rowPend = mysqli_fetch_array($resultPend)) {
								$id_pendaftar = $rowPend['id_pendaftar'];	
								$nama = $rowPend['nama_pendaftar'];
															
							?>
							<tr scope="row">
							<td><b><?=$nama?></b></td>
							<?php 	
								$sql2 = "SELECT * FROM tbl_parameter";
								$resultY = mysqli_query($conn, $sql2);
								while($rowY = mysqli_fetch_array($resultY)) {
									
									$id_parameterY = $rowY['id_parameter'];	
									$parameterY = $rowY['parameter'];	

									$sql9 = "SELECT *, rk.bobot_pendaftar as bbt FROM tbl_ranking rk 
											where rk.id_pendaftar = $id_pendaftar && rk.id_parameter = $id_parameterY ";
									$resultBbt = mysqli_query($conn, $sql9);
									$bbt = mysqli_fetch_array($resultBbt); 
									if (!empty($bbt)) {	
										if($bbt['id_parameter']=='4'){
											$sql10 = "select max(bobot_pendaftar) as acuan from tbl_ranking where id_parameter = $id_parameterY";
											$resultBbt10 = mysqli_query($conn, $sql10);
											$nor = mysqli_fetch_array($resultBbt10);
											$acuan = $nor['acuan'];
											$normalisasi=$acuan/$bbt['bbt'];																								
										}else {
											$sql10 = "select min(bobot_pendaftar) as acuan from tbl_ranking where id_parameter = $id_parameterY";
											$resultBbt10 = mysqli_query($conn, $sql10);
											$nor = mysqli_fetch_array($resultBbt10);
											$acuan=$nor['acuan'];
											$normalisasi=$bbt['bbt']/$acuan;
										}									
										echo "<td>".$normalisasi."</td>";  										
									}else{
											echo "<td></td>"; 	
										}	
								}
								
						?>
							</tr>	
						<?php
							}
						?>

					
				  </tbody>
				</table>