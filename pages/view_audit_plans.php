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
                                        <div class="row" id="auditPlansContainer">

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

           <script>
            let audit_plans_list;
            function load_func()
                {
                    // get_form_templates();
                    // get_application_users();
                    get_audit_plans();
                }

function get_audit_plans(){
    fetch("ajax/get_audit_plans.php", {
        method: "GET",
        headers: { "Content-Type": "application/json" },
        
    })
    .then(response => response.json())
    .then(data => {
        audit_plans_list = data.data;

        console.log("Last Updated:", data);
        renderAuditPlans();
    })
    .catch(error => console.error("Error:", error));
}

function renderAuditPlans() {
    const container = document.getElementById('auditPlansContainer'); // Ensure this element exists
    container.innerHTML = ''; // Clear any existing content

    audit_plans_list.forEach(plan => {
        const card = document.createElement('div');
        card.className = 'card p-3 mb-3';

        const approveButton = plan.audit_plan_status === 'APPROVED'
            ? `<button class="btn btn-primary" onClick="approve_audit_plan(${plan.audit_id})" disabled>Approved</button> <br><a class="btn btn-primary" href="create_audit_schedule?id=${plan.audit_id}" >Create Audit Schedule</a>`
            : `<button class="btn btn-primary" onClick="approve_audit_plan(${plan.audit_id})">Approve Plan</button>`;

        card.innerHTML = `
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
        `;

        container.appendChild(card);
    });
}

function create_audit_schedule(plan_id){

}
function approve_audit_plan(plan_id){
    fetch("ajax/update_audit_plan_approval_status.php?id="+plan_id,{
        method: "GET",
        headers: { "Content-Type": "application/json" },
        
    })
    .then(response => response.json())
    .then(data => {
        application_users = data.data;

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
</script>
