<style>
    /* Footer Responsive Styles */
    @media (max-width: 1199px) {
        .footer-section[style*="margin-left"] {
            margin-left: 0 !important;
        }
    }
    
    /* Payment Methods Professional Styling */
    .payment-methods-wrapper {
        margin-top: 1rem;
    }
    
    .payment-methods-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 8px;
        max-width: 280px;
    }
    
    .payment-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        background: rgba(255, 215, 0, 0.12);
        padding: 10px 12px;
        border-radius: 8px;
        font-size: 0.8rem;
        font-weight: 600;
        color: rgba(255, 255, 255, 0.95);
        border: 1.5px solid rgba(255, 215, 0, 0.25);
        transition: all 0.3s ease;
        cursor: pointer;
        text-align: center;
    }
    
    .payment-btn:hover {
        background: rgba(255, 215, 0, 0.2);
        border-color: rgba(255, 215, 0, 0.5);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(255, 215, 0, 0.25);
    }
    
    .payment-btn i {
        color: #ffd700;
        font-size: 0.95rem;
    }
    
    @media (max-width: 1199px) {
        .payment-methods-grid {
            max-width: 100%;
        }
    }
    
    @media (max-width: 768px) {
        .payment-methods-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            max-width: 100%;
        }
        
        .payment-btn {
            font-size: 0.75rem;
            padding: 9px 10px;
            gap: 5px;
        }
        
        .payment-btn i {
            font-size: 0.85rem;
        }
    }
    
    @media (max-width: 480px) {
        .payment-methods-grid {
            grid-template-columns: 1fr;
        }
        
        .payment-btn {
            font-size: 0.85rem;
            padding: 12px;
        }
    }
</style>

