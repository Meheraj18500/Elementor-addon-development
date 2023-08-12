<?php
class Meheraj_Testimonial_Addon extends \Elementor\Widget_Base {

    public function get_name() {
		return 'meheraj_testimonial_addon';
	}

	public function get_title() {
		return esc_html__( 'Testimonial Addon', 'meheraj-addon' );
	}

	public function get_icon() {
		return 'far fa-address-card';
	}

	public function get_categories() {
		return [ 'meheraj_widget' ];
	}

	public function get_keywords() {
		return [ 'testimonial', 'meheraj' ];
	}

    protected function register_controls() {

		// Testimonial Tab Start
        $this->start_controls_section(
			'meheraj_testimonial_tab',
			[
				'label' => esc_html__( 'Testimonial', 'meheraj-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		
        $meheraj_testimonial = new \Elementor\Repeater();

		$meheraj_testimonial->add_control(
			'client_image',
			[
				'label' => esc_html__( 'Client Image', 'meheraj-addon' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$meheraj_testimonial->add_control(
			'client_name',
			[
				'label' => esc_html__( 'Client Name', 'meheraj-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter Name', 'meheraj-addon' ),
				'label_block' => true,
			]
		);

		$meheraj_testimonial->add_control(
			'client_designation',
			[
				'label' => esc_html__( 'Designation', 'meheraj-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter Designation', 'meheraj-addon' ),
				'label_block' => true,
			]
		);

		$meheraj_testimonial->add_control(
			'testimonial_text',
			[
				'label' => esc_html__( 'Testimonial Text', 'meheraj-addon' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Write here...', 'meheraj-addon' ),
				'label_block' => true,
			]
		);

		// Repeater
		$this->add_control(
			'testimonial_list',
			[
				'label' => esc_html__( 'All Testimonial', 'meheraj-addon' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $meheraj_testimonial->get_controls(),
				'title_field' => '{{{ client_name }}}',
			]
		);
		$this->end_controls_section();
		// Repeater Testimonial End
		// Testimonial Tab End
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		
		$html .= '<div class="testimonial-section">
			<div class="testimonial-card">
				<div class="testimonial-text">
					<!-- Testimonial Text Here -->
				</div>
				<div class="testimonial-client-info">
					<div class="client-img">
						<!-- Client img -->
					</div>
					<div class="client-content">
						<h3 class="client-name"></h3>
						<span class="client-designation"></span>
					</div>
				</div>
			</div>
		</div>'
	}


}
?>