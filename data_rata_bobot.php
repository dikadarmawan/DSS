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
					<th scope="col">JUMLAH BARIS</th>
					<th scope="col">RATA-RATA (BOBOT)</th>
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
						
					
				  </tbody>
				</table>