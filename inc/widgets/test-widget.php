<?php
class Meheraj_Elementor_Test_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'meheraj_test_widget';
	}

	public function get_title() {
		return esc_html__( 'Test Widget', 'meheraj-addon' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'meheraj_widget' ];
	}

	public function get_keywords() {
		return [ 'test', 'widget' ];
	}

	protected function register_controls() {

        // Image Tab Start
        $this->start_controls_section(
			'member_image_tab',
			[
				'label' => esc_html__( 'Image', 'meheraj-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'member_image',
			[
				'label' => esc_html__( 'Choose Image', 'meheraj-addon' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->end_controls_section();
        // Image Tab End

		// Content Tab Start
		$this->start_controls_section(
			'member_content_tab',
			[
				'label' => esc_html__( 'Content', 'meheraj-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'name',
			[
				'label' => esc_html__( 'Name', 'meheraj-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Type Name Here', 'meheraj-addon' ),
                'label_block' => true,
                'placeholder' => esc_html__( 'Enter Name', 'meheraj-addon' ),
			]
		);

        $this->add_control(
			'designation',
			[
				'label' => esc_html__( 'Designation', 'meheraj-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Type Designation Here', 'meheraj-addon' ),
                'label_block' => true,
                'placeholder' => esc_html__( 'Enter Designation', 'meheraj-addon' ),
			]
		);

        $this->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'meheraj-addon' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Type Description Here', 'meheraj-addon' ),
                'label_block' => true,
                'placeholder' => esc_html__( 'Enter Description', 'meheraj-addon' ),
			]
		);

        $this->add_control(
			'profile_link',
			[
				'label' => esc_html__( 'Profile Link', 'meheraj-addon' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'Enter URL', 'meheraj-addon' ),
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);
		$this->end_controls_section();
		// Content Tab End

        

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

		<p class="description_content">
			<?php echo $settings['title']; ?>
		</p>

		<?php
	}
}