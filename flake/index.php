<?php get_header() ?>

<?php if (have_posts()) : ?>
    <div class="article-container">

        <?php while (have_posts()) : the_post(); ?>

            <div class="card mb-3">
                <?php the_post_thumbnail('post-thumbnail', ['class' => 'card-img-top', 'alt' => '', 'style' => 'height: auto;']) ?>
                <!-- <img src="..." class="card-img-top" alt="..."> -->
                <div class="card-body">
                    <h5 class="card-title"><?php the_title(); ?></h5>
                    <p class="card-text"> <?php the_excerpt(); ?></p>
                    <p class="card-text"><small> 10€ / nuit </small></p>
                    <a href="<?php the_permalink(); ?>" class="btn btn-primary">En savoir plus</a>
                </div>
            </div>
        <?php endwhile; ?>

    </div>

    <?php flake_pagination(); ?>

<?php else : ?>
    <h1> Pas d'article </h1>
<?php endif; ?>

<?php get_footer() ?>