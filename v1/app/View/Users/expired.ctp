<header class="panel-heading">
    <h3 class="panel-title">Usuários Expirados</h3>
</header>
<div class="panel-body">

    <?php echo $this->Form->create('User', array(
        'class' => 'form-inline',
        'role' => 'form',
        'inputDefaults' => array(
            'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
            'div' => array('class' => 'form-group'),
            'class' => array('form-control'),
            'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
        )));
    ?>
    <fieldset>
        <legend>
            <h4>Buscar</h4>
        </legend>
        <?php
            echo $this->Form->input('username',
                array(
                    'placeholder' => 'Email',
                    'label' => array('text' => 'Email', 'class' => 'sr-only')
                )
            );
        ?>
        <button type="submit" class="btn btn-primary inline-submit">Buscar</button>
    </fieldset>
    <?php echo $this->Form->end(); ?>
    <hr>
    <table class="table table-striped table-hover ">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Exemplar</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Extender por mais</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>

                <td> <?php echo $user['User']['nome'] ?> </td>
                <td> <?php echo $user['User']['exemplar'] ?> </td>
                <td> <?php echo $user['User']['username'] ?> </td>
                <td> <?php echo $user['User']['fone'] ?> </td>
                <td>
                    <?php echo $this->Form->create('User', array(
                        'type' => 'put',
                        'class' => 'form-inline',
                        'role' => 'form',
                        'inputDefaults' => array(
                            'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                            'div' => array('class' => 'form-group'),
                            'class' => array('form-control'),
                            'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
                        )));
                    ?>
                    <fieldset>
                        <?php
                            echo $this->Form->input('id', array('value' => $user['User']['id']));
                            echo $this->Form->input('extend',
                                array(
                                    'placeholder' => 'Dias',
                                    'label' => array('text' => 'Email', 'class' => 'sr-only')
                                )
                            );
                        ?>
                        <button type="submit" class="btn btn-primary inline-submit">OK</button>
                    </fieldset>
                    <?php echo $this->Form->end(); ?>
                </td>
                <td>
                    <?php
                        echo $this->Html->link('Remover',
                            array(
                                'action' => 'delete', $user['User']['id'],
                            ), array(
                                'class' => 'btn btn-danger',
                                'confirm' => 'Tem certeza?',
                                'icon' => 'icon-remove'
                            )
                        );
                    ?>
                </td>

            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php
        echo $this->Html->link('Novo Usuário',
            array(
                'action' => 'add',
            ), array(
                'class' => 'btn btn-link'
            )
        );
    ?>
</div>

