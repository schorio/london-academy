<div id="modifier_inventaire<?php echo htmlentities($row->id_inv); ?>" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<!-- Modal content-->
		<div class="modal-content">
			<form method="POST" enctype="multipart/form-data">
				<div class="modal-header">
					<h5 class="modal-title">Modification d'un inventaire</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" name="modifier_id" value="<?php echo htmlentities($row->id_inv); ?>">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="piece_inv">Nom du produit : </label>
								<input type="text" class="form-control" id="n_piece_inv" name="n_piece_inv" value="<?php echo htmlentities($row->piece_inv); ?>" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="n_fournisseur_inv">Fournisseur : </label>
								<select required name="n_fournisseur_inv" class="select action">
									<option value="<?php echo htmlentities($row->fournisseur_inv); ?>">
										<?php echo htmlentities($row->libelle_frn); ?>
									</option>
									<?php 
										$sql2 = "SELECT * from fournisseur";
										$query2 = $dbh -> prepare($sql2);
										$query2->execute();
										$result2=$query2->fetchAll(PDO::FETCH_OBJ);
										foreach($result2 as $row_frn)
										{          
									?>  
										<option value="<?php echo htmlentities($row_frn->id_frn);?>">
											<?php echo htmlentities($row_frn->libelle_frn);?>
										</option>
									<?php
										} 
									?> 
								</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="n_categorie_inv">categorie : </label>
								<input type="hidden" class="form-control" id="categorie_inv" name="categorie_inv" value="<?php echo htmlentities($row->categorie_inv); ?>">
								<select required name="n_categorie_inv" class="select action">
									<option value="<?php echo htmlentities($row->categorie_inv); ?>">
										<?php echo htmlentities($row->libelle_cat); ?>
									</option>
									<?php 
										$sql2 = "SELECT * from categorie";
										$query2 = $dbh -> prepare($sql2);
										$query2->execute();
										$result2=$query2->fetchAll(PDO::FETCH_OBJ);
										foreach($result2 as $row_cat)
										{          
									?>  
									<option value="<?php echo htmlentities($row_cat->id_cat);?>">
										<?php echo htmlentities($row_cat->libelle_cat);?>
									</option>
									<?php
										} 
									?> 
								</select>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label for="n_description_inv">Description : </label>
								<input type="text" class="form-control" id="n_description_inv" name="n_description_inv" value="<?php echo htmlentities($row->description_inv); ?>" autofocus>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="si_inv">Stock initial</label>
								<input type="hidden" class="form-control" id="si_inv" name="si_inv" value="<?php echo htmlentities($row->si_inv); ?>">
								<input type="text" class="form-control" id="n_si_inv" name="n_si_inv" value="<?php echo htmlentities($row->si_inv); ?>" readonly>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="sa_inv">actuel : </label>
								<input type="text" class="form-control" id="n_sa_inv" name="n_si_inv" value="<?php echo htmlentities($row->sa_inv); ?>" readonly>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label for="n_stockage_inv">Stockage : </label>
								<input type="text" class="form-control" id="n_stockage_inv" name="n_stockage_inv" value="<?php echo htmlentities($row->stockage_inv); ?>" autofocus>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label for="n_observation_inv">Observation : </label>
								<input type="text" class="form-control" id="n_observation_inv" name="n_observation_inv" value="<?php echo htmlentities($row->observation_inv); ?>" autofocus>
							</div>
						</div>
					</div>
					
					<div class="submit-section">
						<button type="submit" class="btn btn-primary submit-btn" name="modifier_inv">Valider</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>			