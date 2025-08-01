<?= $this->extend('User/layouts/main') ?>
<?= $this->section('title') ?>
ดาวน์โหลดเกียรติบัตร
<?= $this->endSection() ?>
<?= $this->section('css') ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
<style>
.hero-header {
    background: url(../public/img/bg/bg.jpg) center bottom no-repeat;
    background-size: cover;
    padding: 10rem 0 5rem 0;
}

.certificate-preview {
    position: absolute;
    left: -9999px;
    top: -9999px;
    width: 297mm;
    height: 210mm;
    padding: 40mm;
    background-color: #ffffff;
    text-align: center;
    box-sizing: border-box;
}

.certificate-preview h1 {
    font-size: 2.5rem;
    font-weight: 700;
    color: #2c5282;
    margin-bottom: 20px;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
}

.certificate-preview p {
    font-size: 1.2rem;
    color: #4a5568;
    line-height: 1.6;
}

table {
    width: 100%;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    tr {
        border: 1px solid #e2e8f0;
        margin-bottom: 10px;
        border-radius: 8px;
    }
    #certName {
        font-size: 2.5rem; 
        font-weight: bold; 
        color: #0071bc; 
        margin-top: 190px;
    }
}

@media (min-width: 768px) {
    #certName {
        font-size: 2.5rem; 
        font-weight: bold; 
        color: #0071bc; 
        margin-top: 110px;
    }
}

/* Custom Loading Spinner */
.spinner {
    border: 4px solid rgba(0, 0, 0, 0.1);
    border-left-color: #4299e1;
    border-radius: 50%;
    width: 24px;
    height: 24px;
    animation: spin 1s linear infinite;
    display: inline-block;
    vertical-align: middle;
    margin-right: 8px;
}

@keyframes spin {
    to { transform: rotate(360deg); }
}

