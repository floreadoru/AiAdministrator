<div class="row">
	<div class="col-md-9">
		<div class="row">
			<div class="col-xs-12">
				<div class="box-content">
					<h3><i class="material-icons">event</i> Mai 2017</h3>
					<hr>
					<div class="row user-current-month-costs">
						<div class="col-sm-3">
							<span>Suma curenta</span>
							<strong>200 lei</strong>
						</div>
						<div class="col-sm-3">
							<span>Restante</span>
							<strong>47 lei</strong>
						</div>
						<div class="col-sm-3">
							<span>Total cheltuieli</span>
							<strong>247 lei</strong>
						</div>
						<div class="col-sm-3">
						<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
							<input type="hidden" name="cmd" value="_xclick">
							<input type="hidden" name="business" value="administrator@admin.com">
							<input type="hidden" name="lc" value="BM">
							<input type="hidden" name="item_name" value="Factura utilitati">
							<input type="hidden" name="amount" value="50.00">
							<input type="hidden" name="currency_code" value="EUR">
							<input type="hidden" name="button_subtype" value="services">
							<input type="hidden" name="no_note" value="0">
							<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
							<input type="submit" class="pay-now-button" value="Plateste">
							<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
						</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3 box-content">
		<div class="row">
			<div class="col-xs-12">
				<div class="user-top-right-details">
					<span>Adresa</span>
					<strong>Str. <?=$user_data->user_street?> Nr. <?=$user_data->user_street_number?>, Bloc <?=$user_data->user_building?>, Sc. <?=$user_data->user_entrance?></strong>
					<span>Administrator</span>
					<strong><?=$admin_data->admin_first_name?> <?=$admin_data->admin_last_name?></strong>
					<span>Contact</span>
					<strong><?=$admin_data->admin_phone?> <?=$admin_data->admin_email?></strong>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="send-index-box" class="box-content">
	<div class="row">
		<div class="col-xs-12">
			<h3><i class="material-icons">av_timer</i> Transmitere index</h3>
			<hr>
			<form id="send-index-form" method="POST" action="" role="form">
				<div class="col-sm-5">
					<div class="form-group">
						<label class="control-label cold-water-color"><i class="material-icons">ac_unit</i> <span>Apa rece</span></label>
						<input type="text" name="index_cold_water" class="form-control" placeholder="m3">
						<span>Index vechi:<?=$sum_cold_index?></span>
					</div>
				</div>
				<div class="col-sm-5">
					<div class="form-group">
						<label class="control-label hot-water-color"><i class="material-icons">whatshot</i> <span>Apa calda</span></label>
						<input type="text" name="index_hot_water" class="form-control" placeholder="m3">
						<span>Index vechi:<?=$sum_hot_index?></span>
					</div>
				</div>
				<div class="col-sm-2">
					<div class="form-group">
						<label class="control-label"></label>
						<input type="submit" name="send_index_submit" class="send-index-button">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>