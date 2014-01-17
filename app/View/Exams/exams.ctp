<header class="panel-heading">
    <h3 class="panel-title">Simulados Online - Arrais-Amador e Motonauta</h3>
</header>
<div class="panel-body">
    <section class="panel panel-warning">
        <header class="panel-heading">
            <h4 class="panel-title">Sobre os simulados</h4>
        </header>
        <div class="panel-body">
            <p>O sistema foi criado com o objetivo de ajudar o candidato a se preparar para os exames de habilitação para Arrais-Amador ou Motonauta (ou ambos). O candidato resolve as questões e fica sabendo na hora como foi o seu desempenho. No entanto, antes de prosseguir nos simulados, recomendamos que você pegue a sua <strong>Apostila Preparatória para Motonauta e Arrais-Amador (6ª Edição - julho de 2013)</strong>, que compõe a bibliografia básica, e faça uma leitura atenta de seu importante conteúdo.</p>
            
            <p>Para saber detalhes dos Simulados e dos Exames de habilitação para Arrais-Amador e Motonauta, <span id="details" class="btn-link">clique aqui</span>.
            
            <p>Caso encontre algum erro nas questões ou no texto dos simulados, por favor, escreva para nós. <a href="http://www.portaldoamador.com.br/paginas/contato.html">Clique aqui</a> para preencher o formulário e enviar.</p>
            <p><i class="glyphicon glyphicon-arrow-right red"></i><strong>  Ao terminar seu estudo, não esqueça de sair do sistema.</strong> O botão para sair está no canto superior direito.</p>
        </div>
    </section>
    <section class="panel panel-info">
        <header class="panel-heading">
            <h4 class="panel-title">Por Disciplina</h4>
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
    <section class="panel-info panel">
        <header class="panel-heading">
            <h4 class="panel-title">Por Categorias</h4>
        </header>
        <div class="panel-body">
            <table class="table table-striped table-hover ">
                <thead>
                    <tr>
                        <th>Categoria</th>
                        <!-- <th>Disciplinas</th> -->
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>     
                    <?php foreach ($exams as $exam): ?>
                    <tr>
                        <td>
                            <?php 
                                // echo $this->Html->link($exam['Discipline']['name'], array('controller' => 'disciplines', 'action' => 'view', $exam['Discipline']['id'])); 
                                echo $exam['Category']['name'];
                            ?>
                        </td>
                        <td>
                            <?php 
                                echo $this->Html->link('Fazer simulado',
                                    array(
                                        'action' => 'do_exam', $exam['Exam']['id'],
                                    ), array(
                                        'class' => 'btn btn-success'
                                    )
                                );
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-remote='http://portaldoamador.com.br/paginas/simulados/arrais_amador/simulados_area_restrita/sobre_os_simulados_online.html' aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Ajuda sobre os simulados</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    $(document).ready(function() {
        $("#details").click(function() {
            $("#myModal").modal('show');
        });
    });
</script>
