<?php
class Kindaid_Community extends \Elementor\Widget_Base
{

    public function get_name(): string
    {
        return 'kindaid_community';
    }

    public function get_title(): string
    {
        return esc_html__('KindAid Community', 'kindaid');
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
        return ['fact', 'community'];
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
            'community_title',
            [
                'label' => esc_html__('Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );

        $this->add_control(
            'community_sub_title',
            [
                'label' => esc_html__('Sub Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Default title', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );

        $this->add_control(
            'community_counter',
            [
                'label' => esc_html__('Counter', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );

        $this->add_control(
            'community_caption',
            [
                'label' => esc_html__('Caption', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );

        $this->add_control(
            'community_btn_text',
            [
                'label' => esc_html__('Button Text', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );

        $this->add_control(
            'community_btn_url',
            [
                'label' => esc_html__('Button Url', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );

        $this->add_control(
            'community_btn_icon',
            [
                'label' => esc_html__('Button Icon', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Default title', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );

        $this->add_control(
            'community_image_1',
            [
                'label' => esc_html__('Choose Image-01', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'community_image_2',
            [
                'label' => esc_html__('Choose Image-02', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'community_image_3',
            [
                'label' => esc_html__('Choose Image-03', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'community_image_4',
            [
                'label' => esc_html__('Choose Image-04', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();
    }

    // Style Tab Start
    protected function register_style_section() {}

    protected function render(): void
    {
        $settings = $this->get_settings_for_display();


        if ($settings['community_image_1']['id']) {
            $community_image_1_url = !empty($settings['community_image_1']['id']) ? wp_get_attachment_image_url($settings['community_image_1']['id'], 'full') : $settings['community_image_1']['url'];

            $community_image_1_alt = !empty($settings['community_image_1']['id']) ? get_post_meta($settings['community_image_1']['id'], '_wp_attachment_image_alt') : '';
        }

        if ($settings['community_image_2']['id']) {
            $community_image_2_url = !empty($settings['community_image_2']['id']) ? wp_get_attachment_image_url($settings['community_image_2']['id'], 'full') : $settings['community_image_2']['url'];

            $community_image_2_alt = !empty($settings['community_image_2']['id']) ? get_post_meta($settings['community_image_2']['id'], '_wp_attachment_image_alt') : '';
        }

        if ($settings['community_image_3']['id']) {
            $community_image_3_url = !empty($settings['community_image_3']['id']) ? wp_get_attachment_image_url($settings['community_image_3']['id'], 'full') : $settings['community_image_3']['url'];

            $community_image_3_alt = !empty($settings['community_image_3']['id']) ? get_post_meta($settings['community_image_3']['id'], '_wp_attachment_image_alt') : '';
        }

        if ($settings['community_image_4']['id']) {
            $community_image_4_url = !empty($settings['community_image_4']['id']) ? wp_get_attachment_image_url($settings['community_image_4']['id'], 'full') : $settings['community_image_4']['url'];

            $community_image_4_alt = !empty($settings['community_image_4']['id']) ? get_post_meta($settings['community_image_4']['id'], '_wp_attachment_image_alt') : '';
        }


?>
        <!-- tp-join-area-start -->
        <div class="tp-join-area scene fix pt-115 pb-150">
            <div class="container container-1424">
                <div class="tp-join text-center p-relative">
                    <div class="tp-join-shape d-none d-md-block">
                        <?php if (!empty($community_image_1_url)): ?>
                            <img
                                class="tp-join-shape-1 p-absolute d-none d-lg-block layer"
                                data-depth="0.8"
                                src="<?php echo esc_url($community_image_1_url); ?>"
                                alt="<?php echo esc_attr($community_image_1_alt); ?>" />
                        <?php endif; ?>

                        <?php if (!empty($community_image_2_url)): ?>
                            <img
                                class="tp-join-shape-2 p-absolute layer"
                                data-depth="-0.8"
                                src="<?php echo esc_url($community_image_2_url); ?>"
                                alt="<?php echo esc_attr($community_image_2_alt); ?>" />

                        <?php endif; ?>
                        <?php if (!empty($community_image_3_url)): ?>
                            <img
                                class="tp-join-shape-3 p-absolute d-none d-lg-block layer"
                                data-depth="0.8"
                                src="<?php echo esc_url($community_image_3_url); ?>"
                                alt="<?php echo esc_attr($community_image_3_alt); ?>" />
                        <?php endif; ?>
                        <?php if (!empty($community_image_4_url)): ?>
                            <img
                                class="tp-join-shape-4 p-absolute layer"
                                data-depth="-0.8"
                                src="<?php echo esc_url($community_image_4_url); ?>"
                                alt="<?php echo esc_attr($community_image_4_alt); ?>" />
                        <?php endif; ?>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-7 col-lg-8">
                            <div class="tp-join-info mb-60 ml-10 mr-10">
                                <span
                                    class="tp-section-subtitle d-block mb-15 wow fadeInUp"
                                    data-wow-duration=".9s"
                                    data-wow-delay=".3s"><?php echo esc_html($settings['community_title']) ?></span>
                                <h3
                                    class="tp-join-title mb-20 wow fadeInUp"
                                    data-wow-duration=".9s"
                                    data-wow-delay=".4s">
                                    <?php echo kd_kses($settings['community_sub_title']) ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <h2
                        class="tp-join-number mb-70 wow fadeInUp"
                        data-wow-duration=".9s"
                        data-wow-delay=".5s">
                        <?php echo esc_html($settings['community_counter']) ?>
                    </h2>
                    <div
                        class="tp-join-down wow fadeInUp"
                        data-wow-duration=".9s"
                        data-wow-delay=".6s">
                        <p class="tp-join-down-tittle mb-15"><?php echo esc_html($settings['community_caption']) ?></p>
                        <a class="tp-join-btn tp-btn tp-btn-animetion" href="<?php echo esc_url($settings['community_btn_url']) ?>">
                            <span class="btn-text"><?php echo esc_html($settings['community_btn_text']) ?></span>
                            <span class="btn-icon">
                                <?php echo kd_kses($settings['community_btn_icon']) ?>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- tp-join-area-end -->
<?php
    }
}

$widgets_manager->register(new \Kindaid_Community());
