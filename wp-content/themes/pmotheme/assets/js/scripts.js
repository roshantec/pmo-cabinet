document.addEventListener('DOMContentLoaded', function () {
    // Google Translate Initialization
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            includedLanguages: 'en,dz',
        }, 'google_translate_element');
    }

    // Language change handler
    function changeLanguage(lang) {
        const selectField = document.querySelector("select.goog-te-combo");
        if (selectField) {
            selectField.value = lang;
            selectField.dispatchEvent(new Event('change'));
        } else {
            console.error('Language selector not found');
        }
    }

    // Text size change handler
    function changeTextSize(action) {
        const body = document.body;
        const currentSize = parseFloat(window.getComputedStyle(body).getPropertyValue('font-size'));
        let newSize = currentSize;

        switch (action) {
            case 'increase':
                newSize = currentSize * 1.1;
                break;
            case 'decrease':
                newSize = currentSize * 0.9;
                break;
            case 'reset':
                newSize = 16;  // Default font size
                break;
        }

        body.style.fontSize = `${newSize}px`;
    }

   // Mobile menu toggle and search overlay
function setupMenuToggle() {
    const menuToggle = document.getElementById('menuToggle');
    const mobileMenu = document.getElementById('mobileMenu');
    const closeMenu = document.getElementById('closeMenu');
    const menuOverlay = document.getElementById('menuOverlay');

    if (menuToggle && mobileMenu && closeMenu && menuOverlay) {
        function toggleMenu() {
            mobileMenu.classList.toggle('translate-x-full');
            menuOverlay.classList.toggle('hidden');
            document.body.classList.toggle('overflow-hidden');
        }

        menuToggle.addEventListener('click', toggleMenu);
        closeMenu.addEventListener('click', toggleMenu);
        menuOverlay.addEventListener('click', toggleMenu);
    } else {
        console.error('Menu elements not found in the DOM.');
    }
}

// Call the function when the DOM is fully loaded
document.addEventListener('DOMContentLoaded', setupMenuToggle);

    function setupSearchToggle() {
        const searchToggle = document.getElementById('searchToggle');
        const searchOverlay = document.getElementById('searchOverlay');
        const closeSearch = document.getElementById('closeSearch');
    
        if (searchToggle && searchOverlay && closeSearch) {
            searchToggle.addEventListener('click', () => {
                searchOverlay.classList.remove('hidden');
            });
    
            closeSearch.addEventListener('click', () => {
                searchOverlay.classList.add('hidden');
            });
        } else {
            console.warn('Search elements not found in the DOM.');
        }
    }
    

    // Feedback form handler
    function setupFeedbackForm() {
        const feedbackBtns = document.querySelectorAll('.feedback-btn');
        const subscribeCheckbox = document.querySelector('input[name="subscribe"]');
        const emailField = document.getElementById('emailField');
        const feedbackForm = document.getElementById('feedbackForm');

        feedbackBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                feedbackBtns.forEach(b => b.classList.remove('selected'));
                this.classList.add('selected');
            });
        });

        if (subscribeCheckbox && emailField) {
            subscribeCheckbox.addEventListener('change', function () {
                emailField.style.display = this.checked ? 'block' : 'none';
            });
        }

        if (feedbackForm) {
            feedbackForm.addEventListener('submit', function (e) {
                e.preventDefault();
                alert('Thank you for your feedback!');
                feedbackForm.reset();
                feedbackBtns.forEach(b => b.classList.remove('selected'));
                if (emailField) emailField.style.display = 'none';
            });
        }
    }

    // Load more gallery items handler
    function setupLoadMore() {
        const loadMoreBtn = document.getElementById('loadMore');
        const gallery = document.querySelector('.grid');

        if (loadMoreBtn && gallery) {
            loadMoreBtn.addEventListener('click', function () {
                const items = document.querySelectorAll('.gallery-item');
                items.forEach(item => {
                    const clone = item.cloneNode(true);
                    gallery.appendChild(clone);
                });
            });
        }
    }

    // Team members hover effect
    function setupTeamMemberHover() {
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
    }

    // Slider functionality
    function setupSlider() {
        const slides = document.querySelectorAll('.slider-item');
        let currentSlide = 0;
        const totalSlides = slides.length;
    
        if (totalSlides === 0) {
            console.warn('No slides found in the DOM.');
            return;
        }
    
        function nextSlide() {
            if (slides[currentSlide]) {
                slides[currentSlide].classList.remove('opacity-100');
                slides[currentSlide].classList.add('opacity-0');
                slides[currentSlide].style.zIndex = '0';
            }
    
            currentSlide = (currentSlide + 1) % totalSlides;
    
            if (slides[currentSlide]) {
                slides[currentSlide].classList.remove('opacity-0');
                slides[currentSlide].classList.add('opacity-100');
                slides[currentSlide].style.zIndex = '10';
            }
        }
    
        setInterval(nextSlide, 5000);
    }
    
    // Contact form handler
    function setupContactForm() {
        const contactForm = document.querySelector('form');

        if (contactForm) {
            contactForm.addEventListener('submit', function (e) {
                e.preventDefault();

                const formData = new FormData(contactForm);

                fetch(contactForm.action, {
                    method: 'POST',
                    body: formData,
                })
                    .then(response => response.json())
                    .then(data => {
                        displayMessage(data.success ? 'success' : 'error', data.success ? 'Your message has been sent successfully.' : 'There was an error sending your message. Please try again.');
                        if (data.success) contactForm.reset();
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        displayMessage('error', 'There was an error sending your message. Please try again.');
                    });
            });
        }

        function displayMessage(type, message) {
            const messageContainer = document.createElement('div');
            messageContainer.className = `${type === 'success' ? 'bg-green-100 border border-green-400 text-green-700' : 'bg-red-100 border border-red-400 text-red-700'} px-4 py-3 rounded relative mb-6`;
            messageContainer.innerHTML = `<span class="block sm:inline">${message}</span>`;

            const form = document.querySelector('form');
            form.parentNode.insertBefore(messageContainer, form);

            setTimeout(() => {
                messageContainer.remove();
            }, 5000);
        }
    }

    // Initialize all functionalities
    googleTranslateElementInit();
    setupMenuToggle();
    setupSearchToggle();
    setupFeedbackForm();
    setupLoadMore();
    setupTeamMemberHover();
    setupSlider();
    setupContactForm();

    // Expose functions globally if needed
    window.changeLanguage = changeLanguage;
    window.changeTextSize = changeTextSize;
});

