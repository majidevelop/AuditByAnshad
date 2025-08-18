
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
                            <div class="col-xl-9 col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm order-2 order-sm-1">
                                                <div class="d-flex align-items-start mt-3 mt-sm-0">
                                                    <div class="flex-shrink-0">
                                                        <div class="avatar-xl me-3">
                                                            <img src="assets/images/users/avatar-2.jpg" alt="" class="img-fluid rounded-circle d-block">
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div>
                                                            <br>
                                                            <br>

                                                            <h5 class="font-size-16 mb-1"><?php echo $_SESSION['session_username'];?></h5>
                                                            <!-- <p class="text-muted font-size-13">Full Stack Developer</p> -->

                                                            <!-- <div class="d-flex flex-wrap align-items-start gap-2 gap-lg-3 text-muted font-size-13">
                                                                <div><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Development</div>
                                                                <div><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>phyllisgatlin@minia.com</div>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-auto order-1 order-sm-2">
                                                <div class="d-flex align-items-start justify-content-end gap-2">
                                                    <div>
                                                        <button type="button" class="btn btn-soft-light"><i class="me-1"></i> Settings</button>
                                                    </div>
                                                    <div>
                                                        <div class="dropdown">
                                                            <button class="btn btn-link font-size-16 shadow-none text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="bx bx-dots-horizontal-rounded"></i>
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <li><a class="dropdown-item" href="#">Action</a></li>
                                                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <ul class="nav nav-tabs-custom card-header-tabs border-top mt-4" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link px-3 active" data-bs-toggle="tab" href="#overview" role="tab">User settings</a>
                                            </li>
                                            <!-- <li class="nav-item">
                                                <a class="nav-link px-3" data-bs-toggle="tab" href="#about" role="tab">About</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link px-3" data-bs-toggle="tab" href="#post" role="tab">Post</a>
                                            </li> -->
                                        </ul>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->

                                <div class="tab-content">
                                    <div class="tab-pane active" id="overview" role="tabpanel">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Details</h5>
                                            </div>
                                            <div class="card-body">
                                                <div>
                                                    <div class="pb-3">
                                                            <!-- Form block  -->
                            <div class="row px-3">
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
                            <div class="row mt-3 px-3">
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
                           <!-- End form block -->
                                                    </div>

                                                    <div class="py-3">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end card body -->
                                        </div>
                                        <!-- end card -->

                                      
                                        <!-- end card -->
                                    </div>
                                    <!-- end tab pane -->

                                    <div class="tab-pane" id="about" role="tabpanel">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">About</h5>
                                            </div>
                                            <div class="card-body">
                                               
                                            </div>
                                            <!-- end card body -->
                                        </div>
                                        <!-- end card -->
                                    </div>
                                    <!-- end tab pane -->

                                    <div class="tab-pane" id="post" role="tabpanel">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Post</h5>
                                            </div>
                                            <div class="card-body">
                                              
                                            </div>
                                            <!-- end card body -->
                                        </div>
                                        <!-- end card -->
                                    </div>
                                    <!-- end tab pane -->
                                </div>
                                <!-- end tab content -->
                            </div>
                            <!-- end col -->

                            <div class="col-xl-3 col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Roles</h5>

                                        <div class="d-flex flex-wrap gap-2 font-size-16">
                                            <!-- <a href="#" class="badge bg-primary-subtle text-primary">Photoshop</a>
                                            <a href="#" class="badge bg-primary-subtle text-primary">illustrator</a>
                                            <a href="#" class="badge bg-primary-subtle text-primary">HTML</a>
                                            <a href="#" class="badge bg-primary-subtle text-primary">CSS</a>
                                            <a href="#" class="badge bg-primary-subtle text-primary">Javascript</a>
                                            <a href="#" class="badge bg-primary-subtle text-primary">Php</a>
                                            <a href="#" class="badge bg-primary-subtle text-primary">Python</a> -->
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                                 <?php if (hasRole('1')): ?>
                                      <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Portfolio</h5>

                                        <div>
                                            <ul class="list-unstyled mb-0">
                                                <li>
                                                    <a href="#" class="py-2 d-block text-muted"><i class="mdi mdi-web text-primary me-1"></i> Website</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="py-2 d-block text-muted"><i class="mdi mdi-note-text-outline text-primary me-1"></i> Blog</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                                <?php else: ?>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title mb-3">You do not have permission to view this content.</h5>
            <?php 
        session_start();
            
            print_r( $_SESSION['roles_array']); ?>
        </div>
    </div>
<?php endif; ?>

                                <?php if (hasAnyRole(['admin', 'editor'])): ?>
                                    <!-- <li><a href="?page=edit_content">Edit Content</a></li> -->
                                <?php endif; ?>


                              

                                <!-- <div class="card"> -->
                                    <!-- <div class="card-body">
                                        <h5 class="card-title mb-3">Similar Profiles</h5>

                                        <div class="list-group list-group-flush">
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-sm flex-shrink-0 me-3">
                                                        <img src="assets/images/users/avatar-1.jpg" alt="" class="img-thumbnail rounded-circle">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div>
                                                            <h5 class="font-size-14 mb-1">James Nix</h5>
                                                            <p class="font-size-13 text-muted mb-0">Full Stack Developer</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-sm flex-shrink-0 me-3">
                                                        <img src="assets/images/users/avatar-3.jpg" alt="" class="img-thumbnail rounded-circle">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div>
                                                            <h5 class="font-size-14 mb-1">Darlene Smith</h5>
                                                            <p class="font-size-13 text-muted mb-0">UI/UX Designer</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-sm flex-shrink-0 me-3">
                                                        <div class="avatar-title bg-light-subtle text-light rounded-circle font-size-22">
                                                            <i class="bx bxs-user-circle"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div>
                                                            <h5 class="font-size-14 mb-1">William Swift</h5>
                                                            <p class="font-size-13 text-muted mb-0">Backend Developer</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div> -->
                                    <!-- end card body -->
                                <!-- </div> -->
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->


                        
                         </div>

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
        <script src="assets/js/common/admin.js"></script>   
        <script src="assets/js/common/common.js"></script>
        <script src="assets/libs/flatpickr/flatpickr.min.js"></script>
<script>
    let user_id;
let application_users;
let roles;
let companies;
let choicesInstance;
let departments;
// Instance registry
const choicesInstances = new Map();

async function load_func(){
        user_id = new URLSearchParams(window.location.search).get("id");

    await get_departments();
    await get_application_users();
    await get_roles();
    await get_companies();
    await renderdepartments(); // ✅ now correctly awaited
    if(!user_id){

        await renderapplication_users(); // ✅ now correctly awaited

    }else{

        await renderEditUserForm(user_id);
    }

}
async function renderEditUserForm(user_id){
    await edit_user(user_id);
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
    const user = application_users.find(p => p.user_id == id);
    if(user){
        console.log(user);

        renderroles(user.roles);
        $("#name").val(user.name);
        $("#email").val(user.email);
        $("#email").prop("disabled", true);
        $("#phone").val(user.phone);
        $("#department_name").val(user.department);
        $("#company").val(user.company_id);
        $("#user_action_button_div").html(`<center><button class="btn btn-success" onclick="save_application_users(${id})">Update</button></center>`);

    }

}


</script>