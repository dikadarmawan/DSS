					<?php
							$sql1 = "SELECT * FROM tbl_parameter";
							$resultX = mysqli_query($conn, $sql1);
							$i=0;
							while($rowX = mysqli_fetch_array($resultX)) {
								
								$id_parameterX = $rowX['id_parameter'];	
								$parameterX = $rowX['parameter'];

								$sql2 = "SELECT * FROM tbl_parameter";
								$resultY = mysqli_query($conn, $sql2);
								$jumlah_baris = 0;
								while($rowY = mysqli_fetch_array($resultY)) {
									
									$id_parameterY = $rowY['id_parameter'];	
									$parameterY = $rowY['parameter'];	

									$sql3 = "SELECT *, pmY.parameter as prmY FROM tbl_pembobotan pb 
											inner join tbl_parameter pmY on pb.parameterY=pmY.id_parameter 
											where pb.parameterX = $id_parameterX && pb.parameterY = $id_parameterY ";
									$resultBbt = mysqli_query($conn, $sql3);
									$bbt = mysqli_fetch_array($resultBbt); 	
									if (!empty($bbt)) {	
									
										$sql4 = "SELECT sum(bobot) as jml FROM `tbl_pembobotan` WHERE parameterY=$id_parameterY GROUP BY (parameterY)"; 
										$resultJml = mysqli_query($conn, $sql4);
										$Jml = mysqli_fetch_array($resultJml); 
											
										$jumlah_parameter=$bbt['bobot']/$Jml['jml'];
										$jumlah_baris = $jumlah_baris+$jumlah_parameter;	
									
									}
								}
								$sql5 = "SELECT * FROM tbl_parameter";
								$resultCount = mysqli_query($conn, $sql5);
								$ratarataCount=mysqli_num_rows($resultCount);
								$ratarata=$jumlah_baris/$ratarataCount;
									$p[$i] = $ratarata;
									$i++;								
							}

						?>			  
			  
			  <table class="table">
				  <thead class="thead-light">
						<th>ALTERNATIF</th>		
						<th scope="col">Nilai SAW</th>
						

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
								$saw = 0;
								$x = 0;
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
										$saw = $saw+($normalisasi*$p[$x]);
										
										//echo "<td>".$normalisasi ." x ". $p[$x]. " = ". $saw."</td>"; 
										$x++;
										
									}
								}
								
						?>
							<td><?=$saw?></td> 
							</tr>	
						<?php
							}
						?>

					
				  </tbody>
				</table>