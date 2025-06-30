<?= $this->extend('User/layouts/main') ?>
<?= $this->section('title') ?>
สมัครแข่งขัน
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<style>
       
        /* Adjusted for form-floating */
        .form-label {
            font-weight: 500;
            color: #34495e;
            /* margin-bottom: 5px; Removed as form-floating handles this */
        }
        .form-control, .form-select {
            border-radius: 8px; /* Rounded corners for inputs */
            /* padding: 10px 15px; Adjusted by form-floating */
            border: 1px solid #ced4da;
        }
        .form-control:focus, .form-select:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 8px;
            padding: 10px 25px;
            font-weight: 600;
            transition: background-color 0.3s ease, border-color 0.3s ease, transform 0.2s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
            transform: translateY(-2px); /* Slight lift on hover */
        }
        .invalid-feedback {
            display: block; /* Ensure feedback is always visible when needed by JS */
            margin-top: 0.25rem; /* Standard Bootstrap spacing */
            margin-left: 0.25rem;
        }
        .form-group-hidden {
            display: none;
        }
        .card-team-member, .card-advisor {
            background-color: #f8f9fa;
            border: 1px solid #e2e6ea;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 10px;
            position: relative;
        }
        .remove-btn {
            position: absolute;
            top: 5px;
            right: 10px;
            font-size: 1.2rem;
            color: #dc3545;
            cursor: pointer;
            border: none;
            background: none;
            padding: 0;
            line-height: 1;
        }
        .remove-btn:hover {
            color: #bd2130;
        }
        .hidden {
            display: none !important;
        }
        /* Adjust for form-floating padding */
        .form-floating > .form-control,
        .form-floating > .form-select {
            padding-top: 1.625rem;
            padding-bottom: 0.625rem;
        }
        .form-floating > label {
            padding: 1.rem 0.75rem; /* Adjust label padding if needed */
        }
    </style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="bg-primary page-header">
    <div class="container text-center">
        <h1 class="text-white animated zoomIn mb-3">About Us</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">About</li>
            </ol>
        </nav>
    </div>
