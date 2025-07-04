
<style>
    .flex{
        display: flex;
    }
    .items-center{
        align-items: center;
    }
    .w-100{
        width: 100%;
    }
    .card-body{
        padding: 1rem 0rem;
    }
</style>
<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-9">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Create Audit Plan</h4>

                                    <!-- <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                            <li class="breadcrumb-item active">Create Template</li>
                                        </ol>
                                    </div> -->

                                </div>
                            </div>
                            <div class="col-3">
                                <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                            <li class="breadcrumb-item active">Create Audit Plan</li>
                                        </ol>
                                        <div id="lastUpdated" class="m-0">

                                        </div>
                                    </div>
                                
                            </div>
                        </div>
                        <!-- end page title -->
                         <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                
                                       
                                    </div>
                                    <div id="questionsContainer">

                                        <div class="card-body question-card">
                                            <div class="row p-3">
                                                <div class="col-12">
                                                    <label for="example-text-input" class="form-label">Audit Title</label>
                                                    <input type="text" class="form-input form-control" placeholder="Audit Title" name="audit_title" id="audit_title">

                                                </div>
                                                <div class="col-12 mt-3">
                                                    <label for="example-text-input" class="form-label">Audit Type</label>
                                                    <input type="text" class="form-input form-control" placeholder="Audit Type" name="audit_type" id="audit_type">

                                                </div>
<!--                                                 
                                                <div class="col-6 p-3">
                                                    <label for="example-text-input" class="form-label">Site</label>

                                                    <select class="form-select sites mb-3" id="sites" name="sites">
                                                        <option value="">Select</option>
                                                        <option value="1">Site A</option>
                                                        <option value="2">Site B</option>
                                                        <option value="3">Site C</option>
                                                    </select>

                                                </div>
                                                <div class="col-6 p-3">
                                                                                                            
                                                    <label for="example-text-input" class="form-label">Asset</label>

                                                    <select class="form-select assets mb-3" id="assets" name="assets">
                                                        <option value="">Select</option>
                                                        <option value="1">Asset 1</option>
                                                        <option value="2">Asset 2</option>
                                                        <option value="3">Asset 3</option>

                                                    </select>
                                                </div>
                                                <div class="col-6 p-3">
                                                    <label for="" class="">Auditee</label>
                                                    <select name="auditee" id="auditee" class="form-select field-type">
                                                        <option value="">Select </option>
                                                        <option value="1">Site A</option>
                                                        <option value="2">Site B</option>
                                                        <option value="3">Site C</option>

                                                    </select>

                                                </div>
                                                <div class="col-6 p-3">
                                                    <label for="" class="">Assigned To</label>
                                                    <select name="assigned_to" id="assigned_to" class="form-select field-type" multiple>
                                                    <option value="">Select </option>
                                                    </select>
                                                    
                                                </div>
                                             -->
                                                <div class="col-6 p-3">
                                                    <label for="department_name">Department Name</label>
                                                    <input type="text" name="department_name"  class="form-input form-control" id="department_name" disabled placeholder="Department Name">
                                                </div>
                                                <div class="col-6 p-3">
                                                    <label for="audit_objective">Objective</label>
                                                    <input type="text" name="audit_objective"  class="form-input form-control" id="audit_objective" disabled placeholder="Objective">
                                                </div>
                                                <div class="col-6 p-3">
                                                    <label for="audit_scope">Scope</label>
                                                    <input type="text" name="audit_scope"  class="form-input form-control" id="audit_scope" disabled placeholder="Scope">
                                                </div>
                                                <div class="col-6 p-3">
                                                    <label for="audit_criteria">Audit Criteria</label>
                                                    <input type="text" name="audit_criteria"  class="form-input form-control" id="audit_criteria" disabled placeholder="Audit Criteria">
                                                </div>

                                                <div class="col-6 p-3">
                                                    <label for="" class="">Audit Lead</label>
                                                    <select name="audit_lead" id="audit_lead" class="form-select field-type">
                                                        <option value="">Select </option>
                                                    </select>
                                                    
                                                </div>
                                                <!-- <div class="col-6 p-3">
                                                    <label for="" class="">Audit Team</label>
                                                        <select name="audit_team" id="audit_team" class="form-select field-type">
                                                            <option value="">Select </option>
                                                        </select>
                                                        
                                                </div> -->
                                                <div class="col-6 p-3">
                                                    <label for="" class="">Planned Start Date</label>
                                                    <input type="date" class="form-control" name="planned_start_date" id="planned_start_date" readonly>
                                                </div>

                                                <div class="col-6 p-3">
                                                    <label for="" class="">Planned End Date</label>
                                                    <input type="date" class="form-control" name="planned_end_date" id="planned_end_date" readonly>
                                                </div>
                                                
                                                <div class="col-6 p-3">
                                                    <label for="" class="">Planned Duration</label>
                                                    <input type="number" class="form-control" name="planned_duration" id="planned_duration" readonly>
                                                </div>
                                               <!-- Actual DateTime -->
