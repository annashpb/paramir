<?php get_header(); ?>

<div class="container">
    <section class="books">
        <div class="container books-container">
            <?php
            $args = array(
                'post_type' => 'books',
                'showposts' => 3,
                'paged' => get_query_var('page'),
                'meta_query' => array(
                    'relation' => 'AND',
                    'price' => array(
                        'key' => 'price',
                        'type' => 'NUMERIC'
                    ),
                    'is_available' => array(
                        'key' => 'is_available'
                    )
                ),
                'orderby' => array(
                    'is_available' => 'DESC',
                    'price' => 'DESC'
                )
            );
            $the_query = new WP_Query($args); ?>
            <?php if ($the_query->have_posts()) : ?>
                <ul class="books-preview__list">
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <li class="books-preview__item">
                            <a href="<?php the_permalink(); ?>" class="books-preview__link">
                                <img src="<?php echo get_field('cover_photo')['url']; ?>" alt="<?php echo get_field('cover_photo')['alt']; ?>" class="books-preview__cover" width="270" height="375">
                                <div class="books-preview__descr books-preview__descr--short">
                                    <p class="books-preview__author"><?php the_field('author'); ?></p>
                                    <h3 class="books-preview__name"><?php the_field('name'); ?></h2>
                                </div>
                                <div class="books-preview__descr books-preview__descr--full">
                                    <p class="books-preview__author"><?php the_field('author'); ?></p>
                                    <h3 class="books-preview__name"><?php the_field('name'); ?></h2>
                                        <?php
                                        $isAvailable = get_field('is_available');
                                        if ($isAvailable) : ?>
                                            <div class="books-preview__additional">
                                                <p class="books-preview__price"><?php the_field('price'); ?></p>
                                                <button class="default-btn books-preview__basket" type="button"><?php _e('В корзину'); ?></button>
                                            </div>
                                        <?php else : ?>
                                            <p class="books-preview__available--not"><?php _e('Нет в наличии'); ?></p>
                                        <?php endif; ?>
                                </div>
                            </a>
                        </li>
                    <?php endwhile; ?>
                </ul>
                <?php
                wp_pagenavi(array('query' => $the_query));
                wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
    </section>
</div>
<?php
get_sidebar();
get_footer();
