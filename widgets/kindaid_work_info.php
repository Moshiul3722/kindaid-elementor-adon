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

        $this->add_control(
            'text_color',
            [
                'label' => __('Text Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#0073aa',
                'selectors' => [
                    '{{WRAPPER}} .tp-step-number>h3' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .tp-step-number>h3',
            ]
        );

        $this->add_responsive_control(
            'width',
            [
                'label' => __('Width', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem'],
                'range' => [
                    'px' => ['min' => 8, 'max' => 100],
                    'em' => ['min' => 0.5, 'max' => 5],
                    'rem' => ['min' => 0.5, 'max' => 5],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tp-step-number>h3' => 'width: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'height',
            [
                'label' => __('Height', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem'],
                'range' => [
                    'px' => ['min' => 8, 'max' => 100],
                    'em' => ['min' => 0.5, 'max' => 5],
                    'rem' => ['min' => 0.5, 'max' => 5],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tp-step-number>h3' => 'height: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'border-radius',
            [
                'label' => esc_html__('Border Radius', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'default' => [
                    'top' => 0,
                    'right' => 0,
                    'bottom' => 0,
                    'left' => 0,
                    'unit' => 'px',
                    'isLinked' => false,
                ],
                'selectors' => [
                    '{{WRAPPER}} .tp-step-number>h3' => '
    border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .tp-step-number>h3:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'border-radius-hover',
            [
                'label' => esc_html__('Border Radius', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'default' => [
                    'top' => 0,
                    'right' => 0,
                    'bottom' => 0,
                    'left' => 0,
                    'unit' => 'px',
                    'isLinked' => false,
                ],
                'selectors' => [
                    '{{WRAPPER}} .tp-step-number>h3:hover' => '
    border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );



        // Hover Transform (Scale, Translate, etc.)
        // $this->add_control(
        //     'hover_transform',
        //     [
        //         'label' => __('Hover Transform', 'textdomain'),
        //         'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
        //         'label_off' => __('None', 'textdomain'),
        //         'label_on' => __('Custom', 'textdomain'),
        //     ]
        // );





        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function render(): void
    {
        $settings = $this->get_settings_for_display();

?>
        <style>
            .ta-row>div:last-child>div.tp-step>div.tp-step-arrow {
                display: none !important;
            }
        </style>
        <!-- tp-hero-area-start -->
        <div class="container">
            <div class="row ta-row">
                <?php foreach ($settings['ta_list'] as $item): ?>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div
                            class="tp-step text-center p-relative mb-40 wow fadeInUp"
                            data-wow-duration=".9s"
                            data-wow-delay=".3s">
                            <div class="tp-step-arrow d-none d-lg-block">
                                <span>
                                    <svg
                                        width="21"
                                        height="14"
                                        viewBox="0 0 21 14"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M13.6793 0.260557C13.3033 0.617831 13.2915 1.20867 13.6531 1.58024L18.9277 7L13.6531 12.4198C13.2915 12.7913 13.3033 13.3822 13.6793 13.7394C14.0554 14.0967 14.6534 14.0851 15.015 13.7136L20.6044 7.97035C21.1319 7.4284 21.1319 6.5716 20.6044 6.02965L15.015 0.286433C14.6534 -0.0851318 14.0554 -0.0967169 13.6793 0.260557ZM1.16249 0.260557C0.786411 0.617831 0.774685 1.20867 1.1363 1.58024L6.41089 7L1.1363 12.4198C0.774685 12.7913 0.786409 13.3822 1.16249 13.7394C1.53856 14.0967 2.13658 14.0851 2.49819 13.7136L8.08758 7.97035C8.61502 7.4284 8.61501 6.5716 8.08758 6.02965L2.49819 0.286433C2.13658 -0.0851318 1.53856 -0.0967169 1.16249 0.260557Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                            </div>
                            <div class="tp-step-number mb-35">
                                <h3><?php echo esc_html($item['ta_number']) ?> <span></span></h3>
                            </div>
                            <div class="tp-step-content">
                                <h3 class="tp-step-title"><?php echo esc_html($item['ta_title']) ?></h3>
                                <p>
                                    <?php echo kd_kses($item['ta_description']) ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
        <!-- tp-hero-area-end -->
<?php
    }
}

$widgets_manager->register(new \Kindaid_Work_Info());