</div>

 <div class="container">
        <h2>แบบฟอร์มสมัครเข้าร่วมแข่งขันงานสัปดาห์วิทยาศาสตร์</h2>
        <form id="registrationForm" novalidate>
            <!-- ส่วนข้อมูลการแข่งขัน -->
            <fieldset class="mb-4 p-3 border rounded-3">
                <legend class="float-none w-auto px-2 fs-5">ข้อมูลการแข่งขัน</legend>
                <div class="mb-3">
                    <label for="competitionType" class="form-label">ประเภทการแข่งขันที่สนใจ:</label>
                    <select class="form-select" id="competitionType" name="competitionType" required>
                        <option value="">เลือกประเภทการแข่งขัน</option>
                        <option value="แข่งขันจรวดขวดน้ำ (แม่นยำ) - ประถมศึกษาตอนปลาย (ป.4-6)">แข่งขันจรวดขวดน้ำ (แม่นยำ) - ประถมศึกษาตอนปลาย (ป.4-6)</option>
                        <option value="แข่งขันจรวดขวดน้ำ (แม่นยำ) - ระดับมัธยมศึกษาตอนต้น (ม.1-3)">แข่งขันจรวดขวดน้ำ (แม่นยำ) - ระดับมัธยมศึกษาตอนต้น (ม.1-3)</option>
                        <option value="แข่งขันจรวดขวดน้ำ (แม่นยำ) - ระดับมัธยมศึกษาตอนปลาย (ม.4-6)">แข่งขันจรวดขวดน้ำ (แม่นยำ) - ระดับมัธยมศึกษาตอนปลาย (ม.4-6)</option>
                        <option value="ภาพวาดทางวิทยาศาสตร์ - ระดับประถมศึกษาตอนปลาย">ภาพวาดทางวิทยาศาสตร์ - ระดับประถมศึกษาตอนปลาย</option>
                        <option value="ภาพวาดทางวิทยาศาสตร์ - ระดับมัธยมศึกษาตอนต้น">ภาพวาดทางวิทยาศาสตร์ - ระดับมัธยมศึกษาตอนต้น</option>
                        <option value="ภาพวาดทางวิทยาศาสตร์ - ระดับมัธยมศึกษาตอนปลาย">ภาพวาดทางวิทยาศาสตร์ - ระดับมัธยมศึกษาตอนปลาย</option>
                        <option value="ภาพวาดทางวิทยาศาสตร์ - ระดับบกพร่องทางการเรียนรู้">ภาพวาดทางวิทยาศาสตร์ - ระดับบกพร่องทางการเรียนรู้</option>
                        <option value="ประกวดชุดรีไซเคิล (Innovative costume design) - ระดับประถมศึกษาตอนปลาย">ประกวดชุดรีไซเคิล (Innovative costume design) - ระดับประถมศึกษาตอนปลาย</option>
                        <option value="ประกวดชุดรีไซเคิล (Innovative costume design) - ระดับมัธยมศึกษาตอนต้น">ประกวดชุดรีไซเคิล (Innovative costume design) - ระดับมัธยมศึกษาตอนต้น</option>
                        <option value="ประกวดชุดรีไซเคิล (Innovative costume design) - ระดับมัธยมศึกษาตอนปลาย">ประกวดชุดรีไซเคิล (Innovative costume design) - ระดับมัธยมศึกษาตอนปลาย</option>
                        <option value="ประกวดชุดรีไซเคิล (Innovative costume design) - รุ่นประชาชนทั่วไป">ประกวดชุดรีไซเคิล (Innovative costume design) - รุ่นประชาชนทั่วไป</option>
                        <option value="Science Cover Dance - ระดับมัธยมศึกษา">Science Cover Dance - ระดับมัธยมศึกษา</option>
                        <option value="ถามไว ตอบไว (Speedy quiz) - ระดับมัธยมศึกษาตอนต้น">ถามไว ตอบไว (Speedy quiz) - ระดับมัธยมศึกษาตอนต้น</option>
                        <option value="ถามไว ตอบไว (Speedy quiz) - ระดับมัธยมศึกษาตอนปลาย">ถามไว ตอบไว (Speedy quiz) - ระดับมัธยมศึกษาตอนปลาย</option>
                        <option value="กีฬา E-Sport ROV - ระดับมัธยมศึกษา">กีฬา E-Sport ROV - ระดับมัธยมศึกษา</option>
                        <!-- เพิ่มประเภทอื่นๆ ได้ที่นี่ -->
                    </select>
                    <div class="invalid-feedback">กรุณาเลือกประเภทการแข่งขัน</div>
                </div>

                <div id="individualContestantInfo" class="form-group-hidden">
                    <h5 class="mt-4 mb-3">ข้อมูลผู้เข้าแข่งขัน (บุคคล)</h5>
                    <div class="row g-3">
                        <div class="col-md-2">
                            <div class="form-floating">
                                <select class="form-select" id="prefix" name="prefix">
                                    <option value="">เลือก</option>
                                    <option value="นาย">นาย</option>
                                    <option value="นางสาว">นางสาว</option>
                                    <option value="เด็กชาย">เด็กชาย</option>
                                    <option value="เด็กหญิง">เด็กหญิง</option>
                                </select>
                                <label for="prefix">คำนำหน้า:</label>
                            </div>
                            <div class="invalid-feedback">กรุณาเลือกคำนำหน้า</div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="ชื่อจริง">
                                <label for="firstName">ชื่อจริง:</label>
                            </div>
                            <div class="invalid-feedback">กรุณากรอกชื่อจริง</div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="นามสกุล">
                                <label for="lastName">นามสกุล:</label>
                            </div>
                            <div class="invalid-feedback">กรุณากรอกนามสกุล</div>
                        </div>
                    </div>
                    <div class="row g-3 mt-2">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="date" class="form-control" id="dob" name="dob" placeholder="วัน/เดือน/ปีเกิด">
                                <label for="dob">วัน/เดือน/ปีเกิด:</label>
                            </div>
                            <div class="invalid-feedback">กรุณากรอกวันเกิด</div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="tel" class="form-control" id="phone" name="phone" pattern="[0-9]{10}" maxlength="10" placeholder="เบอร์โทรศัพท์">
                                <label for="phone">เบอร์โทรศัพท์:</label>
                            </div>
                            <div class="invalid-feedback">กรุณากรอกเบอร์โทรศัพท์ 10 หลัก</div>
                        </div>
                    </div>
                    <div class="row g-3 mt-2">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" name="email" placeholder="อีเมล">
                                <label for="email">อีเมล:</label>
                            </div>
                            <div class="invalid-feedback">กรุณากรอกอีเมลที่ถูกต้อง</div>
                        </div>
                    </div>
                </div>

                <div id="teamNameSection" class="form-group-hidden">
                    <h5 class="mt-4 mb-3">ข้อมูลทีม</h5>
                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="teamName" name="teamName" placeholder="ชื่อทีม">
                            <label for="teamName">ชื่อทีม:</label>
                        </div>
                        <div class="invalid-feedback">กรุณากรอกชื่อทีม</div>
                    </div>
                </div>

                <div id="projectNameSection" class="form-group-hidden">
                    <h5 class="mt-4 mb-3">ข้อมูลโครงงาน/สิ่งประดิษฐ์</h5>
                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="projectName" name="projectName" placeholder="ชื่อโครงงาน/สิ่งประดิษฐ์">
                            <label for="projectName">ชื่อโครงงาน/สิ่งประดิษฐ์:</label>
                        </div>
                        <div class="invalid-feedback">กรุณากรอกชื่อโครงงาน/สิ่งประดิษฐ์</div>
                    </div>
                </div>

                <div id="teamMembersSection" class="form-group-hidden">
                    <h5 id="teamMembersTitle" class="mt-4 mb-3">สมาชิกในทีม</h5>
                    <div id="teamMembersContainer">
                        <!-- Team members will be added here by JavaScript -->
                    </div>
                    <button type="button" class="btn btn-outline-primary btn-sm hidden" id="addMemberBtn">เพิ่มสมาชิกในทีม</button>
                </div>
            </fieldset>

            <!-- ส่วนข้อมูลการศึกษา/สังกัด -->
            <fieldset class="mb-4 p-3 border rounded-3">
                <legend class="float-none w-auto px-2 fs-5">ข้อมูลการศึกษา/สังกัด</legend>
                <div class="row g-3">
                    <div class="col-md-8">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="schoolName" name="schoolName" placeholder="ชื่อโรงเรียน/สถาบัน">
                            <label for="schoolName">ชื่อโรงเรียน/สถาบัน:</label>
                        </div>
                        <div class="invalid-feedback">กรุณากรอกชื่อโรงเรียน/สถาบัน</div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="schoolProvince" name="schoolProvince" placeholder="จังหวัด">
                            <label for="schoolProvince">จังหวัด:</label>
                        </div>
                        <div class="invalid-feedback">กรุณากรอกจังหวัดของโรงเรียน</div>
                    </div>
                </div>
                <div class="row g-3 mt-2">
                    <div class="col-md-12">
                        <div class="form-floating">
                            <select class="form-select" id="educationLevel" name="educationLevel">
                                <option value="">เลือก</option>
                                <option value="ประถมศึกษาตอนต้น">ประถมศึกษาตอนต้น</option>
                                <option value="ประถมศึกษาตอนปลาย">ประถมศึกษาตอนปลาย</option>
                                <option value="มัธยมศึกษาตอนต้น">มัธยมศึกษาตอนต้น</option>
                                <option value="มัธยมศึกษาตอนปลาย">มัธยมศึกษาตอนปลาย</option>
                                <option value="ประกาศนียบัตรวิชาชีพ (ปวช.)">ประกาศนียบัตรวิชาชีพ (ปวช.)</option>
                            </select>
                            <label for="educationLevel">ระดับชั้น/ระดับการศึกษา:</label>
                        </div>
                        <div class="invalid-feedback">กรุณาเลือกระดับการศึกษา</div>
                    </div>
                </div>
            </fieldset>

            <!-- ส่วนข้อมูลอาจารย์ที่ปรึกษา -->
            <fieldset class="mb-4 p-3 border rounded-3">
                <legend class="float-none w-auto px-2 fs-5">ข้อมูลอาจารย์ที่ปรึกษา</legend>
                <div id="advisorsContainer">
                    <!-- Advisor fields will be added here by JavaScript -->
                </div>
                <button type="button" class="btn btn-outline-success btn-sm mt-2" id="addAdvisorBtn">เพิ่มอาจารย์ที่ปรึกษา</button>
            </fieldset>
            
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-lg">ส่งข้อมูลการสมัคร</button>
            </div>
        </form>
    </div>





