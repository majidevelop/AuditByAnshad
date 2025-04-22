
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
                                
                                       
                                    </div>
                                    <div id="questionsContainer">

                                        <div class="card-body question-card">
                                            <div class="row p-3">
                                                <div class="col-12">
                                                    <label for="example-text-input" class="form-label">Inspection Title</label>
                                                    <input type="text" class="form-input form-control" placeholder="Inspection Title" name="inspection_title" id="inspection_title">

                                                </div>
                                                <div class="col-12 mt-3">
                                                    <label for="example-text-input" class="form-label">Inspection Description</label>
                                                    <input type="text" class="form-input form-control" placeholder="Inspection Title" name="inspection_desc" id="inspection_desc">

                                                </div>
                                                
                                                <div class="col-6 p-3">
                                                    <label for="example-text-input" class="form-label">Site</label>

                                                    <select class="form-select sites mb-3" id="sites" name="sites">
                                                        <option value="">Select</option>
                                                        <option value="1">Site A</option>
                                                        <option value="2">Site B</option>
                                                        <option value="3">Site C</option>
                                                    </select>

                                                </div>
                                                <div class="col-6 p-3">
                                                                                                            
                                                    <label for="example-text-input" class="form-label">Asset</label>

                                                    <select class="form-select assets mb-3" id="assets" name="assets">
                                                        <option value="">Select</option>
                                                        <option value="1">Asset 1</option>
                                                        <option value="2">Asset 2</option>
                                                        <option value="3">Asset 3</option>

                                                    </select>
                                                </div>
                                                <div class="col-6 p-3">
                                                    <label for="" class="">Auditee</label>
                                                    <select name="auditee" id="auditee" class="form-select field-type">
                                                        <option value="">Select </option>
                                                        <option value="1">Site A</option>
                                                        <option value="2">Site B</option>
                                                        <option value="3">Site C</option>

                                                    </select>

                                                </div>
                                                <div class="col-6 p-3">
                                                    <label for="" class="">Assigned To</label>
                                                    <select name="assigned_to" id="assigned_to" class="form-select field-type" multiple>
                                                    <option value="">Select </option>
                                                    </select>
                                                    
                                                </div>
                                            
                                                <div class="col-6 p-3">
                                                    <label for="" class="">Audit Lead</label>
                                                    <select name="audit_lead" id="audit_lead" class="form-select field-type">
                                                        <option value="">Select </option>
                                                    </select>
                                                    
                                                </div>
                                                <div class="col-6 p-3">
                                                    <label for="" class="">Audit Manager</label>
                                                        <select name="audit_manager" id="audit_manager" class="form-select field-type">
                                                            <option value="">Select </option>
                                                        </select>
                                                        
                                                </div>
                                                <div class="col-6 p-3">
                                                <label for="" class="">Audit Date</label>
                                                <input type="date" class="form-control" name="audit_date" id="audit_date">

                                                    

                                                </div>
                                                <div class="col-6 p-3">
                                                        <label for="select_headers">Select Report Template</label>
                                                        <select name="select_headers" id="select_headers"  class="form-control form-input">
                                                            <option value=""><p>dfdffddf <b>ewe</b></p></option>
                                                        </select>
                                                    </div>
                                                   
                                            </div>
                                        
                                        </div>
                                    </div>

                                        
                                    </div>
                               
                                    
                                    <div class="card-footer">
                                      
                                    </div>
                                                                
                                    <div class="card-footer">
                                        <center>
                                            <button class="btn btn-success" id="saveBtn">Schedule</button>

                                        </center>
                                    </div>
                                    

                                </div>

                            </div>

                         </div>
                         <!-- jQuery (required by Select2) -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

