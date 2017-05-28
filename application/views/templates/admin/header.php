<!DOCTYPE HTML>
<html lang="ro" dir="ltr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title><?php echo (strlen($this->wsTitle) > 0) ? $this->wsTitle . ' - ' : ''; echo SITETITLE; ?></title>
<link rel="stylesheet" type="text/css" href="<?=SITE_CSS?>bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?=SITE_CSS?>style.css">
<!--[if lt IE 9]>
<script type="text/javascript" src="<?='//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.js'?>"></script>
<script type="text/javascript" src="<?='//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js'?>"></script>
<![endif]-->


<link rel="shortcut icon" type="image/x-icon" href="<?=SITE_URI?>favicon.ico">
<?=$this->wsBeforeHead?>
</head>

<body>
	<header id="site-header">
		<div class="container">
			<div class="pull-left">
				<span>AiAdministrator</span>
			</div>
			
			<div class="pull-right">
				<a href="logout"><span><i class="material-icons">exit_to_app</i></span></a>
			</div>
		</div>
	</header>
	
	<div id="main" class="container">
		
		<div id="left-navigation" class="col-md-3">
			<div class="user-details text-center">
				<i class="material-icons">account_circle</i>
				<h3><strong><?=$this->session->userdata('name')?></strong></h3>
				<h4>Administrator</h4>
			</div>
			<div id="select-association-box">
				<span>Asociatia de locatari:</span>

				<?php 
					if($associations){ ?>
					
						<select id="select-association" class="form-control">
						
							<?php	
								foreach($associations as $association){
							?>		
								<option value="<?=$association['id']?>"><?=$association["association_name"]?></option>	
									
							<?php 
								}
							?>						
						</select>
				<?php 
					}
				?>	
				
			</div>
			<ul id="main-navigation">
				<li><a href="<?=SITE_URI?>admin/dashboard">Panou</a></li>
				<li><a href="<?=SITE_URI?>admin/associations">Asociatii</a></li>
				<li><a href="<?=SITE_URI?>admin/users">Locatari</a></li>
				<li><a href="<?=SITE_URI?>admin/calculator">Calculator</a></li>
				<li><a href="<?=SITE_URI?>admin/bills">Facturi</a></li>
			</ul>
		</div>
	
		<div id="right-side-content" class="col-md-9">
			
			<?php if ($this->session->flashdata('success')) : ?>
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
				<h4>Succes:</h4>
				<p><?=$this->session->flashdata('success')?></p>
			</div>
			<?php endif; ?>
			
			<?php if ($this->session->flashdata('info')) : ?>
			<div class="alert alert-info alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
				<h4>Info:</h4>
				<p><?=$this->session->flashdata('info')?></p>
			</div>
			<?php endif; ?>
			
			<?php if ($this->session->flashdata('warning')) : ?>
			<div class="alert alert-warning alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
				<h4>Atenţie:</h4>
				<p><?=$this->session->flashdata('warning')?></p>
			</div>
			<?php endif; ?>
			
			<?php if ($this->session->flashdata('error')) : ?>
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
				<h4>Eroare:</h4>
				<p><?=$this->session->flashdata('error')?></p>
			</div>
			<?php endif; ?>

