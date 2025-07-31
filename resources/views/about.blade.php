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
        <p class="fs-4 text-white">Tìm hiểu thêm về sứ mệnh, tầm nhìn và câu chuyện của chúng tôi.</p>
      </div>

      <div id="carouselExampleCaptions" class="carousel slide mb-5" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="OUR STORY"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Our Mission"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Our Vision"></button>
        </div>
        <div class="carousel-inner">
            <!-- OUR STORY -->
            <div class="carousel-item active">
                <img src="https://cdn.shopify.com/s/files/1/0697/0775/9932/files/mv01.jpg" class="d-block w-100" alt="Our Story" style="border-radius: 15px;">
                <div class="carousel-caption d-flex justify-content-center align-items-center d-none d-md-block" style="border-radius: 15px; ">
                    <div class="text-center">
                        <h5 class="text-white " style="font-size:2.2rem">Câu chuyện </h5>
                        <p style="font-size:1.2rem">
                            Tại TT Antiques, chúng tôi đam mê bảo tồn và mang lại giá trị lịch sử qua từng món đồ cổ. Mỗi sản phẩm của chúng tôi đều chứa đựng
                            câu chuyện từ quá khứ, là sự kết nối giữa nghệ thuật và văn hóa. Chúng tôi tự hào cung cấp những món đồ độc đáo, mang đậm dấu ấn thời
                            gian, để khách hàng có thể sở hữu một phần của lịch sử.
                        </p>
                    </div>
                </div>
            </div>
            <!-- Our Mission -->
            <div class="carousel-item">
                <img src="https://cdn.shopify.com/s/files/1/0697/0775/9932/files/mv03.jpg" class="d-block w-100" alt="Our Mission" style="border-radius: 15px;">
                <div class="carousel-caption d-flex justify-content-center align-items-center d-none d-md-block" style="border-radius: 15px;">
                    <div class="text-center">
                        <h5 class="text-white" style="font-size:2.2rem">Sứ mệnh</h5>
                        <p style="font-size:1.2rem">
                        Sứ mệnh của chúng tôi là cung cấp những món đồ cổ chất lượng, bảo tồn giá trị văn hóa và lịch sử qua từng sản phẩm. Chúng tôi cam kết mang
                        đến cho khách hàng những trải nghiệm mua sắm tuyệt vời, với dịch vụ tư vấn và bảo dưỡng chuyên nghiệp.
                        </p>
                    </div>
                </div>
            </div>
            <!-- Our Vision -->
            <div class="carousel-item">
                <img src="https://cdn.shopify.com/s/files/1/0697/0775/9932/files/mv02.jpg" class="d-block w-100" alt="Our Vision" style="border-radius: 15px;">
                <div class="carousel-caption d-flex justify-content-center align-items-center d-none d-md-block" style="border-radius: 15px;">
                    <div class="text-center">
                        <h5 class="text-white" style="font-size:2.2rem">Tầm nhìn</h5>
                        <p style="font-size:1.2rem">
                        Chúng tôi hướng đến việc trở thành điểm đến tin cậy cho những người yêu thích đồ cổ, không ngừng mở rộng và mang lại những sản phẩm giá trị.
                        Tầm nhìn của chúng tôi là kết nối quá khứ và tương lai, giúp khách hàng khám phá và sở hữu những món đồ mang đậm giá trị văn hóa.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        </div>

      <div class="row mb-5">
            <div class="col-md-6">
                <img src="https://cdn.shopify.com/s/files/1/0697/0775/9932/files/shop_access02_img01.jpg" class="img-fluid rounded-sm" alt="Our Story">
            </div>
            <div class="col-md-6 d-flex flex-column justify-content-center custom-text-container">
                <h3 class="fs-3">Cửa hàng</h3>
                <p class="fs-5">
                    TT Antiques chuyên cung cấp đồ cổ chất lượng cao, tôn vinh và bảo tồn giá trị lịch sử. Chúng tôi mang đến những món
                    đồ độc đáo từ nhiều nền văn hóa khác nhau, với cam kết đem lại cho khách hàng sản phẩm tinh tế và dịch vụ tận tâm. Được
                    thành lập bởi đội ngũ đam mê nghệ thuật và lịch sử, chúng tôi không chỉ bán đồ cổ mà còn chia sẻ một phần di sản văn hóa quý giá.
                </p>
            </div>
        </div>

        <div class="team-section mt-5">
            <h3 class="text-center fs-2">Đội ngũ sáng lập</h3>
            <p class="text-center fs-5 mb-4">Chúng tôi tự hào về đội ngũ sáng lập và những người luôn nỗ lực để giữ gìn và phát triển TT Antiques.</p>
            <div class="row">
                <div class="col-md-4 text-center">
                    <img src="https://png.pngtree.com/png-clipart/20210608/ourlarge/pngtree-dark-gray-simple-avatar-png-image_3418404.jpg" alt="Founder" class="rounded-circle mb-3">
                    <h5>Hoàng Văn Thắng</h5>
                    <p class="fs-6">Sáng lập viên, người sáng tạo và bảo tồn nghệ thuật cổ.</p>
                </div>
                <div class="col-md-4 text-center">
                    <img src="https://png.pngtree.com/png-clipart/20210608/ourlarge/pngtree-dark-gray-simple-avatar-png-image_3418404.jpg" alt="Co-Founder" class="rounded-circle mb-3">
                    <h5>Trần Dương Thái</h5>
                    <p class="fs-6">Đồng sáng lập, chuyên gia về bảo tồn đồ cổ và lịch sử văn hóa.</p>
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
                            <p class="fs-5">Mỗi sản phẩm của chúng tôi được chọn lọc kỹ lưỡng để đảm bảo chất lượng tuyệt vời và giá trị lịch sử.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card card2 shadow-sm border-light">
                        <div class="card-body">
                            <h4 class="fs-4 text-primary text-white">Sự tin cậy</h4>
                            <p class="fs-5">Chúng tôi cam kết mang đến cho khách hàng những sản phẩm chính hãng và dịch vụ bảo hành uy tín.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card card3 shadow-sm border-light">
                        <div class="card-body">
                            <h4 class="fs-4 text-primary text-white">Sáng tạo</h4>
                            <p class="fs-5">Chúng tôi luôn sáng tạo trong việc kết hợp giữa quá khứ và hiện tại, mang lại những món đồ cổ độc đáo và mới mẻ.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="faq-section mt-5">
            <h3 class="text-center fs-2">Câu hỏi thường gặp (FAQ)</h3>
            <div class="accordion" id="faqAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Bạn có bảo hành cho sản phẩm không?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Có, chúng tôi cung cấp bảo hành cho các sản phẩm cổ nếu có sự cố liên quan đến chất lượng.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Làm thế nào để mua một sản phẩm?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Bạn có thể mua sản phẩm trực tiếp tại cửa hàng hoặc thông qua trang web của chúng tôi. Chúng tôi cũng hỗ trợ giao hàng tận nơi.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Sản phẩm của bạn có nguồn gốc như thế nào?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Tất cả sản phẩm của chúng tôi đều được chứng nhận là sản phẩm chính hãng, có nguồn gốc rõ ràng và được kiểm tra chất lượng kỹ lưỡng.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="contact-section mt-5">
            <h3 class="text-center fs-2 mb-4">Liên hệ với chúng tôi</h3>
            <div class="row justify-content-center">
                <div class="col-md-6 mb-4">
                    <div class="card contact1 shadow-sm border-light">
                        <div class="card-body">
                            <h5 class="card-title text-white">Email:</h5>
                            <p class="card-text">ttantiques@gmail.com</p>
                            <h5 class="card-title text-white">Địa chỉ:</h5>
                            <p class="card-text">470 Đ. Trần Đại Nghĩa, Hoà Hải, Ngũ Hành Sơn, Đà Nẵng</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card contact2 shadow-sm border-light">
                        <div class="card-body">
                            <h5 class="card-title text-white">Số điện thoại:</h5>
                            <p class="card-text">(+84) 358583114</p>
                            <h5 class="card-title text-white">Giờ làm việc:</h5>
                            <p class="card-text">Thứ Hai đến Thứ Sáu, từ 9:00 AM đến 6:00 PM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
