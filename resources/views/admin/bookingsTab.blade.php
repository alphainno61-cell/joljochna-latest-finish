<div id="bookings" class="tab-content">
    <div class="stats-grid" style="grid-template-columns: 1fr;">
        <div class="stat-card" style="width: 100%;">
            <div class="stat-card-content" style="display: flex; justify-content: space-between; align-items: center; gap: 20px;">
                <div class="stat-info" style="flex: 1;">
                    <h3>বুকিং তথ্য</h3>
                    <div class="subtitle">ওয়েবসাইট থেকে জমা দেওয়া সকল বুকিং রিকোয়েস্ট দেখুন এবং পরিচালনা করুন</div>
                </div>
                <div class="stat-icon purple" style="flex-shrink: 0; margin-left: auto; font-size: 2.5rem;">📋</div>
            </div>
        </div>
    </div>

    <!-- Data Table -->
    <div style="overflow-x: auto; border: 1px solid #e2e8f0; border-radius: 0.75rem; margin-top: 1.5rem; background: white;">
        <table style="width: 100%; border-collapse: collapse;">
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
            <tbody id="bookingsTableBody">
                <tr>
                    <td colspan="8" style="text-align: center; padding: 3rem; color: #94a3b8;">
                        ডেটা লোড হচ্ছে...
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        (function(){
            async function loadBookings() {
                try {
                    const response = await fetch('/api/bookings');
                    if (!response.ok) throw new Error('Failed to fetch');
                    
                    const bookings = await response.json();
                    const tbody = document.getElementById('bookingsTableBody');
                    
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
                    document.getElementById('bookingsTableBody').innerHTML = `
                        <tr>
                            <td colspan="8" style="text-align: center; padding: 3rem; color: #ef4444;">
                                ডেটা লোড করতে ব্যর্থ হয়েছে
                            </td>
                        </tr>
                    `;
                }
            }
            
            // Load when bookings tab becomes active
            const observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    const bookingsTab = document.getElementById('bookings');
                    if (bookingsTab && bookingsTab.classList.contains('active')) {
                        loadBookings();
                        observer.disconnect();
                    }
                });
            });
            
            observer.observe(document.body, {
                attributes: true,
                subtree: true,
                attributeFilter: ['class']
            });
            
            // Also load immediately if already active
            if (document.getElementById('bookings')?.classList.contains('active')) {
                loadBookings();
            }
        })();
    </script>
</div>