<div class="col-6 p-3">
    <label>Actual Start Date & Time</label>
    <input type="datetime-local" class="form-control" id="actual_start_date">
</div>

<div class="col-6 p-3">
    <label>Actual End Date & Time</label>
    <input type="datetime-local" class="form-control" id="actual_end_date">
</div>

<div class="col-6 p-3">
    <label>Actual Duration (in hours)</label>
    <input type="text" class="form-control" id="actual_duration" readonly>
</div>

                                                
                                                <div class="col-6 p-3">
                                                        <label for="select_checklist">Select Checklist</label>
                                                        <select name="select_checklist" id="select_checklist"  class="form-control form-input">
                                                        </select>
                                                </div>

                                                <div class="col-6 p-3">
                                                        <label for="select_checklist">Select Process</label>
                                                        <select name="select_process" id="select_process"  class="form-control form-input">
                                                            <option value="1"><p>Process <b>1</b></p></option>
                                                            <option value="2"><p>Process <b>2</b></p></option>
                                                            <option value="3"><p>Process <b>3</b></p></option>

                                                        </select>
                                                </div>
                                                   
                                            </div>
                                        
                                        </div>
                                    </div>

                                        
                                    </div>
                               
                                    
                                    <div class="card-footer">
                                      
                                    </div>
                                                                
                                    <div class="card-footer">
                                        <center>
                                            <button class="btn btn-success" id="saveBtn">Schedule</button>

                                        </center>
                                    </div>
                                    

                                </div>

                            </div>

                         </div>
                         <!-- jQuery (required by Select2) -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

<!-- Select2 CSS & JS -->
<!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
<script>
function calculateDateTimeDuration(startId, endId, durationId) {
    const startInput = document.getElementById(startId);
    const endInput = document.getElementById(endId);
    const durationInput = document.getElementById(durationId);

    function updateDuration() {
        if (startInput.value && endInput.value) {
            const start = new Date(startInput.value);
            const end = new Date(endInput.value);

            const diffMs = end - start;

            if (diffMs >= 0) {
                 const diffHours = Math.floor(diffMs / (1000 * 60 * 60));
                const days = Math.floor(diffHours / 24);
                const hours = diffHours % 24;

                durationInput.value = `${days}d ${hours}h`;
            } else {
                durationInput.value = "Invalid";
            }
        } else {
            durationInput.value = "";
        }
    }

    startInput.addEventListener("change", updateDuration);
    endInput.addEventListener("change", updateDuration);
}

document.addEventListener("DOMContentLoaded", function () {
    calculateDateTimeDuration("planned_start_date", "planned_end_date", "duration");
    calculateDateTimeDuration("actual_start_date", "actual_end_date", "actual_duration");
});
</script>

