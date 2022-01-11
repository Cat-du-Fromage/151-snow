<?php

/**
 * @file      articles.php
 * @brief     File description
 * @author    Created by Florian.DURUZ
 * @version   03.12.2021
 */
$title = 'Articles';

ob_start();

?>


    <!-- Title Page -->
    <section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(view/content/images/home_slide_2.jpg);">
        <h2 class="l-text2 t-center">
            Nos snows
        </h2>
    </section>


    <!-- Content page -->
    <section class="bgwhite p-t-55 p-b-65">
        <div class="container">
            <!-- Product -->
            <div class="row">

                <?php if (isset($articleErrorMessage)) { ?>
                    <h5><span style="color:#ff0000"><?= $articleErrorMessage; ?></span></h5>
                <?php } else { ?>

                    <?php foreach ($articlesList as $article) { ?>
                        <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                                    <?php if(is_file($article['photo'])) : ?>
                                        <img src="<?= $article['photo']; ?>" alt="<?= $article['code']; ?>">
                                    <?php else : ?>
                                        <img src="view/content/images/no_image_snow_small.png" alt="no image">
                                    <?php endif; ?>

                                    <div class="block2-overlay trans-0-4">
                                        <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                            <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                            <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                        </a>

                                        <div class="block2-btn-addcart w-size1 trans-0-4">
                                            <!-- Button -->

                                            <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                Add to Cart
                                            </button>

                                        </div>
                                    </div>
                                </div>

                                <div class="block2-txt p-t-20">

                                    <a href="index.php?action=displayArticleDetail&articleId=<?= $article['code'];?>" class="block2-name dis-block s-text3 p-b-5">
                                        <strong><?= $article['brand'] . " ". $article['model'] ; ?></strong>
                                    </a>

                                    <strong>Dispnibilité : </strong> <?= $article['qtyAvailable'] ; ?>
                                    <br>

                                    <span class="block2-price m-text6 p-r-5">
                            CHF <?= number_format($article['price'], 2, '.') ; ?>
                            </span>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>

        </div>
    </section>

<?php
$content = ob_get_clean();
require 'gabarit.php';
?>