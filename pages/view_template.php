

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
</style>
<div class="page-content">
                    <div class="container-fluid">


                        <!-- start page title -->
                        <div class="row">
                            <div class="col-9">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Update Checklist</h4>

                                   

                                </div>
                            </div>
                            <div class="col-3">
                                <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                            <li class="breadcrumb-item active">Update Checklist</li>
                                        </ol>
                                        <div id="lastUpdated" class="m-0">

                                        </div>
                                    </div>
                                
                            </div>
                        </div>
                        <!-- end page title -->
                         <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                            <input class="form-control form-control-lg" type="text" value="  Title" id="example-text-input-title">
                                            <label for="example-text-input" class="form-label">Enter section title</label>

                                        <div class="mt-3">
                                            <input class="form-control" type="text" value="  Description" id="example-text-input-desc">
                                            <label for="example-text-input" class="form-label">Enter section description</label>
                                        </div>
                                        <div id="questionsContainer">

                                            <div class="card-body  question-card " style="margin-bottom: 1px solid;">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <input class="form-control mb-3" type="text" value="  Question" id="example-text-input">

                                                        <input class="form-control" type="text" value="  Description" id="example-text-input">
                                                        <div id="responseDiv" class="mt-3 responseDiv">
                                                            <!-- <input type="radio" id="html" name="fav_language" value="true">
                                                            <label for="html">True/False</label><br>
                                                            <input type="radio" id="css" name="fav_language" value="pass">
                                                            <label for="css">Pass/Fail</label><br>
                                                            <input type="radio" id="javascript" name="fav_language" value="yes">
                                                            <label for="javascript">Yes/No</label> -->
                                                        </div>
                                                    </div>
                                                    <div class="col-5">
                                                        <select class="form-select field-type" id="fieldType">

                                                            <option value="text">Text</option>
                                                            <option value="number">Number</option>
                                                            <option value="single_select">Single Select</option>
                                                            <option value="dropdown">Dropdown</option>
                                                            <option value="multi_select">Multi Select</option>
                                                            <option value="date">Date</option>
                                                            <option value="preconfigured">Preconfigured</option>

                                                        </select>

                                                       
                                                    </div>

                                                </div>
                                                <div style="float: right;">
                                                
                                                    <!-- <button class="btn btn-primary add-question"><i class="dripicons-plus"></i></button> -->
                                                    <!-- <button class="btn">Add Signature</button> -->
                                                    <button class="btn btn-success move-up"> <i class="dripicons-arrow-thin-up"></i> </button>
                                                    <button class="btn btn-warning move-down"><i class="dripicons-arrow-thin-down"></i></button>
                                                    <button class="btn btn-info copy"><i class="dripicons-copy"></i></button>
                                                    <button class="btn btn-danger delete"><i class="dripicons-trash"></i></button>
                                            </div>
                                                
                                            </div>
                                        </div>

                                        
                                    </div>
                                      
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-11"></div>
                                            <div class="col-1">
                                                <button class="btn btn-primary add-question" style="width:-webkit-fill-available"><i class="dripicons-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                                                
                                    <div class="card-footer">
                                        <center>
                                            <button class="btn btn-success" id="saveTemplate">Update Checklist</button>

                                        </center>
                                    </div>
                                </div>

                            </div>

                         </div>

<script src="assets/js/audit/template.js"></script>
                         
<script>
    let question_number = 1;
    let templateId = null;
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
$("#questionsContainer").html(``);

