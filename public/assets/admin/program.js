const bookingsData = [
    { id: 1, name: 'রহিম আহমেদ', phone: '01711111111', email: 'rahim@example.com', plotSize: '২.৫ কাঠা', plotNumber: 'A-101', amount: 8000000, paid: 3500000, status: 'active', date: '2025-01-15' },
    { id: 2, name: 'করিম হোসেন', phone: '01722222222', email: 'karim@example.com', plotSize: '৫ কাঠা', plotNumber: 'B-205', amount: 15000000, paid: 15000000, status: 'completed', date: '2024-11-20' },
    { id: 3, name: 'সাফিয়া বেগম', phone: '01833333333', email: 'safia@example.com', plotSize: '৩.৭৫ কাঠা', plotNumber: 'C-310', amount: 12500000, paid: 500000, status: 'pending', date: '2025-03-01' },
    { id: 4, name: 'জসিম উদ্দিন', phone: '01944444444', email: 'jasim@example.com', plotSize: '২.৫ কাঠা', plotNumber: 'A-102', amount: 8000000, paid: 8000000, status: 'completed', date: '2024-12-10' },
    { id: 5, name: 'ফরিদা আক্তার', phone: '01655555555', email: 'farida@example.com', plotSize: '৫ কাঠা', plotNumber: 'B-206', amount: 16000000, paid: 6000000, status: 'active', date: '2025-02-28' },
];

const plotData = [
    { id: 'A-101', size: '২.৫ কাঠা', price: 8000000, block: 'A', status: 'sold' },
    { id: 'A-102', size: '২.৫ কাঠা', price: 8000000, block: 'A', status: 'sold' },
    { id: 'A-103', size: '২.৫ কাঠা', price: 8200000, block: 'A', status: 'available' },
    { id: 'B-205', size: '৫ কাঠা', price: 15000000, block: 'B', status: 'sold' },
    { id: 'B-206', size: '৫ কাঠা', price: 16000000, block: 'B', status: 'sold' },
    { id: 'B-207', size: '৫ কাঠা', price: 15500000, block: 'B', status: 'available' },
    { id: 'C-310', size: '৩.৭৫ কাঠা', price: 12500000, block: 'C', status: 'reserved' },
    { id: 'C-311', size: '৩.৭৫ কাঠা', price: 12800000, block: 'C', status: 'available' },
];

// Utility Functions
const formatCurrency = (amount) => {
    return `৳${(amount / 100000).toFixed(2).replace(/\B(?=(\d{2})+(?!\d))/g, ',')}L`;
}

const formatFullCurrency = (amount) => {
    return `৳${amount.toLocaleString('en-IN')}`;
}

const getStatusBadge = (status) => {
    let className = '';
    let text = '';
    switch (status) {
        case 'active':
            className = 'status-active';
            text = 'সক্রিয়';
            break;
        case 'pending':
            className = 'status-pending';
            text = 'বিচারাধীন';
            break;
        case 'completed':
            className = 'status-completed';
            text = 'সম্পন্ন';
            break;
        case 'available':
            className = 'plot-status available';
            text = 'উপলব্ধ';
            break;
        case 'reserved':
            className = 'plot-status reserved';
            text = 'সংরক্ষিত';
            break;
        case 'sold':
            className = 'plot-status sold';
            text = 'বিক্রিত';
            break;
        default:
            className = '';
            text = status;
    }
    return `<span class="status-badge ${className}">${text}</span>`;
}

// Global Variables for Charts
let salesChartInstance, revenueChartInstance, plotChartInstance;


// 1. Sidebar and Tab Management
const pageTitles = {
    'overview': 'ড্যাশবোর্ড ওভারভিউ',
    'home': 'হোম',
    'about': 'আমাদের সম্পর্কে',
    'projects': 'প্রকল্প',
    'bookings': 'বুকিং তথ্য',
    'header': 'হেডার',
    'footer': 'ফুটার',
    'footer-preview': 'ফুটার প্রিভিউ',
    'contact': 'কন্ট্যাক্ট প্রিভিউ',
    'plots': 'প্লট তালিকা',
    'customers': 'গ্রাহক তালিকা',
    'reports': 'রিপোর্ট ও বিশ্লেষণ',
    'settings': 'সেটিংস'
};

function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('collapsed');
}

// Toggle Home submenu with fade/expand only (do not switch tab)
function toggleHomeMenu() {
    const submenu = document.getElementById('homeSubmenu');
    if (submenu) {
        submenu.classList.toggle('open');
        const trigger = document.querySelector('.nav-item[data-tab="home"]');
        if (trigger) trigger.setAttribute('aria-expanded', submenu.classList.contains('open') ? 'true' : 'false');
    }
}

// Toggle About submenu with fade/expand only (do not switch tab)
function toggleAboutMenu() {
    const submenu = document.getElementById('aboutSubmenu');
    if (submenu) {
        submenu.classList.toggle('open');
        const trigger = document.querySelector('.nav-item[data-tab="about"]');
        if (trigger) trigger.setAttribute('aria-expanded', submenu.classList.contains('open') ? 'true' : 'false');
    }
}

// Toggle Projects submenu with fade/expand only (do not switch tab)
function toggleProjectsMenu() {
    const submenu = document.getElementById('projectsSubmenu');
    if (submenu) {
        submenu.classList.toggle('open');
        const trigger = document.querySelector('.nav-item[data-tab="projects"]');
        if (trigger) trigger.setAttribute('aria-expanded', submenu.classList.contains('open') ? 'true' : 'false');
    }
}

// Update active submenu item
function updateActiveSubmenu(tabId, sectionId) {
    // Remove active class from all subitems
    document.querySelectorAll('.nav-subitem').forEach(item => {
        item.classList.remove('active');
    });

    // Add active class to current subitem
    if (sectionId) {
        const activeSubitem = document.querySelector(`.nav-subitem[onclick*="'${sectionId}'"]`);
        if (activeSubitem) {
            activeSubitem.classList.add('active');
        }
    }
}

