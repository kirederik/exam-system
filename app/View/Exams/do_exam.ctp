<header class="panel-heading">
    <h3 class="panel-title">Simulado - <?php echo $exam['Category']['name']; ?> <span class="pull-right" id="countdown"></span></h3>
</header>
<div class="panel-body">

    <ol class="mainText" data-total="<?php echo count($questions); ?>">
        <?php foreach ($questions as $index => $question) { ?>
            <li class="question" id='<?php echo "question" . $index ?>'>
                <?php echo $question['Question']['question_text']; ?>
                <form>
                    <ol class="alternatives">
                        <?php foreach ($question['Alternative'] as $alternative) { ?>
                            <?php echo "<input type='radio' name='question" . $index . 
                                "' value='" . ($alternative['is_correct']  | 0 ). "' />" ; 
                            ?>
                            <li>
                                <?php echo $alternative['alt_text']; ?>
                            </li>
                        <?php } ?>
                    </ol>
                </form>
            </li>
        <?php } ?>
    </ol>
    <hr>
    <button id="end" type="button" class="btn btn-primary">
        Terminar
    </button>
</div>

<script>
    $(document).ready(function() {
        $("#end").click(function() {
            if (confirm("Deseja finalizar o simulado?")) {
                var correct = 0;
                $(".question ol input:checked").each(function(index, val) { 
                    if ($(val).val() == 1) {
                        correct++;
                    }
                });     
                var total = $(".mainText").data("total");
                if (correct > total/2) {
                    alert("Parabéns! Você passou");
                } else {
                    alert("Seu fracassado!");
                }       
            }
        });

        // set the date we're counting down to
        var target_date = new Date().getTime() + 60 * 60 * 4 * 1000;
         
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
            countdown.innerHTML = "Tempo restante: " + hours + "h "
            + minutes + "m " + seconds + "s";  
         
        }, index * 1000);
    });
</script>
