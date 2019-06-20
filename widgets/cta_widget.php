<?php
namespace CIOOS\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Call_To_Action_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve heading widget name.
	 *
	 * @since 0.1.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
    public function get_name() { return 'cta_widget'; }

	/**
	 * Get widget title.
	 *
	 * Retrieve heading widget title.
	 *
	 * @since 0.1.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() { return __('Call to Action Widget', 'cioos-plugin'); }

	/**
	 * Get widget icon.
	 *
	 * Retrieve heading widget icon.
	 *
	 * @since 0.1.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() { return 'fa fa-birthday-cake'; }

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the heading widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * @since 0.1.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
    public function get_categories() { return [ 'CIOOS' ]; }

	/**
	 * Register heading widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 0.1.0
	 * @access protected
	 */
	protected function _register_controls() {
        // 
        // Body Section
        // 
        $this->start_controls_section(
            'section_body',
            [
                'label' => __( 'Body Text', 'CIOOS-plugin' )
            ]
        );
        $this->add_control(
            'body_text',
            [
                'label' => __( 'Body Text', 'CIOOS-plugin'),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => __( 'Enter your text', 'CIOOS-plugin' ),
                'default' => __( 'Enter your text', 'CIOOS-plugin' )
            ]
        );
        $this->end_controls_section();

        // 
        // Button 1 Section 
        // 
        $this->start_controls_section(
            'section_button_left',
            [
                'label' => __('Left Button', 'CIOOS-plugin')
            ]
        );
        $this->add_control(
            'button_left_text',
            [
                'label' => __( 'Text', 'CIOOS-plugin'),
                'type' => Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => __( 'Click here', 'CIOOS-plugin' ),
                'placeholder' => __( 'Click here', 'CIOOS-plugin' ),
            ]
        );
		$this->add_control(
			'button_left_link',
			[
				'label' => __( 'Link', 'CIOOS-plugin' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'https://your-link.com', 'CIOOS-plugin' ),
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);
		$this->add_control(
			'button_left_css_id',
			[
				'label' => __( 'Button ID', 'CIOOS-plugin' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => '',
				'title' => __( 'Add your custom id WITHOUT the Pound key. e.g: my-id', 'CIOOS-plugin' ),
				'label_block' => false,
				'description' => __( 'Please make sure the ID is unique and not used elsewhere on the page this form is displayed. This field allows <code>A-z 0-9</code> & underscore chars without spaces.', 'CIOOS-plugin' ),
				'separator' => 'before',
			]
		);
        $this->end_controls_section();

        // 
        // Button 2 Section 
        // 
        $this->start_controls_section(
            'section_button_right',
            [
                'label' => __('Right Button', 'CIOOS-plugin')
            ]
        );
        $this->add_control(
            'button_right_text',
            [
                'label' => __( 'Text', 'CIOOS-plugin'),
                'type' => Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => __( 'Click here', 'CIOOS-plugin' ),
                'placeholder' => __( 'Click here', 'CIOOS-plugin' ),
            ]
        );
		$this->add_control(
			'button_right_link',
			[
				'label' => __( 'Link', 'CIOOS-plugin' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'https://your-link.com', 'CIOOS-plugin' ),
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);
		$this->add_control(
			'button_right_css_id',
			[
				'label' => __( 'Button ID', 'CIOOS-plugin' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => '',
				'title' => __( 'Add your custom id WITHOUT the Pound key. e.g: my-id', 'CIOOS-plugin' ),
				'label_block' => false,
				'description' => __( 'Please make sure the ID is unique and not used elsewhere on the page this form is displayed. This field allows <code>A-z 0-9</code> & underscore chars without spaces.', 'CIOOS-plugin' ),
				'separator' => 'before',
			]
		);
        $this->end_controls_section();
	}
	
	/**
	 * Render heading widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 0.1.0
	 * @access protected
	 */
	protected function render() { 
		$settings = $this->get_settings_for_display();
		$target_btn_left = $settings['button_left_link']['is_external'] ? ' target="_blank"' : '';
		$target_btn_right = $settings['button_right_link']['is_external'] ? ' target="_blank"' : '';
		?>
		<div class="elementor-container elementor-column-gap-default">
			<div class="elementor-row">
				<div class="elementor-element elementor-element-8456769 elementor-column elementor-col-100 elementor-top-column" data-id="8456769" data-element_type="column">
					<div class="elementor-column-wrap  elementor-element-populated">
						<div class="elementor-widget-wrap">
							<div class="elementor-element elementor-element-c636c7e elementor-widget elementor-widget-text-editor" data-id="c636c7e" data-element_type="widget" data-widget_type="text-editor.default">
								<div class="elementor-widget-container">
									<div class="elementor-text-editor elementor-clearfix"><p>
										<?php echo __($settings['body_text'], 'CIOOS-plugin'); ?>
									</p></div>
								</div>
							</div>
							<section class="elementor-element elementor-element-17a7ece elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-inner-section" data-id="17a7ece" data-element_type="section">
								<div class="elementor-container elementor-column-gap-default">
									<div class="elementor-row">
										<div class="elementor-element elementor-element-0e5e18f elementor-column elementor-col-50 elementor-inner-column" data-id="0e5e18f" data-element_type="column">
											<div class="elementor-column-wrap  elementor-element-populated">
												<div class="elementor-widget-wrap">
													<div class="elementor-element elementor-element-4583024 elementor-align-center elementor-widget elementor-widget-button" data-id="4583024" data-element_type="widget" data-widget_type="button.default">
														<div class="elementor-widget-container">
															<div class="elementor-button-wrapper">
																<a href="<?php echo __($settings['button_left_link']['url'], 'CIOOS-plugin'); ?>" <?php echo($target_btn_left)  ?> class="elementor-button-link elementor-button elementor-size-md" role="button" id="<?php echo __($settings['button_left_css_id'], 'CIOOS-plugin'); ?>">	
																	<span class="elementor-button-content-wrapper">
																		<span class="elementor-button-text">
																			<?php echo __($settings['button_left_text'], 'CIOOS-plugin'); ?>
																		</span>
																	</span>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="elementor-element elementor-element-b943054 elementor-column elementor-col-50 elementor-inner-column" data-id="b943054" data-element_type="column">
											<div class="elementor-column-wrap  elementor-element-populated">
												<div class="elementor-widget-wrap">
													<div class="elementor-element elementor-element-2283cf7 elementor-align-center elementor-widget elementor-widget-button" data-id="2283cf7" data-element_type="widget" data-widget_type="button.default">
														<div class="elementor-widget-container">
															<div class="elementor-button-wrapper">
																<a href="<?php echo __($settings['button_right_link']['url'], 'CIOOS-plugin'); ?>" <?php echo($target_btn_right) ?> class="elementor-button-link elementor-button elementor-size-md" role="button" id="<?php echo __($settings['button_right_css_id'], 'CIOOS-plugin'); ?>">
																	<span class="elementor-button-content-wrapper">
																		<span class="elementor-button-text">
																			<?php echo __($settings['button_right_text'], 'CIOOS-plugin'); ?>
																		</span>
																	</span>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</section>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}

	/**
	 * Render heading widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 0.1.0
	 * @access protected
	 */
	// protected function _content_template() {}
}
?>