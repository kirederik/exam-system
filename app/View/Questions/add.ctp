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
        echo $this->Form->input('show_correct', 
            array(
                'label' => array('text' => 'Mostrar comentário ao acertar?', 'class' => 'col-lg-2 control-label'),
                'checked' => 'checked'
            )
        );
        ?>
        <?php  
        echo $this->Form->input('show_wrong', 
            array(
                'label' => array('text' => 'Mostrar comentário ao errar?', 'class' => 'col-lg-2 control-label'),
                'checked' => 'checked'
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
    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <?php 
                echo $this->Html->link('Cancelar', array('action' => 'index'), array('class' => "btn btn-default"));
            ?>        </div>
    </div>
<?php echo $this->Form->end(); ?>

</div>