// Navigate to a tab and scroll to a section smoothly
function navigateTo(tabId, sectionId, skipAnimation = false) {
    showTab(tabId);

    // Update active submenu item
    updateActiveSubmenu(tabId, sectionId);

    // Save current section to localStorage
    try {
        localStorage.setItem('adminActiveSection', sectionId || '');
        localStorage.setItem('adminActiveTab', tabId || '');
    } catch (e) { /* ignore */ }

    // Small delay to allow DOM to update visibility
    setTimeout(() => {
        // Within the tab, show only the requested section block (hide others)
        if (sectionId) {
            const tabEl = document.getElementById(tabId);
            if (tabEl) {
                const blocks = tabEl.querySelectorAll('[id^="' + tabId + '-"]');
                blocks.forEach(sec => {
                    sec.style.display = (sec.id === sectionId) ? 'block' : 'none';
                });
            }
        }
        // If navigating to Home > Testimonials editor, broadcast a signal so the public site refreshes its carousel
        try {
            if (tabId === 'home' && sectionId === 'home-testimonials') {
                localStorage.setItem('refreshTestimonials', String(Date.now()));
            }
        } catch (e) { /* ignore */ }
        // Special case: for Home > Hero, scroll to top of Home tab
        const target = (tabId === 'home' && sectionId === 'home-hero')
            ? document.getElementById('home')
            : document.getElementById(sectionId);
        if (!target) return;
        // Prefer scrolling within content area if present
        const container = document.querySelector('.content-area');
        if (container && container.contains(target)) {
            // Compute offsetTop relative to container to align exactly at top
            let top = 0; let node = target;
            while (node && node !== container) { top += node.offsetTop; node = node.offsetParent; }
            // Use instant scroll if skipAnimation is true (e.g., on page load)
            container.scrollTo({ top, behavior: skipAnimation ? 'auto' : 'smooth' });
        } else {
            target.scrollIntoView({ behavior: skipAnimation ? 'auto' : 'smooth', block: 'start' });
        }
    }, 50);
}

function showTab(tabId) {
    // Update active sidebar item
    document.querySelectorAll('.nav-item').forEach(item => {
        item.classList.remove('active');
    });
    const activeItem = document.querySelector(`.nav-item[data-tab="${tabId}"]`);
    if (activeItem) activeItem.classList.add('active');

    // Hide all tab content
    document.querySelectorAll('.tab-content').forEach(content => {
        content.classList.remove('active');
    });

    // Show current tab content
    const currentTab = document.getElementById(tabId);
    if (currentTab) {
        currentTab.classList.add('active');

        // Reset subsection visibility - show all subsections within this tab
        const subsections = currentTab.querySelectorAll('[id^="' + tabId + '-"]');
        subsections.forEach(sec => {
            sec.style.display = 'block';
        });
    }

    // Update header title
    document.getElementById('pageTitle').textContent = pageTitles[tabId] || 'ড্যাশবোর্ড';

    // No special handling needed for book tab

    // Auto-collapse submenus when switching to other tabs
    const homeSub = document.getElementById('homeSubmenu');
    const aboutSub = document.getElementById('aboutSubmenu');
    const projectsSub = document.getElementById('projectsSubmenu');
    if (homeSub && tabId !== 'home') homeSub.classList.remove('open');
    if (aboutSub && tabId !== 'about') aboutSub.classList.remove('open');
    if (projectsSub && tabId !== 'projects') projectsSub.classList.remove('open');

    // Re-render charts/data for the visible tab
    if (tabId === 'overview') {
        renderOverview();
    } else if (tabId === 'plots') {
        renderPlotsGrid();
    }

    // Save current tab to localStorage
    try {
        localStorage.setItem('adminActiveTab', tabId);
    } catch (e) { /* ignore */ }
}


// 2. Overview Tab Logic
function updateStats() {
    document.getElementById('statTotalBookings').textContent = bookingsData.length;

    const activeBookings = bookingsData.filter(b => b.status === 'active' || b.status === 'pending');
    document.getElementById('statActiveBookings').textContent = activeBookings.length;

    const totalRevenue = bookingsData.reduce((sum, b) => sum + b.paid, 0);
    document.getElementById('statTotalRevenue').textContent = formatCurrency(totalRevenue);

    const availablePlots = plotData.filter(p => p.status === 'available');
    document.getElementById('statAvailablePlots').textContent = availablePlots.length;
}

function renderRecentBookings() {
    const container = document.getElementById('recentBookings');
    container.innerHTML = '';

    // Sort by date (most recent first) and take top 5
    const recent = [...bookingsData]
        .sort((a, b) => new Date(b.date) - new Date(a.date))
        .slice(0, 5);

    if (recent.length === 0) {
        container.innerHTML = '<p style="color: #6b7280;">কোনো সাম্প্রতিক বুকিং নেই।</p>';
        return;
    }

    recent.forEach(booking => {
        const item = document.createElement('div');
        item.className = 'recent-booking-item';
        item.innerHTML = `
                    <div class="recent-booking-info">
                        <span class="name">${booking.name}</span>
                        <span class="plot">${booking.plotNumber} (${booking.plotSize}) - ${getStatusText(booking.status)}</span>
                    </div>
                    <div class="recent-booking-amount">${formatFullCurrency(booking.paid)}</div>
                `;
        container.appendChild(item);
    });
}

const getStatusText = (status) => {
    switch (status) {
        case 'active': return 'সক্রিয়';
        case 'pending': return 'বিচারাধীন';
        case 'completed': return 'সম্পন্ন';
        default: return status;
    }
}

// Chart Rendering
function renderSalesChart() {
    const ctx = document.getElementById('salesChart').getContext('2d');

    // Dummy data for monthly sales
    const data = {
        labels: ['জানু', 'ফেব্রু', 'মার্চ', 'এপ্রিল', 'মে', 'জুন'],
        datasets: [{
            label: 'বিক্রিত প্লট',
            data: [1, 2, 1, 3, 2, 4],
            backgroundColor: '#10b981',
            borderColor: '#059669',
            borderWidth: 1,
            borderRadius: 5,
        }]
    };

    if (salesChartInstance) salesChartInstance.destroy();
    salesChartInstance = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: { beginAtZero: true, ticks: { precision: 0 } }
            },
            plugins: { legend: { display: false } }
        }
    });
}

function renderRevenueChart() {
    const ctx = document.getElementById('revenueChart').getContext('2d');

    // Dummy data for revenue trend (in Lakhs)
    const data = {
        labels: ['জানু', 'ফেব্রু', 'মার্চ', 'এপ্রিল', 'মে', 'জুন'],
        datasets: [{
            label: 'মোট আয় (Lakhs)',
            data: [35, 150, 50, 80, 60, 100],
            fill: true,
            backgroundColor: 'rgba(59, 130, 246, 0.2)',
            borderColor: '#3b82f6',
            tension: 0.3,
            pointBackgroundColor: '#3b82f6',
        }]
    };

    if (revenueChartInstance) revenueChartInstance.destroy();
    revenueChartInstance = new Chart(ctx, {
        type: 'line',
        data: data,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: { beginAtZero: true, title: { display: true, text: 'আয় (Lakhs)' } }
            },
            plugins: { legend: { display: false } }
        }
    });
}

function renderPlotChart() {
    const ctx = document.getElementById('plotChart').getContext('2d');

    // Data for plot distribution by size
    const sizeCounts = plotData.reduce((acc, plot) => {
        acc[plot.size] = (acc[plot.size] || 0) + 1;
        return acc;
    }, {});

    const data = {
        labels: Object.keys(sizeCounts),
        datasets: [{
            data: Object.values(sizeCounts),
            backgroundColor: ['#10b981', '#f59e0b', '#3b82f6', '#8b5cf6'],
            hoverOffset: 4
        }]
    };

    if (plotChartInstance) plotChartInstance.destroy();
    plotChartInstance = new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'right' }
            }
        }
    });
}

