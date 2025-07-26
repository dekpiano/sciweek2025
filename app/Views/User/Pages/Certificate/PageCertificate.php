<?= $this->extend('User/layouts/main') ?>
<?= $this->section('title') ?>
ดาวน์โหลดเกียรติบัตร
<?= $this->endSection() ?>
<?= $this->section('css') ?>
<style>
.hero-header {
    background: url(../public/img/bg/bg.jpg) center bottom no-repeat;
    background-size: cover;
    padding: 10rem 0 5rem 0;
}

.certificate-preview {
    /* This div is used as a hidden template for html2canvas */
    position: absolute;
    left: -9999px;
    /* Hide it off-screen */
    top: -9999px;
    width: 297mm;
    /* A4 landscape width for rendering */
    height: 210mm;
    /* A4 landscape height for rendering */
    padding: 40mm;
    /* Adjust padding as needed for certificate design */
    background-color: #ffffff;
    text-align: center;
    box-sizing: border-box;
    /* Include padding in width/height */
}

.certificate-preview h1 {
    font-size: 2.5rem;
    /* Larger title */
    font-weight: 700;
    color: #2c5282;
    /* Dark blue */
    margin-bottom: 20px;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
}

.certificate-preview p {
    font-size: 1.2rem;
    color: #4a5568;
    /* Grayish blue */
    line-height: 1.6;
}

.certificate-preview .highlight {
    font-size: 1.8rem;
    font-weight: 600;
    color: #3182ce;
    /* Bright blue */
    margin: 10px 0;
    display: block;
}

.certificate-preview .signature {
    margin-top: 40px;
    text-align: right;
    width: 100%;
    padding-right: 20%;
    /* Indent signature */
    font-style: italic;
    color: #718096;
}

