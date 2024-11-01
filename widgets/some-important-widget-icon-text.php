<?php
/**
 * EWA Elementor Heading Widget.
 *
 * Elementor widget that inserts heading into the page
 *
 * @since 1.0.0
 */
class Ele_Some_Widget_Icon_Text extends \Elementor\Widget_Base {

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
		return 'some-important-widget-icon-text';
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
		return esc_html__('External Icon Text', 'ele-somewidget' );
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
		return 'eicon-loop-builder';
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

	    // Start Icon And Text Style Select
		$this->add_control(
			'icon_text_layout',
			[
				'label' => esc_html__('Select Style', 'ele-somewidget'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'icon-style-1',
				'options' => [
					'icon-style-1' => esc_html__('Icon Style 1', 'ele-somewidget'),
				],
			]
		);
		// End Icon And Text Style Select


		// Start Icon And Text Repetart Section
	    $repeater = new \Elementor\Repeater();

	    $repeater->add_control(
			'icon_text_one',
			[
				'label' => esc_html__('Fast Text', 'ele-somewidget'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Facebook', 'ele-somewidget'),
				'placeholder' => esc_html__('Type your icon name here', 'ele-somewidget'),
				'separator' => 'before',
			]
		);
		$repeater->add_control(
			'icon_text_two',
			[
				'label' => esc_html__('second Text', 'ele-somewidget'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Facebook', 'ele-somewidget'),
				'placeholder' => esc_html__('Type your icon name here', 'ele-somewidget'),
				'separator' => 'before',
			]
		);

	    $repeater->add_control(
			'icon_text_icon',
			[
				'label' => esc_html__('Social Icon', 'ele-somewidget'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-twitter',
					'library' => 'solid',
				],
				'fa4compatibility' => 'icon',
			]
		);
		

		$repeater->add_control(
			'icon_text_link', [
				'label' => esc_html__('Social Link', 'ele-somewidget'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__('https://your-link.com', 'ele-somewidget'),
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				],
			]
		);

		$this->add_control(
			'icon_and_text',
			[
				'label' => esc_html__('Icon And Text', 'ele-somewidget'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'icon_text_one' => esc_html__('Text One', 'ele-somewidget'),
						'icon_text_two' => esc_html__('Text Two', 'ele-somewidget'),
						'icon_text_link' => 'https://www.facebook.com',
						'icon_text_icon' => [
							'value' => 'eicon-facebook',
							'library' => 'fa-solid',
						],
					],
					[
						'icon_text_one' => esc_html__('Text One', 'ele-somewidget'),
						'icon_text_two' => esc_html__('Text Two', 'ele-somewidget'),
						'icon_text_link' => 'https://www.twitter.com',
						'icon_text_icon' => [
							'value' => 'eicon-twitter',
							
						],
					],					
				],

				'title_field' => '{{{ icon_text_one }}}',
				'separator' => 'before',
			]
		);
		// End Icon And Text Repetart Section
		$this->end_controls_section();
		// end of the Content tab section


		// Start of The Style tab Section For -Icon- And Text Widget
		$this->start_controls_section(
	       'icon_text_style',
		    [
		        'label' => esc_html__('Icon','ele-somewidget'),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
		   
		    ]
	    );


	    //Icon Normarl Color For Icon And Text Widget
	    $this->add_control(
			'icon_text_n_color',
			[
				'label' => esc_html__('Normarl Color', 'ele-somewidget'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cayrus-icon-text-icon.icon_color_size_distance i' => 'color: {{VALUE}}',
				],
			]
		);

	    //Icon Hover Color For Icon And Text Widget
		$this->add_control(
			'icon_text_h_color',
			[
				'label' => esc_html__('Hover Color', 'ele-somewidget'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cayrus-icon-text-icon.icon_color_size_distance i:hover' => 'color: {{VALUE}}',
				],
			]
		);

		//Icon Distance For Icon And Text Widget
		$this->add_responsive_control(
			'icon_text_size',
			[
				'label' => esc_html__('Size', 'ele-somewidget'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 16,
				],
				'selectors' => [
					'{{WRAPPER}} .icon_color_size_distance' => 'font-size: {{SIZE}}px;',
				],
				'separator' => 'before',

			]
		);

		//Icon Distance For Icon And Text Widget
		$this->add_responsive_control(
			'icon_text_distance',
			[
				'label' => esc_html__('Distance To Text', 'ele-somewidget'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .icon_color_size_distance' => 'margin-right: {{SIZE}}px;',
				],
				'separator' => 'before',

			]
		);

		//Icon Distance For Icon And Text Widget
		$this->add_responsive_control(
			'icon_text_distance_top',
			[
				'label' => esc_html__('Distance To Top', 'ele-somewidget'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .one_two' => 'margin-top: {{SIZE}}px;',
				],
				'separator' => 'before',

			]
		);


	    $this->end_controls_section();
		// End of The Style tab Section For Icon And Text Widget Icon



		// Start of The Style tab Section For Icon And Text Widget Fast Text
		$this->start_controls_section(
	       'icon_text_one_text_style',
		    [
		        'label' => esc_html__('Fast Title','ele-somewidget'),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
		   
		    ]
	    );

	    //Fast Text Normal Color For Icon And Text Widget
		$this->add_control(
			'icon_text_one_text_n_color',
			[
				'label' => esc_html__('Normal Color', 'ele-somewidget'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cayrus-icon-text-text-one' => 'color: {{VALUE}}',
				],
			]
		);

		//Fast Text Hover Color For Icon And Text Widget
		$this->add_control(
			'icon_text_one_text_h_color',
			[
				'label' => esc_html__('Hover Color', 'ele-somewidget'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cayrus-icon-text-text-one:hover' => 'color: {{VALUE}}',
				],
			]
		);

		//One Text Typography For Icon And Text Widget 
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'icon_text_One_typography',
				'selector' => '{{WRAPPER}} .cayrus-icon-text-text-one',
			]
		);

	    $this->end_controls_section();
		// End of The Style tab Section For Icon And Text Widget Fast Text

		// Start of The Style tab Section For Icon And Text Widget Secend Text
		$this->start_controls_section(
	       'icon_text_two_text_style',
		    [
		        'label' => esc_html__('Secend Title','ele-somewidget'),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
		   
		    ]
	    );

	    //Fast Text Normal Color For Icon And Text Widget
		$this->add_control(
			'icon_text_two_text_n_color',
			[
				'label' => esc_html__('Normal Color', 'ele-somewidget'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cayrus-icon-text-text-two' => 'color: {{VALUE}}',
				],
			]
		);

		//Fast Text Hover Color For Icon And Text Widget
		$this->add_control(
			'icon_text_two_text_h_color',
			[
				'label' => esc_html__('Hover Color', 'ele-somewidget'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cayrus-icon-text-text-two:hover' => 'color: {{VALUE}}',
				],
			]
		);

		//Two Text Typography For Icon And Text Widget 
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'icon_text_two_typography',
				'selector' => '{{WRAPPER}} .cayrus-icon-text-text-two',
			]
		);


	    $this->end_controls_section();
		// End of The Style tab Section For Icon And Text Widget Secend Text




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
		$icon_text_layout = $settings['icon_text_layout'];	
		$icon_and_text = $settings['icon_and_text'];	

		switch ($icon_text_layout) {
			case "icon text-style-1":
				include( __DIR__ . '/parts/icon-text-style-1.php' );
				break;					
			default:
			include( __DIR__ . '/parts/icon-text-style-1.php' );
			}
	}
}