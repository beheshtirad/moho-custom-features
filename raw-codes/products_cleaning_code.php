/*
 * بازطراحی هدر محصول: نسخه نهایی (فیکس قیمت و کامنت)
 * حذف خط مزاحم قیمت + کامنت‌های فوق فشرده (این کد به صورت درج خودکار و اجرا در همه جا است)
 */

add_action('wp', 'coderboy_final_header_fix_init');

function coderboy_final_header_fix_init() {
    if (!is_product()) return;

    // ۱. ساخت هدر جدید
    add_action('woocommerce_before_single_product', 'coderboy_render_dynamic_header_v2', 5);
    
    // ۲. استایل‌ها
    add_action('wp_head', 'coderboy_final_styles_v2');
}

function coderboy_render_dynamic_header_v2() {
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
                                <i class="fa-solid fa-play"></i>
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
                                <i class="fa-solid fa-check-circle" style="color:#1c96e8;"></i>
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

function coderboy_final_styles_v2() {
    ?>
    <style>
        /* --- ۱. مخفی کردن بخش‌های قالب و حذفیات --- */
        .product-header, 
        .woocommerce-product-gallery, 
        .summary.entry-summary,
        li.woolearn_lessons_tab, 
        #tab-woolearn_lessons, 
        .woolearn-headlines,
        .woocommerce-product-rating, 
        .product-sidebar-widget--course-information,
        .product-sidebar-widget--course-author-products,
        .comment-form-description, hr.line, .separator, .view-wishlist {
            display: none !important;
        }

        /* --- ۲. استایل هدر جدید --- */
        .cb-modern-header {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.05);
            border: 1px solid #f0f0f0;
            padding: 100px;
            margin-bottom: 40px;
            margin-top: 20px;
        }

        /* تیتر */
        .cb-title-row {
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f5f5f5;
            text-align: right;
        }
        .cb-title-row h1 {
            font-size: 24px !important;
            font-weight: 900 !important;
            color: #222 !important;
            margin: 0 !important;
            line-height: 1.4;
        }

        /* بدنه */
        .cb-body-row {
            display: flex; gap: 100px; align-items: flex-start; margin-bottom: 25px;
        }
        .cb-gallery-col { width: 55%; position: relative; }
        .cb-info-col { width: 45%; }
        
        .cb-image-wrapper img {
            width: 100%; height: auto; border-radius: 16px; object-fit: cover;
        }

        /* دکمه ویدیو */
        .cb-video-trigger {
            position: absolute; top: 50%; left: 50%;
            transform: translate(-50%, -50%); z-index: 5;
        }
        .cb-video-trigger a {
            display: flex; align-items: center; justify-content: center;
            width: 65px; height: 65px;
            background: rgba(0,0,0,0.6); backdrop-filter: blur(5px);
            border-radius: 50%; color: #fff; font-size: 22px;
            border: 1px solid rgba(255,255,255,0.4);
            transition: 0.3s;
            text-decoration: none !important;
            border-bottom: none !important; 
        }
        .cb-video-trigger a:hover {
            background: #e84118; transform: scale(1.1); border-color: transparent;
        }

        /* لیست مشخصات */
        .cb-specs-list { list-style: none; padding: 0; margin: 0; }
        .cb-specs-list li {
            display: flex; justify-content: space-between;
            padding: 12px 0; border-bottom: 1px solid #f9f9f9; font-size: 14px;
        }
        .cb-specs-list li:last-child { border-bottom: none; }
        .cb-label { color: #888; }
        .cb-val, .cb-val a { color: #333; font-weight: bold; text-decoration: none !important; }

        /* --- ۳. فیکس قیمت (حذف خط مزاحم) --- */
        .cb-footer-row {
            background: #fdfdfd; border: 1px solid #eee; border-radius: 14px;
            padding: 12px 25px; display: flex; align-items: center; justify-content: space-between;
            width: 90%; margin: 0 auto;
        }
        
        /* حذف تمام استایل‌های خط‌دار از قیمت */
        .cb-price-wrapper,
        .cb-price-wrapper span,
        .cb-price-wrapper ins,
        .cb-price-wrapper bdi {
            text-decoration: none !important;
            border: none !important;
            box-shadow: none !important;
        }
        
        .cb-price-wrapper .amount { font-size: 24px; font-weight: 900; color: #000; }
        .cb-price-wrapper del { display: none; } 

        /* دکمه خرید */
        .cb-btn-wrapper button.single_add_to_cart_button {
            background: #e84118 !important; color: #fff !important;
            padding: 10px 25px !important; border-radius: 8px !important;
            font-size: 14px !important; border: none !important; margin: 0 !important;
        }

        /* --- ۴. بخش نظرات (کاملاً مینیمال و فشرده) --- */
        
        /* کانتینر اصلی فرم */
        #review_form_wrapper {
            padding: 15px !important; 
            background: #fafafa !important; 
            border: 1px solid #eee !important;
            border-radius: 12px !important; 
            margin-bottom: 20px !important;
        }
        
        /* حذف فاصله‌های اضافی فرم */
        #review_form { padding: 0 !important; margin: 0 !important; }
        .comment-respond { margin: 0 !important; padding: 0 !important; }
        
        /* تیتر بالای فرم (اولین نفری باشید...) */
        #reply-title { 
            font-size: 14px !important; 
            margin: 0 0 10px 0 !important; 
            display: block !important;
            color: #444 !important;
        }
        #reply-title small { display: none !important; }

        /* حذف لیبل‌ها و توضیحات */
        .comment-form-comment label, 
        .comment-form-rating label,
        .comment-notes { 
            display: none !important; 
        }
        
        /* باکس متن (Textarea) خیلی کوچک */
        #comment { 
            height: 100px !important; 
            min-height: 50px !important; /* قفل کردن ارتفاع */
            padding: 10px !important; 
            font-size: 13px !important;
            margin-bottom: 10px !important;
            border: 1px solid #ddd !important;
            border-radius: 8px !important;
        }
        
        /* دکمه ارسال دیدگاه */
        .form-submit { margin: 0 !important; padding: 0 !important; }
        .form-submit input#submit {
            padding: 6px 15px !important; 
            font-size: 12px !important;
            border-radius: 6px !important; 
            margin-top: 0 !important;
            width: auto !important;
        }
        
        /* لیست نظرات (اگر باشد) */
        #reviews { padding: 0 !important; margin: 0 !important; }
        #reviews .woocommerce-Reviews-title { 
            font-size: 16px !important; 
            margin-bottom: 10px !important; 
            display: block !important;
        }
        #comments ol.commentlist { padding: 0 !important; margin: 0 !important; }
        #comments ol.commentlist li .comment_container {
            padding: 10px !important; margin-bottom: 10px !important;
            border: 1px solid #f0f0f0 !important; border-radius: 10px !important;
            background: #fff !important;
        }
        #comments ol.commentlist li img.avatar {
            width: 30px !important; height: 30px !important; 
            padding: 0 !important; border: none !important;
        }
        #comments ol.commentlist li .comment-text { 
            margin-right: 40px !important; padding: 0 !important; border: none !important;
        }
        #comments ol.commentlist li .meta { font-size: 11px !important; margin-bottom: 5px !important; }
        #comments ol.commentlist li .description { font-size: 13px !important; }

        /* --- ۵. بهینه‌سازی موبایل (ارتفاع کم) --- */
        @media (max-width: 768px) {
            .cb-modern-header {
                padding: 15px !important;
                margin-top: 10px;
                border-radius: 15px;
            }
            .cb-title-row {
                margin-bottom: 15px; padding-bottom: 10px;
            }
            .cb-title-row h1 {
                font-size: 18px !important;
            }
            .cb-body-row {
                flex-direction: column; gap: 15px; margin-bottom: 15px;
            }
            .cb-gallery-col, .cb-info-col { width: 100%; }
            .cb-image-wrapper img { max-height: 250px; }
            
            .cb-specs-list li { padding: 8px 0; font-size: 13px; }
            
            .cb-footer-row {
                width: 100%; padding: 10px 15px; flex-direction: row;
            }
            .cb-price-wrapper .amount { font-size: 20px; }
            .cb-btn-wrapper button.single_add_to_cart_button { padding: 8px 15px !important; font-size: 13px !important; }
        }
    </style>
    <?php
}