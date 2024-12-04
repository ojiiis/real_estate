<!DOCTYPE html>
<html dir="ltr" lang="en">

<!-- Mirrored from creativelayers.net/themes/50X100-html/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 17 Nov 2024 23:58:42 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="advanced custom search, agency, agent, business, clean, corporate, directory, google maps, homes, idx agent, listing properties, membership packages, property, real broker, real estate, real estate agent, real estate agency, realtor">
<meta name="description" content="50X100 - Real Estate ">
<meta name="CreativeLayers" content="ATFN">
<base href="<?php echo $devSetting['scheme']."://".$devSetting['host'].$devSetting['devUrl']."/"; ?>">
<!-- css file -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<!-- Responsive stylesheet -->
<link rel="stylesheet" href="css/responsive.css">
<!-- Title -->
<title>50X100 - Real Estate </title>
<!-- Favicon -->
<link href="images/favicon.ico" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
<link href="images/favicon.ico" sizes="128x128" rel="shortcut icon" />

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="wrapper">
	<div class="preloader"></div>
	<style>
		#error-modal{
			width: 100%;
			height:100%;
			background:rgb(0,0,0,0.5);
			position: fixed;
			left:0;
			top:0;
			z-index: 9999;
			display:none;
			justify-content:center;
			align-items:center;
		}
		#error-modal-inner{
			max-height:90%;
			width: 50%;
		}
	</style>
<div id="error-modal">
	<div id="error-modal-inner">


	</div>
</div>
<?php 
 if(isset($_GET['is_home'])){
?>

	<!-- Main Header Nav -->
	<header class="header-nav menu_style_home_one navbar-scrolltofixed stricky main-menu">
		<div class="container-fluid p0">
		    <!-- Ace Responsive Menu -->
		    <nav>
		        <!-- Menu Toggle btn-->
		        <div class="menu-toggle">
		            <img class="nav_logo_img img-fluid" src="images/header-logo.png" alt="header-logo.png">
		            <button type="button" id="menu-btn">
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		            </button>
		        </div>
		        <a href="#" class="navbar_brand float-left dn-smd">
		            <img class="logo1 img-fluid" src="images/header-logo.png" alt="header-logo.png">
		            <img class="logo2 img-fluid" src="images/header-logo2.png" alt="header-logo2.png">
		        </a>
		        <!-- Responsive Menu Structure-->
		        <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
		        <ul id="respMenu" class="ace-responsive-menu text-right" data-menu-style="horizontal">
		            
	                <li class="list-inline-item list_s"><a href="#" class="btn flaticon-user" data-toggle="modal" data-target=".bd-example-modal-lg"> <span class="dn-lg">Login/Register</span></a></li>
	                <li class="list-inline-item add_listing"><a href="page-add-new-property.html"><span class="flaticon-plus"></span><span class="dn-lg"> Create Listing</span></a></li>
		        </ul>
		    </nav>
		</div>
	</header>
<?php
 }else{
   ?>
  	<!-- Main Header Nav -->
	<header class="header-nav menu_style_home_one style2 navbar-scrolltofixed stricky main-menu">
		<div class="container-fluid p0">
		    <!-- Ace Responsive Menu -->
		    <nav>
		        <!-- Menu Toggle btn-->
		        <div class="menu-toggle">
		            <img class="nav_logo_img img-fluid" src="images/header-logo.png" alt="header-logo.png">
		            <button type="button" id="menu-btn">
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		            </button>
		        </div>
		        <a href="#" class="navbar_brand float-left dn-smd">
		            <img class="logo1 img-fluid" src="images/header-logo2.png" alt="header-logo.png">
		            <img class="logo2 img-fluid" src="images/header-logo2.png" alt="header-logo2.png">
		        </a>
		        <!-- Responsive Menu Structure-->
		        <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
		        <ul id="respMenu" class="ace-responsive-menu text-right" data-menu-style="horizontal">
		            <li class="list-inline-item list_s"><a href="#" class="btn flaticon-user" data-toggle="modal" data-target=".bd-example-modal-lg"> <span class="dn-lg">Login/Register</span></a></li>
	                <li class="list-inline-item add_listing"><a href="page-add-new-property.html"><span class="flaticon-plus"></span><span class="dn-lg"> Create Listing</span></a></li>
		        </ul>
		    </nav>
		</div>
	</header> 
 
 <?php
 }