function renderOverview() {
    updateStats();
    renderSalesChart();
    renderRevenueChart();
    renderPlotChart();
    renderRecentBookings();
}

// Header settings (navbar) form persistence
const headerDefaults = {
    brandText: 'জলজোছনা',
    homeLabel: 'হোম',
    aboutLabel: 'আমাদের সম্পর্কে',
    featuresLabel: 'সুবিধা',
    pricingLabel: 'মূল্য তালিকা',
    testimonialsLabel: 'মন্তব্য',
    otherProjectsLabel: 'অন্যান্য প্রকল্প',
    contactLabel: 'যোগাযোগ',
    logoUrl: '/images/Joljochna.png',
    logoDataUrl: '',
    ctaText: 'এখনই বুক করুন',
    ctaHref: '#contact'
};

// Holds current in-memory uploaded logo as data URL
let headerLogoDataUrl = '';

function loadHeaderSettings() {
    const form = document.getElementById('headerSettingsForm');
    if (!form) return; // form not on page
    let saved = {};
    try { saved = JSON.parse(localStorage.getItem('headerSettings') || '{}'); } catch (e) { saved = {}; }
    const values = { ...headerDefaults, ...saved };
    const setVal = (id, val) => { const el = document.getElementById(id); if (el) el.value = val; };
    setVal('logoUrl', values.logoUrl);
    headerLogoDataUrl = values.logoDataUrl || '';
    setVal('brandText', values.brandText);
    setVal('homeLabel', values.homeLabel);
    setVal('aboutLabel', values.aboutLabel);
    setVal('featuresLabel', values.featuresLabel);
    setVal('pricingLabel', values.pricingLabel);
    setVal('testimonialsLabel', values.testimonialsLabel);
    setVal('otherProjectsLabel', values.otherProjectsLabel);
    setVal('contactLabel', values.contactLabel);
    setVal('ctaText', values.ctaText);
    setVal('ctaHref', values.ctaHref);

    // Initialize logo preview
    const preview = document.getElementById('headerLogoPreview');
    if (preview) {
        preview.src = headerLogoDataUrl || values.logoUrl || '';
        preview.style.display = (preview.src ? 'block' : 'none');
    }

    // Sidebar (dashboard) logo is managed from user profile, not header settings.

    // Attach file change handler once
    const fileInput = document.getElementById('headerLogoFile');
    if (fileInput && !fileInput.dataset.bound) {
        fileInput.addEventListener('change', (e) => {
            const file = e.target.files && e.target.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = () => {
                headerLogoDataUrl = reader.result;
                if (preview) {
                    preview.src = headerLogoDataUrl;
                    preview.style.display = 'block';
                }
                updateHeaderPreview();
            };
            reader.readAsDataURL(file);
        });
        fileInput.dataset.bound = 'true';
    }

    // Bind input listeners for live preview
    const fields = ['brandText', 'homeLabel', 'aboutLabel', 'featuresLabel', 'pricingLabel', 'testimonialsLabel', 'otherProjectsLabel', 'contactLabel', 'ctaText', 'ctaHref'];
    fields.forEach(id => {
        const el = document.getElementById(id);
        if (el && !el.dataset.bound) {
            el.addEventListener('input', updateHeaderPreview);
            el.dataset.bound = 'true';
        }
    });

    // Initialize preview with current values
    updateHeaderPreview();
}

function saveHeaderSettings() {
    const form = document.getElementById('headerSettingsForm');
    if (!form) return;
    const getVal = (id) => { const el = document.getElementById(id); return el ? el.value.trim() : ''; };
    const data = {
        logoUrl: getVal('logoUrl') || headerDefaults.logoUrl,
        logoDataUrl: headerLogoDataUrl || headerDefaults.logoDataUrl,
        brandText: getVal('brandText') || headerDefaults.brandText,
        homeLabel: getVal('homeLabel') || headerDefaults.homeLabel,
        aboutLabel: getVal('aboutLabel') || headerDefaults.aboutLabel,
        featuresLabel: getVal('featuresLabel') || headerDefaults.featuresLabel,
        pricingLabel: getVal('pricingLabel') || headerDefaults.pricingLabel,
        testimonialsLabel: getVal('testimonialsLabel') || headerDefaults.testimonialsLabel,
        otherProjectsLabel: getVal('otherProjectsLabel') || headerDefaults.otherProjectsLabel,
        contactLabel: getVal('contactLabel') || headerDefaults.contactLabel,
        ctaText: getVal('ctaText') || headerDefaults.ctaText,
        ctaHref: getVal('ctaHref') || headerDefaults.ctaHref,
    };
    localStorage.setItem('headerSettings', JSON.stringify(data));
    console.log('Header settings saved:', data);
    window.dispatchEvent(new StorageEvent('storage', { key: 'headerSettings', newValue: JSON.stringify(data) }));
    alertUser('সফল', 'হেডার সেটিংস সংরক্ষণ করা হয়েছে। ওয়েবসাইট রিফ্রেশ করুন বা নতুন ট্যাবে খুলুন।');
}

function resetHeaderSettings() {
    localStorage.removeItem('headerSettings');
    loadHeaderSettings();
    headerLogoDataUrl = '';
    const preview = document.getElementById('headerLogoPreview');
    if (preview) { preview.src = ''; preview.style.display = 'none'; }
    // Do not modify dashboard logo when resetting header settings.
    alertUser('রিসেট', 'ডিফল্ট হেডার সেটিংস পুনরুদ্ধার করা হয়েছে।');
}

// Live preview for Header tab
function updateHeaderPreview() {
    const getVal = (id, fallback = '') => {
        const el = document.getElementById(id);
        return el ? (el.value || fallback) : fallback;
    };

    const logo = document.getElementById('previewLogo');
    const fallbackIcon = document.getElementById('previewFallbackIcon');
    const logoSrc = headerLogoDataUrl; // uploaded image takes precedence in admin
    if (logo && fallbackIcon) {
        if (logoSrc) {
            logo.src = logoSrc;
            logo.style.display = 'inline-block';
            fallbackIcon.style.display = 'none';
        } else {
            logo.src = '';
            logo.style.display = 'none';
            fallbackIcon.style.display = 'block';
        }
    }

    const map = [
        ['previewHome', 'homeLabel'],
        ['previewAbout', 'aboutLabel'],
        ['previewFeatures', 'featuresLabel'],
        ['previewPricing', 'pricingLabel'],
        ['previewTestimonials', 'testimonialsLabel'],
        ['previewOtherProjects', 'otherProjectsLabel'],
        ['previewContact', 'contactLabel']
    ];
    map.forEach(([id, src]) => {
        const el = document.getElementById(id);
        if (el) el.textContent = getVal(src, el.textContent);
    });

    const cta = document.getElementById('previewCta');
    const ctaText = document.getElementById('previewCtaText');
    if (cta) cta.setAttribute('href', getVal('ctaHref', '#contact'));
    if (ctaText) ctaText.textContent = getVal('ctaText', ctaText.textContent || '');

    // Dashboard logo is independent; do not tie it to header fields.
}

