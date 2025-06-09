async function getScheduledAuditStatus(scheduled_id) {
    try {
        const response = await fetch(`ajax/get_scheduled_audit_status.php?id=${scheduled_id}`);
        const result = await response.json();

        if (result.success) {
            // console.log("Scheduled Audit Status:", result.schedule_audit_status_log.status); // assuming result.data has a 'status' field
            return result.schedule_audit_status_log.status;
        } else {
            console.warn("Error fetching status:", result.error);
            return null;
        }
    } catch (error) {
        console.error("Fetch Error:", error);
        return null;
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