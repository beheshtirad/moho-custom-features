<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * شورت‌کد دانلود باکس هوشمند
 * نحوه استفاده: [moho_download_box url="LINK" filename="NAME"]
 */
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
// ثبت شورت‌کد
add_shortcode( 'moho_download_box', 'moho_download_box_shortcode' );

/**
 * شورت‌کد پروفایل درباره من (با آیکون‌های کامل)
 * استفاده: [moho_about_profile]
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
 * شورت‌کد باکس CTA ایلوستریتور
 * نحوه استفاده: [moho_illustrator_cta]
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

        <a href="https://mohamadmigeh.com/product/offline-design-bundle/" class="migeh-cta-card premium" target="_blank" rel="noopener noreferrer">
          <div class="migeh-cta-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17 1H7c-1.1 0-2 .9-2 2v18c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2V3c0-1.1-.9-2-2-2zm0 18H7V5h10v14zM12 15l-4-4h2.5V8h3v3H16l-4 4z"/></svg>
          </div>
          <div class="migeh-cta-content">
            <h4>🔥 پکیج کامل آفلاین (پیشنهاد ویژه)</h4>
            <p>دانلود ۱۸۰+ ویدیوی فتوشاپ و ایلوستریتور روی موبایل (بدون تبلیغ و فیلترشکن)</p>
          </div>
          <div class="migeh-cta-arrow">›</div>
        </a>

        <a href="https://mohamadmigeh.com/course/illustrator-powerful-design/" class="migeh-cta-card hub" target="_blank" rel="noopener noreferrer">
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
 * شورت‌کد دانلود باکس پیشرفته (نسخه 7.0)
 * استفاده: [moho_download_box url="..." filename="..."]
 */

// تابع اصلی ساخت خروجی
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