<?php
class Meheraj_Testimonial_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'meheraj_testimonial_widget';
	}

	public function get_title() {
		return esc_html__( 'Testimonial', 'meheraj-addon' );
	}

	public function get_icon() {
		return 'far fa-address-card';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'testimonial', 'meheraj' ];
	}

	protected function register_controls() {

        // Start Testimonial Tab
        $this->start_controls_section(
			'member_content_tab',
			[
				'label' => esc_html__( 'Testimonial', 'meheraj-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        // Testimonial Repeater
        $this->add_control(
			'meheraj_testimonial',
			[
				'label' => esc_html__( '', 'meheraj-addon' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
                    [
						'name' => 'clint_image',
						'label' => esc_html__( 'Image', 'meheraj-addon' ),
						'type' => \Elementor\Controls_Manager::MEDIA,
						'label_block' => true,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
					],
					[
						'name' => 'clint_name',
						'label' => esc_html__( 'Name', 'meheraj-addon' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'Enter Name' , 'meheraj-addon' ),
						'label_block' => true,
					],
                    [
						'name' => 'clint_designation',
						'label' => esc_html__( 'Designation', 'meheraj-addon' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'Enter Designation' , 'meheraj-addon' ),
						'label_block' => true,
					],
                    [
						'name' => 'clint_description',
						'label' => esc_html__( 'Description', 'meheraj-addon' ),
						'type' => \Elementor\Controls_Manager::TEXTAREA,
						'default' => esc_html__( 'Enter Description' , 'meheraj-addon' ),
						'label_block' => true,
					],
				],
				'default' => [
					[
						'clint_name' => esc_html__( 'Meheraj', 'meheraj-addon' ),
						'clint_designation' => esc_html__( 'Web Developer', 'meheraj-addon' ),
						'clint_description' => esc_html__( 'Lorem, ipsum dolor sit amet consectetur adipisicing elit.', 'meheraj-addon' ), 
					],
				],
				'title_field' => '{{{ clint_name }}}',
			]
		);
        $this->end_controls_section();
		// End Testimonial

		// Style Tab Start
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title Color', 'meheraj-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Text Color', 'meheraj-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .description_content' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();
		// Style Tab End

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

		<!-- <pre> <?php //var_dump($settings); ?> </pre> -->

		<?php
	}
}