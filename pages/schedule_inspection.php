

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
</style>
<div class="page-content">
                    <div class="container-fluid">


                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Schedule Inspection</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                            <li class="breadcrumb-item active">Create Template</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                         <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <form action="post_schedule_inspection" class="forms" method="POST">
                                    <div class="card-header">
                                        <label for="example-text-input" class="form-label">Template</label>

                                        <select class="form-select templates mb-3" id="templates" name="templates">
                                            <option value="">Add Template</option>
                                        </select>
                                        <label for="example-text-input" class="form-label">Site</label>

                                        <select class="form-select sites mb-3" id="sites" name="sites">
                                            <option value="">Select</option>
                                        </select>
                                        <label for="example-text-input" class="form-label">Asset</label>

                                        <select class="form-select assets mb-3" id="assets" name="assets">
                                            <option value="">Select</option>
                                        </select>
                                        <label for="example-text-input" class="form-label">Assigned to</label>

                                        <select class="form-select assignee mb-3" id="assignee" name="assignee">
                                            <option value="">Assignee</option>
                                        </select>
                                        <label for="example-text-input" class="form-label">How often</label>

                                        <select class="form-select schedule mb-3" id="schedule" name="schedule">
                                            <option value="">Every Day</option>
                                        </select>
                                        <center>
                                        <button class="btn btn-submit" id="saveTemplate">Save Template</button>

                                        </center>

                                    </div>
                                    </form>
                                    

                                </div>

                            </div>

                         </div>


                         
