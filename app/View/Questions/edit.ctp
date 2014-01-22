<header class="panel-heading">
    <h3 class="panel-title">Nova Questão</h3>
</header>
<div class="panel-body">


<?php echo $this->Form->create('Question', array(
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
        echo $this->Form->input('id');
        echo $this->Form->input('question_text',
            array(
                'label' => array('text' => 'Enunciado', 'class' => 'col-lg-2 control-label')
            )
        );
        ?>
        <?php
        echo $this->Form->input('imagem_location',
            array(
                'label' => array('text' => 'Nome da imagem', 'class' => 'col-lg-2 control-label')
            )
        );
        ?>
        <?php
        echo $this->Form->input('correct_comment',
            array(
                'label' => array('text' => 'Comentário de acerto', 'class' => 'col-lg-2 control-label')
            )
        );
        ?>
        <?php
        echo $this->Form->input('wrong_comment',
            array(
                'label' => array('text' => 'Comentário de erro', 'class' => 'col-lg-2 control-label')
            )
        );
        ?>
        <?php
        echo $this->Form->input('discipline_id',
            array(
                'label' => array('text' => 'Disciplina', 'class' => 'col-lg-2 control-label')
            )
        );
        ?>

    </fieldset>
        <fieldset class="alternatives">
        <legend>Alternativas</legend>
        <?php function checked($that, $id) {
            if ($that->request->data['Alternative'][$id]['is_correct']) {
                return ' checked="checked" ';
            }
            else {
                return '';
            }
        }
        ?>
        <?php
            echo $this->Form->input('Alternative.0.id');
            echo $this->Form->input('Alternative.0.alt_text',
                array(
                    'label' => array('text' => '<input type="checkbox" name="data[Alternative][0][is_correct]" id="Alternative0IsCorrect"'. checked($this, 0) . '>' . ' A', 'class' => 'col-lg-2 control-label inline')
                )
            );
        ?>
        <?php
            echo $this->Form->input('Alternative.1.id');
            echo $this->Form->input('Alternative.1.alt_text',
                array(
                    'label' => array('text' =>'<input type="checkbox" name="data[Alternative][1][is_correct]" id="Alternative1IsCorrect"'. checked($this, 1) . '>' . 'B', 'class' => 'col-lg-2 control-label')
                )
            );
        ?>
        <?php
            echo $this->Form->input('Alternative.2.id');
            echo $this->Form->input('Alternative.2.alt_text',
                array(
                    'label' => array('text' => '<input type="checkbox" name="data[Alternative][2][is_correct]" id="Alternative2IsCorrect"'. checked($this, 2) . '>' . 'C', 'class' => 'col-lg-2 control-label')
                )
            );
        ?>
        <?php
            echo $this->Form->input('Alternative.3.id');
            echo $this->Form->input('Alternative.3.alt_text',
                array(
                    'label' => array('text' => '<input type="checkbox" name="data[Alternative][3][is_correct]" id="Alternative3IsCorrect"'. checked($this, 3) . '>' .  ' D', 'class' => 'col-lg-2 control-label')
                )
            );
        ?>
        <?php
            echo $this->Form->input('Alternative.4.id');
            echo $this->Form->input('Alternative.4.alt_text',
                array(
                    'label' => array('text' => '<input type="checkbox" name="data[Alternative][4][is_correct]" id="Alternative4IsCorrect"'. checked($this, 4) . '>' .' E', 'class' => 'col-lg-2 control-label')
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
            <?php
                echo $this->Html->link('Próxima', array('action' => 'edit', (int) $this->request->data['Question']['id'] + 1), array('class' => "btn btn-default"));
            ?>
        </div>
    </div>
<?php echo $this->Form->end(); ?>
</div>

<script>
    $(document).ready(function() {
        $(':checkbox').change(function(){
            var that = this;
            $(":checkbox").each(function() {
                if (this == that) {
                    this.checked = true;
                } else {
                    this.checked = false;
                }
            });
        });
    });
</script>