<header class="panel-heading">
    <h3 class="panel-title">Questões</h3>
</header>
<div class="panel-body">

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
    <?php 
        echo $this->Html->link('Nova Questão',
            array(
                'action' => 'add',
            ), array(
                'class' => 'btn btn-link'
            )
        );
    ?>
</div>

