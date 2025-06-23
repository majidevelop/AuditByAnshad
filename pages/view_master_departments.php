
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
                                    <h4 class="mb-sm-0 font-size-18">Departments</h4>

                                 

                                </div>
                            </div>
                            <div class="col-3">
                                <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Account Master</a></li>
                                            <li class="breadcrumb-item active">Departments</li>
                                        </ol>
                                        <div id="lastUpdated" class="m-0">

                                        </div>
                                    </div>
                                
                            </div>
                        </div>
                            <!-- end page title -->
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="First Name">Department Name</label>
                                    <input type="text" name="department_name" id="department_name" placeholder="Department Name" class="form-control">
                                </div>
                               
                                <div class="col-sm-4 pt-4" id="department_action_button_div">
                                    <button class="btn btn-success" onclick="save_department()">Save</button>
                                </div>

                            </div>

                            <div class="row mt-3">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>SI No.</th>
                                            <th>Department Name</th>
                                            <th>Action</th>


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
                 <script src="assets/js/common/common.js"></script>
<script>
   

    
let departments;
    async function load_func(){
        
      await get_departments();

       
    }
    async function get_departments(){
        try {
            const response = await fetch("ajax/get_departments.php", {
                method: "GET",
                headers: { "Content-Type": "application/json" },
            });

            const data = await response.json();
            departments = data.data;
            console.log("departments:", departments);
            if(departments.length > 0 ){
                await renderdepartments(); // ✅ now correctly awaited

            }
        } catch (error) {
            console.error("Error:", error);
        }
    }
    async function renderdepartments(){
        let ctr = 0;
        let row;
        departments.forEach(element => {
            ctr++;
             row += `
                <tr>
                    <td>${ctr}</td>
                    <td>${element.department_name}</td>
                    <td>
                        <button class="btn btn-primary" onclick="edit_department(${element.department_id})">Edit</button>
                        <button class="btn btn-danger" onclick="open_delete_modal(${element.department_id}, 'Department')"  data-bs-toggle="modal" data-bs-target=".bs-example-modal-sm">Delete</button>
                    </td>

                </tr>
            `;

        });
            $("#rendertable").html('');

            $("#rendertable").append(row);
        
    }

async function save_department(id) {
    let url = `ajax/post_departments.php`;
    if(id){
        url = `ajax/update_departments.php?id=${id}`;
    }
    const department_name = $("#department_name").val(); // Correctly calling the .val() function

    const response = await fetch(url, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
            department_name: department_name
        })
    });

    if (response.ok) {
        const result = await response.json();
        console.log("Department saved:", result);
        clearfields();
        get_departments();
    } else {
        console.error("Failed to save Department:", response.statusText);
        clearfields();
        get_departments();


    }
}

async function delete_Department (id){
    let url = `ajax/post_departments.php`;
    if(id){
        url = `ajax/delete_department.php?id=${id}`;
    }
    const department_name = $("#department_name").val(); // Correctly calling the .val() function

    const response = await fetch(url, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
            department_name: department_name
        })
    });

    if (response.ok) {
        const result = await response.json();
        console.log("Department saved:", result);
        clearfields();
        get_departments();
    } else {
        console.error("Failed to save Department:", response.statusText);
        clearfields();
        get_departments();


    }
}


async function edit_department(id){
        const pro = departments.find(p => p.department_id === id);
        if(pro){
            $("#department_name").val(pro.department_name);
            $("#department_action_button_div").html(`<button class="btn btn-success" onclick="save_department(${id})">Update</button>`);

        }

    }

</script>