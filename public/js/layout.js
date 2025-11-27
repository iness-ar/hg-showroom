document.addEventListener('DOMContentLoaded', () => {
    const wrapper = document.getElementById('wrapper');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const body = document.getElementById('page-body');
    const toggleButton = document.getElementById('darkModeToggle');
    const toggleIcon = document.getElementById('darkModeIcon');

    const savedSidebarState = localStorage.getItem('sidebarState');

    if (wrapper && sidebarToggle) {
        if (savedSidebarState === 'visible') {
            wrapper.classList.remove('toggled');
        } else {
            wrapper.classList.add('toggled');
        }

        sidebarToggle.addEventListener('click', () => {
            wrapper.classList.toggle('toggled');
            if (wrapper.classList.contains('toggled')) {
                localStorage.setItem('sidebarState', 'hidden');
            } else {
                localStorage.setItem('sidebarState', 'visible');
            }
        });
    }

    const savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'dark') {
        body.classList.add('dark-mode');
        toggleIcon.classList.remove('bi-moon-stars-fill');
        toggleIcon.classList.add('bi-sun-fill');
    }

    toggleButton.addEventListener('click', () => {
        body.classList.toggle('dark-mode');
        if (body.classList.contains('dark-mode')) {
            localStorage.setItem('theme', 'dark');
            toggleIcon.classList.remove('bi-moon-stars-fill');
            toggleIcon.classList.add('bi-sun-fill');
        } else {
            localStorage.setItem('theme', 'light');
            toggleIcon.classList.remove('bi-sun-fill');
            toggleIcon.classList.add('bi-moon-stars-fill');
        }
    });
});
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("wrapper").classList.add("toggled");
});
