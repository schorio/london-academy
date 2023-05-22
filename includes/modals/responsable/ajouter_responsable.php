<div id="ajouter_responsable" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Ajouter un responsable</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="sampleForm" name="sampleForm" method="POST" enctype="multipart/form-data">

					<div class="form-group">
						<label>Nom du responsable <span class="text-danger">*</span></label>
						<input name="libelle_resp" required class="form-control" type="text">
					</div>
					<div class="form-group">
						<label>Fonction <span class="text-danger">*</span></label>
						<input name="fonction_resp" required class="form-control" type="text">
					</div>
					<div class="form-group">
						<label>Image <span class="text-danger">*</span></label>
						<input class="form-control" required name="image_resp" type="file">
					</div>
				
					<div class="submit-section">
						<button name="ajouter_resp" class="btn btn-primary submit-btn">Valider</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>