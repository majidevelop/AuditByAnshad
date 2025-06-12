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