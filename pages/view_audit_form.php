 <style>
        .modal-backdrop {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }
        .modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1001;
            width: 90%;
            max-width: 500px;
        }
        .modal-backdrop.show, .modal.show {
            display: block;
        }
    </style>
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
.text-gray-800 {
    --tw-text-opacity: 1;
    color: rgb(31 41 55 / var(--tw-text-opacity, 1));
}
.bg-gray-300 {
    --tw-bg-opacity: 1;
    background-color: rgb(209 213 219 / var(--tw-bg-opacity, 1));
}
.rounded-md {
    border-radius: 0.375rem;
}
[role=button], button {
    cursor: pointer;
}
.space-x-2 > :not([hidden]) ~ :not([hidden]) {
    --tw-space-x-reverse: 0;
    margin-right: calc(0.5rem * var(--tw-space-x-reverse));
    margin-left: calc(0.5rem * calc(1 - var(--tw-space-x-reverse)));
}
.text-white {
    --tw-text-opacity: 1;
    color: rgb(255 255 255 / var(--tw-text-opacity, 1));
}
.bg-blue-600 {
    --tw-bg-opacity: 1;
    background-color: rgb(37 99 235 / var(--tw-bg-opacity, 1));
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
                                        <div class="row m-0">
                                            <div id="questionsContainer" >

                                            </div>

                                        </div>
                                    </div>
                                </div>
                              

                            </div>

                            

                            
                            
                    </div>
                    <!-- Modal -->
    <div class="modal-backdrop" id="modalBackdrop"></div>
    <div class="modal" id="modal">
        <h2 class="text-lg font-semibold mb-4">Enter Details</h2>
        <div class="mb-4">
            <!-- <label for="questionIdInput" class="block text-sm font-medium text-gray-700">Question ID</label> -->
            <input type="hidden" id="questionIdInput" class="mt-1 block w-100 p-2 border border-gray-300 rounded-md shadow-sm" readonly>
            <label for="severityInput" class="block text-sm font-medium text-gray-700">Severity</label>

            <input type="text" id="severityInput" class="mt-1 block w-100 p-2 border border-gray-300 rounded-md shadow-sm" readonly>

            <p>
                Please fill out this form to document and manage a non-conformity.
            </p>
            <input class="field-type form-control"  type="file" id="fileInput">
            <textarea id="description" name="description" rows="4"
                class="mt-1 block w-100 p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                placeholder="Provide a detailed description of the non-conformity observed." required></textarea>
        </div>
        <div class="flex justify-end space-x-2">
            <button id="closeModalBtn" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400">Close</button>
            <button id="saveModalBtn" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Save</button>
        </div>
    </div>

        <script src="assets/js/common/file_upload.js"></script>   

<script>
    let header_text = null;
    let footer_text = null;
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
            const status = await getScheduledAuditStatus(scheduleId);
            console.log("status : "+status);
            await setupSeverityListeners();
            if( status == "SUBMITTED"){

                form = $("#questionsContainer"); // jQuery object
                form.find('input, select, button').prop('disabled', true);
                form.prepend('<p class="text-warning">This form has been submitted and is no longer editable.</p>');

            }
            } else {
                alert("No template ID provided.");
            }
    }
</script>

<script>
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
        const response = await fetch(`ajax/get_answers_byscheduled_id.php?id=${id}`, {
            method: "GET",
            headers: { "Content-Type": "application/json" },
        });

        const data = await response.json();
        data.data.forEach(answer => {
            const question = template_questions.find(a => a.question_id === answer.question_id || a.question_id === answer.question_id);
            if(question){
                console.log(answer);
                if (["text", "dropdown", "number"].includes(question.answer_type)) {


                    $("#response_"+answer.question_id).val(answer.answer);

                }else{
                    $(`input[name="response_${answer.question_id}"][value="${answer.answer}"]`).prop("checked", true);

                }
           
            }
          
        });

                    

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



