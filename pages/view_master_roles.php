
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
                                    <h4 class="mb-sm-0 font-size-18">Roles</h4>

                                 

                                </div>
                            </div>
                            <div class="col-3">
                                <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Account Master</a></li>
                                            <li class="breadcrumb-item active">Roles</li>
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
                                    <input type="text" name="role_name" id="role_name" placeholder="Role Name" class="form-control">
                                </div>
                               
                                <div class="col-sm-4">
                                    <button class="btn btn-success" onclick="save_role()">Save</button>
                                </div>

                            </div>

                            <div class="row mt-3">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>SI No.</th>
                                            <th>Company Name</th>

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
   

    
let roles;
    async function load_func(){
        
      await get_roles();

       
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
            if(roles.length > 0 ){
                await renderroles(); // ✅ now correctly awaited

            }
        } catch (error) {
            console.error("Error:", error);
        }
    }
    async function renderroles(){
        let ctr = 0;
        let row;
        roles.forEach(element => {
            ctr++;
             row += `
                <tr>
                    <td>${ctr}</td>
                    <td>${element.role_name}</td>
                </tr>
            `;

        });
            $("#rendertable").html('');

            $("#rendertable").append(row);
        
    }

async function save_role() {
    const role_name = $("#role_name").val(); // Correctly calling the .val() function

    const response = await fetch("ajax/post_roles.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
            role_name: role_name
        })
    });

    if (response.ok) {
        const result = await response.json();
        console.log("role saved:", result);
        clearfields();
        get_roles();
    } else {
        console.error("Failed to save role:", response.statusText);
        clearfields();
        get_roles();


    }
}
function clearfields() {
    // Clear text inputs, textareas, and selects
    $("input:not([type=radio]):not([type=checkbox]), textarea, select").val("");

    // Uncheck all radio buttons and checkboxes
    $("input[type=radio], input[type=checkbox]").prop("checked", false);
}


</script>