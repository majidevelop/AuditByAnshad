
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
                                    <h4 class="mb-sm-0 font-size-18">Create Template</h4>

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
                                            <li class="breadcrumb-item active">Create Template</li>
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
                                                <div class="col-6 p-3">
                                                    <label for="" class="">Audit Manager</label>
                                                        <select name="audit_manager" id="audit_manager" class="form-select field-type">
                                                            <option value="">Select </option>
                                                        </select>
                                                        
                                                </div>
                                                <div class="col-6 p-3">
                                                <label for="" class="">Audit Date</label>
                                                <input type="date" class="form-control" name="audit_date" id="audit_date">

                                                    

                                                </div>
                                                <div class="col-6 p-3">
                                                        <label for="select_headers">Select Checklist</label>
                                                        <select name="select_headers" id="select_headers"  class="form-control form-input">
                                                            <option value=""><p>dfdffddf <b>ewe</b></p></option>
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
    document.getElementById("saveBtn").addEventListener("click", function () {
        const Audit_title = document.getElementById('Audit_title').value;
        const Audit_desc = document.getElementById('Audit_desc').value;

        // Get selected values
        const assignedTo = Array.from(document.getElementById("assigned_to").selectedOptions).map(option => option.value);
        const auditLead = document.getElementById("audit_lead").value;
        const auditDate = document.getElementById("audit_date").value;

        const auditManager = document.getElementById("audit_manager").value;

        const site = document.getElementById("sites").value;

        const asset = document.getElementById("assets").value;

        const auditee = document.getElementById("auditee").value;

        const report_template = document.getElementById("select_headers").value;

        const templateId = new URLSearchParams(window.location.search).get("id");

        // Build payload
        const payload = {
            Audit_title:Audit_title,
            Audit_desc:Audit_desc,
            assigned_to: assignedTo,
            audit_lead: auditLead,
            audit_manager: auditManager,
            templateId: templateId,
            auditDate:auditDate,
            site:site,
            asset:asset,
            auditee:auditee,
            report_template: report_template
        };
        console.log(payload);
        // Send AJAX POST request
        fetch("ajax/post_schedule_Audit.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json" // Tell server it's JSON
            },
            body: JSON.stringify(payload)
        })
        .then(response => response.json())
        .then(data => {
            console.log("Success:", data);
            alert(data.message);
        })
        .catch(error => {
            console.error("Error:", error);
            alert("Failed to save!");
        });
    });
</script>

<script>
    let plan_id = null;
    let application_users = [];
    let footers = [];
    let headers = [];
    plan_id = new URLSearchParams(window.location.search).get("id");

    function load_func(){
        
        // saveTemplate();
        get_application_users();
        // get_report_covers();
        get_audit_plan(plan_id);

        // getFooters();
        // getHeaders();
        // getCovers();
    }
    function get_audit_plan(id){
        $.ajax({
            url:"ajax/get_audit_plan_by_id.php?id="+id,
            type:"GET",
            success:function(response){
                console.log(response);
                renderAuditPlan(response.data[0]);

            },
            error:function(xhr, status, error){
                console.log(status);
                console.log(error);

            }
        });


    }
    function renderAuditPlan(plan){
        $("#Audit_title").val(plan.audit_title);
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


    function get_application_users(){
        fetch("ajax/get_application_users.php", {
        method: "GET",
        headers: { "Content-Type": "application/json" },
       
    })
    .then(response => response.json())
    .then(data => {
        application_users = data.data;

        console.log("Last Updated:", data);
        renderApplicationUsers();
    })
    .catch(error => console.error("Error:", error));
    }

    function renderApplicationUsers() {
        const selectConfigs = {
            assigned_to: { multiple: true },
            audit_lead: { multiple: false },
            audit_manager: { multiple: false }
        };

        Object.entries(selectConfigs).forEach(([id, config]) => {
            const select = document.getElementById(id);
            select.innerHTML = ""; // clear existing options

            if (!config.multiple) {
                const defaultOption = document.createElement("option");
                defaultOption.value = "";
                defaultOption.textContent = "-- Select User --";
                select.appendChild(defaultOption);
            }

            application_users.forEach(user => {
                const option = document.createElement("option");
                option.value = user.user_id;
                option.textContent = user.name;
                select.appendChild(option);
            });

            new Choices(select, {
                removeItemButton: config.multiple,
                placeholderValue: config.multiple ? "Select users..." : "Select user",
                shouldSort: false
            });
        });
    }
  


</script>

               

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
