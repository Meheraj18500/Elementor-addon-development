<?php
class Meheraj_Team_Member_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'meheraj_team_member_widget';
	}

	public function get_title() {
		return esc_html__( 'Team Member', 'meheraj-addon' );
	}

	public function get_icon() {
		return 'fas fa-id-badge';
	}

	public function get_categories() {
		return [ 'meheraj_widget' ];
	}

	public function get_keywords() {
		return [ 'team', 'member', 'meheraj' ];
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
				],
				'label_block' => true,
			]
		);
		$this->end_controls_section();
		// Content Tab End

        // Social link Tab Start
        $this->start_controls_section(
			'social_link_tab',
			[
				'label' => esc_html__( 'Social Link', 'meheraj-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_title',
			[
				'label' => esc_html__( 'Name', 'meheraj-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Social Name' , 'meheraj-addon' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_icon',
			[
				'label' => esc_html__( 'Icon', 'meheraj-addon' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_link',
			[
				'label' => esc_html__( 'Link', 'meheraj-addon' ),
				'type' => \Elementor\Controls_Manager::URL,
				'label_block' => true,
			]
		);

		// Repeater Controls
		$this->add_control(
			'social_list',
			[
				'label' => esc_html__( 'Social Link', 'meheraj-addon' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ list_title }}}',
			]
		);
		$this->end_controls_section();
		// Social link Tab End
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>


		<div class="meheraj-team-card">
			<!-- Image Print -->
			<?php if(array_key_exists('member_image', $settings) && !empty($settings['member_image']['id'])) : ?>
			<div class="meheraj-team-image">
				<?php echo wp_get_attachment_image( $settings['member_image']['id'], 'large' ) ?>
			</div>
			<?php endif ?>

			<div class="meheraj-team-content">
				<!-- Title Print -->
				<?php if(array_key_exists('name', $settings) && !empty($settings['name'])) : ?>
				<h1><?php echo $settings['name']; ?></h1>
				<?php endif ?>

				<!-- Designation Print -->
				<?php if(array_key_exists('designation', $settings) && !empty($settings['designation'])) : ?>
				<h4><?php echo $settings['designation']; ?></h4>
				<?php endif ?>

				<!-- Social Link Print -->
				<?php if(array_key_exists('social_list', $settings) && !empty($settings['social_list'])) : ?>
				<ul class="social-link">

					<?php foreach($settings['social_list'] as $social) : ?>
					<li>
						<a href=" <?php echo $social['list_link']['url'];?> " target="_blank">
							<i class=" <?php echo $social['list_icon']['value'];?> "></i>
						</a>
					</li> 
					<?php endforeach ?>

				</ul>
				<?php endif ?>
				
			</div>
		</div>

		<?php
	}
}