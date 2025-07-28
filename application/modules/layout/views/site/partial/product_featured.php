<?php if (isset($data) && is_array($data) && !empty($data)): ?>
    <?php
    $current_user_level = get_current_user_level();
    $user_level_percent = get_user_level_percent($current_user_level);
    $i = 0;
    foreach ($data as $value):
        $i++;
        $data_params = (isset($value['params']) && trim($value['params']) != '') ? $value['params'] : '';
        $data_id = $value['id'];
        $data_title = $value['title'];
        $data_hometext = word_limiter($value['hometext'], 16);
        $data_link = site_url($this->config->item('url_shops_rows') . '/' . $value['cat_alias'] . '/' . $value['alias'] . '-' . $data_id) . $data_params;
        $data_image = array(
            'src' => get_image(get_module_path('shops') . $value['homeimgfile'], get_module_path('shops') . 'no-image.png'),
            'alt' => $data_title
        );

        $data_price = $value['product_price'];
        $data_sales_price = get_product_discounts($value['product_price'], $value['product_sales_price']);
        if($user_level_percent > 0){
            $data_price = get_discount_price_by_percent($data_price, $user_level_percent);
            $data_sales_price = get_discount_price_by_percent($data_sales_price, $user_level_percent);
        }
        
        // Tính phần trăm giảm giá
        $discount_percent = 0;
        if ($data_sales_price > 0 && $data_sales_price < $data_price) {
            $discount_percent = round((($data_price - $data_sales_price) / $data_price) * 100);
        }
    ?>
    <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="<?php echo $i * 100; ?>">
        <div class="product-card bg-white rounded shadow-sm overflow-hidden h-100">
            <!-- Product Image -->
            <div class="product-image position-relative">
                <a href="<?php echo $data_link; ?>">
                    <img src="<?php echo $data_image['src']; ?>" 
                         alt="<?php echo $data_image['alt']; ?>" 
                         class="img-fluid w-100" 
                         style="height: 250px; object-fit: cover;">
                    <div class="product-overlay">
                        <div class="product-overlay-content">
                            <i class="bi bi-eye-fill"></i>
                            <span>Xem chi tiết</span>
                        </div>
                    </div>
                </a>
                
                <!-- Discount Badge -->
                <?php if ($discount_percent > 0): ?>
                <div class="discount-badge position-absolute top-0 start-0 m-3">
                    <span class="badge bg-danger px-3 py-2">
                        <i class="bi bi-tag-fill me-1"></i>-<?php echo $discount_percent; ?>%
                    </span>
                </div>
                <?php endif; ?>
                
                <!-- Quick Actions -->
                <div class="quick-actions position-absolute top-0 end-0 m-3">
                    <button class="btn btn-light btn-sm rounded-circle mb-2 quick-action-btn" 
                            title="Yêu thích" 
                            onclick="addToWishlist(<?php echo $data_id; ?>)">
                        <i class="bi bi-heart"></i>
                    </button>
                    <button class="btn btn-light btn-sm rounded-circle quick-action-btn" 
                            title="So sánh" 
                            onclick="addToCompare(<?php echo $data_id; ?>)">
                        <i class="bi bi-arrow-left-right"></i>
                    </button>
                </div>
            </div>
            
            <!-- Product Content -->
            <div class="product-content p-4 d-flex flex-column h-100">
                <!-- Product Title -->
                <div class="product-title mb-3">
                    <h5 class="fw-bold">
                        <a href="<?php echo $data_link; ?>" 
                           class="text-decoration-none text-dark hover-primary">
                            <?php echo $data_title; ?>
                        </a>
                    </h5>
                </div>
                
                <!-- Product Description -->
                <?php if (!empty($data_hometext)): ?>
                <div class="product-description mb-3 flex-grow-1">
                    <p class="text-muted mb-0" style="font-size: 14px; line-height: 1.6;">
                        <?php echo $data_hometext; ?>
                    </p>
                </div>
                <?php endif; ?>
                
                <!-- Product Price -->
                <div class="product-price mb-3">
                    <?php if ($data_sales_price > 0): ?>
                        <?php if ($data_sales_price == $data_price): ?>
                            <div class="current-price fw-bold text-primary" style="font-size: 1.25rem;">
                                <?php echo formatRice($data_price); ?>₫
                            </div>
                        <?php else: ?>
                            <div class="current-price fw-bold text-primary" style="font-size: 1.25rem;">
                                <?php echo formatRice($data_sales_price); ?>₫
                            </div>
                            <div class="original-price text-muted text-decoration-line-through" style="font-size: 0.9rem;">
                                <?php echo formatRice($data_price); ?>₫
                            </div>
                        <?php endif; ?>
                    <?php else: ?>
                        <div class="contact-price fw-bold text-success" style="font-size: 1.1rem;">
                            <i class="bi bi-telephone-fill me-1"></i>Liên hệ
                        </div>
                    <?php endif; ?>
                </div>
                
                <!-- Product Actions -->
                <div class="product-actions d-flex gap-2">
                    <a href="<?php echo $data_link; ?>" 
                       class="btn btn-outline-primary flex-grow-1">
                        <i class="bi bi-eye me-1"></i>Xem chi tiết
                    </a>
                    <?php if ($data_sales_price > 0): ?>
                    <button class="btn btn-primary" 
                            onclick="addToCart(<?php echo $data_id; ?>, '<?php echo addslashes($data_title); ?>', <?php echo $data_sales_price; ?>)">
                        <i class="bi bi-cart-plus"></i>
                    </button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    
    <!-- Custom CSS for enhanced styling -->
    <style>
        .product-card {
            transition: all 0.3s ease;
            border: 1px solid #e9ecef;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
            border-color: #007bff;
        }
        
        .product-image {
            overflow: hidden;
        }
        
        .product-image img {
            transition: transform 0.3s ease;
        }
        
        .product-card:hover .product-image img {
            transform: scale(1.05);
        }
        
        .product-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 123, 255, 0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .product-card:hover .product-overlay {
            opacity: 1;
        }
        
        .product-overlay-content {
            text-align: center;
            color: white;
        }
        
        .product-overlay-content i {
            font-size: 2.5rem;
            margin-bottom: 10px;
            display: block;
        }
        
        .product-overlay-content span {
            font-size: 1rem;
            font-weight: 600;
        }
        
        .hover-primary:hover {
            color: #007bff !important;
        }
        
        .discount-badge .badge {
            font-size: 12px;
            font-weight: 600;
        }
        
        .quick-action-btn {
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
            opacity: 0.8;
        }
        
        .quick-action-btn:hover {
            opacity: 1;
            transform: scale(1.1);
        }
        
        .product-content {
            background: linear-gradient(to bottom, #ffffff, #f8f9fa);
        }
        
        .btn-outline-primary:hover {
            transform: translateX(3px);
            transition: transform 0.2s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
        }
        
        .current-price {
            color: #dc3545 !important;
        }
        
        .contact-price {
            color: #28a745 !important;
        }
        
        @media (max-width: 768px) {
            .product-card {
                margin-bottom: 1.5rem;
            }
            
            .quick-actions {
                display: none;
            }
            
            .product-image img {
                height: 200px !important;
            }
        }
        
        @media (max-width: 576px) {
            .product-actions {
                flex-direction: column;
            }
            
            .product-actions .btn {
                width: 100%;
            }
        }
    </style>
    
    <!-- JavaScript for product interactions -->
    <script>
        function addToCart(productId, productName, price) {
            // Thêm vào giỏ hàng
            let cart = JSON.parse(localStorage.getItem('antCart') || '[]');
            const existingItem = cart.find(item => item.id == productId);
            
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({
                    id: productId,
                    title: productName,
                    price: price,
                    quantity: 1
                });
            }
            
            localStorage.setItem('antCart', JSON.stringify(cart));
            
            // Hiển thị thông báo
            showNotification('Đã thêm sản phẩm vào giỏ hàng!', 'success');
            
            // Cập nhật badge giỏ hàng nếu có
            updateCartBadge();
        }
        
        function addToWishlist(productId) {
            // Thêm vào danh sách yêu thích
            let wishlist = JSON.parse(localStorage.getItem('wishlist') || '[]');
            if (!wishlist.includes(productId)) {
                wishlist.push(productId);
                localStorage.setItem('wishlist', JSON.stringify(wishlist));
                showNotification('Đã thêm vào danh sách yêu thích!', 'info');
            } else {
                showNotification('Sản phẩm đã có trong danh sách yêu thích!', 'warning');
            }
        }
        
        function addToCompare(productId) {
            // Thêm vào danh sách so sánh
            let compareList = JSON.parse(localStorage.getItem('compareList') || '[]');
            if (!compareList.includes(productId)) {
                compareList.push(productId);
                localStorage.setItem('compareList', JSON.stringify(compareList));
                showNotification('Đã thêm vào danh sách so sánh!', 'info');
            } else {
                showNotification('Sản phẩm đã có trong danh sách so sánh!', 'warning');
            }
        }
        
        function showNotification(message, type = 'info') {
            // Tạo notification element
            const notification = document.createElement('div');
            notification.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
            notification.style.cssText = `
                top: 20px;
                right: 20px;
                z-index: 9999;
                min-width: 300px;
                box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            `;
            notification.innerHTML = `
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;
            
            document.body.appendChild(notification);
            
            // Tự động ẩn sau 3 giây
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.remove();
                }
            }, 3000);
        }
        
        function updateCartBadge() {
            const cart = JSON.parse(localStorage.getItem('antCart') || '[]');
            const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
            
            // Cập nhật floating cart badge nếu có
            const floatingCartCount = document.getElementById('floating-cart-count');
            if (floatingCartCount) {
                floatingCartCount.textContent = totalItems;
                const cartBadge = document.querySelector('.cart-badge');
                if (cartBadge) {
                    cartBadge.classList.toggle('hidden', totalItems === 0);
                }
            }
        }
        
        // Khởi tạo khi trang load
        document.addEventListener('DOMContentLoaded', function() {
            updateCartBadge();
        });
    </script>
<?php endif; ?>