// Footer settings
const footerDefaults = {
    footerTitle: 'জলজোছনা',
    footerDescription: 'NEX Real Estate এর একটি প্রকল্প। আপনার স্বপ্নের বাড়ি নির্মাণের জন্য প্রিমিয়াম লোকেশনে সবুজ পরিবেশে গড়ে উঠেছে জলজোছনা।',
    phone1: '+880 1991 995 995',
    phone2: '+880 1991 994 994',
    email: 'hello.nexup@gmail.com',
    projectAddress: 'প্রকল্পের ঠিকানা',
    contactAddress: 'যোগাযোগের ঠিকানা',
    qlHomeLabel: 'হোম', qlHomeHref: '#home',
    qlFeaturesLabel: 'সুবিধাসমূহ', qlFeaturesHref: '#features',
    qlPricingLabel: 'মূল্য তালিকা', qlPricingHref: '#pricing',
    qlContactLabel: 'যোগাযোগ', qlContactHref: '#contact',
    qlGalleryLabel: 'গ্যালারি', qlGalleryHref: '#gallery',
    legalPrivacyLabel: 'গোপনীয়তা নীতি', legalPrivacyHref: '#privacy',
    legalTermsLabel: 'সেবার শর্তাবলী', legalTermsHref: '#terms',
    socialFacebook: '#', socialInstagram: '#', socialTwitter: '#', socialLinkedin: '#', socialYouTube: '#',
    mapUrl: '#',
    bottomText: ' 2025 জলজোছনা। সর্বস্বত্ব সংরক্ষিত। | NEX Real Estate এর একটি প্রকল্প',
    qrDataUrl: '/images/alphainno-qr-code.png',
    qrSectionTitle: 'অবস্থান দেখুন',
    mapButtonText: 'গুগল ম্যাপে দেখুন',
    qrShow: true
};

// in-memory QR image data for admin preview
let footerQrDataUrl = '';

function loadFooterSettings() {
    const form = document.getElementById('footerSettingsForm');
    if (!form) return;

    // Load from API
    fetch('/api/footer-settings')
        .then(response => response.json())
        .then(data => {
            // Map API data to form fields
            const setVal = (id, val) => { const el = document.getElementById(id); if (el) el.value = val; };

            setVal('footerTitle', data.title || '');
            setVal('footerDescription', data.description || '');
            setVal('phone1', data.phone1 || '');
            setVal('phone2', data.phone2 || '');
            setVal('email', data.email || '');
            setVal('projectAddress', data.project_address || '');
            setVal('contactAddress', data.contact_address || '');
            setVal('mapUrl', data.map_url || '');
            setVal('bottomText', data.bottom_text || '');
            setVal('qrSectionTitle', data.qr_section_title || '');
            setVal('mapButtonText', data.map_button_text || '');

            // Quick links
            if (data.quick_links && Array.isArray(data.quick_links)) {
                const ql = data.quick_links;
                if (ql[0]) { setVal('qlHomeLabel', ql[0].label); setVal('qlHomeHref', ql[0].href); }
                if (ql[1]) { setVal('qlFeaturesLabel', ql[1].label); setVal('qlFeaturesHref', ql[1].href); }
                if (ql[2]) { setVal('qlPricingLabel', ql[2].label); setVal('qlPricingHref', ql[2].href); }
                if (ql[3]) { setVal('qlContactLabel', ql[3].label); setVal('qlContactHref', ql[3].href); }
                if (ql[4]) { setVal('qlGalleryLabel', ql[4].label); setVal('qlGalleryHref', ql[4].href); }
            }

            // Legal links
            if (data.legal_links && Array.isArray(data.legal_links)) {
                const ll = data.legal_links;
                if (ll[0]) { setVal('legalPrivacyLabel', ll[0].label); setVal('legalPrivacyHref', ll[0].href); }
                if (ll[1]) { setVal('legalTermsLabel', ll[1].label); setVal('legalTermsHref', ll[1].href); }
            }

            // Social links
            if (data.social_links && typeof data.social_links === 'object') {
                setVal('socialFacebook', data.social_links.facebook || '');
                setVal('socialInstagram', data.social_links.instagram || '');
                setVal('socialTwitter', data.social_links.twitter || '');
                setVal('socialLinkedin', data.social_links.linkedin || '');
                setVal('socialYouTube', data.social_links.youtube || '');
            }

            // QR image
            footerQrDataUrl = data.qr_image_path ? '/storage/' + data.qr_image_path : '';
            const pvQr = document.getElementById('pvQrImg');
            const pvQrPlaceholder = document.getElementById('pvQrPlaceholder');
            if (pvQr) {
                if (footerQrDataUrl) {
                    pvQr.src = footerQrDataUrl;
                    pvQr.style.display = 'block';
                    pvQr.style.position = 'relative';
                    pvQr.style.zIndex = '1';
                    pvQr.style.maxWidth = '148px';
                    pvQr.style.maxHeight = '148px';
                    pvQr.style.width = 'auto';
                    pvQr.style.height = 'auto';
                    if (pvQrPlaceholder) pvQrPlaceholder.style.display = 'none';
                } else {
                    pvQr.src = '';
                    pvQr.style.display = 'none';
                    if (pvQrPlaceholder) {
                        pvQrPlaceholder.style.display = 'block';
                        pvQrPlaceholder.style.position = 'absolute';
                    }
                }
            }

            // Bind listeners for live preview
            Array.from(form.querySelectorAll('input, textarea')).forEach(el => {
                if (!el.dataset.bound) {
                    el.addEventListener('input', updateFooterPreview);
                    el.dataset.bound = 'true';
                }
            });

            // Update preview
            updateFooterPreview();
        })
        .catch(error => {
            console.error('Error loading footer settings:', error);
            // Fallback to defaults
            const v = footerDefaults;
            const setVal = (id, val) => { const el = document.getElementById(id); if (el) el.value = val; };
            Object.keys(footerDefaults).forEach(k => setVal(k, v[k] ?? ''));
        });

    // Bind file input listener for QR upload preview - always ensure it's bound
    const qrInput = document.getElementById('footerQrFile');
    if (qrInput) {
        // Remove data-bound attribute to allow re-binding if needed
        if (qrInput.dataset.bound) {
            delete qrInput.dataset.bound;
        }
        
        // Add event listener (will replace if already exists)
        qrInput.addEventListener('change', function handleQrFileChange(e) {
            const file = e.target.files && e.target.files[0];
            if (!file) {
                // If no file, check if we have existing data
                if (footerQrDataUrl) {
                    const pvQrImg = document.getElementById('pvQrImg');
                    const pvQrPlaceholder = document.getElementById('pvQrPlaceholder');
                    if (pvQrImg && footerQrDataUrl) {
                        pvQrImg.src = footerQrDataUrl;
                        pvQrImg.style.display = 'block';
                        pvQrImg.style.position = 'relative';
                        pvQrImg.style.zIndex = '1';
                    }
                    if (pvQrPlaceholder) {
                        pvQrPlaceholder.style.display = 'none';
                    }
                }
                return;
            }
            
            const pvQrImg = document.getElementById('pvQrImg');
            const pvQrPlaceholder = document.getElementById('pvQrPlaceholder');
            
            if (!pvQrImg || !pvQrPlaceholder) {
                console.error('Preview elements not found');
                return;
            }
            
            // Show image immediately with object URL
            let objectUrl = '';
            try {
                objectUrl = URL.createObjectURL(file);
                if (pvQrImg) {
                    pvQrImg.src = objectUrl;
                    pvQrImg.style.display = 'block';
                    pvQrImg.style.position = 'relative';
                    pvQrImg.style.zIndex = '1';
                    pvQrImg.style.maxWidth = '148px';
                    pvQrImg.style.maxHeight = '148px';
                    pvQrImg.style.width = 'auto';
                    pvQrImg.style.height = 'auto';
                }
                if (pvQrPlaceholder) {
                    pvQrPlaceholder.style.display = 'none';
                }
            } catch (err) {
                console.error('Error creating object URL:', err);
            }
            
            // Read file for permanent storage
            const reader = new FileReader();
            reader.onload = () => {
                footerQrDataUrl = reader.result;
                if (pvQrImg) {
                    pvQrImg.src = footerQrDataUrl;
                    pvQrImg.style.display = 'block';
                    pvQrImg.style.position = 'relative';
                    pvQrImg.style.zIndex = '1';
                    pvQrImg.style.maxWidth = '148px';
                    pvQrImg.style.maxHeight = '148px';
                    pvQrImg.style.width = 'auto';
                    pvQrImg.style.height = 'auto';
                }
                if (pvQrPlaceholder) {
                    pvQrPlaceholder.style.display = 'none';
                }
                // Clean up object URL
                if (objectUrl) {
                    try {
                        URL.revokeObjectURL(objectUrl);
                    } catch (_) {}
                }
                // Also update preview function to ensure consistency
                updateFooterPreview();
            };
            reader.onerror = () => {
                console.error('Error reading file');
                if (pvQrPlaceholder) pvQrPlaceholder.style.display = 'block';
                if (pvQrImg) pvQrImg.style.display = 'none';
            };
            reader.readAsDataURL(file);
        });
        qrInput.dataset.bound = 'true';
    }
}

