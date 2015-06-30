<header class="panel-heading">
    <h3 class="panel-title">Simulados</h3>
</header>
<div class="panel-body">
    <table class="table table-striped table-hover ">
        <thead>
            <tr>
                <th>ID</th>
                <th>Categoria</th>
                <!-- <th>Disciplinas</th> -->
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>     
        	<?php foreach ($exams as $exam): ?>
			<tr>
				<td><?php echo $exam['Exam']['id']; ?></td>
				<td>
					<?php 
					    // echo $this->Html->link($exam['Discipline']['name'], array('controller' => 'disciplines', 'action' => 'view', $exam['Discipline']['id'])); 
						echo $exam['Category']['name'];
					?>
				</td>
				<td>
                    <?php 
                        echo $this->Html->link('Ver',
                            array(
                                'action' => 'view', $exam['Exam']['id'],
                            ), array(
                                'class' => 'btn btn-success'
                            )
                        );
                    ?>

                    <?php 
                        echo $this->Html->link('Editar',
                            array(
                                'action' => 'edit', $exam['Exam']['id'],
                            ), array(
                                'class' => 'btn btn-info'
                            )
                        );
                    ?>
                    <?php 
                        echo $this->Html->link('Remover',
                            array(
                                'action' => 'delete', $exam['Exam']['id'],
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
        echo $this->Html->link('Novo Simulado',
            array(
                'action' => 'add',
            ), array(
                'class' => 'btn btn-link'
            )
        );
    ?>
</div>
