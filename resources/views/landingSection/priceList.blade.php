 <section id="pricing" class="pricing">
        <h2 class="section-title" id="pricingTitle">মূল্য তালিকা</h2>
        <p class="section-subtitle" id="pricingSubtitle">আপনার বাজেট অনুযায়ী নির্বাচন করুন</p>
        <style>
            /* Carousel styles scoped to #pricing */
            #pricing{padding: 6rem 5%}
            #pricing .carousel{position:relative; max-width:1400px; margin:0 auto; overflow:visible}
            #pricing .viewport{overflow:hidden}
            #pricing .track{display:flex; gap:12px; scroll-behavior:smooth;}
            #pricing .viewport{cursor:grab}
            #pricing .viewport.dragging{cursor:grabbing}
            /* Show 4 on desktop, 3 on large laptop, 2 on tablet, 1 on mobile */
            #pricing .track > .slide{min-width:calc(25% - 9px)}
            @media (max-width: 1280px){ #pricing .track > .slide{min-width:calc(33.333% - 8px)} }
            @media (max-width: 1024px){ #pricing .track > .slide{min-width:calc(50% - 6px)} }
            @media (max-width: 640px){ #pricing .track > .slide{min-width:100%} }

            /* Card refinement */
            #pricing .pricing-card{padding:1.25rem; border-radius:14px; box-shadow:0 8px 22px rgba(0,0,0,.08); transition:transform .25s ease, box-shadow .25s ease; text-align:left; display:flex; flex-direction:column; height:100%; min-height:390px; margin:24px 0 6px; padding-top:40px; padding-bottom:40px}
            #pricing .pricing-card:hover{transform:translateY(-6px); box-shadow:0 14px 34px rgba(0,0,0,.12)}
            #pricing .pricing-card h3{font-size:1.1rem; margin-top:6px; margin-bottom:.75rem}
            #pricing .pricing-card .price{font-size:1.6rem; margin-bottom:.5rem}
            #pricing .pricing-card .price-details{font-size:.9rem; margin-bottom:1rem}
            /* Slight indent for first three lines */
            #pricing .pricing-card h3,
            #pricing .pricing-card .price,
            #pricing .pricing-card .price-details{ padding-left:30px }
            #pricing .pricing-card .price-list{margin-top:6px; margin-bottom:1rem; flex-grow:1; padding-left:30px}
            #pricing .pricing-card .price-list li{font-size:.92rem; padding:.55rem 0}
            #pricing .pricing-card .btn{padding:.7rem 1.25rem; border-radius:10px; font-size:.95rem; margin-top:auto; align-self:flex-start; margin-bottom:30px; margin-left:30px}

            /* Responsive min-heights */
            @media (max-width: 1024px){ #pricing .pricing-card{ min-height:360px } }
            @media (max-width: 640px){ #pricing .pricing-card{ min-height:340px } }

            /* Left align price and the text below (including list) */
            #pricing .pricing-card .price,
            #pricing .pricing-card .price-details,
            #pricing .pricing-card .price-list{ text-align:left }


            /* Featured adjustments remain, but compact */
            #pricing .pricing-card.featured{transform:scale(1.0)}

            /* Controls & dots */
            #pricing .ctrl{position:absolute; top:50%; transform:translateY(-50%); background:rgba(0,0,0,.45); color:#fff; border:none; width:36px; height:36px; border-radius:999px; display:flex; align-items:center; justify-content:center; cursor:pointer; z-index:2}
            #pricing .ctrl.prev{left:-10px}
            #pricing .ctrl.next{right:-10px}
            @media (max-width: 1024px){ #pricing .ctrl.prev{left:-8px} #pricing .ctrl.next{right:-8px} }
            @media (max-width: 640px){ #pricing .ctrl.prev{left:6px} #pricing .ctrl.next{right:6px} }
            #pricing .dots{display:flex; justify-content:center; gap:6px; margin-top:12px}
            #pricing .dot{width:7px; height:7px; border-radius:999px; background:#cbd5e1; cursor:pointer; transition:background-color .2s ease, transform .2s ease}
            #pricing .dot.active{background:#ffd700; transform:scale(1.1)}
        </style>
        <div class="carousel" id="pricingCarousel">
            <div class="viewport">
                <div class="track" id="pricingTrack">
                    <div class="slide" data-price-index="0">
                        <div class="pricing-card featured">
                            <h3 class="price-title">২০ কুড়া মালা (২.৫ কাঠা)</h3>
                            <div class="price price-amount">৮০,০০,০০০ টাকা</div>
                            <p class="price-details price-down">০৩% ডাউন পেমেন্ট: ৩৫,০০০০০ টাকা</p>
                            <ul class="price-list">
                                <li class="price-inst-1">০৩ কিস্তি: ৪০,০০০০০ টাকা</li>
                                <li class="price-inst-2">০৫ কিস্তি: ৯,৪০,০০০০০ টাকা</li>
                                <li class="price-inst-3">১০ কিস্তি: ৯,৯৬,০০০০০ টাকা</li>
                                <li class="price-inst-4">২০ কিস্তি: ১,৩৮,০০০০০ টাকা</li>
                            </ul>
                            <a href="#contact" class="btn btn-primary price-btn">বুকিং করুন</a>
                        </div>
                    </div>
                    <div class="slide" data-price-index="1">
                        <div class="pricing-card featured">
                            <h3 class="price-title">৩০ কুড়া মালা (৩.৭৫ কাঠা)</h3>
                            <div class="price price-amount">৮৮,০০,০০০ টাকা</div>
                            <p class="price-details price-down">০৩% ডাউন পেমেন্ট: ৩৮,৪৯৯৯৯ টাকা</p>
                            <ul class="price-list">
                                <li class="price-inst-1">০৩ কিস্তি: ১০,৮৮৯৯৯ টাকা</li>
                                <li class="price-inst-2">০৫ কিস্তি: ১,০৩,০০০০০ টাকা</li>
                                <li class="price-inst-3">১০ কিস্তি: ১,৮৮,০৯৯৯৯ টাকা</li>
                                <li class="price-inst-4">২০ কিস্তি: ১,২৮,৮০০০০ টাকা</li>
                            </ul>
                            <a href="#contact" class="btn btn-primary price-btn">জনপ্রিয়</a>
                        </div>
                    </div>
                    <div class="slide" data-price-index="2">
                        <div class="pricing-card featured">
                            <h3 class="price-title">৪০ কুড়া মালা (৫ কাঠা)</h3>
                            <div class="price price-amount">৮৬,০০,০০০ টাকা</div>
                            <p class="price-details price-down">০৩% ডাউন পেমেন্ট: ৩৭,৫০০০০ টাকা</p>
                            <ul class="price-list">
                                <li class="price-inst-1">০৩ কিস্তি: ১৮,০০০০০ টাকা</li>
                                <li class="price-inst-2">০৫ কিস্তি: ৯,৭৮,০০০০০ টাকা</li>
                                <li class="price-inst-3">১০ কিস্তি: ৯,৭৮,০০০০০ টাকা</li>
                                <li class="price-inst-4">২০ কিস্তি: ১,২৭৮,০০০০০ টাকা</li>
                            </ul>
                            <a href="#contact" class="btn btn-primary price-btn">বুকিং করুন</a>
                        </div>
                    </div>
                    <div class="slide" data-price-index="3">
                        <div class="pricing-card featured">
                            <h3 class="price-title">৫০ কুড়া মালা (৬.২৫ কাঠা)</h3>
                            <div class="price price-amount">৯৮,০০,০০০ টাকা</div>
                            <p class="price-details price-down">০৩% ডাউন পেমেন্ট: ৪৫,০০০০০ টাকা</p>
                            <ul class="price-list">
                                <li class="price-inst-1">০৩ কিস্তি: ২০,০০০০০ টাকা</li>
                                <li class="price-inst-2">০৫ কিস্তি: ১২,৪০,০০০০০ টাকা</li>
                                <li class="price-inst-3">১০ কিস্তি: ১১,৯৬,০০০০০ টাকা</li>
                                <li class="price-inst-4">২০ কিস্তি: ১,৪৮,০০০০০ টাকা</li>
                            </ul>
                            <a href="#contact" class="btn btn-primary price-btn">বুকিং করুন</a>
                        </div>
                    </div>
                    <div class="slide" data-price-index="4">
                        <div class="pricing-card featured">
                            <h3 class="price-title">৬০ কুড়া মালা (৭.৫ কাঠা)</h3>
                            <div class="price price-amount">১,১৫,০০,০০০ টাকা</div>
                            <p class="price-details price-down">০৩% ডাউন পেমেন্ট: ৫৫,০০০০০ টাকা</p>
                            <ul class="price-list">
                                <li class="price-inst-1">০৩ কিস্তি: ২৫,০০০০০ টাকা</li>
                                <li class="price-inst-2">০৫ কিস্তি: ১৪,৪০,০০০০০ টাকা</li>
                                <li class="price-inst-3">১০ কিস্তি: ১৩,৯৬,০০০০০ টাকা</li>
                                <li class="price-inst-4">২০ কিস্তি: ১,৬৮,০০০০০ টাকা</li>
                            </ul>
                            <a href="#contact" class="btn btn-primary price-btn">বুকিং করুন</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dots" id="priceDots"></div>
        </div>
        <script>
            (function(){
                const track = document.getElementById('pricingTrack');
                const viewport = document.querySelector('#pricingCarousel .viewport');
                const slides = track ? Array.from(track.querySelectorAll('.slide')) : [];
                const prev = document.getElementById('pricePrev');
                const next = document.getElementById('priceNext');
                const dotsWrap = document.getElementById('priceDots');
                if(!track || !viewport || !slides.length) return;
                let idx = 0, timer;
                function setActive(i){ idx = (i+slides.length)%slides.length; update(); activateDot(); }
                function update(){
                    const target = slides[idx];
                    if (!target) return;
                    const left = target.offsetLeft; // position inside track
                    viewport.scrollTo({ left, behavior:'smooth' });
                }
                function activateDot(){ Array.from(dotsWrap.children).forEach((d,k)=> d.classList.toggle('active', k===idx)); }
                // dots
                slides.forEach((_, i)=>{ const d=document.createElement('div'); d.className='dot'+(i===0?' active':''); d.addEventListener('click', ()=>{ setActive(i); restart(); }); dotsWrap.appendChild(d); });
                function go(n){ setActive(idx+n); }
                function restart(){ clearInterval(timer); timer = setInterval(()=> go(1), 4000); }
                if (prev) prev.addEventListener('click', ()=>{ go(-1); restart(); });
                if (next) next.addEventListener('click', ()=>{ go(1); restart(); });
                window.addEventListener('resize', ()=> update());
                // Drag to scroll (mouse + touch)
                let isDown = false, startX = 0, startScroll = 0;
                function onDown(clientX){ isDown = true; viewport.classList.add('dragging'); startX = clientX; startScroll = viewport.scrollLeft; clearInterval(timer); }
                function onMove(clientX){ if(!isDown) return; const dx = clientX - startX; viewport.scrollLeft = startScroll - dx; }
                function onUp(){ if(!isDown) return; isDown = false; viewport.classList.remove('dragging'); restart(); }
                viewport.addEventListener('mousedown', (e)=> onDown(e.clientX));
                window.addEventListener('mousemove', (e)=> onMove(e.clientX));
                window.addEventListener('mouseup', onUp);
                viewport.addEventListener('mouseleave', onUp);
                viewport.addEventListener('touchstart', (e)=>{ const t=e.touches[0]; if(t) onDown(t.clientX); }, {passive:true});
                viewport.addEventListener('touchmove', (e)=>{ const t=e.touches[0]; if(t) onMove(t.clientX); }, {passive:true});
                viewport.addEventListener('touchend', onUp);
                
                // Local storage functionality
                function readPricing(){ try{ return JSON.parse(localStorage.getItem('pricingSettings')||'{}'); }catch(e){ console.error('Error reading pricing:', e); return {}; } }
                function applyPricing(){
                    const s = readPricing();
                    console.log('Applying pricing:', s);
                    const items = Array.isArray(s.items) ? s.items : [];
                    console.log('Pricing items:', items.length);
                    slides.forEach((slide, idx) => {
                        const item = items[idx];
                        if (!item) return;
                        const titleEl = slide.querySelector('.price-title');
                        const amountEl = slide.querySelector('.price-amount');
                        const downEl = slide.querySelector('.price-down');
                        const inst1 = slide.querySelector('.price-inst-1');
                        const inst2 = slide.querySelector('.price-inst-2');
                        const inst3 = slide.querySelector('.price-inst-3');
                        const inst4 = slide.querySelector('.price-inst-4');
                        const btnEl = slide.querySelector('.price-btn');
                        if (titleEl && item.title) titleEl.textContent = item.title;
                        if (amountEl && item.amount) amountEl.textContent = item.amount;
                        if (downEl && item.downPayment) downEl.textContent = item.downPayment;
                        if (inst1 && item.installment1) inst1.textContent = item.installment1;
                        if (inst2 && item.installment2) inst2.textContent = item.installment2;
                        if (inst3 && item.installment3) inst3.textContent = item.installment3;
                        if (inst4 && item.installment4) inst4.textContent = item.installment4;
                        if (btnEl && item.buttonText) btnEl.textContent = item.buttonText;
                        if (btnEl && item.buttonLink) btnEl.href = item.buttonLink;
                    });
                }
                applyPricing();
                window.addEventListener('storage', (e)=>{ if(e.key==='pricingSettings'){ console.log('Storage event detected'); applyPricing(); } });
                let last = localStorage.getItem('pricingSettings');
                setInterval(()=>{ const cur = localStorage.getItem('pricingSettings'); if(cur!==last){ console.log('Pricing changed via polling'); last=cur; applyPricing(); } }, 1000);
                
                // init
                setActive(0);
                restart();
            })();
        </script>
    </section>