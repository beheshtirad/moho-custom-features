<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * 1. حذف فیلد توضیحات اضافی (Order Notes) از صفحه پرداخت
 */
function moho_remove_checkout_notes( $fields ) {
    // بررسی وجود فیلد قبل از حذف (برای جلوگیری از ارور احتمالی)
    if ( isset($fields['order']['order_comments']) ) {
        unset($fields['order']['order_comments']);
    }
    return $fields;
}
add_filter( 'woocommerce_checkout_fields', 'moho_remove_checkout_notes' );

/**
 * 2. اضافه کردن راهنمای کامل "ویدم" به ایمیل‌های سفارش
 * (نسخه کامل با لینک‌های دانلود و استایل اختصاصی)
 */
function moho_videm_email_guide( $order, $sent_to_admin, $plain_text, $email ) {
    
    // 1. خروج اگر ایمیل برای مدیر است
    if ( $sent_to_admin ) return;

    // 2. خروج اگر وضعیت سفارش "در حال انجام" یا "تکمیل شده" نیست
    // (چون فقط در این مراحل دسترسی کاربر باز می‌شود)
    if ( ! ( $email->id == 'customer_processing_order' || $email->id == 'customer_completed_order' ) ) {
        return;
    }

    // 3. بررسی: آیا محصول "ویدم" در سبد خرید هست؟
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
    
    // 4. شروع ساختار HTML ایمیل
    // از روش HEREDOC استفاده می‌کنیم که کد تمیز بماند
    $html_guide = <<<HTML

<style>
    /* ریسپانسیو برای موبایل در ایمیل */
    @media only screen and (max-width: 600px) {
        .moho-email-dl-group {
            width: 100% !important;
            display: block !important;
            margin-bottom: 15px !important;
            padding: 0 !important;
        }
    }
</style>

<div class="moho-email-onboarding" style="font-family: Arial, 'tahoma', sans-serif; direction: rtl; text-align: right; background-color: #f7f7f7; border: 1px solid #ddd; border-radius: 15px; margin: 30px 0; padding: 10px;">

    <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td style="padding: 20px;">
                <div style="background-color: #f9f9f9; border: 1px dashed #cccccc; border-radius: 10px; padding: 25px 20px; position: relative; text-align: right;">
                    <h3 style="font-size: 20px; font-weight: 800; color: #240f3a; margin-top: 0; margin-bottom: 15px; border-bottom: 2px solid #ffcc00; padding-bottom: 5px; display: inline-block;">
                        <img src="https://img.icons8.com/color/24/000000/info.png" width="24" height="24" style="vertical-align: middle; margin-left: 10px;"/> یک دستگاه، یک دسترسی
                    </h3>
                    <p style="font-size: 15px; color: #240f3a; margin: 15px 0 0 0;">
                        <strong>{$item_name}</strong> برای شما فعال شده است. لطفاً به یاد داشته باشید که دوره فقط با <strong>یک دستگاه</strong> قابل تماشا است.
                    </p>
                    <p style="font-size: 15px; color: #45a249; font-weight: 700; margin: 10px 0 0 0;">
                        <strong style="color: #45a249;">لطفاً برای داشتن بهترین تجربه آموزشی در انتخاب خودتون دقت کنید : )</strong>
                    </p>
                </div>
            </td>
        </tr>
    </table>

    <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td style="padding: 0 20px 20px 20px;">
                <div style="background-color: #f9f9f9; border: 1px dashed #cccccc; border-radius: 10px; padding: 25px 20px; position: relative; text-align: right;">
                    <h3 style="font-size: 20px; font-weight: 800; color: #240f3a; margin-top: 0; margin-bottom: 15px; border-bottom: 2px solid #ffcc00; padding-bottom: 5px; display: inline-block;">
                        <img src="https://img.icons8.com/color/24/000000/download--v1.png" width="24" height="24" style="vertical-align: middle; margin-left: 10px;"/> دانلود پلیر و تماشای دوره
                    </h3>
                    <p style="font-size: 15px; color: #240f3a; margin: 15px 0 0 0;">
                        لطفاً دستگاه خود را انتخاب کرده و پلیر را دانلود کنید.
                    </p>

                    <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-top: 25px; min-width: 100% !important;">
                        <tr>
                            <td width="50%" class="moho-email-dl-group" valign="top" style="padding-right: 5px;">
                                <div style="background: #ffffff; border-radius: 30px; border: 1px solid rgba(36, 15, 58, 0.1); padding: 15px; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
                                    <h4 style="text-align: center; font-size: 16px; font-weight: 700; color: #240f3a; margin: 0 0 15px 0; border-bottom: 1px solid #eee; padding-bottom: 10px;">
                                        <img src="https://img.icons8.com/color/24/000000/android-os.png" width="24" height="24" style="vertical-align: middle; margin-left: 5px;"/> اندروید
                                    </h4>
                                    <a href="https://videm.ir/app-universal-release.apk" target="_blank" style="display: block; background-color: #240f3a; color: #ffffff; text-decoration: none; padding: 12px; border-radius: 25px; font-size: 14px; font-weight: 700; text-align: center;"> دانلود مستقیم اندروید</a>
                                </div>
                            </td>
                            <td width="50%" class="moho-email-dl-group" valign="top" style="padding-left: 5px;">
                                <div style="background: #ffffff; border-radius: 30px; border: 1px solid rgba(36, 15, 58, 0.1); padding: 15px; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
                                    <h4 style="text-align: center; font-size: 16px; font-weight: 700; color: #240f3a; margin: 0 0 15px 0; border-bottom: 1px solid #eee; padding-bottom: 10px;">
                                        <img src="https://img.icons8.com/ios-filled/24/000000/mac-os.png" width="24" height="24" style="vertical-align: middle; margin-left: 5px;"/> آیفون
                                    </h4>
                                    <a href="https://sibapp.com/applications/VidEm" target="_blank" style="display: block; background-color: #240f3a; color: #ffffff; text-decoration: none; padding: 12px; border-radius: 25px; font-size: 14px; font-weight: 700; text-align: center;">دانلود از سیب‌اپ</a>
                                </div>
                            </td>
                        </tr>
                        <tr><td style="font-size: 15px; line-height: 15px;">&nbsp;</td></tr> 
                        <tr>
                            <td width="50%" class="moho-email-dl-group" valign="top" style="padding-right: 5px;">
                                <div style="background: #ffffff; border-radius: 30px; border: 1px solid rgba(36, 15, 58, 0.1); padding: 15px; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
                                    <h4 style="text-align: center; font-size: 16px; font-weight: 700; color: #240f3a; margin: 0 0 15px 0; border-bottom: 1px solid #eee; padding-bottom: 10px;">
                                        <img src="https://img.icons8.com/color/24/000000/windows-10.png" width="24" height="24" style="vertical-align: middle; margin-left: 5px;"/> ویندوز
                                    </h4>
                                    <a href="https://videm.s3.ir-thr-at1.arvanstorage.ir/desktop/videm-1.2.4.zip" target="_blank" style="display: block; background-color: #240f3a; color: #ffffff; text-decoration: none; padding: 12px; border-radius: 25px; font-size: 14px; font-weight: 700; text-align: center; margin-bottom: 5px;">ویندوز ۱۰ به بالا</a>
                                    <a href="https://videm.s3.ir-thr-at1.arvanstorage.ir/desktop/videm-1.2.0_7-8.zip" target="_blank" style="display: block; background-color: #777; color: #ffffff; text-decoration: none; padding: 10px; border-radius: 25px; font-size: 12px; font-weight: 700; text-align: center;">ویندوز ۷/۸</a>
                                </div>
                            </td>
                            <td width="50%" class="moho-email-dl-group" valign="top" style="padding-left: 5px;">
                                <div style="background: #ffffff; border-radius: 30px; border: 1px solid rgba(36, 15, 58, 0.1); padding: 15px; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
                                    <h4 style="text-align: center; font-size: 16px; font-weight: 700; color: #240f3a; margin: 0 0 15px 0; border-bottom: 1px solid #eee; padding-bottom: 10px;">
                                        <img src="https://img.icons8.com/ios-filled/24/000000/laptop.png" width="24" height="24" style="vertical-align: middle; margin-left: 5px;"/> مک
                                    </h4>
                                    <a href="https://videm.s3.ir-thr-at1.arvanstorage.ir/desktop/videm-1.2.4-arm.dmg" target="_blank" style="display: block; background-color: #240f3a; color: #ffffff; text-decoration: none; padding: 12px; border-radius: 25px; font-size: 14px; font-weight: 700; text-align: center; margin-bottom: 5px;">نسخه مک (M)</a>
                                    <a href="https://videm.s3.ir-thr-at1.arvanstorage.ir/desktop/videm-1.2.4-intel.dmg" target="_blank" style="display: block; background-color: #777; color: #ffffff; text-decoration: none; padding: 10px; border-radius: 25px; font-size: 12px; font-weight: 700; text-align: center;">نسخه مک (Intel)</a>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>

    <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td style="padding: 0 20px 20px 20px;">
                <div style="background-color: #f9f9f9; border: 1px dashed #cccccc; border-radius: 10px; padding: 25px 20px; position: relative; text-align: right;">
                    <h3 style="font-size: 20px; font-weight: 800; color: #240f3a; margin-top: 0; margin-bottom: 15px; border-bottom: 2px solid #ffcc00; padding-bottom: 5px; display: inline-block;">
                        <img src="https://img.icons8.com/color/24/000000/login-rounded-right.png" width="24" height="24" style="vertical-align: middle; margin-left: 10px;"/> ورود به دوره (قدم نهایی)
                    </h3>
                    <p style="font-size: 15px; color: #240f3a; line-height: 1.6; margin: 15px 0 0 0;">
                        پس از نصب نرم‌افزار، لطفاً با <strong>شماره تماس <span style="color:#4CAF50; font-weight:bold; font-size: 16px; direction: ltr; display: inline-block;">$phone</span></strong> وارد اپلیکیشن شوید.
                    </p>
                    <p style="font-size: 15px; color: #240f3a; line-height: 1.6; margin: 10px 0 0 0;">
                        <strong>تبریک!</strong> دوره $item_name در حساب کاربری‌تان فعال است.
                    </p>
                </div>
            </td>
        </tr>
    </table>

