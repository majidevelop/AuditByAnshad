
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
                                    <h4 class="mb-sm-0 font-size-18">Basic Elements</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                            <li class="breadcrumb-item active">Basic Elements</li>
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
                                            <input class="form-control form-control-lg" type="text" value="Placeholder Title" id="example-text-input">
                                            <label for="example-text-input" class="form-label">Enter section title</label>

                                        <div class="card-header">
                                            <input class="form-control" type="text" value="Placeholder Description" id="example-text-input">
                                            <label for="example-text-input" class="form-label">Enter section description</label>
                                        </div>
                                        <div id="questionsContainer">

                                            <div class="card-body  question-card p-4">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <input class="form-control mb-3" type="text" value="Placeholder Question" id="example-text-input">

                                                        <input class="form-control" type="text" value="Placeholder Description" id="example-text-input">
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
    fetch("save_template.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(templateData)
    })
    .then(response => response.json())
    .then(data => alert("Template Saved Successfully!"))
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
        newQuestion.querySelectorAll("input[type='text']").forEach(input => input.value = "Placeholder Question");
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
            <input type="text" class="form-control form-control-sm me-2" value="${value}">
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
            <input type="text" class="form-control form-control-sm me-2" value="${value}">
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
            <input type="text" class="form-control form-control-sm me-2" value="${value}">
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
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Textual inputs</h4>
                                        <p class="card-title-desc">Here are examples of <code>.form-control</code> applied to each
                                            textual HTML5 <code>&lt;input&gt;</code> <code>type</code>.</p>
                                    </div>
                                    <div class="card-body p-4">
        
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div>
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Text</label>
                                                        <input class="form-control" type="text" value="Artisanal kale" id="example-text-input">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="example-search-input" class="form-label">Search</label>
                                                        <input class="form-control" type="search" value="How do I shoot web" id="example-search-input">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="example-email-input" class="form-label">Email</label>
                                                        <input class="form-control" type="email" value="bootstrap@example.com" id="example-email-input">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="example-url-input" class="form-label">URL</label>
                                                        <input class="form-control" type="url" value="https://getbootstrap.com" id="example-url-input">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="example-tel-input" class="form-label">Telephone</label>
                                                        <input class="form-control" type="tel" value="1-(555)-555-5555" id="example-tel-input">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="example-password-input" class="form-label">Password</label>
                                                        <input class="form-control" type="password" value="hunter2" id="example-password-input">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="example-number-input" class="form-label">Number</label>
                                                        <input class="form-control" type="number" value="42" id="example-number-input">
                                                    </div>
                                                    <div>
                                                        <label for="example-datetime-local-input" class="form-label">Date and time</label>
                                                        <input class="form-control" type="datetime-local" value="2019-08-19T13:45:00" id="example-datetime-local-input">
                                                    </div>
                                                    
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mt-3 mt-lg-0">
                                                    <div class="mb-3">
                                                        <label for="example-date-input" class="form-label">Date</label>
                                                        <input class="form-control" type="date" value="2019-08-19" id="example-date-input">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="example-month-input" class="form-label">Month</label>
                                                        <input class="form-control" type="month" value="2019-08" id="example-month-input">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="example-week-input" class="form-label">Week</label>
                                                        <input class="form-control" type="week" value="2019-W33" id="example-week-input">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="example-time-input" class="form-label">Time</label>
                                                        <input class="form-control" type="time" value="13:45:00" id="example-time-input">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="example-color-input" class="form-label">Color picker</label>
                                                        <input type="color" class="form-control form-control-color mw-100" id="example-color-input" value="#5156be" title="Choose your color">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Select</label>
                                                        <select class="form-select">
                                                            <option>Select</option>
                                                            <option>Large select</option>
                                                            <option>Small select</option>
                                                        </select>
                                                    </div>
            
                                                    <div>
                                                        <label for="exampleDataList" class="form-label">Datalists</label>
                                                        <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                                                        <datalist id="datalistOptions">
                                                            <option value="San Francisco">
                                                            <option value="New York">
                                                            <option value="Seattle">
                                                            <option value="Los Angeles">
                                                            <option value="Chicago">
                                                        </datalist>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <!-- Start row -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Sizing</h4>
                                        <p class="card-title-desc">Set heights using classes like <code>.form-control-lg</code> and <code>.form-control-sm</code>.</p>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="mb-4">
                                                <label class="form-label" for="default-input">Default input</label>
                                                <input class="form-control" type="text" id="default-input" placeholder="Default input">
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label" for="form-sm-input">Form Small input</label>
                                                <input class="form-control form-control-sm" type="text" id="form-sm-input" placeholder=".form-control-sm">
                                            </div>
                                            <div>
                                                <label class="form-label" for="form-lg-input">Form Large input</label>
                                                <input class="form-control form-control-lg" type="text" id="form-lg-input" placeholder=".form-control-lg">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Range Inputs</h4>
                                        <p class="card-title-desc">Create custom <code>&lt;input type="range"&gt;</code>
                                            controls with <code>.form-range</code>.</p>
                                    </div>
                                    <div class="card-body">
                                        

                                        <div class="mb-3">
                                            <label for="customRange1" class="form-label">Example range</label>
                                            <input type="range" class="form-range" id="customRange1">
                                        </div>

                                        <div class="mb-4">
                                            <h5 class="font-size-14 mb-1">Min and max</h5>
                                            <p class="card-title-desc mb-2">Range inputs have implicit values for min and
                                                max—0 and 100, respectively.</p>
                                            <input type="range" class="form-range" min="0" max="5" id="customRange2">
                                        </div>

                                        <div>
                                            <h5 class="font-size-14 mb-1">Steps</h5>
                                            <p class="card-title-desc mb-2">By default, range inputs “snap” to integer
                                                values. To change this, you can specify a <code>step</code> value.</p>
                                            <input type="range" class="form-range" min="0" max="5" id="customRange3">
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- End row -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Form layouts</h4>
                                        <p class="card-title-desc">Form layout options : from inline, horizontal & custom grid implementations</p>
                                    </div>
                                    <div class="card-body p-4">
                                        
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <div>
                                                    <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i> Form groups</h5>
                                                    <form>
                                                        <div class="mb-3">
                                                            <label class="form-label" for="formrow-firstname-input">First name</label>
                                                            <input type="text" class="form-control" id="formrow-firstname-input" placeholder="Enter Name">
                                                        </div>
            
                                                        <div class="row">                                                            
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Email</label>
                                                                    <input type="email" class="form-control" id="formrow-email-input" placeholder="Enter your Email">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-password-input">Password</label>
                                                                    <input type="password" class="form-control" id="formrow-password-input" placeholder="Enter your password">
                                                                </div>
                                                            </div>
                                                        </div>
            
            
                                                        <div class="form-group">
                                                            
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="formrow-customCheck">
                                                                <label class="form-check-label" for="formrow-customCheck">Check me out</label>
                                                            </div>
                                                        </div>
                                                        <div class="mt-4">
                                                            <button type="submit" class="btn btn-primary w-md">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 ms-lg-auto">
                                                <div class="mt-4 mt-lg-0">
                                                    <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i> Horizontal form</h5>
                                                    
                                                    <form>
                                                        <div class="row mb-4">
                                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">First name</label>
                                                            <div class="col-sm-9">
                                                              <input type="text" class="form-control" id="horizontal-firstname-input" placeholder="Enter your First Name">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-4">
                                                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Email</label>
                                                            <div class="col-sm-9">
                                                                <input type="email" class="form-control" id="horizontal-email-input" placeholder="Enter your Email">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-4">
                                                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Password</label>
                                                            <div class="col-sm-9">
                                                              <input type="password" class="form-control" id="horizontal-password-input" placeholder="Enter your password">
                                                            </div>
                                                        </div>
            
                                                        <div class="row justify-content-end">
                                                            <div class="col-sm-9">
                                                                <div class="form-check mb-4">
                                                                    <input type="checkbox" class="form-check-input" id="horizontal-customCheck">
                                                                    <label class="form-check-label" for="horizontal-customCheck">Remember me</label>
                                                                </div>
            
                                                                <div>
                                                                    <button type="submit" class="btn btn-primary w-md">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-lg-6">
                                                <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i> Inline forms layout</h5>
                                        
                                                <form class="row gx-3 gy-2 align-items-center mb-4 mb-lg-0">
                                                    <div class="col-sm-4">
                                                        <label class="visually-hidden" for="specificSizeInputName">Name</label>
                                                        <input type="text" class="form-control" id="specificSizeInputName" placeholder="Enter Name">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label class="visually-hidden" for="specificSizeInputGroupUsername">Username</label>
                                                        <div class="input-group">
                                                            <div class="input-group-text">@</div>
                                                            <input type="text" class="form-control" id="specificSizeInputGroupUsername" placeholder="Username">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-auto">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="autoSizingCheck2">
                                                            <label class="form-check-label" for="autoSizingCheck2">
                                                                Remember me
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-auto">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="col-lg-6">
                                                <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i> Floating Label</h5>

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-floating mb-3 mb-lg-0">
                                                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                                            <label for="floatingInput">Email address</label>
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-floating">
                                                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                                            <label for="floatingPassword">Password</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-lg-6">
                                                <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i> Inline forms layout used by hstack</h5>
                                                <form class="row gx-3 gy-2 align-items-center">
                                                    <div class="hstack gap-3">
                                                        <input class="form-control me-auto" type="text" placeholder="Add your item here...">
                                                        <button type="button" class="btn btn-secondary">Submit</button>
                                                        <div class="vr"></div>
                                                        <button type="reset" class="btn btn-outline-danger">Reset</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Form Layout -->

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0">Checkboxes</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">

                                                <div >
                                                    <h5 class="font-size-14 mb-3"><i class="mdi mdi-arrow-right text-primary me-1"></i> Form Checkboxes
                                                    </h5>
                                                    <div class="form-check mb-3">
                                                        <input class="form-check-input" type="checkbox" id="formCheck1">
                                                        <label class="form-check-label" for="formCheck1">
                                                            Form Checkbox
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="formCheck2" checked>
                                                        <label class="form-check-label" for="formCheck2">
                                                            Form Checkbox checked
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">

                                                <div class="mt-4 mt-md-0">
                                                    <h5 class="font-size-14 mb-3"><i class="mdi mdi-arrow-right text-primary me-1"></i> Form Checkboxes
                                                        Right</h5>
                                                    <div>
                                                        <div class="form-check form-check-right mb-3">
                                                            <input class="form-check-input" type="checkbox" id="formCheckRight1">
                                                            <label class="form-check-label" for="formCheckRight1">
                                                                Form Checkbox Right
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input" type="checkbox" id="formCheckRight2"
                                                                checked>
                                                            <label class="form-check-label" for="formCheckRight2">
                                                                Form Checkbox Right checked
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0">Radios</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div>
                                                    <h5 class="font-size-14 mb-3"><i class="mdi mdi-arrow-right text-primary me-1"></i>Form Radios</h5>
                                                    <div class="form-check mb-3">
                                                        <input class="form-check-input" type="radio" name="formRadios"
                                                            id="formRadios1" checked>
                                                        <label class="form-check-label" for="formRadios1">
                                                            Form Radio
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="formRadios"
                                                            id="formRadios2">
                                                        <label class="form-check-label" for="formRadios2">
                                                            Form Radio checked
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mt-4 mt-md-0">
                                                    <h5 class="font-size-14 mb-3"><i class="mdi mdi-arrow-right text-primary me-1"></i>Form Radios Right</h5>
                                                    <div>
                                                        <div class="form-check form-check-right mb-3">
                                                            <input class="form-check-input" type="radio" name="formRadiosRight"
                                                                id="formRadiosRight1" checked>
                                                            <label class="form-check-label" for="formRadiosRight1">
                                                                Form Radio Right
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input" type="radio" name="formRadiosRight"
                                                                id="formRadiosRight2">
                                                            <label class="form-check-label" for="formRadiosRight2">
                                                                Form Radio Right checked
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Switches</h4>
                                        <p class="card-title-desc">A switch has the markup of a custom checkbox but uses the <code>.form-switch</code> class to render a toggle switch. Switches also support the <code>disabled</code> attribute.</p>
                                    </div>
                                    <div class="card-body">
                                        

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div>
                                                    <h5 class="font-size-14 mb-3"><i class="mdi mdi-arrow-right text-primary me-1"></i>Switch examples</h5>


                                                    <div class="form-check form-switch mb-3" dir="ltr">
                                                        <input type="checkbox" class="form-check-input" id="customSwitch1" checked>
                                                        <label class="form-check-label" for="customSwitch1">Toggle this switch element</label>
                                                    </div>
                                                    <div class="form-check form-switch" dir="ltr">
                                                        <input type="checkbox" class="form-check-input" disabled id="customSwitch2">
                                                        <label class="form-check-label" for="customSwitch2">Disabled switch element</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mt-4 mt-md-0">
                                                    <h5 class="font-size-14 mb-3"><i class="mdi mdi-arrow-right text-primary me-1"></i>Switch sizes</h5>
        
                                                    <div class="form-check form-switch mb-3" dir="ltr">
                                                        <input type="checkbox" class="form-check-input" id="customSwitchsizesm" checked>
                                                        <label class="form-check-label" for="customSwitchsizesm">Small Size Switch</label>
                                                    </div>
        
                                                    <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                                                        <input type="checkbox" class="form-check-input" id="customSwitchsizemd">
                                                        <label class="form-check-label" for="customSwitchsizemd">Medium Size Switch</label>
                                                    </div>
        
                                                    <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">
                                                        <input type="checkbox" class="form-check-input" id="customSwitchsizelg" checked>
                                                        <label class="form-check-label" for="customSwitchsizelg">Large Size Switch</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
