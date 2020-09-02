<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<main class="flex-fill d-flex">
    <div class="d-flex flex-fill justify-content-center text-center">
        <div class="col-12 col-md-10 col-lg-8 col-xl-6 p-2">
            <section class="">
                <h2>Times Cadastrados</h2>
                <hr>
            </section>
            <section class="">
                <table id="tabela-times" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>nome</th>
                            <th>admin</th>
                            <th>modalidade</th>
                            <th>perfil</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($times as $time): ?>
                            <tr>
                                <td><?= $time->getNome() ?></td>
                                <td><?= $time->getUsuarioId() ?></td>
                                <td><?= $time->getModalidadeId() ?></td>
                                <td><a class="btn btn-success" href="<?=$diretorio?>time?id=<?=$time->getId()?>">Ver Time</a></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </section>
        </div>
    </div>
</main>