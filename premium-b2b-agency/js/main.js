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

            // Staggered animation for menu items
            if (body.classList.contains('menu-open')) {
                const items = document.querySelectorAll('.main-menu-list li');
                items.forEach((item, index) => {
                    item.style.opacity = '0';
                    item.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        item.style.transition = 'all 0.4s ease forwards';
                        item.style.opacity = '1';
                        item.style.transform = 'translateY(0)';
                    }, 200 + (index * 100));
                });
            }
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
            if (targetId === '#' || targetId === '#primary') return;

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

    const handleScroll = () => {
        if (window.scrollY > 50) {
            masthead.classList.add('is-scrolled');
            if (scrollToTop) scrollToTop.classList.add('show');
        } else {
            masthead.classList.remove('is-scrolled');
            if (scrollToTop) scrollToTop.classList.remove('show');
        }
    };

    window.addEventListener('scroll', handleScroll);
    handleScroll(); // Initial check

    if (scrollToTop) {
        scrollToTop.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    // 4. Advanced Staggered Reveal Animation on Scroll
    const revealElements = document.querySelectorAll('[data-reveal]');
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('reveal-active');
                revealObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -100px 0px' });

    revealElements.forEach(el => {
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

    // 6. Interactive Cursor / Decorative FX
    const hero = document.querySelector('.hero-section');
    if (hero) {
        hero.addEventListener('mousemove', (e) => {
            const { clientX, clientY } = e;
            const x = (clientX / window.innerWidth - 0.5) * 20;
            const y = (clientY / window.innerHeight - 0.5) * 20;
            const graphic = document.querySelector('.hero-graphic-wrapper');
            if (graphic) {
                graphic.style.transform = `perspective(2000px) rotateY(${x - 15}deg) rotateX(${5 - y}deg)`;
            }
        });
    }

    // 7. CSS Helper for Active States
    const style = document.createElement('style');
    style.innerHTML = `
        .menu-toggle.is-open .hamburger { background: transparent !important; }
        .menu-toggle.is-open .hamburger::before { transform: rotate(45deg) translate(9px, 9px); background: white; }
        .menu-toggle.is-open .hamburger::after { transform: rotate(-45deg) translate(9px, -9px); background: white; }
        body.menu-open { overflow: hidden; }
        @media (max-width: 1024px) {
            .main-menu-list li { transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1); }
        }
    `;
    document.head.appendChild(style);
});