function saveFooterSettings() {
    // Continue with original save logic
    const form = document.getElementById('footerSettingsForm');
    if (!form) return;

    const formData = new FormData();

    // Map form field IDs to API field names
    const fieldMapping = {
        'footerTitle': 'title',
        'footerDescription': 'description',
        'phone1': 'phone1',
        'phone2': 'phone2',
        'email': 'email',
        'projectAddress': 'project_address',
        'contactAddress': 'contact_address',
        'mapUrl': 'map_url',
        'bottomText': 'bottom_text',
        'qrSectionTitle': 'qr_section_title',
        'mapButtonText': 'map_button_text',
        'qlHomeLabel': 'qlHomeLabel',
        'qlHomeHref': 'qlHomeHref',
        'qlFeaturesLabel': 'qlFeaturesLabel',
        'qlFeaturesHref': 'qlFeaturesHref',
        'qlPricingLabel': 'qlPricingLabel',
        'qlPricingHref': 'qlPricingHref',
        'qlContactLabel': 'qlContactLabel',
        'qlContactHref': 'qlContactHref',
        'qlGalleryLabel': 'qlGalleryLabel',
        'qlGalleryHref': 'qlGalleryHref',
        'legalPrivacyLabel': 'legalPrivacyLabel',
        'legalPrivacyHref': 'legalPrivacyHref',
        'legalTermsLabel': 'legalTermsLabel',
        'legalTermsHref': 'legalTermsHref',
        'socialFacebook': 'socialFacebook',
        'socialInstagram': 'socialInstagram',
        'socialTwitter': 'socialTwitter',
        'socialLinkedin': 'socialLinkedin',
        'socialYouTube': 'socialYouTube'
    };

    // Add all form fields with correct names
    Object.keys(fieldMapping).forEach(formId => {
        const el = document.getElementById(formId);
        if (el) {
            formData.append(fieldMapping[formId], el.value);
        }
    });

    // Add QR file if selected
    const qrFileEl = document.getElementById('footerQrFile');
    if (qrFileEl && qrFileEl.files.length > 0) {
        formData.append('qr_image', qrFileEl.files[0]);
    }

    // Send to backend
    fetch('/admin/footer-settings', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
        }
    })
        .then(response => response.json())
        .then(data => {
            if (data.success || response.ok) {
                alertUser('সফল', 'ফুটার সেটিংস সংরক্ষণ করা হয়েছে।');
                // Reload settings in admin
                loadFooterSettings();
                // Trigger live update for footer - set refresh after successful save
                try {
                    localStorage.setItem('refreshFooter', Date.now().toString());
                } catch(e) {}
                // Also dispatch event for cross-tab communication
                window.dispatchEvent(new CustomEvent('footerSettingsUpdated'));
            } else {
                alertUser('ত্রুটি', 'সেটিংস সংরক্ষণ করতে ব্যর্থ হয়েছে।');
            }
        })
        .catch(error => {
            console.error('Error saving footer settings:', error);
            alertUser('ত্রুটি', 'সেটিংস সংরক্ষণ করতে ব্যর্থ হয়েছে।');
        });
}

function resetFooterSettings() {
    // Clear localStorage
    localStorage.removeItem('footerSettings');
    // Reload settings from backend (which should have defaults if no record exists)
    loadFooterSettings();
    alertUser('রিসেট', 'ডিফল্ট ফুটার সেটিংস পুনরুদ্ধার করা হয়েছে।');
}

