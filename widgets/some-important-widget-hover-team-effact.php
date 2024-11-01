<?php
/**
 * Stylist Team Card For Elementor
 *
 * Elementor widget for Stylist Team Card.
 *
 * @since 1.0.0
 */
class StylistTeam_Card extends \Elementor\Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'improtant-card';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'External Team Card', 'ele-somewidget' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-person';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'ele-some-important-cat' ];
	}

	public function get_style_depends() {
		return [ 'stylist-team-main-style','stylist-team-mocassin-r-style','stylist-team-reset-style' ];
	}
	public function get_script_depends() {
		return [ 'team-mocassin-min-js' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'ele-somewidget' ),
			]
		);

		//Start StylistTeam Style Choose
		$this->add_control(
			'layout_select_style',
			[
				'label' => esc_html__( 'Team Style', 'ele-somewidget' ),
				'type' =>\Elementor\Controls_Manager::SELECT,
				'options' => [
					'style1' => esc_html__( '1-Fade In', 'ele-somewidget' ),
					'style2' => esc_html__( '2-Slide In Up', 'ele-somewidget' ),
					'style3' => esc_html__( '3-Slide In Up Big', 'ele-somewidget' ),
					'style4' => esc_html__( '4-Slide In Up zoom In', 'ele-somewidget' ),
					'style5' => esc_html__( '5-Slide In Up Big zoom In', 'ele-somewidget' ),
					'style6' => esc_html__( '6-Flip Out Up', 'ele-somewidget' ),
					'style7' => esc_html__( '7-Flip Out Down', 'ele-somewidget' ),
					'style8' => esc_html__( '8-Flip Out Left', 'ele-somewidget' ),
					'style9' => esc_html__( '9-Flip Out Right', 'ele-somewidget' ),
					'style10' => esc_html__( '10-SlideInUpBig zoomOut', 'ele-somewidget' ),
					'style11' => esc_html__( '11-SlideInDownBig zoomOut', 'ele-somewidget' ),
					'style12' => esc_html__( '12-slideInLeftBig zoomOut', 'ele-somewidget' ),
					'style13' => esc_html__( '13-slideInRightBig zoomOut', 'ele-somewidget' ),
					'style14' => esc_html__( '14-slide In Left Half', 'ele-somewidget' ),
					'style15' => esc_html__( '15-slide In Right Half', 'ele-somewidget' ),
					'style16' => esc_html__( '16-zoomOut', 'ele-somewidget' ),
					'style17' => esc_html__( '17-zoomOutUp', 'ele-somewidget' ),
				],
				'default' => 'style1',
			]
		);
		//end StylistTeam Style Choose

		//Start StylistTeam Image Selecte Choose
		$this->add_control(
			'stylistteam_image',
			[
				'label' => esc_html__( 'Team Image', 'ele-somewidget' ),
				'type' =>\Elementor\Controls_Manager::MEDIA,
				'description' => esc_html__( 'Upload Better Size 400px*444px' ),
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		//end StylistTeam Image Selecte Choose

		//start StylistTeam Title
		$this->add_control(
			'stylistteam_title',
			[
				'label' => esc_html__( 'Name', 'ele-somewidget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' =>esc_html__( 'John Doe', 'ele-somewidget' ),
			]
		);

		//start StylistTeam Designation
		$this->add_control(
			'stylistteam_designation',
			[
				'label' => esc_html__( 'Designation ', 'ele-somewidget' ),
				'type' =>\Elementor\Controls_Manager::TEXT,
				'default' =>esc_html__( 'Web Designer', 'ele-somewidget' ),
			]
		);


		//start StylistTeam Icon Repetart Section

		//start StylistTeam Social Icon
	    $repeater = new \Elementor\Repeater();
	    $repeater->add_control(
			'stylistteam_icon_label',
			[
				'label' => esc_html__('Icon label', 'ele-somewidget'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Facebook', 'ele-somewidget'),
				'placeholder' => esc_html__('Type your icon name here', 'ele-somewidget'),
				'separator' => 'before',
			]
		);

	    $repeater->add_control(
			'stylistteam_icon',
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
			'stylistteam_icon_link', [
				'label' => esc_html__('Social Link', 'ele-somewidget'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__('#', 'ele-somewidget'),
				'default' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				],
			]
		);

		$this->add_control(
			'stylistteam_icon_label_link',
			[
				'label' => esc_html__('Social Icon', 'ele-somewidget'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'stylistteam_icon_label' => esc_html__('Facebook', 'ele-somewidget'),
						'stylistteam_icon_link' => 'https://www.facebook.com',
						'stylistteam_icon' => [
							'value' => 'eicon-facebook',
							'library' => 'fa-solid',
						],
					],
					[
						'stylistteam_icon_label' => esc_html__('Twitter', 'ele-somewidget'),
						'stylistteam_icon_link' => 'https://www.twitter.com',
						'stylistteam_icon' => [
							'value' => 'eicon-twitter',
							'library' => 'fa-solid',
						],
					],
					[
						'stylistteam_icon_label' => esc_html__('Instagram', 'ele-somewidget'),
						'stylistteam_icon_link' => 'https://www.instagram.com',
						'stylistteam_icon' => [
							'value' => ' eicon-instagram-post',
							'library' => 'fa-solid',
						],
					],
					[
						'stylistteam_icon_label' => esc_html__('Pinterest', 'ele-somewidget'),
						'stylistteam_icon_link' => 'https://www.pinterest.com',
						'stylistteam_icon' => [
							'value' => 'eicon-pinterest',
							'library' => 'fa-solid',
						],
					],					
				],

				'title_field' => '{{{ stylistteam_icon_label }}}',
				'separator' => 'before',
				'condition' => array(
					'layout_select_style!' => ['style2','style2','style4','style16','style17'],
				),
			]
		);

		$this->end_controls_section();
		//end StylistTeam Social Icon


		//start StylistTeam Image Style
		$this->start_controls_section(
			'stylistteam_img_style',
			[
				'label' => esc_html__( 'Image', 'ele-somewidget' ),
				'tab' =>\Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'stylistteam_img_size',
			[
				'label' => esc_html__( 'Image Size', 'ele-somewidget' ),
				'type'  => \Elementor\Controls_Manager::SLIDER,
				'size_units'  =>['px','%','em'],
				'range'  => [
                    'px' => [
                        'min'   => 10,
                        'max'   => 440,
                    ],
                ],
				'selectors' => [
					'{{WRAPPER}} img'  => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}',
				],
				'default' => [
					'unit' => '%'
				]


			]
		);

		$this->end_controls_section();
		//end StylistTeam Image Style

		//start StylistTeam title Style
		$this->start_controls_section(
			'title_section_style',
			[
				'label' => esc_html__( 'Title', 'ele-somewidget' ),
				'tab' =>\Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		//title color
		$this->add_control(
			'stylistteam_title_color',
			[
				'label' => esc_html__( 'Color', 'ele-somewidget' ),
				'type' =>\Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} h3' => 'color: {{VALUE}}',
				],
			]
		);

		//title typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography:: get_type(),
			[
				'name'     => 'stylistteam_title_typo',
				'label'    => esc_html__( 'Typography', 'ele-somewidget' ),
				'selector' => '{{WRAPPER}} h3',
			]
		);

		$this->end_controls_section();
		//end StylistTeam title Style

		//start StylistTeam designation Style
		$this->start_controls_section(
			'designation_section_style',
			[
				'label' => esc_html__( 'Designation', 'ele-somewidget' ),
				'tab' =>\Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		//designation color
		$this->add_control(
			'stylistteam_designation_color',
			[
				'label' => esc_html__( 'Color', 'ele-somewidget' ),
				'type' =>\Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} p' => 'color: {{VALUE}}',
				],
			]
		);

		//designation typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography:: get_type(),
			[
				'name'     => 'stylistteam_designation_typo',
				'label'    => esc_html__( 'Typography', 'ele-somewidget' ),
				'selector' => '{{WRAPPER}} p',
			]
		);

		$this->end_controls_section();
		//end StylistTeam title Style

		//start StylistTeam designation Style
		$this->start_controls_section(
			'icon_section_style',
			[
				'label' => esc_html__( 'Social Icon', 'ele-somewidget' ),
				'tab' =>\Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		//social icon color
		$this->add_control(
			'stylistteam_icon_color',
			[
				'label' => esc_html__( 'Color', 'ele-somewidget' ),
				'type' =>\Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} p' => 'color: {{VALUE}}',
				],
			]
		);

		//social icon Size
		$this->add_responsive_control(
			'stylistteam_icon_size',
			[
				'label' => esc_html__( 'Size', 'ele-somewidget' ),
				'type'  => \Elementor\Controls_Manager::SLIDER,
				'size_units'  =>['px','%','em'],
				'range'  => [
                    'px' => [
                        'min'   => 22,
                        'max'   => 50,
                    ],
                ],
				'selectors' => [
					'{{WRAPPER}} i'  => 'font-size: {{SIZE}}{{UNIT}}',
				],
				'default' => [
					'unit' => 'px'
				]

			]
		);
		

		$this->end_controls_section();
		//end StylistTeam title Style

		//start Box Style
		$this->start_controls_section(
			'box_hover_section_style',
			[
				'label' => esc_html__( 'Box', 'ele-somewidget' ),
				'tab' =>\Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		//Box Hover color
		$this->add_control(
			'stylistteam_box_hover_color',
			[
				'label' => esc_html__( 'Hover Color', 'ele-somewidget' ),
				'type' =>\Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mc-item .mc-item__caption' => 'background-color: {{VALUE}} !important',
				],
			]
		);

		$this->end_controls_section();
		//end StylistTeam title Style
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		$select_style = $settings['layout_select_style'];
		$title = $settings['stylistteam_title'];
		$designation = $settings['stylistteam_designation'];
		$stylistteam_icon_label_link = $settings['stylistteam_icon_label_link'];
		
		switch ($select_style) {
			case "style1":
				include( __DIR__ . '/item-style/team-style-1.php' );
				break;
			case "style2":
				include( __DIR__ . '/item-style/team-style-2.php' );
				break;
			case "style3":
				include( __DIR__ . '/item-style/team-style-3.php' );
				break;
			case "style4":
				include( __DIR__ . '/item-style/team-style-4.php' );
				break;
			case "style5":
				include( __DIR__ . '/item-style/team-style-5.php' );
				break;
			case "style6":
				include( __DIR__ . '/item-style/team-style-6.php' );
				break;
			case "style7":
				include( __DIR__ . '/item-style/team-style-7.php' );
				break;
			case "style8":
				include( __DIR__ . '/item-style/team-style-8.php' );
				break;
			case "style9":
				include( __DIR__ . '/item-style/team-style-9.php' );
				break;						
			case "style10":
				include( __DIR__ . '/item-style/team-style-10.php' );
				break;	
			case "style11":
				include( __DIR__ . '/item-style/team-style-11.php' );
				break;
			case "style12":
				include( __DIR__ . '/item-style/team-style-12.php' );
				break;
			case "style13":
				include( __DIR__ . '/item-style/team-style-13.php' );
				break;
			case "style14":
				include( __DIR__ . '/item-style/team-style-14.php' );
				break;	
			case "style15":
				include( __DIR__ . '/item-style/team-style-15.php' );
				break;
			case "style16":
				include( __DIR__ . '/item-style/team-style-16.php' );
				break;	
			case "style17":
				include( __DIR__ . '/item-style/team-style-17.php' );
				break;		
			default:
			include( __DIR__ . '/item-style/team-style-1.php' );
			}		
	}
}