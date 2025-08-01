<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $this->renderSection('title') ?> | สัปดาห์วิทยาศาสตร์</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="<?=base_url()?>public/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=K2D:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">



    <!-- Libraries Stylesheet -->
    <link href="<?=base_url()?>public/lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?=base_url()?>public/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?=base_url()?>public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?=base_url()?>public/css/style.css?v=1" rel="stylesheet">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-CG2G30P3GD"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-CG2G30P3GD');
    </script>

    <!-- Google Tag Manager -->
    <script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-N9SPNRFT');
    </script>
    <!-- End Google Tag Manager -->


    <style>
    * {
        font-family: 'K2D', sans-serif !important;
    }


    @media only screen and (max-width: 575.98px) {
        .titel-text {
            font-size: 2.7rem;
            text-shadow: 2px -4px 6px #020202;
        }
    }

    @media (min-width: 576px) {
        .titel-text {
            font-size: 3.7rem;
            text-shadow: 2px -4px 6px #020202;
        }
    }

    @media (min-width: 768px) {
        
    }

    @media (min-width: 992px) {}

    @media (min-width: 1200px) {}

    @media (min-width: 1400px) {}
    </style>
    <?= $this->renderSection('css') ?>
</head>

<body>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N9SPNRFT" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->


    <div class="bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="<?=base_url()?>" class="navbar-brand p-0 d-flex">
                    <img src="<?=base_url()?>public/img/logo/LogoSKJ_4.png" alt="Logo" class="mx-2">
                    <img src="<?=base_url()?>public/img/logo/opj.png" alt="Logo" class="mx-2">
                    <img src="<?=base_url()?>public/img/logo/owtys.png" alt="Logo" class="mx-2">
                    <!-- <h1 class="m-0">สัปดาห์วิทยาศาสตร์ 2025</h1> -->

                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <i class="bi bi-layout-text-sidebar"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="<?=base_url()?>#service" class="nav-item nav-link">รายการแข่งขัน</a>
                        <a target="_blank"
                            href="https://drive.google.com/file/d/18UPEatf5zr2nVi3EstNerVuRhdot_9cn/view?usp=sharing"
                            class="nav-item nav-link">กำหนดการแข่งขัน</a>
                        <a href="#" onClick="showAlert()" class="nav-item nav-link">ตารางแข่งขัน</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">ดาวน์โหลดเอกสาร</a>
                            <div class="dropdown-menu m-0">
                                <a href="#" onClick="showAlert()" class="dropdown-item">หนังสือโครงการ</a>
                                <a target="_blank"
                                    href="https://drive.google.com/file/d/1wyqherkET2vx1ouSoxtoDGXerD9CqSda/view?usp=sharing"
                                    class="dropdown-item">หนังสือเชิญ</a>
                                <a href="<?=base_url()?>#service" class="dropdown-item">กติกาการแข่งขัน</a>
                                <a href="#" onClick="showAlert()" class="dropdown-item">แผนผังการจัดงาน</a>
                                <a target="_blank"
                                    href="https://drive.google.com/file/d/1Bvvbz2Yu59txaxrJfRbA-4BJxZ0fssfH/view?usp=sharing"
                                    class="dropdown-item">รายชื่อโรงแรม</a>
                                    <a target="_blank"
                                    href="https://drive.google.com/drive/folders/1a1bGd334orqDHIOHtDAeOJZXjUAlrzym"
                                    class="dropdown-item">หนังสือเปลี่ยนตัวผู้แข่งขัน</a>
                            </div>
                        </div>
                        <!-- <a onClick="showAlert()" class="nav-item nav-link">ผลการแข่งขัน</a> -->
                        <a href="<?=base_url('Register/Certificate')?>" class="nav-item nav-link">ผลการแข่งขัน</a>
                        <a href="<?=base_url('Register/ListNameTeams')?>"
                            class="nav-item nav-link">รายชื่อทีมสมัครแข่งขัน</a>
                    </div>
                    <!-- <a href="#service" class="btn btn-light rounded-pill text-primary py-2 px-4 ms-lg-5">สมัครแข่งขัน</a> -->
                </div>
            </nav>


        </div>

        <!-- Main Content -->
        <main>
            <?= $this->renderSection('content') ?>
        </main>



        <!-- Footer Start -->
        <div class="container-fluid bg-primary text-light footer pt-5 wow fadeIn" data-wow-delay="0.1s"
            style="margin-top: 6rem;">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-3">
                        <h5 class="text-white mb-4">สัปดาห์วิทยาศาสตร์ 2568</h5>
                        <p><i class="bi bi-geo-alt"></i> 160 ม.1 ต.นครสวรรค์ออก อ.เมือง จ.นครสวรรค์ 60000</p>

                        <p><i class="bi bi-telephone"></i> 056-009-667</p>
                        <p><i class="bi bi-envelope"></i> skjns160@skj.ac.th</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href="https://www.facebook.com/SKJNS160"><i
                                    class="bi bi-facebook"></i></a>
                            <a class="btn btn-outline-light btn-social"
                                href="https://www.youtube.com/channel/UC7p4cQQuIFLyrF68p7JbWDw"><i
                                    class="bi bi-youtube"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h5 class="text-white mb-4"></h5>
                        <a class="btn btn-link" href="">รายการแข่งขัน</a>
                        <a class="btn btn-link" href="">กำหนดการแข่งขัน</a>
                        <a class="btn btn-link" href="">ตารางแข่ง</a>
                        <a class="btn btn-link" href="">ดาวน์โหลดเอกสาร</a>
                        <a class="btn btn-link" href="">ผลการการแข่งขัน</a>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <h4 class="text-white mb-4">กลุ่มสาระการเรียนรู้วิทยาศาสตร์และเทคโนโลยี</h5>
                            <p><i class="bi bi-geo"></i> โรงเรียนสวนกุหลาบวิทยาลัย (จิรประวัติ) นครสวรรค์</p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">SciWeek2025</a>, All Right Reserved.

                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Author By <a class="border-bottom" href="https://www.facebook.com/dekpiano">Dekpiano</a>

                        </div>
                        <!-- <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url()?>public/lib/wow/wow.min.js"></script>
    <script src="<?=base_url()?>public/lib/easing/easing.min.js"></script>
    <script src="<?=base_url()?>public/lib/waypoints/waypoints.min.js"></script>
    <script src="<?=base_url()?>public/lib/owlcarousel/owl.carousel.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Template Javascript -->
    <script src="<?=base_url()?>public/js/main.js"></script>

    <?= $this->renderSection('script') ?>

    <script>
         // ข้อความที่คุณต้องการแสดงใน Pop-up
        const notificationMessage = `
            <div style="text-align: center; font-size: 1.1em; line-height: 1.6;">
                <p style="font-weight: bold; color: #e74c3c; margin-bottom: 10px;">ขยายเวลาสมัคร!</p>
                <p>ตั้งเเต่บัดนี้ - <span style="font-weight: bold; color: #3498db;">31 ก.ค. 68 เวลา 12.00 น.</span></p>
                <p>ในรายการเเข่งขัน <span style="font-weight: bold; color: #2ecc71;">Science Cover Dance</span> เเละ <span style="font-weight: bold; color: #f39c12;">จรวดขวดน้ำ</span></p>
                <p style="font-size: 0.9em; color: #7f8c8d; margin-top: 15px;">(ปิดรับสมัครทันที เมื่อครบจำนวนทีมที่กำหนด)</p>
            </div>
        `;

        // ฟังก์ชันสำหรับแสดง Pop-up
        function showNotificationPopup() {
            Swal.fire({
                title: 'ประกาศสำคัญ!', // หัวข้อ Pop-up
                html: notificationMessage, // เนื้อหา Pop-up (รองรับ HTML)
                icon: 'info', // ไอคอน (info, success, error, warning, question)
                confirmButtonText: 'รับทราบ', // ข้อความบนปุ่มยืนยัน
                confirmButtonColor: '#3085d6', // สีปุ่มยืนยัน
                allowOutsideClick: false, // ไม่อนุญาตให้คลิกนอก Pop-up เพื่อปิด
                allowEscapeKey: false, // ไม่อนุญาตให้กด Esc เพื่อปิด
                customClass: {
                    popup: 'rounded-lg shadow-xl', // เพิ่มคลาส Tailwind ให้กับ Pop-up
                    title: 'text-2xl font-bold text-gray-800',
                    htmlContainer: 'text-gray-700',
                    confirmButton: 'px-6 py-3 text-lg'
                }
            });
        }

           // เมื่อ DOM โหลดเสร็จสมบูรณ์
        document.addEventListener('DOMContentLoaded', function() {
            // กำหนดคีย์สำหรับ sessionStorage
            const popupShownKey = 'hasPopupBeenShown';

            // ตรวจสอบว่า popup เคยแสดงในเซสชันนี้แล้วหรือยัง
            // sessionStorage จะเก็บข้อมูลไว้ตราบเท่าที่แท็บ/หน้าต่างเบราว์เซอร์ยังเปิดอยู่
            // ดังนั้น Pop-up จะแสดงเพียงครั้งเดียวต่อการเปิดแท็บ/หน้าต่างใหม่เท่านั้น
            // ไม่ว่าจะรีเฟรชหน้า หรือนำทางไปหน้าอื่นในโดเมนเดียวกันแล้วกลับมา
            if (!sessionStorage.getItem(popupShownKey)) {
                // ถ้ายังไม่เคยแสดง ให้แสดง popup
                //showNotificationPopup();
                // และตั้งค่าใน sessionStorage ว่าได้แสดงไปแล้ว
                sessionStorage.setItem(popupShownKey, 'true');
            }

            // คุณยังคงสามารถใช้ปุ่มเพื่อเปิด Pop-up ด้วยก็ได้ (จะแสดงทุกครั้งที่กด)
            const showPopupBtn = document.getElementById('showPopupBtn');
            if (showPopupBtn) {
                showPopupBtn.addEventListener('click', showNotificationPopup);
            }
        });
    </script>
</body>

</html>