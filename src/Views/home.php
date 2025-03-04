<?php if($data['featured']): ?>
    <section id="featured">
        <div class="container-fluid">
            <div class="row">
                <div id="carouselRevvo" class="carousel slide carousel-fade">
                    <div class="carousel-indicators rounded-pill">
                        <button class="rounded-circle active" type="button" data-bs-target="#carouselRevvo" data-bs-slide-to="0" aria-current="true" aria-label="Slide 1"></button>
                        <button class="rounded-circle" type="button" data-bs-target="#carouselRevvo" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button class="rounded-circle" type="button" data-bs-target="#carouselRevvo" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <?php foreach($data['featured'] as $key => $item): ?>
                        <div class="carousel-item <?= $key === 0 ? 'active' : '' ?>">
                            <img src="<?= BASE_URL . 'src' . $item['image_url'] ?>" class="d-block w-100" alt="<?= htmlspecialchars($item['title']) ?>">
                            <div class="overlay z-2"></div>
                            <div class="carousel-caption z-3 d-none d-md-block">
                                <h2 class="title"><?= htmlspecialchars($item['title']) ?></h2>
                                <p class="content"><?= implode(' ', array_slice(explode(' ', htmlspecialchars($item['content'])), 0, 30)) . '...' ?></p>
                                <a class="btn btn-outline-light btn-custom-primary rounded-pill" href="<?= BASE_URL . 'cursos/' . $item['id'] ?>">Ver Curso</a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <button class="carousel-control-prev z-3" type="button" data-bs-target="#carouselRevvo" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next z-3" type="button" data-bs-target="#carouselRevvo" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if($data['cursos']): ?>
    <section id="cursos">
        <div class="container">
            <div class="row gap-2 g-0">
                <h3 class="title">Meus Cursos</h3>
                <hr class="mb-4 pb-3">
            </div>
            <div class="row g-0">
                <div class="grid-cursos">
                    <div class="row row-cols-4 g-4">
                        <?php foreach($data['cursos'] as $key => $item): ?>
                            <div class="col">
                                <div class="card rounded-1">
                                    <img class="card-img-top rounded-top-1" src="<?= BASE_URL . 'src' . $item['image_url'] ?>" alt="<?= htmlspecialchars($item['title']) ?>">
                                    <div class="card-body">
                                        <h3 class="card-title"><?= $item['title'] ?></h3>
                                        <p class="card-text"><?= implode(' ', array_slice(explode(' ', htmlspecialchars($item['content'])), 0, 15)) . '...' ?></p>
                                        <a class="btn btn-dark btn-custom-primary rounded-pill" href="<?= BASE_URL . 'cursos/' . $item['id'] ?>">Ver Curso</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <div class="col">
                            <a class="btn btn-link btn-custom-create rounded-1" href="<?= BASE_URL ?>cursos/create">
                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="120px" height="120px" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
                                    <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                                        <path d="M320 5106 c-147 -41 -267 -162 -306 -310 -20 -76 -20 -4396 0 -4472
                                        41 -155 171 -280 324 -313 75 -16 4368 -16 4444 0 157 33 293 170 327 327 16
                                        75 16 4369 0 4444 -33 153 -158 283 -313 324 -72 19 -4406 19 -4476 0z m4485
                                        -183 c47 -25 95 -74 121 -123 17 -31 19 -64 22 -282 l3 -248 -744 0 -744 0
                                        -24 26 c-22 24 -24 35 -29 167 -5 133 -7 145 -33 190 -31 52 -95 100 -157 117
                                        -22 6 -583 10 -1532 10 -824 0 -1498 3 -1498 6 0 13 25 52 54 82 32 34 71 59
                                        116 73 14 4 1011 7 2215 6 l2190 -2 40 -22z m-3214 -342 c29 -29 29 -31 29
                                        -141 0 -61 5 -130 11 -153 16 -65 69 -130 130 -161 l53 -26 1568 0 1568 0 0
                                        -85 0 -85 -2390 0 -2390 0 0 340 0 340 696 0 696 0 29 -29z m838 14 c38 -19
                                        41 -30 42 -138 0 -51 4 -113 8 -139 l8 -48 -322 0 c-404 0 -372 -18 -377 213
                                        l-3 127 308 0 c251 0 313 -3 336 -15z m764 3 c41 -21 46 -39 47 -153 0 -61 4
                                        -125 9 -143 l10 -32 -283 0 c-349 0 -321 -15 -329 175 -2 72 -8 138 -12 148
                                        -7 16 10 17 265 17 187 0 278 -4 293 -12z m1755 -2545 c-3 -1634 -4 -1699 -22
                                        -1733 -26 -49 -74 -98 -121 -123 l-40 -22 -2205 0 c-2131 0 -2206 1 -2240 19
                                        -49 26 -98 74 -123 121 l-22 40 -3 1698 -2 1697 2390 0 2390 0 -2 -1697z"/>
                                        <path d="M3782 4667 c-23 -25 -29 -75 -12 -106 16 -31 65 -46 100 -31 37 15
                                        50 37 50 83 0 69 -90 105 -138 54z"/>
                                        <path d="M4126 4669 c-19 -15 -26 -30 -26 -55 0 -47 13 -69 50 -84 40 -16 85
                                        1 106 42 41 79 -58 153 -130 97z"/>
                                        <path d="M4465 4665 c-76 -75 37 -191 116 -119 37 34 32 99 -10 131 -27 21
                                        -79 15 -106 -12z"/>
                                        <path d="M1164 4430 c-55 -22 -69 -91 -30 -137 l24 -28 -24 -28 c-29 -35 -31
                                        -76 -3 -111 26 -33 84 -36 123 -5 l26 20 26 -20 c46 -36 105 -27 129 20 21 40
                                        19 63 -9 96 l-24 28 24 28 c71 83 -41 192 -121 117 l-25 -23 -22 21 c-28 25
                                        -66 34 -94 22z"/>
                                        <path d="M455 4325 c-41 -40 -33 -105 16 -130 40 -21 298 -21 338 0 49 25 57
                                        90 16 130 -24 24 -27 25 -185 25 -158 0 -161 -1 -185 -25z"/>
                                        <path d="M2420 3149 c-487 -60 -886 -407 -1016 -884 -26 -93 -28 -113 -28
                                        -300 0 -186 2 -207 27 -298 54 -199 147 -369 280 -513 562 -603 1534 -478
                                        1931 247 149 272 179 640 77 941 -140 413 -497 721 -925 797 -87 16 -261 21
                                        -346 10z m251 -169 c419 -48 769 -349 879 -755 33 -121 38 -339 12 -466 -63
                                        -305 -265 -569 -542 -709 -601 -303 -1325 48 -1462 710 -26 126 -21 345 12
                                        465 93 344 364 621 706 720 141 41 255 51 395 35z"/>
                                        <path d="M2517 2549 c-40 -23 -47 -68 -47 -288 l0 -210 -230 -3 c-214 -3 -231
                                        -4 -249 -23 -35 -34 -37 -77 -6 -113 l27 -32 228 0 229 0 3 -229 c3 -227 3
                                        -230 27 -255 18 -19 35 -26 61 -26 26 0 43 7 61 26 24 25 24 28 27 255 l3 229
                                        229 0 228 0 27 32 c31 36 29 79 -6 113 -18 19 -35 20 -249 23 l-230 3 0 210
                                        c0 223 -7 266 -48 288 -26 14 -62 14 -85 0z"/>
                                    </g>
                                </svg>
                                <p class="text-add">Adicionar<br /><span>Curso</span></p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
