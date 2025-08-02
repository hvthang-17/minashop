@extends('layouts.app')
@section('content')
    <style>
        .carousel-item img {
            max-height: 500px;
            object-fit: cover;
        }

        .carousel-caption {
            background: rgba(0, 0, 0, 0.6);
            border-radius: 10px;
        }

        .about-us-header {
            background-image: url('https://cdn.shopify.com/s/files/1/0697/0775/9932/files/mv.jpg?');
            background-size: cover;
            background-position: center;
            padding: 80px 20px;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .about-us-header h2 {
            font-weight: bold;
            text-shadow: 3px 3px 10px rgba(0, 0, 0, 0.7);
        }

        .about-us-header p {
            font-size: 1.3rem;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.6);
        }

        .carousel-indicators button {
            width: 15px;
            height: 15px;
            border-radius: 50%;
            background-color: #fff;
            border: 2px solid #000;
            margin: 0 5px;
        }

        .carousel-indicators .active {
            background-color: #C0C0C0;
        }

        .team-section {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            background-image: url(https://kobeantique.com/cdn/shop/articles/DSC_1637.jpg?v=1683788922https://cdn.shopify.com/s/files/1/0697/0775/9932/files/about05_img01.jpg);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-color: rgba(0, 0, 0, 0.6);
            background-blend-mode: overlay;
            padding: 40px 20px;
            border-radius: 10px;
        }

        .team-section h3 {
            margin-bottom: 20px;
            font-weight: bold;
            color: #ffffff;
        }

        .team-section p {
            margin-bottom: 40px;
            color: #f0f0f0;
            max-width: 600px;
        }

        .team-section .row {
            display: flex;
            justify-content: center;
            gap: 50px;
        }

        .team-section .col-md-4 {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        .team-section img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
        }

        .team-section h5 {
            margin-top: 10px;
            font-size: 1.2rem;
            font-weight: bold;
            color: #333;
        }

        .team-section p.fs-6 {
            color: #666;
            font-size: 1rem;
            text-align: center;
            max-width: 280px;
        }

        .card {
            background: linear-gradient(145deg, rgba(255, 255, 255, 0.8), rgba(240, 240, 240, 0.6));
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            background-size: cover;
            background-position: center;
            color: #333;
            position: relative;
            overflow: hidden;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            position: relative;
            z-index: 2;
        }

        .card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .card1 {
            background-image: url(https://cdn.shopify.com/s/files/1/0697/0775/9932/files/about03_img01.jpg);
        }

        .card2 {
            background-image: url(https://cdn.shopify.com/s/files/1/0697/0775/9932/files/about04_img02.jpg);
        }

        .card3 {
            background-image: url(https://cdn.shopify.com/s/files/1/0697/0775/9932/files/about04_img01.jpg);
        }

        .card h4 {
            font-weight: bold;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);

        }

        .card p {
            margin-top: 10px;
            color: #f0f0f0;
            font-size: 1rem;
        }



        .faq-section {
            background-color: linear-gradient(135deg, #c4c5c7, #dcdddf, #ebebeb);
            padding: 50px 0;
        }

        .faq-section .accordion-button {
            font-size: 1.1rem;
            padding: 15px;
            color: #555555;
            font-weight: bold;
            border: 2px solid #ddd;
            transition: background-color 0.3s ease;
        }

        .faq-section .accordion-button:hover {
            background-color: #ffffff;
            border-color: #000000;
        }

        .faq-section .accordion-item {
            margin-bottom: 15px;
        }

        .faq-section .accordion-body {
            font-size: 1.1rem;
            color: #555555;
        }

        .contact-section .card {
            position: relative;
            transition: all 0.3s ease-in-out;
            background-size: cover;
            background-position: center;
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            color: #ffffff;
            overflow: hidden;
        }

        .contact-section .contact1 {
            background-image: url(https://cdn.shopify.com/s/files/1/0697/0775/9932/files/shop_access02_img08.jpg);
        }

        .contact-section .contact2 {
            background-image: url('https://cdn.shopify.com/s/files/1/0697/0775/9932/files/shop_access02_img04.jpg');
        }

        .contact-section .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        .contact-section .card-body {
            position: relative;
            z-index: 2;
            background: rgba(0, 0, 0, 0.4);
            padding: 20px;
            border-radius: 15px;
        }

        .contact-section .card-title {
            font-weight: bold;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
        }

        .contact-section .card-text {
            margin-top: 10px;
            font-size: 1rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }

        .contact-section h3 {
            font-weight: bold;
            color: #555555;
        }
    </style>
    <main class="pt-90">
        <div class="mb-4 pb-4"></div>
        <section class="about-us container">
            <div class="about-us-header text-center mb-5">
                <h2 class="page-title display-4 text-white">Giới thiệu</h2>
                <p class="fs-4 text-white">Khám phá câu chuyện, sứ mệnh và giá trị của Mina Shop – Mỹ phẩm chính hãng tại Đà
                    Nẵng.</p>
            </div>

            <div id="carouselExampleCaptions" class="carousel slide mb-5" data-bs-ride="carousel" data-bs-interval="3000">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="OUR STORY"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Our Mission"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Our Vision"></button>
                </div>
                <div class="carousel-inner">
                    <!-- OUR STORY -->
                    <div class="carousel-item active">
                        <img src="https://cdn.shopify.com/s/files/1/0697/0775/9932/files/mv01.jpg" class="d-block w-100"
                            alt="Our Story" style="border-radius: 15px;">
                        <div class="carousel-caption d-flex justify-content-center align-items-center d-none d-md-block"
                            style="border-radius: 15px; ">
                            <div class="text-center">
                                <h5 class="text-white " style="font-size:2.2rem">Câu chuyện </h5>
                                <p style="font-size:1.2rem">
                                    Thành lập từ năm 2017 tại Đà Nẵng, Mina Shop khởi đầu với niềm đam mê mang đến những sản
                                    phẩm làm đẹp chính hãng, an toàn và chất lượng cho mọi khách hàng.
                                    Trải qua nhiều năm, chúng tôi đã trở thành điểm đến tin cậy của hàng ngàn tín đồ yêu
                                    thích mỹ phẩm, nước hoa và phụ kiện làm đẹp.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Our Mission -->
                    <div class="carousel-item">
                        <img src="https://cdn.shopify.com/s/files/1/0697/0775/9932/files/mv03.jpg" class="d-block w-100"
                            alt="Our Mission" style="border-radius: 15px;">
                        <div class="carousel-caption d-flex justify-content-center align-items-center d-none d-md-block"
                            style="border-radius: 15px;">
                            <div class="text-center">
                                <h5 class="text-white" style="font-size:2.2rem">Sứ mệnh</h5>
                                <p style="font-size:1.2rem">
                                    Sứ mệnh của Mina Shop là giúp mỗi khách hàng tự tin và tỏa sáng với vẻ đẹp của chính
                                    mình thông qua các sản phẩm chăm sóc sắc đẹp chính hãng,
                                    được chọn lọc kỹ lưỡng từ những thương hiệu uy tín trên thế giới.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Our Vision -->
                    <div class="carousel-item">
                        <img src="https://cdn.shopify.com/s/files/1/0697/0775/9932/files/mv02.jpg" class="d-block w-100"
                            alt="Our Vision" style="border-radius: 15px;">
                        <div class="carousel-caption d-flex justify-content-center align-items-center d-none d-md-block"
                            style="border-radius: 15px;">
                            <div class="text-center">
                                <h5 class="text-white" style="font-size:2.2rem">Tầm nhìn</h5>
                                <p style="font-size:1.2rem">
                                    Chúng tôi hướng tới việc trở thành thương hiệu mỹ phẩm uy tín hàng đầu tại Đà Nẵng và mở
                                    rộng khắp Việt Nam,
                                    mang đến trải nghiệm mua sắm an toàn, tiện lợi và đáng tin cậy cho mọi khách hàng.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="about-us__content pb-5 mb-5">
                <div class="mw-930">
                    <h3 class="mb-4">Câu chuyện của Mina Shop</h3>
                    <p class="fs-6 fw-medium mb-4"> Mina Shop ra đời với mong muốn mang đến những sản phẩm làm đẹp chính
                        hãng, chất lượng và an toàn cho người tiêu dùng Việt.</p>
                    <p class="mb-4">Chúng tôi luôn đặt uy tín và chất lượng lên hàng đầu. Mỗi sản phẩm tại Mina Shop đều
                        được lựa chọn cẩn thận từ các thương hiệu nổi tiếng,
                        đảm bảo nguồn gốc rõ ràng, hạn sử dụng dài và giá cả hợp lý. Nhờ vậy, Mina Shop đã trở thành địa chỉ
                        mua sắm quen thuộc cho nhiều khách hàng tại Đà Nẵng và trên toàn quốc.
                    </p>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h5 class="mb-3">Sứ mệnh của Mina Shop</h5>
                            <p class="mb-3">Mang đến sản phẩm chính hãng, chất lượng cao và dịch vụ tư vấn tận tâm, giúp
                                khách hàng lựa chọn được sản phẩm phù hợp nhất.</p>
                        </div>
                        <div class="col-md-6">
                            <h5 class="mb-3">Tầm nhìn của Mina Shop
                            </h5>
                            <p class="mb-3"> Trở thành thương hiệu mỹ phẩm hàng đầu tại Đà Nẵng và mở rộng khắp Việt Nam,
                                gắn liền với sự tin tưởng của khách hàng.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mw-930 d-lg-flex align-items-lg-center">
                    <div class="image-wrapper col-lg-6">
                        <img class="h-auto" loading="lazy" src="assets/images/about/about-1.jpg" width="450"
                            height="500" alt="">
                    </div>
                    <div class="content-wrapper col-lg-6 px-lg-4">
                        <h5 class="mb-3">Mina Shop</h5>
                        <p> Địa chỉ: 279 Trần Đại Nghĩa, Hòa Hải, Ngũ Hành Sơn, Đà Nẵng.
                            Chúng tôi cung cấp mỹ phẩm trang điểm, chăm sóc da, nước hoa, phụ kiện và quà tặng – tất cả đều
                            chính hãng.
                            Giờ mở cửa: 07:30 – 23:00 hàng ngày.</p>
                    </div>
                </div>
            </div>

            <div class="core-values mt-5">
                <h3 class="text-center fs-2 mb-5">Giá trị cốt lõi</h3>
                <div class="row text-center">
                    <div class="col-md-4 mb-4">
                        <div class="card card1 shadow-sm border-light">
                            <div class="card-body">
                                <h4 class="fs-4 text-primary text-white">Chất lượng</h4>
                                <p class="fs-5">100% sản phẩm chính hãng, nhập khẩu từ thương hiệu uy tín và được chọn lọc
                                    kỹ lưỡng.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card card2 shadow-sm border-light">
                            <div class="card-body">
                                <h4 class="fs-4 text-primary text-white">Uy tín</h4>
                                <p class="fs-5">Cam kết rõ ràng về nguồn gốc sản phẩm, đảm bảo sự tin tưởng tuyệt đối từ
                                    khách hàng.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card card3 shadow-sm border-light">
                            <div class="card-body">
                                <h4 class="fs-4 text-primary text-white">Tận tâm</h4>
                                <p class="fs-5">Luôn lắng nghe và tư vấn phù hợp với nhu cầu riêng của từng khách hàng.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
