<style>
  body {
    background: linear-gradient(to right, #004d25, #006b33);
    font-family: 'Noto Sans Bengali', sans-serif;
    color: white;
    overflow-x: hidden;
  }

  .main-section {
    padding: 40px 15px;
  }

  /* ---------- CARD (LEFT OFFER) ---------- */
  .offer-card {
    background-color: #004e25;
    border: none;
    border-radius: 15px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
    padding: 25px 20px;
    height: 100%;
  }

  .offer-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #ffd700;
    margin-bottom: 20px;
    text-align: center;
  }

  .plot-box {
    background-color: #125c38;
    color: #fff;
    border: 2px solid #f9b233;
    border-radius: 12px;
    padding: 10px;
    transition: transform 0.3s ease;
  }

  .plot-box:hover {
    transform: translateY(-5px);
  }

  .plot-size {
    font-size: 1.2rem;
    font-weight: 700;
    color: #ffcc33;
  }

  .category-label {
    background-color: #f9b233;
    color: #004d25;
    padding: 4px 10px;
    border-radius: 20px;
    font-weight: 700;
    font-size: 0.8rem;
    display: inline-block;
    margin-top: 5px;
  }

  .footer-note {
    margin-top: 20px;
    font-size: 0.9rem;
    line-height: 1.6;
    text-align: center;
  }

  .cta-bar {
    background-color: #ff8800;
    color: white;
    font-weight: 700;
    padding: 10px;
    margin-top: 20px;
    border-radius: 5px;
    font-size: 1rem;
    text-align: center;
  }

  /* ---------- RIGHT (MAP) ---------- */
.map-section {
  text-align: center;
  background: rgba(0, 0, 0, 0.15);
  border-radius: 15px;
  padding: 20px;
  height: 100%;
  display: flex;            /* make vertical layout */
  flex-direction: column;   /* title then image */
  overflow: hidden; /* ✅ keeps image inside rounded area */
}

.map-section img {
  width: 100%;
  flex: 1 1 auto;         /* take remaining height */
  height: 100%;           /* fill container to align bottoms */
  object-fit: cover;      /* fill without stretching */
  border-radius: 10px; /* ✅ rounded corners */
  border: 2px solid #ffc107; /* optional border */
  display: block;
}



  .map-title {
    font-size: 1.3rem;
    font-weight: 700;
    color: #ffd700;
    margin-bottom: 10px;
  }

  /* ---------- RESPONSIVE ---------- */
  @media (max-width: 992px) {
    .map-section {
      margin-top: 25px;
    }
  }
</style>

<div style="text-align: center; margin: 2rem 0;">
  <h2 class="section-title" id="socialMediaTitle" style="margin: 0 0 0.5rem 0; color: #ffffff;">সোশ্যাল মিডিয়া পোস্ট</h2>
  <div id="socialMediaStatus" style="font-size: 13px; color: #a7f3d0; display: flex; align-items: center; justify-content: center; gap: 8px;">
    <span id="statusIndicator" style="width: 8px; height: 8px; border-radius: 50%; background: #10b981; box-shadow: 0 0 8px #10b981;"></span>
    <span id="statusText">লোড হচ্ছে...</span>
  </div>
