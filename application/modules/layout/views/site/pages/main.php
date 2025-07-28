<article>
    <!-- Hero Section -->
    <main class="hero-section" id="home">
        <!-- Background Slider -->
        <div class="background-slider">
            <div class="background-image active"></div>
            <div class="background-image"></div>
        </div>

        <!-- Overlay -->
        <div class="overlay"></div>

        <!-- Content Container -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="hero-content text-center">
                        <h1 class="hero-title text-white mb-4" data-aos="fade-up">
                            Chào mừng đến với nền tảng của chúng tôi
                        </h1>
                        <p class="hero-subtitle text-white mb-5" data-aos="fade-up" data-aos-delay="100">
                            Khám phá các dịch vụ chuyên nghiệp của chúng tôi
                        </p>

                        <!-- Navigation Cards -->
                        <div class="navigation-cards">
                            <?php 
                            // Load categories from database
                            $categories = modules::run('shops/cat/gets_inhome', 5); // Limit to 5 categories
                            $card_colors = array('card-giao-tiep', 'card-kinh-doanh', 'card-marketing', 'card-vi-sach', 'card-thiet-ke');
                            $card_icons = array('bi-globe', 'bi-briefcase', 'bi-clock', 'bi-bar-chart', 'bi-pencil');
                            
                            if (is_array($categories) && !empty($categories)) {
                                $i = 0;
                                foreach ($categories as $category) {
                                    $color_class = isset($card_colors[$i]) ? $card_colors[$i] : 'card-default';
                                    $icon_class = isset($card_icons[$i]) ? $card_icons[$i] : 'bi-box';
                                    $delay = 200 + ($i * 100);
                                    ?>
                                    <a href="<?php echo site_url('danh-muc-san-pham/' . $category['alias']); ?>" 
                                       class="nav-card <?php echo $color_class; ?>" 
                                       data-aos="fade-up" 
                                       data-aos-delay="<?php echo $delay; ?>">
                                        <i class="bi <?php echo $icon_class; ?>"></i>
                                        <span><?php echo $category['name']; ?></span>
                                    </a>
                                    <?php
                                    $i++;
                                    if ($i >= 5) break; // Limit to 5 cards
                                }
                            } else {
                                // Fallback if no categories from database
                                ?>
                                <a href="<?php echo site_url('danh-muc-san-pham'); ?>" class="nav-card card-giao-tiep" data-aos="fade-up" data-aos-delay="200">
                                    <i class="bi bi-globe"></i>
                                    <span>Danh mục sản phẩm</span>
                                </a>
                                <a href="<?php echo site_url('san-pham'); ?>" class="nav-card card-kinh-doanh" data-aos="fade-up" data-aos-delay="300">
                                    <i class="bi bi-briefcase"></i>
                                    <span>Sản phẩm</span>
                                </a>
                                <a href="<?php echo site_url('tin-tuc'); ?>" class="nav-card card-marketing" data-aos="fade-up" data-aos-delay="400">
                                    <i class="bi bi-newspaper"></i>
                                    <span>Tin tức</span>
                                </a>
                                <a href="<?php echo site_url('lien-he'); ?>" class="nav-card card-vi-sach" data-aos="fade-up" data-aos-delay="500">
                                    <i class="bi bi-envelope"></i>
                                    <span>Liên hệ</span>
                                </a>
                                <a href="<?php echo site_url('about'); ?>" class="nav-card card-thiet-ke" data-aos="fade-up" data-aos-delay="600">
                                    <i class="bi bi-info-circle"></i>
                                    <span>Về chúng tôi</span>
                                </a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- About Section -->
    <section class="about-section py-5" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="about-content">
                        <h2 class="section-title mb-4">Về chúng tôi</h2>
                        <p class="lead mb-4">
                            <strong>Công ty TNHH Cơ Điện Lạnh Phong Thịnh</strong> đã hoạt động trong lĩnh vực Cơ Điện lạnh từ năm 2018. 
                            Lĩnh vực hoạt động chính là tư vấn thiết kế, cung cấp, lắp đặt, bảo hành, bảo trì các hệ thống lạnh, 
                            lạnh công nghiệp, M&E, tự động hóa, lò hơi và năng lượng tái tạo.
                        </p>
                        <p class="mb-4">
                            Với nhiều năm hoạt động sáng tạo và phát triển liên tục cùng với nồng cốt là đội ngũ kĩ sư có chuyên môn cao. 
                            <strong>Phong Thịnh</strong> đã khẳng định được vị thế của mình trên thương trường, luôn là đối tác tin cậy 
                            hàng đầu của các nhà đầu tư trong và ngoài nước.
                        </p>
                        <a href="<?php echo site_url('about'); ?>" class="btn btn-primary">Tìm hiểu thêm</a>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="about-image">
                        <img src="<?php echo base_url('assets/images/about1.jpg'); ?>" alt="Về chúng tôi" class="img-fluid rounded">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services-section py-5 bg-light" id="services">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title" data-aos="fade-up">Dịch vụ của chúng tôi</h2>
                    <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Cung cấp các giải pháp toàn diện cho hệ thống lạnh công nghiệp
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-card text-center p-4 bg-white rounded shadow-sm">
                        <div class="service-icon mb-3">
                            <i class="bi bi-gear-fill text-primary" style="font-size: 3rem;"></i>
                        </div>
                        <h4 class="service-title mb-3">Thiết kế & Lắp đặt</h4>
                        <p class="service-description">
                            Tư vấn thiết kế và lắp đặt hệ thống lạnh công nghiệp chuyên nghiệp, 
                            đảm bảo hiệu quả và tiết kiệm năng lượng.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-card text-center p-4 bg-white rounded shadow-sm">
                        <div class="service-icon mb-3">
                            <i class="bi bi-tools text-primary" style="font-size: 3rem;"></i>
                        </div>
                        <h4 class="service-title mb-3">Bảo trì & Sửa chữa</h4>
                        <p class="service-description">
                            Dịch vụ bảo trì định kỳ và sửa chữa nhanh chóng, 
                            đảm bảo hệ thống hoạt động ổn định và bền bỉ.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-card text-center p-4 bg-white rounded shadow-sm">
                        <div class="service-icon mb-3">
                            <i class="bi bi-shield-check text-primary" style="font-size: 3rem;"></i>
                        </div>
                        <h4 class="service-title mb-3">Bảo hành & Hỗ trợ</h4>
                        <p class="service-description">
                            Chế độ bảo hành dài hạn và hỗ trợ kỹ thuật 24/7, 
                            đảm bảo khách hàng luôn yên tâm khi sử dụng dịch vụ.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="products-section py-5" id="products">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title" data-aos="fade-up">Sản phẩm nổi bật</h2>
                    <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Những sản phẩm chất lượng cao của chúng tôi
                    </p>
                </div>
            </div>
            
            <!-- Sử dụng sản phẩm nổi bật từ controller -->
            <?php if (isset($products_featured) && !empty($products_featured)) : ?>
                <div class="row">
                    <?php echo $products_featured; ?>
                </div>
            <?php else : ?>
                <!-- Fallback nếu không có sản phẩm nổi bật -->
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="project-card">
                            <div class="project-image">
                                <img src="<?php echo base_url('uploads/images/kho-lanh-chat-luong-cao.jpg'); ?>" alt="Kho lạnh công nghiệp" class="img-fluid rounded">
                                <div class="project-overlay">
                                    <div class="project-info">
                                        <h5>Kho lạnh công nghiệp</h5>
                                        <p>Thiết kế và lắp đặt hệ thống kho lạnh công nghiệp</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="project-card">
                            <div class="project-image">
                                <img src="<?php echo base_url('uploads/posts/Bang-tinh-cho-tru-lanh-va-cap-dong-thuc-pham.jpg'); ?>" alt="Hệ thống cấp đông" class="img-fluid rounded">
                                <div class="project-overlay">
                                    <div class="project-info">
                                        <h5>Hệ thống cấp đông</h5>
                                        <p>Lắp đặt hệ thống cấp đông thực phẩm công nghiệp</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="project-card">
                            <div class="project-image">
                                <img src="<?php echo base_url('uploads/images/kho-lanh-chat-luong-cao-1.jpg'); ?>" alt="Bộ điều khiển thông minh" class="img-fluid rounded">
                                <div class="project-overlay">
                                    <div class="project-info">
                                        <h5>Bộ điều khiển thông minh</h5>
                                        <p>Hệ thống điều khiển tự động cho kho lạnh</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            
            <!-- View All Products Button -->
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <a href="<?php echo site_url('san-pham'); ?>" class="btn btn-primary btn-lg">
                        <i class="bi bi-eye me-2"></i>Xem tất cả sản phẩm
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section class="news-section py-5 bg-light" id="news">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title" data-aos="fade-up">Tin tức & Sự kiện</h2>
                    <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Cập nhật những tin tức mới nhất về ngành lạnh
                    </p>
                </div>
            </div>
            
            <!-- Sử dụng tin tức từ database -->
            <?php if (isset($posts_home) && !empty($posts_home)) : ?>
                <div class="row">
                    <?php echo $posts_home; ?>
                </div>
            <?php else : ?>
                <!-- Fallback nếu không có tin tức -->
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="news-card bg-white rounded shadow-sm overflow-hidden">
                            <div class="news-image">
                                <img src="<?php echo base_url('uploads/posts/bo-dieu-khien-cho-kho-lanh.jpg'); ?>" alt="Tin tức 1" class="img-fluid">
                            </div>
                            <div class="news-content p-4">
                                <div class="news-date text-muted mb-2">
                                    <i class="bi bi-calendar3"></i> 30/08/2024
                                </div>
                                <h5 class="news-title mb-3">
                                    <a href="#" class="text-decoration-none">Cách chọn bộ điều khiển chất lượng cho kho lạnh</a>
                                </h5>
                                <p class="news-excerpt">
                                    Hiện trên thị trường có rất nhiều thiết bị điều khiển kém chất lượng từ Trung Quốc. 
                                    Để không bị mua nhầm hàng nhái, hàng dởm các bạn nên tìm hiểu kỹ...
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="news-card bg-white rounded shadow-sm overflow-hidden">
                            <div class="news-image">
                                <img src="<?php echo base_url('uploads/posts/120x90_kho-lanh_77.jpg'); ?>" alt="Tin tức 2" class="img-fluid">
                            </div>
                            <div class="news-content p-4">
                                <div class="news-date text-muted mb-2">
                                    <i class="bi bi-calendar3"></i> 12/12/2024
                                </div>
                                <h5 class="news-title mb-3">
                                    <a href="#" class="text-decoration-none">Hướng dẫn thiết kế và lựa chọn cửa kho lạnh</a>
                                </h5>
                                <p class="news-excerpt">
                                    Những hướng dẫn trong thiết kế và lựa chọn cửa để vận tải kho lạnh hiệu quả
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="news-card bg-white rounded shadow-sm overflow-hidden">
                            <div class="news-image">
                                <img src="<?php echo base_url('uploads/posts/120x90_kho-lanh_77.jpg'); ?>" alt="Tin tức 3" class="img-fluid">
                            </div>
                            <div class="news-content p-4">
                                <div class="news-date text-muted mb-2">
                                    <i class="bi bi-calendar3"></i> 12/12/2024
                                </div>
                                <h5 class="news-title mb-3">
                                    <a href="#" class="text-decoration-none">Bảng tính cho trữ lạnh và cấp đông thực phẩm</a>
                                </h5>
                                <p class="news-excerpt">
                                    Công cụ tính toán hiệu quả cho việc thiết kế hệ thống trữ lạnh và cấp đông
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            
            <!-- View All News Button -->
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <a href="<?php echo site_url('tin-tuc'); ?>" class="btn btn-primary btn-lg">
                        <i class="bi bi-newspaper me-2"></i>Xem tất cả tin tức
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section py-5" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title" data-aos="fade-up">Liên hệ với chúng tôi</h2>
                    <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Hãy để lại thông tin để chúng tôi tư vấn miễn phí
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form bg-white p-5 rounded shadow-sm" data-aos="fade-up" data-aos-delay="200">
                        <form>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Họ và tên *</label>
                                    <input type="text" class="form-control" id="name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Số điện thoại *</label>
                                    <input type="tel" class="form-control" id="phone" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Nội dung *</label>
                                <textarea class="form-control" id="message" rows="5" required></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Gửi thông tin</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Float Contact -->
    <div class="float-contact">
        <button id="button" class="chat-zalo">
            <a href="https://zalo.me/0387315384" target="_blank">Chat Zalo</a>
        </button>
        <button id="button" class="chat-face">
            <a href="https://facebook.com/idevlish" target="_blank">Chat Facebook</a>
        </button>
        <button id="button" class="hotline">
            <a href="tel:0387315384">Hotline: 0387315384</a>
        </button>
    </div>
</article>

<style>
    /* Reset and Base Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    line-height: 1.6;
    color: #333;
}

/* Header Styles */
.header-section {
    position: sticky;
    top: 0;
    z-index: 1000;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.navbar-brand {
    font-weight: bold;
    font-size: 1.5rem;
}

/* Hero Section */
.hero-section {
    position: relative;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 80px 0;
}

/* Background Slider - FIXED */
.background-slider {
    position: absolute !important;
    top: 0 !important;
    left: 0 !important;
    width: 100% !important;
    height: 100% !important;
    z-index: -2 !important;
    overflow: hidden !important;
}

.background-image {
    position: absolute !important;
    top: 0 !important;
    left: 0 !important;
    width: 100% !important;
    height: 100% !important;
    background-size: cover !important;
    background-position: center !important;
    background-repeat: no-repeat !important;
    opacity: 0 !important;
    transition: opacity 1.5s ease-in-out !important;
}

.background-image.active {
    opacity: 1 !important;
}

/* Use the correct image URLs */
.background-image:nth-child(1) {
    background-image: url('../img/services.jpg') !important;
}

.background-image:nth-child(2) {
    background-image: url('../img/hero-bg.jpg') !important;
}

/* Overlay */
.overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.4);
    z-index: -1;
}

