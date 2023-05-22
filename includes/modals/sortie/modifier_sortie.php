<div id="modifier_sortie<?php echo htmlentities($row->id_sort); ?>" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<!-- Modal content-->
		<div class="modal-content">
			<form method="POST" enctype="multipart/form-data">
				<div class="modal-header">
					<h5 class="modal-title">Modification d'une sortie</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" name="modifier_id" value="<?php echo htmlentities($row->id_sort); ?>">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="piece_sort">Produit : </label>
								<input type="hidden" name="piece_sort" value="<?php echo htmlentities($row->piece_sort); ?>">
								<select name="n_piece_sort" class="select action">
									<option value="<?php echo htmlentities($row->piece_sort); ?>"><?php echo htmlentities($row->piece_inv); ?></option>
									<?php 
										$sql2 = "SELECT * from inventaire";
										$query2 = $dbh -> prepare($sql2);
										$query2->execute();
										$result2=$query2->fetchAll(PDO::FETCH_OBJ);
										foreach($result2 as $row_inv)
										{          
									?>  
										<option value="<?php echo htmlentities($row_inv->id_inv);?>">
											<?php echo htmlentities($row_inv->piece_inv);?>
										</option>
									<?php
										} 
									?> 
								</select>
							</div>
						</div>
						<div class="col-sm-9">
							<div class="form-group">
								<label for="responsable_sort">responsable : </label>
								<input type="hidden" name="responsable_sort" value="<?php echo htmlentities($row->responsable_sort); ?>">
								<select name="n_responsable_sort" class="select action">
									<option value="<?php echo htmlentities($row->responsable_sort); ?>"><?php echo htmlentities($row->libelle_resp); ?></option>
									<?php 
										$sql2 = "SELECT * from responsable";
										$query2 = $dbh -> prepare($sql2);
										$query2->execute();
										$result2=$query2->fetchAll(PDO::FETCH_OBJ);
										foreach($result2 as $row_resp)
										{          
									?>  
										<option value="<?php echo htmlentities($row_resp->id_resp);?>">
											<?php echo htmlentities($row_resp->libelle_resp);?>
										</option>
									<?php
										} 
									?> 
								</select>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label for="quantite_sort">Quantite :</label>
								<input type="hidden" name="quantite_sort" value="<?php echo htmlentities($row->quantite_sort); ?>">
								<input type="number" class="form-control" id="quantite_sort" name="n_quantite_sort" value="<?php echo htmlentities($row->quantite_sort); ?>" autofocus>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label for="date_sort">Date de sortie : </label>
								<input type="date" class="form-control" id="date_sort" name="n_date_sort" value="<?php echo htmlentities($row->date_sort); ?>" autofocus>
							</div>
						</div>
						<div class="col-sm-9">
							<div class="form-group">
								<label for="observation_sort">Observation : </label>
								<input type="text" class="form-control" id="observation_sort" name="n_observation_sort" value="<?php echo htmlentities($row->observation_sort); ?>" autofocus>
							</div>
						</div>
					</div>
					
					<div class="submit-section">
						<button type="submit" class="btn btn-primary submit-btn" name="modifier_sort">Valider</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>			