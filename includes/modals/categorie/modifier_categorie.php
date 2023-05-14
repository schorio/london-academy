<div id="modifier_categorie<?php echo htmlentities($row->id_cat); ?>" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Modifier un categorie</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post">
					<input type="hidden" name="modifier_id" value="<?php echo htmlentities($row->id_cat); ?>">
					<div class="form-group">
						<label>Nom du categorie : </label>
						<input class="form-control" name="n_libelle_cat" value="<?php echo htmlentities($row->libelle_cat); ?>" type="text">
					</div>
					<div class="form-group">
						<label>Quantité : </label>
						<input class="form-control" name="n_quantite_cat" value="<?php echo htmlentities($row->quantite_cat); ?>" type="text" readonly>
					</div>
					<div class="form-group">
						<label>Observation : </label>
						<input class="form-control" name="n_observation_cat" value="<?php echo htmlentities($row->observation_cat); ?>" type="text">
					</div>
					<div class="submit-section">
						<button name="modifier_cat" type="submit" class="btn btn-primary submit-btn">Sauvegarder</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>