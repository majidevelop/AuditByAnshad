
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
                                    <h4 class="mb-sm-0 font-size-18">Process</h4>

                                 

                                </div>
                            </div>
                            <div class="col-3">
                                <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Account Master</a></li>
                                            <li class="breadcrumb-item active">Process</li>
                                        </ol>
                                        <div id="lastUpdated" class="m-0">

                                        </div>
                                    </div>
                                
                            </div>
                        </div>
                            <!-- end page title -->
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="First Name">Role Name</label>
                                    <select name="department_name" id="department_name" class="form-control">
                                        <option value="">Select Department</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="process">Process name</label>
                                    <input type="text" name="process" id="process" class="form-control" placeholder="Process name">
                                </div>
                               
                                <div class="col-sm-4 pt-4" id ="process_action_button_div">
                                    <button class="btn btn-success" onclick="createProcessMaster()">Save</button>
                                </div>

                            </div>

                            <div class="row mt-3">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>SI No.</th>
                                            <th>Process Name</th>
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
   

    
let roles;
let departments;
let process;
let application_users;
    async function load_func(){
        await get_departments();
        await renderdepartments();
        await get_process();
        await render_process();
       
    }

    async function edit_process(id){
        const pro = process.find(p => p.process_id === id);
        if(pro){
            $("#department_name").val(pro.department_id);
            $("#process").val(pro.process_name);
            $("#process_action_button_div").html(`<button class="btn btn-success" onclick="createProcessMaster(${id})">Update</button>`);

        }

    }
    async function delete_Process(id){
        try {
            let url = 'ajax/post_process.php';
            if(id){
                url = `ajax/delete_process.php?id=${id}`;

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
                console.log('Process deleted:', result);
                // clearfields();
                await get_process();
                await render_process();
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

    
    async function render_process(){
        let html =``;
        let ctr = 1;
        process.forEach(element => {
        const department = departments.find( d => d.department_id === element.department_id);
        if(!department){
            return;
        }

            html += `<tr>
                    <td>${ctr}</td>
                    <td>${element.process_name}</td>
                    <td>${department.department_name}</td>
                    <td>
                        <button class="btn btn-primary" onclick="edit_process(${element.process_id})">Edit</button>
                        <button class="btn btn-danger" onclick="open_delete_modal(${element.process_id}, 'Process')"  data-bs-toggle="modal" data-bs-target=".bs-example-modal-sm">Delete</button>
                    </td>

                </tr>`;
            ctr++;

        });
        $("#rendertable").html(html);
    }
    
    




</script>