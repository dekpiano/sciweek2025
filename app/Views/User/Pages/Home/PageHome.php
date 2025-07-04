<?= $this->extend('User/layouts/main') ?>
<?= $this->section('title') ?>
หน้าแรก
<?= $this->endSection() ?>
<?= $this->section('css') ?>
<style>
.bouncing-image {

    animation: bounce 2s infinite;
}

@keyframes bounce {
    0% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-10px);
    }

    100% {
        transform: translateY(0);
    }
}

.elementor-shape {
    overflow: hidden;
    position: absolute;
    left: 0;
    width: 100%;
    line-height: 0;
    direction: ltr;
    bottom: -3px;
}

.hero-header {
            background: url(public/img/bg/bg.jpg) center bottom no-repeat;
            background-size: cover;
            padding: 10rem 0 5rem 0;
        }
        .hero-header-banner {
            background: url(public/img/bg/bg.jpg) center top no-repeat;
           
            
        }

        @media (max-width: 991.98px) {
    .hero-header {
        padding: 6rem 0 9rem 0;
    }
}
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="bg-primary hero-header">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 text-center text-center">
                <h1 class="text-white text-center mb-4 animated zoomIn" style="font-size: 3.7rem;">SCIENCE WEEK 2025
                </h1>
                <h2 class="text-white text-center pb-3 animated zoomIn">งานมหกรรมวันวิทยาศาสตร์ <br> “วิทย์ยุคใหม่ AI
                    เปลี่ยนโลก” <br> 6 - 7 สิงหาคม 2568
                </h2>
                <a href="#service"
                    class="btn btn-outline-light rounded-pill border-2 py-3 px-3 animated slideInRight">รายการแข่งขัน</a>
                <a target="_blank" href="https://maps.app.goo.gl/NPBV39wtktEs6nXX6"
                    class="btn btn-light rounded-pill border-2 py-3 px-3 animated slideInRight"> <i
                        class="bi bi-geo-alt-fill"></i> Google Map</a>
            </div>
            <div class="col-lg-6 text-center text-lg-start">
                <img class="img-fluid animated zoomIn bouncing-image" src="<?=base_url()?>public/img/home/logo_sci.png"
                    alt="">
            </div>
        </div>
    </div>
    <!-- <div class="elementor-shape">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
            <path class="elementor-shape-fill"
                d="M500,97C126.7,96.3,0.8,19.8,0,0v100l1000,0V1C1000,19.4,873.3,97.8,500,97z"></path>
    </div> -->

    </svg>
</div>
<!-- Navbar & Hero End -->

<!-- Service Start -->
<div class="py-6" id="service">
    <div class="container">
        <div class="mx-auto text-center wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <div class="d-inline-block border rounded-pill text-primary px-4 mb-3">Our Services</div>
            <h2 class="mb-5">รายการแข่งขัน</h2>
        </div>
        <div class="row g-4">
            <?php foreach ($ListCompetition as $competition): ?>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded h-100">
                    <div class="d-flex justify-content-between">
                        <div class="service-icon">
                            <i class="<?=$competition->ctype_icon?> h1 text-white"></i>
                        </div>
                        <!-- <a class="service-btn" href="">
                            <i class="bi bi-link-45deg h1 text-white"></i>
                        </a> -->
                    </div>
                    <div class="p-5">
                        <h5 class="mb-3">การแข่งขัน <?=$competition->ctype_name?></h5>
                        <span><?=$competition->ctype_detail?></span>
                        <div class="mt-4">
                            <a target="_blank" href="<?=$competition->ctype_linkdetail?>" class="btn-info btn"><i
                                    class="bi bi-file-earmark-fill"></i> รายละเอียด / กติกา</a>
                            <?php if(1==1): ?>
                            <a target="_blank" href="<?=$competition->ctype_link_reg?>" class="btn-success btn"><i
                                    class="bi bi-pencil-square"></i> สมัครแข่งขัน</a>
                            <?php else: ?>
                            <a href="#" onClick="showAlertRegis()" class="btn-secondary btn"><i
                                    class="bi bi-pencil-square"></i> สมัครแข่งขัน</a>
                            <?php endif;?>
                        </div>

                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Service End -->

<!-- Newsletter Start -->
<div class="bg-primary hero-header-banner my-6 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container px-lg-5">
        <div class="row align-items-center" style="height: 250px;">
            <div class="col-12 col-md-6">
                <h3 class="text-white">AI, วิทยาศาสตร์, และเทคโนโลยี: ความสัมพันธ์ที่ขับเคลื่อนอนาคต</h3>
                <p class="text-white">วิทยาศาสตร์ค้นพบความรู้ใหม่ ๆ ส่วนเทคโนโลยีนำความรู้นั้นไปใช้ประโยชน์ และ AI
                    ก็เป็นผลผลิตสำคัญจากการผสานรวมกันของวิทยาศาสตร์และเทคโนโลยี ที่กำลังเปลี่ยนโลกของเราอย่างรวดเร็ว</p>
            </div>
            <div class="col-md-6 text-center mb-n5 d-none d-md-block">
                <img class="img-fluid bouncing-image" style="max-height: 400px;margin-top:-88px;"
                    src="<?=base_url()?>public/img/home/logo_sci2.png">
            </div>
        </div>
    </div>
