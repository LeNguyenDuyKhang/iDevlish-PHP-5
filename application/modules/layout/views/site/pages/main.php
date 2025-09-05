<?php
// Define background images array (use relative paths from web root)
$background_images = array(
    array('url' => base_url('uploads/images/kho-lanh-chat-luong-cao.jpg'), 'alt' => 'Kho lạnh công nghiệp'),
    array('url' => base_url('uploads/images/kho-lanh-chat-luong-cao-1.jpg'), 'alt' => 'Hệ thống kho lạnh hiện đại'),
    // Add more images as needed
);

// Fallback image if none are available
$fallback_image = array('url' => base_url('uploads/images/kho-lanh-chat-luong-cao.jpg'), 'alt' => 'Kho lạnh công nghiệp');

// Check if images exist (basic file existence check for debugging)
$valid_images = array();
foreach ($background_images as $image) {
    // Convert base_url to file path for checking (assumes CodeIgniter structure)
    $file_path = FCPATH . 'uploads/images/' . basename($image['url']);
    if (file_exists($file_path)) {
        $valid_images[] = $image;
    }
}

// Use fallback if no valid images
if (empty($valid_images)) {
    $valid_images[] = $fallback_image;
}
?>

<article>
    <!-- Hero Section -->
    <main class="hero-section" id="home">
        <!-- Background Slider -->
        <div class="background-slider">
            <?php
            // Generate slider images dynamically
            foreach ($valid_images as $index => $image) {
                $active_class = $index === 0 ? 'active' : '';
                echo '<div class="background-image ' . $active_class . '" style="background-image: url(\'' . $image['url'] . '\');" aria-label="' . $image['alt'] . '"></div>';
            }
            ?>
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
    <!-- <section class="about-section py-5" id="about">
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
    </section> -->
    
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

        <!-- Teachers Section -->
    <section class="teachers-section py-5" id="teachers">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title text-white" data-aos="fade-up">
                        Đội ngũ thầy cô
                    </h2>
                    <p class="section-subtitle text-white-50" data-aos="fade-up" data-aos-delay="100">
                        100% giáo viên bản xứ xuất sắc của chúng tôi đều được đào tạo bài
                        bản và cấp chứng chỉ CELTA (chứng chỉ giảng dạy Anh ngữ Quốc tế
                        của Đại học Cambridge) và TESOL (chứng chỉ quốc tế về phương pháp
                        giảng dạy tiếng Anh).
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="teacher-card">
                        <div class="teacher-image">
                            <img src="uploads\users\abcdef.jpg" alt="John Mcallister" class="img-fluid" />
                        </div>
                        <div class="teacher-info">
                            <h5 class="teacher-name">John Mcallister</h5>
                            <p class="teacher-title">ĐẠI HỌC CAMBRIDGE</p>
                            <p class="teacher-description">
                                Chúng tôi luôn sẵn sàng hỗ trợ để bạn có thể tự tin đạt được
                                mục tiêu cải thiện tiếng Anh của mình.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="teacher-card">
                        <div class="teacher-image">
                            <img src="uploads\users\abcdef.jpg" alt="Jane Doe" class="img-fluid" />
                        </div>
                        <div class="teacher-info">
                            <h5 class="teacher-name">Jane Doe</h5>
                            <p class="teacher-title">ĐẠI HỌC CAMBRIDGE</p>
                            <p class="teacher-description">
                                Chúng tôi luôn sẵn sàng hỗ trợ để bạn có thể tự tin đạt được
                                mục tiêu cải thiện tiếng Anh của mình.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="teacher-card">
                        <div class="teacher-image">
                            <img src="uploads\users\abcdef.jpg" alt="Mary Mgrayan" class="img-fluid" />
                        </div>
                        <div class="teacher-info">
                            <h5 class="teacher-name">Mary Mgrayan</h5>
                            <p class="teacher-title">ĐẠI HỌC CAMBRIDGE</p>
                            <p class="teacher-description">
                                Chúng tôi luôn sẵn sàng hỗ trợ để bạn có thể tự tin đạt được
                                mục tiêu cải thiện tiếng Anh của mình.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="500">
                    <div class="teacher-card">
                        <div class="teacher-image">
                            <img src="uploads\users\abcdef.jpg" alt="Hanna Sprite" class="img-fluid" />
                        </div>
                        <div class="teacher-info">
                            <h5 class="teacher-name">Hanna Sprite</h5>
                            <p class="teacher-title">ĐẠI HỌC CAMBRIDGE</p>
                            <p class="teacher-description">
                                Chúng tôi luôn sẵn sàng hỗ trợ để bạn có thể tự tin đạt được
                                mục tiêu cải thiện tiếng Anh của mình.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="why-choose-us py-5 bg-light" id="why-us">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title" data-aos="fade-up">
                        Tại sao chọn chúng tôi
                    </h2>
                    <p class="section-subtitle text-muted" data-aos="fade-up" data-aos-delay="100">
                        Giữa vô vàn trung tâm dạy tiếng Anh hiện nay, chỉ có duy nhất một
                        nơi dành riêng cho người lớn bận rộn.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <a href="<?php echo site_url('ve-chung-toi'); ?>" class="feature-card-link">
                        <div class="feature-card">
                            <div class="feature-image">
                                <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-Yj0umPZrzxoUQa6n3JLq9wmXkU2HlN.png" alt="Cam kết của chúng tôi" class="img-fluid">
                            </div>
                            <div class="feature-content">
                                <h5 class="feature-title">Cam kết của chúng tôi</h5>
                                <p class="feature-description">
                                    Giúp bạn nói tiếng Anh tự tin hoặc hoàn tiền. Thật khó tin? Nhưng đây là cam kết của chúng tôi.
                                </p>
                                <div class="feature-action">
                                    <span class="action-text">Tìm hiểu thêm <i class="bi bi-arrow-right"></i></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <a href="<?php echo site_url('ve-chung-toi'); ?>" class="feature-card-link">
                        <div class="feature-card">
                            <div class="feature-image">
                                <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-Yj0umPZrzxoUQa6n3JLq9wmXkU2HlN.png" alt="Phương pháp hiệu quả" class="img-fluid">
                            </div>
                            <div class="feature-content">
                                <h5 class="feature-title">Phương pháp hiệu quả</h5>
                                <p class="feature-description">
                                    Chương trình giảng dạy và chứng chỉ/văn bằng của iDevlish Ngoại Ngữ đạt chuẩn CEFR
                                </p>
                                <div class="feature-action">
                                    <span class="action-text">Tìm hiểu thêm <i class="bi bi-arrow-right"></i></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="400">
                    <a href="<?php echo site_url('ve-chung-toi'); ?>" class="feature-card-link">
                        <div class="feature-card">
                            <div class="feature-image">
                                <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-Yj0umPZrzxoUQa6n3JLq9wmXkU2HlN.png" alt="Giờ học linh động" class="img-fluid">
                            </div>
                            <div class="feature-content">
                                <h5 class="feature-title">Giờ học linh động</h5>
                                <p class="feature-description">
                                    Chúng tôi cung cấp các giải pháp linh hoạt, giúp bạn chủ động chọn thời gian học phù hợp
                                </p>
                                <div class="feature-action">
                                    <span class="action-text">Tìm hiểu thêm <i class="bi bi-arrow-right"></i></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="500">
                    <a href="<?php echo site_url('ve-chung-toi'); ?>" class="feature-card-link">
                        <div class="feature-card">
                            <div class="feature-image">
                                <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-Yj0umPZrzxoUQa6n3JLq9wmXkU2HlN.png" alt="Giáo viên bản ngữ" class="img-fluid">
                            </div>
                            <div class="feature-content">
                                <h5 class="feature-title">Giáo viên bản ngữ</h5>
                                <p class="feature-description">
                                    Giáo viên của chúng tôi đều đến từ các nước sử dụng tiếng Anh là ngôn ngữ chính như Mỹ, Anh và Canada.
                                </p>
                                <div class="feature-action">
                                    <span class="action-text">Tìm hiểu thêm <i class="bi bi-arrow-right"></i></span>
                                </div>
                            </div>
                        </div>
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
                    <!-- <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Cập nhật những tin tức mới nhất về ngành lạnh
                    </p> -->
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
    <!-- <section class="contact-section py-5" id="contact">
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
    </section> -->

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

    /* Hero Section */
    .hero-section {
        position: relative;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 80px 0;
    }

    /* Background Slider */
    .background-slider {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -2;
        overflow: hidden;
    }

    .background-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        opacity: 0;
        transition: opacity 1s ease-in-out;
    }

    .background-image.active {
        opacity: 1;
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

    /* Accessibility */
    @media (prefers-reduced-motion: reduce) {
        .background-image {
            transition: none;
        }
        .background-image.active {
            opacity: 1;
        }
        .nav-card,
        .nav-card::before,
        .scroll-indicator {
            transition: none;
            animation: none;
        }
    }

    /* Responsive Design */
    @media (min-width: 1200px) {
        .hero-title { font-size: 4rem; }
        .navigation-cards { gap: 10px; }
        .nav-card { width: 160px; height: 140px; font-size: 16px; }
        .nav-card i { font-size: 36px; }
    }

    @media (min-width: 992px) and (max-width: 1199px) {
        .hero-title { font-size: 3.5rem; }
        .nav-card { width: 140px; height: 120px; }
    }

    @media (min-width: 768px) and (max-width: 991px) {
        .hero-title { font-size: 3rem; }
        .hero-subtitle { font-size: 1.1rem; }
        .navigation-cards { gap: 10px; max-width: 600px; }
        .nav-card { width: 120px; height: 100px; font-size: 13px; margin: 5px; }
        .nav-card i { font-size: 28px; margin-bottom: 6px; }
    }

    @media (min-width: 576px) and (max-width: 767px) {
        .hero-section { padding: 60px 0; }
        .hero-title { font-size: 2.5rem; }
        .hero-subtitle { font-size: 1rem; }
        .navigation-cards { gap: 8px; max-width: 500px; }
        .nav-card { width: 100px; height: 90px; font-size: 12px; margin: 4px; }
        .nav-card i { font-size: 24px; margin-bottom: 5px; }
    }

    @media (max-width: 575px) {
        .hero-section { padding: 40px 0; min-height: 90vh; }
        .hero-title { font-size: 2rem; margin-bottom: 0.5rem; }
        .hero-subtitle { font-size: 0.9rem; margin-bottom: 1.5rem; }
        .navigation-cards { flex-direction: column; align-items: center; gap: 15px; max-width: 280px; }
        .nav-card { width: 250px; height: 80px; font-size: 14px; flex-direction: row; gap: 15px; padding: 0 20px; margin: 0; }
        .nav-card i { font-size: 28px; margin-bottom: 0; }
        .scroll-indicator { bottom: 20px; font-size: 1.5rem; }
    }

    @media (max-width: 375px) {
        .hero-title { font-size: 1.8rem; }
        .nav-card { width: 220px; height: 70px; font-size: 13px; }
        .nav-card i { font-size: 24px; }
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
</style>

<script>
    // JavaScript for AOS initialization and slider fallback
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

        // Fallback slider for browsers that don't support CSS animations or prefers-reduced-motion
        var images = document.querySelectorAll('.background-image');
        if (images.length > 1) {
            var currentIndex = 0;
            function cycleImages() {
                images[currentIndex].classList.remove('active');
                currentIndex = (currentIndex + 1) % images.length;
                images[currentIndex].classList.add('active');
            }
            setInterval(cycleImages, 4000); // Change every 4 seconds
        }
    });
</script>