/**
 * Translation Manager for Joljochna Website
 * Handles loading and applying translations
 */

class Translator {
    constructor() {
        this.currentLang = localStorage.getItem('siteLanguage') || 'bn';
        this.translations = {};
        this.init();
    }

    async init() {
        await this.loadTranslations(this.currentLang);
        this.applyTranslations();
        this.setupLanguageChangeListener();
    }

    async loadTranslations(lang) {
        try {
            const response = await fetch(`/translations/${lang}.json`);
            if (!response.ok) throw new Error(`Failed to load ${lang} translations`);
            this.translations = await response.json();
            this.currentLang = lang;
            console.log(`Loaded ${lang} translations:`, this.translations);
            return this.translations;
        } catch (error) {
            console.error('Error loading translations:', error);
            // Fallback to Bangla if English fails
            if (lang !== 'bn') {
                return this.loadTranslations('bn');
            }
            return {};
        }
    }

    translate(key) {
        const keys = key.split('.');
        let value = this.translations;

        for (const k of keys) {
            if (value && typeof value === 'object' && k in value) {
                value = value[k];
            } else {
                console.warn(`Translation key not found: ${key}`);
                return key;
            }
        }

        return value;
    }

    applyTranslations() {
        // Apply to all elements with data-translate attribute
        const elements = document.querySelectorAll('[data-translate]');
        elements.forEach(el => {
            const key = el.getAttribute('data-translate');
            const translatedText = this.translate(key);

            // Check if element has data-translate-attr for attribute translation
            const attr = el.getAttribute('data-translate-attr');
            if (attr) {
                el.setAttribute(attr, translatedText);
            } else {
                el.textContent = translatedText;
            }
        });

        // Apply to navigation
        this.updateNavigation();

        // Apply to common page sections
        this.updatePageContent();

        // Dispatch event for custom handlers
        window.dispatchEvent(new CustomEvent('translationsLoaded', {
            detail: { lang: this.currentLang, translations: this.translations }
        }));
    }

    updatePageContent() {
        // Hero section
        const heroMap = {
            'heroTitle': 'hero.title',
            'heroSubtitle': 'hero.subtitle',
            'heroDesc': 'hero.description',
            'heroBtnPrimary': 'hero.primaryButton',
            'heroBtnSecondary': 'hero.secondaryButton'
        };

        Object.entries(heroMap).forEach(([id, key]) => {
            const el = document.getElementById(id);
            if (el) {
                el.textContent = this.translate(key);
            }
        });

        // Features section
        this.updateFeaturesSection();

        // Pricing section
        this.updatePricingSection();

        // Testimonials section
        const testimonialsMap = {
            'testimonialsTitle': 'testimonials.title',
            'testimonialsSubtitle': 'testimonials.subtitle'
        };

        Object.entries(testimonialsMap).forEach(([id, key]) => {
            const el = document.getElementById(id);
            if (el) {
                el.textContent = this.translate(key);
            }
        });

        // Other Projects section
        const otherProjectsMap = {
            'otherProjectsTitle': 'otherProjects.title',
            'otherProjectsSubtitle': 'otherProjects.subtitle'
        };

        Object.entries(otherProjectsMap).forEach(([id, key]) => {
            const el = document.getElementById(id);
            if (el) {
                el.textContent = this.translate(key);
            }
        });

        // Social Media section
        const socialMediaTitle = document.getElementById('socialMediaTitle');
        if (socialMediaTitle) {
            socialMediaTitle.textContent = this.translate('socialMedia.title');
        }

        // Roadmap/Plot Selection section
        this.updateRoadmapSection();

        // Contact section
        const contactMap = {
            'contactTitle': 'contact.title',
            'contactSubtitle': 'contact.subtitle',
            'contactFormTitle': 'contact.formTitle',
            'contactPhoneLabel': 'contact.phone',
            'contactEmailLabel': 'contact.email',
            'contactWebLabel': 'contact.website',
            'contactAddressLabel': 'contact.address',
            'contactSubmitBtn': 'contact.submitButton'
        };

        Object.entries(contactMap).forEach(([id, key]) => {
            const el = document.getElementById(id);
            if (el) {
                el.textContent = this.translate(key);
            }
        });

        // Update button text if exists
        const submitBtn = document.querySelector('#contactSubmitBtn, #dynamicContactForm button[type="submit"]');
        if (submitBtn) {
            submitBtn.textContent = this.translate('contact.submitButton');
        }

        // Footer section
        this.updateFooterSection();
    }

