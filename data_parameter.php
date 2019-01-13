			  <table class="table">
				  <thead class="thead-light">
					<tr>
					  <th scope="col">#</th>
					  <th scope="col">Parameter</th>
					</tr>
				  </thead>
					
					<?php
						$noP = 1;
						$sql1 = "SELECT * FROM tbl_parameter";
						$result = mysqli_query($conn, $sql1);

						if (mysqli_num_rows($result) > 0) {
							while($row = mysqli_fetch_array($result)) {
					?>
					<tr>
					  <th scope="row"><?=$noP?></th>
					  <td><?=$row['parameter']?></td>
					</tr>			  
					<?php	
							$noP++;
							}
						}
					?>
					
				  </tbody>
				</table>