 <section id="other-projects" class="other-projects">
    <style>
        /* Modern professional card styling */
        #other-projects .carousel-wrapper { 
            position: relative; 
            max-width: 1400px; 
            margin: 0 auto; 
            padding: 0 60px; 
        }
        #other-projects .carousel-container { 
            overflow: hidden; 
            padding: 20px 0;
            user-select: none;
        }
        
        #other-projects .carousel-container.can-drag {
            cursor: grab;
        }
        
        #other-projects .carousel-container.can-drag:active {
            cursor: grabbing;
        }
        
        #other-projects .carousel-container.dragging {
            cursor: grabbing;
        }
        
        #other-projects .carousel-container.dragging .project-card {
            pointer-events: none;
        }
        
        #other-projects .carousel-container.disabled {
            cursor: default;
        }
        
        #other-projects .carousel-track { 
            display: flex; 
            gap: 24px; 
            transition: transform 500ms cubic-bezier(0.4, 0, 0.2, 1);
            will-change: transform;
        }
        
        #other-projects .carousel-track.no-transition {
            transition: none;
        }
        
        #other-projects .carousel-track.smooth-transition {
            transition: transform 600ms cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        /* Modern card styles - Smaller size */
        #other-projects .project-card { 
            flex: 0 0 280px;
            min-width: 280px;
            background: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            position: relative;
            border: 2px solid transparent;
        }
        
        #other-projects .project-card::before {
            content: '';
            position: absolute;
            inset: -2px;
            border-radius: 16px;
            padding: 2px;
            background: linear-gradient(135deg, #0a4d2e, #d4af37, #0a4d2e);
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0;
            transition: opacity 0.4s ease;
        }
        
        #other-projects .project-card:hover::before {
            opacity: 1;
            animation: borderRotate 3s linear infinite;
        }
        
        @keyframes borderRotate {
            0% {
                background: linear-gradient(135deg, #0a4d2e, #d4af37, #0a4d2e);
            }
            25% {
                background: linear-gradient(225deg, #d4af37, #0a4d2e, #d4af37);
            }
            50% {
                background: linear-gradient(315deg, #0a4d2e, #d4af37, #0a4d2e);
            }
            75% {
                background: linear-gradient(45deg, #d4af37, #0a4d2e, #d4af37);
            }
            100% {
                background: linear-gradient(135deg, #0a4d2e, #d4af37, #0a4d2e);
            }
        }
        
        #other-projects .project-card:hover { 
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 20px 50px rgba(10, 77, 46, 0.25), 
                        0 0 40px rgba(212, 175, 55, 0.2);
        }
        
        #other-projects .project-image { 
            width: 100%; 
            height: 180px; 
            background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 100%);
            background-size: cover; 
            background-position: center;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
        }
        
        #other-projects .project-image::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                45deg,
                transparent 30%,
                rgba(212, 175, 55, 0.3) 50%,
                transparent 70%
            );
            transform: rotate(45deg);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 2;
        }
        
        #other-projects .project-card:hover .project-image::before {
            opacity: 1;
            animation: shimmer 2s ease-in-out infinite;
        }
        
        @keyframes shimmer {
            0% {
                transform: translateX(-100%) translateY(-100%) rotate(45deg);
            }
            100% {
                transform: translateX(100%) translateY(100%) rotate(45deg);
            }
        }
        
        #other-projects .project-image::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 80px;
            background: linear-gradient(to top, rgba(0,0,0,0.6), transparent);
            z-index: 1;
            transition: height 0.4s ease;
        }
        
        #other-projects .project-card:hover .project-image::after {
            height: 100px;
            background: linear-gradient(to top, rgba(10, 77, 46, 0.7), transparent);
        }
        
        #other-projects .project-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease, filter 0.4s ease;
            position: absolute;
            top: 0;
            left: 0;
        }
        
        #other-projects .project-card:hover .project-image img {
            transform: scale(1.1) rotate(1deg);
            filter: brightness(1.1) contrast(1.05);
        }
        
        #other-projects .project-content { 
            padding: 20px;
            position: relative;
        }
        
        #other-projects .project-card:hover .project-content {
            animation: contentGlow 1.5s ease-in-out infinite;
        }
        
        @keyframes contentGlow {
            0%, 100% {
                text-shadow: 0 0 5px rgba(10, 77, 46, 0);
            }
            50% {
                text-shadow: 0 0 10px rgba(212, 175, 55, 0.3);
            }
        }
        
        #other-projects .project-content h3 { 
            font-size: 17px; 
            line-height: 1.4; 
            font-weight: 700; 
            color: #0a4d2e;
            margin-bottom: 10px;
            letter-spacing: -0.2px;
            transition: all 0.3s ease;
        }
        
        #other-projects .project-card:hover .project-content h3 {
            color: #0d6639;
            transform: translateX(4px);
        }
        
        #other-projects .project-content p { 
            font-size: 13px; 
            line-height: 1.6; 
            color: #64748b;
            margin-bottom: 16px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            transition: color 0.3s ease;
        }
        
        #other-projects .project-card:hover .project-content p {
            color: #475569;
        }
        
        #other-projects .project-content .btn { 
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: linear-gradient(135deg, #0a4d2e 0%, #d4af37 50%, #0a4d2e 100%);
            background-size: 200% 100%;
            background-position: 0% 0%;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 13px;
            text-decoration: none;
            transition: all 0.4s ease;
            box-shadow: 0 3px 10px rgba(10, 77, 46, 0.25);
            position: relative;
            overflow: hidden;
        }
        
        #other-projects .project-content .btn::after {
            content: '→';
            position: absolute;
            right: 20px;
            opacity: 0;
            transform: translateX(-10px);
            transition: all 0.3s ease;
        }
        
        #other-projects .project-content .btn:hover { 
            background-position: 100% 0%;
            transform: translateX(4px) scale(1.05);
            box-shadow: 0 6px 20px rgba(10, 77, 46, 0.4),
                        0 0 20px rgba(212, 175, 55, 0.3);
            padding-right: 40px;
        }
        
        #other-projects .project-content .btn:hover::after {
            opacity: 1;
            transform: translateX(0);
        }
        
        /* Slider Dots */
        #other-projects .slider-dots {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 12px;
            margin-top: 30px;
            padding: 20px 0;
        }
        
        #other-projects .slider-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #cbd5e1;
            border: 2px solid transparent;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }
        
        #other-projects .slider-dot:hover {
            background: #94a3b8;
            transform: scale(1.2);
        }
        
        #other-projects .slider-dot.active {
            background: #0a4d2e;
            width: 32px;
            border-radius: 6px;
            box-shadow: 0 0 0 4px rgba(10, 77, 46, 0.15);
        }
        
        #other-projects .slider-dot.active::after {
            content: '';
            position: absolute;
            inset: -6px;
            border-radius: 8px;
            border: 2px solid rgba(10, 77, 46, 0.3);
            animation: dotPulse 2s ease-in-out infinite;
        }
        
        @keyframes dotPulse {
            0%, 100% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(1.3);
                opacity: 0.5;
            }
        }

        /* Navigation buttons */
        #other-projects .carousel-btn { 
            position: absolute; 
            top: 50%; 
            transform: translateY(-50%); 
            background: #ffffff;
            color: #0a4d2e;
            border: 2px solid #e5e7eb;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 20px;
            font-weight: bold;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            z-index: 10;
        }
        
        #other-projects .carousel-btn:hover { 
            background: #0a4d2e;
            color: #ffffff;
            border-color: #0a4d2e;
            transform: translateY(-50%) scale(1.1);
            box-shadow: 0 6px 20px rgba(10, 77, 46, 0.3);
        }
        
        #other-projects .carousel-btn:disabled {
            opacity: 0.4;
            cursor: not-allowed;
            transform: translateY(-50%);
        }
        
        #other-projects .prev-btn { left: -25px; }
        #other-projects .next-btn { right: -25px; }

        /* Responsive */
        @media (max-width: 1024px) {
            #other-projects .carousel-wrapper { 
                padding: 0 50px;
            }
            #other-projects .project-card { 
                flex: 0 0 260px;
                min-width: 260px;
            }
            #other-projects .project-image { height: 170px; }
            #other-projects .carousel-btn { width: 45px; height: 45px; font-size: 18px; }
            #other-projects .prev-btn { left: 10px; }
            #other-projects .next-btn { right: 10px; }
        }
        
        @media (max-width: 768px) {
            #other-projects .carousel-wrapper { 
                padding: 0 35px;
                max-width: 100%;
            }
            #other-projects .carousel-container {
                border-radius: 16px;
            }
            #other-projects .project-card { 
                flex: 0 0 240px;
                min-width: 240px;
                border-radius: 14px;
            }
            #other-projects .project-image { height: 160px; }
            #other-projects .project-content { padding: 18px; }
            #other-projects .project-content h3 { font-size: 16px; }
            #other-projects .project-content p { font-size: 12px; }
            #other-projects .project-content .btn { 
                padding: 8px 16px;
                font-size: 12px;
            }
        }
        
        @media (max-width: 480px) {
            #other-projects .carousel-wrapper { 
                padding: 0 20px;
            }
            #other-projects .carousel-container {
                border-radius: 12px;
            }
            #other-projects .project-card { 
                flex: 0 0 220px;
                min-width: 220px;
                border-radius: 12px;
            }
            #other-projects .project-image { 
                height: 150px;
                font-size: 2.5rem;
            }
            #other-projects .project-content { padding: 16px; }
            #other-projects .project-content h3 { font-size: 15px; }
            #other-projects .project-content p { font-size: 11px; }
            #other-projects .project-content .btn { 
                padding: 8px 14px;
                font-size: 11px;
            }
            #other-projects .carousel-btn { width: 40px; height: 40px; font-size: 16px; }
            #other-projects .slider-dots { gap: 8px; margin-top: 20px; }
            #other-projects .slider-dot { width: 10px; height: 10px; }
            #other-projects .slider-dot.active { width: 24px; }
        }
        
        @media (max-width: 360px) {
            #other-projects .carousel-wrapper { 
                padding: 0 15px;
            }
            #other-projects .project-card { 
                flex: 0 0 200px;
                min-width: 200px;
            }
            #other-projects .carousel-btn { width: 36px; height: 36px; font-size: 14px; }
        }
    </style>

       <h2 class="section-title" id="otherProjectsTitle">অন্যান্য প্রকল্প</h2>
       <p class="section-subtitle" id="otherProjectsSubtitle">NEX Real Estate-এর সফল প্রকল্পগুলো দেখুন</p>

        <div class="carousel-wrapper">
            <button id="prevBtn" class="carousel-btn prev-btn">❮</button>
            <div class="carousel-container">
               <div id="projectTrack" class="carousel-track"></div>
            </div>
            <button id="nextBtn" class="carousel-btn next-btn">❯</button>
        </div>

    <!-- Slider Dots -->
    <div id="sliderDots" class="slider-dots"></div>

    <!-- See More Button -->
    <div style="text-align: center; margin-top: 2rem;">
            <a href="/projects" class="btn btn-primary">আরও দেখুন</a>
        </div>
        <script>
            (function(){
                const track = document.getElementById('projectTrack');
                const container = track.parentElement;
                const prevBtn = document.getElementById('prevBtn');
                const nextBtn = document.getElementById('nextBtn');
                const dotsContainer = document.getElementById('sliderDots');
                let currentIndex = 0;
                let projects = [];
                
                // Mouse drag variables
                let isDragging = false;
                let startPos = 0;
                let currentTranslate = 0;
                let prevTranslate = 0;
                let animationID = 0;
                let currentPosition = 0;
                
                // Load projects from database
                async function loadProjects() {
                    try {
                        const response = await fetch('/api/our-projects');
                        if (response.ok) {
                            const allProjects = await response.json();
                            // Get all projects (not limited to 4)
                            projects = allProjects;
                            console.log('Loaded projects for slider:', projects.length);
                            renderProjects();
                            updateCarouselState();
                            initDragFunctionality();
                        }
                    } catch (error) {
                        console.error('Error loading projects for slider:', error);
                        loadDefaultProjects();
                    }
                }
                
                // Fallback default projects
                function loadDefaultProjects() {
                    projects = [
                        {title:'শান্তি নিবাস', description:'শহরের ঠিক মাঝে আপনার শান্তির ঠিকানা। সব আধুনিক সুবিধা নিয়ে, ঢাকায় এক নতুন, বিলাসবহুল জীবন শুরু করুন।', cta_text:'বিস্তারিত জানুন', cta_link:'#contact', image_url:''},
                        {title:'সবুজ ভিটা', description:'নদীর একদম পাশে, যেখানে আপনি পাবেন নির্মল শান্তি। প্রকৃতির কাছাকাছি একটি নির্ভেজাল ও সুন্দর জীবন।', cta_text:'বিস্তারিত জানুন', cta_link:'#contact', image_url:''},
                        {title:'প্রত্যাশা টাওয়ার', description:'খুলনার সেরা লোকেশনে আপনার ব্যবসার জন্য সেরা অফিস স্পেস। এখানে বিনিয়োগ মানেই উজ্জ্বল ভবিষ্যৎ!', cta_text:'বিস্তারিত জানুন', cta_link:'#contact', image_url:''},
                        {title:'নির্মাণ প্লাজা', description:'ব্যস্ত শহরের কেন্দ্রে আধুনিক এবং পরিবেশ-বান্ধব বাণিজ্যিক স্থান। ব্যবসা বাড়ানোর জন্য আদর্শ বিনিয়োগ।', cta_text:'বিস্তারিত জানুন', cta_link:'#contact', image_url:''}
                    ];
                    renderProjects();
                    updateCarouselState();
                    initDragFunctionality();
                }
                
                function renderProjects() {
                    track.innerHTML = '';
                    projects.forEach((project, index) => {
                        const card = document.createElement('div');
                        card.className = 'project-card';
                        
                        // Create image element
                        let imageContent = '';
                        if (project.image_url) {
                            imageContent = `<img src="${project.image_url}" alt="${project.title}">`;
                        } else if (project.image_path) {
                            imageContent = `<img src="/storage/${project.image_path}" alt="${project.title}">`;
                        } else {
                            const icons = ['🏙️', '🏡', '🏢', '🏗️'];
                            imageContent = icons[index % icons.length];
                        }
                        
                        card.innerHTML = `
                            <div class="project-image">${imageContent}</div>
                            <div class="project-content">
                                <h3>${project.title || 'Untitled Project'}</h3>
                                <p>${project.description || ''}</p>
                                <a href="${project.cta_link || '#contact'}" class="btn btn-primary">${project.cta_text || 'বিস্তারিত জানুন'}</a>
                            </div>`;
                        track.appendChild(card);
                    });
                    
                    // Render dots
                    renderDots();
                }
                
                function renderDots() {
                    if (!dotsContainer) return;
                    dotsContainer.innerHTML = '';
                    
                    // Calculate number of slides (showing 4 cards at a time)
                    const numSlides = Math.max(1, projects.length - 3);
                    
                    for (let i = 0; i < numSlides; i++) {
                        const dot = document.createElement('div');
                        dot.className = 'slider-dot';
                        if (i === currentIndex) {
                            dot.classList.add('active');
                        }
                        dot.setAttribute('data-index', i);
                        dot.setAttribute('aria-label', `Slide ${i + 1}`);
                        dot.addEventListener('click', () => {
                            currentIndex = i;
                            updateCarousel();
                        });
                        dotsContainer.appendChild(dot);
                    }
                }
                
                function updateDots() {
                    if (!dotsContainer) return;
                    const dots = dotsContainer.querySelectorAll('.slider-dot');
                    dots.forEach((dot, index) => {
                        if (index === currentIndex) {
                            dot.classList.add('active');
                        } else {
                            dot.classList.remove('active');
                        }
                    });
                }
                
                // Initialize drag functionality
                function initDragFunctionality() {
                    // Only enable drag if more than 4 projects
                    if (projects.length <= 4) {
                        container.classList.remove('can-drag');
                        container.classList.add('disabled');
                        return;
                    }
                    
                    container.classList.add('can-drag');
                    container.classList.remove('disabled');
                    
                    // Mouse events
                    container.addEventListener('mousedown', dragStart);
                    container.addEventListener('mousemove', drag);
                    container.addEventListener('mouseup', dragEnd);
                    container.addEventListener('mouseleave', dragEnd);
                    
                    // Touch events
                    container.addEventListener('touchstart', dragStart);
                    container.addEventListener('touchmove', drag);
                    container.addEventListener('touchend', dragEnd);
                    
                    // Prevent context menu
                    container.addEventListener('contextmenu', e => e.preventDefault());
                }
                
                function dragStart(e) {
                    if (projects.length <= 4) return; // Don't allow drag if 4 or less
                    
                    isDragging = true;
                    startPos = getPositionX(e);
                    animationID = requestAnimationFrame(animation);
                    container.classList.add('dragging');
                    track.classList.add('no-transition');
                }
                
                function drag(e) {
                    if (isDragging) {
                        const currentPosition = getPositionX(e);
                        const newTranslate = prevTranslate + currentPosition - startPos;
                        
                        // Calculate boundaries
                        const maxTranslate = 0;
                        const minTranslate = -(projects.length - 4) * (304); // 280px card + 24px gap
                        
                        // Keep within boundaries
                        currentTranslate = Math.max(Math.min(newTranslate, maxTranslate), minTranslate);
                    }
                }
                
                function dragEnd() {
                    if (!isDragging) return;
                    
                    isDragging = false;
                    cancelAnimationFrame(animationID);
                    container.classList.remove('dragging');
                    track.classList.remove('no-transition');
                    track.classList.add('smooth-transition');
                    
                    const movedBy = currentTranslate - prevTranslate;
                    
                    // Snap to nearest card (threshold: 80px)
                    if (movedBy < -80 && currentIndex < projects.length - 4) {
                        currentIndex++;
                    } else if (movedBy > 80 && currentIndex > 0) {
                        currentIndex--;
                    }
                    
                    setPositionByIndex();
                    updateCarouselButtons();
                    updateDots();
                    
                    setTimeout(() => {
                        track.classList.remove('smooth-transition');
                    }, 600);
                }
                
                function getPositionX(e) {
                    return e.type.includes('mouse') ? e.pageX : e.touches[0].clientX;
                }
                
                function animation() {
                    setSliderPosition();
                    if (isDragging) requestAnimationFrame(animation);
                }
                
                function setSliderPosition() {
                    track.style.transform = `translateX(${currentTranslate}px)`;
                }
                
                function setPositionByIndex() {
                    const cardWidth = track.querySelector('.project-card')?.offsetWidth || 0;
                    const gap = 24;
                    currentTranslate = -currentIndex * (cardWidth + gap);
                    prevTranslate = currentTranslate;
                    setSliderPosition();
                }
                
                function updateCarouselState() {
                    updateCarouselButtons();
                    updateDots();
                    
                    // Hide dots if 4 or less projects
                    if (dotsContainer) {
                        dotsContainer.style.display = projects.length > 4 ? 'flex' : 'none';
                    }
                }
                
                function updateCarouselButtons() {
                    const maxIndex = Math.max(0, projects.length - 4);
                    
                    prevBtn.disabled = currentIndex === 0;
                    nextBtn.disabled = currentIndex >= maxIndex;
                    
                    // Hide buttons if 4 or less projects
                    if (projects.length <= 4) {
                        prevBtn.style.display = 'none';
                        nextBtn.style.display = 'none';
                    } else {
                        prevBtn.style.display = 'flex';
                        nextBtn.style.display = 'flex';
                    }
                }
                
                function updateCarousel() {
                    track.classList.add('smooth-transition');
                    setPositionByIndex();
                    updateCarouselButtons();
                    updateDots();
                    
                    setTimeout(() => {
                        track.classList.remove('smooth-transition');
                    }, 600);
                }
                
                // Button navigation
                prevBtn.addEventListener('click', () => {
                    if (currentIndex > 0) {
                        currentIndex--;
                        updateCarousel();
                    }
                });
                
                nextBtn.addEventListener('click', () => {
                    const maxIndex = Math.max(0, projects.length - 4);
                    if (currentIndex < maxIndex) {
                        currentIndex++;
                        updateCarousel();
                    }
                });
                
                // Resize handler
                window.addEventListener('resize', () => {
                    setPositionByIndex();
                });
                
                // Load projects on page load
                loadProjects();
                
                // Listen for updates
                window.addEventListener('storage', (e) => {
                    if (e.key === 'refreshOurProjects') {
                        loadProjects();
                    }
                });
                
                // Reload every 30 seconds
                setInterval(loadProjects, 30000);
            })();
        </script>
    </section>