<!-- Select2 CSS & JS -->
<!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
<script>


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
    document.getElementById("saveBtn").addEventListener("click", function () {
        const inspection_title = document.getElementById('inspection_title').value;
        const inspection_desc = document.getElementById('inspection_desc').value;

        // Get selected values
        const assignedTo = Array.from(document.getElementById("assigned_to").selectedOptions).map(option => option.value);
        const auditLead = document.getElementById("audit_lead").value;
        const auditDate = document.getElementById("audit_date").value;

        const auditManager = document.getElementById("audit_manager").value;

        const site = document.getElementById("sites").value;

        const asset = document.getElementById("assets").value;

        const auditee = document.getElementById("auditee").value;

        const report_template = document.getElementById("select_headers").value;

        const templateId = new URLSearchParams(window.location.search).get("id");

        // Build payload
        const payload = {
            inspection_title:inspection_title,
            inspection_desc:inspection_desc,
            assigned_to: assignedTo,
            audit_lead: auditLead,
            audit_manager: auditManager,
            templateId: templateId,
            auditDate:auditDate,
            site:site,
            asset:asset,
            auditee:auditee,
            report_template: report_template
        };
        console.log(payload);
        // Send AJAX POST request
        fetch("ajax/post_schedule_inspection.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json" // Tell server it's JSON
            },
            body: JSON.stringify(payload)
        })
        .then(response => response.json())
        .then(data => {
            console.log("Success:", data);
            alert(data.message);
        })
        .catch(error => {
            console.error("Error:", error);
            alert("Failed to save!");
        });
    });
</script>

<script>
    let templateId = null;
    let application_users = [];
    let footers = [];
    let headers = [];

    function load_func(){
        
        // saveTemplate();
        get_application_users();
        get_report_covers();

        // getFooters();
        // getHeaders();
        // getCovers();
    }
    function get_report_covers(){
        $.ajax({
            url: "ajax/get_master_layouts.php", // Update URL if needed
            type: "POST", // Changed from GET to POST
            dataType: "json",
            data: {}, // Add any necessary data here
            success: function(response) {
                console.log("Form Templates:", response);

                if (response.success) {
                    //  displayTemplates(response.data); // Call function to handle UI display
                    const select = document.getElementById("select_headers");
                    response.data.forEach( footer => {
            if(footer.title != '' || footer.title != null){

                const defaultOption = document.createElement("option");
                defaultOption.value =  footer.id;
                defaultOption.textContent = footer.title;
                select.appendChild(defaultOption);
            }
        });
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
    function getFooters(){
        fetch("ajax/get_footers.php", {
        method: "GET"
       
    })
    .then(response => response.json())
    .then(data => {
        footers = data.data;
        console.log(footers);

        renderFooters();
    })
    .catch(error => console.error("Error:", error));
    }

    function getHeaders(){
        fetch("ajax/get_headers.php", {
        method: "GET"
       
    })
    .then(response => response.json())
    .then(data => {
        headers = data.data;
        console.log(headers);

        renderHeaders();
    })
    .catch(error => console.error("Error:", error));
    }

    function renderFooters(){
        const select = document.getElementById("select_footers");
        footers.forEach( footer => {
            if(footer.footer_name != ''){

                const defaultOption = document.createElement("option");
                defaultOption.value =  footer.id;
                defaultOption.textContent = footer.footer_name;
                select.appendChild(defaultOption);
            }
        });

    }

    
    function renderHeaders(){
        const select = document.getElementById("select_headers");
        headers.forEach( footer => {
            if(footer.header_name != ''){

                const defaultOption = document.createElement("option");
                defaultOption.value =  footer.id;
                defaultOption.textContent = footer.header_name;
                select.appendChild(defaultOption);
            }
        });

    }


    function get_application_users(){
        fetch("ajax/get_application_users.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
            'templateId': templateId
        })
    })
    .then(response => response.json())
    .then(data => {
        application_users = data.data;

        console.log("Last Updated:", data);
        renderApplicationUsers();
    })
    .catch(error => console.error("Error:", error));
    }

    function renderApplicationUsers() {
        const selectConfigs = {
            assigned_to: { multiple: true },
            audit_lead: { multiple: false },
            audit_manager: { multiple: false }
        };

        Object.entries(selectConfigs).forEach(([id, config]) => {
            const select = document.getElementById(id);
            select.innerHTML = ""; // clear existing options

            if (!config.multiple) {
                const defaultOption = document.createElement("option");
                defaultOption.value = "";
                defaultOption.textContent = "-- Select User --";
                select.appendChild(defaultOption);
            }

            application_users.forEach(user => {
                const option = document.createElement("option");
                option.value = user.user_id;
                option.textContent = user.name;
                select.appendChild(option);
            });

            new Choices(select, {
                removeItemButton: config.multiple,
                placeholderValue: config.multiple ? "Select users..." : "Select user",
                shouldSort: false
            });
        });
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
                    <div class="col-6 p-3">
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