.spinner-container {
    text-align: center;
    padding: 15px;
    display: none;
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

    <div id="dataTableSection" class="mt-4">
        <!-- Tables will be appended here dynamically -->
    </div>


    <!-- Hidden certificate template -->
    <div id="certificateTemplate" class="certificate-preview">
        <img src="<?=base_url('public/img/certificate/ctfc.png')?>" alt="Certificate Background" style="width:100%; height:100%; position:absolute; top:0; left:0; z-index:-1;">
        <p id="certName">{{ชื่อ-นามสกุล}}</p>
        <div id="certAwardLevel" style="font-size: 1.6rem; font-weight: bold; color: #0071bc; margin-top: -15px;">{{ระดับรางวัล}}</div>
        <div style="font-size: 1.6rem; font-weight: bold; color: #0071bc; margin-top: -5px;"><span id="certActivity">{{วันที่}}</span></div>
        <div id="certDate" style="font-size: 1.1rem; color: #0071bc; margin-top: -0px;">{{ชื่อกิจกรรม}}</div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<!-- Libs -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<script>
// --- Configuration ---
const APPS_SCRIPT_WEB_APP_URL = 'https://script.google.com/macros/s/AKfycbwn4eNrcjifbhK3-OJZKR7GvNCUApQrr-G5cQuXN1_8_DsQsVSdJ515P4R_0tC6NuDL/exec';
const SPREADSHEET_ID = '12t7UCzg6XrhA6LsKZ9yeL9OCho_XRHSF9nij_gRaqFE';

// --- Element References ---
const competitionSelect = document.getElementById('competitionSelect');
const dataTableSection = document.getElementById('dataTableSection');
const loadingSpinner = document.getElementById('loadingSpinner');

// --- DataTables Custom Sorting Plugin for Award Levels ---
const awardLevelOrder = {
    'ชนะเลิศ': 1,
    'รองชนะเลิศอันดับ 1': 2,
    'รองชนะเลิศอันดับ 2': 3,
    'ชมเชย': 4,
    'เข้าร่วม': 5
};

$.fn.dataTable.ext.type.order['award-level-pre'] = function (d) {
    const awardText = d.replace(/<.*?>/g, '').trim();
    return awardLevelOrder[awardText] || 100;
};

// --- Functions ---

async function fetchAndRender(url, successCallback, errorCallback) {
    try {
        const response = await fetch(url.toString());
        const result = await response.json();
        if (result.status === 'success') {
            successCallback(result.data);
        } else {
            errorCallback(result.message);
        }
    } catch (error) {
        errorCallback(error.message);
    }
}

async function loadCompetitionList() {
    showLoadingSpinner();
    competitionSelect.disabled = true;
    dataTableSection.innerHTML = '<div class="text-center text-muted py-4">กรุณาเลือกรายการแข่ง</div>';

    const url = new URL(APPS_SCRIPT_WEB_APP_URL);
    url.searchParams.append('spreadsheetId', SPREADSHEET_ID);
    url.searchParams.append('action', 'get_sheet_names');

    await fetchAndRender(url, 
        (sheetNames) => {
            populateCompetitionSelect(sheetNames);
            if (sheetNames.length === 0) {
                dataTableSection.innerHTML = '<div class="text-center text-muted py-4">ไม่พบรายการแข่งใน Spreadsheet</div>';
            }
        },
        (errorMessage) => {
            alert('เกิดข้อผิดพลาดในการดึงรายการแข่ง: ' + errorMessage);
            dataTableSection.innerHTML = `<div class="text-center text-danger py-4">เกิดข้อผิดพลาด: ${errorMessage}</div>`;
        }
    );

    competitionSelect.disabled = false;
    hideLoadingSpinner();
}

function populateCompetitionSelect(sheetNames) {
    competitionSelect.innerHTML = '<option value="">-- เลือกรายการแข่ง --</option>';
    sheetNames.forEach(name => {
        const option = document.createElement('option');
        option.value = name;
        option.textContent = name;
        competitionSelect.appendChild(option);
    });
}

async function fetchSheetData(sheetName) {
    if ($.fn.DataTable.isDataTable('.table')) {
        $('.table').DataTable().destroy();
    }

    if (!sheetName) {
        dataTableSection.innerHTML = '<div class="text-center text-muted py-4">กรุณาเลือกรายการแข่ง</div>';
        return;
    }

    showLoadingSpinner();
    dataTableSection.innerHTML = `<div class="text-center text-muted py-4">กำลังโหลดข้อมูลจาก ${sheetName}...</div>`;

    const url = new URL(APPS_SCRIPT_WEB_APP_URL);
    url.searchParams.append('spreadsheetId', SPREADSHEET_ID);
    url.searchParams.append('sheetName', sheetName);
    url.searchParams.append('action', 'get_data');

    await fetchAndRender(url, 
        (data) => renderAllTables(data.slice(1)),
        (errorMessage) => {
            alert('เกิดข้อผิดพลาดในการดึงข้อมูล: ' + errorMessage);
            dataTableSection.innerHTML = `<div class="text-center text-danger py-4">เกิดข้อผิดพลาด: ${errorMessage}</div>`;
        }
    );
    hideLoadingSpinner();
}

function getAwardIcon(awardLevel) {
    const icons = {
        'ชนะเลิศ': '<i class="bi bi-trophy-fill text-warning"></i>',
        'รองชนะเลิศอันดับ 1': '<i class="bi bi-award-fill" style="color: #C0C0C0;"></i>', // Silver
        'รองชนะเลิศอันดับ 2': '<i class="bi bi-award-fill" style="color: #CD7F32;"></i>', // Bronze
        'ชมเชย': '<i class="bi bi-patch-check-fill text-info"></i>',
        'เข้าร่วม': '<i class="bi bi-person-check-fill text-success"></i>'
    };
    return `${icons[awardLevel] || ''} ${awardLevel}`;
}

function renderAllTables(data) {
    dataTableSection.innerHTML = ''; // Clear previous content

    if (data.length === 0) {
        dataTableSection.innerHTML = '<div class="text-center text-muted py-4">ไม่พบผลการแข่งขัน</div>';
        return;
    }

    // --- Data Separation ---
    const studentData = data.filter(row => (row[5] || '') !== 'ผู้คุมทีม' && (row[3] || '') !== 'เข้าร่วม');
    const supervisorData = data.filter(row => (row[5] || '') === 'ผู้คุมทีม');
    const participationData = data.filter(row => (row[3] || '') === 'เข้าร่วม');

    // --- Group Student Data by Class Level ---
    const groupedStudentData = studentData.reduce((acc, row) => {
        const classLevel = row[4] || 'ไม่ระบุระดับชั้น';
        if (!acc[classLevel]) acc[classLevel] = [];
        acc[classLevel].push(row);
        return acc;
    }, {});

    // --- Define the exact order for rendering ---
    const renderOrder = [
        'ระดับชั้นประถมศึกษาตอนปลาย (ป.4 - ป.6)',
        'ระดับมัธยมศึกษาตอนต้น (ม.1 - ม.3)',
        'ระดับมัธยมศึกษาตอนปลาย (ม.4 - ม.6)',
        'ระดับศูนย์ส่งเสริมการเรียนรู้'
    ];

    // --- Render Tables in the specified order ---
    renderOrder.forEach(classLevel => {
        if (groupedStudentData[classLevel]) {
            const tableId = `student-table-${classLevel.replace(/[^a-zA-Z0-9\u0E00-\u0E7F\s]/g, '').replace(/\s+/g, '-')}`;
            createTableForGroup(groupedStudentData[classLevel], `ระดับชั้น: ${classLevel}`, tableId);
        }
    });

    // Render other groups that are not in the specific order (e.g., 'อื่นๆ')
    Object.keys(groupedStudentData).forEach(classLevel => {
        if (!renderOrder.includes(classLevel)) {
            const tableId = `student-table-${classLevel.replace(/[^a-zA-Z0-9\u0E00-\u0E7F\s]/g, '').replace(/\s+/g, '-')}`;
            createTableForGroup(groupedStudentData[classLevel], `ระดับชั้น: ${classLevel}`, tableId);
        }
    });

    // Render Supervisor and Participation tables at the end
    createTableForGroup(supervisorData, 'ผู้คุมทีม', 'supervisor-table');
    createTableForGroup(participationData, 'ผู้เข้าร่วมกิจกรรม', 'participation-table');

    // --- Initialize DataTables ---
    if ($.fn.DataTable.isDataTable('.table')) {
         $('.table').DataTable().destroy();
    }
    $('.table').DataTable({
        responsive: true,
        order: [[0, 'asc']],
        columnDefs: [{ type: 'award-level', targets: 0 }],
        language: { search: "ค้นหา:", lengthMenu: "แสดง _MENU_ รายการ", info: "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ", infoEmpty: "แสดง 0 ถึง 0 จาก 0 รายการ", infoFiltered: "(กรองจาก _MAX_ รายการทั้งหมด)", zeroRecords: "ไม่พบข้อมูลที่ตรงกัน", paginate: { first: "หน้าแรก", last: "หน้าสุดท้าย", next: "ถัดไป", previous: "ก่อนหน้า" } }
    });
}

function createTableForGroup(data, title, tableId) {
    if (data.length === 0) return;

    const isScienceDrawingCompetition = competitionSelect.value === 'การแข่งขันภาพวาดทางวิทยาศาสตร์';
    const card = document.createElement('div');
    card.className = 'card p-4 shadow-sm mb-4';
    card.innerHTML = `<h3 class="h5 mb-3 text-primary text-center">${title}</h3>`;

    const tableResponsiveDiv = document.createElement('div');
    tableResponsiveDiv.className = 'table-responsive';

    const table = document.createElement('table');
    table.id = tableId;
    table.className = 'table table-bordered table-striped';
    table.style.width = '100%';

    let headers = '<th>ระดับรางวัล</th><th>ชื่อ-นามสกุล</th><th>ผู้ร่วมแข่งขัน</th><th class="no-sort">ดาวน์โหลด</th>';
    if (isScienceDrawingCompetition) {
        headers = '<th>ระดับรางวัล</th><th>ระดับ</th><th>คะแนน</th><th>ชื่อ-นามสกุล</th><th>ผู้ร่วมแข่งขัน</th><th class="no-sort">ดาวน์โหลด</th>';
    }
    table.innerHTML = `<thead><tr>${headers}</tr></thead>`;

    const tbody = document.createElement('tbody');
    data.forEach(row => {
        const tr = document.createElement('tr');
        let awardCellHtml = getAwardIcon(row[3] || '-');
        if ((row[5] || '') === 'ผู้คุมทีม') {
             awardCellHtml = `<i class="bi bi-person-video3 text-primary"></i> ${row[5]}`;
        }
        
        let rowContent = `<td data-label="ระดับรางวัล">${awardCellHtml}</td>`;
        if (isScienceDrawingCompetition) {
            rowContent += `<td data-label="ระดับ">${row[6] || '-'}</td>`;
            rowContent += `<td data-label="คะแนน">${row[7] || '-'}</td>`;
        }
        rowContent += `<td data-label="ชื่อ-นามสกุล">${row[0] || '-'}</td>`;
        rowContent += `<td data-label="ผู้ร่วมแข่งขัน">${row[5] || '-'}</td>`;

        const downloadBtn = document.createElement('button');
        downloadBtn.textContent = 'ดาวน์โหลด';
        downloadBtn.className = 'btn btn-primary btn-sm';
        Object.assign(downloadBtn.dataset, { name: row[0] || '', activity: row[1] || '', date: row[2] || '', awardLevel: row[3] || '', classLevel: row[4] || '', participantType: row[5] || '', tdLevel: row[6] || '' });
        downloadBtn.addEventListener('click', downloadIndividualCertificate);

        const actionCell = document.createElement('td');
        actionCell.setAttribute('data-label', 'ดาวน์โหลด');
        actionCell.appendChild(downloadBtn);

        tr.innerHTML = rowContent;
        tr.appendChild(actionCell);
        tbody.appendChild(tr);
    });

    table.appendChild(tbody);
    tableResponsiveDiv.appendChild(table);
    card.appendChild(tableResponsiveDiv);
    dataTableSection.appendChild(card);
}

async function downloadIndividualCertificate(event) {
    const button = event.target;
    const originalBtnText = button.textContent;
    button.innerHTML = '<span class="spinner-border spinner-border-sm"></span>';
    button.disabled = true;

    const { name, activity, date, awardLevel, classLevel, tdLevel, participantType } = button.dataset;
    const certName = document.getElementById('certName');
    const certAwardLevel = document.getElementById('certAwardLevel');
    const certActivity = document.getElementById('certActivity');
    const certDate = document.getElementById('certDate');

    certName.textContent = name || '-';
    certActivity.textContent = activity || '-';
    certDate.textContent = classLevel || '-';
    certAwardLevel.textContent = (participantType === "ผู้คุมทีม") 
        ? `${participantType} ได้รับรางวัลระดับ ${tdLevel || ''}` 
        : `ได้รับรางวัล ${awardLevel}` + (tdLevel ? ` ระดับ ${tdLevel}` : '');

    try {
        const canvas = await html2canvas(document.getElementById('certificateTemplate'), { scale: 3, useCORS: true });
        const pdf = new window.jspdf.jsPDF('landscape', 'mm', 'a4');
        pdf.addImage(canvas.toDataURL('image/png'), 'PNG', 0, 0, pdf.internal.pageSize.getWidth(), pdf.internal.pageSize.getHeight());
        pdf.save(`เกียรติบัตร_${name || 'ผู้รับ'}.pdf`);
    } catch (error) {
        console.error("Error generating PDF:", error);
        alert("เกิดข้อผิดพลาดในการสร้าง PDF: " + error.message);
    } finally {
        button.textContent = originalBtnText;
        button.disabled = false;
    }
}

function showLoadingSpinner() { loadingSpinner.classList.add('show'); }
function hideLoadingSpinner() { loadingSpinner.classList.remove('show'); }

// --- Initial Setup ---
document.addEventListener('DOMContentLoaded', () => {
    competitionSelect.addEventListener('change', (event) => fetchSheetData(event.target.value));
    loadCompetitionList();
});
</script>
<?= $this->endSection() ?>
