
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
                            <div class="col-9"></div>
                            <div class="col-3">
                                <!-- <a href="add_users" class="btn btn-primary">Add users</a> -->
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
                                <div class="col-sm-6">
                                    <label for="phone">Password</label>
                                    <input type="password" name="password" id="password" placeholder="*********" class="form-control">
                                </div>
                                <div class="col-sm-6 pt-3" id="user_action_button_div">
                                    <center>
                                        <button class="btn btn-success" onclick="save_application_users()">Save</button>
                                    </center>
                                </div>
                            </div>
                           
                         </div>

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
        <script src="assets/js/common/admin.js"></script>   
        <script src="assets/js/common/common.js"></script>
        <script src="assets/libs/flatpickr/flatpickr.min.js"></script>
<script>
let application_users;
let roles;
let companies;
let choicesInstance;
let departments;
// Instance registry
const choicesInstances = new Map();

async function load_func(){
    await get_departments();
    await get_application_users();
    await get_roles();
    await get_companies();
    await renderdepartments(); // ✅ now correctly awaited
    await renderapplication_users(); // ✅ now correctly awaited

}
async function delete_User(id) {
    try {
            let url = 'ajax/post_user.php';
            if(id){
                url = `ajax/delete_user.php?id=${id}`;

            }
            const data = {
                    status: 0
                    
                };
            const response = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
            });

            const result = await response.json();

            if (response.ok) {
                console.log('User deleted:', result);
                // clearfields();
                await get_application_users();
                await renderapplication_users();
                // $("#process_action_button_div").html(`<button class="btn btn-success" onclick="createProcessMaster()">Save</button>`);
// document.querySelector('.modal.bs-example-modal-sm').setAttribute('aria-hidden', 'true');

            } else {
                console.error('Server returned an error:', result);
            }

            return result;

        } catch (error) {
            console.error('Request failed:', error);
            return { error: true, message: error.message };
        }
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
               
                <td>
                <div class="dropdown">
                                                                <button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle show" type="button" data-bs-toggle="dropdown" aria-expanded="true">
                                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                                </button>
                                                                <ul class="dropdown-menu dropdown-menu-end" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(-67px, 28px);" data-popper-placement="bottom-end">
                                                                    <li><a class="dropdown-item" href="#">Edit</a></li>
                                                                    <li><a class="dropdown-item" href="#">Print</a></li>
                                                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                                                    <li>
                                                                        <button class="btn btn-primary" onclick="edit_user(${element.user_id})">Edit</button>
                                                                    </li>
                                                                    <li>
                                                                        <button class="btn btn-danger" onclick="open_delete_modal(${element.user_id}, 'User')"  data-bs-toggle="modal" data-bs-target=".bs-example-modal-sm">Delete</button>
                                                                    </li>

                                                                </ul>
                                                            </div>
                </td>
                
            </tr>
        `;

        });
        $("#rendertable").html('');

        $("#rendertable").append(row);
        
    }
async function save_application_users(id) {
    let url = "ajax/post_application_users.php";
    if(id){
        url = "ajax/update_application_users.php?id="+id
    }
 // Trim input values
    const name = $("#name").val().trim();
    const email = $("#email").val().trim();
    const phone = $("#phone").val().trim();
    const company_id = $("#company").val();
    const password = $("#password").val();

    const roles = $("#roles").val(); // array
    const roles_string = roles ? roles.toString() : '';
    const department = $('#department_name').val();

    const errors = [];

    // Validate Name
    if (!name) errors.push("Name is required.");
    if (!password) errors.push("Password is required.");


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
    const response = await fetch(url, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
            name,
            email,
            phone,
            company_id,
            department,
            roles: roles_string,
            password
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
async function renderroles(roles_string) {
    let row = '';
    let roles_array = [];

    if (roles_string) {
        roles_array = roles_string.split(",").map(s => s.trim()); // trim in case of spaces
    }

    // Check if 'roles' is defined and is an array
    if (!Array.isArray(roles)) {
        console.error("The 'roles' variable is not defined or not an array.");
        return;
    }

    roles.forEach(element => {
        const isSelected = roles_array.includes(String(element.role_id));

        row += `<option value="${element.role_id}" ${isSelected ? 'selected' : ''}>${element.role_name}</option>`;
    });

    const $roles = $("#roles");
    $roles.html(row);

    // Destroy existing Choices instance safely
    if (typeof choicesInstance !== 'undefined' && choicesInstance) {
        choicesInstance.destroy();
    }

    // Initialize Choices.js
    choicesInstance = new Choices('#roles', {
        removeItemButton: true,
        searchEnabled: true,
        placeholderValue: 'Select roles',
        shouldSort: false
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
async function edit_user(id){
    const user = application_users.find(p => p.user_id === id);
    if(user){

        renderroles(user.roles);
        $("#name").val(user.name);
        $("#email").val(user.email);
        $("#phone").val(user.phone);
        $("#department_name").val(user.department);
        $("#company").val(user.company_id);
        $("#user_action_button_div").html(`<center><button class="btn btn-success" onclick="save_application_users(${id})">Update</button></center>`);

    }

}


</script>