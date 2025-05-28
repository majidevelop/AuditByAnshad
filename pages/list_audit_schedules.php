

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
    let scheduled_audits;

    async function load_func()
    {
        await get_audit_plans();

        await get_inspections();
        // get_users();


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

    async function get_inspections() {
    try {
        const response = await fetch("ajax/get_scheduled_audits.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({}) // Add necessary POST data here
        });

        const data = await response.json();
        console.log("Form Templates:", data);

        if (data.success) {
            scheduled_audits = data.data;
            await renderScheduledAudits(data.data); // Call function to handle UI display
        } else {
            alert("Error: " + data.error);
        }
    } catch (error) {
        console.error("Fetch Error:", error);
        alert("Failed to load templates. Check console for details.");
    }
}


async function getScheduledAuditStatus(scheduled_id) {
    try {
        const response = await fetch(`ajax/get_scheduled_audit_status.php?id=${scheduled_id}`);
        const result = await response.json();

        if (result.success) {
            // console.log("Scheduled Audit Status:", result.schedule_audit_status_log.status); // assuming result.data has a 'status' field
            return result.schedule_audit_status_log.status;
        } else {
            console.warn("Error fetching status:", result.error);
            return null;
        }
    } catch (error) {
        console.error("Fetch Error:", error);
        return null;
    }
}

async function renderScheduledAudits(templates) {
    
    let table = "";
    let ctr =0 ;

    for (const template of templates) {
        try{

            const status = await getScheduledAuditStatus(template.scheduled_id);
            console.log(status);
            let audit_plan = audit_plans.find(auditplan => template.audit_id === auditplan.audit_id);
            console.log(audit_plan);
            console.log(audit_plan.lead_auditor);
            console.log(audit_plan.audit_plan_status);

        ctr++;
        

        const isLeadAuditor = audit_plan.lead_auditor === current_user_id;
        const isApproved = status === 'SUBMITTED FOR REVIEW';

        let approveButton;

        if (isLeadAuditor) {
            const url = isApproved 
                ? `view_answers?id=${template.scheduled_id}&audit_lead=true` 
                : `view_schedule?id=${template.scheduled_id}`;
            const linkText = isApproved ? 'View Answers' : 'View Schedule';
            approveButton = `
                <td>
                    <a href="${url}">${linkText}</a>
                </td>
            `;
        } else {
            const url = isApproved 
                ? `view_answers?id=${template.scheduled_id}` 
                : `view_schedule?id=${template.scheduled_id}`;
            const linkText = isApproved ? 'View Answers' : 'View Schedule';
            approveButton = `
                <td>
                    <a href="${url}">${linkText}</a>
                </td>
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
            <td><a href="view_schedule?id=${template.scheduled_id}">${status}</a></td>


            <td><a href="view_schedule?id=${template.scheduled_id}">${template.row_created_at} 
            
            </a></td>
    ${approveButton}
        </tr> 
                  `;
        }
        catch( error){

        }
    }

    $("#templateContainer").html(table);
}


           </script>