<script>


    function get_template_details(templateId) {
    $.ajax({
        url: `./pages/view_template_by_id.php?id=${templateId}`,
        type: "GET",
        dataType: "json",
        success: function(response) {
            if (response.success) {
                console.log("Template Details:", response);
                displayTemplate(response.template, response.questions, response.options);
            } else {
                alert("Error: " + response.error);
            }
        },
        error: function(xhr, status, error) {
            console.error("AJAX Error:", error);
            alert("Failed to load template. Check console for details.");
        }
    });
}
    document.getElementById("saveBtn").addEventListener("click", async function () {
    // Build payload
    const payload = {
        audit_id: new URLSearchParams(window.location.search).get("id"),
        checklist_id: $("#select_checklist").val(),
        planned_start_date: $("#planned_start_date").val(),
        planned_end_date: $("#planned_end_date").val(),
        
        actual_start_date: $("#actual_start_date").val(),
        actual_end_date: $("#actual_end_date").val(),
        actual_duration: $("#actual_duration").val(),
        audit_process: $("#select_process").val()
    };
    console.log(payload);
    
    try {
        // Send AJAX POST request
        const response = await fetch("ajax/post_schedule_inspection.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json" // Tell server it's JSON
            },
            body: JSON.stringify(payload)
        });
        const data = await response.json();
        console.log("Success:", data);
        
        // Await the async approve_audit_plan function
        await approve_audit_plan(payload.audit_id);
        
        alert(data.message);
        location.href = 'list_audit_schedules';
    } catch (error) {
        console.error("Error:", error);
        alert("Failed to save!");
    }
});



</script>

<script>
    let plan_id = null;
    let application_users = [];
    let footers = [];
    let headers = [];
    let audit_types = [];
    let departments = [];
    let audit_plan;
    plan_id = new URLSearchParams(window.location.search).get("id");

    async function load_func(){
        
        // saveTemplate();
        // get_report_covers();
        await get_departments();
        await get_audit_types();
        await get_application_users();
        await get_audit_plan(plan_id);
        await get_form_templates();
       
    }
    async function get_audit_plan(id){
         const response = await fetch("ajax/get_audit_plan_by_id.php?id="+id, {
            method: "GET",
            headers: { "Content-Type": "application/json" },
        });

        const data = await response.json();
        audit_plan = data.data[0];
        console.log("audit_plan : ", audit_plan);
        renderAuditPlan(audit_plan);
        if(audit_plan.audit_plan_status === "APPROVED->SCHEDULED"){
            document.getElementById("saveBtn").disabled = true;

        }

           
    }

     async function get_departments(){
        try {
            const response = await fetch("ajax/get_departments.php", {
                method: "GET",
                headers: { "Content-Type": "application/json" },
            });

            const data = await response.json();
            departments = data.data;
            console.log("departments:", departments);
            
        } catch (error) {
            console.error("Error:", error);
        }
    }

    async function get_audit_types(){
        try {
            const response = await fetch("ajax/get_audit_types.php", {
                method: "GET",
                headers: { "Content-Type": "application/json" },
            });

            const data = await response.json();
            audit_types = data.data;
            console.log("audit_types:", audit_types);
            
        } catch (error) {
            console.error("Error:", error);
        }
    }


    function renderAuditPlan(plan){
        console.log(plan);
        $("#audit_title").val(plan.audit_title);
        let audit_type_name;
        const audit_type = audit_types.find( x=> x.audit_type_id === plan.audit_type);
        audit_type_name = audit_type.audit_type_name;

        let department_name;
        const department = departments.find( x=> x.department_id == plan.department_name);
        department_name = department.department_name; 

        $("#audit_type").val(audit_type_name);
        $("#department_name").val(department_name);
        $("#audit_scope").val(plan.audit_scope);
        $("#audit_criteria").val(plan.audit_criteria);
        $("#audit_lead").val(plan.lead_auditor);
        console.log(plan.lead_auditor);
        // document.getElementById("audit_lead").disabled=true;
// choiceInstances['audit_lead'].setChoiceByValue(plan.lead_auditor);
        $("#planned_start_date").val(plan.planned_start_date);
        $("#planned_end_date").val(plan.planned_end_date);
        $("#planned_duration").val(plan.auto_calculated_duration);



        $("#audit_team").val(plan.audit_team);
        $("#audit_comments").val(plan.Comments);

    }


