
        </main>
        <footer id="footer">
            <div class="container">
                <div class="row g-0">
                    <p class="text">Copyright <?= date('Y') ?> - All right reserved.</p>
                </div>
            </div>
        </footer>
        <?php if($view === 'cursos/index'): ?>
            <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteLabel">Confirmar Exclusão</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                        </div>
                        <div class="modal-body">
                            <p class="modal-body-title">Tem certeza de que deseja excluir o curso abaixo?</p>
                            <p class="modal-body-text" id="cursoTitle"></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <form id="deleteForm" method="POST" style="display:inline;">
                                <button class="btn btn-danger" type="submit">Excluir</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        
        <div class="modal fade" id="welcomeModal" tabindex="-1" aria-labelledby="welcomeModalLabel" aria-hidden="false">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        
                        <button type="button" class="btn-close-modal" data-bs-dismiss="modal" aria-label="Fechar"><i class="fa-solid fa-xmark"></i></button>
                    </div>
                    <div class="modal-body">
                        <h5 class="modal-title" id="welcomeModalLabel">Lorem Ipsum is simply dummy text of the printing and typesetting industry</h5>
                        <p class="modal-text">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        <button class="btn btn-primary btn-custom-modal-primary rounded-pill" type="button">Inscreva-se</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="<?= BASE_URL ?>src/assets/js/main.js"></script>
    </body>
</html>
