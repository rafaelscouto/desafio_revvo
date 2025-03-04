<header id="header">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="<?= BASE_URL ?>">
                <img class="logo logo-dark" src="<?= BASE_URL . 'src/assets/images/logo-dark.png' ?>" alt="Logo do site">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="form form-search d-flex ms-auto" action="<?= BASE_URL . 'cursos/search' ?>" method="GET" role="search">
                    <div class="input-group">
                        <input class="form-control rounded-pill" type="search" name="s" value="<?= htmlspecialchars($_GET['s'] ?? '') ?>" placeholder="Pesquisar cursos..." aria-label="Pesquisar cursos..." aria-describedby="button-search">
                        <button class="btn btn-link" type="submit" id="button-search"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
                <ul class="navbar-nav ps-2 mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle user-profile" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="img-user rounded-circle" src="<?= BASE_URL . 'src/assets/images/foto_perfil.jpeg' ?>" alt="Imagem do usuário Rafael Couto">    
                            <div class="text-user">
                                <span class="welcome-msg">Seja bem-vindo</span>
                                <span class="user-name">Rafael Couto</span>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?= BASE_URL ?>cursos">Todos os Cursos</a></li>
                            <li><a class="dropdown-item" href="<?= BASE_URL ?>cursos/create">Adicionar Curso</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