    updateFeaturesSection() {
        // Features section title and subtitle
        const featuresTitle = document.getElementById('featuresTitle');
        const featuresSubtitle = document.getElementById('featuresSubtitle');

        if (featuresTitle) {
            featuresTitle.textContent = this.translate('features.title');
        }
        if (featuresSubtitle) {
            featuresSubtitle.textContent = this.translate('features.subtitle');
        }

        // Individual features (8 features)
        for (let i = 1; i <= 8; i++) {
            const titleEl = document.getElementById(`featTitle${i}`);
            const descEl = document.getElementById(`featDesc${i}`);

            if (titleEl) {
                const savedTitle = this.getFeatureFromLocalStorage(i, 'title');
                if (!savedTitle) {
                    titleEl.textContent = this.translate(`features.feature${i}Title`);
                }
            }
            if (descEl) {
                const savedDesc = this.getFeatureFromLocalStorage(i, 'desc');
                if (!savedDesc) {
                    descEl.textContent = this.translate(`features.feature${i}Desc`);
                }
            }
        }
    }

    getFeatureFromLocalStorage(index, field) {
        try {
            const settings = JSON.parse(localStorage.getItem('featuresSettings') || '{}');
            if (settings.items && settings.items[index - 1]) {
                return settings.items[index - 1][field];
            }
        } catch (e) {
            return null;
        }
        return null;
    }

    updatePricingSection() {
        const pricingTitle = document.getElementById('pricingTitle');
        const pricingSubtitle = document.getElementById('pricingSubtitle');

        if (pricingTitle) {
            pricingTitle.textContent = this.translate('pricing.title');
        }
        if (pricingSubtitle) {
            pricingSubtitle.textContent = this.translate('pricing.subtitle');
        }

        // Update all "বুক করুন" buttons in pricing cards
        const bookButtons = document.querySelectorAll('.pricing-card .btn-primary, .price-card .btn-primary');
        bookButtons.forEach(btn => {
            if (btn.textContent.includes('বুক') || btn.textContent.includes('Book')) {
                btn.textContent = this.translate('pricing.bookButton');
            }
        });

        // Update "প্রতি কাঠা" or "Per Katha" text
        const perKathaElements = document.querySelectorAll('.pricing-card p, .price-card p');
        perKathaElements.forEach(el => {
            if (el.textContent.includes('প্রতি কাঠা') || el.textContent.includes('Per Katha')) {
                el.textContent = el.textContent
                    .replace('প্রতি কাঠা', this.translate('pricing.perKatha'))
                    .replace('Per Katha', this.translate('pricing.perKatha'));
            }
        });
    }

