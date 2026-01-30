
/**
 * نسخه نهایی و اصلاح شده محصولات مشابه اختصاصی محمد میگه
 * حذف کامل نسخه قدیمی + فیکس دابل قیمت + چیدمان گرید
 * این کد به صورت اجرا در همه جا است و به صورت خودکار درج میشود
 */

// ۱. حذف محصولات مشابه پیش‌فرض (لایه PHP)
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

// ۲. رندر بخش اختصاصی
add_action( 'woocommerce_after_single_product_summary', 'migeh_final_custom_related_products', 25 );

function migeh_final_custom_related_products() {
    global $product;
    if ( ! $product ) return;

    // دریافت ۳ محصول مرتبط
    $related_ids = wc_get_related_products( $product->get_id(), 3 );
    if ( empty( $related_ids ) ) return;

    echo '<section class="migeh-related-products-v3">';
    echo '<h2>محصولات مشابه</h2>';
    echo '<div class="migeh-grid-container">';

    foreach ( $related_ids as $related_id ) {
        $rel_product = wc_get_product( $related_id );
        $link = get_permalink( $related_id );
        $image = get_the_post_thumbnail_url( $related_id, 'woocommerce_thumbnail' );
        $title = $rel_product->get_name();
        $price_html = $rel_product->get_price_html();
        $teacher_id = get_post_field( 'post_author', $related_id );
        $teacher_name = get_the_author_meta( 'display_name', $teacher_id );

        ?>
        <div class="migeh-card">
            <div class="migeh-card-img">
                <a href="<?php echo esc_url( $link ); ?>">
                    <img src="<?php echo $image ? esc_url( $image ) : wc_placeholder_img_src(); ?>" alt="<?php echo esc_attr( $title ); ?>">
                </a>
            </div>
            <div class="migeh-card-content">
                <div class="migeh-card-teacher">
                    <i class="far fa-chalkboard-teacher"></i> <?php echo esc_html( $teacher_name ); ?>
                </div>
                <h3 class="migeh-card-title">
                    <a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $title ); ?></a>
                </h3>
                <div class="migeh-card-price">
                    <?php echo $price_html; ?>
                </div>
            </div>
            <div class="migeh-card-action">
                <a href="<?php echo esc_url( $link ); ?>" class="migeh-btn">اطلاعات بیشتر</a>
            </div>
        </div>
        <?php
    }
    echo '</div></section>';

    // تزریق استایل‌های اصلاح شده
    ?>
    <style>
        /* مخفی سازی قطعی بخش قدیمی قالب */
        .related.products, .up-sells.products { display: none !important; }

        .migeh-related-products-v3 {
            margin: 80px auto;
            max-width: 1140px;
            padding: 0 15px;
            direction: rtl;
        }

        .migeh-related-products-v3 h2 {
            font-size: 24px !important;
            font-weight: 900;
            color: #240f3a;
            margin-bottom: 35px;
            border-right: 5px solid #ffcc00;
            padding-right: 15px;
            text-align: right;
        }

        .migeh-grid-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .migeh-card {
            background: #fff;
            border-radius: 20px;
            border: 1px solid #eee;
            display: flex;
            flex-direction: column;
            transition: 0.3s;
            overflow: hidden;
        }

        .migeh-card:hover { transform: translateY(-7px); box-shadow: 0 15px 30px rgba(0,0,0,0.07); }

        .migeh-card-img img { width: 100%; aspect-ratio: 16/9; object-fit: cover; display: block; }

        .migeh-card-content { padding: 20px; flex-grow: 1; text-align: right; }

        .migeh-card-teacher { font-size: 12px; color: #888; margin-bottom: 8px; }
        .migeh-card-teacher i { margin-left: 5px; color: #4a148c; }

        .migeh-card-title { margin: 0 0 15px 0 !important; min-height: 44px; }
        .migeh-card-title a { font-size: 15px !important; font-weight: 800; color: #333 !important; text-decoration: none !important; }

        /* اصلاح قیمت و حذف کلمه قیمت اضافی */
        .migeh-card-price {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            font-weight: 900;
            color: #240f3a;
            font-size: 16px;
            border-top: 1px solid #f5f5f5;
            padding-top: 12px;
        }
        /* چون get_price_html خودش ptitle دارد، آن را در اینجا استایل می‌دهیم */
        .migeh-card-price .ptitle { 
            font-size: 13px; 
            color: #888; 
            font-weight: normal;
            margin-left: 10px;
        }
        .migeh-card-price ins { text-decoration: none; }
        .migeh-card-price amount { color: #240f3a; }

        .migeh-card-action { padding: 0 20px 20px; }
        .migeh-btn {
            display: block;
            background: #f8f8f8;
            color: #555 !important;
            text-align: center;
            padding: 10px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 13px;
            text-decoration: none !important;
            transition: 0.3s;
        }
        .migeh-card:hover .migeh-btn { background: #240f3a; color: #fff !important; }

        @media (max-width: 992px) { .migeh-grid-container { grid-template-columns: repeat(2, 1fr); } }
        @media (max-width: 576px) { .migeh-grid-container { grid-template-columns: 1fr; } }
    </style>
    <?php
}