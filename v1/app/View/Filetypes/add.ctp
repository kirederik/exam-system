<header class="panel-heading">
    <h3 class="panel-title">Novo Tipo de Material</h3>
</header>
<div class="panel-body">


<?php echo $this->Form->create('Filetype', array(
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
        echo $this->Form->input('name', 
            array(
                'label' => array('text' => 'Tipo', 'class' => 'col-lg-2 control-label')
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