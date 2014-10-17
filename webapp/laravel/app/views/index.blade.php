@extends("layouts.main")
@section("content")
  <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="img/profile.png" alt="">
                    <div class="intro-text">
                        <span class="name">Automatic </span>
		<span class="name">CMS Installation</span>
                        <hr class="star-light">
                        <span class="skills">Easy to Install - More CMS - High Availability</span>
                    </div>
					<div class="col-lg-8 col-lg-offset-2 text-center" style="margin-top:50px">
						<a href="#sign-up" class="btn btn-lg btn-outline page-scroll">
							<i class="fa fa-cloud"></i> Create Your Web Site !
						</a>
					</div>
                </div>
            </div>
        </div>
    </header>

	<!-- Easy to Install Section -->
	<section id="easy-to-install">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2>Easy to Install</h2>
					<hr class="star-primary">
				</div>
			</div>
		</div>
	</section>

	<!-- More CMS Section -->
	<section class="success" id="more-cms">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2>More CMS</h2>
					<hr class="star-light">
				</div>
			</div>
		</div>
	</section>

	<!-- High Availability Section -->
	<section id="high-availability">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2>High Availability</h2>
					<hr class="star-primary">
				</div>
			</div>
		</div>
	</section>

	<!-- How to Section -->
	<section class="success" id="how-to">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2>How to</h2>
					<hr class="star-light">
				</div>
			</div>
		</div>
	</section>

	<!-- Sign Up -->
	<section  id="sign-up">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2>Sign Up</h2>
					<hr class="star-primary">
				</div>
			</div>
			<div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <form name="signUp" id="signupForm" validate> 
                    	<div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Site Name</label>
                                <input type="text" class="form-control" placeholder="Site Name" id="sitename" required data-validation-required-message="Please enter your sitename.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>	                       
                         <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Full Name</label>
                                <input type="text" class="form-control" placeholder="Full Name" id="fullname" required data-validation-required-message="Please enter your fullname.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-6 floating-label-form-group controls">
                                <label>Username</label>
                                <input type="text" class="form-control" placeholder="Username" id="sitename" required data-validation-required-message="Please enter your username.">
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="form-group col-xs-6 floating-label-form-group controls">
                                <label>Email Address</label>
                                <input type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>	
		<div class="row control-group">
                            <div class="form-group col-xs-6 floating-label-form-group controls">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="Password" id="password" required data-validation-required-message="Please enter your password.">
                                <p class="help-block text-danger"></p>
                            </div>                        
                            <div class="form-group col-xs-6 floating-label-form-group controls">
                                <label>Password Again</label>
                                <input type="password" class="form-control" placeholder="Password Again" id="password-again" required data-validation-required-message="Please enter your password again.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>				
                        
                        <div id="success"></div>
                        <div class="row text-center">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
		</div>
	</section>

	<!-- About Section -->
	<section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>About</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2">
                    <p>Automatic CMS Installation is a free Web Site can easy installation created by Night Fury. Register, Choose your cms you liked, set your domain-name, and config important setting then you will get your web site.</p>
                </div>
                <div class="col-lg-4">
                    <p>Whether you're looking to create web site, a professional looking to attract clients, or a graphic artist looking to share your projects, your web site is very easy to install!</p>
                </div>
            </div>
        </div>
    </section>
	
@stop