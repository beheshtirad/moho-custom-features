<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * ==================================================================
 * 1. حذف فیلد توضیحات اضافی (Order Notes) از صفحه پرداخت
 * ==================================================================
 */
function moho_remove_checkout_notes( $fields ) {
    if ( isset($fields['order']['order_comments']) ) {
        unset($fields['order']['order_comments']);
    }
    return $fields;
}
add_filter( 'woocommerce_checkout_fields', 'moho_remove_checkout_notes' );


/**
 * ==================================================================
 * 2. راهنمای ایمیل سفارش (نسخه ایمن بدون HEREDOC)
 * ==================================================================
 */
function moho_videm_email_guide( $order, $sent_to_admin, $plain_text, $email ) {
    
    if ( $sent_to_admin ) return;

    // فقط در وضعیت در حال انجام یا تکمیل شده
    if ( ! ( $email->id == 'customer_processing_order' || $email->id == 'customer_completed_order' ) ) {
        return;
    }

    // بررسی وجود محصول ویدم
    $has_videm = false;
    $item_name = 'دوره آموزشی';
    $phone = $order->get_billing_phone(); 

    foreach ( $order->get_items() as $item ) {
        if ( strpos( $item->get_name(), 'ویدم' ) !== false ) {
            $has_videm = true;
            $item_name = esc_html($item->get_name());
            break;
        }
    }

    if ( ! $has_videm ) return;
    
    // شروع HTML خروجی
    ?>
    <style>
        @media only screen and (max-width: 600px) {
            .moho-email-dl-group { width: 100% !important; display: block !important; margin-bottom: 15px !important; padding: 0 !important; }
        }
    </style>

    <div class="moho-email-onboarding" style="font-family: Arial, 'tahoma', sans-serif; direction: rtl; text-align: right; background-color: #f7f7f7; border: 1px solid #ddd; border-radius: 15px; margin: 30px 0; padding: 10px;">
        
        <div style="background-color: #f9f9f9; border: 1px dashed #cccccc; border-radius: 10px; padding: 25px 20px; margin-bottom: 20px;">
            <h3 style="font-size: 20px; font-weight: 800; color: #240f3a; margin: 0 0 15px 0; border-bottom: 2px solid #ffcc00; padding-bottom: 5px; display: inline-block;">
                یک دستگاه، یک دسترسی
            </h3>
            <p style="font-size: 15px; color: #240f3a; margin: 15px 0 0 0;">
                <strong><?php echo $item_name; ?></strong> برای شما فعال شده است. لطفاً به یاد داشته باشید که دوره فقط با <strong>یک دستگاه</strong> قابل تماشا است.
            </p>
        </div>

        <div style="background-color: #f9f9f9; border: 1px dashed #cccccc; border-radius: 10px; padding: 25px 20px; margin-bottom: 20px;">
            <h3 style="font-size: 20px; font-weight: 800; color: #240f3a; margin: 0 0 15px 0; border-bottom: 2px solid #ffcc00; padding-bottom: 5px; display: inline-block;">
                دانلود پلیر و تماشای دوره
            </h3>
            <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-top: 25px;">
                <tr>
                    <td width="50%" class="moho-email-dl-group" valign="top" style="padding-right: 5px;">
                        <a href="https://videm.ir/app-universal-release.apk" style="display: block; background-color: #240f3a; color: #ffffff; text-decoration: none; padding: 12px; border-radius: 25px; text-align: center;">دانلود اندروید</a>
                    </td>
                    <td width="50%" class="moho-email-dl-group" valign="top" style="padding-left: 5px;">
                        <a href="https://sibapp.com/applications/VidEm" style="display: block; background-color: #240f3a; color: #ffffff; text-decoration: none; padding: 12px; border-radius: 25px; text-align: center;">دانلود آیفون (سیب‌اپ)</a>
                    </td>
                </tr>
                <tr><td height="10"></td></tr>
                <tr>
                    <td width="50%" class="moho-email-dl-group" valign="top" style="padding-right: 5px;">
                        <a href="https://videm.s3.ir-thr-at1.arvanstorage.ir/desktop/videm-1.2.4.zip" style="display: block; background-color: #240f3a; color: #ffffff; text-decoration: none; padding: 12px; border-radius: 25px; text-align: center;">ویندوز ۱۰+</a>
                    </td>
                    <td width="50%" class="moho-email-dl-group" valign="top" style="padding-left: 5px;">
                        <a href="https://videm.s3.ir-thr-at1.arvanstorage.ir/desktop/videm-1.2.4-arm.dmg" style="display: block; background-color: #240f3a; color: #ffffff; text-decoration: none; padding: 12px; border-radius: 25px; text-align: center;">مک (M1/M2)</a>
                    </td>
                </tr>
            </table>
        </div>

        <div style="background-color: #f9f9f9; border: 1px dashed #cccccc; border-radius: 10px; padding: 25px 20px;">
            <h3 style="font-size: 20px; font-weight: 800; color: #240f3a; margin: 0 0 15px 0; border-bottom: 2px solid #ffcc00; padding-bottom: 5px; display: inline-block;">
                ورود به دوره (قدم نهایی)
            </h3>
            <p style="font-size: 15px; color: #240f3a; margin: 15px 0 0 0;">
                پس از نصب، با شماره <strong><?php echo esc_html($phone); ?></strong> وارد شوید.
            </p>
        </div>

    </div>
    <?php
}
add_action( 'woocommerce_email_order_details', 'moho_videm_email_guide', 5, 4 );


