<div id="associations-content" class="box-content">
	<div class="row">
		<div class="col-md-12">
			<h3><i class="material-icons">people</i> Asociatii</h3>
			<hr>
			<div id="associations-list">
				<?php 
				if($associations){?>
			
					<table class="associations-list-table">
						<thead>
							<tr role="row">
								<th>Nume</th>
								<th>Strada</th>
								<th>Bloc</th>
								<th>Scara</th>
								<th>Nr Apartamente</th>
								<th>Actiuni</th>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach($associations as $association){ ?>
							<tr>
								<td><?=$association['association_name']?></td>
								<td><?=$association['association_street'] . ' Nr. ' . $association['association_street_nr'] ?></td>
								<td><?=$association['association_building']?></td>
								<td><?=$association['association_entrance']?></td>
								<td><?=$association['association_apartments_nr']?></td>
								<td>
									<a class="btn btn-primary" href="edit_association/<?=$association['id']?>">Editeaza</a>
									<button class="btn btn-default delete-association-button" data-association-id="<?=$association['id']?>">Sterge</button>
								</td>
							</tr>
							
							<?php } ?>
							
						</tbody>
						<tfoot>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>							
							<td><a href="add_new_association" class="add-new-association-button">Asociatie noua</a></td>
								
						</tr>
						</tfoot>
					</table>

			<?php 
				}?>
			</div>
		</div>		
	</div>
</div>



