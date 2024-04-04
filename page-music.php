<?php
/**
 * Template Name: Music Page
 */
get_header();

if (have_posts()) {
  while (have_posts()) {
    the_post();

    ?>


    <div class="wolfpack-float music-page">
      <a class="btn" href="https://www.shakira.com/wolfpack/" target="_blank">Join Wolfpack</a>
    </div>

    <section id="music">
      <div class="container">
        <div class="sort-wrapper">
          <select id="sort">
            <option value="new-old">Sort By: Newest-Oldest</option>
            <option value="old-new">Sort By: Oldest-Newest</option>
            <option value="title">Sort By: Title</option>
          </select>
        </div>
        <div id="album-list" class="card-container">

          <?php
          if (have_rows('album')) {
            while (have_rows('album')) {
              the_row();

              $album_title = get_sub_field('title');
              $year = get_sub_field('year');
              $cover = wp_get_attachment_image_url(get_sub_field('cover'), 'full');

              $cover_link = get_sub_field('cover_link');
              if ($cover_link) {
                $cover_link_title = $cover_link['title'];
                $cover_link_url = $cover_link['url'];
              }

              $button = get_sub_field('button');
              if ($button) {
                $button_title = $button['title'];
                $button_url = $button['url'];
              }
              ?>


              <div class="card" data-title="<?php echo $album_title ?>" data-year="<?php echo $year ?>">
                <a href="<?php echo esc_url($cover_link_url) ?>" target="_blank" alt="<?php echo $cover_link_title ?>">
                  <img class="cover" src="<?php echo esc_url($cover) ?>">
                </a>
                <div class="info-wrapper">
                  <div class="title">
                    <?php echo $album_title ?>
                  </div>
                  <a href="<?php echo esc_url($button_url) ?>" target="_blank">
                    <?php echo $button_title ?>
                  </a>
                </div>
              </div>

            <?php }
          } ?>


        </div>
      </div>
    </section>


    <?php
  }
}

get_footer()
  ?>