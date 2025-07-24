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



    async function get_application_users(){
        try {

            const response = await fetch("ajax/get_application_users.php", {
                method: "GET",
                headers: { "Content-Type": "application/json" },
            });

            const data = await response.json();
            application_users = data.data;
            console.log("application_users:", application_users);
            return application_users;

        } catch (error) {
            console.error("Error:", error);
        }
    } 

    async function fetchNonConformities(scheduleId, templateId) {
    try {
        const payload = {};
        let url = 'ajax/get_non_conformities.php'
        if (scheduleId) payload.scheduleId = scheduleId;
        if (templateId) payload.templateId = templateId;
        if (scheduleId) url = 'ajax/get_non_conformities.php?id='+scheduleId
        console.log(payload);
        const response = await fetch(url, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(payload)
        });

        const data = await response.json();
        console.log('Non-conformities response:', data);
        non_conformities = data.data;

        if (data.success) {
            console.log('Non-conformities:', data.data);
            if(non_conformities.length == 0 ){
                return;
            }
            for(let i=0;i<=non_conformities.length; i++){
                template_id = non_conformities[0].template_id;
                break;
            }
            // Render data in UI (e.g., table or list)
        } else {
            alert(data.message || 'Failed to retrieve non-conformities.');
        }
    } catch (error) {
        console.error('Error fetching non-conformities:', error);
        alert('Error: Failed to retrieve non-conformities.');
    }
}


    async function fetchNonConformitiesRemarks(scheduleId, templateId) {
    try {
        const payload = {};
        let url = 'ajax/get_nc_remarks.php'
        if (scheduleId) payload.scheduleId = scheduleId;
        if (templateId) payload.templateId = templateId;
        if (scheduleId) url = 'ajax/get_nc_remarks.php?id='+scheduleId
        console.log(payload);
        const response = await fetch(url, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(payload)
        });

        const data = await response.json();
        console.log('Non-conformities response:', data);
        non_conformities_remarks = data.data;

        if (data.success) {
            console.log('Non-conformities Remarks:', data.data);
            // for(let i=0;i<=non_conformities_remarks.length; i++){
            //     template_id = non_conformities_remarks[0].template_id;
            //     break;
            // }
            // Render data in UI (e.g., table or list)
        } else {
            alert(data.message || 'Failed to retrieve non-conformities.');
        }
    } catch (error) {
        console.error('Error fetching non-conformities:', error);
        alert('Error: Failed to retrieve non-conformities.');
    }
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
        console.log("scheduled_audits :", data);

        if (data.success) {
            scheduled_audits = data.data;
        } else {
            alert("Error: " + data.error);
        }
    } catch (error) {
        console.error("Fetch Error:", error);
        alert("Failed to load templates. Check console for details.");
    }
}


async function get_answers(id) {
    try {
        const response = await fetch(`ajax/get_answers_byscheduled_id.php?id=${id}`, {
            method: "GET",
            headers: { "Content-Type": "application/json" },
        });

        const data = await response.json();
        if (data.success) {
            answers = data.data;
            console.log("Answers : ", answers);
        } else {
            alert("Error: " + data.error);
        }

    }catch(error){
        console.error("Fetch Error:", error);
        alert("Failed to load Answers. Check console for details.");
    }
}

async function submitStatusUpdate(id, status, created_by) {
    try {
        const response = await fetch('ajax/post_scheduled_audit_status.php', {
            method: 'POST',
            headers: {
                "Content-Type": "application/json"

            },
            body: JSON.stringify({
                id: id,
                status: status,
                created_by: created_by
            })
        });

        const result = await response.json(); // or response.json() if your PHP returns JSON
        console.log("Server response:", result);
        return result;
    } catch (error) {
        console.error("Error submitting status update:", error);
    }
}



async function getQuestionWiseStatusLog(id) {
    try {
        const response = await fetch(`ajax/get_question_wise_status_log.php?id=${encodeURIComponent(id)}`, {
            method: 'GET',
            headers: {
                'Accept': 'application/json'
            }
        });

        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }

        const data = await response.json();
        console.log("Status log received:", data.data);
        questionWiseAnswerlog =  data.data;
    } catch (error) {
        console.error("Error fetching status log:", error);
        return null;
    }
}


function findLatestQuestionStatus(question_id) {
    const filteredLogs = questionWiseAnswerlog
        .filter(log => log.question_id === question_id)
        .sort((a, b) => new Date(b.created_at) - new Date(a.created_at)); // Descending order

    return filteredLogs[0] || null; // Return latest or null if not found 
}
function getAllRemarksOfQuestion(question_id) {
    const filteredLogs = questionWiseAnswerlog.filter(log => log.question_id === question_id);
    return filteredLogs.length > 0 ? filteredLogs : null;
}


function viewCommentsByQuestionId(question_id) {
    console.log("viewCommentsByQuestionId: " + question_id);
    const filteredLogs = getAllRemarksOfQuestion(question_id);

    $("#comments_section").html(''); // Clear previous comments

    if (!filteredLogs) return; // Handle case where null is returned

    // Sort oldest to newest (optional if already sorted)
    const sortedLogs = filteredLogs.sort((a, b) => new Date(a.created_at) - new Date(b.created_at));

    let html = ``;
    sortedLogs.forEach(element => {
        html += `
            <div class="comment">
                <p><i class="mdi mdi-account me-3"></i> ${element.remark} <br>
                <small>${element.created_at}</small></p>
            </div>
        `;
    });

    // Append all at once in correct order
    $("#comments_section").html(html);
}
