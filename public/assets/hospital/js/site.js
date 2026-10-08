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

    document.querySelectorAll('[data-doctor-url]').forEach((card) => {
        const openProfile = () => { window.location.href = card.dataset.doctorUrl; };
        card.addEventListener('click', (event) => {
            if (event.target.closest('a, button')) return;
            openProfile();
        });
        card.addEventListener('keydown', (event) => {
            if (event.key === 'Enter' || event.key === ' ') {
                event.preventDefault();
                openProfile();
            }
        });
    });

    const initCarousel = (selector, slideSelector, activeClass = 'active') => {
        const root = document.querySelector(selector);
        if (!root) return;
        const slides = [...root.querySelectorAll(slideSelector)];
        if (slides.length < 2) return;
        const controls = root.parentElement || root;
        let index = 0;
        const show = (next) => {
            index = (next + slides.length) % slides.length;
            slides.forEach((slide, slideIndex) => {
                const active = slideIndex === index;
                slide.classList.toggle(activeClass, active);
                if (active) slide.setAttribute('data-active', '');
                else slide.removeAttribute('data-active');
            });
            controls.querySelectorAll('[data-dot-index]').forEach((dot) => {
                const active = Number(dot.dataset.dotIndex) === index;
                if (active) dot.setAttribute('data-active', '');
                else dot.removeAttribute('data-active');
            });
        };
        show(0);
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
        controls.querySelectorAll('[data-dot-index]').forEach((button) => {
            button.addEventListener('click', () => {
                show(Number(button.dataset.dotIndex));
                reset();
            });
        });
        root.querySelector('.hero-prev')?.addEventListener('click', () => { show(index - 1); reset(); });
        root.querySelector('.hero-next')?.addEventListener('click', () => { show(index + 1); reset(); });
        controls.querySelector('[data-carousel-prev]')?.addEventListener('click', () => { show(index - 1); reset(); });
        controls.querySelector('[data-carousel-next]')?.addEventListener('click', () => { show(index + 1); reset(); });
    };

    initCarousel('.hero-slider', '.hero-slide');

    const initCardCarousel = (selector) => {
        const root = document.querySelector(selector);
        const track = root?.querySelector('[data-testimonial-track]');
        if (!root || !track) return;
        const cards = [...track.children];
        if (cards.length < 2) return;
        const controls = root.parentElement || root;
        let page = 0;
        let timer;

        const visibleCards = () => window.innerWidth <= 520 ? 1 : window.innerWidth <= 900 ? 2 : 3;
        const pageCount = () => Math.max(1, Math.ceil(cards.length / visibleCards()));
        const show = (next) => {
            page = (next + pageCount()) % pageCount();
            const firstVisibleCard = cards[page * visibleCards()];
            root.scrollTo({
                left: firstVisibleCard?.offsetLeft ?? 0,
                behavior: 'smooth',
            });
        };
        const reset = () => {
            window.clearInterval(timer);
            timer = window.setInterval(() => show(page + 1), 5000);
        };

        controls.querySelector('[data-carousel-prev]')?.addEventListener('click', () => { show(page - 1); reset(); });
        controls.querySelector('[data-carousel-next]')?.addEventListener('click', () => { show(page + 1); reset(); });
        window.addEventListener('resize', () => {
            page = 0;
            root.scrollTo({ left: 0, behavior: 'auto' });
            reset();
        });
        show(0);
        reset();
    };

    initCardCarousel('[data-card-carousel]');
})();
