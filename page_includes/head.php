<?php include('includes/handle_googlebot.php'); ?>

<?php isset($title)       || $title       = "A newly moulded site"; ?>
<?php isset($description) || $description = "Let's describe a newly moulded site"; ?>

<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title><?php echo $title; ?></title>
	<meta name="description" content="<?php echo $description; ?>">
	<meta name="author" content="Luke Plaster - lukep.org">

	<meta name="viewport" content="width=device-width">

	<link href="favicon.ico" rel="shortcut icon" type="image/x-icon">
	<link href="http://fonts.googleapis.com/css?family=Shadows+Into+Light|Questrial|Telex" rel="stylesheet" type="text/css">
	<link href="css/style.css?<?php echo filemtime('css/style.css')%100000 ?>" rel="stylesheet" type="text/css">

	<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.5.3/modernizr.min.js"></script>
</head>
<body>
<div id="header_cover"></div>
<header class="gradient">
	<h1><a href="index">A newly moulded site</a></h1>
	<nav>
		<ul>
			<li><a href="page-one">Page one</a></li>
			<li><a href="page-two">Page two</a></li>
			<li><a href="page-three">Missing page</a></li>
		</ul>
	</nav>
</header>
<div role="main" id="main">
