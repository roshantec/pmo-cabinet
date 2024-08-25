function googleTranslateElementInit() {
    new google.translate.TranslateElement({
        pageLanguage: 'en',
        includedLanguages: 'en,dz',
    }, 'google_translate_element');
}

function changeLanguage(lang) {
    var selectField = document.querySelector("select.goog-te-combo");
    if (selectField) {
        selectField.value = lang;
        selectField.dispatchEvent(new Event('change'));
    } else {
        console.error('Language selector not found');
    }
}

function changeTextSize(action) {
    var body = document.body;
    var currentSize = window.getComputedStyle(body, null).getPropertyValue('font-size');
    var newSize;

    switch (action) {
        case 'increase':
            newSize = parseFloat(currentSize) * 1.1;
            break;
        case 'decrease':
            newSize = parseFloat(currentSize) * 0.9;
            break;
        case 'reset':
            newSize = 16;  // Default font size
            break;
    }

    body.style.fontSize = newSize + 'px';
}

// Existing script for menu toggle and search overlay
const menuToggle = document.getElementById('menuToggle');
const mobileMenu = document.getElementById('mobileMenu');
const closeMenu = document.getElementById('closeMenu');
const searchToggle = document.getElementById('searchToggle');
const searchOverlay = document.getElementById('searchOverlay');
const closeSearch = document.getElementById('closeSearch');

document.addEventListener('DOMContentLoaded', function () {
    const menuToggle = document.getElementById('menuToggle');
    const mobileMenu = document.getElementById('mobileMenu');
    const closeMenu = document.getElementById('closeMenu');

    if (menuToggle && mobileMenu && closeMenu) {
        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.remove('hidden');
            mobileMenu.querySelector('div').classList.remove('-translate-x-full');
        });

        closeMenu.addEventListener('click', () => {
            mobileMenu.querySelector('div').classList.add('-translate-x-full');
            setTimeout(() => {
                mobileMenu.classList.add('hidden');
            }, 300);
        });
    }
});


searchToggle.addEventListener('click', () => {
    searchOverlay.classList.remove('hidden');
});

closeSearch.addEventListener('click', () => {
    searchOverlay.classList.add('hidden');
});


document.addEventListener('DOMContentLoaded', function () {
    const feedbackBtns = document.querySelectorAll('.feedback-btn');
    const subscribeCheckbox = document.querySelector('input[name="subscribe"]');
    const emailField = document.getElementById('emailField');

    feedbackBtns.forEach(btn => {
        btn.addEventListener('click', function () {
            feedbackBtns.forEach(b => b.classList.remove('selected'));
            this.classList.add('selected');
        });
    });

    subscribeCheckbox.addEventListener('change', function () {
        emailField.style.display = this.checked ? 'block' : 'none';
    });

    document.getElementById('feedbackForm').addEventListener('submit', function (e) {
        e.preventDefault();
        // Here you would typically send the form data to your server
        alert('Thank you for your feedback!');
        this.reset();
        feedbackBtns.forEach(b => b.classList.remove('selected'));
        emailField.style.display = 'none';
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const loadMoreBtn = document.getElementById('loadMore');
    const gallery = document.querySelector('.grid');

    loadMoreBtn.addEventListener('click', function () {
        // Here you would typically load more images from your server
        // For this example, we'll just duplicate existing images
        const items = document.querySelectorAll('.gallery-item');
        items.forEach(item => {
            const clone = item.cloneNode(true);
            gallery.appendChild(clone);
        });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const teamMembers = document.querySelectorAll('.bg-white.rounded-lg');

    teamMembers.forEach(member => {
        member.addEventListener('mouseover', function () {
            this.classList.add('shadow-xl');
            this.style.transform = 'translateY(-5px)';
        });

        member.addEventListener('mouseout', function () {
            this.classList.remove('shadow-xl');
            this.style.transform = 'translateY(0)';
        });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const slides = document.querySelectorAll('.slider-item');
    let currentSlide = 0;
    const totalSlides = slides.length;

    function nextSlide() {
        slides[currentSlide].classList.remove('opacity-100');
        slides[currentSlide].classList.add('opacity-0');
        slides[currentSlide].style.zIndex = '0'; // Move the current slide to the back

        currentSlide = (currentSlide + 1) % totalSlides;

        slides[currentSlide].classList.remove('opacity-0');
        slides[currentSlide].classList.add('opacity-100');
        slides[currentSlide].style.zIndex = '10'; // Move the new slide to the front
    }

    setInterval(nextSlide, 5000); // 5000ms = 5 seconds
});

