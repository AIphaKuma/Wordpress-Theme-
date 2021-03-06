<?php get_header() ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <p>
            <img src="<?php the_post_thumbnail_url(); ?>" class="img-fluid" alt="" style="width:100%; height:auto;">
        </p>
        <h1> <?php the_title(); ?> </h1>
        <?php the_content(); ?>

        <?php if (comments_open() || get_comments_number()) {
            comments_template();
        } ?>
<?php endwhile;
endif; ?>

</div>
<?php get_footer() ?>