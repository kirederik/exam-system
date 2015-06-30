<header class="panel-heading">
    <h3 class="panel-title">Questões</h3>
</header>
<div class="panel-body">

    <?php echo $this->Form->create('Question', array(
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
        <p>
            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">
                Mostrar formulário
            </button>
        </p>

        <div id="demo" class="collapse out">

            <?php
                echo $this->Form->input('question_text',
                    array(
                        'placeholder' => 'Entre com o enunciado (ou uma parte dele)',
                        'label' => array('text' => 'Enunciado', 'class' => 'sr-only')
                    )
                );
            ?>
            <button type="submit" class="btn btn-primary inline-submit">Buscar</button>
            <hr>
        </div>

    </fieldset>
    <?php echo $this->Form->end(); ?>

    <?php if (!$nopage) { ?>
        <?php
            echo $this->Html->link('Nova Questão',
                array(
                    'action' => 'add',
                ), array(
                    'class' => 'btn btn-primary'
                )
            );
        ?>
        <div class="text-center mygroup">
            <?php
                echo $this->Paginator->first('<<');
                echo $this->Paginator->prev(
                    '<',
                    array('tag' => false),
                    null,
                    array('class' => 'prev disabled')
                );

                echo $this->Paginator->numbers();
                echo $this->Paginator->next(
                    '>',
                    array('tag' => false),
                    null,
                    array('class' => 'disabled')
                );
                echo $this->Paginator->last('>>');

            ?>
        </div>
    <?php } ?>
    <table class="table table-striped table-hover ">
        <thead>
            <tr>
                <th>ID</th>
                <th>Enunciado</th>
                <th>Disciplina</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($questions as $question): ?>
            <tr>

                <td> <?php echo $question['Question']['id'] ?> </td>
                <td class="not_that_big"> <?php echo $question['Question']['question_text'] ?> </td>
                <td> <?php echo $question['Discipline']['name'] ?> </td>
                <td>
                    <?php
                        echo $this->Html->link('Ver',
                            array(
                                'action' => 'view', $question['Question']['id'],
                            ), array(
                                'class' => 'btn btn-success'
                            )
                        );
                    ?>
                    <?php
                        echo $this->Html->link('Editar',
                            array(
                                'action' => 'edit', $question['Question']['id'],
                            ), array(
                                'class' => 'btn btn-info'
                            )
                        );
                    ?>
                    <?php
                        echo $this->Html->link('Remover',
                            array(
                                'action' => 'delete', $question['Question']['id'],
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
    <?php if (!$nopage) { ?>
        <div class="text-center mygroup">
            <?php
                echo $this->Paginator->first('<<');
                echo $this->Paginator->prev(
                    '<',
                    array('tag' => false),
                    null,
                    array('class' => 'prev disabled')
                );

                echo $this->Paginator->numbers();
                echo $this->Paginator->next(
                    '>',
                    array('tag' => false),
                    null,
                    array('class' => 'disabled')
                );
                echo $this->Paginator->last('>>');

            ?>
        </div>
    <?php } ?>
    <?php
        echo $this->Html->link('Nova Questão',
            array(
                'action' => 'add',
            ), array(
                'class' => 'btn btn-primary'
            )
        );
    ?>
</div>

