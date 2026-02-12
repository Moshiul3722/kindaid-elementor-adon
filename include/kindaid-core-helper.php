<?php
// Get all post
function get_all_post($post_type_name = 'post')
{
    $posts = get_posts(array(
        'post_type'      => $post_type_name,
        'orderby'        => 'name',
        'order'          => 'ASC',
        'posts_per_page' => -1,
    ));

    $posts_list = [];

    foreach ($posts as $post) {
        $posts_list[$post->ID] = $post->post_title;
    }

    return $posts_list;
}

// Get all category
function get_all_category($category = 'category')
{
    $categories = get_categories(array(
        'taxonomy' => $category,
        'orderby'  => 'name',
        'order'    => 'ASC',
    ));

    $category_list = [];

    foreach ($categories as $category) {
        $category_list[$category->slug] = $category->name;
    }

    return $category_list;
}


/**
 * Sanitize SVG markup for front-end display.
 *
 * @param  string $svg SVG markup to sanitize.
 * @return string 	  Sanitized markup.
 */

function kd_kses($tag = '')
{
    $allowed_html = [
        'svg'                 => array(
            'class'           => true,
            'aria-hidden'     => true,
            'aria-labelledby' => true,
            'role'            => true,
            'xmlns'           => true,
            'width'           => true,
            'height'          => true,
            'fill'            => true,
            'viewbox'         => true, // < = Must be lower case!
        ),
        'path'                => array(
            'd'               => true,
            'fill'            => true,
            'stroke'          => true,
            'stroke-width'    => true,
            'stroke-linecap'  => true,
            'stroke-linejoin' => true,
            'opacity'         => true,
        ),
        'a'                   => [
            'class'           => [],
            'href'            => [],
            'title'           => [],
            'target'          => [],
            'rel'             => [],
        ],
        'b'                   => [],
        'blockquote'          => [
            'cite'            => [],
        ],
        'cite'                => [
            'title'           => [],
        ],
        'code'                => [],
        'del'                 => [
            'datetime'        => [],
            'title'           => [],
        ],
        'div'                 => [
            'class'           => [],
            'title'           => [],
            'style'           => [],
        ],
        'dl'                  => [],
        'dt'                  => [],
        'em'                  => [],
        'h1'                  => [],
        'h2'                  => [],
        'h3'                  => [],
        'h4'                  => [],
        'h5'                  => [],
        'h6'                  => [],
        'i'                   => [
            'class'           => [],
        ],
        'img'                 => [
            'alt'             => [],
            'class'           => [],
            'height'          => [],
            'src'             => [],
            'width'           => [],
        ],
        'li'                  => array(
            'class'           => array(),
        ),
        'ol'                  => array(
            'class'           => array(),
        ),
        'p'                   => array(
            'class'           => array(),
        ),
        'q'                   => array(
            'cite'            => array(),
            'title'           => array(),
        ),
        'span'                => array(
            'class'           => array(),
            'title'           => array(),
            'style'           => array(),
        ),
        'iframe'              => array(
            'width'           => array(),
            'height'          => array(),
            'scrolling'       => array(),
            'frameborder'     => array(),
            'allow'           => array(),
            'src'             => array(),
        ),
        'strike'              => array(),
        'br'                  => array(),
        'strong'              => array(),
    ];

    return wp_kses($tag, $allowed_html);
}
