
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
                                <div class="col-sm-6">
                                    <label for="roles">
                                        Select Roles
                                    </label>
                                        <select name="roles" id="roles" multiple class="form-control"></select>

                                </div>
                                <div class="col-sm-6">
                                    <label for="company">Select Company</label>
                                    <select name="company" id="company" class="form-control">
                                    </select>
                                </div>
                                <div class="col-sm-12 mt-3">
                                    <center>
                                        <button class="btn btn-submit" onclick="save_application_users()">Save</button>
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
                                            <th>Company</th>

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
                 
<script>
   

    
let application_users;
let roles;
let companies;

    async function load_func(){
        
        await get_roles();
        await get_companies();
        await get_application_users();

       
    }
    async function get_application_users(){
        try {
            const response = await fetch("ajax/get_application_users.php", {
                method: "GET",
                headers: { "Content-Type": "application/json" },
            });

            const data = await response.json();
            application_users = data.data;
            console.log("application_users:", application_users);

            await renderapplication_users(); // ✅ now correctly awaited
        } catch (error) {
            console.error("Error:", error);
        }
    }
    async function renderapplication_users(){
        let ctr = 0;
        let row;
        
        application_users.forEach(element => {
            company_name= "undefined";

            company = companies.find( c => c.company_id == element.company_id

            );
            if(company){
                company_name = company.company_name;
            }
            ctr++;
             row += `
                <tr>
                    <td>${ctr}</td>
                    <td>${element.name}</td>
                    <td>${element.email}</td>

                    <td>${company_name}</td>

                    
                </tr>
            `;

        });
            $("#rendertable").html('');

            $("#rendertable").append(row);
        
    }

async function save_application_users() {

    const name = $("#name").val(); // Correctly calling the .val() function
    const roles = $("#roles").val(); // Correctly calling the .val() function
    roles_string = roles.toString();
    if(!name){
        alert("Name required");
        return;
    }
    if(!$("#email").val()){
        alert("Email required");
        return;
    }
    if(!$("#phone").val()){
        alert("Phone required");
        return;
    }

    const response = await fetch("ajax/post_application_users.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
            name: name,
            email: $("#email").val(),
            company_id: $("#company").val(),
            phone: $("#phone").val(),
            roles:roles_string


        })
    });

    if (response.ok) {
        const result = await response.json();
        console.log("role saved:", result);
        clearfields();
        get_application_users();
    } else {
        console.error("Failed to save role:", response.statusText);
        clearfields();
        get_application_users();


    }
}
function clearfields() {
    // Clear text inputs, textareas, and selects
    $("input:not([type=radio]):not([type=checkbox]), textarea, select").val("");

    // Uncheck all radio buttons and checkboxes
    $("input[type=radio], input[type=checkbox]").prop("checked", false);
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
let choicesInstance;

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