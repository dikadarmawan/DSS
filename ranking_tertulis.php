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
										echo "<td>".$bbt['tertulis']."</td>";  										
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