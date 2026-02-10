<?php
class Kindaid_Blog_Post extends \Elementor\Widget_Base
{

    public function get_name(): string
    {
        return 'kindaid_blog_post';
    }

    public function get_title(): string
    {
        return esc_html__('Kind Blog', 'kindaid');
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
        return ['fact', 'blog', 'blog-post'];
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






        $this->end_controls_section();
    }

    // Style Tab Start
    protected function register_style_section() {}

    protected function render(): void
    {
        $settings = $this->get_settings_for_display();

        $args = array(
            'post_type' => array('post'),
            'post_status' => array('publish', 'private'),
            'orderby' => array('title' => 'DESC', 'menu_order' => 'ASC'),
            'posts_per_page' => 3,
        );

        // The Query.
        $the_query = new WP_Query($args);

        // $categories = get_the_category($the_query);

        // echo '<pre>';
        // var_dump($categories);
        // echo '</pre>';

?>
        <style>
            .dvdr:last-child:before {
                background: none !important;
            }
        </style>
        <!-- tp-blog-area start  -->
        <div class="tp-blog-area tp-blog-style pt-115 pb-90 fix p-relative">
            <div class="container container-1324">
                <div class="row">
                    <?php

                    // The Loop.
                    if ($the_query->have_posts()) {
                        while ($the_query->have_posts()) {
                            $the_query->the_post();
                            $categories = get_the_category();
                            // echo '<pre>';
                            // var_dump($categories);
                            // echo '</pre>';
                    ?>

                            <!-- echo '<li>' . esc_html(get_the_title()) . '</li>'; -->

                            <div class="col-xl-4 col-md-6">
                                <div class="tp-blog-item tp-event p-relative mb-30 wow fadeInUp" data-wow-duration=".9s" data-wow-delay=".3s">
                                    <div class="tp-blog-thumb tp-event-img fix mb-25">
                                        <?php the_post_thumbnail(); ?>
                                        <div class="tp-event-date">
                                            <span><?php echo get_the_date('M'); ?> </span>
                                            <h4><?php echo get_the_date('d'); ?> </h4>
                                        </div>
                                    </div>
                                    <div class="tp-blog-content">
                                        <div class="tp-blog-cat mb-5 d-flex flex-wrap">
                                            <?php
                                            if (!empty($categories)) {
                                                $limited_categories = array_slice($categories, 0, 3);
                                                foreach ($limited_categories as $cat) {
                                            ?>
                                                    <span class="dvdr"><a href="<?php echo esc_url(get_category_link($cat->term_id)) ?>"><?php echo $cat->name; ?></a></span>

                                            <?php
                                                }
                                            }

                                            ?>
                                            <!-- <span class="dvdr">Donations</span>
                                            <span>Medical Help</span> -->
                                        </div>
                                        <h3 class="tp-blog-title"><a href="<?php the_permalink() ?>" class="common-underline"><?php the_title() ?></a></h3>
                                    </div>
                                </div>
                            </div>

                    <?php
                        }
                    } else {
                        esc_html_e('Sorry, no posts matched your criteria.');
                    }
                    // Restore original Post Data.
                    wp_reset_postdata();

                    ?>


                </div>
            </div>
        </div>
        <!-- tp-blog-area end  -->
<?php
    }
}

$widgets_manager->register(new \Kindaid_Blog_Post());