    updateFooterSection() {
        // Footer title and description
        const ftTitle = document.getElementById('ftTitle');
        const ftDesc = document.getElementById('ftDesc');

        if (ftTitle && !this.getFooterSettingFromStorage('title')) {
            ftTitle.textContent = this.translate('footer.title');
        }
        if (ftDesc && !this.getFooterSettingFromStorage('description')) {
            ftDesc.textContent = this.translate('footer.description');
        }

        // Contact labels
        const contactLabelMap = {
            'ftPhoneLabel': 'footer.phoneNumber',
            'ftEmailLabel': 'footer.email'
        };

        Object.entries(contactLabelMap).forEach(([id, key]) => {
            const el = document.getElementById(id);
            if (el) {
                el.textContent = this.translate(key);
            }
        });

        // Section headings
        const sectionMap = {
            'ftProjectAddressLabel': 'footer.projectAddress',
            'ftContactAddressLabel': 'footer.contactAddress',
            'ftPaymentMethodsLabel': 'footer.paymentMethods',
            'ftQuickLinksLabel': 'footer.quickLinks',
            'ftLegalInfoLabel': 'footer.legalInfo',
            'ftQrTitle': 'footer.viewLocation'
        };

        Object.entries(sectionMap).forEach(([id, key]) => {
            const el = document.getElementById(id);
            if (el && !this.getFooterSettingFromStorage(id.replace('ft', '').replace('Label', ''))) {
                el.textContent = this.translate(key);
            }
        });

        // Address content (actual addresses)
        const addressMap = {
            'ftProjectAddress': 'footer.projectAddressText',
            'ftContactAddress': 'footer.contactAddressText'
        };

        Object.entries(addressMap).forEach(([id, key]) => {
            const el = document.getElementById(id);
            if (el && !this.getFooterSettingFromStorage(id.replace('ft', '').toLowerCase())) {
                el.textContent = this.translate(key);
            }
        });

        // Payment methods
        const paymentMap = {
            'ftBkash': 'footer.bkash',
            'ftNagad': 'footer.nagad',
            'ftBankTransfer': 'footer.bankTransfer',
            'ftCard': 'footer.card'
        };

        Object.entries(paymentMap).forEach(([id, key]) => {
            const el = document.getElementById(id);
            if (el) {
                el.textContent = this.translate(key);
            }
        });

        // Footer quick links
        const footerLinkMap = {
            'ftQlHomeText': 'nav.home',
            'ftQlFeaturesText': 'nav.features',
            'ftQlPricingText': 'nav.pricing',
            'ftQlContactText': 'nav.contact',
            'ftQlGalleryText': 'footer.gallery'
        };

        Object.entries(footerLinkMap).forEach(([id, key]) => {
            const el = document.getElementById(id);
            if (el && !this.getFooterSettingFromStorage('quick_links')) {
                el.textContent = this.translate(key);
            }
        });

        // Legal links
        const legalMap = {
            'ftPrivacyText': 'footer.privacyPolicy',
            'ftTermsText': 'footer.termsConditions'
        };

        Object.entries(legalMap).forEach(([id, key]) => {
            const el = document.getElementById(id);
            if (el && !this.getFooterSettingFromStorage('legal_links')) {
                el.textContent = this.translate(key);
            }
        });

        // Map button text
        const ftMapText = document.getElementById('ftMapText');
        if (ftMapText && !this.getFooterSettingFromStorage('map_button_text')) {
            ftMapText.textContent = this.translate('footer.viewOnGoogleMaps');
        }

        // Update copyright text based on language
        const ftBottom = document.getElementById('ftBottom');
        if (ftBottom && !this.getFooterSettingFromStorage('bottom_text')) {
            const year = new Date().getFullYear();
            if (this.currentLang === 'en') {
                ftBottom.textContent = `${year} Joljochna. All Rights Reserved. | A project by NEX Real Estate`;
            } else {
                ftBottom.textContent = `${year} জলজোছনা। সর্বস্বত্ব সংরক্ষিত। | NEX Real Estate এর একটি প্রকল্প`;
            }
        }
    }

