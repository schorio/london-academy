<div id="modifier_technicien<?php echo htmlentities($row->id_tech); ?>" class="modal custom-modal fade" role="dialog">
	<form method="post" class="form-horizontal" role="form">
		<div class="modal-dialog modal-dialog-centered">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Modifier un technicien</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" name="modifier_id" value="<?php echo htmlentities($row->id_tech); ?>">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="n_code_technicien">Nom du technicien : </label>
								<input type="text" class="form-control" id="n_libelle_tech" name="n_libelle_tech" value="<?php echo htmlentities($row->libelle_tech); ?>" required>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label for="n_nom_technicien">Nombre de sortie : </label>
								<input type="text" class="form-control" id="n_nbSortie_tech" name="n_nbSortie_tech" value="<?php echo htmlentities($row->nbSortie_tech); ?>" readonly>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label for="n_nom_technicien">Observation : </label>
								<input type="text" class="form-control" id="n_observation_tech" name="n_observation_tech" value="<?php echo htmlentities($row->observation_tech); ?>" autofocus>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label for="n_nom_technicien">Image : </label>
								<input type="text" class="form-control" id="n_image_tech" name="n_image_tech" value="<?php echo htmlentities($row->image_tech); ?>" autofocus>
							</div>
						</div>
					</div>
					
					<div class="submit-section">
						<button type="submit" class="btn btn-primary submit-btn" name="modifier_tech">Valider</button>
					</div>
				</div>
				
			</div>
		</div>
	</form>
</div>			