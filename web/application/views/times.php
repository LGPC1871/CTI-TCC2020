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
                            <th>imagem</th>
                            <th>nome</th>
                            <th>admin</th>
                            <th>modalidade</th>
                            <th>Qtd/Limite</th>
                            <th>perfil</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($times as $time): ?>
                            <tr>
                                <td>
                                    <?php $avatar = "src/data/times/avatar/". substr($time->getColumn('time'), 0, 1) ."/".$time->getColumn('id').".jpg"?>
                                    <?php if(!file_exists($avatar)): ?>
                                        <?php $avatar = "src/data/times/avatar/default.jpg"?>
                                    <?php endif ?>
                                    <div class="align-self-center">
                                        <img class="rounded-circle img-fluid" src="<?=$diretorio.$avatar?>" alt="img-perfil" style="height: 35px; width: 35px;">
                                    </div>
                                </td>
                                <td><?= $time->getColumn('time') ?></td>
                                <td><?= $time->getColumn('usuario') ?></td>
                                <td><?= $time->getColumn('modalidade') ?></td>
                                <td><?= $time->getColumn('quantidade_jogadores') . "/" . $time->getColumn('limite_jogadores_time') ?></td>
                                <td><a class="btn btn-success" href="<?=$diretorio?>time?id=<?=$time->getColumn('id')?>">Ver Time</a></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </section>
        </div>
    </div>
</main>