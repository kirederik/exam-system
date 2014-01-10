<header class="panel-heading">
    <h3 class="panel-title">Simulados</h3>
</header>
<div class="panel-body">

    <table class="table table-striped table-hover ">
        <thead>
            <tr>
                <th>Categoria</th>
                <!-- <th>Disciplinas</th> -->
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>     
            <?php foreach ($exams as $exam): ?>
            <tr>
                <td>
                    <?php 
                        // echo $this->Html->link($exam['Discipline']['name'], array('controller' => 'disciplines', 'action' => 'view', $exam['Discipline']['id'])); 
                        echo $exam['Category']['name'];
                    ?>
                </td>
                <td>
                    <?php 
                        echo $this->Html->link('Fazer simulado',
                            array(
                                'action' => 'do_exam', $exam['Exam']['id'],
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
