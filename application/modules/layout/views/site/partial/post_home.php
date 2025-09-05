<?php if (isset($data) && is_array($data) && !empty($data)): ?>
    <div class="row">
        <?php
        $i = 0;
        $image = get_image(get_module_path('posts') . $row['homeimgfile'], get_module_path('posts') . 'no-image.png');
        foreach ($data as $value):
            $i++;
            $data_id = $value['id'];
            $data_title = word_limiter($value['title'], 15);
            $data_hometext = word_limiter($value['hometext'], 80);
            $data_link = site_url($value['categories']['alias'] . '/' . $value['alias'] . '-' . $data_id);
            $data_image = array(
                'src' => get_image(
                    get_module_path('posts') . $value['homeimgfile'],
                    get_module_path('posts') . 'no-image.png'
                ),
                'alt' => !empty($value['homeimgalt']) ? $value['homeimgalt'] : $value['title']
            );
            $data_cat_name = $value['categories']['name'];
            $data_date = date('d', $value['addtime']) . '/' . date('m', $value['addtime']) . '/' . date('Y', $value['addtime']);
            $data_month = date('M', $value['addtime']);
            $data_day = date('d', $value['addtime']);
        ?>
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="<?php echo $i * 100; ?>">
                <div class="news-card bg-white rounded shadow-sm overflow-hidden h-100">
                    <!-- News Image -->
                    <div class="news-image position-relative">
                        <a href="<?php echo $data_link ?>">
                            <img src="<?php echo $data_image['src'] ?>"
                                alt="<?php echo $data_image['alt'] ?>"
                                class="img-fluid w-100"
                                style="height: 200px; object-fit: cover;">
                            <div class="news-overlay">
                                <div class="news-overlay-content">
                                    <i class="bi bi-arrow-right-circle-fill"></i>
                                </div>
                            </div>
                        </a>

                        <!-- Category Badge -->
                        <div class="category-badge position-absolute top-0 start-0 m-3">
                            <span class="badge bg-primary px-3 py-2">
                                <i class="bi bi-tag me-1"></i><?php echo $data_cat_name ?>
                            </span>
                        </div>

                        <!-- Date Badge -->
                        <div class="date-badge position-absolute top-0 end-0 m-3">
                            <div class="date-circle bg-danger text-white text-center rounded-circle d-flex flex-column justify-content-center align-items-center"
                                style="width: 60px; height: 60px;">
                                <span class="date-day fw-bold" style="font-size: 18px; line-height: 1;"><?php echo $data_day ?></span>
                                <span class="date-month" style="font-size: 12px; line-height: 1;"><?php echo $data_month ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- News Content -->
                    <div class="news-content p-4 d-flex flex-column h-100">
                        <!-- News Title -->
                        <div class="news-title mb-3">
                            <h5 class="fw-bold">
                                <a href="<?php echo $data_link ?>"
                                    class="text-decoration-none text-dark hover-primary">
                                    <?php echo $data_title ?>
                                </a>
                            </h5>
                        </div>

                        <!-- News Excerpt -->
                        <div class="news-excerpt mb-3 flex-grow-1">
                            <p class="text-muted mb-0" style="font-size: 14px; line-height: 1.6;">
                                <?php echo $data_hometext ?>
                            </p>
                        </div>

                        <!-- News Meta -->
                        <div class="news-meta d-flex justify-content-between align-items-center">
                            <div class="news-author text-muted" style="font-size: 12px;">
                                <i class="bi bi-person-circle me-1"></i>
                                <span>Admin</span>
                            </div>
                            <div class="news-read-more">
                                <a href="<?php echo $data_link ?>"
                                    class="btn btn-outline-primary btn-sm">
                                    Đọc thêm
                                    <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Custom CSS for enhanced styling -->
    <style>
        .news-card {
            transition: all 0.3s ease;
            border: 1px solid #e9ecef;
        }

        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1) !important;
            border-color: #007bff;
        }

        .news-image {
            overflow: hidden;
        }

        .news-image img {
            transition: transform 0.3s ease;
        }

        .news-card:hover .news-image img {
            transform: scale(1.05);
        }

        .news-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 123, 255, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .news-card:hover .news-overlay {
            opacity: 1;
        }

        .news-overlay-content i {
            font-size: 3rem;
            color: white;
        }

        .hover-primary:hover {
            color: #007bff !important;
        }

        .category-badge .badge {
            font-size: 11px;
            font-weight: 500;
        }

        .date-circle {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .news-content {
            background: linear-gradient(to bottom, #ffffff, #f8f9fa);
        }

        .btn-outline-primary:hover {
            transform: translateX(3px);
            transition: transform 0.2s ease;
        }

        @media (max-width: 768px) {
            .news-card {
                margin-bottom: 1.5rem;
            }

            .date-badge {
                display: none;
            }
        }
    </style>
<?php endif; ?>