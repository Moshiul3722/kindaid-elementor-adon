<?php
class Kindaid_Work_Info extends \Elementor\Widget_Base
{

    public function get_name(): string
    {
        return 'kindaid_work_info';
    }

    public function get_title(): string
    {
        return esc_html__('Kind Work Info', 'kindaid');
    }

    public function get_icon(): string
    {
        return 'eicon-code';
    }

    public function get_categories(): array
    {
        return ['kindaid-core'];
    }

    public function get_keywords(): array
    {
        return ['organization', 'step area', 'work', 'info'];
    }

    protected function register_controls(): void
    {
        $this->register_control_section();
        $this->register_style_section();
    }

    // Content Tab Start
    protected function register_control_section()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Fact List', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'ta_number',
            [
                'label' => esc_html__('Number', 'kindaid'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('01', 'textdomain'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'ta_title',
            [
                'label' => esc_html__('Title', 'kindaid'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Join our Website', 'textdomain'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'ta_description',
            [
                'label' => esc_html__('Description', 'kindaid'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Default Content', 'textdomain'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'ta_list',
            [
                'label' => esc_html__('Repeater List', 'textdomain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'number' => esc_html__('Title #1', 'textdomain'),
                        'content' => esc_html__('Item content. Click the edit button to change this text.', 'textdomain'),
                    ],
                    [
                        'number' => esc_html__('Title #2', 'textdomain'),
                        'content' => esc_html__('Item content. Click the edit button to change this text.', 'textdomain'),
                    ],
                ],
                'title_field' => '{{{ ta_number }}}',
            ]
        );


        $this->end_controls_section();
    }

    // Style Tab Start
    protected function register_style_section()
    {
        $this->start_controls_section(
            'advanced_typography_section',
            [
                'label' => __('Advanced Typography', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        // Start Tabs
        $this->start_controls_tabs('typography_tabs');

        // NORMAL Tab
        $this->start_controls_tab(
            'typography_normal_tab',
            [
                'label' => __('Normal', 'textdomain'),
            ]
        );
        // $this->add_normal_typography_controls($element);

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'selector' => '{{WRAPPER}} .tp-step-number>h3',
            ]
        );

        // Font Family
        $this->add_control(
            'normal_font_family',
            [
                'label' => __('Font Family', 'textdomain'),
                'type' => \Elementor\Controls_Manager::FONT,
                'default' => "Roboto",
                'selectors' => [
                    '{{WRAPPER}} .tp-step-number' => 'font-family: {{VALUE}}',
                ],
            ]
        );

        // Font Size
        $this->add_responsive_control(
            'normal_font_size',
            [
                'label' => __('Font Size', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem'],
                'range' => [
                    'px' => ['min' => 8, 'max' => 100],
                    'em' => ['min' => 0.5, 'max' => 5],
                    'rem' => ['min' => 0.5, 'max' => 5],
                ],
                'selectors' => [
                    '{{WRAPPER}} .your-element' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        // Font Weight
        $this->add_control(
            'normal_font_weight',
            [
                'label' => __('Font Weight', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '400',
                'options' => [
                    '100' => __('Thin 100', 'textdomain'),
                    '200' => __('Extra Light 200', 'textdomain'),
                    '300' => __('Light 300', 'textdomain'),
                    '400' => __('Regular 400', 'textdomain'),
                    '500' => __('Medium 500', 'textdomain'),
                    '600' => __('Semi Bold 600', 'textdomain'),
                    '700' => __('Bold 700', 'textdomain'),
                    '800' => __('Extra Bold 800', 'textdomain'),
                    '900' => __('Black 900', 'textdomain'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .your-element' => 'font-weight: {{VALUE}}',
                ],
            ]
        );

        // Text Color
        $this->add_control(
            'normal_text_color',
            [
                'label' => __('Text Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#333333',
                'selectors' => [
                    '{{WRAPPER}} .your-element' => 'color: {{VALUE}}',
                ],
            ]
        );

        // Line Height
        $this->add_responsive_control(
            'normal_line_height',
            [
                'label' => __('Line Height', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em'],
                'range' => [
                    'px' => ['min' => 0, 'max' => 100],
                    'em' => ['min' => 0, 'max' => 5],
                ],
                'selectors' => [
                    '{{WRAPPER}} .your-element' => 'line-height: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        // Letter Spacing
        $this->add_responsive_control(
            'normal_letter_spacing',
            [
                'label' => __('Letter Spacing', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em'],
                'range' => [
                    'px' => ['min' => -5, 'max' => 20],
                    'em' => ['min' => -0.1, 'max' => 1],
                ],
                'selectors' => [
                    '{{WRAPPER}} .your-element' => 'letter-spacing: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        // Text Transform
        $this->add_control(
            'normal_text_transform',
            [
                'label' => __('Text Transform', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'none',
                'options' => [
                    'none' => __('None', 'textdomain'),
                    'uppercase' => __('Uppercase', 'textdomain'),
                    'lowercase' => __('Lowercase', 'textdomain'),
                    'capitalize' => __('Capitalize', 'textdomain'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .your-element' => 'text-transform: {{VALUE}}',
                ],
            ]
        );

        // Text Decoration
        $this->add_control(
            'normal_text_decoration',
            [
                'label' => __('Text Decoration', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'none',
                'options' => [
                    'none' => __('None', 'textdomain'),
                    'underline' => __('Underline', 'textdomain'),
                    'overline' => __('Overline', 'textdomain'),
                    'line-through' => __('Line Through', 'textdomain'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .your-element' => 'text-decoration: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        // HOVER Tab
        $this->start_controls_tab(
            'typography_hover_tab',
            [
                'label' => __('Hover', 'textdomain'),
            ]
        );

        // $this->add_hover_typography_controls($element);

        // Hover Text Color
        $this->add_control(
            'hover_text_color',
            [
                'label' => __('Text Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#0073aa',
                'selectors' => [
                    '{{WRAPPER}} .your-element:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        // Hover Font Weight
        $this->add_control(
            'hover_font_weight',
            [
                'label' => __('Font Weight', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '600',
                'options' => [
                    '100' => __('Thin 100', 'textdomain'),
                    '200' => __('Extra Light 200', 'textdomain'),
                    '300' => __('Light 300', 'textdomain'),
                    '400' => __('Regular 400', 'textdomain'),
                    '500' => __('Medium 500', 'textdomain'),
                    '600' => __('Semi Bold 600', 'textdomain'),
                    '700' => __('Bold 700', 'textdomain'),
                    '800' => __('Extra Bold 800', 'textdomain'),
                    '900' => __('Black 900', 'textdomain'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .your-element:hover' => 'font-weight: {{VALUE}}',
                ],
            ]
        );

        // Hover Text Decoration
        $this->add_control(
            'hover_text_decoration',
            [
                'label' => __('Text Decoration', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'underline',
                'options' => [
                    'none' => __('None', 'textdomain'),
                    'underline' => __('Underline', 'textdomain'),
                    'overline' => __('Overline', 'textdomain'),
                    'line-through' => __('Line Through', 'textdomain'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .your-element:hover' => 'text-decoration: {{VALUE}}',
                ],
            ]
        );

        // Hover Text Shadow
        $this->add_control(
            'hover_text_shadow',
            [
                'label' => __('Text Shadow', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT_SHADOW,
                'selectors' => [
                    '{{WRAPPER}} .your-element:hover' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}}',
                ],
            ]
        );

        // Hover Transition Duration
        $this->add_control(
            'hover_transition_duration',
            [
                'label' => __('Transition Duration', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => ['max' => 3, 'step' => 0.1],
                ],
                'default' => ['size' => 0.3],
                'selectors' => [
                    '{{WRAPPER}} .your-element' => 'transition-duration: {{SIZE}}s',
                ],
            ]
        );

        // Hover Transform (Scale, Translate, etc.)
        $this->add_control(
            'hover_transform',
            [
                'label' => __('Hover Transform', 'textdomain'),
                'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
                'label_off' => __('None', 'textdomain'),
                'label_on' => __('Custom', 'textdomain'),
            ]
        );







        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function render(): void
    {
        $settings = $this->get_settings_for_display();

?>

        <!-- tp-hero-area-start -->

        <!-- tp-hero-area-end -->
<?php
    }
}

$widgets_manager->register(new \Kindaid_Work_Info());
