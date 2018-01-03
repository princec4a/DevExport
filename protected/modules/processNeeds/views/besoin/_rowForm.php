<?php $row_id = "detailBesoin-" . $key ?>
<div class='row-fluid' id="<?php echo $row_id ?>">
    <?php
        echo $form->hiddenField($model, "[$key]id");
        echo $form->updateTypeField($model, $key, "updateType", array('key' => $key));
    ?>
    <div class="col-xs-6 col-sm-4">
        <div class="form-group">
            <?php echo $form->labelEx($model, "[$key]libelle", array('class'=>'col-sm-3 control-label no-padding-right')); ?>
            <div class="col-sm-9">
                <?php echo $form->textField($model, "[$key]libelle", array('class'=>'col-xs-10 col-sm-10')); ?>
                <?php echo $form->error($model, "[$key]libelle"); ?>
            </div>
        </div>
    </div>

    <div class="col-xs-6 col-sm-3">
        <div class="form-group">
            <?php echo $form->labelEx($model, "[$key]quantite", array('class'=>'col-sm-3 control-label no-padding-right')); ?>
            <div class="col-sm-9">
                <?php echo $form->textField($model, "[$key]quantite", array('class'=>'col-xs-10 col-sm-6')); ?>
                <?php echo $form->error($model, "[$key]quantite"); ?>
            </div>
        </div>
    </div>

    <div class="col-xs-6 col-sm-3">
        <div class="form-group">
            <?php echo $form->labelEx($model, "[$key]pu", array('class'=>'col-sm-3 control-label no-padding-right')); ?>
            <div class="col-sm-9">
                <?php echo $form->textField($model, "[$key]pu", array('class'=>'col-xs-10 col-sm-6')); ?>
                <?php echo $form->error($model, "[$key]pu"); ?>
            </div>
        </div>
    </div>
    <div class="span2 clearfix">
        <?php echo $form->deleteRowButton($row_id, $key); ?>
    </div>
</div>

