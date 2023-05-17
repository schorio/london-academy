<div id="supprimer_sortie<?php echo htmlentities($row->id_sort); ?>" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<form method="post">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-body-delete">
					<div class="form-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h3>Suppression</h3>
							<p>Voulez vous vraiment supprimer la sortie de <strong><?php echo htmlentities($row->piece_sort); ?></strong> ?</p>
					</div>
					<div class="modal-btn delete-action">
						<input type="hidden" name="supprimer_id" value="<?php echo htmlentities($row->id_sort); ?>">
						<div class="row">
							<div class="col-6">
								<a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Annuler</a>
							</div>
							<div class="col-6">
								<button type="submit" name="supprimer_sort" class="btn btn-primary continue-btn">Supprimer</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>