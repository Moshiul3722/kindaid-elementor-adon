<?php
class Kindaid_Services_List extends \Elementor\Widget_Base
{

    public function get_name(): string
    {
        return 'kindaid_services_list';
    }

    public function get_title(): string
    {
        return esc_html__('Kind Services List', 'kindaid');
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
            'service_section',
            [
                'label' => esc_html__('Service List', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'serv_title',
            [
                'label' => esc_html__('Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );

        $this->add_control(
            'serv_sub_title',
            [
                'label' => esc_html__('Sub Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );

        $this->add_control(
            'serv_banner_image',
            [
                'label' => esc_html__('Choose Image', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'icon_style',
            [
                'label' => esc_html__('Select Icon', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'icon',
                'options' => [
                    '' => esc_html__('Default', 'textdomain'),
                    'icon' => esc_html__('Icon', 'textdomain'),
                    'image'  => esc_html__('Image', 'textdomain'),
                    'svg' => esc_html__('SVG', 'textdomain'),
                ],
            ]
        );

        $repeater->add_control(
            'serv_icon',
            [
                'label' => esc_html__('Icon', 'textdomain'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-smile',
                    'library' => 'fa-solid',
                ],
                'condition' => [
                    'icon_style' => 'icon',
                ],
            ]
        );

        $repeater->add_control(
            'serv_image',
            [
                'label' => esc_html__('Choose Image', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'icon_style' => 'image',
                ],
            ]
        );

        $repeater->add_control(
            'serv_svg_icon',
            [
                'label' => esc_html__('SVG Icon', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                // 'default' => esc_html__('Default description', 'textdomain'),
                // 'placeholder' => esc_html__('Type your description here', 'textdomain'),
                'condition' => [
                    'icon_style' => 'svg',
                ],
            ]
        );

        $repeater->add_control(
            'serv_title',
            [
                'label' => esc_html__('Title', 'kindaid'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Healthy Food', 'textdomain'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'kindaid'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Health care are essential for a child\'s growth.', 'textdomain'),
            ]
        );

        $repeater->add_control(
            'serv_btn_text',
            [
                'label' => esc_html__('Button Text', 'kindaid'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Read More', 'textdomain'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'serv_btn_url',
            [
                'label' => esc_html__('Button Url', 'kindaid'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('#', 'textdomain'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'serv_list',
            [
                'label' => esc_html__('Services List', 'textdomain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'serv_title' => esc_html__('Title #1', 'textdomain'),
                        'content' => esc_html__('Item content. Click the edit button to change this text.', 'textdomain'),
                    ],
                    [
                        'serv_title' => esc_html__('Title #2', 'textdomain'),
                        'content' => esc_html__('Item content. Click the edit button to change this text.', 'textdomain'),
                    ],
                ],
                'title_field' => '{{{ serv_title }}}',
            ]
        );

        $this->end_controls_section();
    }

    // Style Tab Start
    protected function register_style_section() {}

    protected function render(): void
    {
        $settings = $this->get_settings_for_display();



        $serve_banner_image_url = !empty($settings['serv_banner_image']['id']) ? wp_get_attachment_image_url($settings['serv_banner_image']['id'], 'full') : $settings['serv_banner_image']['url'];

        $serve_bannaer_image_alt = !empty($settings['serv_banner_image']['id']) ? get_post_meta($settings['serv_banner_image']['id'], '_wp_attachment_image_alt') : '';


?>
        <!-- tp-service-area-start -->
        <div class="tp-service-area tp-bg-mulberry p-relative">
            <img class="tp-service-shape" src="<?php echo get_template_directory_uri(); ?>/assets/img/service/shape.png" alt="">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xxl-3 col-xl-4 d-none d-xl-block">
                        <div class="tp-service-thumb">
                            <img src="<?php echo $serve_banner_image_url; ?>" alt="<?php echo $serve_bannaer_image_alt; ?>">
                        </div>
                    </div>
                    <div class="col-xxl-8 col-xl-8">
                        <div class="tp-service-content-wrap pt-95 pb-90 pr-90">
                            <div class="tp-service-title-wrap mb-40">
                                <span class="tp-section-subtitle tp-section-subtitle-yellow d-inline-block mb-10 wow fadeInUp" data-wow-duration=".9s" data-wow-delay=".3s"><?php echo esc_html($settings['serv_sub_title']) ?></span>
                                <h2 class="tp-section-title tp-section-title-white wow fadeInUp" data-wow-duration=".9s" data-wow-delay=".5s"><?php echo esc_html($settings['serv_title']) ?></h2>
                            </div>
                            <div class="row">
                                <?php foreach ($settings['serv_list'] as $item):

                                    if (!empty($item['serv_image'])) {

                                        $image_url = !empty($item['serv_image']['id']) ? wp_get_attachment_image_url($item['serv_image']['id'], 'full') : $item['serv_image']['url'];

                                        $image_alt = !empty($item['serv_image']['id']) ? get_post_meta($item['serv_image']['id'], '_wp_attachment_image_alt') : '';
                                    }
                                ?>
                                    <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6">
                                        <div class="tp-service-item icon-anime-wrap mb-25 wow fadeInUp" data-wow-duration=".9s" data-wow-delay=".3s">
                                            <span class="tp-service-icon icon-anime mb-25 d-inline-block">
                                                <?php if ($item['icon_style'] == 'icon'): ?>
                                                    <?php \Elementor\Icons_Manager::render_icon($item['serv_icon'], ['aria-hidden' => 'true']); ?>
                                                <?php elseif ($item['icon_style'] == 'image'): ?>
                                                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                                                <?php else: ?>
                                                    <?php echo kd_kses($item['serv_svg_icon']) ?>
                                                <?php endif; ?>
                                            </span>
                                            <?php if ($item['serv_btn_url']): ?>
                                                <h3 class="tp-service-title mb-10">
                                                    <a href="<?php echo esc_url($item['serv_btn_url']) ?>"><?php echo esc_html($item['serv_title']) ?></a>
                                                </h3>
                                            <?php else: ?>
                                                <h3 class="tp-service-title mb-10">
                                                    <?php echo esc_html($item['serv_title']) ?>
                                                </h3>
                                            <?php endif; ?>
                                            <?php if ($item['description']): ?>
                                                <p class="tp-service-dec"><?php echo esc_html($item['description']) ?></p>
                                            <?php endif; ?>
                                            <?php if ($item['serv_btn_url']): ?>
                                                <a class="tp-service-btn" href="<?php echo esc_url($item['serv_btn_url']) ?>">
                                                    <span class="btn-text"><?php echo esc_html($item['serv_btn_text']) ?></span>
                                                    <span span class="btn-icon">
                                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M1 7H13" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M7 1L13 7L7 13" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- tp-service-area-end -->
<?php
    }
}

$widgets_manager->register(new \Kindaid_Services_List());
