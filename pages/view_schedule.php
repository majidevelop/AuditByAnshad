
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
                                    <h4 class="mb-sm-0 font-size-18">Form Report Master Template</h4>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                            <li class="breadcrumb-item active">Master Template</li>
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
       

<script>
    let scheduleId = null;
    let templateId = null;
    let isSubmitted = false;
    let answers;

    function load_func(){
        scheduleId = new URLSearchParams(window.location.search).get("id");
        if (scheduleId) {
            get_schedule_by_id(scheduleId);
            // setLastUpdated();
        } else {
            alert("No template ID provided.");
        }
    }
</script>

<script>
    let schedule;
function get_schedule_by_id(id){
    $.ajax({
            url: `ajax/get_scheduled_audit_by_id.php?id=${id}`,
            type: "GET",
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    console.log("Schedule Details:", response);
                    templateId = response.data[0].checklist_id;
                    schedule = response.data[0];
                    answers = response.answers;
                    get_template_details_by_id(templateId);
                    get_audit_plan_by_id(response.data[0].audit_id);
                    // renderSchedule(response.data);
                } else {
                    alert("Error: " + response.error);
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", error);
                alert("Failed to load template. Check console for details.");
            }
        });
}
function get_audit_plan_by_id(id){
     $.ajax({
            url: `ajax/get_audit_plan_by_id.php?id=`+id,
            type: "GET",
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    console.log("Audit Plan:", response);
                    // renderSchedule(response.data);
                    // displayTemplate(response.data[0], response.form_template_questions, response.form_template_answer_options);
                    renderAuditPlan(response.data[0]);
                } else {
                    alert("Error: " + response.error);
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", error);
                alert("Failed to load template. Check console for details.");
            }
        });
}
function renderAuditPlan(audit_plan){
    let html = `<h1> ${audit_plan.audit_title}</h1>
        

         <p>Start Date : ${schedule.actual_start_date}</p>
        <p>End Date : ${schedule.actual_end_date}</p>


        <br>

    `;

    console.log(schedule);
    if(schedule.scheduled_audit_status == "submitted"){
        form = $("#questionsContainer"); // jQuery object
    form.find('input, select, button , a').prop('disabled', true);
    form.prepend('<p class="text-warning">This form has been submitted and is no longer editable.</p>');
html += `
        <a href=view_audit_form?id=${scheduleId} class="btn btn-secondary">View Audit</a>

`;
    }else{
        html +=` 
        <a href=view_audit_form?id=${scheduleId} class="btn btn-secondary">Start Audit</a>
`;
    }
    $('#questionsContainer').html(html);

   
}
function get_template_details_by_id(id){
    $.ajax({
            url: `ajax/get_template_by_id.php?id=${id}`,
            type: "GET",
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    console.log("Template Details:", response);
                    // renderSchedule(response.data);
                    // displayTemplate(response.data[0], response.form_template_questions, response.form_template_answer_options);
                } else {
                    alert("Error: " + response.error);
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", error);
                alert("Failed to load template. Check console for details.");
            }
        });
}

</script>
