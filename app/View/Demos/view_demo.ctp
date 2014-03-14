<header class="panel-heading">
    <h3 class="panel-title">Demonstração <span class="hide-on-small">- <?php echo $demo['Category']['name']; ?></span> <span class="pull-right" id="countdown"></span></h3>
</header>
<div class="panel-body unselect" >

    <ol class="mainText" data-total="<?php echo count($questions); ?>">
        <?php shuffle($questions); ?>
        <?php foreach ($questions as $index => $question) { ?>
            <li class="question" id='<?php echo "mquestion" . $index ?>'>
                <?php
                    echo $question['Question']['question_text']; 
                ?>
                <form>
                    <ol class="alternatives">
                        <?php
                            shuffle($question['Alternative']);
                            foreach ($question['Alternative'] as $aindex => $alternative) { ?>
                                <?php if ($alternative['is_correct']) { ?>
                                    <span class="hide feedback right-answer glyphicon glyphicon-ok"></span>
                                <?php } else { ?>
                                    <span id="<?php echo 'question' . $aindex . $index ?>" class="hide feedback wrong-answer glyphicon glyphicon-remove"></span>
                                <?php } ?>
                                <?php echo "<input type='radio' data-mark='question".  $aindex . $index . "' name='question" . $index .
                                    "' value='" . ($alternative['is_correct']  | 0 ). "' />" ;
                                ?>
                                <li>
                                    <?php echo $alternative['alt_text']; ?>
                                </li>
                        <?php } ?>
                    </ol>
                </form>
                <p>
                    <div class="hide correctComment alert alert-success">
                         <?php echo $question['Question']['correct_comment']; ?>
                    </div>
                    <div class="hide wrongComment alert alert-danger">
                        <?php echo $question['Question']['wrong_comment']; ?>
                    </div>
                </p>
            </li>
        <?php } ?>
    </ol>
    <hr>
<!--     <button id="end" type="button" class="btn btn-primary">
        Terminar
    </button> -->
    <!-- Button trigger modal -->
    <div class="action-buttons">
        <button class="btn btn-info" id="end" data-toggle="modal" data-target="#confirm">
            Terminar
        </button>
        <button class="btn btn-danger" id="clean" data-toggle="modal" data-target="#confirmClean">
            Limpar
        </button>           
        <?php echo $this->Html->link('Voltar a lista',
            array(
                'action' => 'viewDemos',
            ), array(
                'class' => 'btn btn-default',
                'id' => 'back'
            )
        ); ?>
        <a class="btn btn-primary" href="http://www.portaldoamador.com.br/paginas/apostila_ara.html">Comprar</a>
        
    </div>

    <!-- Modal -->
    <div class="modal fade" data-keyboard="false" data-backdrop="static" id="instructions" tabindex="-1" role="dialog" aria-labelledby="instLabel" data-show="true" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="instLabel">Instruções</h4>
                </div>
                <div class="modal-body">
                    <p>Esta é uma demonstração do sistema de Simulados do Portal do Amador.</p>

                    <p>Das mais de 500 questões atuais cadastradas em nosso banco de dados, este Simulado Demo lhe ofertará somente 10 questões atualizadas abordadas nos Exames para Arrais-Amador e Motonauta.</p>

                    <p>Pressione o botão abaixo para iniciar o simulado.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="start">Iniciar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Confirmação</h4>
                </div>
                <div class="modal-body">
                    Tem certeza que deseja terminar?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="confirmYes">Sim</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirmClean" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Confirmação</h4>
                </div>
                <div class="modal-body">
                    Tem certeza que deseja desmarcar todos?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="confirmClean">Sim</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="score" tabindex="-1" role="dialog" aria-labelledby="resultModalTitle" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="resultModalTitle"></h4>
                </div>
                <div class="modal-body" id="resultBody">
                    <h4 id="resultTitle" class="alert"></h4>
                    <p>Chegamos ao final deste Simulado de Demonstração.</p>
                    <div id="resultDetails">
                        <p>De um total de <span id="numberOfQuestions"></span> questões, você:</p>
                        <ul>
                            <li>Acertou <span id="hits"></span> questões.</li>
                            <li>Errou <span id="misses"></span> questões.</li>
                        </ul>
                        <p>Seu aproveitamento foi de <span id="efficiency"></span>%.</p>
                        
                        <p>Aqui você encontrou uma micro amostra das questões cadastradas em nossos simulados online. São perguntas simulares às questões oficiais recentemente aplicadas pela Marinha para Arrais-Amador e Motonauta, com o diferencial de serem comentadas.</p>

                        <p>Não perca mais tempo procurando. Acelere seus estudos resolvendo questões que realmente avaliam seu conhecimento antes da prova.</p>

                        <p>Clique no botão "Comprar" para adquirir sua Apostila e ter acesso integral aos Simulados online.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-primary" href="http://www.portaldoamador.com.br/paginas/apostila_ara.html">Comprar</a>
                    <button type="button" class="btn btn-info" data-dismiss="modal">Ver correção</button>
                </div>
            </div>
        </div>
    </div>

<script>
    $(document).ready(function() {
        $("#instructions").modal('show');
        var start = function() {
            var active = true;
            var showResult = function(title) {
                console.log("tims");
                $("#score").modal('show');
                $("#resultModalTitle").html(title);
                var correct = 0;
                $(".question ol").each(function(index, val) {
                    var checked = $(this).children("input:checked");
                    if ($(checked).val() == 1) {
                        correct++;
                        $(this).parent().parent().children(".correctComment").removeClass('hide');
                    } else {
                        $(this).parent().parent().children(".wrongComment").removeClass('hide');
                        console.log($(checked).data('mark'));
                        $("#" + $(checked).data('mark')).removeClass('hide');
                    }
                });
                var total = $(".mainText").data("total");
                var efficiency = correct/total;
                $("#hits").html(correct);
                $("#numberOfQuestions").html(total);
                $("#misses").html(total - correct);
                $("#efficiency").html((efficiency * 100).toFixed(2));
                if (efficiency > 0.5) {
                    $("#resultTitle").addClass("alert-success").html("Bom trabalho");
                } else {
                    $("#resultTitle").addClass("alert-danger").html("Reprovado");
                    // $("#whatIneed").html("Você precisa de um aproveitamento <strong>superior a 50%</strong> para passar no exame.");
                }
                active = false;
                $("#end").hide();
                $("#clean").hide();
                $("#redo").addClass("btn-primary").removeClass("btn-default");
                $("input[type='radio']").remove();
                $(".right-answer").removeClass("hide");
            }

            $("#confirmYes").click(function() {
                $("#confirm").modal('hide');
                setTimeout(function() {
                    showResult("Resultado");
                }, 100);
            });

            $("#confirmClean").click(function() {
                $('input[type="radio"]').removeAttr('checked');
            });

            $("#redo").click(function() {
                location.reload();
            })
        }
        $("#start").click(function() {
            start();
        });
    });
</script>