<script>
    let templates = [];

    function get_template_details(templateId) {
    $.ajax({
        url: `./pages/view_template_by_id.php?id=${templateId}`,
        type: "GET",
        dataType: "json",
        success: function(response) {
            if (response.success) {
                console.log("Template Details:", response);
                displayTemplate(response.template, response.questions, response.options);
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

// Function to display the template
function displayTemplate(template, questions, options) {
    let html = `<h2>${template.template_name}</h2>`;
    $("#example-text-input-desc").val(template.description);
    $("#example-text-input-title").val(template.title);

    html += `<p><strong>Created At:</strong> ${template.created_at}</p>`;
    html += `<h3>Questions:</h3><ul>`; 
    let questionsHtml = ``;

questions.forEach(q => {
    let optionsHtml = "";
    let showDefaultInputs = true; // By default, show radio buttons

    // Find options belonging to the current question
    let relatedOptions = options.filter(o => o.question_id == q.question_id);

    // If answer type is dropdown, multi_select, or single_select, show options only
    if (["dropdown", "multi_select", "single_select"].includes(q.answer_type) && relatedOptions.length > 0) {
        showDefaultInputs = false; // Hide default inputs

        optionsHtml = `<div class="mt-3"><label>Options:</label>`;

        relatedOptions.forEach(option => {
            if (q.answer_type === "multi_select") {
                optionsHtml += createMultiSelectItem(option.option_value);
            } else if (q.answer_type === "single_select") {
                optionsHtml += createRadioItem(option.option_value);
            } else if (q.answer_type === "dropdown") {
                optionsHtml += createDropdownItem(option.option_value);
            }
        });

        optionsHtml += `</div>`;
    }

    questionsHtml += `
        <div class="card-body question-card p-4">
            <div class="row">
                <div class="col-7">
                    <input class="form-control mb-3" type="text" value="${q.question_title}" id="question-title">
                    <input class="form-control" type="text" value="${q.question_description}" id="question-description">
                    
                    <div class="mt-3 responseDiv">
                        ${optionsHtml}
                        
                        ${showDefaultInputs ? `
                            <input type="radio" id="true_false_${q.id}" name="response_${q.id}" value="true" ${q.answer_type === 'true_false' ? 'checked' : ''}>
                            <label for="true_false_${q.id}">True/False</label><br>

                            <input type="radio" id="pass_fail_${q.id}" name="response_${q.id}" value="pass" ${q.answer_type === 'pass_fail' ? 'checked' : ''}>
                            <label for="pass_fail_${q.id}">Pass/Fail</label><br>

                            <input type="radio" id="yes_no_${q.id}" name="response_${q.id}" value="yes" ${q.answer_type === 'yes_no' ? 'checked' : ''}>
                            <label for="yes_no_${q.id}">Yes/No</label>
                        ` : ''}
                    </div>
                </div>

                <div class="col-5">
                    <select class="form-select field-type">
                        <option value="preconfigured" ${q.answer_type === 'preconfigured' ? 'selected' : ''}>Preconfigured</option>
                        <option value="text" ${q.answer_type === 'text' ? 'selected' : ''}>Text</option>
                        <option value="number" ${q.answer_type === 'number' ? 'selected' : ''}>Number</option>
                        <option value="single_select" ${q.answer_type === 'single_select' ? 'selected' : ''}>Single Select</option>
                        <option value="dropdown" ${q.answer_type === 'dropdown' ? 'selected' : ''}>Dropdown</option>
                        <option value="multi_select" ${q.answer_type === 'multi_select' ? 'selected' : ''}>Multi Select</option>
                        <option value="date" ${q.answer_type === 'date' ? 'selected' : ''}>Date</option>
                    </select>
                </div>
            </div>

            <div>
                <button class="btn btn-primary add-question">Add Question</button>
                <button class="btn">Add Signature</button>
                <button class="btn btn-success move-up">Move Up</button>
                <button class="btn btn-warning move-down">Move Down</button>
                <button class="btn btn-info copy">Copy</button>
                <button class="btn btn-danger delete">Delete</button>
            </div>
        </div>
    `;
});

// Append the generated HTML to the container
$("#questionsContainer").html(questionsHtml);

}

// Call the function when the page loads (replace '1' with dynamic ID)
function load_func(){
    // let templateId = new URLSearchParams(window.location.search).get("id");
    // if (templateId) {
    //     get_template_details(templateId);
    // } else {
    //     alert("No template ID provided.");
    // }
    getTemplates();
}

function displayTemplates(){
    const selectElement = document.getElementById("templates");

templates.forEach(template => {
    const option = document.createElement("option");
    option.value = template.id;
    option.text = template.title;
    selectElement.appendChild(option);
});
}

function getTemplates(){
    $.ajax({
    url: "ajax/get_form_templates.php", // Update URL if needed
    type: "POST", // Changed from GET to POST
    dataType: "json",
    data: {}, // Add any necessary data here
    success: function(response) {
        console.log("Form Templates:", response);

        if (response.success) {
           // displayTemplates(response.data); // Call function to handle UI display
           templates = response.data;
           console.log(templates);
           displayTemplates();
        } else {
            alert("Error: " + response.error);
        }
    },
    error: function(xhr, status, error) {
        console.log("Request URL:", this.url); // Print the request URL
        console.log("Status:", status);
        console.log("Error:", error);
        console.error("AJAX Error:", error, status);
        alert("Failed to load templates. Check console for details.");
    }
});

}
</script>


<script>
document.getElementById("questionsContainer").addEventListener("change", function(event) {
    if (event.target.classList.contains("field-type")) {
   


// document.querySelectorAll(".field-type").forEach(function(selectElement) {
//     selectElement.addEventListener("change", function() {
        
        // let selectedValue = this.value;
        let selectedValue = event.target.value;
    // let responseDiv = document.getElementById("responseDiv");

     // Find the closest question card
     let questionCard = event.target.closest(".question-card");

    // Find the responseDiv inside this question card
    let responseDiv = questionCard.querySelector(".responseDiv");

    let content = "";
    console.log(selectedValue);
    switch (selectedValue) {
        case "preconfigured":
            content = `
                <input type="radio" id="trueFalse" name="option" value="true">
                <label for="trueFalse">True/False</label><br>
                <input type="radio" id="passFail" name="option" value="pass">
                <label for="passFail">Pass/Fail</label><br>
                <input type="radio" id="yesNo" name="option" value="yes">
                <label for="yesNo">Yes/No</label>`;
            break;
        case "text":
            content = ``;
            break;
        case "number":
            content = ``;
            break;
        case "single_select":
            content = `
                    <div id="singleSelectContainer">
                        <button class="btn btn-primary mb-2" onclick="addNewRadio()">Add New</button>
                        <div id="singleSelectFields">
                            ${createRadioItem("Option 1")}
                            ${createRadioItem("Option 2")}
                            ${createRadioItem("Option 3")}
                        </div>
                    </div>
            `;
            break;
        case "dropdown":
            content = `
                <div id="dropdownContainer">
                    <button class="btn btn-primary mb-2" onclick="addNewDropdownOption()">Add New</button>
                    <div  id="dropdownSelect">
                        ${createDropdownItem("Option 1")}
                        ${createDropdownItem("Option 2")}
                        ${createDropdownItem("Option 3")}
                    </div>
                </div>
            `;
            break;
        case "multi_select":
            content = `
                     <div id="multiSelectContainer">
                        <button class="btn btn-primary mb-2" onclick="addNewField()">Add New</button>
                        <div id="multiSelectFields">
                            ${createMultiSelectItem("Answer 1")}
                            ${createMultiSelectItem("Answer 2")}
                            ${createMultiSelectItem("Answer 3")}
                        </div>
                    </div>
            `;
            break;
        case "date":
            content = ``;
            break;
        default:
            content = "";
    }
    console.log(selectedValue);

    responseDiv.innerHTML = content;


    // });
}
});

    document.getElementById("saveTemplate").addEventListener("click", function () {
    let templateData = {
        title: document.querySelector("#example-text-input").value,
        description: document.querySelector("#example-text-input").value,
        questions: []
    };

    document.querySelectorAll(".question-card").forEach((card, index) => {
        let questionText = card.querySelector("input[type='text']").value;
        let description = card.querySelectorAll("input[type='text']")[1].value;
        let answer_type = card.querySelector("select").value;
        let options = [];

        if (answer_type === "single_select" || answer_type === "multi_select" || answer_type === "dropdown") {
            card.querySelectorAll(".option-input").forEach((option, optIndex) => {
                options.push({ text: option.value, order: optIndex + 1 });
            });
        }

        templateData.questions.push({
            text: questionText,
            description: description,
            order: index + 1,
            type: answer_type,
            options: options
        });
    });

  
console.log(templateData);
    fetch("./pages/save_template.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(templateData)
})
.then(response => response.json())
.then(data => {alert("Template Saved Successfully!");
console.log(data)}
)
.catch(error => console.error("Error:", error));



});

</script>
                         <script>
// Function to add a new question
document.addEventListener("click", function(event) {
    if (event.target.classList.contains("add-question")) {
        let container = document.getElementById("questionsContainer");
        let questionCard = event.target.closest(".question-card"); 
        let newQuestion = questionCard.cloneNode(true);

        // Reset input fields
        newQuestion.querySelectorAll("input[type='text']").forEach(input => input.value = "  Question");
        newQuestion.querySelectorAll("input[type='radio']").forEach(radio => radio.checked = false);

        container.appendChild(newQuestion);
    }
});

// Function to move a question up
document.addEventListener("click", function(event) {
    if (event.target.classList.contains("move-up")) {
        let questionCard = event.target.closest(".question-card");
        let prevQuestion = questionCard.previousElementSibling;
        if (prevQuestion) {
            questionCard.parentNode.insertBefore(questionCard, prevQuestion);
        }
    }
});

// Function to move a question down
document.addEventListener("click", function(event) {
    if (event.target.classList.contains("move-down")) {
        let questionCard = event.target.closest(".question-card");
        let nextQuestion = questionCard.nextElementSibling;
        if (nextQuestion) {
            questionCard.parentNode.insertBefore(nextQuestion, questionCard);
        }
    }
});

// Function to copy a question
document.addEventListener("click", function(event) {
    if (event.target.classList.contains("copy")) {
        let questionCard = event.target.closest(".question-card");
        let newQuestion = questionCard.cloneNode(true);

        // Append below the current question
        questionCard.parentNode.insertBefore(newQuestion, questionCard.nextElementSibling);
    }
});

// Function to delete a question
document.addEventListener("click", function(event) {
    if (event.target.classList.contains("delete")) {
        let questionCard = event.target.closest(".question-card");
        if (document.querySelectorAll(".question-card").length > 1) {
            questionCard.remove();
        } else {
            alert("At least one question must remain!");
        }
    }
});
</script>
              
<script>
   
// Function to create a multi-select input item
function createMultiSelectItem(value) {
    return `
        <div class="multi-select-item d-flex align-items-center mb-2">
            <input type="text" class="option-input form-control form-control-sm me-2" value="${value}">
            <button class="btn btn-sm btn-secondary me-1" onclick="moveUp(this)">Up</button>
            <button class="btn btn-sm btn-secondary me-1" onclick="moveDown(this)">Dn</button>
            <button class="btn btn-sm btn-danger" onclick="deleteItem(this)">Del</button>
        </div>
    `;
}

// Function to create a radio button item
function createRadioItem(value) {
    return `
        <div class="radio-item d-flex align-items-center mb-2">
            <input type="text" class="option-input form-control form-control-sm me-2" value="${value}">
            <button class="btn btn-sm btn-secondary me-1" onclick="moveUp(this)">Up</button>
            <button class="btn btn-sm btn-secondary me-1" onclick="moveDown(this)">Dn</button>
            <button class="btn btn-sm btn-danger" onclick="deleteItem(this)">Del</button>
        </div>
    `;
}

// Function to create a dropdown option
function createDropdownItem(value) {
    return `
    <div class="drop-down-item d-flex align-items-center mb-2">
            <input type="text" class="option-input form-control form-control-sm me-2" value="${value}">
            <button class="btn btn-sm btn-secondary me-1" onclick="moveUp(this)">Up</button>
            <button class="btn btn-sm btn-secondary me-1" onclick="moveDown(this)">Dn</button>
            <button class="btn btn-sm btn-danger" onclick="deleteItem(this)">Del</button>
        </div>
    `;
}

// Function to add a new field in multi-select
function addNewField() {
    let container = document.getElementById("multiSelectFields");
    let newItem = document.createElement("div");
    newItem.innerHTML = createMultiSelectItem("New Answer");
    container.appendChild(newItem.firstElementChild);
}

// Function to add a new radio button in single select
function addNewRadio() {
    let container = document.getElementById("singleSelectFields");
    let newItem = document.createElement("div");
    newItem.innerHTML = createRadioItem("New Option");
    container.appendChild(newItem.firstElementChild);
}

// Function to add a new dropdown option
function addNewDropdownOption() {
    let dropdown = document.getElementById("dropdownSelect");
    let newOption = document.createElement("div");
    newOption.innerHTML = createDropdownItem("New Option");
    dropdown.appendChild(newOption.firstElementChild);
}

// Function to move an item up
function moveUp(button) {
    let item = button.parentElement;
    console.log(item);
    let prevItem = item.previousElementSibling;
    console.log(prevItem);
    if (prevItem) {
    console.log("yes");

        item.parentNode.insertBefore(item, prevItem);
    }
}

// Function to move an item down
function moveDown(button) {
    let item = button.parentElement;
    let nextItem = item.nextElementSibling;
    if (nextItem) {
        item.parentNode.insertBefore(nextItem, item);
    }
}

// Function to delete an item
function deleteItem(button) {
    let item = button.parentElement;
    item.parentNode.removeChild(item);
}
</script>
                     
                      


               

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
