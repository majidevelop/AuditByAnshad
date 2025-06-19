

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
                                                            <th data-priority="3">Auditee Department</th>
                                                            <th data-priority="3">Auditee</th>

                                                            <th data-priority="3">Start Date</th>
                                                            <th data-priority="3">End Date</th>
                                                            <th data-priority="3">Duration</th>

                                                            <th data-priority="3">Status</th>
                                                            <th data-priority="3">CreatedAt</th>
                                                            <th>Action</th>
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
<script src="assets/js/common/admin.js"></script>
                <script src="assets/js/audit/audit.js"></script>

<script>
    let audit_plans;
    let scheduled_audits;
    let application_users;
    let departments;
    async function load_func()
    {
        await get_inspections();

        await get_departments();
        await get_application_users();

        await get_audit_plans();

        await renderScheduledAudits(scheduled_audits); // Call function to handle UI display

        // get_users();


    }
    






async function renderScheduledAudits(audits) {
    
    let table = "";
    let ctr =0 ;

    for (const template of audits) {
        try{

            const status = await getScheduledAuditStatus(template.scheduled_id);
            console.log("status " + status + " - " + template.scheduled_id);
            let audit_plan = audit_plans.find(auditplan => template.audit_id === auditplan.audit_id);
           /* console.log(audit_plan);
            console.log(audit_plan.lead_auditor);
            console.log(audit_plan.audit_plan_status);
            console.log("template.created_by : "+audit_plan.created_by);*/
            const isLeadAuditor = audit_plan.lead_auditor === current_user_id;
            const isCreator = audit_plan.created_by === current_user_id;

            const auditTeamArray = typeof audit_plan.audit_team === 'string'
            ? audit_plan.audit_team.split(',').map(id => id.trim())
            : [];

            const isInAuditTeam = auditTeamArray.includes(String(current_user_id));

            if (!isLeadAuditor && !isInAuditTeam && !isCreator) {
                console.log(false);
                continue; // Skip this iteration
            }

        ctr++;
        const created_by_name = application_users.find(user => user.user_id === audit_plan.created_by).name;
        // console.log("created_by" + created_by_name);
        const lead_auditor_name = application_users.find(user => user.user_id === audit_plan.lead_auditor).name;

        const isApproved = status === 'SUBMITTED' || status === 'APPROVED' || status === 'POC APPROVED' ;
        let approveButton;
        const linkClass = isApproved ? 'btn btn-primary' : 'btn btn-secondary';

        if (isLeadAuditor) {
            const url = isApproved 
                ? `view_answers?id=${template.scheduled_id}&audit_lead=true` 
                : `view_schedule?id=${template.scheduled_id}`;
            const linkText = isApproved ? 'View Answers' : 'View Schedule';

            approveButton = `
                <td>
                    <a class="${linkClass}" href="${url}">${linkText}</a>
                </td>
            `;
        } else {
            const url = isApproved 
                ? `view_answers?id=${template.scheduled_id}` 
                : `view_schedule?id=${template.scheduled_id}`;
            const linkText = isApproved ? 'View Answers' : 'View Schedule';
            approveButton = `
                <td>
                    <a class="${linkClass}" href="${url}">${linkText}</a>
                </td>
            `;
        }
        let department_name = 'udefined';
        let department_poc_name = 'udefined';

        const department = departments.find(d => d.department_id == audit_plan.department_name);
        if(department){

            department_name = department.department_name;
        }
        const department_poc = application_users.find(user => user.user_id == audit_plan.department_poc);
        if(department_poc){
            department_poc_name = department_poc.name;
        }
        table += `

        
        <tr>
            <td> <a class="btn" href="view_schedule?id=${template.scheduled_id}">${ctr} </a></td>
            <td><a class="btn" href="view_schedule?id=${template.scheduled_id}"> ${template.scheduled_id} </a></td>
            <td><a class="btn" href="view_schedule?id=${template.scheduled_id}">${audit_plan.audit_title} </a></td>
            <td><a class="btn" href="view_schedule?id=${template.scheduled_id}">${template.description ? '' : 'Default Value'} </a></td>
            <td><a  class="btn" href="view_schedule?id=${template.scheduled_id}">${created_by_name} </a></td>
            <td><a class="btn" href="view_schedule?id=${template.scheduled_id}">${lead_auditor_name}</a></td>
            <td><a class="btn" href="view_schedule?id=${template.scheduled_id}">${department_name ? department_name : 'undefined'}</a></td>
            <td><a class="btn" href="view_schedule?id=${template.scheduled_id}">${department_poc_name ? department_poc_name : 'undefined'}</a></td>

            <td><a class="btn" href="view_schedule?id=${template.scheduled_id}">${template.actual_start_date ? template.actual_start_date : 'undefined'}</a></td>
            <td><a class="btn" href="view_schedule?id=${template.scheduled_id}">${template.actual_end_date ? template.actual_end_date : 'undefined'}</a></td>
            <td><a class="btn" href="view_schedule?id=${template.scheduled_id}">${template.actual_duration ? template.actual_duration : 'undefined'}</a></td>


            <td><a class="btn" href="view_schedule?id=${template.scheduled_id}">${status ? status : 'draft'}</a></td>



            <td><a class="btn" href="view_schedule?id=${template.scheduled_id}">${template.row_created_at} 
            
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