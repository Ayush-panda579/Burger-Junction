<?php
require_once 'config.php';
$pageTitle = "Home - Burger Junction";
include 'header.php';
?>

<style>
    /* ==================== HOME PAGE STYLES ==================== */
    
    .hero-section {
        background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url('banner.png') center/cover no-repeat;
        color: white;
        text-align: center;
        padding: 6rem 1rem 5rem;
        min-height: 500px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .hero-content h1 {
        font-size: 3.5rem;
        margin-bottom: 1rem;
        text-shadow: 3px 3px 10px rgba(0,0,0,0.7);
        font-weight: 800;
    }

    .hero-content p {
        font-size: 1.4rem;
        margin-bottom: 2rem;
        opacity: 0.95;
        text-shadow: 2px 2px 5px rgba(0,0,0,0.6);
    }

    .cta-buttons {
        display: flex;
        gap: 1.5rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    .cta-btn {
        background: #c82333;
        color: white;
        padding: 1rem 2.5rem;
        font-size: 1.1rem;
        font-weight: 700;
        border: none;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .cta-btn:hover {
        background: #b21e2c;
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(200, 35, 51, 0.4);
    }

    .cta-btn.secondary {
        background: white;
        color: #c82333;
    }

    .cta-btn.secondary:hover {
        background: #f0f0f0;
    }

    /* Features Section */
    .features-section {
        padding: 4rem 1rem;
        background: white;
    }

    .section-title {
        font-size: 2.5rem;
        text-align: center;
        color: #222;
        margin-bottom: 3rem;
        font-weight: 800;
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2rem;
        margin-bottom: 3rem;
    }

    .feature-card {
        background: #f8f8f8;
        padding: 2rem;
        border-radius: 12px;
        text-align: center;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .feature-card:hover {
        transform: translateY(-8px);
        border-color: #c82333;
        box-shadow: 0 12px 30px rgba(0,0,0,0.1);
    }

    .feature-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
    }

    .feature-card h3 {
        font-size: 1.3rem;
        color: #c82333;
        margin-bottom: 0.5rem;
        font-weight: 700;
    }

    .feature-card p {
        color: #666;
        line-height: 1.6;
    }

    /* Locations Section */
    .locations-section {
        padding: 4rem 1rem;
        background: #f8f8f8;
    }

    .locations-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
    }

    .location-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
    }

    .location-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 16px 35px rgba(0,0,0,0.15);
    }

    .location-header {
        background: linear-gradient(135deg, #c82333, #e84c5e);
        color: white;
        padding: 1.5rem;
    }

    .location-name {
        font-size: 1.5rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
    }

    .location-type {
        font-size: 0.9rem;
        opacity: 0.9;
    }

    .location-body {
        padding: 1.5rem;
    }

    .location-info {
        margin-bottom: 1.2rem;
        display: flex;
        gap: 0.8rem;
        align-items: flex-start;
    }

    .location-icon {
        font-size: 1.3rem;
        min-width: 24px;
    }

    .location-details {
        font-size: 0.95rem;
        color: #555;
        line-height: 1.5;
    }

    .location-details strong {
        color: #222;
        display: block;
        margin-bottom: 0.3rem;
    }

    .location-hours {
        background: #f8f8f8;
        padding: 1rem;
        border-radius: 8px;
        font-size: 0.9rem;
        color: #666;
        margin-bottom: 1rem;
    }

    .location-btn {
        width: 100%;
        background: #c82333;
        color: white;
        padding: 0.8rem;
        border: none;
        border-radius: 8px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .location-btn:hover {
        background: #b21e2c;
    }

    /* Highlights Section */
    .highlights-section {
        padding: 4rem 1rem;
        background: white;
    }

    .highlights-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
    }

    .highlight-item {
        text-align: center;
    }

    .highlight-number {
        font-size: 2.5rem;
        font-weight: 800;
        color: #c82333;
        margin-bottom: 0.5rem;
    }

    .highlight-label {
        font-size: 1rem;
        color: #666;
        font-weight: 600;
    }

    /* CTA Section */
    .cta-section {
        background: linear-gradient(135deg, #c82333, #e84c5e);
        color: white;
        padding: 3rem 1rem;
        text-align: center;
    }

    .cta-section h2 {
        font-size: 2rem;
        margin-bottom: 1.5rem;
        font-weight: 800;
    }

    .cta-section p {
        font-size: 1.1rem;
        margin-bottom: 2rem;
        opacity: 0.95;
    }

    .cta-section .cta-btn {
        background: white;
        color: #c82333;
        font-size: 1rem;
    }

    .cta-section .cta-btn:hover {
        background: #f0f0f0;
    }

    /* Responsive - Tablet (768px) */
    @media (max-width: 768px) {
        .hero-section {
            padding: 4rem 1rem 3rem;
            min-height: 400px;
        }

        .hero-content h1 {
            font-size: 2.5rem;
            margin-bottom: 0.8rem;
        }

        .hero-content p {
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
        }

        .cta-buttons {
            flex-direction: column;
            gap: 1rem;
        }

        .cta-btn {
            width: 100%;
            padding: 0.9rem 2rem;
            font-size: 1rem;
        }

        .section-title {
            font-size: 2rem;
            margin-bottom: 2.5rem;
        }

        .features-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        .locations-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        .highlights-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        .feature-card {
            padding: 1.5rem;
        }

        .feature-icon {
            font-size: 2.5rem;
        }

        .feature-card h3 {
            font-size: 1.2rem;
        }

        .location-header {
            padding: 1.2rem;
        }

        .location-name {
            font-size: 1.3rem;
        }

        .location-body {
            padding: 1.2rem;
        }

        .cta-section {
            padding: 2.5rem 1rem;
        }

        .cta-section h2 {
            font-size: 1.7rem;
            margin-bottom: 1rem;
        }

        .cta-section p {
            font-size: 1rem;
            margin-bottom: 1.5rem;
        }
    }

    /* Responsive - Mobile (576px and below) */
    @media (max-width: 576px) {
        .hero-section {
            padding: 3rem 1rem 2.5rem;
            min-height: 320px;
        }

        .hero-content h1 {
            font-size: 1.8rem;
            margin-bottom: 0.6rem;
        }

        .hero-content p {
            font-size: 0.95rem;
            margin-bottom: 1.2rem;
        }

        .cta-buttons {
            gap: 0.8rem;
        }

        .cta-btn {
            padding: 0.8rem 1.5rem;
            font-size: 0.95rem;
            border-radius: 8px;
        }

        .features-section {
            padding: 2.5rem 1rem;
        }

        .section-title {
            font-size: 1.6rem;
            margin-bottom: 2rem;
        }

        .features-grid {
            grid-template-columns: 1fr;
            gap: 1.2rem;
        }

        .feature-card {
            padding: 1.2rem;
            border-radius: 10px;
        }

        .feature-icon {
            font-size: 2.2rem;
            margin-bottom: 0.8rem;
        }

        .feature-card h3 {
            font-size: 1.1rem;
            margin-bottom: 0.4rem;
        }

        .feature-card p {
            font-size: 0.9rem;
            line-height: 1.5;
        }

        .locations-section {
            padding: 2.5rem 1rem;
        }

        .locations-grid {
            grid-template-columns: 1fr;
            gap: 1.2rem;
        }

        .location-card {
            border-radius: 12px;
        }

        .location-header {
            padding: 1rem;
        }

        .location-name {
            font-size: 1.2rem;
        }

        .location-type {
            font-size: 0.8rem;
            padding: 0.3rem 0.7rem;
        }

        .location-body {
            padding: 1rem;
        }

        .location-info {
            margin-bottom: 1rem;
            gap: 0.8rem;
        }

        .location-icon {
            font-size: 1.2rem;
            min-width: 20px;
        }

        .location-details {
            font-size: 0.9rem;
        }

        .location-details strong {
            font-size: 0.9rem;
        }

        .location-hours {
            padding: 0.9rem;
            margin-bottom: 0.9rem;
            font-size: 0.85rem;
        }

        .location-btn {
            padding: 0.75rem 0.8rem;
            font-size: 0.9rem;
        }

        .highlights-section {
            padding: 2.5rem 1rem;
        }

        .highlights-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .highlight-item {
            padding: 1rem;
        }

        .highlight-number {
            font-size: 2rem;
        }

        .highlight-label {
            font-size: 0.95rem;
        }

        .cta-section {
            padding: 2rem 1rem;
        }

        .cta-section h2 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .cta-section p {
            font-size: 0.95rem;
            margin-bottom: 1.2rem;
        }
    }
</style>

<main class="main-content">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <h1>Welcome to Burger Junction</h1>
            <p>Bite into Happiness — Premium Burgers Made Fresh to Order</p>
            <div class="cta-buttons">
                <a href="menu.php" class="cta-btn">Order Now</a>
                <a href="#locations" class="cta-btn secondary">Find a Location</a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <h2 class="section-title">Why Choose Us?</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">🍔</div>
                    <h3>Premium Quality</h3>
                    <p>Freshly prepared burgers using the finest ingredients, grilled to perfection every time.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">⚡</div>
                    <h3>Quick Service</h3>
                    <p>Fast and efficient service without compromising on quality or taste.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🎯</div>
                    <h3>Customization</h3>
                    <p>Build your own burger with our wide range of toppings and sauces.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">💰</div>
                    <h3>Best Prices</h3>
                    <p>Affordable pricing with amazing value for money on all menu items.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🚚</div>
                    <h3>Fast Delivery</h3>
                    <p>Quick delivery options available to bring your favorite burgers to your doorstep.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">😋</div>
                    <h3>Taste Guarantee</h3>
                    <p>100% satisfaction guaranteed with every bite of our delicious creations.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Locations Section -->
    <section class="locations-section" id="locations">
        <div class="container">
            <h2 class="section-title">Visit Our Locations</h2>
            <div class="locations-grid">
            <!-- Location 1 - Badlapur West -->
            <div class="location-card">
                <div class="location-header">
                    <div class="location-name">Burger Junction - Badlapur West</div>
                    <div class="location-type">Main Branch</div>
                </div>
                <div class="location-body">
                    <div class="location-info">
                        <span class="location-icon">📍</span>
                        <div class="location-details">
                            <strong>Address</strong>
                            Shop No.3, Shree Dev Shruti Apt<br>
                            Near Bhagavati Hospital, Badlapur W, 421503
                        </div>
                    </div>
                    <div class="location-info">
                        <span class="location-icon">📞</span>
                        <div class="location-details">
                            <strong>Phone</strong>
                            +91 96997 43563
                        </div>
                    </div>
                    <div class="location-info">
                        <span class="location-icon">⭐</span>
                        <div class="location-details">
                            <strong>Rating</strong>
                            4.1/5 (22 reviews)
                        </div>
                    </div>
                    <div class="location-hours">
                        <div class="hours-title">Working Hours</div>
                        <div class="hours-list">
                            Mon-Sun: 10:00 AM - 11:00 PM
                        </div>
                    </div>
                    <div class="location-actions">
                        <button class="location-btn btn-primary" type="button">Get Directions</button>
                        <a href="menu.php" class="location-btn btn-secondary">Order Now</a>
                    </div>
                </div>
            </div>
                    <div class="location-body">
                        <div class="location-info">
                            <span class="location-icon">📍</span>
                            <div class="location-details">
                                <strong>Address</strong>
                                123 Main Street, City Center<br>
                                Zip Code: 110001
                            </div>
                        </div>
                        <div class="location-info">
                            <span class="location-icon">📞</span>
                            <div class="location-details">
                                <strong>Phone</strong>
                                +91 98765 43210
                            </div>
                        </div>
                        <div class="location-info">
                            <span class="location-icon">📧</span>
                            <div class="location-details">
                                <strong>Email</strong>
                                downtown@burgerjunction.com
                            </div>
                        </div>
                        <div class="location-hours">
                            <strong>Hours:</strong><br>
                            Mon-Fri: 11:00 AM - 11:00 PM<br>
                            Sat-Sun: 10:00 AM - 12:00 AM
                        </div>
                        <button class="location-btn">Get Directions</button>
                    </div>
                </div>

            <!-- Location 2 - Ambedkar Chowk -->
            <div class="location-card">
                <div class="location-header">
                    <div class="location-name">Burger Junction - Ambedkar Chowk</div>
                    <div class="location-type">Dine-in & Drive-through</div>
                </div>
                <div class="location-body">
                    <div class="location-info">
                        <span class="location-icon">📍</span>
                        <div class="location-details">
                            <strong>Address</strong>
                            Shop no 13, Mohan Palms<br>
                            Near Ambedkar Chowk, Badlapur
                        </div>
                    </div>
                    <div class="location-info">
                        <span class="location-icon">📞</span>
                        <div class="location-details">
                            <strong>Phone</strong>
                            Available for Delivery & Dine-in
                        </div>
                    </div>
                    <div class="location-info">
                        <span class="location-icon">⭐</span>
                        <div class="location-details">
                            <strong>Rating</strong>
                            3.4/5 (76 reviews)
                        </div>
                    </div>
                    <div class="location-hours">
                        <div class="hours-title">Working Hours</div>
                        <div class="hours-list">
                            Mon-Sun: 10:00 AM - 11:00 PM
                        </div>
                    </div>
                    <div class="location-actions">
                        <button class="location-btn btn-primary" type="button">Get Directions</button>
                        <a href="menu.php" class="location-btn btn-secondary">Order Now</a>
                    </div>
                </div>
            </div>
                    <div class="location-body">
                        <div class="location-info">
                            <span class="location-icon">📍</span>
                            <div class="location-details">
                                <strong>Address</strong>
                                456 West Avenue, Shopping District<br>
                                Zip Code: 110002
                            </div>
                        </div>
                        <div class="location-info">
                            <span class="location-icon">📞</span>
                            <div class="location-details">
                                <strong>Phone</strong>
                                +91 98765 43211
                            </div>
                        </div>
                        <div class="location-info">
                            <span class="location-icon">📧</span>
                            <div class="location-details">
                                <strong>Email</strong>
                                westside@burgerjunction.com
                            </div>
                        </div>
                        <div class="location-hours">
                            <strong>Hours:</strong><br>
                            Mon-Fri: 10:00 AM - 11:30 PM<br>
                            Sat-Sun: 9:00 AM - 12:30 AM
                        </div>
                        <button class="location-btn">Get Directions</button>
                    </div>
                </div>

            <!-- Location 3 - Gandhi Chowk East -->
            <div class="location-card">
                <div class="location-header">
                    <div class="location-name">Burger Junction - Gandhi Chowk East</div>
                    <div class="location-type">Premium Restaurant</div>
                </div>
                <div class="location-body">
                    <div class="location-info">
                        <span class="location-icon">📍</span>
                        <div class="location-details">
                            <strong>Address</strong>
                            Gandhi Chowk<br>
                            Near Visa Computer Institute, Badlapur East
                        </div>
                    </div>
                    <div class="location-info">
                        <span class="location-icon">📞</span>
                        <div class="location-details">
                            <strong>Phone</strong>
                            Available for All Services
                        </div>
                    </div>
                    <div class="location-info">
                        <span class="location-icon">⭐</span>
                        <div class="location-details">
                            <strong>Rating</strong>
                            4.4/5 (7 reviews)
                        </div>
                    </div>
                    <div class="location-hours">
                        <div class="hours-title">Working Hours</div>
                        <div class="hours-list">
                            Mon-Sun: 10:00 AM - 12:00 AM
                        </div>
                    </div>
                    <div class="location-actions">
                        <button class="location-btn btn-primary" type="button">Get Directions</button>
                        <a href="menu.php" class="location-btn btn-secondary">Order Now</a>
                    </div>
                </div>
            </div>
                    <div class="location-body">
                        <div class="location-info">
                            <span class="location-icon">📍</span>
                            <div class="location-details">
                                <strong>Address</strong>
                                789 North Road, Gate Plaza<br>
                                Zip Code: 110003
                            </div>
                        </div>
                        <div class="location-info">
                            <span class="location-icon">📞</span>
                            <div class="location-details">
                                <strong>Phone</strong>
                                +91 98765 43212
                            </div>
                        </div>
                        <div class="location-info">
                            <span class="location-icon">📧</span>
                            <div class="location-details">
                                <strong>Email</strong>
                                northgate@burgerjunction.com
                            </div>
                        </div>
                        <div class="location-hours">
                            <strong>Hours:</strong><br>
                            Mon-Sun: 11:00 AM - 11:00 PM<br>
                            Special Hours on Holidays
                        </div>
                        <button class="location-btn">Get Directions</button>
                    </div>
                </div>

            <!-- Location 4 - Ambernath Road -->
            <div class="location-card">
                <div class="location-header">
                    <div class="location-name">Burger Junction - Ambernath Road</div>
                    <div class="location-type">Quick Service & Takeaway</div>
                </div>
                <div class="location-body">
                    <div class="location-info">
                        <span class="location-icon">📍</span>
                        <div class="location-details">
                            <strong>Address</strong>
                            16, Ambernath - Badlapur Road<br>
                            Badlapur, Maharashtra 421503
                        </div>
                    </div>
                    <div class="location-info">
                        <span class="location-icon">📞</span>
                        <div class="location-details">
                            <strong>Phone</strong>
                            Available for Takeaway & Dine-in
                        </div>
                    </div>
                    <div class="location-info">
                        <span class="location-icon">⭐</span>
                        <div class="location-details">
                            <strong>Rating</strong>
                            5.0/5 (4 reviews)
                        </div>
                    </div>
                    <div class="location-hours">
                        <div class="hours-title">Working Hours</div>
                        <div class="hours-list">
                            Mon-Sun: 10:00 AM - 11:00 PM
                        </div>
                    </div>
                    <div class="location-actions">
                        <button class="location-btn btn-primary" type="button">Get Directions</button>
                        <a href="menu.php" class="location-btn btn-secondary">Order Now</a>
                    </div>
                </div>
            </div>
                    <div class="location-body">
                        <div class="location-info">
                            <span class="location-icon">📍</span>
                            <div class="location-details">
                                <strong>Address</strong>
                                321 South Complex, Mall Area<br>
                                Zip Code: 110004
                            </div>
                        </div>
                        <div class="location-info">
                            <span class="location-icon">📞</span>
                            <div class="location-details">
                                <strong>Phone</strong>
                                +91 98765 43213
                            </div>
                        </div>
                        <div class="location-info">
                            <span class="location-icon">📧</span>
                            <div class="location-details">
                                <strong>Email</strong>
                                southpoint@burgerjunction.com
                            </div>
                        </div>
                        <div class="location-hours">
                            <strong>Hours:</strong><br>
                            Mon-Thu: 11:00 AM - 10:00 PM<br>
                            Fri-Sun: 11:00 AM - 11:00 PM
                        </div>
                        <button class="location-btn">Get Directions</button>
                    </div>
                </div>

            <!-- Location 5 - Sankatmochan Gandhi Chowk -->
            <div class="location-card">
                <div class="location-header">
                    <div class="location-name">Burger Junction - Gandhi Chowk</div>
                    <div class="location-type">Family Dining</div>
                </div>
                <div class="location-body">
                    <div class="location-info">
                        <span class="location-icon">📍</span>
                        <div class="location-details">
                            <strong>Address</strong>
                            Shop no 5, Gandhi Chowk<br>
                            Near Shri Sankatmochan Hanuman Mandir, Badlapur
                        </div>
                    </div>
                    <div class="location-info">
                        <span class="location-icon">📞</span>
                        <div class="location-details">
                            <strong>Phone</strong>
                            Available for All Services
                        </div>
                    </div>
                    <div class="location-info">
                        <span class="location-icon">⭐</span>
                        <div class="location-details">
                            <strong>Rating</strong>
                            Highly Rated Location
                        </div>
                    </div>
                    <div class="location-hours">
                        <div class="hours-title">Working Hours</div>
                        <div class="hours-list">
                            Mon-Sun: 10:00 AM - 11:00 PM
                        </div>
                    </div>
                    <div class="location-actions">
                        <button class="location-btn btn-primary" type="button">Get Directions</button>
                        <a href="menu.php" class="location-btn btn-secondary">Order Now</a>
                    </div>
                </div>
            </div>
                    <div class="location-body">
                        <div class="location-info">
                            <span class="location-icon">📍</span>
                            <div class="location-details">
                                <strong>Address</strong>
                                654 East Lane, Business District<br>
                                Zip Code: 110005
                            </div>
                        </div>
                        <div class="location-info">
                            <span class="location-icon">📞</span>
                            <div class="location-details">
                                <strong>Phone</strong>
                                +91 98765 43214
                            </div>
                        </div>
                        <div class="location-info">
                            <span class="location-icon">📧</span>
                            <div class="location-details">
                                <strong>Email</strong>
                                eastside@burgerjunction.com
                            </div>
                        </div>
                        <div class="location-hours">
                            <strong>Hours:</strong><br>
                            Mon-Fri: 12:00 PM - 10:00 PM<br>
                            Sat-Sun: 11:00 AM - 10:00 PM
                        </div>
                        <button class="location-btn">Get Directions</button>
                    </div>
                </div>

            <!-- Location 6 - Vadodara & Dwarka -->
            <div class="location-card">
                <div class="location-header">
                    <div class="location-name">Burger Junction - Multiple Branches</div>
                    <div class="location-type">Expanding Presence</div>
                </div>
                <div class="location-body">
                    <div class="location-info">
                        <span class="location-icon">📍</span>
                        <div class="location-details">
                            <strong>Locations</strong>
                            Available in Vadodara & Dwarka<br>
                            Expanding across Maharashtra & Delhi
                        </div>
                    </div>
                    <div class="location-info">
                        <span class="location-icon">📞</span>
                        <div class="location-details">
                            <strong>Status</strong>
                            Coming Soon to Your City
                        </div>
                    </div>
                    <div class="location-info">
                        <span class="location-icon">⭐</span>
                        <div class="location-details">
                            <strong>Branch Info</strong>
                            3 outlets in Vadodara, 7 in Dwarka
                        </div>
                    </div>
                    <div class="location-hours">
                        <div class="hours-title">Expansion</div>
                        <div class="hours-list">
                            New locations opening soon!
                        </div>
                    </div>
                    <div class="location-actions">
                        <button class="location-btn btn-primary" type="button">Find Nearby Branch</button>
                        <a href="locations.php" class="location-btn btn-secondary">View All Locations</a>
                    </div>
                </div>
            </div>
                    <div class="location-body">
                        <div class="location-info">
                            <span class="location-icon">📍</span>
                            <div class="location-details">
                                <strong>Address</strong>
                                987 Central Station, Transit Hub<br>
                                Zip Code: 110006
                            </div>
                        </div>
                        <div class="location-info">
                            <span class="location-icon">📞</span>
                            <div class="location-details">
                                <strong>Phone</strong>
                                +91 98765 43215
                            </div>
                        </div>
                        <div class="location-info">
                            <span class="location-icon">📧</span>
                            <div class="location-details">
                                <strong>Email</strong>
                                station@burgerjunction.com
                            </div>
                        </div>
                        <div class="location-hours">
                            <strong>Hours:</strong><br>
                            Daily: 6:00 AM - 11:30 PM<br>
                            Always Open for Travelers
                        </div>
                        <button class="location-btn">Get Directions</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Highlights Section -->
    <section class="highlights-section">
        <div class="container">
            <div class="highlights-grid">
                <div class="highlight-item">
                    <div class="highlight-number">500+</div>
                    <div class="highlight-label">Happy Customers Daily</div>
                </div>
                <div class="highlight-item">
                    <div class="highlight-number">50+</div>
                    <div class="highlight-label">Menu Items</div>
                </div>
                <div class="highlight-item">
                    <div class="highlight-number">6</div>
                    <div class="highlight-label">Locations Across City</div>
                </div>
                <div class="highlight-item">
                    <div class="highlight-number">4.8★</div>
                    <div class="highlight-label">Customer Ratings</div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2>Ready to Taste Excellence?</h2>
            <p>Order now and enjoy our premium burgers delivered fresh to your location!</p>
            <a href="menu.php" class="cta-btn">Browse Menu</a>
        </div>
    </section>
</main>

<script>
    // Get Directions Button
    document.querySelectorAll('.location-btn').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const address = this.closest('.location-card').querySelector('.location-details').textContent;
            const mapsUrl = `https://www.google.com/maps/search/${encodeURIComponent(address)}`;
            window.open(mapsUrl, '_blank');
        });
    });
</script>

<?php include 'footer.php'; ?>
