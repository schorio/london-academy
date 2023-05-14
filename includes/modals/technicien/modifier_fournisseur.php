<div id="modifier_fournisseur<?php echo htmlentities($row->id_frn); ?>" class="modal custom-modal fade" role="dialog">
	<form method="post" class="form-horizontal" role="form">
		<div class="modal-dialog modal-dialog-centered">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Modifier un fournisseur</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" name="modifier_id" value="<?php echo htmlentities($row->id_frn); ?>">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="n_code_fournisseur">Nom du fournisseur : </label>
								<input type="text" class="form-control" id="n_libelle_frn" name="n_libelle_frn" value="<?php echo htmlentities($row->libelle_frn); ?>" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="n_nom_fournisseur">Nombre d'entrée : </label>
								<input type="text" class="form-control" id="n_nbEntree_frn" name="n_nbEntree_frn" value="<?php echo htmlentities($row->nbEntree_frn); ?>" readonly>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="n_nom_fournisseur">Chiffre d'affaire : </label>
								<input type="text" class="form-control" id="n_ca_frn" name="n_ca_frn" value="<?php echo htmlentities($row->ca_frn); ?>" readonly>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label for="n_nom_fournisseur">Observation : </label>
								<input type="text" class="form-control" id="n_observation_frn" name="n_observation_frn" value="<?php echo htmlentities($row->observation_frn); ?>" autofocus>
							</div>
						</div>
					</div>
					
					<div class="submit-section">
						<button type="submit" class="btn btn-primary submit-btn" name="modifier_frn">Valider</button>
					</div>
				</div>
				
			</div>
		</div>
	</form>
</div>			