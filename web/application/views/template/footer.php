<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$diretorio = base_url();
?>
<div class="mt-auto">
    <footer>
        <div class="fill-flex d-flex flex-column">
            <hr id="footer-hr" />
            <div class="flex-fill d-flex flex-md-row flex-column">
                    <div id="footer-nomes" class="col order-1 flex-md-fill p-2 d-flex flex-column justify-content-center mb-auto">
                        <div class="align-self-center">
                            <h5>
                                Equipe
                            </h5>
                        </div>
                        <div class="align-self-center">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item p-1 d-flex align-items-center">
                                <span class="badge badge-secondary badge-pill">19xxx</span>
                                &nbsp
                                <span class="nomes text-uppercase">Carlos</span>
                                &nbsp
                                <span class="badge ml-auto">Programador Front-end</span>
                            </li>
                            <li class="list-group-item p-1 d-flex align-items-center">
                                <span class="badge badge-secondary badge-pill">19xxx</span>
                                &nbsp
                                <span class="nomes text-uppercase">Edilson</span>
                                &nbsp
                                <span class="badge ml-auto">Designer</span>
                            </li>
                            <li class="list-group-item p-1 d-flex align-items-center">
                                <span class="badge badge-secondary badge-pill">19xxx</span>
                                &nbsp
                                <span class="nomes text-uppercase">Julia</span>
                                &nbsp
                                <span class="badge ml-auto">Analista de Requisitos</span>
                            </li>
                            <li class="list-group-item p-1 d-flex align-items-center">
                                <span class="badge badge-secondary badge-pill">19xxx</span>
                                &nbsp
                                <span class="nomes text-uppercase">Lucas</span>
                                &nbsp
                                <span class="badge ml-auto">Programador Back-end</span>
                            </li>
                            <li class="list-group-item p-1 d-flex align-items-center">
                                <span class="badge badge-secondary badge-pill">16293</span>
                                &nbsp
                                <span class="nomes text-uppercase">Luis Gustavo</span>
                                &nbsp
                                <span class="badge ml-auto">Gerente de Projeto</span>
                            </li>
                        </ul>
                        </div>
                    </div>
                    <div id="footer-logo" class="col mb-auto order-3 order-md-2 flex-md-fill p-2 d-flex justify-content-center">
                        <div class="d-flex flex-column justify-content-center">
                            <div class="p-2 align-self-center">
                                <img src="<?=$diretorio?>/public/images/logo-unicamp.svg" alt="unicamp logo" style="">
                            </div>
                            <small class="text-muted text-center">
                                Colégio Técnico de Limeira
                            </small>
                        </div>
                    </div>
                    <div id="footer-contato" class="col order-2 order-md-3 flex-md-fill p-2 d-flex flex-column justify-content-center mb-auto">
                        <div class="align-self-center">
                            <h5>
                                CONTATO
                            </h5>
                        </div>
                        <div class="align-self-center">
                            <small class="text-muted text-center">
                                lgpc1871@gmail.com
                            </small>
                        </div>

                    </div>
                </div>
            </div>
        </footer>
    </div>
    
</div>
</body>
</html>