
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
                                    <h4 class="mb-sm-0 font-size-18">Users</h4>

                                 

                                </div>
                            </div>
                            <div class="col-3">
                                <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Account Master</a></li>
                                            <li class="breadcrumb-item active">Users</li>
                                        </ol>
                                        <div id="lastUpdated" class="m-0">

                                        </div>
                                    </div>
                                
                            </div>
                        </div>
                            <!-- end page title -->
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" placeholder="User name" class="form-control">
                                </div>
                                <div class="col-sm-4">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" placeholder="username@companyname.com" class="form-control">
                                </div>
                                <div class="col-sm-4">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" id="phone" placeholder="+971XXXXXXX000" class="form-control">
                                </div>
                                


                            </div>
                            <div class="row mt-3">
                                <div class="col-4">
                                                <label for="">Department Name</label>
                                                <select class="form-control" name="department_name" id="department_name" >
                                                    <option value="">Select department</option>
                                                </select>
                                                

                                            </div>

                                <div class="col-sm-4">
                                    <label for="roles">
                                        Select Roles
                                    </label>
                                        <select name="roles" id="roles" multiple class="form-control"></select>

                                </div>
                                <div class="col-sm-4">
                                    <label for="company">Select Company</label>
                                    <select name="company" id="company" class="form-control">
                                    </select>
                                </div>
                                <div class="col-sm-12 mt-3">
                                    <center>
                                        <button class="btn btn-success" onclick="save_application_users()">Save</button>
                                    </center>
                                </div>
                            </div>
                            
                            <div class="row mt-3">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>SI No.</th>
                                            <th>User Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Department</th>
                                            <th>Company</th>
                                            <th>Roles</th>


                                        </tr>

                                    </thead>
                                    <tbody id="rendertable">

                                    </tbody>
                                </table>
                            </div>
                         </div>

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
        <script src="assets/js/common/admin.js"></script>   
                 
<script>
   

    
let application_users;
let roles;
let companies;
let choicesInstance;
let departments;

    async function load_func(){
        await get_departments();

        await get_application_users();
        
        await get_roles();
        await get_companies();
        await renderdepartments(); // ✅ now correctly awaited

        await renderapplication_users(); // ✅ now correctly awaited

       
    }

    async function renderapplication_users(){
        let ctr = 0;
        let row;
        application_users.forEach(element => {
            company_name= "undefined";
            department_name = "undefined";

            company = companies.find( c => c.company_id == element.company_id);
            if(company){
                company_name = company.company_name;
            }
             department = departments.find( c => c.department_id == element.department);
            if(department){
                department_name = department.department_name;
            }

            let roles_string = element.roles;
            roles_array = roles_string.split(",");
            let role_names = [];
            roles_array.forEach( r => {
                role = roles.find( a=> a.role_id == r);
                if(role){
                role_names.push(role.role_name);

                }
            });
            role_names_string = role_names.toString(); 
            ctr++;
             row += `
                <tr>
                    <td>${ctr}</td>
                    <td>${element.name}</td>
                    <td>${element.email}</td>
                    <td>${element.phone}</td>
                    <td>${department_name}</td>



                    <td>${company_name}</td>
                    <td>${role_names_string}</td>

                    
                </tr>
            `;

        });
            $("#rendertable").html('');

            $("#rendertable").append(row);
        
    }

async function save_application_users() {
 // Trim input values
    const name = $("#name").val().trim();
    const email = $("#email").val().trim();
    const phone = $("#phone").val().trim();
    const company_id = $("#company").val();
    const roles = $("#roles").val(); // array
    const roles_string = roles ? roles.toString() : '';
    const department = $('#department_name').val();

    const errors = [];

    // Validate Name
    if (!name) errors.push("Name is required.");

    // Validate Email
    if (!email) {
        errors.push("Email is required.");
    } else if (!validateEmail(email)) {
        errors.push("Invalid email format.");
    }

    // Validate Phone
    const numericPhone = phone.replace(/\D/g, ""); // remove non-numeric characters
    if (!phone) {
        errors.push("Phone is required.");
    } else if (numericPhone.length < 10) {
        errors.push("Phone number must be at least 10 digits.");
    }

    // Validate Company
    if (!company_id) errors.push("Company is required.");

    // Validate Roles
    if (!roles || roles.length === 0) errors.push("At least one role must be selected.");

    // Show errors
    if (errors.length > 0) {
        alert(errors.join("\n"));
        return;
    }

    // Submit form
    const response = await fetch("ajax/post_application_users.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
            name,
            email,
            phone,
            company_id,
            department,
            roles: roles_string
        })
    });

    if (response.ok) {
        const result = await response.json();
        console.log("role saved:", result);
        clearfields();
        await get_application_users();
        await renderapplication_users(); // ✅ now correctly awaited

        
    } else {
        console.error("Failed to save role:", response.statusText);
        clearfields();


    }
}
function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}
function clearfields() {
    // Clear text inputs, textareas, and selects
    $("input:not([type=radio]):not([type=checkbox]):not([type=search]), textarea, select").val("");

    // Uncheck all radio buttons and checkboxes
    $("input[type=radio], input[type=checkbox]").prop("checked", false);
    choicesInstance.removeActiveItems();
}


async function get_roles(){
        try {
            const response = await fetch("ajax/get_roles.php", {
                method: "GET",
                headers: { "Content-Type": "application/json" },
            });

            const data = await response.json();
            roles = data.data;
            console.log("roles:", roles);

            await renderroles(); // ✅ now correctly awaited
        } catch (error) {
            console.error("Error:", error);
        }
    }

async function renderroles() {
    let row = '';

    roles.forEach(element => {
        row += `<option value="${element.role_id}">${element.role_name}</option>`;
    });

    $("#roles").html(row);

    // Destroy existing Choices instance if re-initializing
    if (choicesInstance) {
        choicesInstance.destroy();
    }

    // Initialize Choices
    choicesInstance = new Choices('#roles', {
        removeItemButton: true,
        searchEnabled: true,
        placeholderValue: 'Select roles'
    });
}
async function get_companies(){
        try {
            const response = await fetch("ajax/get_companies.php", {
                method: "GET",
                headers: { "Content-Type": "application/json" },
            });

            const data = await response.json();
            companies = data.data;
            console.log("companies:", companies);

            await renderCompanies(); // ✅ now correctly awaited
        } catch (error) {
            console.error("Error:", error);
        }
    }
    async function renderCompanies(){
        let ctr = 0;
        let row =`
                                        <option value="" >Select Company</option>
        
        `                                ;
        companies.forEach(element => {
            ctr++;
             row += `
                <option value="${element.company_id}">${element.company_name}</option>
            `;

        });
            $("#company").html('');

            $("#company").append(row);
        
    }

</script>