<footer>
        <div class="footer-container">
            <div class="footer-section footer-col-1">
                <div class="footer-logo">
                    <i class="fas fa-home"></i>
                    <h2 id="footerTitle">জলজোছনা</h2>
                </div>
                <p id="footerDescription">NEX Real Estate এর একটি প্রকল্প। আপনার স্বপ্নের বাড়ি নির্মাণের জন্য প্রিমিয়াম লোকেশনে সবুজ পরিবেশে গড়ে উঠেছে জলজোছনা।</p>

                <div class="contact-info">
                    <div class="contact-item" style="background-color: #ffd700">
                        <i class="fas fa-phone-alt" style="color: #0a4d2e"></i>
                        <div class="phone-no" style="color: #0a4d2e">
                            <strong style="color: #0a4d2e">ফোন নম্বর</strong><br>
                            <span id="footerPhone1">+880 1991 995 995</span><br>
                            <span id="footerPhone2">+880 1991 994 994</span>
                        </div>
                    </div>
                    <div class="contact-item" style="background-color: #ffd700">
                        <i class="fas fa-envelope" style="color: #0a4d2e"></i>
                        <div class="email" style="color: #0a4d2e">
                            <strong style="color: #0a4d2e">ইমেইল</strong><br>
                            <span id="footerEmail">hello.nexup@gmail.com</span>
                        </div>
                    </div>
                </div>

                <div class="social-links" id="footerSocialLinks">
                    <a href="#" id="footerFacebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" id="footerInstagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" id="footerTwitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" id="footerLinkedin"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" id="footerYoutube"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <div class="footer-section footer-col-2" style="margin-left: 110px">
                <h3>প্রকল্পের ঠিকানা</h3>
                <p id="footerProjectAddress">শুভনূর ৩৮৮ বাড়ি সিদ্ধার্থ এস আবাস, খুলনা, বাংলাদেশ</p>

                <h3>যোগাযোগের ঠিকানা</h3>
                <p id="footerContactAddress">NEX Real Estate, Century Trade Center, House-23/C, Road-17, Kamal Ataturk Ave, Banani C/A, Dhaka</p>

                <h3>পেমেন্ট মাধ্যম</h3>
                <div class="payment-methods-wrapper">
                    <div class="payment-methods-grid">
                        <div class="payment-btn">
                            <i class="fas fa-mobile-alt"></i>
                            <span>বিকাশ</span>
                        </div>
                        <div class="payment-btn">
                            <i class="fas fa-money-bill-wave"></i>
                            <span>নগদ</span>
                        </div>
                        <div class="payment-btn">
                            <i class="fas fa-university"></i>
                            <span>ব্যাংক ট্রান্সফার</span>
                        </div>
                        <div class="payment-btn">
                            <i class="fas fa-credit-card"></i>
                            <span>কার্ড</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-section footer-col-3" style="margin-left:110px">
                <h3>দ্রুত লিংক</h3>
                <ul class="footer-links" id="footerQuickLinks">
                    <li><a href="#home"><i class="fas fa-chevron-right"></i> হোম</a></li>
                    <li><a href="#features"><i class="fas fa-chevron-right"></i> সুবিধাসমূহ</a></li>
                    <li><a href="#pricing"><i class="fas fa-chevron-right"></i> মূল্য তালিকা</a></li>
                    <li><a href="#contact"><i class="fas fa-chevron-right"></i> যোগাযোগ</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> গ্যালারি</a></li>
                </ul>

                <h3>আইনি তথ্য</h3>
                <ul class="footer-links" id="footerLegalLinks">
                    <li><a href="#"><i class="fas fa-chevron-right"></i> গোপনীয়তা নীতি</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> সেবার শর্তাবলী</a></li>
                </ul>
            </div>

            <div class="footer-section footer-col-4 qr-section">
                <h3 class="text-center" id="footerQrTitle">অবস্থান দেখুন</h3>
                <div class="qr-container">
                    <img id="ftQrImg" alt="QR Code" style="max-width: 200px; max-height: 200px; width: 100%; height: auto; display: none; background: #fff; padding: 8px; border-radius: 8px; margin: 0 auto 15px; cursor: pointer; transition: all 0.3s ease;" />
                    <a href="https://maps.google.com/?q=শুভনূর+৩৮৮+বাড়ি+সিদ্ধার্থ+এস+আবাস,+খুলনা" target="_blank" class="map-btn" id="footerMapBtn">
                        <i class="fas fa-map-marker-alt"></i> <span id="footerMapBtnText">গুগল ম্যাপে দেখুন</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p id="footerBottomText">© ২০২৫ জলজোছনা। সর্বস্বত্ব সংরক্ষিত। | NEX Real Estate এর একটি প্রকল্প</p>
        </div>
    </footer>

    <script>
        (function(){
            // Default footer values (will be shown until user changes from dashboard)
            const defaultFooterValues = {
                title: 'জলজোছনা',
                description: 'NEX Real Estate এর একটি প্রকল্প। আপনার স্বপ্নের বাড়ি নির্মাণের জন্য প্রিমিয়াম লোকেশনে সবুজ পরিবেশে গড়ে উঠেছে জলজোছনা।',
                phone1: '+880 1991 995 995',
                phone2: '+880 1991 994 994',
                email: 'hello.nexup@gmail.com',
                project_address: 'শুভনূর ৩৮৮ বাড়ি সিদ্ধার্থ এস আবাস, খুলনা, বাংলাদেশ',
                contact_address: 'NEX Real Estate, Century Trade Center, House-23/C, Road-17, Kamal Ataturk Ave, Banani C/A, Dhaka',
                quick_links: [
                    {label: 'হোম', href: '#home'},
                    {label: 'সুবিধাসমূহ', href: '#features'},
                    {label: 'মূল্য তালিকা', href: '#pricing'},
                    {label: 'যোগাযোগ', href: '#contact'},
                    {label: 'গ্যালারি', href: '#'}
                ],
                legal_links: [
                    {label: 'গোপনীয়তা নীতি', href: '#'},
                    {label: 'সেবার শর্তাবলী', href: '#'}
                ],
                social_links: {
                    facebook: '#',
                    instagram: '#',
                    twitter: '#',
                    linkedin: '#',
                    youtube: '#'
                },
                qr_section_title: 'অবস্থান দেখুন',
                map_button_text: 'গুগল ম্যাপে দেখুন',
                map_url: 'https://maps.google.com/?q=শুভনূর+৩৮৮+বাড়ি+সিদ্ধার্থ+এস+আবাস,+খুলনা',
                bottom_text: '© ২০২৫ জলজোছনা। সর্বস্বত্ব সংরক্ষিত। | NEX Real Estate এর একটি প্রকল্প'
            };

            // Apply default values on page load
            function applyDefaults() {
                const def = defaultFooterValues;
                
                // Title and Description
                document.getElementById('footerTitle').textContent = def.title;
                document.getElementById('footerDescription').textContent = def.description;
                
                // Contact Info
                document.getElementById('footerPhone1').textContent = def.phone1;
                document.getElementById('footerPhone2').textContent = def.phone2;
                document.getElementById('footerEmail').textContent = def.email;
                
                // Addresses
                document.getElementById('footerProjectAddress').textContent = def.project_address;
                document.getElementById('footerContactAddress').textContent = def.contact_address;
                
                // Quick Links
                const quickLinksContainer = document.getElementById('footerQuickLinks');
                if (quickLinksContainer) {
                    quickLinksContainer.innerHTML = '';
                    def.quick_links.forEach(link => {
                        const li = document.createElement('li');
                        li.innerHTML = `<a href="${link.href || '#'}"><i class="fas fa-chevron-right"></i> ${link.label}</a>`;
                        quickLinksContainer.appendChild(li);
                    });
                }
                
                // Legal Links
                const legalLinksContainer = document.getElementById('footerLegalLinks');
                if (legalLinksContainer) {
                    legalLinksContainer.innerHTML = '';
                    def.legal_links.forEach(link => {
                        const li = document.createElement('li');
                        li.innerHTML = `<a href="${link.href || '#'}"><i class="fas fa-chevron-right"></i> ${link.label}</a>`;
                        legalLinksContainer.appendChild(li);
                    });
                }
                
                // Social Links
                document.getElementById('footerFacebook').href = def.social_links.facebook;
                document.getElementById('footerInstagram').href = def.social_links.instagram;
                document.getElementById('footerTwitter').href = def.social_links.twitter;
                document.getElementById('footerLinkedin').href = def.social_links.linkedin;
                document.getElementById('footerYoutube').href = def.social_links.youtube;
                
                // Map and QR Section
                document.getElementById('footerQrTitle').textContent = def.qr_section_title;
                document.getElementById('footerMapBtnText').textContent = def.map_button_text;
                document.getElementById('footerMapBtn').href = def.map_url;
                
                // Bottom Text
                document.getElementById('footerBottomText').textContent = def.bottom_text;
            }

            async function loadFooterSettings() {
                try {
                    const response = await fetch('/api/footer-settings');
                    if (response.ok) {
                        const settings = await response.json();
                        // Only apply if settings exist and have been customized
                        if (settings && Object.keys(settings).length > 0) {
                        applyFooterSettings(settings);
                        }
                    }
                } catch (error) {
                    console.error('Error loading footer settings:', error);
                    // If error, keep defaults
                }
            }
            
            function applyFooterSettings(settings) {
                if (!settings) return;
                
                // Title and Description - only update if value exists
                if (settings.title) document.getElementById('footerTitle').textContent = settings.title;
                if (settings.description) document.getElementById('footerDescription').textContent = settings.description;
                
                // Contact Info - only update if value exists
                if (settings.phone1) document.getElementById('footerPhone1').textContent = settings.phone1;
                if (settings.phone2) document.getElementById('footerPhone2').textContent = settings.phone2;
                if (settings.email) document.getElementById('footerEmail').textContent = settings.email;
                
                // Addresses - only update if value exists
                if (settings.project_address) document.getElementById('footerProjectAddress').textContent = settings.project_address;
                if (settings.contact_address) document.getElementById('footerContactAddress').textContent = settings.contact_address;
                
                // Quick Links - only update if array exists and has items
                if (settings.quick_links && Array.isArray(settings.quick_links) && settings.quick_links.length > 0) {
                    const quickLinksContainer = document.getElementById('footerQuickLinks');
                    if (quickLinksContainer) {
                        quickLinksContainer.innerHTML = '';
                        settings.quick_links.forEach(link => {
                            if (link && link.label) {
                                const li = document.createElement('li');
                                li.innerHTML = `<a href="${link.href || '#'}"><i class="fas fa-chevron-right"></i> ${link.label}</a>`;
                                quickLinksContainer.appendChild(li);
                            }
                        });
                    }
                }
                
                // Legal Links - only update if array exists and has items
                if (settings.legal_links && Array.isArray(settings.legal_links) && settings.legal_links.length > 0) {
                    const legalLinksContainer = document.getElementById('footerLegalLinks');
                    if (legalLinksContainer) {
                        legalLinksContainer.innerHTML = '';
                        settings.legal_links.forEach(link => {
                            if (link && link.label) {
                                const li = document.createElement('li');
                                li.innerHTML = `<a href="${link.href || '#'}"><i class="fas fa-chevron-right"></i> ${link.label}</a>`;
                                legalLinksContainer.appendChild(li);
                            }
                        });
                    }
                }
                
                // Social Links - only update if object exists
                if (settings.social_links && typeof settings.social_links === 'object') {
                    if (settings.social_links.facebook) document.getElementById('footerFacebook').href = settings.social_links.facebook;
                    if (settings.social_links.instagram) document.getElementById('footerInstagram').href = settings.social_links.instagram;
                    if (settings.social_links.twitter) document.getElementById('footerTwitter').href = settings.social_links.twitter;
                    if (settings.social_links.linkedin) document.getElementById('footerLinkedin').href = settings.social_links.linkedin;
                    if (settings.social_links.youtube) document.getElementById('footerYoutube').href = settings.social_links.youtube;
                }
                
                // Map and QR Section - only update if value exists
                if (settings.qr_section_title) document.getElementById('footerQrTitle').textContent = settings.qr_section_title;
                if (settings.map_button_text) document.getElementById('footerMapBtnText').textContent = settings.map_button_text;
                if (settings.map_url) document.getElementById('footerMapBtn').href = settings.map_url;
                
                // QR Image - only update if path exists
                const qrImg = document.getElementById('ftQrImg');
                if (qrImg) {
                    if (settings.qr_image_path) {
                        qrImg.src = '/storage/' + settings.qr_image_path;
                        qrImg.style.display = 'block';
                        // Make QR image clickable to open in new tab
                        qrImg.onclick = function() {
                            window.open(qrImg.src, '_blank');
                        };
                    } else {
                        qrImg.style.display = 'none';
                    }
                }
                
                // Bottom Text - only update if value exists
                if (settings.bottom_text) document.getElementById('footerBottomText').textContent = settings.bottom_text;
            }
            
            // Apply defaults first, then try to load from dashboard
            applyDefaults();
            loadFooterSettings();
            
            // Listen for updates from dashboard
            window.addEventListener('storage', function(e) {
                if (e.key === 'refreshFooter') {
                    loadFooterSettings();
                }
            });
            
            // Polling fallback
            let lastRefresh = localStorage.getItem('refreshFooter');
            setInterval(() => {
                const currentRefresh = localStorage.getItem('refreshFooter');
                if (currentRefresh !== lastRefresh) {
                    lastRefresh = currentRefresh;
                    loadFooterSettings();
                }
            }, 1000);
        })();
    </script>
