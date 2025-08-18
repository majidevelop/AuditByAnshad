

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Checklists</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                            <li class="breadcrumb-item active">Checklists</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                               
                                <div class="card">
                                 <?php if (hasRole('1')): ?>

                                    <div class="card-header">
                                        <h4 class="card-title">Checklists</h4>
                                        <p class="card-title-desc">Create your template from one of the options below.</p>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4"></div>

                                        <div class="col-sm-4">
                                            
                                            <div class="p-5 border m-3">
                                                <center>
                                                    <p>
                                                        <strong>
                                                            <a href="forms_home">
                                                            Create Checklist
                                                            </a>
                                                        </strong>
                                                    </p>
                                                </center>
                                            </div>
                                        </div>
                                        <div class="col-sm-4"></div>


                                    </div>
                                    <?php endif ?>
                                    <div class="card-body">
                                        <div class="table-rep-plugin">
                                            <div class="table-responsive mb-0" data-pattern="priority-columns">
                                                <table id="tech-companies-1" class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>SI No</th>
                                                            <th data-priority="1">Display ID</th>
                                                            <th data-priority="3">Title</th>
                                                            <th data-priority="3">Created By</th>
                                                            <th data-priority="3">CreatedAt</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="templateContainer">
                                                          
                                                       
                                                    </tbody>
                                                </table>
                                            </div>
        
                                        </div>
        
                                    </div>
                                </div>
                                <!-- end card -->
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

           <script>
            function load_func()
                {
                    get_form_templates();

                }

                function get_form_templates() {
                    $.ajax({
            url: "ajax/get_form_templates.php", // Update URL if needed
            type: "POST", // Changed from GET to POST
            dataType: "json",
            data: {}, // Add any necessary data here
            success: function(response) {
                console.log("Form Templates:", response);

                if (response.success) {
                    displayTemplates(response.data); // Call function to handle UI display
                } else {
                    alert("Error: " + response.error);
                }
            },
            error: function(xhr, status, error) {
                console.log("Request URL:", this.url); // Print the request URL
                console.log("Status:", status);
                console.log("Error:", error);
                console.error("AJAX Error:", error, status);
                alert("Failed to load templates. Check console for details.");
            }
        });


}


function displayTemplates(templates) {
    let table = "";
    let ctr =0 ;

    templates.forEach(template => {
        ctr++;
        table += `
        <tr>
            <td> <a class="btn" href="view_template?id=${template.id}">${ctr} </a></td>
            <td><a  class="btn" href="view_template?id=${template.id}"> ${template.id} </a></td>
            <td><a  class="btn" href="view_template?id=${template.id}">${template.title ? template.title : 'Untitled checklist'} <br> ${template.description ? '' : 'Default Value'} </a></td>
            <td><a  class="btn" href="view_template?id=${template.id}">${template.created_by ? '' : 'Default Value'} </a></td>
            <td><a  class="btn" href="view_template?id=${template.id}">${template.created_at} </a></td>
                                 <?php if (hasRole('1')): ?>

            <td>
                
                <div class="dropdown">
                    <button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle show" type="button" data-bs-toggle="dropdown" aria-expanded="true">
                        <i class="bx bx-dots-horizontal-rounded"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(-67px, 28px);" data-popper-placement="bottom-end">
                        
                    <li>
                        
                        <a href="view_template?id=${template.id}" class="dropdown-item">Edit</a>
                        </li>

                      <!--  <li><a class="dropdown-item" href="#">Delete</a></li> -->
                     

                    </ul>
                </div>
            </td>
                                 <?php endif ?>

        </tr> 
                  `;
    });


    $("#templateContainer").html(table);
}


           </script>