   <section id="testimonials" class="testimonials">
        <h2 id="testimonialsTitle" class="section-title testimonials-title">বিনিয়োগকারী মন্তব্য</h2>
        <p id="testimonialsSubtitle" class="section-subtitle testimonials-subtitle">আমাদের গ্রাহকরা আমাদের প্রকল্প সম্পর্কে কী বলেন</p>

        <div class="carousel-wrapper">
            <button id="prevTestimonialBtn" class="carousel-btn prev-btn">❮</button>
            <div class="carousel-container">
                <div id="testimonialTrack" class="carousel-track">
                    <!-- Testimonials will be loaded dynamically from database -->
                </div>
            </div>
            <button id="nextTestimonialBtn" class="carousel-btn next-btn">❯</button>
        </div>
        <div id="testimonialDots" class="carousel-dots"></div>

        <script>
            (function(){
                const track = document.getElementById('testimonialTrack');
                const prevBtn = document.getElementById('prevTestimonialBtn');
                const nextBtn = document.getElementById('nextTestimonialBtn');
                const dotsContainer = document.getElementById('testimonialDots');
                const carouselWrapper = document.querySelector('.carousel-wrapper');
                
                let currentIndex = 0;
                let testimonials = [];
                let autoSlideInterval = null;
                let isDragging = false;
                let startPos = 0;
                let currentTranslate = 0;
                let prevTranslate = 0;

                async function loadTestimonials() {
                    try {
                        const response = await fetch('/api/testimonials');
                        testimonials = await response.json();
                        renderTestimonials();
                        initCarousel();
                    } catch (error) {
                        console.error('Error loading testimonials:', error);
                    }
                }

                function renderTestimonials() {
                    if (!track) return;
                    
                    track.innerHTML = '';
                    
                    if (testimonials.length === 0) {
                        track.innerHTML = '<div class="testimonial-card"><p style="text-align:center; padding:2rem;">কোন মন্তব্য পাওয়া যায়নি</p></div>';
                        return;
                    }

                    testimonials.forEach((testimonial, index) => {
                        const card = document.createElement('div');
                        card.className = 'testimonial-card';
                        card.dataset.testimonialIndex = index;
                        
                        // Only show avatar section if image exists
                        let investorMetaHtml = '';
                        if (testimonial.image_url) {
                            investorMetaHtml = `
                                <div class="investor-meta">
                                    <div class="investor-image-wrapper">
                                        <img src="${testimonial.image_url}" class="investor-avatar-image" onerror="this.style.display='none';" />
                                    </div>
                                    <div class="investor-info">
                                        <div class="investor-name">${testimonial.name || ''}</div>
                                        <div class="investor-title">${testimonial.title || ''}</div>
                                    </div>
                                </div>
                            `;
                            card.classList.add('has-avatar');
                        } else {
                            card.classList.add('no-avatar');
                        }
                        
                        card.innerHTML = `
                            ${investorMetaHtml}
                            <div class="quote-content-wrapper">
                                <div class="quote-icon">"</div>
                                ${!testimonial.image_url ? `
                                    <div class="testimonial-header">
                                    <div class="investor-name">${testimonial.name || ''}</div>
                                    <div class="investor-title">${testimonial.title || ''}</div>
                                </div>
                                ` : ''}
                                <p class="quote-text">${testimonial.quote || ''}</p>
                            </div>
                        `;
                        track.appendChild(card);
                    });
                    
                    renderDots();
                }

                function renderDots() {
                    if (!dotsContainer || testimonials.length <= 1) {
                        if (dotsContainer) dotsContainer.style.display = 'none';
                        return;
                    }
                    
                    dotsContainer.style.display = 'flex';
                    dotsContainer.innerHTML = '';
                    
                    testimonials.forEach((_, index) => {
                        const dot = document.createElement('button');
                        dot.className = 'carousel-dot' + (index === currentIndex ? ' active' : '');
                        dot.setAttribute('aria-label', `Go to slide ${index + 1}`);
                        dot.onclick = () => goToSlide(index);
                        dotsContainer.appendChild(dot);
                    });
                }

                function updateDots() {
                    if (!dotsContainer) return;
                    const dots = dotsContainer.querySelectorAll('.carousel-dot');
                    dots.forEach((dot, index) => {
                        dot.classList.toggle('active', index === currentIndex);
                    });
                }

                function updateCarousel(smooth = true) {
                    if (!track) return;
                    const cardWidth = track.querySelector('.testimonial-card')?.offsetWidth || 0;
                    const offset = -currentIndex * cardWidth;
                    
                    if (smooth) {
                        track.style.transition = 'transform 0.5s cubic-bezier(0.4, 0, 0.2, 1)';
                    } else {
                        track.style.transition = 'none';
                    }
                    
                    track.style.transform = `translateX(${offset}px)`;
                    updateDots();
                }

                function goToSlide(index) {
                    currentIndex = index;
                    updateCarousel();
                    resetAutoSlide();
                }

                function nextSlide() {
                    currentIndex = (currentIndex + 1) % testimonials.length;
                    updateCarousel();
                }

                function prevSlide() {
                    currentIndex = (currentIndex - 1 + testimonials.length) % testimonials.length;
                    updateCarousel();
                }

                function startAutoSlide() {
                    if (testimonials.length <= 1) return;
                    stopAutoSlide();
                    autoSlideInterval = setInterval(() => {
                        nextSlide();
                    }, 5000); // Auto-slide every 5 seconds
                }

                function stopAutoSlide() {
                    if (autoSlideInterval) {
                        clearInterval(autoSlideInterval);
                        autoSlideInterval = null;
                    }
                }

                function resetAutoSlide() {
                    stopAutoSlide();
                    startAutoSlide();
                }

                // Mouse drag functionality
                function getPositionX(event) {
                    return event.type.includes('mouse') ? event.pageX : event.touches[0].clientX;
                }

                function dragStart(event) {
                    if (testimonials.length <= 1) return;
                    isDragging = true;
                    startPos = getPositionX(event);
                    track.style.cursor = 'grabbing';
                    stopAutoSlide();
                }

                function dragMove(event) {
                    if (!isDragging) return;
                    event.preventDefault();
                    
                    const currentPosition = getPositionX(event);
                    const diff = currentPosition - startPos;
                    const cardWidth = track.querySelector('.testimonial-card')?.offsetWidth || 0;
                    const baseTranslate = -currentIndex * cardWidth;
                    
                    track.style.transition = 'none';
                    track.style.transform = `translateX(${baseTranslate + diff}px)`;
                }

                function dragEnd(event) {
                    if (!isDragging) return;
                    isDragging = false;
                    track.style.cursor = 'grab';
                    
                    const currentPosition = getPositionX(event);
                    const diff = currentPosition - startPos;
                    const threshold = 50; // Minimum drag distance to trigger slide
                    
                    if (Math.abs(diff) > threshold) {
                        if (diff > 0) {
                            prevSlide();
                        } else {
                            nextSlide();
                        }
                    } else {
                        updateCarousel();
                    }
                    
                    startAutoSlide();
                }

                function initCarousel() {
                    if (testimonials.length <= 1) {
                        if (prevBtn) prevBtn.style.display = 'none';
                        if (nextBtn) nextBtn.style.display = 'none';
                        if (dotsContainer) dotsContainer.style.display = 'none';
                        return;
                    }

                    if (prevBtn) prevBtn.style.display = 'block';
                    if (nextBtn) nextBtn.style.display = 'block';

                    if (prevBtn) {
                        prevBtn.onclick = () => {
                            prevSlide();
                            resetAutoSlide();
                        };
                    }

                    if (nextBtn) {
                        nextBtn.onclick = () => {
                            nextSlide();
                            resetAutoSlide();
                        };
                    }

                    // Mouse/Touch drag events
                    if (track) {
                        track.style.cursor = 'grab';
                        
                        // Mouse events
                        track.addEventListener('mousedown', dragStart);
                        track.addEventListener('mousemove', dragMove);
                        track.addEventListener('mouseup', dragEnd);
                        track.addEventListener('mouseleave', dragEnd);
                        
                        // Touch events
                        track.addEventListener('touchstart', dragStart, { passive: true });
                        track.addEventListener('touchmove', dragMove, { passive: false });
                        track.addEventListener('touchend', dragEnd);
                        
                        // Prevent default drag behavior
                        track.addEventListener('dragstart', (e) => e.preventDefault());
                    }

                    // Pause auto-slide on hover
                    if (carouselWrapper) {
                        carouselWrapper.addEventListener('mouseenter', stopAutoSlide);
                        carouselWrapper.addEventListener('mouseleave', startAutoSlide);
                    }

                    updateCarousel();
                    startAutoSlide();
                }

                loadTestimonials();
                
                // Reload testimonials every 30 seconds (reduced from 3 seconds)
                setInterval(loadTestimonials, 30000);
                
                document.addEventListener('visibilitychange', function() {
                    if (!document.hidden) {
                        loadTestimonials();
                        resetAutoSlide();
                    } else {
                        stopAutoSlide();
                    }
                });
                
                window.addEventListener('focus', () => {
                    loadTestimonials();
                    resetAutoSlide();
                });

                window.addEventListener('blur', stopAutoSlide);

                window.addEventListener('storage', function(e){
                    try{
                        if (e && e.key === 'refreshTestimonials') {
                            loadTestimonials();
                        }
                    }catch(err){ /* ignore */ }
                });
            })();
        </script>

    </section>