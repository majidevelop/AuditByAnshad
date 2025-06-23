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

            }
        } catch (error) {
            console.error("Error:", error);
        }
    }


    async function get_process(){
         try {
            const response = await fetch("ajax/get_process.php", {
                method: "GET",
                headers: { "Content-Type": "application/json" },
            });

            const data = await response.json();
            process = data.data;
            console.log("Process:", process);
            if(process.length > 0 ){

            }
        } catch (error) {
            console.error("Error:", error);
        }
    }

    async function renderdepartments(){
        let ctr = 0;
        let row = `
        <option value="">Select department</option>
        `;
        departments.forEach(element => {
            ctr++;
             row += `
                <option value="${element.department_id}">
        ${element.department_name}
                </option>
            `;

        });
            $("#department_name").html('');

            $("#department_name").append(row);
        
    }

function clearfields() {
    // Clear text inputs, textareas, and selects
    $("input:not([type=radio]):not([type=checkbox]), textarea, select").val("");

    // Uncheck all radio buttons and checkboxes
    $("input[type=radio], input[type=checkbox]").prop("checked", false);
}

    async function createProcessMaster(id) {
        try {
            let url = 'ajax/post_process.php';
            if(id){
                url = `ajax/update_process.php?id=${id}`;

            }
            const data = {
                    process_name: $("#process").val(),
                    department_id: $("#department_name").val()
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
                console.log('Process created:', result);
                clearfields();
                await get_process();
                await render_process();
                $("#process_action_button_div").html(`<button class="btn btn-success" onclick="createProcessMaster()">Save</button>`);

            } else {
                console.error('Server returned an error:', result);
            }

            return result;

        } catch (error) {
            console.error('Request failed:', error);
            return { error: true, message: error.message };
        }
    }


    async function get_application_users(){
        try {

            const response = await fetch("ajax/get_application_users.php", {
                method: "GET",
                headers: { "Content-Type": "application/json" },
            });

            const data = await response.json();
            application_users = data.data;
            console.log("application_users:", application_users);
            return application_users;

        } catch (error) {
            console.error("Error:", error);
        }
    } 