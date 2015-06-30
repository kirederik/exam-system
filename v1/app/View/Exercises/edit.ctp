
<header class="panel-heading">
    <h3 class="panel-title">Editando Exercício</h3>
</header>
<div class="panel-body">


<?php echo $this->Form->create('Exercise', array(
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
        echo $this->Form->input('discipline_id', 
            array(
                'label' => array('text' => 'Disciplina', 'class' => 'col-lg-2 control-label')
            )
        );
        ?>
         <?php  
        echo $this->Form->input('question', 
            array(
                'label' => array('text' => 'Primeira Questão', 'class' => 'col-lg-2 control-label')
            )
        );
        ?>
        <?php  
        echo $this->Form->input('quantity', 
            array(
                'label' => array('text' => 'Número de Questões', 'class' => 'col-lg-2 control-label'),
                'type' => 'number'
            )
        );
        ?>
    </fieldset>
    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <?php 
                echo $this->Html->link('Cancelar', array('action' => 'index'), array('class' => "btn btn-default"));
            ?>        
        </div>
    </div>
<?php echo $this->Form->end(); ?>

</div>

