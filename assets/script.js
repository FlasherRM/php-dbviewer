const modalOverlay = document.getElementById('modalOverlay');
const addButton = document.querySelector('.add_new_db');
const close = document.querySelector('.close_modal');

addButton.addEventListener('click', () => {
    openModal();
})

close.addEventListener('click', () => {
    closeModal();
})

function openModal() {
    modalOverlay.classList.add('active');
}

function closeModal() {
    modalOverlay.classList.remove('active');
}

function redirectToCreateDatabase() {
    const nameInput = document.getElementById('nameInput');
    const name = nameInput.value.trim();

    window.location.href = `http://0.0.0.0:3000/database/create.php?name=${name.toLowerCase()}`;
}