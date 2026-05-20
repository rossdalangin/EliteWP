/**
 * Premium B2B Theme Main Script
 * Vanilla JS - No jQuery reliance.
 */

document.addEventListener('DOMContentLoaded', () => {
    // Accessibility: Mobile Menu Toggle (Basic implementation)
    const menuToggle = document.querySelector('.menu-toggle');
    const siteNavigation = document.getElementById('site-navigation');

    if (menuToggle && siteNavigation) {
        const menu = siteNavigation.querySelector('ul');

        // Toggle functionality if we decide to show the button on mobile
        menuToggle.addEventListener('click', () => {
            const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
            menuToggle.setAttribute('aria-expanded', !isExpanded);
            menu.classList.toggle('is-active');
        });
    }

    // Smooth Scroll for Anchor Links (Already handled by CSS, but good to have JS fallback or enhancement)
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;

            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                e.preventDefault();
                targetElement.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });

    // Performance: Lazy loading images (Browser native is usually enough, but we can enhance here if needed)
});
