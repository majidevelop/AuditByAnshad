
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
                            <!-- <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <p>Header</p>

                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                            <div class="p-3">
                                            <label for="template_header">Create new header</label>
<textarea class="form-control" name="template_header" id="template_header" rows="4" placeholder="Enter header text..."></textarea>
<button class="btn btn-primary mt-3" id="upload_header">Save</button>


                                            </div>
                                          

                                        </div>
                                        <div class="col-6" id="header_list">

</div>
                                    </div>
            

                                </div>

                            </div>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <p>Footer</p>

                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                            <div class="p-3">
                                            <label for="template_footer">Create new footer</label>
<textarea class="form-control" name="template_footer" id="template_footer" rows="4" placeholder="Enter footer text..."></textarea>
<button class="btn btn-primary mt-3" id="upload_footer">Save</button>

                                            

                                            </div>
                                           

                                        </div>
                                        <div class="col-6" id="footer_list">

</div>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                 </div> -->


<script>
    let footers = [];
    let headers = [];
    function load_func(){
        fetchCoverPages();
        renderFooters();
        renderHeaders();
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



    document.getElementById("upload_cover_page").addEventListener("click", function (e) {
        e.preventDefault();

        const fileInput = document.getElementById("cover_page");
        const file = fileInput.files[0];

        if (!file) {
            alert("Please select a file to upload.");
            return;
        }

        const formData = new FormData();
        formData.append("cover_page", file);

        fetch("ajax/upload_cover_page.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(result => {
            console.log("Upload success:", result);
            alert("Cover page uploaded successfully!");
            fetchCoverPages();
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