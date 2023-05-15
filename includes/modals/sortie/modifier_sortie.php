<div id="modifier_sortie<?php echo htmlentities($row->id_ent); ?>" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<!-- Modal content-->
		<div class="modal-content">
			<form method="POST" enctype="multipart/form-data">
				<div class="modal-header">
					<h5 class="modal-title">Modifier un sortie</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" name="modifier_id" value="<?php echo htmlentities($row->id_ent); ?>">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="piece_ent">Produit : </label>
								<select name="n_piece_ent" class="select action">
									<option value="<?php echo htmlentities($row->piece_ent); ?>"><?php echo htmlentities($row->piece_ent); ?></option>
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
								<label for="reference_ent">Reference : </label>
								<input type="text" class="form-control" id="reference_ent" name="n_reference_ent" value="<?php echo htmlentities($row->reference_ent); ?>" autofocus>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label for="quantite_ent">Quantite :</label>
								<input type="number" class="form-control" id="quantite_ent" name="n_quantite_ent" value="<?php echo htmlentities($row->quantite_ent); ?>" autofocus>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="pu_ent">Prix unitaire : </label>
								<input type="text" class="form-control" id="pu_ent" name="n_pu_ent" value="<?php echo htmlentities($row->pu_ent); ?>" autofocus>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="montant_ent">Montant : </label>
								<input type="text" class="form-control" id="montant_ent" name="n_montant_ent" value="<?php echo htmlentities($row->montant_ent); ?>" autofocus>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label for="date_ent">Date d'entrée : </label>
								<input type="date" class="form-control" id="date_ent" name="n_date_ent" value="<?php echo htmlentities($row->date_ent); ?>" autofocus>
							</div>
						</div>
						<div class="col-sm-9">
							<div class="form-group">
								<label for="observation_ent">Observation : </label>
								<input type="text" class="form-control" id="observation_ent" name="n_observation_ent" value="<?php echo htmlentities($row->observation_ent); ?>" autofocus>
							</div>
						</div>
					</div>
					
					<div class="submit-section">
						<button type="submit" class="btn btn-primary submit-btn" name="modifier_ent">Valider</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>			