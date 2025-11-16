   <div id="overview" class="tab-content active">
                    <div class="stats-grid">
                        <div class="stat-card">
                            <div class="stat-card-content">
                                <div class="stat-info">
                                    <h3>মোট বুকিং</h3>
                                    <div class="value" id="statTotalBookings">0</div>
                                    <div class="subtitle">সর্বমোট গ্রাহক</div>
                                </div>
                                <div class="stat-icon blue">👥</div>
                            </div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-card-content">
                                <div class="stat-info">
                                    <h3>সক্রিয় বুকিং</h3>
                                    <div class="value" id="statActiveBookings">0</div>
                                    <div class="subtitle">চলমান লেনদেন</div>
                                </div>
                                <div class="stat-icon green">📈</div>
                            </div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-card-content">
                                <div class="stat-info">
                                    <h3>মোট আয়</h3>
                                    <div class="value" id="statTotalRevenue">৳0L</div>
                                    <div class="subtitle">প্রাপ্ত অর্থ</div>
                                </div>
                                <div class="stat-icon yellow">💰</div>
                            </div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-card-content">
                                <div class="stat-info">
                                    <h3>উপলব্ধ প্লট</h3>
                                    <div class="value" id="statAvailablePlots">0</div>
                                    <div class="subtitle">বিক্রয়ের জন্য</div>
                                </div>
                                <div class="stat-icon purple">🏘️</div>
                            </div>
                        </div>
                    </div>

                    <div class="charts-grid">
                        <div class="chart-card">
                            <h3>মাসিক বিক্রয়</h3>
                            <div class="chart-container">
                                <canvas id="salesChart"></canvas>
                            </div>
                        </div>

                        <div class="chart-card">
                            <h3>আয়ের প্রবণতা</h3>
                            <div class="chart-container">
                                <canvas id="revenueChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="charts-grid">
                        <div class="chart-card">
                            <h3>প্লট বিতরণ</h3>
                            <div class="chart-container">
                                <canvas id="plotChart"></canvas>
                            </div>
                        </div>

                        <div class="chart-card">
                            <h3>সাম্প্রতিক বুকিং</h3>
                            <div id="recentBookings">
                                <!-- Recent bookings list populated by JS -->
                            </div>
                        </div>
                    </div>

                    <!-- Bookings Collapsible Section -->
                    <div class="collapsible-section" style="margin-top: 2rem;">
                        <button class="collapsible-header" onclick="toggleBookingsSection()" style="width: 100%; display: flex; justify-content: space-between; align-items: center; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 1.25rem 1.5rem; border: none; border-radius: 0.75rem; font-size: 1.125rem; font-weight: 600; cursor: pointer; box-shadow: 0 4px 6px rgba(0,0,0,0.1); transition: all 0.3s ease;">
                            <span>📋 বুকিং তথ্য</span>
                            <svg id="bookingsChevron" style="width: 24px; height: 24px; transition: transform 0.3s ease;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        
                        <div id="bookingsContent" style="display: none; margin-top: 1rem; background: white; border-radius: 0.75rem; padding: 1.5rem; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
                            <p style="color:#6b7280; margin-bottom:20px;">ওয়েবসাইট থেকে জমা দেওয়া সকল বুকিং রিকোয়েস্ট দেখুন এবং পরিচালনা করুন</p>
                            
                            <!-- Data Table -->
                            <div style="overflow-x: auto; border: 1px solid #e2e8f0; border-radius: 0.75rem;">
                                <table style="width: 100%; border-collapse: collapse; background: white;">
                                    <thead>
                                        <tr style="background: #f8fafc;">
                                            <th style="padding: 1rem; text-align: left; font-weight: 600; color: #475569; font-size: 0.875rem; border-bottom: 2px solid #e2e8f0;">#</th>
                                            <th style="padding: 1rem; text-align: left; font-weight: 600; color: #475569; font-size: 0.875rem; border-bottom: 2px solid #e2e8f0;">নাম</th>
                                            <th style="padding: 1rem; text-align: left; font-weight: 600; color: #475569; font-size: 0.875rem; border-bottom: 2px solid #e2e8f0;">ফোন নম্বর</th>
                                            <th style="padding: 1rem; text-align: left; font-weight: 600; color: #475569; font-size: 0.875rem; border-bottom: 2px solid #e2e8f0;">ইমেইল</th>
                                            <th style="padding: 1rem; text-align: left; font-weight: 600; color: #475569; font-size: 0.875rem; border-bottom: 2px solid #e2e8f0;">প্লট সাইজ</th>
                                            <th style="padding: 1rem; text-align: left; font-weight: 600; color: #475569; font-size: 0.875rem; border-bottom: 2px solid #e2e8f0;">বার্তা</th>
                                            <th style="padding: 1rem; text-align: left; font-weight: 600; color: #475569; font-size: 0.875rem; border-bottom: 2px solid #e2e8f0;">স্ট্যাটাস</th>
                                            <th style="padding: 1rem; text-align: left; font-weight: 600; color: #475569; font-size: 0.875rem; border-bottom: 2px solid #e2e8f0;">জমার তারিখ</th>
                                        </tr>
                                    </thead>
                                    <tbody id="overviewBookingsTableBody">
                                        <tr>
                                            <td colspan="8" style="text-align: center; padding: 3rem; color: #94a3b8;">
                                                ডেটা লোড হচ্ছে...
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <script>
                        function toggleBookingsSection() {
                            const content = document.getElementById('bookingsContent');
                            const chevron = document.getElementById('bookingsChevron');
                            
                            if (content.style.display === 'none') {
                                content.style.display = 'block';
                                chevron.style.transform = 'rotate(180deg)';
                                loadOverviewBookings();
                            } else {
                                content.style.display = 'none';
                                chevron.style.transform = 'rotate(0deg)';
                            }
                        }

                        async function loadOverviewBookings() {
                            try {
                                const response = await fetch('/api/bookings');
                                if (!response.ok) throw new Error('Failed to fetch');
                                
                                const bookings = await response.json();
                                const tbody = document.getElementById('overviewBookingsTableBody');
                                
                                if (bookings.length === 0) {
                                    tbody.innerHTML = `
                                        <tr>
                                            <td colspan="8" style="text-align: center; padding: 3rem; color: #94a3b8;">
                                                কোন বুকিং পাওয়া যায়নি
                                            </td>
                                        </tr>
                                    `;
                                    return;
                                }
                                
                                tbody.innerHTML = bookings.map((booking, index) => {
                                    const statusColors = {
                                        'pending': { bg: '#fef3c7', color: '#92400e', text: 'পেন্ডিং' },
                                        'contacted': { bg: '#dbeafe', color: '#1e40af', text: 'যোগাযোগ করা হয়েছে' },
                                        'completed': { bg: '#d1fae5', color: '#065f46', text: 'সম্পন্ন' }
                                    };
                                    const status = statusColors[booking.status] || statusColors.pending;
                                    
                                    const date = new Date(booking.created_at);
                                    const formattedDate = date.toLocaleDateString('bn-BD', {
                                        year: 'numeric',
                                        month: 'short',
                                        day: 'numeric'
                                    });
                                    
                                    return `
                                        <tr style="border-bottom: 1px solid #f1f5f9;">
                                            <td style="padding: 1rem; font-size: 0.875rem; color: #334155;">${index + 1}</td>
                                            <td style="padding: 1rem; font-size: 0.875rem; color: #334155;"><strong>${booking.name}</strong></td>
                                            <td style="padding: 1rem; font-size: 0.875rem; color: #334155;">
                                                <a href="tel:${booking.phone}" style="color: #3b82f6; text-decoration: none;">${booking.phone}</a>
                                            </td>
                                            <td style="padding: 1rem; font-size: 0.875rem; color: #334155;">
                                                <a href="mailto:${booking.email}" style="color: #3b82f6; text-decoration: none;">${booking.email}</a>
                                            </td>
                                            <td style="padding: 1rem; font-size: 0.875rem; color: #334155;">${booking.plot_size || '-'}</td>
                                            <td style="padding: 1rem; font-size: 0.875rem; color: #334155; max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">${booking.message || '-'}</td>
                                            <td style="padding: 1rem; font-size: 0.875rem; color: #334155;">
                                                <span style="display: inline-flex; align-items: center; padding: 0.375rem 0.875rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 600; background: ${status.bg}; color: ${status.color};">
                                                    ${status.text}
                                                </span>
                                            </td>
                                            <td style="padding: 1rem; font-size: 0.875rem; color: #64748b;">${formattedDate}</td>
                                        </tr>
                                    `;
                                }).join('');
                            } catch (error) {
                                console.error('Error loading bookings:', error);
                                document.getElementById('overviewBookingsTableBody').innerHTML = `
                                    <tr>
                                        <td colspan="8" style="text-align: center; padding: 3rem; color: #ef4444;">
                                            ডেটা লোড করতে ব্যর্থ হয়েছে
                                        </td>
                                    </tr>
                                `;
                            }
                        }
                    </script>
                </div>