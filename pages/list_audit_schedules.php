

<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Responsive Tables</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                            <li class="breadcrumb-item active">Responsive Tables</li>
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
                                        <h4 class="card-title">Example</h4>
                                        <p class="card-title-desc">This is an experimental awesome solution for responsive tables with complex data.</p>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-rep-plugin">
                                            <div class="table-responsive mb-0" data-pattern="priority-columns">
                                                <table id="tech-companies-1" class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>SI No</th>
                                                            <th data-priority="1">Display ID</th>
                                                            <th data-priority="3">Title</th>
                                                            <th data-priority="1">Description</th>
                                                            <th data-priority="3">Created By</th>
                                                            <th data-priority="3">Assigned To</th>
                                                            <th data-priority="3">Status</th>


                                                            <th data-priority="3">CreatedAt</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="templateContainer">
                                                          
                                                       
                                                    </tbody>
                                                </table>
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
    let audit_plans;
    async function load_func()
    {
        await get_audit_plans();

        await get_inspections();
        // get_users();


    }
    async function get_audit_plans(){
        console.log("aa");
      

        try {
        const response = await fetch("ajax/get_audit_plans.php", {
            method: "GET",
            headers: { "Content-Type": "application/json" },
        });

        const data = await response.json();
        audit_plans = data.data;
        console.log("Last Updated:", data);

    } catch (error) {
        console.error("Error:", error);
    }
    }

    async function get_inspections() {
console.log(audit_plans);
        console.log("bb");

        $.ajax({
            url: "ajax/get_scheduled_audits.php", // Update URL if needed
            type: "POST", // Changed from GET to POST
            dataType: "json",
            data: {}, // Add any necessary data here
            success: function(response) {
                console.log("Form Templates:", response);

                if (response.success) {
                    renderScheduledAudits(response.data); // Call function to handle UI display
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


function renderScheduledAudits(templates) {
    
    let table = "";
    let ctr =0 ;

    templates.forEach(template => {
        try{

        let audit_plan = audit_plans.find(auditplan => template.audit_id === auditplan.audit_id);
        console.log(audit_plan);
        console.log(audit_plan.lead_auditor);
        ctr++;
        let view_answer_button = `<td></td>`;
        if(template.scheduled_audit_status === "submitted"){

        
        view_answer_button = 
        `
            <td><a href="view_answers?id=${template.scheduled_id}">View Answers </a></td>
        
        `;
        }
        table += `

        
        <tr>
            <td> <a href="view_schedule?id=${template.scheduled_id}">${ctr} </a></td>
            <td><a href="view_schedule?id=${template.scheduled_id}"> ${template.scheduled_id} </a></td>
            <td><a href="view_schedule?id=${template.scheduled_id}">${audit_plan.audit_title} </a></td>
            <td><a href="view_schedule?id=${template.scheduled_id}">${template.description ? '' : 'Default Value'} </a></td>
            <td><a href="view_schedule?id=${template.scheduled_id}">${template.created_by} </a></td>
            <td><a href="view_schedule?id=${template.scheduled_id}">${audit_plan.lead_auditor}</a></td>
            <td><a href="view_schedule?id=${template.scheduled_id}">${template.scheduled_audit_status}</a></td>


            <td><a href="view_schedule?id=${template.scheduled_id}">${template.row_created_at} </a></td>
    ${view_answer_button}
        </tr> 
                  `;
        }
        catch( error){

        }
    });


    $("#templateContainer").html(table);
}


           </script>