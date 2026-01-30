<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * ترجمه دستی رشته‌های پلاگین Digits
 * (چون فایل زبان افزونه گاهی درست لود نمی‌شود)
 */
function moho_translate_digits( $translated, $text, $domain ) {
    
    // فقط اگر رشته مربوط به دامنه 'digits' باشد
    if ( $domain === 'digits' ) {
        
        // لیست ترجمه‌های دستی
        switch ( $text ) {
            case 'Phone Verification':
                return 'تایید شماره تلفن';
            
            case 'Please enter the OTP sent to your phone':
                return 'کد تایید پیامک شده را وارد کنید';
            
            case 'Verify':
                return 'بررسی کد';
                
            case 'Resend OTP':
                return 'ارسال مجدد کد';
                
            case 'Invalid OTP':
                return 'کد وارد شده اشتباه است';
        }
    }
    
    return $translated;
}
// هوک کردن به توابع ترجمه وردپرس
add_filter( 'gettext', 'moho_translate_digits', 99, 3 );
add_filter( 'ngettext', 'moho_translate_digits', 99, 3 );

/**
 * کلیک‌خور کردن تصاویر بندانگشتی در صفحه آرشیو وبلاگ
 * این اسکریپت فقط در فوتر صفحات آرشیو لود می‌شود
 */
function moho_clickable_archive_thumbnails() {
    if ( is_archive() || is_home() ) {
        ?>
        <script>
        jQuery(document).ready(function($) {
            // پیدا کردن کارت‌های بلاگ و لینک‌دار کردن تصویر
            $('article.card-blog').each(function() {
                var link = $(this).find('h2.card-title a').attr('href');
                var thumb = $(this).find('.card-header figure.card-thumbnail');
                // اگر لینک هست ولی تصویر لینک ندارد
                if (link && thumb.length && thumb.parent('a').length === 0) {
                    thumb.wrap('<a href="' + link + '" style="display:block;"></a>');
                }
            });
        });
        </script>
        <?php
    }
}
add_action( 'wp_footer', 'moho_clickable_archive_thumbnails' );

/**
 * افزودن خودکار CTA به انتهای پست‌های دسته ایلوستریتور
 */
function moho_auto_insert_cta_illustrator( $content ) {
    // شرط: فقط در صفحات داخلی نوشته‌ها (Single Post) و اگر در دسته 'illustrator-lessons' باشد
    // نکته: has_category هم با ID کار می‌کند هم با Slug (نامک)
    if ( is_single() && has_category( 'illustrator-lessons' ) ) { 
        
        // فراخوانی شورت‌کد
        $cta = do_shortcode( '[moho_illustrator_cta]' );
        
        // اگر شورت‌کد کار نکرد (خروجی متنی بود)، آن را نشان نده تا زشت نشود
        if ( $cta === '[moho_illustrator_cta]' ) {
            return $content;
        }

        // چسباندن CTA به انتهای محتوا
        return $content . $cta;
    }
    
    return $content;
}
add_filter( 'the_content', 'moho_auto_insert_cta_illustrator' );