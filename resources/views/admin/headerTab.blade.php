<div id="header" class="tab-content">
    <div class="table-card">
        <h2>হেডার</h2>
        <p style="color:#6b7280; margin-bottom:1rem;">এই ফর্ম থেকে ওয়েবসাইটের ন্যাভিগেশন (লোগো টেক্সট ও মেনু) এডিট করুন। Save করলে সেটিংস সংরক্ষিত থাকবে।</p>

        <form id="headerSettingsForm" onsubmit="return false;">
            <div class="form-grid">
                <div class="form-group">
                    <label class="subtitle" for="headerLogoFile">লোগো আপলোড</label>
                    <input id="headerLogoFile" type="file" accept="image/*" class="search-input">
                    <small style="color:#6b7280; display:block; margin-top:0.25rem;">PNG/SVG/JPG সমর্থিত। আপলোড করলে URL-এর পরিবর্তে এই ইমেজ ব্যবহৃত হবে।</small>
                </div>
                <div class="form-group">
                    <label class="subtitle">প্রিভিউ</label>
                    <div class="preview-card" style="display:flex; align-items:center; justify-content:center; min-height:64px;">
                        <img id="headerLogoPreview" alt="Logo Preview" class="logo-preview" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="subtitle" for="brandText">ব্র্যান্ড টেক্সট</label>
                    <input id="brandText" type="text" class="search-input" placeholder="জলজোছনা">
                </div>
                <div class="form-group">
                    <label class="subtitle" for="homeLabel">হোম লেবেল</label>
                    <input id="homeLabel" type="text" class="search-input" placeholder="হোম">
                </div>

                <div class="form-group">
                    <label class="subtitle" for="aboutLabel">আমাদের সম্পর্কে লেবেল</label>
                    <input id="aboutLabel" type="text" class="search-input" placeholder="আমাদের সম্পর্কে">
                </div>
                <div class="form-group">
                    <label class="subtitle" for="featuresLabel">সুবিধা লেবেল</label>
                    <input id="featuresLabel" type="text" class="search-input" placeholder="সুবিধা">
                </div>

                <div class="form-group">
                    <label class="subtitle" for="pricingLabel">মূল্য তালিকা লেবেল</label>
                    <input id="pricingLabel" type="text" class="search-input" placeholder="মূল্য তালিকা">
                </div>
                <div class="form-group">
                    <label class="subtitle" for="testimonialsLabel">মন্তব্য লেবেল</label>
                    <input id="testimonialsLabel" type="text" class="search-input" placeholder="মন্তব্য">
                </div>

                <div class="form-group">
                    <label class="subtitle" for="otherProjectsLabel">অন্যান্য প্রকল্প লেবেল</label>
                    <input id="otherProjectsLabel" type="text" class="search-input" placeholder="অন্যান্য প্রকল্প">
                </div>
                <div class="form-group">
                    <label class="subtitle" for="contactLabel">যোগাযোগ লেবেল</label>
                    <input id="contactLabel" type="text" class="search-input" placeholder="যোগাযোগ">
                </div>
                <div class="form-group">
                    <label class="subtitle" for="ctaText">CTA বাটন টেক্সট</label>
                    <input id="ctaText" type="text" class="search-input" placeholder="এখনই বুক করুন">
                </div>
                <div class="form-group">
                    <label class="subtitle" for="ctaHref">CTA লিঙ্ক (URL বা hash)</label>
                    <input id="ctaHref" type="text" class="search-input" placeholder="#contact">
                </div>
            </div>

            <div class="form-actions">
                <button class="btn btn-primary" onclick="saveHeaderSettings()">Save</button>
                <button class="btn" style="background:#6b7280; color:#fff;" onclick="resetHeaderSettings()">Reset to Default</button>
            </div>
        </form>
    </div>

    <div class="table-card" style="margin-top:1rem;">
        <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:0.5rem;">
            <h3 style="margin:0;">লাইভ প্রিভিউ</h3>
        </div>
        <div style="border:1px solid #e5e7eb; border-radius:0.75rem; overflow:hidden; background:#0b1727;">
            <div style="display:flex; align-items:center; gap:12px; padding:10px 14px;">
                <img id="previewLogo" alt="Preview Logo" style="height:40px; width:auto; display:none;" />
                <div id="previewFallbackIcon" style="color:#fbbf24;">🏠</div>
                <div style="flex:1"></div>
                <nav style="display:flex; gap:16px; color:#cbd5e1; font-size:14px;">
                    <span id="previewHome">হোম</span>
                    <span id="previewAbout">আমাদের সম্পর্কে</span>
                    <span id="previewFeatures">সুবিধা</span>
                    <span id="previewPricing">মূল্য তালিকা</span>
                    <span id="previewTestimonials">মন্তব্য</span>
                    <span id="previewOtherProjects">অন্যান্য প্রকল্প</span>
                    <span id="previewContact">যোগাযোগ</span>
                </nav>
                <a id="previewCta" href="#contact" style="margin-left:16px; background:#f59e0b; color:#111827; padding:8px 14px; border-radius:8px; text-decoration:none; font-weight:600; display:inline-flex; align-items:center; gap:8px;">
                    <span>📅</span>
                    <span id="previewCtaText">এখনই বুক করুন</span>
                </a>
            </div>
        </div>
    </div>
</div>
