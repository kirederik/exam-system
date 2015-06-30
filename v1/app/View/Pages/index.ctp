<h1> Simulados</h1>
<ul>
    <?php 
        echo "<li>".$this->Html->link('Disciplinas', array('controller' => 'Disciplines', 'action' => 'index')) . "</li>"; 
        echo "<li>";
        echo $this->Html->link('Categorias', array('controller' => 'Categories', 'action' => 'index'));
        echo "</li><li>";
        echo $this->Html->link('Questões', array('controller' => 'Questions', 'action' => 'index'));
        echo "</li><li>";
        // echo $this->Html->link('Exercícios', array('controller' => 'Exercises', 'action' => 'index'));
        // echo "<br >";
        echo $this->Html->link('Provas', array('controller' => 'Exams', 'action' => 'index'));
        echo "</li><li>";
        echo $this->Html->link('Ver Simulados', array('controller' => 'Exams', 'action' => 'exams'));
        echo "</li><li>";
        echo $this->Html->link('Ver Demonstrações', array('controller' => 'Demos', 'action' => 'index'));
        echo "</li>";
        // echo $this->Html->link('Ver Exercícios', array('controller' => 'Exercises', 'action' => 'exercises'));
    ?>
</ul>