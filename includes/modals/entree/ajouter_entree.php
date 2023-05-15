<div id="ajouter_inventaire" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Ajouter un(e) inventaire</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" enctype="multipart/form-data">

					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="piece_inv">Nom du produit : </label>
								<input type="text" class="form-control" id="piece_inv" name="piece_inv" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="fournisseur_inv">Fournisseur : </label>
								<select id="fournisseur_inv" required name="fournisseur_inv" class="select action">
									<option>Selectionner le fournisseur </option>
									<?php 
										$sql2 = "SELECT * from fournisseur";
										$query2 = $dbh -> prepare($sql2);
										$query2->execute();
										$result2=$query2->fetchAll(PDO::FETCH_OBJ);
										foreach($result2 as $row)
										{          
									?>  
										<option value="<?php echo htmlentities($row->id_frn);?>">
									<?php echo htmlentities($row->libelle_frn);?></option>
									<?php
										} 
									?> 
								</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="categorie_inv">Categorie : </label>
								<select id="categorie_inv" required name="categorie_inv" class="select action">
									<option>Selectionner le categorie </option>
									<?php 
										$sql2 = "SELECT * from categorie";
										$query2 = $dbh -> prepare($sql2);
										$query2->execute();
										$result2=$query2->fetchAll(PDO::FETCH_OBJ);
										foreach($result2 as $row)
										{          
									?>  
										<option value="<?php echo htmlentities($row->id_cat);?>">
									<?php echo htmlentities($row->libelle_cat);?></option>
									<?php
										} 
									?> 
								</select>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label for="description_inv">Description : </label>
								<input type="text" class="form-control" id="description_inv" name="description_inv" autofocus>
							</div>
						</div>
						<div class="col-sm-9">
							<div class="form-group">
								<label for="si_inv">Stock initial</label>
								<input type="number" class="form-control" id="si_inv" name="si_inv" value="0" autofocus>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label for="sa_inv">actuel : </label>
								<input type="text" class="form-control" id="sa_inv" name="sa_inv" value="0" readonly>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label for="stockage_inv">Stockage : </label>
								<input type="text" class="form-control" id="stockage_inv" name="stockage_inv" autofocus>
							</div>
						</div>
					</div>
				
					<div class="submit-section">
						<button name="ajouter_inv" type="POST" class="btn btn-primary submit-btn">Valider</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>