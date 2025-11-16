 <section id="features" class="features">
        <h2 class="section-title" id="featuresTitle">আমাদের সুবিধাসমূহ</h2>
        <p class="section-subtitle" id="featuresSubtitle">NEX Real Estate এর একটি প্রকল্প</p>
        <div class="features-grid">
            <div class="feature-card">
                <div id="featIcon1" class="feature-icon"><i class="fas fa-city"></i></div>
                <h3 id="featTitle1">প্রিমিয়াম লোকেশন</h3>
                <p id="featDesc1">প্রকল্পের ঠিকানা: শুভনূর ৩৮৮ বাড়ি সিদ্ধার্থ এস আবাস, খুলনায় অবস্থিত</p>
            </div>
            <div class="feature-card">
                <div id="featIcon2" class="feature-icon"><i class="fas fa-clipboard-list"></i></div>
                <h3 id="featTitle2">সহজ কিস্তি সুবিধা</h3>
                <p id="featDesc2">০৩, ০৫, ১০, ও ২০ কিস্তির সুবিধা সহ নমনীয় পেমেন্ট প্ল্যান</p>
            </div>
            <div class="feature-card">
                <div id="featIcon3" class="feature-icon"><i class="fas fa-bullseye"></i></div>
                <h3 id="featTitle3">বিভিন্ন প্লট সাইজ</h3>
                <p id="featDesc3">২.৫ কাঠা থেকে ৫ কাঠা পর্যন্ত বিভিন্ন সাইজের প্লট উপলব্ধ</p>
            </div>
            <div class="feature-card">
                <div id="featIcon4" class="feature-icon"><i class="fas fa-gavel"></i></div>
                <h3 id="featTitle4">আইনি নিশ্চয়তা</h3>
                <p id="featDesc4">সম্পূর্ণ আইনি প্রক্রিয়া ও ডকুমেন্টেশন নিশ্চিত</p>
            </div>
            <div class="feature-card">
                <div id="featIcon5" class="feature-icon"><i class="fas fa-car"></i></div>
                <h3 id="featTitle5">সহজ যোগাযোগ</h3>
                <p id="featDesc5">প্রধান সড়কের সাথে সরাসরি সংযোগ ও উন্নত যোগাযোগ ব্যবস্থা</p>
            </div>
            <div class="feature-card">
                <div id="featIcon6" class="feature-icon"><i class="fas fa-tree"></i></div>
                <h3 id="featTitle6">সবুজ পরিবেশ</h3>
                <p id="featDesc6">পরিকল্পিত সবুজায়ন এবং আধুনিক সুবিধা সম্বলিত</p>
            </div>
            <div class="feature-card">
                <div id="featIcon7" class="feature-icon"><i class="fas fa-shield-alt"></i></div>
                <h3 id="featTitle7">২৪/৭ নিরাপত্তা</h3>
                <p id="featDesc7">সিসিটিভি নজরদারি ও পেশাদার নিরাপত্তা টিম দ্বারা সুরক্ষিত</p>
            </div>
            <div class="feature-card">
                <div id="featIcon8" class="feature-icon"><i class="fas fa-tint"></i></div>
                <h3 id="featTitle8">পানি ও বিদ্যুৎ সংযোগ</h3>
                <p id="featDesc8">নিরবচ্ছিন্ন পানি ও বিদ্যুতের সুবিধা নিশ্চিত</p>
            </div>
        </div>
        <script>
            (function(){
                const ids = ['1','2','3','4','5','6','7','8'];
                const els = ids.map(i=>({
                    icon: document.getElementById('featIcon'+i),
                    title: document.getElementById('featTitle'+i),
                    desc: document.getElementById('featDesc'+i)
                }));
                function read(){ try{ return JSON.parse(localStorage.getItem('featuresSettings')||'{}'); }catch(e){ return {}; } }
                function apply(){
                    const s = read();
                    const items = Array.isArray(s.items)? s.items: [];
                    els.forEach((e, idx)=>{
                        const it = items[idx] || {};
                        if (e.icon && it.icon) e.icon.textContent = it.icon;
                        if (e.title && it.title) e.title.textContent = it.title;
                        if (e.desc && it.desc) e.desc.textContent = it.desc;
                    });
                }
                apply();
                window.addEventListener('storage', (ev)=>{ if(ev.key==='featuresSettings') apply(); });
                let last = localStorage.getItem('featuresSettings');
                setInterval(()=>{ const cur = localStorage.getItem('featuresSettings'); if(cur!==last){ last=cur; apply(); } }, 1000);
            })();
        </script>
    </section>