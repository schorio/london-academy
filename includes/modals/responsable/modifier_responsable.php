<div id="modifier_responsable<?php echo htmlentities($row->id_resp); ?>" class="modal custom-modal fade" role="dialog">
	<form method="post" class="form-horizontal" role="form">
		<div class="modal-dialog modal-dialog-centered">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Modifier un responsable</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" name="modifier_id" value="<?php echo htmlentities($row->id_resp); ?>">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="n_code_responsable">Nom du responsable : </label>
								<input type="text" class="form-control" id="n_libelle_resp" name="n_libelle_resp" value="<?php echo htmlentities($row->libelle_resp); ?>" required>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label for="n_nom_responsable">Nombre de sortie : </label>
								<input type="text" class="form-control" id="n_nbSortie_resp" name="n_nbSortie_resp" value="<?php echo htmlentities($row->nbSortie_resp); ?>" readonly>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label for="n_nom_responsable">Fonction : </label>
								<input type="text" class="form-control" id="n_fonction_resp" name="n_fonction_resp" value="<?php echo htmlentities($row->fonction_resp); ?>" autofocus>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label for="n_nom_responsable">Observation : </label>
								<input type="text" class="form-control" id="n_observation_resp" name="n_observation_resp" value="<?php echo htmlentities($row->observation_resp); ?>" autofocus>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label for="n_nom_responsable">Image : </label>
								<input type="file" class="form-control" id="n_image_resp" name="n_image_resp" value="<?php echo htmlentities($row->image_resp); ?>">
							</div>
						</div>
					</div>
					
					<div class="submit-section">
						<button type="submit" class="btn btn-primary submit-btn" name="modifier_resp">Valider</button>
					</div>
				</div>
				
			</div>
		</div>
	</form>
</div>			