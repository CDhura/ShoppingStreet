// スクロールした際に背景を白くする. 
window.addEventListener('scroll', function() {
    const scrollPosition = window.scrollY;
    const scrollIndicator = document.getElementById('scroll-indicator');

    if (scrollPosition > 100) {
        document.querySelector('.background').classList.add('white-bg');
    } else {
        document.querySelector('.background').classList.remove('white-bg');
    }

    // スクロールインジケーターの表示・非表示
    if (scrollPosition > 100) {
        scrollIndicator.style.opacity = '0'; // フェードアウト効果
        scrollIndicator.style.transition = 'opacity 0.5s ease-in-out';
    } else {
        scrollIndicator.style.opacity = '1'; // フェードイン効果
    }
});

document.querySelectorAll('area').forEach(area => {
    area.addEventListener('mouseover', function(e) {
        const tooltip = document.getElementById('tooltip');
        tooltip.style.display = 'block';
        tooltip.textContent = this.getAttribute('data-tooltip');
    });

    area.addEventListener('mousemove', function(e) {
        const tooltip = document.getElementById('tooltip');
        tooltip.style.left = e.pageX + 10 + 'px';
        tooltip.style.top = e.pageY + 10 + 'px';
    });

    area.addEventListener('mouseout', function() {
        document.getElementById('tooltip').style.display = 'none';
    });
});
document.querySelectorAll('.slide-image').forEach(image => {
    image.addEventListener('mouseover', function(e) {
        const tooltip = document.getElementById('tooltip');
        tooltip.style.display = 'block';
        tooltip.textContent = this.getAttribute('data-tooltip');
    });

    image.addEventListener('mousemove', function(e) {
        const tooltip = document.getElementById('tooltip');
        tooltip.style.left = e.pageX + 10 + 'px';
        tooltip.style.top = e.pageY + 10 + 'px';
    });

    image.addEventListener('mouseout', function() {
        document.getElementById('tooltip').style.display = 'none';
    });
});


let slideIndex = 1;
showSlides(slideIndex);

function changeSlide(n) {
    showSlides(slideIndex += n);
}

function showSlides(n) {
    const slides = document.querySelectorAll(".slide");
    const link = document.getElementById("slide-link");

    if (n > slides.length) { slideIndex = 1; }
    if (n < 1) { slideIndex = slides.length; }

    slides.forEach(slide => slide.style.display = "none");
    slides[slideIndex - 1].style.display = "block";

    // リンク先の変更
    // const urls = [
    //     "/home",
    //     "/home2",
    //     "/coming"
    // ];

    // リンク先の変更
    // const urls = [
    //     route('shopping-street.hidamari.index'), 
    //     route('shopping-street.komorebi.index'), 
    //     route('shopping-street.hoshiakari.index')
    // ]

    // リンク先の変更
    const urls = [
        "/shopping-street/hidamari", 
        "/shopping-street/komorebi", 
        "/shopping-street/hoshiakari"
    ]
    
    link.href = urls[slideIndex - 1];
}