questions.forEach(q => {
    let questionsHtml = ``;

    let optionsHtml = "";
    let showDefaultInputs = true; // By default, show radio buttons

    // Find options belonging to the current question
    let relatedOptions = options.filter(o => o.question_id == q.question_id);
    let IsRadioPresent = false;
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
    else if(q.answer_type === "preconfigured"){
        IsRadioPresent = true;
                optionsHtml = ` 
                <div class="mt-3">
                 <input type="radio" id="true_false_${q.question_id}" name="response_${question_number}" value="true" ${q.answer_type === 'true_false' ? 'checked' : ''}>
                            <label for="true_false_${q.question_id}">True/False</label><br>

                            <input type="radio" id="pass_fail_${q.question_id}" name="response_${question_number}" value="pass" ${q.answer_type === 'pass_fail' ? 'checked' : ''}>
                            <label for="pass_fail_${q.question_id}">Pass/Fail</label><br>

                            <input type="radio" id="yes_no_${q.question_id}" name="response_${question_number}" value="yes" ${q.answer_type === 'yes_no' ? 'checked' : ''}>
                            <label for="yes_no_${q.question_id}">Yes/No</label> </div>
                `;
            }

    questionsHtml += `
        <div class="card-body question-card " style="margin-bottom: 1px solid beige;">
            <hr style="height:2px;">

            <div class="row">
                <div class="col-7">
                    <input class="form-control mb-3" type="text" value="${q.question_title}" id="question-title">
                    <input class="form-control" type="text" value="${q.question_description}" id="question-description">
                    
                    <div class="mt-3 responseDiv">
                            <input type="hidden" value="${question_number}" class="question_number_val">

                        ${optionsHtml}
                        
                        ${showDefaultInputs ? `` : ''}
                    </div>
                </div>

                <div class="col-5">
                    <select class="form-select field-type">

                        <option value="text" ${q.answer_type === 'text' ? 'selected' : ''}>Text</option>
                        <option value="number" ${q.answer_type === 'number' ? 'selected' : ''}>Number</option>
                        <option value="single_select" ${q.answer_type === 'single_select' ? 'selected' : ''}>Single Select</option>
                        <option value="dropdown" ${q.answer_type === 'dropdown' ? 'selected' : ''}>Dropdown</option>
                        <option value="multi_select" ${q.answer_type === 'multi_select' ? 'selected' : ''}>Multi Select</option>
                        <option value="date" ${q.answer_type === 'date' ? 'selected' : ''}>Date</option>
                        <option value="preconfigured" ${q.answer_type === 'preconfigured' ? 'selected' : ''}>Preconfigured</option>


                    </select>
                </div>
            </div>

            <div style="float: right;">

                <!--  <button class="btn btn-primary add-question"><i class="dripicons-plus"></i></button> -->
                <!-- <button class="btn">Add Signature</button> -->
                <button class="btn btn-success move-up"><i class="dripicons-arrow-thin-up"></i></button>
                <button class="btn btn-warning move-down"><i class="dripicons-arrow-thin-down"></i></button>
                <button class="btn btn-info copy"><i class="dripicons-copy"></i></button>
                <button class="btn btn-danger delete"><i class="dripicons-trash"></i></button>
            </div>
        </div>
    `;
$("#questionsContainer").append(questionsHtml);
    
    createEventListenerForRadio(IsRadioPresent, question_number);
    
    question_number++;

});

// Append the generated HTML to the container
// $("#questionsContainer").html(questionsHtml);
}

// Call the function when the page loads (replace '1' with dynamic ID)
function load_func(){
    templateId = new URLSearchParams(window.location.search).get("id");
    if (templateId) {
        get_template_details(templateId);
        setLastUpdated();
    } else {
        alert("No template ID provided.");
    }
}

function setLastUpdated(){
    fetch("ajax/get_last_updated.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
            'templateId': templateId
        })
    })
    .then(response => response.json())
    .then(data => {
        console.log("Last Updated:", data.data[0]);
        console.log(data.data[0].updated_at);
        lastUpdated = data.data[0].updated_at;
        $("#lastUpdated").html("<p>Last Updated : "+lastUpdated+"</p>");
    })
    .catch(error => console.error("Error:", error));
}


let saveTimeout;

function autoSaveTemplate() {
    clearTimeout(saveTimeout);
    saveTimeout = setTimeout(() => {
        if (templateId) {
            updateTemplate(); // Update if template already exists
        } else {
            saveTemplate(); // Save new template
        }
    }, 500); // 1s debounce
}