function renderAuditPlan(audit_plan){
    let html = `<h1> ${audit_plan.audit_title}</h1>
        <p>Start Date : ${audit_plan.planned_start_date}</p>
        <p>End Date : ${audit_plan.planned_end_date}</p>
        

    `;

    $('#questionsContainer').html(html);

}
async function get_template_details_by_id(id){


        try {
        const data = await fetch(`ajax/get_template_by_id.php?id=${id}`, {
            method: "GET",
            headers: { "Content-Type": "application/json" },
        });

        const response = await data.json();
        console.log("Answers:", response.data);
        await displayTemplate(response.data[0], response.form_template_questions, response.form_template_answer_options);


    } catch (error) {
        console.error("Error:", error);
    }


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
    console.log( audit_plan);

    console.log( audit_plan.audit_title);
    if (!template || !questions || !options) {
        console.error("Invalid input data");
        return;
    }

    let html = `<h2>${audit_plan.audit_title}</h2>`;
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
        const non_confirmity = non_conformities.find(n => n.nc_question_id === q.question_id) || {};
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
                optionsHtml += `<select class="form-select" name="response_${q.question_id}" id="response_${q.question_id}" data-question-id="${q.question_id}">`;
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
                    <div class="col-6">
                    <input class="field-type" value="${q.answer_type}" type="hidden">
                        <p class="" id="question-title-${q.question_id}">${q.question_title.trim()} </p>
                        <p class="" value="" id="question-description-${q.question_id}">${q.question_description.trim()} </p>
                        <div class="mt-3 ms-3 responseDiv">
                            ${optionsHtml}
                            ${showDefaultInputs ? `
                                ${q.answer_type === 'text' ? `<input type="text" class="form-control" name="response_${q.question_id}" id="response_${q.question_id}" data-question-id="${q.question_id}" placeholder="Enter text">` : ''}
                                ${q.answer_type === 'number' ? `<input type="number" class="form-control" name="response_${q.question_id}" id="response_${q.question_id}" data-question-id="${q.question_id}" placeholder="Enter number">` : ''}
                                ${q.answer_type === 'date' ? `<input type="date" class="form-control" name="response_${q.question_id}" id="response_${q.question_id}" data-question-id="${q.question_id}">` : ''}
                            ` : ''}
                        </div>
                    </div>
                    <div class="col-6">
                        
            <div>
                <label for="severity" class="block text-sm font-medium text-gray-700 mb-1">Severity</label>
                <br>
                <select id="severity${q.question_id}" name="severity"
                        class="mt-1 block w-100 p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                    <option value="">Select Severity</option>
                    <option value="Complied">Complied</option>
                    <option value="OFI">OFI</option>
                    <option value="Minor NC">Minor NC</option>
                    <option value="Major NC">Major NC</option>

                </select>
                <img src="${non_confirmity.nc_image}">
            </div>
                        

                    </div>
                   
                    
                </div>
               
            </div>
        `;
    });

    html += questionsHtml + `</ul>`;
    html += `<button type="button" class="btn btn-primary save-answers float-sm-end me-2" data-template-id="${template.id}">Submit Answers</button>`;
    html += `</form>`;
    // $("#template-container").html(html);
    $('#questionsContainer').html(html);
    // Attach event listener for the save button
    $(`#template-form-${template.id} .save-answers`).on('click', function() {

        saveAnswers(template.id, questions);
    });
    form = $("#questionsContainer"); // jQuery object
    // form.find('input, select, button').prop('disabled', true);
    // form.prepend('<p class="text-warning">This form has been submitted and is no longer editable.</p>');
}

function saveAnswers(templateId, questions) {
    const form = $(`#template-form-${templateId}`);
    const answers = {
        template_id: templateId,
        schedule_id:scheduleId,
        status : "SUBMITTED",
        responses: [],
        created_by: current_user_id
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
            location.reload();
        },
        error: function(error) {
            console.error('Error saving answers:', error);
            alert('Failed to save answers.');
        }
    });
}



