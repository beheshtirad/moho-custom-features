window.addEventListener('load', function() {
    
    // تاخیر کوتاه برای اطمینان از لود کامل
    setTimeout(function() {
        
        // ============================================================
        // 1. آکاردئون‌ها (Easy Accordion)
        // ============================================================
        const allLists = document.querySelectorAll(".ea-body ul");
        if (allLists.length > 0) {
            allLists.forEach(list => {
                if (list.classList.contains('js-processed')) return;
                list.classList.add('js-processed');
                list.classList.add('moho-custom-list');

                const lessons = list.querySelectorAll("li");
                lessons.forEach(li => {
                    const iconSVG = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M8 6.82v10.36c0 .79.87 1.27 1.54.84l8.14-5.18c.62-.39.62-1.29 0-1.69L9.54 5.98C8.87 5.55 8 6.03 8 6.82z"></path></svg>`;
                    const linkTag = li.querySelector("a");
                    let lessonText = linkTag ? linkTag.textContent.trim() : li.textContent.trim();
                    let lessonLink = linkTag ? linkTag.href : "#";
                    let isLocked = !linkTag;

                    lessonText = lessonText.replace(/درس از دوره/g, "").replace(/به زودی/g, "").replace(/^[-–—]\s*/, "").trim();

                    let newHTML = isLocked ? 
                        `<div class="migeh-lesson-box is-locked"><div class="migeh-lesson-info"><div class="migeh-lesson-icon">${iconSVG}</div><div class="migeh-lesson-text"><span>${lessonText}</span></div></div><span class="migeh-lesson-button-locked">به زودی</span></div>` :
                        `<div class="migeh-lesson-box"><div class="migeh-lesson-info"><div class="migeh-lesson-icon">${iconSVG}</div><div class="migeh-lesson-text"><span>${lessonText}</span></div></div><a href="${lessonLink}" target="_blank" rel="noopener" class="migeh-lesson-button"><span>مشاهده درس</span></a></div>`;
                    
                    li.innerHTML = newHTML;
                });
            });
        }

        // ============================================================
        // 2. لینک‌دار کردن تصاویر آرشیو
        // ============================================================
        const archiveCards = document.querySelectorAll('article.card-blog');
        if (archiveCards.length > 0) {
            archiveCards.forEach(card => {
                const titleLink = card.querySelector('h2.card-title a');
                const thumbnailFigure = card.querySelector('.card-header figure.card-thumbnail');
                
                if (titleLink && thumbnailFigure && thumbnailFigure.parentElement.tagName !== 'A') {
                    const linkWrapper = document.createElement('a');
                    linkWrapper.setAttribute('href', titleLink.getAttribute('href'));
                    linkWrapper.style.display = 'block';
                    linkWrapper.style.height = '100%';
                    thumbnailFigure.parentNode.insertBefore(linkWrapper, thumbnailFigure);
                    linkWrapper.appendChild(thumbnailFigure);
                }
            });
        }

        // ============================================================
        // 3. دکمه چسبان (Sticky CTA Button)
        // ============================================================
        const TARGET_SECTION_ID = '#buy-section'; // مطمئن شو که جدول قیمت این ID را دارد
        const SCROLL_TRIGGER = 350;

        function smoothScrollToBuy() {
            const target = document.querySelector(TARGET_SECTION_ID);
            // اگر سکشن خرید وجود نداشت، شاید در المنتور ID ندادیم، پس سعی کن اولین جدول قیمت رو پیدا کنی
            const fallbackTarget = target || document.querySelector('.pricing-btn')?.closest('.max-w-5xl');
            
            if (fallbackTarget) {
                const offset = window.innerWidth < 768 ? 80 : 120;
                const elementPosition = fallbackTarget.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - offset;
          
                window.scrollTo({ top: offsetPosition, behavior: "smooth" });
            }
        }

        // الف) تزریق دکمه به منوی بالا (فقط دسکتاپ)
        function injectTopStickyButton() {
            const menuUl = document.querySelector('.inner-wrapper-sticky ul.tabs');
            if (!menuUl || menuUl.querySelector('.sticky-cta-btn')) return;

            const newLi = document.createElement('li');
            newLi.className = 'sticky-cta-btn'; 
            newLi.innerHTML = `
                <a href="${TARGET_SECTION_ID}" class="button alt">
                    <div class="btn-content">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span>خرید دوره</span>
                    </div>
                </a>`;
            
            menuUl.appendChild(newLi);
            
            newLi.querySelector('a').addEventListener('click', function(e) {
                e.preventDefault();
                smoothScrollToBuy();
            });
        }
        setInterval(injectTopStickyButton, 1000); // چک کردن مداوم چون منو ممکن است دیر لود شود

        // ب) مدیریت نمایش دکمه هنگام اسکرول
        window.addEventListener('scroll', function() {
            const btn = document.querySelector('.sticky-cta-btn');
            if (btn && window.innerWidth > 991) {
                if (window.scrollY > SCROLL_TRIGGER) {
                    btn.classList.add('is-visible');
                } else {
                    btn.classList.remove('is-visible');
                }
            }
        });

        // ج) هایجک کردن دکمه موبایل (Bottom Bar)
        function hijackBottomButton() {
            const bottomBtn = document.querySelector('.responsive-bottom-bar .single_add_to_cart_button');
            if (bottomBtn && !bottomBtn.classList.contains('scroll-hijacked')) {
                bottomBtn.classList.add('scroll-hijacked');
                // تغییر متن دکمه اگر لازم بود
                // bottomBtn.innerText = "خرید دوره"; 
                bottomBtn.addEventListener('click', function(e) {
                    e.preventDefault(); 
                    e.stopPropagation(); 
                    smoothScrollToBuy();
                });
            }
        }
        setInterval(hijackBottomButton, 1000);

    }, 500); 
});