/* Hero Content */
.hero-content {
    z-index: 10;
    position: relative;
}

.hero-title {
    font-size: 3.5rem;
    font-weight: 700;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
    margin-bottom: 1rem;
}

.hero-subtitle {
    font-size: 1.25rem;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
    margin-bottom: 2rem;
}

/* Navigation Cards */
.navigation-cards {
    display: flex;
    justify-content: center;
    gap: 0;
    flex-wrap: wrap;
    margin: 0 auto;
}

.nav-card {
    width: 340px;
    height: 320px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    color: white;
    font-weight: 600;
    font-size: 14px;
    text-align: center;
    transition: all 0.3s ease;
    cursor: pointer;
    border: none;
    position: relative;
    overflow: hidden;
    margin: 5px;
    border-radius: 10px;
}

.nav-card:hover {
    transform: translateY(-10px) scale(1.05);
    box-shadow: 0 15px 35px rgba(0,0,0,0.3);
    color: white;
    text-decoration: none;
    z-index: 10;
}

.nav-card:focus {
    outline: 3px solid rgba(255,255,255,0.8);
    outline-offset: 2px;
}

.nav-card i {
    font-size: 32px;
    margin-bottom: 8px;
    transition: transform 0.3s ease;
}

.nav-card:hover i {
    transform: scale(1.2);
}