/**
 * ==================================================================
 * 3. راهنمای صفحه سفارش (View Order)
 * ==================================================================
 */
function moho_videm_order_page_guide( $order ) {
    
    $has_videm_product = false;
    $item_name = 'دوره آموزشی';
    $phone = $order->get_billing_phone(); 

    foreach ( $order->get_items() as $item ) {
        if ( strpos( $item->get_name(), 'ویدم' ) !== false ) {
            $has_videm_product = true;
            $item_name = esc_html($item->get_name());
            break;
        }
    }

    if ( ! $has_videm_product ) return; 
    
    $order_status = $order->get_status();
    if ( $order_status !== 'processing' && $order_status !== 'completed' ) {
        return;
    }

    // آیکون‌ها
    $icon_info = '<i class="fa-solid fa-info-circle"></i>';
    $icon_download = '<i class="fa-solid fa-download"></i>';
    $icon_login = '<i class="fa-solid fa-right-to-bracket"></i>';

    // HTML خروجی
    ?>
    <div class="moho-onboarding-steps">
        
        <div class="moho-step-box" data-step="1">
            <h3 class="moho-step-title"><?php echo $icon_info; ?> یک دستگاه، یک دسترسی</h3>
            <p style="font-size: 15px; color: #240f3a; margin-top: 15px !important;">
                <strong><?php echo $item_name; ?></strong> فعال شد. دوره فقط روی <strong>یک دستگاه</strong> قابل مشاهده است.
            </p>
        </div>

        <div class="moho-step-box" data-step="2">
            <h3 class="moho-step-title"><?php echo $icon_download; ?> دانلود پلیر</h3>
            <div class="moho-dl-container-v4">
                
                <div class="moho-dl-group-v4">
                    <h4 class="moho-dl-group-title-v4">اندروید</h4>
                    <a href="https://videm.ir/app-universal-release.apk" target="_blank" class="moho-dl-button-v4">دانلود مستقیم</a>
                </div>

                <div class="moho-dl-group-v4">
                    <h4 class="moho-dl-group-title-v4">آیفون</h4>
                    <a href="https://sibapp.com/applications/VidEm" target="_blank" class="moho-dl-button-v4">سیب‌اپ</a>
                </div>

                <div class="moho-dl-group-v4">
                    <h4 class="moho-dl-group-title-v4">دسکتاپ</h4>
                    <a href="https://videm.s3.ir-thr-at1.arvanstorage.ir/desktop/videm-1.2.4.zip" target="_blank" class="moho-dl-button-v4">ویندوز</a>
                    <a href="https://videm.s3.ir-thr-at1.arvanstorage.ir/desktop/videm-1.2.4-arm.dmg" target="_blank" class="moho-dl-button-v4">مک</a>
                </div>

            </div>
        </div>

        <div class="moho-step-box" data-step="3"> 
            <h3 class="moho-step-title"><?php echo $icon_login; ?> ورود</h3>
            <p style="font-size: 15px; color: #240f3a; margin-top: 15px !important;">
                با شماره <strong><?php echo esc_html($phone); ?></strong> وارد شوید.
            </p>
        </div>

    </div>
    <?php
}
add_action( 'woocommerce_order_details_after_order_table', 'moho_videm_order_page_guide', 10 );


/**
 * ==================================================================
 * 4. بازطراحی صفحه محصول تکی (Single Product Redesign)
 * ==================================================================
 */

// اجرای هوک‌ها فقط در صفحه محصول
add_action('wp', 'moho_woocommerce_init');

function moho_woocommerce_init() {
    if (!is_product()) return;

    // الف) حذف بخش‌های پیش‌فرض قالب (Cleanup)
    remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
    
    // ب) اضافه کردن هدر جدید (جایگزین)
    add_action('woocommerce_before_single_product', 'moho_render_modern_product_header', 5);
}

