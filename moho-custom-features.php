<?php
/*
Plugin Name: Moho Custom Features
Description: پلاگین اختصاصی سایت محمد میگه - شامل دانلود باکس، اصلاحات ووکامرس و ترجمه‌ها
Version: 1.0.0
Author: Mohamad Migeh
Author URI: https://mohamadmigeh.com
*/

// جلوگیری از دسترسی مستقیم به فایل
if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

// ==================================================================
// 1. شورت‌کد دانلود باکس (Download Box)
// ==================================================================
if ( ! function_exists( 'moho_download_box_shortcode' ) ) {
    function moho_download_box_shortcode( $atts ) {
        $a = shortcode_atts( array(
            'url'      => '#',
            'filename' => 'دانلود فایل ضمیمه', 
        ), $atts );

        $file_url = esc_url( $a['url'] );
        $file_name = esc_html( $a['filename'] );
        $password = 'mohamadmigeh.com';

        ob_start();
        ?>
        <div class="moho-dl-wrapper">
            <div class="moho-dl-box-v2">
                <div class="moho-dl-info-v2">
                    <div class="moho-dl-icon-v2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="28" height="28"><path d="M12 15.5c.28 0 .53-.11.71-.29l4-4a1.003 1.003 0 0 0-1.42-1.42L13 12.09V4a1 1 0 0 0-2 0v8.09l-2.29-2.3a1.003 1.003 0 0 0-1.42 1.42l4 4c.18.18.43.29.71.29zM19 18H5a1 1 0 0 0 0 2h14a1 1 0 0 0 0-2z"/></svg>
                    </div>
                    <div class="moho-dl-text-v2">
                        <span>فایل‌های تمرین این درس</span>
                        <small><?php echo $file_name; ?></small>
                    </div>
                </div>
                <a href="<?php echo $file_url; ?>" class="moho-dl-button-v2" download><span>دانلود</span></a>
            </div>
            <div class="moho-dl-password-tab" onclick="mohoCopyPassword('<?php echo $password; ?>', this)">
                <span>پسورد فایل: <?php echo $password; ?></span>
            </div>
        </div>
        <script>
        if (typeof mohoCopyPassword !== 'function') {
            function mohoCopyPassword(text, el) {
                navigator.clipboard.writeText(text).then(function() {
                    alert('پسورد کپی شد: ' + text);
                });
            }
        }
        </script>
        <?php
        return ob_get_clean();
    }
}
add_shortcode( 'moho_download_box', 'moho_download_box_shortcode' );


// ==================================================================
// 2. اصلاحات ووکامرس (Checkout & Orders)
// ==================================================================

// حذف فیلد توضیحات اضافی از صفحه پرداخت
if ( ! function_exists( 'moho_remove_checkout_notes' ) ) {
    function moho_remove_checkout_notes( $fields ) {
        unset($fields['order']['order_comments']);
        return $fields;
    }
}
add_filter( 'woocommerce_checkout_fields', 'moho_remove_checkout_notes' );

// راهنمای ویدم در ایمیل‌های سفارش
if ( ! function_exists( 'moho_videm_email_guide' ) ) {
    function moho_videm_email_guide( $order, $sent_to_admin, $plain_text, $email ) {
        if ( $sent_to_admin ) return;
        
        $has_videm = false;
        foreach ( $order->get_items() as $item ) {
            if ( strpos( $item->get_name(), 'ویدم' ) !== false ) {
                $has_videm = true; break;
            }
        }
        if ( ! $has_videm ) return;

        echo '<div style="direction:rtl; text-align:right; background:#f9f9f9; padding:20px; border-radius:10px; margin-top:20px;">
                <h3 style="color:#240f3a;">دانلود پلیر اختصاصی ویدم</h3>
                <p>برای مشاهده دوره، لطفا اپلیکیشن ویدم را دانلود کرده و با شماره موبایل سفارش خود وارد شوید.</p>
                <a href="https://videm.ir/app-universal-release.apk" style="background:#240f3a; color:#fff; padding:10px 20px; text-decoration:none; border-radius:20px; display:inline-block;">دانلود اندروید</a>
              </div>';
    }
}
add_action( 'woocommerce_email_order_details', 'moho_videm_email_guide', 5, 4 );


// ==================================================================
// 3. ترجمه پلاگین دیجیتس (Digits Translations)
// ==================================================================
if ( ! function_exists( 'moho_translate_digits' ) ) {
    function moho_translate_digits( $translated, $text, $domain ) {
        if ( $domain === 'digits' ) {
            if ( $text === 'Phone Verification' ) return 'تایید شماره تلفن';
            if ( $text === 'Please enter the OTP sent to your phone' ) return 'کد تایید پیامک شده را وارد کنید';
        }
        return $translated;
    }
}
add_filter( 'gettext', 'moho_translate_digits', 99, 3 );


// ==================================================================
// 4. اصلاحات آرشیو وبلاگ (Clickable Thumbnails)
// ==================================================================
if ( ! function_exists( 'moho_clickable_archive_thumbnails' ) ) {
    function moho_clickable_archive_thumbnails() {
        if ( is_archive() ) {
            ?>
            <script>
            jQuery(document).ready(function($) {
                $('article.card-blog').each(function() {
                    var link = $(this).find('h2.card-title a').attr('href');
                    var thumb = $(this).find('.card-header figure.card-thumbnail');
                    if (link && thumb.length && thumb.parent('a').length === 0) {
                        thumb.wrap('<a href="' + link + '"></a>');
                    }
                });
            });
            </script>
            <?php
        }
    }
}
add_action( 'wp_footer', 'moho_clickable_archive_thumbnails' );