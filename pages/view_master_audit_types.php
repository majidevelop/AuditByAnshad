
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
                                    <h4 class="mb-sm-0 font-size-18">Audit Types</h4>

                                 

                                </div>
                            </div>
                            <div class="col-3">
                                <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Account Master</a></li>
                                            <li class="breadcrumb-item active">Audit Types</li>
                                        </ol>
                                        <div id="lastUpdated" class="m-0">

                                        </div>
                                    </div>
                                
                            </div>
                        </div>
                            <!-- end page title -->
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="First Name">Audit Type Name</label>
                                    <input type="text" name="audit_type_name" id="audit_type_name" placeholder="Audit Type Name" class="form-control">
                                </div>
                               
                                <div class="col-sm-4">
                                    <button class="btn btn-submit" onclick="save_audit_type()">Save</button>
                                </div>

                            </div>

                            <div class="row mt-3">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>SI No.</th>
                                            <th>Audit Type Name</th>

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
   

    
let audit_types;
    async function load_func(){
        
      await get_audit_types();

       
    }
    async function get_audit_types(){
        try {
            const response = await fetch("ajax/get_audit_types.php", {
                method: "GET",
                headers: { "Content-Type": "application/json" },
            });

            const data = await response.json();
            audit_types = data.data;
            console.log("audit_types:", audit_types);
            if(audit_types.length > 0 ){
                await renderaudit_types(); // ✅ now correctly awaited

            }
        } catch (error) {
            console.error("Error:", error);
        }
    }
    async function renderaudit_types(){
        let ctr = 0;
        let row;
        audit_types.forEach(element => {
            ctr++;
             row += `
                <tr>
                    <td>${ctr}</td>
                    <td>${element.audit_type_name}</td>
                </tr>
            `;

        });
            $("#rendertable").html('');

            $("#rendertable").append(row);
        
    }

async function save_audit_type() {
    const audit_type_name = $("#audit_type_name").val(); // Correctly calling the .val() function

    const response = await fetch("ajax/post_audit_types.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
            audit_type_name: audit_type_name
        })
    });

    if (response.ok) {
        const result = await response.json();
        console.log("audit_type saved:", result);
        clearfields();
        get_audit_types();
    } else {
        console.error("Failed to save audit_type:", response.statusText);
        clearfields();
        get_audit_types();


    }
}
function clearfields() {
    // Clear text inputs, textareas, and selects
    $("input:not([type=radio]):not([type=checkbox]), textarea, select").val("");

    // Uncheck all radio buttons and checkboxes
    $("input[type=radio], input[type=checkbox]").prop("checked", false);
}


</script>