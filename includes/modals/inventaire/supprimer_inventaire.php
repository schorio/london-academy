<div id="supprimer_inventaire<?php echo htmlentities($row->id_inv); ?>" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<form method="post">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-body-delete">
					<div class="form-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h3>Suppression</h3>
							<p>Voulez vous vraiment supprimer l'inventaire <strong><?php echo htmlentities($row->piece_inv); ?></strong> ?</p>
					</div>
					<div class="modal-btn delete-action">
						<input type="hidden" name="supprimer_id" value="<?php echo htmlentities($row->id_inv); ?>">
						<input type="hidden" name="categorie_inv" value="<?php echo htmlentities($row->categorie_inv); ?>">
						<input type="hidden" name="si_inv" value="<?php echo htmlentities($row->si_inv); ?>">
						<div class="row">
							<div class="col-6">
								<a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Annuler</a>
							</div>
							<div class="col-6">
								<button type="submit" name="supprimer_inv" class="btn btn-primary continue-btn">Supprimer</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>