</div>
<!-- Newsletter End -->


<!-- About Start -->
<div class="py-6">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow zoomIn" data-wow-delay="0.1s">
                <img class="img-fluid bouncing-image" src="<?=base_url()?>public/img/home/logo_sci3.png" alt="Logo">
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="d-inline-block border rounded-pill text-primary px-4 mb-3">About Us</div>
                <h2 class="mb-4">งานนี้เหมาะกับใคร?</h2>
                <div class="row g-3 mb-4">
                    <div class="col-12 d-flex">
                        <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                            <i class="bi bi-1-square text-white"></i>
                        </div>
                        <div class="ms-4">
                            <h6>นักเรียนและนักศึกษา</h6>
                            <span>
                                เป็นโอกาสดีในการเรียนรู้วิทยาศาสตร์และเทคโนโลยีผ่านกิจกรรมต่าง ๆ
                            </span>
                        </div>
                    </div>
                    <div class="col-12 d-flex">
                        <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                            <i class="bi bi-2-square text-white"></i>
                        </div>
                        <div class="ms-4">
                            <h6>บุคลากรทางการศึกษา</h6>
                            <span>สามารถเข้าร่วมเพื่อเรียนรู้นวัตกรรมและแนวทางการใช้เทคโนโลยีในกระบวนการเรียนการสอน</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- About End -->







<!-- Client Start -->
<!-- <div class="bg-primary my-6 py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="owl-carousel client-carousel">
            <a href="#"><img class="img-fluid" src="<?=base_url()?>public/img/logo-1.png" alt=""></a>
            <a href="#"><img class="img-fluid" src="<?=base_url()?>public/img/logo-2.png" alt=""></a>
            <a href="#"><img class="img-fluid" src="<?=base_url()?>public/img/logo-3.png" alt=""></a>
            <a href="#"><img class="img-fluid" src="<?=base_url()?>public/img/logo-4.png" alt=""></a>
            <a href="#"><img class="img-fluid" src="<?=base_url()?>public/img/logo-5.png" alt=""></a>
            <a href="#"><img class="img-fluid" src="<?=base_url()?>public/img/logo-6.png" alt=""></a>
            <a href="#"><img class="img-fluid" src="<?=base_url()?>public/img/logo-7.png" alt=""></a>
            <a href="#"><img class="img-fluid" src="<?=base_url()?>public/img/logo-8.png" alt=""></a>
        </div>
    </div>
</div> -->
<!-- Client End -->


<!-- Testimonial Start -->
<!-- <div class="py-6">
    <div class="container">
        <div class="mx-auto text-center wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <div class="d-inline-block border rounded-pill text-primary px-4 mb-3">Testimonial</div>
            <h2 class="mb-5">What Our Clients Say!</h2>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            <div class="testimonial-item rounded p-4">
                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded-circle"
                        src="<?=base_url()?>public/img/testimonial-1.jpg">
                    <div class="ps-3">
                        <h6 class="mb-1">Client Name</h6>
                        <small>Profession</small>
                    </div>
                </div>
            </div>
            <div class="testimonial-item rounded p-4">
                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded-circle"
                        src="<?=base_url()?>public/img/testimonial-2.jpg">
                    <div class="ps-3">
                        <h6 class="mb-1">Client Name</h6>
                        <small>Profession</small>
                    </div>
                </div>
            </div>
            <div class="testimonial-item rounded p-4">
                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded-circle"
                        src="<?=base_url()?>public/img/testimonial-3.jpg">
                    <div class="ps-3">
                        <h6 class="mb-1">Client Name</h6>
                        <small>Profession</small>
                    </div>
                </div>
            </div>
            <div class="testimonial-item rounded p-4">
                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded-circle"
                        src="<?=base_url()?>public/img/testimonial-4.jpg">
                    <div class="ps-3">
                        <h6 class="mb-1">Client Name</h6>
                        <small>Profession</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Testimonial End -->



<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
function showAlert() {
    Swal.fire({
        title: "แจ้งเตือน?",
        text: "กำลังรอข้อมูล...?",
        icon: "question"
    });
}

function showAlertRegis() {
    Swal.fire({
        title: "แจ้งเตือน?",
        text: "จะให้เปิดสมัครแข่งขันในระบบภายในเร็วๆ นี้",
        icon: "warning"
    });
}
</script>
<?= $this->endSection() ?>