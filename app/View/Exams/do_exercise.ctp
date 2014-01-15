<header class="panel-heading">
    <h3 class="panel-title">Exercício - <?php echo $questions[0]['Discipline']['name'] . ' ' . $number; ?></h3>
</header>



<div class="panel-body unselect">
    <?php $count = count($questions); ?>
    <div id="question-carousel" data-total="<?php echo $count; ?>" class="carousel slide" data-wrap="false">
        <!-- Indicators -->
        <div class="carousel-inner">
            <?php foreach ($questions as $index => $question) { ?>
                <div class="item mainText <?php if ($index == 0) echo "active" ?>">
                    <p><?php echo "Questão ".  ($index + 1) . " de ".$count . ":"; ?></p>
                    <?php echo $question['Question']['question_text']; ?>
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
                                    <?php echo "<input type='radio' data-mark='question".$aindex.$index."' name='question" . $index .
                                        "' value='" . ($alternative['is_correct']  | 0 ). "' />" ;
                                    ?>
                                    <li>
                                        <?php echo $alternative['alt_text']; ?>
                                    </li>
                            <?php } ?>
                        </ol>
                    </form>
                    <div class="hide correctComment alert alert-success">
                         <?php echo $question['Question']['correct_comment']; ?>
                    </div>
                    <div class="hide wrongComment alert alert-danger">
                        <?php echo $question['Question']['wrong_comment']; ?>
                    </div>
                </div>
            <?php }; ?>
            <div class="item" id="score">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title" id="resultModalTitle">Resultado</h4>
                    </div>
                    <div class="panel-body" id="resultBody">
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
                </div><!-- /.modal-dialog -->
            </div>
        </div>

        <!-- Controls -->
        <hr>
        <div class="action-buttons">
            <button id="right-control" class="btn btn-default">
                Próxima
            </button>
            <button id="end" class="btn btn-primary hide">
                Ver resultado
            </button>
            
            <?php echo $this->Html->link('Voltar a lista',
                array(
                    'action' => 'exams',
                ), array(
                    'class' => 'btn btn-default',
                    'id' => 'back'
                )
            ); ?>
            <button id="redo" class="btn btn-default end-btn hide">
                Refazer
            </button>

        </div>
    </div>
    <!-- Button trigger modal -->


<script>
    $(document).ready(function() {
        $("#question-carousel").carousel("pause");
        $("#redo").click(function() {
            location.reload();
        });
        var correct = 0;
        var shouldGoNext = false;
        var passed = 1;
        var total = $("#question-carousel").data("total");
        $("#right-control").click(function() {
            if (!shouldGoNext) {
                var checked = $(".item.active").find("input:checked");
                var active = $(".item.active");
                $(active).find("input").attr("disabled", true);
                $(active).find(".right-answer").removeClass("hide");
                if ($(checked).val() == 1) {
                    correct++;
                    $(active).find(".correctComment").removeClass('hide');
                } else {
                    $(active).find(".wrongComment").removeClass('hide');
                    $("#" + $(checked).data('mark')).removeClass('hide');
                }
                if (passed == total) {
                    $("#right-control").hide();
                    $("#end").removeClass('hide');
                }
            } else {
                $("#question-carousel").carousel("next");
            }
            shouldGoNext = !shouldGoNext;
        });

        $('#question-carousel').on('slid.bs.carousel', function () {
            passed++;
        })

        $("#end").click(function() {
            var efficiency = correct/total;
            $("#hits").html(correct);
            $("#numberOfQuestions").html(total);
            $("#misses").html(total - correct);
            $("#efficiency").html((efficiency * 100).toFixed(2));
            if (efficiency > 0.5) {
                $("#resultTitle").addClass("alert-success").html("Parabéns!");
                $("#whatIneed").html("Seu desempenho foi satisfatório.");
            } else {
                $("#resultTitle").addClass("alert-danger").html("Reprovado.");
                $("#whatIneed").html("Você precisa melhorar seu desempenho nesta disciplina para garantir a aprovação.");
            }
            $("#question-carousel").carousel("next");
            $("#end").addClass("hide");
            $(".end-btn").removeClass("hide");
            $("#back").removeClass('btn-default').addClass("btn-primary");
        });

    });
</script>
