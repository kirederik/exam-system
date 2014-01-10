<header class="panel-heading">
    <h3 class="panel-title">Nova Questão</h3>
</header>
<div class="panel-body">


<?php echo $this->Form->create('Question', array(
    'class' => 'form-horizontal', 
    'role' => 'form',
    'inputDefaults' => array(
        'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
        'div' => array('class' => 'form-group'),
        'class' => array('form-control'),
        'label' => array('class' => 'col-lg-2 control-label'),
        'between' => '<div class="col-lg-3">',
        'after' => '</div>',
        'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
    ))); ?>
    <fieldset>
        <legend>Questão</legend>
        <?php  
        echo $this->Form->input('question_text', 
            array(
                'label' => array('text' => 'Enunciado', 'class' => 'col-lg-2 control-label')
            )
        );
        ?>
        <?php  
        echo $this->Form->input('image_location', 
            array(
                'label' => array('text' => 'Localização da imagem', 'class' => 'col-lg-2 control-label')
            )
        );
        ?>
        <?php  
        echo $this->Form->input('correct_comment', 
            array(
                'label' => array('text' => 'Comentário de acerto', 'class' => 'col-lg-2 control-label')
            )
        );
        ?>
        <?php  
        echo $this->Form->input('wrong_comment', 
            array(
                'label' => array('text' => 'Comentário de erro', 'class' => 'col-lg-2 control-label')
            )
        );
        ?>
        <?php  
        echo $this->Form->input('discipline_id', 
            array(
                'label' => array('text' => 'Disciplina', 'class' => 'col-lg-2 control-label')
            )
        );
        ?>
    </fieldset>
    <fieldset class="alternatives">
        <legend>Alternativas</legend>
        <?php  
            echo $this->Form->input('Alternative.0.alt_text', 
                array(
                    'label' => array('text' => '<input type="checkbox" name="data[Alternative][0][is_correct]"  id="Alternative0IsCorrect">' . ' A', 'class' => 'col-lg-2 control-label inline')
                )
            );
        ?>
        <?php  
            echo $this->Form->input('Alternative.1.alt_text', 
                array(
                    'label' => array('text' =>'<input type="checkbox" name="data[Alternative][1][is_correct]" id="Alternative1IsCorrect">' . ' B', 'class' => 'col-lg-2 control-label')
                )
            );
        ?>
        <?php  
            echo $this->Form->input('Alternative.2.alt_text', 
                array(
                    'label' => array('text' => '<input type="checkbox" name="data[Alternative][2][is_correct]" id="Alternative2IsCorrect">' . ' C', 'class' => 'col-lg-2 control-label')
                )
            );
        ?>
        <?php  
            echo $this->Form->input('Alternative.3.alt_text', 
                array(
                    'label' => array('text' => '<input type="checkbox" name="data[Alternative][3][is_correct]" id="Alternative3IsCorrect">' . ' D', 'class' => 'col-lg-2 control-label')
                )
            );
        ?>
        <?php  
            echo $this->Form->input('Alternative.4.alt_text', 
                array(
                    'label' => array('text' => '<input type="checkbox" name="data[Alternative][4][is_correct]" id="Alternative4IsCorrect">' . ' E', 'class' => 'col-lg-2 control-label')
                )
            );
        ?>
    </fieldset>
    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <?php 
                echo $this->Html->link('Cancelar', array('action' => 'index'), array('class' => "btn btn-default"));
            ?>        </div>
    </div>
<?php echo $this->Form->end(); ?>

</div>