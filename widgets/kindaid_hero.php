<?php
class Kindaid_Hero extends \Elementor\Widget_Base
{

    public function get_name(): string
    {
        return 'kindaid_hero';
    }

    public function get_title(): string
    {
        return esc_html__('Kind Hero', 'kindaid');
    }

    public function get_icon(): string
    {
        return 'eicon-code';
    }

    public function get_categories(): array
    {
        return ['basic'];
    }

    public function get_keywords(): array
    {
        return ['hero', 'home 1 hero'];
    }

    protected function register_controls(): void
    {

        // Content Tab Start

        $this->start_controls_section(
            'hero_section',
            [
                'label' => esc_html__('Title & Content', 'kindaid'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__('Sub Title', 'kindaid'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Need Help...', 'kindaid'),
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'kindaid'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => wp_kses_post(__('Being <br> life saver <br> for someone', 'kindaid')),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__('Desctiption', 'kindaid'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => wp_kses_post(__('Hempel Foundation is the <br> majority owner of the Kindaid Group!', 'kindaid')),
            ]
        );

        $this->end_controls_section();

        // Content Tab End

        // image control section

        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Image', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'hero_image',
            [
                'label' => esc_html__('Choose Image', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

        // button 
        $this->start_controls_section(
            'button_section',
            [
                'label' => esc_html__('Button', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => esc_html__('Button Text', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Button Text', 'textdomain'),
            ]
        );

        $this->add_control(
            'btn_link',
            [
                'label' => esc_html__('Link', 'textdomain'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
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

        // Style Tab Start

        $this->start_controls_section(
            'section_title_style',
            [
                'label' => esc_html__('Title', 'kindaid'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Text Color', 'kindaid'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hello-world' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Tab End

    }

    protected function render(): void
    {
        $settings = $this->get_settings_for_display();
        $image = !empty($settings['hero_image']['id']) ? wp_get_attachment_image_url($settings['hero_image']['id'], 'full') : $settings['hero_image']['url'];

        if (empty($settings['title'])) {
            return;
        }
?>
        <!-- tp-hero-area-start -->
        <div class="tp-hero-area fix">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-xxl-6 col-xl-7 col-lg-6 offset-xxl-1">
                        <div class="tp-hero-content tp-hero-spacing">
                            <span class="tp-hero-subtitle d-inline-block mb-25 ml-5  wow fadeInUp" data-wow-duration=".9s" data-wow-delay=".4s"><?php echo esc_html($settings['sub_title']) ?></span>
                            <h2 class="tp-hero-title mb-80 wow fadeInUp" data-wow-duration=".9s" data-wow-delay=".5s">
                                <?php echo wp_kses_post($settings['title']); ?>
                            </h2>
                            <div class="tp-hero-btn-wrap">
                                <div class="wow fadeInUp" data-wow-duration=".9s" data-wow-delay=".6s">
                                    <p class="tp-hero-dec mb-30"><?php echo wp_kses_post($settings['description']) ?></p>
                                </div>
                                <div class="tp-hero-btn wow fadeInUp" data-wow-duration=".9s" data-wow-delay=".7s">
                                    <a class="tp-btn tp-btn-animetion mr-5 mb-10" href="contact.html">
                                        <span class="btn-text"><?php echo esc_html($settings['btn_get_help']) ?></span>
                                        <span class="btn-icon">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 7H13" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M7 1L13 7L7 13" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                    </a>
                                    <a class="tp-btn tp-btn-secondary tp-btn-animetion mb-10" href="donate.html">
                                        <span class="btn-text"><?php echo esc_html($settings['btn_donate']) ?></span>
                                        <span class="btn-icon">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 7H13" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M7 1L13 7L7 13" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-5 col-xl-5 col-lg-6">
                        <div class="tp-hero-thumb ml-20">
                            <img class="w-100" src="<?php echo esc_url($image) ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- tp-hero-area-end -->
<?php
    }
}

$widgets_manager->register(new \Kindaid_Hero());
