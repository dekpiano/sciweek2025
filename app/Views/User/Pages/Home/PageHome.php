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

        /* Modal styles */
        .modal-header {
            background-color: #007bff;
            color: white;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .modal-header .btn-close {
            filter: invert(1) grayscale(100%) brightness(200%); /* Make close button white */
        }
        .modal-content {
            border-radius: 12px;
        }
        .modal-body ul {
            list-style: none;
            padding-left: 0;
        }
        .modal-body ul li {
            padding: 8px 0;
        }
        .modal-body ul li:last-child {
            border-bottom: none;
        }
        /* Custom styles for tables within modal */
        .modal-body .team-table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
            border: 1px solid #dee2e6;
            border-radius: 8px; /* Apply border-radius to the table itself */
            overflow: hidden; /* Ensures rounded corners are visible with borders */
        }
        .modal-body .team-table th,
        .modal-body .team-table td {
            padding: 8px;
            border: 1px solid #dee2e6;
            vertical-align: middle;
        }
        .modal-body .team-table thead th {
            background-color: #e9ecef;
            color: #495057;
            font-weight: 600;
            text-align: left;
        }
        .modal-body .team-table tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.03);
        }
        .modal-body .team-table tbody tr:hover {
            background-color: rgba(0, 123, 255, 0.05);
        }
        .modal-body .team-table .team-info-row td {
            font-size: 1.1em;
            font-weight: bold;
            background-color: #f8f9fa;
        }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="bg-primary hero-header">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 text-center text-center">
                <h1 class="text-white text-center mb-4 animated zoomIn titel-text">SCIENCE WEEK 2025
                </h1>
                <h2 class="text-white text-center pb-3 animated zoomIn" style="text-shadow: 2px -4px 6px #020202;">งานมหกรรมวันวิทยาศาสตร์ <br> “วิทย์ยุคใหม่ AI
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
                            <a target="_blank" href="<?=$competition->ctype_linkdetail?>"
                                class="btn btn-outline-success d-block"><i class="bi bi-file-earmark-fill"></i>
                                รายละเอียด/กติกา</a>
                                
                            <button type="button" data-competition-key="<?=$competition->ctype_keyname?>"
                                class="btn btn-outline-secondary w-100 mt-1 competition-button"><i
                                    class="bi bi-file-earmark-fill"></i>
                                รายชื่อทีมสมัครแข่งขัน</button>
                        </div>
                        <div class="mt-3">
                            <?php if(1==1): ?>
                            <a target="_blank" href="<?=$competition->ctype_link_reg?>"
                                class="btn-success btn d-block"><i class="bi bi-pencil-square"></i> สมัครแข่งขัน</a>
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

<!-- Team List Modal -->
    <div class="modal fade" id="teamListModal" tabindex="-1" aria-labelledby="teamListModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="teamListModalLabel">รายชื่อทีม: </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="modalCompetitionDescription" class="text-muted"></p>
                    <div id="modalTeamList">
                        <!-- Team list will be populated here -->
                    </div>
                    <p id="noTeamMessage" class="text-center text-muted d-none mt-3">ยังไม่มีทีมสมัครในประเภทนี้</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                </div>
            </div>
        </div>
    </div>

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


