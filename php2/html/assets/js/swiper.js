const swiper = new Swiper('.swiper', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    // If we need pagination
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    // And if we need scrollbar
    scrollbar: {
        el: '.swiper-scrollbar',
    },
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
    on: {
        init: function () {
        const btnStop = document.querySelector(".swiper-button-stop");
        const btnStart = document.querySelector(".swiper-button-play");
        btnStart.style.display = "none";
        btnStop.addEventListener("click", () => {
            this.autoplay.stop();
            btnStart.style.display = "block";
            btnStop.style.display = "none";
        });
        btnStart.addEventListener("click", () => {
            this.autoplay.start();
            btnStart.style.display = "none";
            btnStop.style.display = "block";
        });
        }
    }
});