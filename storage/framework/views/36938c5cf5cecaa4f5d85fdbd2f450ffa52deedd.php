<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title><?php echo MyFunctions::getSiteTitle(); ?></title>
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php $version = MyFunctions::getCurrentVersion(); ?>
	<link rel="stylesheet" href="<?php echo e(asset('css/animate.css?v=').$version); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('css/lightcase.css?v=').$version); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('css/simple-line-icons.css?v=').$version); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('css/ElegantIcons.css?v=').$version); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('css/swiper.min.css?v=').$version); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('css/font-awesome.min.css?v=').$version); ?>">
	
	<link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css?v=').$version); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('css/front-style.css?v=').$version); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('css/home-4-style.css?v=').$version); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('css/responsive.css?v=').$version); ?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script> -->
	<script src="<?php echo e(asset('js/jquery-2.2.3.min.js?v=').$version); ?>"></script>
	<script data-cfasync="false" src="<?php echo e(asset('js/app.js')); ?>"></script>
	<script src="<?php echo e(asset('js/fontawesome.min.js?v=').$version); ?>"></script>
	<link rel="stylesheet" href="<?php echo e(asset('css/letmesoul.css?v=').$version); ?>" />
	<!-- <script src="https://js.pusher.com/4.1/pusher.min.js"></script> -->

	<script src="<?php echo e(asset('js/sweetalert.min.js')); ?>"></script>
	<?php $topColor = MyFunctions::getTopbarColor();
	if (isset($topColor)) {
		$topbarColor = MyFunctions::getTopbarColor();
	} else {
		$topbarColor = 'background: linear-gradient(50deg,rgb(115,80,199) 0%,rgb(236,74,99) 100%);';
	}
	$string = explode('rgb', $topbarColor);
	$first_color = '';
	if (isset($string[1])) {
		$first_start = strpos($string[1], '(') + 1;
		$first_end = strpos($string[1], ')') - 1;
		$shortString1 = substr($string[1], $first_start, $first_end);
		$arr1 = explode(',', $shortString1);
		$first_color = MyFunctions::rgb2HEXhtml($arr1[0], $arr1[1], $arr1[2]);
	}
	$sec_color = '';
	if (isset($string[2])) {
		$sec_start = strpos($string[2], '(') + 1;
		$sec_end = strpos($string[2], ')') - 1;
		$shortString2 = substr($string[2], $sec_start, $sec_end);
		$arr2 = explode(',', $shortString2);
		$sec_color = MyFunctions::rgb2HEXhtml($arr2[0], $arr2[1], $arr2[2]);
		// dd($first_color);
	}
	?>
	<style>
		#nav {
			list-style: none;
			margin: 0px;
			padding: 0px;
		}

		#nav li {
			float: left;
			margin-right: 20px;
			font-family: Arial;
			font-size: 14px;
			font-weight: bold;
		}

		#nav li a {
			color: #333333;
			text-decoration: none
		}

		#nav li a:hover {
			color: #006699;
			text-decoration: none
		}


		#notification_li {
			position: relative
		}

		.notificationContainer {
			background-color: #fff;
			border: 1px solid rgba(100, 100, 100, .4);
			-webkit-box-shadow: 0 3px 8px rgba(0, 0, 0, .25);
			overflow: visible;
			position: absolute;
			top: 30px;
			margin-left: -170px;
			width: 400px;
			z-index: 9999;
			display: none;
		}

		/* Popup Arrow */
		.notificationContainer:before {
			content: '';
			display: block;
			position: absolute;
			width: 0;
			height: 0;
			color: transparent;
			border: 10px solid black;
			border-color: transparent transparent white;
			margin-top: -20px;
			margin-left: 188px;
		}

		.notificationTitle {
			font-weight: bold;
			padding: 8px;
			font-size: 13px;
			background-color: #ffffff;
			position: fixed;
			z-index: 1000;
			width: 384px;
			border-bottom: 1px solid #dddddd;
		}

		.notificationsBody {
			padding: 33px 0px 0px 0px !important;
			max-height: 300px;
			overflow: hidden;
			overflow-y: scroll;
		}

		.notificationFooter {
			background-color: #7985a9;
			text-align: center;
			font-weight: bold;
			padding: 8px;
			font-size: 12px;
			border-top: 1px solid #dddddd;
		}

		#ui-id-1 {
			z-index: 99999;
			max-height: 400px;
			overflow: scroll;
			top: 58px;
			position: fixed;
		}

		#ui-id-1 p {
			display: inline;
		}

		.notification_count {
			padding: 3px 7px 3px 7px;
			background: #cc0000;
			color: #ffffff;
			font-weight: bold;
			/* margin-left: 77px; */
			left: 30px;
			border-radius: 9px;
			-moz-border-radius: 9px;
			-webkit-border-radius: 9px;
			position: absolute;
			margin-top: -11px;
			font-size: 11px;
			display: none;
		}

		.link {
			cursor: pointer;
		}

		.ui-menu-item {
			height: 80px;
			border: 1px solid #ececf9;
		}

		.ui-menu .ui-menu-item {
			height: 50px;
			padding-top: 10px;
		}

		.follow_btn,
		.block_btn {
			padding: 7px 12px 5px 12px;
			background: "<?php echo e(MyFunctions::getTopbarColor()); ?>";
			color: #fff;
			border-radius: 4px;
			margin-top: 3px;
			font-size: 12px;
			display: inline-block;
			cursor: pointer;
		}

		.video_view,
		.modal_video_view,
		.model-login-btn,
		.btn-blue,
		.bg-btn,
		.scroll-top {
			background: "<?php echo e(MyFunctions::getTopbarColor()); ?>";
			border-color: transparent;
		}

		.ModelCtrlBtn {
			display: inline-block;
			position: absolute;
			top: 35%;
			left: 45%;
			display: none;
		}

		#ctrlIcon {
			padding: 10px;
			border-radius: 50%;
			color: #000;
			background: #fbfbfb6b;
			font-size: 16px;
		}
	</style>
	<style>
		<?php if ($first_color != "" && $sec_color != "") { ?>.modal-main-action i.fa-heart,
		.top_home_subtitle,
		.upload-icon {
			background: -webkit-gradient(linear, left top, left bottom, from( <?php echo e($first_color); ?>), to( <?php echo e($sec_color); ?>));
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent;
		}

		<?php } else { ?>.modal-main-action i.fa-heart,
		.top_home_subtitle,
		.upload-icon {
			background: -webkit-gradient(linear, left top, left bottom, from( <?php echo e($first_color); ?>

				), to( <?php echo e($first_color); ?>

				));
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent;
		}

		<?php } ?>
	</style>
	<style>
		.color_white {
			color: #fff;
		}

		.color_blue {
			color: blue;
		}

		.modal-comment-list {
			max-height: 488px;
			overflow-y: scroll;
		}

		::-webkit-scrollbar {
			width: 3px;
		}

		.loadMore {
			display: none;
		}

		.container_top_header,
		.views {
			cursor: pointer;
		}
	</style>