<script>
        document.addEventListener('DOMContentLoaded', function () {
            // อ้างอิงถึงองค์ประกอบ HTML ที่จำเป็น
            const competitionButtonsContainer = document.getElementById('competitionButtons'); // ID ของ div ที่เก็บปุ่ม
            const teamListModal = new bootstrap.Modal(document.getElementById('teamListModal'));
            const modalTitle = document.getElementById('teamListModalLabel');
            const modalDescription = document.getElementById('modalCompetitionDescription');
            const modalTeamList = document.getElementById('modalTeamList');
            const noTeamMessage = document.getElementById('noTeamMessage');

            // กำหนดรายละเอียดประเภทการแข่งขัน
            // ใช้ข้อมูลนี้เพื่อแสดงชื่อและรายละเอียดของการแข่งขัน
            const competitionDetails = {
                "waterbottlerocket": {
                    name: "แข่งขันจรวดขวดน้ำ (แม่นยำ)",
                    description: "การแข่งขันสร้างและยิงจรวดขวดน้ำเพื่อความแม่นยำ",
                    isTeam: true,
                    minMembers: 3,
                    maxMembers: 3
                },
                "scientificdrawings": {
                    name: "ภาพวาดทางวิทยาศาสตร์",
                    description: "ประกวดภาพวาดที่สื่อถึงแนวคิดทางวิทยาศาสตร์",
                    isTeam: true,
                    minMembers: 2,
                    maxMembers: 2
                },
                "Innovativecostumedesign": {
                    name: "ประกวดชุดรีไซเคิล (Innovative costume design)",
                    description: "การออกแบบชุดจากวัสดุรีไซเคิล",
                    isTeam: false,
                    minMembers: 1,
                    maxMembers: 1
                },
                "ScienceCoverDance": {
                    name: "Science Cover Dance",
                    description: "การเต้น Cover Dance ในธีมวิทยาศาสตร์",
                    isTeam: true,
                    minMembers: 5,
                    maxMembers: 10
                },
                "SpeedyQuiz": {
                    name: "ถามไว ตอบไว (Speedy quiz)",
                    description: "การแข่งขันตอบคำถามวิทยาศาสตร์อย่างรวดเร็ว",
                    isTeam: true,
                    minMembers: 3,
                    maxMembers: 3
                },
                "ROV": {
                    name: "กีฬา E-Sport ROV",
                    description: "การแข่งขันเกม ROV",
                    isTeam: true,
                    minMembers: 5,
                    maxMembers: 7
                },
                "LineTracing": {
                    name: "Line Tracing",
                    description: "การแข่งขันหุ่นยนต์เดินตามเส้น",
                    isTeam: true,
                    minMembers: 1,
                    maxMembers: 1
                },
                "GAME24": {
                    name: "GAME 24",
                    description: "การแข่งขันเกม 24 (คณิตศาสตร์)",
                    isTeam: true,
                    minMembers: 1,
                    maxMembers: 1
                },
                "Rubik": {
                    name: "Rubik",
                    description: "การแข่งขันแก้รูบิค",
                    isTeam: true,
                    minMembers: 1,
                    maxMembers: 1
                },
            };

            // *** สำคัญมาก: กำหนด URL ของ Google Apps Script Web App สำหรับแต่ละประเภทการแข่งขัน ***
            // *** คุณจะต้องสร้างและ Deploy Google Apps Script Web App แยกกัน 9 ตัว และนำ URL มาใส่ที่นี่ ***
            // *** ตัวอย่าง: "waterbottlerocket": "https://script.google.com/macros/s/AKfycbz_YOUR_DEPLOYMENT_ID_FOR_ROCKET/exec", ***
            const webAppUrlMapping = {
        "waterbottlerocket": "https://script.google.com/macros/s/AKfycbybOAsJsW0ZHEyzuaizISlNvZbtI5tnVCnyRSGmdx-mNVgjX2zKrRvMT4whlLD1UJAY/exec",
        "scientificdrawings": "https://script.google.com/macros/s/AKfycbySiGVzF-Jx9j5Fza3puGdJynWNWlIgKIp5HgK_XcYpiNgDrCa6_0OKzlLrcE0SkkY/exec",
        "Innovativecostumedesign": "https://script.google.com/macros/s/AKfycbyfdmoGl38DeECzjyc5ZIq8t0KP-Ct03IIq-Pf4ciIPMAkp_SJdBH5yaW6thhtIK0OW0w/exec",
        "ScienceCoverDance": "https://script.google.com/macros/s/AKfycbzzeVus_Pbnep0ksdVSkFHjawQE4NWeL39wdQRwZch7iJjeauMLZdkjUQHuc-87Wfz5/exec",
        "SpeedyQuiz": "https://script.google.com/macros/s/AKfycbz1TRJ2vpCtExCQtWsUTBy9S4RKChHhXFbNurBSk5EXDaF__YwtbWA27jmr2MuBKcBA/exec",
        "ROV": "https://script.google.com/macros/s/AKfycbyc31EYToSja_5bnlq0XqolygzmNOwdZZiERacURd37Cidzrxg1x_x_ebstICKM1GYjXg/exec",
        "LineTracing": "https://script.google.com/macros/s/AKfycbzNoWVbTMGI6d4XKjU9hZxpP2lkANv9ei8wkAGf5q-JUA4sTq1OAeZaZW43yoyeSvgkFw/exec",
        "GAME24": "https://script.google.com/macros/s/AKfycbxlSOG9crWdG2Vsq3jCfi3gWkmPJ7eKnR01SukKqd_gVQ_Hq2kO6WoAzcO-avpPUOIxfQ/exec",
        "Rubik": "https://script.google.com/macros/s/AKfycbw_S2Vn3IRtJH7mwykBjXGhpPJguqRw6VeG3tkXFUjHnoFw-v9_5_RPES6tdNefcYnt/exec"
    };

            // Object สำหรับเก็บข้อมูลทีมที่ดึงมาแล้ว เพื่อไม่ต้องดึงซ้ำ
            const registeredTeams = {};

            /**
             * ฟังก์ชันสำหรับดึงข้อมูลทีมจาก Google Apps Script Web App และแสดงผลใน Modal
             * @param {string} competitionKey - คีย์ของประเภทการแข่งขัน (เช่น "waterbottlerocket")
             */
            async function fetchAndDisplayTeams(competitionKey) {
                const comp = competitionDetails[competitionKey];
                const webAppUrl = webAppUrlMapping[competitionKey];

                // แสดงสถานะกำลังโหลดใน Modal
                modalTitle.textContent = `รายชื่อทีม: ${comp.name}`;
                modalDescription.textContent = comp.description;
                modalTeamList.innerHTML = `
                    <div class="text-center py-4">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading teams...</span>
                        </div>
                        <p class="mt-2 text-muted">กำลังดึงข้อมูลทีมสำหรับ ${comp.name}...</p>
                    </div>
                `;
                noTeamMessage.classList.add('d-none'); // ซ่อนข้อความ "ไม่มีทีม" ขณะโหลด

                // ตรวจสอบ URL ของ Web App
                if (!webAppUrl || !webAppUrl.startsWith('https://script.google.com/macros/s/')) {
                    modalTeamList.innerHTML = `<p class="text-danger text-center py-4">ข้อผิดพลาด: ไม่พบ URL ของ Google Apps Script Web App ที่ถูกต้องสำหรับประเภทการแข่งขันนี้</p>`;
                    console.error(`Error: Invalid or missing Web App URL for competition type: ${competitionKey}. URL: ${webAppUrl}`);
                    return;
                }

                try {
                    console.log(`Fetching data for ${competitionKey} from URL: ${webAppUrl}`);

                    const response = await fetch(webAppUrl);
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status} - ${response.statusText}`);
                    }
                    const data = await response.json();

                    // จัดเก็บข้อมูลที่ดึงมา
                    registeredTeams[competitionKey] = []; // ล้างข้อมูลเก่าสำหรับประเภทนี้
                    data.forEach(entry => {
                        const teamName = entry['ชื่อทีม'] || 'ไม่ระบุชื่อทีม';
                        const schoolName = entry['ชื่อโรงเรียน / สถาบัน'] || 'ไม่ระบุชื่อโรงเรียน'; 
                        const provinceName = entry['จังหวัด'] || 'ไม่ระบุจังหวัด'; 
                        
                        // ดึงข้อมูลสมาชิก (แม้ว่าจะไม่ได้แสดงผลโดยตรงในตารางสรุป)
                        let membersList = [];
                        const maxMembersToParse = 10; // กำหนดจำนวนผู้แข่งขันสูงสุดที่คาดว่าจะเจอในชีต
                        for (let i = 1; i <= maxMembersToParse; i++) {
                            const prefixCol = `คำนำหน้า ผู้แข่งขันคนที่ ${i}`;
                            const fullNameCol = `ชื่อ - นามสกุล ผู้แข่งขันคนที่ ${i}`;
                            const phoneCol = `เบอร์โทรศัพท์ ผู้แข่งขันคนที่ ${i}`;

                            const prefix = entry[prefixCol];
                            const fullName = entry[fullNameCol];
                            const phone = entry[phoneCol];

                            if (fullName && String(fullName).trim() !== '') {
                                membersList.push({
                                    prefix: String(prefix || ''), 
                                    fullName: String(fullName),
                                    phone: String(phone || '') 
                                });
                            } else {
                                // หยุดวนลูปถ้าไม่พบข้อมูลสมาชิกในลำดับถัดไป (สมมติว่าข้อมูลเรียงลำดับ)
                                break; 
                            }
                        }

                        registeredTeams[competitionKey].push({
                            teamName: teamName, 
                            members: membersList, // เก็บข้อมูลสมาชิกไว้เผื่อใช้ในอนาคต
                            schoolName: schoolName, 
                            provinceName: provinceName 
                        });
                    });

                    // แสดงผลทีมใน Modal
                    renderTeamsInModal(competitionKey);

                } catch (error) {
                    console.error(`Error fetching data for ${competitionKey}:`, error);
                    modalTeamList.innerHTML = `
                        <p class="text-danger text-center py-4">ไม่สามารถดึงข้อมูลทีมได้</p>
                        <p class="text-muted text-center">รายละเอียด: ${error.message}</p>
                        <p class="text-muted text-center">โปรดตรวจสอบ URL ของ Google Apps Script Web App และการตั้งค่า Apps Script Web App (Deploy ด้วยสิทธิ์ 'ทุกคน' และมี CORS Headers)</p>
                    `;
                    noTeamMessage.classList.remove('d-none'); // แสดงข้อความ "ไม่มีทีม" หากดึงข้อมูลล้มเหลว
                }
            }

            /**
             * ฟังก์ชันสำหรับแสดงผลรายชื่อทีมใน Modal ในรูปแบบตารางเดียว
             * @param {string} competitionKey - คีย์ของประเภทการแข่งขัน
             */
            function renderTeamsInModal(competitionKey) {
                const comp = competitionDetails[competitionKey];
                const teams = registeredTeams[competitionKey] || [];

                modalTeamList.innerHTML = ''; // ล้างข้อความโหลด/ข้อผิดพลาด

                if (teams.length > 0) {
                    noTeamMessage.classList.add('d-none'); // ซ่อนข้อความ "ไม่มีทีม" หากมีข้อมูลทีม
                    
                    let tableHtml = `<table class="team-table table table-bordered">`;
                    tableHtml += `<thead>`;
                    tableHtml += `<tr>`;
                    tableHtml += `<th>ลำดับ</th>`;
                    tableHtml += `<th>ชื่อทีม / ผู้สมัคร</th>`; 
                    tableHtml += `<th>โรงเรียน</th>`;
                    tableHtml += `<th>จังหวัด</th>`;
                    tableHtml += `</tr>`;
                    tableHtml += `</thead>`;
                    tableHtml += `<tbody>`;

                    teams.forEach((team, index) => {
                        tableHtml += `<tr>`;
                        tableHtml += `<td>${index + 1}</td>`;
                        
                        let displayName = team.teamName || 'ไม่ระบุ';
                        if (!comp.isTeam && team.members && team.members.length > 0) {
                            // สำหรับบุคคล: ถ้าชื่อทีมเป็นค่าเริ่มต้นหรือไม่ระบุ ให้ใช้ชื่อ-นามสกุลของผู้สมัครหลัก
                            const mainMember = team.members[0];
                            if (mainMember.fullName && (team.teamName === 'ไม่ระบุชื่อทีม' || team.teamName === '')) { 
                                displayName = `${mainMember.prefix} ${mainMember.fullName}`;
                            }
                        }
                        tableHtml += `<td>${displayName}</td>`;
                        tableHtml += `<td>${team.schoolName || 'ไม่ระบุ'}</td>`;
                        tableHtml += `<td>${team.provinceName || 'ไม่ระบุ'}</td>`;
                        tableHtml += `</tr>`;
                    });

                    tableHtml += `</tbody>`;
                    tableHtml += `</table>`;
                    
                    modalTeamList.innerHTML = tableHtml;

                } else {
                    noTeamMessage.classList.remove('d-none'); // แสดงข้อความ "ไม่มีทีม" หากไม่มีข้อมูลทีม
                }
            }

            /**
             * ฟังก์ชันสำหรับแสดง Modal พร้อมดึงข้อมูลทีม
             * จะถูกเรียกเมื่อคลิกปุ่มประเภทการแข่งขัน
             * @param {string} competitionKey - คีย์ของประเภทการแข่งขันที่ถูกคลิก
             */
            function showTeamListModal(competitionKey) {
                // ตั้งค่าหัวข้อและคำอธิบาย Modal ทันที
                modalTitle.textContent = `รายชื่อทีม: ${competitionDetails[competitionKey].name}`;
                modalDescription.textContent = competitionDetails[competitionKey].description; 

                // ตรวจสอบว่าข้อมูลสำหรับประเภทการแข่งขันนี้ถูกโหลดแล้วหรือยัง
                if (registeredTeams[competitionKey] && registeredTeams[competitionKey].length > 0) {
                    renderTeamsInModal(competitionKey); // แสดงข้อมูลที่มีอยู่
                } else {
                    // ถ้ายังไม่ได้โหลด ให้ดึงข้อมูล
                    fetchAndDisplayTeams(competitionKey);
                }
                
                teamListModal.show(); // แสดง Modal ของ Bootstrap
            }

            /**
             * ฟังก์ชันสำหรับสร้างและแสดงปุ่มประเภทการแข่งขัน (โหลดครั้งแรกของหน้า)
             * จะค้นหาปุ่มทั้งหมดที่มี data-competition-key และเพิ่ม Event Listener
             */
            function renderCompetitionButtons() {
                // ค้นหาปุ่มทั้งหมดที่มี class 'competition-button' หรืออยู่ใน 'competitionButtonsContainer'
                // และเพิ่ม Event Listener ให้กับปุ่มเหล่านั้น
                document.querySelectorAll('.competition-button').forEach(button => {
                    button.addEventListener('click', function() {
                        const competitionKey = this.dataset.competitionKey;
                        showTeamListModal(competitionKey);
                    });
                });
            }

            // เริ่มต้นการทำงาน: สร้างและเพิ่ม Event Listener ให้กับปุ่มประเภทการแข่งขัน
            renderCompetitionButtons();
        });
    </script>
<?= $this->endSection() ?>