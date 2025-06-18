<style>
    .cards{
        border: 1px solid;
        margin-bottom: 1rem;
        padding: 1rem;
        border-radius: 1rem;
    }

    .cards {
  padding: 16px;
  border: 1px solid #ddd;
  border-radius: 12px;
  transition: all 0.3s ease;
  background-color: #fff;
}

    .cards:hover {
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
  transform: scale(1.02);
  cursor: pointer;
}
</style>

<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">View Audit Compliance Reports</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Audit</a></li>
                                            <li class="breadcrumb-item active">View Audit Compliance Reports</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                               
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Audit Compliance Reports</h4>
                                        <!-- <p class="card-title-desc">This is an experimental awesome solution for responsive tables with complex data.</p> -->
                                    </div>
                                    <div class="card-body">
                                        <div class="row" id="severity_window">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Question</th>
                                                        <th>Description</th>
                                                        <th>Answer</th>
                                                        <th>Severity</th>
                                                        <th>Severity Notes </th>
                                                        <th>Image</th>

                                                        <th>
                                                            Action
                                                        </th>

                                                    </tr>
                                                </thead>
                                                <tbody class="" id="severity_table">
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

              <!-- Modal Backdrop -->
<div id="modalBackdrop" style="
    display:none; 
    position:fixed; 
    top:0; 
    left:0; 
    width:100%; 
    height:100%; 
    background:rgba(0,0,0,0.6); 
    z-index:9998;
"></div>

<!-- Modal -->
<div id="severityCommentModal" style="
    display:none; 
    position:fixed; 
    top:50%; 
    left:50%; 
    transform:translate(-50%, -50%);
    background:#fff; 
    padding:20px; 
    border-radius:8px; 
    z-index:9999; 
    max-width:500px; 
    width:90%;
    max-height:90vh;       /* 👈 Limit modal height */
    overflow-y:auto;       /* 👈 Enable scrolling inside modal */
    box-shadow: 0 5px 15px rgba(0,0,0,0.3);
">
<span onclick="close_severity_comment_modal()" style="position:absolute; top:10px; right:15px; font-size:24px; cursor:pointer;">&times;</span>

    <h3>Severity Comment</h3>


    <!-- Severity -->
    <label for="severityInput">Severity</label>
    <input type="text" id="severityInput" style="width:100%; margin-bottom:10px;" />
    <!-- Hidden input (optional) -->

    <input type="hidden" id="scheduled_audit_id"  />
    <input type="hidden" id="questionIdInput"  />
    <input type="hidden" id="templateId"  />
    <input type="hidden" id="nc"  />




    <!-- Description -->
    <label for="description">Description</label>
    <textarea id="description" rows="4" style="width:100%; margin-bottom:10px;"></textarea>

    <!-- File Upload -->
    <label for="fileInput">Upload Image</label>
    <input type="file" id="fileInput" accept="image/*" onchange="previewSeverityImage()" style="margin-bottom:10px;" class="form-control" />

    <!-- Image Preview -->
    <img id="severityPreview" style="display:none; max-width:100%; margin-bottom:10px;" />

    <!-- Save Button -->
    <button onclick="saveNonConformity()" style="padding:8px 16px;" class="btn btn-primary">Save</button>

    <div id="remarksList">

    </div>
</div>




                <script src="assets/js/common/admin.js"></script>
                <script src="assets/js/audit/audit.js"></script>
                <script src="assets/js/audit/template.js"></script>
                <script src="assets/js/common/common.js"></script>
                <script src="assets/js/common/file_upload.js"></script>



                <script src="assets/js/audit/audit_compliance_reports.js"></script>

<script>
    let non_conformities;
    let non_conformities_remarks;

    let audit_plans;
    let scheduled_audits;
    let application_users;
    let departments;
    let template_id;
    let template_questions;
    let answers;
    async function load_func(){
        const urlParams = new URLSearchParams(window.location.search);
        const id = urlParams.get('id');
        console.log("id",id); // "12"
        await fetchNonConformities(id,null);
        await fetchNonConformitiesRemarks(id, null);
        await get_departments();
        await get_application_users();

        await get_audit_plans();

        await get_inspections();
        await get_questions(template_id);
        await get_answers(id);

        await renderComplianceReportsByID(id);
    }
</script>