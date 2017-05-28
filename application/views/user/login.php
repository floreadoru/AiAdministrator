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
<body class="login-body">
<div class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-3 col-xs-1"></div>
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-10 login-form-holder">
				<form class="form-signin style-4" method="POST" role="form">
					<?php if ($this->session->flashdata('error')) : ?>
						<div class="alert alert-danger" role="alert">
							<h4>Eroare!</h4>
							<p><?=$this->session->flashdata('error')?></p>
						</div>
					<?php endif; ?>
					<br />
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon glyphicon glyfix">
								<i class="fa fa-envelope register-envelope" aria-hidden="true"></i>
							</span>
							<input id="inputEmail" name="user_email" class="form-control no-border" placeholder="ADRESA DE EMAIL" required="" autofocus="" type="email">
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon glyphicon glyfix">
								<i class="fa fa-unlock-alt register" aria-hidden="true"></i>
							</span>
							<input id="inputPassword" name="user_pass" class="form-control no-border" placeholder="PAROLA" type="password" required>
						</div>
					</div>

						<button class="btn btn-lg btn-primary btn-block" id = "inregistrare" type="submit">AUTENTIFICA-TE</button>
						<br />
						<a class = "orange-text" href = "#">INREGISTREAZA-TE</a>
				</form>
			<div class="col-lg-4 col-md-4 col-sm-3 col-xs-1"></div>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?=SITE_JS?>jquery.min.js"></script>
<script type="text/javascript" src="<?=SITE_JS?>bootstrap.min.js"></script>
<?=$this->wsBeforeBody?>
</body>
</html>