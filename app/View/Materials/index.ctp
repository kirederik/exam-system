<header class="panel-heading">
    <h3 class="panel-title">Material Complementar</h3>
</header>
<div class="panel-body unselect" >
    <section class="panel panel-warning">
        <header class="panel-heading">
            <h4 class="panel-title">Sobre o material Complementar</h4>
        </header>
        <div class="panel-body">
            <p>Nesta sessão, você encontra diversos materiais adicionais, como textos e vídeo-aulas, para complementação de seu estudo. É importante ficar atento a esta sessão, pois estamos sempre trabalhando para fornecer novos materiais.</p>
            
            <p>Caso tenha alguma dúvida, não deixe de visitar o nosso fórum. Lá você poderá fazer perguntas que a equipe do Portal do Amador responderá assim que possível.</p>
        </div>
    </section>

    <section class="panel panel-info">
        <header class="panel-heading">
            <h4 class="panel-title">Vídeo-aulas</h4>
        </header>
        <div class="panel-body">
            <div class="panel-group" id="accordion">
                <?php $dindex = 0; ?>
                <?php foreach ($disciplines as $discipline): ?>        
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $dindex; ?>">
                                    <?php echo $discipline['Discipline']['name']; ?>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse<?php echo $dindex; ?>" class="panel-collapse collapse out">
                            <div class="panel-body">
                            <ul>
                                <?php 
                                    $count = count($discipline['Question']);
                                    $amount = $count / 25; 
                                    $dname = $discipline['Discipline']['name'];
                                    for ($i=1; $i <= $amount ; $i++):
                                ?>
                                <li>
                                    <?php  echo $this->Html->link($dname . ' ' . $i,
                                        array(
                                            'action' => 'do_exercise', $discipline['Discipline']['id'], $i,
                                        )
                                    ); ?>
                                </li>
                                <?php endfor; ?>
                                <?php if ($count % 25 != 0): ?>
                                    <li>
                                        <?php  echo $this->Html->link($dname . ' ' . $i,
                                            array(
                                                'action' => 'do_exercise', $discipline['Discipline']['id'], $i,
                                            )
                                        ); ?>
                                    </li>
                                <?php endif ?>
                            </ul>
                            </div>
                        </div>
                    </div>
                    <?php $dindex += 1; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>
<!--     <button id="end" type="button" class="btn btn-primary">
        Terminar
    </button> -->
    <!-- Button trigger modal -->

