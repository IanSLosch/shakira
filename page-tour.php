<?php
/**
 * Template Name: Tour Page
 */
get_header();

if (have_posts()) {
  while (have_posts()) {
    the_post();


    $tour_image = wp_get_attachment_image_url(get_field('tour_image'), 'full');
    $tour_link = get_field('tour_link');
    ?>


    <section class="tour">
      <a href="<?php echo $tour_link ?>" target="_blank">
        <img src="<?php echo $tour_image ?>" alt="Tour">
      </a>
    </section>

    <section id="tour-import">
      <div class="container">
        <p>Tour Dates</p>
        <div id="tour-dates"></div>
      </div>
    </section>
    <?php
  }
}

get_footer()
  ?>