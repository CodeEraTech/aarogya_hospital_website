(() => {
    'use strict';

    const menuButton = document.querySelector('.menu-btn');
    const menu = document.querySelector('#main-nav');

    menuButton?.addEventListener('click', () => {
        const open = !menu?.classList.contains('open');
        menu?.classList.toggle('open', open);
        menuButton.setAttribute('aria-expanded', String(open));
        document.body.classList.toggle('menu-open', open);
    });

    menu?.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', () => {
            menu.classList.remove('open');
            menuButton?.setAttribute('aria-expanded', 'false');
            document.body.classList.remove('menu-open');
        });
    });

    document.querySelectorAll('.nav-dropdown').forEach((dropdown) => {
        const summary = dropdown.querySelector('summary');
        summary?.addEventListener('click', () => {
            document.querySelectorAll('.nav-dropdown[open]').forEach((other) => {
                if (other !== dropdown) other.removeAttribute('open');
            });
        });
    });

    const dialog = document.querySelector('#appointment-dialog');
    document.querySelectorAll('[data-open-appointment]').forEach((button) => {
        button.addEventListener('click', () => dialog?.showModal());
    });
    document.querySelectorAll('[data-close-appointment]').forEach((button) => {
        button.addEventListener('click', () => dialog?.close());
    });
    dialog?.addEventListener('click', (event) => {
        if (event.target === dialog) dialog.close();
    });

    if (window.AAROGYA_FORM_STATE?.open) dialog?.showModal();
    if (new URLSearchParams(window.location.search).has('book')) dialog?.showModal();

    const observer = 'IntersectionObserver' in window
        ? new IntersectionObserver((entries, currentObserver) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    currentObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12 })
        : null;
    document.querySelectorAll('.reveal').forEach((element) => {
        if (observer) observer.observe(element);
        else element.classList.add('visible');
    });

    document.querySelectorAll('.appointment-form').forEach((form) => {
        form.addEventListener('submit', (event) => {
            let valid = true;
            form.querySelectorAll('[required]').forEach((field) => {
                const invalid = !field.value.trim();
                field.setAttribute('aria-invalid', String(invalid));
                if (invalid) valid = false;
            });
            if (!valid) {
                event.preventDefault();
                form.querySelector('[aria-invalid="true"]')?.focus();
                return;
            }
            const submit = form.querySelector('.submit-btn');
            if (submit) {
                submit.disabled = true;
                submit.textContent = 'Sending request…';
            }
        });
    });

    document.querySelectorAll('[data-track]').forEach((element) => {
        element.addEventListener('click', () => {
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({ event: 'aarogya_conversion', action: element.dataset.track });
        });
    });

    document.querySelectorAll('.speciality-card').forEach((card) => {
        const link = card.querySelector('a[href]');
        if (!link) return;
        card.addEventListener('click', (event) => {
            if (event.target.closest('a,button')) return;
            window.location.href = link.href;
        });
    });

    const initCarousel = (selector, slideSelector, activeClass = 'active') => {
        const root = document.querySelector(selector);
        if (!root) return;
        const slides = [...root.querySelectorAll(slideSelector)];
        if (slides.length < 2) return;
        let index = 0;
        const show = (next) => {
            index = (next + slides.length) % slides.length;
            slides.forEach((slide, slideIndex) => slide.classList.toggle(activeClass, slideIndex === index));
        };
        let timer = window.setInterval(() => show(index + 1), 5000);
        const reset = () => {
            window.clearInterval(timer);
            timer = window.setInterval(() => show(index + 1), 5000);
        };
        root.querySelectorAll('[data-slide-to]').forEach((button) => {
            button.addEventListener('click', () => {
                show(Number(button.dataset.slideTo));
                reset();
            });
        });
        root.querySelector('.hero-prev')?.addEventListener('click', () => { show(index - 1); reset(); });
        root.querySelector('.hero-next')?.addEventListener('click', () => { show(index + 1); reset(); });
    };

    initCarousel('.hero-slider', '.hero-slide');
    initCarousel('[data-testimonials-carousel]', '.testimonial-slide');
})();
