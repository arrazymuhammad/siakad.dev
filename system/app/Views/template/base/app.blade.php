<?php
	$user = \App\User::find(4);
	\Auth::loginUsingId($user->id);
?>

<!DOCTYPE html>
<html>
	<head>
		@include('template.section.app.head')
	</head>
	<body>
		<div class="page home-page">
			@include('template.section.app.header')
			<div class="page-content d-flex align-items-stretch navbar-fixed-top">
				@include('template.section.app.sidebar')
				<div class="content-inner">
					<header class="page-header">
						<div class="container-fluid">
							<h2 class="no-margin-bottom">@yield('page-header')</h2>
						</div>
					</header>
					<div class="content slimscroll-body">
						<section class="container">
							@include('template.section.app.alert')
							@yield('content')
						</section>
					</div>
					@include('template.section.app.footer')
				</div>
			</div>
		</div>
		@include('template.section.app.script')
	</body>
</html>