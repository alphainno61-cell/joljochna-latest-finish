@extends('layouts')

@section('content')
 <style>
    body {
      font-family: 'Noto Sans Bengali', sans-serif;
      color: #222;
      margin: 0;
      overflow-x: hidden;
    }

    /* Hero Section */
    .hero-section {
      height: 100vh;
      background: linear-gradient(to right, rgba(10, 77, 46, 0.8), rgba(10, 77, 46, 0.3)), url('https://images.unsplash.com/photo-1505691938895-1758d7feb511?auto=format&fit=crop&w=1500&q=80') center/cover no-repeat;
      background-size: cover;
      background-position: center;
      color: #fff;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 0 20px;
      position: relative;
    }

    .hero-section h1 {
      font-size: 3rem;
      font-weight: 700;
      color: #ffffff;
      text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
      margin-bottom: 15px;
      position: relative;
      z-index: 10;
    }

    .hero-section p {
      font-size: 1.3rem;
      margin-top: 10px;
      max-width: 700px;
      color: #ffffff;
      text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.5);
      line-height: 1.6;
      position: relative;
      z-index: 10;
    }

    /* Introduction Section */
    .intro-section {
      background-color: #f9f9f9;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 80px 10%;
      flex-wrap: wrap;
    }

    .intro-section img {
      width: 180px;
      border-radius: 10px;
    }

    .intro-section .text-content {
      max-width: 600px;
    }

    .intro-section h2 {
      font-size: 2.2rem;
      color: #0a4d2e;
      margin-bottom: 20px;
    }

    /* Title for Projects */
    .section-title {
      text-align: center;
      font-size: 2.5rem;
      color: #0a4d2e;
      margin: 80px 0 40px;
      font-weight: bold;
    }

    /* Project Section Layout */
    .project-section {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 80vh;
      padding: 60px 10%;
      flex-wrap: wrap;
    }

    .project-section:nth-child(even) {
      background-color: #f8f8f8;
    }

    .project-image {
      flex: 1;
      background-size: cover;
      background-position: center;
      min-height: 400px;
      border-radius: 20px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }

    .project-content {
      flex: 1;
      padding: 40px;
    }

    .project-content h3 {
      color: #0a4d2e;
      font-size: 2rem;
      margin-bottom: 15px;
    }

    .project-content p {
      font-size: 1.1rem;
      margin-bottom: 20px;
      line-height: 1.8;
    }

    .project-content .btn {
      background-color: #0a4d2e;
      color: #fff;
      padding: 10px 25px;
      border-radius: 8px;
      font-weight: 500;
      transition: 0.3s;
    }

    .project-content .btn:hover {
      background-color: #085737;
    }

    footer {
      background-color: #0a4d2e;
      color: #fff;
      text-align: center;
      padding: 20px 0;
      margin-top: 80px;
    }

    @media (max-width: 992px) {
      .project-section {
        flex-direction: column;
        text-align: center;
      }
      .project-content {
        padding: 20px;
      }
      .project-image {
        width: 100%;
        margin-bottom: 30px;
      }
    }
  </style>
  <!-- Hero Section -->
  <section id="projectsHeroSection" class="hero-section">
    <h1 id="projectsHeroTitle">আমাদের অন্যান্য প্রকল্প</h1>
    <p id="projectsHeroSubtitle">নেক্স রিয়েল এস্টেট এর অসাধারণ কিছু প্রকল্পের এক ঝলক।</p>
    <p id="projectsHeroContent" style="font-size: 1.1rem; margin-top: 10px; max-width: 800px;"></p>
  </section>

  <!-- Intro Section (Slogan) -->
  <section class="intro-section">
    <img id="projectsSloganLogo" src="https://cdn-icons-png.flaticon.com/512/3256/3256013.png" alt="Logo">
    <div class="text-content">
      <h2 id="projectsSloganTitle">বিশ্বাসের প্রতীক NEX Real Estate</h2>
      <p id="projectsSloganContent">আমরা বাংলাদেশে প্রিমিয়াম রিয়েল এস্টেট উন্নয়নে কাজ করছি। উন্নত মান, আইনি নিশ্চয়তা এবং আধুনিক সুবিধা দিয়ে প্রতিটি প্রকল্প তৈরি করা হয়েছে আপনার জীবনকে সুন্দর ও নিরাপদ করতে।</p>
    </div>
  </section>

  <!-- Title -->
  <h2 class="section-title">Some of Our Incredible Projects</h2>

  <!-- Dynamic Projects Container -->
  <div id="our-projects-dynamic-container">
    <!-- Projects will be loaded dynamically here -->
    </div>

  <!-- Pagination Container -->
  <div id="projects-pagination" style="display: none; text-align: center; margin: 40px 0; padding: 20px;">
    <!-- Pagination buttons will be added here -->
    </div>

  <style>
    body
    {
      font-family: 'Noto Sans Bengali', sans-serif;
      color: #222;
      margin: 0;
      overflow-x: hidden;
    }

    /* Hero Section */
    .hero-section {
      height: 100vh;
      background: linear-gradient(to right, rgba(10, 77, 46, 0.8), rgba(10, 77, 46, 0.3)), url('https://images.unsplash.com/photo-1505691938895-1758d7feb511?auto=format&fit=crop&w=1500&q=80') center/cover no-repeat;
      color: #fff;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 0 20px;
    }

    .hero-section h1 {
      font-size: 3rem;
      font-weight: 700;
    }

    .hero-section p {
      font-size: 1.3rem;
      margin-top: 10px;
      max-width: 700px;
    }

    /* Introduction Section */
    .intro-section {
      background-color: #f9f9f9;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 80px 10%;
      flex-wrap: wrap;
    }

    .intro-section img {
      width: 180px;
      border-radius: 10px;
    }

    .intro-section .text-content {
      max-width: 600px;
    }

    .intro-section h2 {
      font-size: 2.2rem;
      color: #0a4d2e;
      margin-bottom: 20px;
    }

    /* Title for Projects */
    .section-title {
      text-align: center;
      font-size: 2.5rem;
      color: #0a4d2e;
      margin: 80px 0 40px;
      font-weight: bold;
    }

    /* Project Section Layout */
    .project-section {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 80vh;
      padding: 60px 10%;
      flex-wrap: wrap;
    }

    .project-section:nth-child(even) {
      background-color: #f8f8f8;
    }

    .project-image {
      flex: 1;
      background-size: cover;
      background-position: center;
      min-height: 400px;
      border-radius: 20px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }

    .project-content {
      flex: 1;
      padding: 40px;
    }

    .project-content h3 {
      color: #0a4d2e;
      font-size: 2rem;
      margin-bottom: 15px;
    }

    .project-content p {
      font-size: 1.1rem;
      margin-bottom: 20px;
      line-height: 1.8;
    }

    .project-content .btn {
      background-color: #0a4d2e;
      color: #fff;
      padding: 10px 25px;
      border-radius: 8px;
      font-weight: 500;
      transition: 0.3s;
    }

    .project-content .btn:hover {
      background-color: #085737;
    }

    footer {
      background-color: #0a4d2e;
      color: #fff;
      text-align: center;
      padding: 20px 0;
      margin-top: 80px;
    }

    @media (max-width: 992px) {
      .project-section {
        flex-direction: column;
        text-align: center;
      }
      .project-content {
        padding: 20px;
      }
      .project-image {
        width: 100%;
        margin-bottom: 30px;
      }
    }

    @media (max-width: 768px) {
      .slide {
        min-width: 250px;
        height: 160px;
      }
    }

    /* Pagination Styles */
    .pagination-btn {
      display: inline-block;
      padding: 12px 20px;
      margin: 0 5px;
      background: #ffffff;
      color: #0a4d2e;
      border: 2px solid #0a4d2e;
      border-radius: 8px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s;
      font-size: 16px;
    }

    .pagination-btn:hover:not(:disabled) {
      background: #0a4d2e;
      color: #ffffff;
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(10, 77, 46, 0.3);
    }

    .pagination-btn.active {
      background: #0a4d2e;
      color: #ffffff;
      box-shadow: 0 4px 12px rgba(10, 77, 46, 0.4);
    }

    .pagination-btn:disabled {
      opacity: 0.5;
      cursor: not-allowed;
    }

    .pagination-info {
      display: inline-block;
      margin: 0 15px;
      color: #666;
      font-size: 15px;
      font-weight: 600;
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

      // Function to safely update image src
      function updateImage(id, imageUrl) {
          const el = document.getElementById(id);
          if (el && imageUrl) {
              el.src = imageUrl;
          }
      }

      // Function to update background image
      function updateHeroBackground(imageUrl) {
          const heroSection = document.getElementById('projectsHeroSection');
          if (heroSection && imageUrl) {
              heroSection.style.backgroundImage = `linear-gradient(to right, rgba(10, 77, 46, 0.8), rgba(10, 77, 46, 0.3)), url('${imageUrl}')`;
          }
      }

      // Check for preview data in localStorage
      function checkPreviewData() {
          try {
              // Check Hero Preview
              const heroPreview = localStorage.getItem('projectsPreview_hero');
              if (heroPreview) {
                  const heroData = JSON.parse(heroPreview);
                  if (heroData.title) updateText('projectsHeroTitle', heroData.title);
                  if (heroData.subtitle) updateText('projectsHeroSubtitle', heroData.subtitle);
                  if (heroData.content) updateText('projectsHeroContent', heroData.content);
                  if (heroData.image_url) updateHeroBackground(heroData.image_url);
                  return true; // Preview data found
              }

              // Check Slogan Preview
              const sloganPreview = localStorage.getItem('projectsPreview_slogan');
              if (sloganPreview) {
                  const sloganData = JSON.parse(sloganPreview);
                  if (sloganData.title) updateText('projectsSloganTitle', sloganData.title);
                  if (sloganData.content) updateText('projectsSloganContent', sloganData.content);
                  if (sloganData.logo_url) updateImage('projectsSloganLogo', sloganData.logo_url);
                  return true; // Preview data found
              }
          } catch(e) {
              console.error('Preview data error:', e);
          }
          return false;
      }

      // Load all project sections
      async function loadProjectContent() {
          // First check for preview data
          const hasPreview = checkPreviewData();
          
          try {
              // Load Hero Section from API
              const heroResponse = await fetch('/api/project-sections?section_key=hero');
              if (heroResponse.ok) {
                  const hero = await heroResponse.json();
                  if (hero && !localStorage.getItem('projectsPreview_hero')) {
                      updateText('projectsHeroTitle', hero.title);
                      updateText('projectsHeroSubtitle', hero.subtitle);
                      updateText('projectsHeroContent', hero.content);
                      if (hero.image_url) {
                          updateHeroBackground(hero.image_url);
                      }
                  }
              }

              // Load Slogan Section from API
              const sloganResponse = await fetch('/api/project-sections?section_key=slogan');
              if (sloganResponse.ok) {
                  const slogan = await sloganResponse.json();
                  if (slogan && !localStorage.getItem('projectsPreview_slogan')) {
                      updateText('projectsSloganTitle', slogan.title);
                      updateText('projectsSloganContent', slogan.content);
                      if (slogan.logo_url) {
                          updateImage('projectsSloganLogo', slogan.logo_url);
                      }
                  }
              }

          } catch (error) {
              console.error('Error loading project content:', error);
          }
      }

      // Load content on page load
      loadProjectContent();

      // Listen for updates from dashboard
      window.addEventListener('storage', function(e) {
          if (e.key === 'refreshProjectsPage') {
              loadProjectContent();
          }
          // Listen for preview updates
          if (e.key && e.key.startsWith('projectsPreview_')) {
              checkPreviewData();
          }
      });

      // Reload every 30 seconds to catch updates
      setInterval(loadProjectContent, 30000);

      // ==================== LOAD OUR PROJECTS WITH PAGINATION ====================
      
      let allProjects = [];
      let currentPage = 1;
      const projectsPerPage = 4;

      async function loadOurProjects() {
          try {
              const response = await fetch('/api/our-projects');
              if (response.ok) {
                  allProjects = await response.json();
                  console.log('Frontend loaded projects:', allProjects);
                  if (allProjects && allProjects.length > 0) {
                      currentPage = 1; // Reset to first page
                      renderOurProjects();
                      renderPagination();
                  } else {
                      console.log('No projects found');
                      document.getElementById('projects-pagination').style.display = 'none';
                  }
              } else {
                  console.error('Failed to fetch projects:', response.status);
              }
          } catch (error) {
              console.error('Error loading our projects:', error);
          }
      }

      function renderOurProjects() {
          const projects = getPaginatedProjects();
          const container = document.getElementById('our-projects-dynamic-container');
          if (!container) {
              console.error('Container not found');
              return;
          }

          container.innerHTML = '';
          console.log('Rendering', projects.length, 'projects');

          projects.forEach((project, index) => {
              try {
                  console.log(`Project ${index + 1} full data:`, project);
                  console.log(`Project ${index + 1} image_url:`, project.image_url);
                  console.log(`Project ${index + 1} image_path:`, project.image_path);
                  
                  const section = document.createElement('section');
                  section.className = 'project-section';
                  
                  // Alternate layout (even index = image left, odd index = image right)
                  const isReverse = index % 2 === 1;
                  
                  const imageDiv = document.createElement('div');
                  imageDiv.className = 'project-image';
                  
                  if (project.image_url) {
                      imageDiv.style.backgroundImage = `url('${project.image_url}')`;
                      console.log(`Set background image for project ${index + 1}:`, project.image_url);
                  } else if (project.image_path) {
                      // Fallback: construct URL from image_path
                      const imageUrl = '/storage/' + project.image_path;
                      imageDiv.style.backgroundImage = `url('${imageUrl}')`;
                      console.log(`Using fallback image path for project ${index + 1}:`, imageUrl);
                  } else {
                      console.warn(`Project ${index + 1} has no image - using placeholder`);
                      imageDiv.style.backgroundImage = `url('https://via.placeholder.com/1500x900/0a4d2e/ffffff?text=${encodeURIComponent(project.title || 'No Image')}')`;
                  }
                  
                  const contentDiv = document.createElement('div');
                  contentDiv.className = 'project-content';
                  
                  const title = document.createElement('h3');
                  title.textContent = project.title || 'Untitled Project';
                  
                  const description = document.createElement('p');
                  description.textContent = project.description || '';
                  
                  const ctaLink = document.createElement('a');
                  ctaLink.href = project.cta_link || '#';
                  ctaLink.className = 'btn';
                  ctaLink.textContent = project.cta_text || 'বিস্তারিত জানুন';
                  
                  contentDiv.appendChild(title);
                  contentDiv.appendChild(description);
                  contentDiv.appendChild(ctaLink);
                  
                  if (isReverse) {
                      section.appendChild(contentDiv);
                      section.appendChild(imageDiv);
                  } else {
                      section.appendChild(imageDiv);
                      section.appendChild(contentDiv);
                  }
                  
                  container.appendChild(section);
                  console.log('✓ Rendered project:', project.title);
              } catch (err) {
                  console.error('Error rendering project:', err);
              }
          });
      }

      // Get projects for current page
      function getPaginatedProjects() {
          const startIndex = (currentPage - 1) * projectsPerPage;
          const endIndex = startIndex + projectsPerPage;
          return allProjects.slice(startIndex, endIndex);
      }

      // Render pagination buttons
      function renderPagination() {
          const paginationContainer = document.getElementById('projects-pagination');
          if (!paginationContainer) return;

          const totalPages = Math.ceil(allProjects.length / projectsPerPage);

          // Hide pagination if only one page or less
          if (totalPages <= 1) {
              paginationContainer.style.display = 'none';
              return;
          }

          paginationContainer.style.display = 'block';
          paginationContainer.innerHTML = '';

          // Previous button
          const prevBtn = document.createElement('button');
          prevBtn.className = 'pagination-btn';
          prevBtn.textContent = '← পূর্ববর্তী';
          prevBtn.disabled = currentPage === 1;
          prevBtn.onclick = () => {
              if (currentPage > 1) {
                  currentPage--;
                  renderOurProjects();
                  renderPagination();
                  scrollToProjects();
              }
          };
          paginationContainer.appendChild(prevBtn);

          // Page info
          const pageInfo = document.createElement('span');
          pageInfo.className = 'pagination-info';
          pageInfo.textContent = `পৃষ্ঠা ${currentPage} / ${totalPages}`;
          paginationContainer.appendChild(pageInfo);

          // Next button
          const nextBtn = document.createElement('button');
          nextBtn.className = 'pagination-btn';
          nextBtn.textContent = 'পরবর্তী →';
          nextBtn.disabled = currentPage === totalPages;
          nextBtn.onclick = () => {
              if (currentPage < totalPages) {
                  currentPage++;
                  renderOurProjects();
                  renderPagination();
                  scrollToProjects();
              }
          };
          paginationContainer.appendChild(nextBtn);
      }

      // Scroll to projects section
      function scrollToProjects() {
          const container = document.getElementById('our-projects-dynamic-container');
          if (container) {
              container.scrollIntoView({ behavior: 'smooth', block: 'start' });
          }
      }

      // Load projects on page load
      loadOurProjects();

      // Listen for updates from dashboard
      window.addEventListener('storage', function(e) {
          if (e.key === 'refreshOurProjects') {
              loadOurProjects();
          }
      });

      // Reload every 30 seconds
      setInterval(loadOurProjects, 30000);

  })();
  </script>
@endsection