.alert-message {
    background-color: #fff3cd;
    color: #856404;
    padding: 15px;
    border: 1px solid #ffeeba;
    border-radius: 8px;
    margin-bottom: 20px;
    text-align: left;
    font-size: 0.9rem;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th,
td {
    padding: 12px 15px;
    border: 1px solid #e2e8f0;
    text-align: left;
}

th {
    background-color: #ebf4ff;
    font-weight: 600;
    color: #2c5282;
}

tr:nth-child(even) {
    background-color: #f7fafc;
}

tr:hover {
    background-color: #ebf8ff;
}

.action-cell {
    text-align: center;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .container {
        padding: 20px;
    }

    .certificate-preview {
        padding: 20mm;
        /* Adjust for smaller screens */
    }

    .certificate-preview h1 {
        font-size: 2rem;
    }

    .certificate-preview p {
        font-size: 1rem;
    }

    .certificate-preview .highlight {
        font-size: 1.5rem;
    }

    .input-section .grid {
        grid-template-columns: 1fr;
    }

    .btn {
        width: 100%;
    }

    table,
    thead,
    tbody,
    th,
    td,
    tr {
        display: block;
    }

    thead tr {
        position: absolute;
        top: -9999px;
        left: -9999px;
    }

    tr {
        border: 1px solid #e2e8f0;
        margin-bottom: 10px;
        border-radius: 8px;
        overflow: hidden;
    }

    td {
        border: none;
        position: relative;
        padding-left: 50%;
        text-align: right;
    }

    td:before {
        content: attr(data-label);
        position: absolute;
        left: 0;
        width: 45%;
        padding-left: 15px;
        font-weight: 600;
        text-align: left;
    }
}

/* Custom Loading Spinner */
.spinner {
    border: 4px solid rgba(0, 0, 0, 0.1);
    border-left-color: #4299e1;
    /* Blue color for spinner */
    border-radius: 50%;
    width: 24px;
    height: 24px;
    animation: spin 1s linear infinite;
    display: inline-block;
    vertical-align: middle;
    margin-right: 8px;
}

@keyframes spin {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
}

.spinner-container {
    text-align: center;
    padding: 15px;
    display: none;
    /* Hidden by default */
}

.spinner-container.show {
    display: block;
}
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="bg-primary page-header hero-header">
    <div class="container text-center">
        <h1 class="text-white animated zoomIn mb-3">ผลการแข่งขัน</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a class="text-white" href="<?=base_url();?>">Home</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">ผลการแข่งขัน</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container">

    <div class="card p-4 shadow-sm mb-4">
        <div class="row g-3">
            <div class="col-12">
                <div class="input-group-custom">
                    <label for="competitionSelect" class="form-label">รายการแข่ง:</label>
                    <select id="competitionSelect" class="form-select" disabled>
                        <option value="">กำลังโหลดรายการแข่ง...</option>
                    </select>
                    <div id="loadingSpinner" class="spinner-container">
                        <div class="spinner"></div> กำลังโหลด...
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="dataTableSection" class="card p-4 shadow-sm mt-4 d-none">
        <h2 class="h5 mb-3 text-secondary text-center">ผลการแข่งขัน</h2>
        <!-- Tables for each level will be appended here dynamically -->
    </div>


    <!-- This is the hidden certificate template that will be populated and converted to PDF -->
    <div id="certificateTemplate" class="certificate-preview">
        <!-- ใส่โค้ด HTML ของเทมเพลตเกียรติบัตรของคุณที่นี่ -->
        <img src="<?=base_url('public/img/certificate/ctfc.png')?>" alt="Certificate Background"
            style="width:100%; height:100%; position:absolute; top:0; left:0; z-index:-1;">

        <p id="certName" style="font-size: 2.5rem; font-weight: bold; color: #0071bc; margin-top: 130px;">
            {{ชื่อ-นามสกุล}}</p>

        <p id="certAwardLevel" style="font-size: 1.6rem; font-weight: bold; color: #0071bc; margin-top: 0px;">
            ได้รับรางวัล {{ระดับรางวัล}}</p>

        <div id="certActivity" style="font-size: 1.1rem; color: #0071bc; margin-top: -18px;">{{ชื่อกิจกรรม}}</div>
        <!-- <p style="margin-top: 20px;">เมื่อวันที่ <span id="certDate">{{วันที่}}</span></p> -->

        <!-- สามารถเพิ่ม CSS ภายใน <style> tag หรือ inline style ได้ตามต้องการ -->
    </div>
</div>
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

  <script>
        console.log("Script started.");

        // --- Configuration Variables (กรุณาแก้ไขค่าเหล่านี้) ---
        // แทนที่ด้วย Web app URL ที่คุณได้จากการ Deploy Google Apps Script
        const APPS_SCRIPT_WEB_APP_URL = 'https://script.google.com/macros/s/AKfycbwn4eNrcjifbhK3-OJZKR7GvNCUApQrr-G5cQuXN1_8_DsQsVSdJ515P4R_0tC6NuDL/exec'; 
        // แทนที่ด้วย ID ของ Google Spreadsheet ของคุณ
        const SPREADSHEET_ID = '12t7UCzg6XrhA6LsKZ9yeL9OCho_XRHSF9nij_gRaqFE'; 
        // --- End of Configuration Variables ---

        // Get references to elements
        const competitionSelect = document.getElementById('competitionSelect');
        const dataTableSection = document.getElementById('dataTableSection'); // Reference to the table section
        const loadingSpinner = document.getElementById('loadingSpinner'); // Reference to the loading spinner

        // Get references to certificate display elements (hidden template)
        const certificateTemplate = document.getElementById('certificateTemplate');
        const certName = certificateTemplate.querySelector('#certName');
        const certActivity = certificateTemplate.querySelector('#certActivity');
        // const certDate = certificateTemplate.querySelector('#certDate'); // Commented out as per user's request
        const certAwardLevel = certificateTemplate.querySelector('#certAwardLevel');
        // const certSpecialMessage = certificateTemplate.querySelector('#certSpecialMessage'); // Removed: Reference to special message element

        let sheetData = []; // To store data fetched from the currently selected Google Sheet

        /**
         * Shows the main loading spinner.
         */
        function showLoadingSpinner() {
            loadingSpinner.classList.add('show');
        }

        /**
         * Hides the main loading spinner.
         */
        function hideLoadingSpinner() {
            loadingSpinner.classList.remove('show');
        }

        /**
         * Fetches the list of sheet names from the Google Spreadsheet via Apps Script.
         */
        async function loadCompetitionList() {
            console.log("loadCompetitionList called.");
            
            if (APPS_SCRIPT_WEB_APP_URL === 'YOUR_APPS_SCRIPT_WEB_APP_URL_HERE' ||
                SPREADSHEET_ID === 'YOUR_GOOGLE_SPREADSHEET_ID_HERE') {
                alert('กรุณาแก้ไขค่า APPS_SCRIPT_WEB_APP_URL และ SPREADSHEET_ID ในโค้ด JavaScript ก่อน');
                competitionSelect.innerHTML = '<option value="">กรุณาตั้งค่า URL และ ID</option>';
                return;
            }

            showLoadingSpinner(); // Show spinner
            competitionSelect.disabled = true;
            competitionSelect.innerHTML = '<option value="">กำลังโหลดรายการแข่ง...</option>';
            dataTableSection.classList.add('d-none'); // Ensure table is hidden initially
            // Set initial message for the table section when no sheet is selected
            dataTableSection.innerHTML = '<h2 class="h5 mb-3 text-secondary text-center">ผลการแข่งขัน</h2><div class="text-center text-muted py-4">กรุณาเลือกรายการแข่ง</div>';


            try {
                const url = new URL(APPS_SCRIPT_WEB_APP_URL);
                url.searchParams.append('spreadsheetId', SPREADSHEET_ID);
                url.searchParams.append('action', 'get_sheet_names'); // Request sheet names

                const response = await fetch(url.toString());
                const result = await response.json();

                if (result.status === 'success') {
                    const sheetNames = result.data;
                    populateCompetitionSelect(sheetNames);
                    console.log('ดึงรายการแข่งสำเร็จแล้ว!');
                    // No auto-loading of data from the first sheet here, user will select
                    if (sheetNames.length === 0) {
                        dataTableSection.innerHTML = '<h2 class="h5 mb-3 text-secondary text-center">ผลการแข่งขัน</h2><div class="text-center text-muted py-4">ไม่พบรายการแข่งใน Spreadsheet</div>';
                    }
                } else {
                    alert('เกิดข้อผิดพลาดในการดึงรายการแข่ง: ' + result.message);
                    console.error('Error from Apps Script (get_sheet_names):', result.message);
                    competitionSelect.innerHTML = '<option value="">เกิดข้อผิดพลาดในการโหลด</option>';
                    dataTableSection.innerHTML = '<h2 class="h5 mb-3 text-secondary text-center">ผลการแข่งขัน</h2><div class="text-center text-danger py-4">เกิดข้อผิดพลาดในการดึงรายการแข่ง: ' + result.message + '</div>';
                }
            } catch (error) {
                alert('ไม่สามารถเชื่อมต่อกับ Apps Script ได้ หรือเกิดข้อผิดพลาดเครือข่าย: ' + error.message);
                console.error('Network or Fetch error (get_sheet_names):', error);
                competitionSelect.innerHTML = '<option value="">ไม่สามารถเชื่อมต่อได้</option>';
                dataTableSection.innerHTML = '<h2 class="h5 mb-3 text-secondary text-center">ผลการแข่งขัน</h2><div class="text-center text-danger py-4">ไม่สามารถเชื่อมต่อได้: ' + error.message + '</div>';
            } finally {
                competitionSelect.disabled = false;
                hideLoadingSpinner(); // Hide spinner
            }
        }

        /**
         * Populates the competition select dropdown with sheet names.
         * @param {Array<string>} sheetNames An array of sheet names.
         */
        function populateCompetitionSelect(sheetNames) {
            competitionSelect.innerHTML = '<option value="">-- เลือกรายการแข่ง --</option>';
            sheetNames.forEach(name => {
                const option = document.createElement('option');
                option.value = name;
                option.textContent = name;
                competitionSelect.appendChild(option);
            });
        }

        /**
         * Fetches data from the selected Google Sheet via the Apps Script Web App.
         * @param {string} sheetName The name of the sheet to fetch data from.
         */
        async function fetchSheetData(sheetName) {
            console.log(`fetchSheetData called for sheet: ${sheetName}`);
            
            if (!sheetName) {
                dataTableSection.classList.add('d-none'); // Hide table if no sheet selected
                dataTableSection.innerHTML = '<h2 class="h5 mb-3 text-secondary text-center">ผลการแข่งขัน</h2><div class="text-center text-muted py-4">กรุณาเลือกรายการแข่ง</div>';
                return;
            }

            showLoadingSpinner(); // Show spinner
            dataTableSection.classList.add('d-none'); // Hide table while loading new data
            // Clear previous content of dataTableSection and show loading message
            dataTableSection.innerHTML = '<h2 class="h5 mb-3 text-secondary text-center">ผลการแข่งขัน: ' + sheetName + '</h2><div class="text-center text-muted py-4">กำลังโหลดข้อมูลจาก ' + sheetName + '...</div>';

            try {
                const url = new URL(APPS_SCRIPT_WEB_APP_URL);
                url.searchParams.append('spreadsheetId', SPREADSHEET_ID);
                url.searchParams.append('sheetName', sheetName);
                url.searchParams.append('action', 'get_data'); // Request data from a specific sheet

                const response = await fetch(url.toString());
                const result = await response.json();

                if (result.status === 'success') {
                    // เก็บข้อมูลที่ได้มา (ข้ามแถวแรกที่เป็น Header)
                    sheetData = result.data.slice(1); 
                    renderDataTable(sheetData, result.data[0]); // Pass headers if needed, though not directly used in this renderDataTable
                    dataTableSection.classList.remove('d-none'); // Show table after data is loaded
                    console.log(`ดึงข้อมูลจาก ${sheetName} สำเร็จแล้ว!`);
                } else {
                    alert('เกิดข้อผิดพลาดในการดึงข้อมูลจาก ' + sheetName + ': ' + result.message);
                    console.error('Error from Apps Script (get_data):', result.message);
                    dataTableSection.innerHTML = `<h2 class="h5 mb-3 text-secondary text-center">ผลการแข่งขัน: ${sheetName}</h2><div class="text-center text-danger py-4">เกิดข้อผิดพลาดในการดึงข้อมูล: ${result.message}</div>`;
                    dataTableSection.classList.remove('d-none'); // Show section with error message
                }
            } catch (error) {
                alert('ไม่สามารถเชื่อมต่อกับ Apps Script ได้ หรือเกิดข้อผิดพลาดเครือข่าย: ' + error.message);
                console.error('Network or Fetch error (get_data):', error);
                dataTableSection.innerHTML = `<h2 class="h5 mb-3 text-secondary text-center">ผลการแข่งขัน: ${sheetName}</h2><div class="text-center text-danger py-4">ไม่สามารถเชื่อมต่อได้: ${error.message}</div>`;
                dataTableSection.classList.remove('d-none'); // Show section with error message
            } finally {
                hideLoadingSpinner(); // Hide spinner
            }
        }

        /**
         * Renders the fetched data into the HTML table, grouped by class level and separated for Team Supervisors and Participation.
         * @param {Array<Array<string>>} data An array of rows, where each row is an array of cell values.
         * @param {Array<string>} headers An array of header names (not directly used for rendering in this version).
         */
        function renderDataTable(data, headers) {
            console.log("renderDataTable called with data:", data);
            
            // Clear all content within dataTableSection except the main title
            const mainTitle = dataTableSection.querySelector('h2');
            dataTableSection.innerHTML = ''; // Clear everything
            if (mainTitle) { // Re-add the main title
                dataTableSection.appendChild(mainTitle);
            }

            if (data.length === 0) {
                const noDataMessage = document.createElement('div');
                noDataMessage.className = 'text-center text-muted py-4';
                noDataMessage.textContent = 'ไม่พบผลการแข่งขันในรายการแข่งนี้';
                dataTableSection.appendChild(noDataMessage);
                return;
            }

            // Separate data into students, team supervisors, and participation
            const studentData = [];
            const supervisorData = [];
            const participationData = []; // New array for 'เข้าร่วม'

            data.forEach(row => {
                const participantType = row[5] || ''; // Column F is Participant Type (index 5)
                const awardLevel = row[3] || ''; // Column D is Award Level (index 3)

                if (participantType === 'ผู้คุมทีม') {
                    supervisorData.push(row);
                } else if (awardLevel === 'เข้าร่วม') { // Check for 'เข้าร่วม' award
                    participationData.push(row);
                }
                else {
                    studentData.push(row);
                }
            });

            let hasContentToDisplay = false; // Flag to check if any table content is rendered

            // Group student data by Class Level (assuming it's in Column E, index 4)
            const groupedStudentData = studentData.reduce((acc, row) => {
                const classLevel = row[4] || 'ไม่ระบุระดับชั้น'; 
                if (!acc[classLevel]) {
                    acc[classLevel] = [];
                }
                acc[classLevel].push(row);
                return acc;
            }, {});

            // Define a custom order for class levels
            const classLevelOrder = {
                'ระดับชั้นประถมศึกษาตอนปลาย (ป.4 - ป.6)': 1,
                'ระดับมัธยมศึกษาตอนต้น (ม.1 - ม.3)': 2,
                'ระดับมัธยมศึกษาตอนปลาย (ม.4 - ม.6)': 3,
                'อื่นๆ': 98, 
                'ไม่ระบุระดับชั้น': 99 
            };

            // Sort class levels based on the defined order
            const sortedClassLevels = Object.keys(groupedStudentData).sort((a, b) => {
                return (classLevelOrder[a] || 100) - (classLevelOrder[b] || 100);
            });

            // Define a custom order for award levels
            const awardLevelOrder = {
                'ชนะเลิศ': 1,
                'รองชนะเลิศอันดับ 1': 2,
                'รองชนะเลิศอันดับ 2': 3,
                'ชมเชย': 4,
                'เข้าร่วม': 5, // Ensure 'เข้าร่วม' has a defined order
                'ไม่ระบุระดับรางวัล': 99 
            };

            // Render tables for students (grouped by class level)
            sortedClassLevels.forEach(classLevel => {
                // Skip rendering if classLevel is 'ไม่ระบุระดับชั้น'
                if (classLevel === 'ไม่ระบุระดับชั้น') {
                    return; 
                }

                let levelData = groupedStudentData[classLevel]; 

                // Sort data within each class level by Award Level
                levelData.sort((a, b) => {
                    const awardA = a[3] || 'ไม่ระบุระดับรางวัล'; // Column D is Award Level (index 3)
                    const awardB = b[3] || 'ไม่ระบุระดับรางวัล';
                    return (awardLevelOrder[awardA] || 100) - (awardLevelOrder[awardB] || 100);
                });

                if (levelData.length > 0) { // Only render card if there's data for this class level
                    hasContentToDisplay = true;
                    const levelCard = document.createElement('div');
                    levelCard.className = 'card p-4 shadow-sm mb-4'; 

                    const levelTitle = document.createElement('h3');
                    levelTitle.className = 'h6 mb-3 text-primary text-center'; 
                    levelTitle.textContent = `ระดับชั้น: ${classLevel}`; 
                    levelCard.appendChild(levelTitle);

                    const tableResponsiveDiv = document.createElement('div');
                    tableResponsiveDiv.className = 'table-responsive rounded shadow-sm';

                    const table = document.createElement('table');
                    table.className = 'table table-striped table-hover mb-0';

                    const thead = document.createElement('thead');
                    thead.innerHTML = `
                        <tr>
                            <th>ระดับรางวัล</th> 
                            <th>ชื่อ-นามสกุล</th>
                            <th>ผู้ร่วมแข่งขัน</th> 
                            <th class="action-cell">ดาวน์โหลด</th> 
                        </tr>
                    `;
                    table.appendChild(thead);

                    const tbody = document.createElement('tbody');
                    levelData.forEach((row, index) => {
                        const tr = document.createElement('tr');

                        const tdAwardLevel = document.createElement('td');
                        tdAwardLevel.textContent = row[3] || '-'; 
                        tdAwardLevel.setAttribute('data-label', 'ระดับรางวัล');
                        tr.appendChild(tdAwardLevel);

                        const tdName = document.createElement('td');
                        tdName.textContent = row[0] || '-'; 
                        tdName.setAttribute('data-label', 'ชื่อ-นามสกุล');
                        tr.appendChild(tdName);

                        const tdParticipantType = document.createElement('td');
                        tdParticipantType.textContent = row[5] || '-'; 
                        tdParticipantType.setAttribute('data-label', 'ผู้ร่วมแข่งขัน');
                        tr.appendChild(tdParticipantType);

                        const tdAction = document.createElement('td');
                        tdAction.className = 'action-cell';
                        tdAction.setAttribute('data-label', 'ดาวน์โหลด');

                        const btnGroup = document.createElement('div');
                        btnGroup.className = 'btn-group'; 
                        btnGroup.setAttribute('role', 'group');

                        const downloadBtn = document.createElement('button');
                        downloadBtn.textContent = 'ดาวน์โหลดเกียรติบัตร';
                        downloadBtn.className = 'btn btn-secondary-custom btn-sm download-btn';
                        downloadBtn.dataset.name = row[0] || '';
                        downloadBtn.dataset.activity = row[1] || ''; 
                        downloadBtn.dataset.date = row[2] || '';     
                        downloadBtn.dataset.awardLevel = row[3] || ''; 
                        downloadBtn.dataset.classLevel = row[4] || ''; 
                        downloadBtn.dataset.participantType = row[5] || ''; 
                        downloadBtn.addEventListener('click', downloadIndividualCertificate);
                        btnGroup.appendChild(downloadBtn);

                        tdAction.appendChild(btnGroup);
                        tr.appendChild(tdAction);

                        tbody.appendChild(tr);
                    });
                    table.appendChild(tbody);
                    tableResponsiveDiv.appendChild(table);
                    levelCard.appendChild(tableResponsiveDiv);
                    dataTableSection.appendChild(levelCard); 
                }
            });

            // Render a separate table for Team Supervisors if data exists
            if (supervisorData.length > 0) {
                hasContentToDisplay = true;
                const supervisorCard = document.createElement('div');
                supervisorCard.className = 'card p-4 shadow-sm mb-4 mt-5'; 

                const supervisorTitle = document.createElement('h3');
                supervisorTitle.className = 'h6 mb-3 text-primary text-center';
                supervisorTitle.textContent = `ผู้คุมทีม`; 
                supervisorCard.appendChild(supervisorTitle);

                const tableResponsiveDiv = document.createElement('div');
                tableResponsiveDiv.className = 'table-responsive rounded shadow-sm';

                const table = document.createElement('table');
                table.className = 'table table-striped table-hover mb-0';

                const thead = document.createElement('thead');
                thead.innerHTML = `
                    <tr>
                        <th>ระดับรางวัล</th> 
                        <th>ชื่อ-นามสกุล</th>
                        <th>ผู้ร่วมแข่งขัน</th> 
                        <th class="action-cell">ดาวน์โหลด</th> 
                    </tr>
                `;
                table.appendChild(thead);

                const tbody = document.createElement('tbody');
                // Sort supervisor data by award level as well
                supervisorData.sort((a, b) => {
                    const awardA = a[3] || 'ไม่ระบุระดับรางวัล';
                    const awardB = b[3] || 'ไม่ระบุระดับรางวัล';
                    return (awardLevelOrder[awardA] || 100) - (awardLevelOrder[awardB] || 100);
                });

                supervisorData.forEach((row, index) => {
                    const tr = document.createElement('tr');

                    const tdAwardLevel = document.createElement('td');
                    tdAwardLevel.textContent = row[3] || '-'; 
                    tdAwardLevel.setAttribute('data-label', 'ระดับรางวัล');
                    tr.appendChild(tdAwardLevel);

                    const tdName = document.createElement('td');
                    tdName.textContent = row[0] || '-'; 
                    tdName.setAttribute('data-label', 'ชื่อ-นามสกุล');
                    tr.appendChild(tdName);

                    const tdParticipantType = document.createElement('td');
                    tdParticipantType.textContent = row[5] || '-'; 
                    tdParticipantType.setAttribute('data-label', 'ผู้ร่วมแข่งขัน');
                    tr.appendChild(tdParticipantType);

                    const tdAction = document.createElement('td');
                    tdAction.className = 'action-cell';
                    tdAction.setAttribute('data-label', 'ดาวน์โหลด');

                    const btnGroup = document.createElement('div');
                    btnGroup.className = 'btn-group'; 
                    btnGroup.setAttribute('role', 'group');

                    const downloadBtn = document.createElement('button');
                    downloadBtn.textContent = 'ดาวน์โหลดเกียรติบัตร';
                    downloadBtn.className = 'btn btn-secondary-custom btn-sm download-btn';
                    downloadBtn.dataset.name = row[0] || '';
                    downloadBtn.dataset.activity = row[1] || ''; 
                    downloadBtn.dataset.date = row[2] || '';     
                    downloadBtn.dataset.awardLevel = row[3] || ''; 
                    downloadBtn.dataset.classLevel = row[4] || ''; 
                    downloadBtn.dataset.participantType = row[5] || ''; 
                    downloadBtn.addEventListener('click', downloadIndividualCertificate);
                    btnGroup.appendChild(downloadBtn);

                    tdAction.appendChild(btnGroup);
                    tr.appendChild(tdAction);

                    tbody.appendChild(tr);
                });
                table.appendChild(tbody);
                tableResponsiveDiv.appendChild(table);
                supervisorCard.appendChild(tableResponsiveDiv);
                dataTableSection.appendChild(supervisorCard); 
            }

            // Render a separate table for Participation if data exists
            if (participationData.length > 0) {
                hasContentToDisplay = true;
                const participationCard = document.createElement('div');
                participationCard.className = 'card p-4 shadow-sm mb-4 mt-5'; 

                const participationTitle = document.createElement('h3');
                participationTitle.className = 'h6 mb-3 text-primary text-center';
                participationTitle.textContent = `ผู้เข้าร่วมกิจกรรม`; 
                participationCard.appendChild(participationTitle);

                const tableResponsiveDiv = document.createElement('div');
                tableResponsiveDiv.className = 'table-responsive rounded shadow-sm';

                const table = document.createElement('table');
                table.className = 'table table-striped table-hover mb-0';

                const thead = document.createElement('thead');
                thead.innerHTML = `
                    <tr>
                        <th>ระดับรางวัล</th> 
                        <th>ชื่อ-นามสกุล</th>
                        <th>ผู้ร่วมแข่งขัน</th> 
                        <th class="action-cell">ดาวน์โหลด</th> 
                    </tr>
                `;
                table.appendChild(thead);

                const tbody = document.createElement('tbody');
                // Sort participation data by name or other criteria if desired
                participationData.sort((a, b) => {
                    const nameA = a[0] || ''; // Sort by Name (index 0)
                    const nameB = b[0] || '';
                    return nameA.localeCompare(nameB);
                });

                participationData.forEach((row, index) => {
                    const tr = document.createElement('tr');

                    const tdAwardLevel = document.createElement('td');
                    tdAwardLevel.textContent = row[3] || '-'; 
                    tdAwardLevel.setAttribute('data-label', 'ระดับรางวัล');
                    tr.appendChild(tdAwardLevel);

                    const tdName = document.createElement('td');
                    tdName.textContent = row[0] || '-'; 
                    tdName.setAttribute('data-label', 'ชื่อ-นามสกุล');
                    tr.appendChild(tdName);

                    const tdParticipantType = document.createElement('td');
                    tdParticipantType.textContent = row[5] || '-'; 
                    tdParticipantType.setAttribute('data-label', 'ผู้ร่วมแข่งขัน');
                    tr.appendChild(tdParticipantType);

                    const tdAction = document.createElement('td');
                    tdAction.className = 'action-cell';
                    tdAction.setAttribute('data-label', 'ดาวน์โหลด');

                    const btnGroup = document.createElement('div');
                    btnGroup.className = 'btn-group'; 
                    btnGroup.setAttribute('role', 'group');

                    const downloadBtn = document.createElement('button');
                    downloadBtn.textContent = 'ดาวน์โหลดเกียรติบัตร';
                    downloadBtn.className = 'btn btn-secondary-custom btn-sm download-btn';
                    downloadBtn.dataset.name = row[0] || '';
                    downloadBtn.dataset.activity = row[1] || ''; 
                    downloadBtn.dataset.date = row[2] || '';     
                    downloadBtn.dataset.awardLevel = row[3] || ''; 
                    downloadBtn.dataset.classLevel = row[4] || ''; 
                    downloadBtn.dataset.participantType = row[5] || ''; 
                    downloadBtn.addEventListener('click', downloadIndividualCertificate);
                    btnGroup.appendChild(downloadBtn);

                    tdAction.appendChild(btnGroup);
                    tr.appendChild(tdAction);

                    tbody.appendChild(tr);
                });
                table.appendChild(tbody);
                tableResponsiveDiv.appendChild(table);
                participationCard.appendChild(tableResponsiveDiv);
                dataTableSection.appendChild(participationCard); 
            }

            // If no content was rendered, show the "no data" message
            if (!hasContentToDisplay) {
                const noDataMessage = document.createElement('div');
                noDataMessage.className = 'text-center text-muted py-4';
                noDataMessage.textContent = 'ไม่พบผลการแข่งขันที่สามารถแสดงได้ในรายการแข่งนี้';
                dataTableSection.appendChild(noDataMessage);
            }
        }

        /**
         * Populates the hidden certificate template and triggers PDF download.
         * This function is called when an individual download button is clicked.
         * @param {Event} event The click event object.
         */
        async function downloadIndividualCertificate(event) {
            const button = event.target;
            const originalBtnText = button.textContent;
            button.textContent = 'กำลังสร้าง...';
            button.disabled = true;

            // ดึงข้อมูลจาก dataset ของปุ่ม
            const name = button.dataset.name;
            const activity = button.dataset.activity;
            const date = button.dataset.date; 
            const awardLevel = button.dataset.awardLevel; 
            const classLevel = button.dataset.classLevel;

            // ใส่ข้อมูลลงใน template ที่ซ่อนอยู่
            certName.textContent = name || '{{ชื่อ-นามสกุล}}';
            certActivity.textContent = classLevel || '{{ระดับรางวัล}}';
            // certDate.textContent = date || '{{วันที่}}'; 
            certAwardLevel.textContent =  `ได้รับรางวัล `+ awardLevel+ ' ' + activity || '{{ชื่อกิจกรรม}}'; 

            try {
                // ใช้ html2canvas เพื่อแปลง template เป็นรูปภาพ
                const canvas = await html2canvas(certificateTemplate, {
                    scale: 3, 
                    useCORS: true, 
                    logging: false 
                });

                // ดึงข้อมูลรูปภาพ
                const imgData = canvas.toDataURL('image/png');

                // สร้างเอกสาร PDF (A4 แนวนอน)
                const pdf = new window.jspdf.jsPDF('landscape', 'mm', 'a4');

                // คำนวณขนาดรูปภาพให้พอดีกับหน้า PDF
                const imgWidth = pdf.internal.pageSize.getWidth();
                const imgHeight = (canvas.height * imgWidth) / canvas.width;

                // เพิ่มรูปภาพลงใน PDF
                pdf.addImage(imgData, 'PNG', 0, 0, imgWidth, imgHeight);

                // บันทึกไฟล์ PDF
                const fileName = `เกียรติบัตร_${name || 'ผู้รับ'}_${awardLevel || ''}.pdf`;
                pdf.save(fileName);

            } catch (error) {
                console.error("Error generating PDF:", error);
                alert("เกิดข้อผิดพลาดในการสร้าง PDF สำหรับ " + name + ": " + error.message);
            } finally {
                // คืนค่าปุ่ม
                button.textContent = originalBtnText;
                button.disabled = false;
            }
        }

        // Event Listeners
        competitionSelect.addEventListener('change', (event) => {
            const selectedSheetName = event.target.value;
            fetchSheetData(selectedSheetName);
        });

        // Initial setup - Load competition list automatically on page load
        document.addEventListener('DOMContentLoaded', () => {
            // Clear placeholders in hidden template on load
            certName.textContent = '';
            certActivity.textContent = '';
            // certDate.textContent = ''; 
            certAwardLevel.textContent = '';
            
            // Set initial message for the table section
            dataTableSection.innerHTML = '<h2 class="h5 mb-3 text-secondary text-center">ผลการแข่งขัน</h2><div class="text-center text-muted py-4">กรุณาเลือกรายการแข่ง</div>';
            dataTableSection.classList.add('d-none'); // Ensure table section is hidden initially
            
            // Automatically load the list of competitions (sheet names)
            loadCompetitionList();
        });
    </script>
<?= $this->endSection() ?>