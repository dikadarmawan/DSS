			  <table class="table">
				  <thead class="thead-light">
						<th>KRITERIA</th>
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
							$sql1 = "SELECT * FROM tbl_parameter";
							$resultX = mysqli_query($conn, $sql1);
							while($rowX = mysqli_fetch_array($resultX)) {
								$id_parameterX = $rowX['id_parameter'];	
								$parameterX = $rowX['parameter'];
															
							?>
							<tr scope="row">
							<td><b><?=$parameterX?></b></td>
							<?php 	
								$sql2 = "SELECT * FROM tbl_parameter";
								$resultY = mysqli_query($conn, $sql2);
								while($rowY = mysqli_fetch_array($resultY)) {
									
									$id_parameterY = $rowY['id_parameter'];	
									$parameterY = $rowY['parameter'];	

									$sql3 = "SELECT *, pmY.parameter as prmY FROM tbl_pembobotan pb 
											inner join tbl_parameter pmY on pb.parameterY=pmY.id_parameter 
											where pb.parameterX = $id_parameterX && pb.parameterY = $id_parameterY ";
									$resultBbt = mysqli_query($conn, $sql3);
									$bbt = mysqli_fetch_array($resultBbt); 
									if (!empty($bbt)) {											
										echo "<td>".$bbt['bobot']."</td>";  										
									}else{
											echo "<td></td>"; 	
										}	
								}
								
						?>
							</tr>	
						<?php
							}
						?>
						
						<thead class="thead-light">
							<th>JUMLAH</th>
						<?php
							$noP = 1;
							$sqlJML = "SELECT * FROM tbl_parameter";
							$qryJML = mysqli_query($conn, $sqlJML);
								
								while($resultJML = mysqli_fetch_array($qryJML)) {
									$id_jml_parameterY = $resultJML['id_parameter'];	
									$jml_parameterY = $resultJML['parameter'];
									$total = 0;
									
									$sqlJML_R = "SELECT * FROM tbl_pembobotan pb 
											where pb.parameterY = $id_jml_parameterY";
									$resultJML_R = mysqli_query($conn, $sqlJML_R);
									while($jumlah = mysqli_fetch_array($resultJML_R)){									
									$total = $total+$jumlah['bobot'];
									}
									
						?>			
						  <th scope="col"><?=$total?></th>
							
						<?php	
								
							
							}
						?>
					  </thead>
					
				  </tbody>
				</table>