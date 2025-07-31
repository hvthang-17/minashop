@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <style>

        .category-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 2rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        .category-item {
            perspective: 1000px;
        }

        .category-card {
            position: relative;
            width: 100%;
            height: 300px;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: transform 0.6s ease;
        }

        .category-card:hover {
            transform: translateY(-10px);
        }

        .image-wrapper {
            position: relative;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .category-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .category-card:hover .category-image {
            transform: scale(1.1);
        }

        .category-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 1.5rem;
            background: linear-gradient(to top,
                    rgba(0, 0, 0, 0.8),
                    rgba(0, 0, 0, 0));
            color: white;
            transform: translateY(100%);
            transition: transform 0.4s ease;
        }

        .category-card:hover .category-content {
            transform: translateY(0);
        }

        .category-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: white;


        }

        .category-link {
            display: flex;
            align-items: center;
            color: white;
            font-weight: 500;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .category-link:hover {
            color: #60a5fa;
        }

        .arrow-icon {
            width: 1.25rem;
            height: 1.25rem;
            margin-left: 0.5rem;
            fill: currentColor;
            transition: transform 0.3s ease;
        }

        .category-link:hover .arrow-icon {
            transform: translateX(5px);
        }

        @media (max-width: 768px) {
            .category-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 1rem;
            }

            .category-card {
                height: 250px;
            }

            .category-content {
                transform: translateY(0);
                background: linear-gradient(to top,
                        rgba(0, 0, 0, 0.8),
                        rgba(0, 0, 0, 0.4));
            }
        }

        .slide-img {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }

        .slider-home {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .slider-content {
            width: 100%;
            text-align: center;
        }

        .custom-banner {
            text-align: center;
        }

        .banner-item {
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .banner-img {
            width: 100%;
            height: 350px;
            object-fit: cover;
            border-radius: 10px;
        }

        .banner-content {
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
            z-index: 2;
            text-transform: uppercase;
        }

        .banner-mark {
            font-size: 14px;
            background: rgba(0, 0, 0, 0.5);
            padding: 5px 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .banner-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .baner-btn {
            color: #fff;
            background: #ff6347;
            padding: 8px 16px;
            border-radius: 20px;
            text-decoration: none;
        }

        .baner-btn:hover {
            background: #ff4500;
            text-decoration: none;
        }
    </style>
    <main>
        <section class="swiper-container js-swiper-slider swiper-number-pagination slideshow"
            data-settings='{
        "autoplay": {
          "delay": 5000
        },
        "slidesPerView": 1,
        "effect": "fade",
        "loop": true
      }'>
            <div class="swiper-wrapper">
                @foreach ($slides as $slide)
                    <div class="swiper-slide">
                        <div class="overflow-hidden position-relative h-100">
                            <div class="slideshow-character position-absolute bottom-0 pos_right-center">
                                <img loading="lazy" src="{{ asset('uploads/slides') }}/{{ $slide->image }}" width="542"
                                    height="733"
                                    class="slideshow-character__img animate animate_fade animate_btt animate_delay-9 w-auto h-auto" />
                                <div class="character_markup type2">
                                    <p
                                        class="text-uppercase font-sofia mark-grey-color animate animate_fade animate_btt animate_delay-10 mb-0" style="font-size: 180px;">
                                        {{ $slide->tagline }}
                                    </p>
                                </div>
                            </div>
                            <div class="slideshow-text container position-absolute start-50 top-50 translate-middle">
                                <h6
                                    class="text_dash text-uppercase fs-base fw-medium animate animate_fade animate_btt animate_delay-3">
                                    Sản phẩm mới về
                                </h6>
                                <h2 class="h1 fw-normal mb-0 animate animate_fade animate_btt animate_delay-5">
                                    {{ $slide->title }}</h2>
                                <h2 class="h1 fw-bold animate animate_fade animate_btt animate_delay-5">
                                    {{ $slide->subtitle }}</h2>
                                <a href="{{ $slide->link }}"
                                    class="btn-link btn-link_lg default-underline fw-medium animate animate_fade animate_btt animate_delay-7">Mua ngay
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="container">
                <div
                    class="slideshow-pagination slideshow-number-pagination d-flex align-items-center position-absolute bottom-0 mb-5">
                </div>
            </div>
        </section>
        <div class="container mw-1620 bg-white border-radius-10">
            <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>
            <section class="category-showcase py-16">
                <div class="container mx-auto px-4">
                    <h2 class="text-center text-3xl font-bold mb-15 "
                        style="margin-bottom:50px !important;margin-top:50px !important;">Khám phá danh mục</h2>

                        <div class="category-grid">
                        @foreach ($categories->slice(0, 5) as $category)
                            <div class="category-item">
                                <div class="category-card">
                                    <div class="image-wrapper">
                                        <img loading="lazy" src="{{ asset('uploads/categories') }}/{{ $category->image }}"
                                            alt="{{ $category->name }}" class="category-image" />
                                    </div>
                                    <div class="category-content">
                                        <h3 class="category-title">{{ $category->name }}</h3>
                                        <a href="{{ route('shop.index', ['categories' => $category->id]) }}"
                                            class="category-link">
                                            Khám phá ngay
                                            <svg class="arrow-icon" viewBox="0 0 24 24">
                                                <path
                                                    d="M13.025 1l-2.847 2.828 6.176 6.176h-16.354v3.992h16.354l-6.176 6.176 2.847 2.828 10.975-11z" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

            <section class="hot-deals container">
                <h2 class="section-title text-center mb-3 pb-xl-3 mb-xl-4">Ưu đãi hấp dẫn</h2>
                <div class="row">
                    <div
                        class="col-md-6 col-lg-4 col-xl-20per d-flex align-items-center flex-column justify-content-center py-4 align-items-md-start">
                        <h2>Tri ân khách hàng</h2>
                        <h2 class="fw-bold">Giảm giá sản phẩm</h2>

                        <div class="position-relative d-flex align-items-center text-center pt-xxl-4 js-countdown mb-3"
                            data-date="18-3-2024" data-time="06:50">
                            <div class="day countdown-unit">
                                <span class="countdown-num d-block"></span>
                                <span class="countdown-word text-uppercase text-secondary">Ngày</span>
                            </div>

                            <div class="hour countdown-unit">
                                <span class="countdown-num d-block"></span>
                                <span class="countdown-word text-uppercase text-secondary">Giờ</span>
                            </div>

                            <div class="min countdown-unit">
                                <span class="countdown-num d-block"></span>
                                <span class="countdown-word text-uppercase text-secondary">Phút</span>
                            </div>

                            <div class="sec countdown-unit">
                                <span class="countdown-num d-block"></span>
                                <span class="countdown-word text-uppercase text-secondary">Giây</span>
                            </div>
                        </div>

                        <a href="{{ route('shop.index') }}"
                            class="btn-link default-underline text-uppercase fw-medium mt-3">Xem tất cả</a>
                    </div>
                    <div class="col-md-6 col-lg-8 col-xl-80per">
                        <div class="position-relative">
                            <div class="swiper-container js-swiper-slider"
                                data-settings='{
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": 4,
                  "slidesPerGroup": 4,
                  "effect": "none",
                  "loop": false,
                  "breakpoints": {
                    "320": {
                      "slidesPerView": 2,
                      "slidesPerGroup": 2,
                      "spaceBetween": 14
                    },
                    "768": {
                      "slidesPerView": 2,
                      "slidesPerGroup": 3,
                      "spaceBetween": 24
                    },
                    "992": {
                      "slidesPerView": 3,
                      "slidesPerGroup": 1,
                      "spaceBetween": 30,
                      "pagination": false
                    },
                    "1200": {
                      "slidesPerView": 4,
                      "slidesPerGroup": 1,
                      "spaceBetween": 30,
                      "pagination": false
                    }
                  }
                }'>
                                <div class="swiper-wrapper">
                                    @foreach ($sproducts as $sproduct)
                                        <div class="swiper-slide product-card product-card_style3">
                                            <div class="pc__img-wrapper">
                                                <a
                                                    href="{{ route('shop.product.details', ['product_slug' => $sproduct->slug]) }}">
                                                    <img loading="lazy"
                                                        src="{{ asset('uploads/products') }}/{{ $sproduct->image }}"
                                                        width="258" height="313" alt="{{ $sproduct->name }}"
                                                        class="pc__img">
                                                </a>
                                            </div>

                                            <div class="pc__info position-relative">
                                                <h6 class="pc__title"><a href="details.html">{{ $sproduct->name }}</a>
                                                </h6>
                                                <div class="product-card__price d-flex">
                                                    <span class="money price text-secondary">
                                                        @if ($sproduct->sale_price)
                                                            <s>${{ $sproduct->regular_price }}</s>
                                                            ${{ $sproduct->sale_price }}
                                                        @else
                                                            ${{ $sproduct->regular_price }}
                                                        @endif
                                                    </span>
                                                </div>


                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>
            <section class="custom-slider container py-5">
                <h2 class="section-title text-center mb-4">Ưu đãi tốt nhất của chúng tôi</h2>
                <div class="swiper-container js-custom-slider"
                    data-settings='{
          "autoplay": {
            "delay": 3000
          },
          "loop": true,
          "slidesPerView": 1,
          "spaceBetween": 20,
          "navigation": true,
          "pagination": true
        }'>
                    <div class="swiper-wrapper">

                        <div class="swiper-slide slider-home">
                            <div class="slider-content d-flex align-items-center justify-content-center bg-light p-4">
                                <img src="https://cdn.shopify.com/s/files/1/0697/0775/9932/files/top02_img11.jpg"
                                    alt="Slide 1" class="slider-img slide-img">
                            </div>
                        </div>

                        <div class="swiper-slide slider-hom">
                            <div class="slider-content d-flex align-items-center justify-content-center bg-light p-4">
                                <img src="https://cdn.shopify.com/s/files/1/0697/0775/9932/files/top06_img01.jpg"
                                    alt="Slide 2" class="slider-img slide-img">
                            </div>
                        </div>

                        <div class="swiper-slide slider-hom">
                            <div class="slider-content d-flex align-items-center justify-content-center bg-light p-4">
                                <img src="https://cdn.shopify.com/s/files/1/0697/0775/9932/files/mv_b02b2130-719a-4f03-a83d-207e15c85b58.jpg"
                                    alt="Slide 3" class="slider-img slide-img">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

            <section class="custom-banner container py-5">
                <div class="row justify-content-center">

                    <div class="col-md-6 mb-4">
                        <div class="banner-item position-relative">
                            <img loading="lazy"
                                src="https://kobeantique.com/cdn/shop/files/SC-115D-13_large.jpg?v=1695101164"
                                alt="Blazers" class="banner-img">
                            <div class="banner-content position-absolute text-center">
                                <div class="banner-mark">Giá tri ân</div>
                                <h3 class="banner-title text-white">Tranh ảnh</h3>
                                <a href="#" class="btn-link baner-btn text-uppercase fw-medium">Mua ngay</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="banner-item position-relative">
                            <img loading="lazy"
                                src="https://kobeantique.com/cdn/shop/files/GLS-37-1_large.webp?v=1695173696"
                                alt="Sportswear" class="banner-img">
                            <div class="banner-content position-absolute text-center">
                                <div class="banner-mark">Giá tri ân</div>
                                <h3 class="banner-title text-white">Phụ kiện</h3>
                                <a href="#" class="btn-link baner-btn text-uppercase fw-medium">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

            <section class="products-grid container">
                <h2 class="section-title text-center mb-3 pb-xl-3 mb-xl-4">Sản phẩm nổi bật</h2>

                <div class="row">
                    @foreach ($fproducts as $fproduct)
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="product-card product-card_style3 mb-3 mb-md-4 mb-xxl-5">
                                <div class="pc__img-wrapper">
                                    <a href="{{ route('shop.product.details', ['product_slug' => $fproduct->slug]) }}">
                                        <img loading="lazy" src="{{ asset('uploads/products') }}/{{ $fproduct->image }}"
                                            width="330" height="400" alt="{{ $fproduct->name }}" class="pc__img">
                                    </a>
                                </div>

                                <div class="pc__info position-relative">
                                    <h6 class="pc__title"><a
                                            href="{{ route('shop.product.details', ['product_slug' => $fproduct->slug]) }}">{{ $fproduct->name }}</a>
                                    </h6>
                                    <div class="product-card__price d-flex align-items-center">
                                        <span class="money price text-secondary">
                                            @if ($fproduct->sale_price)
                                                <s>${{ $fproduct->regular_price }}</s> ${{ $fproduct->sale_price }}
                                            @else
                                                ${{ $fproduct->regular_price }}
                                            @endif
                                        </span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="text-center mt-2">
                    <a class="btn-link btn-link_lg default-underline text-uppercase fw-medium" href="#">Xem thêm</a>
                </div>
            </section>
        </div>

        <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

    </main>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('show');
                    }
                });
            }, {
                threshold: 0.1
            });

            document.querySelectorAll('.category-card').forEach((card) => {
                observer.observe(card);
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            new Swiper('.js-custom-slider', {
                autoplay: {
                    delay: 3000
                },
                loop: true,
                slidesPerView: 1,
                spaceBetween: 20,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
            });
        });
    </script>
@endsection
