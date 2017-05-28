<div id="add-new-user" class="box-content">
	<div class="row">
		<div class="col-xs-12">
			<h3><i class="material-icons">account_circle</i> Adauga locatar</h3>
			<hr>
			
			<form id="add-new-user-form" method="POST" role="form">
				
				<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label">Nume</label>
						<input type="text" name="user_first_name" class="form-control" value="<?php echo set_value('user_first_name'); ?>">
					</div>
					<div class="form-group">
						<label class="control-label">Email</label>
						<input type="email" name="user_email" class="form-control" value="<?php echo set_value('user_email'); ?>">
					</div>
					<div class="form-group">
						<label class="control-label">Parola</label>
						<input type="password" name="user_pass" class="form-control">
					</div>
					<div class="form-group">
						<label class="control-label">Strada</label>
						<?php 
							if($distinct_associations_street){ ?>
							
								<select id="select-association-street" name="user_street" class="form-control">
								
									<?php	
										foreach($distinct_associations_street as $distinct_association_street){
									?>		
										<option value="<?=$distinct_association_street['association_street']?>" <?php echo (set_value('user_street')==$distinct_association_street['association_street'])?" selected=' selected'":""?>><?=$distinct_association_street['association_street']?></option>	
											
									<?php 
										}
									?>						
								</select>
						<?php 
							}
						?>
					</div>
					<div class="form-group">
						<label class="control-label">Bloc</label>
						<?php 
							if($distinct_associations_building){ ?>
							
								<select id="select-association-building" name="user_building" class="form-control">
								
									<?php	
										foreach($distinct_associations_building as $distinct_association_building){
									?>		
										<option value="<?=$distinct_association_building['association_building']?>" <?php echo (set_value('user_building')==$distinct_association_building['association_building'])?" selected=' selected'":""?>><?=$distinct_association_building['association_building']?></option>	
											
									<?php 
										}
									?>						
								</select>
						<?php 
							}
						?>
					</div>
					<div class="form-group">
						<label class="control-label">Etaj</label>
						<input type="number" name="user_floor_number" class="form-control" value="<?php echo set_value('user_floor_number'); ?>">
					</div>
					<div class="form-group">
						<label class="control-label">Nr. camere</label>
						<input type="number" name="user_rooms_nr" class="form-control" value="<?php echo set_value('user_rooms_nr'); ?>">
					</div>
					<div class="form-group">
						<label class="control-label">Cod postal</label>
						<input type="number" name="user_zip_code" class="form-control" value="<?php echo set_value('user_zip_code'); ?>">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label">Prenume</label>
						<input type="text" name="user_last_name" class="form-control" value="<?php echo set_value('user_last_name'); ?>">
					</div>
					<div class="form-group">
						<label class="control-label">Numar de telefon</label>
						<input type="tel" name="user_phone" class="form-control" value="<?php echo set_value('user_phone'); ?>">
					</div>
					<div class="form-group">
						<label class="control-label">Repeta parola</label>
						<input type="password" name="user_pass_repeat" class="form-control">
					</div>
					<div class="form-group">
						<label class="control-label">Nr. Strada</label>
						<?php 
							if($distinct_associations_street_nr){ ?>
							
								<select id="select-association-street" name="user_street_number" class="form-control">
								
									<?php	
										foreach($distinct_associations_street_nr as $distinct_association_street_nr){
									?>		
										<option value="<?=$distinct_association_street_nr['association_street_nr']?>" <?php echo (set_value('user_street_number')==$distinct_association_street_nr['association_street_nr'])?" selected=' selected'":""?>><?=$distinct_association_street_nr['association_street_nr']?></option>	
											
									<?php 
										}
									?>						
								</select>
						<?php 
							}
						?>
					</div>
					<div class="form-group">
						<label class="control-label">Scara</label>
						<?php 
							if($distinct_associations_entrance){ ?>
							
								<select id="select-association-building" name="user_entrance" class="form-control">
								
									<?php	
										foreach($distinct_associations_entrance as $distinct_association_entrance){
									?>		
										<option value="<?=$distinct_association_entrance['association_entrance']?>" <?php echo (set_value('user_entrance')==$distinct_association_entrance['association_entrance'])?" selected=' selected'":""?>><?=$distinct_association_entrance['association_entrance']?></option>	
											
									<?php 
										}
									?>						
								</select>
						<?php 
							}
						?>
					</div>
					<div class="form-group">
						<label class="control-label">Nr. apartament</label>
						<input type="text" name="user_apartment_number" class="form-control" value="<?php echo set_value('user_apartment_number'); ?>">
					</div>
					<div class="form-group">
						<label class="control-label">Nr. persoane</label>
						<input type="number" name="user_persons_nr" class="form-control" value="<?php echo set_value('user_persons_nr'); ?>">
					</div>
				</div>
				<div class="col-sm-12">
					<div class="form-group">
						<input type="submit" name="add_new_user" class="btn btn-primary" value="Adauga locatar">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>