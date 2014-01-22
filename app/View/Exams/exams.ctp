<header class="panel-heading fix">
    <h3 class="panel-title">Simulados Online - Arrais-Amador e Motonauta</h3>
</header>
<div class="panel-body">
    <section class="panel panel-warning">
        <header class="panel-heading">
            <h4 class="panel-title">Sobre os simulados</h4>
        </header>
        <div class="panel-body">
            <h5 class="highlight">Seja bem-vindo, <?php $name = explode(" ",AuthComponent::user("nome")); echo $name[0]; ?>.</h5>
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
            <h4 class="panel-title">Por Grupo de Disciplina para cada Categoria</h4>
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
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog details-modal">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">
                    <?php echo $this->Html->image("timao2.gif", array('alt' => 'Portal do Amador', 'class' => 'botimg')); ?>                
                    Ajuda sobre os simulados</h4>
            </div>
            <div class="modal-body  text-small">
                <h5 class="highlight">Caracter&iacute;sticas dos Simulados</h5>
                <p>
                    <strong>1. Por Disciplina</strong> - O sistema disponibiliza quest&otilde;es objetivas de m&uacute;ltipla escolha com cinco (5) op&ccedil;&otilde;es de resposta, sendo uma correta, de modo que o desempenho final na disciplina lhe dir&aacute; se &eacute; preciso estudar mais. Cada simulado por disciplina possui em média 25 quest&otilde;es, em conson&acirc;ncia com os assuntos e/ou conte&uacute;dos que a Marinha costuma cobrar nas provas que aplica.
                </p>
                
                <p><strong>2. Por Grupo de Disciplinas (Provas Simuladas)</strong></p>
                <ul>
                    <li>
                        <strong><em>Arrais-Amador</em></strong> - Para o candidato a  categoria de Arrais-Amador, disponibilizamos provas objetivas de múltipla escolha com cinco (5) opções de resposta, sendo uma correta, com questões selecionadas aleatoriamente de todas as disciplinas exigidas para Arrais-Amador. Cada prova possui 40 questões, no mesmo molde e semelhan&ccedil;a da prova oficial.
                    </li>
                    <li>
                        <em><strong> Motonauta</strong></em> - 
                        Para o candidato a categoria de Motonauta, disponibilizamos provas objetivas de m&uacute;ltipla escolha com cinco (5)  op&ccedil;&otilde;es de resposta, sendo uma correta, com quest&otilde;es selecionadas aleatoriamente de todas as disciplinas exigidas para Motonauta. Cada prova possui 20  quest&otilde;es, no mesmo molde e semelhan&ccedil;a da prova oficial.
                    </li>
                </ul>

                <p class="highlight">
                    <strong>EXAME DE HABILITA&Ccedil;&Atilde;O (Exig&ecirc;ncia da Marinha)</strong>
                    - Os exames de habilita&ccedil;&atilde;o para  as categorias de Arrais-Amador e Motonauta, ser&atilde;o compostos de duas etapas:
                </p>
                <ul>
                    <li>
                        <strong>Primeira etapa:</strong><br>
                        A nova regra, v&aacute;lida a partir de 2 de julho de 2012, exige que a primeira etapa para o exame de Arrais-Amador ser&aacute; constitu&iacute;da de comprova&ccedil;&atilde;o de embarque, de no m&iacute;nimo seis (6) horas. Para Motonauta, o candidato dever&aacute; comprovar ter realizado um m&iacute;nimo de tr&ecirc;s (3) horas de aulas pr&aacute;ticas. A parte pr&aacute;tica ser&aacute; aplicada por entidade n&aacute;utica credenciada junto as Capitanias, Delegacias e Ag&ecirc;ncias pertencentes a Marinha do Brasil.<br>
                    </li>
                    <li>
                        <strong>Segunda  etapa:</strong><br>
                        Ser&aacute; constitu&iacute;da de prova te&oacute;rica escrita tipo m&uacute;ltipla escolha que ser&aacute; aplicada pelas  Capitanias, Delegacias e  Ag&ecirc;ncias pertencentes a Marinha do Brasil. 
                    </li>
                </ul>
                <p class="highlight">
                    <strong>DESCRI&Ccedil;&Atilde;O DETALHADA DOS EXAMES:<br> - </strong>
                    A prova te&oacute;rica ser&aacute; pautada nos seguintes assuntos:
                </p>
                <ul>
                    <li>
                        <strong><em>Motonauta</em></strong><em> - 
                        </em>  Legisla&ccedil;&atilde;o N&aacute;utica, Navega&ccedil;&atilde;o e Balizamento, Primeiros Socorros e Sobreviv&ecirc;ncia no Mar. Ser&aacute; constitu&iacute;da de prova escrita com  20 quest&otilde;es tipo m&uacute;ltipla escolha; ter&aacute; dura&ccedil;&atilde;o m&aacute;xima de uma (1) hora e (30) trinta minutos. Ser&aacute; aprovado o candidato que alcan&ccedil;ar um percentual de acertos igual ou superior a 50%.
                    </li>
                    <li>
                        <em><strong>Arrais-Amador</strong></em> - Legisla&ccedil;&atilde;o N&aacute;utica, Manobra de Embarca&ccedil;&atilde;o, Navega&ccedil;&atilde;o e Balizamento, Primeiros Socorros, Combate a Inc&ecirc;ndio e Sobreviv&ecirc;ncia no Mar. Ser&aacute; constitu&iacute;da de  prova escrita com 40 quest&otilde;es tipo m&uacute;ltipla escolha; ter&aacute; dura&ccedil;&atilde;o m&aacute;xima de duas (2) horas. Ser&aacute; aprovado o candidato que alcan&ccedil;ar um percentual de acertos igual ou superior a 50%.
                    </li>
                    <li>
                        <em><strong>Arrais-Amador e Motonauta</strong></em> - O interessado em obter habilita&ccedil;&atilde;o de Arrais-Amador e Motonauta (juntas), em rela&ccedil;&atilde;o a prova escrita, cumprir&aacute; os mesmos  requisitos exigidos para Arrais-Amador. Ou seja, realizar&aacute; somente a prova  para  Arrais-Amador.
                    </li>
                </ul>
                <div id="saiba_mais">
                    <p class="pull-right"> <span class="highlight">Fonte:  NORMAM-03/DPC - &Uacute;ltima Atualiza&ccedil;&atilde;o: Portaria n&ordm; 29/DPC, de 21/02/2013</span>.</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal -->
<div class="modal fade" id="welcomeModal" tabindex="-1" role="dialog" aria-labelledby="welcomeLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="welcomeLabel">
                    <?php echo $this->Html->image("timao2.gif", array('alt' => 'Portal do Amador', 'class' => 'botimg')); ?>                
                    Simulados Online</h4>
            </div>
            <div class="modal-body">
                <p class="highlight"><?php $name = explode(" ",AuthComponent::user("nome")); echo $name[0]; ?>, seja bem-vindo aos simulados da Escola Náutica Portal do Amador</p>
                <p><i class="glyphicon glyphicon-arrow-right red"></i><strong>  Ao terminar seu estudo, não esqueça de realizar logout do sistema</strong>, utilizando o botão SAIR localizado no canto superior direito.</p>
                <p>Bom Estudo!</p>
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
        if (!sessionStorage.getItem("showWelcome")) {
            sessionStorage.setItem("showWelcome", 1);
            $("#welcomeModal").modal();
        }
    });
</script>
