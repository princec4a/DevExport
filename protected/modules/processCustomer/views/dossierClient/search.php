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
        <h1>Rechercher un Dossier <span id="AjaxLoader"><i class="ace-icon fa fa-spinner fa-spin orange bigger-125"></i></span></h1>
</div>
<div class="col-xs-12">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'dossier-client-form',
        'htmlOptions'=>array('class'=>'form-horizontal', 'role'=>'form'),
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>false,
    )); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model,'num_bon_commande', array('label'=>'N° Bon de Commande', 'class'=>'col-sm-3 control-label no-padding-right')); ?>
        <div class="col-sm-9">
            <?php echo $form->textField($model,'num_bon_commande'); ?>
            <?php echo $form->error($model,'num_bon_commande'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'num_booking', array('label'=>'N° Booking', 'class'=>'col-sm-3 control-label no-padding-right')); ?>
        <div class="col-sm-9">
            <?php echo $form->textField($model,'num_booking'); ?>
            <?php echo $form->error($model,'num_booking'); ?>
        </div>
    </div>

    <div class="clearfix form-actions">
        <div class="col-md-offset-3 col-md-9">
            <?php echo CHtml::ajaxButton('Rechercher',CHtml::normalizeUrl(array('dossierClient/search','render'=>true)),
                array(
                    'dataType'=>'json',
                    'type'=>'post',
                    'success'=>'function(data) {

                        if(data["nbrDossier"]>0){
                            $("#success").show("slow");
                            $("#danger").hide();
                            $("span.comment").html(data["nbrDossier"]+" dossier trouvé du client : ");
                            $("span.link").html("<a href=\"..\/client\/view\/id\/"+data["id_client"]+"\/do\/"+data["id_dossier"]+" \">"+data["client"]+"</a>");
                        }
                        else{
                            $("#success").hide();
                            $("#danger").show("slow");
                            $("span.comment_error").html("Aucun dossier trouvé, veuiller verifier le <strong>N° Bon de commande</strong> et/ ou le <strong>N° Booking saisis</strong> !!");
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
