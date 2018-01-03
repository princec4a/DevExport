<?php/**
 * Created by PhpStorm.
 * User: Prince TSATY
 * Date: 04/12/16
 * Time: 12:32
 */?>
<?php
$this->breadcrumbs=array(
    'Dossier'=>array('index'),
    'Recherche',
);
?>
<div class="page-header">
    <h1>Rechercher un relevé de compte client <span id="AjaxLoader"><i class="ace-icon fa fa-spinner fa-spin orange bigger-125"></i></span></h1>
</div>
<div class="col-xs-12">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'client-form-search',
        'htmlOptions'=>array('class'=>'form-horizontal', 'role'=>'form'),
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>false,
    )); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model,'nom_societe', array('label'=>'Société', 'class'=>'col-sm-3 control-label no-padding-right')); ?>
        <div class="col-sm-9">
            <?php $this->widget('zii.widgets.jui.CJuiAutoComplete',array(
                'model'=>$model,
                'attribute'=>'nom_societe',
                'source'=>Client::getListeDataSearch(),
                'options'=>array(
                    'minLength'=>'2',
                ),
                'htmlOptions'=>array(
                    'class'=>'col-xs-10 col-sm-3',
                ),
            ));
            ?>
            <?php echo $form->error($model,'nom_societe'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'date_created', array('label'=>'Du','class'=>'col-sm-3 control-label no-padding-right')); ?>
        <div class="col-sm-9">
            <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model' => $model,
                'attribute' => 'date_created',
                'options' => array(
                    'showAnim' => 'fold',
                    'dateFormat' => 'dd-mm-yy',
                ),
                'htmlOptions' => array(
                    'class'=>'',
                ),
            )); ?>
            <?php echo $form->error($model,'date_created'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'date_modified', array('label'=>'Au','class'=>'col-sm-3 control-label no-padding-right')); ?>
        <div class="col-sm-9">
            <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model' => $model,
                'attribute' => 'date_modified',
                'options' => array(
                    'showAnim' => 'fold',
                    'dateFormat' => 'dd-mm-yy',
                ),
                'htmlOptions' => array(
                    'class'=>'',
                ),
            )); ?>
            <?php echo $form->error($model,'date_modified'); ?>
        </div>
    </div>

    <div class="clearfix form-actions">
        <div class="col-md-offset-3 col-md-9">
            <?php echo CHtml::ajaxButton('Rechercher',CHtml::normalizeUrl(array('client/searchReleveCmpt','render'=>true)),
                array(
                    'dataType'=>'json',
                    'type'=>'post',
                    'success'=>'function(data) {
                        console.log(data);
                        $("#AjaxLoader").hide();
                        if(data.nbClient > 0){
                            $("#success").show("slow");
                            $("#danger").hide();
                            $("span.comment").html(data.nom);
                            $("span.link").html("<a class=\"btn btn-sm btn-success\" target=\"_blank\" href=\"..\/client\/releveCmptClient\/id\/"+data.id+"\/du\/"+data.du+"\/au\/"+data.au+"\/doc\/releveCmptCient \"><i class=\"ace-icon fa fa-print bigger-160\"></i> Prévisualiser</a>");
                        }
                        else{
                            $("#success").hide();
                            $("#danger").show("slow");
                            $("span.comment_error").html("Aucun client trouvé, veuiller verifier sélectionner le bon nom de la société !!");
                        }
                    }',
                    'beforeSend'=>'function(){
                       $("#AjaxLoader").show();
                    }'
                ), array('class'=>'btn btn-info')); ?>
        </div>

    </div>

    <?php $this->endWidget(); ?>

    <div class="alert alert-block alert-success" id="success" style="display:none; ">
        <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
        </button>
        <p>
            <span class="comment"></span>
            <span class="link"></span>
        </p>
    </div>
    <div class="alert alert-danger" id="danger" style="display:none; ">
        <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
        </button>
        <p>
            <span class="comment_error"></span>
        </p>
    </div>
</div>
