function createEventListenerForRadio(IsRadioPresent, question_number){
    console.log("createEventListenerForRadio");
    if(IsRadioPresent){
        // Select all radio buttons in the group
                const radios = document.querySelectorAll(`input[name="response_${question_number}"]`);
                
                radios.forEach(radio => {
                    radio.addEventListener('change', (event) => {
                    console.log(`Selected value: ${event.target.value}`);
                    // Handle the change (e.g., update UI, call a function)
                    updateTemplate();
                    });
                });
    }
}


async function get_questions(id) {
     try {
        const response = await fetch(`ajax/get_questions_by_template_id.php?id=${id}`, {
            method: "GET",
            headers: { "Content-Type": "application/json" },
        });

        const data = await response.json();
        console.log("Questions:", data.data);
        template_questions = data.data;
                    

    } catch (error) {
        console.error("Error:", error);
    }
}