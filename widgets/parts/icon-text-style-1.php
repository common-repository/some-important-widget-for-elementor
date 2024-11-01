<!-- sart Icon With Text -->
        <section class="icon_text_subtext">
            <ul class="cayrus-icon-list">
              <?php
                foreach($icon_and_text as $social) {
              ?>
              <li>
              <div class="cayrus-icon-text-icon icon_color_size_distance">
              <?php
                if (!empty( $social ) ) {
                  $this->add_link_attributes( 'icon_text_link', $social['icon_text_link'] );
                }
              ?>
              <a <?php echo $this->get_render_attribute_string( 'icon_text_link' ); ?>>
                <i class="<?php echo esc_attr($social['icon_text_icon']['value']);?>"></i>
                 </a>
                 </div> 
                 <div class="cayrus-icon-text-text-one one_two">                               
               <?php echo esc_html($social['icon_text_one']);?> 	          
                </div>
                <div class="cayrus-icon-text-text-two one_two"> 
               <?php echo esc_html($social['icon_text_two']);?>            
                </div>
              </li>
              <?php
                }
              ?> 
            </ul>
        </section>
        <!-- end Icon With Text -->