document.addEventListener("DOMContentLoaded", () => {
    document.querySelector("#example-text-input").addEventListener("input", autoSaveTemplate);
    document.querySelector("#example-text-input-title").addEventListener("input", autoSaveTemplate);
    document.querySelector("#example-text-input-desc").addEventListener("input", autoSaveTemplate);

    
    document.addEventListener("input", (event) => {
        if (event.target.matches(".question-card input[type='text'], .option-input")) {
            autoSaveTemplate();
        }
    });

    document.addEventListener("change", (event) => {
        if (event.target.matches(".question-card select")) {
            autoSaveTemplate();
        }
    });
});

// Function to Save a New Template
function saveTemplate1() {
    let templateData = collectTemplateData();

    fetch("pages/save_template.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(templateData)
    })
    .then(response => response.json())
    .then(data => {
        console.log("Template Saved:", data);
        templateId = data.template_id; // Store template ID for future updates
    })
    .catch(error => console.error("Error:", error));
}

// Function to Update an Existing Template
function updateTemplate() {
    console.log("updatetemplate");
    let templateData = collectTemplateData();
    templateData.template_id = templateId; // Add template ID
    console.log(templateData);

    fetch("pages/update_template.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(templateData)
    })
    .then(response => response.json())
    .then(data => {
        console.log("Template Updated:", data);
    })
    .catch(error => console.error("Error:", error));
    setLastUpdated();
}

// Function to Collect Template Data
function collectTemplateData() {
    let templateData = {
        title: document.querySelector("#example-text-input-title").value,
        description: document.querySelector("#example-text-input-desc").value,
        questions: []
    };

    document.querySelectorAll(".question-card").forEach((card, index) => {
        let questionText = card.querySelector("input[type='text']").value;
        let description = card.querySelectorAll("input[type='text']")[1].value;
        let answerType = card.querySelector("select").value;
        let options = [];

        if (answerType === "single_select" || answerType === "multi_select" || answerType === "dropdown") {
            card.querySelectorAll(".option-input").forEach((option, optIndex) => {
                options.push({ text: option.value, order: optIndex + 1 });
            });
        }
        if(answerType === "preconfigured"){
            let current_question_number = null;
            // Find the responseDiv inside this question card
            let responseDiv = card.querySelector(".responseDiv");
            console.log(responseDiv);
            let current_question_elem = responseDiv.querySelector(".question_number_val");
            console.log(current_question_elem);

            let question_number = current_question_elem.value;
            console.log("question_number - "+ question_number);

            const selectedValue = $(`input[name="response_${question_number}"]:checked`).val();
            console.log("selectedValue - "+ selectedValue);

            options.push({ text: selectedValue, order: 1 });

        }

        templateData.questions.push({
            text: questionText,
            description: description,
            order: index + 1,
            type: answerType,
            options: options
        });
    });

    return templateData;
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
    let IsRadioPresent = false;
    console.log(selectedValue);
    switch (selectedValue) {
        case "preconfigured":
            IsRadioPresent = true;
                
            content = `
                            <input type="hidden" value="${question_number}" class="question_number_val">

                <input type="radio" id="trueFalse" name="response_${question_number}" value="true">
                <label for="trueFalse">True/False</label><br>
                <input type="radio" id="passFail" name="response_${question_number}" value="pass">
                <label for="passFail">Pass/Fail</label><br>
                <input type="radio" id="yesNo" name="response_${question_number}" value="yes">
                <label for="yesNo">Yes/No</label>`;
            break;
        case "text":
            content = `<input type="hidden" value="${question_number}" class="question_number_val">`;
            break;
        case "number":
            content = `<input type="hidden" value="${question_number}" class="question_number_val">`;
            break;
        case "single_select":
            content = `<input type="hidden" value="${question_number}" class="question_number_val">
                    <div id="singleSelectContainer">
                        <div id="singleSelectFields">
                            ${createRadioItem("Option 1")}
                            ${createRadioItem("Option 2")}
                            ${createRadioItem("Option 3")}
                        </div>
                        <button class="btn btn-primary mb-2" onclick="addNewRadio()">Add New</button>

                    </div>
            `;
            break;
        case "dropdown":
            content = `<input type="hidden" value="${question_number}" class="question_number_val">
                <div id="dropdownContainer">
                    <div  id="dropdownSelect">
                        ${createDropdownItem("Option 1")}
                        ${createDropdownItem("Option 2")}
                        ${createDropdownItem("Option 3")}
                    </div>
                    <button class="btn btn-primary mb-2" onclick="addNewDropdownOption()">Add New</button>

                </div>
            `;
            break;
        case "multi_select":
            content = `<input type="hidden" value="${question_number}" class="question_number_val">
                     <div id="multiSelectContainer">
                        <div id="multiSelectFields">
                            ${createMultiSelectItem("Answer 1")}
                            ${createMultiSelectItem("Answer 2")}
                            ${createMultiSelectItem("Answer 3")}
                        </div>
                        <button class="btn btn-primary mb-2" onclick="addNewField()">Add New</button>

                    </div>
            `;
            break;
        case "date":
            content = `<input type="hidden" value="${question_number}" class="question_number_val">`;
            break;
        default:
            content = `<input type="hidden" value="${question_number}" class="question_number_val">`;
    }
    console.log(selectedValue);

    responseDiv.innerHTML = content;
    createEventListenerForRadio(IsRadioPresent, question_number)
    


    // });
}
});

    document.getElementById("saveTemplate").addEventListener("click", function () {
        saveTemplate();

});

