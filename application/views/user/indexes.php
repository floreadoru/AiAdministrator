<div id="istoric-index" class="box-content">
	<div class="row">
		<div class="col-xs-12">
			<h3><i class="material-icons">av_timer</i> Istoric index</h3>
			<hr>
			
			<?php 
				if($istoric_index){
					
					foreach($istoric_index as $index) {
						
						$date_month = date('M',strtotime($index["index_adate"]));
						$date_day_month_year = date('d-M-y',strtotime($index["index_adate"]));
			?>
					
						<div class="row">
							<div class="col-sm-6">
								<strong><?=$date_month?></strong><br><br>
								Data citirii: <strong><?=$date_day_month_year?></strong>
							</div>
							<div class="col-sm-3">
								<strong><?=$index["index_cold_water"]?> m3<strong><br>
								<div class="cold-water-color vertical-align-water-icons"><i class="material-icons">ac_unit</i> <span>Apa rece</span></div>
							</div>
							<div class="col-sm-3">
								<strong><?=$index["index_hot_water"]?> m3<strong><br>
								<div class="hot-water-color vertical-align-water-icons"><i class="material-icons">whatshot</i> <span>Apa calda</span></div>
							</div>
						</div>
						<hr>
			
			
			<?php }
				}
			?>
			
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