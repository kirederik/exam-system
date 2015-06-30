<header class="panel-heading">
    <h3 class="panel-title">Simulados</h3>
</header>
<div class="panel-body">

    <table class="table table-striped table-hover ">
        <thead>
            <tr>
                <th>Disciplina</th>
                <!-- <th>Disciplinas</th> -->
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>     
            <?php foreach ($exercises as $exercise): ?>
            <tr>
                <td>
                    <?php 
                        // echo $this->Html->link($exam['Discipline']['name'], array('controller' => 'disciplines', 'action' => 'view', $exam['Discipline']['id'])); 
                        echo $exercise['Discipline']['name'];
                    ?>
                </td>
                <td>
                    <?php 
                        echo $this->Html->link('Fazer exercício',
                            array(
                                'action' => 'do_exercise', $exercise['Exercise']['id'],
                            ), array(
                                'class' => 'btn btn-success'
                            )
                        );
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
