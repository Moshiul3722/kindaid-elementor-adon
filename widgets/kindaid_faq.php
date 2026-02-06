<?php
class Kindaid_Faq extends \Elementor\Widget_Base
{

    public function get_name(): string
    {
        return 'kindaid_faq';
    }

    public function get_title(): string
    {
        return esc_html__('KindAid FAQ', 'kindaid');
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
        return ['fact', 'faq'];
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
            'faq_section',
            [
                'label' => esc_html__('FAQ List', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'faq_title',
            [
                'label' => esc_html__('Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('List Title', 'textdomain'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'faq_description',
            [
                'label' => esc_html__('Description', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Default description', 'textdomain'),
                'placeholder' => esc_html__('Type your description here', 'textdomain'),
            ]
        );

        $this->add_control(
            'faq_list',
            [
                'label' => esc_html__('Repeater List', 'textdomain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => esc_html__('Title #1', 'textdomain'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'textdomain'),
                    ],
                    [
                        'list_title' => esc_html__('Title #2', 'textdomain'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'textdomain'),
                    ],
                ],
                'title_field' => '{{{ faq_title }}}',
            ]
        );



        $this->end_controls_section();
    }

    // Style Tab Start
    protected function register_style_section() {}

    protected function render(): void
    {
        $settings = $this->get_settings_for_display();

        // echo '<pre>';
        // echo var_dump($settings['faq_list']);
        // echo '</pre>';

?>
        <!-- tp-faq-area-start -->
        <div class="tp-faq-area pb-120">
            <div class="container container-1424">
                <div class="row">
                    <div class="col-xl-5">
                        <div class="tp-section-faq-title-wrap mb-45 p-relative">
                            <span
                                class="tp-section-subtitle d-inline-block mb-15 wow fadeInUp"
                                data-wow-duration=".9s"
                                data-wow-delay=".3s">Faq’s section</span>
                            <h2
                                class="tp-section-title mb-20 wow fadeInUp"
                                data-wow-duration=".9s"
                                data-wow-delay=".4s">
                                Frequently<br />
                                Asked <span>Questions</span>
                            </h2>
                        </div>
                    </div>
                    <div class="col-xl-7">
                        <div class="tp-faq ml-15">
                            <div class="accordion" id="accordionExample">
                                <?php foreach ($settings['faq_list'] as $key => $fact_item):
                                    $active = ($key == 0) ? 'active' : '';
                                    $show = ($key == 0) ? 'show' : '';
                                    $collapsed = ($key != 0) ? 'collapsed' : '';
                                    $key = $key + 1;
                                ?>
                                    <div
                                        class="tp-faq-item active wow fadeInUp <?php echo esc_attr($active) ?>"
                                        data-wow-duration=".9s"
                                        data-wow-delay=".3s">
                                        <h2 class="accordion-header">
                                            <button
                                                class="tp-faq-button"
                                                type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapse-<?php echo esc_attr($key) ?>"
                                                aria-expanded="true"
                                                aria-controls="collapse-<?php echo esc_attr($key) ?>">
                                                <span><?php echo esc_attr(sprintf('%02d', $key)) ?></span>
                                                <?php echo $fact_item['faq_title'] ?>
                                            </button>
                                        </h2>
                                        <div
                                            id="collapse-<?php echo esc_attr($key) ?>"
                                            class="tp-faq-collapse collapse <?php echo esc_attr($show) ?>"
                                            data-bs-parent="#accordionExample">
                                            <div class="tp-faq-body">
                                                <p>
                                                    <?php echo esc_html($fact_item['faq_description']) ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- tp-faq-area-end -->
<?php
    }
}

$widgets_manager->register(new \Kindaid_Faq());
