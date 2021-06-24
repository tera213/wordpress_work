<?php
/*
Template Name: PROFILE
*/
?>
<?php get_header(); ?>
    <!-- メニュー -->
    <?php get_template_part('content', 'menu'); ?>

    <section>
        <h1 class="title"><?php echo get_the_title(); ?></h1>
        <div>
            <?php echo get_post_meta($post->ID, 'map', true); ?>
        </div>
    </section>

    <section class="sec05">
        <?php if(have_posts()) :
            while(have_posts()) : the_post(); ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class() ?>>
                    <?php the_content(); ?>
                </div>
            <?php endwhile;
        endif; ?>
    </section>