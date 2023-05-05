<style>
	header.masthead {
		background-image: url('<?php echo validate_image($_settings->info('cover')) ?>') !important;
	}

	header.masthead .container {
		background: #0000006b;
		padding: 10px auto;
	}

	/* video container */
	.container-video {
		display: flex;
		padding: 10px auto;
	}

	.container-video>iframe {
		margin: 3px;
		width: 500px;
	}

	.guide-content {
		width: 60%;
		box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
		display: grid;
		place-content: left;
		padding: 1rem;
	}

	.by-way {
		padding: 0 1.5rem;
		font-weight: bolder;
		width: 13%;

	}
</style>
<!-- Masthead-->
<header class="masthead">
	<div class="container">
		<!-- <div class="masthead-subheading">Amarkantak : The Harmony of Religion And Nature</div> -->
		<div class="masthead-subheading">Amarkantak : The Harmony of Religion And Nature</div>

		<a class="btn btn-primary btn-xl text-uppercase" href="#home" style="color:white; background-color:black ; border:none; ">Places to visit</a>
	</div>

</header>

<!-- Services-->
<section class="page-section bg-dark" id="home">
	<div class="container">
		<h2 class="text-center">Places to visit in Amarkantak</h2>
		<div class="d-flex w-100 justify-content-center">
			<hr class="border-warning" style="border:3px solid" width="15%">
		</div>
		<div class="row">
			<?php
			$packages = $conn->query("SELECT * FROM `packages` order by rand() limit 3");
			while ($row = $packages->fetch_assoc()) :
				$cover = '';
				if (is_dir(base_app . 'uploads/package_' . $row['id'])) {
					$img = scandir(base_app . 'uploads/package_' . $row['id']);
					$k = array_search('.', $img);
					if ($k !== false)
						unset($img[$k]);
					$k = array_search('..', $img);
					if ($k !== false)
						unset($img[$k]);
					$cover = isset($img[2]) ? 'uploads/package_' . $row['id'] . '/' . $img[2] : "";
				}
				$row['description'] = strip_tags(stripslashes(html_entity_decode($row['description'])));

				$review = $conn->query("SELECT * FROM `rate_review` where package_id='{$row['id']}'");
				$review_count = $review->num_rows;
				$rate = 0;
				while ($r = $review->fetch_assoc()) {
					$rate += $r['rate'];
				}
				if ($rate > 0 && $review_count > 0)
					$rate = number_format($rate / $review_count, 0, "");
			?>
				<div class="col-md-4 p-4 ">
					<div class="card w-100 rounded-0">
						<img class="card-img-top" src="<?php echo validate_image($cover) ?>" alt="<?php echo $row['title'] ?>" height="200rem" style="object-fit:cover">
						<div class="card-body">
							<h5 class="card-title truncate-1 w-100"><?php echo $row['title'] ?></h5><br>
							<!-- <div class=" w-100 d-flex justify-content-start">
								<div class="stars stars-small">
									<input disabled class="star star-5" id="star-5" type="radio" name="star" <?php echo $rate == 5 ? "checked" : '' ?> /> <label class="star star-5" for="star-5"></label>
									<input disabled class="star star-4" id="star-4" type="radio" name="star" <?php echo $rate == 4 ? "checked" : '' ?> /> <label class="star star-4" for="star-4"></label>
									<input disabled class="star star-3" id="star-3" type="radio" name="star" <?php echo $rate == 3 ? "checked" : '' ?> /> <label class="star star-3" for="star-3"></label>
									<input disabled class="star star-2" id="star-2" type="radio" name="star" <?php echo $rate == 2 ? "checked" : '' ?> /> <label class="star star-2" for="star-2"></label>
									<input disabled class="star star-1" id="star-1" type="radio" name="star" <?php echo $rate == 1 ? "checked" : '' ?> /> <label class="star star-1" for="star-1"></label>
								</div>
							</div> -->
							<p class="card-text truncate"><?php echo $row['description'] ?></p>
							<div class="w-100 d-flex justify-content-end">
								<a href="./?page=view_package&id=<?php echo md5($row['id']) ?>" class="btn btn-sm btn-flat btn-warning" style="color:white; background-color:black ; border:none;">View <i class="fa fa-arrow-right"></i></a>
							</div>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
		<div class="d-flex w-100 justify-content-end">
			<a href="./?page=packages" class="btn btn-flat btn-warning mr-4"  style="color:white; background-color:black ; border:none;">Explore More <i class="fa fa-arrow-right"></i></a>
		</div>
	</div>
