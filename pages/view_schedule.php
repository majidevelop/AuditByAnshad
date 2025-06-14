
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
        <p>Start Date : ${audit_plan.planned_start_date}</p>
        <p>End Date : ${audit_plan.planned_end_date}</p>
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
   
function createRadioItem(value, questionId, answerId) {
    return `<div><input type="radio" name="response_${questionId}" value="${value}" data-question-id="${questionId}" data-answer-id="${answerId}"> <label>${value}</label></div>`;
}

function createMultiSelectItem(value, questionId, answerId) {
    return `<div><input type="checkbox" name="response_${questionId}" value="${value}" data-question-id="${questionId}" data-answer-id="${answerId}"> <label>${value}</label></div>`;
}

function createDropdownItem(value, answerId) {
    return `<option value="${value}" data-answer-id="${answerId}">${value}</option>`;
}

function displayTemplate(template, questions, options) {
    if (!template || !questions || !options) {
        console.error("Invalid input data");
        return;
    }

    let html = `<h2>${template.title}</h2>`;
    $("#example-text-input-desc").val(template.description);
    $("#example-text-input-title").val(template.title);

    html += `<p><strong>Created At:</strong> ${template.created_at}</p>`;
    html += `<form id="template-form-${template.id}" data-template-id="${template.id}">`; // Add form with template ID
    html += `<h3>Questions:</h3><ul>`;
    let questionsHtml = ``;

    questions.forEach(q => {
        let optionsHtml = "";
        let showDefaultInputs = true;
        const savedAnswer = answers.find(a => a.question_id === q.id || a.question_id === q.question_id) || {};
        const savedValue = savedAnswer.answer || '';
        const savedOptionId = savedAnswer.option_id || null;

        let relatedOptions = options.filter(o => o.question_id === q.question_id);

        if (["dropdown", "multi_select", "single_select"].includes(q.answer_type) && relatedOptions.length > 0) {
            showDefaultInputs = false;
            optionsHtml = `<div class="mt-3"><label>Options:</label>`;

            if (q.answer_type === "multi_select") {
                relatedOptions.forEach(option => {
                    optionsHtml += createMultiSelectItem(option.option_value, q.question_id, option.option_id);
                });
                optionsHtml += `</div>`;
            } else if (q.answer_type === "single_select") {
                relatedOptions.forEach(option => {
                    optionsHtml += createRadioItem(option.option_value, q.question_id, option.option_id);
                });
                optionsHtml += `</div>`;
            } else if (q.answer_type === "dropdown") {
                optionsHtml += `<select class="form-select" name="response_${q.question_id}" data-question-id="${q.question_id}">`;
                relatedOptions.forEach(option => {
                    optionsHtml += createDropdownItem(option.option_value, option.option_id);
                });
                optionsHtml += `</select></div>`;
            }
        } else if (q.answer_type === "preconfigured") {
            optionsHtml = `
                <div class="mt-3">
                    <input type="radio" id="true_false_${q.question_id}" name="response_${q.question_id}" value="true_false" data-question-id="${q.question_id}" ${q.preconfigured_type === 'true_false' ? 'checked' : ''}>
                    <label for="true_false_${q.question_id}">True/False</label><br>
                    <input type="radio" id="pass_fail_${q.question_id}" name="response_${q.question_id}" value="pass_fail" data-question-id="${q.question_id}" ${q.preconfigured_type === 'pass_fail' ? 'checked' : ''}>
                    <label for="pass_fail_${q.question_id}">Pass/Fail</label><br>
                    <input type="radio" id="yes_no_${q.question_id}" name="response_${q.question_id}" value="yes_no" data-question-id="${q.question_id}" ${q.preconfigured_type === 'yes_no' ? 'checked' : ''}>
                    <label for="yes_no_${q.question_id}">Yes/No</label>
                </div>
            `;
        }

        questionsHtml += `
            <div class="card-body question-card" data-question-id="${q.question_id}">
                <hr>
                <div class="row">
                    <div class="col-12">
                    <input class="field-type" value="${q.answer_type}" type="hidden">
                        <p class="" id="question-title-${q.question_id}">${q.question_title.trim()} </p>
                        <p class="" value="" id="question-description-${q.question_id}">${q.question_description.trim()} </p>
                        <div class="mt-3 ms-3 responseDiv">
                            ${optionsHtml}
                            ${showDefaultInputs ? `
                                ${q.answer_type === 'text' ? `<input type="text" class="form-control" name="response_${q.question_id}" data-question-id="${q.question_id}" placeholder="Enter text">` : ''}
                                ${q.answer_type === 'number' ? `<input type="number" class="form-control" name="response_${q.question_id}" data-question-id="${q.question_id}" placeholder="Enter number">` : ''}
                                ${q.answer_type === 'date' ? `<input type="date" class="form-control" name="response_${q.question_id}" data-question-id="${q.question_id}">` : ''}
                            ` : ''}
                        </div>
                    </div>
                   
                    
                </div>
               
            </div>
        `;
    });

    html += questionsHtml + `</ul>`;
    html += `<button type="button" class="btn btn-primary save-answers float-sm-end me-2" data-template-id="${template.id}">Save Answers</button>`;
    html += `</form>`;
    // $("#template-container").html(html);
    $('#questionsContainer').html(html);
    // Attach event listener for the save button
    $(`#template-form-${template.id} .save-answers`).on('click', function() {

        saveAnswers(template.id, questions);
    });
    form = $("#questionsContainer"); // jQuery object
    form.find('input, select, button').prop('disabled', true);
    form.prepend('<p class="text-warning">This form has been submitted and is no longer editable.</p>');
}

