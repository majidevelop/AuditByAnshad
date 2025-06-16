async function renderComplianceReports() {
    if (scheduled_audits.length > 0) {
        let html = ``;
        scheduled_audits.forEach((element, index) => {
            ncs = non_conformities.filter( nc => nc.scheduled_audit_id === element.scheduled_id);
            if(ncs.length > 0){

                audit_plan = audit_plans.find(a=> a.audit_id === element.audit_id);
                if(audit_plan){
                    department_name =   departments.find(d => audit_plan.department_name == d.department_id).department_name;
                    department_poc = application_users.find(a => a.user_id == audit_plan.department_poc).name;
                    audit_lead_name = application_users.find(a => a.user_id == audit_plan.lead_auditor).name;

                    html += `<tr>
                    <td>${index + 1}</td>
                    <td>${audit_plan.audit_title}</td>
                    <td>${department_name}</td>
                    <td>${department_poc}</td>
                    <td>${audit_lead_name}</td>
                    <td>${element.scheduled_id}</td>
                    <td>${ncs.length}</td>
                    <td>
                    <button type="button" class="btn btn-primary waves-effect waves-light" onClick=view_severity(${element.scheduled_id})>View</button>
                    </td>
                </tr>`;
                }
               
            }
            
        });
        $("#non_compliance_table").html(html);
    }
}


function view_severity(id){
    location.href = 'view_severity?id='+id;

}