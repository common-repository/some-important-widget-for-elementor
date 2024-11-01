<?php
/**
 * EWA Elementor Heading Widget.
 *
 * Elementor widget that inserts heading into the page
 *
 * @since 1.0.0
 */
class Image_Hover_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve heading  widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'image-hover-effect';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve heading widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'External Image Hover', 'ele-somewidget' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve heading  widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-image-rollover';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the heading widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'ele-some-important-cat' ];
	}

	/**
	 * Register heading widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		
		// start of the Content tab section
	   $this->start_controls_section(
	       'content-section',
		    [
		        'label' => esc_html__('Content','ele-somewidget'),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
		   
		    ]
	    );
		
		// hovereff Card Layout
		$this->add_control(
			'hovereff_layout',
			[
				'label' => esc_html__( 'Select Layout', 'ele-somewidget' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'pack-style-1',
				'options' => [
					'pack-style-1' => esc_html__( 'Style 1', 'ele-somewidget' ),
					'pack-style-2' => esc_html__( 'Style 2', 'ele-somewidget' ),
					'pack-style-3' => esc_html__( 'Style 3', 'ele-somewidget' ),
					'pack-style-4' => esc_html__( 'Style 4', 'ele-somewidget' ),
					'pack-style-5' => esc_html__( 'Style 5', 'ele-somewidget' ),
					'pack-style-6' => esc_html__( 'Style 6', 'ele-somewidget' ),
					'pack-style-7' => esc_html__( 'Style 7', 'ele-somewidget' ),					
				],
			]
		);

		// hovereff Image
		$this->add_control(
			'hovereff_image',
			[
				'label' => esc_html__( 'Choose Image', 'ele-somewidget' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'separator' => 'before',
				'description' => 'Image size 400px x 420px would be best',
			]
		);		
		
		$this->end_controls_section();
		// end of the Content tab section


		// Start of Style tab section

		// hovereff Image For Style Tab
		$this->start_controls_section(
			'hovereff_image_section',
			[
				'label' => esc_html__( 'Image', 'ele-somewidget' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// hovereff Image Width For Style Tab
		$this->add_control(
			'hovereff_image_width',
			[
				'label' => esc_html__( 'Width', 'ele-somewidget' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				
				'selectors' => [
					'{{WRAPPER}} img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// hovereff Image Height For Style Tab
		$this->add_control(
			'hovereff_image_height',
			[
				'label' => esc_html__( 'Height', 'ele-somewidget' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				
				'selectors' => [
					'{{WRAPPER}} img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);		

		$this->end_controls_section();	

		// End of The Style Of The Style Section

	}

	/**
	 * Render heading  widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		// get our input from the widget settings.
		$settings = $this->get_settings_for_display();	
		$hovereff_layout = $settings['hovereff_layout'];
		$hovereff_image = $settings['hovereff_image'];

		switch ($hovereff_layout) {
			case "pack-style-1":
				include( __DIR__ . '/image-hover-effect-parts/pack-style-1.php' );
				break;
			case "pack-style-2":
				include( __DIR__ . '/image-hover-effect-parts/pack-style-2.php' );
				break;
			case "pack-style-3":
				include( __DIR__ . '/image-hover-effect-parts/pack-style-3.php' );
				break;
			case "pack-style-4":
				include( __DIR__ . '/image-hover-effect-parts/pack-style-4.php' );
				break;
			case "pack-style-5":
				include( __DIR__ . '/image-hover-effect-parts/pack-style-5.php' );
				break;
			case "pack-style-6":
				include( __DIR__ . '/image-hover-effect-parts/pack-style-6.php' );
				break;
			case "pack-style-7":
				include( __DIR__ . '/image-hover-effect-parts/pack-style-7.php' );
				break;	

			default:
			include( __DIR__ . '/image-hover-effect-parts/pack-style-1.php' );
		}
	}
}