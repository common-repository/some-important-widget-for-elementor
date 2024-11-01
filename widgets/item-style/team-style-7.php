<!-- flip Out Down Area Start Here -->
<div id="hover_area">
  <figure class="mc-item mc-item--flipOutDown extraflipOutDown">
   <img class="mc-item__image" src="<?php echo esc_url($settings['stylistteam_image']['url'], 'teamcard');?>" alt="<?php the_title_attribute( );?>">
    <figcaption class="mc-item__caption extraContentBox">
     <div class="stylistteam_heading_paragarph">
        <h3> <?php echo esc_html__($title,'stylistteam');?> </h3>
        <p><?php echo esc_html__($designation,'stylistteam');?> </p>
        <div class="social_icon">
        <?php
          foreach($stylistteam_icon_label_link as $social) {
          if (!empty( $social ) ) {
            $this->add_link_attributes( 'stylistteam_icon_link', $social['stylistteam_icon_link'] );
                }
              ?>
              <a <?php echo $this->get_render_attribute_string( 'stylistteam_icon_link' ); ?>>
            <i class="<?php echo esc_attr($social['stylistteam_icon']['value']);?>"></i>
          </a>
        <?php 
          }
        ?>
        </div>
      </div>
    </figcaption>
  </figure>
</div>
<!-- flip Out Down Area End Here -->