function saveTemplate(){
    let templateData = {
        title: document.querySelector("#example-text-input-title").value,
        description: document.querySelector("#example-text-input-desc").value,
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

    // Send data to backend
    // fetch("save_template.php", {
    //     method: "POST",
    //     headers: { "Content-Type": "application/json" },
    //     body: JSON.stringify(templateData)
    // })
    // .then(response => response.json())
    // .then(data => alert("Template Saved Successfully!"))
    // .catch(error => console.error("Error:", error));
console.log(templateData);
    fetch("http://localhost/AuditByAnshad/pages/save_template.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(templateData)
})
.then(response => response.json())
.then(data => {alert("Template Saved Successfully!");
console.log(data)}
)
.catch(error => console.error("Error:", error));


}

</script>
                         <script>





document.addEventListener("click", function(event) {
    if (
        event.target.classList.contains("add-question") ||
        event.target.classList.contains("dripicons-plus")
    ) {
        question_number++;

        const container = document.getElementById("questionsContainer");

        if (!container) return;

        container.insertAdjacentHTML("beforeend", `

            <div class="card-body question-card">
            <hr>

                <div class="row">
                    <div class="col-7">
                        <input class="form-control mb-3" type="text" value="" placeholder="Question" id="example-text-input">
                        <input class="form-control" type="text" value="" placeholder="Description" id="example-text-input">
                        <div id="responseDiv" class="mt-3 responseDiv">
                            <input type="hidden" value="${question_number}" class="question_number_val">

                            <!-- Radio options can be dynamically added here -->
                        </div>
                    </div>
                    <div class="col-5">
                        <select class="form-select field-type" id="fieldType">
                            <option value="text">Text</option>
                            <option value="number">Number</option>
                            <option value="single_select">Single Select</option>
                            <option value="dropdown">Dropdown</option>
                            <option value="multi_select">Multi Select</option>
                            <option value="date">Date</option>
                            <option value="preconfigured">Preconfigured</option>
                        </select>
                    </div>
                </div>
                <div style="float:right;">
                    <button class="btn btn-success move-up"><i class="dripicons-arrow-thin-up"></i></button>
                    <button class="btn btn-warning move-down"><i class="dripicons-arrow-thin-down"></i></button>
                    <button class="btn btn-info copy"><i class="dripicons-copy"></i></button>
                    <button class="btn btn-danger delete"><i class="dripicons-trash"></i></button>
                </div>
            </div>
        `);
    }
});