<script>
(function(){
    const defaults = {
        sectionTitle: 'অন্যান্য প্রকল্প',
        sectionSubtitle: 'NEX Real Estate-এর সফল প্রকল্পগুলো দেখুন',
        projects: [
            {
                image: '🏙️',
                title: 'শান্তি নিবাস',
                desc: 'শহরের ঠিক মাঝে আপনার শান্তির ঠিকানা। সব আধুনিক সুবিধা নিয়ে, ঢাকায় এক নতুন, বিলাসবহুল জীবন শুরু করুন।',
                btnText: 'বিস্তারিত জানুন',
                btnLink: '#contact'
            },
            {
                image: '🏡',
                title: 'সবুজ ভিটা',
                desc: 'নদীর একদম পাশে, যেখানে আপনি পাবেন নির্মল শান্তি। প্রকৃতির কাছাকাছি একটি নির্ভেজাল ও সুন্দর জীবন।',
                btnText: 'বিস্তারিত জানুন',
                btnLink: '#contact'
            },
            {
                image: '🏢',
                title: 'প্রত্যাশা টাওয়ার',
                desc: 'খুলনার সেরা লোকেশনে আপনার ব্যবসার জন্য সেরা অফিস স্পেস। এখানে বিনিয়োগ মানেই উজ্জ্বল ভবিষ্যৎ!',
                btnText: 'বিস্তারিত জানুন',
                btnLink: '#contact'
            },
            {
                image: '🏗️',
                title: 'নির্মাণ প্লাজা',
                desc: 'ব্যস্ত শহরের কেন্দ্রে আধুনিক এবং পরিবেশ-বান্ধব বাণিজ্যিক স্থান। ব্যবসা বাড়ানোর জন্য আদর্শ বিনিয়োগ।',
                btnText: 'বিস্তারিত জানুন',
                btnLink: '#contact'
            }
        ]
    };

    const el = {
        title: document.getElementById('otherProjectsTitle'),
        subtitle: document.getElementById('otherProjectsSubtitle'),
        cards: [
            document.getElementById('otherProjCard1'),
            document.getElementById('otherProjCard2'),
            document.getElementById('otherProjCard3'),
            document.getElementById('otherProjCard4')
        ]
    };

    function read(){
        try{ return JSON.parse(localStorage.getItem('otherProjectsSettings')||'{}'); }catch(e){ return {}; }
    }

    function apply(){
        const saved = read();
        const s = { ...defaults, ...saved };

        if (el.title) el.title.textContent = s.sectionTitle;
        if (el.subtitle) el.subtitle.textContent = s.sectionSubtitle;

        s.projects.forEach((p, i) => {
            if (el.cards[i]) {
                el.cards[i].innerHTML = `
                    <div class="project-image">${p.image}</div>
                    <div class="project-content">
                        <h3>${p.title}</h3>
                        <p>${p.desc}</p>
                        <a href="${p.btnLink}" class="btn btn-primary" style="padding: 0.8rem 2rem; font-size: 1rem;">${p.btnText}</a>
                    </div>
                `;
            }
        });
    }

    apply();
    window.addEventListener('storage', (e)=>{ if(e.key==='otherProjectsSettings'){ apply(); } });
    let last = localStorage.getItem('otherProjectsSettings');
    setInterval(()=>{ const cur = localStorage.getItem('otherProjectsSettings'); if(cur!==last){ last=cur; apply(); } }, 1000);
})();
</script>

