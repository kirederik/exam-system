<header class="panel-heading">
    <h3 class="panel-title">Questão <?php echo $question['Question']['id'] ?> - Disciplina: <?php echo $question['Discipline']['name'] ?></h3>
</header>
<div class="panel-body">
    <section class="panel panel-primary">
        <header class="panel-heading">
            <h3 class="panel-title">Enunciado</h3>
        </header>
        <p class="panel-body">
            <?php echo $question['Question']['question_text'] ?>
        </p>
    </section>
    
    <section class="comments panel panel-info">
        <header class="panel-heading">
            <h3 class="panel-title">Comentários:</h3>
        </header>        
        <div class="panel-body">
            <p class="alert alert-success">
                <?php echo $question['Question']['correct_comment']  ?>
            </p>
            <p class="alert alert-danger">
                <?php echo $question['Question']['wrong_comment']  ?>
            </p>
            <p>Mostrando comentário de acerto? 
                <?php echo ($question['Question']['show_correct']) ? "Sim" : "Não" ?>
            </p>
            <p>Mostrando comentário de erro? 
                <?php echo ($question['Question']['show_wrong']) ? "Sim" : "Não" ?>
            </p>
        </div>
    </section>
    <section class="text-center">
        
        <?php 
            echo $this->Html->link('Editar',
                array(
                    'action' => 'edit', $question['Question']['id'],
                ), array(
                    'class' => 'btn btn-primary'
                )
            );
        ?>
    <?php 
            echo $this->Html->link('Voltar',
                array(
                    'action' => 'index'
                ), array(
                    'class' => 'btn btn-default'
                )
            );
        ?>
    </section>
</div>

