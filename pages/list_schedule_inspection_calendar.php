
<?php
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/logs/php-error.log'); // ✅ Create logs folder if not exists
error_reporting(E_ALL);
?>

<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Footer Editor</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                            <li class="breadcrumb-item active">Footer Editor</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        
                                       
                                    </div>
                                    <div class="card-body">
                                    <?php
$year = isset($_GET['year']) ? (int)$_GET['year'] : date('Y');
$month = isset($_GET['month']) ? (int)$_GET['month'] : date('n');

$monthName = date('F', strtotime("$year-$month-01"));
$daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
$startDay = date('w', strtotime("$year-$month-01"));
?>

<style>
.calendar { display: grid; grid-template-columns: repeat(7, 1fr); gap: 6px; }
.day { border: 1px solid #ccc; padding: 10px; min-height: 100px; background: #fdfdfd; position: relative; }
.header { font-weight: bold; text-align: center; background: #eee; padding: 8px; }
.date { font-weight: bold; }
.meeting { background-color: #ffc; padding: 3px 6px; margin-top: 5px; font-size: 0.9em; border-left: 3px solid orange; }
</style>

<h2><?= $monthName . ' ' . $year ?></h2>
<a href="?page=list_schedule_inspection_calendar&month=<?= ($month == 1 ? 12 : $month - 1) ?>&year=<?= ($month == 1 ? $year - 1 : $year) ?>">← Prev</a> |
<a href="?page=list_schedule_inspection_calendar&month=<?= ($month == 12 ? 1 : $month + 1) ?>&year=<?= ($month == 12 ? $year + 1 : $year) ?>">Next →</a>

<div  id="calendar"  class="fc fc-media-screen fc-direction-ltr fc-theme-standard calendar ">
    <?php foreach (['Sun','Mon','Tue','Wed','Thu','Fri','Sat'] as $d): ?>
        <div class="header"><?= $d ?></div>
    <?php endforeach; ?>

    <?php for ($i = 0; $i < $startDay; $i++): ?>
        <div></div>
    <?php endfor; ?>

    <?php for ($day = 1; $day <= $daysInMonth; $day++): 
        $dateStr = sprintf('%04d-%02d-%02d', $year, $month, $day);
    ?>
        <div class="day" data-date="<?= $dateStr ?>">
            <div class="date"><?= $day ?></div>
            <div class="meeting-container"></div>
        </div>
    <?php endfor; ?>
</div>

<script>
    let audit_plans;
    async function load_func(){
        const year = <?= $year ?>;
        const month = <?= $month ?>;
        await get_audit_plans();
        await get_scheduled_audits(year, month);
    }
    async function get_audit_plans(){
      

        try {
        const response = await fetch("ajax/get_audit_plans.php", {
            method: "GET",
            headers: { "Content-Type": "application/json" },
        });

        const data = await response.json();
        audit_plans = data.data;
        console.log("audit_plans :", data);

    } catch (error) {
        console.error("Error:", error);
    }
    }

    async function get_scheduled_audits(year, month) {
        try {
        const response = await fetch(`ajax/get_scheduled_audits.php?year=${year}&month=${month}`);
        const data = await response.json();
        
        data.data.forEach(meeting => {
            let audit_plan = audit_plans.find(auditplan => meeting.audit_id === auditplan.audit_id);

             const isLeadAuditor = audit_plan.lead_auditor === current_user_id;
        const isApproved = status === 'SUBMITTED' || status === 'APPROVED';
        let approveButton;

        if (isLeadAuditor) {
            const url = isApproved 
                ? `view_answers?id=${meeting.scheduled_id}&audit_lead=true` 
                : `view_schedule?id=${meeting.scheduled_id}`;
            const linkText = isApproved ? 'View Answers' : 'View Schedule';
            approveButton = `
                    <a href="${url}">${audit_plan.audit_title}</a>
            `;
        } else {
            const url = isApproved 
                ? `view_answers?id=${meeting.scheduled_id}` 
                : `view_schedule?id=${meeting.scheduled_id}`;
            const linkText = isApproved ? 'View Answers' : 'View Schedule';
            approveButton = `
                    <a href="${url}">${audit_plan.audit_title}</a>
            `;
        }

            
            const el = document.querySelector(`.day[data-date="${meeting.planned_start_date}"] .meeting-container`);
            if (el) {
                const div = document.createElement('div');
                div.classList.add('meeting');
                div.innerHTML = approveButton;
                el.appendChild(div);
            }
        });
    } catch (err) {
        console.error('Fetch error:', err);
    }
        
    }

    /*
document.addEventListener('DOMContentLoaded', function () {
    

    fetch('ajax/get_scheduled_audits.php?year=' + year + '&month=' + month)
        .then(res => res.json())
        .then(data => {
            // console.log(data.data);
            data.data.forEach(meeting => {
                console.log(meeting);
            let audit_plan = audit_plans.find(auditplan => meeting.audit_id === auditplan.audit_id);

                const el = document.querySelector(`.day[data-date="${meeting.planned_start_date}"] .meeting-container`);
                if (el) {
                    console.log(meeting);
                    const div = document.createElement('div');
                    div.classList.add('meeting');
                    div.innerText = meeting.audit_title;
                    el.appendChild(div);
                }
            });
        })
        .catch(err => console.error('Fetch error:', err));
});*/
</script>


                                        <!-- <div>
                                            <center>
                                                <button class="btn btn-success" id="save_footer">
                                                    Save
                                                </button>
                                            </center>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

        

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Minia.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Design & Develop by <a href="#!" class="text-decoration-underline">Themesbrand</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        
        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title d-flex align-items-center p-3">

                    <h5 class="m-0 me-2">Theme Customizer</h5>

                    <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                </div>

                <!-- Settings -->
                <hr class="m-0" />

                <div class="p-4">
                    <h6 class="mb-3">Layout</h6>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout"
                            id="layout-vertical" value="vertical">
                        <label class="form-check-label" for="layout-vertical">Vertical</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout"
                            id="layout-horizontal" value="horizontal">
                        <label class="form-check-label" for="layout-horizontal">Horizontal</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Layout Mode</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-mode"
                            id="layout-mode-light" value="light">
                        <label class="form-check-label" for="layout-mode-light">Light</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-mode"
                            id="layout-mode-dark" value="dark">
                        <label class="form-check-label" for="layout-mode-dark">Dark</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Layout Width</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-width"
                            id="layout-width-fuild" value="fuild" onchange="document.body.setAttribute('data-layout-size', 'fluid')">
                        <label class="form-check-label" for="layout-width-fuild">Fluid</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-width"
                            id="layout-width-boxed" value="boxed" onchange="document.body.setAttribute('data-layout-size', 'boxed')">
                        <label class="form-check-label" for="layout-width-boxed">Boxed</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Layout Position</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-position"
                            id="layout-position-fixed" value="fixed" onchange="document.body.setAttribute('data-layout-scrollable', 'false')">
                        <label class="form-check-label" for="layout-position-fixed">Fixed</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-position"
                            id="layout-position-scrollable" value="scrollable" onchange="document.body.setAttribute('data-layout-scrollable', 'true')">
                        <label class="form-check-label" for="layout-position-scrollable">Scrollable</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Topbar Color</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="topbar-color"
                            id="topbar-color-light" value="light" onchange="document.body.setAttribute('data-topbar', 'light')">
                        <label class="form-check-label" for="topbar-color-light">Light</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="topbar-color"
                            id="topbar-color-dark" value="dark" onchange="document.body.setAttribute('data-topbar', 'dark')">
                        <label class="form-check-label" for="topbar-color-dark">Dark</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Size</h6>

                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-size"
                            id="sidebar-size-default" value="default" onchange="document.body.setAttribute('data-sidebar-size', 'lg')">
                        <label class="form-check-label" for="sidebar-size-default">Default</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-size"
                            id="sidebar-size-compact" value="compact" onchange="document.body.setAttribute('data-sidebar-size', 'md')">
                        <label class="form-check-label" for="sidebar-size-compact">Compact</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-size"
                            id="sidebar-size-small" value="small" onchange="document.body.setAttribute('data-sidebar-size', 'sm')">
                        <label class="form-check-label" for="sidebar-size-small">Small (Icon View)</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Color</h6>

                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-color"
                            id="sidebar-color-light" value="light" onchange="document.body.setAttribute('data-sidebar', 'light')">
                        <label class="form-check-label" for="sidebar-color-light">Light</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-color"
                            id="sidebar-color-dark" value="dark" onchange="document.body.setAttribute('data-sidebar', 'dark')">
                        <label class="form-check-label" for="sidebar-color-dark">Dark</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-color"
                            id="sidebar-color-brand" value="brand" onchange="document.body.setAttribute('data-sidebar', 'brand')">
                        <label class="form-check-label" for="sidebar-color-brand">Brand</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Direction</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-direction"
                            id="layout-direction-ltr" value="ltr">
                        <label class="form-check-label" for="layout-direction-ltr">LTR</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-direction"
                            id="layout-direction-rtl" value="rtl">
                        <label class="form-check-label" for="layout-direction-rtl">RTL</label>
                    </div>

                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/feather-icons/feather.min.js"></script>
        <!-- pace js -->
        <script src="assets/libs/pace-js/pace.min.js"></script>

        <script src="assets/js/app.js"></script>

    </body>
</html>
