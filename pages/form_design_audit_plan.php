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
                                    <h4 class="mb-sm-0 font-size-18">Create Audit Plan</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Audit</a></li>
                                            <li class="breadcrumb-item active">Audit plan</li>
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
                                        <h4 class="card-title">Create Audit Plan</h4>
                                        <!-- <p class="card-title-desc">This is an experimental awesome solution for responsive tables with complex data.</p> -->
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6 p-3">
                                                <label for="">Audit Title</label>
                                                <input type="text" class="form-control" name="audit_title" id="audit_title" placeholder="Audit Title">

                                            </div>
                                            <div class="col-6 p-3">
                                                <label for="">Audit Type</label>
                                                <select name="audit_type" id="audit_type" class="form-control">
                                                   

                                                </select>

                                            </div><div class="col-6 p-3">
                                                <label for="">Department Name</label>
                                                <select class="form-control" name="department_name" id="department_name" >
                                                    <option value="">Select department</option>
                                                </select>
                                                

                                            </div>
                                            <div class="col-6 p-3">
                                                <label for="">Department Head / Contact Person</label>
                                                <select class="form-control" name="department_poc" id="department_poc" >
                                                    <option value="">Select contact person</option>
                                                </select>
                                            </div>
                                            <div class="col-6 p-3">
                                                <label for="">Audit Scope</label>
                                                <input type="text" class="form-control" name="audit_scope" id="audit_scope" placeholder="Audit Scope">

                                            </div><div class="col-6 p-3">
                                                <label for="">Audit Criteria</label>
                                                <input type="text" class="form-control" name="audit_criteria" id="audit_criteria" placeholder="Audit Criteria">

                                            </div><div class="col-6 p-3">
                                                <label for="">Planned Start Date</label>
                                                <input type="date" class="form-control" name="planned_start_date" id="planned_start_date" >

                                            </div><div class="col-6 p-3">
                                                <label for="">Planned End Date</label>
                                                <input type="date" class="form-control" name="planned_end_date" id="planned_end_date" >

                                            </div>
                                            <div class="col-6 p-3">
                                                <label for="">Duration (days)</label>
                                                <input type="text" class="form-control" name="duration" id="duration" readonly>
                                            </div>
                                            <div class="col-6 p-3">
                                                <label for="">Lead Auditor</label>
                                                <select name="lead_auditor" id="lead_auditor" class="form-control">
                                                    

                                                </select>

                                            </div>
                                            <div class="col-6 p-3">
                                                <label for="">Audit Team (Multi Select)</label>
                                                <select name="audit_team[]" id="audit_team" class="form-control" multiple>
                                                    
                                                </select>

                                            </div>

                                            <div class="col-6 p-3">
                                                <label for="">Comments</label>
                                                <input type="text" class="form-control" name="audit_plan_comments" id="audit_plan_comments" placeholder="Comments">

                                            </div>

                                            <div>
                                                <center>
                                                    <button class="btn btn-success" onclick="submitAuditPlan()">
                                                        Create Plan
                                                    </button>
                                                </center>
                                            </div>
                                            
                                        </div>
                                        <div class="table-rep-plugin">
                                            <div class="table-responsive mb-0" data-pattern="priority-columns">
                                             
                                                <div id="" class="container-fluid">
                                                    <div class="row" id="templateContainer">

                                                    </div>


                                                </div>
                                            </div>
        
                                        </div>
        
                                    </div>
                                </div>
                                <!-- end card -->
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
        <script src="assets/js/common/admin.js"></script>   
<script>
    const startInput = document.getElementById("planned_start_date");
    const endInput = document.getElementById("planned_end_date");
    const durationInput = document.getElementById("duration");

    function calculateDuration() {
        const startDate = new Date(startInput.value);
        const endDate = new Date(endInput.value);

        if (startInput.value && endInput.value) {
            const timeDiff = endDate - startDate;
            const daysDiff = Math.ceil(timeDiff / (1000 * 60 * 60 * 24));
            durationInput.value = daysDiff >= 0 ? daysDiff : "Invalid date range";
        } else {
            durationInput.value = "";
        }
    }

    startInput.addEventListener("change", calculateDuration);
    endInput.addEventListener("change", calculateDuration);
