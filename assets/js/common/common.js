function openModalImage(imgSrc) {
    const modal = document.getElementById('imageModal');
    const modalImg = document.getElementById('modalImage');
    modalImg.src = "ajax/"+imgSrc;
    modal.style.display = 'flex';
}

function closeModal() {
    document.getElementById('imageModal').style.display = 'none';
}
