
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PORTFOLIO</title>
		<!-- CSS Vendor -->
		<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" media="all" />

		<link rel="stylesheet" type="text/css" href="../css/normalize.css" media="all" />
		<!-- CSS Perso -->
		<link rel="stylesheet" type="text/css" href="../css/base.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	</head>
	<body>
      <div class="navbar navbar-default navbar-static-top" role="navigation" >
        <div class="container">
          <div class="navbar-header">
            <a class="navbar-brand" href="<?= WEBROOT; ?>">Mon premier portfolio </a>
          </div>
          <ul class="nav navbar-nav">
            <li>
              <a href="category.php">catégories</a>
            </li>
						<li>
							<a href="work.php">réalisations</a>
						</li>
          </div>
          </ul>
      </div>
			<div class="container">
	<?= flash() ?>