</div>

HTML;

    echo $html_guide;
}
add_action( 'woocommerce_email_order_details', 'moho_videm_email_guide', 5, 4 );

/**
 * 3. نمایش راهنمای "ویدم" در صفحه جزئیات سفارش (View Order)
 * (جایگزین نسخه قدیمی V4.2)
 */
function moho_videm_order_page_guide( $order ) {
    
    // 1. بررسی: فقط اگر محصول ویدم باشد
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
    
    // 2. بررسی: فقط اگر وضعیت سفارش تکمیل یا در حال انجام باشد
    $order_status = $order->get_status();
    if ( $order_status !== 'processing' && $order_status !== 'completed' ) {
        return;
    }

    // --- تعریف آیکون‌ها (SVG) ---
    $svg_android = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 50 50" fill="currentColor"><path d="M 16.28125 0.03125 C 16.152344 0.0546875 16.019531 0.078125 15.90625 0.15625 C 15.449219 0.464844 15.347656 1.105469 15.65625 1.5625 L 17.8125 4.78125 C 14.480469 6.546875 11.996094 9.480469 11.1875 13 L 38.8125 13 C 38.003906 9.480469 35.519531 6.546875 32.1875 4.78125 L 34.34375 1.5625 C 34.652344 1.105469 34.550781 0.464844 34.09375 0.15625 C 33.632813 -0.152344 32.996094 -0.0195313 32.6875 0.4375 L 30.3125 3.9375 C 28.664063 3.335938 26.875 3 25 3 C 23.125 3 21.335938 3.335938 19.6875 3.9375 L 17.3125 0.4375 C 17.082031 0.09375 16.664063 -0.0429688 16.28125 0.03125 Z M 19.5 8 C 20.328125 8 21 8.671875 21 9.5 C 21 10.332031 20.328125 11 19.5 11 C 18.667969 11 18 10.332031 18 9.5 C 18 8.671875 18.667969 8 19.5 8 Z M 30.5 8 C 31.332031 8 32 8.671875 32 9.5 C 32 10.332031 31.332031 11 30.5 11 C 29.671875 11 29 10.332031 29 9.5 C 29 8.671875 29.671875 8 30.5 8 Z M 8 15 C 6.34375 15 5 16.34375 5 18 L 5 32 C 5 33.65625 6.34375 35 8 35 C 8.351563 35 8.6875 34.925781 9 34.8125 L 9 15.1875 C 8.6875 15.074219 8.351563 15 8 15 Z M 11 15 L 11 37 C 11 38.652344 12.347656 40 14 40 L 36 40 C 37.652344 40 39 38.652344 39 37 L 39 15 Z M 42 15 C 41.648438 15 41.3125 15.074219 41 15.1875 L 41 34.8125 C 41.3125 34.921875 41.648438 35 42 35 C 43.65625 35 45 33.65625 45 32 L 45 18 C 45 16.34375 43.65625 15 42 15 Z M 15 42 L 15 46 C 15 48.207031 16.792969 50 19 50 C 21.207031 50 23 48.207031 23 46 L 23 42 Z M 27 42 L 27 46 C 27 48.207031 28.792969 50 31 50 C 33.207031 50 35 48.207031 35 46 L 35 42 Z"></path></svg>';
    
    $svg_apple = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 50 50" fill="currentColor"><path d="M 44.527344 34.75 C 43.449219 37.144531 42.929688 38.214844 41.542969 40.328125 C 39.601563 43.28125 36.863281 46.96875 33.480469 46.992188 C 30.46875 47.019531 29.691406 45.027344 25.601563 45.0625 C 21.515625 45.082031 20.664063 47.03125 17.648438 47 C 14.261719 46.96875 11.671875 43.648438 9.730469 40.699219 C 4.300781 32.429688 3.726563 22.734375 7.082031 17.578125 C 9.457031 13.921875 13.210938 11.773438 16.738281 11.773438 C 20.332031 11.773438 22.589844 13.746094 25.558594 13.746094 C 28.441406 13.746094 30.195313 11.769531 34.351563 11.769531 C 37.492188 11.769531 40.8125 13.480469 43.1875 16.433594 C 35.421875 20.691406 36.683594 31.78125 44.527344 34.75 Z M 31.195313 8.46875 C 32.707031 6.527344 33.855469 3.789063 33.4375 1 C 30.972656 1.167969 28.089844 2.742188 26.40625 4.78125 C 24.878906 6.640625 23.613281 9.398438 24.105469 12.066406 C 26.796875 12.152344 29.582031 10.546875 31.195313 8.46875 Z"></path></svg>';
    
    $svg_windows = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 50 50" fill="currentColor"><path d="M19.852 7.761l-15 2.25C4.362 10.085 4 10.505 4 11v12c0 .553.448 1 1 1h15c.552 0 1-.447 1-1V8.75c0-.291-.127-.567-.348-.758C20.432 7.803 20.139 7.721 19.852 7.761zM45.652 4.242c-.22-.189-.512-.271-.801-.231l-21 3.15C23.362 7.235 23 7.655 23 8.15V23c0 .553.448 1 1 1h21c.552 0 1-.447 1-1V5C46 4.709 45.873 4.433 45.652 4.242zM20 26H5c-.552 0-1 .447-1 1v12c0 .495.362.915.852.989l15 2.25c.05.007.099.011.148.011.238 0 .47-.085.652-.242C20.873 41.817 21 41.541 21 41.25V27C21 26.447 20.552 26 20 26zM45 26H24c-.552 0-1 .447-1 1v14.85c0 .495.362.915.852.989l21 3.15C44.901 45.996 44.951 46 45 46c.238 0 .47-.085.652-.242C45.873 45.567 46 45.291 46 45V27C46 26.447 45.552 26 45 26z"></path></svg>';

    // --- اطلاعات دانلود ---
    $devices = [
        'mobile' => [
            'name' => 'اندروید', 
            'svg' => $svg_android,
            'versions' => [
                ['name' => 'دانلود مستقیم', 'link' => 'https://videm.ir/app-universal-release.apk', 'desc' => '(پیشنهاد محمد میگه)'],
            ]
        ],
        'ios' => [
            'name' => 'آیفون', 
            'svg' => $svg_apple,
            'versions' => [
                ['name' => 'دانلود از سیب‌اپ', 'link' => 'https://sibapp.com/applications/VidEm', 'desc' => '(توصیه شده برای iOS)'],
            ]
        ],
        'desktop_win' => [
            'name' => 'دسکتاپ (ویندوز)', 
            'svg' => $svg_windows,
            'versions' => [
                ['name' => 'ویندوز ۱۰ به بالا', 'link' => 'https://videm.s3.ir-thr-at1.arvanstorage.ir/desktop/videm-1.2.4.zip', 'desc' => '(سیستم‌عامل‌های جدید)'],
                ['name' => 'ویندوز ۷ و ۸', 'link' => 'https://videm.s3.ir-thr-at1.arvanstorage.ir/desktop/videm-1.2.0_7-8.zip', 'desc' => '(نسخه قدیمی‌تر)'],
            ]
        ],
        'desktop_mac' => [
            'name' => 'مک', 
            'svg' => $svg_apple,
            'versions' => [
                ['name' => 'مک M (آرم)', 'link' => 'https://videm.s3.ir-thr-at1.arvanstorage.ir/desktop/videm-1.2.4-arm.dmg', 'desc' => '(چیپ‌های M1/M2/M3)'],
                ['name' => 'مک اینتل', 'link' => 'https://videm.s3.ir-thr-at1.arvanstorage.ir/desktop/videm-1.2.4-intel.dmg', 'desc' => '(چیپ‌های قدیمی‌تر اینتل)'],
            ]
        ]
    ];
    
    // --- خروجی HTML (بدون استایل داخلی) ---
    echo '<div class="moho-onboarding-steps">';
    
    // مرحله 1
    echo '
        <div class="moho-step-box" data-step="1">
            <h3 class="moho-step-title"><i class="fa-solid fa-info-circle"></i> یک دستگاه، یک دسترسی</h3>
            
            <p style="font-size: 15px; color: #240f3a; margin-top: 15px !important;">
                <strong>' . $item_name . '</strong> برای شما فعال شده است. لطفاً برای حفظ امنیت محتوا، به یاد داشته باشید که دوره فقط با <strong>یک دستگاه (موبایل یا دسکتاپ)</strong> قابل تماشا است.
            </p>
            <p style="font-size: 15px; color: #240f3a; font-weight: 700;">
                <strong style="color: #45a249;">لطفاً در انتخاب خودتون دقت کنید که بهترین تجربه آموزشی رو داشته باشین : ) </strong>
            </p>
        </div>';

    // مرحله 2
    echo '
        <div class="moho-step-box" data-step="2">
            <h3 class="moho-step-title"><i class="fa-solid fa-download"></i> دانلود پلیر و تماشای دوره</h3>
            <p style="font-size: 15px; color: #240f3a; margin-top: 15px !important;">
                لطفاً دستگاه خود را انتخاب کرده و پلیر را دانلود کنید. پس از نصب، با شماره تماس خود وارد شوید.
            </p>

            <div class="moho-dl-container-v4">';
    
    // حلقه دکمه‌ها
    foreach ($devices as $key => $device) {
        echo '
            <div class="moho-dl-group-v4">
                <h4 class="moho-dl-group-title-v4">
                    ' . $device['svg'] . '
                    ' . $device['name'] . '
                </h4>';
        
        foreach ($device['versions'] as $version) {
            echo '
                <a href="' . $version['link'] . '" target="_blank" class="moho-dl-button-v4">
                    ' . $version['name'] . '
                    <small>' . $version['desc'] . '</small>
                </a>';
        }
        echo '</div>'; // بستن گروه
    }

    echo '  </div> </div> ';

    // مرحله 3
    echo '
        <div class="moho-step-box" data-step="3"> 
            <h3 class="moho-step-title"><i class="fa-solid fa-right-to-bracket"></i> ورود به دوره (قدم نهایی)</h3>
            
            <p style="font-size: 15px; color: #240f3a; line-height: 1.6; margin-top: 15px !important;">
                پس از نصب نرم‌افزار، لطفاً با <strong>شماره تماس <span style="color:#4CAF50; font-weight:bold;">' . esc_html($phone) . '</span></strong> وارد اپلیکیشن شوید.
            </p>
            <p style="font-size: 15px; color: #240f3a; line-height: 1.6;">
                <strong>تبریک!</strong> دوره ' . $item_name . ' در حساب کاربری‌تان فعال است.
            </p>
            <p style="font-size: 12px; color: #240f3a; line-height: 1.6; margin-top: 15px !important;">
                با مهر و دوستی و به امید موفقیت شما در مسیر یادگیری.
            </p>
        </div>

    </div>'; // بستن کل باکس
}
add_action( 'woocommerce_order_details_after_order_table', 'moho_videm_order_page_guide', 10 );