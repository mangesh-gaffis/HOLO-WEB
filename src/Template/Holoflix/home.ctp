<section class="main-part"> 
	<div class="main-slider owl-carousel wow fadeIn">
		<div class="slides" style="background-image: url('img/movie-cover/trolls.jpg');" data-movie="trolls"></div>
		<div class="slides" style="background-image: url('img/movie-cover/star_war.jpg');" data-movie="star_war"></div>
		<div class="slides" style="background-image: url('img/movie-cover/terminator.jpg');" data-movie="terminator"></div>
	</div>
	<div class="main-cnt">
		<div class="container">
			<div class="main-box wow fadeIn" data-wow-delay=".4s">
				<div class="movie-box">

					<!-- trolls -->
					<div class="vid-name" data-name="trolls">
						<script src="https://fast.wistia.com/embed/medias/4q40vg4y74.jsonp" async></script>
						<div class="wistia_responsive_padding" style="padding:56.0% 0 0 0;position:relative;">
							<div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;">
								<div class="wistia_embed wistia_async_4q40vg4y74 videoFoam=true" style="height:100%;width:100%">&nbsp;</div>
							</div>
						</div>
					</div>

					<!-- star war -->
					<div class="vid-name hide" data-name="star_war">
						<script src="https://fast.wistia.com/embed/medias/kwsew5lr0i.jsonp" async></script>
						<div class="wistia_responsive_padding" style="padding:56.0% 0 0 0;position:relative;">
							<div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;">
								<div class="wistia_embed wistia_async_kwsew5lr0i videoFoam=true" style="height:100%;width:100%">&nbsp;</div>
							</div>
						</div>
					</div>

					<!-- terminator -->
					<div class="vid-name hide" data-name="terminator">
						<script src="https://fast.wistia.com/embed/medias/x789nu9nnw.jsonp" async></script>
						<div class="wistia_responsive_padding" style="padding:56.0% 0 0 0;position:relative;">
							<div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;">
								<div class="wistia_embed wistia_async_x789nu9nnw videoFoam=true" style="height:100%;width:100%">&nbsp;</div>
							</div>
						</div>
					</div>

				</div>
				<h2>Pre Sign Up for Free</h2>
				<p>
					Join our community!
					Pre signup for our app and receive <br>
					a free movie ticket woth your first app use!
				</p>
				<form class="form-inline" action="users/add" method="post" id="pre-register">
					<div class="form-group">
						<label class="sr-only" for="fname">First Name</label>
						<input type="text" class="form-control inp-txt" id="fname" placeholder="First Name" name="first_name">
					</div>
					<div class="form-group">
						<label class="sr-only" for="lname">Last Name</label>
						<input type="text" class="form-control inp-txt" id="lname" placeholder="Last Name" name="last_name">
					</div>
					<div class="form-group">
						<label class="sr-only" for="email">Email</label>
						<input type="email" class="form-control inp-txt" id="email" placeholder="Email" name="email">
					</div>
					<div class="form-group">
						<label class="sr-only" for="password">Password</label>
						<input type="password" class="form-control inp-txt" id="password" placeholder="Password" name="password">
					</div>
					<!-- <button type="submit" class="btn btn-default">SIGN UP FOR FREE</button> -->
					<input type="hidden" name="home" value="1" />
					<button type="submit" class="btn btn-default pre-register-submit" disabled="disabled">SIGN UP FOR FREE</button>
				</form>
			</div>
		</div>
	</div>
	<div class="slider-nav wow fadeIn" data-wow-delay=".5s"></div>
	<a href="#" class="scroll-down wow fadeInUp" data-wow-delay=".7s"><i class="icon-angle-down"></i></a>
</section>

<!-- data-toggle="modal" data-target="#movie-info" -->
<section class="holoflix-content">
	<div class="container">

		<div class="cnt-box">
			<div class="row">
				<div class="col-md-8">
					<div class="cnt-txt left-mode wow fadeInUp" data-wow-delay=".4s">
						<h3 class="title">
							What is Holoflix?
						</h3>
						<p class="desc">
							Holoflix application lets you interact with movie posters. A simple idea with endless possibilities. Make an Allie with your favorite movie star, fight with bad guys and ride your beloved spaceship all in reality.
							Using cutting edge technology and augmented reality technology we rebuilt the space in realtime and add virtual objects and characters to the camera view.all these happen in a fraction of seconds and in realtime.
						</p>
						<div class="download-lnk">
							<a href="#"><img src="img/google-play.png" alt="Google Play"></a>
							<a href="#"><img src="img/app-store.png" alt="App Store"></a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<img src="img/about-hf.png" class="wow fadeInUp" data-wow-delay=".2s" alt="About Holoflix">
				</div>
			</div>
		</div>

		<div class="cnt-box">
			<div class="row">
				<div class="col-md-4">
					<img src="img/win-ticket.png" class="wow fadeInUp" data-wow-delay=".4s" alt="play and win">
				</div>
				<div class="col-md-8">
					<div class="cnt-txt right-mode wow fadeInUp" data-wow-delay=".4s">
						<h3 class="title">
							Play and win a free ticket
						</h3>
						<p class="desc">
							Play your favourite characters and collect holocrystal. <br>
							There are so many ways to get diamond <br>
							• Find a crystal from one of our movie posters <br>
							• Share Holoflix on Facebook or Twitter <br>
							• Share your photo or video on your social network <br>
							• Invite 5 friends
						</p>
					</div>
				</div>
			</div>
		</div>

	</div>
</section>

<section class="join-us">
	<div class="container">
		<div class="join-us-box wow fadeInUp" data-wow-delay=".2s">
			<h3>
				Pre Sign Up for Free
			</h3>
			<p>
				Join our community!
				Pre signup for our app and receive <br>
				a free movie ticket woth your first app use!
			</p>
			<form class="form-inline" action="users/add" method="post" id="pre-register-footer">
				<div class="form-group">
					<label class="sr-only" for="fname-ju">First Name</label>
					<input type="text" class="form-control" id="fname-ju" placeholder="First Name" name="first_name">
				</div>
				<div class="form-group">
					<label class="sr-only" for="lname-ju">Last Name</label>
					<input type="text" class="form-control" id="lname-ju" placeholder="Last Name" name="last_name">
				</div>
				<div class="form-group">
					<label class="sr-only" for="email-ju">Email</label>
					<input type="email" class="form-control" id="email-ju" placeholder="Email" name="email">
				</div>
				<div class="form-group">
					<label class="sr-only" for="password-ju">Password</label>
					<input type="password" class="form-control" id="password-ju" placeholder="Password" name="password">
				</div>
				<!-- <button type="submit" class="btn btn-default">PRE-REGISTER</button> -->
				<button type="submit" class="btn btn-default pre-register-submit" disabled="disabled">PRE-REGISTER</button>
			</form>
		</div>
	</div>
</section>