function updateFooterPreview() {
    // Default values for preview
    const defaults = {
        title: 'জলজোছনা',
        description: 'NEX Real Estate এর একটি প্রকল্প। আপনার স্বপ্নের বাড়ি নির্মাণের জন্য প্রিমিয়াম লোকেশনে সবুজ পরিবেশে গড়ে উঠেছে জলজোছনা।',
        phone1: '+880 1991 995 995',
        phone2: '+880 1991 994 994',
        email: 'hello.nexup@gmail.com',
        projectAddress: 'শুভনূর ৩৮৮ বাড়ি সিদ্ধার্থ এস আবাস, খুলনা, বাংলাদেশ',
        contactAddress: 'NEX Real Estate, Century Trade Center, House-23/C, Road-17, Kamal Ataturk Ave, Banani C/A, Dhaka',
        qlHomeLabel: 'হোম', qlHomeHref: '#home',
        qlFeaturesLabel: 'সুবিধাসমূহ', qlFeaturesHref: '#features',
        qlPricingLabel: 'মূল্য তালিকা', qlPricingHref: '#pricing',
        qlContactLabel: 'যোগাযোগ', qlContactHref: '#contact',
        qlGalleryLabel: 'গ্যালারি', qlGalleryHref: '#gallery',
        socialFacebook: '#', socialInstagram: '#', socialTwitter: '#', socialLinkedin: '#', socialYouTube: '#',
        mapUrl: 'https://maps.google.com/?q=শুভনূর+৩৮৮+বাড়ি+সিদ্ধার্থ+এস+আবাস,+খুলনা',
        bottomText: '© ২০২৫ জলজোছনা। সর্বস্বত্ব সংরক্ষিত। | NEX Real Estate এর একটি প্রকল্প',
        qrSectionTitle: 'অবস্থান দেখুন',
        mapButtonText: 'গুগল ম্যাপে দেখুন'
    };

    const getVal = (id, fallback = '') => { 
        const el = document.getElementById(id); 
        return el ? (el.value || fallback) : fallback; 
    };
    const setText = (id, val) => { const el = document.getElementById(id); if (el) el.textContent = val; };
    const setHref = (id, val) => { const el = document.getElementById(id); if (el) el.setAttribute('href', val); };

    setText('pvTitle', getVal('footerTitle', defaults.title));
    setText('pvDesc', getVal('footerDescription', defaults.description));
    setText('pvPhone1', getVal('phone1', defaults.phone1));
    setText('pvPhone2', getVal('phone2', defaults.phone2));
    setText('pvEmail', getVal('email', defaults.email));
    document.getElementById('pvProjectAddr') && (document.getElementById('pvProjectAddr').textContent = getVal('projectAddress', defaults.projectAddress));
    document.getElementById('pvContactAddr') && (document.getElementById('pvContactAddr').textContent = getVal('contactAddress', defaults.contactAddress));

    setText('pvQlHome', getVal('qlHomeLabel', defaults.qlHomeLabel)); setHref('pvQlHome', getVal('qlHomeHref', defaults.qlHomeHref));
    setText('pvQlFeatures', getVal('qlFeaturesLabel', defaults.qlFeaturesLabel)); setHref('pvQlFeatures', getVal('qlFeaturesHref', defaults.qlFeaturesHref));
    setText('pvQlPricing', getVal('qlPricingLabel', defaults.qlPricingLabel)); setHref('pvQlPricing', getVal('qlPricingHref', defaults.qlPricingHref));
    setText('pvQlContact', getVal('qlContactLabel', defaults.qlContactLabel)); setHref('pvQlContact', getVal('qlContactHref', defaults.qlContactHref));
    setText('pvQlGallery', getVal('qlGalleryLabel', defaults.qlGalleryLabel)); setHref('pvQlGallery', getVal('qlGalleryHref', defaults.qlGalleryHref));

    setHref('pvFb', getVal('socialFacebook', defaults.socialFacebook));
    setHref('pvIg', getVal('socialInstagram', defaults.socialInstagram));
    setHref('pvTw', getVal('socialTwitter', defaults.socialTwitter));
    setHref('pvLn', getVal('socialLinkedin', defaults.socialLinkedin));
    setHref('pvYt', getVal('socialYouTube', defaults.socialYouTube));

    setHref('pvMap', getVal('mapUrl', defaults.mapUrl));
    setText('pvBottom', getVal('bottomText', defaults.bottomText));

    // Map/Qr section title and button text
    setText('pvQrTitle', getVal('qrSectionTitle', defaults.qrSectionTitle));
    setText('pvMapText', getVal('mapButtonText', defaults.mapButtonText));

    const pvQr = document.getElementById('pvQrImg');
    const pvQrPlaceholder = document.getElementById('pvQrPlaceholder');
    const showQr = (function () { const el = document.getElementById('qrShow'); return el ? !!el.checked : true; })();
    if (pvQr) {
        if (footerQrDataUrl && showQr) {
            pvQr.src = footerQrDataUrl;
            pvQr.style.display = 'block';
            pvQr.style.position = 'relative';
            pvQr.style.zIndex = '1';
            if (pvQrPlaceholder) {
                pvQrPlaceholder.style.display = 'none';
            }
        } else {
            pvQr.src = '';
            pvQr.style.display = 'none';
            if (pvQrPlaceholder) {
                pvQrPlaceholder.style.display = 'block';
                pvQrPlaceholder.style.position = 'absolute';
            }
        }
    }
}

// ensure both header and footer load on page ready
window.addEventListener('load', () => {
    try { loadHeaderSettings(); } catch (e) { }
    try { loadFooterSettings(); } catch (e) { }
});


// 4. Plots Tab Logic
function renderPlotsGrid() {
    const grid = document.getElementById('plotsGrid');
    grid.innerHTML = '';

    if (plotData.length === 0) {
        grid.innerHTML = '<p style="color: #6b7280; grid-column: 1 / -1; text-align: center;">কোনো প্লট পাওয়া যায়নি।</p>';
        return;
    }

    plotData.forEach(plot => {
        const card = document.createElement('div');
        card.className = `plot-card ${plot.status}`;
        card.innerHTML = `
                    <div class="plot-header">
                        <div>
                            <div class="plot-title">প্লট #${plot.id}</div>
                            <div class="plot-block">ব্লক: ${plot.block}</div>
                        </div>
                        ${getStatusBadge(plot.status)}
                    </div>
                    <div class="plot-size">সাইজ: ${plot.size}</div>
                    <div class="plot-price">${formatFullCurrency(plot.price)}</div>
                    <div class="plot-actions">
                        ${plot.status === 'available' ?
                `<button class="btn btn-reserve" onclick="showModal('প্লট সংরক্ষিত করুন', 'আপনি কি নিশ্চিত যে আপনি প্লট ${plot.id} সংরক্ষিত করতে চান?', [{text: 'বাতিল', action: closeModal}, {text: 'সংরক্ষণ', action: () => setPlotStatus('${plot.id}', 'reserved')}])">সংরক্ষণ</button>
                             <button class="btn btn-primary" onclick="showModal('প্লট বিক্রি করুন', 'প্লট ${plot.id} বিক্রির জন্য একটি নতুন বুকিং তৈরি করুন।', [{text: 'বন্ধ', action: closeModal}])">বিক্রি</button>`
                : plot.status === 'reserved' ?
                    `<button class="btn btn-primary" onclick="showModal('বুকিং দেখুন', 'প্লট ${plot.id} সংরক্ষিত রয়েছে। বিস্তারিত দেখতে বুকিং ট্যাবে যান।', [{text: 'বন্ধ', action: closeModal}])">বুকিং দেখুন</button>
                             <button class="action-btn delete" style="flex: unset;" onclick="showModal('সংরক্ষণ বাতিল', 'আপনি কি প্লট ${plot.id} এর সংরক্ষণ বাতিল করতে চান?', [{text: 'না', action: closeModal}, {text: 'হ্যাঁ, বাতিল করুন', action: () => setPlotStatus('${plot.id}', 'available'), isDanger: true}])">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                             </button>`
                    :
                    `<button class="btn btn-success" onclick="showModal('বিক্রিত প্লট', 'প্লট ${plot.id} বিক্রি হয়ে গেছে। বুকিং বিস্তারিত দেখতে বুকিং ট্যাবে যান।', [{text: 'বন্ধ', action: closeModal}])">বিস্তারিত</button>`
            }
                    </div>
                `;
        grid.appendChild(card);
    });
}

