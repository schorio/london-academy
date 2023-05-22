<div id="ajouter_responsable" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Ajouter un responsable</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="sampleForm" name="sampleForm" method="POST" enctype="multipart/form-data">

					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="code_responsable">Nom du responsable : </label>
								<input type="text" class="form-control" id="libelle_resp" name="libelle_resp" required>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label for="nom_responsable">Matricule : </label>
								<input type="text" class="form-control" id="matricule_resp" name="matricule_resp" autofocus>
							</div>
						</div>
						<div class="col-sm-9">
							<div class="form-group">
								<label for="nom_responsable">Fonction : </label>
								<input type="text" class="form-control" id="fonction_resp" name="fonction_resp" autofocus>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label for="nom_responsable">Image : </label>
								<input type="file" class="form-control" id="image_resp" name="image_resp">
							</div>
						</div>
					</div>
				
					<div class="submit-section">
						<button name="ajouter_resp" class="btn btn-primary submit-btn">Valider</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>