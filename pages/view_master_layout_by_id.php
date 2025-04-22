
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
                                    <h4 class="mb-sm-0 font-size-18">Form Report Master Template</h4>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                            <li class="breadcrumb-item active">Master Template</li>
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
                                            <div class="col-12 p-4">
                                                <label for="layout_title">Title</label>
                                                <input type="text" name="layout_title" id="layout_title" class="form form-input form-control" placeholder="Title">
                                            </div>
                                            
                                            <div class="col-12 p-4">
                                                <label for="layout_description">Description</label>
                                                <input type="text" name="layout_description" id="layout_description" placeholder="Description" class="form form-input form-control">

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">

                                        <p>
                                            Cover Page
                                        </p>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="p-3">
                                                <label for="cover_page">Upload Cover Page</label>
                                                <input type="file" class="form-control file file-select form-file" name="cover_page" id="cover_page" >
                                                <!-- <button class="btn btn-primary mt-3" id="upload_cover_page">Upload Cover Page</button> -->
                                            </div>

                                            </div>
                                            <div class="col-6">
                                                <div class="row" id="cover_page_list">

                                                </div>

                                            </div>

                                        </div>
                                        

                                    </div>

                                </div>

                            </div>

                            <div class="col-12">
                            <p>             Add Header text here
                                        </p>
                                        <div id="header">

                                        </div>
                                        <div id="ckeditor-classic"></div>

                            </div>

                            <div class="col-12">
                                <p>
                                    Add Footer text here
                                </p>
                                <div id="footer">

                                </div>
                                <div id="ckeditor-classic1"></div>

                            </div>
                            <div>
                                <button id="save_footer" class="btn btn-primary">save_footer</button>
                            </div>
                    </div>
                    


                    <script>
                        let header_text = null;
                        let footer_text = null;

//                     document.getElementById("save_footer").addEventListener("click", function (e) {
//                         e.preventDefault();
//                         function getHeaderandFooter(){
//                             const editorElement = document.querySelectorAll('.ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline.ck-blurred');
//                         // console.log(editorElement);
//                         editorElement.forEach((editor, index) => {
//                         console.log(`Editor ${index + 1}:`);
//                         console.log(editor.innerHTML);
//                         if(index == 1){
//                             if (!editor.innerHTML.trim() || editor.innerHTML.trim() == `<p><br data-cke-filler="true"></p>`) {
//                             alert("Please enter footer content.");
//                             return;

//                         }
//                         header_text = editor.innerHTML.trim();
//                         }else{
//                             if (!editor.innerHTML.trim() || editor.innerHTML.trim() == `<p><br data-cke-filler="true"></p>`) {
//                             alert("Please enter header content.");
//                             return;

//                         }
//                         footer_text = editor.innerHTML.trim();

//                         }
// });

//                         }
                        
                        

//                         const editorElement = document.querySelector('#ckeditor-classic .ck-content');
// const content = editorElement.innerHTML;
// console.log(content);

// const editorElement1 = document.querySelector('#ckeditor-classic1 .ck-content');
// const content1 = editorElement1.innerHTML;
// console.log(content1);

                    // });

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
    let templateId = null;
    function load_func(){
        templateId = new URLSearchParams(window.location.search).get("id");
        if (templateId) {
            get_master_layout(templateId);
            setLastUpdated();
        } else {
            alert("No template ID provided.");
        }
    }
</script>

<script>
    function get_master_layout(templateId){
        $.ajax({
            url: `ajax/get_master_layout_by_id.php?id=${templateId}`,
            type: "GET",
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    console.log("Template Details:", response);
                    renderMasterLayout(response.data);
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

    document.getElementById("save_footer").addEventListener("click", function (e) {
        e.preventDefault();
                            const editorElement = document.querySelectorAll('.ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline.ck-blurred');
                        // console.log(editorElement);
                        editorElement.forEach((editor, index) => {
                        console.log(`Editor ${index + 1}:`);
                        console.log(editor.innerHTML);
                        if(index == 1){
                            if (!editor.innerHTML.trim() || editor.innerHTML.trim() == `<p><br data-cke-filler="true"></p>`) {
                            alert("Please enter footer content.");
                            return;

                        }
                        header_text = editor.innerHTML.trim();
                        }else{
                            if (!editor.innerHTML.trim() || editor.innerHTML.trim() == `<p><br data-cke-filler="true"></p>`) {
                            alert("Please enter header content.");
                            return;

                        }
                        footer_text = editor.innerHTML.trim();

                        }
});



        const fileInput = document.getElementById("cover_page");
        const file = fileInput.files[0];

        if (!file) {
            alert("Please select a file to upload.");
            return;
        }
        const layout_title = document.getElementById('layout_title').value;
        const layout_description = document.getElementById('layout_description').value;
        const formData = new FormData();
        formData.append("cover_page", file);
        formData.append("header_text", header_text);
        formData.append("footer_text", footer_text);
        formData.append("layout_description", layout_description);
        formData.append("layout_title", layout_title);
console.log(formData.footer_text);
for (var pair of formData.entries()) {
    console.log(pair[0]+ ': ' + pair[1]);
}
        fetch("ajax/upload_cover_page.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(result => {
            console.log("Upload success:", result);
            alert("Cover page uploaded successfully!");
            location.reload();
            // fetchCoverPages();
        })
        .catch(error => {
            console.error("Upload failed:", error);
            alert("Upload failed.");
        });
    });

    function fetchCoverPages() {
    fetch("ajax/get_cover_pages.php")
        .then(res => res.json())
        .then(data => {
            const container = document.getElementById("cover_page_list");
            container.innerHTML = "";
console.log(data);
            if (data.success === true) {
                data.data.forEach(file => {
                    const img = document.createElement("img");
                    img.src = `ajax/uploads/cover_pages/${file.file_name}`;
                    img.alt = file;
                    img.classList.add("cover-thumb");
                    container.appendChild(img);
                });
            } else {
                container.innerHTML = "<p>No cover pages found.</p>";
            }
        })
        .catch(err => {
            console.error("Fetch error:", err);
            alert("Error loading cover pages.");
        });
}

    function renderMasterLayout(response){
        let title = response[0].title;
        console.log(title);
        document.getElementById('layout_title').value = title; 

        let description = response[0].description;
        console.log(title);
        document.getElementById('layout_description').value = description; 

        let cover_page = document.getElementById('cover_page_list');
        cover_page.innerHTML = `<img src="ajax/${response[0].file_path}" class="w-100">`;
        const editorInstances = [];
        const editorElement = document.querySelectorAll('.ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline.ck-blurred');
                        // console.log(editorElement);
                        editorElement.forEach((editor, index) => {
                           
                            console.log(`Editor ${index + 1}:`);
                            console.log(editor.innerHTML);
                            if(index == 1){
                                editor.innerHTML = response[0].header_text;
                                document.getElementById('header').innerHTML = response[0].header_text;
                            console.log(editor.innerHTML);

                            
                            }else{
                                editor.innerHTML = response[0].footer_text;
                            console.log(editor.innerHTML);
                            document.getElementById('footer').innerHTML = response[0].footer_text;



                            }
                        });
                    }

</script>