</head>

<body data-spy="scroll" data-bs-target=".navbar">
	<?php
	$userId = 0;
	if(auth()->guard('web')->check()) {
	$userId = auth()->guard('web')->user()->user_id;
	}
	$topbarColor=MyFunctions::getTopbarColor();
	?>
	<header class="header">
		
		<nav class="navbar navbar-expand-lg fixed-top" id="main-nav" style="<?php echo e($topbarColor); ?>">
			<div class="container d-md-none d-lg-none d-blocks m-menu">
				<div class="col-9">
					<a href="<?php echo e(route('web.home')); ?>">
						<img class="white-logo img-responsive" src="<?php echo MyFunctions::getFrontWhiteLogo(); ?>" alt="">
					</a>
				</div>
				<div class="col-3 d-md-none d-lg-none d-blocks">
					<div class="dropdown">
						<button class=" dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fa fa-bars"></i>
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<?php if(auth()->guard('web')->check()): ?>
							<a class="dropdown-item m-username" href="#">
								<?php
								$dp = MyFunctions::getProfilepic(Auth::user()->user_id, Auth::user()->user_dp);
								?>
								<img src="<?php echo e($dp); ?>" style="width: 28px;margin-right: 8px;border-radius: 50%;">
								<?php echo e(auth()->guard('web')->user()->username); ?>

								<?php if (MyFunctions::checkUserVerified() == 1) { ?>
									<img src="<?php echo e(asset('default/verified-icon-blue.png')); ?>" alt="" style="width:15px;height:!5px;">
								<?php } ?>
							</a>
							<?php endif; ?>
							<a class="dropdown-item" href="<?php echo e(route('web.home')); ?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
							<?php if(auth()->guard('web')->check()): ?>
							<a href="<?php echo e(route('web.userProfile', auth()->guard('web')->user()->user_id)); ?>" class="dropdown-item"><i class="fa fa-user" aria-hidden="true" title="Profile"></i> Profile</a>
							<a href="#" class="dropdown-item notificationLink" id=""><i class="fa fa-bell" aria-hidden="true" title="Notifications"></i> Notifications</a>
							<span class="notification_count">0</span>
							<div class="notificationContainer">
								<div class="notificationTitle">
									<span>Notifications</span>
									<span onclick="changeStatus()" class="text-danger font-weight-normal pl-2 link">mark all as read</span>
									<span class="notification_close"><i class="fa fa-times"></i></span>
								</div>
								<div id="" class="notifications notificationsBody">
									

								</div>
								<div class="notificationFooter">
									<a onclick="window.location.href='<?php echo e(route("web.userNotifications")); ?>'" href="javascript:void(0);">See All</a>
								</div>
							</div>
							<!-- </li> -->

							<?php endif; ?>

							<a class="dropdown-item" href="<?php echo e(route('web.uploadVideo')); ?>"><i class="fa fa-upload" aria-hidden="true"></i> Upload Video</a>

							<?php if(auth()->guard('web')->check()): ?>
							<a class="dropdown-item" href="<?php echo e(route('web.messages')); ?>"><i class="fa fa-comments" aria-hidden="true"></i> Messages</a>
							<a class="dropdown-item" href="<?php echo e(route('web.blocked-user-list')); ?>"><i class="fa fa-ban" aria-hidden="true"></i> Blocked Users</a>

							<a class="dropdown-item" href="<?php echo e(route('web.changePassword')); ?>"><i class="fa fa-cogs" aria-hidden="true"></i> Change Password</a>
							<a class="dropdown-item" href="<?php echo e(route('web.logout')); ?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>

							<?php endif; ?>
							<?php if(!auth()->guard('web')->check()): ?>
							<a class="dropdown-item" href="<?php echo e(route('web.login')); ?>"><i class="fa fa-sign-in" aria-hidden="true" title="Login"></i> Login</a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="container d-none d-md-flex d-lg-flex">

				<div class="col-lg-3 col-md-4">
					<a class="navbar-brand" href="<?php echo e(route('web.home')); ?>">
						<img class="white-logo img-responsive" src="<?php echo MyFunctions::getFrontWhiteLogo(); ?>" alt="">
						<img class="color-logo img-responsive" src="<?php echo MyFunctions::getFrontWhiteLogo(); ?>" alt="">
					</a>
				</div>

				<div class="col-lg-5 col-md-4">
					<div class="video-search">
						<form action="<?php echo e(route('web.searchAll')); ?>" method="get">
							<?php echo e(csrf_field()); ?>

							<input type="text" class="v-search" placeholder="Search.." name="search" id="leuke_search" required>
							<!-- <input type="submit" class="" value="search">  -->
							<button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
						</form>
					</div>
				</div>

				<!-- <div class="col-lg-4 col-md-4 v-login " style="text-align: right"> -->
				<div class="col-lg-4 col-md-4 v-login text-right">
					<ul class="">

						<li class="d-md-none d-lg-flex"><a href="<?php echo e(route('web.home')); ?>"><i class="fa fa-home" aria-hidden="true"></i></a></li>

						
						<?php if(auth()->guard('web')->check()): ?>

						<li id="notification_li">
							<a href="#" class="notificationLink d-lg-flex d-md-flex">
								<i class="fa fa-circle blink_me"></i>
								<i class="fa fa-bell" aria-hidden="true" title="Notifications"></i></a>
							<span class="notification_count">0</span>
							<div class="notificationContainer">
								<div class="notificationTitle text-left">
									<span>Notifications</span>
									<span onclick="changeStatus()" class="text-danger font-weight-normal pl-2 link">mark all as read</span>
									<span class="notification_close"><i class="fa fa-times"></i></span>
								</div>
								<div id="" class="notifications notificationsBody">
									

								</div>
								<div class="notificationFooter">
									<a onclick="window.location.href='<?php echo e(route("web.userNotifications")); ?>'" href="javascript:void(0);">See All</a>
								</div>
							</div>
						</li>

						<?php endif; ?>

						<li class="d-md-none d-lg-flex">
							<a href="<?php echo e(route('web.uploadVideo')); ?>"><i class="fa fa-upload" aria-hidden="true" title="Upload"></i></a>
						</li>
						<?php if(!auth()->guard('web')->check()): ?>
						<li class="d-lg-none">
							<a href="<?php echo e(route('web.login')); ?>"><i class="fa fa-sign-in" aria-hidden="true" title="Upload"></i></a>
						</li>
						<?php endif; ?>
						<?php if(auth()->guard('web')->check()): ?>
						<li clas="d-md-none d-lg-flex"><a class="d-md-none d-lg-flex" href="<?php echo e(route('web.messages')); ?>">
								<i class="fa fa-circle blink_msg"></i>
								<i class="fa fa-comments" aria-hidden="true"></i></a>
						</li>
						<!-- <li class="d-md-block d-none d-lg-none">
							<a class="d-md-inline d-none d-lg-none dropdown-toggle tab-menu" id="dropdownMenuButton" 
								data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-user"></i>
							</a>
						</li> -->
						<?php endif; ?>
					</ul>

					<?php if(auth()->guard('web')->check()): ?>
					<!-- <a class="d-md-inline-flex d-none d-lg-none dropdown-toggle tab-menu" id="dropdownMenuButton" 
							data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fa fa-user"></i>
						</a> -->
			
					<button class="btn btn-secondary d-lg-inline-block dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top:15px;min-width: 130px;padding:10px;">
						<?php
						$dp = MyFunctions::getProfilepic(Auth::user()->user_id, Auth::user()->user_dp);

						?>
						<img src="<?php echo e($dp); ?>" style="width: 28px;margin-right: 8px;border-radius: 50%;">
						<?php echo e(auth()->guard('web')->user()->username); ?>

						<?php if (MyFunctions::checkUserVerified() == 1) { ?>
							<img src="<?php echo e(asset('default/verified-icon-blue.png')); ?>" alt="" style="width:15px;height:!5px;">
						<?php } ?>
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<!-- <a class="dropdown-item d-md-none d-lg-none" href="#"><?php echo e(auth()->guard('web')->user()->username); ?></a> -->
						<a class="dropdown-item d-lg-none" href="javascript:void(0)" onclick="window.location.href ='<?php echo e(route('web.home')); ?>'">Home</a>
						<a class="dropdown-item" href="javascript:void(0)" onclick="window.location.href='<?php echo e(route('web.userProfile', auth()->guard('web')->user()->user_id)); ?>'">Profile</a>
						<a class="dropdown-item d-lg-none" href="javascript:void(0)" onclick="window.location.href='<?php echo e(route('web.uploadVideo')); ?>'">Upload</a>
						<!-- <a class="dropdown-item d-lg-none" href="javascript:void(0)" onclick="window.location.href='<?php echo e(route('web.messages')); ?>'">Messages</a> -->
						<a class="dropdown-item" href="javascript:void(0)" onclick="window.location.href ='<?php echo e(route('web.changePassword')); ?>'">Change Password</a>
						<a class="dropdown-item" href="javascript:void(0)" onclick="window.location.href ='<?php echo e(route('web.messages')); ?>'">Messages</a>
						<!-- <a class="dropdown-item" href="#">Advertising</a> -->

						<a class="dropdown-item" href="javascript:void(0)" onclick="window.location.href ='<?php echo e(route('web.blocked-user-list')); ?>'">Blocked Users</a>
						<a class="dropdown-item" href="javascript:void(0)" onclick="window.location.href ='<?php echo e(route('web.home')); ?>'">Trending</a>
						<!-- <a class="dropdown-item" href="#">Latest</a> -->
						<a class="dropdown-item" onclick="window.location.href='<?php echo e(route('web.logout')); ?>'" href="#">Logout</a>
					</div>

					<?php else: ?>
					<button class="btn btn-secondary d-none d-lg-inline-block" type="button" onclick="window.location.href = '<?php echo e(route('web.login')); ?>'" style="margin-top:15px;">
						<i class="fa fa-sign-in" aria-hidden="true"></i> Login</button>
					<?php endif; ?>
					


				</div>


			</div>
		</nav>
	</header><!-- header -->

	<?php echo $__env->yieldContent('content'); ?>
	<?php if (Route::currentRouteName() != 'web.messages') { ?>
		<footer>
			<div class="row bottom_bar">
				<div class="col-md-4">
					<p class="copyright">&copy <?php echo e(date('Y')); ?> <span class="text-uppercase"><?php echo MyFunctions::getSiteTitle(); ?></span> All Rights Reserved</p>
				</div>
				<div class="col-md-4">
					<a href="<?php echo e(url('privacy-policy')); ?>">Privacy</a> | <a href="<?php echo e(url('terms')); ?>">Terms of Use</a> | <a href="<?php echo e(url('data-delete')); ?>">Data Deletion</a>
				</div>
				<div class="col-md-4  video-sm text-center">
					<?php $links = MyFunctions::getSocialMediaLinks();
					?>
					<ul style="display: inline-flex;">
						<li><a href="<?php echo isset($links->fb_link) ? $links->fb_link : '#'; ?>"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
						<li><a href="<?php echo isset($links->twitter_link) ? $links->twitter_link : '#'; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a href="<?php echo isset($links->google_link) ? $links->google_link : '#'; ?>"><i class="fa fa-google" aria-hidden="true"></i></a></li>
						<li><a href="<?php echo isset($links->youtube_link) ? $links->youtube_link : '#'; ?>"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
					</ul>
				</div>

			</div>
		</footer>
	<?php } ?>
	<?php if (Route::currentRouteName() != 'web.messages') { ?>
		<div class="scroll-top" style="<?php echo e(MyFunctions::getTopbarColor()); ?>">
			<i class="fa fa-arrow-up" aria-hidden="true"></i>
		</div>
	<?php } ?>
	<div class="main-search-area">
		<form class="main-search-form full-view">
			<div class="m-s-input">
				<input type="search" name="search" class="search-input" placeholder="Search..." autocomplete="off">
			</div>
			<span>Type and Hit Enter to Search</span>
		</form>
		<i class="icon_close"></i>
	</div>

	<script>
		$(document).ready(function() {
			<?php if (Route::currentRouteName() == 'web.tagVideos') { ?>

				var searchUrl = "<?php echo e(route('web.tagVideos',['val'=>$search])); ?>";
				var page = 1;
				var totalVideos = <?php echo $totalVideos; ?>;
				var loadedVideos = <?php echo $loadedVideos; ?>;
				//videos
				$(document).on('click', '#videoResult .loadMoreResult', function() {
					var type = $(this).attr('type');
					page = page + 1;
					$.ajax({
						type: "GET",
						url: searchUrl,
						data: {
							page: page
						},
						dataType: "json",
						success: function(response) {
							if (response.html != '') {
								page = page;

								totalVideos = response.totalVideos;
								loadedVideos = loadedVideos + response.loadedVideos;
								if (totalVideos <= loadedVideos) {
									$('#videoResult .loadMoreResult').hide();
								}
								$('.moreVideo').append(response.html);

							}
						}
					});
				});
			<?php } ?>
			<?php if (Route::currentRouteName() == 'web.searchAll') { ?>
				$("#viewMoreTags").click(function() {
					$('#tags_tab').trigger("click");
				});
				$("#viewMorePeople").click(function() {
					$('#people_tab').trigger("click");
				});
				$("#viewMoreVideo").click(function() {
					$('#video_tab').trigger("click");
				});


				var searchUrl = "<?php echo e(route('web.searchAll')); ?>";

				var vpage = 1;
				var ppage = 1;
				var tpage = 1;
				var totalVideoTags = <?php echo $totalVideoTags; ?>;
				var loadedVideoTags = <?php echo $loadedVideoTags; ?>;
				var totalPeople = <?php echo $totalPeople; ?>;
				var loadedPeople = <?php echo $loadedPeople; ?>;

				var totalVideos = <?php echo $totalVideos; ?>;
				var loadedVideos = <?php echo $loadedVideos; ?>;

				// $(".loadMoreResult").click(function(){

				//tags 
				$(document).on('click', '#tagResult .loadMoreResult', function() {
					var type = $(this).attr('type');
					// if(totalVideoTags>loadedVideoTags){
					// $('.loadMore').show();
					tpage = tpage + 1;
					$.ajax({
						type: "GET",
						url: searchUrl,
						data: {
							page: tpage,
							type: type,
							search: '<?php echo $search; ?>'
						},
						dataType: "json",
						success: function(response) {
							if (response.html != '') {
								tpage = tpage;
								if (type == 'T') {
									totalVideoTags = response.totalVideoTags;
									loadedVideoTags = loadedVideoTags + response.loadedVideoTags;
									if (totalVideoTags <= loadedVideoTags) {
										$('#tagResult .loadMoreResult').hide();
									}
									// $('.loadMore').hide();
									$('#tagResult .moreTags').append(response.html);
								}

							}
						}
					});
				});

				//people
				$(document).on('click', '#peopleResult .loadMoreResult', function() {
					var type = $(this).attr('type');
					ppage = ppage + 1;
					$.ajax({
						type: "GET",
						url: searchUrl,
						data: {
							page: ppage,
							type: type,
							search: '<?php echo $search; ?>'
						},
						dataType: "json",
						success: function(response) {
							if (response.html != '') {
								ppage = ppage;

								if (type == 'P') {
									totalPeople = response.totalPeople;
									loadedPeople = loadedPeople + response.loadedPeople;
									if (totalPeople <= loadedPeople) {
										$('#peopleResult .loadMoreResult').hide();
									}
									$('.morePeople').append(response.html);
								}
							}
						}
					});
				});

				//videos
				$(document).on('click', '#videoResult .loadMoreResult', function() {
					var type = $(this).attr('type');
					vpage = vpage + 1;
					$.ajax({
						type: "GET",
						url: searchUrl,
						data: {
							page: vpage,
							type: type,
							search: '<?php echo $search; ?>'
						},
						dataType: "json",
						success: function(response) {
							if (response.html != '') {
								vpage = vpage;

								if (type == 'V') {
									totalVideos = response.totalVideos;
									loadedVideos = loadedVideos + response.loadedVideos;
									if (totalVideos <= loadedVideos) {
										$('#videoResult .loadMoreResult').hide();
									}
									$('.moreVideo').append(response.html);
								}
							}
						}
					});
				});
			<?php } ?>


			<?php if (Route::currentRouteName() == 'web.following-list' || Route::currentRouteName() == 'web.followers-list') { ?>

				<?php if (Route::currentRouteName() == 'web.following-list') { ?>
					var followingUrl = "<?php echo e(route('web.following-list',['id'=> $userInfo->user_id])); ?>";
				<?php } else { ?>
					var followingUrl = "<?php echo e(route('web.followers-list',['id'=> $userInfo->user_id])); ?>";
				<?php } ?>
				var page = 1;
				var totalFollow = <?php echo $totalFollow; ?>;
				var loadedFollow = <?php echo $loadedFollow; ?>;
				$(window).scroll(function() {

					if ($(window).scrollTop() == $(document).height() - $(window).height()) {
						if (totalFollow > loadedFollow) {
							$('.loadMore').show();
							page = page + 1;
							$.ajax({
								type: "GET",
								url: followingUrl,
								data: {
									page: page
								},
								dataType: "json",
								success: function(response) {
									if (response.html != '') {
										page = page;
										totalFollow = response.totalFollow;
										loadedFollow = loadedFollow + response.loadedFollow;
										$('.loadMore').hide();
										$('#follow').append(response.html);
									}
								}
							});
						}
					}
				});


			<?php } ?>




			<?php if (Route::currentRouteName() == 'web.blocked-user-list') { ?>
				var blockUrl = "<?php echo e(route('web.blocked-user-list')); ?>";

				var page = 1;
				var totalBlock = <?php echo $totalBlock; ?>;
				var loadedBlock = <?php echo $loadedBlock; ?>;
				$(window).scroll(function() {

					if ($(window).scrollTop() == $(document).height() - $(window).height()) {
						if (totalBlock > loadedBlock) {
							$('.loadMore').show();
							page = page + 1;
							$.ajax({
								type: "GET",
								url: blockUrl,
								data: {
									page: page
								},
								dataType: "json",
								success: function(response) {
									if (response.html != '') {
										page = page;
										totalBlock = response.totalBlock;
										loadedBlock = loadedBlock + response.loadedBlock;
										$('.loadMore').hide();
										$('#block').append(response.html);
									}
								}
							});
						}
					}
				});


			<?php } ?>

		});



		var count = <?php echo e($newNotificationCount); ?>;

		<?php if (Route::currentRouteName() == 'web.home' || Route::currentRouteName() == 'web.userProfile') { ?>
			var page = 1;
			var totalVideo = <?php echo $videosCount; ?>;
			var loadedVideo = <?php echo config('app.videos_per_page'); ?>;
		<?php } ?>
		$(document).ready(function() {
			<?php if (Route::currentRouteName() == 'web.home' || Route::currentRouteName() == 'web.userProfile') {
				if (Route::currentRouteName() == 'web.home') { ?>
					var videoFetchUrl = "<?php echo e(route('web.home')); ?>";
				<?php } else { ?>
					var videoFetchUrl = "<?php echo e(route('web.userProfile',['id'=> $userInfo->user_id])); ?>";
				<?php } ?>

				$(window).scroll(function() {

					if ($(window).scrollTop() == $(document).height() - $(window).height()) {
						if (totalVideo > loadedVideo) {
							$('.loadMore').show();
							page = page + 1;
							$.ajax({
								type: "GET",
								url: videoFetchUrl,
								data: {
									page: page
								},
								dataType: "json",
								success: function(response) {
									if (response.html != '') {
										page = page;
										totalVideo = response.videosCount;
										loadedVideo = loadedVideo + response.videos.length;
										// alert(response.videos.data.length);
										$('.loadMore').hide();
										$('#leukeVideos').append(response.html);
									}
								}
							});
						}
					}
				});

			<?php } ?>

			var m_height = 80 + 54;
			var inner_height = $(window).height() - m_height;
			$('.h4-about').css('min-height', inner_height + 'px');
			$('.messenger').css('height', $(window).height() - 80 + 'px');

			sharedVideoId = "<?php echo e($sharedVideoId ?? ''); ?>";
			sharedVideoSrc = "<?php echo e($sharedVideoSrc ?? ''); ?>";
			if (sharedVideoId != '') {
				$('#LeukeModal').modal();
				modelbox_open(sharedVideoSrc, sharedVideoId);
			}

			if (count != 0) {
				$('.notification_count').html(count);
				$("#notification_count").fadeIn("slow");
			}
			$('.notification_close').click(function() {
				$(".notificationContainer").fadeOut("slow");
			});
			$(".notificationLink").click(function() {
				$(".notificationContainer").fadeToggle(300);
				$(".notification_count").fadeOut("slow");
				count = 0;

				//here call the controller to change status of the read
				url = "<?php echo e(route('web.notificationStatus')); ?>"
				$.ajax({
					type: "GET",
					url: url,
					data: "",
					dataType: "json",
					success: function(response) {
						// alert('abc');
						$('.notificationsBody').html(response.notificationHtml);
					}
				});
				return false;
			});

			//Document Click hiding the popup 
			$(document).click(function() {
				$(".notificationContainer").hide();
			});

			//Popup on click
			$(".notificationContainer").click(function() {
				return false;
			});

		});

		function videoShare(link) {
			facebookLink = "<?php echo e(Share::page(':link', '')->facebook()->getRawLinks()); ?>";
			twitterLink = "<?php echo e(Share::page(':link', null)->twitter()->getRawLinks()); ?>";
			whatsappLink = "<?php echo e(Share::page(':link')->whatsapp()->getRawLinks()); ?>";
			facebookLink = facebookLink.replace(':link', link);
			twitterLink = twitterLink.replace(':link', link);
			whatsappLink = whatsappLink.replace(':link', link);

			htmlContent = "<div class='d-flex flex-row justify-content-around'><a href='" + facebookLink + "'><i class='fa fa-facebook-square fa-2x ml-2' aria-hidden='true'></i></a>" +
				"<a href='" + twitterLink + "'><i class='fa fa-twitter-square fa-2x ml-2' aria-hidden='true'></i></a>" +
				"<a href='" + whatsappLink + "'><i class='fa fa-whatsapp fa-2x ml-2 mb-2 mr-2' aria-hidden='true'></i></a>" +
				"</div>";
			$("#video-share").popover({
				// title: function() {
				// 	return '<h5 class="text-white">Share</h5>';
				// },
				placement: 'top',
				container: 'body',
				html: true,
				content: function() {
					return htmlContent;
				}
			});
			$("#video-share").popover('show');
		}

		$('#modal-comment-form').on('submit', function(e) {
			e.preventDefault();
			form_data = $(this).serialize();
			formUrl = $('#modal-comment-form').prop('action');
			$.ajax({
				url: formUrl,
				type: 'POST',
				datatype: 'json',
				data: form_data,
				success: function(data) {
					if (data.success) {
						$('#video_comment').val('');
						$('#no_comment').css('display', 'none');
						$("#modal-comment-list").animate({
							scrollTop: $('#modal-comment-list').prop("scrollHeight")
						}, 1000);
						videoComments('insert');
					}
				},
				error: function(data) {
					if (data.status == 401) {
						window.location.href = "<?php echo e(route('web.login')); ?>";
					}
				}
			});
		})

		$(document).on('click', '.follow_btn', function() {
			// $('.follow_btn').on('click',function(){
			var userId = $(this).attr('data-id');
			var cv = $(this);
			var url = "<?php echo e(route('web.followUnfollowUser', ':id')); ?>";
			url = url.replace(':id', userId);
			$.ajax({
				url: url,
				type: 'GET',
				datatype: 'json',
				success: function(data) {
					if (data.success) {
						if (data.follow) {
							cv.html('Unfollow');
						} else {
							cv.html('Follow');
						}
					}
				},
				error: function(data) {
					if (data.status == 401) {
						window.location.href = "<?php echo e(route('web.login')); ?>";
					}
				}
			});
		});

		// $(document).on('click','.delete-single-msg',function(){
		// 	msg_id=$(this).attr('data-id');
		// 	that=this;
		// 	$.ajax({
		// 		url : " route('web.deleteSingleMsg') ",
		// 		type : 'POST',
		// 		data:{
		// 			msg_id:msg_id,
		// 			"_token": "<?php echo csrf_token(); ?>"
		// 		},
		// 		datatype : 'json',
		// 		success: function(data) {
		// 			if (data.status==true) {
		// 				$(that).parent().parent().parent().hide();
		// 			}
		// 		},
		// 		error: function(data) {
		// 			if (data.status == 401) {
		// 				window.location.href = "<?php echo e(route('web.login')); ?>";
		// 			}
		// 		}
		// 	});
		// });

		function modelVideo() {
			myVideo = document.getElementById("leukeVideo");

			if (myVideo.paused) {
				myVideo.play();
				$('#ctrlIcon').removeClass('fa-play').addClass('fa-pause');
				// ppbutton.innerHTML = "Pause";
			} else {
				myVideo.pause();
				$('#ctrlIcon').removeClass('fa-pause').addClass('fa-play');
				// ppbutton.innerHTML = "Play";
			}
		}

		function hoverVideo(id) {
			$("#video_" + id).get(0).play();
		}

		function hideVideo(id) {
			$("#video_" + id).get(0).pause();
		}

		function showIcon() {
			$('.ModelCtrlBtn').show();
		}

		function hideIcon() {
			$('.ModelCtrlBtn').hide();
		}

		$('#LeukeModal').on('hidden.bs.modal', function() {
			$('#leukeVideo')[0].pause();
		});
		window.document.onkeydown = function(e) {
			if (!e) {
				e = event;
			}
			if (e.keyCode == 27) {
				model_close();
			}
		}

		var checkThePlayheadPositionTenTimesASecond;
		var videoId = document.getElementById("leukeVideo");

		var pageNo = 5;
		var commentFormRoute = '';
		var morePages;
		var oldPage;
		var newPage;
		var bottom;

		// videoId.ontimeupdate = function() {myFunction()};

		function videoLike() {
			vId = $('#video_id').val();
			var likeUrl = "<?php echo e(route('web.videoLike', ':id')); ?>";
			likeUrl = likeUrl.replace(':id', vId);
			$.ajax({
				url: likeUrl,
				type: 'GET',
				datatype: 'json',
				success: function(data) {
					if (data.success) {
						if (data.liked) {
							$('#video-like').removeClass('fa-heart-o');
							$('#video-like').addClass('fa-heart');
						} else {
							$('#video-like').removeClass('fa-heart');
							$('#video-like').addClass('fa-heart-o');
						}

						$('#video_like_' + vId).html('<i class="fa fa-heart-o" aria-hidden="true"></i> ' + data.totalLikes);
					}
				},
				error: function(data) {
					if (data.status == 401) {
						window.location.href = "<?php echo e(route('web.login')); ?>";
					}
				}
			});
		}

		function openModal(id) {
			$('#' + id).trigger('click');
		}

		function modelbox_open(source, videoId, indexId) {

			oldPage = 1;
			newPage = 2;
			morePages = true;
			bottom = true;

			$("#modal-comment-list").html(' ');
			$('#video-like').removeClass('fa-heart');
			$('#video-like').addClass('fa-heart-o');
			// $("#modal-comment-list").animate({scrollTop: $("#modal-comment-list").offset().top});

			var leukeVideo = document.getElementById("leukeVideo");
			leukeVideo.src = source;
			leukeVideo.play();

			checkThePlayheadPositionTenTimesASecond = setInterval(function() {
				myTimer(videoId);
			}, 1000);

			var vidUrl = "<?php echo e(route('web.videoInfo', ':id')); ?>";
			vidUrl = vidUrl.replace(':id', videoId);

			commentFormRoute = "<?php echo e(route('web.videoPostComments', ':id')); ?>";
			commentFormRoute = commentFormRoute.replace(':id', videoId);

			socialLink = "<?php echo e(utf8_decode(urldecode(route('open-video', ['video_id' => ':id'])))); ?>";
            socialLink = socialLink.replace(':id', videoId);

			userProfileUrl = "<?php echo e(route('web.userProfile', ':id')); ?>";

			$.ajax({
				url: vidUrl,
				type: 'GET',
				datatype: 'json',
				success: function(data) {
					console.log('aaaaaaaaaaaaa');
					console.log(data);
					proifleImg = '';
					var index = data.video.user_dp.indexOf('googleusercontent.com');
					var index2 = data.video.user_dp.indexOf('facebook.com');
					var index3 = data.video.user_dp.indexOf('fbsbx.com');
					// if(index !== -1){
					//     alert("Substring found!");
					// } else{
					//     alert("Substring not found!");
					// }
					if (index !== -1 || index2 !== -1 || index3 !== -1) {
						profileImg = data.video.user_dp;
					} else {
						profileImg = data.video.user_dp;
						// profileImg= profileImg.replace(':userId', data.video.user_id);
					}

					// if(data.comment_html==""){
					// 	$("#modal-video-comment").hide();
					// }

					$('#video_id').val(videoId);

					userProfileUrl = userProfileUrl.replace(':id', data.video.user_id);

					$("#user-profile-img").closest("a").attr('href', userProfileUrl);
					$('#user-profile-img').prop('src', profileImg);
					$('#user-profile-info').html(data.video.name);
					$('.video_user_name').html(data.video.username);
					if (data.video.verified == 'A') {
						$('.verified_account').show();
					} else {
						$('.verified_account').hide();
					}
					// alert(data.video.description);
					$('.video_title').html(data.video.description);
					$(".video_title").append('<br />' + data.hashtags);
					$('#modal-comment-list').html(data.comment_html);
					// $('#modal-total-views').html(data.video.total_views + ' Views');
					$('.modal_video_view').html('<i class="fa fa-eye"></i> ' + data.video.total_views);
					$('#modal-video-date').html(data.video.video_date);
					$('.follow_div').html(data.follow_html);
					$('#modal-comment-form').prop('action', commentFormRoute);
					$("#modal-comment-list").animate({
						scrollTop: $("#modal-comment-list").offset().top
					});
					// modal-video-comment
					if (data.userLikedVideo == true) {
						$('#video-like').removeClass('fa-heart-o');
						$('#video-like').addClass('fa-heart');
					}


					$('#video-share').attr('onclick', "videoShare('" + socialLink + "')");

				}
			});

		}

		$("#modal-comment-list").scroll(function() {
			videoComments('scroll');
		});

		$(document).on('click', '.block_btn', function() {
			var userId = $(this).attr('data-id');
			var that = $(this);
			var url = "<?php echo e(route('web.blockUnblock', ':id')); ?>";
			url = url.replace(':id', userId);
			$.ajax({
				url: url,
				type: 'GET',
				datatype: 'json',
				success: function(data) {
					if (data.success) {
						if (data.block) {
							that.text('Unblock');
						} else {
							that.text('Block');
							// $('block_success').show();
							// setTimeout(() => {
							// 	$('block_success').hide();
							// }, 4000);
							// that.closest('.card').hide();
						}
					}
				},
				error: function(data) {
					if (data.status == 401) {
						window.location.href = "<?php echo e(route('web.login')); ?>";
					}
				}
			});

		});

		function blockUnblock(userId) {
			var url = "<?php echo e(route('web.blockUnblock', ':id')); ?>";
			url = url.replace(':id', userId);
			$.ajax({
				url: url,
				type: 'GET',
				datatype: 'json',
				success: function(data) {
					if (data.success) {
						if (data.block) {
							$('#blockUnblockIcon').html('<i class="fa fa-check-circle"></i>');
							$('#blockUnblock').html('Unblock');
						} else {
							$('#blockUnblockIcon').html('<i class="fa fa-ban"></i>');
							$('#blockUnblock').html('Block');
						}
					}
				},
				error: function(data) {
					if (data.status == 401) {
						window.location.href = "<?php echo e(route('web.login')); ?>";
					}
				}
			});
		}

		function followUnfollow(userId) {
			var url = "<?php echo e(route('web.followUnfollowUser', ':id')); ?>";
			url = url.replace(':id', userId);
			$.ajax({
				url: url,
				type: 'GET',
				datatype: 'json',
				success: function(data) {
					if (data.success) {
						if (data.follow) {
							$('#followUnfollowIcon').html('<i class="fa fa-user-times"></i>');
							$('#followUnfollow').html('Unfollow');
						} else {
							$('#followUnfollowIcon').html('<i class="fa fa-user-plus"></i>');
							$('#followUnfollow').html('Follow');
						}
					}
				},
				error: function(data) {
					if (data.status == 401) {
						window.location.href = "<?php echo e(route('web.login')); ?>";
					}
				}
			});
		}

		function homefollowUnfollow(userId) {
			var url = "<?php echo e(route('web.followUnfollowUser', ':id')); ?>";
			url = url.replace(':id', userId);
			$.ajax({
				url: url,
				type: 'GET',
				datatype: 'json',
				success: function(data) {
					if (data.success) {
						if (data.follow) {
							$('#followUnfollow').html('Unfollow');
						} else {
							$('#followUnfollow').html('Follow');
						}
					}
				},
				error: function(data) {
					if (data.status == 401) {
						window.location.href = "<?php echo e(route('web.login')); ?>";
					}
				}
			});
		}

		function videoComments(type) {
			canScroll = newPage > oldPage;
			var elem = $('#modal-comment-list');
			bottom = (elem[0].scrollHeight - elem.scrollTop()) == elem.outerHeight();

			if ((morePages && canScroll && bottom) || type == 'insert') {
				oldPage = newPage;
				videoId = $('#video_id').val();
				var vidUrl = "<?php echo e(route('web.videoComments', ['id' => ':id', 'type' => ':type'])); ?>" + "?page=" + newPage;
				vidUrl = vidUrl.replace(':id', videoId);
				vidUrl = vidUrl.replace(':type', type);
				$.ajax({
					url: vidUrl,
					type: 'GET',
					datatype: 'json',
					success: function(data) {
						$('#modal-comment-list').append(data.comment_html);
						newPage++;
						morePages = data.morePages;
					}
				});

			}

		}

		function myTimer(vId) {
			if (!videoId.paused) {
				var ctime = videoId.currentTime;
				if (ctime >= 5) { //alert('abc');
					//send ajax request for views increment
					var vidUrl = "<?php echo e(route('web.videoViewed', ':id')); ?>";
					var cookie = "<?php echo e(Illuminate\Support\Facades\Cookie::get('videoViewed')); ?>";

					vidUrl = vidUrl.replace(':id', vId);
					$.ajax({
						url: vidUrl,
						type: 'GET',
						datatype: 'json',
						data: {
							'unique_token': cookie,
						},
						success: function(data) {
							clearInterval(checkThePlayheadPositionTenTimesASecond);
							$('#video_view_' + vId).html('<i class="fa fa-eye"></i> ' + data.total_views);
						}
					});

					clearInterval(checkThePlayheadPositionTenTimesASecond);
				}
			}
		}

		function model_close() {
			// location.reload();
			var leukeVideo = document.getElementById("leukeVideo");
			leukeVideo.pause();

			$('#video_id').val('');
			$('#user-profile-img').prop('src', '');
			$('#user-profile-info').html(' ');
			$('#modal-comment-list').html(' ');
			$('#modal-total-views').html(' ');
			$('#modal-video-date').html(' ');
			$('#modal-comment-form').prop('action', '');
			$('#video-like').removeClass('fa-heart');
			$('#video-like').addClass('fa-heart-o');
			$('.modal_video_view').html(' ');
			$('.follow_div').html('');
		}

		function myFunction() {}

		$('body').on('click', function(e) {
			$('[data-toggle=popover]').each(function() {
				// hide any open popovers when the anywhere else in the body is clicked
				if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
					$(this).popover('hide');
				}
			});
		});

		
		// Pusher.logToConsole = true;
		// 	var pusher = new Pusher('<?php echo e(config("app.pusher_app_key")); ?>', {
		// 	cluster: '<?php echo e(config("app.pusher_app_cluster")); ?>',
		// 	encrypted: true
		// 	});
		// 	var channel = pusher.subscribe('my-channel-' + "<?php echo e($userId); ?>");
		// 	channel.bind('pusher:subscription_succeeded', function(members) {
		// 		// alert('successfully subscribed!');
		// 	});
		// 	channel.bind('my-event-' + "<?php echo e($userId); ?>", function(data) {
		// 		// alert(JSON.stringify(data));
		// 		returnData = data.message;
		// 		$('.notificationsBody').append(returnData);
		// 		$(".notification_count").fadeIn("slow");
		// 		$(".notification_count").html(++count);
		// 		$(".blink_me").show();
		// 	});

		function changeStatus() {
			$.ajax({
				type: "GET",
				url: "<?php echo e(route('web.notificationStatus', ['type' => 'All'])); ?>",
				dataType: "json",
				success: function(response) {
					// alert('abc');
					$('.notificationBlock').css('background', 'white');
				},
				error: function(data) {
					if (data.status == 401) {
						window.location.href = "<?php echo e(route('web.login')); ?>";
					}
				}
			});
		}

		$(function() {
			$("#leuke_search").autocomplete({
				source: function(request, response) {
					$.ajax({
						url: "<?php echo e(route('web.leukeSearch')); ?>",
						dataType: "json",
						data: {
							term: $('#leuke_search').val(),
						},
						success: function(data) {
							response($.map(data.result, function(result) {
								return {
									label: result.label,
									imgSrc: result.imgSrc,
									url: result.url,
								}
							}));
						}
					});
				},
				minLength: 1,
				select: function(event, ui) {
					window.location.href = ui.item.url;
				},
			}).data("ui-autocomplete")._renderItem = function(ul, item) {
				return $("<li></li>")
					.data("item.autocomplete", item)
					.append("<a>" + "<img style='width:30px;height:30px' src='" + item.imgSrc + "' /><span class='pl-3'>" + item.label + "</span></a>")
					.appendTo(ul);
			};
		});
		$(function() {
			if ($('.alert-section').is(':visible')) {
				setTimeout(function() {
					$(".alert-section").hide('blind', {}, 800)
				}, 5000);
			}
		});
	</script>
	
	<script data-cfasync="false" src="<?php echo e(asset('js/email-decode.min.js?v=').$version); ?>"></script>
	<script src="<?php echo e(asset('js/jquery.easing.min.js?v=').$version); ?>"></script>
	<script src="<?php echo e(asset('js/popper.min.js?v=').$version); ?>"></script>
	<script src="<?php echo e(asset('js/waypoints.min.js?v=').$version); ?>"></script>
	<script src="<?php echo e(asset('js/swiper.min.js?v=').$version); ?>"></script>
	<script src="<?php echo e(asset('js/jquery.events.touch.min.js?v=').$version); ?>"></script>
	<script src="<?php echo e(asset('js/lightcase.js?v=').$version); ?>"></script>
	<script src="<?php echo e(asset('js/jquery.counterup.min.js?v=').$version); ?>"></script>
	<script src="<?php echo e(asset('js/TweenMax.min.js?v=').$version); ?>"></script>
	<script src="<?php echo e(asset('js/jquery.wavify.js?v=').$version); ?>"></script>
	<script src="<?php echo e(asset('js/wow.min.js?v=').$version); ?>"></script>
	<script src="<?php echo e(asset('js/jquery.parallax-scroll.js?v=').$version); ?>"></script>
	<script src="<?php echo e(asset('js/particles.min.js?v=').$version); ?>"></script>
	<script src="<?php echo e(asset('js/jarallax.min.js?v=').$version); ?>"></script>
	<script src="<?php echo e(asset('js/jarallax-video.min.js?v=').$version); ?>"></script>
	<script src="<?php echo e(asset('js/form-validator.js?v=').$version); ?>"></script>
	<script src="<?php echo e(asset('js/custom.js?v=').$version); ?>"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
</body>

</html><?php /**PATH E:\wamp64\www\crakly\resources\views/layouts/front.blade.php ENDPATH**/ ?>