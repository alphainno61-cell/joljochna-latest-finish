<div id="about" class="tab-content">
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-card-content">
                <div class="stat-info">
                    <h3>আমাদের সম্পর্কে</h3>
                    <div class="subtitle">এই ট্যাবে হিরো সেকশন, ইতিহাস, মিশন, ভিশন, প্রতিষ্ঠাতা, চেয়ারম্যান ইত্যাদি ম্যানেজ করুন
                    </div>
                </div>
                <div class="stat-icon green">ℹ️</div>
            </div>
        </div>
    </div>

    <input type="hidden" id="csrfTokenAbout" value="{{ csrf_token() }}">
    
    <style>
        .about-form-group {
            margin-bottom: 16px;
        }
        .about-form-group label {
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
            font-weight: 600;
            color: #374151;
        }
        .about-form-group input[type="text"],
        .about-form-group textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.2s;
        }
        .about-form-group input[type="text"]:focus,
        .about-form-group textarea:focus {
            outline: none;
            border-color: #0a4d2e;
        }
        .about-form-group textarea {
            min-height: 100px;
            resize: vertical;
            font-family: inherit;
        }
        .about-save-btn {
            background: #0a4d2e;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 2px 4px rgba(10, 77, 46, 0.2);
        }
        .about-save-btn:hover {
            background: #0d6639;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(10, 77, 46, 0.3);
        }
        .about-status {
            margin-top: 12px;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 500;
            display: inline-block;
        }
        .about-status.success {
            background: #d1fae5;
            color: #065f46;
        }
        .about-status.error {
            background: #fee2e2;
            color: #991b1b;
        }
        .image-preview-container {
            margin-top: 12px;
            text-align: center;
        }
        .image-preview-container img {
            max-width: 100%;
            max-height: 200px;
            border-radius: 8px;
            border: 2px solid #e5e7eb;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
    </style>

    <!-- Hero Section -->
    <div id="about-hero" style="margin-top:1rem;">
        <div class="table-card">
            <h2>হিরো সেকশন</h2>
            <p style="color:#6b7280; margin-bottom:20px;">About পেজের হিরো সেকশনের কন্টেন্ট ম্যানেজ করুন</p>
            
            <div class="about-form-group">
                <label>শিরোনাম</label>
                <input type="text" id="hero-title" placeholder="যেমন: আমাদের সম্পর্কে" />
            </div>
            <div class="about-form-group">
                <label>সাব-টাইটেল ১</label>
                <textarea id="hero-subtitle" placeholder="প্রথম উক্তি"></textarea>
            </div>
            <div class="about-form-group">
                <label>সাব-টাইটেল ২</label>
                <textarea id="hero-subtitle2" placeholder="দ্বিতীয় উক্তি"></textarea>
            </div>
            
            <button class="about-save-btn" onclick="saveAboutSection('hero')">সংরক্ষণ করুন</button>
            <div id="hero-status" class="about-status" style="display:none;"></div>
        </div>
    </div>

    <!-- History Section -->
    <div id="about-history" style="margin-top:1rem;">
        <div class="table-card">
            <h2>আমাদের ইতিহাস</h2>
            <p style="color:#6b7280; margin-bottom:20px;">ইতিহাস সেকশনের কন্টেন্ট ম্যানেজ করুন</p>
            
            <div class="about-form-group">
                <label>প্রথম প্যারাগ্রাফ</label>
                <textarea id="history-content" placeholder="আমাদের সংস্থা ২০০৫ সালে শুরু হয়েছিল..."></textarea>
            </div>
            <div class="about-form-group">
                <label>দ্বিতীয় প্যারাগ্রাফ</label>
                <textarea id="history-content2" placeholder="সময়ের সঙ্গে সঙ্গে আমরা নতুন নতুন উদ্যোগ নিয়েছি..."></textarea>
            </div>
            
            <button class="about-save-btn" onclick="saveAboutSection('history')">সংরক্ষণ করুন</button>
            <div id="history-status" class="about-status" style="display:none;"></div>
        </div>
    </div>

    <!-- Mission Section -->
    <div id="about-mission" style="margin-top:1rem;">
        <div class="table-card">
            <h2>আমাদের মিশন</h2>
            <p style="color:#6b7280; margin-bottom:20px;">মিশন সেকশনের কন্টেন্ট ম্যানেজ করুন</p>
            
            <div class="about-form-group">
                <label>শিরোনাম</label>
                <input type="text" id="mission-title" placeholder="আমাদের মিশন" />
            </div>
            <div class="about-form-group">
                <label>বিবরণ</label>
                <textarea id="mission-content" placeholder="আমাদের মিশন হলো..."></textarea>
            </div>
            <div class="about-form-group">
                <label>ছবি আপলোড করুন</label>
                <input type="file" id="mission-image" accept="image/*" style="width:100%; padding:8px; border:1px solid #d1d5db; border-radius:8px;" onchange="previewAboutImage('mission')" />
                <div id="mission-image-preview" class="image-preview-container"></div>
            </div>
            
            <button class="about-save-btn" onclick="saveAboutSection('mission')">সংরক্ষণ করুন</button>
            <div id="mission-status" class="about-status" style="display:none;"></div>
        </div>
    </div>

    <!-- Vision Section -->
    <div id="about-vision" style="margin-top:1rem;">
        <div class="table-card">
            <h2>আমাদের ভিশন</h2>
            <p style="color:#6b7280; margin-bottom:20px;">ভিশন সেকশনের কন্টেন্ট ম্যানেজ করুন</p>
            
            <div class="about-form-group">
                <label>শিরোনাম</label>
                <input type="text" id="vision-title" placeholder="আমাদের ভিশন" />
            </div>
            <div class="about-form-group">
                <label>বিবরণ</label>
                <textarea id="vision-content" placeholder="আমাদের ভিশন হলো..."></textarea>
            </div>
            <div class="about-form-group">
                <label>ছবি আপলোড করুন</label>
                <input type="file" id="vision-image" accept="image/*" style="width:100%; padding:8px; border:1px solid #d1d5db; border-radius:8px;" onchange="previewAboutImage('vision')" />
                <div id="vision-image-preview" class="image-preview-container"></div>
            </div>
            
            <button class="about-save-btn" onclick="saveAboutSection('vision')">সংরক্ষণ করুন</button>
            <div id="vision-status" class="about-status" style="display:none;"></div>
        </div>
    </div>

    <!-- Founder Section - Dynamic (Board Members) -->
    <div id="about-founder" style="margin-top:1rem;">
        <div class="table-card">
            <h2>বোর্ড মেম্বার</h2>
            <p style="color:#6b7280; margin-bottom:20px;">বোর্ড মেম্বারের তথ্য ম্যানেজ করুন - একাধিক বোর্ড মেম্বার যোগ করতে পারেন</p>
            
            <!-- Custom Title Field -->
            <div class="about-form-group">
                <label>সেকশন শিরোনাম</label>
                <input type="text" id="founder-section-title" placeholder="যেমন: বোর্ড মেম্বার" />
                <p style="color:#6b7280; font-size:12px; margin-top:4px;">এই শিরোনামটি ফ্রন্টএন্ডে প্রদর্শিত হবে</p>
            </div>
            <button class="about-save-btn" onclick="saveFounderTitle()" style="background:#0a4d2e; margin-bottom:20px;">শিরোনাম সংরক্ষণ করুন</button>
            <div id="founder-title-status" class="about-status" style="display:none;"></div>
            
            <div style="display:flex; justify-content:space-between; align-items:center; margin-top:30px; margin-bottom:20px; padding-top:20px; border-top:1px solid #e5e7eb;">
                <div>
                    <h3 style="margin:0; font-size:18px;">বোর্ড মেম্বার তালিকা</h3>
                    <p style="color:#6b7280; margin:4px 0 0 0; font-size:14px;">একাধিক বোর্ড মেম্বার যোগ করতে পারেন</p>
                </div>
                <button class="about-save-btn" onclick="addTeamMember('founder')" style="background:#0a4d2e;">+ নতুন বোর্ড মেম্বার যোগ করুন</button>
            </div>
            <div id="founder-members-list"></div>
        </div>
    </div>

    <!-- Other Members Section - Dynamic -->
    <div id="about-other" style="margin-top:1rem;">
        <div class="table-card">
            <h2>অন্যান্য সদস্য</h2>
            <p style="color:#6b7280; margin-bottom:20px;">অন্যান্য সদস্যদের তথ্য ম্যানেজ করুন - একাধিক সদস্য যোগ করতে পারেন</p>
            
            <!-- Custom Title Field -->
            <div class="about-form-group">
                <label>সেকশন শিরোনাম</label>
                <input type="text" id="other-section-title" placeholder="যেমন: অন্যান্য সদস্য" />
                <p style="color:#6b7280; font-size:12px; margin-top:4px;">এই শিরোনামটি ফ্রন্টএন্ডে প্রদর্শিত হবে</p>
            </div>
            <button class="about-save-btn" onclick="saveOtherTitle()" style="background:#0a4d2e; margin-bottom:20px;">শিরোনাম সংরক্ষণ করুন</button>
            <div id="other-title-status" class="about-status" style="display:none;"></div>
            
            <div style="display:flex; justify-content:space-between; align-items:center; margin-top:30px; margin-bottom:20px; padding-top:20px; border-top:1px solid #e5e7eb;">
                <div>
                    <h3 style="margin:0; font-size:18px;">অন্যান্য সদস্য তালিকা</h3>
                    <p style="color:#6b7280; margin:4px 0 0 0; font-size:14px;">একাধিক সদস্য যোগ করতে পারেন</p>
                </div>
                <button class="about-save-btn" onclick="addTeamMember('other')" style="background:#0a4d2e;">+ নতুন সদস্য যোগ করুন</button>
            </div>
            <div id="other-members-list"></div>
        </div>
    </div>

    <!-- Chairman Section - Dynamic -->
    <div id="about-chairman" style="margin-top:1rem;">
        <div class="table-card">
            <h2>আমাদের চেয়ারম্যান</h2>
            <p style="color:#6b7280; margin-bottom:20px;">চেয়ারম্যানের তথ্য ম্যানেজ করুন - একাধিক চেয়ারম্যান যোগ করতে পারেন</p>
            
            <!-- Custom Title Field -->
            <div class="about-form-group">
                <label>সেকশন শিরোনাম</label>
                <input type="text" id="chairman-section-title" placeholder="যেমন: আমাদের চেয়ারম্যান" />
                <p style="color:#6b7280; font-size:12px; margin-top:4px;">এই শিরোনামটি ফ্রন্টএন্ডে প্রদর্শিত হবে</p>
            </div>
            <button class="about-save-btn" onclick="saveChairmanTitle()" style="background:#0a4d2e; margin-bottom:20px;">শিরোনাম সংরক্ষণ করুন</button>
            <div id="chairman-title-status" class="about-status" style="display:none;"></div>
            
            <div style="display:flex; justify-content:space-between; align-items:center; margin-top:30px; margin-bottom:20px; padding-top:20px; border-top:1px solid #e5e7eb;">
                <div>
                    <h3 style="margin:0; font-size:18px;">চেয়ারম্যান তালিকা</h3>
                    <p style="color:#6b7280; margin:4px 0 0 0; font-size:14px;">একাধিক চেয়ারম্যান যোগ করতে পারেন</p>
                </div>
                <button class="about-save-btn" onclick="addTeamMember('chairman')" style="background:#0a4d2e;">+ নতুন চেয়ারম্যান যোগ করুন</button>
            </div>
            <div id="chairman-members-list"></div>
        </div>
    </div>

    <script>
        (function(){
            const csrfToken = document.getElementById('csrfTokenAbout').value;
            
            // Load all sections on page load
            async function loadAllSections() {
                const sections = ['hero', 'history', 'mission', 'vision', 'founder', 'chairman'];
                
                for (const section of sections) {
                    try {
                        const response = await fetch(`/api/about-sections?section_key=${section}`);
                        if (response.ok) {
                            const data = await response.json();
                            if (data) {
                                populateSection(section, data);
                            }
                        }
                    } catch (error) {
                        console.error(`Error loading ${section}:`, error);
                    }
                }
                
                // Load founder and chairman section titles
                await loadSectionTitles();
            }
            
            // Load section titles for founder and chairman
            async function loadSectionTitles() {
                try {
                    // Load founder title
                    const founderResponse = await fetch('/api/about-sections?section_key=founder_title');
                    if (founderResponse.ok) {
                        const founderData = await founderResponse.json();
                        if (founderData && founderData.title) {
                            document.getElementById('founder-section-title').value = founderData.title;
                        }
                    }
                    
                    // Load chairman title
                    const chairmanResponse = await fetch('/api/about-sections?section_key=chairman_title');
                    if (chairmanResponse.ok) {
                        const chairmanData = await chairmanResponse.json();
                        if (chairmanData && chairmanData.title) {
                            document.getElementById('chairman-section-title').value = chairmanData.title;
                        }
                    }
                } catch (error) {
                    console.error('Error loading section titles:', error);
                }
            }
            
            function populateSection(section, data) {
                // Populate form fields based on section
                if (section === 'hero') {
                    if (data.title) document.getElementById('hero-title').value = data.title;
                    if (data.subtitle) document.getElementById('hero-subtitle').value = data.subtitle;
                    if (data.content) document.getElementById('hero-subtitle2').value = data.content;
                } else if (section === 'history') {
                    if (data.content) document.getElementById('history-content').value = data.content;
                    if (data.content_2) document.getElementById('history-content2').value = data.content_2;
                } else if (section === 'mission') {
                    if (data.title) document.getElementById('mission-title').value = data.title;
                    if (data.content) document.getElementById('mission-content').value = data.content;
                    if (data.image_url) showImagePreview('mission', data.image_url);
                } else if (section === 'vision') {
                    if (data.title) document.getElementById('vision-title').value = data.title;
                    if (data.content) document.getElementById('vision-content').value = data.content;
                    if (data.image_url) showImagePreview('vision', data.image_url);
                } else if (section === 'founder') {
                    if (data.name) document.getElementById('founder-name').value = data.name;
                    if (data.position) document.getElementById('founder-position').value = data.position;
                    if (data.content) document.getElementById('founder-content').value = data.content;
                    if (data.content_2) document.getElementById('founder-content2').value = data.content_2;
                    if (data.content_3) document.getElementById('founder-content3').value = data.content_3;
                    if (data.image_url) showImagePreview('founder', data.image_url);
                } else if (section === 'chairman') {
                    if (data.name) document.getElementById('chairman-name').value = data.name;
                    if (data.position) document.getElementById('chairman-position').value = data.position;
                    if (data.content) document.getElementById('chairman-content').value = data.content;
                    if (data.content_2) document.getElementById('chairman-content2').value = data.content_2;
                    if (data.content_3) document.getElementById('chairman-content3').value = data.content_3;
                    if (data.image_url) showImagePreview('chairman', data.image_url);
                }
            }
            
            function showImagePreview(section, imageUrl) {
                const previewDiv = document.getElementById(`${section}-image-preview`);
                if (previewDiv) {
                    previewDiv.innerHTML = `<img src="${imageUrl}" alt="Preview" />`;
                }
            }
            
            window.previewAboutImage = function(section) {
                const input = document.getElementById(`${section}-image`);
                const previewDiv = document.getElementById(`${section}-image-preview`);
                
                if (input.files && input.files[0]) {
                    const file = input.files[0];
                    
                    // Validate file size (max 5MB)
                    if (file.size > 5 * 1024 * 1024) {
                        alert('ফাইলের আকার ৫ এমবি এর কম হতে হবে।');
                        input.value = '';
                        return;
                    }
                    
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewDiv.innerHTML = `<img src="${e.target.result}" alt="Preview" />`;
                    };
                    reader.readAsDataURL(file);
                }
            };
            
            // Save founder section title
            window.saveFounderTitle = async function() {
                const titleInput = document.getElementById('founder-section-title');
                const statusEl = document.getElementById('founder-title-status');
                
                if (!titleInput.value.trim()) {
                    statusEl.textContent = '✗ শিরোনাম প্রয়োজন';
                    statusEl.className = 'about-status error';
                    statusEl.style.display = 'inline-block';
                    return;
                }
                
                statusEl.textContent = 'সংরক্ষণ করা হচ্ছে...';
                statusEl.className = 'about-status';
                statusEl.style.display = 'inline-block';
                
                const formData = new FormData();
                formData.append('section_key', 'founder_title');
                formData.append('title', titleInput.value.trim());
                
                try {
                    const response = await fetch('/admin/about-sections', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: formData
                    });
                    
                    const result = await response.json();
                    
                    if (result.success) {
                        statusEl.textContent = '✓ শিরোনাম সফলভাবে সংরক্ষণ করা হয়েছে';
                        statusEl.className = 'about-status success';
                        
                        // Trigger refresh on frontend
                        try {
                            localStorage.setItem('refreshAboutPage', Date.now().toString());
                        } catch(e) {}
                    } else {
                        throw new Error(result.message || 'Save failed');
                    }
                } catch (error) {
                    console.error('Error saving founder title:', error);
                    statusEl.textContent = '✗ সংরক্ষণ করতে ব্যর্থ হয়েছে';
                    statusEl.className = 'about-status error';
                }
            };
            
            // Save other section title
            window.saveOtherTitle = async function() {
                const titleInput = document.getElementById('other-section-title');
                const statusEl = document.getElementById('other-title-status');
                
                if (!titleInput.value.trim()) {
                    statusEl.textContent = '✗ শিরোনাম প্রয়োজন';
                    statusEl.className = 'about-status error';
                    statusEl.style.display = 'inline-block';
                    return;
                }
                
                statusEl.textContent = 'সংরক্ষণ করা হচ্ছে...';
                statusEl.className = 'about-status';
                statusEl.style.display = 'inline-block';
                
                const formData = new FormData();
                formData.append('section_key', 'other_title');
                formData.append('title', titleInput.value.trim());
                
                try {
                    const response = await fetch('/admin/about-sections', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: formData
                    });
                    
                    const result = await response.json();
                    
                    if (result.success) {
                        statusEl.textContent = '✓ শিরোনাম সফলভাবে সংরক্ষণ করা হয়েছে';
                        statusEl.className = 'about-status success';
                    } else {
                        throw new Error(result.message || 'Save failed');
                    }
                } catch (error) {
                    console.error('Error saving other title:', error);
                    statusEl.textContent = '✗ সংরক্ষণ করতে ব্যর্থ হয়েছে';
                    statusEl.className = 'about-status error';
                }
            };
            
            // Save chairman section title
            window.saveChairmanTitle = async function() {
                const titleInput = document.getElementById('chairman-section-title');
                const statusEl = document.getElementById('chairman-title-status');
                
                if (!titleInput.value.trim()) {
                    statusEl.textContent = '✗ শিরোনাম প্রয়োজন';
                    statusEl.className = 'about-status error';
                    statusEl.style.display = 'inline-block';
                    return;
                }
                
                statusEl.textContent = 'সংরক্ষণ করা হচ্ছে...';
                statusEl.className = 'about-status';
                statusEl.style.display = 'inline-block';
                
                const formData = new FormData();
                formData.append('section_key', 'chairman_title');
                formData.append('title', titleInput.value.trim());
                
                try {
                    const response = await fetch('/admin/about-sections', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: formData
                    });
                    
                    const result = await response.json();
                    
                    if (result.success) {
                        statusEl.textContent = '✓ শিরোনাম সফলভাবে সংরক্ষণ করা হয়েছে';
                        statusEl.className = 'about-status success';
                        
                        // Trigger refresh on frontend
                        try {
                            localStorage.setItem('refreshAboutPage', Date.now().toString());
                        } catch(e) {}
                    } else {
                        throw new Error(result.message || 'Save failed');
                    }
                } catch (error) {
                    console.error('Error saving chairman title:', error);
                    statusEl.textContent = '✗ সংরক্ষণ করতে ব্যর্থ হয়েছে';
                    statusEl.className = 'about-status error';
                }
            };
            
            window.saveAboutSection = async function(section) {
                const statusEl = document.getElementById(`${section}-status`);
                
                // Collect data based on section
                const formData = new FormData();
                formData.append('section_key', section);
                
                if (section === 'hero') {
                    formData.append('title', document.getElementById('hero-title').value);
                    formData.append('subtitle', document.getElementById('hero-subtitle').value);
                    formData.append('content', document.getElementById('hero-subtitle2').value);
                } else if (section === 'history') {
                    formData.append('content', document.getElementById('history-content').value);
                    formData.append('content_2', document.getElementById('history-content2').value);
                } else if (section === 'mission') {
                    formData.append('title', document.getElementById('mission-title').value);
                    formData.append('content', document.getElementById('mission-content').value);
                    const imageFile = document.getElementById('mission-image').files[0];
                    if (imageFile) formData.append('image', imageFile);
                } else if (section === 'vision') {
                    formData.append('title', document.getElementById('vision-title').value);
                    formData.append('content', document.getElementById('vision-content').value);
                    const imageFile = document.getElementById('vision-image').files[0];
                    if (imageFile) formData.append('image', imageFile);
                } else if (section === 'founder') {
                    formData.append('name', document.getElementById('founder-name').value);
                    formData.append('position', document.getElementById('founder-position').value);
                    formData.append('content', document.getElementById('founder-content').value);
                    formData.append('content_2', document.getElementById('founder-content2').value);
                    formData.append('content_3', document.getElementById('founder-content3').value);
                    const imageFile = document.getElementById('founder-image').files[0];
                    if (imageFile) formData.append('image', imageFile);
                } else if (section === 'chairman') {
                    formData.append('name', document.getElementById('chairman-name').value);
                    formData.append('position', document.getElementById('chairman-position').value);
                    formData.append('content', document.getElementById('chairman-content').value);
                    formData.append('content_2', document.getElementById('chairman-content2').value);
                    formData.append('content_3', document.getElementById('chairman-content3').value);
                    const imageFile = document.getElementById('chairman-image').files[0];
                    if (imageFile) formData.append('image', imageFile);
                }
                
                // Show loading status
                if (statusEl) {
                    statusEl.textContent = 'সংরক্ষণ করা হচ্ছে...';
                    statusEl.className = 'about-status';
                    statusEl.style.display = 'inline-block';
                    statusEl.style.background = '#f3f4f6';
                    statusEl.style.color = '#666';
                }
                
                try {
                    const response = await fetch('/admin/about-sections', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: formData
                    });
                    
                    const result = await response.json();
                    
                    if (result.success) {
                        if (statusEl) {
                            statusEl.textContent = '✓ সফলভাবে সংরক্ষিত হয়েছে';
                            statusEl.className = 'about-status success';
                            setTimeout(() => {
                                statusEl.style.display = 'none';
                            }, 3000);
                        }
                        
                        // Trigger refresh on frontend
                        try {
                            localStorage.setItem('refreshAboutPage', Date.now().toString());
                        } catch(e) {}
                    } else {
                        throw new Error('Save failed');
                    }
                } catch (error) {
                    console.error('Error saving:', error);
                    if (statusEl) {
                        statusEl.textContent = '✗ সংরক্ষণ ব্যর্থ হয়েছে';
                        statusEl.className = 'about-status error';
                    }
                }
            };
            
            // Load sections on page load
            loadAllSections();
            
            // Reload every 30 seconds
            setInterval(loadAllSections, 30000);

            // ========== Team Members (Founder/Chairman/Other) Dynamic Management ==========
            let teamMembers = {
                founder: [],
                chairman: [],
                other: []
            };

            // Load team members
            async function loadTeamMembers() {
                try {
                    const founderResponse = await fetch('/api/team-members?type=founder');
                    if (founderResponse.ok) {
                        teamMembers.founder = await founderResponse.json();
                        renderTeamMembers('founder');
                    }
                } catch (error) {
                    console.error('Error loading founders:', error);
                }

                try {
                    const chairmanResponse = await fetch('/api/team-members?type=chairman');
                    if (chairmanResponse.ok) {
                        teamMembers.chairman = await chairmanResponse.json();
                        renderTeamMembers('chairman');
                    }
                } catch (error) {
                    console.error('Error loading chairmen:', error);
                }
            }

            // Render team members
            function renderTeamMembers(type) {
                const container = document.getElementById(`${type}-members-list`);
                if (!container) return;

                container.innerHTML = '';

                if (teamMembers[type].length === 0) {
                    const typeLabels = {
                        'founder': 'বোর্ড মেম্বার',
                        'chairman': 'চেয়ারম্যান',
                        'other': 'অন্যান্য সদস্য'
                    };
                    container.innerHTML = '<p style="color:#9ca3af; text-align:center; padding:40px;">কোনো ' + (typeLabels[type] || 'সদস্য') + ' নেই। নতুন যোগ করুন।</p>';
                    return;
                }

                teamMembers[type].forEach((member, index) => {
                    const card = createTeamMemberCard(member, type, index);
                    container.appendChild(card);
                });
            }

            // Create team member card
            function createTeamMemberCard(member, type, index) {
                const card = document.createElement('div');
                card.className = 'table-card';
                card.style.marginTop = index > 0 ? '1rem' : '0';
                card.setAttribute('data-member-id', member.id || '');

                const typeLabels = {
                    'founder': 'বোর্ড মেম্বার',
                    'chairman': 'চেয়ারম্যান',
                    'other': 'অন্যান্য সদস্য'
                };
                const typeLabel = typeLabels[type] || 'সদস্য';

                // Simplified form for 'other' type (only name, designation, image)
                if (type === 'other') {
                    card.innerHTML = `
                        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
                            <h3 style="margin:0;">${typeLabel} #${index + 1}</h3>
                            ${member.id ? `<button class="about-save-btn" onclick="deleteTeamMember(${member.id}, '${type}')" style="background:#dc2626;">🗑️ মুছুন</button>` : ''}
                        </div>
                        
                        <div class="about-form-group">
                            <label>নাম</label>
                            <input type="text" class="team-member-name" value="${member.name || ''}" placeholder="যেমন: মোহাম্মদ রহিম" />
                        </div>
                        <div class="about-form-group">
                            <label>পদবি</label>
                            <input type="text" class="team-member-position" value="${member.position || ''}" placeholder="সিনিয়র ম্যানেজার" />
                        </div>
                        <div class="about-form-group">
                            <label>ছবি আপলোড করুন</label>
                            ${member.image_url ? `
                                <div style="margin-bottom:10px; padding:12px; background:#f0fdf4; border:2px solid #86efac; border-radius:8px;">
                                    <small style="color:#166534; font-weight:600; display:block; margin-bottom:8px;">✓ বর্তমান ইমেজ</small>
                                    <img src="${member.image_url}" style="width:100%; max-height:200px; object-fit:cover; border-radius:8px;" onerror="this.style.display='none';" />
                                </div>
                            ` : ''}
                            <input type="file" class="team-member-image" accept="image/*" onchange="previewTeamMemberImage(this)" />
                            <small style="display:block; margin-top:5px; color:#6b7280; font-size:13px;">
                                📸 ${member.image_url ? 'নতুন ইমেজ আপলোড করুন (ঐচ্ছিক)' : 'সর্বোচ্চ ফাইল সাইজ: 5MB'}
                            </small>
                            <div class="team-member-image-preview"></div>
                        </div>
                        
                        <button class="about-save-btn" onclick="saveTeamMember(this, '${type}')">
                            ${member.id ? '💾 আপডেট করুন' : '💾 সংরক্ষণ করুন'}
                        </button>
                    `;
                } else {
                    // Full form for 'founder' and 'chairman' types
                    card.innerHTML = `
                        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
                            <h3 style="margin:0;">${typeLabel} #${index + 1}</h3>
                            ${member.id ? `<button class="about-save-btn" onclick="deleteTeamMember(${member.id}, '${type}')" style="background:#dc2626;">🗑️ মুছুন</button>` : ''}
                        </div>
                        
                        <div class="about-form-group">
                            <label>নাম</label>
                            <input type="text" class="team-member-name" value="${member.name || ''}" placeholder="যেমন: মারুফ সাত্তার আলী" />
                        </div>
                        <div class="about-form-group">
                            <label>পদবি</label>
                            <input type="text" class="team-member-position" value="${member.position || ''}" placeholder="${type === 'founder' ? 'বোর্ড মেম্বার, জলজোছনা' : 'চেয়ারম্যান, জলজোছনা'}" />
                        </div>
                        <div class="about-form-group">
                            <label>বিবরণ (প্রথম প্যারাগ্রাফ)</label>
                            <textarea class="team-member-content" placeholder="জনাব মারুফ সাত্তার আলী একজন উদ্ভাবক...">${member.content || ''}</textarea>
                        </div>
                        <div class="about-form-group">
                            <label>বিবরণ (দ্বিতীয় প্যারাগ্রাফ)</label>
                            <textarea class="team-member-content2" placeholder="তিনি বিশ্বাস করেন...">${member.content_2 || ''}</textarea>
                        </div>
                        <div class="about-form-group">
                            <label>বিবরণ (তৃতীয় প্যারাগ্রাফ)</label>
                            <textarea class="team-member-content3" placeholder="অতিরিক্ত তথ্য...">${member.content_3 || ''}</textarea>
                        </div>
                        <div class="about-form-group">
                            <label>ছবি আপলোড করুন</label>
                            ${member.image_url ? `
                                <div style="margin-bottom:10px; padding:12px; background:#f0fdf4; border:2px solid #86efac; border-radius:8px;">
                                    <small style="color:#166534; font-weight:600; display:block; margin-bottom:8px;">✓ বর্তমান ইমেজ</small>
                                    <img src="${member.image_url}" style="width:100%; max-height:200px; object-fit:cover; border-radius:8px;" onerror="this.style.display='none';" />
                                </div>
                            ` : ''}
                            <input type="file" class="team-member-image" accept="image/*" onchange="previewTeamMemberImage(this)" />
                            <small style="display:block; margin-top:5px; color:#6b7280; font-size:13px;">
                                📸 ${member.image_url ? 'নতুন ইমেজ আপলোড করুন (ঐচ্ছিক)' : 'সর্বোচ্চ ফাইল সাইজ: 5MB'}
                            </small>
                            <div class="team-member-image-preview"></div>
                        </div>
                        
                        <button class="about-save-btn" onclick="saveTeamMember(this, '${type}')">
                            ${member.id ? '💾 আপডেট করুন' : '💾 সংরক্ষণ করুন'}
                        </button>
                    `;
                }

                return card;
            }

            // Add new team member
            window.addTeamMember = function(type) {
                const newMember = {
                    type: type,
                    name: '',
                    position: '',
                    content: '',
                    content_2: '',
                    content_3: '',
                    order: teamMembers[type].length
                };
                teamMembers[type].push(newMember);
                renderTeamMembers(type);
            };

            // Preview team member image
            window.previewTeamMemberImage = function(input) {
                const card = input.closest('.table-card');
                const previewContainer = card.querySelector('.team-member-image-preview');
                
                if (input.files && input.files[0]) {
                    const file = input.files[0];
                    
                    if (file.size > 5 * 1024 * 1024) {
                        alert('ফাইলের আকার ৫ এমবি এর কম হতে হবে।');
                        input.value = '';
                        return;
                    }
                    
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewContainer.innerHTML = `<img src="${e.target.result}" style="width:100%; max-height:200px; object-fit:cover; border-radius:8px; margin-top:10px;" />`;
                    };
                    reader.readAsDataURL(file);
                }
            };

            // Save team member
            window.saveTeamMember = async function(button, type) {
                const card = button.closest('.table-card');
                const memberId = card.getAttribute('data-member-id');
                
                const formData = new FormData();
                formData.append('type', type);
                formData.append('name', card.querySelector('.team-member-name').value);
                formData.append('position', card.querySelector('.team-member-position').value);
                
                // Only add content fields for founder and chairman types
                if (type !== 'other') {
                    formData.append('content', card.querySelector('.team-member-content')?.value || '');
                    formData.append('content_2', card.querySelector('.team-member-content2')?.value || '');
                    formData.append('content_3', card.querySelector('.team-member-content3')?.value || '');
                }
                
                const imageInput = card.querySelector('.team-member-image');
                if (imageInput.files && imageInput.files[0]) {
                    formData.append('image', imageInput.files[0]);
                }

                button.disabled = true;
                button.textContent = 'সংরক্ষণ করা হচ্ছে...';

                try {
                    const url = memberId ? `/admin/team-members/${memberId}` : '/admin/team-members';
                    const method = memberId ? 'PUT' : 'POST';

                    const response = await fetch(url, {
                        method: method,
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: formData
                    });

                    const result = await response.json();

                    if (result.success) {
                        button.textContent = '✓ সংরক্ষিত হয়েছে';
                        button.style.background = '#10b981';
                        setTimeout(() => {
                            button.textContent = memberId ? '💾 আপডেট করুন' : '💾 সংরক্ষণ করুন';
                            button.style.background = '#0a4d2e';
                            button.disabled = false;
                        }, 2000);
                        loadTeamMembers();
                    } else {
                        throw new Error(result.message || 'Save failed');
                    }
                } catch (error) {
                    console.error('Error saving team member:', error);
                    button.textContent = '✗ ব্যর্থ হয়েছে';
                    button.style.background = '#dc2626';
                    button.disabled = false;
                }
            };

            // Delete team member
            window.deleteTeamMember = async function(id, type) {
                const typeLabels = {
                    'founder': 'বোর্ড মেম্বার',
                    'chairman': 'চেয়ারম্যান',
                    'other': 'অন্যান্য সদস্য'
                };
                if (!confirm('আপনি কি নিশ্চিত যে আপনি এই ' + (typeLabels[type] || 'সদস্য') + ' মুছে ফেলতে চান?')) {
                    return;
                }

                try {
                    const response = await fetch(`/admin/team-members/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        }
                    });

                    const result = await response.json();

                    if (result.success) {
                        loadTeamMembers();
                    } else {
                        throw new Error(result.message || 'Delete failed');
                    }
                } catch (error) {
                    console.error('Error deleting team member:', error);
                    alert('মুছে ফেলা ব্যর্থ হয়েছে');
                }
            };

            // Load team members on page load
            loadTeamMembers();
        })();
    </script>
</div>
