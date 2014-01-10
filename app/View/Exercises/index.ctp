<header class="panel-heading">
    <h3 class="panel-title">Exercícios</h3>
</header>
<div class="panel-body">

    <table class="table table-striped table-hover ">
        <thead>
            <tr>
                <th>ID</th>
                <th>Disciplina</th>
                <th>Número de Questões</th>
                <th>Questões</th>
                <th>Ações</th>

            </tr>
        </thead>
        <tbody>     
        	<?php foreach ($exercises as $exercise): ?>
			<tr>
				<td><?php echo $exercise['Exercise']['id']; ?></td>
				<td>
					<?php 
					    // echo $this->Html->link($exercise['Discipline']['name'], array('controller' => 'disciplines', 'action' => 'view', $exercise['Discipline']['id'])); 
						echo $exercise['Discipline']['name'];
					?>
				</td>
				<td><?php echo $exercise['Exercise']['quantity'] ?></td>
				<td><?php 
                    $init = $exercise['Exercise']['first_question_id'];
                    $end  = (int) $exercise['Exercise']['first_question_id'] + (int) $exercise['Exercise']['quantity'] - 1;
                    echo $init . ' -- ' . $end ?></td>
				<td>
                    <?php 
                        echo $this->Html->link('Editar',
                            array(
                                'action' => 'edit', $exercise['Exercise']['id'],
                            ), array(
                                'class' => 'btn btn-info'
                            )
                        );
                    ?>
                    <?php 
                        echo $this->Html->link('Remover',
                            array(
                                'action' => 'delete', $exercise['Exercise']['id'],
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
        echo $this->Html->link('Novo Exercício',
            array(
                'action' => 'add',
            ), array(
                'class' => 'btn btn-link'
            )
        );
    ?>
</div>