// Function to move a question up
document.addEventListener("click", function(event) {
    if (event.target.classList.contains("move-up")
    ||
    event.target.classList.contains("dripicons-arrow-thin-up")
) {
    if(event.target.classList.contains("skiptrigger")){
        return;
    }
        let questionCard = event.target.closest(".question-card");
        let prevQuestion = questionCard.previousElementSibling;
        if (prevQuestion) {
            questionCard.parentNode.insertBefore(questionCard, prevQuestion);
        }
        updateTemplate();

    }
});

// Function to move a question down
document.addEventListener("click", function(event) {
    if (event.target.classList.contains("move-down")
    ||
    event.target.classList.contains("dripicons-arrow-thin-down")
) {
    if(event.target.classList.contains("skiptrigger")){
        return;
    }
        let questionCard = event.target.closest(".question-card");
        let nextQuestion = questionCard.nextElementSibling;
        if (nextQuestion) {
            questionCard.parentNode.insertBefore(nextQuestion, questionCard);
        }
        updateTemplate();

    }
});

// Function to copy a question
document.addEventListener("click", function(event) {
    if (event.target.classList.contains("copy")
    ||
    event.target.classList.contains("dripicons-copy")
) {
    if(event.target.classList.contains("skiptrigger")){
        return;
    }
        let questionCard = event.target.closest(".question-card");
        let newQuestion = questionCard.cloneNode(true);

        // Append below the current question
        questionCard.parentNode.insertBefore(newQuestion, questionCard.nextElementSibling);
        updateTemplate();

    }
});

// Function to delete a question
document.addEventListener("click", function(event) {
    if (event.target.classList.contains("delete")
    ||
    event.target.classList.contains("dripicons-trash")

) {
    if(event.target.classList.contains("skiptrigger")){
        return;
    }
        let questionCard = event.target.closest(".question-card");
        if (document.querySelectorAll(".question-card").length > 1) {
            questionCard.remove();
        question_number--;

        } else {
            alert("At least one question must remain!");
        }
        updateTemplate();

    }
});


</script>
                         <script>
      
</script>
<script>
   
// Function to create a multi-select input item
function createMultiSelectItem(value) {
    return `
        <div class="multi-select-item d-flex align-items-center mb-2">
            <input type="text" class="option-input form-control form-control-sm me-2" value="${value}">
            <button class="btn btn-sm btn-secondary me-1" onclick="moveUp(this)"><i class="dripicons-arrow-thin-up skiptrigger"></i></button>
            <button class="btn btn-sm btn-secondary me-1" onclick="moveDown(this)"><i class="dripicons-arrow-thin-down skiptrigger"></i></button>
            <button class="btn btn-sm btn-danger" onclick="deleteItem(this)"><i class="dripicons-trash skiptrigger"></i></button>
        </div>
    `;
}

// Function to create a radio button item
function createRadioItem(value) {
    return `
        <div class="radio-item d-flex align-items-center mb-2">
            <input type="text" class="option-input form-control form-control-sm me-2" value="${value}">
            <button class="btn btn-sm btn-secondary me-1 move-up" onclick="moveUp(this)"><i class="dripicons-arrow-thin-up skiptrigger"></i></button>
            <button class="btn btn-sm btn-secondary me-1" onclick="moveDown(this)"><i class="dripicons-arrow-thin-down skiptrigger"></i></button>
            <button class="btn btn-sm btn-danger" onclick="deleteItem(this)"><i class="dripicons-trash skiptrigger"></i></button>
        </div>
    `;
}

// Function to create a dropdown option
function createDropdownItem(value) {
    return `
    <div class="drop-down-item d-flex align-items-center mb-2">
            <input type="text" class="option-input form-control form-control-sm me-2" value="${value}">
            <button class="btn btn-sm btn-secondary me-1" onclick="moveUp(this)"><i class="dripicons-arrow-thin-up skiptrigger"></i></button>
            <button class="btn btn-sm btn-secondary me-1" onclick="moveDown(this)"><i class="dripicons-arrow-thin-down skiptrigger"></i></button>
            <button class="btn btn-sm btn-danger" onclick="deleteItem(this)"><i class="dripicons-trash skiptrigger"></i></button>
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