async function get_application_users() {
    try {
        const response = await fetch("ajax/get_application_users.php", {
            method: "GET",
            headers: { "Content-Type": "application/json" },
        });

        const data = await response.json();
        application_users = data.data;
        console.log("application_users : ", data);

         renderApplicationUsers(); // ✅ now correctly awaited
    } catch (error) {
        console.error("Error:", error);
    }
}

     function renderApplicationUsers() {

        const selectConfigs = {
            assigned_to: { multiple: true },
            audit_lead: { multiple: false },
            audit_manager: { multiple: false }
        };
        const choiceInstances = {};

        Object.entries(selectConfigs).forEach(([id, config]) => {
            const select = document.getElementById(id);
            // console.log(select);
            if(select== null){
                return;
            }
            select.innerHTML = ""; // clear existing options

            if (!config.multiple) {
                const defaultOption = document.createElement("option");
                defaultOption.value = 0;
                defaultOption.textContent = "-- Select User --";
                select.appendChild(defaultOption);
            }

            application_users.forEach(user => {
                const option = document.createElement("option");
                option.value = user.user_id;
                option.textContent = user.name;
                select.appendChild(option);
            });

        });
    }
  
    function get_form_templates() {
                    $.ajax({
            url: "ajax/get_form_templates.php", // Update URL if needed
            type: "POST", // Changed from GET to POST
            dataType: "json",
            data: {}, // Add any necessary data here
            success: function(response) {
                console.log("Form Templates:", response);

                if (response.success) {
                    displayTemplates(response.data); // Call function to handle UI display
                } else {
                    alert("Error: " + response.error);
                }
            },
            error: function(xhr, status, error) {
                console.log("Request URL:", this.url); // Print the request URL
                console.log("Status:", status);
                console.log("Error:", error);
                console.error("AJAX Error:", error, status);
                alert("Failed to load templates. Check console for details.");
            }
        });


}
    
    function displayTemplates(checklists){
            const select = document.getElementById("select_checklist");
        
            checklists.forEach(checklist => {
                const option = document.createElement("option");
                option.value = checklist.id;
                option.textContent = checklist.title;
                select.appendChild(option);
            });


    }    
    
    function get_report_covers(){
        $.ajax({
            url: "ajax/get_master_layouts.php", // Update URL if needed
            type: "POST", // Changed from GET to POST
            dataType: "json",
            data: {}, // Add any necessary data here
            success: function(response) {
                console.log("Form Templates:", response);

                if (response.success) {
                    //  displayTemplates(response.data); // Call function to handle UI display
                    const select = document.getElementById("select_headers");
                    response.data.forEach( footer => {
            if(footer.title != '' || footer.title != null){

                const defaultOption = document.createElement("option");
                defaultOption.value =  footer.id;
                defaultOption.textContent = footer.title;
                select.appendChild(defaultOption);
            }
        });
                } else {
                    alert("Error: " + response.error);
                }
            },
            error: function(xhr, status, error) {
                console.log("Request URL:", this.url); // Print the request URL
                console.log("Status:", status);
                console.log("Error:", error);
                console.error("AJAX Error:", error, status);
                alert("Failed to load templates. Check console for details.");
            }
        });
    }
    
    function getFooters(){
        fetch("ajax/get_footers.php", {
        method: "GET"
       
    })
    .then(response => response.json())
    .then(data => {
        footers = data.data;
        console.log(footers);

        renderFooters();
    })
    .catch(error => console.error("Error:", error));
    }

    function getHeaders(){
        fetch("ajax/get_headers.php", {
        method: "GET"
       
    })
    .then(response => response.json())
    .then(data => {
        headers = data.data;
        console.log(headers);

        renderHeaders();
    })
    .catch(error => console.error("Error:", error));
    }

    function renderFooters(){
        const select = document.getElementById("select_footers");
        footers.forEach( footer => {
            if(footer.footer_name != ''){

                const defaultOption = document.createElement("option");
                defaultOption.value =  footer.id;
                defaultOption.textContent = footer.footer_name;
                select.appendChild(defaultOption);
            }
        });

    }

    function renderHeaders(){
        const select = document.getElementById("select_headers");
        headers.forEach( footer => {
            if(footer.header_name != ''){

                const defaultOption = document.createElement("option");
                defaultOption.value =  footer.id;
                defaultOption.textContent = footer.header_name;
                select.appendChild(defaultOption);
            }
        });

    }


async function approve_audit_plan(plan_id) {
    let status = "APPROVED->SCHEDULED";
    try {
        const response = await fetch("ajax/update_audit_plan_approval_status.php?id=" + plan_id, {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                status: status
            })
        });
        const data = await response.json();
        console.log("Last Updated:", data);
    } catch (error) {
        console.error("Error:", error);
    }
}


</script>

               

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
