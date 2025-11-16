@extends('layouts')

@section('content')
    <!-- HERO SECTION -->
    <div id="about-hero-section"
        class="hero d-flex flex-column justify-content-center align-items-center text-center gap-3 py-5 bg-success text-white">
        <h1 id="aboutHeroTitle" class="display-4 fw-bold">আমাদের সম্পর্কে</h1>
        <h5 id="aboutHeroSubtitle" class="fw-light fst-italic">"আমাদের লক্ষ্য শুধুই সেবা নয়, বরং সমাজের উন্নয়নে অবদান রাখা।"</h5>
        <h5 id="aboutHeroSubtitle2" class="fw-light fst-italic">"প্রতিটি পদক্ষেপ আমরা বিশ্বাস ও মানের ভিত্তিতে এগিয়ে নিই, যাতে গ্রাহকরা পায় সেরা
            অভিজ্ঞতা।"</h5>
    </div>

    <!-- HISTORY SECTION -->
    <section class="history-section bg-light px-5 py-1">
        <h2 class="history-title text-center fw-bold mb-5 mt-3">আমাদের ইতিহাস</h2>
        <div class="">
            <div class="row align-items-center">
                <!-- Text -->
                <div class="col-lg-6 col-md-12">
                    <p id="historyContent1" class="fs-5 lh-lg">
                        আমাদের সংস্থা ২০০৫ সালে শুরু হয়েছিল। ছোট একটি দল দিয়ে শুরু হলেও আমরা আজ একটি শক্তিশালী দল ও আধুনিক
                        প্রযুক্তির সাহায্যে সারা দেশের গ্রাহকদের সেবা দিচ্ছি। আমাদের মূল উদ্দেশ্য হলো মানসম্মত সেবা প্রদান
                        এবং
                        সমাজে ইতিবাচক প্রভাব ফেলা।
                    </p>
                    <p id="historyContent2" class="fs-5 lh-lg">
                        সময়ের সঙ্গে সঙ্গে আমরা নতুন নতুন উদ্যোগ নিয়েছি, গ্রাহকদের চাহিদা অনুযায়ী সমাধান করেছি এবং আমাদের
                        সেবা সম্প্রসারণ করেছি। প্রতিটি চ্যালেঞ্জকে আমরা একটি নতুন সুযোগ হিসেবে গ্রহণ করেছি।
                    </p>
                </div>

                <!-- Cards -->
                <div class="col-lg-6 col-md-12">
                    <div class="card mb-4 shadow-sm border-0 rounded-3 p-3">
                        <h5 class="fw-bold">প্রথম সাফল্য</h5>
                        <p>২০০৭ সালে আমাদের প্রথম বড় প্রকল্প সম্পন্ন হয়, যা আমাদের জন্য একটি গুরুত্বপূর্ণ মাইলফলক।</p>
                    </div>
                    <div class="card shadow-sm border-0 rounded-3 p-3">
                        <h5 class="fw-bold">প্রসারিত উদ্যোগ</h5>
                        <p>২০১৫ সালে আমরা নতুন শহরে সেবা শুরু করি, এবং গ্রাহকদের সঠিক সমাধান দিতে সক্ষম হই।</p>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- MISSION & VISION SECTION -->
    <section class="mx-5">
        <div class="row align-items-center" style="min-height: 450px;">

            <!-- TOP LEFT: Mission -->
            <div class="col-lg-4 order-lg-1 d-flex align-items-start">
                <div class="bg-light p-4 rounded-4 shadow-sm w-100">
                    <h3 id="missionTitle" class="fw-semibold fs-4 mb-3 text-success">আমাদের মিশন</h3>
                    <p id="missionContent" class="fs-5 lh-lg mb-0">
                        আমরা গ্রাহকদের জন্য সেরা রিয়েল এস্টেট সমাধান প্রদান করি, যাতে তারা তাদের পছন্দের বাড়ি সহজেই খুঁজে
                        পান।
                        আমাদের লক্ষ্য হলো গ্রাহকদের সাথে স্বচ্ছতা এবং বিশ্বাসের ভিত্তিতে কাজ করা।
                    </p>
                </div>
            </div>

            <!-- MIDDLE: Image -->
            <div class="col-lg-4 order-lg-2 d-flex justify-content-center">
                <img id="missionVisionImage" src="https://www.metallbau-frueh.com/fileadmin/_processed_/f/5/csm_albion-riverside-london-01_749393cfb9.jpg"
                    alt="জলজোছনা" class="img-fluid rounded w-100"
                    style="max-height: 750px; object-fit: cover; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
            </div>

            <!-- BOTTOM RIGHT: Vision -->
            <div class="col-lg-4 order-lg-3 d-flex align-items-end">
                <div class="bg-light p-4 rounded-4 shadow-sm w-100 mt-auto">
                    <h3 id="visionTitle" class="fw-semibold fs-4 mb-3 text-success">আমাদের ভিশন</h3>
                    <p id="visionContent" class="fs-5 lh-lg mb-0">
                        বাংলাদেশের শীর্ষ রিয়েল এস্টেট প্ল্যাটফর্ম হয়ে উঠা, যেখানে গ্রাহকের সন্তুষ্টি সর্বোচ্চ অগ্রাধিকার।
                        আমরা ভবিষ্যতে আরও উন্নত প্রযুক্তি এবং সেবা প্রদানের মাধ্যমে গ্রাহকদের জীবনকে সহজ করতে চাই।
                    </p>
                </div>
            </div>

        </div>
    </section>



    <!-- FOUNDER & CHAIRMAN SECTION - Dynamic -->
    <section class="founder-section bg-light">
        <div class="container">
            <h2 class="text-center fw-bold text-success mb-5" id="founders-title">বোর্ড মেম্বার</h2>
            <div id="founders-container"></div>

            <h2 class="text-center fw-bold text-success mb-5 mt-5" id="chairmen-title" style="display:none;">আমাদের চেয়ারম্যান</h2>
            <div id="chairmen-container"></div>
        </div>
    </section>

    <!-- OTHER MEMBERS SECTION - SLIDER -->
    <section class="other-members-section py-5" style="background: #ffffff;">
        <div class="container">
            <h2 class="text-center fw-bold text-success mb-5" id="other-members-title">অন্যান্য সদস্য</h2>
            
            <div class="other-members-carousel-wrapper">
                <button class="other-carousel-btn prev-btn" id="otherPrevBtn" aria-label="Previous">❮</button>
                <div class="other-members-carousel-container">
                    <div class="other-members-carousel-track" id="otherMembersTrack">
                        <!-- Other members will be loaded here -->
                    </div>
                </div>
                <button class="other-carousel-btn next-btn" id="otherNextBtn" aria-label="Next">❯</button>
            </div>
        </div>
    </section>

    <style>
        .other-members-section {
            padding: 4rem 0;
        }
        .other-members-carousel-wrapper {
            position: relative;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 70px;
        }
        .other-members-carousel-container {
            overflow: hidden;
            position: relative;
            cursor: grab;
            user-select: none;
        }
        .other-members-carousel-container:active {
            cursor: grabbing;
        }
        .other-members-carousel-track {
            display: flex;
            gap: 1.5rem;
            transition: transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            will-change: transform;
        }
        .other-members-carousel-track.dragging {
            transition: none;
        }
        .other-member-card {
            flex: 0 0 calc(25% - 1.125rem);
            min-width: 280px;
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            user-select: none;
        }
        .other-member-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        }
        .other-member-card img {
            width: 100%;
            height: 280px;
            object-fit: cover;
            display: block;
            user-select: none;
            -webkit-user-drag: none;
            pointer-events: none;
        }
        .other-member-card-content {
            padding: 1.5rem;
            text-align: center;
        }
        .other-member-card-content h4 {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1f2937;
            margin: 0 0 0.5rem 0;
        }
        .other-member-card-content p {
            font-size: 0.9375rem;
            color: #6b7280;
            margin: 0;
        }
        .other-carousel-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, #0a4d2e 0%, #0d6639 100%);
            color: white;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(10, 77, 46, 0.3);
        }
        .other-carousel-btn:hover {
            background: linear-gradient(135deg, #0d6639 0%, #0a4d2e 100%);
            transform: translateY(-50%) scale(1.1);
            box-shadow: 0 6px 16px rgba(10, 77, 46, 0.4);
        }
        .other-carousel-btn:active {
            transform: translateY(-50%) scale(0.95);
        }
        .other-carousel-btn.prev-btn {
            left: 0;
        }
        .other-carousel-btn.next-btn {
            right: 0;
        }
        .other-carousel-btn:disabled {
            opacity: 0.3;
            cursor: not-allowed;
        }
        @media (max-width: 1200px) {
            .other-member-card {
                flex: 0 0 calc(33.333% - 1rem);
            }
        }
        @media (max-width: 768px) {
            .other-members-carousel-wrapper {
                padding: 0 55px;
            }
            .other-member-card {
                flex: 0 0 calc(50% - 0.75rem);
            }
            .other-carousel-btn {
                width: 45px;
                height: 45px;
                font-size: 1.25rem;
            }
            .other-member-card img {
                height: 240px;
            }
        }
        @media (max-width: 480px) {
            .other-member-card {
                flex: 0 0 100%;
            }
            .other-members-carousel-wrapper {
                padding: 0 45px;
            }
            .other-carousel-btn {
                width: 40px;
                height: 40px;
                font-size: 1.125rem;
            }
        }
    </style>

    <script>
        (function(){
            // Function to safely update text content
            function updateText(id, text) {
                const el = document.getElementById(id);
                if (el && text) {
                    el.textContent = text;
                }
            }

            // Function to safely update image
            function updateImage(id, imageUrl) {
                const el = document.getElementById(id);
                if (el && imageUrl) {
                    el.src = imageUrl;
                }
            }

            // Load all about sections
            async function loadAboutContent() {
                try {
                    // Load Hero Section
                    const heroResponse = await fetch('/api/about-sections?section_key=hero');
                    if (heroResponse.ok) {
                        const hero = await heroResponse.json();
                        if (hero) {
                            updateText('aboutHeroTitle', hero.title);
                            updateText('aboutHeroSubtitle', hero.subtitle ? `"${hero.subtitle}"` : null);
                            updateText('aboutHeroSubtitle2', hero.content ? `"${hero.content}"` : null);
                        }
                    }

                    // Load History Section
                    const historyResponse = await fetch('/api/about-sections?section_key=history');
                    if (historyResponse.ok) {
                        const history = await historyResponse.json();
                        if (history) {
                            updateText('historyContent1', history.content);
                            updateText('historyContent2', history.content_2);
                        }
                    }

                    // Load Mission Section
                    const missionResponse = await fetch('/api/about-sections?section_key=mission');
                    if (missionResponse.ok) {
                        const mission = await missionResponse.json();
                        if (mission) {
                            updateText('missionTitle', mission.title);
                            updateText('missionContent', mission.content);
                            if (mission.image_url) {
                                updateImage('missionVisionImage', mission.image_url);
                            }
                        }
                    }

                    // Load Vision Section
                    const visionResponse = await fetch('/api/about-sections?section_key=vision');
                    if (visionResponse.ok) {
                        const vision = await visionResponse.json();
                        if (vision) {
                            updateText('visionTitle', vision.title);
                            updateText('visionContent', vision.content);
                            // Vision image can also update the center image if mission doesn't have one
                        }
                    }

                    // Load custom section titles FIRST (before loading members)
                    await loadSectionTitles();
                    
                    // Load Team Members (Founders & Chairmen)
                    await loadTeamMembers();
                    
                    // Load Other Members
                    await loadOtherMembers();

                } catch (error) {
                    console.error('Error loading about content:', error);
                }
            }

            // Load content on page load
            loadAboutContent();

            // Listen for updates from dashboard
            window.addEventListener('storage', function(e) {
                if (e.key === 'refreshAboutPage') {
                    loadAboutContent();
                }
            });

            // Reload every 30 seconds to catch updates
            setInterval(loadAboutContent, 30000);

            // Store custom titles globally
            let customTitles = {
                founder: 'বোর্ড মেম্বার',
                chairman: 'আমাদের চেয়ারম্যান'
            };
            
            // Load Other Members - Slider
            let otherMembers = [];
            let currentOtherIndex = 0;
            let isDraggingOther = false;
            let startXOther = 0;
            let currentTranslateOther = 0;
            
            async function loadOtherMembers() {
                try {
                    const response = await fetch('/api/team-members?type=other');
                    if (response.ok) {
                        otherMembers = await response.json();
                        renderOtherMembers();
                        initOtherCarousel();
                    }
                } catch (error) {
                    console.error('Error loading other members:', error);
                }
            }
            
            // Render other members
            function renderOtherMembers() {
                const track = document.getElementById('otherMembersTrack');
                const titleEl = document.getElementById('other-members-title');
                
                if (!track) return;
                
                track.innerHTML = '';
                
                if (otherMembers.length === 0) {
                    track.innerHTML = '<p style="text-align:center; padding:3rem; color:#6b7280; width:100%;">কোনো সদস্য নেই</p>';
                    if (titleEl) titleEl.style.display = 'none';
                    return;
                }
                
                if (titleEl) titleEl.style.display = 'block';
                
                otherMembers.forEach((member) => {
                    const card = document.createElement('div');
                    card.className = 'other-member-card';
                    
                    card.innerHTML = `
                        <img src="${member.image_url || 'https://via.placeholder.com/300x280?text=No+Image'}" 
                             alt="${member.name || 'Member'}" 
                             onerror="this.src='https://via.placeholder.com/300x280?text=Image+Not+Found'"
                             draggable="false">
                        <div class="other-member-card-content">
                            <h4>${member.name || ''}</h4>
                            <p>${member.position || ''}</p>
                        </div>
                    `;
                    
                    track.appendChild(card);
                });
            }
            
            // Initialize other members carousel
            function initOtherCarousel() {
                const track = document.getElementById('otherMembersTrack');
                const container = track?.parentElement;
                const prevBtn = document.getElementById('otherPrevBtn');
                const nextBtn = document.getElementById('otherNextBtn');
                
                if (!track || !container) return;
                
                function getVisibleCount() {
                    const w = window.innerWidth;
                    if (w <= 480) return 1;
                    if (w <= 768) return 2;
                    if (w <= 1200) return 3;
                    return 4;
                }
                
                function updateButtons() {
                    const visible = getVisibleCount();
                    const maxIndex = Math.max(0, otherMembers.length - visible);
                    
                    if (otherMembers.length <= visible) {
                        if (prevBtn) prevBtn.style.display = 'none';
                        if (nextBtn) nextBtn.style.display = 'none';
                    } else {
                        if (prevBtn) {
                            prevBtn.style.display = 'flex';
                            prevBtn.disabled = currentOtherIndex === 0;
                        }
                        if (nextBtn) {
                            nextBtn.style.display = 'flex';
                            nextBtn.disabled = currentOtherIndex >= maxIndex;
                        }
                    }
                }
                
                function updatePosition() {
                    const card = track.querySelector('.other-member-card');
                    if (!card) return;
                    
                    const cardWidth = card.offsetWidth;
                    const gap = 24;
                    const translateX = -currentOtherIndex * (cardWidth + gap);
                    
                    track.style.transform = `translateX(${translateX}px)`;
                    updateButtons();
                }
                
                function nextSlide() {
                    const visible = getVisibleCount();
                    const maxIndex = Math.max(0, otherMembers.length - visible);
                    if (currentOtherIndex < maxIndex) {
                        currentOtherIndex++;
                        updatePosition();
                    }
                }
                
                function prevSlide() {
                    if (currentOtherIndex > 0) {
                        currentOtherIndex--;
                        updatePosition();
                    }
                }
                
                function getPositionX(e) {
                    return e.type.includes('mouse') ? e.pageX : e.touches[0].clientX;
                }
                
                function dragStart(e) {
                    if (otherMembers.length <= getVisibleCount()) return;
                    isDraggingOther = true;
                    startXOther = getPositionX(e);
                    container.style.cursor = 'grabbing';
                    track.classList.add('dragging');
                }
                
                function dragMove(e) {
                    if (!isDraggingOther) return;
                    e.preventDefault();
                    const currentX = getPositionX(e);
                    const diff = currentX - startXOther;
                    const card = track.querySelector('.other-member-card');
                    if (!card) return;
                    const cardWidth = card.offsetWidth;
                    const gap = 24;
                    const baseTranslate = -currentOtherIndex * (cardWidth + gap);
                    currentTranslateOther = baseTranslate + diff;
                    track.style.transform = `translateX(${currentTranslateOther}px)`;
                }
                
                function dragEnd() {
                    if (!isDraggingOther) return;
                    isDraggingOther = false;
                    container.style.cursor = 'grab';
                    track.classList.remove('dragging');
                    
                    const card = track.querySelector('.other-member-card');
                    if (!card) return;
                    const cardWidth = card.offsetWidth;
                    const gap = 24;
                    const baseTranslate = -currentOtherIndex * (cardWidth + gap);
                    const movedBy = currentTranslateOther - baseTranslate;
                    const threshold = cardWidth * 0.3;
                    
                    if (movedBy < -threshold && currentOtherIndex < Math.max(0, otherMembers.length - getVisibleCount())) {
                        nextSlide();
                    } else if (movedBy > threshold && currentOtherIndex > 0) {
                        prevSlide();
                    } else {
                        updatePosition();
                    }
                }
                
                if (prevBtn) prevBtn.onclick = prevSlide;
                if (nextBtn) nextBtn.onclick = nextSlide;
                
                container.addEventListener('mousedown', dragStart);
                document.addEventListener('mousemove', dragMove);
                document.addEventListener('mouseup', dragEnd);
                container.addEventListener('mouseleave', dragEnd);
                container.addEventListener('touchstart', dragStart, { passive: true });
                container.addEventListener('touchmove', dragMove, { passive: false });
                container.addEventListener('touchend', dragEnd);
                
                window.addEventListener('resize', () => {
                    const visible = getVisibleCount();
                    const maxIndex = Math.max(0, otherMembers.length - visible);
                    currentOtherIndex = Math.min(currentOtherIndex, maxIndex);
                    updatePosition();
                });
                
                updateButtons();
                updatePosition();
            }
            
            // Load custom section titles
            async function loadSectionTitles() {
                try {
                    // Load founder title
                    const founderTitleResponse = await fetch('/api/about-sections?section_key=founder_title');
                    if (founderTitleResponse.ok) {
                        const founderTitleData = await founderTitleResponse.json();
                        if (founderTitleData && founderTitleData.title) {
                            customTitles.founder = founderTitleData.title;
                            const foundersTitleEl = document.getElementById('founders-title');
                            if (foundersTitleEl) {
                                foundersTitleEl.textContent = founderTitleData.title;
                            }
                        }
                    }
                    
                    // Load chairman title
                    const chairmanTitleResponse = await fetch('/api/about-sections?section_key=chairman_title');
                    if (chairmanTitleResponse.ok) {
                        const chairmanTitleData = await chairmanTitleResponse.json();
                        if (chairmanTitleData && chairmanTitleData.title) {
                            customTitles.chairman = chairmanTitleData.title;
                            const chairmenTitleEl = document.getElementById('chairmen-title');
                            if (chairmenTitleEl) {
                                chairmenTitleEl.textContent = chairmanTitleData.title;
                            }
                        }
                    }
                    
                    // Load other members title
                    const otherTitleResponse = await fetch('/api/about-sections?section_key=other_title');
                    if (otherTitleResponse.ok) {
                        const otherTitleData = await otherTitleResponse.json();
                        if (otherTitleData && otherTitleData.title) {
                            const otherTitleEl = document.getElementById('other-members-title');
                            if (otherTitleEl) {
                                otherTitleEl.textContent = otherTitleData.title;
                            }
                        }
                    }
                } catch (error) {
                    console.error('Error loading section titles:', error);
                }
            }
            
            // Load Team Members (Founders & Chairmen)
            async function loadTeamMembers() {
                try {
                    // Load Founders
                    const foundersResponse = await fetch('/api/team-members?type=founder');
                    if (foundersResponse.ok) {
                        const founders = await foundersResponse.json();
                        renderTeamMembers('founder', founders);
                    }

                    // Load Chairmen
                    const chairmenResponse = await fetch('/api/team-members?type=chairman');
                    if (chairmenResponse.ok) {
                        const chairmen = await chairmenResponse.json();
                        renderTeamMembers('chairman', chairmen);
                    }
                } catch (error) {
                    console.error('Error loading team members:', error);
                }
            }

            // Render team members
            function renderTeamMembers(type, members) {
                const container = document.getElementById(`${type}s-container`);
                const titleEl = document.getElementById(`${type}s-title`);
                
                if (!container) return;

                if (members.length === 0) {
                    if (type === 'founder') {
                        container.innerHTML = '';
                    } else {
                        titleEl.style.display = 'none';
                        container.innerHTML = '';
                    }
                    return;
                }

                if (type === 'chairman') {
                    titleEl.style.display = 'block';
                }

                container.innerHTML = '';

                members.forEach((member, index) => {
                    const memberCard = createTeamMemberCard(member, type, index);
                    container.appendChild(memberCard);
                });
            }

            // Create team member card
            function createTeamMemberCard(member, type, index) {
                const section = document.createElement('section');
                section.className = 'container my-5';

                // First item (index 0) always has image on left, subsequent items alternate
                const isEven = index % 2 === 0;
                const typeLabel = customTitles[type] || (type === 'founder' ? 'বোর্ড মেম্বার' : 'আমাদের চেয়ারম্যান');

                section.innerHTML = `
                    <div class="row align-items-stretch bg-light p-4 rounded-4 shadow-sm ${!isEven ? 'flex-lg-row-reverse' : ''}">
                        <!-- ${isEven ? 'Left' : 'Right'} Side: Image -->
                        <div class="col-lg-6 mb-4 mb-lg-0">
                            <img src="${member.image_url || 'https://via.placeholder.com/800x600?text=No+Image'}"
                                alt="${member.name || typeLabel}"
                                class="img-fluid rounded w-100 h-100"
                                style="max-height: 500px; object-fit: cover; box-shadow: 0 10px 25px rgba(0,0,0,0.2);"
                                onerror="this.src='https://via.placeholder.com/800x600?text=Image+Not+Found'">
                        </div>

                        <!-- ${isEven ? 'Right' : 'Left'} Side: Info -->
                        <div class="col-lg-6 d-flex flex-column justify-content-center text-start" style="max-height: 500px; overflow-y: auto;">
                            <h5 class="text-success fw-bold mb-3">${typeLabel}</h5>
                            
                            ${member.content ? `<p class="fs-6 lh-lg text-secondary mb-3">${member.content}</p>` : ''}
                            ${member.content_2 ? `<p class="fs-6 lh-lg text-secondary mb-3">${member.content_2}</p>` : ''}
                            ${member.content_3 ? `<p class="fs-6 lh-lg text-secondary mb-${type === 'chairman' ? '4' : '0'}">${member.content_3}</p>` : ''}
                            
                            <h${type === 'founder' ? '3' : '4'} class="fw-semibold text-dark mb-1">${member.name || ''}</h${type === 'founder' ? '3' : '4'}>
                            <p class="text-primary fs-6 mb-${type === 'chairman' ? '1' : '3'}">${member.position || ''}</p>
                            ${type === 'chairman' ? '<p class="fs-6 text-secondary">জলজোছনা</p>' : ''}
                        </div>
                    </div>
                `;

                return section;
            }

            // Load team members on page load
            loadTeamMembers();
        })();
    </script>
@endsection