?>
	<!-- Modal -->
	<div class="sign_up_modal modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		      	<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		      	</div>
		      	<div class="modal-body container pb20">
		      		<div class="row">
		      			<div class="col-lg-12">
				    		<ul class="sign_up_tab nav nav-tabs" id="myTab" role="tablist">
							  	<li class="nav-item">
							    	<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Login</a>
							  	</li>
							  	<li class="nav-item">
							    	<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Register</a>
							  	</li>
							</ul>
		      			</div>
		      		</div>
					<div class="tab-content container" id="myTabContent">
					  	<div class="row mt25 tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
					  		<div class="col-lg-6 col-xl-6">
					  			<div class="login_thumb">
					  				<img class="img-fluid w100" src="images/resource/login.jpg" alt="login.jpg">
					  			</div>
					  		</div>
					  		<div class="col-lg-6 col-xl-6">
								<div class="login_form">
									<form action="/login">
										<div class="heading">
											<h4>Login</h4>
										</div>
										<div class="row mt25">
											<div class="col-lg-12">
												<button type="submit" class="btn btn-fb btn-block"><i class="fa fa-facebook float-left mt5"></i> Login with Facebook</button>
											</div>
											<div class="col-lg-12">
												<button type="submit" class="btn btn-googl btn-block"><i class="fa fa-google float-left mt5"></i> Login with Google</button>
											</div>
										</div>
										<hr>
										<div class="input-group mb-2 mr-sm-2">
										    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" name="login" placeholder="User Name Or Email">
										    <div class="input-group-prepend">
										    	<div class="input-group-text"><i class="flaticon-user"></i></div>
										    </div>
										</div>
										<div class="input-group form-group">
									    	<input type="password" class="form-control" id="exampleInputPassword1"  name="password" placeholder="Password">
										    <div class="input-group-prepend">
										    	<div class="input-group-text"><i class="flaticon-password"></i></div>
										    </div>
										</div>
										<div class="form-group custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="exampleCheck1">
											<label class="custom-control-label" for="exampleCheck1">Remember me</label>
											<a class="btn-fpswd float-right" href="#">Lost your password?</a>
										</div>
										<button type="submit" class="btn btn-log btn-block btn-thm">Log In</button>
										<p class="text-center">Don't have an account? <a class="text-thm" href="#">Register</a></p>
									</form>
								</div>
					  		</div>
					  	</div>
					  	<div class="row mt25 tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					  		<div class="col-lg-6 col-xl-6">
					  			<div class="regstr_thumb">
					  				<img class="img-fluid w100" src="images/resource/regstr.jpg" alt="regstr.jpg">
					  			</div>
					  		</div>
					  		<div class="col-lg-6 col-xl-6">
								<div class="sign_up_form">
									<div class="heading">
										<h4>Register</h4>
									</div>
									<form action="/register">
										<div class="row">
											<div class="col-lg-12">
												<button type="submit" class="btn btn-block btn-fb"><i class="fa fa-facebook float-left mt5"></i> Login with Facebook</button>
											</div>
											<div class="col-lg-12">
												<button type="submit" class="btn btn-block btn-googl"><i class="fa fa-google float-left mt5"></i> Login with Google</button>
											</div>
										</div>
										<hr>
										<div class="form-group input-group">
										    <input type="text" class="form-control" name="fullname" id="exampleInputName" placeholder="Fullname Name">
										    <div class="input-group-prepend">
										    	<div class="input-group-text"><i class="flaticon-user"></i></div>
										    </div>
										</div>
										<div class="form-group input-group">
										    <input type="text" class="form-control" name="username" id="exampleInputName" placeholder="User Name">
										    <div class="input-group-prepend">
										    	<div class="input-group-text">@</div>
										    </div>
										</div>
										<div class="form-group input-group">
										    <input type="email" class="form-control" name="email" id="exampleInputEmail2" placeholder="Email">
										    <div class="input-group-prepend">
										    	<div class="input-group-text"><i class="fa fa-envelope-o"></i></div>
										    </div>
										</div>
										<div class="form-group input-group">
										    <input type="password"  name="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
										    <div class="input-group-prepend">
										    	<div class="input-group-text"><i class="flaticon-password"></i></div>
										    </div>
										</div>
										<div class="form-group input-group">
										    <input type="password" name="password2" class="form-control" id="exampleInputPassword3" placeholder="Re-enter password">
										    <div class="input-group-prepend">
										    	<div class="input-group-text"><i class="flaticon-password"></i></div>
										    </div>
										</div>
										
										<div class="form-group custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="exampleCheck2">
											<label class="custom-control-label" for="exampleCheck2">I have read and accept the Terms and Privacy Policy?</label>
										</div>
										<button type="submit" class="btn btn-log btn-block btn-thm">Sign Up</button>
										<p class="text-center">Already have an account? <a class="text-thm" href="#">Log In</a></p>
									</form>
								</div>
					  		</div>
					  	</div>
					</div>
		      	</div>
		    </div>
		</div>
	</div>

	<!-- Main Header Nav For Mobile -->
	<div id="page" class="stylehome1 h0">
		<div class="mobile-menu">
			<div class="header stylehome1">
				<div class="d-flex justify-content-between">
					<a class="mobile-menu-trigger" href="#menu"><img src="images/dark-nav-icon.svg" alt=""></a>
					<a class="nav_logo_img" href="index-2.html"><img class="img-fluid mt20" src="images/header-logo2.png" alt="header-logo2.png"></a>
					<a class="mobile-menu-reg-link" href="page-register.html"><span class="flaticon-user"></span></a>
				</div>
			</div>
		</div><!-- /.mobile-menu -->
		<nav id="menu" class="stylehome1">
			<ul>
				<li><span>Home</span>
	                <ul>
	                    <li><a href="index-2.html">Home 1</a></li>
	                    <li><a href="index2.html">Home 2</a></li>
	                    <li><a href="index3.html">Home 3</a></li>
	                    <li><a href="index4.html">Home 4</a></li>
	                    <li><a href="index5.html">Home 5</a></li>
	                    <li><a href="index6.html">Home 6</a></li>
	                    <li><a href="index7.html">Home 7</a></li>
	                    <li><a href="index8.html">Home 8</a></li>
	                    <li><a href="index9.html">Home 9</a></li>
	                    <li><a href="index10.html">Home 10</a></li>
	                </ul>
				</li>
				<li><span>Listing</span>
					<ul>
						<li><span>Listing Grid</span>
							<ul>
	                            <li><a href="page-listing-grid-v1.html">Grid v1</a></li>
	                            <li><a href="page-listing-grid-v2.html">Grid v2</a></li>
	                            <li><a href="page-listing-grid-v3.html">Grid v3</a></li>
	                            <li><a href="page-listing-grid-v4.html">Grid v4</a></li>
	                            <li><a href="page-listing-grid-v5.html">Grid v5</a></li>
	                            <li><a href="page-listing-full-width-grid.html">Grid Fullwidth</a></li>
							</ul>
						</li>
						<li><span>Listing Style</span>
							<ul>
	                            <li><a href="page-listing-parallax.html">Parallax Style</a></li>
	                            <li><a href="page-listing-slider.html">Slider Style</a></li>
	                            <li><a href="page-listing-map.html">Map Header</a></li>
							</ul>
						</li>
						<li><span>Listing Half</span>
							<ul>
	                            <li><a href="page-listing-half-map-v1.html">Map V1</a></li>
	                            <li><a href="page-listing-half-map-v2.html">Map V2</a></li>
	                            <li><a href="page-listing-half-map-v3.html">Map V3</a></li>
	                            <li><a href="page-listing-half-map-v4.html">Map V4</a></li>
							</ul>
						</li>
						<li><span>Agent View</span>
							<ul>
	                            <li><a href="page-listing-agent-v1.html">Agent V1</a></li>
	                            <li><a href="page-listing-agent-v2.html">Agent V2</a></li>
	                            <li><a href="page-listing-agent-v3.html">Agent Details</a></li>
							</ul>
						</li>
						<li><span>Agencies View</span>
							<ul>
	                            <li><a href="page-agencies-list-v1.html">Agencies V1</a></li>
	                            <li><a href="page-agencies-list-v2.html">Agencies V2</a></li>
	                            <li><a href="page-agencies-list-v3.html">Agencies Details</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li><span>Property</span>
					<ul>
						<li><span>Property</span>
							<ul>
					            <li><a href="page-dashboard.html">Dashboard</a></li>
			                    <li><a href="page-my-properties.html">My Properties</a></li>
			                    <li><a href="page-add-new-property.html">Add New Property</a></li>
							</ul>
						</li>
						<li><span>Listing Single</span>
							<ul>
	                            <li><a href="page-listing-single-v1.html">Single V1</a></li>
	                            <li><a href="page-listing-single-v2.html">Single V2</a></li>
	                            <li><a href="page-listing-single-v3.html">Single V3</a></li>
	                            <li><a href="page-listing-single-v4.html">Single V4</a></li>
	                            <li><a href="page-listing-single-v5.html">Single V5</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li><span>Blog</span>
					<ul>
	                    <li><a href="page-blog-v1.html">Blog List 1</a></li>
	                    <li><a href="page-blog-grid.html">Blog List 2</a></li>
	                    <li><a href="page-blog-single.html">Single Post</a></li>
					</ul>
				</li>
				<li><span>Pages</span>
					<ul>
						<li><span>Shop</span>
							<ul>
			                    <li><a href="page-shop.html">Shop</a></li>
			                    <li><a href="page-shop-single.html">Shop Single</a></li>
			                    <li><a href="page-shop-cart.html">Cart</a></li>
			                    <li><a href="page-shop-checkout.html">Checkout</a></li>
			                    <li><a href="page-shop-order.html">Order</a></li>
							</ul>
						</li>
		                <li><a href="page-about.html">About Us</a></li>
		                <li><a href="page-gallery.html">Gallery</a></li>
		                <li><a href="page-faq.html">Faq</a></li>
		                <li><a href="page-login.html">LogIn</a></li>
		                <li><a href="page-compare.html">Membership</a></li>
		                <li><a href="page-compare2.html">Membership 2</a></li>
	                    <li><a href="page-register.html">Register</a></li>
	                    <li><a href="page-service.html">Service</a></li>
		                <li><a href="page-error.html">404 Page</a></li>
		                <li><a href="page-terms.html">Terms and Conditions</a></li>
		                <li><a href="page-ui-element.html">UI Elements</a></li>
					</ul>
				</li>
				<li><a href="page-contact.html">Contact</a></li>
				<li><a href="page-login.html"><span class="flaticon-user"></span> Login</a></li>
				<li><a href="page-register.html"><span class="flaticon-edit"></span> Register</a></li>
				<li class="cl_btn"><a class="btn btn-block btn-lg btn-thm circle" href="#"><span class="flaticon-plus"></span> Create Listing</a></li>
			</ul>
		</nav>
	</div>


    