async function renderComplianceReports() {
    if (scheduled_audits.length > 0) {
        let html = ``;
        scheduled_audits.forEach((element, index) => {
             try{
                console.log(index);
            ncs = non_conformities.filter( nc => nc.scheduled_audit_id === element.scheduled_id);
            if(ncs.length > 0){

                audit_plan = audit_plans.find(a=> a.audit_id === element.audit_id);
                if(audit_plan){
                   
                        console.log(audit_plan);
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
            }catch(err){
                console.error(`Error processing scheduled_audit at index ${index}:`, err.message);
            }
        });
        $("#non_compliance_table").html(html);
    }
}


function view_severity(id){
    location.href = 'view_severity?id='+id;

}


async function renderComplianceReportsByID(params) {
        let html = ``;

        non_conformities.forEach((element, index) => {
            console.log(element);
            const question = template_questions.find(a=> a.question_id === element.nc_question_id);
            const answer = answers.find(a=> a.question_id === element.nc_question_id);

            if(question){
                html += `<tr>
                    <td>${index + 1}</td>
                    <td>${question.question_title}</td>
                    <td>${question.question_description}</td>
                    <td>${answer.answer}</td>

                    <td>${element.severity}</td>
                    <td>${element.description}</td>
                    <td><img src="ajax/${element.nc_image}" width="50" onclick="openModalImage('${element.nc_image}')"></td>
                    
                    <td>
                        <button type="button" class="btn btn-primary waves-effect waves-light" onClick="open_severity_comment_modal(${element.scheduled_audit_id},${element.nc_question_id},'${element.severity}',${element.template_id},${element.nc_id})">Comment</button>
                    </td>
                </tr>`;
            }

                        
        });
        $("#severity_table").html(html);
        let buttons =`
        <div class ="col-sm-3"></div>
                <div class ="col-sm-3">

        <button class="btn btn-success m-0"> Accept
</button></div>
        <div class ="col-sm-3">
        
<button  class="btn btn-danger m-0"> Reject
</button>
        </div>



`;
        $("#severity_window").append(buttons);

}


function open_severity_comment_modal(scheduled_audit_id,nc_question_id,severity,templateId,nc) {
    document.getElementById('modalBackdrop').style.display = 'block';
    document.getElementById('severityCommentModal').style.display = 'block';
    document.getElementById('severityInput').value = severity;
    document.getElementById('scheduled_audit_id').value = scheduled_audit_id;
    document.getElementById('questionIdInput').value = nc_question_id;
    document.getElementById('templateId').value = templateId;
    document.getElementById('nc').value = nc;
let html =``;

non_conformities_remarks.forEach((element, index) => {
            console.log(element);
            const question = template_questions.find(a=> a.question_id === element.nc_question_id);
            const answer = answers.find(a=> a.question_id === element.nc_question_id);

            if(question){
                html += `<div class="mt-3">
                    <p>${index + 1}</p>
                    
                    <p>${element.severity}</p>
                    <p>${element.description}</p>
                    <img src="ajax/${element.nc_image}" width="100" onclick="openModalImage('${element.nc_image}')">
                    <hr>
                  
                <div>`;
            }

                        
        });
$("#remarksList").html(html);


}

function close_severity_comment_modal() {
    document.getElementById('severityCommentModal').style.display = 'none';
    document.getElementById('modalBackdrop').style.display = 'none';
    document.getElementById('severityPreview').style.display = 'none';
    document.getElementById('severityPreview').src = '';
    document.getElementById('questionIdInput').value = '';
    document.getElementById('description').value = '';
}

function previewSeverityImage() {
    const input = document.getElementById('fileInput');
    const preview = document.getElementById('severityPreview');
    const file = input.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(file);
    }
}

function saveSeverityComment() {
    const image = document.getElementById('severityFileInput').files[0];
    const comment = document.getElementById('severityCommentText').value;

    // You can process this further or send to server
    console.log("Comment:", comment);
    console.log("Image File:", image);

    alert('Comment saved!');
    close_severity_comment_modal();
}


        // Save non-conformity data
async function saveNonConformity() {
            const questionIdInput = document.getElementById('questionIdInput');

            const severityInput = document.getElementById('severityInput');
            const descriptionInput = document.getElementById('description');
            const fileInput = document.getElementById('fileInput');
            const modalBackdrop = document.getElementById('modalBackdrop');
            const modal = document.getElementById('severityCommentModal');
            const scheduleId = document.getElementById('scheduled_audit_id').value;
            const templateId = document.getElementById('templateId').value;
            const nc = document.getElementById('nc').value;


            // Validate inputs
            if (!questionIdInput || !severityInput || !descriptionInput || !modalBackdrop || !modal) {
                console.error('Modal elements not found');
                alert('Error: Modal elements are missing.');
                return;
            }

            if (!descriptionInput.value.trim()) {
                alert('Please provide a description for the non-conformity.');
                return;
            }

            // Prepare payload
            const payload = {
                question_id: questionIdInput.value,
                severity: severityInput.value,
                description: descriptionInput.value,
                file_id: null,
                filepath: null,
                schedule_id: scheduleId,
                template_id:    templateId,
                nc:nc
            };

            // Handle file upload
            try {
                if (fileInput.files.length > 0) {

                    const fileData = await uploadFile(fileInput.files[0]);
                    if (fileData) {

                        payload.file_id = fileData.file_id;
                        payload.filepath = fileData.filepath;
                    }else{
                        alert('File upload failed.');
                        return;
                    }
                }

                // Send non-conformity data
                const response = await fetch('ajax/post_nc_remarks.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(payload)
                });

                console.log(payload);
                const data = await response.json();
                console.log('Save response:', data);

                if (data.success) {
                    alert(data.message || 'Non-conformity saved successfully!');
                   /* modalBackdrop.classList.remove('show');
                    modal.classList.remove('show');*/
                    descriptionInput.value = '';
                    fileInput.value = '';
                    
                    close_severity_comment_modal();
                } else {
                    alert(data.message || 'Failed to save non-conformity.');
                }
            } catch (error) {
                console.error('Error saving non-conformity:', error.message);
                alert('Error: Failed to save non-conformity.');
            }
        }


