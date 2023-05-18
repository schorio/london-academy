<div id="ajouter_sortie" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Sortir un produit</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" enctype="multipart/form-data">

					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="piece_sort">Produit : </label>
								<select id="piece_sort" required name="piece_sort" class="select action">
									<option>Selectionner le produit </option>
									<?php 
										$sql2 = "SELECT * from inventaire";
										$query2 = $dbh -> prepare($sql2);
										$query2->execute();
										$result2=$query2->fetchAll(PDO::FETCH_OBJ);
										foreach($result2 as $row_inv)
										{          
									?>  
										<option value="<?php echo htmlentities($row_inv->id_inv);?>">
									<?php echo htmlentities($row_inv->piece_inv);?></option>
									<?php
										} 
									?> 
								</select>
							</div>
						</div>
						<div class="col-sm-9">
							<div class="form-group">
								<label for="technicien_sort">Technicien : </label>
								<select id="technicien_sort" required name="technicien_sort" class="select action">
									<option>Selectionner le technicien </option>
									<?php 
										$sql2 = "SELECT * from technicien";
										$query2 = $dbh -> prepare($sql2);
										$query2->execute();
										$result2=$query2->fetchAll(PDO::FETCH_OBJ);
										foreach($result2 as $row_tech)
										{          
									?>  
										<option value="<?php echo htmlentities($row_tech->id_tech);?>">
									<?php echo htmlentities($row_tech->libelle_tech);?></option>
									<?php
										} 
									?> 
								</select>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label for="quantite_sort">Quantite :</label>
								<input type="number" class="form-control" id="quantite_sort" name="quantite_sort" value="0" autofocus>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label for="date_sort">Date de sortie : </label>
								<input type="date" class="form-control" id="date_sort" name="date_sort" autofocus>
							</div>
						</div>
						<div class="col-sm-9">
							<div class="form-group">
								<label for="observation_sort">Observation : </label>
								<input type="text" class="form-control" id="observation_sort" name="observation_sort" autofocus>
							</div>
						</div>
					</div>
				
					<div class="submit-section">
						<button name="ajouter_sort" type="POST" class="btn btn-primary submit-btn">Valider</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>