</div>
<style>
  .slider-wrap { 
    width: 100%; 
    max-width: 1600px; 
    margin: 0 auto; 
    position: relative;
    padding: 60px 2%;
    box-sizing: border-box;
    overflow: hidden;
  }
  
  .carousel-wrapper {
    position: relative;
    overflow: hidden;
    padding: 30px 0;
    margin: 0 70px;
    box-sizing: border-box;
  }
  
  .slider-container { 
    display: flex; 
    gap: 20px; 
    transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    will-change: transform;
    cursor: grab;
  }
  
  .slider-container.grabbing { 
    cursor: grabbing; 
    user-select: none;
    transition: none;
  }
  
  .slide-col { 
    flex: 0 0 calc(25% - 15px);
    min-width: calc(25% - 15px);
    max-width: calc(25% - 15px);
    height: 520px;
    transform-origin: center;
    transition: transform 0.3s ease, opacity 0.3s ease;
  }
  
  .slide-col a { 
    text-decoration: none; 
    color: inherit; 
    display: block; 
    height: 100%; 
  }
  
  @media (max-width: 1200px) { 
    .slide-col { 
      flex-basis: calc(33.333% - 10px);
      min-width: calc(33.333% - 10px);
      max-width: calc(33.333% - 10px);
      height: 500px; 
    }
  }
  
  @media (max-width: 900px) { 
    .slide-col { 
      flex-basis: calc(50% - 10px);
      min-width: calc(50% - 10px);
      max-width: calc(50% - 10px);
      height: 480px; 
    }
    .carousel-wrapper {
      margin: 0 50px;
      padding: 25px 0;
    }
  }
  
  @media (max-width: 768px) { 
    .slide-col { 
      flex-basis: 100%;
      min-width: 100%;
      max-width: 100%;
      height: 460px; 
    }
    .slider-wrap {
      padding: 40px 5%;
    }
    .carousel-wrapper {
      margin: 0 20px;
      padding: 20px 0;
    }
  }
  
  .slide-card { 
    background: linear-gradient(135deg, #ffffff 0%, #fafafa 100%);
    border-radius: 20px; 
    box-shadow: 
      0 12px 35px rgba(0, 0, 0, 0.1),
      0 6px 15px rgba(0, 0, 0, 0.06),
      0 0 0 1px rgba(10, 77, 46, 0.1) inset;
    overflow: hidden; 
    height: 100%; 
    display: flex; 
    flex-direction: column; 
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    border: 2px solid rgba(200, 230, 201, 0.6);
    position: relative;
    transform-origin: center;
  }
  
  .slide-card::before {
    content: '';
    position: absolute;
    top: -3px;
    left: -3px;
    right: -3px;
    bottom: -3px;
    background: linear-gradient(135deg, rgba(10, 77, 46, 0.15), rgba(255, 215, 0, 0.15));
    border-radius: 24px;
    opacity: 0;
    transition: opacity 0.5s ease;
    z-index: -1;
  }
  
  .slide-card::after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
    transition: left 0.6s ease;
  }
  
  .slide-col a:hover .slide-card,
  .slide-card:hover { 
    transform: translateY(-12px) scale(1.02);
    box-shadow: 
      0 25px 60px rgba(0, 0, 0, 0.15),
      0 10px 30px rgba(10, 77, 46, 0.1),
      0 0 0 1px rgba(10, 77, 46, 0.15) inset,
      0 0 40px rgba(10, 77, 46, 0.1);
    border-color: rgba(255, 215, 0, 0.5);
  }
  
  .slide-card:hover::before {
    opacity: 1;
  }
  
  .slide-card:hover::after {
    left: 100%;
  }
  
  .slide-card h3 { 
    font-size: 19px; 
    font-weight: 700; 
    color: #0a4d2e; 
    margin: 0; 
    line-height: 1.5; 
    text-decoration: none; 
    overflow: hidden; 
    display: -webkit-box; 
    -webkit-line-clamp: 2; 
    -webkit-box-orient: vertical;
    word-wrap: break-word;
    overflow-wrap: break-word;
  }
  
  .slide-card .title { 
    padding: 24px 24px 12px 24px; 
    flex-shrink: 0; 
    background: linear-gradient(to bottom, rgba(255, 255, 255, 0.95) 0%, rgba(249, 250, 251, 0.95) 100%);
  }
  
  .slide-card img { 
    width: 100%; 
    height: 220px; 
    object-fit: cover; 
    display: block; 
    flex-shrink: 0;
    transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1), filter 0.4s ease;
    filter: brightness(1) saturate(1);
  }
  
  .slide-col a:hover .slide-card img,
  .slide-card:hover img {
    transform: scale(1.1) rotate(0.5deg);
    filter: brightness(1.05) saturate(1.1);
  }
  
  .slide-card .desc { 
    padding: 16px 24px 18px 24px; 
    color: #6b7280; 
    font-size: 14.5px; 
    line-height: 1.75; 
    text-decoration: none; 
    overflow: hidden; 
    display: -webkit-box; 
    -webkit-line-clamp: 4; 
    -webkit-box-orient: vertical;
    flex: 1;
    word-wrap: break-word;
    overflow-wrap: break-word;
    hyphens: auto;
  }
  
  /* Card Footer with Button */
  .card-footer {
    padding: 0 24px 24px 24px;
    margin-top: auto;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-shrink: 0;
  }
  
  .view-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 12px 40px;
    background: linear-gradient(135deg, #0a4d2e 0%, #1a7a4a 100%);
    color: #ffffff;
    text-decoration: none;
    border-radius: 12px;
    font-weight: 600;
    font-size: 15px;
    letter-spacing: 0.3px;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 
      0 4px 12px rgba(10, 77, 46, 0.3),
      0 2px 6px rgba(10, 77, 46, 0.15),
      inset 0 1px 0 rgba(255, 255, 255, 0.15);
    border: 2px solid rgba(255, 215, 0, 0.3);
    position: relative;
    overflow: hidden;
    white-space: nowrap;
  }
  
  .view-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s ease;
  }
  
  .view-btn:hover {
    background: linear-gradient(135deg, #1a7a4a 0%, #0a4d2e 100%);
    transform: translateY(-2px);
    box-shadow: 
      0 6px 20px rgba(10, 77, 46, 0.35),
      0 0 0 3px rgba(255, 215, 0, 0.3),
      inset 0 1px 0 rgba(255, 255, 255, 0.2);
    border-color: rgba(255, 215, 0, 0.5);
  }
  
  .view-btn:hover::before {
    left: 100%;
  }
  
  .view-btn:active {
    transform: translateY(0);
    box-shadow: 
      0 3px 10px rgba(10, 77, 46, 0.3),
      inset 0 1px 0 rgba(255, 255, 255, 0.1);
  }
  
  /* Responsive Typography and Spacing */
  @media (max-width: 1200px) {
    .slide-card h3 {
      font-size: 18px;
    }
    .slide-card .desc {
      font-size: 14px;
      -webkit-line-clamp: 3;
    }
    .slide-card img {
      height: 200px;
    }
  }
  
  @media (max-width: 900px) {
    .slide-card {
      min-height: 560px;
    }
    .slide-card h3 {
      font-size: 17px;
      line-height: 1.5;
      -webkit-line-clamp: 4;
      max-height: none;
    }
    .slide-card .title {
      padding: 20px 20px 10px 20px;
    }
    .slide-card .desc {
      font-size: 13.5px;
      line-height: 1.65;
      padding: 14px 20px 18px 20px;
      display: block;
      -webkit-line-clamp: unset;
      -webkit-box-orient: unset;
      overflow: visible;
      flex: 0 1 auto;
      max-height: none;
    }
    .slide-card img {
      height: 200px;
    }
    .view-btn {
      padding: 11px 36px;
      font-size: 14px;
      min-height: 44px;
    }
    .card-footer {
      padding: 0 20px 20px 20px;
      margin-top: 20px;
    }
  }
  
  @media (max-width: 768px) {
    .slide-col {
      height: auto;
    }
    .slide-card {
      height: auto;
      min-height: 580px;
    }
    .slide-card h3 {
      font-size: 16px;
      line-height: 1.5;
      -webkit-line-clamp: 4;
      max-height: none;
    }
    .slide-card .title {
      padding: 18px 18px 10px 18px;
      flex-shrink: 0;
    }
    .slide-card .desc {
      font-size: 13px;
      line-height: 1.65;
      padding: 12px 18px 16px 18px;
      display: block;
      -webkit-line-clamp: unset;
      -webkit-box-orient: unset;
      overflow: visible;
      flex: 0 1 auto;
      max-height: none;
    }
    .slide-card img {
      height: 200px;
      flex-shrink: 0;
    }
    .view-btn {
      padding: 11px 32px;
      font-size: 13px;
      min-height: 44px;
      flex-shrink: 0;
    }
    .card-footer {
      padding: 0 18px 18px 18px;
      margin-top: 18px;
      flex-shrink: 0;
    }
  }
  
  @media (max-width: 480px) {
    .carousel-wrapper {
      margin: 0 10px;
      padding: 15px 0;
    }
    .slide-col {
      height: auto;
      min-height: auto;
    }
    .slider-wrap {
      padding: 30px 3%;
    }
    .slide-card {
      display: flex;
      flex-direction: column;
      height: auto;
      min-height: 600px;
      max-height: none;
    }
    .slide-card h3 {
      font-size: 15px;
      line-height: 1.5;
      -webkit-line-clamp: 4;
      max-height: none;
    }
    .slide-card .title {
      padding: 16px 16px 12px 16px;
      flex-shrink: 0;
    }
    .slide-card .desc {
      font-size: 13px;
      line-height: 1.65;
      padding: 12px 16px 16px 16px;
      display: block;
      -webkit-line-clamp: unset;
      -webkit-box-orient: unset;
      overflow: visible;
      flex: 0 1 auto;
      max-height: none;
    }
    .slide-card img {
      height: 200px;
      object-fit: cover;
      flex-shrink: 0;
    }
    .view-btn {
      padding: 13px 32px;
      font-size: 14px;
      width: calc(100% - 32px);
      margin: 0 auto;
      text-align: center;
      white-space: nowrap;
      min-height: 46px;
      display: flex;
      align-items: center;
      justify-content: center;
      -webkit-tap-highlight-color: rgba(10, 77, 46, 0.3);
      flex-shrink: 0;
    }
    .view-btn:active {
      transform: scale(0.98);
    }
    .card-footer {
      padding: 0 16px 18px 16px;
      margin-top: 16px;
      flex-shrink: 0;
    }
  }
  
  @media (max-width: 360px) {
    .carousel-wrapper {
      margin: 0 5px;
      padding: 10px 0;
    }
    .slider-wrap {
      padding: 25px 2%;
    }
    .slide-col {
      height: auto;
      min-height: auto;
    }
    .slide-card {
      min-height: 580px;
    }
    .slide-card h3 {
      font-size: 14px;
      line-height: 1.5;
      -webkit-line-clamp: 4;
      max-height: none;
    }
    .slide-card .title {
      padding: 14px 14px 10px 14px;
    }
    .slide-card .desc {
      font-size: 12.5px;
      line-height: 1.6;
      padding: 10px 14px 14px 14px;
      display: block;
      -webkit-line-clamp: unset;
      -webkit-box-orient: unset;
      overflow: visible;
      max-height: none;
    }
    .slide-card img {
      height: 180px;
    }
    .view-btn {
      padding: 12px 24px;
      font-size: 13px;
      width: calc(100% - 28px);
      min-height: 44px;
    }
    .card-footer {
      padding: 0 14px 16px 14px;
      margin-top: 14px;
    }
  }
  
  
  /* Navigation Arrows - Modern Professional Style */
  .slider-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 100;
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.98) 0%, rgba(255, 255, 255, 0.95) 100%);
    color: #0a4d2e;
    border: 3px solid rgba(10, 77, 46, 0.15);
    border-radius: 50%;
    width: 60px;
    height: 60px;
    font-size: 1.8rem;
    cursor: pointer;
    box-shadow: 
      0 8px 24px rgba(0, 0, 0, 0.15),
      0 4px 12px rgba(10, 77, 46, 0.1),
      inset 0 1px 0 rgba(255, 255, 255, 0.8);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    display: flex;
    align-items: center;
    justify-content: center;
    line-height: 1;
    user-select: none;
    -webkit-tap-highlight-color: transparent;
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    outline: none;
    font-weight: 600;
  }
  
  .slider-nav::before {
    content: '';
    position: absolute;
    inset: -8px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(255, 215, 0, 0.2) 0%, transparent 70%);
    opacity: 0;
    transition: opacity 0.4s ease;
    z-index: -1;
  }
  
  .slider-nav:hover {
    background: linear-gradient(135deg, #0a4d2e 0%, #1a7a4a 100%);
    color: #ffffff;
    transform: translateY(-50%) scale(1.15);
    box-shadow: 
      0 12px 32px rgba(0, 0, 0, 0.25),
      0 6px 16px rgba(10, 77, 46, 0.2),
      0 0 0 6px rgba(255, 215, 0, 0.2),
      inset 0 1px 0 rgba(255, 255, 255, 0.2);
    border-color: rgba(255, 215, 0, 0.6);
  }
  
  .slider-nav:hover::before {
    opacity: 1;
  }
  
  .slider-nav:active {
    transform: translateY(-50%) scale(1.05);
    transition: all 0.15s ease;
  }
  
  .slider-nav:focus-visible {
    outline: 3px solid #ffd700;
    outline-offset: 6px;
  }
  
  .slider-nav.prev { 
    left: -75px;
    animation: slideInLeft 0.6s ease-out;
  }
  
  .slider-nav.next { 
    right: -75px;
    animation: slideInRight 0.6s ease-out;
  }
  
  .slider-nav::after {
    content: '';
    position: absolute;
    inset: 0;
    border-radius: 50%;
    background: linear-gradient(135deg, rgba(255, 215, 0, 0.1), transparent);
    opacity: 0;
    transition: opacity 0.4s ease;
  }
  
  .slider-nav:hover::after {
    opacity: 1;
  }
  
  /* Disabled state */
  .slider-nav[style*="opacity: 0.3"] {
    pointer-events: none;
    opacity: 0.3 !important;
    filter: grayscale(0.5);
  }
  
  @keyframes slideInLeft {
    from {
      opacity: 0;
      transform: translateY(-50%) translateX(-30px);
    }
    to {
      opacity: 1;
      transform: translateY(-50%) translateX(0);
    }
  }
  
  @keyframes slideInRight {
    from {
      opacity: 0;
      transform: translateY(-50%) translateX(30px);
    }
    to {
      opacity: 1;
      transform: translateY(-50%) translateX(0);
    }
  }
  
  @media (max-width: 1200px) {
    .slider-nav { 
      width: 56px;
      height: 56px;
      font-size: 1.6rem;
    }
  }
  
  @media (max-width: 900px) {
    .slider-nav { 
      width: 50px;
      height: 50px;
      font-size: 1.4rem;
    }
    .slider-nav.prev { left: -65px; }
    .slider-nav.next { right: -65px; }
  }
  
  @media (max-width: 768px) {
    .slider-nav { 
      width: 44px;
      height: 44px;
      font-size: 1.2rem;
    }
    .slider-nav.prev { left: -55px; }
    .slider-nav.next { right: -55px; }
  }
  
  @media (max-width: 600px) {
    .slider-nav { 
      display: none;
    }
  }
  
  /* Pagination Dots - Modern Professional Style */
  .dots { 
    display: flex; 
    justify-content: center; 
    align-items: center; 
    gap: 14px; 
    margin-top: 2.5rem;
    padding: 1.2rem 0;
    position: relative;
    z-index: 1;
  }
  
  .dot {
    width: 14px;
    height: 14px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.3);
    border: 2px solid rgba(255, 255, 255, 0.5);
    cursor: pointer;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    padding: 0;
    position: relative;
    overflow: hidden;
    outline: none;
    box-shadow: 
      0 2px 8px rgba(0, 0, 0, 0.15),
      inset 0 1px 2px rgba(255, 255, 255, 0.2);
  }
  
  .dot::before {
    content: '';
    position: absolute;
    inset: -3px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(255, 215, 0, 0.4) 0%, transparent 70%);
    opacity: 0;
    transition: opacity 0.4s ease;
  }
  
  .dot:hover {
    background: rgba(255, 255, 255, 0.6);
    border-color: rgba(255, 255, 255, 0.9);
    transform: scale(1.3);
    box-shadow: 
      0 4px 12px rgba(0, 0, 0, 0.2),
      0 0 0 4px rgba(255, 215, 0, 0.2);
  }
  
  .dot:hover::before {
    opacity: 1;
  }
  
  .dot:focus-visible {
    outline: 3px solid #ffd700;
    outline-offset: 6px;
  }
  
  .dot.active {
    width: 40px;
    border-radius: 8px;
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(255, 255, 255, 0.85) 100%);
    border-color: rgba(255, 215, 0, 0.8);
    box-shadow: 
      0 6px 16px rgba(0, 0, 0, 0.25),
      0 0 0 4px rgba(255, 215, 0, 0.3),
      inset 0 1px 0 rgba(255, 255, 255, 0.5);
    animation: dotActivate 0.4s ease-out;
  }
  
  .dot.active::before {
    opacity: 1;
  }
  
  @keyframes dotActivate {
    0% {
      transform: scale(0.8);
      opacity: 0;
    }
    50% {
      transform: scale(1.2);
    }
    100% {
      transform: scale(1);
      opacity: 1;
    }
  }
