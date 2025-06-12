
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

    .cover-page-gallery {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    margin-top: 20px;
}

.cover-thumb {
    width: 150px;
    height: 200px;
    object-fit: cover;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: 2px 2px 6px rgba(0,0,0,0.1);
    transition: transform 0.2s ease-in-out;
}

.cover-thumb:hover {
    transform: scale(1.05);
    cursor: pointer;
}

</style>
<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-9">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">View Answers</h4>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                            <li class="breadcrumb-item active">Answers</li>
                                        </ol>
                                        <div id="lastUpdated" class="m-0">

                                        </div>
                                    </div>
                                
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div id="questionsContainer">

                                            </div>

                                        </div>
                                    </div>
                                </div>
                              

                            </div>

                            

                            
                            
                    </div>
                    


                    <script>
                        let header_text = null;
                        let footer_text = null;


                    </script>
                     

     <!-- /Right-bar -->

        <!-- Right bar overlay-->

       

        <script src="assets/js/app.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
        <script src="assets/js/audit/audit.js"></script>   


</html>

<script>
    let non_conformities;  
    let template_questions;
    let scheduleId = null;
    let templateId = null;
    let isSubmitted = false;
    let answers;
    let audit_plan;
    let scheduled_audit;
    async function load_func(){
        scheduleId = new URLSearchParams(window.location.search).get("id");
        if (scheduleId) {
            await get_schedule_by_id(scheduleId);
            // setLastUpdated();
            await fetchNonConformities(scheduleId, templateId)
            await get_template_details_by_id(templateId);
            await get_template_questions(templateId);
            await get_answers(scheduleId);

            if( scheduled_audit.scheduled_audit_status == "submitted"){

            }
        } else {
            alert("No template ID provided.");
        }
    }

    async function get_schedule_by_id(id){
        
        try {
            const response = await fetch(`ajax/get_scheduled_audit_by_id.php?id=${id}`, {
                method: "GET",
                headers: { "Content-Type": "application/json" },
            });

            const resp = await response.json();


            templateId = resp.data[0].checklist_id;
            answers = resp.answers;
            await get_audit_plan_by_id(resp.data[0].audit_id);
            
            scheduled_audit = resp.data[0];

           

        } catch (error) {
            console.error("Error:", error);
        }

}


async function get_audit_plan_by_id(id) {
    try {
        const response = await fetch(`ajax/get_audit_plan_by_id.php?id=${id}`);
        const result = await response.json();

        if (result.success) {
            console.log("Audit Plan:", result.data[0]);
            audit_plan = result.data[0];
            return result.data; // Return the data if needed elsewhere
        } else {
            alert("Error: " + result.error);
        }
    } catch (error) {
        console.error("Fetch Error:", error);
        alert("Failed to load audit plan. Check console for details.");
    }
}


async function get_template_details_by_id(id){


        try {
        const data = await fetch(`ajax/get_template_by_id.php?id=${id}`, {
            method: "GET",
            headers: { "Content-Type": "application/json" },
        });

        const response = await data.json();
        console.log("template details:", response.data);
        // await displayTemplate(response.data[0], response.form_template_questions, response.form_template_answer_options);


    } catch (error) {
        console.error("Error:", error);
    }


}
   
async function get_template_questions(templateId) {
    try {
        const response = await fetch(`ajax/get_questions_by_template_id.php?id=${templateId}`, {
            method: "GET",
            headers: { "Content-Type": "application/json" },
        });

        const data = await response.json();
        console.log("Questions:", data.data);
        template_questions = data.data;
                    

    } catch (error) {
        console.error("Error:", error);
    }
}

async function get_answers(id) {
    try {
        const response = await fetch(`ajax/get_answers_byscheduled_id.php?id=${id}`, {
            method: "GET",
            headers: { "Content-Type": "application/json" },
        });

        const data = await response.json();
        let ctr = 0;
        console.log("Answers : ", data.data);
        console.log("template_questions : ", template_questions);

        let html = `
            <center>
                <h4>${audit_plan.audit_title}</h4>
            </center>
            <br>
            <div style="padding:1rem">
        `;

        data.data.forEach(answer => {
            ctr++;

            const question = template_questions.find(q =>
                q.question_id == answer.question_id
            );

            if (question) {
                let nc_image_html = ``;
                const non_confirmity = non_conformities.find(n => n.nc_question_id === question.question_id) || {};
                if(non_confirmity){
                    if(non_confirmity.nc_image){
                        nc_image_html = `<p>${non_confirmity.severity}</p>
                        <img class="" width="200" src="ajax/${non_confirmity.nc_image}">
                         <p>${non_confirmity.description}</p>`;
                    }
                }
                html += `
                <div class="row border border-1">
                    <div class="col-sm-6">
                        <p>
                            ${ctr} - <b>${question.question_title}</b>
                        </p>
                        <p>${question.question_description}</p>
                        <p><strong>Answer</strong><br>${answer.answer}</p>
                    </div>
                    <div class="col-sm-6">
                        ${nc_image_html}
                    </div>
                
                </div>
           
                `;

                if (["text", "dropdown", "number"].includes(question.answer_type)) {
                    $(`#response_${answer.question_id}`).val(answer.answer);
                } else {
                    $(`input[name="response_${answer.question_id}"][value="${answer.answer}"]`).prop("checked", true);
                }
            }
        });
        const status = await getScheduledAuditStatus(scheduleId);
        const isApproved = status === "APPROVED";

        html += `
            </div>
            <div>
                <div class="row mt-3">
        `;

        // Conditionally render buttons
        if (!isApproved) {
            html += `
                    <div class="col-sm-4">
                        <center>
                            <button class="btn btn-success" onclick="approveAnswers(${scheduleId})">Approve Answers</button>
                        </center>
                    </div>
                    <div class="col-sm-4">
                        <center>
                            <button class="btn btn-danger" onclick="rejectAnswers(${scheduleId})">Reject Answers</button>
                        </center>
                    </div>
                    <div class="col-sm-4">
                        <center>
                            <button class="btn btn-primary" onclick="printToPdf()">Print</button>
                        </center>
                    </div>
            `;
        } else {
            // Center the Print button if only it is shown
            html += `
                    <div class="col-sm-12">
                        <center>
                            <button class="btn btn-primary" onclick="printToPdf()">Print</button>
                        </center>
                    </div>
            `;
        }

        html += `
                </div>
            </div>
        `;

        $("#questionsContainer").html(html);


    } catch (error) {
        console.error("Error fetching answers:", error);
    }
}
async function approveAnswers(id){
    await submitStatusUpdate(id, "APPROVED", current_user_id);
    location.href = 'list_audit_schedules';

}

async function rejectAnswers(id){
    await submitStatusUpdate(id, "IN REVIEW", current_user_id);
    location.href = 'list_audit_schedules';

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

        const result = await response.text(); // or response.json() if your PHP returns JSON
        console.log("Server response:", result);
    } catch (error) {
        console.error("Error submitting status update:", error);
    }
}


function printToPdf() {
    const element = document.getElementById("questionsContainer");
    const printButton = element.querySelector("button");

    if (!element) {
        alert("No content to print.");
        return;
    }

    // Hide the print button
    if (printButton) printButton.style.display = "none";

    const opt = {
        margin:       0.5,
        filename:     'audit_report.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { scale: 2 },
        jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
    };

    // Convert and save PDF
    html2pdf().set(opt).from(element).save();
}


</script>

