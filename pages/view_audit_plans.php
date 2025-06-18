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
                                        <div class="row" id="">

                                        </div>
                                        <div class="table-rep-plugin">
                                            <div class="table-responsive mb-0" data-pattern="priority-columns">
                                             
                                                <div id="" class="container-fluid">
                                                    <!-- <div class="row" id="templateContainer">

                                                    </div> -->
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Title</th>
                                                                <th>Type</th>
                                                                <th>Department</th>
                                                                <th>Scope</th>
                                                                <th>Criteria</th>
                                                                <th>Start Date</th>
                                                                <th>End Date</th>
                                                                <th>Duration</th>

                                                                <th>Lead Auditor</th>
                                                                <th>Audit Team</th>
                                                                <th>Created By</th>
                                                                <th>Created At</th>


                                                                <th>Comments</th>
                                                                <th>Action</th>



                                                            </tr>
                                                        </thead>
                                                        <tbody id="auditPlansContainer">

                                                        </tbody>
                                                    </table>

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

<script>
    let audit_plans_list;
    let application_users;
    let audit_types;
    let departments;

    async function load_func()
        {
            await get_departments();
            await get_audit_types();
            await get_application_users();
            await get_audit_plans();
        }

    function findNameById(list, idField, idValue, nameField, defaultValue = "undefined") {
        const match = list.find(item => item[idField] == idValue);
        return match ? match[nameField] : defaultValue;
    }

    function get_user_name(id){
        user = application_users.find( x=> x.user_id == id);
        if(user){
            return user.name;
        }else{
            return "undefined";
        }
    }

    async function get_audit_plans(){
        const response = await fetch("ajax/get_audit_plans.php", {
                    method: "GET",
                    headers: { "Content-Type": "application/json" },
                });
        
            const data = await response.json();
            audit_plans_list = data.data;
            console.log("audit_plans_list:", audit_plans_list);

            console.log("Last Updated:", data);
            await renderAuditPlans();
    
    }



async function renderAuditPlans() {
    // const container = document.getElementById('auditPlansContainer'); // Ensure this element exists
    // container.innerHTML = ''; // Clear any existing content
    let html =``;
    audit_plans_list.forEach(plan => {
        const isLeadAuditor = plan.lead_auditor === current_user_id;
        const isCreator = plan.created_by === current_user_id;

        const auditTeamArray = typeof plan.audit_team === 'string'
        ? plan.audit_team.split(',').map(id => id.trim())
        : [];

        const isInAuditTeam = auditTeamArray.includes(String(current_user_id));

        if (!isLeadAuditor && !isInAuditTeam && !isCreator) {
            console.log(false);
            return; // Skip this iteration
        }

        // const card = document.createElement('div');
        // card.className = 'card p-3 mb-3';

        const isApproved = plan.audit_plan_status === 'APPROVED' || plan.audit_plan_status === 'APPROVED->SCHEDULED';
        const isScheduled =  plan.audit_plan_status === 'APPROVED->SCHEDULED';
    // Determine if the "Create Audit Schedule" link should be disabled
        // It's disabled if not lead auditor OR if the plan is already scheduled
        const disableCreateSchedule = !isLeadAuditor || isScheduled;
        let createScheduleButtonHtml = '';
        if (isLeadAuditor) {
            createScheduleButtonHtml = `
                <br><br>
                <!-- Link to create audit schedule -->
                <a class="btn btn-primary ${isScheduled ? 'disabled' : ''}"
                   href="${!isScheduled ? `create_audit_schedule?id=${plan.audit_id}` : '#'}"
                   ${isScheduled ? 'tabindex="-1" aria-disabled="true"' : ''}>
                    Create Audit Schedule
                </a>
            `;
        }


        const approveButton = isApproved
            ? `<!-- Button for Approved status -->
               <button class="btn btn-primary" disabled>Approved</button>
               ${createScheduleButtonHtml}` // Conditionally include the create schedule button
            : `<!-- Button to approve plan -->
               <button class="btn btn-primary" onClick="approve_audit_plan(${plan.audit_id})" ${!isLeadAuditor ? 'disabled' : ''}>
                   Approve Plan
               </button>`;

lead_auditor_name  = get_user_name(plan.lead_auditor);
let audit_team_names =``;


if(plan.audit_team){
audit_team_array = plan.audit_team.split(",");
audit_team_array.forEach( x=> {
    console.log(x);
    name = get_user_name(x);
    console.log(name);

    audit_team_names += `${name}<br>`;
});
}
const audit_type_name = findNameById(audit_types, "audit_type_id", plan.audit_type, "audit_type_name");
const audit_department_name = findNameById(departments, "department_id", plan.department_name, "department_name");
const created_by_name  = get_user_name(plan.created_by);


    /*    card.innerHTML = `
            <h5>${plan.audit_title}</h5>
            <p><strong>Type:</strong> ${plan.audit_type}</p>
            <p><strong>Scope:</strong> ${plan.audit_scope}</p>
            <p><strong>Criteria:</strong> ${plan.audit_criteria}</p>
            <p><strong>Start:</strong> ${plan.planned_start_date}</p>
            <p><strong>End:</strong> ${plan.planned_end_date}</p>
            <p><strong>Lead Auditor:</strong> ${plan.lead_auditor}</p>
            <p><strong>Team:</strong> ${plan.audit_team}</p>
            <p><strong>Comments:</strong> ${plan.Comments}</p>
            ${approveButton}
        `;  */
html += `
    <tr>
        <td>${plan.audit_title}</td>
        <td>${audit_type_name}</td>
        <td>${audit_department_name}</td>

        <td>${plan.audit_scope}</td>
        <td>${plan.audit_criteria}</td>
        <td>${plan.planned_start_date}</td>
        <td>${plan.planned_end_date}</td>
        <td>${plan.auto_calculated_duration}</td>

        <td>${lead_auditor_name}</td>
        <td>${audit_team_names}</td>
        <td>${created_by_name}</td>
        <td>${plan.row_created_at}</td>

        <td>${plan.Comments}</td>
        <td>${approveButton}</td>
    </tr>
`;

    });
        $("#auditPlansContainer").html(html);

}

    function create_audit_schedule(plan_id){

}
function approve_audit_plan(plan_id) {
    let status = "APPROVED";
    fetch("ajax/update_audit_plan_approval_status.php?id=" + plan_id, {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            status: status
        })
    })
    .then(response => response.json())
    .then(data => {
        console.log("Last Updated:", data);
        location.reload();
    })
    .catch(error => console.error("Error:", error));
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
            audit_team: { multiple: true },
            // audit_lead: { multiple: false },
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
        Comments: $('#Comments').val()
    };

    $.ajax({
        url: 'ajax/post_audit_plan.php',
        type: 'POST',
        data: data,
        success: function(response) {
            alert('Audit plan submitted successfully!');
            console.log(response);
        },
        error: function(xhr, status, error) {
            alert('Submission failed: ' + error);
            console.log(xhr.responseText);
        }
    });
}

async function get_application_users(){
        try {
            const response = await fetch("ajax/get_application_users.php", {
                method: "GET",
                headers: { "Content-Type": "application/json" },
            });

            const data = await response.json();
            application_users = data.data;
            console.log("application_users:", application_users);

            // await renderapplication_users(); // ✅ now correctly awaited
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
            if(audit_types.length > 0 ){
                // await renderaudit_types(); // ✅ now correctly awaited

            }
        } catch (error) {
            console.error("Error:", error);
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
            if(departments.length > 0 ){
                // await renderdepartments(); // ✅ now correctly awaited

            }
        } catch (error) {
            console.error("Error:", error);
        }
    }
</script>
