
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>HackerspaceSG Membership Management System</title>

	<?= stylesheet_link_tag() ?>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>

	<div class="site-wrapper">

		<div class="site-wrapper-inner">

			<div class="cover-container">

				<div class="masthead clearfix">
					<div class="inner">
						<h3 class="masthead-brand">HackerspaceSG</h3>
						<ul class="nav masthead-nav">
							<li class="active"><a href="#home" data-toggle="tab">Home</a></li>
						</ul>
					</div>
				</div>

				<div class="tab-content">
					<div class="tab-pane active" id="content">
						@yield('content')
					</div>
				</div>

				

				<div class="mastfoot">
					<div class="inner">
						@yield('footer')
					</div>
				</div>

			</div>

		</div>

	</div>

<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<?= javascript_include_tag() ?>
</body>
</html>