    updateRoadmapSection() {
        // Main section title (প্রজেক্ট রোডম্যাপ)
        const roadmapSectionTitle = document.getElementById('roadmapSectionTitle');
        if (roadmapSectionTitle) {
            roadmapSectionTitle.textContent = this.translate('roadmap.mapTitle');
        }

        // Section title (বেছে নিন আপনার পছন্দের প্লট)
        const prokolpoTitle = document.getElementById('prokolpoTitle');
        if (prokolpoTitle && !this.getRoadmapSettingFromStorage('offerTitle')) {
            prokolpoTitle.textContent = this.translate('roadmap.title');
        }

        // Map title inside card
        const mapTitle = document.getElementById('prokolpoMapTitle');
        if (mapTitle) {
            mapTitle.textContent = this.translate('roadmap.mapTitle');
        }

        // CTA bar
        const ctaBar = document.getElementById('prokolpoCtaBar');
        if (ctaBar && !this.getRoadmapSettingFromStorage('ctaBar')) {
            ctaBar.textContent = this.translate('roadmap.ctaBar');
        }

        // Footer note (if not customized)
        const footerNote = document.getElementById('prokolpoFooterNote');
        if (footerNote && !this.getRoadmapSettingFromStorage('footerNote')) {
            footerNote.innerHTML = `<p>${this.translate('roadmap.description')}</p><p>${this.translate('roadmap.bookingCall')}</p>`;
        }

        // Update plot labels if not customized from dashboard
        if (!this.getRoadmapSettingFromStorage('plots')) {
            const plotBoxes = document.querySelectorAll('#prokolpoPlots .plot-box');
            const plotCategories = ['premiumPlot', 'deluxePlot', 'executivePlot', 'corporatePlot'];

            plotBoxes.forEach((box, index) => {
                const categoryLabel = box.querySelector('.category-label');
                if (categoryLabel && plotCategories[index]) {
                    categoryLabel.textContent = this.translate(`roadmap.${plotCategories[index]}`);
                }
            });
        }

        // Update amenities if not customized
        if (!this.getRoadmapSettingFromStorage('amenities')) {
            const amenityElements = document.querySelectorAll('#prokolpoAmenities .category-label');
            const amenities = ['clubHouse', 'gym', 'mosque', 'shoppingArea'];

            amenityElements.forEach((el, index) => {
                if (amenities[index]) {
                    el.textContent = this.translate(`roadmap.${amenities[index]}`);
                }
            });
        }
    }

    getRoadmapSettingFromStorage(field) {
        try {
            const settings = JSON.parse(localStorage.getItem('roadmapSettings') || '{}');
            return settings[field];
        } catch (e) {
            return null;
        }
    }

    getFooterSettingFromStorage(field) {
        try {
            const settings = JSON.parse(localStorage.getItem('footerSettings') || '{}');
            return settings[field];
        } catch (e) {
            return null;
        }
    }

    updateNavigation() {
        // Update navigation items
        let headerSettings = {};
        try {
            headerSettings = JSON.parse(localStorage.getItem('headerSettings') || '{}');
        } catch (e) {
            headerSettings = {};
        }

        const navMap = {
            navHome: { tKey: 'nav.home', sKey: 'homeLabel' },
            navAbout: { tKey: 'nav.about', sKey: 'aboutLabel' },
            navFeatures: { tKey: 'nav.features', sKey: 'featuresLabel' },
            navPricing: { tKey: 'nav.pricing', sKey: 'pricingLabel' },
            navTestimonials: { tKey: 'nav.testimonials', sKey: 'testimonialsLabel' },
            navOtherProjects: { tKey: 'nav.otherProjects', sKey: 'otherProjectsLabel' },
            navContact: { tKey: 'nav.contact', sKey: 'contactLabel' },
            navCtaText: { tKey: 'nav.bookNow', sKey: 'ctaText' }
        };

        Object.entries(navMap).forEach(([id, cfg]) => {
            const el = document.getElementById(id);
            if (!el) return;
            const custom = headerSettings && headerSettings[cfg.sKey];
            if (custom && String(custom).trim() !== '') {
                el.textContent = custom;
            } else {
                el.textContent = this.translate(cfg.tKey);
            }
        });

        const cta = document.getElementById('navCta');
        if (cta && headerSettings && headerSettings.ctaHref) {
            cta.setAttribute('href', headerSettings.ctaHref);
        }
    }

    setupLanguageChangeListener() {
        window.addEventListener('languageChanged', async (e) => {
            const newLang = e.detail.language;
            console.log('Language changed event received:', newLang);

            if (newLang !== this.currentLang) {
                await this.loadTranslations(newLang);
                this.applyTranslations();
            }
        });
    }

    // Helper method to get translation
    t(key) {
        return this.translate(key);
    }
}

// Initialize translator when DOM is ready
let translator;

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
        translator = new Translator();
        window.translator = translator; // Make it globally accessible
    });
} else {
    translator = new Translator();
    window.translator = translator;
}

// Export for use in other scripts
window.Translator = Translator;