/* Card Colors */
.card-giao-tiep {
    background: linear-gradient(135deg, #4285f4, #3367d6);
}

.card-kinh-doanh {
    background: linear-gradient(135deg, #00bcd4, #00acc1);
}

.card-marketing {
    background: linear-gradient(135deg, #673ab7, #5e35b1);
}

.card-vi-sach {
    background: linear-gradient(135deg, #ff9800, #f57c00);
}

    .card-thiet-ke {
        background: linear-gradient(135deg, #607d8b, #546e7a);
    }

    .card-default {
        background: linear-gradient(135deg, #6c757d, #495057);
    }

/* Card Hover Effects */
.nav-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s;
}

.nav-card:hover::before {
    left: 100%;
}

/* Scroll Indicator */
.scroll-indicator {
    position: absolute;
    bottom: 30px;
    left: 50%;
    transform: translateX(-50%);
    color: white;
    font-size: 2rem;
    animation: bounce 2s infinite;
    cursor: pointer;
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateX(-50%) translateY(0);
    }
    40% {
        transform: translateX(-50%) translateY(-10px);
    }
    60% {
        transform: translateX(-50%) translateY(-5px);
    }
}

/* Content Section */
.content-section {
    background: #f8f9fa;
}

/* Footer */
.footer-section {
    margin-top: auto;
}

.social-links a {
    font-size: 1.5rem;
    transition: color 0.3s ease;
}

.social-links a:hover {
    color: #007bff !important;
}

/* Responsive Design */

/* Large Desktop */
@media (min-width: 1200px) {
    .hero-title {
        font-size: 4rem;
    }
    
    .navigation-cards {
        gap: 10px;
    }
    
    .nav-card {
        width: 160px;
        height: 140px;
        font-size: 16px;
    }
    
    .nav-card i {
        font-size: 36px;
    }
}

/* Desktop */
@media (min-width: 992px) and (max-width: 1199px) {
    .hero-title {
        font-size: 3.5rem;
    }
    
    .nav-card {
        width: 140px;
        height: 120px;
    }
}

/* Tablet */
@media (min-width: 768px) and (max-width: 991px) {
    .hero-title {
        font-size: 3rem;
    }
    
    .hero-subtitle {
        font-size: 1.1rem;
    }
    
    .navigation-cards {
        gap: 10px;
        max-width: 600px;
    }
    
    .nav-card {
        width: 120px;
        height: 100px;
        font-size: 13px;
        margin: 5px;
    }
    
    .nav-card i {
        font-size: 28px;
        margin-bottom: 6px;
    }
}

/* Mobile Large */
@media (min-width: 576px) and (max-width: 767px) {
    .hero-section {
        padding: 60px 0;
    }
    
    .hero-title {
        font-size: 2.5rem;
    }
    
    .hero-subtitle {
        font-size: 1rem;
    }
    
    .navigation-cards {
        gap: 8px;
        max-width: 500px;
    }
    
    .nav-card {
        width: 100px;
        height: 90px;
        font-size: 12px;
        margin: 4px;
    }
    
    .nav-card i {
        font-size: 24px;
        margin-bottom: 5px;
    }
}

/* Mobile Small */
@media (max-width: 575px) {
    .hero-section {
        padding: 40px 0;
        min-height: 90vh;
    }
    
    .hero-title {
        font-size: 2rem;
        margin-bottom: 0.5rem;
    }
    
    .hero-subtitle {
        font-size: 0.9rem;
        margin-bottom: 1.5rem;
    }
    
    .navigation-cards {
        flex-direction: column;
        align-items: center;
        gap: 15px;
        max-width: 280px;
    }
    
    .nav-card {
        width: 250px;
        height: 80px;
        font-size: 14px;
        flex-direction: row;
        gap: 15px;
        padding: 0 20px;
        margin: 0;
    }
    
    .nav-card i {
        font-size: 28px;
        margin-bottom: 0;
    }
    
    .scroll-indicator {
        bottom: 20px;
        font-size: 1.5rem;
    }
}

/* Extra Small Mobile */
@media (max-width: 375px) {
    .hero-title {
        font-size: 1.8rem;
    }
    
    .nav-card {
        width: 220px;
        height: 70px;
        font-size: 13px;
    }
    
    .nav-card i {
        font-size: 24px;
    }
}

/* Landscape Mobile */
@media (max-height: 500px) and (orientation: landscape) {
    .hero-section {
        min-height: auto;
        padding: 20px 0;
    }
    
    .hero-title {
        font-size: 2rem;
        margin-bottom: 0.5rem;
    }
    
    .hero-subtitle {
        font-size: 0.9rem;
        margin-bottom: 1rem;
    }
    
    .navigation-cards {
        gap: 5px;
    }
    
    .nav-card {
        width: 90px;
        height: 70px;
        font-size: 11px;
    }
    
    .nav-card i {
        font-size: 20px;
        margin-bottom: 3px;
    }
    
    .scroll-indicator {
        display: none;
    }
}

/* High DPI Displays */
@media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
    .background-image {
        background-size: cover;
    }
}

/* Accessibility */
@media (prefers-reduced-motion: reduce) {
    .background-image {
        transition: none;
    }
    
    .nav-card {
        transition: none;
    }
    
    .scroll-indicator {
        animation: none;
    }
    
    .nav-card::before {
        transition: none;
    }
}

/* Dark mode support */
@media (prefers-color-scheme: dark) {
    .content-section {
        background: #1a1a1a;
        color: white;
    }
    
    .navbar-light {
        background-color: #2d2d2d !important;
    }
    
    .navbar-light .navbar-brand,
    .navbar-light .nav-link {
        color: white !important;
    }
}

/* Print styles */
@media print {
    .hero-section {
        min-height: auto;
        background: white !important;
    }
    
    .background-slider,
    .overlay,
    .scroll-indicator {
        display: none;
    }
    
    .nav-card {
        border: 1px solid #ccc;
        color: #333 !important;
        background: white !important;
    }
}

* Featured Courses Section */
.featured-courses {
    background: #fff;
}

.course-card {
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    height: 100%;
}

.course-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

.course-image {
    position: relative;
    overflow: hidden;
}

.course-image img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.course-card:hover .course-image img {
    transform: scale(1.05);
}

.course-badge {
    position: absolute;
    top: 15px;
    right: 15px;
}

.course-content {
    padding: 20px;
}

.course-title {
    font-size: 1.1rem;
    font-weight: 600;
    margin-bottom: 15px;
    line-height: 1.4;
    color: #333;
}

.course-price {
    display: flex;
    align-items: center;
    gap: 10px;
}

.current-price {
    font-size: 1.25rem;
    font-weight: 700;
    color: #007bff;
}

.original-price {
    font-size: 1rem;
    color: #999;
    text-decoration: line-through;
}

.discount {
    background: #dc3545;
    color: white;
    padding: 2px 8px;
    border-radius: 4px;
    font-size: 0.8rem;
    font-weight: 600;
}

/* Why Choose Us Section */
.why-choose-us {
    background: #f8f9fa;
}

/* Feature Card Link Styles */
.feature-card-link {
  text-decoration: none;
  color: inherit;
  display: block;
  transition: all 0.3s ease;
}

.feature-card-link:hover {
  text-decoration: none;
  color: inherit;
  transform: translateY(-5px);
}

.feature-card {
  background: white;
  border-radius: 15px;
  padding: 30px 20px;
  text-align: center;
  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease;
  height: 100%;
  position: relative;
  overflow: hidden;
  cursor: pointer;
}

.feature-card::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(135deg, #007bff, #28a745);
  transform: scaleX(0);
  transition: transform 0.3s ease;
}

.feature-card:hover::before {
  transform: scaleX(1);
}

.feature-card:hover {
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
  transform: translateY(-5px);
}

.feature-image {
  margin-bottom: 20px;
  overflow: hidden;
  border-radius: 10px;
}

.feature-image img {
  width: 100%;
  height: 150px;
  object-fit: cover;
  transition: transform 0.3s ease;
}

.feature-card:hover .feature-image img {
  transform: scale(1.05);
}

.feature-title {
  font-size: 1.3rem;
  font-weight: 700;
  color: #333;
  margin-bottom: 15px;
  transition: color 0.3s ease;
}

.feature-card:hover .feature-title {
  color: #007bff;
}

.feature-description {
  font-size: 1rem;
  color: #666;
  line-height: 1.6;
  margin-bottom: 20px;
}

.feature-action {
  margin-top: auto;
  padding-top: 15px;
}

.action-text {
  color: #007bff;
  font-weight: 600;
  font-size: 0.95rem;
  transition: all 0.3s ease;
  display: inline-flex;
  align-items: center;
  gap: 5px;
}

.feature-card:hover .action-text {
  color: #0056b3;
  transform: translateX(5px);
}

.action-text i {
  transition: transform 0.3s ease;
}

.feature-card:hover .action-text i {
  transform: translateX(3px);
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .feature-card {
    padding: 25px 15px;
  }

  .feature-image img {
    height: 120px;
  }

  .feature-title {
    font-size: 1.2rem;
  }

  .feature-description {
    font-size: 0.95rem;
  }
}

/* Additional button styles */
.btn-lg {
  padding: 15px 30px;
  font-size: 1.1rem;
  border-radius: 50px;
  font-weight: 600;
  transition: all 0.3s ease;
}

.btn-primary:hover {
  transform: translateY(-2px);
  box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
}


/* Teachers Section */
.teachers-section {
    background: linear-gradient(135deg, #007bff 0%, #00d0ff 100%);
    color: white;
}

.teachers-section .section-title {
    color: white;
}

.teacher-card {
    display: flex;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 15px;
    overflow: hidden;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    transition: all 0.3s ease;
    height: 100%;
}

.teacher-card:hover {
    transform: translateY(-5px);
    background: rgba(255, 255, 255, 0.15);
}

.teacher-image {
    flex: 0 0 120px;
}

.teacher-image img {
    width: 120px;
    height: 120px;
    object-fit: cover;
}

.teacher-info {
    padding: 20px;
    flex: 1;
}

.teacher-name {
    font-size: 1.25rem;
    font-weight: 700;
    margin-bottom: 5px;
    color: white;
}

.teacher-title {
    font-size: 0.9rem;
    color: rgba(255, 255, 255, 0.8);
    margin-bottom: 10px;
    font-weight: 600;
}

.teacher-description {
    font-size: 0.95rem;
    line-height: 1.5;
    color: rgba(255, 255, 255, 0.9);
}

/* News Section */
.news-section {
    background: #fff;
}

.news-card {
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    height: 100%;
}

.news-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

.featured-news {
    height: auto;
}

.featured-news .news-image img {
    width: 100%;
    height: 250px;
    object-fit: cover;
}

.news-small .news-image img {
    width: 100%;
    height: 80px;
    object-fit: cover;
}

.news-content {
    padding: 20px;
}

.news-small .news-content {
    padding: 15px;
}

.news-title {
    font-size: 1.1rem;
    font-weight: 600;
    margin-bottom: 10px;
    line-height: 1.4;
    color: #333;
}

.news-small .news-title {
    font-size: 0.95rem;
    margin-bottom: 8px;
}

.news-excerpt {
    color: #666;
    font-size: 0.9rem;
    line-height: 1.5;
    margin-bottom: 15px;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.news-small .news-excerpt {
    font-size: 0.8rem;
    -webkit-line-clamp: 2;
    margin-bottom: 10px;
}

.news-meta {
    display: flex;
    align-items: center;
    gap: 5px;
    color: #999;
    font-size: 0.85rem;
}

.news-meta i {
    font-size: 0.8rem;
}

/* Content Section */
.content-section {
    background: #f8f9fa;
}

/* Footer */
.footer-section {
    margin-top: auto;
}

.social-links a {
    font-size: 1.5rem;
    transition: color 0.3s ease;
}

.social-links a:hover {
    color: #007bff !important;
}

/* Responsive Design */

/* Large Desktop */
@media (min-width: 1200px) {
    .hero-title {
        font-size: 4rem;
    }
    
    .navigation-cards {
        gap: 10px;
    }
    
    .nav-card {
        width: 160px;
        height: 140px;
        font-size: 16px;
    }
    
    .nav-card i {
        font-size: 36px;
    }
    
    .control-btn {
        width: 60px;
        height: 60px;
        font-size: 20px;
    }
    
    .section-title {
        font-size: 3rem;
    }
}

/* Desktop */
@media (min-width: 992px) and (max-width: 1199px) {
    .hero-title {
        font-size: 3.5rem;
    }
    
    .nav-card {
        width: 140px;
        height: 120px;
    }
}

/* Tablet */
@media (min-width: 768px) and (max-width: 991px) {
    .hero-title {
        font-size: 3rem;
    }
    
    .hero-subtitle {
        font-size: 1.1rem;
    }
    
    .navigation-cards {
        gap: 10px;
        max-width: 600px;
    }
    
    .nav-card {
        width: 120px;
        height: 100px;
        font-size: 13px;
        margin: 5px;
    }
    
    .nav-card i {
        font-size: 28px;
        margin-bottom: 6px;
    }
    
    .control-btn {
        width: 45px;
        height: 45px;
        font-size: 16px;
    }
    
    .background-controls {
        padding: 0 15px;
    }
    
    .section-title {
        font-size: 2.2rem;
    }
    
    .teacher-card {
        flex-direction: column;
        text-align: center;
    }
    
    .teacher-image {
        flex: none;
        align-self: center;
    }
}

/* Mobile Large */
@media (min-width: 576px) and (max-width: 767px) {
    .hero-section {
        padding: 60px 0;
    }
    
    .hero-title {
        font-size: 2.5rem;
    }
    
    .hero-subtitle {
        font-size: 1rem;
    }
    
    .navigation-cards {
        gap: 8px;
        max-width: 500px;
    }
    
    .nav-card {
        width: 100px;
        height: 90px;
        font-size: 12px;
        margin: 4px;
    }
    
    .nav-card i {
        font-size: 24px;
        margin-bottom: 5px;
    }
    
    .control-btn {
        width: 40px;
        height: 40px;
        font-size: 14px;
    }
    
    .background-controls {
        padding: 0 10px;
    }
    
    .background-indicators {
        bottom: 60px;
    }
    
    .indicator {
        width: 10px;
        height: 10px;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .teacher-card {
        flex-direction: column;
        text-align: center;
    }
    
    .teacher-image {
        flex: none;
        align-self: center;
    }
    
    .feature-image img {
        height: 120px;
    }
}

/* Mobile Small */
@media (max-width: 575px) {
    .hero-section {
        padding: 40px 0;
        min-height: 90vh;
    }
    
    .hero-title {
        font-size: 2rem;
        margin-bottom: 0.5rem;
    }
    
    .hero-subtitle {
        font-size: 0.9rem;
        margin-bottom: 1.5rem;
    }
    
    .navigation-cards {
        flex-direction: column;
        align-items: center;
        gap: 15px;
        max-width: 280px;
    }
    
    .nav-card {
        width: 250px;
        height: 80px;
        font-size: 14px;
        flex-direction: row;
        gap: 15px;
        padding: 0 20px;
        margin: 0;
    }
    
    .nav-card i {
        font-size: 28px;
        margin-bottom: 0;
    }
    
    .scroll-indicator {
        bottom: 20px;
        font-size: 1.5rem;
    }
    
    .control-btn {
        width: 35px;
        height: 35px;
        font-size: 12px;
    }
    
    .background-controls {
        padding: 0 5px;
    }
    
    .play-pause-btn {
        top: 15px;
        right: 15px;
    }
    
    .background-indicators {
        bottom: 40px;
    }
    
    .indicator {
        width: 8px;
        height: 8px;
    }
    
    .section-title {
        font-size: 1.8rem;
    }
    
    .section-subtitle {
        font-size: 1rem;
    }
    
    .teacher-card {
        flex-direction: column;
        text-align: center;
    }
    
    .teacher-image {
        flex: none;
        align-self: center;
    }
    
    .feature-image img {
        height: 100px;
    }
    
    .course-image img {
        height: 150px;
    }
    
    .featured-news .news-image img {
        height: 180px;
    }
}

/* Extra Small Mobile */
@media (max-width: 375px) {
    .hero-title {
        font-size: 1.8rem;
    }
    
    .nav-card {
        width: 220px;
        height: 70px;
        font-size: 13px;
    }
    
    .nav-card i {
        font-size: 24px;
    }
    
    .section-title {
        font-size: 1.6rem;
    }
}

/* Landscape Mobile */
@media (max-height: 500px) and (orientation: landscape) {
    .hero-section {
        min-height: auto;
        padding: 20px 0;
    }
    
    .hero-title {
        font-size: 2rem;
        margin-bottom: 0.5rem;
    }
    
    .hero-subtitle {
        font-size: 0.9rem;
        margin-bottom: 1rem;
    }
    
    .navigation-cards {
        gap: 5px;
    }
    
    .nav-card {
        width: 90px;
        height: 70px;
        font-size: 11px;
    }
    
    .nav-card i {
        font-size: 20px;
        margin-bottom: 3px;
    }
    
    .scroll-indicator {
        display: none;
    }
    
    .background-indicators {
        bottom: 20px;
    }
    
    .control-btn {
        width: 30px;
        height: 30px;
        font-size: 10px;
    }
}

/* High DPI Displays */
@media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
    .background-image {
        background-size: cover;
    }
}

/* Accessibility */
@media (prefers-reduced-motion: reduce) {
    .background-image {
        transition: none;
    }
    
    .nav-card {
        transition: none;
    }
    
    .scroll-indicator {
        animation: none;
    }
    
    .nav-card::before {
        transition: none;
    }
    
    .control-btn {
        transition: none;
    }
    
    .indicator {
        transition: none;
    }
    
    .course-card,
    .feature-card,
    .teacher-card,
    .news-card {
        transition: none;
    }
}

/* Dark mode support */
@media (prefers-color-scheme: dark) {
    .content-section {
        background: #1a1a1a;
        color: white;
    }
    
    .navbar-light {
        background-color: #2d2d2d !important;
    }
    
    .navbar-light .navbar-brand,
    .navbar-light .nav-link {
        color: white !important;
    }
    
    .featured-courses {
        background: #1a1a1a;
    }
    
    .course-card,
    .news-card {
        background: #2d2d2d;
        color: white;
    }
    
    .section-title {
        color: white;
    }
    
    .why-choose-us {
        background: #2d2d2d;
    }
    
    .feature-image {
        background: #1a1a1a;
        border-color: #00bcd4;
    }
}

/* Print styles */
@media print {
    .hero-section {
        min-height: auto;
        background: white !important;
    }
    
    .background-slider,
    .overlay,
    .scroll-indicator,
    .background-controls,
    .background-indicators {
        display: none;
    }
    
    .nav-card {
        border: 1px solid #ccc;
        color: #333 !important;
        background: white !important;
    }
    
    .teachers-section {
        background: white !important;
        color: #333 !important;
    }
    
    .teacher-card {
        background: white !important;
        border: 1px solid #ddd;
    }
    
    .section-title {
        color: #333 !important;
    }
}

/* Course Overlay Styles */
.course-image {
  position: relative;
  overflow: hidden;
  border-radius: 10px 10px 0 0;
}

.course-overlay {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(0, 0, 0, 0.6);
  display: flex;
  align-items: center;
  justify-content: center;
  opacity: 0;
  transition: all 0.3s ease;
  backdrop-filter: blur(2px);
}

.course-card:hover .course-overlay {
  opacity: 1;
}

.btn-view-details {
  background: #007bff;
  border: none;
  color: white;
  padding: 12px 24px;
  border-radius: 25px;
  font-weight: 600;
  font-size: 0.9rem;
  transition: all 0.3s ease;
  box-shadow: 0 4px 15px rgba(0, 123, 255, 0.3);
  transform: translateY(10px);
}

.course-overlay.show .btn-view-details,
.course-card:hover .btn-view-details {
  transform: translateY(0);
}

.btn-view-details:hover {
  background: #0056b3;
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(0, 123, 255, 0.4);
  color: white;
}

/* Modal Styles */
.modal-content {
  border: none;
  border-radius: 15px;
  box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
}

.modal-header {
  background: linear-gradient(135deg, #007bff, #0056b3);
  color: white;
  border-radius: 15px 15px 0 0;
  padding: 20px 30px;
}

.modal-title {
  font-weight: 700;
  font-size: 1.3rem;
}

.btn-close {
  filter: invert(1);
  opacity: 0.8;
}

.btn-close:hover {
  opacity: 1;
}

.modal-body {
  padding: 30px;
}

.modal-footer {
  padding: 20px 30px;
  background: #f8f9fa;
  border-radius: 0 0 15px 15px;
}

.course-detail-image {
  width: 100%;
  height: 250px;
  object-fit: cover;
  border-radius: 10px;
  margin-bottom: 20px;
}

.course-detail-meta {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 15px;
  margin: 20px 0;
}

.meta-item {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 15px;
  background: #f8f9fa;
  border-radius: 8px;
  border-left: 4px solid #007bff;
}

.meta-item i {
  color: #007bff;
  font-size: 1.2rem;
}

.meta-item .meta-label {
  font-weight: 600;
  color: #333;
}

.meta-item .meta-value {
  color: #666;
}

.course-description {
  line-height: 1.7;
  color: #555;
  margin: 20px 0;
}

.course-highlights {
  margin: 20px 0;
}

.highlight-item {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 8px 0;
  border-bottom: 1px solid #eee;
}

.highlight-item:last-child {
  border-bottom: none;
}

.highlight-item i {
  color: #28a745;
  font-size: 1.1rem;
}

.course-price-detail {
  background: linear-gradient(135deg, #f8f9fa, #e9ecef);
  padding: 20px;
  border-radius: 10px;
  margin: 20px 0;
  text-align: center;
}

.price-detail-current {
  font-size: 2rem;
  font-weight: 700;
  color: #007bff;
  margin-bottom: 5px;
}

.price-detail-original {
  font-size: 1.2rem;
  color: #999;
  text-decoration: line-through;
  margin-right: 10px;
}

.price-detail-discount {
  background: #dc3545;
  color: white;
  padding: 4px 12px;
  border-radius: 20px;
  font-size: 0.9rem;
  font-weight: 600;
}

/* Mobile Responsive */
@media (max-width: 768px) {
  .modal-dialog {
    margin: 10px;
  }

  .modal-body {
    padding: 20px;
  }

  .modal-footer {
    padding: 15px 20px;
    flex-direction: column;
    gap: 10px;
  }

  .modal-footer .btn {
    width: 100%;
  }

  .course-detail-meta {
    grid-template-columns: 1fr;
  }

  .btn-view-details {
    padding: 10px 20px;
    font-size: 0.85rem;
  }
}

/* Animation for modal */
.modal.fade .modal-dialog {
  transform: scale(0.8);
  transition: transform 0.3s ease;
}

.modal.show .modal-dialog {
  transform: scale(1);
}

</style>

<script>
    // Background Slider
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize AOS
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true,
                mirror: false,
                offset: 100
            });
        }
        
        // Initialize Background Slider
        initBackgroundSlider();
    });

    function initBackgroundSlider() {
        const images = document.querySelectorAll('.background-image');
        
        if (images.length < 2) {
            return;
        }
        
        // Reset all images
        images.forEach((img, index) => {
            img.classList.remove('active');
            img.style.opacity = '0';
        });
        
        // Set first image as active
        let currentImageIndex = 0;
        images[currentImageIndex].classList.add('active');
        images[currentImageIndex].style.opacity = '1';
        
        // Start automatic switching
        setInterval(() => {
            // Hide current image
            images[currentImageIndex].classList.remove('active');
            images[currentImageIndex].style.opacity = '0';
            
            // Move to next image
            currentImageIndex = (currentImageIndex + 1) % images.length;
            
            // Show new image
            setTimeout(() => {
                images[currentImageIndex].classList.add('active');
                images[currentImageIndex].style.opacity = '1';
            }, 100);
        }, 4000);
    }
</script>