// Setup event listeners for severity selects
         function setupSeverityListeners() {
            console.log('Setting up severity listeners...');
            const selects = document.querySelectorAll('select[id^="severity"]');
            console.log('Found severity selects:', selects.length);
            if (selects.length === 0) {
                console.warn('No select elements found with ID starting with "severity". Retrying in 1s...');
                setTimeout(setupSeverityListeners, 1000); // Retry if elements not found
                return;
            }
            selects.forEach(select => {
                // Remove existing listeners to prevent duplicates
                select.removeEventListener('change', handleSeverityChange);
                select.addEventListener('change', handleSeverityChange);
            });
        }

        
         // Handle severity change
function handleSeverityChange(event) {
            const selectedValue = event.target.value;
            const questionId = event.target.id.replace('severity', '');
            console.log('Severity changed:', selectedValue, 'Question ID:', questionId);
            if (['OFI', 'Minor NC', 'Major NC'].includes(selectedValue)) {
                const questionIdInput = document.getElementById('questionIdInput');
                const modalBackdrop = document.getElementById('modalBackdrop');
                const modal = document.getElementById('modal');
                const severityInput = document.getElementById('severityInput');

                
                if (questionIdInput && modalBackdrop && modal) {
                    questionIdInput.value = questionId;
                    severityInput.value = selectedValue;
                    modalBackdrop.classList.add('show');
                    modal.classList.add('show');
                } else {
                    console.error('Modal elements not found');
                }
            }
        }

        // Modal event listeners
        document.getElementById('closeModalBtn').addEventListener('click', function () {
            document.getElementById('modalBackdrop').classList.remove('show');
            document.getElementById('modal').classList.remove('show');
        });

        /*  document.getElementById('saveModalBtn').addEventListener('click', function () {
            console.log('Save clicked, Question ID:', document.getElementById('questionIdInput').value);
            document.getElementById('modalBackdrop').classList.remove('show');
            document.getElementById('modal').classList.remove('show');
        }); */
        document.getElementById('saveModalBtn').addEventListener('click', saveNonConformity);


        document.getElementById('modalBackdrop').addEventListener('click', function () {
            document.getElementById('modalBackdrop').classList.remove('show');
            document.getElementById('modal').classList.remove('show');
        });

        // Save non-conformity data
async function saveNonConformity() {
            const questionIdInput = document.getElementById('questionIdInput');
            const severityInput = document.getElementById('severityInput');
            const descriptionInput = document.getElementById('description');
            const fileInput = document.getElementById('fileInput');
            const modalBackdrop = document.getElementById('modalBackdrop');
            const modal = document.getElementById('modal');

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
                template_id:    templateId
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
                const response = await fetch('ajax/post_non_conformity.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(payload)
                });

                const data = await response.json();
                console.log('Save response:', data);

                if (data.success) {
                    alert(data.message || 'Non-conformity saved successfully!');
                    modalBackdrop.classList.remove('show');
                    modal.classList.remove('show');
                    descriptionInput.value = '';
                    fileInput.value = '';
                } else {
                    alert(data.message || 'Failed to save non-conformity.');
                }
            } catch (error) {
                console.error('Error saving non-conformity:', error);
                alert('Error: Failed to save non-conformity.');
            }
        }

async function fetchNonConformities(scheduleId, templateId) {
    try {
        const payload = {};
        if (scheduleId) payload.scheduleId = scheduleId;
        if (templateId) payload.templateId = templateId;

        const response = await fetch('ajax/get_non_conformities.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(payload)
        });

        const data = await response.json();
        console.log('Non-conformities response:', data);
        non_conformities = data.data;

        if (data.success) {
            console.log('Non-conformities:', data.data);
            // Render data in UI (e.g., table or list)
        } else {
            alert(data.message || 'Failed to retrieve non-conformities.');
        }
    } catch (error) {
        console.error('Error fetching non-conformities:', error);
        alert('Error: Failed to retrieve non-conformities.');
    }
}

</script>
