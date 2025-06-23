function openModalImage(imgSrc) {
    const modal = document.getElementById('imageModal');
    const modalImg = document.getElementById('modalImage');
    modalImg.src = "ajax/"+imgSrc;
    modal.style.display = 'flex';
}

function closeModal() {
    document.getElementById('imageModal').style.display = 'none';
}


function openModalById(modalId){
   render_non_conformities_remarks(modalId);

}

function open_delete_modal(id, text){
    let body = `<div>
        <p>
            Are you sure you want to delete this ${text} ?
        </p>
    </div>
        <div>
            <button class="btn btn-danger" onclick="delete_${text}(${id})"  data-bs-dismiss="modal">Yes</button>
            <button class="btn btn-secondary" data-bs-dismiss="modal">No</button>

        </div>
    `;    

    $("#mySmallModalLabel").html('Confirm Delete');
    $("#modal_body").html(body);


}