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