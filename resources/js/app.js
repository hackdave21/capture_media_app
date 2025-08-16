
import '../css/app.css';
import './bootstrap';
// Theme management
document.addEventListener('DOMContentLoaded', function() {
    // Initialize theme from localStorage
    const savedTheme = localStorage.getItem('darkMode');
    if (savedTheme === 'true') {
        document.documentElement.classList.add('dark');
    }

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Lazy loading for images
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    imageObserver.unobserve(img);
                }
            });
        });

        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    }

    // Copy to clipboard functionality
    window.copyToClipboard = function(text) {
        navigator.clipboard.writeText(text).then(function() {
            // Show success message
            const toast = document.createElement('div');
            toast.className = 'fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg z-50 transform transition-all duration-300';
            toast.textContent = 'Lien copié !';
            document.body.appendChild(toast);
            
            setTimeout(() => {
                toast.style.transform = 'translateX(100%)';
                setTimeout(() => toast.remove(), 300);
            }, 2000);
        });
    };

    // Social sharing
    window.shareOnSocial = function(platform, url, title) {
        const encodedUrl = encodeURIComponent(url);
        const encodedTitle = encodeURIComponent(title);
        let shareUrl;

        switch (platform) {
            case 'facebook':
                shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodedUrl}`;
                break;
            case 'twitter':
                shareUrl = `https://twitter.com/intent/tweet?url=${encodedUrl}&text=${encodedTitle}`;
                break;
            case 'linkedin':
                shareUrl = `https://www.linkedin.com/sharing/share-offsite/?url=${encodedUrl}`;
                break;
            case 'whatsapp':
                shareUrl = `https://wa.me/?text=${encodedTitle} ${encodedUrl}`;
                break;
            default:
                return;
        }

        window.open(shareUrl, '_blank', 'width=600,height=400,scrollbars=yes,resizable=yes');
    };

    // Enhanced search with debounce
    let searchTimeout;
    const searchInput = document.querySelector('input[name="q"]');
    if (searchInput) {
        searchInput.addEventListener('input', function(e) {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                // Could implement live search suggestions here
                console.log('Searching for:', e.target.value);
            }, 300);
        });
    }

    // Cookie consent management
    window.setCookieConsent = function(accepted) {
        localStorage.setItem('cookieConsent', accepted ? 'accepted' : 'rejected');
        
        // Track consent decision
        if (typeof gtag !== 'undefined') {
            gtag('consent', 'update', {
                'analytics_storage': accepted ? 'granted' : 'denied',
                'ad_storage': accepted ? 'granted' : 'denied'
            });
        }
        
        // Hide cookie banner
        const banner = document.querySelector('[x-data*="showCookies"]');
        if (banner) {
            banner.style.display = 'none';
        }
    };

    // Initialize cookie consent
    const cookieConsent = localStorage.getItem('cookieConsent');
    if (cookieConsent === 'accepted') {
        // Enable analytics if cookies accepted
        if (typeof gtag !== 'undefined') {
            gtag('consent', 'update', {
                'analytics_storage': 'granted',
                'ad_storage': 'granted'
            });
        }
    }

    // Donation tracking
    window.trackDonation = function(method) {
        console.log('Donation attempt:', method);
        if (typeof gtag !== 'undefined') {
            gtag('event', 'donation_attempt', {
                'method': method,
                'currency': 'XOF'
            });
        }
    };

    // Intersection Observer for animations
    if ('IntersectionObserver' in window) {
        const animationObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in-scale');
                }
            });
        }, {
            threshold: 0.1
        });

        document.querySelectorAll('.animate-on-scroll').forEach(el => {
            animationObserver.observe(el);
        });
    }

    // Reading progress bar (for article pages)
    const progressBar = document.querySelector('.reading-progress');
    if (progressBar) {
        window.addEventListener('scroll', () => {
            const article = document.querySelector('article');
            if (article) {
                const articleTop = article.offsetTop;
                const articleHeight = article.offsetHeight;
                const windowTop = window.pageYOffset;
                const windowHeight = window.innerHeight;
                
                const progress = Math.min(
                    Math.max((windowTop - articleTop + windowHeight) / articleHeight, 0),
                    1
                );
                
                progressBar.style.width = `${progress * 100}%`;
            }
        });
    }
});

// Performance optimization: Preload critical resources
window.addEventListener('load', function() {
    // Preload next page resources if applicable
    const nextPageLinks = document.querySelectorAll('a[rel="next"]');
    nextPageLinks.forEach(link => {
        const linkElement = document.createElement('link');
        linkElement.rel = 'prefetch';
        linkElement.href = link.href;
        document.head.appendChild(linkElement);
    });
});

// Service Worker registration (for future PWA capabilities)
if ('serviceWorker' in navigator) {
    window.addEventListener('load', function() {
        // Uncomment when service worker is implemented
        // navigator.serviceWorker.register('/sw.js');
    });
}

// Analytics and performance tracking
window.trackEvent = function(eventName, properties = {}) {
    // Placeholder for analytics tracking
    console.log('Event:', eventName, properties);
    
    // Could integrate with Google Analytics, Mixpanel, etc.
    if (typeof gtag !== 'undefined') {
        gtag('event', eventName, properties);
    }
};

// Error handling and logging
window.addEventListener('error', function(e) {
    console.error('JavaScript error:', e.error);
    // Could send to error tracking service like Sentry
});

window.addEventListener('unhandledrejection', function(e) {
    console.error('Unhandled promise rejection:', e.reason);
    // Could send to error tracking service
});