// تابع ساخت هدر جدید
function moho_render_modern_product_header() {
    global $product;
    $product_id = $product->get_id();
    
    // دریافت اطلاعات
    $image_id  = $product->get_image_id();
    $image_url = wp_get_attachment_image_url($image_id, 'full');
    
    $teacher_id = get_post_field( 'post_author', $product_id );
    $teacher_name = get_the_author_meta( 'display_name', $teacher_id );
    
    $level = $product->get_attribute('سطح'); 
    $style = $product->get_attribute('سبک'); 
    
    ?>
    
    <div class="container cb-main-container">
        <div class="cb-modern-header">
            
            <div class="cb-title-row">
                <h1><?php the_title(); ?></h1>
            </div>

            <div class="cb-body-row">
                
                <div class="cb-gallery-col">
                    <div class="cb-image-wrapper">
                        <?php if ($image_url) : ?>
                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title(); ?>">
                        <?php else: ?>
                            <img src="<?php echo wc_placeholder_img_src(); ?>" alt="Placeholder">
                        <?php endif; ?>
                        
                        <div class="cb-video-trigger">
                            <a href="#product-intro-video" data-bs-toggle="modal" data-bs-target="#product-intro-video">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="24" height="24"><path d="M8 5v14l11-7z"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="cb-info-col">
                    <ul class="cb-specs-list">
                        <li>
                            <span class="cb-label">مدرس:</span>
                            <span class="cb-val">
                                <?php echo esc_html($teacher_name); ?> 
                                <span class="moho-verified-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22">
                                        <path d="M20.396 11c-.018-.646-.215-1.275-.57-1.816-.354-.54-.852-.972-1.438-1.246.223-.607.27-1.264.14-1.897-.131-.634-.437-1.218-.882-1.687-.47-.445-1.053-.75-1.687-.882-.633-.13-1.29-.083-1.897.14-.273-.587-.704-1.086-1.245-1.44S11.647 1.62 11 1.604c-.646.017-1.273.213-1.813.568s-.969.854-1.24 1.44c-.608-.223-1.267-.272-1.902-.14-.635.13-1.22.436-1.69.882-.445.47-.749 1.055-.878 1.688-.13.633-.08 1.29.144 1.896-.587.274-1.087.705-1.443 1.245-.356.54-.555 1.17-.574 1.817.02.647.218 1.276.574 1.817.356.54.856.972 1.443 1.245-.224.606-.274 1.263-.144 1.896.13.634.433 1.218.877 1.688.47.443 1.054.747 1.687.878.633.132 1.29.084 1.897-.136.274.586.705 1.084 1.246 1.439.54.354 1.17.551 1.816.569.647-.016 1.276-.213 1.817-.567s.972-.854 1.245-1.44c.604.239 1.266.296 1.903.164.636-.132 1.22-.447 1.68-.907.46-.46.776-1.044.908-1.681s.075-1.299-.165-1.903c.586-.274 1.084-.705 1.439-1.246.354-.54.551-1.17.569-1.816zM9.662 14.85l-3.429-3.428 1.293-1.302 2.072 2.072 4.4-4.794 1.347 1.246z" fill="#1d9bf0"/>
                                    </svg>
                                </span>
                            </span>
                        </li>
                        <li>
                            <span class="cb-label">دسته:</span>
                            <span class="cb-val"><?php echo wc_get_product_category_list($product_id); ?></span>
                        </li>
                        <?php if (!empty($level)) : ?>
                        <li>
                            <span class="cb-label">سطح:</span>
                            <span class="cb-val"><?php echo esc_html($level); ?></span>
                        </li>
                        <?php endif; ?>
                        <?php if (!empty($style)) : ?>
                        <li>
                            <span class="cb-label">سبک:</span>
                            <span class="cb-val"><?php echo esc_html($style); ?></span>
                        </li>
                        <?php endif; ?>
                        <li>
                            <span class="cb-label">شامل:</span>
                            <span class="cb-val">فایل‌های تمرین و پروژه</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="cb-footer-row">
                <div class="cb-price-wrapper">
                    <?php echo $product->get_price_html(); ?>
                </div>
                <div class="cb-btn-wrapper">
                    <?php woocommerce_template_single_add_to_cart(); ?>
                </div>
            </div>

        </div>
    </div>
    <?php
}

/**
 * ==================================================================
 * 5. محصولات مشابه اختصاصی (Custom Related Products)
 * ==================================================================
 */

// الف) حذف محصولات مشابه پیش‌فرض
function moho_remove_default_related_products() {
    if ( is_product() ) {
        remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
        remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
    }
}
add_action( 'wp', 'moho_remove_default_related_products' );

// ب) رندر بخش اختصاصی
add_action( 'woocommerce_after_single_product_summary', 'moho_render_custom_related_products', 25 );

function moho_render_custom_related_products() {
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
        
        if ( ! $rel_product ) continue;

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
                    <i class="fa-solid fa-chalkboard-teacher"></i> <?php echo esc_html( $teacher_name ); ?>
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
}