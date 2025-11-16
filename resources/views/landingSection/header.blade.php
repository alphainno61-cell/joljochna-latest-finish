    <nav class="navbar navbar-expand-lg navbar-dark fixed-top custom-navbar">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center" href="#home" id="navBrand">
                <img id="brandLogo" alt="Logo" style="display:none; height:70px; width:auto; margin-right:12px;" />
                <i class="fas fa-home me-2 text-warning" id="brandIcon" style="font-size: 2.5rem;"></i>
            </a>

            <!-- Mobile Toggle Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navigation Items -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" id="navHome" href="/">হোম</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="navAbout" href="/about">আমাদের সম্পর্কে</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="navFeatures" href="/#features">সুবিধা</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="navPricing" href="/#pricing">মূল্য তালিকা</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="navTestimonials" href="/#testimonials">মন্তব্য</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="navOtherProjects" href="/#other-projects">অন্যান্য প্রকল্প</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="navContact" href="/#contact">যোগাযোগ</a>
                    </li>
                </ul>

                <!-- Language Switcher & CTA Button -->
                <div class="nav-actions" style="display: flex; align-items: center; gap: 12px;">
                    <!-- Language Switcher -->
                    <div class="language-switcher" style="position: relative;">
                        <button id="langSwitcher" class="lang-btn" style="background: transparent; border: 1.5px solid rgba(255,255,255,0.3); color: #fff; padding: 6px 10px; border-radius: 6px; cursor: pointer; display: flex; align-items: center; gap: 4px; font-weight: 600; transition: all 0.3s; font-size: 14px;">
                            <span id="currentLangFlag" style="font-size: 16px;">🇧🇩</span>
                            <span id="currentLangText" style="font-size: 13px;">বাং</span>
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" style="margin-left: 2px;">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </button>
                        <div id="langDropdown" class="lang-dropdown" style="display: none; position: absolute; top: calc(100% + 6px); right: 0; background: #fff; border-radius: 8px; box-shadow: 0 6px 20px rgba(0,0,0,0.15); min-width: 130px; overflow: hidden; z-index: 1000;">
                            <button class="lang-option" data-lang="bn" style="width: 100%; padding: 10px 14px; border: none; background: transparent; text-align: left; cursor: pointer; display: flex; align-items: center; gap: 8px; color: #1f2937; font-weight: 500; transition: background 0.2s; font-size: 14px;">
                                <span style="font-size: 18px;">🇧🇩</span>
                                <span>বাংলা</span>
                            </button>
                            <button class="lang-option" data-lang="en" style="width: 100%; padding: 10px 14px; border: none; background: transparent; text-align: left; cursor: pointer; display: flex; align-items: center; gap: 8px; color: #1f2937; font-weight: 500; transition: background 0.2s; font-size: 14px;">
                                <span style="font-size: 18px;">🇬🇧</span>
                                <span>English</span>
                            </button>
                        </div>
                    </div>

                    <!-- CTA Button -->
                    <a href="#contact" class="btn btn-warning btn-cta" id="navCta">
                        <i class="fas fa-calendar-check me-2"></i>
                        <span id="navCtaText">এখনই বুক করুন</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <script>
        (function() {
            // Default values
            const defaults = {
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

            function applyHeader(saved){
                // Merge with defaults
                const data = { ...defaults, ...saved };
                console.log('Applying header settings:', data);
                
                const logoSrc = data.logoDataUrl || data.logoUrl || '';
                const brandLogo = document.getElementById('brandLogo');
                const brandIcon = document.getElementById('brandIcon');
                if (brandLogo && brandIcon) {
                    if (logoSrc) { brandLogo.src = logoSrc; brandLogo.style.display = 'inline-block'; brandIcon.style.display = 'none'; }
                    else { brandLogo.src = ''; brandLogo.style.display = 'none'; brandIcon.style.display = 'inline-block'; }
                }
                const map = [
                    ['navHome','homeLabel'],
                    ['navAbout','aboutLabel'],
                    ['navFeatures','featuresLabel'],
                    ['navPricing','pricingLabel'],
                    ['navTestimonials','testimonialsLabel'],
                    ['navOtherProjects','otherProjectsLabel'],
                    ['navContact','contactLabel']
                ];
                map.forEach(([id, key]) => { const el = document.getElementById(id); if (el) el.textContent = data[key]; });
                const cta = document.getElementById('navCta');
                const ctaText = document.getElementById('navCtaText');
                if (cta) cta.setAttribute('href', data.ctaHref);
                if (ctaText) ctaText.textContent = data.ctaText;
            }

            function readSaved(){
                try { return JSON.parse(localStorage.getItem('headerSettings') || '{}'); } catch (_) { return {}; }
            }

            // Initial apply
            applyHeader(readSaved());

            // Live update on storage changes
            window.addEventListener('storage', (e) => {
                if (e.key === 'headerSettings') {
                    console.log('Header storage event detected');
                    applyHeader(readSaved());
                }
            });

            // Fallback polling (1s)
            let last = localStorage.getItem('headerSettings') || '';
            setInterval(() => {
                const cur = localStorage.getItem('headerSettings') || '';
                if (cur !== last) { 
                    console.log('Header changed via polling');
                    last = cur; 
                    applyHeader(readSaved()); 
                }
            }, 1000);
        })();

        // Language Switcher Functionality
        (function() {
            const langSwitcher = document.getElementById('langSwitcher');
            const langDropdown = document.getElementById('langDropdown');
            const currentLangFlag = document.getElementById('currentLangFlag');
            const currentLangText = document.getElementById('currentLangText');
            const langOptions = document.querySelectorAll('.lang-option');

            // Load saved language or default to Bangla
            let currentLang = localStorage.getItem('siteLanguage') || 'bn';

            // Language data
            const languages = {
                bn: { flag: '🇧🇩', name: 'বাং' },
                en: { flag: '🇬🇧', name: 'EN' }
            };

            // Set initial language
            function setLanguage(lang) {
                currentLang = lang;
                currentLangFlag.textContent = languages[lang].flag;
                currentLangText.textContent = languages[lang].name;
                localStorage.setItem('siteLanguage', lang);
                
                // Dispatch event for other components to listen
                window.dispatchEvent(new CustomEvent('languageChanged', { detail: { language: lang } }));
                console.log('Language changed to:', lang);
            }

            // Toggle dropdown
            if (langSwitcher && langDropdown) {
                langSwitcher.addEventListener('click', (e) => {
                    e.stopPropagation();
                    const isVisible = langDropdown.style.display === 'block';
                    langDropdown.style.display = isVisible ? 'none' : 'block';
                });

                // Close dropdown when clicking outside
                document.addEventListener('click', (e) => {
                    if (!langSwitcher.contains(e.target) && !langDropdown.contains(e.target)) {
                        langDropdown.style.display = 'none';
                    }
                });
            }

            // Handle language option clicks
            langOptions.forEach(option => {
                option.addEventListener('click', (e) => {
                    e.stopPropagation();
                    const lang = option.getAttribute('data-lang');
                    setLanguage(lang);
                    langDropdown.style.display = 'none';
                });

                // Hover effect
                option.addEventListener('mouseenter', () => {
                    option.style.background = '#f3f4f6';
                });
                option.addEventListener('mouseleave', () => {
                    option.style.background = 'transparent';
                });
            });

            // Hover effect for switcher button
            if (langSwitcher) {
                langSwitcher.addEventListener('mouseenter', () => {
                    langSwitcher.style.borderColor = 'rgba(255,255,255,0.6)';
                    langSwitcher.style.background = 'rgba(255,255,255,0.1)';
                });
                langSwitcher.addEventListener('mouseleave', () => {
                    langSwitcher.style.borderColor = 'rgba(255,255,255,0.3)';
                    langSwitcher.style.background = 'transparent';
                });
            }

            // Initialize with saved language
            setLanguage(currentLang);
        })();
    </script>

