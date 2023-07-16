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
		return [ 'basic' ];
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
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);
		$this->end_controls_section();
		// Content Tab End

        // Socaial link Tab Start
        $this->start_controls_section(
			'social_link_tab',
			[
				'label' => esc_html__( 'Social Link', 'meheraj-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'meheraj_list',
			[
				'label' => esc_html__( 'Social Link', 'meheraj-addon' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'list_title',
						'label' => esc_html__( 'Title', 'meheraj-addon' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'Enter Title' , 'meheraj-addon' ),
						'label_block' => true,
					],
					[
						'name' => 'social_icon',
						'label' => esc_html__( 'Icon', 'meheraj-addon' ),
						'type' => \Elementor\Controls_Manager::ICONS,
						'label_block' => true,
					],
                    [
						'name' => 'social_link',
						'label' => esc_html__( 'Link', 'meheraj-addon' ),
						'type' => \Elementor\Controls_Manager::URL,
						'label_block' => true,
					],
                    [
						'name' => 'icon_color',
						'label' => esc_html__( 'Color', 'meheraj-addon' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} {{CURRENT_ITEM}}' => 'color: {{VALUE}}'
						],
					]
				],
				'default' => [
					[
						'list_title' => esc_html__( 'Facebook', 'meheraj-addon' ),
						'social_icon' => 'fab fa-facebook-f',
						'social_link' => 'https://www.facebook.com/',
					],
					[
						'list_title' => esc_html__( 'Linked In', 'meheraj-addon' ),
						'social_icon' => 'fab fa-linkedin-in',
						'social_link' => 'https://www.linkedin.com/',
					],
					[
						'list_title' => esc_html__( 'Instagram', 'meheraj-addon' ),
						'social_icon' => 'fab fa-instagram',
						'social_link' => 'https://www.instagram.com/',
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);
		$this->end_controls_section();
        // Social link Tab End


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

		<div class="meheraj-team-card">
			<?php if(array_key_exists('member_image', $settings) && !empty($settings['member_image']['id'])) : ?>
			<div class="meheraj-team-image">
				<?php echo wp_get_attachment_image( $settings['member_image']['id'], 'large' ) ?>
			</div>
			<?php endif ?>
			<div class="meheraj-team-content">
				<?php if(array_key_exists('name', $settings) && !empty($settings['name'])) : ?>
				<h1><?php echo $settings['name']; ?></h1>
				<?php endif ?>
				<?php if(array_key_exists('designation', $settings) && !empty($settings['designation'])) : ?>
				<h4><?php echo $settings['designation']; ?></h4>
				<?php endif ?>

				<?php if(array_key_exists('meheraj_list', $settings) && !empty($settings['meheraj_list'])) : ?>
				<ul class="social-link">
					<?php foreach($settings['meheraj_list'] as $social) : 
						$is_external = $social['meheraj_list']['is_external'] == 'on' ? 'target="_blank"' : '';
					?>
					
					<li><a href="<?php echo $social['social_link']['url']; ?>" target="<?php echo $is_external ?>"><i class="<?php echo $social['social_icon']['value']; ?>"></i></a></li>
					<?php endforeach ?>
				</ul>
				<?php endif ?>
			</div>
			<div class="meheraj-team-overlay">

			</div>
		</div>

		<?php
	}
}