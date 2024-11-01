<!-- start button  -->       
<div class="cayrus-single-button align-items-center">
  <ul>
    <?php 
      if (!empty( $button_link ) ) {
      $this->add_link_attributes( 'button_link', $settings['button_link'] );
      }
     ?>
    <a <?php echo $this->get_render_attribute_string( 'button_link' ); ?>>
      <li class="btn_text"><?php echo esc_html($button_text);?> 
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </li>
    </a>
  </ul>
</div>      
<!-- end button -->