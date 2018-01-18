<?php $row_id = "detailFacture-" . $key ?>
<div class='row-fluid' id="<?php echo $row_id ?>">
    <?php
        echo $form->hiddenField($model, "[$key]id");
        echo $form->updateTypeField($model, $key, "updateType", array('key' => $key));
    ?>
    <div class="col-xs-6 col-sm-3">
        <div class="form-group">
            <?php echo $form->labelEx($model,"[$key]description_materiel", array('class'=>'col-sm-3 control-label no-padding-right')); ?>
            <div class="col-sm-9">
                <?php echo $form->textField($model,"[$key]description_materiel",array('size'=>60,'maxlength'=>255,'class'=>'col-xs-10 col-sm-10')); ?>
                <?php echo $form->error($model,"[$key]description_materiel"); ?>
            </div>
        </div>
    </div>

    <div class="col-xs-6 col-sm-3">
        <div class="form-group">
            <?php echo $form->labelEx($model,"[$key]conteneur", array('class'=>'col-sm-3 control-label no-padding-right')); ?>
            <div class="col-sm-9">
                <?php echo $form->textField($model,"[$key]conteneur",array('size'=>60,'maxlength'=>255,'class'=>'col-xs-10 col-sm-9')); ?>
                <?php echo $form->error($model,"[$key]conteneur"); ?>
            </div>
        </div>
    </div>

    <div class="col-xs-6 col-sm-2">
        <div class="form-group">
            <?php echo $form->labelEx($model,"[$key]poids_net", array('class'=>'col-sm-3 control-label no-padding-right')); ?>
            <div class="col-sm-9">
                <?php echo $form->textField($model,"[$key]poids_net", array('class'=>'col-xs-10 col-sm-9')); ?>
                <?php echo $form->error($model,"[$key]poids_net"); ?>
            </div>
        </div>
    </div>

    <div class="col-xs-6 col-sm-2">
        <div class="form-group">
            <?php echo $form->labelEx($model,"[$key]taux", array('class'=>'col-sm-3 control-label no-padding-right')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model,"[$key]taux", array('class'=>'col-xs-10 col-sm-10')); ?>
                <?php echo $form->error($model,"[$key]taux"); ?>
            </div>
        </div>
    </div>

    <div class="span2 clearfix">
        <?php echo $form->deleteRowButton($row_id, $key); ?>
    </div>

</div>

