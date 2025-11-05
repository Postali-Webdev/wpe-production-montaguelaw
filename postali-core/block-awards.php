<?php 

$display_settings = 'default';
if( get_field('awards_display_settings') ) {
     $display_settings = get_field('awards_display_settings');
}

if( $display_settings == 'default') {
    $awards_acf_source = 'awards';
    $awards_acf_option = 'options';
} else if( $display_settings == 'custom') {
    $awards_acf_source = 'unique_awards';
    $awards_acf_option = '';
}
?>    

<?php if( $display_settings !== 'hide' ) :
function renderAwardsSection($awardsField, $options) { ?>
  <section class="awards">
    <div class="container">
      <div class="columns">
        <div id="award_block">
          <?php $n=1 ?>
          <?php if( have_rows($awardsField, $options) ): ?>
          <?php while( have_rows($awardsField, $options) ): the_row(); ?>  
            <div class="column-20" id="award_<?php echo $n; ?>">
            <?php 
            $image = get_sub_field('award_image');
            if( !empty( $image ) ): ?>
              <?php if(get_sub_field('award_link')) { ?>
              <a href="<?php the_sub_field('award_link'); ?>" target="blank">
                <img class="award-logo" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
              </a>
              <?php } else { ?>
              <img class="award-logo" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
              <?php } ?>
            <?php endif; ?>
            </div>
            <?php $n++; ?>
          <?php endwhile; ?>
          <?php endif; ?> 
        </div>
      </div>
    </div>
  </section>
  <?php
}
renderAwardsSection($awards_acf_source, $awards_acf_option);
endif; ?>
