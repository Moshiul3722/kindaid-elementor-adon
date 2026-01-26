<?php
class Kindaid_Fact extends \Elementor\Widget_Base
{

    public function get_name(): string
    {
        return 'kindaid_fact';
    }

    public function get_title(): string
    {
        return esc_html__('Kind Fact', 'kindaid');
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
        return ['fact', 'home 1 fact'];
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
            'number',
            [
                'label' => esc_html__('number', 'kindaid'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('200', 'textdomain'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'sign',
            [
                'label' => esc_html__('sign', 'kindaid'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('+', 'textdomain'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'content',
            [
                'label' => esc_html__('content', 'kindaid'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default Content', 'textdomain'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'fact_list',
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
                'title_field' => '{{{ number }}}',
            ]
        );


        $this->end_controls_section();
    }

    // Style Tab Start
    protected function register_style_section() {}

    protected function render(): void
    {
        $settings = $this->get_settings_for_display();

?>
        <!-- tp-hero-area-start -->
        <div class="tp-fact-area tp-bg-mulberry pt-40 pb-35">
            <div class="container container-1424">
                <div class="row">
                    <?php foreach ($settings['fact_list'] as $item): ?>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="tp-fact-item tp-fact-item-border text-center pt-20 pb-25">
                                <h2 class="tp-fact-title mb-5"><span class="purecounter" data-purecounter-duration="2" data-purecounter-end="64"><?php echo esc_html($item['number']) ?></span><?php echo esc_html($item['sign']) ?></h2>
                                <p class="tp-fact-dec mb-0"><?php echo esc_html($item['content']) ?></p>
                            </div>
                        </div>

                    <?php endforeach; ?>

                </div>
            </div>
        </div>
        <!-- tp-hero-area-end -->
<?php
    }
}

$widgets_manager->register(new \Kindaid_Fact());
