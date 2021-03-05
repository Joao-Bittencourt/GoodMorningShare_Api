<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Imagen $imagens
 */
?>
<div class="column-responsive column-80">
        <div class="tipoPessoas form content">
            <?= $this->Form->create($imagens,['type'=>'file']) ?>
            <fieldset>
                <legend><?= __('Add Tipo Pessoa') ?></legend>
                <?php
                    echo $this->Form->file('arquivo',['multiple', 'class'=>'btn btn-ligth','value'=>' ']);
//                    echo $this->Form->control('tipo');
//                    echo $this->Form->control('status');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>