</script>

           <script>
            let departments;
            let audit_types;
            async function load_func()
                {
                    // get_form_templates();
                    await get_application_users();
                    await get_departments();
                    await get_audit_types();
                    await renderApplicationUsers();
                    await renderdepartments(); // ✅ now correctly awaited

                }  

               

    async function renderApplicationUsers() {
        const selectConfigs = {
            audit_team: { multiple: true },
            lead_auditor: { multiple: false },
            // audit_manager: { multiple: false }
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


function displayTemplates(templates) {
    let table = "";
    let ctr =0 ;

    templates.forEach(template => {
        ctr++;
        if(template.title ==""){
            return;
        }
      /*  table += `
        <tr>
            <td> <a href="view_template?id=${template.id}">${ctr} </a></td>
            <td><a href="view_template?id=${template.id}"> ${template.id} </a></td>
            <td><a href="view_template?id=${template.id}">${template.title} </a></td>
            <td><a href="view_template?id=${template.id}">${template.description ? '' : 'Default Value'} </a></td>
            <td><a href="view_template?id=${template.id}">${template.created_by ? '' : 'Default Value'} </a></td>
            <td><a href="view_template?id=${template.id}">${template.created_at} </a></td>
        </tr> 
                  `; */
                  table +=`<div class="col-12">
                  <div class="cards">
                  <h4 class="mb-3">
                  ${template.title}
                  </h4>
                  <p>
                  ${template.description}
                  </p>
                  <div class="row">
                    <div class="col-8">
                        <p>Created by : </p>
                        <p> Created On : ${template.created_at}</p>
                    </div>
                    <div class="col-4">

                        <a href="view_template?id=${template.id}" class="btn btn-secondary mb-3">Edit</a> <br>
                        <a href="view_schedule_inspection?id=${template.id}"  class="btn btn-primary">Schedule</a> <br>
                    </div>
                  </div>
                 

                  </div></div>`;


    });


    $("#templateContainer").html(table);
}


           </script>

<script>
function submitAuditPlan() {
    const data = {
        audit_id: $('#audit_id').val(),
        audit_title: $('#audit_title').val(),
        audit_type: $('#audit_type').val(),
        audit_scope: $('#audit_scope').val(),
        audit_criteria: $('#audit_criteria').val(),
        planned_start_date: $('#planned_start_date').val(),
        planned_end_date: $('#planned_end_date').val(),
        auto_calculated_duration: $('#auto_calculated_duration').val(),
        lead_auditor: $('#lead_auditor').val(),
        audit_team: $('#audit_team').val(),
        Comments: $('#Comments').val(),
        department_name : $('#department_name').val(),
        department_poc : $('#department_poc').val(),
        auto_calculated_duration : $('#duration').val()

    };

    $.ajax({
        url: 'ajax/post_audit_plan.php',
        type: 'POST',
        data: JSON.stringify(data),
        success: function(response) {
            console.log(response);
            location.href = 'view_audit_plans';
        },
        error: function(xhr, status, error) {
            alert('Submission failed: ' + error);
            console.log(xhr.responseText);
        }
    });
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
            if(audit_types.length > 0 ){
                await renderaudit_types(); // ✅ now correctly awaited

            }
        } catch (error) {
            console.error("Error:", error);
        }
    }
    async function renderaudit_types(){
        let ctr = 0;
        let row = `<option>Select Audit Type</option>`;
        audit_types.forEach(element => {
            ctr++;
             row += `
                <option value="${element.audit_type_id}">
        ${element.audit_type_name}
                </option>
            `;

        });
            $("#audit_type").html('');

            $("#audit_type").append(row);
        
    }
    
$('#department_name').on('change', function() {
    const department = $('#department_name').val();
    const department_users = application_users.filter(au => au.department == department);
    
    let row = `<option value="">Select Department POC</option>`;
    department_users.forEach(element => {
        row += `
            <option value="${element.user_id}">
                ${element.name}
            </option>
        `;
    });

    $("#department_poc").html(row); // Replace content directly
});

</script>
