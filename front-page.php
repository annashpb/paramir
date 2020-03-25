<?php get_header(); ?>

<section class="books">
    <div class="container books-container">
        <?php
        $args = array(
            'post_type' => 'books',
        );
        $the_query = new WP_Query($args); ?>
        <?php if ($the_query->have_posts()) : ?>
            <ul class="books-preview__list">
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <li class="books-preview__item">
                        <a href="<?php the_permalink(); ?>" class="books-preview__link">
                            <img src="<?php echo get_field('cover_photo')['url']; ?>" alt="<?php echo get_field('cover_photo')['alt']; ?>" width="310px" height="425px" class="books-preview__cover">
                            <div class="books-preview__descr--short">
                                <p class="books-preview__author"><?php the_field('author'); ?></p>
                                <h3 class="books-preview__name"><?php the_field('name'); ?></h2>
                            </div>
                            <div class="books-preview__descr--full">
                                <p class="books-preview__author"><?php the_field('author'); ?></p>
                                <h3 class="books-preview__name"><?php the_field('name'); ?></h2>
                                    <div class="books-preview__additional">
                                        <?php
                                        $isAvailable = get_field('is_available');
                                        if ($isAvailable) : ?>
                                            <p class="books-preview__price"><?php the_field('price'); ?></p>
                                            <button class="default-btn books-preview__basket" type="button"><?php _e('В корзину'); ?></button>
                                        <?php else : ?>
                                            <p class="books-preview__available--not"><?php _e('Нет в наличии'); ?></p>
                                        <?php endif; ?>
                                    </div>
                            </div>
                        </a>
                    </li>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </ul>
        <?php endif; ?>
    </div>
</section>

<?php
get_sidebar();
get_footer();