function addNewPlot() {
    showModal('নতুন প্লট যোগ করুন', 'একটি নতুন প্লট যোগ করার ফর্ম এখানে থাকবে।', [{ text: 'বাতিল', action: closeModal }, { text: 'যোগ করুন', action: () => alertUser('যোগ সফল', 'নতুন প্লট যুক্ত করার প্রক্রিয়া শুরু হয়েছে।') }]);
}

function setPlotStatus(id, newStatus) {
    closeModal();
    const plot = plotData.find(p => p.id === id);
    if (plot) {
        plot.status = newStatus;
        renderPlotsGrid();
        renderOverview();
        alertUser('অবস্থা আপডেট', `প্লট ${id} এর অবস্থা ${getStatusText(newStatus)} এ আপডেট করা হয়েছে।`);
    }
}


// 5. Utility and Initial Load
function updateCurrentDate() {
    const dateOptions = { year: 'numeric', month: 'long', day: 'numeric' };
    const today = new Date().toLocaleDateString('bn-BD', dateOptions);
    document.getElementById('currentDate').textContent = today;
}

function logout() {
    // In a real application, this would clear session/token and redirect to login
    alertUser('লগআউট', 'আপনি সফলভাবে লগআউট করেছেন।', [{ text: 'ঠিক আছে', action: closeModal }]);
}

// Custom Modal Implementation (replacing alert/confirm)
const modal = document.getElementById('customModal');
const modalTitle = document.getElementById('modalTitle');
const modalMessage = document.getElementById('modalMessage');
const modalButtons = document.getElementById('modalButtons');

/**
 * Shows the custom modal
 * @param {string} title
 * @param {string} message
 * @param {Array<{text: string, action: function, isDanger: boolean}>} buttons
 */
function showModal(title, message, buttons = []) {
    modalTitle.textContent = title;
    modalMessage.innerHTML = message;
    modalButtons.innerHTML = '';

    buttons.forEach(btn => {
        const buttonElement = document.createElement('button');
        buttonElement.textContent = btn.text;
        // Base button style matching logout modal
        buttonElement.style.padding = '10px 16px';
        buttonElement.style.border = 'none';
        buttonElement.style.borderRadius = '8px';
        buttonElement.style.fontWeight = '600';
        buttonElement.style.cursor = 'pointer';
        buttonElement.style.transition = 'all 0.2s';

        // Style variants: cancel / danger / primary
        const isCancel = (btn.text === 'না' || btn.text === 'বাতিল' || btn.text === 'বন্ধ');
        if (btn.isDanger) {
            buttonElement.style.background = '#ef4444';
            buttonElement.style.color = '#ffffff';
        } else if (isCancel) {
            buttonElement.style.background = '#e5e7eb';
            buttonElement.style.color = '#111827';
        } else {
            // Primary / success
            buttonElement.style.background = '#0a4d2e';
            buttonElement.style.color = '#ffffff';
        }

        // Hover effects
        buttonElement.onmouseover = () => {
            if (btn.isDanger) {
                buttonElement.style.background = '#dc2626';
            } else if (isCancel) {
                buttonElement.style.background = '#d1d5db';
            } else {
                buttonElement.style.background = '#0d6639';
            }
        };
        buttonElement.onmouseout = () => {
            if (btn.isDanger) {
                buttonElement.style.background = '#ef4444';
            } else if (isCancel) {
                buttonElement.style.background = '#e5e7eb';
            } else {
                buttonElement.style.background = '#0a4d2e';
            }
        };

        buttonElement.onclick = () => {
            if (btn.action) btn.action();
            // Do not close automatically if action is delete/save, let the action handle it (like deleteBooking does)
            if (btn.text === 'বন্ধ' || btn.text === 'বাতিল' || btn.text === 'ঠিক আছে' || btn.text === 'না') {
                closeModal();
            }
        };
        modalButtons.appendChild(buttonElement);
    });

    // Show as centered flex, matching overlay style
    modal.style.display = 'flex';
}

function closeModal() {
    modal.style.display = 'none';
}

function alertUser(title, message) {
    showModal(title, message, [{ text: 'ঠিক আছে', action: closeModal }]);
}

// Global helper: perform logout redirect
window.logoutNow = function () {
    try {
        window.location = '/logout';
    } catch (e) {
        window.location.href = '/logout';
    }
};


// Profile Logo utilities (Dashboard + Avatar)
const PROFILE_LOGO_KEY = 'dashboardProfileLogo';
const PROFILE_LOGO_DEFAULT = '/images/Joljochna.png';

function getProfileLogo() {
    try { return localStorage.getItem(PROFILE_LOGO_KEY) || PROFILE_LOGO_DEFAULT; } catch (e) { return PROFILE_LOGO_DEFAULT; }
}

function setProfileLogo(src) {
    try { localStorage.setItem(PROFILE_LOGO_KEY, src); } catch (e) { }
    applyProfileLogo();
}

function applyProfileLogo() {
    var src = getProfileLogo();
    // Update sidebar (dashboard) logo
    var sLogo = document.getElementById('adminSidebarLogo');
    var sTitle = document.getElementById('adminSidebarTitle');
    if (sLogo) {
        sLogo.src = src;
        sLogo.style.display = 'block';
    }
    if (sTitle) { sTitle.style.display = 'none'; }
    // Update header user avatar image (if present)
    var avatarImg = (function () {
        var btn = document.getElementById('userMenuBtn');
        return btn ? btn.querySelector('img') : null;
    })();
    if (avatarImg) avatarImg.src = src;
}

