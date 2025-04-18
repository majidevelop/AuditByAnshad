
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
                                                <button class="btn btn-primary mt-3" id="upload_cover_page">Upload Cover Page</button>
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
                            <p>
                                            Add Header text here
                                        </p>
                                        <div id="ckeditor-classic"></div>

                            </div>

                            <div class="col-12">
                                <p>
                                    Add Footer text here
                                </p>
                                <div id="ckeditor-classic1"></div>

                            </div>
                            <div>
                                <button id="save_footer">save_footer</button>
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
/*
    let footers = [];
    let headers = [];
    function load_func(){
        // fetchCoverPages();
        // renderFooters();
        // renderHeaders();
    }

    function renderFooters(){
        fetch("ajax/get_footers.php")
        .then(res => res.json())
        .then(data => {
            const container = document.getElementById("footer_list");
            container.innerHTML = "";
console.log(data);
            if (data.success === true) {
                data.data.forEach(file => {
                  html = `<div>${file.footer_text}</div>`;
                  container.innerHTML +=html;
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
    function renderHeaders(){
        fetch("ajax/get_headers.php")
        .then(res => res.json())
        .then(data => {
            const container = document.getElementById("header_list");
            container.innerHTML = "";
console.log(data);
            if (data.success === true) {
                data.data.forEach(file => {
                    html = `<div>${file.header_text}</div>`;
                  container.innerHTML +=html;

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
    
    document.getElementById("upload_footer").addEventListener("click", function (e) {
    e.preventDefault();

    const headerText = document.getElementById("template_footer").value.trim();

    if (!headerText) {
        alert("Please enter header content.");
        return;
    }
    const payload = {
        template_footer:headerText
    };

    fetch("ajax/save_footer.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        body: JSON.stringify(payload)

    })
    .then(res => res.json())
    .then(data => {
        if (data.success === true) {
            alert("Footer saved successfully!");
            document.getElementById("template_footer").value = "";
            renderFooters();
        } else {
            alert("Error: " + data.message);
        }
    })
    .catch(err => {
        console.error("Error:", err);
        alert("Something went wrong.");
    });
});




    document.getElementById("upload_header").addEventListener("click", function (e) {
    e.preventDefault();

    const headerText = document.getElementById("template_header").value.trim();

    if (!headerText) {
        alert("Please enter header content.");
        return;
    }
    const payload = {
        template_header:headerText
    };

    fetch("ajax/save_header.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        body: JSON.stringify(payload)

    })
    .then(res => res.json())
    .then(data => {
        console.log(data);
        if (data.success === true) {
            alert("Header saved successfully!");
            document.getElementById("template_header").value = "";
            renderFooterandHeaderList("header_list");

        } else {
            alert("Error: " + data.message);
        }
    })
    .catch(err => {
        console.error("Error:", err);
        alert("Something went wrong.");
    });
});
*/


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

console.log("ffootr" +footer_text);
console.log("hdrrotr" +header_text);

        const fileInput = document.getElementById("cover_page");
        const file = fileInput.files[0];

        if (!file) {
            alert("Please select a file to upload.");
            return;
        }

        const formData = new FormData();
        formData.append("cover_page", file);
        formData.append("header_text", header_text);
        formData.append("footer_text", footer_text);
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


</script>
