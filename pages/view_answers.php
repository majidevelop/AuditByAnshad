
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
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/feather-icons/feather.min.js"></script>
        <!-- pace js -->
        <script src="assets/libs/pace-js/pace.min.js"></script>

        <!-- ckeditor -->

        <!-- init js -->
        <script src="assets/js/pages/form-editor.init.js"></script>

        <script src="assets/js/app.js"></script>

    </body>
</html>

<script>
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

async function get_answers(id){
            
    try {
        let html;
        const response = await fetch(`ajax/get_answers_byscheduled_id.php?id=${id}`, {
            method: "GET",
            headers: { "Content-Type": "application/json" },
        });

        const data = await response.json();
        let ctr = 0;
        html +=`
          <center>
                        <h4>
            ${audit_plan.audit_title}
                        </h4>
                    </center>
                    <br>
                    <div style="padding:1rem">
        `;
        data.data.forEach(answer => {
            ctr++;
            const question = template_questions.find(a => a.question_id === answer.question_id || a.question_id === answer.question_id);
            if(question){
                console.log(question.question_title);
                    html +=`
                  

                <p>
            ${ctr} -
            <b> 
            ${question.question_title} </b>
                </p>
                <p>
                    ${question.question_description}
                </p>
                <p>
                <strong>Answer</strong> <br>
            ${answer.answer}
                </p>
        `;
                if (["text", "dropdown", "number"].includes(question.answer_type)) {


                    $("#response_"+answer.question_id).val(answer.answer);

                }else{
                    $(`input[name="response_${answer.question_id}"][value="${answer.answer}"]`).prop("checked", true);

                }
           
            }
          
        });
        html += `</div>
        <div>
        <center>
        <button class="btn btn-primary" onclick="printToPdf()"> Print </button>
        </center>
        </div>
        `;
    
console.log(html);
                    $("#questionsContainer").html(html);    

    } catch (error) {
        console.error("Error:", error);
    }

}
function printToPdf(){
    alert("Function Not Configured");
}
</script>

