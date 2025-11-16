   <div id="overview" class="tab-content active">
                    <div class="stats-grid">
                        <div class="stat-card">
                            <div class="stat-card-content">
                                <div class="stat-info">
                                    <h3>মোট বুকিং</h3>
                                    <div class="value" id="statTotalBookings">0</div>
                                    <div class="subtitle">সর্বমোট গ্রাহক</div>
                                </div>
                                <div class="stat-icon blue"><i class="fas fa-users"></i></div>
                            </div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-card-content">
                                <div class="stat-info">
                                    <h3>সক্রিয় বুকিং</h3>
                                    <div class="value" id="statActiveBookings">0</div>
                                    <div class="subtitle">চলমান লেনদেন</div>
                                </div>
                                <div class="stat-icon green"><i class="fas fa-chart-line"></i></div>
                            </div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-card-content">
                                <div class="stat-info">
                                    <h3>মোট আয়</h3>
                                    <div class="value" id="statTotalRevenue">৳0L</div>
                                    <div class="subtitle">প্রাপ্ত অর্থ</div>
                                </div>
                                <div class="stat-icon yellow"><i class="fas fa-money-bill-wave"></i></div>
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
                </div>