function saveAnswers(templateId, questions) {
    const form = $(`#template-form-${templateId}`);
    const answers = {
        template_id: templateId,
        schedule_id:scheduleId,
        status : "submitted",
        responses: []
    };

    form.find('.question-card').each(function() {
        const questionCard = $(this);
        const questionId = questionCard.data('question-id');
        const questionData = questions.find(q => q.question_id === questionId || q.question_id === questionId);
        let answerType = questionCard.find('.field-type').val() || (questionData && questionData.answer_type);

        if (!answerType) {
            console.warn(`Answer type undefined for question ${questionId}. Skipping.`);
            return true;
        }

        let answer;
        let answerIds = []; // Initialize answer_id array for this question

        if (answerType === 'text' || answerType === 'number' || answerType === 'date') {
            answer = questionCard.find(`input[name="response_${questionId}"]`).val();
            // No answer_id for these types
        } else if (answerType === 'dropdown' || answerType === 'preconfigured' || answerType === 'single_select') {
            if (answerType === 'dropdown') {
                // Get the selected option's value and data-answer-id
                const selectedOption = questionCard.find(`select[name="response_${questionId}"] option:selected`);
                answer = selectedOption.val();
                answerIds.push(selectedOption.data('answer-id'));
            } else {
                // For preconfigured or single_select (radio buttons)
                const checkedInput = questionCard.find(`input[name="response_${questionId}"]:checked`);
                answer = checkedInput.val();
                alert(answer);
                answerIds.push(checkedInput.data('answer-id'));
            }
        } else if (answerType === 'multi_select') {
            answer = [];
            answerIds = [];
            questionCard.find(`input[name="response_${questionId}"]:checked`).each(function() {
                answer.push($(this).val());
                answerIds.push($(this).data('answer-id'));
            });
        }

        // Add to responses if answer is valid
        if (answer !== undefined && answer !== '' && !(Array.isArray(answer) && answer.length === 0)) {
            answers.responses.push({
                question_id: questionId,
                answer: answer,
                answer_id: answerIds.length > 0 ? answerIds : null // Include answer_id(s) or null
            });
        }
    });

    if (answers.responses.length === 0) {
        alert('No answers provided.');
        return;
    }

    console.log('Collected answers:', answers);

    $.ajax({
        url: 'ajax/save_answers.php',
        method: 'POST',
        contentType: 'application/json',
        data: JSON.stringify(answers),
        success: function(response) {
            console.log('Answers saved successfully:', response);
            alert('Answers saved!');
        },
        error: function(error) {
            console.error('Error saving answers:', error);
            alert('Failed to save answers.');
        }
    });
}
</script>
