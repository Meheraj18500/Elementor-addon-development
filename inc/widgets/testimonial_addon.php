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

		// Carousel
		$this->add_control(
			'testimonial_carousel',
			[
				'label' => esc_html__( 'Carousel', 'meheraj-addon' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'no',
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
		

		if($settings['testimonial_carousel'] == 'yes'){
			?> 
			<script>
				jQuery(document).ready(function(){
					jQuery('.testimonial-section').slick({
						slidesToShow: 3,
						dots: true,
						autoplay: true,
  						autoplaySpeed: 1000,
					});
				});
			</script>
			<?php
		}

		?>

		<div class="testimonial-section testimonial-section-<?php echo $settings['testimonial_carousel']; ?>">

			<?php foreach($settings['testimonial_list'] as $testimonial) : ?>
			<div class="content-wrapper">
				<div class="testimonial-card">
					<div class="testimonial-text">
						<!-- Testimonial Text Here -->
						<?php if(array_key_exists('testimonial_text', $testimonial) && !empty($testimonial['testimonial_text'])) : ?>
						<p class="testimonial">"<?php echo $testimonial['testimonial_text']; ?>"</p>
						<?php endif ?>
					</div>
					<div class="testimonial-client-info">
						<div class="client-img">
							<!-- Client img -->
							<?php if(array_key_exists('client_image', $testimonial) && !empty($testimonial['client_image'])) : ?>
							<?php echo wp_get_attachment_image( $testimonial['client_image']['id'], 'large' ) ?>
							<?php endif ?>
						</div>
						<div class="client-content">
							<?php if(array_key_exists('client_name', $testimonial) && !empty($testimonial['client_name'])) : ?>
							<h3 class="client-name"><?php echo $testimonial['client_name']; ?></h3>
							<?php endif ?>

							<?php if(array_key_exists('client_designation', $testimonial) && !empty($testimonial['client_designation'])) : ?>
							<span class="client-designation"><?php echo $testimonial['client_designation']; ?></span>
							<?php endif ?>
							
						</div>
					</div>
				</div>
			</div>
			<?php endforeach ?>

		</div>
		<?php
	}
}
?>