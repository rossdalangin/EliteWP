/**
 * Premium B2B Theme Main Script
 * Vanilla JS - No jQuery reliance.
 */

document.addEventListener('DOMContentLoaded', () => {

    // 1. Premium Mobile Menu Toggle
    const menuToggle = document.querySelector('.menu-toggle');
    const body = document.body;

    if (menuToggle) {
        menuToggle.addEventListener('click', () => {
            const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
            menuToggle.setAttribute('aria-expanded', !isExpanded);
            body.classList.toggle('menu-open');
            menuToggle.classList.toggle('is-open');
        });

        // Close menu on link click
        document.querySelectorAll('.main-navigation a').forEach(link => {
            link.addEventListener('click', () => {
                body.classList.remove('menu-open');
                menuToggle.setAttribute('aria-expanded', 'false');
                menuToggle.classList.remove('is-open');
            });
        });
    }

    // Set header height variable for CSS
    const header = document.getElementById('masthead');
    if (header) {
        document.documentElement.style.setProperty('--header-height', `${header.offsetHeight}px`);
    }

    // 2. Smooth Scroll for Anchor Links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;

            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                e.preventDefault();
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // 3. Header Scroll Effect & Scroll to Top
    const masthead = document.getElementById('masthead');
    const scrollToTop = document.getElementById('scroll-to-top');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            masthead.classList.add('is-scrolled');
            if (scrollToTop) scrollToTop.classList.add('show');
        } else {
            masthead.classList.remove('is-scrolled');
            if (scrollToTop) scrollToTop.classList.remove('show');
        }
    });

    if (scrollToTop) {
        scrollToTop.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    // 4. Advanced Reveal Animation on Scroll
    const revealElements = document.querySelectorAll('.agitation-card, .service-card, .price-card, .case-card, .step, .testimonial-card, .section-header');
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('reveal-active');
                revealObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

    revealElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(40px)';
        el.style.transition = 'all 1s cubic-bezier(0.2, 1, 0.3, 1)';
        revealObserver.observe(el);
    });

    // 5. Reading Progress Bar
    const progressBar = document.createElement('div');
    progressBar.id = 'reading-progress';
    if (document.body.classList.contains('single-post')) {
        document.body.appendChild(progressBar);
        window.addEventListener('scroll', () => {
            const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = (winScroll / height) * 100;
            progressBar.style.width = scrolled + "%";
        });
    }

    // 6. CSS Helper for Active States
    const style = document.createElement('style');
    style.innerHTML = `
        .reveal-active { opacity: 1 !important; transform: translateY(0) !important; }
        .menu-toggle.is-open .hamburger { background: transparent !important; }
        .menu-toggle.is-open .hamburger::before { transform: rotate(45deg) translate(7px, 7px); background: white; }
        .menu-toggle.is-open .hamburger::after { transform: rotate(-45deg) translate(7px, -7px); background: white; }
        body.menu-open { overflow: hidden; }
    `;
    document.head.appendChild(style);
});
