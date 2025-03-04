
document.addEventListener("DOMContentLoaded", function () {
    const expirationTime = 24 * 60 * 60 * 1000;
    const modalTimestamp = localStorage.getItem("active_modal");

    if(!modalTimestamp || Date.now() - modalTimestamp > expirationTime) {
        let welcomeModal = new bootstrap.Modal(document.getElementById("welcomeModal"));
        welcomeModal.show();

        localStorage.setItem("active_modal", Date.now());
    }

    const alertElement = document.querySelector("#message .alert");
    if(alertElement) {
        alertElement.addEventListener("closed.bs.alert", function () {
            document.querySelector("#message").remove();
        });
    }

    const confirmDeleteModal = document.getElementById("confirmDeleteModal");
    if(confirmDeleteModal) {
        const deleteButtons = document.querySelectorAll(".btn-delete");
        const deleteForm = document.getElementById("deleteForm");
        const deleteCursoTitleElement = document.getElementById("cursoTitle");
    
        deleteButtons.forEach(button => {
            button.addEventListener("click", function () {
                const cursoId = this.getAttribute("data-id");
                const cursoTitle = this.getAttribute("data-title");
                deleteForm.setAttribute("action", `cursos/${cursoId}/delete`);
                deleteCursoTitleElement.textContent = `#${cursoId} - ${cursoTitle}`;
            });
        });
    }
});
