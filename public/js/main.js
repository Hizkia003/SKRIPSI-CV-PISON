// ===== AOS INIT =====
document.addEventListener("DOMContentLoaded", function () {
    if (typeof AOS !== "undefined") {
        AOS.init({
            duration: 800,
            easing: "ease-in-out",
            once: true,
            offset: 80,
        });
    }
});

// ===== NAVBAR SCROLL =====
window.addEventListener("scroll", function () {
    const navbar = document.querySelector(".navbar-custom");
    if (navbar) {
        if (window.scrollY > 50) navbar.classList.add("scrolled");
        else navbar.classList.remove("scrolled");
    }

    // Scroll Top Button
    const scrollBtn = document.getElementById("scrollTopBtn");
    if (scrollBtn) {
        if (window.scrollY > 400) scrollBtn.classList.add("show");
        else scrollBtn.classList.remove("show");
    }
});

// ===== SCROLL TO TOP =====
const scrollTopBtn = document.getElementById("scrollTopBtn");
if (scrollTopBtn) {
    scrollTopBtn.addEventListener("click", function () {
        window.scrollTo({ top: 0, behavior: "smooth" });
    });
}

// ===== COUNTER ANIMATION =====
function animateCounter(el, target) {
    let current = 0;
    const increment = target / 60;
    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            el.textContent = target + "+";
            clearInterval(timer);
        } else {
            el.textContent = Math.floor(current);
        }
    }, 25);
}

const counters = document.querySelectorAll(".stat-number");
if (counters.length) {
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const target = parseInt(entry.target.dataset.count);
                    animateCounter(entry.target, target);
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.5 },
    );
    counters.forEach((counter) => observer.observe(counter));
}

// ===== PROJECT FILTER =====
const filterBtns = document.querySelectorAll(".filter-btn");
const projectItems = document.querySelectorAll(".project-item");

if (filterBtns.length) {
    filterBtns.forEach((btn) => {
        btn.addEventListener("click", function () {
            filterBtns.forEach((b) => b.classList.remove("active"));
            this.classList.add("active");

            const filter = this.dataset.filter;
            projectItems.forEach((item) => {
                if (filter === "all" || item.dataset.category === filter) {
                    item.style.display = "block";
                    setTimeout(() => {
                        item.style.opacity = "1";
                        item.style.transform = "scale(1)";
                    }, 10);
                } else {
                    item.style.opacity = "0";
                    item.style.transform = "scale(0.8)";
                    setTimeout(() => (item.style.display = "none"), 300);
                }
            });
        });
    });

    projectItems.forEach((item) => {
        item.style.transition = "all 0.3s ease";
    });
}

// ===== SMOOTH SCROLL =====
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
        const href = this.getAttribute("href");
        if (href === "#") return;
        const target = document.querySelector(href);
        if (target) {
            e.preventDefault();
            target.scrollIntoView({ behavior: "smooth", block: "start" });
        }
    });
});

// ===== FORM VALIDATION (FRONT ONLY) =====
const contactForm = document.querySelector(".contact-form");
if (contactForm) {
    contactForm.addEventListener("submit", function (e) {
        // Optional validation can be added here
        const btn = this.querySelector('button[type="submit"]');
        if (btn) {
            btn.innerHTML =
                '<span class="spinner-border spinner-border-sm me-2"></span> Mengirim...';
            btn.disabled = true;
        }
    });
}
