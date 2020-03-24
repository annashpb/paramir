<?php get_header(); ?>

<div class="container">
    <div class="book-information">
        <img src="<?php echo get_field('cover_photo')['url']; ?>" alt="<?php echo get_field('cover_photo')['alt']; ?>" width="400px" height="545px" class="book-information__cover">
        <div class="book-information__text">
            <div class="book-information__main">
                <div class="book-information__descr">
                    <h2 class="book-information__name"><?php the_field('name'); ?></h2>
                    <p class="book-information__author"><?php the_field('author'); ?></p>
                </div>
                <div class="book-information__order">
                    <?php
                    $isAvailable = get_field('is_available');
                    if ($isAvailable) : ?>
                        <p class="book-information__available--yes">Есть в наличии</p>
                    <?php else : ?>
                        <p class="book-information__available--not">Нет в наличии</p>
                    <?php endif; ?>
                    <p class="book-information__price">
                        <?php
                        if ($isAvailable) : ?>
                            <p class="book-information__price--active"><?php the_field('price'); ?></p>
                        <?php else : ?>
                            <p class="book-information__price--notactive"><?php the_field('price'); ?></p>
                        <?php endif; ?>
                    </p>
                    <button class="default-btn book-information__basket" type="button">В корзину</button>
                </div>
            </div>
            <div class="book-information__char">
                <h3 class="book-information__char-headline">Характеристики</h3>
                <?php
                $args = array(
                    'post_type' => 'books',
                );
                $the_query = new WP_Query($args);
                $languages = get_the_terms(get_the_ID(), 'language');
                $genres = get_the_terms(get_the_ID(), 'genres');
                $publishingHouses = get_the_terms(get_the_ID(), 'publishing_house');
                $bindings = get_the_terms(get_the_ID(), 'binding');
                ?>
                <?php if ($the_query->have_posts()) : ?>
                    <table class="book-information__table book-char-table">
                        <tbody>
                            <tr>
                                <td class="book-char-table--char-name">Оригинальное название</td>
                                <td class="book-char-table--char-prop"><?php the_field('original_name'); ?></td>
                            </tr>
                            <tr>
                                <td class="book-char-table--char-name">Язык</td>
                                <td class="book-char-table--char-prop"><?php foreach ($languages as $language) echo $language->name; ?></td>
                            </tr>
                            <tr>
                                <td class="book-char-table--char-name">Жанр</td>
                                <td class="book-char-table--char-prop"><?php foreach ($genres as $genre) {echo $genre->name . " / ";}; ?></td>
                            </tr>
                            <tr>
                                <td class="book-char-table--char-name">Издательство</td>
                                <td class="book-char-table--char-prop"><?php foreach ($publishingHouses as $publishingHouse) echo $publishingHouse->name; ?></td>
                            </tr>
                            <tr>
                                <td class="book-char-table--char-name">Год издания</td>
                                <td class="book-char-table--char-prop"><?php the_field('year_of_publishing'); ?></td>
                            </tr>
                            <tr>
                                <td class="book-char-table--char-name">Переплёт</td>
                                <td class="book-char-table--char-prop"><?php foreach ($bindings as $binding) echo $binding->name; ?></td>
                            </tr>
                            <tr>
                                <td class="book-char-table--char-name">Количество страниц</td>
                                <td class="book-char-table--char-prop"><?php echo get_field('pages_count'); ?></td>
                            </tr>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>

</div>

<?php get_footer();
