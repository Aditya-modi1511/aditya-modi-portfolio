document.addEventListener('DOMContentLoaded', () => {
    // Navbar scroll effect
    const header = document.querySelector('header');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });

    // Back to top button
    const backToTop = document.querySelector('.back-to-top');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 400) {
            backToTop.classList.add('active');
        } else {
            backToTop.classList.remove('active');
        }
    });

    // Scroll Reveal animation trigger
    const reveals = document.querySelectorAll('.reveal-fade-up');
    const revealOnScroll = () => {
        reveals.forEach(element => {
            const windowHeight = window.innerHeight;
            const elementTop = element.getBoundingClientRect().top;
            const elementVisible = 150;
            if (elementTop < windowHeight - elementVisible) {
                element.classList.add('active');
            }
        });
    };
    window.addEventListener('scroll', revealOnScroll);
    revealOnScroll();

    // Skill Bar Progress Animation
    const skillSection = document.querySelector('#skills');
    let animated = false;
    window.addEventListener('scroll', () => {
        if(!skillSection) return;
        const rect = skillSection.getBoundingClientRect();
        if(rect.top < window.innerHeight && !animated) {
            document.querySelectorAll('.skill-progress').forEach(bar => {
                bar.style.width = bar.getAttribute('data-width');
            });
            animated = true;
        }
    });

    // Skills Tabs
    const skillTabs = document.querySelectorAll('.skill-tab');
    const skillsGroups = document.querySelectorAll('.skills-group');

    if (skillTabs.length && skillsGroups.length) {
        skillTabs.forEach(tab => {
            tab.addEventListener('click', () => {
                skillTabs.forEach(button => button.classList.remove('active'));
                tab.classList.add('active');

                const targetGroup = tab.getAttribute('data-group');
                skillsGroups.forEach(group => {
                    group.classList.toggle('active', group.getAttribute('data-group') === targetGroup);
                });
            });
        });
    }
});