<?php
/*
Plugin Name: Moho Custom Features
Description: پلاگین اختصاصی سایت محمد میگه - شامل دانلود باکس، اصلاحات ووکامرس و استایل‌های سفارشی
Version: 2.1.0
Author: Mohamad Migeh
Author URI: https://github.com/beheshtirad
*/

if ( ! defined( 'ABSPATH' ) ) exit; // امنیت: جلوگیری از دسترسی مستقیم

// تعریف مسیرهای پلاگین
define( 'MOHO_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'MOHO_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

/**
 * 1. فراخوانی فایل‌های استایل (CSS)
 * این تابع فایل استایل ما را در تمام صفحات سایت لود می‌کند.
 */
function moho_enqueue_assets() {
    // فایل CSS اصلی با ورژن‌بندی داینامیک (برای جلوگیری از کش شدن در زمان آپدیت)
    wp_enqueue_style( 
        'moho-custom-style', 
        MOHO_PLUGIN_URL . 'assets/css/moho-style.css', 
        array(), 
        '2.1.0' 
    );
}
add_action( 'wp_enqueue_scripts', 'moho_enqueue_assets' );

/**
 * 2. فراخوانی ماژول‌های PHP (مغزهای متفکر)
 */
require_once MOHO_PLUGIN_DIR . 'includes/moho-shortcodes.php';   // دانلود باکس و ابزارها
require_once MOHO_PLUGIN_DIR . 'includes/moho-woocommerce.php'; // تنظیمات فروشگاه
require_once MOHO_PLUGIN_DIR . 'includes/moho-tweaks.php';      // ترجمه‌ها و ریزه‌کاری‌ها