<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

 <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Get form and sections
            const form = document.getElementById('registrationForm');
            const competitionTypeSelect = document.getElementById('competitionType');
            const individualContestantInfo = document.getElementById('individualContestantInfo');
            const teamNameSection = document.getElementById('teamNameSection');
            const projectNameSection = document.getElementById('projectNameSection');
            const teamMembersSection = document.getElementById('teamMembersSection');
            const teamMembersContainer = document.getElementById('teamMembersContainer');
            const teamMembersTitle = document.getElementById('teamMembersTitle');
            const addMemberBtn = document.getElementById('addMemberBtn');
            const advisorsContainer = document.getElementById('advisorsContainer');
            const addAdvisorBtn = document.getElementById('addAdvisorBtn');

            let memberCount = 0; // To keep track of current team members displayed
            let advisorCount = 0; // To keep track of advisors for unique IDs and limit

            const competitionDetails = {
                "แข่งขันจรวดขวดน้ำ (แม่นยำ) - ประถมศึกษาตอนปลาย (ป.4-6)": { isTeam: true, minMembers: 3, maxMembers: 3, needsProject: false },
                "แข่งขันจรวดขวดน้ำ (แม่นยำ) - ระดับมัธยมศึกษาตอนต้น (ม.1-3)": { isTeam: true, minMembers: 3, maxMembers: 3, needsProject: false },
                "แข่งขันจรวดขวดน้ำ (แม่นยำ) - ระดับมัธยมศึกษาตอนปลาย (ม.4-6)": { isTeam: true, minMembers: 3, maxMembers: 3, needsProject: false },
                "ภาพวาดทางวิทยาศาสตร์ - ระดับประถมศึกษาตอนปลาย": { isTeam: true, minMembers: 2, maxMembers: 2, needsProject: false },
                "ภาพวาดทางวิทยาศาสตร์ - ระดับมัธยมศึกษาตอนต้น": { isTeam: true, minMembers: 2, maxMembers: 2, needsProject: false },
                "ภาพวาดทางวิทยาศาสตร์ - ระดับมัธยมศึกษาตอนปลาย": { isTeam: true, minMembers: 2, maxMembers: 2, needsProject: false },
                "ภาพวาดทางวิทยาศาสตร์ - ระดับบกพร่องทางการเรียนรู้": { isTeam: true, minMembers: 2, maxMembers: 2, needsProject: false },
                "ประกวดชุดรีไซเคิล (Innovative costume design) - ระดับประถมศึกษาตอนปลาย": { isTeam: false, minMembers: 1, maxMembers: 1, needsProject: true },
                "ประกวดชุดรีไซเคิล (Innovative costume design) - ระดับมัธยมศึกษาตอนต้น": { isTeam: false, minMembers: 1, maxMembers: 1, needsProject: true },
                "ประกวดชุดรีไซเคิล (Innovative costume design) - ระดับมัธยมศึกษาตอนปลาย": { isTeam: false, minMembers: 1, maxMembers: 1, needsProject: true },
                "ประกวดชุดรีไซเคิล (Innovative costume design) - รุ่นประชาชนทั่วไป": { isTeam: false, minMembers: 1, maxMembers: 1, needsProject: true },
                "Science Cover Dance - ระดับมัธยมศึกษา": { isTeam: true, minMembers: 5, maxMembers: 10, needsProject: false },
                "ถามไว ตอบไว (Speedy quiz) - ระดับมัธยมศึกษาตอนต้น": { isTeam: true, minMembers: 3, maxMembers: 3, needsProject: false },
                "ถามไว ตอบไว (Speedy quiz) - ระดับมัธยมศึกษาตอนปลาย": { isTeam: true, minMembers: 3, maxMembers: 3, needsProject: false },
                "กีฬา E-Sport ROV - ระดับมัธยมศึกษา": { isTeam: true, minMembers: 5, maxMembers: 7, needsProject: false }
            };

            // --- Functions for dynamic form sections ---
            function toggleCompetitionFields() {
                const selectedValue = competitionTypeSelect.value;
                const details = competitionDetails[selectedValue];

                // Reset display for all conditional sections and their required attributes
                const allConditionalSections = [
                    individualContestantInfo,
                    teamNameSection,
                    projectNameSection,
                    teamMembersSection
                ];

                allConditionalSections.forEach(section => {
                    section.classList.add('form-group-hidden');
                    section.querySelectorAll('input, select').forEach(input => {
                        input.removeAttribute('required');
                    });
                });
                
                // Clear previous team members
                teamMembersContainer.innerHTML = '';
                memberCount = 0; // Reset member count
                updateAddMemberButtonVisibility(); // Hide button initially

                if (details) {
                    if (!details.isTeam) { // Individual competition
                        individualContestantInfo.classList.remove('form-group-hidden');
                        individualContestantInfo.querySelectorAll('input, select').forEach(input => {
                            input.setAttribute('required', 'required');
                        });
                        if (details.needsProject) {
                            projectNameSection.classList.remove('form-group-hidden');
                            document.getElementById('projectName').setAttribute('required', 'required');
                        }
                    } else { // Team competition
                        teamNameSection.classList.remove('form-group-hidden');
                        document.getElementById('teamName').setAttribute('required', 'required');

                        if (details.needsProject) {
                            projectNameSection.classList.remove('form-group-hidden');
                            document.getElementById('projectName').setAttribute('required', 'required');
                        }

                        teamMembersSection.classList.remove('form-group-hidden');
                        if (details.minMembers === details.maxMembers) {
                            teamMembersTitle.textContent = `สมาชิกในทีม (รวม ${details.maxMembers} คน)`;
                        } else {
                            teamMembersTitle.textContent = `สมาชิกในทีม (อย่างน้อย ${details.minMembers} คน, สูงสุด ${details.maxMembers} คน)`;
                        }
                        
                        // Pre-populate minimum required member fields
                        for (let i = 0; i < details.minMembers; i++) {
                            addTeamMemberField(true); // true indicates initial setup, doesn't show Swal
                        }
                        updateAddMemberButtonVisibility(); // Update button visibility after pre-populating
                    }
                }
            }

            function addTeamMemberField(isInitialSetup = false) {
                const selectedValue = competitionTypeSelect.value;
                const details = competitionDetails[selectedValue];
                const maxAllowedMembers = details ? details.maxMembers : 0;

                if (!isInitialSetup && memberCount >= maxAllowedMembers) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'ไม่สามารถเพิ่มได้!',
                        text: `สำหรับประเภทนี้ สามารถมีสมาชิกในทีมได้สูงสุด ${maxAllowedMembers} คน (รวมหัวหน้าทีม)`,
                        showConfirmButton: true
                    });
                    return;
                }

                memberCount++; // Increment current count of members displayed
                const memberDiv = document.createElement('div');
                memberDiv.classList.add('card-team-member');

                // Determine title for each member field
                let memberTitle = `สมาชิกคนที่ ${memberCount}`;
                if (memberCount === 1) {
                    memberTitle = `สมาชิกคนที่ 1 (หัวหน้าทีม)`;
                }

                memberDiv.innerHTML = `
                    <button type="button" class="remove-btn" data-type="member" data-id="${memberCount}">&times;</button>
                    <h6>${memberTitle}</h6>
                    <div class="row g-2">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="memberFirstName${memberCount}" name="teamMembers[${memberCount}][firstName]" placeholder="ชื่อจริง" required>
                                <label for="memberFirstName${memberCount}">ชื่อจริง:</label>
                            </div>
                            <div class="invalid-feedback">กรุณากรอกชื่อจริงสมาชิก</div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="memberLastName${memberCount}" name="teamMembers[${memberCount}][lastName]" placeholder="นามสกุล" required>
                                <label for="memberLastName${memberCount}">นามสกุล:</label>
                            </div>
                            <div class="invalid-feedback">กรุณากรอกนามสกุลสมาชิก</div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <input type="tel" class="form-control" id="memberPhone${memberCount}" name="teamMembers[${memberCount}][phone]" pattern="[0-9]{10}" maxlength="10" placeholder="เบอร์โทรศัพท์" required>
                                <label for="memberPhone${memberCount}">เบอร์โทรศัพท์:</label>
                            </div>
                            <div class="invalid-feedback">กรุณากรอกเบอร์โทรศัพท์ 10 หลัก</div>
                        </div>
                    </div>
                `;
                teamMembersContainer.appendChild(memberDiv);

                // Add event listener for remove button
                memberDiv.querySelector('.remove-btn').addEventListener('click', function() {
                    memberDiv.remove();
                    memberCount--; // Decrement count when removed
                    updateAddMemberButtonVisibility(); // Update button visibility
                    // Re-index displayed member numbers and names for visual consistency
                    updateTeamMemberDisplayIndices();
                });

                updateAddMemberButtonVisibility(); // Update button visibility after adding
            }

            function updateTeamMemberDisplayIndices() {
                const memberCards = teamMembersContainer.querySelectorAll('.card-team-member');
                memberCount = 0; // Reset count to re-index
                memberCards.forEach((card, index) => {
                    memberCount++;
                    const titleElement = card.querySelector('h6');
                    let newTitle = `สมาชิกคนที่ ${memberCount}`;
                    if (memberCount === 1 && competitionDetails[competitionTypeSelect.value].isTeam) { // Only label as leader if it's a team and first member
                        newTitle = `สมาชิกคนที่ 1 (หัวหน้าทีม)`;
                    }
                    if (titleElement) {
                        titleElement.textContent = newTitle;
                    }
                    // Update names for backend processing (optional, but good practice if indices matter)
                    card.querySelectorAll('input, select').forEach(input => {
                        const originalName = input.name;
                        if (originalName && originalName.startsWith('teamMembers')) {
                            const prop = originalName.match(/\[\d+\]\[(\w+)\]/)[1];
                            input.name = `teamMembers[${memberCount}][${prop}]`;
                            input.id = `member${prop}${memberCount}`;
                            // The label's 'for' attribute should also be updated
                            const labelForInput = card.querySelector(`label[for^="member${prop}"]`);
                            if (labelForInput) {
                                labelForInput.setAttribute('for', `member${prop}${memberCount}`);
                            }
                        }
                    });
                });
            }


            function addAdvisorField() {
                if (advisorCount >= 2) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'ไม่สามารถเพิ่มได้!',
                        text: 'สามารถเพิ่มอาจารย์ที่ปรึกษาได้สูงสุด 2 ท่านเท่านั้น',
                        showConfirmButton: true
                    });
                    return;
                }

                advisorCount++;
                const advisorDiv = document.createElement('div');
                advisorDiv.classList.add('card-advisor');
                advisorDiv.innerHTML = `
                    <button type="button" class="remove-btn" data-type="advisor" data-id="${advisorCount}">&times;</button>
                    <h6>อาจารย์ที่ปรึกษาคนที่ ${advisorCount}</h6>
                    <div class="row g-2">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="advisorName${advisorCount}" name="advisors[${advisorCount}][name]" placeholder="ชื่อ-นามสกุล" required>
                                <label for="advisorName${advisorCount}">ชื่อ-นามสกุล:</label>
                            </div>
                            <div class="invalid-feedback">กรุณากรอกชื่อ-นามสกุลอาจารย์</div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="tel" class="form-control" id="advisorPhone${advisorCount}" name="advisors[${advisorCount}][phone]" pattern="[0-9]{10}" maxlength="10" placeholder="เบอร์โทรศัพท์">
                                <label for="advisorPhone${advisorCount}">เบอร์โทรศัพท์:</label>
                            </div>
                            <div class="invalid-feedback">กรุณากรอกเบอร์โทรศัพท์ 10 หลัก (ถ้ามี)</div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="advisorEmail${advisorCount}" name="advisors[${advisorCount}][email]" placeholder="อีเมล">
                                <label for="advisorEmail${advisorCount}">อีเมล:</label>
                            </div>
                            <div class="invalid-feedback">กรุณากรอกอีเมลที่ถูกต้อง (ถ้ามี)</div>
                        </div>
                    </div>
                `;
                advisorsContainer.appendChild(advisorDiv);

                // Add event listener for remove button
                advisorDiv.querySelector('.remove-btn').addEventListener('click', function() {
                    advisorDiv.remove();
                    advisorCount--; // Decrement count when removed
                    // Re-index advisors for display if desired, though not strictly necessary for data submission
                });
            }

            function updateAddMemberButtonVisibility() {
                const selectedValue = competitionTypeSelect.value;
                const details = competitionDetails[selectedValue];
                if (details && details.isTeam) {
                    if (memberCount >= details.maxMembers) {
                        addMemberBtn.classList.add('hidden');
                    } else {
                        addMemberBtn.classList.remove('hidden');
                    }
                } else {
                    addMemberBtn.classList.add('hidden');
                }
            }

            // --- Event Listeners ---
            competitionTypeSelect.addEventListener('change', toggleCompetitionFields);
            addMemberBtn.addEventListener('click', addTeamMemberField);
            addAdvisorBtn.addEventListener('click', addAdvisorField);

            // Trigger on initial load in case of pre-filled values (e.g., from server-side rendering or refresh)
            toggleCompetitionFields();

            // --- Form Submission and Validation ---
            form.addEventListener('submit', function (event) {
                event.preventDefault(); // Prevent default form submission
                event.stopPropagation();

                let isValid = true;
                const formElements = form.querySelectorAll('[required]:not(.form-group-hidden input, .form-group-hidden select)'); // Only validate visible required fields

                // Clear previous validation messages
                form.querySelectorAll('.invalid-feedback').forEach(feedback => {
                    feedback.textContent = '';
                });
                form.querySelectorAll('.form-control, .form-select').forEach(input => {
                    input.classList.remove('is-invalid');
                });

                // Client-side validation loop for visible required fields
                formElements.forEach(input => {
                    if (!input.checkValidity()) {
                        input.classList.add('is-invalid');
                        if ((input.name === 'phone' || (input.name && input.name.includes('teamMembers') && input.name.includes('phone'))) && input.value.length !== 10) {
                            input.nextElementSibling.textContent = 'กรุณากรอกเบอร์โทรศัพท์ 10 หลัก';
                        } else if (input.type === 'email' && !input.value.includes('@')) {
                            input.nextElementSibling.textContent = 'กรุณากรอกอีเมลที่ถูกต้อง';
                        } else {
                            input.nextElementSibling.textContent = input.validationMessage;
                        }
                        isValid = false;
                    } else {
                        input.classList.remove('is-invalid');
                    }
                });

                // Additional check for exact number of team members for team competitions
                const selectedCompetitionType = competitionTypeSelect.value;
                const details = competitionDetails[selectedCompetitionType];
                if (details && details.isTeam && (memberCount < details.minMembers || memberCount > details.maxMembers)) {
                    Swal.fire({
                        icon: 'error',
                        title: 'ข้อมูลสมาชิกทีมไม่ถูกต้อง',
                        text: `การแข่งขันประเภทนี้ต้องมีสมาชิกในทีมอย่างน้อย ${details.minMembers} คน และไม่เกิน ${details.maxMembers} คน`,
                        showConfirmButton: true
                    });
                    isValid = false;
                }

                if (isValid) {
                    // Simulate AJAX submission to CI4 Backend
                    const formData = new FormData(form);
                    const jsonData = {};
                    formData.forEach((value, key) => {
                        // Handle teamMembers data specifically to flatten it into a string
                        if (key.includes('teamMembers')) {
                            const match = key.match(/teamMembers\[(\d+)\]\[(\w+)\]/);
                            if (match) {
                                const index = parseInt(match[1]); // This index will now be 1, 2, 3...
                                const prop = match[2];
                                if (!jsonData.teamMembersRaw) {
                                    jsonData.teamMembersRaw = {};
                                }
                                if (!jsonData.teamMembersRaw[index]) {
                                    jsonData.teamMembersRaw[index] = {};
                                }
                                jsonData.teamMembersRaw[index][prop] = value;
                            }
                        } else if (key.includes('advisors')) {
                            const match = key.match(/advisors\[(\d+)\]\[(\w+)\]/);
                            if (match) {
                                const index = parseInt(match[1]);
                                const prop = match[2];
                                if (!jsonData.advisors) {
                                    jsonData.advisors = [];
                                }
                                if (!jsonData.advisors[index]) {
                                    jsonData.advisors[index] = {};
                                }
                                jsonData.advisors[index][prop] = value;
                            }
                        }
                        else {
                            jsonData[key] = value;
                        }
                    });

                    // Process teamMembersRaw into the reg_team_members_str format
                    if (jsonData.teamMembersRaw) {
                        const membersArray = Object.values(jsonData.teamMembersRaw); // Get members as array of objects
                        const formattedMembers = membersArray.map(member => {
                            // Format: firstName lastName|phone
                            return `${member.firstName} ${member.lastName}|${member.phone}`;
                        }).join(';'); // Join individual member strings with semicolon

                        jsonData.reg_team_members_str = formattedMembers;
                        delete jsonData.teamMembersRaw; // Remove raw object
                    }

                    // Clean up advisors data
                    if (jsonData.advisors) {
                        jsonData.advisors = jsonData.advisors.filter(advisor => Object.keys(advisor).length > 0);
                    }

                    // Add isTeam and maxMembers for backend reference if needed
                    if (details) {
                        jsonData.isTeamFromFrontend = details.isTeam;
                        jsonData.minMembersFromFrontend = details.minMembers; // Add minMembers
                        jsonData.maxMembersFromFrontend = details.maxMembers;
                    }


                    Swal.fire({
                        title: 'กำลังส่งข้อมูล...',
                        text: 'กรุณารอสักครู่',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    // Simulate network request
                    setTimeout(() => {
                        console.log('ข้อมูลที่จำลองส่งไปยัง CI4 Backend:', jsonData);

                        const isSuccess = Math.random() > 0.1; // 90% success rate for demo

                        if (isSuccess) {
                            Swal.fire({
                                icon: 'success',
                                title: 'สมัครสำเร็จ!',
                                text: 'การสมัครเข้าร่วมการแข่งขันของคุณได้ถูกส่งเรียบร้อยแล้ว',
                                showConfirmButton: false,
                                timer: 2500
                            }).then(() => {
                                form.reset(); // Clear form after successful submission
                                toggleCompetitionFields(); // Reset dynamic fields
                                advisorsContainer.innerHTML = ''; // Clear advisors
                                advisorCount = 0; // Reset advisor count
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'เกิดข้อผิดพลาด!',
                                text: 'ไม่สามารถส่งข้อมูลได้ กรุณาลองใหม่อีกครั้ง',
                                showConfirmButton: true
                            });
                        }
                    }, 2000); // Simulate 2-second network delay
                } else {
                    const firstInvalid = form.querySelector('.is-invalid');
                    if (firstInvalid) {
                        firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'กรุณากรอกข้อมูลให้ครบถ้วนและถูกต้อง',
                        text: 'มีบางช่องที่คุณยังไม่ได้กรอกหรือกรอกไม่ถูกต้อง',
                        showConfirmButton: true
                    });
                }
            });
        });
    </script>

<?= $this->endSection() ?>
