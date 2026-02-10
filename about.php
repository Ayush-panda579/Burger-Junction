<?php
require_once 'config.php';
$pageTitle = "About Us - Burger Junction";
include 'header.php';
?>

<style>
    /* ==================== ABOUT PAGE STYLES ==================== */
    .about-hero {
        background: linear-gradient(135deg, #c82333 0%, #e84c5e 100%);
        color: white;
        text-align: center;
        padding: 5rem 1rem 4rem;
    }

    .about-hero h1 {
        font-size: 3.2rem;
        margin-bottom: 0.8rem;
        text-shadow: 2px 2px 8px rgba(0,0,0,0.2);
        font-weight: 800;
    }

    .about-hero p {
        font-size: 1.3rem;
        max-width: 700px;
        margin: 0 auto;
        opacity: 0.95;
    }

    .about-section {
        padding: 4rem 1rem;
        background: white;
    }

    .about-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    /* Story Section */
    .story-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
        align-items: center;
        margin-bottom: 4rem;
    }

    .story-content h2 {
        font-size: 2.5rem;
        color: #c82333;
        margin-bottom: 1.5rem;
        font-weight: 800;
    }

    .story-content p {
        font-size: 1.1rem;
        color: #555;
        line-height: 1.8;
        margin-bottom: 1.5rem;
    }

    .story-image {
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 12px 40px rgba(0,0,0,0.15);
        height: 400px;
        background: linear-gradient(135deg, #c82333, #e84c5e);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 3rem;
    }

    /* Mission & Vision */
    .mission-vision-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2.5rem;
        margin: 3rem 0;
    }

    .mission-card {
        background: linear-gradient(135deg, rgba(200, 35, 51, 0.1) 0%, rgba(200, 35, 51, 0.05) 100%);
        padding: 2.5rem;
        border-radius: 16px;
        border-left: 4px solid #c82333;
        transition: all 0.3s ease;
    }

    .mission-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 30px rgba(200, 35, 51, 0.15);
        background: linear-gradient(135deg, rgba(200, 35, 51, 0.15) 0%, rgba(200, 35, 51, 0.08) 100%);
    }

    .mission-card h3 {
        font-size: 1.8rem;
        color: #c82333;
        margin-bottom: 1rem;
        font-weight: 700;
    }

    .mission-card p {
        font-size: 1rem;
        color: #666;
        line-height: 1.7;
    }

    .mission-icon {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        display: inline-block;
    }

    /* Why Choose Us */
    .why-choose-section {
        background: #f8f8f8;
        padding: 4rem 1rem;
        margin: 3rem 0;
    }

    .why-choose-title {
        font-size: 2.5rem;
        color: #c82333;
        text-align: center;
        margin-bottom: 3rem;
        font-weight: 800;
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2.5rem;
        max-width: 1200px;
        margin: 0 auto;
    }

    .feature-item {
        background: white;
        padding: 2rem;
        border-radius: 14px;
        text-align: center;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
    }

    .feature-item:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 30px rgba(0,0,0,0.12);
    }

    .feature-icon {
        font-size: 2.8rem;
        margin-bottom: 1rem;
        display: inline-block;
    }

    .feature-item h4 {
        font-size: 1.3rem;
        color: #c82333;
        margin-bottom: 0.8rem;
        font-weight: 700;
    }

    .feature-item p {
        font-size: 0.95rem;
        color: #666;
        line-height: 1.6;
    }

    /* Team Section */
    .team-section {
        padding: 4rem 1rem;
        background: white;
    }

    .team-title {
        font-size: 2.5rem;
        color: #c82333;
        text-align: center;
        margin-bottom: 3rem;
        font-weight: 800;
    }

    .team-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2.5rem;
        max-width: 1200px;
        margin: 0 auto;
    }

    .team-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        border: 1px solid #eee;
    }

    .team-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 16px 36px rgba(0,0,0,0.15);
        border-color: #c82333;
    }

    .team-image {
        width: 100%;
        height: 250px;
        background: linear-gradient(135deg, #c82333, #e84c5e);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        color: white;
    }

    .team-info {
        padding: 1.8rem;
    }

    .team-name {
        font-size: 1.3rem;
        font-weight: 700;
        color: #222;
        margin-bottom: 0.3rem;
    }

    .team-role {
        font-size: 0.95rem;
        color: #c82333;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .team-bio {
        font-size: 0.9rem;
        color: #666;
        line-height: 1.6;
    }

    /* Reviews Section */
    .reviews-section {
        background: #f8f8f8;
        padding: 4rem 1rem;
    }

    .reviews-title {
        font-size: 2.5rem;
        color: #c82333;
        text-align: center;
        margin-bottom: 3rem;
        font-weight: 800;
    }

    .reviews-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2.5rem;
        max-width: 1200px;
        margin: 0 auto;
    }

    .review-card {
        background: white;
        padding: 2rem;
        border-radius: 14px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        border-top: 4px solid #c82333;
    }

    .review-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 30px rgba(0,0,0,0.12);
    }

    .review-stars {
        color: #ffc107;
        font-size: 1.2rem;
        margin-bottom: 1rem;
        letter-spacing: 0.2rem;
    }

    .review-text {
        font-size: 1rem;
        color: #555;
        line-height: 1.7;
        font-style: italic;
        margin-bottom: 1rem;
    }

    .review-author {
        font-size: 0.95rem;
        font-weight: 600;
        color: #c82333;
    }

    /* Stats Section */
    .stats-section {
        background: linear-gradient(135deg, #c82333 0%, #e84c5e 100%);
        color: white;
        padding: 4rem 1rem;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 2rem;
        max-width: 1000px;
        margin: 0 auto;
        text-align: center;
    }

    .stat-item h3 {
        font-size: 2.8rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
    }

    .stat-item p {
        font-size: 1rem;
        opacity: 0.95;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .about-hero {
            padding: 4rem 1rem 3rem;
        }

        .about-hero h1 {
            font-size: 2.5rem;
        }

        .about-hero p {
            font-size: 1.1rem;
        }

        .story-grid {
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .story-content h2 {
            font-size: 2rem;
        }

        .story-image {
            height: 300px;
        }

        .mission-vision-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .mission-card {
            padding: 2rem;
        }

        .why-choose-section {
            padding: 3rem 1rem;
        }

        .why-choose-title {
            font-size: 2rem;
        }

        .features-grid {
            gap: 1.5rem;
        }

        .feature-item {
            padding: 1.5rem;
        }

        .team-title {
            font-size: 2rem;
        }

        .team-grid {
            gap: 1.5rem;
        }

        .reviews-title {
            font-size: 2rem;
        }

        .reviews-grid {
            gap: 1.5rem;
        }

        .stats-section {
            padding: 3rem 1rem;
        }

        .stats-grid {
            gap: 1.5rem;
        }

        .stat-item h3 {
            font-size: 2rem;
        }
    }

    @media (max-width: 576px) {
        .about-hero {
            padding: 3rem 1rem 2.5rem;
        }

        .about-hero h1 {
            font-size: 1.8rem;
        }

        .about-hero p {
            font-size: 0.95rem;
        }

        .story-content h2 {
            font-size: 1.6rem;
        }

        .story-content p {
            font-size: 1rem;
        }

        .story-image {
            height: 250px;
        }

        .mission-card {
            padding: 1.5rem;
            border-left: 3px solid #c82333;
        }

        .mission-card h3 {
            font-size: 1.4rem;
        }

        .mission-card p {
            font-size: 0.9rem;
        }

        .why-choose-section {
            padding: 2.5rem 1rem;
        }

        .why-choose-title {
            font-size: 1.6rem;
            margin-bottom: 2rem;
        }

        .feature-item {
            padding: 1.2rem;
        }

        .feature-icon {
            font-size: 2.3rem;
        }

        .feature-item h4 {
            font-size: 1.1rem;
        }

        .feature-item p {
            font-size: 0.85rem;
        }

        .team-section {
            padding: 2.5rem 1rem;
        }

        .team-title {
            font-size: 1.6rem;
            margin-bottom: 2rem;
        }

        .team-grid {
            gap: 1.2rem;
        }

        .team-image {
            height: 200px;
            font-size: 2.5rem;
        }

        .team-info {
            padding: 1.5rem;
        }

        .team-name {
            font-size: 1.1rem;
        }

        .team-role {
            font-size: 0.85rem;
        }

        .team-bio {
            font-size: 0.85rem;
        }

        .reviews-section {
            padding: 2.5rem 1rem;
        }

        .reviews-title {
            font-size: 1.6rem;
            margin-bottom: 2rem;
        }

        .reviews-grid {
            gap: 1.2rem;
        }

        .review-card {
            padding: 1.5rem;
            border-top: 3px solid #c82333;
        }

        .review-text {
            font-size: 0.9rem;
        }

        .stats-section {
            padding: 2.5rem 1rem;
        }

        .stat-item h3 {
            font-size: 1.8rem;
        }

        .stat-item p {
            font-size: 0.9rem;
        }
    }
</style>

<main class="main-content">
    <!-- Hero Section -->
    <section class="about-hero">
        <div class="container">
            <h1>About Burger Junction</h1>
            <p>Your favorite destination for delicious burgers, quality food, and great customer service</p>
        </div>
    </section>

    <!-- Story Section -->
    <section class="about-section">
        <div class="about-container">
            <div class="story-grid">
                <div class="story-content">
                    <h2>Our Story</h2>
                    <p>Burger Junction started with a simple dream – to serve the most delicious burgers with premium quality ingredients and exceptional customer service. What began as a small outlet in Badlapur West has grown into a beloved restaurant chain across multiple cities.</p>
                    <p>We believe in using fresh, locally sourced ingredients and innovative recipes to create burgers that exceed expectations. Every burger is crafted with passion and attention to detail, ensuring a memorable dining experience every single time.</p>
                    <p>Today, Burger Junction stands as a symbol of quality, taste, and innovation in the fast-food industry, with a loyal customer base spread across Maharashtra and Delhi.</p>
                </div>
                <div class="story-image">🍔</div>
            </div>
        </div>
    </section>

    <!-- Mission, Vision, Values -->
    <section class="about-section">
        <div class="about-container">
            <div class="mission-vision-grid">
                <div class="mission-card">
                    <div class="mission-icon">🎯</div>
                    <h3>Our Mission</h3>
                    <p>To deliver exceptional quality burgers and food items that delight our customers with every bite, using the finest ingredients and innovative cooking techniques.</p>
                </div>
                <div class="mission-card">
                    <div class="mission-icon">🌟</div>
                    <h3>Our Vision</h3>
                    <p>To become the most trusted burger brand in India, known for quality, consistency, and customer satisfaction across all our locations.</p>
                </div>
                <div class="mission-card">
                    <div class="mission-icon">❤️</div>
                    <h3>Our Values</h3>
                    <p>Quality, integrity, innovation, and customer care are at the heart of everything we do. We are committed to excellence in every aspect of our business.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="why-choose-section">
        <div class="about-container">
            <h2 class="why-choose-title">Why Choose Burger Junction?</h2>
            <div class="features-grid">
                <div class="feature-item">
                    <div class="feature-icon">🥘</div>
                    <h4>Premium Quality</h4>
                    <p>We use only the finest ingredients sourced from trusted suppliers to ensure the best taste and quality.</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">⚡</div>
                    <h4>Quick Service</h4>
                    <p>Fast preparation without compromising on quality. Your order is ready quickly without any delay.</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">👥</div>
                    <h4>Expert Team</h4>
                    <p>Our experienced chefs and staff are trained to deliver exceptional service and delicious food.</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">🎨</div>
                    <h4>Creative Menu</h4>
                    <p>Unique burger varieties and combinations that you won't find anywhere else. Something for everyone.</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">💝</div>
                    <h4>Customer Care</h4>
                    <p>Your satisfaction is our priority. We go the extra mile to ensure you have the best experience.</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">📍</div>
                    <h4>Multiple Locations</h4>
                    <p>Conveniently located across Badlapur, Vadodara, Dwarka, and other cities for easy access.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section">
        <div class="about-container">
            <h2 class="team-title">Meet Our Team</h2>
            <div class="team-grid">
                <div class="team-card">
                    <div class="team-image">👨‍💼</div>
                    <div class="team-info">
                        <div class="team-name">Rahul Sharma</div>
                        <div class="team-role">Founder & CEO</div>
                        <div class="team-bio">Passionate about quality food and customer satisfaction. Led the vision to establish Burger Junction with a commitment to excellence.</div>
                    </div>
                </div>
                <div class="team-card">
                    <div class="team-image">👨‍🍳</div>
                    <div class="team-info">
                        <div class="team-name">Amit Patel</div>
                        <div class="team-role">Head Chef</div>
                        <div class="team-bio">Expert in burger preparation with 10+ years of experience. Creates unique and delicious burger recipes that define our brand.</div>
                    </div>
                </div>
                <div class="team-card">
                    <div class="team-image">👩‍💼</div>
                    <div class="team-info">
                        <div class="team-name">Priya Verma</div>
                        <div class="team-role">Operations Manager</div>
                        <div class="team-bio">Ensures seamless operations across all locations. Dedicated to maintaining quality standards and customer service excellence.</div>
                    </div>
                </div>
                <div class="team-card">
                    <div class="team-image">👨‍💼</div>
                    <div class="team-info">
                        <div class="team-name">Vikram Singh</div>
                        <div class="team-role">Marketing Head</div>
                        <div class="team-bio">Drives brand growth and customer engagement. Passionate about connecting Burger Junction with food lovers everywhere.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="about-container">
            <div class="stats-grid">
                <div class="stat-item">
                    <h3>50+</h3>
                    <p>Menu Items</p>
                </div>
                <div class="stat-item">
                    <h3>6</h3>
                    <p>Active Locations</p>
                </div>
                <div class="stat-item">
                    <h3>5000+</h3>
                    <p>Happy Customers</p>
                </div>
                <div class="stat-item">
                    <h3>4.2★</h3>
                    <p>Average Rating</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Reviews Section -->
    <section class="reviews-section">
        <div class="about-container">
            <h2 class="reviews-title">What Our Customers Say</h2>
            <div class="reviews-grid">
                <div class="review-card">
                    <div class="review-stars">★★★★★</div>
                    <div class="review-text">"Best burgers in Badlapur! The quality is consistently amazing and the service is super friendly. Highly recommended!"</div>
                    <div class="review-author">– Priya Desai</div>
                </div>
                <div class="review-card">
                    <div class="review-stars">★★★★★</div>
                    <div class="review-text">"Love their Chicken Maharaja burger. It's juicy, flavorful, and perfectly cooked. Worth every penny!"</div>
                    <div class="review-author">– Arjun Mehta</div>
                </div>
                <div class="review-card">
                    <div class="review-stars">★★★★☆</div>
                    <div class="review-text">"Great taste and fresh ingredients. The veg momos are addictive, and the staff is always helpful and courteous."</div>
                    <div class="review-author">– Neha Sharma</div>
                </div>
                <div class="review-card">
                    <div class="review-stars">★★★★★</div>
                    <div class="review-text">"Quick service without compromising on quality. Spicy Paneer Burger is my go-to order every time!"</div>
                    <div class="review-author">– Rohan Gupta</div>
                </div>
                <div class="review-card">
                    <div class="review-stars">★★★★★</div>
                    <div class="review-text">"Tried their Peri Peri fries and I'm hooked! The taste is incredible. This place is a must-visit for burger lovers."</div>
                    <div class="review-author">– Anjali Singh</div>
                </div>
                <div class="review-card">
                    <div class="review-stars">★★★★☆</div>
                    <div class="review-text">"Consistent quality across all menu items. The cheese momos are divine, and delivery is always on time. Keep it up!"</div>
                    <div class="review-author">– Karan Patel</div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'footer.php'; ?>
