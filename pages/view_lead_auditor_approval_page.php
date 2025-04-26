
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

    .cover-page-gallery {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    margin-top: 20px;
}

.cover-thumb {
    width: 150px;
    height: 200px;
    object-fit: cover;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: 2px 2px 6px rgba(0,0,0,0.1);
    transition: transform 0.2s ease-in-out;
}

.cover-thumb:hover {
    transform: scale(1.05);
    cursor: pointer;
}

</style>
<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-9">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Lead auditor approval page</h4>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                            <li class="breadcrumb-item active">Lead auditor approval page</li>
                                        </ol>
                                        <div id="lastUpdated" class="m-0">

                                        </div>
                                    </div>
                                
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div id="schedulesContainer">

                                            </div>

                                        </div>
                                    </div>
                                </div>
                              

                            </div>

                            

                            
                            
                    </div>
                    


                    <script>
                        let header_text = null;
                        let footer_text = null;


                    </script>
                     

     <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/feather-icons/feather.min.js"></script>
        <!-- pace js -->
        <script src="assets/libs/pace-js/pace.min.js"></script>

        <!-- ckeditor -->
        <script src="assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>

        <!-- init js -->
        <script src="assets/js/pages/form-editor.init.js"></script>

        <script src="assets/js/app.js"></script>

    </body>
</html>

<script>
    let scheduleId = null;
    let templateId = null;

    function load_func(){
        scheduleId = new URLSearchParams(window.location.search).get("id");
        get_schedules();
        // setLastUpdated();
       
    }
</script>
<script>
    function get_schedules(){
        $.ajax({
            url: `ajax/get_schedules.php`,
            type: "GET",
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    console.log("Schedule Details:", response.data);
                    // renderSchedule(response.data);
                    // displayTemplate(response.data[0], response.form_template_questions, response.form_template_answer_options);
                    renderSchedules(response.data);
                } else {
                    alert("Error: " + response.error);
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", error);
                alert("Failed to load template. Check console for details.");
            }
        });
    }
    function renderSchedules(schedules){
        let html;
        schedules.forEach(schedule => {
            console.log(schedule.title);
            html += `<div class="p-3"><div class="p-3 rounded-1 border border-info">
                <p>${schedule.title}</p>
                <p>${schedule.description}</p>
                <p>${schedule.created_at}</p>
 </div>
            </div>`
            
        });
        $("#schedulesContainer").html(html);
    }
</script>