</section>
<!-- Youtube video -->
<header>
	<div class="container-video">
		<div>
			<!-- <iframe width="500" height="281" src="https://www.youtube.com/embed/49mhQEhUQMs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div> -->
			<iframe width="500" height="281" src="https://www.youtube.com/embed/qPhO-L5M9uQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
			<iframe width="500" height="281" src="https://www.youtube.com/embed/49mhQEhUQMs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
		</div>
		<!-- <iframe width="500" height="281" src="https://www.youtube.com/embed/czNtKz7Vgso" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> -->
		<iframe width="500" height="281" src="https://www.youtube.com/embed/qD1ehp86Pdk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
	</div>
</header>

<!-- Location  -->
<div>
	<iframe src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d117741.67953601813!2d81.67921865809896!3d22.749511533147498!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e0!4m3!3m2!1d22.8116023!2d81.756822!4m5!1s0x3987914444a5a36f%3A0x9d7c760ceef51c03!2sAmarkantak%2C%20Madhya%20Pradesh!3m2!1d22.6822292!2d81.7532219!5e0!3m2!1sen!2sin!4v1683285397316!5m2!1sen!2sin" width="1500" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

</div>
</header>

<!-- how to visit guide -->

<center>
	<div class="guide-section">
		<h2>
			HOW TO VISIT AMARKANTAK ?

		</h2>
		<div class="guide-content">

			<table style="width:100%">

				<tr>
					<td class="by-way">By Air:</td>
					<td>The nearest airports to Amarkantak are Jabalpur at 228 km and Raipur at 230 km. Both the airports are well linked to many major cities of India.
					</td>

				</tr>
				<tr>
					<td class="by-way">By Rail:</td>
					<td>The closest railhead to Amarkantak is situated at Pendra Road in Chattisgarh at 42 km.
					</td>

				</tr>
				<tr>
					<td class="by-way">
						By Road:
					</td>
					<td>Amarkantak is 71 km from Anuppur, the district headquarter. There is the option of direct buses from Rewa, Allahabad, Mandla, Seoni, Bilaspur, Katni, Jabalpur, and Raipur.
					</td>
				</tr>
			</table>
		</div>
	</div>
</center>

<!-- About-->
<section class="page-section" id="about">
	<div class="container">
		<div class="text-center">
			<h2 class="section-heading text-uppercase">About Us</h2>
		</div>
		<div>
			<div class="card w-100">
				<div class="card-body">
					<?php echo file_get_contents(base_app . 'about.html') ?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Contact-->
<section class="page-section" id="contact">
	<div class="container">
		<div class="text-center">
			<h2 class="section-heading text-uppercase">Contact Us</h2>
			<h3 class="section-subheading text-muted">Send us a message for inquiries.</h3>
		</div>

		<iframe src="https://docs.google.com/forms/d/e/1FAIpQLSeFzl5UeCeUS0gK4r_D2aojbfmCpsu89HHEgmTvIO8pYU16SA/viewform?embedded=true" width="1300" height="1000" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
		<!-- * * * * * * * * * * * * * * *-->
		<!-- * * SB Forms Contact Form * *-->
		<!-- * * * * * * * * * * * * * * *-->
		<!-- This form is pre-integrated with SB Forms.-->
		<!-- To make this form functional, sign up at-->
		<!-- https://startbootstrap.com/solution/contact-forms-->
		<!-- to get an API token!-->
		<!-- <form id="contactForm" >
			<div class="row align-items-stretch mb-5">
				<div class="col-md-6">
					<div class="form-group"> -->
		<!-- Name input-->
		<!-- <input class="form-control" id="name" name="name" type="text" placeholder="Your Name *" required />
					</div>
					<div class="form-group"> -->
		<!-- Email address input-->
		<!-- <input class="form-control" id="email" name="email" type="email" placeholder="Your Email *" data-sb-validations="required,email" />
					</div>
					<div class="form-group mb-md-0">
						<input class="form-control" id="subject" name="subject" type="subject" placeholder="Subject *" required />
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group form-group-textarea mb-md-0"> -->
		<!-- Message input
						<textarea class="form-control" id="message" name="message" placeholder="Your Message *" required></textarea>
					</div>
				</div>
			</div>
			<div class="text-center"><button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit">Send Message</button></div>
		</form> -->
	</div>
</section>
<script>
	$(function() {
		$('#contactForm').submit(function(e) {
			e.preventDefault()
			$.ajax({
				url: _base_url_ + "classes/Master.php?f=save_inquiry",
				method: "POST",
				data: $(this).serialize(),
				dataType: "json",
				error: err => {
					console.log(err)
					alert_toast("an error occured", 'error')
					end_loader()
				},
				success: function(resp) {
					if (typeof resp == 'object' && resp.status == 'success') {
						alert_toast("Inquiry sent", 'success')
						$('#contactForm').get(0).reset()
					} else {
						console.log(resp)
						alert_toast("an error occured", 'error')
						end_loader()
					}
				}
			})
		})
	})
</script>