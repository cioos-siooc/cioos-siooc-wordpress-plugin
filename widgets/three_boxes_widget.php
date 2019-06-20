<?php
namespace CIOOS\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_color;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Three_Boxes_Widget extends \Elementor\Widget_Base {

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
    public function get_name() { return 'three_boxes_widget'; }

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
	public function get_title() { return __('Three Boxes Widget', 'cioos-plugin'); }

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
        // Background
        // 
        $this->start_controls_section(
            'background',
            [
                'label' => __('Background', 'CIOOS-plugin')
            ]
		);
		$this->add_control(
			'background_color',
            [
                'label' => __( 'Background Color', 'CIOOS-plugin'),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
					'type' => Scheme_color::get_type(),
					'value' => Scheme_color::COLOR_1,
                ],
			]
        );
        $this->end_controls_section();  
		
		// 
        // Titles
        // 
        $this->start_controls_section(
            'titles',
            [
                'label' => __('Titles', 'CIOOS-plugin')
            ]
		);
		$this->add_control(
		 	'title_left_text',
            [
                'label' => __( 'Text Title Left', 'CIOOS-plugin'),
                'type' => Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => __( 'Click here', 'CIOOS-plugin' ),
                'placeholder' => __( 'Click here', 'CIOOS-plugin' ),
			]
		);
		$this->add_control(
			'title_middle_text',
            [
                'label' => __( 'Text Title Middle', 'CIOOS-plugin'),
                'type' => Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => __( 'Click here', 'CIOOS-plugin' ),
                'placeholder' => __( 'Click here', 'CIOOS-plugin' ),
			]
		);
		$this->add_control(
			'title_right_text',
            [
                'label' => __( 'Text Title Right', 'CIOOS-plugin'),
                'type' => Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => __( 'Click here', 'CIOOS-plugin' ),
                'placeholder' => __( 'Click here', 'CIOOS-plugin' ),
			]
        );
        $this->end_controls_section();

        // 
        // Images/Links 
        // 
        $this->start_controls_section(
            'section_images_links',
            [
				'label' => __('Images/Links', 'CIOOS-plugin'),
            ]
		);
		$this->add_control(
			'image_1',
            [
                'label' => __( 'Image 1', 'CIOOS-plugin'),
                'type' => Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => __( 'Click here', 'CIOOS-plugin' ),
                'placeholder' => __( 'Click here', 'CIOOS-plugin' ),
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
		<!-- insert html here -->
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