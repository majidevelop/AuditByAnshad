
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
                                    <h4 class="mb-sm-0 font-size-18">Create Template</h4>

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
                                    <div class="card-header">
                                            <input class="form-control form-control-lg" type="text" value="  Title" id="example-text-input">
                                            <label for="example-text-input" class="form-label">Enter section title</label>

                                        <div class="mt-3">
                                            <input class="form-control" type="text" value="  Description" id="example-text-input">
                                            <label for="example-text-input" class="form-label">Enter section description</label>
                                        </div>
                                        <div id="questionsContainer">

                                            <div class="card-body  question-card p-4">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <input class="form-control mb-3" type="text" value="  Question" id="example-text-input">

                                                        <input class="form-control" type="text" value="  Description" id="example-text-input">
                                                        <div id="responseDiv" class="mt-3 responseDiv">
                                                            <input type="radio" id="html" name="fav_language" value="true">
                                                            <label for="html">True/False</label><br>
                                                            <input type="radio" id="css" name="fav_language" value="pass">
                                                            <label for="css">Pass/Fail</label><br>
                                                            <input type="radio" id="javascript" name="fav_language" value="yes">
                                                            <label for="javascript">Yes/No</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-5">
                                                        <select class="form-select field-type" id="fieldType">
                                                            <option value="preconfigured">Preconfigured</option>
                                                            <option value="text">Text</option>
                                                            <option value="number">Number</option>
                                                            <option value="single_select">Single Select</option>
                                                            <option value="dropdown">Dropdown</option>
                                                            <option value="multi_select">Multi Select</option>
                                                            <option value="date">Date</option>
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
                                        </div>

                                        
                                    </div>
                                    <button class="btn" id="saveTemplate">Save Template</button>

                                </div>

                            </div>

                         </div>
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

    responseDiv.innerHTML = content;
}); */
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
