<?php 
	if($users){
?>
		<table class="users-list-table">
			<thead>
				<tr role="row">
					<th>Nume</th>
					<th>Prenume</th>
					<th>Ap</th>
					<th>Nr Cam</th>
					<th>Nr Pers</th>
					<th>Nr Telefon</th>
					<th>Email</th>
					<th>Actiuni</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach($users as $user){ ?>
				<tr>
					<td><?=$user['user_first_name']?></td>
					<td><?=$user['user_last_name']?></td>
					<td><?=$user['user_apartment_number']?></td>
					<td><?=$user['user_rooms_nr']?></td>
					<td><?=$user['user_persons_nr']?></td>
					<td><?=$user['user_phone']?></td>
					<td><?=$user['user_email']?></td>
					<td>
						<a class="btn btn-primary" href="edit_user/<?=$user['id']?>">Editeaza</a>
						<button class="btn btn-default delete-user-button" data-user-id="<?=$user['id']?>">Sterge</button>
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
				<td></td>	
				<td></td>				
				<td><a href="add_new_user" class="add-new-user-button">Locatar nou</a></td>
					
			</tr>
			
			</tfoot>

		</table>

<?php } ?>