<?php
class Kindaid_Team_Section extends \Elementor\Widget_Base
{

    public function get_name(): string
    {
        return 'kindaid_team_section';
    }

    public function get_title(): string
    {
        return esc_html__('KindAid Team', 'kindaid');
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
        return ['fact', 'team'];
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

        // team button text
        $this->add_control(
            'team_view_all_btn_text',
            [
                'label' => esc_html__('Button', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'textdomain'),
                'placeholder' => esc_html__('View All', 'textdomain'),
            ]
        );

        // team button url
        $this->add_control(
            'team_view_all_btn_url',
            [
                'label' => esc_html__('Button Url', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'textdomain'),
                'placeholder' => esc_html__('#', 'textdomain'),
            ]
        );

        // team button icon
        $this->add_control(
            'team_btn_icon',
            [
                'label' => esc_html__('Button Icon', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Default description', 'textdomain'),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'member_title',
            [
                'label' => esc_html__('Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('List Title', 'textdomain'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'member_sub_title',
            [
                'label' => esc_html__('Sub Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('List Title', 'textdomain'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'member_image',
            [
                'label' => esc_html__('Choose Image', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'member_icon_1',
            [
                'label' => esc_html__('Social Icon-1', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Default description', 'textdomain'),
            ]
        );

        $repeater->add_control(
            'member_social_url_1',
            [
                'label' => esc_html__('Socail Url-1', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('List Title', 'textdomain'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'member_icon_2',
            [
                'label' => esc_html__('Social Icon-2', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Default description', 'textdomain'),
            ]
        );

        $repeater->add_control(
            'member_social_url_2',
            [
                'label' => esc_html__('Social Url-2', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('List Title', 'textdomain'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'member_icon_3',
            [
                'label' => esc_html__('Social Icon-3', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Default description', 'textdomain'),
            ]
        );

        $repeater->add_control(
            'member_social_url_3',
            [
                'label' => esc_html__('Social Url-3', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('List Title', 'textdomain'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'member_icon_4',
            [
                'label' => esc_html__('Social Icon-4', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Default description', 'textdomain'),
            ]
        );

        $repeater->add_control(
            'member_social_url_4',
            [
                'label' => esc_html__('Social Url-4', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('List Title', 'textdomain'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'team_member_list',
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
                'title_field' => '{{{ member_title }}}',
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
        <!-- tp-team-area start  -->
        <div class="tp-team-area pt-120 pb-90 fix p-relative">
            <div class="container container-1424">
                <div class="row align-items-end">
                    <div class="col-xl-6 col-lg-7 col-md-8">
                        <div class="tp-section-team-wrap mb-45 p-relative">
                            <span
                                class="tp-section-subtitle d-inline-block mb-15 wow fadeInUp"
                                data-wow-duration=".9s"
                                data-wow-delay=".3s">Team section</span>
                            <h2
                                class="tp-section-title mb-20 wow fadeInUp"
                                data-wow-duration=".9s"
                                data-wow-delay=".4s">
                                Meet our Volunteer <span>Team</span> Members
                            </h2>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-5 col-md-4">
                        <div
                            class="tp-event-btn-wrap mb-50 text-md-end wow fadeInUp"
                            data-wow-duration=".9s"
                            data-wow-delay=".4s">
                            <a class="tp-btn tp-btn-animetion mr-5 mb-10" href="<?php echo esc_url($settings['team_view_all_btn_url']) ?>">
                                <span class="btn-text"><?php echo esc_html($settings['team_view_all_btn_text']); ?></span>
                                <span class="btn-icon">
                                    <?php echo kd_kses($settings['team_btn_icon']) ?>
                                </span>
                            </a>
                        </div>
                    </div>

                    <?php foreach ($settings['team_member_list'] as $member) :

                        if (!empty($member['member_image'])) {
                            $member_image_url = !empty($member['member_image']['id']) ? wp_get_attachment_image_url($member['member_image']['id'], 'full') : $member['member_image']['url'];

                            $member_image_alt = !empty($member['member_image']['id']) ? get_post_meta($member['member_image']['id'], '_wp_attachment_image_alt') : '';
                        }

                    ?>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div
                                class="tp-team-item text-center mb-30 wow fadeInUp"
                                data-wow-duration=".9s"
                                data-wow-delay=".3s">
                                <div class="tp-team-thumb mb-30">
                                    <?php if (!empty($member_image_url)): ?>
                                        <img src="<?php echo esc_url($member_image_url) ?>" alt="<?php echo esc_attr($member_image_alt) ?>" />
                                    <?php endif; ?>
                                </div>
                                <div class="tp-team-content">
                                    <span class="mb-10 d-block"><?php echo esc_html($member['member_sub_title']) ?></span>
                                    <h3 class="tp-team-title mb-10">
                                        <a href="team-details.html"><?php echo esc_html($member['member_title']) ?></a>
                                    </h3>
                                    <div class="tp-team-social">
                                        <a href="#">
                                            <?php echo esc_html($member['member_icon_1']) ?>
                                        </a>
                                        <a href="#">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="16"
                                                height="14"
                                                viewBox="0 0 16 14"
                                                fill="none">
                                                <path
                                                    fill-rule="evenodd"
                                                    clip-rule="evenodd"
                                                    d="M5.28884 0.714844H0.666992L6.14691 7.9153L1.01754 13.9556H3.38746L7.26697 9.38713L10.7118 13.9136H15.3337L9.69453 6.50391L9.70451 6.51669L14.5599 0.798959H12.19L8.58427 5.04503L5.28884 0.714844ZM3.21817 1.97588H4.65702L12.7825 12.6525H11.3436L3.21817 1.97588Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </a>
                                        <a href="#">
                                            <svg
                                                width="20"
                                                height="20"
                                                viewBox="0 0 20 20"
                                                fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <circle
                                                    cx="9.99991"
                                                    cy="9.99991"
                                                    r="8.38077"
                                                    stroke="currentColor"
                                                    stroke-width="1.5" />
                                                <path
                                                    d="M18.3799 11.0604C17.6032 10.9148 16.8043 10.8389 15.9891 10.8389C11.5034 10.8389 7.51372 13.1373 4.9707 16.7054"
                                                    stroke="currentColor"
                                                    stroke-width="1.5"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M15.8665 4.13281C13.2437 7.2064 9.30255 9.16128 4.8957 9.16128C3.76828 9.16128 2.67133 9.03332 1.61914 8.79143"
                                                    stroke="currentColor"
                                                    stroke-width="1.5"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M12.1938 18.3815C12.4039 17.3641 12.5142 16.3104 12.5142 15.2309C12.5142 9.93756 9.86111 5.26259 5.80957 2.45801"
                                                    stroke="currentColor"
                                                    stroke-width="1.5"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                        <a href="#">
                                            <svg
                                                width="18"
                                                height="18"
                                                viewBox="0 0 18 18"
                                                fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M1.66602 8.99935C1.66602 5.54238 1.66602 3.8139 2.73996 2.73996C3.8139 1.66602 5.54238 1.66602 8.99935 1.66602C12.4563 1.66602 14.1848 1.66602 15.2587 2.73996C16.3327 3.8139 16.3327 5.54238 16.3327 8.99935C16.3327 12.4563 16.3327 14.1848 15.2587 15.2587C14.1848 16.3327 12.4563 16.3327 8.99935 16.3327C5.54238 16.3327 3.8139 16.3327 2.73996 15.2587C1.66602 14.1848 1.66602 12.4563 1.66602 8.99935Z"
                                                    stroke="currentColor"
                                                    stroke-width="1.5"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M12.4747 9.00103C12.4747 10.9195 10.9195 12.4747 9.00103 12.4747C7.08256 12.4747 5.52734 10.9195 5.52734 9.00103C5.52734 7.08256 7.08256 5.52734 9.00103 5.52734C10.9195 5.52734 12.4747 7.08256 12.4747 9.00103Z"
                                                    stroke="currentColor"
                                                    stroke-width="1.5" />
                                                <path
                                                    d="M13.251 4.75391L13.242 4.75391"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!-- tp-team-area end  -->
<?php
    }
}

$widgets_manager->register(new \Kindaid_Team_Section());
