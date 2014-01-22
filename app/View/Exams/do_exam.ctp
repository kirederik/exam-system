<header class="panel-heading">
    <h3 class="panel-title">Simulado <span class="hide-on-small">- <?php echo $exam['Category']['name']; ?></span> <span class="pull-right" id="countdown"></span></h3>
</header>
<div class="panel-body unselect" >

    <ol class="mainText" data-total="<?php echo count($questions); ?>"
        data-time="<?php echo $exam['Exam']['time_minutes']; ?>">
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
        <button class="btn btn-primary" id="end" data-toggle="modal" data-target="#confirm">
            Terminar
        </button>
        <button class="btn btn-danger" id="clean" data-toggle="modal" data-target="#confirmClean">
            Limpar
        </button>
        <button class="btn btn-default" id="redo">
            Gerar outra prova
        </button>                
        <?php echo $this->Html->link('Voltar a lista',
            array(
                'action' => 'exams',
            ), array(
                'class' => 'btn btn-default',
                'id' => 'back'
            )
        ); ?>
    </div>

    <!-- Modal -->
    <div class="modal fade" data-keyboard="false" data-backdrop="static" id="instructions" tabindex="-1" role="dialog" aria-labelledby="instLabel" data-show="true" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="instLabel">Instruções</h4>
                </div>
                <div class="modal-body">
                    <p>Preste atenção ao tempo: você tem 
                    <?php echo floor($exam['Exam']['time_minutes'] / 60) . 'h' .str_pad($exam['Exam']['time_minutes'] % 60, 2, '0', STR_PAD_LEFT) . 'm'; ?> para realizar o simulado. Há um cronômetro no canto superior direito da prova.</p>
                    <p>Este simulado é composto por <?php echo count($questions); ?> questões e engloba as disciplinas abordadas no exame de <?php echo $exam['Category']['name']; ?>. </p>
                    <p>Para ser aprovado, você precisa acertar ao menos 50% das questões.</p>
                    <p>Pressione no botão abaixo para iniciar o simulado.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="start">Iniciar</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

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
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

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
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" id="score" tabindex="-1" role="dialog" aria-labelledby="resultModalTitle" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="resultModalTitle"></h4>
                </div>
                <div class="modal-body" id="resultBody">
                    <h4 id="resultTitle" class="alert"></h4>
                    <div id="resultDetails">
                        <p>De um total de <span id="numberOfQuestions"></span> questões, você:</p>
                        <ul>
                            <li>Acertou <span id="hits"></span> questões.</li>
                            <li>Errou <span id="misses"></span> questões.</li>
                        </ul>
                        <p>Seu aproveitamento foi de <span id="efficiency"></span>%.</p>
                        <p id="whatIneed"></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Ver correção</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

<script>
    $(document).ready(function() {
        // if (sessionStorage && !sessionStorage.getItem("instructionsModal")) {
            $("#instructions").modal('show');
            // sessionStorage.setItem("instructionsModal", 1);
        // }
        var start = function() {
            var active = true;
            var showResult = function(title) {
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
                    $("#resultTitle").addClass("alert-success").html("Aprovado");
                } else {
                    $("#resultTitle").addClass("alert-danger").html("Reprovado");
                    $("#whatIneed").html("Você precisa de um aproveitamento <strong>superior a 50%</strong> para passar no exame.");
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

            // set the date we're counting down to
            var minutes = Number($(".mainText").data("time"));
            var target_date = new Date().getTime() + 60 * minutes * 1000;

            // variables for time units
            var days, hours, minutes, seconds;

            // get tag element
            var countdown = document.getElementById("countdown");
            var index = 0;
            // update the tag with id "countdown" every 1 second
            setInterval(function () {
                // find the amount of "seconds" between now and target
                index = 1;
                var current_date = new Date().getTime() ;
                var seconds_left = (target_date - current_date) / 1000;

                // do some time calculations
                days = parseInt(seconds_left / 86400);
                seconds_left = seconds_left % 86400;

                hours = parseInt(seconds_left / 3600);
                seconds_left = seconds_left % 3600;

                minutes = parseInt(seconds_left / 60);
                seconds = parseInt(seconds_left % 60);

                // format countdown string + set tag value
                if (active) {
                    countdown.innerHTML = "Tempo restante: " + hours + "h "
                      + minutes + "m " + seconds + "s";
                    if (hours + minutes + seconds == 0) {
                        // time up!
                        active = false;
                        showResult("Tempo Expirado!");
                    }
                }
            }, index * 1000);
        }
        $("#start").click(function() {
            start();
        });
        // start();
    });
</script>
