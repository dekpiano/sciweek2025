<?= $this->extend('User/layouts/main') ?>
<?= $this->section('title') ?>
รายชื่อทีมสมัครแข่งขัน
<?= $this->endSection() ?>
<?= $this->section('css') ?>
<style>
.competition-card {
    background-color: #f8f9fa;
    border: 1px solid #e2e6ea;
    border-radius: 12px;
    padding: 20px;
    margin-bottom: 20px;
    cursor: pointer;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    height: 100%;
    /* Ensure cards in a row have equal height */
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.competition-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
}

.competition-card h5 {
    color: #34495e;
    font-weight: 600;
    margin-bottom: 15px;
}

.competition-card p {
    color: #555;
    font-size: 0.95rem;
    flex-grow: 1;
    /* Allow description to take available space */
}

.modal-header {
    background-color: #007bff;
    color: white;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

.modal-header .btn-close {
    filter: invert(1) grayscale(100%) brightness(200%);
    /* Make close button white */
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
    border-bottom: 1px dashed #eee;
}

.modal-body ul li:last-child {
    border-bottom: none;
}
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="bg-primary page-header">
    <div class="container text-center">
        <h1 class="text-white animated zoomIn mb-3">รายชื่อทีมสมัครแข่งขัน</h1>
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
    <h2>รายชื่อทีมที่สมัครแข่งขันงานสัปดาห์วิทยาศาสตร์</h2>
    <div id="competitionList" class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <!-- Competition cards will be dynamically loaded here -->
        <!-- Initial content will be rendered by renderCompetitionCards() on DOMContentLoaded -->
    </div>
</div>

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
        document.addEventListener('DOMContentLoaded', function () {
            const competitionListContainer = document.getElementById('competitionList');
            const teamListModal = new bootstrap.Modal(document.getElementById('teamListModal'));
            const modalTitle = document.getElementById('teamListModalLabel');
            const modalDescription = document.getElementById('modalCompetitionDescription');
            const modalTeamList = document.getElementById('modalTeamList');
            const noTeamMessage = document.getElementById('noTeamMessage');

            // Define competition details
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
            const webAppUrlMapping = {
                "waterbottlerocket": "YOUR_WEB_APP_URL_FOR_WATERBOTTLE_ROCKET_SHEET_HERE", 
                "scientificdrawings": "YOUR_WEB_APP_URL_FOR_SCIENTIFIC_DRAWINGS_SHEET_HERE", 
                "Innovativecostumedesign": "YOUR_WEB_APP_URL_FOR_COSTUME_DESIGN_SHEET_HERE", 
                "ScienceCoverDance": "YOUR_WEB_APP_URL_FOR_COVER_DANCE_SHEET_HERE", 
                "SpeedyQuiz": "https://script.google.com/macros/s/AKfycbyc31EYToSja_5bnlq0XqolygzmNOwdZZiERacURd37Cidzrxg1x_x_ebstICKM1GYjXg/exec", 
                "ROV": "https://script.google.com/macros/s/AKfycbwAf_ka37cOoOLQ_mRYTECO8ezT9aIOplUDUhUpumLGaV_XScMMqw2ZhHIfeFWLj258dg/exec", 
                "LineTracing": "YOUR_WEB_APP_URL_FOR_LINE_TRACING_SHEET_HERE", 
                "GAME24": "YOUR_WEB_APP_URL_FOR_GAME24_SHEET_HERE", 
                "Rubik": "YOUR_WEB_APP_URL_FOR_RUBIK_SHEET_HERE" 
            };

            // Object to store fetched registered teams, keyed by competitionType
            const registeredTeams = {};

            // Function to fetch and display teams for a specific competition type
            async function fetchAndDisplayTeams(competitionKey) {
                const comp = competitionDetails[competitionKey];
                const webAppUrl = webAppUrlMapping[competitionKey];

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
                noTeamMessage.classList.add('d-none'); // Hide "no team" message while loading

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

                    // Store fetched data
                    registeredTeams[competitionKey] = []; // Clear previous data for this type
                    data.forEach(entry => {
                        const teamName = entry['ชื่อทีม'] || 'ไม่ระบุชื่อทีม';
                        const schoolName = entry['ชื่อโรงเรียน / สถาบัน'] || 'ไม่ระบุชื่อโรงเรียน'; 
                        const provinceName = entry['จังหวัด'] || 'ไม่ระบุจังหวัด'; // Get province name
                        
                        // Members list is no longer needed for display based on new requirement
                        // We still parse it if needed for other logic or future expansion, but not displayed.
                        let membersList = [];
                        const maxMembersToParse = 10; 
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
                                break; 
                            }
                        }

                        registeredTeams[competitionKey].push({
                            teamName: teamName, 
                            members: membersList, // Keep for potential future use or internal logic
                            schoolName: schoolName, 
                            provinceName: provinceName 
                        });
                    });

                    // Render teams in the modal
                    renderTeamsInModal(competitionKey);

                } catch (error) {
                    console.error(`Error fetching data for ${competitionKey}:`, error);
                    modalTeamList.innerHTML = `
                        <p class="text-danger text-center py-4">ไม่สามารถดึงข้อมูลทีมได้</p>
                        <p class="text-muted text-center">รายละเอียด: ${error.message}</p>
                        <p class="text-muted text-center">โปรดตรวจสอบ URL ของ Google Apps Script Web App และการตั้งค่า Apps Script Web App (Deploy ด้วยสิทธิ์ 'ทุกคน' และมี CORS Headers)</p>
                    `;
                    noTeamMessage.classList.remove('d-none'); // Show "no team" message if fetch fails
                }
            }

            // Function to render teams inside the modal
            function renderTeamsInModal(competitionKey) {
                const comp = competitionDetails[competitionKey];
                const teams = registeredTeams[competitionKey] || [];

                modalTeamList.innerHTML = ''; // Clear loading/error messages

                if (teams.length > 0) {
                    noTeamMessage.classList.add('d-none'); // Hide if teams are present
                    
                    let tableHtml = `<table class="team-table table table-striped table-bordered">`;
                    tableHtml += `<thead>`;
                    tableHtml += `<tr>`;
                    tableHtml += `<th>ลำดับ</th>`;
                    tableHtml += `<th>ชื่อทีม / ผู้สมัคร</th>`; // Combined for clarity
                    tableHtml += `<th>โรงเรียน</th>`;
                    tableHtml += `<th>จังหวัด</th>`;
                    tableHtml += `</tr>`;
                    tableHtml += `</thead>`;
                    tableHtml += `<tbody>`;

                    teams.forEach((team, index) => {
                        tableHtml += `<tr>`;
                        tableHtml += `<td>${index + 1}</td>`;
                        
                        // Determine display name based on competition type
                        let displayName = team.teamName || 'ไม่ระบุ';
                        if (!comp.isTeam && team.members && team.members.length > 0) {
                            // For individual, if teamName is generic, use main member's name
                            const mainMember = team.members[0];
                            if (mainMember.fullName && team.teamName === 'ไม่ระบุชื่อทีม') { // Check if teamName is default
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
                    noTeamMessage.classList.remove('d-none'); // Show if no teams
                }
            }

            // Function to render competition cards (initial display)
            function renderCompetitionCards() {
                competitionListContainer.innerHTML = ''; // Clear any initial loading indicator
                for (const key in competitionDetails) {
                    if (competitionDetails.hasOwnProperty(key)) {
                        const comp = competitionDetails[key];
                        const cardCol = document.createElement('div');
                        cardCol.classList.add('col');
                        cardCol.innerHTML = `
                            <div class="card h-100 competition-card" data-competition-key="${key}">
                                <div class="card-body">
                                    <h5 class="card-title">${comp.name}</h5>
                                    <p class="card-text">${comp.description}</p>
                                </div>
                                <div class="card-footer bg-transparent border-0 text-end">
                                    <small class="text-muted">
                                        ${comp.isTeam ? `ทีม: ${comp.minMembers}-${comp.maxMembers} คน` : `บุคคล: ${comp.minMembers} คน`}
                                    </small>
                                </div>
                            </div>
                        `;
                        competitionListContainer.appendChild(cardCol);
                    }
                }

                // Add click listeners to each card
                document.querySelectorAll('.competition-card').forEach(card => {
                    card.addEventListener('click', function() {
                        const competitionKey = this.dataset.competitionKey;
                        showTeamListModal(competitionKey);
                    });
                });
            }

            // Function to show the team list modal (entry point from card click)
            function showTeamListModal(competitionKey) {
                // Set modal title and description immediately
                modalTitle.textContent = `รายชื่อทีม: ${competitionDetails[competitionKey].name}`;
                modalDescription.textContent = competitionDetails[competitionKey].description; 

                // Check if data for this competition type is already loaded
                if (registeredTeams[competitionKey] && registeredTeams[competitionKey].length > 0) {
                    renderTeamsInModal(competitionKey); // Render existing data
                } else {
                    // If not loaded, fetch it
                    fetchAndDisplayTeams(competitionKey);
                }
                
                teamListModal.show(); // Show the Bootstrap modal
            }

            // Initial render of competition cards (without fetching team data)
            renderCompetitionCards();
        });
    </script>
<?= $this->endSection() ?>