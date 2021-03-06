    
    <header class="panel-heading text-center">
        <h3 class="panel-title">Simulados Online</h3>
    </header>
<div class="login-page">
    <div class="panel-body">
    
    <?php echo $this->Session->flash('auth'); ?>
    <?php echo $this->Form->create('User', array(
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
            <legend>
                <?php echo __('Entre com seus dados'); ?>
            </legend>
            <?php
                echo $this->Form->input('username', array(
                    'label' => array('text' => 'Email', 'class' => 'col-lg-2 control-label')
                ));
                echo $this->Form->input('password',
                    array(
                        "type" => "password",
                        'label' => array('text' => 'Senha', 'class' => 'col-lg-2 control-label')
                    )
                );
        ?>
        </fieldset>
        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
                <button type="submit" class="btn btn-primary">Login</button>
                <?php
                    echo $this->Html->link('Cancelar', array('action' => 'index'), array('class' => "btn btn-default"));
                ?>
            </div>
        </div>
        <p id="favorite">
            Pressione <span class="highlight">Ctrl+D</span> para adicionar esta página aos favoritos.
        </p>
    <?php echo $this->Form->end(); ?>
    </div>
</div>