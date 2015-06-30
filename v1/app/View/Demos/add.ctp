<header class="panel-heading">
    <h3 class="panel-title">Novo Simulado demo</h3>
</header>
<div class="panel-body">


<?php echo $this->Form->create('Demo', array(
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
        echo $this->Form->input('category_id', 
            array(
                'label' => array('text' => 'Categoria', 'class' => 'col-lg-2 control-label')
            )
        );
        ?>
    </fieldset>
    <fieldset>
        <legend>Questões</legend>
        <?php for ($i=0; $i < 10; $i++) { 
            echo $this->Form->input('DemosQuestion.' . $i . '.question_id',
                array(
                    'type' => 'number',
                    'label' => array('text' => "ID da Questão " . ($i+1), 'class' => 'col-lg-2 control-label inline')
                )
            );
        } ?>
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