</style>

<div class="slider-wrap" aria-label="Project Roadmap Slider">
  <div class="carousel-wrapper">
    <button id="slider-prev" class="slider-nav prev" aria-label="Previous">❮</button>
  <div id="slider-container" class="slider-container" role="region" aria-roledescription="carousel"></div>
    <button id="slider-next" class="slider-nav next" aria-label="Next">❯</button>
  </div>
  <div id="pagination-dots" class="dots" aria-label="পেজিনেশন">
    <button data-target="0" class="dot" aria-label="শুরুতে যান"></button>
    <button data-target="0.5" class="dot" aria-label="মাঝে যান"></button>
    <button data-target="1" class="dot" aria-label="শেষে যান"></button>
  </div>
  <script>
    (function(){
      const sliderContainer = document.getElementById('slider-container');
      const dotsContainer = document.getElementById('pagination-dots');
      const prevBtn = document.getElementById('slider-prev');
      const nextBtn = document.getElementById('slider-next');
      const dots = Array.from(dotsContainer.querySelectorAll('.dot'));
      
      let currentIndex = 0;
      let slides = [];
      let isDragging = false;
      let startPos = 0;
      let currentTranslate = 0;
      let prevTranslate = 0;
      let animationID = 0;
      
      function getGap(){
        if (!sliderContainer) return 0;
        const styles = window.getComputedStyle(sliderContainer);
        const gapValue = styles.columnGap || styles.gap || '0';
        const parsed = parseFloat(gapValue);
        return Number.isFinite(parsed) ? parsed : 0;
      }

      function updateCarousel(smooth = true) {
        if (!sliderContainer) return;
        const cardWidth = sliderContainer.querySelector('.slide-col')?.offsetWidth || 0;
        const gap = getGap();
        const offset = -currentIndex * (cardWidth + gap);
        
        if (smooth) {
          sliderContainer.style.transition = 'transform 0.5s cubic-bezier(0.4, 0, 0.2, 1)';
        } else {
          sliderContainer.style.transition = 'none';
        }
        
        sliderContainer.style.transform = `translateX(${offset}px)`;
        prevTranslate = offset;
        currentTranslate = offset;
        updateDots();
        updateNavButtons();
      }

      function updateDots(){
        if (!slides.length) return;
        const totalSlides = slides.length;
        const visibleCount = getVisibleCount();
        const maxIndex = Math.max(0, totalSlides - visibleCount);
        
        dots.forEach((d, i) => {
          const ratio = i / (dots.length - 1);
          const targetIndex = Math.round(ratio * maxIndex);
          d.classList.toggle('active', currentIndex === targetIndex);
        });
      }
      
      function updateNavButtons(){
        if (!slides.length) return;
        const visibleCount = getVisibleCount();
        const maxIndex = Math.max(0, slides.length - visibleCount);
        
        if(prevBtn) prevBtn.style.opacity = currentIndex > 0 ? '1' : '0.3';
        if(nextBtn) nextBtn.style.opacity = currentIndex < maxIndex ? '1' : '0.3';
      }
      
      function getVisibleCount(){
        const w = window.innerWidth;
        if (w <= 768) return 1;
        if (w <= 900) return 2;
        if (w <= 1200) return 3;
        return 4;
      }
      
      function goToSlide(index) {
        const visibleCount = getVisibleCount();
        const maxIndex = Math.max(0, slides.length - visibleCount);
        currentIndex = Math.max(0, Math.min(index, maxIndex));
        updateCarousel();
      }
      
      function nextSlide() {
        const visibleCount = getVisibleCount();
        const maxIndex = Math.max(0, slides.length - visibleCount);
        currentIndex = Math.min(currentIndex + 1, maxIndex);
        updateCarousel();
      }

      function prevSlide() {
        currentIndex = Math.max(currentIndex - 1, 0);
        updateCarousel();
      }

      // Mouse drag functionality
      function getPositionX(event) {
        return event.type.includes('mouse') ? event.pageX : event.touches[0].clientX;
      }

      function dragStart(event) {
        if (slides.length <= getVisibleCount()) return;
        isDragging = true;
        startPos = getPositionX(event);
        animationID = requestAnimationFrame(animation);
        sliderContainer.classList.add('grabbing');
        sliderContainer.style.cursor = 'grabbing';
      }

      function dragMove(event) {
        if (!isDragging) return;
        const currentPosition = getPositionX(event);
        currentTranslate = prevTranslate + currentPosition - startPos;
      }

      function dragEnd() {
        if (!isDragging) return;
        isDragging = false;
        cancelAnimationFrame(animationID);
        sliderContainer.classList.remove('grabbing');
        sliderContainer.style.cursor = 'grab';
        
        const movedBy = currentTranslate - prevTranslate;
        const threshold = 50; // Minimum drag distance to trigger slide
        
        if (movedBy < -threshold && currentIndex < slides.length - getVisibleCount()) {
          nextSlide();
        } else if (movedBy > threshold && currentIndex > 0) {
          prevSlide();
        } else {
          updateCarousel();
        }
        
        prevTranslate = currentTranslate;
      }

      function animation() {
        if (!isDragging) return;
        const cardWidth = sliderContainer.querySelector('.slide-col')?.offsetWidth || 0;
        const gap = getGap();
        const baseTranslate = -currentIndex * (cardWidth + gap);
        
        sliderContainer.style.transition = 'none';
        sliderContainer.style.transform = `translateX(${baseTranslate + (currentTranslate - prevTranslate)}px)`;
        
        if (isDragging) requestAnimationFrame(animation);
      }
      
      function bindDrag(){
        // Mouse events
        sliderContainer.addEventListener('mousedown', dragStart);
        sliderContainer.addEventListener('mousemove', dragMove);
        sliderContainer.addEventListener('mouseup', dragEnd);
        sliderContainer.addEventListener('mouseleave', dragEnd);
        
        // Touch events
        sliderContainer.addEventListener('touchstart', dragStart, { passive: true });
        sliderContainer.addEventListener('touchmove', dragMove, { passive: true });
        sliderContainer.addEventListener('touchend', dragEnd);
        
        // Prevent default drag behavior
        sliderContainer.addEventListener('dragstart', (e) => e.preventDefault());
      }
      
      function bindDots(){
        dotsContainer.addEventListener('click', (e)=>{ 
          const btn = e.target.closest('.dot'); 
          if(btn){ 
            const r = parseFloat(btn.dataset.target||'0'); 
            const visibleCount = getVisibleCount();
            const maxIndex = Math.max(0, slides.length - visibleCount);
            const targetIndex = Math.round(r * maxIndex);
            goToSlide(targetIndex);
          } 
        });
        window.addEventListener('resize', () => {
          updateCarousel(false);
        });
      }
      
      function bindNavButtons(){
        if(prevBtn){
          prevBtn.addEventListener('click', prevSlide);
        }
        if(nextBtn){
          nextBtn.addEventListener('click', nextSlide);
        }
      }
      
      function initSlides(){
        slides = Array.from(sliderContainer.querySelectorAll('.slide-col'));
        if(slides.length > 0){
          updateCarousel(false);
        }
      }

      function cardTemplate(it){
        // Sanitize and escape HTML to prevent XSS
        const escapeHtml = (str) => {
          const div = document.createElement('div');
          div.textContent = str;
          return div.innerHTML;
        };
        
        const title = escapeHtml((it.title||'').toString().trim());
        const desc = escapeHtml((it.content||'').toString().trim());
        let img = (it.image_url||'').toString().trim();
        
        // Handle different image path formats
        if(!img && it.image_path){
          const p = it.image_path.toString().replace(/^\/+/, '');
          img = "{{ asset('storage') }}" + '/' + p;
        }
        
        let href = (it.link||'').toString().trim();
        // Ensure external links have protocol
        if(href && !href.match(/^https?:\/\//i) && !href.startsWith('/')){
          href = 'https://' + href;
        }
        
        // Only show card if there's title or content
        if(!title && !desc) return '';
        
        const alt = title || 'সোশ্যাল মিডিয়া ছবি';
        const imageEl = img ? `<img src="${img}" alt="${escapeHtml(alt)}" loading="lazy" onerror="this.style.display='none'; this.parentElement.style.paddingTop='0'">` : '';
        
        const buttonEl = href ? `<div class="card-footer"><a href="${href}" target="_blank" rel="noopener noreferrer" class="view-btn">এখুনি দেখুন</a></div>` : '';
        
        const body = `
            <div class="slide-card">
              <div class="title"><h3>${title}</h3></div>
              ${imageEl}
              ${desc ? `<div class="desc">${desc}</div>` : ''}
              ${buttonEl}
            </div>`;
        
        return `
          <div class="slide-col">
            ${body}
          </div>`;
      }

      function renderFromItems(items){
        const statusText = document.getElementById('statusText');
        const statusIndicator = document.getElementById('statusIndicator');
        
        if(Array.isArray(items) && items.length){
          const cards = items.map(cardTemplate).filter(c => c).join('');
          if(cards){
            sliderContainer.innerHTML = cards;
            if(statusText) statusText.textContent = `${items.length} টি আইটেম সংযুক্ত`;
            if(statusIndicator) {
              statusIndicator.style.background = '#10b981';
              statusIndicator.style.boxShadow = '0 0 8px #10b981';
            }
          } else {
            sliderContainer.innerHTML = `<div class="slide-col"><div class="slide-card"><div class="title"><h3>আপাতত কোন কন্টেন্ট নেই</h3></div></div></div>`;
            if(statusText) statusText.textContent = '০ টি আইটেম';
            if(statusIndicator) {
              statusIndicator.style.background = '#fbbf24';
              statusIndicator.style.boxShadow = '0 0 8px #fbbf24';
            }
          }
        } else {
          sliderContainer.innerHTML = `<div class="slide-col"><div class="slide-card"><div class="title"><h3>আপাতত কোন কন্টেন্ট নেই</h3></div></div></div>`;
          if(statusText) statusText.textContent = '০ টি আইটেম';
          if(statusIndicator) {
            statusIndicator.style.background = '#fbbf24';
            statusIndicator.style.boxShadow = '0 0 8px #fbbf24';
          }
        }
        updateDots();
      }

      function getLivePreviewItems(){
        try{
          const raw = localStorage.getItem('liveSocialMediaPreview');
          if(!raw) return null;
          const payload = JSON.parse(raw);
          if(payload && Array.isArray(payload.items)) return payload.items;
        }catch(_){ }
        return null;
      }

      async function loadSocial(){
        const statusText = document.getElementById('statusText');
        const statusIndicator = document.getElementById('statusIndicator');
        
        try{
          // Prefer live preview if available
          const live = getLivePreviewItems();
          if(live && live.length){
            if(statusText) statusText.textContent = `${live.length} টি আইটেম (লাইভ প্রিভিউ)`;
            if(statusIndicator) {
              statusIndicator.style.background = '#3b82f6';
              statusIndicator.style.boxShadow = '0 0 8px #3b82f6';
            }
            renderFromItems(live);
            return;
          }
          
          if(statusText) statusText.textContent = 'ডাটাবেস থেকে লোড হচ্ছে...';
          
          const apiUrl = "{{ url('/api/social-media') }}" + '?_=' + Date.now();
          const res = await fetch(apiUrl, { 
            headers: { 'Accept': 'application/json' },
            cache: 'no-store'
          });
          
          if(!res.ok){ 
            throw new Error('Failed to load social media: ' + res.status); 
          }
          
          let items = await res.json();
          
          // Filter and sort items
          if(Array.isArray(items)){
            items = items.filter(it => {
              // Only show items with title or content
              const hasContent = (it.title && it.title.trim()) || (it.content && it.content.trim());
              // Check if active (default to true if not specified)
              const isActive = it.is_active === true || it.is_active === 1 || typeof it.is_active === 'undefined';
              return hasContent && isActive;
            }).sort((a,b)=> (a.order||0) - (b.order||0));
          }
          
          renderFromItems(items);
        }catch(err){
          // Show user-friendly error message
          if(statusText) statusText.textContent = 'লোড ব্যর্থ';
          if(statusIndicator) {
            statusIndicator.style.background = '#ef4444';
            statusIndicator.style.boxShadow = '0 0 8px #ef4444';
          }
          sliderContainer.innerHTML = `<div class="slide-col"><div class="slide-card"><div class="title"><h3>লোড করা যায়নি</h3></div><div class="desc">সোশ্যাল মিডিয়া আইটেম লোড করতে সমস্যা হয়েছে। পেজ রিফ্রেশ করে আবার চেষ্টা করুন।</div></div></div>`;
        }
      }

      // Override renderFromItems to reinitialize slider
      const originalRenderFromItems = renderFromItems;
      renderFromItems = function(items) {
        originalRenderFromItems(items);
        setTimeout(() => {
          initSlides();
        }, 100);
      };

      // Initial bindings
      bindDrag();
      bindDots();
      bindNavButtons();
      
      // Initial: prefer live preview if present, else API
      const initialLive = getLivePreviewItems();
      if(initialLive && initialLive.length){ 
        renderFromItems(initialLive);
      } else { 
        loadSocial(); 
      }
      
      // Refresh when admin saves or live-previews
      window.addEventListener('storage', (e)=>{
        if(e.key==='refreshSocialMedia'){ loadSocial(); }
        if(e.key==='liveSocialMediaPreview'){ 
          const live = getLivePreviewItems(); 
          if(live){ 
            renderFromItems(live);
          } 
        }
      });
      
      // Real-time sync for same-tab updates
      let lastRefresh = localStorage.getItem('refreshSocialMedia');
      let lastLive = localStorage.getItem('liveSocialMediaPreview');
      setInterval(()=>{
        const cur = localStorage.getItem('refreshSocialMedia');
        if(cur && cur!==lastRefresh){ 
          lastRefresh=cur; 
          setTimeout(loadSocial, 100); // Small delay to ensure data is saved
        }
        const curLive = localStorage.getItem('liveSocialMediaPreview');
        if(curLive && curLive!==lastLive){ 
          lastLive=curLive; 
          const live = getLivePreviewItems(); 
          if(live && live.length){ 
            renderFromItems(live); 
          }
        }
      }, 500); // Faster polling for better real-time feel
    })();
  </script>
</div>
<h2 class="section-title" id="roadmapSectionTitle" style="text-align: center; margin: 2rem 0; color: #ffffff;">প্রজেক্ট রোডম্যাপ</h2>

<div class="container main-section py-4 mb-4">
  <div class="row align-items-stretch">
    <!-- LEFT SIDE - OFFER DETAILS -->
    <div class="col-lg-6 col-md-12 mb-4 mb-lg-0">
      <div class="offer-card h-100">
        <h2 class="offer-title" id="prokolpoTitle">বেছে নিন আপনার পছন্দের প্লট</h2>

        <div class="row g-3 justify-content-center" id="prokolpoPlots">
          <div class="col-6">
            <div class="plot-box">
              <div class="plot-size">৮ কাঠা</div>
              <div class="category-label">প্রিমিয়াম প্লট</div>
            </div>
          </div>

          <div class="col-6">
            <div class="plot-box">
              <div class="plot-size">১০ কাঠা</div>
              <div class="category-label">ডিলাক্স প্লট</div>
            </div>
          </div>

          <div class="col-6">
            <div class="plot-box">
              <div class="plot-size">৩০ কাঠা</div>
              <div class="category-label">এক্সিকিউটিভ প্লট</div>
            </div>
          </div>

          <div class="col-6">
            <div class="plot-box">
              <div class="plot-size">২০ কাঠা</div>
              <div class="category-label">কর্পোরেট প্লট</div>
            </div>
          </div>
        </div>

        <div class="mt-3 text-center" id="prokolpoAmenities">
          <span class="category-label bg-success text-white">ক্লাব হাউজ</span>
          <span class="category-label bg-success text-white">জিম</span>
          <span class="category-label bg-success text-white">মসজিদ</span>
          <span class="category-label bg-success text-white">শপিং এরিয়া</span>
        </div>

        <div class="footer-note" id="prokolpoFooterNote">
          <p>
            সবুজ প্রকৃতি, নীরব কলকল ধারা আর নির্মল আবহাওয়া — এই জায়গাটি হতে পারে আপনার স্বপ্নের ঠিকানা!
            এখানে আছে আধুনিক রাস্তাঘাট, বিদ্যুৎ, পানি, গ্যাস, ও নিরাপত্তার নিশ্চয়তা।
          </p>
          <p>মূল্য বৃদ্ধির আগে, আজই বুকিং করুন।</p>
        </div>

        <div class="cta-bar" id="prokolpoCtaBar">
          📞 এখনই যোগাযোগ করুন — সীমিত সময়ের অফার
        </div>
      </div>
    </div>

    <!-- RIGHT SIDE - MAP -->
    <div class="col-lg-6 col-md-12">
      <div class="map-section h-100">
        <h3 class="map-title" id="prokolpoMapTitle">প্রজেক্ট রোডম্যাপ</h3>
        <img src="/images/Project-roadmap.png" class="img-fluid object-fit-fill" alt="Project Map" id="prokolpoMapImage">
      </div>
    </div>
  </div>
</div>


<script>
(function(){
    const defaults = {
        offerTitle: 'বেছে নিন আপনার পছন্দের প্লট',
        plots: [
            {size: '৮ কাঠা', cat: 'প্রিমিয়াম প্লট'},
            {size: '১০ কাঠা', cat: 'ডিলাক্স প্লট'},
            {size: '৩০ কাঠা', cat: 'এক্সিকিউটিভ প্লট'},
            {size: '২০ কাঠা', cat: 'কর্পোরেট প্লট'}
        ],
        amenities: ['ক্লাব হাউজ', 'জিম', 'মসজিদ', 'শপিং এরিয়া'],
        footerNote: '<p>সবুজ প্রকৃতি, নীরব কলকল ধারা আর নির্মল আবহাওয়া — এই জায়গাটি হতে পারে আপনার স্বপ্নের ঠিকানা! এখানে আছে আধুনিক রাস্তাঘাট, বিদ্যুৎ, পানি, গ্যাস, ও নিরাপত্তার নিশ্চয়তা।</p><p>মূল্য বৃদ্ধির আগে, আজই বুকিং করুন।</p>',
        ctaBar: '📞 এখনই যোগাযোগ করুন — সীমিত সময়ের অফার',
        mapImage: '/images/Project-roadmap.png'
    };

    const el = {
        title: document.getElementById('prokolpoTitle'),
        plots: document.getElementById('prokolpoPlots'),
        amenities: document.getElementById('prokolpoAmenities'),
        footerNote: document.getElementById('prokolpoFooterNote'),
        ctaBar: document.getElementById('prokolpoCtaBar'),
        mapImage: document.getElementById('prokolpoMapImage')
    };

    function readProjects(){
        try{ return JSON.parse(localStorage.getItem('ourProjectsSettings')||'{}'); }catch(e){ return {}; }
    }

    function readRoadmap(){
        try{ return JSON.parse(localStorage.getItem('roadmapSettings')||'{}'); }catch(e){ return {}; }
    }

    function apply(){
        const savedProjects = readProjects();
        const s = { ...defaults, ...savedProjects };

        if (el.title) el.title.textContent = s.offerTitle;

        if (el.plots) {
            el.plots.innerHTML = s.plots.map(p => `
                <div class="col-6">
                    <div class="plot-box">
                        <div class="plot-size">${p.size}</div>
                        <div class="category-label">${p.cat}</div>
                    </div>
                </div>
            `).join('');
        }

        if (el.amenities) {
            el.amenities.innerHTML = s.amenities.map(a => `<span class="category-label bg-success text-white">${a}</span>`).join('');
        }

        if (el.footerNote) el.footerNote.innerHTML = s.footerNote;
        if (el.ctaBar) el.ctaBar.innerHTML = s.ctaBar;
        if (el.mapImage && s.mapImage) el.mapImage.src = s.mapImage;

        // Disable dynamic roadmap rendering
        const existingRoadmapEl = document.getElementById('dynamicRoadmap');
        if (existingRoadmapEl) existingRoadmapEl.remove();
    }

    apply();
    window.addEventListener('storage', (e)=>{ if(e.key==='ourProjectsSettings' || e.key==='roadmapSettings'){ apply(); } });
    let lastProjects = localStorage.getItem('ourProjectsSettings');
    let lastRoadmap = localStorage.getItem('roadmapSettings');
    setInterval(()=>{
        const curProjects = localStorage.getItem('ourProjectsSettings');
        const curRoadmap = localStorage.getItem('roadmapSettings');
        if(curProjects!==lastProjects){ lastProjects=curProjects; apply(); }
        if(curRoadmap!==lastRoadmap){ lastRoadmap=curRoadmap; apply(); }
    }, 1000);
})();
</script>
