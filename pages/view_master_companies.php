
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
                                    <h4 class="mb-sm-0 font-size-18">Companies</h4>

                                 

                                </div>
                            </div>
                            <div class="col-3">
                                <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Account Master</a></li>
                                            <li class="breadcrumb-item active">Companies</li>
                                        </ol>
                                        <div id="lastUpdated" class="m-0">

                                        </div>
                                    </div>
                                
                            </div>
                        </div>
                            <!-- end page title -->
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="company Name">Company name</label>
                                    <input type="text" name="company_name" id="company_name" placeholder="company Name" class="form-control">
                                </div>
                               
                                <div class="col-sm-4">
                                     <button class="btn btn-submit" onclick="save_company()">Save</button>
                                </div>

                            </div>
                            <div class="row">
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
   
let companies;
    async function load_func(){
        
      await get_companies();

       
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
        let row;
        companies.forEach(element => {
            ctr++;
             row += `
                <tr>
                    <td>${ctr}</td>
                    <td>${element.company_name}</td>
                </tr>
            `;

        });
            $("#rendertable").html('');

            $("#rendertable").append(row);
        
    }

async function save_company() {
    const companyName = $("#company_name").val(); // Correctly calling the .val() function

    const response = await fetch("ajax/post_companies.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
            company_name: companyName
        })
    });

    if (response.ok) {
        const result = await response.json();
        console.log("Company saved:", result);
        clearfields();
        get_companies();
    } else {
        console.error("Failed to save company:", response.statusText);
        clearfields();
        renderComget_companiespanies();

    }
}
function clearfields() {
    // Clear text inputs, textareas, and selects
    $("input:not([type=radio]):not([type=checkbox]), textarea, select").val("");

    // Uncheck all radio buttons and checkboxes
    $("input[type=radio], input[type=checkbox]").prop("checked", false);
}



</script>