// Initial setup on window load
window.onload = function () {
    updateCurrentDate();

    // Restore saved tab and section, or default to overview
    try {
        const savedTab = localStorage.getItem('adminActiveTab');
        const savedSection = localStorage.getItem('adminActiveSection');

        if (savedTab && savedSection) {
            // Open the submenu if needed
            if (savedTab === 'home') {
                const homeSubmenu = document.getElementById('homeSubmenu');
                if (homeSubmenu) homeSubmenu.classList.add('open');
            } else if (savedTab === 'about') {
                const aboutSubmenu = document.getElementById('aboutSubmenu');
                if (aboutSubmenu) aboutSubmenu.classList.add('open');
            } else if (savedTab === 'projects') {
                const projectsSubmenu = document.getElementById('projectsSubmenu');
                if (projectsSubmenu) projectsSubmenu.classList.add('open');
            }
            // Navigate to saved tab and section without animation
            navigateTo(savedTab, savedSection, true);
        } else if (savedTab) {
            // Just show the saved tab
            showTab(savedTab);
        } else {
            // Default to overview tab
            showTab('overview');
        }
    } catch (e) {
        // Fallback to overview if localStorage fails
        showTab('overview');
    }

    // Populate header settings form if present
    loadHeaderSettings();

    // Apply profile logo to sidebar and avatar at startup
    applyProfileLogo();

    // Helper to choose and set profile (dashboard) logo from avatar dropdown
    window.openProfileLogoEditor = function () {
        try {
            // Close dropdown if open
            var dd = document.getElementById('userDropdown');
            var btn = document.getElementById('userMenuBtn');
            if (dd) dd.classList.remove('open');
            if (btn) btn.setAttribute('aria-expanded', 'false');

            // Create a transient file input to pick an image
            var input = document.createElement('input');
            input.type = 'file';
            input.accept = 'image/*';
            input.style.display = 'none';
            document.body.appendChild(input);
            input.addEventListener('change', function (e) {
                var file = e.target.files && e.target.files[0];
                if (!file) { document.body.removeChild(input); return; }
                var reader = new FileReader();
                reader.onload = function () {
                    // Compress to fit in localStorage (limit ~5MB); resize to max 256x256
                    var img = new Image();
                    img.onload = function () {
                        try {
                            var maxSide = 256;
                            var w = img.width, h = img.height;
                            if (w > h && w > maxSide) { h = Math.round(h * (maxSide / w)); w = maxSide; }
                            else if (h > w && h > maxSide) { w = Math.round(w * (maxSide / h)); h = maxSide; }
                            else if (w > maxSide) { h = Math.round(h * (maxSide / w)); w = maxSide; }
                            var canvas = document.createElement('canvas');
                            canvas.width = w; canvas.height = h;
                            var ctx = canvas.getContext('2d');
                            ctx.drawImage(img, 0, 0, w, h);
                            var dataUrl = canvas.toDataURL('image/png', 0.9);
                            setProfileLogo(dataUrl);
                            alertUser('সফল', 'ড্যাশবোর্ড লোগো আপডেট হয়েছে।');
                        } catch (err) {
                            alertUser('ত্রুটি', 'লোগো সংরক্ষণ করা যায়নি। অনুগ্রহ করে ছোট একটি ছবি ব্যবহার করুন।');
                        } finally {
                            document.body.removeChild(input);
                        }
                    };
                    img.onerror = function () {
                        document.body.removeChild(input);
                        alertUser('ত্রুটি', 'ছবি লোড করা যায়নি। অন্য একটি ছবি চেষ্টা করুন।');
                    };
                    img.src = reader.result;
                };
                reader.readAsDataURL(file);
            }, { once: true });
            input.click();
        } catch (e) { }
    };

    // User menu dropdown toggle
    (function () {
        var btn = document.getElementById('userMenuBtn');
        var dd = document.getElementById('userDropdown');
        if (!btn || !dd) return;
        function closeMenu() {
            dd.classList.remove('open');
            btn.setAttribute('aria-expanded', 'false');
        }
        btn.addEventListener('click', function (e) {
            e.stopPropagation();
            var open = dd.classList.toggle('open');
            btn.setAttribute('aria-expanded', open ? 'true' : 'false');
        });
        document.addEventListener('click', function (e) {
            if (!dd.classList.contains('open')) return;
            if (!dd.contains(e.target) && e.target !== btn) closeMenu();
        });
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') closeMenu();
        });
    })();

    // Keyboard accessibility for sidebar items with submenus
    document.querySelectorAll('.nav-item[role="button"]').forEach(item => {
        item.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                const tab = item.getAttribute('data-tab');
                if (tab === 'home') toggleHomeMenu();
                if (tab === 'about') toggleAboutMenu();
                if (tab === 'projects') toggleProjectsMenu();
            } else if (e.key === 'Escape') {
                const controls = item.getAttribute('aria-controls');
                const submenu = controls && document.getElementById(controls);
                if (submenu && submenu.classList.contains('open')) {
                    submenu.classList.remove('open');
                    item.setAttribute('aria-expanded', 'false');
                }
            }
        });
    });

    // Restore active submenu on page load
    (function restoreActiveSubmenu() {
        try {
            const activeTab = localStorage.getItem('adminActiveTab');
            const activeSection = localStorage.getItem('adminActiveSection');

            if (activeTab && activeSection) {
                // Wait for DOM to be ready
                setTimeout(() => {
                    updateActiveSubmenu(activeTab, activeSection);
                }, 100);
            }
        } catch (e) {
            console.error('Error restoring active submenu:', e);
        }
    })();

    // Mobile Menu Functionality
    (function () {
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileOverlay = document.getElementById('mobileOverlay');
        const sidebar = document.getElementById('sidebar');

        if (mobileMenuBtn && mobileOverlay && sidebar) {
            // Toggle mobile menu
            mobileMenuBtn.addEventListener('click', function () {
                sidebar.classList.toggle('open');
                mobileOverlay.classList.toggle('active');
                mobileMenuBtn.classList.toggle('active');
            });

            // Close menu when clicking overlay
            mobileOverlay.addEventListener('click', function () {
                sidebar.classList.remove('open');
                mobileOverlay.classList.remove('active');
                mobileMenuBtn.classList.remove('active');
            });

            // Close menu when clicking any nav item
            const navItems = document.querySelectorAll('.nav-item, .nav-subitem');
            navItems.forEach(item => {
                item.addEventListener('click', function () {
                    sidebar.classList.remove('open');
                    mobileOverlay.classList.remove('active');
                    mobileMenuBtn.classList.remove('active');
                });
            });

            // Close on ESC key
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape' && sidebar.classList.contains('open')) {
                    sidebar.classList.remove('open');
                    mobileOverlay.classList.remove('active');
                    mobileMenuBtn.classList.remove('active');
                }
            });
        }
    })();
};