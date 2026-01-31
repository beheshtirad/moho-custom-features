<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * ==================================================================
 * 1. شورت‌کد پروفایل درباره من
 * استفاده: [moho_about_profile]
 * ==================================================================
 */
function moho_about_profile_shortcode() {
    ob_start();
    ?>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        corePlugins: {
          preflight: false,
        }
      }
    </script>
    
    <div class="relative z-0 w-full my-10 px-4 bg-transparent flex !justify-center" dir="rtl">
        
        <div class="flex flex-col md:!flex-row-reverse !items-center !justify-center w-full md:!w-fit max-w-[1000px]">

            <div class="w-[60%] max-w-[300px] md:w-[320px] aspect-square md:aspect-auto md:h-[440px] shrink-0 relative z-0 !mx-0">
                <img src="https://mohamadmigeh.com/wp-content/uploads/2025/12/mohoprof1-e1765399500624.jpg" alt="Profile" class="w-full h-full object-cover rounded-[2.5rem] shadow-xl">
            </div>

            <div class="flex-col w-full max-w-[600px] z-10 -mt-12 md:mt-0 md:-ml-10 relative px-0">
                <div class="bg-[#24133f] text-white rounded-[2.5rem] shadow-2xl overflow-hidden flex flex-col w-full">
                    
                    <div class="px-6 pt-4 pb-0 md:px-10 text-center md:text-right">
                        <h1 class="text-2xl md:text-3xl font-black mb-1 text-white">محمد بهشتی راد</h1>
                        <h3 class="text-base md:text-xl font-medium text-gray-300">ویژوال دیزاینر و موشن دیزاینر</h3>
                    </div>

                    <div class="bg-white rounded-[2rem] mx-2 mb-2 p-5 md:p-8 mt-2 flex flex-col gap-2">
                        
                        <div class="text-justify leading-7 md:leading-9 text-sm md:text-lg space-y-4 font-light text-[#333]">
                            <p>
                                داستان من با انیمیشن و ویژوال دیزاین شروع شد. بیش از ۸ ساله که در دنیای هنر دیجیتال نفس می‌کشم؛ از انیمیت کردن کاراکترهای بازی‌های موبایلی (مثل بازی پوکه که جایزه بهترین دستاورد هنری و بهترین بازی اکشن موبایلی سال رو برد) تا تدریس در آموزشگاه‌ها و دانشگاه‌های هنر (شریعتی و انستیتو ملی بازی‌سازی).
                            </p>
                            <p>
                                من همیشه یک دغدغه داشتم: "چرا آموزش‌های نرم‌افزار انقدر خشک و پیچیده هستن؟" به خاطر همین تصمیم گرفتم تمام تجربیاتم رو که در پروژه‌های واقعی و کلاس‌های درس به دست آوردم، در قالب دوره‌هایی مثل «طراحی قدرتمند» منتشر کنم.
                            </p>
                            <p>
                                در این دوره، من فقط یک مدرس نیستم؛ من هم‌تیمی تو هستم تا با هم یاد بگیریم چطور از ابزارهای سرد و خشک، آثار هنری و پولساز خلق کنیم.
                            </p>
                        </div>

                        <div class="flex flex-wrap justify-center md:justify-end items-center gap-2 md:gap-4 text-[#24133f]">
                            
                            <a href="https://mohoraad.framer.website/" target="_blank" class="group">
                                <div class="w-10 h-10 md:w-12 md:h-12 rounded-full border-2 border-[#24133f]/30 flex items-center justify-center transition-all group-hover:bg-[#24133f] group-hover:text-white group-hover:border-[#24133f]">
                                    <div class="scale-[0.65] md:scale-75">
                                        <svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M23.5093 5.48829C23.1149 5.09375 22.6467 4.78078 22.1313 4.56725C21.6159 4.35372 21.0635 4.24381 20.5057 4.24381C19.9479 4.24381 19.3955 4.35372 18.8801 4.56725C18.3647 4.78078 17.8965 5.09375 17.5021 5.48829L12.9983 9.99632L9.99583 6.98955L14.4996 2.4879C15.2883 1.69914 16.2247 1.07346 17.2552 0.646585C18.2857 0.21971 19.3903 0 20.5057 0C21.6211 0 22.7257 0.21971 23.7562 0.646585C24.7867 1.07346 25.7231 1.69914 26.5118 2.4879L28.0131 3.98703L27.8219 4.17814C28.7787 5.79995 29.1693 7.6937 28.9326 9.56172C28.6958 11.4297 27.845 13.1661 26.5139 14.498L22.0101 19.0017L19.0055 15.9992L23.5114 11.4955C23.9059 11.1011 24.2189 10.6328 24.4324 10.1175C24.646 9.6021 24.7559 9.04972 24.7559 8.49187C24.7559 7.93403 24.646 7.38164 24.4324 6.86628C24.2189 6.35092 23.9059 5.88267 23.5114 5.48829H23.5093ZM5.48993 23.5077C5.88431 23.9022 6.35256 24.2152 6.86792 24.4287C7.38328 24.6422 7.93566 24.7521 8.49351 24.7521C9.05136 24.7521 9.60374 24.6422 10.1191 24.4287C10.6345 24.2152 11.1027 23.9022 11.4971 23.5077L16.0009 19.0017L19.0034 22.0064L14.4996 26.5059C13.7109 27.2947 12.7745 27.9204 11.744 28.3472C10.7135 28.7741 9.60895 28.9938 8.49351 28.9938C7.37807 28.9938 6.27355 28.7741 5.24302 28.3472C4.21249 27.9204 3.27613 27.2947 2.48742 26.5059L0.986158 25.0068L1.17727 24.8157C0.221076 23.1941 -0.169305 21.3008 0.0674554 19.4332C0.304216 17.5656 1.1547 15.8297 2.48529 14.498L6.98907 9.99419L9.99796 12.9967L5.48993 17.5005C5.0954 17.8949 4.78242 18.3631 4.56889 18.8785C4.35536 19.3938 4.24545 19.9462 4.24545 20.5041C4.24545 21.0619 4.35536 21.6143 4.56889 22.1297C4.78242 22.645 5.0954 23.1133 5.48993 23.5077Z" fill="currentColor"/>
                                            <path d="M20.5045 11.4932L17.502 8.49072L8.49445 17.4983L11.497 20.5008L20.5045 11.4932Z" fill="currentColor"/>
                                        </svg>
                                    </div>
                                </div>
                            </a>

                            <a href="https://instagram.com/mohoraad" target="_blank" class="group">
                                <div class="w-10 h-10 md:w-12 md:h-12 rounded-full border-2 border-[#24133f]/30 flex items-center justify-center transition-all group-hover:bg-[#24133f] group-hover:text-white group-hover:border-[#24133f]">
                                    <div class="scale-[0.65] md:scale-75">
                                        <svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M14.4994 9.67357C11.8273 9.67357 9.67314 11.8486 9.67314 14.5C9.67314 17.1514 11.848 19.3264 14.4994 19.3264C17.1507 19.3264 19.3256 17.1514 19.3256 14.5C19.3256 11.8486 17.1507 9.67357 14.4994 9.67357ZM28.9987 14.5C28.9987 12.4907 28.9987 10.5229 28.8951 8.51357C28.7916 6.19357 28.253 4.12214 26.5545 2.44429C24.856 0.745714 22.8054 0.207143 20.4855 0.103571C18.4763 -1.00317e-07 16.5086 0 14.4994 0C12.4902 0 10.5224 -1.00317e-07 8.51319 0.103571C6.1933 0.207143 4.12196 0.745714 2.44418 2.44429C0.745681 4.14286 0.207134 6.19357 0.103567 8.51357C-1.00312e-07 10.5229 0 12.4907 0 14.5C0 16.5093 -1.00312e-07 18.4771 0.103567 20.4864C0.207134 22.8064 0.745681 24.8779 2.44418 26.5557C4.14267 28.2543 6.1933 28.7929 8.51319 28.8964C10.5224 29 12.4902 29 14.4994 29C16.5086 29 18.4763 29 20.4855 28.8964C22.8054 28.7929 24.8767 28.2543 26.5545 26.5557C28.253 24.8571 28.7916 22.8064 28.8951 20.4864C29.0194 18.4979 28.9987 16.5093 28.9987 14.5ZM14.4994 21.9364C10.3774 21.9364 7.06326 18.6221 7.06326 14.5C7.06326 10.3779 10.3774 7.06357 14.4994 7.06357C18.6213 7.06357 21.9355 10.3779 21.9355 14.5C21.9355 18.6221 18.6213 21.9364 14.4994 21.9364ZM22.2462 8.49286C21.2933 8.49286 20.5062 7.72643 20.5062 6.75286C20.5062 5.77929 21.2726 5.01286 22.2462 5.01286C23.2197 5.01286 23.9861 5.77929 23.9861 6.75286C23.9913 6.97975 23.9499 7.20531 23.8644 7.41554C23.7789 7.62577 23.6511 7.81619 23.489 7.975C23.3302 8.13714 23.1397 8.26493 22.9295 8.35045C22.7193 8.43596 22.4938 8.47738 22.2669 8.47214L22.2462 8.49286Z" fill="currentColor"/>
                                        </svg>
                                    </div>
                                </div>
                            </a>

                            <a href="https://www.linkedin.com/in/mohoraad/" target="_blank" class="group">
                                <div class="w-10 h-10 md:w-12 md:h-12 rounded-full border-2 border-[#24133f]/30 flex items-center justify-center transition-all group-hover:bg-[#24133f] group-hover:text-white group-hover:border-[#24133f]">
                                    <div class="scale-[0.65] md:scale-75">
                                        <svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M25.7778 0C26.6324 0 27.4519 0.339483 28.0562 0.943767C28.6605 1.54805 29 2.36764 29 3.22222V25.7778C29 26.6324 28.6605 27.4519 28.0562 28.0562C27.4519 28.6605 26.6324 29 25.7778 29H3.22222C2.36764 29 1.54805 28.6605 0.943767 28.0562C0.339483 27.4519 0 26.6324 0 25.7778V3.22222C0 2.36764 0.339483 1.54805 0.943767 0.943767C1.54805 0.339483 2.36764 0 3.22222 0H25.7778ZM24.9722 24.9722V16.4333C24.9722 15.0404 24.4189 13.7044 23.4339 12.7195C22.4489 11.7345 21.113 11.1811 19.72 11.1811C18.3506 11.1811 16.7556 12.0189 15.9822 13.2756V11.4872H11.4872V24.9722H15.9822V17.0294C15.9822 15.7889 16.9811 14.7739 18.2217 14.7739C18.8199 14.7739 19.3936 15.0115 19.8166 15.4345C20.2396 15.8575 20.4772 16.4312 20.4772 17.0294V24.9722H24.9722ZM6.25111 8.95778C6.96896 8.95778 7.65742 8.67261 8.16501 8.16501C8.67261 7.65742 8.95778 6.96896 8.95778 6.25111C8.95778 4.75278 7.74944 3.52833 6.25111 3.52833C5.52899 3.52833 4.83644 3.8152 4.32582 4.32582C3.8152 4.83644 3.52833 5.52899 3.52833 6.25111C3.52833 7.74944 4.75278 8.95778 6.25111 8.95778ZM8.49056 24.9722V11.4872H4.02778V24.9722H8.49056Z" fill="currentColor"/>
                                        </svg>
                                    </div>
                                </div>
                            </a>

                            <a href="https://www.youtube.com/@MohamadMigeh" target="_blank" class="group">
                                <div class="w-10 h-10 md:w-12 md:h-12 rounded-full border-2 border-[#24133f]/30 flex items-center justify-center transition-all group-hover:bg-[#24133f] group-hover:text-white group-hover:border-[#24133f]">
                                    <div class="scale-[0.65] md:scale-75">
                                        <svg width="29" height="20" viewBox="0 0 29 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.6 14.2857L19.1255 10L11.6 5.71429V14.2857ZM28.362 3.1C28.5505 3.77143 28.681 4.67143 28.768 5.81429C28.8695 6.95714 28.913 7.94286 28.913 8.8L29 10C29 13.1286 28.768 15.4286 28.362 16.9C27.9995 18.1857 27.1585 19.0143 25.8535 19.3714C25.172 19.5571 23.925 19.6857 22.011 19.7714C20.126 19.8714 18.4005 19.9143 16.8055 19.9143L14.5 20C8.4245 20 4.64 19.7714 3.1465 19.3714C1.8415 19.0143 1.0005 18.1857 0.638 16.9C0.4495 16.2286 0.319 15.3286 0.232 14.1857C0.1305 13.0429 0.0869999 12.0571 0.0869999 11.2L0 10C0 6.87143 0.232 4.57143 0.638 3.1C1.0005 1.81429 1.8415 0.985714 3.1465 0.628572C3.828 0.442857 5.075 0.314286 6.989 0.228571C8.874 0.128571 10.5995 0.0857142 12.1945 0.0857142L14.5 0C20.5755 0 24.36 0.228572 25.8535 0.628572C27.1585 0.985714 27.9995 1.81429 28.362 3.1Z" fill="currentColor"/>
                                        </svg>
                                    </div>
                                </div>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode( 'moho_about_profile', 'moho_about_profile_shortcode' );


