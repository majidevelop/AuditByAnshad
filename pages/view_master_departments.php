
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
                                    <h4 class="mb-sm-0 font-size-18">departments</h4>

                                 

                                </div>
                            </div>
                            <div class="col-3">
                                <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Account Master</a></li>
                                            <li class="breadcrumb-item active">departments</li>
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
                               
                                <div class="col-sm-4">
                                    <button class="btn btn-success" onclick="save_department()">Save</button>
                                </div>

                            </div>

                            <div class="row mt-3">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>SI No.</th>
                                            <th>Department Name</th>

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
                </tr>
            `;

        });
            $("#rendertable").html('');

            $("#rendertable").append(row);
        
    }

async function save_department() {
    const department_name = $("#department_name").val(); // Correctly calling the .val() function

    const response = await fetch("ajax/post_departments.php", {
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
function clearfields() {
    // Clear text inputs, textareas, and selects
    $("input:not([type=radio]):not([type=checkbox]), textarea, select").val("");

    // Uncheck all radio buttons and checkboxes
    $("input[type=radio], input[type=checkbox]").prop("checked", false);
}


</script>