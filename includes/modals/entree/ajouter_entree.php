<div id="ajouter_entree" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Entrer un produit</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" id="ajouter_form" name="ajouter_form" enctype="multipart/form-data">

					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="piece_ent">Produit : </label>
								<select id="piece_ent" required name="piece_ent" class="select action">
									<option>Selectionner le produit </option>
									<?php 
										$sql2 = "SELECT * from inventaire";
										$query2 = $dbh -> prepare($sql2);
										$query2->execute();
										$result2=$query2->fetchAll(PDO::FETCH_OBJ);
										foreach($result2 as $row_inv)
										{          
									?>  
										<option value="<?php echo htmlentities($row_inv->id_inv);?>">
									<?php echo htmlentities($row_inv->piece_inv);?></option>
									<?php
										} 
									?> 
								</select>
							</div>
						</div>
						<div class="col-sm-9">
							<div class="form-group">
								<label for="reference_ent">Reference : </label>
								<input type="text" class="form-control" id="reference_ent" name="reference_ent" autofocus>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label for="quantite_ent">Quantite :</label>
								<input type="number" class="form-control" id="i_quantite_ent" name="quantite_ent" value="0" autofocus>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="pu_ent">Prix unitaire : </label>
								<input type="number" class="form-control" id="i_pu_ent" name="pu_ent" value="0" autofocus>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="montant_ent">Montant : </label>
								<input type="number" class="form-control" id="i_montant_ent" name="montant_ent" value="0" autofocus>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label for="date_ent">Date d'entrée : </label>
								<input type="date" class="form-control" id="date_ent" name="date_ent" autofocus>
							</div>
						</div>
						<div class="col-sm-9">
							<div class="form-group">
								<label for="date_ent">Observation : </label>
								<input type="text" class="form-control" id="observation_ent" name="observation_ent" autofocus>
							</div>
						</div>
					</div>
				
					<div class="submit-section">
						<button name="ajouter_ent" type="POST" class="btn btn-primary submit-btn">Valider</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('#i_quantite_ent, #i_pu_ent').change(function(){
			var quantite_ent = document.getElementById("i_quantite_ent").value;
			var pu_ent = document.getElementById("i_pu_ent").value;

			var montant_ent = quantite_ent * pu_ent;

			document.ajouter_form.montant_ent = montant_ent;
		});
	});
</script>