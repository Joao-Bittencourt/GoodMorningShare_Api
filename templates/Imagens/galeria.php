 
<div class="row row-cols-1 row-cols-md-4 g-4">
    <?php foreach ($imagens as $key => $imagem) { ?>

        <div class="col">
            <div class="card">
                <?= $this->Html->image($imagem['url'], ['class' => 'card-img-top', '' => true]); ?>
                <div class="card-footer">
                <?= $this->Form->postLink(__('Delete'), ['action' => 'deletar', $imagem['id']], ['confirm' => __('Are you sure you want to delete # {0}?',$imagem['id'] ), 'class' => 'btn btn-danger']) ?>
              
                </div>
            </div>
        </div>


        <?php
    }
    ?>
</div>




