<?php
require_once 'config.php';
$pageTitle = "Locations - Burger Junction";
include 'header.php';
?>

<style>
    .locations-hero {
        background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('menu.jpeg') center/cover no-repeat;
        color: white;
        text-align: center;
        padding: 5rem 1rem 4rem;
    }

    .locations-hero h1 {
        font-size: 3.2rem;
        margin-bottom: 0.8rem;
        text-shadow: 2px 2px 8px rgba(0,0,0,0.6);
    }

    .locations-hero p {
        font-size: 1.3rem;
        max-width: 700px;
        margin: 0 auto;
        opacity: 0.95;
    }

    .locations-main {
        padding: 3rem 0 5rem;
        background: #f8f8f8;
    }

    .locations-wrapper {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(330px, 1fr));
        gap: 2rem;
    }

    .location-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        transition: all 0.32s ease;
        border: 1px solid #eee;
    }

    .location-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 16px 36px rgba(0,0,0,0.14);
        border-color: #c82333;
    }

    .location-header {
        background: linear-gradient(135deg, #c82333, #e84c5e);
        color: white;
        padding: 2rem 1.5rem;
    }

    .location-name {
        font-size: 1.6rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
    }

    .location-type {
        font-size: 0.95rem;
        opacity: 0.9;
        display: inline-block;
        background: rgba(255,255,255,0.2);
        padding: 0.4rem 1rem;
        border-radius: 20px;
    }

    .location-content {
        padding: 1.8rem 1.5rem;
    }

    .location-info {
        display: flex;
        gap: 1rem;
        margin-bottom: 1.5rem;
        align-items: flex-start;
    }

    .info-icon {
        font-size: 1.5rem;
        min-width: 30px;
    }

    .info-text strong {
        display: block;
        color: #222;
        margin-bottom: 0.4rem;
        font-weight: 700;
    }

    .info-text {
        color: #666;
        line-height: 1.6;
        font-size: 0.95rem;
    }

    .location-hours {
        background: #f0f0f0;
        padding: 1.2rem;
        border-radius: 10px;
        margin-bottom: 1.5rem;
    }

    .hours-title {
        font-weight: 700;
        color: #222;
        margin-bottom: 0.7rem;
        font-size: 0.95rem;
    }

    .hours-list {
        font-size: 0.9rem;
        color: #666;
        line-height: 1.7;
    }

    .location-actions {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .action-btn {
        flex: 1;
        min-width: 140px;
        padding: 0.85rem 1rem;
        border: none;
        border-radius: 10px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 0.95rem;
    }

    .btn-primary {
        background: #c82333;
        color: white;
    }

    .btn-primary:hover {
        background: #b21e2c;
        transform: translateY(-2px);
    }

    .btn-secondary {
        background: #f0f0f0;
        color: #c82333;
        border: 2px solid #c82333;
    }

    .btn-secondary:hover {
        background: #c82333;
        color: white;
    }

    .map-container {
        margin-top: 2rem;
        border-radius: 10px;
        overflow: hidden;
        height: 280px;
        background: #e0e0e0;
    }

    .map-placeholder {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #999;
        font-size: 1.1rem;
    }

    .search-filter {
        background: white;
        padding: 1.5rem;
        border-radius: 12px;
        margin-bottom: 2rem;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    }

    .search-filter input {
        width: 100%;
        padding: 0.85rem 1.2rem;
        border: 2px solid #ddd;
        border-radius: 8px;
        font-size: 1rem;
        transition: all 0.2s ease;
    }

    .search-filter input:focus {
        outline: none;
        border-color: #c82333;
        box-shadow: 0 0 8px rgba(200, 35, 51, 0.2);
    }

    /* Responsive - Tablet (768px) */
    @media (max-width: 768px) {
        .locations-hero {
            padding: 4rem 1rem 3rem;
        }

        .locations-hero h1 {
            font-size: 2.5rem;
        }

        .locations-hero p {
            font-size: 1.1rem;
        }

        .search-filter {
            margin-bottom: 1.5rem;
        }

        .search-filter input {
            padding: 0.75rem 1rem;
            font-size: 1rem;
        }

        .locations-wrapper {
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        .location-card {
            border-radius: 14px;
        }

        .location-header {
            padding: 1.5rem 1.2rem;
        }

        .location-name {
            font-size: 1.4rem;
        }

        .location-type {
            font-size: 0.9rem;
        }

        .location-content {
            padding: 1.5rem;
        }

        .location-info {
            gap: 0.9rem;
            margin-bottom: 1.2rem;
        }

        .info-icon {
            font-size: 1.3rem;
            min-width: 28px;
        }

        .info-text {
            font-size: 0.9rem;
        }

        .location-hours {
            padding: 1rem;
            margin-bottom: 1rem;
        }

        .hours-title {
            font-size: 0.9rem;
            margin-bottom: 0.6rem;
        }

        .hours-list {
            font-size: 0.85rem;
        }

        .location-actions {
            flex-direction: column;
            gap: 0.8rem;
        }

        .action-btn {
            width: 100%;
            padding: 0.8rem 1rem;
            font-size: 0.9rem;
        }

        .map-container {
            height: 220px;
        }
    }

    /* Responsive - Mobile (576px and below) */
    @media (max-width: 576px) {
        .locations-hero {
            padding: 3rem 1rem 2.5rem;
        }

        .locations-hero h1 {
            font-size: 1.8rem;
        }

        .locations-hero p {
            font-size: 0.95rem;
        }

        .locations-main {
            padding: 2rem 0 3rem;
        }

        .search-filter {
            background: white;
            padding: 1.2rem 1rem;
            border-radius: 10px;
            margin: 0 1rem 1.5rem 1rem;
        }

        .search-filter input {
            padding: 0.7rem 1rem;
            font-size: 16px;
            border-radius: 8px;
        }

        .locations-wrapper {
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .location-card {
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        .location-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 24px rgba(0,0,0,0.12);
        }

        .location-header {
            padding: 1.2rem 1rem;
            background: linear-gradient(135deg, #c82333, #e84c5e);
        }

        .location-name {
            font-size: 1.2rem;
            margin-bottom: 0.4rem;
        }

        .location-type {
            font-size: 0.8rem;
            padding: 0.3rem 0.7rem;
        }

        .location-content {
            padding: 1rem;
        }

        .location-info {
            gap: 0.8rem;
            margin-bottom: 1rem;
        }

        .info-icon {
            font-size: 1.2rem;
            min-width: 24px;
        }

        .info-text {
            font-size: 0.9rem;
        }

        .info-text strong {
            font-size: 0.9rem;
        }

        .location-hours {
            background: #f5f5f5;
            padding: 0.9rem;
            border-radius: 8px;
            margin-bottom: 0.9rem;
        }

        .hours-title {
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .hours-list {
            font-size: 0.85rem;
            line-height: 1.6;
        }

        .location-actions {
            display: flex;
            flex-direction: column;
            gap: 0.7rem;
        }

        .action-btn {
            width: 100%;
            padding: 0.75rem 1rem;
            font-size: 0.9rem;
            border-radius: 8px;
        }

        .btn-primary {
            order: 1;
        }

        .btn-secondary {
            order: 2;
        }

        .map-container {
            height: 180px;
            margin-top: 1rem;
        }

        .map-placeholder {
            font-size: 1rem;
        }
    }

    /* Extra small screens (360px and below) */
    @media (max-width: 360px) {
        .locations-hero h1 {
            font-size: 1.5rem;
        }

        .locations-hero p {
            font-size: 0.9rem;
        }

        .search-filter {
            margin: 0 0.75rem 1.2rem 0.75rem;
            padding: 1rem;
        }

        .location-card {
            margin: 0 0.5rem;
        }

        .location-name {
            font-size: 1.1rem;
        }

        .action-btn {
            padding: 0.7rem 0.8rem;
            font-size: 0.85rem;
        }

        .map-container {
            height: 150px;
        }
    }
</style>

<main class="main-content">
    <section class="locations-hero">
        <div class="container">
            <h1>Our Locations</h1>
            <p>Find the nearest Burger Junction location and visit us today!</p>
        </div>
    </section>

    <section class="locations-main">
        <div class="container">
            <!-- Search Filter -->
            <div class="search-filter">
                <input type="text" id="locationSearch" placeholder="Search by location name or area...">
            </div>

            <div class="locations-wrapper">
                <!-- Downtown Junction -->
                <div class="location-card" data-location="Downtown Junction">
                    <div class="location-header">
                        <div class="location-name">Downtown Junction</div>
                        <span class="location-type">Main Branch</span>
                    </div>
                    <div class="location-content">
                        <div class="location-info">
                            <span class="info-icon">📍</span>
                            <div class="info-text">
                                <strong>Address</strong>
                                123 Main Street, City Center<br>
                                Zip Code: 110001
                            </div>
                        </div>
                        <div class="location-info">
                            <span class="info-icon">📞</span>
                            <div class="info-text">
                                <strong>Phone</strong>
                                +91 98765 43210
                            </div>
                        </div>
                        <div class="location-info">
                            <span class="info-icon">📧</span>
                            <div class="info-text">
                                <strong>Email</strong>
                                downtown@burgerjunction.com
                            </div>
                        </div>
                        <div class="location-hours">
                            <div class="hours-title">📅 Working Hours</div>
                            <div class="hours-list">
                                Monday - Friday: 11:00 AM - 11:00 PM<br>
                                Saturday - Sunday: 10:00 AM - 12:00 AM
                            </div>
                        </div>
                        <div class="location-actions">
                            <button class="action-btn btn-primary" onclick="openMaps('123 Main Street, City Center')">Get Directions</button>
                            <button class="action-btn btn-secondary" onclick="openMenu()">Order Now</button>
                        </div>
                    </div>
                </div>

                <!-- Westside Plaza -->
                <div class="location-card" data-location="Westside Plaza">
                    <div class="location-header">
                        <div class="location-name">Westside Plaza</div>
                        <span class="location-type">Premium Location</span>
                    </div>
                    <div class="location-content">
                        <div class="location-info">
                            <span class="info-icon">📍</span>
                            <div class="info-text">
                                <strong>Address</strong>
                                456 West Avenue, Shopping District<br>
                                Zip Code: 110002
                            </div>
                        </div>
                        <div class="location-info">
                            <span class="info-icon">📞</span>
                            <div class="info-text">
                                <strong>Phone</strong>
                                +91 98765 43211
                            </div>
                        </div>
                        <div class="location-info">
                            <span class="info-icon">📧</span>
                            <div class="info-text">
                                <strong>Email</strong>
                                westside@burgerjunction.com
                            </div>
                        </div>
                        <div class="location-hours">
                            <div class="hours-title">📅 Working Hours</div>
                            <div class="hours-list">
                                Monday - Friday: 10:00 AM - 11:30 PM<br>
                                Saturday - Sunday: 9:00 AM - 12:30 AM
                            </div>
                        </div>
                        <div class="location-actions">
                            <button class="action-btn btn-primary" onclick="openMaps('456 West Avenue, Shopping District')">Get Directions</button>
                            <button class="action-btn btn-secondary" onclick="openMenu()">Order Now</button>
                        </div>
                    </div>
                </div>

                <!-- North Gate Hub -->
                <div class="location-card" data-location="North Gate Hub">
                    <div class="location-header">
                        <div class="location-name">North Gate Hub</div>
                        <span class="location-type">Express Service</span>
                    </div>
                    <div class="location-content">
                        <div class="location-info">
                            <span class="info-icon">📍</span>
                            <div class="info-text">
                                <strong>Address</strong>
                                789 North Road, Gate Plaza<br>
                                Zip Code: 110003
                            </div>
                        </div>
                        <div class="location-info">
                            <span class="info-icon">📞</span>
                            <div class="info-text">
                                <strong>Phone</strong>
                                +91 98765 43212
                            </div>
                        </div>
                        <div class="location-info">
                            <span class="info-icon">📧</span>
                            <div class="info-text">
                                <strong>Email</strong>
                                northgate@burgerjunction.com
                            </div>
                        </div>
                        <div class="location-hours">
                            <div class="hours-title">📅 Working Hours</div>
                            <div class="hours-list">
                                Monday - Sunday: 11:00 AM - 11:00 PM<br>
                                Special Hours on Holidays
                            </div>
                        </div>
                        <div class="location-actions">
                            <button class="action-btn btn-primary" onclick="openMaps('789 North Road, Gate Plaza')">Get Directions</button>
                            <button class="action-btn btn-secondary" onclick="openMenu()">Order Now</button>
                        </div>
                    </div>
                </div>

                <!-- South Point Mall -->
                <div class="location-card" data-location="South Point Mall">
                    <div class="location-header">
                        <div class="location-name">South Point Mall</div>
                        <span class="location-type">Food Court</span>
                    </div>
                    <div class="location-content">
                        <div class="location-info">
                            <span class="info-icon">📍</span>
                            <div class="info-text">
                                <strong>Address</strong>
                                321 South Complex, Mall Area<br>
                                Zip Code: 110004
                            </div>
                        </div>
                        <div class="location-info">
                            <span class="info-icon">📞</span>
                            <div class="info-text">
                                <strong>Phone</strong>
                                +91 98765 43213
                            </div>
                        </div>
                        <div class="location-info">
                            <span class="info-icon">📧</span>
                            <div class="info-text">
                                <strong>Email</strong>
                                southpoint@burgerjunction.com
                            </div>
                        </div>
                        <div class="location-hours">
                            <div class="hours-title">📅 Working Hours</div>
                            <div class="hours-list">
                                Monday - Thursday: 11:00 AM - 10:00 PM<br>
                                Friday - Sunday: 11:00 AM - 11:00 PM
                            </div>
                        </div>
                        <div class="location-actions">
                            <button class="action-btn btn-primary" onclick="openMaps('321 South Complex, Mall Area')">Get Directions</button>
                            <button class="action-btn btn-secondary" onclick="openMenu()">Order Now</button>
                        </div>
                    </div>
                </div>

                <!-- East Side Corner -->
                <div class="location-card" data-location="East Side Corner">
                    <div class="location-header">
                        <div class="location-name">East Side Corner</div>
                        <span class="location-type">Quick Service</span>
                    </div>
                    <div class="location-content">
                        <div class="location-info">
                            <span class="info-icon">📍</span>
                            <div class="info-text">
                                <strong>Address</strong>
                                654 East Lane, Business District<br>
                                Zip Code: 110005
                            </div>
                        </div>
                        <div class="location-info">
                            <span class="info-icon">📞</span>
                            <div class="info-text">
                                <strong>Phone</strong>
                                +91 98765 43214
                            </div>
                        </div>
                        <div class="location-info">
                            <span class="info-icon">📧</span>
                            <div class="info-text">
                                <strong>Email</strong>
                                eastside@burgerjunction.com
                            </div>
                        </div>
                        <div class="location-hours">
                            <div class="hours-title">📅 Working Hours</div>
                            <div class="hours-list">
                                Monday - Friday: 12:00 PM - 10:00 PM<br>
                                Saturday - Sunday: 11:00 AM - 10:00 PM
                            </div>
                        </div>
                        <div class="location-actions">
                            <button class="action-btn btn-primary" onclick="openMaps('654 East Lane, Business District')">Get Directions</button>
                            <button class="action-btn btn-secondary" onclick="openMenu()">Order Now</button>
                        </div>
                    </div>
                </div>

                <!-- Central Station Outlet -->
                <div class="location-card" data-location="Central Station Outlet">
                    <div class="location-header">
                        <div class="location-name">Central Station Outlet</div>
                        <span class="location-type">High Traffic</span>
                    </div>
                    <div class="location-content">
                        <div class="location-info">
                            <span class="info-icon">📍</span>
                            <div class="info-text">
                                <strong>Address</strong>
                                987 Central Station, Transit Hub<br>
                                Zip Code: 110006
                            </div>
                        </div>
                        <div class="location-info">
                            <span class="info-icon">📞</span>
                            <div class="info-text">
                                <strong>Phone</strong>
                                +91 98765 43215
                            </div>
                        </div>
                        <div class="location-info">
                            <span class="info-icon">📧</span>
                            <div class="info-text">
                                <strong>Email</strong>
                                station@burgerjunction.com
                            </div>
                        </div>
                        <div class="location-hours">
                            <div class="hours-title">📅 Working Hours</div>
                            <div class="hours-list">
                                Daily: 6:00 AM - 11:30 PM<br>
                                Always Open for Travelers
                            </div>
                        </div>
                        <div class="location-actions">
                            <button class="action-btn btn-primary" onclick="openMaps('987 Central Station, Transit Hub')">Get Directions</button>
                            <button class="action-btn btn-secondary" onclick="openMenu()">Order Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
    function openMaps(address) {
        const mapsUrl = `https://www.google.com/maps/search/${encodeURIComponent(address)}`;
        window.open(mapsUrl, '_blank');
    }

    function openMenu() {
        window.location.href = 'menu.php';
    }

    // Search filter
    document.getElementById('locationSearch').addEventListener('input', function(e) {
        const searchText = e.target.value.toLowerCase();
        document.querySelectorAll('.location-card').forEach(card => {
            const locationName = card.dataset.location.toLowerCase();
            card.style.display = locationName.includes(searchText) ? 'block' : 'none';
        });
    });
</script>

<?php include 'footer.php'; ?>
