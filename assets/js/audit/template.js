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