<?php

use app\widgets\Alert;
use app\modules\admin\Module;
use yii\helpers\ArrayHelper;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\modules\admin\rbac\Rbac as AdminRbac;

/* @var $this \yii\web\View */
/* @var $content string */

/** @var \yii\web\Controller $context */
$context = $this->context;


$this->registerCssFile("rejoin/assets/color-skins/color-skins/color10.css"
    , ['id'=>"theme","media"=>"all"  ]);

if (isset($this->params['breadcrumbs'])) {
    $panelBreadcrumbs = [['label' => Module::t('module', 'ADMIN'), 'url' => ['/admin/default/index']]];
    $breadcrumbs = $this->params['breadcrumbs'];
} else {
    $panelBreadcrumbs = [Module::t('module', 'ADMIN')];
    $breadcrumbs = [];
}
?>
<?php $this->beginContent('@app/views/layouts/layout.php'); ?>		<!--Loader-->
		<div id="global-loader">
			<img src="../assets/images/loader.svg" class="loader-img" alt="">
		</div>

		<!--Header Main-->
		<div class="header-main">
			<!--Top Bar-->
			<div class="top-bar">
				<div class="container">
					<div class="row">
						<div class="col-xl-7 col-lg-7 col-sm-4 col-7">
							<div class="top-bar-left d-flex">
								<div class="clearfix">
									<ul class="socials">
										<li>
											<a class="social-icon" href="#"><i class="fa fa-facebook"></i></a>
										</li>
										<li>
											<a class="social-icon" href="#"><i class="fa fa-twitter"></i></a>
										</li>
										<li>
											<a class="social-icon" href="#"><i class="fa fa-linkedin"></i></a>
										</li>
										<li>
											<a class="social-icon" href="#"><i class="fa fa-google-plus"></i></a>
										</li>
									</ul>
								</div>
								<div class="clearfix">
									<ul class="contact border-left">
										<li class="d-lg-none">
											<a href="#" class="callnumber"><span><i class="fa fa-phone mr-1"></i>: +425 345 8765</span></a>
										</li>
										<li class="select-country">
											<select class="form-control select2-flag-search" data-placeholder="Select Country">
												<option value="UM">United States of America</option>
												<option value="AF">Afghanistan</option>
												<option value="AL">Albania</option>
												<option value="AD">Andorra</option>
												<option value="AG">Antigua and Barbuda</option>
												<option value="AU">Australia</option>
												<option value="AM">Armenia</option>
												<option value="AO">Angola</option>
												<option value="AR">Argentina</option>
												<option value="AT">Austria</option>
												<option value="AZ">Azerbaijan</option>
												<option value="BA">Bosnia and Herzegovina</option>
												<option value="BB">Barbados</option>
												<option value="BD">Bangladesh</option>
												<option value="BE">Belgium</option>
												<option value="BF">Burkina Faso</option>
												<option value="BG">Bulgaria</option>
												<option value="BH">Bahrain</option>
												<option value="BJ">Benin</option>
												<option value="BN">Brunei</option>
												<option value="BO">Bolivia</option>
												<option value="BT">Bhutan</option>
												<option value="BY">Belarus</option>
												<option value="CD">Congo</option>
												<option value="CA">Canada</option>
												<option value="CF">Central African Republic</option>
												<option value="CI">Cote d'Ivoire</option>
												<option value="CL">Chile</option>
												<option value="CM">Cameroon</option>
												<option value="CN">China</option>
												<option value="CO">Colombia</option>
												<option value="CU">Cuba</option>
												<option value="CV">Cabo Verde</option>
												<option value="CY">Cyprus</option>
												<option value="DJ">Djibouti</option>
												<option value="DK">Denmark</option>
												<option value="DM">Dominica</option>
												<option value="DO">Dominican Republic</option>
												<option value="EC">Ecuador</option>
												<option value="EE">Estonia</option>
												<option value="ER">Eritrea</option>
												<option value="ET">Ethiopia</option>
												<option value="FI">Finland</option>
												<option value="FJ">Fiji</option>
												<option value="FR">France</option>
												<option value="GA">Gabon</option>
												<option value="GD">Grenada</option>
												<option value="GE">Georgia</option>
												<option value="GH">Ghana</option>
												<option value="GH">Ghana</option>
												<option value="HN">Honduras</option>
												<option value="HT">Haiti</option>
												<option value="HU">Hungary</option>
												<option value="ID">Indonesia</option>
												<option value="IE">Ireland</option>
												<option value="IL">Israel</option>
												<option value="IN">India</option>
												<option value="IQ">Iraq</option>
												<option value="IR">Iran</option>
												<option value="IS">Iceland</option>
												<option value="IT">Italy</option>
												<option value="JM">Jamaica</option>
												<option value="JO">Jordan</option>
												<option value="JP">Japan</option>
												<option value="KE">Kenya</option>
												<option value="KG">Kyrgyzstan</option>
												<option value="KI">Kiribati</option>
												<option value="KW">Kuwait</option>
												<option value="KZ">Kazakhstan</option>
												<option value="LA">Laos</option>
												<option value="LB">Lebanons</option>
												<option value="LI">Liechtenstein</option>
												<option value="LR">Liberia</option>
												<option value="LS">Lesotho</option>
												<option value="LT">Lithuania</option>
												<option value="LU">Luxembourg</option>
												<option value="LV">Latvia</option>
												<option value="LY">Libya</option>
												<option value="MA">Morocco</option>
												<option value="MC">Monaco</option>
												<option value="MD">Moldova</option>
												<option value="ME">Montenegro</option>
												<option value="MG">Madagascar</option>
												<option value="MH">Marshall Islands</option>
												<option value="MK">Macedonia (FYROM)</option>
												<option value="ML">Mali</option>
												<option value="MM">Myanmar (formerly Burma)</option>
												<option value="MN">Mongolia</option>
												<option value="MR">Mauritania</option>
												<option value="MT">Malta</option>
												<option value="MV">Maldives</option>
												<option value="MW">Malawi</option>
												<option value="MX">Mexico</option>
												<option value="MZ">Mozambique</option>
												<option value="NA">Namibia</option>
												<option value="NG">Nigeria</option>
												<option value="NO">Norway</option>
												<option value="NP">Nepal</option>
												<option value="NR">Nauru</option>
												<option value="NZ">New Zealand</option>
												<option value="OM">Oman</option>
												<option value="PA">Panama</option>
												<option value="PF">Paraguay</option>
												<option value="PG">Papua New Guinea</option>
												<option value="PH">Philippines</option>
												<option value="PK">Pakistan</option>
												<option value="PL">Poland</option>
												<option value="QA">Qatar</option>
												<option value="RO">Romania</option>
												<option value="RU">Russia</option>
												<option value="RW">Rwanda</option>
												<option value="SA">Saudi Arabia</option>
												<option value="SB">Solomon Islands</option>
												<option value="SC">Seychelles</option>
												<option value="SD">Sudan</option>
												<option value="SE">Sweden</option>
												<option value="SG">Singapore</option>
												<option value="TG">Togo</option>
												<option value="TH">Thailand</option>
												<option value="TJ">Tajikistan</option>
												<option value="TL">Timor-Leste</option>
												<option value="TM">Turkmenistan</option>
												<option value="TN">Tunisia</option>
												<option value="TO">Tonga</option>
												<option value="TR">Turkey</option>
												<option value="TT">Trinidad and Tobago</option>
												<option value="TW">Taiwan</option>
												<option value="UA">Ukraine</option>
												<option value="UG">Uganda</option>
												<option value="UY">Uruguay</option>
												<option value="UZ">Uzbekistan</option>
												<option value="VA">Vatican City (Holy See)</option>
												<option value="VE">Venezuela</option>
												<option value="VN">Vietnam</option>
												<option value="VU">Vanuatu</option>
												<option value="YE">Yemen</option>
												<option value="ZM">Zambia</option>
												<option value="ZW">Zimbabwe</option>
											</select>
										</li>
										<li class="dropdown d-none d-xl-inline-block">
											<a href="#" class="" data-toggle="dropdown"><span> Language <i class="fa fa-caret-down"></i></span> </a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
												<a href="#" class="dropdown-item" >
													English
												</a>
												<a class="dropdown-item" href="#">
													Arabic
												</a>
												<a class="dropdown-item" href="#">
													German
												</a>
												<a href="#" class="dropdown-item" >
													Greek
												</a>
												<a href="#" class="dropdown-item" >
													Spanish
												</a>
											</div>
										</li>
										<li class="dropdown d-none d-xl-inline-block">
											<a href="#" class="" data-toggle="dropdown"><span>Currency <i class="fa fa-caret-down"></i></span></a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
												<a href="#" class="dropdown-item" >
													USD
												</a>
												<a class="dropdown-item" href="#">
													EUR
												</a>
												<a class="dropdown-item" href="#">
													INR
												</a>
												<a href="#" class="dropdown-item" >
													GBP
												</a>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-xl-5 col-lg-5 col-sm-8 col-5">
							<div class="top-bar-right">
								<ul class="custom">
									<li>
										<a href="register.html" class=""><i class="fa fa-user mr-1"></i> <span>Register</span></a>
									</li>
									<li>
										<a href="login.html" class=""><i class="fa fa-sign-in mr-1"></i> <span>Login</span></a>
									</li>
									<li class="dropdown">
										<a href="#" class="" data-toggle="dropdown"><i class="fa fa-home mr-1"></i><span> My Dashboard</span></a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
											<a href="mydash.html" class="dropdown-item" >
												<i class="dropdown-icon icon icon-user"></i> My Profile
											</a>
											<a class="dropdown-item" href="#">
												<i class="dropdown-icon icon icon-speech"></i> Inbox
											</a>
											<a class="dropdown-item" href="#">
												<i class="dropdown-icon icon icon-bell"></i> Notifications
											</a>
											<a href="mydash.html" class="dropdown-item" >
												<i class="dropdown-icon  icon icon-settings"></i> Account Settings
											</a>
											<a class="dropdown-item" href="#">
												<i class="dropdown-icon icon icon-power"></i> Log out
											</a>
										</div>
									</li>
									<li>
										<a href="login.html" class=""><i class="fa fa-black-tie mr-1"></i> <span>For Employer</span></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--Top Bar-->

			<!-- Mobile Header -->
				<div class="sticky">
					 <div class="horizontal-header clearfix ">
						<div class="container">
							<a id="horizontal-navtoggle" class="animated-arrow"><span></span></a>
							<span class="smllogo"><img src="../assets/images/brand/logo.png" width="120" alt="img"/></span>
							<a href="#" class="callusbtn bg-light"><i class="fa fa-bell text-body" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
		    <!-- /Mobile Header -->

			<!--Horizontal-main-->
			<div class="horizontal-main clearfix">
				<div class="horizontal-mainwrapper container clearfix">
					<div class="desktoplogo">
						<a href="index.html"><img src="../assets/images/brand/logo.png" alt=""></a>
					</div>
					<div class="desktoplogo-1">
						<a href="index.html"><img src="../assets/images/brand/logo.png" alt=""></a>
					</div>
					<!--Nav-->
					<nav class="horizontalMenu clearfix d-md-flex">
						<ul class="horizontalMenu-list">
							<li><a href="#">Home <span class="fa fa-caret-down m-0"></span></a>
								<ul class="sub-menu">
									<li><a href="index.html">Home Deafult</a></li>
									<li><a href="index2.html">Home Style 02</a></li>
									<li><a href="index3.html">Home Style 03</a></li>
									<li><a href="index4.html">Home Style 04</a></li>
									<li><a href="index5.html">Home Style 05</a></li>
									<li><a href="index6.html">Home Style 06</a></li>
									<li><a href="index7.html">Home Style 07</a></li>
									<li><a href="intro-page.html">Home Intro Page</a></li>
									<li><a href="popup-login.html">Home Pop-up login</a></li>
								</ul>
							</li>
							<li><a href="about.html">About Us </a></li>
							<li><a href="#">Pages <span class="fa fa-caret-down m-0"></span></a>
								<div class="horizontal-megamenu clearfix">
									<div class="container">
										<div class="megamenu-content">
											<div class="row">
												<ul class="col link-list">
													<li class="title">Job List pages</li>
													<li><a href="jobs-list.html">Jobs List</a></li>
													<li><a href="jobs-list-right.html">Jobs List Right</a></li>
													<li><a href="jobs-list-map.html">Jobs Map list</a></li>
													<li><a href="jobs-list-map2.html">Jobs Map list 02</a></li>
													<li><a href="jobs-list-map3.html">Jobs Map style 03</a></li>
													<li><a href="jobs.html">Jobs Left</a></li>
													<li><a href="jobs-right.html">Jobs Rights </a></li>
													<li class="title mt-4">Candidate list Pages</li>
													<li><a href="candidate-listing.html">Candidate Listing</a></li>
													<li><a href="candidate-listing2.html">Candidate Listing Style2</a></li>
													<li><a href="candidate-profile.html">Candidate Profile</a></li>
												</ul>
												<ul class="col link-list">
													<li class="title">Candidate pages</li>
													<li><a href="advanced-search.html">Advanced Search</a></li>
													<li><a href="create-resume.html">Create Resume </a></li>
													<li class="title mt-4">Company List Pages</li>
													<li><a href="company-list.html">Company Listing</a></li>
													<li><a href="company-list2.html">Company Listing Style2</a></li>
													<li><a href="company-details.html">Company Details</a></li>
													<li><a href="company-reviews.html">Company Reviews</a></li>
													<li><a href="company-list-map.html">Company Map list</a></li>
													<li><a href="company-list-map2.html">Company Map list 02</a></li>
													<li><a href="company-list-map3.html">Company Map style 03</a></li>
													<li><a href="my-jobs.html">My Jobs</a></li>
												</ul>
												<ul class="col link-list">
													<li class="title">Widgets</li>
													<li><a href="widgets.html">Custom Widgets</a></li>
													<li><a href="widgets-carousel.html">Owl Carousel Widgets</a></li>
													<li><a href="widgets-verticalscroll.html">Vertical Scroll Widgets</a></li>
													<li class="title mt-4">Pages</li>
													<li><a href="categories.html">Categories</a></li>
													<li><a href="ad-posts.html">Ad Posts</a></li>
													<li><a href="ad-posts2.html">Ad Posts2</a></li>
													<li><a href="pricing.html">Pricing Tables</a></li>
													<li><a href="profile.html">Profile Page</a></li>
													<li><a href="userprofile.html"> User Profile</a></li>
													<li><a href="usersall.html">User Lists</a></li>

												</ul>
												<ul class="col link-list">
													<li class="title">User Pages</li>
													<li><a href="inovice.html">Invoice</a></li>
													<li><a href="typography.html">Typography</a></li>
													<li><a href="underconstruction.html">Under Constructions</a></li>
													<li><a href="400.html">400 Error</a></li>
													<li><a href="404.html">404 Error</a></li>
													<li><a href="500.html">500 Error</a></li>
													<li><a href="404-inline.html">Inline Error</a></li>
													<li><a href="register.html">Register</a></li>
													<li><a href="login.html">Login</a></li>
													<li><a href="login-2.html">Login 02</a></li>
													<li><a href="forgot.html">Forgot Password</a></li>
													<li><a href="lockscreen.html">Lock Screen</a></li>
													<li><a href="faq.html">Faq</a></li>
												</ul>
												<ul class="col link-list">
													<li class="title">Headers & Footers</li>
													<li><a href="header-style1.html">Header Style 01</a></li>
													<li><a href="header-style2.html">Header Style 02</a></li>
													<li><a href="header-style3.html">Header Style 03</a></li>
													<li><a href="header-style4.html">Header Style 04</a></li>
													<li><a href="footer-style1.html">Footer Style 01</a></li>
													<li><a href="footer-style2.html">Footer Style 02</a></li>
													<li><a href="footer-style3.html">Footer Style 03</a></li>
													<li><a href="footer-style4.html">Footer Style 04</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</li>
							<li><a href="#">Blog <span class="fa fa-caret-down m-0"></span></a>
								<ul class="sub-menu">
									<li><a href="#">Blog Grid <i class="fa fa-angle-right float-right mt-1 d-none d-lg-block"></i></a>
										 <ul class="sub-menu">
											<li><a href="blog-grid.html">Blog Grid Left</a></li>
											<li><a href="blog-grid-right.html">Blog Grid Right</a></li>
											<li><a href="blog-grid-center.html">Blog Grid Center</a></li>
										</ul>
									</li>
									<li><a href="#">Blog List <i class="fa fa-angle-right float-right mt-1 d-none d-lg-block"></i></a>
										 <ul class="sub-menu">
											<li><a href="blog-list.html">Blog List Left</a></li>
											<li><a href="blog-list-right.html">Blog List Right</a></li>
											<li><a href="blog-list-center.html">Blog List Center</a></li>
										</ul>
									</li>
									<li><a href="#">Blog Details <i class="fa fa-angle-right float-right mt-1 d-none d-lg-block"></i></a>
										<ul class="sub-menu">
											<li><a href="blog-details.html">Blog Details Left</a></li>
											<li><a href="blog-details-right.html">Blog Details Right</a></li>
											<li><a href="blog-details-center.html">Blog Details Center</a></li>
										</ul>
									</li>
								</ul>
							</li>
							<li><a href="#">My Dashboard <span class="fa fa-caret-down m-0"></span></a>
								<ul class="sub-menu">
									<li>
										<a href="mydash.html">My Dashboard</a>
									</li>
									<li>
										<a href="myjobs.html">My Jobs</a>
									</li>
									<li>
										<a href="myfavorite.html">Favorite Jobs</a>
									</li>
									<li>
										<a href="manged.html">Manged Jobs</a>
									</li>
									<li>
										<a href="payments.html">Payments</a>
									</li>
									<li>
										<a href="orders.html"> Orders</a>
									</li>
									<li>
										<a href="settings.html"> Settings</a>
									</li>
									<li>
										<a href="tips.html">Tips</a>
									</li>
								</ul>
							</li>
							<li><a href="contact.html"> Contact Us <span class="horizontal-arrow"></span></a></li>
							<li class="pt-0  pb-2 mt-lg-0 create-submit-btn">
								<span><a class="btn btn-secondary ad-post mt-1" href="ad-posts.html"><i class="fa fa-briefcase"></i> Submit a Job</a></span>
							</li>
							<li class="mt-0 pt-0  pb-5 mt-lg-0 create-resume-btn">
								<span><a class="btn btn-info ad-post mt-1" href="create-resume.html"><i class="fa fa-edit"></i> Create Resume</a></span>
							</li>
						</ul>
					</nav>
					<!--/Nav-->
				</div>
			</div>
			<!--/Horizontal-main-->
		</div>
		<!--/Header Main-->

		<!--Sliders Section-->
		<section>
			<div class="banner-1 cover-image sptb-3 pb-14 sptb-tab bg-background2" data-image-src="../assets/images/banners/banner1.jpg">
				<div class="header-text mb-0">
					<div class="container">
						<div class="text-center text-white mb-7">
							<h1 class="mb-1">Find The Best Job For Your Future</h1>
							<p>It is a long established fact that a reader will be distracted by the readable.</p>
						</div>
						<div class="row">
							<div class="col-xl-10 col-lg-12 col-md-12 d-block mx-auto">
								<div class="search-background bg-transparent">
									<div class="form row no-gutters ">
										<div class="form-group  col-xl-4 col-lg-3 col-md-12 mb-0 bg-white ">
											<input type="text" class="form-control input-lg br-tr-md-0 br-br-md-0" id="text4" placeholder="Search Company">
										</div>
										<div class="form-group  col-xl-3 col-lg-3 col-md-12 mb-0 bg-white">
											<input type="text" class="form-control input-lg br-md-0" id="text5" placeholder="Select Location">
											<span><img src="../assets/images/svg/gps.svg" class="location-gps" alt="img"></span>
										</div>
										<div class="form-group col-xl-3 col-lg-3 col-md-12 select2-lg  mb-0 bg-white">
											<select class="form-control select2-show-search  border-bottom-0" data-placeholder="Select Category">
												<optgroup label="Categories">
													<option>All Categories</option>
													<option value="1">Accountant</option>
													<option value="2">IT Software</option>
													<option value="3">Banking</option>
													<option value="4">Finaces</option>
													<option value="5">Cook/Chef</option>
													<option value="6">Driveing</option>
													<option value="7">HR Recruiter</option>
													<option value="8">IT Hardware</option>
													<option value="9">Sales</option>
												</optgroup>
											</select>
										</div>
										<div class="col-xl-2 col-lg-3 col-md-12 mb-0">
											<a href="#" class="btn btn-lg btn-block btn-secondary br-tl-md-0 br-bl-md-0"><i class="fa fa-search mr-1"></i>Search</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!-- /header-text -->
				<div class="header-slider-img">
					<div class="container">
						<div id="small-categories" class="owl-carousel owl-carousel-icons7">
							<div class="item">
								<div class="card mb-0">
									<div class="card-body p-3">
										<div class="cat-item d-flex">
											<a href="jobs-list.html"></a>
											<div class="cat-img mr-4 bg-primary-transparent p-3 brround">
												<img src="../assets/images/products/categories/operator.png" alt="img">
											</div>
											<div class="cat-desc text-left">
												<h5 class="mb-3 mt-0">Call Centers</h5>
												<small class="badge badge-pill badge-primary mr-2">7,485 Jobs</small>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="card mb-0">
									<div class="card-body p-3">
										<div class="cat-item d-flex">
											<a href="jobs-list.html"></a>
											<div class="cat-img mr-4 bg-secondary-transparent p-3 brround">
												<img src="../assets/images/products/categories/cashier.png" alt="img">
											</div>
											<div class="cat-desc text-left">
												<h5 class="mb-3">Cashier</h5>
												<small class="badge badge-pill badge-secondary mr-2">3,451 Jobs</small>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="card mb-0">
									<div class="card-body p-3">
										<div class="cat-item d-flex">
											<a href="jobs-list.html"></a>
											<div class="cat-img mr-4 bg-success-transparent p-3 brround">
												<img src="../assets/images/products/categories/operator.png" alt="img">
											</div>
											<div class="cat-desc text-left">
												<h5 class="mb-3">BPO</h5>
												<small class="badge badge-pill badge-success mr-2">4,758 Jobs</small>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="card mb-0">
									<div class="card-body p-3">
										<div class="cat-item d-flex">
											<a href="jobs-list.html"></a>
											<div class="cat-img mr-4 bg-danger-transparent p-3 brround">
												<img src="../assets/images/products/categories/truck.png" alt="img">
											</div>
											<div class="cat-desc text-left">
												<h5 class="mb-3">Delivery Jobs</h5>
												<small class="badge badge-pill badge-danger mr-2">6,457 Jobs</small>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="card mb-0">
									<div class="card-body p-3">
										<div class="cat-item d-flex">
											<a href="jobs-list.html"></a>
											<div class="cat-img mr-4 bg-warning-transparent p-3 brround">
												<img src="../assets/images/products/categories/hand.png" alt="img">
											</div>
											<div class="cat-desc text-left">
												<h5 class="mb-3">Life Insurance</h5>
												<small class="badge badge-pill badge-warning mr-2">2,875 Jobs</small>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="card mb-0">
									<div class="card-body p-3">
										<div class="cat-item d-flex">
											<a href="jobs-list.html"></a>
											<div class="cat-img mr-4 bg-info-transparent p-3 brround">
												<img src="../assets/images/products/categories/presentation.png" alt="img">
											</div>
											<div class="cat-desc text-left">
												<h5 class="mb-3">Teacher/lecturer</h5>
												<small class="badge badge-pill badge-info mr-2">2,154 Jobs</small>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="card mb-0">
									<div class="card-body p-3">
										<div class="cat-item d-flex">
											<a href="jobs-list.html"></a>
											<div class="cat-img mr-4 bg-primary-transparent p-3 brround">
												<img src="../assets/images/products/categories/nurse.png" alt="img">
											</div>
											<div class="cat-desc text-left">
												<h5 class="mb-3">Nurse</h5>
												<small class="badge badge-pill badge-primary mr-2">1,785 Jobs</small>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="card mb-0">
									<div class="card-body p-3">
										<div class="cat-item d-flex">
											<a href="jobs-list.html"></a>
											<div class="cat-img mr-4 bg-secondary-transparent p-3 brround">
												<img src="../assets/images/products/categories/web.png" alt="img">
											</div>
											<div class="cat-desc text-left">
												<h5 class="mb-3">IT Software</h5>
												<small class="badge badge-pill badge-secondary mr-2">2,456 Jobs</small>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="card mb-0">
									<div class="card-body p-3">
										<div class="cat-item d-flex">
											<a href="jobs-list.html"></a>
											<div class="cat-img mr-4 bg-success-transparent p-3 brround">
												<img src="../assets/images/products/categories/charts.png" alt="img">
											</div>
											<div class="cat-desc text-left">
												<h5 class="mb-3">Sales</h5>
												<small class="badge badge-pill badge-success mr-2">1,456 Jobs</small>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="card mb-0">
									<div class="card-body p-3">
										<div class="cat-item d-flex">
											<a href="jobs-list.html"></a>
											<div class="cat-img mr-4 bg-info-transparent p-3 brround">
												<img src="../assets/images/products/categories/chauffer.png" alt="img">
											</div>
											<div class="cat-desc text-left">
												<h5 class="mb-3">Driver</h5>
												<small class="badge badge-pill badge-info mr-2">896 Jobs</small>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="card mb-0">
									<div class="card-body p-3">
										<div class="cat-item d-flex">
											<a href="jobs-list.html"></a>
											<div class="cat-img mr-4 bg-warning-transparent p-3 brround">
												<img src="../assets/images/products/categories/makeup.png" alt="img">
											</div>
											<div class="cat-desc text-left">
												<h5 class="mb-3">Beautician</h5>
												<small class="badge badge-pill badge-warning mr-2">1,478 Jobs</small>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="card mb-0">
									<div class="card-body p-3">
										<div class="cat-item d-flex">
											<a href="jobs-list.html"></a>
											<div class="cat-img mr-4 bg-danger-transparent p-3 brround">
												<img src="../assets/images/products/categories/cooking.png" alt="img">
											</div>
											<div class="cat-desc text-left">
												<h5 class="mb-3">Cooking</h5>
												<small class="badge badge-pill badge-danger mr-2">2,424 Jobs</small>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--Sliders Section-->

		<!--section-->
		<section class="sptb">
			<div class="container">
				<div class="section-title center-block text-center">
					<h2>Top Rated Companies</h2>
					<p>Mauris ut cursus nunc. Morbi eleifend, ligula at consectetur vehicula</p>
				</div>
				<div id="feature-carousel" class="owl-carousel owl-carousel-icons">
					<div class="item">
						<div class="card">
							<div class="card-body p-3">
								<div class="d-md-flex">
									<img src="../assets/images/products/logo/logo1.jpg" class="w-25 h-25 mr-3" alt="user">
									<div class="mt-5">
										<a class="text-body" href="company-details.html"><h4 class="fs-16 font-weight-semibold">Pro.Meet Pvt Ltd</h4></a>
										<div class="rating-stars d-inline-flex">
											<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="4">
											<div class="rating-stars-container mr-2">
												<div class="rating-star sm">
													<i class="fa fa-star"></i>
												</div>
												<div class="rating-star sm">
													<i class="fa fa-star"></i>
												</div>
												<div class="rating-star sm">
													<i class="fa fa-star"></i>
												</div>
												<div class="rating-star sm">
													<i class="fa fa-star"></i>
												</div>
												<div class="rating-star sm">
													<i class="fa fa-star"></i>
												</div>
											</div> (758 Reviews)
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-body p-3">
								<div class="d-md-flex">
									<img src="../assets/images/products/logo/logo2.jpg" class="w-25 h-25 mr-3" alt="user">
									<div class="mt-5">
										<a class="text-body" href="company-details.html"><h4 class="fs-16 font-weight-semibold">Infratech Pvt Ltd </h4></a>
										<div class="rating-stars d-inline-flex">
											<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="5">
											<div class="rating-stars-container mr-2">
												<div class="rating-star sm">
													<i class="fa fa-star"></i>
												</div>
												<div class="rating-star sm">
													<i class="fa fa-star"></i>
												</div>
												<div class="rating-star sm">
													<i class="fa fa-star"></i>
												</div>
												<div class="rating-star sm">
													<i class="fa fa-star"></i>
												</div>
												<div class="rating-star sm">
													<i class="fa fa-star"></i>
												</div>
											</div> (657 Reviews)
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="card">
							<div class="card-body p-3">
								<div class="d-md-flex">
									<img src="../assets/images/products/logo/logo3.jpg" class="w-25 h-25 mr-3" alt="user">
									<div class="mt-5">
										<a class="text-body" href="company-details.html"><h4 class="fs-16 font-weight-semibold">G Technicals Solutions</h4></a>
										<div class="rating-stars d-inline-flex">
											<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="4">
											<div class="rating-stars-container mr-2">
												<div class="rating-star sm">
													<i class="fa fa-star"></i>
												</div>
												<div class="rating-star sm">
													<i class="fa fa-star"></i>
												</div>
												<div class="rating-star sm">
													<i class="fa fa-star"></i>
												</div>
												<div class="rating-star sm">
													<i class="fa fa-star"></i>
												</div>
												<div class="rating-star sm">
													<i class="fa fa-star"></i>
												</div>
											</div> (245 Reviews)
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-body p-3">
								<div class="d-md-flex">
									<img src="../assets/images/products/logo/logo4.jpg" class="w-25 h-25 mr-3" alt="user">
									<div class="mt-5">
										<a class="text-body" href="company-details.html"><h4 class="fs-16 font-weight-semibold">Hardware Solutions</h4></a>
										<div class="rating-stars d-inline-flex">
											<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="3">
											<div class="rating-stars-container mr-2">
												<div class="rating-star sm">
													<i class="fa fa-star"></i>
												</div>
												<div class="rating-star sm">
													<i class="fa fa-star"></i>
												</div>
												<div class="rating-star sm">
													<i class="fa fa-star"></i>
												</div>
												<div class="rating-star sm">
													<i class="fa fa-star"></i>
												</div>
												<div class="rating-star sm">
													<i class="fa fa-star"></i>
												</div>
											</div> (356 Reviews)
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="card">
							<div class="card-body p-3">
								<div class="d-md-flex">
									<img src="../assets/images/products/logo/logo5.jpg" class="w-25 h-25 mr-3" alt="user">
									<div class="mt-5">
										<a class="text-body" href="company-details.html"><h4 class="fs-16 font-weight-semibold">Flowtech Solutions</h4></a>
										<div class="rating-stars d-inline-flex">
											<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="5">
											<div class="rating-stars-container mr-2">
												<div class="rating-star sm">
													<i class="fa fa-star"></i>
												</div>
												<div class="rating-star sm">
													<i class="fa fa-star"></i>
												</div>
												<div class="rating-star sm">
													<i class="fa fa-star"></i>
												</div>
												<div class="rating-star sm">
													<i class="fa fa-star"></i>
												</div>
												<div class="rating-star sm">
													<i class="fa fa-star"></i>
												</div>
											</div> (745 Reviews)
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-body p-3">
								<div class="d-md-flex">
									<img src="../assets/images/products/logo/logo6.jpg" class="w-25 h-25 mr-3" alt="user">
									<div class="mt-5">
										<a class="text-body" href="company-details.html"><h4 class="fs-16 font-weight-semibold">Hardware Private Solutions</h4></a>
										<div class="rating-stars d-inline-flex">
											<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="2">
											<div class="rating-stars-container mr-2">
												<div class="rating-star sm">
													<i class="fa fa-star"></i>
												</div>
												<div class="rating-star sm">
													<i class="fa fa-star"></i>
												</div>
												<div class="rating-star sm">
													<i class="fa fa-star"></i>
												</div>
												<div class="rating-star sm">
													<i class="fa fa-star"></i>
												</div>
												<div class="rating-star sm">
													<i class="fa fa-star"></i>
												</div>
											</div> (345 Reviews)
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="card">
							<div class="card-body p-3">
								<div class="d-md-flex">
									<img src="../assets/images/products/logo/logo7.jpg" class="w-25 h-25 mr-3" alt="user">
									<div class="mt-5">
										<a class="text-body" href="company-details.html"><h4 class="fs-16 font-weight-semibold">Wisoky-Dickens</h4></a>
										<div class="rating-stars d-inline-flex">
											<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="3">
											<div class="rating-stars-container mr-2">
												<div class="rating-star sm">
													<i class="fa fa-star"></i>
												</div>
												<div class="rating-star sm">
													<i class="fa fa-star"></i>
												</div>
												<div class="rating-star sm">
													<i class="fa fa-star"></i>
												</div>
												<div class="rating-star sm">
													<i class="fa fa-star"></i>
												</div>
												<div class="rating-star sm">
													<i class="fa fa-star"></i>
												</div>
											</div> (635 Reviews)
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-body p-3">
								<div class="d-md-flex">
									<img src="../assets/images/products/logo/logo8.jpg" class="w-25 h-25 mr-3" alt="user">
									<div class="mt-5">
										<a class="text-body" href="company-details.html"><h4 class="fs-16 font-weight-semibold">Bahringer and Wyman</h4></a>
										<div class="rating-stars d-inline-flex">
											<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="5">
											<div class="rating-stars-container mr-2">
												<div class="rating-star sm">
													<i class="fa fa-star"></i>
												</div>
												<div class="rating-star sm">
													<i class="fa fa-star"></i>
												</div>
												<div class="rating-star sm">
													<i class="fa fa-star"></i>
												</div>
												<div class="rating-star sm">
													<i class="fa fa-star"></i>
												</div>
												<div class="rating-star sm">
													<i class="fa fa-star"></i>
												</div>
											</div> (125 Reviews)
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/section-->

		<!--section-->
		<section class="sptb bg-white">
			<div class="container">
				<div class="section-title center-block text-center">
					<h2>Companies By Location</h2>
					<p>Mauris ut cursus nunc. Morbi eleifend, ligula at consectetur vehicula</p>
				</div>
				<div class="row">
					<div class="col-xl-2 col-lg-4 col-md-6 col-6">
						<a href="company-list.html" class="top-cities card text-center mb-xl-0 box-shadow2">
							<img src="../assets/images/city-landmark/svg/001-statue-of-liberty.svg" alt="img" class="bg-pink-transparent">
							<div class="servic-data mt-3">
								<h4 class="font-weight-semibold mb-0">USA</h4>
							</div>
						</a>
					</div>
					<div class="col-xl-2 col-lg-4 col-md-6 col-6">
						<a href="company-list.html" class="top-cities card text-center mb-xl-0 box-shadow2">
							<img src="../assets/images/city-landmark/svg/017-taj-mahal.svg" alt="img" class="svg2 bg-purple-transparent">
							<div class="servic-data mt-3">
								<h4 class="font-weight-semibold mb-0">India</h4>
							</div>
						</a>
					</div>
					<div class="col-xl-2 col-lg-4 col-md-6 col-6">
						<a href="company-list.html" class="top-cities card text-center  mb-xl-0  box-shadow2">
							<img src="../assets/images/city-landmark/svg/031-stonehenge.svg" alt="img" class="bg-warning-transparent">
							<div class="servic-data mt-3">
								<h4 class="font-weight-semibold mb-0">England</h4>
							</div>
						</a>
					</div>
					<div class="col-xl-2 col-lg-4 col-md-6 col-6">
						<a href="company-list.html" class="top-cities card text-center mb-lg-0 box-shadow2">
							<img src="../assets/images/city-landmark/svg/002-sydney-opera-house.svg" alt="img" class="bg-danger-transparent">
							<div class="servic-data mt-3">
								<h4 class="font-weight-semibold mb-0">Sydney</h4>
							</div>
						</a>
					</div>
					<div class="col-xl-2 col-lg-4 col-md-6 col-6">
						<a href="company-list.html" class="top-cities card text-center mb-0 box-shadow2">
							<img src="../assets/images/city-landmark/svg/003-brandenburg-gate.svg" alt="img" class="bg-success-transparent">
							<div class="servic-data mt-3">
								<h4 class="font-weight-semibold mb-0">Germany</h4>
							</div>
						</a>
					</div>
					<div class="col-xl-2 col-lg-4 col-md-6 col-6">
						<a href="company-list.html" class="top-cities card text-center mb-0 box-shadow2">
							<img src="../assets/images/city-landmark/svg/010-great-wall-of-china.svg" alt="img" class="bg-info-transparent">
							<div class="servic-data mt-3">
								<h4 class="font-weight-semibold mb-0">China</h4>
							</div>
						</a>
					</div>
				</div>
			</div>
		</section>
		<!--/section-->

		<!--section-->
		<section class="sptb">
			<div class="container">
				<div class="section-title center-block text-center">
					<h2>Recent Jobs</h2>
					<p>Mauris ut cursus nunc. Morbi eleifend, ligula at consectetur vehicula</p>
				</div>
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12">
						<!--Job lists-->
						<div class=" mb-lg-0">
							<div class="">
								<div class="item2-gl">
									<div class="tab-content">
										<div class="tab-pane active" id="tab-11">
											<div class="row">
												<div class="col-md-12 col-lg-6 col-xl-6">
													<div class="card overflow-hidden br-0 overflow-hidden">
														<div class="d-sm-flex card-body p-3">
															<div class="p-0 m-0 mr-3">
																<div class="">
																	<a href="company-details.html"></a>
																	<img src="../assets/images/products/logo/img1.jpg" alt="img" class="w-9 h-9">
																</div>
															</div>
															<div class="item-card9 mt-5">
																<a href="company-details.html" class="text-dark"><h4 class="font-weight-semibold mt-1">G Technicals Solutions</h4></a>
																<div class="rating-stars d-inline-flex">
																	<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="4">
																	<div class="rating-stars-container mr-2">
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																	</div> (245 Reviews)
																</div>
															</div>
															<div class="ml-auto">
																<a class="btn btn-light mt-6 mr-4 font-weight-semibold text-dark" href="company-details.html"><i class="fa fa-briefcase"></i> 12 vacancies</a>
															</div>
														</div>
														<div class="card overflow-hidden border-0 box-shadow-0 br-0 mb-0">
															<div class="card-footer">
																<table class="table row table-borderless w-100 m-0 text-nowrap ">
																	<tbody class="col-lg-12 col-xl-12 p-0">
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Positions</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span>Web designer, Web developers</span></td>
																		</tr>
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Address</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span> 2767  Concord Street, Charlotte, NC</span></td>
																		</tr>
																	</tbody>
																</table>
																<div class="mt-3">
																	<a class="btn btn-light" href="#" data-toggle="modal" data-target="#Applynow">Apply Now</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-md-12 col-lg-6 col-xl-6">
													<div class="card overflow-hidden br-0 overflow-hidden">
														<div class="d-sm-flex card-body p-3">
															<div class="p-0 m-0 mr-3">
																<div class="">
																	<a href="company-details.html"></a>
																	<img src="../assets/images/products/logo/img2.jpg" alt="img" class="w-9 h-9">
																</div>
															</div>
															<div class="item-card9 mt-5">
																<a href="company-details.html" class="text-dark"><h4 class="font-weight-semibold mt-1">Pro.Meet Pvt Ltd</h4></a>
																<div class="rating-stars d-inline-flex">
																	<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="3">
																	<div class="rating-stars-container mr-2">
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																	</div> (58 Reviews)
																</div>
															</div>
															<div class="ml-auto">
																<a class="btn btn-light mt-6 mr-4 font-weight-semibold text-dark" href="company-details.html"><i class="fa fa-briefcase"></i> 6 vacancies</a>
															</div>
														</div>
														<div class="card overflow-hidden border-0 box-shadow-0 br-0 mb-0">
															<div class="card-footer">
																<table class="table row table-borderless w-100 m-0 text-nowrap ">
																	<tbody class="col-lg-12 col-xl-12 p-0">
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Positions</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span>Java designer, php developers</span></td>
																		</tr>
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Address</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span> 2767  Concord Street, Charlotte, NC</span></td>
																		</tr>
																	</tbody>
																</table>
																<div class="mt-3">
																	<a class="btn btn-light" href="#" data-toggle="modal" data-target="#Applynow">Apply Now</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-md-12 col-lg-6 col-xl-6">
													<div class="card overflow-hidden br-0 overflow-hidden">
														<div class="d-sm-flex card-body p-3">
															<div class="p-0 m-0 mr-3">
																<div class="">
																	<a href="company-details.html"></a>
																	<img src="../assets/images/products/logo/img3.jpg" alt="img" class="w-9 h-9">
																</div>
															</div>
															<div class="item-card9 mt-5">
																<a href="company-details.html" class="text-dark"><h4 class="font-weight-semibold mt-1">Infratech Pvt Ltd</h4></a>
																<div class="rating-stars d-inline-flex">
																	<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="4">
																	<div class="rating-stars-container mr-2">
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																	</div> (82 Reviews)
																</div>
															</div>
															<div class="ml-auto">
																<a class="btn btn-light mt-6 mr-4 font-weight-semibold text-dark" href="company-details.html"><i class="fa fa-briefcase"></i> 78 vacancies</a>
															</div>
														</div>
														<div class="card overflow-hidden border-0 box-shadow-0 br-0 mb-0">
															<div class="card-footer">
																<table class="table row table-borderless w-100 m-0 text-nowrap ">
																	<tbody class="col-lg-12 col-xl-12 p-0">
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Positions</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span>Angular developers</span></td>
																		</tr>
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Address</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span> 2767  Concord Street, Charlotte, NC</span></td>
																		</tr>
																	</tbody>
																</table>
																<div class="mt-3">
																	<a class="btn btn-light" href="#" data-toggle="modal" data-target="#Applynow">Apply Now</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-md-12 col-lg-6 col-xl-6">
													<div class="card overflow-hidden br-0 overflow-hidden">
														<div class="d-sm-flex card-body p-3">
															<div class="p-0 m-0 mr-3">
																<div class="">
																	<a href="company-details.html"></a>
																	<img src="../assets/images/products/logo/img4.jpg" alt="img" class="w-9 h-9">
																</div>
															</div>
															<div class="item-card9 mt-5">
																<a href="company-details.html" class="text-dark"><h4 class="font-weight-semibold mt-1">Bahringer and Wyman</h4></a>
																<div class="rating-stars d-inline-flex">
																	<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="5">
																	<div class="rating-stars-container mr-2">
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																	</div> (324 Reviews)
																</div>
															</div>
															<div class="ml-auto">
																<a class="btn btn-light mt-6 mr-4 font-weight-semibold text-dark" href="company-details.html"><i class="fa fa-briefcase"></i> 64 vacancies</a>
															</div>
														</div>
														<div class="card overflow-hidden border-0 box-shadow-0 br-0 mb-0">
															<div class="card-footer">
																<table class="table row table-borderless w-100 m-0 text-nowrap ">
																	<tbody class="col-lg-12 col-xl-12 p-0">
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Positions</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span>Web designer, Ui Designers</span></td>
																		</tr>
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Address</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span> 2767  Concord Street, Charlotte, NC</span></td>
																		</tr>
																	</tbody>
																</table>
																<div class="mt-3">
																	<a class="btn btn-light" href="#" data-toggle="modal" data-target="#Applynow">Apply Now</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-md-12 col-lg-6 col-xl-6">
													<div class="card overflow-hidden br-0 overflow-hidden">
														<div class="d-sm-flex card-body p-3">
															<div class="p-0 m-0 mr-3">
																<div class="">
																	<a href="company-details.html"></a>
																	<img src="../assets/images/products/logo/img5.jpg" alt="img" class="w-9 h-9">
																</div>
															</div>
															<div class="item-card9 mt-5">
																<a href="company-details.html" class="text-dark"><h4 class="font-weight-semibold mt-1">Hardware Solutions</h4></a>
																<div class="rating-stars d-inline-flex">
																	<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="4">
																	<div class="rating-stars-container mr-2">
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																	</div> (317 Reviews)
																</div>
															</div>
															<div class="ml-auto">
																<a class="btn btn-light mt-6 mr-4 font-weight-semibold text-dark" href="company-details.html"><i class="fa fa-briefcase"></i> 32 vacancies</a>
															</div>
														</div>
														<div class="card overflow-hidden border-0 box-shadow-0 br-0 mb-0">
															<div class="card-footer">
																<table class="table row table-borderless w-100 m-0 text-nowrap ">
																	<tbody class="col-lg-12 col-xl-12 p-0">
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Positions</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span>Web designer, php developers</span></td>
																		</tr>
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Address</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span> 2767  Concord Street, Charlotte, NC</span></td>
																		</tr>
																	</tbody>
																</table>
																<div class="mt-3">
																	<a class="btn btn-light" href="#" data-toggle="modal" data-target="#Applynow">Apply Now</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-md-12 col-lg-6 col-xl-6">
													<div class="card overflow-hidden br-0 overflow-hidden">
														<div class="d-sm-flex card-body p-3">
															<div class="p-0 m-0 mr-3">
																<div class="">
																	<a href="company-details.html"></a>
																	<img src="../assets/images/products/logo/img6.jpg" alt="img" class="w-9 h-9">
																</div>
															</div>
															<div class="item-card9 mt-5">
																<a href="company-details.html" class="text-dark"><h4 class="font-weight-semibold mt-1">Flowtech Solutions</h4></a>
																<div class="rating-stars d-inline-flex">
																	<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="3">
																	<div class="rating-stars-container mr-2">
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																	</div> (24 Reviews)
																</div>
															</div>
															<div class="ml-auto">
																<a class="btn btn-light mt-6 mr-4 font-weight-semibold text-dark" href="company-details.html"><i class="fa fa-briefcase"></i> 2 vacancies</a>
															</div>
														</div>
														<div class="card overflow-hidden border-0 box-shadow-0 br-0 mb-0">
															<div class="card-footer">
																<table class="table row table-borderless w-100 m-0 text-nowrap ">
																	<tbody class="col-lg-12 col-xl-12 p-0">
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Positions</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span>Web designer, Web developers</span></td>
																		</tr>
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Address</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span> 2767  Concord Street, Charlotte, NC</span></td>
																		</tr>
																	</tbody>
																</table>
																<div class="mt-3">
																	<a class="btn btn-light" href="#" data-toggle="modal" data-target="#Applynow">Apply Now</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-md-12 col-lg-6 col-xl-6">
													<div class="card overflow-hidden br-0 overflow-hidden">
														<div class="d-sm-flex card-body p-3">
															<div class="p-0 m-0 mr-3">
																<div class="">
																	<a href="company-details.html"></a>
																	<img src="../assets/images/products/logo/logo5.jpg" alt="img" class="w-9 h-9">
																</div>
															</div>
															<div class="item-card9 mt-5">
																<a href="company-details.html" class="text-dark"><h4 class="font-weight-semibold mt-1">Hardware Private Solutions</h4></a>
																<div class="rating-stars d-inline-flex">
																	<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="3">
																	<div class="rating-stars-container mr-2">
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																	</div> (87 Reviews)
																</div>
															</div>
															<div class="ml-auto">
																<a class="btn btn-light mt-6 mr-4 font-weight-semibold text-dark" href="company-details.html"><i class="fa fa-briefcase"></i> 25 vacancies</a>
															</div>
														</div>
														<div class="card overflow-hidden border-0 box-shadow-0 br-0 mb-0">
															<div class="card-footer">
																<table class="table row table-borderless w-100 m-0 text-nowrap ">
																	<tbody class="col-lg-12 col-xl-12 p-0">
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Positions</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span>Ui designer, Ux Designers</span></td>
																		</tr>
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Address</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span> 2767  Concord Street, Charlotte, NC</span></td>
																		</tr>
																	</tbody>
																</table>
																<div class="mt-3">
																	<a class="btn btn-light" href="#" data-toggle="modal" data-target="#Applynow">Apply Now</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-md-12 col-lg-6 col-xl-6">
													<div class="card overflow-hidden br-0 overflow-hidden">
														<div class="d-sm-flex card-body p-3">
															<div class="p-0 m-0 mr-3">
																<div class="">
																	<a href="company-details.html"></a>
																	<img src="../assets/images/products/logo/logo2.jpg" alt="img" class="w-9 h-9">
																</div>
															</div>
															<div class="item-card9 mt-5">
																<a href="company-details.html" class="text-dark"><h4 class="font-weight-semibold mt-1">Wisoky-Dickens</h4></a>
																<div class="rating-stars d-inline-flex">
																	<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="4">
																	<div class="rating-stars-container mr-2">
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																	</div> (75 Reviews)
																</div>
															</div>
															<div class="ml-auto">
																<a class="btn btn-light mt-6 mr-4 font-weight-semibold text-dark" href="company-details.html"><i class="fa fa-briefcase"></i> 36 vacancies</a>
															</div>
														</div>
														<div class="card overflow-hidden border-0 box-shadow-0 br-0 mb-0">
															<div class="card-footer">
																<table class="table row table-borderless w-100 m-0 text-nowrap ">
																	<tbody class="col-lg-12 col-xl-12 p-0">
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Positions</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span>Web designer, Web developers</span></td>
																		</tr>
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Address</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span> 2767  Concord Street, Charlotte, NC</span></td>
																		</tr>
																	</tbody>
																</table>
																<div class="mt-3">
																	<a class="btn btn-light" href="#" data-toggle="modal" data-target="#Applynow">Apply Now</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tab-12">
											<div class="row">
												<div class="col-lg-6 col-md-12 col-xl-4">
													<div class="card overflow-hidden br-0 overflow-hidden">
														<div class="d-sm-flex card-body p-3">
															<div class="p-0 m-0 mr-3">
																<div class="">
																	<a href="company-details.html"></a>
																	<img src="../assets/images/products/logo/img1.jpg" alt="img" class="w-8 h-8">
																</div>
															</div>
															<div class="item-card9 mt-2">
																<a href="company-details.html" class="text-dark"><h4 class="font-weight-semibold mt-1">G Technicals Solutions</h4></a>
																<div class="rating-stars d-inline-flex">
																	<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="4">
																	<div class="rating-stars-container mr-2">
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																	</div> (245 Reviews)
																</div>
															</div>
															<div class="ml-auto">

															</div>
														</div>
														<div class="card overflow-hidden border-0 box-shadow-0 br-0 mb-0">
															<div class="card-footer">
																<table class="table row table-borderless w-100 m-0 text-nowrap ">
																	<tbody class="col-lg-12 col-xl-12 p-0">
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Positions</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span>Web designer, Web developers</span></td>
																		</tr>
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Address</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span> 2767  Concord Street, Charlotte, NC</span></td>
																		</tr>
																	</tbody>
																</table>
																<div class="mt-3">
																	<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#Applynow">Apply Now</a>
																	<a class="btn btn-light font-weight-semibold text-primary" href="company-details.html"><i class="fa fa-briefcase"></i> 12 vacancies</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-6 col-md-12 col-xl-4">
													<div class="card overflow-hidden br-0 overflow-hidden">
														<div class="d-sm-flex card-body p-3">
															<div class="p-0 m-0 mr-3">
																<div class="">
																	<a href="company-details.html"></a>
																	<img src="../assets/images/products/logo/img2.jpg" alt="img" class="w-8 h-8">
																</div>
															</div>
															<div class="item-card9 mt-2">
																<a href="company-details.html" class="text-dark"><h4 class="font-weight-semibold mt-1">Pro.Meet Pvt Ltd</h4></a>
																<div class="rating-stars d-inline-flex">
																	<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="3">
																	<div class="rating-stars-container mr-2">
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																	</div> (58 Reviews)
																</div>
															</div>
														</div>
														<div class="card overflow-hidden border-0 box-shadow-0 br-0 mb-0">
															<div class="card-footer">
																<table class="table row table-borderless w-100 m-0 text-nowrap">
																	<tbody class="col-lg-12 col-xl-12 p-0">
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Positions</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span>Java designer, php developers</span></td>
																		</tr>
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Address</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span> 2767  Concord Street, Charlotte, NC</span></td>
																		</tr>
																	</tbody>
																</table>
																<div class="mt-3">
																	<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#Applynow">Apply Now</a>
																	<a class="btn btn-light font-weight-semibold text-primary" href="company-details.html"><i class="fa fa-briefcase"></i> 6 vacancies</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-6 col-md-12 col-xl-4">
													<div class="card overflow-hidden br-0 overflow-hidden">
														<div class="d-sm-flex card-body p-3">
															<div class="p-0 m-0 mr-3">
																<div class="">
																	<a href="company-details.html"></a>
																	<img src="../assets/images/products/logo/img3.jpg" alt="img" class="w-8 h-8">
																</div>
															</div>
															<div class="item-card9 mt-2">
																<a href="company-details.html" class="text-dark"><h4 class="font-weight-semibold mt-1">Infratech Pvt Ltd</h4></a>
																<div class="rating-stars d-inline-flex">
																	<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="4">
																	<div class="rating-stars-container mr-2">
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																	</div> (82 Reviews)
																</div>
															</div>
														</div>
														<div class="card overflow-hidden border-0 box-shadow-0 br-0 mb-0">
															<div class="card-footer">
																<table class="table row table-borderless w-100 m-0 text-nowrap ">
																	<tbody class="col-lg-12 col-xl-12 p-0">
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Positions</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span>Angular developers</span></td>
																		</tr>
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Address</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span> 2767  Concord Street, Charlotte, NC</span></td>
																		</tr>
																	</tbody>
																</table>
																<div class="mt-3">
																	<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#Applynow">Apply Now</a>
																	<a class="btn btn-light font-weight-semibold text-primary" href="company-details.html"><i class="fa fa-briefcase"></i> 78 vacancies</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-6 col-md-12 col-xl-4">
													<div class="card overflow-hidden br-0 overflow-hidden">
														<div class="d-sm-flex card-body p-3">
															<div class="p-0 m-0 mr-3">
																<div class="">
																	<a href="company-details.html"></a>
																	<img src="../assets/images/products/logo/img4.jpg" alt="img" class="w-8 h-8">
																</div>
															</div>
															<div class="item-card9 mt-2">
																<a href="company-details.html" class="text-dark"><h4 class="font-weight-semibold mt-1">Bahringer and Wyman</h4></a>
																<div class="rating-stars d-inline-flex">
																	<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="5">
																	<div class="rating-stars-container mr-2">
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																	</div> (324 Reviews)
																</div>
															</div>
														</div>
														<div class="card overflow-hidden border-0 box-shadow-0 br-0 mb-0">
															<div class="card-footer">
																<table class="table row table-borderless w-100 m-0 text-nowrap ">
																	<tbody class="col-lg-12 col-xl-12 p-0">
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Positions</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span>Web designer, Ui Designers</span></td>
																		</tr>
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Address</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span> 2767  Concord Street, Charlotte, NC</span></td>
																		</tr>
																	</tbody>
																</table>
																<div class="mt-3">
																	<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#Applynow">Apply Now</a>
																	<a class="btn btn-light font-weight-semibold text-primary" href="company-details.html"><i class="fa fa-briefcase"></i> 64 vacancies</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-6 col-md-12 col-xl-4">
													<div class="card overflow-hidden br-0 overflow-hidden">
														<div class="d-sm-flex card-body p-3">
															<div class="p-0 m-0 mr-3">
																<div class="">
																	<a href="company-details.html"></a>
																	<img src="../assets/images/products/logo/img5.jpg" alt="img" class="w-8 h-8">
																</div>
															</div>
															<div class="item-card9 mt-2">
																<a href="company-details.html" class="text-dark"><h4 class="font-weight-semibold mt-1">Hardware Solutions</h4></a>
																<div class="rating-stars d-inline-flex">
																	<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="4">
																	<div class="rating-stars-container mr-2">
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																	</div> (317 Reviews)
																</div>
															</div>
														</div>
														<div class="card overflow-hidden border-0 box-shadow-0 br-0 mb-0">
															<div class="card-footer">
																<table class="table row table-borderless w-100 m-0 text-nowrap ">
																	<tbody class="col-lg-12 col-xl-12 p-0">
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Positions</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span>Web designer, php developers</span></td>
																		</tr>
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Address</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span> 2767  Concord Street, Charlotte, NC</span></td>
																		</tr>
																	</tbody>
																</table>
																<div class="mt-3">
																	<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#Applynow">Apply Now</a>
																	<a class="btn btn-light font-weight-semibold text-primary" href="company-details.html"><i class="fa fa-briefcase"></i> 32 vacancies</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-6 col-md-12 col-xl-4">
													<div class="card overflow-hidden br-0 overflow-hidden">
														<div class="d-sm-flex card-body p-3">
															<div class="p-0 m-0 mr-3">
																<div class="">
																	<a href="company-details.html"></a>
																	<img src="../assets/images/products/logo/img6.jpg" alt="img" class="w-8 h-8">
																</div>
															</div>
															<div class="item-card9 mt-2">
																<a href="company-details.html" class="text-dark"><h4 class="font-weight-semibold mt-1">Flowtech Solutions</h4></a>
																<div class="rating-stars d-inline-flex">
																	<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="3">
																	<div class="rating-stars-container mr-2">
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																	</div> (24 Reviews)
																</div>
															</div>
														</div>
														<div class="card overflow-hidden border-0 box-shadow-0 br-0 mb-0">
															<div class="card-footer">
																<table class="table row table-borderless w-100 m-0 text-nowrap ">
																	<tbody class="col-lg-12 col-xl-12 p-0">
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Positions</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span>Web designer, Web developers</span></td>
																		</tr>
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Address</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span> 2767  Concord Street, Charlotte, NC</span></td>
																		</tr>
																	</tbody>
																</table>
																<div class="mt-3">
																	<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#Applynow">Apply Now</a>
																	<a class="btn btn-light font-weight-semibold text-primary" href="company-details.html"><i class="fa fa-briefcase"></i> 2 vacancies</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-6 col-md-12 col-xl-4">
													<div class="card overflow-hidden br-0 overflow-hidden">
														<div class="d-sm-flex card-body p-4">
															<div class="p-0 m-0 mr-3">
																<div class="">
																	<a href="company-details.html"></a>
																	<img src="../assets/images/products/logo/logo5.jpg" alt="img" class="w-8 h-8">
																</div>
															</div>
															<div class="item-card9 mt-2">
																<a href="company-details.html" class="text-dark"><h4 class="font-weight-semibold mt-1">Hardware Private Solutions</h4></a>
																<div class="rating-stars d-inline-flex">
																	<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="4">
																	<div class="rating-stars-container mr-2">
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																	</div> (75 Reviews)
																</div>
															</div>
														</div>
														<div class="card overflow-hidden border-0 box-shadow-0 br-0 mb-0">
															<div class="card-footer">
																<table class="table row table-borderless w-100 m-0 text-nowrap ">
																	<tbody class="col-lg-12 col-xl-12 p-0">
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Positions</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span>Ui designer, Ux Designers</span></td>
																		</tr>
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Address</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span> 2767  Concord Street, Charlotte, NC</span></td>
																		</tr>
																	</tbody>
																</table>
																<div class="mt-3">
																	<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#Applynow">Apply Now</a>
																	<a class="btn btn-light font-weight-semibold text-primary" href="company-details.html"><i class="fa fa-briefcase"></i> 25 vacancies</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-6 col-md-12 col-xl-4">
													<div class="card overflow-hidden br-0 overflow-hidden">
														<div class="d-sm-flex card-body p-4">
															<div class="p-0 m-0 mr-3">
																<div class="">
																	<a href="company-details.html"></a>
																	<img src="../assets/images/products/logo/logo2.jpg" alt="img" class="w-8 h-8">
																</div>
															</div>
															<div class="item-card9 mt-2">
																<a href="company-details.html" class="text-dark"><h4 class="font-weight-semibold mt-1">Wisoky-Dickens</h4></a>
																<div class="rating-stars d-inline-flex">
																	<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="4">
																	<div class="rating-stars-container mr-2">
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																	</div> (75 Reviews)
																</div>
															</div>
														</div>
														<div class="card overflow-hidden border-0 box-shadow-0 br-0 mb-0">
															<div class="card-footer">
																<table class="table row table-borderless w-100 m-0 text-nowrap ">
																	<tbody class="col-lg-12 col-xl-12 p-0">
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Positions</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span>Web designer, Web developers</span></td>
																		</tr>
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Address</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span> 2767  Concord Street, Charlotte, NC</span></td>
																		</tr>
																	</tbody>
																</table>
																<div class="mt-3">
																	<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#Applynow">Apply Now</a>
																	<a class="btn btn-light font-weight-semibold text-primary" href="company-details.html"><i class="fa fa-briefcase"></i> 36 vacancies</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-6 col-md-12 col-xl-4">
													<div class="card overflow-hidden br-0 overflow-hidden">
														<div class="d-sm-flex card-body p-4">
															<div class="p-0 m-0 mr-3">
																<div class="">
																	<a href="company-details.html"></a>
																	<img src="../assets/images/products/logo/logo3.jpg" alt="img" class="w-8 h-8">
																</div>
															</div>
															<div class="item-card9 mt-2">
																<a href="company-details.html" class="text-dark"><h4 class="font-weight-semibold mt-1">Job pvt ltd</h4></a>
																<div class="rating-stars d-inline-flex">
																	<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="4">
																	<div class="rating-stars-container mr-2">
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																	</div> (15 Reviews)
																</div>
															</div>
														</div>
														<div class="card overflow-hidden border-0 box-shadow-0 br-0 mb-0">
															<div class="card-footer">
																<table class="table row table-borderless w-100 m-0 text-nowrap ">
																	<tbody class="col-lg-12 col-xl-12 p-0">
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Positions</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span>Web designer, Web developers</span></td>
																		</tr>
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Address</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span> 2767  Concord Street, Charlotte, NC</span></td>
																		</tr>
																	</tbody>
																</table>
																<div class="mt-3">
																	<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#Applynow">Apply Now</a>
																	<a class="btn btn-light font-weight-semibold text-primary" href="company-details.html"><i class="fa fa-briefcase"></i> 26 vacancies</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="center-block text-center">
									<ul class="pagination mb-5 mb-lg-0">
										<li class="page-item page-prev disabled">
											<a class="page-link" href="#" tabindex="-1">Prev</a>
										</li>
										<li class="page-item active"><a class="page-link" href="#">1</a></li>
										<li class="page-item"><a class="page-link" href="#">2</a></li>
										<li class="page-item"><a class="page-link" href="#">3</a></li>
										<li class="page-item page-next">
											<a class="page-link" href="#">Next</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<!--/Job lists-->
					</div>
				</div>
			</div>
		</section>
		<!--/section-->

		<!--section-->
		<section class="sptb bg-white">
			<div class="container">
				<div class="section-title center-block text-center">
					<h2>How It Works?</h2>
					<p>Mauris ut cursus nunc. Morbi eleifend, ligula at consectetur vehicula</p>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="">
							<div class="mb-lg-0 mb-4">
								<div class="service-card text-center">
									<div class="bg-light icon-bg  icon-service text-purple">
										<img src="../assets/images/svgs/jobs/find.svg" alt="img">
									</div>
									<div class="servic-data mt-3">
										<h4 class="font-weight-semibold mb-2">Find Candidates</h4>
										<p class="text-muted mb-0">Nam libero tempore, cum soluta nobis est eligendi cumque facere possimus</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="">
							<div class="mb-lg-0 mb-4">
								<div class="service-card text-center">
									<div class="bg-light icon-bg icon-service text-purple">
										<img src="../assets/images/svgs/jobs/pay.svg" alt="img">
									</div>
									<div class="servic-data mt-3">
										<h4 class="font-weight-semibold mb-2">Pay Online</h4>
										<p class="text-muted mb-0">Nam libero tempore, cum soluta nobis est eligendi cumque facere possimus</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="">
							<div class="mb-lg-0 mb-4">
								<div class="service-card text-center">
									<div class="bg-light icon-bg  icon-service text-purple">
										<img src="../assets/images/svgs/jobs/hire.svg" alt="img">
									</div>
									<div class="servic-data mt-3">
										<h4 class="font-weight-semibold mb-2">Hire Candidate</h4>
										<p class="text-muted mb-0">Nam libero tempore, cum soluta nobis est eligendi cumque facere possimus</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="">
							<div class="">
								<div class="service-card text-center">
									<div class="bg-light icon-bg  icon-service text-purple">
										<img src="../assets/images/svgs/jobs/work.svg" alt="img">
									</div>
									<div class="servic-data mt-3">
										<h4 class="font-weight-semibold mb-2">Work</h4>
										<p class="text-muted mb-0">Nam libero tempore, cum soluta nobis est eligendi cumque facere possimus</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/section-->

		<!--Top Companies-->
		<section class="sptb">
			<div class="container">
				<div class="section-title center-block text-center">
					<h1>Popular Companies</h1>
					<p>Mauris ut cursus nunc. Morbi eleifend, ligula at consectetur vehicula</p>
				</div>
				<div id="company-carousel" class="owl-carousel owl-carousel-icons4">
					<div class="item">
						<div class="card mb-0">
							<div class="card-body">
								<img src="../assets/images/clients/1.png" alt="company1">
							</div>
						</div>
					</div>
					<div class="item">
						<div class="card mb-0">
							<div class="card-body">
								<img src="../assets/images/clients/2.png" alt="company2">
							</div>
						</div>
					</div>
					<div class="item">
						<div class="card mb-0">
							<div class="card-body">
								<img src="../assets/images/clients/3.png" alt="company3">
							</div>
						</div>
					</div>
					<div class="item">
						<div class="card mb-0">
							<div class="card-body">
								<img src="../assets/images/clients/4.png" alt="company4">
							</div>
						</div>
					</div>
					<div class="item">
						<div class="card mb-0">
							<div class="card-body">
								<img src="../assets/images/clients/5.png" alt="company5">
							</div>
						</div>
					</div>
					<div class="item">
						<div class="card mb-0">
							<div class="card-body">
								<img src="../assets/images/clients/6.png" alt="company6">
							</div>
						</div>
					</div>
					<div class="item">
						<div class="card mb-0">
							<div class="card-body">
								<img src="../assets/images/clients/7.png" alt="company7">
							</div>
						</div>
					</div>
					<div class="item">
						<div class="card mb-0">
							<div class="card-body">
								<img src="../assets/images/clients/8.png" alt="company8">
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/Top Companies-->

		<!--Section-->
		<section class="sptb bg-white">
			<div class="container">
				<div class="row no-gutters  row-deck find-job">
					<div class="col-md-6">
						<div class="bg-light p-0 box-shadow2 border-transparent">
							<div class="card-body text-center">
								<div class="bg-white icon-bg  icon-service text-purple mb-4">
									<img src="../assets/images/svgs/jobs/find.svg" alt="img">
								</div>
								<h6 class="card-title fs-18 mb-4">Do You Want to Find a Job?</h6>
								<p>it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text</p>
								<a href="jobs-list.html" class="btn btn-primary text-white">Find Job</a>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="bg-white p-0 mt-5 mt-md-0 border box-shadow2">
							<div class="card-body text-center">
								<div class="bg-light icon-bg  icon-service text-purple mb-4">
									<img src="../assets/images/svgs/jobs/work.svg" alt="img">
								</div>
								<h6 class="card-title fs-18 mb-4">Are You Looking For A Candidate?</h6>
								<p>it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text</p>
								<a href="candidate-listing.html" class="btn btn-primary text-white">Find Candidate</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/Section-->

		<!--Section-->
		<section class="sptb">
			<div class="container">
				<div class="section-title center-block text-center">
					<h2>Download</h2>
					<p>Mauris ut cursus nunc. Morbi eleifend, ligula at consectetur vehicula</p>
				</div>
                <div class="row">
					<div class="col-md-12">
						<div class="text-center text-wrap">
							<div class="btn-list">
								<a href="#" class="btn btn-primary btn-lg mb-sm-0"><i class="fa fa-apple fa-1x mr-2"></i> App Store</a>
								<a href="#" class="btn btn-secondary btn-lg mb-sm-0"><i class="fa fa-android fa-1x mr-2"></i> Google Play</a>
								<a href="#" class="btn btn-info btn-lg mb-0"><i class="fa fa-windows fa-1x mr-2"></i> Windows</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/Section-->

		<!-- Onlinesletter-->
		<section class="sptb bg-white border-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 col-xl-6 col-md-12">
						<div class="sub-newsletter">
							<h3 class="mb-2"><i class="fa fa-paper-plane-o mr-2"></i> Subscribe To Our Onlinesletter</h3>
							<p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
						</div>
					</div>
					<div class="col-lg-5 col-xl-6 col-md-12">
						<div class="input-group sub-input mt-1">
							<input type="text" class="form-control input-lg " placeholder="Enter your Email">
							<div class="input-group-append ">
								<button type="button" class="btn btn-primary btn-lg br-tr-3  br-br-3">
									Subscribe
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/Onlinesletter-->

		<!--Footer Section-->
		<section class="main-footer">
			<footer class="bg-dark text-white cover-image" data-image-src="../assets/images/banners/banner3.jpg">
				<div class="footer-main">
					<div class="container">
						<div class="row">
							<div class="col-lg-2 col-md-12">
								<h6>Job Categories</h6>
								<hr class="deep-purple  accent-2 mb-4 mt-0 d-inline-block mx-auto">
								<ul class="list-unstyled mb-0">
									<li><a href="#">Developement</a></li>
									<li><a href="#">Designing</a></li>
									<li><a href="#">Marketing</a></li>
									<li><a href="#">Others</a></li>
								</ul>
							</div>
							<div class="col-lg-2 col-md-12">
								<h6>Job Type</h6>
								<hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto">
								<ul class="list-unstyled mb-0">
									<li><a href="#">Work from home</a></li>
									<li><a href="#">Internship</a></li>
									<li><a href="#">Part time</a></li>
									<li><a href="#">Full time</a></li>
								</ul>
							</div>
							<div class="col-lg-2 col-md-12">
								<h6>Resources</h6>
								<hr class="deep-purple  accent-2 mb-4 mt-0 d-inline-block mx-auto">
								<ul class="list-unstyled mb-0">
									<li><a href="#">Support</a></li>
									<li><a href="#">FAQ</a></li>
									<li><a href="#">Terms of Service</a></li>
									<li><a href="#">Contact Details</a></li>
								</ul>
							</div>
							<div class="col-lg-3 col-md-12">
								<h6>Popular Ads</h6>
								<hr class="deep-purple  accent-2 mb-4 mt-0 d-inline-block mx-auto">
								<ul class="list-unstyled mb-0">
									<li><a href="#"><i class="fa fa-caret-right text-white-50"></i> Educational college Ads</a></li>
									<li><a href="#"><i class="fa fa-caret-right text-white-50"></i> Free Lancer for Web Developer</a></li>
									<li><a href="#"><i class="fa fa-caret-right text-white-50"></i> Searching for Developer</a></li>
									<li><a href="#"><i class="fa fa-caret-right text-white-50"></i> BPO Online In Bangalore</a></li>
								</ul>
							</div>
							<div class="col-lg-3 col-md-12">
								<h6 class="mb-2">Subscribe</h6>
								<hr class="deep-purple  accent-2 mb-4 mt-0 d-inline-block mx-auto">
								<div class="input-group w-100">
									<input type="text" class="form-control " placeholder="Email">
									<div class="input-group-append ">
										<button type="button" class="btn btn-primary "> Subscribe </button>
									</div>
								</div>
								<h6 class="mb-2 mt-5">Payments</h6>
								<hr class="deep-purple  accent-2 mb-4 mt-0 d-inline-block mx-auto">
								<ul class="payments mb-0">
									<li>
										<a href="javascript:;" class="payments-icon"><i class="fa fa-cc-amex" aria-hidden="true"></i></a>
									</li>
									<li>
										<a href="javascript:;" class="payments-icon"><i class="fa fa-cc-visa" aria-hidden="true"></i></a>
									</li>
									<li>
										<a href="javascript:;" class="payments-icon"><i class="fa fa-credit-card-alt" aria-hidden="true"></i></a>
									</li>
									<li>
										<a href="javascript:;" class="payments-icon"><i class="fa fa-cc-mastercard" aria-hidden="true"></i></a>
									</li>
									<li>
										<a href="javascript:;" class="payments-icon"><i class="fa fa-cc-paypal" aria-hidden="true"></i></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="text-white-50 border-top p-0">
					<div class="container">
						<div class="row d-flex">
							<div class="col-lg-8 col-sm-12  mt-2 mb-2 text-left ">
								Copyright © 2019 <a href="index.html" class="fs-14 text-white">rejoin</a>. Designed by <a href="spruko.com" class="fs-14 text-white">Spruko</a> All rights reserved.
							</div>
							<div class="col-lg-4 col-sm-12 ml-auto mb-2 mt-2 d-none d-lg-block">
								<ul class="social mb-0">
									<li>
										<a class="social-icon" href=""><i class="fa fa-facebook"></i></a>
									</li>
									<li>
										<a class="social-icon" href=""><i class="fa fa-twitter"></i></a>
									</li>
									<li>
										<a class="social-icon" href=""><i class="fa fa-rss"></i></a>
									</li>
									<li>
										<a class="social-icon" href=""><i class="fa fa-youtube"></i></a>
									</li>
									<li>
										<a class="social-icon" href=""><i class="fa fa-linkedin"></i></a>
									</li>
									<li>
										<a class="social-icon" href=""><i class="fa fa-google-plus"></i></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="text-white p-0 border-top">
					<div class="container">
						<div class="p-2 text-center footer-links">
							<a href="#" class="btn btn-link">How It Works</a>
							<a href="#" class="btn btn-link">About Us</a>
							<a href="#" class="btn btn-link">Pricing</a>
							<a href="#" class="btn btn-link">Ads Categories</a>
							<a href="#" class="btn btn-link">Privacy Policy</a>
							<a href="#" class="btn btn-link">Terms Of Conditions</a>
							<a href="#" class="btn btn-link">Blog</a>
							<a href="#" class="btn btn-link">Contact Us</a>
							<a href="#" class="btn btn-link">Premium Ad</a>
						</div>
					</div>
				</div>
			</footer>
		</section>
		<!--Footer Section-->

		<!-- Message Modal -->
		<div class="modal fade" id="Applynow" tabindex="-1" role="dialog"  aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="card-title mb-0 mt-1">Apply Now</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="form-label text-dark">Name</label>
									<input type="text" class="form-control" placeholder="Your Name" required>
								</div>
								<div class="form-group">
									<label class="form-label text-dark">Last Name</label>
									<input type="text" class="form-control" placeholder="last Name" required>
								</div>
								<div class="form-group">
									<label class="form-label text-dark">Applied For</label>
									<select class="form-control custom-select select2-show-search" data-placeholder="Choose one (with searchbox)">
										<option value="0">Position</option>
										<option value="1">Web Designer</option>
										<option value="2">Ux Designer</option>
										<option value="3">Ui Designer</option>
										<option value="4">Web Developer</option>
										<option value="5">Php Developer</option>
										<option value="6">Java Developer</option>
										<option value="7">.Net Developer</option>
										<option value="8">Angular Developer</option>
									</select>
								</div>
								<div class="form-group">
									<label class="form-label text-dark">Experience</label>
									<div class="row gutters-xs">
										<div class="col-6">
											<select class="form-control custom-select select2-show-search" data-placeholder="Choose one (with searchbox)">
												<option value="0">Year</option>
												<option value="1">0</option>
												<option value="2">1</option>
												<option value="3">2</option>
												<option value="4">3</option>
												<option value="5">4</option>
												<option value="6">5</option>
												<option value="7">6</option>
												<option value="8">7</option>
												<option value="9">8</option>
												<option value="10">9</option>
												<option value="11">10</option>
												<option value="12">11</option>
											</select>
										</div>
										<div class="col-6">
											<select class="form-control custom-select select2-show-search" data-placeholder="Choose one (with searchbox)">
												<option value="0">Month</option>
												<option value="1">0</option>
												<option value="2">1</option>
												<option value="3">2</option>
												<option value="4">3</option>
												<option value="5">4</option>
												<option value="6">5</option>
												<option value="7">6</option>
												<option value="8">7</option>
												<option value="9">8</option>
												<option value="10">9</option>
												<option value="11">10</option>
												<option value="12">11</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="form-label text-dark">Email</label>
									<input type="email" class="form-control" placeholder="Email" required>
								</div>
								<div class="form-group">
									<label class="form-label text-dark">Phone Number</label>
									<input type="text" class="form-control" placeholder="Your Number" required>
								</div>
								<div class="form-group mb-0 resume-upload">
									<form class="d-flex">
										<input type="file" id="file-upload" multiple required />
										<label for="file-upload" class="file-upload">Upload Resume</label>
										<div id="file-upload-filename"></div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Send Me Back</button>
						<button type="button" class="btn btn-success">Apply Now</button>
					</div>
				</div>
			</div>
		</div>
		<!-- /Message Modal -->

		<!-- Notification -->
		<a href="advanced-search.html" id="notification" ><span class="notification-text">Create Job Alert</span><i class="fa fa-bell"></i></a>

		<!-- Back to top -->
		<a href="#top" id="back-to-top" ><i class="fa fa-arrow-up"></i></a>

<?php $this->endContent(); ?>