/**
 * ==================================================================
 * 2. شورت‌کد باکس CTA ایلوستریتور
 * استفاده: [moho_illustrator_cta]
 * ==================================================================
 */
function moho_illustrator_cta_shortcode() {
    ob_start();
    ?>
    <div class="migeh-cta-block" dir="rtl">
      
      <div class="migeh-cta-header">
        <h3>از یادگیری این درس لذت بردی؟</h3>
        <p>مسیر یادگیریت رو با این گزینه‌ها کامل‌تر کن:</p>
      </div>

      <div class="migeh-cta-links">

        <a href="https://mohamadmigeh.com/product/illustrator-powerful-design/" class="migeh-cta-card premium" target="_blank" rel="noopener noreferrer">
          <div class="migeh-cta-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17 1H7c-1.1 0-2 .9-2 2v18c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2V3c0-1.1-.9-2-2-2zm0 18H7V5h10v14zM12 15l-4-4h2.5V8h3v3H16l-4 4z"/></svg>
          </div>
          <div class="migeh-cta-content">
            <h4>🔥 پکیج کامل آفلاین (پیشنهاد ویژه)</h4>
            <p>دانلود ۱۸۰+ ویدیوی فتوشاپ و ایلوستریتور روی موبایل (بدون تبلیغ و فیلترشکن)</p>
          </div>
          <div class="migeh-cta-arrow">›</div>
        </a>

        <a href="https://mohamadmigeh.com/courses/illustrator-powerful-design/" class="migeh-cta-card hub" target="_blank" rel="noopener noreferrer">
          <div class="migeh-cta-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M14 17H4v2h10v-2zm6-8H4v2h16V9zM4 15h16v-2H4v2zM4 5v2h16V5H4z"/></svg>
          </div>
          <div class="migeh-cta-content">
            <h4>🔗 مشاهده سرفصل‌های کامل دوره</h4>
            <p>لیست کامل ۹۸ درس و پروژه‌های دوره رایگان «طراحی قدرتمند» را ببین.</p>
          </div>
          <div class="migeh-cta-arrow">›</div>
        </a>

        <a href="https://www.youtube.com/watch?v=njJf-iPcv4E&list=PLZNpo7BuYWRKMpFQyMB7zFzqnXB9qRZYp&pp=gAQBiAQB" class="migeh-cta-card youtube" target="_blank" rel="noopener noreferrer">
          <div class="migeh-cta-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.58 7.19c-.23-.86-.9-1.52-1.76-1.76C18.25 5 12 5 12 5s-6.25 0-7.82.42c-.86.23-1.52.9-1.76 1.76C2 8.75 2 12 2 12s0 3.25.42 4.81c.23.86.9 1.52 1.76 1.76C5.75 19 12 19 12 19s6.25 0 7.82-.42c.86-.23 1.52-.9 1.76-1.76C22 15.25 22 12 22 12s0-3.25-.42-4.81zM9.5 15.5V8.5l6 3.5-6 3.5z"/></svg>
          </div>
          <div class="migeh-cta-content">
            <h4>📺 تماشای این دوره در یوتیوب</h4>
            <p>پلی‌لیست کامل و رایگان دوره «طراحی قدرتمند» را در کانال «محمد میگه» ببین.</p>
          </div>
          <div class="migeh-cta-arrow">›</div>
        </a>

      </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode( 'moho_illustrator_cta', 'moho_illustrator_cta_shortcode' );


/**
 * ==================================================================
 * 3. شورت‌کد دانلود باکس پیشرفته (نسخه 7.0 - نهایی)
 * استفاده: [moho_download_box url="..." filename="..."]
 * ==================================================================
 */

// تابع اصلی ساخت خروجی (با نام متفاوت از تابع Wrapper)
function moho_download_box_render( $atts ) {
    $a = shortcode_atts( array(
        'url'      => '#',
        'filename' => 'دانلود فایل ضمیمه', 
    ), $atts );

    $file_url = esc_url( $a['url'] );
    $file_name = esc_html( $a['filename'] );
    $password_text = 'mohamadmigeh.com';

    ob_start();
    ?>
    <div class="moho-dl-wrapper">
        <div class="moho-dl-box-v2">
            <div class="moho-dl-info-v2">
                <div class="moho-dl-icon-v2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="24" height="24"><path d="M12 15.5c.28 0 .53-.11.71-.29l4-4a1.003 1.003 0 0 0-1.42-1.42L13 12.09V4a1 1 0 0 0-2 0v8.09l-2.29-2.3a1.003 1.003 0 0 0-1.42 1.42l4 4c.18.18.43.29.71.29zM19 18H5a1 1 0 0 0 0 2h14a1 1 0 0 0 0-2z"/></svg>
                </div>
                <div class="moho-dl-text-v2">
                    <span>فایل‌های تمرین این درس</span>
                    <small><?php echo $file_name; ?></small>
                </div>
            </div>
            <a href="<?php echo $file_url; ?>" class="moho-dl-button-v2" download>
                <span>دانلود</span>
            </a>
        </div>
        
        <div class="moho-dl-password-tab" onclick="mohoCopyPassword('<?php echo $password_text; ?>', this)">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="16" height="16" style="margin-left:5px;"><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zM9 6c0-1.66 1.34-3 3-3s3 1.34 3 3v2H9V6z"/></svg>
            <span>پسورد فایل: <?php echo $password_text; ?></span>
        </div>
    </div>

    <script>
    if (typeof mohoCopyPassword !== 'function') {
        function mohoCopyPassword(textToCopy, element) {
            navigator.clipboard.writeText(textToCopy).then(function() {
                // ساخت نوتیفیکیشن اگر وجود نداشته باشد
                var notification = document.getElementById('moho-copy-notification');
                if (!notification) {
                    notification = document.createElement('div');
                    notification.id = 'moho-copy-notification';
                    notification.className = 'moho-notification-toast';
                    notification.innerText = 'پسورد کپی شد! حالا می‌تونی فایل رو باز کنی.';
                    document.body.appendChild(notification);
                }
                
                // ریست کردن انیمیشن
                notification.classList.remove('show');
                void notification.offsetWidth; // Trigger reflow
                notification.classList.add('show');
                
                // پنهان کردن بعد از ۳ ثانیه
                setTimeout(function() {
                    notification.classList.remove('show');
                }, 3000);
            }, function(err) {
                alert('خطا در کپی کردن: ' + err);
            });
        }
    }
    </script>
    <?php
    return ob_get_clean();
}

/**
 * تابع Wrapper برای جلوگیری از خرابکاری wpautop (اضافه کردن <p> خالی)
 */
function moho_download_box_shortcode( $atts ) {
    // 1. غیرفعال کردن پاراگراف‌ساز خودکار
    remove_filter( 'the_content', 'wpautop' );
    
    // 2. ساخت خروجی
    $output = moho_download_box_render( $atts );
    
    // 3. فعال کردن دوباره پاراگراف‌ساز (برای بقیه محتوای سایت)
    add_filter( 'the_content', 'wpautop' );
    
    return $output;
}
// ثبت مجدد شورت‌کد
add_shortcode( 'moho_download_box', 'moho_download_box_shortcode' );

/**
 * ==================================================================
 * 4. شورت‌کد "برای چه کسانی مناسب است" (Who For)
 * استفاده: [moho_who_for]
 * ==================================================================
 */
function moho_who_for_shortcode() {
    ob_start();
    ?>
    <section id="who-for" dir="rtl" aria-labelledby="who-for-heading">
      <div class="who-wrap">
        <div class="who-grid">
          
          <article class="who-card" role="article" aria-labelledby="who-1-title">
            <div class="who-num">۱</div>
            <div class="who-icon" aria-hidden="true">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10 0C4.47 0 0 4.47 0 10C0 15.53 4.47 20 10 20C15.53 20 20 15.53 20 10C20 4.47 15.53 0 10 0ZM10 18C5.58 18 2 14.42 2 10C2 5.58 5.58 2 10 2C14.42 2 18 5.58 18 10C18 14.42 14.42 18 10 18Z" fill="#704fe6"/></svg>
            </div>
            <div>
              <h3 id="who-1-title" class="who-title">تازه‌واردها (Absolute Beginners)</h3>
              <p class="who-desc">هیچ چیزی از گرافیک نمی‌دونی؟ عالیه. از نصب نرم‌افزار تا کشیدن اولین خط را مرحله‌به‌مرحله پوشش می‌دهیم. هیچ پیش‌نیازی لازم نیست، فقط کنجکاوی!</p>
            </div>
          </article>

          <article class="who-card" role="article" aria-labelledby="who-2-title">
            <div class="who-num">۲</div>
            <div class="who-icon" aria-hidden="true">
              <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.75 0C0.551088 0 0.360322 0.0790176 0.21967 0.21967C0.0790176 0.360322 0 0.551088 0 0.75L0 11.25C0 11.664 0.336 12 0.75 12H11.25C11.4489 12 11.6397 11.921 11.7803 11.7803C11.921 11.6397 12 11.4489 12 11.25V0.75C12 0.551088 11.921 0.360322 11.7803 0.21967C11.6397 0.0790176 11.4489 0 11.25 0L0.75 0ZM9.729 3.75C9.879 3.75 10.002 3.872 10.002 4.023V6.092C10.0018 6.1459 9.98562 6.19853 9.95555 6.24325C9.92548 6.28798 9.88283 6.3228 9.833 6.34334C9.78317 6.36387 9.72837 6.36919 9.67552 6.35863C9.62266 6.34807 9.57412 6.3221 9.536 6.284L8.854 5.603L6.854 7.603C6.80755 7.64956 6.75238 7.68651 6.69163 7.71171C6.63089 7.73692 6.56577 7.74989 6.5 7.74989C6.43423 7.74989 6.36911 7.73692 6.30837 7.71171C6.24762 7.68651 6.19245 7.64956 6.146 7.603L5 6.458L2.854 8.604C2.76011 8.69789 2.63278 8.75063 2.5 8.75063C2.36722 8.75063 2.23989 8.69789 2.146 8.604C2.05211 8.51011 1.99937 8.38278 1.99937 8.25C1.99937 8.11722 2.05211 7.98989 2.146 7.896L4.646 5.396C4.69245 5.34944 4.74762 5.31249 4.80837 5.28729C4.86911 5.26208 4.93423 5.24911 5 5.24911C5.06577 5.24911 5.13089 5.26208 5.19163 5.28729C5.25238 5.31249 5.30755 5.34944 5.354 5.396L6.5 6.543L8.147 4.896L7.467 4.216C7.42884 4.17782 7.40285 4.12918 7.39232 4.07624C7.38179 4.02329 7.3872 3.96841 7.40786 3.91854C7.42851 3.86866 7.46349 3.82603 7.50837 3.79603C7.55325 3.76604 7.60602 3.75002 7.66 3.75H9.729Z" fill="#704fe6"/></svg>
            </div>
            <div>
              <h3 id="who-2-title" class="who-title">ارتقا دهندگان (Intermediate)</h3>
              <p class="who-desc">چیزهایی بلدی ولی می‌خوای اصولی‌تر و حرفه‌ای‌تر بشی؟ این مسیر بهت مهارت‌های تمیز و قابل ارائه یاد می‌دهد و ترفندهای کاربردی را پوشش می‌دهد.</p>
            </div>
          </article>

          <article class="who-card" role="article" aria-labelledby="who-3-title">
            <div class="who-num">۳</div>
            <div class="who-icon" aria-hidden="true">
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M16.5558 3.76196e-08C16.821 3.76196e-08 17.0754 0.105357 17.2629 0.292893C17.4504 0.48043 17.5558 0.734784 17.5558 1V6.657C17.5558 6.81335 17.5192 6.96752 17.4489 7.10715C17.3785 7.24678 17.2764 7.36798 17.1508 7.461L9.95279 12.781L10.8988 13.728C11.0863 13.9155 11.1916 14.1698 11.1916 14.435C11.1916 14.7002 11.0863 14.9545 10.8988 15.142L9.48479 16.556C9.33637 16.7043 9.14506 16.8021 8.93796 16.8357C8.73086 16.8693 8.51844 16.8368 8.33079 16.743L6.14679 15.652L4.53479 17.263C4.34726 17.4505 4.09295 17.5558 3.82779 17.5558C3.56262 17.5558 3.30831 17.4505 3.12079 17.263L0.292787 14.435C0.105316 14.2475 0 13.9932 0 13.728C0 13.4628 0.105316 13.2085 0.292787 13.021L1.90379 11.409L0.812787 9.225C0.718959 9.03734 0.68653 8.82493 0.72009 8.61783C0.75365 8.41072 0.851499 8.21942 0.999787 8.071L2.41379 6.657C2.60131 6.46953 2.85562 6.36421 3.12079 6.36421C3.38595 6.36421 3.64026 6.46953 3.82779 6.657L4.77479 7.603L10.0948 0.405C10.1878 0.279342 10.309 0.177246 10.4486 0.10691C10.5883 0.0365737 10.7424 -4.28435e-05 10.8988 3.76196e-08H16.5558Z" fill="#704fe6"/></svg>
            </div>
            <div>
              <h3 id="who-3-title" class="who-title">فراری‌ها از دردسر (Focus Seekers)</h3>
              <p class="who-desc">خسته از قطع و وصل فیلترشکن، تبلیغات و مصرف زیاد اینترنت؟ این بسته طوری طراحی شده که تمرکز روی یادگیری حفظ شود و حواس‌پرتی حذف گردد.</p>
            </div>
          </article>

          <article class="who-card" role="article" aria-labelledby="who-4-title">
            <div class="who-num">۴</div>
            <div class="who-icon" aria-hidden="true">
              <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 19C1.45 19 0.979333 18.8043 0.588 18.413C0.196667 18.0217 0.000666667 17.5507 0 17V6C0 5.45 0.196 4.97933 0.588 4.588C0.98 4.19667 1.45067 4.00067 2 4H6V2C6 1.45 6.196 0.979333 6.588 0.588C6.98 0.196667 7.45067 0.000666667 8 0H12C12.55 0 13.021 0.196 13.413 0.588C13.805 0.98 14.0007 1.45067 14 2V4H18C18.55 4 19.021 4.196 19.413 4.588C19.805 4.98 20.0007 5.45067 20 6V17C20 17.55 19.8043 18.021 19.413 18.413C19.0217 18.805 18.5507 19.0007 18 19H2ZM8 4H12V2H8V4Z" fill="#704fe6"/></svg>
            </div>
            <div>
              <h3 id="who-4-title" class="who-title">جویندگان بازار کار (Career Seekers)</h3>
              <p class="who-desc">می‌خوای از مهارتت درآمد بسازی؟ دوره پروژه‌محور است و در پایان نمونه‌کارهایی خواهی داشت که می‌توانی مستقیم در رزومه‌ات قرار دهی.</p>
            </div>
          </article>

        </div>
      </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode( 'moho_who_for', 'moho_who_for_shortcode' );

/**
 * ==================================================================
 * 5. شورت‌کد اپلیکیشن سرفصل‌های ایلوستریتور (React Stack)
 * استفاده: [moho_illustrator_app]
 * ==================================================================
 */
function moho_illustrator_app_shortcode() {
    ob_start();
    ?>
    <div id="react-illustration-app" style="font-family: inherit; direction: rtl;">
        
        <script src="https://cdn.tailwindcss.com"></script>
        <script crossorigin src="https://unpkg.com/react@18/umd/react.production.min.js"></script>
        <script crossorigin src="https://unpkg.com/react-dom@18/umd/react-dom.production.min.js"></script>
        <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>

        <script>
            tailwind.config = {
                corePlugins: {
                    preflight: false, // غیرفعال کردن ریست برای حفظ استایل قالب
                }
            }
        </script>

        <div id="root-illustrator-app"></div>

        <script type="text/babel">
            // --- ابزارهای کمکی ---
            const toPersianDigits = (num) => {
               const id = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
               return num.toString().replace(/[0-9]/g, (w) => id[+w]);
            };

            // --- داده‌ها ---
            const CARD_DATA = [
              {
                id: 1,
                subtitle: "بخش ۱ - مقدماتی (Absolute Basics)",
                title: "👶 قدم‌های اولیه",
                description: "قبل از اینکه وارد دنیای حرفه‌ای طراحی شوید، باید الفبا را یاد بگیرید! در این بخش، ترس شما از نرم‌افزار می‌ریزد. از نصب اصولی ایلاستریتور گرفته تا اولین کلیک‌ها و شناخت محیط کار.",
                points: ["راز یادگیری اصولی برای بازار کار", "دانلود و نصب ایلوستریتور + نکات مهم نصب", "ترفندهای حرفه‌ای کار با آرت‌بورد"],
                category: "The Baby Steps",
                step: "۱ از ۱۳",
                color: "#FF5733",
                imageUrl: "https://mohamadmigeh.com/wp-content/uploads/2025/12/1.jpg"
              },
              {
                id: 2,
                subtitle: "بخش ۲ - مقدماتی (Basics)",
                title: "❤️ اولین قرار با اشکال ",
                description: "درست مثل یک قرار اول، این بخش برای آشنایی بیشتر و احساس راحتی با نرم‌افزار است. یاد می‌گیرید چطور اشکال را بسازید، ترکیب کنید و مثل خمیر بازی آن‌ها را تغییر دهید.",
                points: ["ساخت اشکال دقیق و حرفه‌ای", "پروژه عملی: طراحی گربه فلت حرفه‌ای", "پروژه عملی: طراحی لوگو (آسان‌ترین روش!)"],
                category: "Working With Objects",
                step: "۲ از ۱۳",
                color: "#33FF57",
                imageUrl: "https://mohamadmigeh.com/wp-content/uploads/2025/12/2.jpg"
              },
              {
                id: 3,
                subtitle: "بخش ۳ - مقدماتی (Basics)",
                title: "🎨 لباس نو برای طرح‌ها",
                description: "طرح خام کافی نیست؛ باید به آن روح بدهیم! در این بخش یاد می‌گیرید چطور با رنگ‌ها، گرادینت‌ها و افکت‌ها بازی کنید تا طرح‌هایتان از خوب به خیره‌کننده تبدیل شوند.",
                points: ["ترفندهای Fill و Stroke", "تحول در طراحی با پنل Appearance", "پروژه عملی: طراحی کاراکتر جغد"],
                category: "Everything About Appearance",
                step: "۳ از ۱۳",
                color: "#3357FF",
                imageUrl: "https://mohamadmigeh.com/wp-content/uploads/2025/12/3.jpg"
              },
              {
                id: 4,
                subtitle: "بخش ۴ - متوسط (Intermediate)",
                title: "🖌️ ابزارهای پیکاسو",
                description: "کی گفته برای طراح شدن باید نقاش باشی؟ در این بخش ابزارهای اصلی تصویرسازی ایلاستریتور را در دست می‌گیرید. با یادگیری Pen Tool می‌توانید هر چیزی که در ذهن دارید را خلق کنید.",
                points: ["کشیدن خطوط صاف و نرم", "تسلط بر ابزار Pen Tool", "پروژه جامع: تصویرسازی کامل"],
                category: "Illustration Tools",
                step: "۴ از ۱۳",
                color: "#FF33A8",
                imageUrl: "https://mohamadmigeh.com/wp-content/uploads/2025/12/4.jpg"
              },
              {
                id: 5,
                subtitle: "بخش ۵ - متوسط (Intermediate)",
                title: "🪄 قلم‌های جادویی",
                description: "وقت آن است که کمی جادو کنیم! در این بخش یاد می‌گیرید چطور براش‌های اختصاصی خودتان را بسازید. از کالیگرافی و تایپوگرافی لوگو گرفته تا ایجاد بافت‌های نویزی.",
                points: ["طراحی لوگوتایپ و کالیگرافی", "ساخت انواع براش اختصاصی", "تکنیک سایه‌زنی نویزی"],
                category: "Magic Brushes",
                step: "۵ از ۱۳",
                color: "#F39C12",
                imageUrl: "https://mohamadmigeh.com/wp-content/uploads/2025/12/5.jpg"
              },
              {
                id: 6,
                subtitle: "بخش ۶ - متوسط (Intermediate)",
                title: "👑 تایپوگرافی پادشاه است",
                description: "در این بخش، افسار کلمات را به دست می‌گیرید! یاد می‌گیرید چطور متن‌ها را خم کنید، روی مسیر بنویسید و حتی جلد کتاب‌های سه‌بعدی طراحی کنید.",
                points: ["تایپوگرافی حرفه‌ای و استایل‌ها", "تایپ روی مسیر و Text Warp", "پروژه عملی: طراحی جلد کتاب"],
                category: "Typography is the Boss",
                step: "۶ از ۱۳",
                color: "#9B59B6",
                imageUrl: "https://mohamadmigeh.com/wp-content/uploads/2025/12/6.jpg"
              },
              {
                id: 7,
                subtitle: "بخش ۷ - پیشرفته",
                title: "🎭 هنر پنهان‌سازی",
                description: "با ماسک‌ها تصاویر را ترکیب کنید و کلاژهای هنری بسازید.",
                points: ["انواع ماسک (Clipping & Opacity)", "کراپ کردن حرفه‌ای تصاویر", "پروژه عملی: تصویرسازی خلاقانه"],
                category: "Masking",
                step: "۷ از ۱۳",
                color: "#1ABC9C",
                imageUrl: "https://mohamadmigeh.com/wp-content/uploads/2025/12/7.jpg"
              },
              {
                id: 8,
                subtitle: "بخش ۸ - پیشرفته",
                title: "🚀 تکنیک‌های نابغه",
                description: "تکنیک‌های خاص مثل طراحی‌های متقارن و افکت‌های پیچیده.",
                points: ["طراحی قرینه و رسم ماندالا", "افکت‌های سه‌بعدی پیشرفته", "ساخت تایپ‌های فانتزی"],
                category: "Pro Skills",
                step: "۸ از ۱۳",
                color: "#E74C3C",
                imageUrl: "https://mohamadmigeh.com/wp-content/uploads/2025/12/8.jpg"
              },
              {
                id: 9,
                subtitle: "بخش ۹ - پیشرفته",
                title: "📊 نمودارها",
                description: "تبدیل داده‌های خشک اکسل به گرافیک‌های مدرن و جذاب.",
                points: ["ساخت نمودار حرفه‌ای با Graph Tool", "استایل‌دهی گرافیکی به آمار", "طراحی نمودار سطحی پیشرفته"],
                category: "Data Viz",
                step: "۹ از ۱۳",
                color: "#34495E",
                imageUrl: "https://mohamadmigeh.com/wp-content/uploads/2025/12/9.jpg"
              },
              {
                id: 10,
                subtitle: "بخش ۱۰ - پیشرفته",
                title: "🧩 جشن پترن‌ها",
                description: "ساخت پترن‌های تکرارشونده برای پارچه و کاغذ دیواری.",
                points: ["تبدیل عکس به وکتور (Image Trace)", "ساخت پترن‌های بدون درز", "جادوی تغییر رنگ (Recolor Artwork)"],
                category: "Patterns",
                step: "۱۰ از ۱۳",
                color: "#D35400",
                imageUrl: "https://mohamadmigeh.com/wp-content/uploads/2025/12/10.jpg"
              },
              {
                id: 11,
                subtitle: "بخش ۱۱ - پیشرفته",
                title: "📐 نظم هندسی",
                description: "هنر دقت! خلق طرح‌های بی‌نقص ریاضی با گریدها.",
                points: ["رازهای طراحی با گرید", "طراحی تایپوگرافی هندسی", "تکنیک ترکیب اشکال (Blend)"],
                category: "Geometry",
                step: "۱۱ از ۱۳",
                color: "#8E44AD",
                imageUrl: "https://mohamadmigeh.com/wp-content/uploads/2025/12/11.jpg"
              },
              {
                id: 12,
                subtitle: "بخش ۱۲ - فوق پیشرفته",
                title: "🏠 دنیای ایزومتریک",
                description: "پروژه نهایی: طراحی یک اتاق ایزومتریک کامل با تمام جزئیات.",
                points: ["ساخت گرید و فضای ایزومتریک", "طراحی تمام وسایل و جزئیات", "نورپردازی و رندر نهایی"],
                category: "Isometric",
                step: "۱۲ از ۱۳",
                color: "#27AE60",
                imageUrl: "https://mohamadmigeh.com/wp-content/uploads/2025/12/12.jpg"
              },
              {
                id: 13,
                subtitle: "بخش ۱۳ - پایانی",
                title: "📤 آماده برای دنیا",
                description: "خروجی گرفتن اصولی و باکیفیت برای چاپ و فضای وب.",
                points: ["آماده‌سازی استاندارد فایل چاپ", "خروجی وب (SVG, PDF, PNG)", "مدیریت رنگ‌ها در خروجی"],
                category: "Exporting",
                step: "۱۳ از ۱۳",
                color: "#C0392B",
                imageUrl: "https://mohamadmigeh.com/wp-content/uploads/2025/12/13.jpg"
              }
            ];

            // --- کامپوننت کارت ---
            const Card = ({ data, index }) => {
              return (
                <div 
                  className="wp-stack-card w-full max-w-5xl bg-[#1a1a1a] border border-[#353535] rounded-2xl md:rounded-3xl overflow-hidden shadow-2xl flex flex-col md:flex-row relative origin-top transition-transform duration-100 ease-linear will-change-transform"
                >
                  <div className="wp-card-depth-overlay absolute inset-0 bg-black z-40 pointer-events-none rounded-2xl md:rounded-3xl opacity-0" />

                  {/* بخش محتوا */}
                  <div className="flex-1 flex flex-col p-4 md:p-8 z-20 h-full">
                    <div>
                      <div className="flex justify-between items-start mb-2">
                          <p className="text-gray-400 text-[10px] md:text-sm font-medium">
                           {data.subtitle}
                          </p>
                      </div>
                      
                      <h2 className="text-lg md:text-3xl font-bold text-white mb-2 md:mb-6 leading-tight">
                        {data.title}
                      </h2>
                      
                      <p className="text-gray-300 text-xs md:text-base leading-loose mb-4">
                        {data.description}
                      </p>
                      
                      <div className="flex flex-col gap-2 md:gap-3">
                        {data.points.map((pt, i) => (
                          <div key={i} className="flex items-center gap-2 md:gap-3">
                            <div 
                              className="w-4 h-4 md:w-6 md:h-6 rounded-full flex items-center justify-center text-[9px] md:text-xs font-bold text-white flex-shrink-0"
                              style={{ backgroundColor: data.color }}
                            >
                              {toPersianDigits(i + 1)}
                            </div>
                            <span className="text-gray-200 text-[10px] md:text-sm">{pt}</span>
                          </div>
                        ))}
                      </div>
                    </div>

                    <div className="flex flex-wrap gap-1.5 md:gap-2 mt-4 md:mt-8">
                      <div className="px-2 md:px-3 py-0.5 md:py-1 bg-white/10 border border-white/10 rounded-full text-[9px] md:text-xs text-gray-300 flex items-center gap-1">
                        <span>📦</span> {data.category}
                      </div>
                      <div className="px-2 md:px-3 py-0.5 md:py-1 bg-white/10 border border-white/10 rounded-full text-[9px] md:text-xs text-gray-300 flex items-center gap-1">
                        <span>📑</span> {data.step}
                      </div>
                    </div>
                  </div>

                  {/* بخش تصویر */}
                  <div className="relative h-32 md:h-auto md:w-[45%] md:m-5 bg-[#111] overflow-hidden rounded-b-2xl md:rounded-2xl shrink-0 order-first md:order-last z-10">
                    <img 
                      src={data.imageUrl} 
                      alt={data.title}
                      className="w-full h-full object-cover object-top opacity-90"
                    />
                    <div className="absolute inset-0 bg-gradient-to-t from-[#1a1a1a] via-transparent to-transparent md:hidden opacity-80"></div>
                  </div>
                </div>
              );
            };

            // --- کامپوننت استک کارت‌ها ---
            const CardStack = () => {
              const wrapperRefs = React.useRef([]);
              const [, forceUpdate] = React.useReducer(x => x + 1, 0);

              React.useEffect(() => {
                const handleScroll = () => {
                  const wrappers = wrapperRefs.current;
                  const viewportHeight = window.innerHeight;
                  
                  const isMobile = window.innerWidth < 768;
                  const stickyOffset = isMobile ? 100 : 130; 

                  wrappers.forEach((wrapper, i) => {
                    if (!wrapper) return;
                    
                    const cardInner = wrapper.querySelector('.wp-stack-card');
                    const overlay = wrapper.querySelector('.wp-card-depth-overlay');
                    
                    if (!cardInner || !overlay) return;

                    if (i === wrappers.length - 1) {
                        cardInner.style.transform = `scale(1)`;
                        overlay.style.opacity = '0';
                        return;
                    }

                    const nextWrapper = wrappers[i + 1];
                    if (!nextWrapper) return;

                    const nextRect = nextWrapper.getBoundingClientRect();
                    const distance = nextRect.top;
                    
                    const nextStickyTop = stickyOffset + ((i + 1) * 3);

                    let scale = 1;
                    let overlayOpacity = 0;
                    
                    if (distance <= viewportHeight && distance >= nextStickyTop) {
                        const range = viewportHeight - nextStickyTop;
                        const currentPos = distance - nextStickyTop;
                        const scaleProgress = currentPos / range;

                        scale = 1 - ((1 - scaleProgress) * 0.05);
                        overlayOpacity = (1 - scaleProgress) * 0.95;
                        
                    } else if (distance < nextStickyTop) {
                        scale = 0.95; 
                        overlayOpacity = 0.95;
                    }

                    cardInner.style.transform = `scale(${scale})`;
                    overlay.style.opacity = overlayOpacity.toString();
                  });
                };

                window.addEventListener('scroll', handleScroll);
                window.addEventListener('resize', () => {
                    forceUpdate(); 
                    handleScroll();
                });
                
                handleScroll();

                return () => {
                  window.removeEventListener('scroll', handleScroll);
                  window.removeEventListener('resize', handleScroll);
                };
              }, []);

              const isMobile = window.innerWidth < 768;
              const stickyBaseOffset = isMobile ? 100 : 130; 

              return (
                <div className="w-full relative pb-[10vh] md:pb-[25vh]">
                  {CARD_DATA.map((item, index) => (
                    <div
                      key={item.id}
                      ref={(el) => { wrapperRefs.current[index] = el; }}
                      className="flex items-start justify-center sticky px-2 md:px-5 box-border"
                      style={{ 
                        zIndex: index + 1,
                        top: (stickyBaseOffset + (index * 3)) + 'px', 
                        minHeight: isMobile ? '50vh' : 'auto', 
                        marginBottom: index === CARD_DATA.length - 1 ? 0 : (isMobile ? '60px' : '100px')
                      }}
                    >
                      <Card data={item} index={index} />
                    </div>
                  ))}
                </div>
              );
            };

            // --- اپلیکیشن اصلی ---
            const App = () => {
              return (
                <div className="min-h-screen bg-transparent wp-stack-container">
                  <main className="w-full max-w-7xl mx-auto pt-2 md:pt-10"> 
                    <div className="text-center pb-4 px-4">
                        <h2 className="text-lg md:text-4xl font-extrabold text-gray-800 mb-2 md:mb-4">چه چیزی در انتظار شماست؟</h2>
                        <p className="text-gray-600 max-w-2xl mx-auto text-xs md:text-base leading-relaxed">
                            این مسیر آموزشی برای تبدیل شدن شما به یک طراح حرفه‌ای طراحی شده است. 
                        </p>
                    </div>

                    <CardStack />
                  </main>
                </div>
              );
            };

            const root = ReactDOM.createRoot(document.getElementById('root-illustrator-app'));
            root.render(<App />);
        </script>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode( 'moho_illustrator_app', 'moho_illustrator_app_shortcode' );

/**
 * ==================================================================
 * 6. شورت‌کد هوشمند کاروسل نمونه‌کارها (ایلوستریتور و فتوشاپ)
 * نحوه استفاده: 
 * [moho_student_showcase course="illustrator"]
 * [moho_student_showcase course="photoshop"]
 * ==================================================================
 */
function moho_student_showcase_shortcode( $atts ) {
    // 1. دریافت ورودی (پیش‌فرض روی illustrator است)
    $args = shortcode_atts( array(
        'course' => 'illustrator',
    ), $atts );

    // 2. بانک اطلاعات تصاویر (اینجا لیست‌ها را مدیریت می‌کنیم)
    $all_images = array(
        
        // --- لیست ایلوستریتور ---
        'illustrator' => array(
            'https://mohamadmigeh.com/wp-content/uploads/2025/12/Asset-1-ilu-100.jpg',
            'https://mohamadmigeh.com/wp-content/uploads/2025/12/Asset-1-100.jpg',
            'https://mohamadmigeh.com/wp-content/uploads/2025/12/Asset-3-100.jpg',
            'https://mohamadmigeh.com/wp-content/uploads/2025/12/Asset-4-100.jpg',
            'https://mohamadmigeh.com/wp-content/uploads/2025/12/Asset-16-100.jpg',
            'https://mohamadmigeh.com/wp-content/uploads/2025/12/boofe-koor-100.jpg',
            'https://mohamadmigeh.com/wp-content/uploads/2025/12/book1-100.jpg',
            'https://mohamadmigeh.com/wp-content/uploads/2025/12/deer-100.jpg',
            'https://mohamadmigeh.com/wp-content/uploads/2025/12/photo_2025-10-02_13-19-46.jpg',
            'https://mohamadmigeh.com/wp-content/uploads/2025/12/photo_2025-07-29_23-10-22.jpg',
            'https://mohamadmigeh.com/wp-content/uploads/2025/12/photo_2025-09-15_18-22-29.jpg',
            'https://mohamadmigeh.com/wp-content/uploads/2025/12/photo_2025-09-16_16-15-13.jpg',
            'https://mohamadmigeh.com/wp-content/uploads/2025/12/photo_2025-09-18_00-11-48.jpg',
            'https://mohamadmigeh.com/wp-content/uploads/2025/12/photo_2025-06-14_00-29-12.jpg',
            'https://mohamadmigeh.com/wp-content/uploads/2025/12/photo_2025-10-28_23-47-20.jpg',
            'https://mohamadmigeh.com/wp-content/uploads/2025/12/Screenshot-2025-12-26-124627.png',
            'https://mohamadmigeh.com/wp-content/uploads/2025/12/traveller-100.jpg',
            'https://mohamadmigeh.com/wp-content/uploads/2025/12/photo_2025-07-23_11-07-55.jpg'
        ),

// --- لیست فتوشاپ (لینک‌های جدید) ---
        'photoshop' => array(
            'https://mohamadmigeh.com/wp-content/uploads/2025/12/photoshop_1.jpg',
            'https://mohamadmigeh.com/wp-content/uploads/2025/12/photoshop_2.jpg',
            'https://mohamadmigeh.com/wp-content/uploads/2025/12/photoshop_8.jpg',
            'https://mohamadmigeh.com/wp-content/uploads/2025/12/photoshop_4.jpg',
            'https://mohamadmigeh.com/wp-content/uploads/2025/12/photoshop_5.jpg',
            'https://mohamadmigeh.com/wp-content/uploads/2025/12/photoshop_6.jpg',
            'https://mohamadmigeh.com/wp-content/uploads/2025/12/photoshop_7.jpg',
            'https://mohamadmigeh.com/wp-content/uploads/2025/12/photoshop_3.jpg',
            'https://mohamadmigeh.com/wp-content/uploads/2025/12/photoshop_9.jpg',
            'https://mohamadmigeh.com/wp-content/uploads/2025/12/photoshop_10.jpg',
            'https://mohamadmigeh.com/wp-content/uploads/2025/12/photoshop_11.jpg',
            'https://mohamadmigeh.com/wp-content/uploads/2025/12/photoshop_12.jpg',
            'https://mohamadmigeh.com/wp-content/uploads/2025/12/photoshop_13.jpg',
            'https://mohamadmigeh.com/wp-content/uploads/2025/12/photoshop_14.jpg',
            'https://mohamadmigeh.com/wp-content/uploads/2025/12/photoshop_15.jpg',
            'https://mohamadmigeh.com/wp-content/uploads/2025/12/photoshop_16.jpg',
            'https://mohamadmigeh.com/wp-content/uploads/2025/12/photoshop_17.jpg',
            'https://mohamadmigeh.com/wp-content/uploads/2025/12/photoshop_18.jpg'
        ),    );

    // انتخاب لیست بر اساس ورودی شورت‌کد
    $selected_course = $args['course'];
    
    // اگر اسم دوره اشتباه بود یا وجود نداشت، پیش‌فرض ایلوستریتور را نشان بده
    $current_images = isset($all_images[$selected_course]) ? $all_images[$selected_course] : $all_images['illustrator'];

    // تبدیل آرایه PHP به فرمت JSON برای استفاده در جاوااسکریپت
    $js_images_array = json_encode($current_images);
    
    // ایجاد یک ID یکتا برای این که اگر دو تا اسلایدر در یک صفحه بود تداخل نکنند
    $unique_id = 'student-showcase-' . uniqid();

    ob_start();
    ?>
    
    <div id="<?php echo $unique_id; ?>" class="moho-showcase-container">
        </div>

    <script>
    (function() {
        // دریافت لیست عکس‌ها از PHP
        const imageUrls = <?php echo $js_images_array; ?>;
        const containerId = "<?php echo $unique_id; ?>";

        // اگر کمتر از ۶ عکس بود، انیمیشن زشت می‌شود، پس تکرارش می‌کنیم تا پر شود
        let finalImages = imageUrls;
        if (imageUrls.length < 18) {
             // اگر عکس کم بود، لیست را چند بار کپی کن تا پر شود
             finalImages = [...imageUrls, ...imageUrls, ...imageUrls];
        }

        // تقسیم تصاویر به ۳ ردیف
        const chunkSize = Math.ceil(finalImages.length / 3);
        
        const rowsData = [
            {
                direction: 'left',
                images: finalImages.slice(0, chunkSize)
            },
            {
                direction: 'right',
                images: finalImages.slice(chunkSize, chunkSize * 2)
            },
            {
                direction: 'left',
                images: finalImages.slice(chunkSize * 2)
            }
        ];

        const container = document.getElementById(containerId);

        if(container) {
            // اضافه کردن کلاس‌های پایه کانتینر
            container.style.position = "relative";
            container.style.zIndex = "0";
            container.style.padding = "8px 0";
            container.style.width = "100%";
            container.style.backgroundColor = "#fff";
            container.style.display = "flex";
            container.style.flexDirection = "column";
            container.style.gap = "24px";
            container.style.direction = "ltr"; // LTR اجباری برای انیمیشن
            container.style.overflow = "hidden";

            rowsData.forEach((row) => {
                // ساخت کانتینر ردیف
                const rowWrapper = document.createElement('div');
                rowWrapper.className = "student-row";

                // ماسک‌ها
                const maskLeft = document.createElement('div');
                maskLeft.className = 'mask-left';
                const maskRight = document.createElement('div');
                maskRight.className = 'mask-right';
                
                // مسیر حرکت
                const track = document.createElement('div');
                const animClass = row.direction === 'left' ? 'animate-scroll-left' : 'animate-scroll-right';
                track.className = `track ${animClass}`;
                
                // لوپ کردن عکس‌ها (۴ بار تکرار برای پر کردن عرض مانیتورهای بزرگ)
                const loopImages = [...row.images, ...row.images, ...row.images, ...row.images];

                loopImages.forEach((url) => {
                    const itemDiv = document.createElement('div');
                    itemDiv.className = 'item';
                    itemDiv.innerHTML = `
                        <div class="img-wrap">
                            <img src="${url}" loading="lazy" alt="Student Work" />
                        </div>
                    `;
                    track.appendChild(itemDiv);
                });

                // افزودن به DOM
                rowWrapper.appendChild(track);
                rowWrapper.appendChild(maskLeft);
                rowWrapper.appendChild(maskRight);
                container.appendChild(rowWrapper);
            });
        }
    })();
    </script>
    <?php
    return ob_get_clean();
}
add_shortcode( 'moho_student_showcase', 'moho_student_showcase_shortcode' );

/**
 * ==================================================================
 * 7. شورت‌کد دکمه‌های سوشال و فروش
 * استفاده: [moho_btn text="متن" link="#" style="youtube|telegram|buy|cta" icon="play|heart|chat|cart"]
 * ==================================================================
 */

// تابع کمکی برای گرفتن SVG آیکون
function moho_get_icon_svg($icon_name) {
    switch (strtolower($icon_name)) {
        case 'play':
            return '<svg class="play-icon" viewBox="0 0 11.62 12.85"><path d="M10.7,4.85L2.74.25C1.52-.46,0,.42,0,1.83v9.2c0,1.4,1.52,2.28,2.74,1.58l7.97-4.6c1.22-.7,1.22-2.46,0-3.16Z"/></svg>';
        case 'heart':
            return '<svg viewBox="0 0 16.7 13.22"><path d="M4.1,10.82c1.96,1.42,3.89,2.31,3.97,2.34.17.08.37.08.54,0,2.53-1.11,8.29-4.75,8.09-8.3.03-4.33-5.39-6.5-8.36-3.36C3.32-3.34-5.08,4.58,4.1,10.82Z"/></svg>';
        case 'chat':
            return '<svg viewBox="0 0 24 24"><path d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-7 12h-2v-2h2v2zm0-4h-2V6h2v4z"/></svg>';
        case 'telegram':
            return '<svg viewBox="0 0 24.27 20.22"><path d="M22.2.18s2.25-.88,2.06,1.25c-.06.88-.62,3.94-1.06,7.25l-1.5,9.82s-.12,1.44-1.25,1.69-2.81-.88-3.12-1.13c-.25-.19-4.68-3-6.24-4.38-.44-.38-.94-1.13.06-2l6.55-6.25c.75-.75,1.5-2.5-1.62-.38l-8.73,5.94s-1,.63-2.87.06L.44,10.81s-1.5-.94,1.06-1.88C7.73,5.99,15.4,2.99,22.2.18Z"/></svg>';
        case 'cart':
            return '<svg viewBox="0 0 24 24"><path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"/></svg>';
        default: 
            return '';
    }
}

// تابع اصلی شورت‌کد
function moho_button_shortcode($atts) {
    $atts = shortcode_atts(array(
        'link'  => '#',
        'text'  => 'کلیک کنید',
        'style' => 'youtube', 
        'icon'  => 'play',
        'target'=> '_blank'
    ), $atts);

    $svg_icon = moho_get_icon_svg($atts['icon']);
    // اگر لینک با # شروع شود، در همان صفحه باز شود
    $target_attr = (strpos($atts['link'], '#') === 0) ? '_self' : $atts['target'];

    return '
    <a href="' . esc_url($atts['link']) . '" class="moho-btn btn-' . esc_attr($atts['style']) . '" target="' . esc_attr($target_attr) . '">
        ' . ($svg_icon ? '<span class="moho-btn-icon">' . $svg_icon . '</span>' : '') . '
        <span>' . esc_html($atts['text']) . '</span>
    </a>';
}
add_shortcode('moho_btn', 'moho_button_shortcode');

/**
 * ==================================================================
 * 8. شورت‌کد کارت معرفی پکیج (Moho Package Card)
 * استفاده: [moho_package_card]
 * ==================================================================
 */
function moho_package_card_shortcode() {
    ob_start();
    ?>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        corePlugins: {
          preflight: false, // غیرفعال کردن ریست برای حفظ فونت‌های قالب
        }
      }
    </script>

    <div class="w-full max-w-3xl mx-auto bg-[#240f3a] rounded-[2.5rem] p-3 md:p-4 shadow-2xl my-8" dir="rtl">
      
      <div class="text-center py-3 pb-5">
        <h2 class="text-white font-black text-xl md:text-2xl drop-shadow-md m-0">
          داخل این پکیج چیست؟
        </h2>
      </div>

      <div class="bg-white rounded-[2rem] px-6 py-8 md:px-10 md:py-10 flex flex-col items-start text-right shadow-inner box-border">
        
        <h3 class="text-xl md:text-2xl font-black text-black mb-8 w-full m-0 leading-tight">
          یک دانشگاه کامل در جیب شما:
        </h3>

        <ul class="space-y-5 w-full mb-10 list-none p-0 m-0">
          
          <li class="flex items-start gap-3">
            <span class="flex-shrink-0 mt-1">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-black"><polyline points="20 6 9 17 4 12"></polyline></svg>
            </span>
            <span class="text-gray-900 font-medium text-base md:text-lg leading-relaxed text-justify">
              <strong>۹۸ ویدیوی آموزشی کامل:</strong> از نصب نرم‌افزار و کشیدن اولین خط تا خروجی نهایی حرفه‌ای.
            </span>
          </li>

          <li class="flex items-start gap-3">
            <span class="flex-shrink-0 mt-1">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-black"><polyline points="20 6 9 17 4 12"></polyline></svg>
            </span>
            <span class="text-gray-900 font-medium text-base md:text-lg leading-relaxed text-justify">
              <strong>۱۳ فصل طبقه‌بندی شده:</strong> (مبانی، ابزارها، تایپوگرافی، افکت‌ها، سه بعدی، ماسک‌ها و...)
            </span>
          </li>

          <li class="flex items-start gap-3">
            <span class="flex-shrink-0 mt-1">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-black"><polyline points="20 6 9 17 4 12"></polyline></svg>
            </span>
            <span class="text-gray-900 font-medium text-base md:text-lg leading-relaxed text-justify">
              <strong>پروژه‌های عملی جذاب:</strong> با هم لوگو طراحی می‌کنیم، کاراکتر می‌سازیم، پترن خلق می‌کنیم و یک اتاق ایزومتریک کامل می‌سازیم.
            </span>
          </li>

          <li class="flex items-start gap-3">
            <span class="flex-shrink-0 mt-1">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-black"><polyline points="20 6 9 17 4 12"></polyline></svg>
            </span>
            <span class="text-gray-900 font-medium text-base md:text-lg leading-relaxed text-justify">
              <strong>دسترسی یکجا به فایل‌ها:</strong> تمام فایل‌های تمرینی و پروژه‌ها به صورت مرتب و یکجا در اختیارته.
            </span>
          </li>

          <li class="flex items-start gap-3">
            <span class="flex-shrink-0 mt-1">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-black"><polyline points="20 6 9 17 4 12"></polyline></svg>
            </span>
            <span class="text-gray-900 font-medium text-base md:text-lg leading-relaxed text-justify">
              <strong>دسترسی آفلاین:</strong> بدون نیاز به اینترنت، بدون تبلیغات مزاحم یوتیوب و با تمرکز ۱۰۰٪ یاد بگیر.
            </span>
          </li>

        </ul>

        <div class="w-full flex justify-center">
          <a href="#" class="inline-block text-center no-underline w-full md:w-auto min-w-[280px] py-4 px-8 rounded-full font-black text-xl shadow-lg transition-all duration-300 hover:-translate-y-1 active:scale-95 bg-[#240f3a] hover:bg-[#3a1a5c] text-white cursor-pointer border-none">
            خرید و شروع یادگیری
          </a>
        </div>

      </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode( 'moho_package_card', 'moho_package_card_shortcode' );

/**
 * ==================================================================
 * 9. شورت‌کد هوشمند جدول قیمت‌گذاری (ایلوستریتور و فتوشاپ)
 * استفاده: [moho_pricing_table product="illustrator"] یا [moho_pricing_table product="photoshop"]
 * ==================================================================
 */
function moho_pricing_table_shortcode( $atts ) {
    $args = shortcode_atts( array(
        'product' => 'illustrator', // پیش‌فرض
    ), $atts );

    // --- بانک اطلاعات محصولات ---
    $products = array(
        
        // تنظیمات ایلوستریتور
        'illustrator' => array(
            'single' => array(
                'title'       => 'پکیج ایلاستریتور',
                'price'       => '۱۹۵.۰۰۰ تومان',
                'link'        => '/checkout/?add-to-cart=287',
                'bg_color'    => '#f59e0b', // نارنجی
                'btn_class'   => 'btn-orange-shadow',
                'hover_color' => 'hover:bg-orange-600',
                'features'    => array(
                    'دسترسی به +90 درس جامع پروژه‌محور ایلاستریتور',
                    'دانلود درس‌ها در اپلیکیشن و تماشای آفلاین',
                    'بدون نیاز به VPN',
                    'دسترسی سریع و راحت به فایل‌های تمرینی',
                    'بدون نمایش تبلیغات مزاحم',
                    'مشاهده پیشرفت در دوره',
                    'صرفه‌جویی در اینترنت و زمان',
                    'حمایت از «محمد میگه» ❤️'
                )
            ),
            'bundle' => array(
                'title'       => 'پکیج ایلاستریتور + پکیج فتوشاپ',
                'price_old'   => '۳۹۰.۰۰۰ تومان',
                'price_new'   => '۲۹۵.۰۰۰ تومان',
                'link'        => '/checkout/?add-to-cart=2344',
                'bg_color'    => '#1e7af5', // آبی تیره
                'btn_class'   => 'btn-blue-shadow pulse-blue', // تپش آبی
                'hover_color' => 'hover:bg-blue-600',
                'features'    => array(
                    'دسترسی به +90 درس جامع پروژه‌محور ایلاستریتور',
                    'دسترسی به +80 درس جامع پروژه‌محور فتوشاپ',
                    'دانلود درس‌ها در اپلیکیشن و تماشای آفلاین',
                    'بدون نیاز به VPN',
                    'دسترسی سریع و راحت به فایل‌های تمرینی',
                    'بدون نمایش تبلیغات مزاحم',
                    'مشاهده پیشرفت در دوره',
                    'صرفه‌جویی در اینترنت و زمان',
                    'حمایت از «محمد میگه» ❤️'
                )
            )
        ),

        // تنظیمات فتوشاپ
        'photoshop' => array(
            'single' => array(
                'title'       => 'پکیج جامع فتوشاپ',
                'price'       => '۱۹۵.۰۰۰ تومان',
                'link'        => '/checkout/?add-to-cart=2343',
                'bg_color'    => '#31a8ff', // آبی روشن
                'btn_class'   => 'btn-blue-shadow',
                'hover_color' => 'hover:bg-blue-600',
                'features'    => array(
                    'دسترسی به +80 درس جامع پروژه‌محور فتوشاپ',
                    'دانلود درس‌ها در اپلیکیشن و تماشای آفلاین',
                    'بدون نیاز به VPN',
                    'دسترسی سریع و راحت به فایل‌های تمرینی',
                    'بدون نمایش تبلیغات مزاحم',
                    'مشاهده پیشرفت در دوره',
                    'صرفه‌جویی در اینترنت و زمان',
                    'حمایت از «محمد میگه» ❤️'
                )
            ),
            'bundle' => array(
                'title'       => 'پکیج فتوشاپ + پکیج ایلاستریتور',
                'price_old'   => '۳۹۰.۰۰۰ تومان',
                'price_new'   => '۲۹۵.۰۰۰ تومان',
                'link'        => '/checkout/?add-to-cart=2344',
                'bg_color'    => '#f59e0b', // نارنجی
                'btn_class'   => 'btn-orange-shadow pulse-orange', // تپش نارنجی
                'hover_color' => 'hover:bg-orange-600',
                'features'    => array(
                    'دسترسی به +80 درس جامع پروژه‌محور فتوشاپ',
                    'دسترسی به +90 درس جامع پروژه‌محور ایلاستریتور',
                    'دانلود درس‌ها در اپلیکیشن و تماشای آفلاین',
                    'بدون نیاز به VPN',
                    'دسترسی سریع و راحت به فایل‌های تمرینی',
                    'بدون نمایش تبلیغات مزاحم',
                    'مشاهده پیشرفت در دوره',
                    'صرفه‌جویی در اینترنت و زمان',
                    'حمایت از «محمد میگه» ❤️'
                )
            )
        )
    );

    // انتخاب دیتا بر اساس ورودی
    $data = isset($products[$args['product']]) ? $products[$args['product']] : $products['illustrator'];
    
    // آیکون تیک (مشترک)
    $check_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 text-black"><polyline points="20 6 9 17 4 12"></polyline></svg>';

    ob_start();
    ?>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>tailwind.config = { corePlugins: { preflight: false } }</script>

    <div class="py-8 px-0 flex justify-center items-center bg-transparent" dir="rtl">
      <div class="max-w-5xl w-full">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 lg:gap-8 items-start justify-center">

          <div class="flex justify-center md:mt-12 order-1">
            <div class="relative flex flex-col rounded-[2rem] p-1.5 shadow-xl transition-transform hover:-translate-y-1 duration-300 w-full max-w-sm mx-auto" 
                 style="background-color: <?php echo $data['single']['bg_color']; ?>;">
               
              <div class="h-5"></div> <div class="bg-white rounded-[1.7rem] px-4 py-6 flex-grow flex flex-col items-center text-center shadow-inner">
                <h2 class="text-lg md:text-xl font-black text-gray-900 mb-4 leading-tight">
                  <?php echo $data['single']['title']; ?>
                </h2>

                <div class="mb-4 flex flex-col items-center">
                  <div class="flex items-center gap-1">
                     <span class="text-2xl md:text-3xl font-black text-gray-800 tracking-tight">
                      <?php echo $data['single']['price']; ?>
                    </span>
                  </div>
                </div>

                <a href="<?php echo $data['single']['link']; ?>" 
                   class="pricing-btn <?php echo $data['single']['btn_class']; ?> <?php echo $data['single']['hover_color']; ?> inline-block text-center no-underline w-full py-3 px-4 rounded-full font-black text-base md:text-lg mb-6 text-white cursor-pointer border-none" 
                   style="width: 90%; background-color: <?php echo $data['single']['bg_color']; ?>;">
                  خرید و شروع یادگیری
                </a>

                <div class="w-full h-1 rounded-full mb-6 opacity-20" style="background-color: <?php echo $data['single']['bg_color']; ?>;"></div>

                <ul class="space-y-2.5 w-full text-right px-1 list-none m-0 p-0">
                  <?php foreach($data['single']['features'] as $feature): ?>
                  <li class="flex items-center gap-2">
                    <span class="flex-shrink-0"><?php echo $check_icon; ?></span>
                    <span class="text-gray-800 font-bold text-xs md:text-sm leading-relaxed"><?php echo $feature; ?></span>
                  </li>
                  <?php endforeach; ?>
                </ul>
                <div class="flex-grow"></div>
              </div>
            </div>
          </div>

          <div class="flex justify-center order-2">
            <div class="relative flex flex-col rounded-[2rem] p-1.5 shadow-xl transition-transform hover:-translate-y-1 duration-300 w-full max-w-sm mx-auto"
                 style="background-color: <?php echo $data['bundle']['bg_color']; ?>;">
               
              <div class="text-center py-1.5 pb-2">
                <h3 class="text-white font-black text-lg md:text-xl drop-shadow-md m-0">
                  پیشنهاد ویژه
                </h3>
              </div>

              <div class="bg-white rounded-[1.7rem] px-4 py-6 flex-grow flex flex-col items-center text-center shadow-inner">
                <h2 class="text-lg md:text-xl font-black text-gray-900 mb-4 leading-tight">
                  <?php echo $data['bundle']['title']; ?>
                </h2>

                <div class="mb-4 flex flex-col items-center">
                  <span class="text-gray-400 line-through text-base font-bold decoration-2 decoration-gray-400/70 mb-0.5 block">
                    <?php echo $data['bundle']['price_old']; ?>
                  </span>
                  <div class="flex items-center gap-1">
                     <span class="text-2xl md:text-3xl font-black text-gray-800 tracking-tight">
                      <?php echo $data['bundle']['price_new']; ?>
                    </span>
                  </div>
                </div>

                <a href="<?php echo $data['bundle']['link']; ?>" 
                   class="pricing-btn <?php echo $data['bundle']['btn_class']; ?> <?php echo $data['bundle']['hover_color']; ?> inline-block text-center no-underline w-full py-3 px-4 rounded-full font-black text-base md:text-lg mb-6 text-white cursor-pointer border-none" 
                   style="width: 90%; background-color: <?php echo $data['bundle']['bg_color']; ?>;">
                  خرید و شروع یادگیری
                </a>

                <div class="w-full h-1 rounded-full mb-6 opacity-20" style="background-color: <?php echo $data['bundle']['bg_color']; ?>;"></div>

                <ul class="space-y-2.5 w-full text-right px-1 list-none m-0 p-0">
                  <?php foreach($data['bundle']['features'] as $feature): ?>
                  <li class="flex items-center gap-2">
                    <span class="flex-shrink-0"><?php echo $check_icon; ?></span>
                    <span class="text-gray-800 font-bold text-xs md:text-sm leading-relaxed"><?php echo $feature; ?></span>
                  </li>
                  <?php endforeach; ?>
                </ul>
                <div class="flex-grow"></div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode( 'moho_pricing_table', 'moho_pricing_table_shortcode' );

/**
 * ==================================================================
 * 10. شورت‌کد باکس لینک یوتیوب
 * استفاده: [moho_youtube_box link="LINK"]متن لینک[/moho_youtube_box]
 * ==================================================================
 */
function moho_youtube_box_shortcode( $atts, $content = null ) {
    $a = shortcode_atts( array(
        'link' => '#',
    ), $atts );

    $content = $content ? $content : 'برای مشاهده ویدیو در یوتیوب کلیک کنید';

    return '
    <div class="moho-youtube-link-box">
        <p>
            <a href="' . esc_url($a['link']) . '" target="_blank" rel="noopener noreferrer">
                <strong>' . do_shortcode($content) . '</strong>
            </a>
        </p>
    </div>';
}
add_shortcode( 'moho_youtube_box', 'moho_youtube_box_shortcode' );