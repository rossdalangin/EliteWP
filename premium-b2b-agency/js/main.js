/**
 * Premium B2B Theme Main Script
 * Vanilla JS - No jQuery reliance.
 */

document.addEventListener('DOMContentLoaded', () => {

    // 1. Accessibility: Mobile Menu Toggle
    const menuToggle = document.querySelector('.menu-toggle');
    const siteNavigation = document.getElementById('site-navigation');

    if (menuToggle && siteNavigation) {
        const menuList = siteNavigation.querySelector('ul');

        menuToggle.addEventListener('click', () => {
            const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
            menuToggle.setAttribute('aria-expanded', !isExpanded);
            menuList.classList.toggle('is-active');

            // Animation for hamburger icon if implemented
            menuToggle.classList.toggle('is-open');
        });
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

    // 3. Header Scroll Effect
    const masthead = document.getElementById('masthead');
    if (masthead) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                masthead.classList.add('is-scrolled');
            } else {
                masthead.classList.remove('is-scrolled');
            }
        });
    }

    // 4. Reveal Animation on Scroll (Basic implementation)
    const revealElements = document.querySelectorAll('.agitation-card, .service-card, .value-card');
    const observerOptions = {
        threshold: 0.1
    };

    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('reveal-active');
                revealObserver.unobserve(entry.target);
            }
        });
    }, observerOptions);

    revealElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'all 0.6s ease-out';
        revealObserver.observe(el);
    });
});

// Helper for scroll reveal
document.addEventListener('DOMContentLoaded', () => {
    const style = document.createElement('style');
    style.innerHTML = `
        .reveal-active {
            opacity: 1 !important;
            transform: translateY(0) !important;
        }
    `;
    document.head.appendChild(style);
});
