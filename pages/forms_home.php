
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
                                    <h4 class="mb-sm-0 font-size-18">Create Template</h4>

                                    <!-- <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                            <li class="breadcrumb-item active">Create Template</li>
                                        </ol>
                                    </div> -->

                                </div>
                            </div>
                            <div class="col-3">
                                <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                            <li class="breadcrumb-item active">Create Template</li>
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
                                    <label for="example-text-input" class="form-label">Enter template title</label>

                                            <input class="form-control form-control-lg" type="text" value="" placeholder="Enter Template Title" id="example-text-input">

                                        <div class="mt-3">
                                        <label for="example-text-input" class="form-label">Enter template description</label>

                                            <input class="form-control" type="text" value="" placeholder="Enter Template Description" id="example-text-input">
                                        </div>
                                        <div id="questionsContainer">

                                            <div class="card-body question-card">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <input class="form-control mb-3" type="text" value="" placeholder="Question" id="example-text-input">
                                                        <input class="form-control" type="text" value="" placeholder="Description" id="example-text-input">
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

                                                <!-- <div> -->
                                                 

                                                    <!-- <button class="btn">Add Signature</button> -->
                                                    <!-- <button class="btn btn-primary add-question" ><i class="dripicons-plus"></i></button> -->
<div  style="float:right;">

<button class="btn btn-success move-up"><i class="dripicons-arrow-thin-up"></i></button>
                                                    <button class="btn btn-warning move-down"><i class="dripicons-arrow-thin-down"></i></button>
                                                    <button class="btn btn-info copy"><i class="dripicons-copy"></i></button>
                                                    <button class="btn btn-danger delete"><i class="dripicons-trash"></i></button>
</div>
                                                <!-- </div> -->
                                           
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
                                            <button class="btn btn-success" id="saveTemplate">Save Template</button>

                                        </center>
                                    </div>
                                    

                                </div>

                            </div>

                         </div>
<script>
    let templateId = null;
    function load_func(){
        
        saveTemplate();
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
                        <div id="singleSelectFields">
                            ${createRadioItem("Option 1")}
                            ${createRadioItem("Option 2")}
                            ${createRadioItem("Option 3")}
                        </div>
                        <button class="btn btn-primary mb-2" onclick="addNewRadio()">Option <i class="dripicons-plus"></i></button>

                    </div>
            `;
            break;
        case "dropdown":
            content = `
                <div id="dropdownContainer">
                    <div  id="dropdownSelect">
                        ${createDropdownItem("Option 1")}
                        ${createDropdownItem("Option 2")}
                        ${createDropdownItem("Option 3")}
                    </div>
                    <button class="btn btn-primary mb-2" onclick="addNewDropdownOption()">Option <i class="dripicons-plus"></i></button>

                </div>
            `;
            break;
        case "multi_select":
            content = `
                     <div id="multiSelectContainer">
                        <div id="multiSelectFields">
                            ${createMultiSelectItem("Answer 1")}
                            ${createMultiSelectItem("Answer 2")}
                            ${createMultiSelectItem("Answer 3")}
                        </div>
                        <button class="btn btn-primary mb-2" onclick="addNewField()">Option <i class="dripicons-plus"></i></button>

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
        saveTemplate();
    });

function saveTemplate(){
    let templateData = {
        title: document.querySelector("#example-text-input").value,
        description: document.querySelector("#example-text-input").value,
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

        templateData.questions.push({
            text: questionText,
            description: description,
            order: index + 1,
            type: answerType,
            options: options
        });
    });

console.log(templateData);
    fetch("pages/save_template.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(templateData)
})
.then(response => response.json())
.then(data => {
    // alert("Template Saved Successfully!");
    console.log(data);
    templateId = data.template_id;
    // location.reload();
}
)
.catch(error => console.error("Error:", error));
}



// let templateId = null; // Stores template ID once saved
let saveTimeout;

function autoSaveTemplate() {
    clearTimeout(saveTimeout);
    saveTimeout = setTimeout(() => {
        if (templateId) {
            updateTemplate(); // Update if template already exists
        } else {
            saveTemplate(); // Save new template
        }
    }, 300); // 1s debounce
}

document.addEventListener("DOMContentLoaded", () => {
    document.querySelector("#example-text-input").addEventListener("input", autoSaveTemplate);
    
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
    let templateData = collectTemplateData();
    templateData.template_id = templateId; // Add template ID

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
        title: document.querySelector("#example-text-input").value,
        description: document.querySelector("#example-text-input").value,
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
// Function to add a new question
// document.addEventListener("click", function(event) {
//     if (event.target.classList.contains("add-question" ) ||
//         event.target.classList.contains("dripicons-plus")) {
//         let container = document.getElementById("questionsContainer");
//         let questionCard = event.target.closest(".question-card"); 

//         let newQuestion = questionCard.cloneNode(true);

//         // Reset input fields
//         newQuestion.querySelectorAll("input[type='text']").forEach(input => input.value = "  Question");
//         newQuestion.querySelectorAll("input[type='radio']").forEach(radio => radio.checked = false);

//         container.appendChild(newQuestion);
//         updateTemplate();

//     }
// });

document.addEventListener("click", function(event) {
    if (
        event.target.classList.contains("add-question") ||
        event.target.classList.contains("dripicons-plus")
    ) {
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
        } else {
            alert("At least one question must remain!");
        }
        updateTemplate();

    }
});
</script>
                         <script>
                            /*
document.getElementById("fieldType").addEventListener("change", function() {
    let selectedValue = this.value;
    let responseDiv = document.getElementById("responseDiv");

    let content = "";
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
                        <button class="btn btn-primary mb-2" onclick="addNewRadio()">Option <i class="dripicons-plus"></i></button>
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
                    <button class="btn btn-primary mb-2" onclick="addNewDropdownOption()">Option <i class="dripicons-plus"></i></button>
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
                        <button class="btn btn-primary mb-2" onclick="addNewField()">Option <i class="dripicons-plus"></i></button>
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

    responseDiv.innerHTML = content;
}); */
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
            <button class="btn btn-sm btn-secondary me-1" onclick="moveUp(this)"><i class="dripicons-arrow-thin-up skiptrigger"></i></button>
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
