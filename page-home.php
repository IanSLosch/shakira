<?php
/**
 * Template Name: Home Page
 */
get_header();

if (have_posts()) {
	while (have_posts()) {
		the_post();


		$small_header = get_field('small_header');
		$main_header = get_field('main_header');
		$cta_link = get_field('cta_link');
		if ($cta_link) {
			$header_link_url = $cta_link['url'];
			$header_link_title = $cta_link['title'];
			$header_link_target = $cta_link['target'];
		}
		?>

		<section id="home">
			<section id="hero">
				<div class="container">
					<div class="info">
						<div class="text">
							<p>
								<?php echo $small_header; ?>
							</p>
							<h2>
								<?php echo $main_header; ?>
							</h2>
						</div>
						<a target="_blank" class="btn last-button" href="<?php echo $header_link_url; ?>">
							<?php echo $header_link_title; ?>
						</a>
					</div>
				</div>
			</section>

			<section id="editions">
				<div class="container">
					<?php
					if (have_rows('featured_album')) {
						while (have_rows('featured_album')) {
							the_row();

							$cover = wp_get_attachment_image(get_sub_field('cover'), 'full');
							$cover_link = get_sub_field('cover_link');
							$album_title = get_sub_field('title');
							$button_a = get_sub_field('button_a');

							if ($button_a) {
								$button_link_url_a = $button_a['url'];
								$button_link_title_a = $button_a['title'];
							}
							$button_b = get_sub_field('button_b');
							if ($button_b) {
								$button_link_url_b = $button_b['url'];
								$button_link_title_b = $button_b['title'];
							}
							?>

							<div class="item">
								<a href="<?php echo esc_url($cover_link) ?>">
									<?php echo $cover ?>
								</a>
								<div class="info">
									<p class="title">
										<?php echo $album_title ?>
									</p>
									<div class="btn-group">
										<a target="_blank" class="btn" href="<?php echo $button_link_url_a ?>">
											<?php echo $button_link_title_a ?>
										</a>
										<a target="_blank" class="btn" href="<?php echo $button_link_url_b ?>">
											<?php echo $button_link_title_b ?>
										</a>
									</div>
								</div>
							</div>

							<?php
						}
					}
					?>

				</div>
			</section>

			<?php
			$featured_video_url = get_field('video_embed_id');
			$featured_video_title = get_field('video_title');

			$play_icon = wp_get_attachment_image_url(get_field('play_icon', 'option'), 'full');
			$play_icon_hover = wp_get_attachment_image_url(get_field('play_icon_hover', 'option'), 'full');
			$video_player_poster = wp_get_attachment_image_url(get_field('video_player_poster', 'option'), 'full');
			?>

			<section id="featured-video">
				<div class="container">

					<div class="video-wrapper">
						<div class="poster-wrapper">
							<img class="poster" src="<?php echo $video_player_poster ?>" alt="<?php echo $featured_video_title ?>">
							<div class="poster-overlay"></div>
							<div class="play play-overlay">
								<div class="icon-wrapper">
									<img class="outline" src="<?php echo $play_icon ?>" alt="Play">
									<img class="color" src="<?php echo $play_icon_hover ?>" alt="Play">
								</div>
								<p>Play</p>
							</div>
						</div>
						<div class="embed-container">
							<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo get_youtube_id($featured_video_url) ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
						</div>
					</div>

					<p class="title">
						<?php echo $featured_video_title ?>
					</p>
					<a class="btn" href="./videos" target="_blank">See More</a>
				</div>
			</section>

			<?php
			$newsletter_title = get_field('newsletter_title', 'option');
			$newsletter_subtitle = get_field('newsletter_subtitle', 'option');
			?>

			<section id="newsletter">
				<div class="container signup-form">
					<h2>
						<?php echo $newsletter_title ?>
					</h2>
					<p>
						<?php echo $newsletter_subtitle ?>
					</p>
					<form data-id="shakira-signupform-2024" class="newsletter lang-en" method="post" action="https://subs.sonymusicfans.com/submit">
						<div class="inputs-wrap">
							<input type="email" data-id="email-address" name="field_email_address" required autocomplete="off" placeholder="Email" aria-label="Email for Newsletter Sign Up" />
							<div class="select-group">
								<div class="form-group">
									<select data-id="field_language" name="mailing-list-id[0]" data-validation="Enter your language" class="form-control" aria-label="Idioma | Language" required>
										<option selected disabled value="">Language</option>
										<option value="a0S61000000b3HJEAY">English</option>
										<option value="a0S61000000b353EAA">Spanish</option>
									</select>
								</div>
								<div class="form-group">
									<select data-id="field_country_region" name="field_country_region" data-validation="Enter your country or region" class="form-control" aria-label="País | Country">
										<option selected disabled value="">Country</option>
										<option value="AF">Afghanistan</option>
										<option value="AL">Albania</option>
										<option value="DZ">Algeria</option>
										<option value="AS">American Samoa</option>
										<option value="AD">Andorra</option>
										<option value="AO">Angola</option>
										<option value="AI">Anguilla</option>
										<option value="AQ">Antarctica</option>
										<option value="AG">Antigua & Barbuda</option>
										<option value="AR">Argentina</option>
										<option value="AM">Armenia</option>
										<option value="AW">Aruba</option>
										<option value="AU">Australia</option>
										<option value="AT">Austria</option>
										<option value="AZ">Azerbaijan</option>
										<option value="BS">Bahamas</option>
										<option value="BH">Bahrain</option>
										<option value="BD">Bangladesh</option>
										<option value="BB">Barbados</option>
										<option value="BY">Belarus</option>
										<option value="BE">Belgium</option>
										<option value="BZ">Belize</option>
										<option value="BJ">Benin</option>
										<option value="BM">Bermuda</option>
										<option value="BT">Bhutan</option>
										<option value="BO">Bolivia</option>
										<option value="BA">Bosnia & Herzegovina</option>
										<option value="BW">Botswana</option>
										<option value="BV">Bouvet Island</option>
										<option value="BR">Brazil</option>
										<option value="IO">British Indian Ocean Territory</option>
										<option value="VG">British Virgin Islands</option>
										<option value="BN">Brunei</option>
										<option value="BG">Bulgaria</option>
										<option value="BF">Burkina Faso</option>
										<option value="BI">Burundi</option>
										<option value="KH">Cambodia</option>
										<option value="CM">Cameroon</option>
										<option value="CA">Canada</option>
										<option value="CV">Cape Verde</option>
										<option value="BQ">Caribbean Netherlands</option>
										<option value="KY">Cayman Islands</option>
										<option value="CF">Central African Republic</option>
										<option value="TD">Chad</option>
										<option value="CL">Chile</option>
										<option value="CN">China</option>
										<option value="CX">Christmas Island</option>
										<option value="CC">Cocos (Keeling) Islands</option>
										<option value="CO">Colombia</option>
										<option value="KM">Comoros</option>
										<option value="CG">Congo - Brazzaville</option>
										<option value="CD">Congo - Kinshasa</option>
										<option value="CK">Cook Islands</option>
										<option value="CR">Costa Rica</option>
										<option value="HR">Croatia</option>
										<option value="CU">Cuba</option>
										<option value="CW">Curaçao</option>
										<option value="CY">Cyprus</option>
										<option value="CZ">Czechia</option>
										<option value="CI">Côte d’Ivoire</option>
										<option value="DK">Denmark</option>
										<option value="DJ">Djibouti</option>
										<option value="DM">Dominica</option>
										<option value="DO">Dominican Republic</option>
										<option value="EC">Ecuador</option>
										<option value="EG">Egypt</option>
										<option value="SV">El Salvador</option>
										<option value="GQ">Equatorial Guinea</option>
										<option value="ER">Eritrea</option>
										<option value="EE">Estonia</option>
										<option value="SZ">Eswatini</option>
										<option value="ET">Ethiopia</option>
										<option value="FK">Falkland Islands</option>
										<option value="FO">Faroe Islands</option>
										<option value="FJ">Fiji</option>
										<option value="FI">Finland</option>
										<option value="FR">France</option>
										<option value="GF">French Guiana</option>
										<option value="PF">French Polynesia</option>
										<option value="TF">French Southern Territories</option>
										<option value="GA">Gabon</option>
										<option value="GM">Gambia</option>
										<option value="GE">Georgia</option>
										<option value="DE">Germany</option>
										<option value="GH">Ghana</option>
										<option value="GI">Gibraltar</option>
										<option value="GR">Greece</option>
										<option value="GL">Greenland</option>
										<option value="GD">Grenada</option>
										<option value="GP">Guadeloupe</option>
										<option value="GU">Guam</option>
										<option value="GT">Guatemala</option>
										<option value="GG">Guernsey</option>
										<option value="GN">Guinea</option>
										<option value="GW">Guinea-Bissau</option>
										<option value="GY">Guyana</option>
										<option value="HT">Haiti</option>
										<option value="HM">Heard & McDonald Islands</option>
										<option value="HN">Honduras</option>
										<option value="HK">Hong Kong SAR China</option>
										<option value="HU">Hungary</option>
										<option value="IS">Iceland</option>
										<option value="IN">India</option>
										<option value="ID">Indonesia</option>
										<option value="IR">Iran</option>
										<option value="IQ">Iraq</option>
										<option value="IE">Ireland</option>
										<option value="IM">Isle of Man</option>
										<option value="IL">Israel</option>
										<option value="IT">Italy</option>
										<option value="JM">Jamaica</option>
										<option value="JP">Japan</option>
										<option value="JE">Jersey</option>
										<option value="JO">Jordan</option>
										<option value="KZ">Kazakhstan</option>
										<option value="KE">Kenya</option>
										<option value="KI">Kiribati</option>
										<option value="XK">Kosovo</option>
										<option value="KW">Kuwait</option>
										<option value="KG">Kyrgyzstan</option>
										<option value="LA">Laos</option>
										<option value="LV">Latvia</option>
										<option value="LB">Lebanon</option>
										<option value="LS">Lesotho</option>
										<option value="LR">Liberia</option>
										<option value="LY">Libya</option>
										<option value="LI">Liechtenstein</option>
										<option value="LT">Lithuania</option>
										<option value="LU">Luxembourg</option>
										<option value="MO">Macao SAR China</option>
										<option value="MG">Madagascar</option>
										<option value="MW">Malawi</option>
										<option value="MY">Malaysia</option>
										<option value="MV">Maldives</option>
										<option value="ML">Mali</option>
										<option value="MT">Malta</option>
										<option value="MH">Marshall Islands</option>
										<option value="MQ">Martinique</option>
										<option value="MR">Mauritania</option>
										<option value="MU">Mauritius</option>
										<option value="YT">Mayotte</option>
										<option value="MX">Mexico</option>
										<option value="FM">Micronesia</option>
										<option value="MD">Moldova</option>
										<option value="MC">Monaco</option>
										<option value="MN">Mongolia</option>
										<option value="ME">Montenegro</option>
										<option value="MS">Montserrat</option>
										<option value="MA">Morocco</option>
										<option value="MZ">Mozambique</option>
										<option value="MM">Myanmar (Burma)</option>
										<option value="NA">Namibia</option>
										<option value="NR">Nauru</option>
										<option value="NP">Nepal</option>
										<option value="NL">Netherlands</option>
										<option value="NC">New Caledonia</option>
										<option value="NZ">New Zealand</option>
										<option value="NI">Nicaragua</option>
										<option value="NE">Niger</option>
										<option value="NG">Nigeria</option>
										<option value="NU">Niue</option>
										<option value="NF">Norfolk Island</option>
										<option value="KP">North Korea</option>
										<option value="MK">North Macedonia</option>
										<option value="MP">Northern Mariana Islands</option>
										<option value="NO">Norway</option>
										<option value="OM">Oman</option>
										<option value="PK">Pakistan</option>
										<option value="PW">Palau</option>
										<option value="PS">Palestinian Territories</option>
										<option value="PA">Panama</option>
										<option value="PG">Papua New Guinea</option>
										<option value="PY">Paraguay</option>
										<option value="PE">Peru</option>
										<option value="PH">Philippines</option>
										<option value="PN">Pitcairn Islands</option>
										<option value="PL">Poland</option>
										<option value="PT">Portugal</option>
										<option value="PR">Puerto Rico</option>
										<option value="QA">Qatar</option>
										<option value="RO">Romania</option>
										<option value="RU">Russia</option>
										<option value="RW">Rwanda</option>
										<option value="RE">Réunion</option>
										<option value="WS">Samoa</option>
										<option value="SM">San Marino</option>
										<option value="SA">Saudi Arabia</option>
										<option value="SN">Senegal</option>
										<option value="RS">Serbia</option>
										<option value="SC">Seychelles</option>
										<option value="SL">Sierra Leone</option>
										<option value="SG">Singapore</option>
										<option value="SX">Sint Maarten</option>
										<option value="SK">Slovakia</option>
										<option value="SI">Slovenia</option>
										<option value="SB">Solomon Islands</option>
										<option value="SO">Somalia</option>
										<option value="ZA">South Africa</option>
										<option value="GS">South Georgia & South Sandwich Islands</option>
										<option value="KR">South Korea</option>
										<option value="SS">South Sudan</option>
										<option value="ES">Spain</option>
										<option value="LK">Sri Lanka</option>
										<option value="BL">St. Barthélemy</option>
										<option value="SH">St. Helena</option>
										<option value="KN">St. Kitts & Nevis</option>
										<option value="LC">St. Lucia</option>
										<option value="MF">St. Martin</option>
										<option value="PM">St. Pierre & Miquelon</option>
										<option value="VC">St. Vincent & Grenadines</option>
										<option value="SD">Sudan</option>
										<option value="SR">Suriname</option>
										<option value="SJ">Svalbard & Jan Mayen</option>
										<option value="SE">Sweden</option>
										<option value="CH">Switzerland</option>
										<option value="SY">Syria</option>
										<option value="ST">São Tomé & Príncipe</option>
										<option value="TW">Taiwan</option>
										<option value="TJ">Tajikistan</option>
										<option value="TZ">Tanzania</option>
										<option value="TH">Thailand</option>
										<option value="TL">Timor-Leste</option>
										<option value="TG">Togo</option>
										<option value="TK">Tokelau</option>
										<option value="TO">Tonga</option>
										<option value="TT">Trinidad & Tobago</option>
										<option value="TN">Tunisia</option>
										<option value="TR">Turkey</option>
										<option value="TM">Turkmenistan</option>
										<option value="TC">Turks & Caicos Islands</option>
										<option value="TV">Tuvalu</option>
										<option value="UM">U.S. Outlying Islands</option>
										<option value="VI">U.S. Virgin Islands</option>
										<option value="UG">Uganda</option>
										<option value="UA">Ukraine</option>
										<option value="AE">United Arab Emirates</option>
										<option value="GB">United Kingdom</option>
										<option value="US">United States</option>
										<option value="UY">Uruguay</option>
										<option value="UZ">Uzbekistan</option>
										<option value="VU">Vanuatu</option>
										<option value="VA">Vatican City</option>
										<option value="VE">Venezuela</option>
										<option value="VN">Vietnam</option>
										<option value="WF">Wallis & Futuna</option>
										<option value="EH">Western Sahara</option>
										<option value="YE">Yemen</option>
										<option value="ZM">Zambia</option>
										<option value="ZW">Zimbabwe</option>
										<option value="AX">Åland Islands</option>
									</select>
								</div>
							</div>

							<input type="hidden" name="ae_segment_id" data-id="ae_segment_id" value="2086298">
							<input type="hidden" name="ae_brand_id" data-id="ae_brand_id" value="3443599">
							<input type="hidden" name="ae_activities" data-id="ae_activities" value='{"actions":{"formsubmission":133394,"secondaryformsubmission":0},"mailing_list_optins":{"a0S61000000b3HJEAY":133395,"a0S61000000b353EAA":133396}}'>
							<input type="hidden" name="ae" data-id="ae" value="e4c9d36ebc3163dca52a6f68192a66e66731b87b4668c8eadce48aec7b9704af">
							<input type="hidden" name="form" value="401204">

							<button type="submit" class="newsletter-submit lang-en btn">Subscribe</button>
						</div>
					</form>
				</div>
			</section>
		</section>

		<?php
	}
}

get_footer()
	?>