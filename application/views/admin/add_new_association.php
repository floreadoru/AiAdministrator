<div id="add-new-user" class="box-content">
	<div class="row">
		<div class="col-xs-12">
			<h3><i class="material-icons">account_circle</i> Adauga asociatie</h3>
			<hr>
			
			<form id="add-new-association-form" method="POST" action="" role="form">
				<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label">Nume asociatie</label>
						<input type="text" name="association_name" class="form-control">
					</div>
					<div class="form-group">
						<label class="control-label">CUI</label>
						<input type="text" name="association_cui" class="form-control">
					</div>
					<div class="form-group">
						<label class="control-label">Strada</label>
						<input type="text" name="association_street" class="form-control">
					</div>
					<div class="form-group">
						<label class="control-label">Bloc</label>
						<input type="text" name="association_building" class="form-control">
					</div>
					<div class="form-group">
						<label class="control-label">Cod postal</label>
						<input type="text" name="association_zip" class="form-control">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label">IBAN</label>
						<input type="text" name="association_iban" class="form-control" data-rule-required="true">
					</div>
					<div class="form-group">
						<label class="control-label">Nr. apartamente</label>
						<input type="number" name="association_apartments_nr" class="form-control" data-rule-required="true">
					</div>
					<div class="form-group">
						<label class="control-label">Nr. Strada</label>
						<input type="text" name="association_street_nr" class="form-control" data-rule-required="true">
					</div>
					<div class="form-group">
						<label class="control-label">Scara</label>
						<input type="text" name="association_entrance" class="form-control" data-rule-required="true">
					</div>
				</div>
				<div class="col-sm-12">
					<div class="form-group">
						<input type="submit" name="add_new_association" class="btn btn-primary" value="Adauga asociatie">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>