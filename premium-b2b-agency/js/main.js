/**
 * Premium B2B Theme Main Script
 * Elite v3.0.0 Interaction Engine
 */

document.addEventListener('DOMContentLoaded', () => {

    // 1. ADVANCED MOBILE MENU
    const menuToggle = document.querySelector('.menu-toggle');
    const body = document.body;

    if (menuToggle) {
        menuToggle.addEventListener('click', () => {
            const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
            menuToggle.setAttribute('aria-expanded', !isExpanded);
            body.classList.toggle('menu-open');
        });

        document.querySelectorAll('.main-navigation a').forEach(link => {
            link.addEventListener('click', () => {
                body.classList.remove('menu-open');
                menuToggle.setAttribute('aria-expanded', 'false');
            });
        });
    }

    // 2. STAGGERED SCROLL REVEAL
    const revealElements = document.querySelectorAll('[data-reveal]');
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.classList.add('reveal-active');
                }, index * 100);
                revealObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -100px 0px' });

    revealElements.forEach(el => {
        revealObserver.observe(el);
    });

    // 3. READING PROGRESS BAR & HEADER SCROLL
    const progressBar = document.createElement('div');
    progressBar.id = 'reading-progress';

    const scrollToTop = document.getElementById('scroll-to-top');
    const masthead = document.getElementById('masthead');

    if (document.body.classList.contains('single-post')) {
        document.body.appendChild(progressBar);
    }

    window.addEventListener('scroll', () => {
        const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled = (winScroll / height) * 100;

        if (progressBar.parentNode) {
            progressBar.style.width = scrolled + "%";
        }

        if (winScroll > 50) {
            masthead.classList.add('is-scrolled');
            if (scrollToTop) {
                scrollToTop.style.opacity = '1';
                scrollToTop.style.visibility = 'visible';
            }
        } else {
            masthead.classList.remove('is-scrolled');
            if (scrollToTop) {
                scrollToTop.style.opacity = '0';
                scrollToTop.style.visibility = 'hidden';
            }
        }
    });

    if (scrollToTop) {
        scrollToTop.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    // 4. INTERACTIVE HERO PERSPECTIVE
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

    // 5. ELITE MODAL ENGINE
    const modal = document.getElementById('theme-modal');
    const modalContentArea = document.getElementById('modal-content-area');
    const modalClose = document.getElementById('modal-close');

    const openModal = (content) => {
        if (!modal || !modalContentArea) return;
        modalContentArea.innerHTML = content;
        modal.classList.add('is-active');
        document.body.classList.add('modal-open');
    };

    const closeModal = () => {
        if (!modal) return;
        modal.classList.remove('is-active');
        document.body.classList.remove('modal-open');
        setTimeout(() => { modalContentArea.innerHTML = ''; }, 500);
    };

    document.addEventListener('click', (e) => {
        const trigger = e.target.closest('.trigger-modal');
        if (trigger) {
            e.preventDefault();
            const content = trigger.getAttribute('data-modal-content');
            openModal(content);
        }

        if (e.target === modal || e.target.closest('#modal-close')) {
            closeModal();
        }
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modal.classList.contains('is-active')) {
            closeModal();
        }
    });

    // 6. CSS HELPER FOR STATES
    const style = document.createElement('style');
    style.innerHTML = `
        body.menu-open, body.modal-open { overflow: hidden !important; height: 100vh !important; }
        .menu-toggle[aria-expanded="true"] .hamburger-inner { background-color: transparent !important; }
        .menu-toggle[aria-expanded="true"] .hamburger-inner::before { transform: rotate(45deg) translate(5px, 5px); background-color: white !important; }
        .menu-toggle[aria-expanded="true"] .hamburger-inner::after { transform: rotate(-45deg) translate(5px, -5px); background-color: white !important; }
    `;
    document.head.appendChild(style);
});
