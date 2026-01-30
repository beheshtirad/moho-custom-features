document.addEventListener("DOMContentLoaded", function() {
    
    // JS را فقط روی آکاردئون دروس اجرا می‌کنیم
    const accordion = document.getElementById("sp-ea-1055");
    if (!accordion) {
        return; 
    }

    const lessonLists = accordion.querySelectorAll(".ea-body ul");

    lessonLists.forEach(list => {
        if (list.classList.contains('js-processed')) { return; }
        list.classList.add('js-processed');

        const lessons = list.querySelectorAll("li");

        lessons.forEach(li => {
            
            const iconSVG = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M8 6.82v10.36c0 .79.87 1.27 1.54.84l8.14-5.18c.62-.39.62-1.29 0-1.69L9.54 5.98C8.87 5.55 8 6.03 8 6.82z"></path></svg>`;
            
            const linkTag = li.querySelector("a");
            let lessonText, lessonLink, isLocked;

            if (linkTag) {
                lessonText = linkTag.textContent.trim();
                lessonLink = linkTag.href;
                isLocked = false;
            } else {
                lessonText = li.textContent.trim();
                lessonLink = "#";
                isLocked = true;
            }
            
            // پاکسازی متن‌های اضافه
            lessonText = lessonText.split("درس از دوره")[0].trim();
            lessonText = lessonText.split("به زودی")[0].trim();
            
            let newHTML = '';
            
            if (isLocked) {
                // درس قفل شده
                newHTML = `
                <div class="migeh-lesson-box is-locked">
                    <div class="migeh-lesson-info">
                        <div class="migeh-lesson-icon">${iconSVG}</div>
                        <div class="migeh-lesson-text">
                            <span>${lessonText}</span>
                        </div>
                    </div>
                    <span class="migeh-lesson-button-locked">به زودی</span>
                </div>`;
            } else {
                // درس فعال
                newHTML = `
                <div class="migeh-lesson-box">
                    <div class="migeh-lesson-info">
                        <div class="migeh-lesson-icon">${iconSVG}</div>
                        <div class="migeh-lesson-text">
                            <span>${lessonText}</span>
                        </div>
                    </div>
                    <a href="${lessonLink}" target="_blank" rel="noopener" class="migeh-lesson-button">
                        <span>مشاهده درس</span>
                    </a>
                </div>`;
            }
            
            li.innerHTML = newHTML;
        });
    });

});