<?php
/**
 * EWA Elementor Heading Widget.
 *
 * Elementor widget that inserts heading into the page
 *
 * @since 1.0.0
 */
class Ele_Some_Widget_Button extends \Elementor\Widget_Base {

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
		return 'some-important-widget-button';
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
		return esc_html__('External Button', 'ele-somewidget');
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
		return 'eicon-button';
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
		
		// Button Style
		$this->add_control(
			'button_style',
			[
				'label' => esc_html__('Select Style', 'ele-somewidget'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'button-style-1',
				'options' => [
					'button-style-1' => esc_html__('Button Style 1', 'ele-somewidget'),
				],
			]
		);

		// Button Text
		$this->add_control(
			'button_text',
			[
				'label' => esc_html__('Login', 'ele-somewidget'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Login', 'ele-somewidget'),
				'placeholder' => esc_html__('Type your button name', 'ele-somewidget'),
				'separator' => 'before',
				'label_block' => true
			]
		);		

		// Button Link
		$this->add_control(
			'button_link',
			[
				'label' => esc_html__('Button Link', 'ele-somewidget'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__('https://your-link.com', 'ele-somewidget'),
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => 'www.Facebook.com',
					'is_external' => true,
					'nofollow' => true,
				],
				'label_block' => true,
			]
		);
		
		$this->end_controls_section();
		// End of The Contatne tab Section


		// Start of The Style tab Section
		$this->start_controls_section(
	       'style_section',
		    [
		        'label' => esc_html__('Button','ele-somewidget'),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
		   
		    ]
	    );

	    //Start Normal And Hover
		$this->start_controls_tabs(
			'button_normal_hover_style'

		);

		//Start Button Normal Tab
		$this->start_controls_tab(
			'button_style_normal_tab',
			[
				'label' => esc_html__('Normal', 'ele-somewidget'),

			]
		);

		//Button Text Color For Normal
	    $this->add_control(
			'button_text_color_normal',
			[
				'label' => esc_html__('Text Color', 'ele-somewidget'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn_text' => 'color: {{VALUE}}',
				],
			]
		);

		//Button Background Color For Normal
	    $this->add_control(
			'button_text_bg_color_normal',
			[
				'label' => esc_html__('Backgournd Color', 'ele-somewidget'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn_text' => 'background: {{VALUE}}',
				],
			]
		);

	    //Button Border For Normal
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'button_border',
				'label' => esc_html__('Border', 'ele-somewidget'),
				'selector' => '{{WRAPPER}} .btn_text',
				'separator' => 'before',
			]
		);

		$this->end_controls_tab();
		//End Button Normal Tab

		//Start Button Hover Tab
		$this->start_controls_tab(
			'button_style_hover_tab',
			[
				'label' => esc_html__('Hover', 'ele-somewidget'),
			]
		);

		////Button Text Color For Hover
	    $this->add_control(
			'button_text_color_hover',
			[
				'label' => esc_html__('Text Color', 'ele-somewidget'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn_text:hover' => 'color: {{VALUE}}',
				],
			]
		);

	    //Button Background Color For Hover
		$this->add_control(
			'button_text_bg_color_hover',
			[
				'label' => esc_html__('Backgournd Color', 'ele-somewidget'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn_text span' => 'background-color: {{VALUE}}',
				],		
						
			]
		);

		$this->end_controls_tab();
		//End Button Hover Tab
		$this->end_controls_tabs();
		//End Normal And Hover

	    //Button With
		$this->add_responsive_control(
			'button_width',
			[
				'label' => esc_html__('Width', 'ele-somewidget'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range' => [
					
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 100,
				],
				'selectors' => [
					'{{WRAPPER}} .btn_text' => 'width: {{SIZE}}%;',
				],
				'separator' => 'before',

			]
		);


		//Button Hight
		$this->add_responsive_control(
			'button_hight',
			[
				'label' => esc_html__('Hight', 'ele-somewidget'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'em'],
				'range' => [
					
					'em' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'em',
					'size' => 3,
				],
				'selectors' => [
					'{{WRAPPER}} .btn_text' => 'line-height: {{SIZE}}em;',
				],
				'separator' => 'before',
			]
		);

		//Button Text Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_text_typography',
				'selector' => '{{WRAPPER}} .btn_text',
			]
		);

	    $this->end_controls_section();
		// End of The Style tab Section


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
		$button_style = $settings['button_style'];
		$button_text = $settings['button_text'];
		$button_link = $settings['button_link']['url'];		

		switch ($button_style) {
			case "button-style-1":
				include( __DIR__ . '/parts/button-style-1.php');
				break;					
			default:
			include( __DIR__ . '/parts/button-style-1.php');
			}
	}
}