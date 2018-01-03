<?php
/**
 * Created by PhpStorm.
 * User: Prince TSATY
 * Date: 30/11/16
 * Time: 03:02
 */
?>
<div id="navbar" class="navbar navbar-default ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
        </button>

        <div class="navbar-header pull-left">
            <a href="index.html" class="navbar-brand">
                <small>
                    <i class="fa fa-leaf"></i>
                    DevExport
                </small>
            </a>
        </div>

        <div id="top-alert" class="navbar-buttons navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">
                <?php if(Yii::app()->user->checkAccess('DG') || Yii::app()->user->checkAccess('DD') || Yii::app()->user->checkAccess('RTT') || Yii::app()->user->checkAccess('Caissier') ) :  ?>
                <li><button class="btn btn-warning" id="relaod"><i class="ace-icon fa fa-refresh bigger-160"></i></button></li>
                <li class="grey dropdown-modal">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <strong style="font-size: 20px;">DevA</strong>
                        <span class="badge badge-grey">
                            <?php
                                if(Yii::app()->user->checkAccess('admin')) echo count(ValidationController::getAllDevisANonValider());
                                else{
                                    if(Yii::app()->user->checkAccess('DG')) echo count(ValidationController::getDevisADgNonValider());
                                    if(Yii::app()->user->checkAccess('DD')) echo count(ValidationController::getDevisADDNonValider());
                                    if(Yii::app()->user->checkAccess('RTT')) echo count(ValidationController::getDevisARTTNonValider());
                                    if(Yii::app()->user->checkAccess('Caissier')) echo count(ValidationController::getDevisACaissierNonValider());
                                }
                            ?>
                        </span>
                    </a>

                    <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                        <li class="dropdown-header">
                            <i class="ace-icon fa fa-check"></i>
                            <?php
                            if(Yii::app()->user->checkAccess('admin')) echo count(ValidationController::getAllDevisANonValider());
                            else{
                                if(Yii::app()->user->checkAccess('DG')) echo count(ValidationController::getDevisADgNonValider());
                                if(Yii::app()->user->checkAccess('DD')) echo count(ValidationController::getDevisADDNonValider());
                                if(Yii::app()->user->checkAccess('RTT')) echo count(ValidationController::getDevisARTTNonValider());
                                if(Yii::app()->user->checkAccess('Caissier')) echo count(ValidationController::getDevisACaissierNonValider());
                            }
                            ?> Devis A non validé (s)
                        </li>

                        <li class="dropdown-content">
                            <ul class="dropdown-menu dropdown-navbar">
                                <?php if(Yii::app()->user->checkAccess('admin')) : ?>
                                    <?php foreach(ValidationController::getAllDevisANonValider() as $devisA) : ?>
                                        <li>
                                            <?php echo CHtml::link('
                                                <div class="clearfix">
                                                    <span class="pull-left">'.CHtml::encode($devisA->numero).'</span>
                                                    <span class="pull-right label label-warning arrowed-in-right arrowed"><i class="ace-icon fa fa-exclamation-triangle bigger-120"></i> Non validé</span>
                                                </div>',
                                                array('/processDevis/devisA/view', 'id'=>$devisA->primaryKey)); ?>
                                        </li>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <?php if(Yii::app()->user->checkAccess('DG')) : ?>
                                        <?php foreach(ValidationController::getDevisADgNonValider() as $devisA) : ?>
                                            <li>
                                                <?php echo CHtml::link('
                                                <div class="clearfix">
                                                    <span class="pull-left">'.CHtml::encode($devisA->numero).'</span>
                                                    <span class="pull-right label label-warning arrowed-in-right arrowed"><i class="ace-icon fa fa-exclamation-triangle bigger-120"></i> Non validé</span>
                                                </div>',
                                                    array('/processDevis/devisA/view', 'id'=>$devisA->primaryKey)); ?>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                    <?php if(Yii::app()->user->checkAccess('DD')) : ?>
                                        <?php foreach(ValidationController::getDevisADDNonValider() as $devisA) : ?>
                                            <li>
                                                <?php echo CHtml::link('
                                                <div class="clearfix">
                                                    <span class="pull-left">'.CHtml::encode($devisA->numero).'</span>
                                                    <span class="pull-right label label-warning arrowed-in-right arrowed"><i class="ace-icon fa fa-exclamation-triangle bigger-120"></i> Non validé</span>
                                                </div>',
                                                    array('/processDevis/devisA/view', 'id'=>$devisA->primaryKey)); ?>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                    <?php if(Yii::app()->user->checkAccess('RTT')) : ?>
                                        <?php foreach(ValidationController::getDevisARTTNonValider() as $devisA) : ?>
                                            <li>
                                                <?php echo CHtml::link('
                                                <div class="clearfix">
                                                    <span class="pull-left">'.CHtml::encode($devisA->numero).'</span>
                                                    <span class="pull-right label label-warning arrowed-in-right arrowed"><i class="ace-icon fa fa-exclamation-triangle bigger-120"></i> Non validé</span>
                                                </div>',
                                                    array('/processDevis/devisA/view', 'id'=>$devisA->primaryKey)); ?>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                    <?php if(Yii::app()->user->checkAccess('Caissier')) : ?>
                                        <?php foreach(ValidationController::getDevisACaissierNonValider() as $devisA) : ?>
                                            <li>
                                                <?php echo CHtml::link('
                                                <div class="clearfix">
                                                    <span class="pull-left">'.CHtml::encode($devisA->numero).'</span>
                                                    <span class="pull-right label label-warning arrowed-in-right arrowed"><i class="ace-icon fa fa-exclamation-triangle bigger-120"></i> Non validé</span>
                                                </div>',
                                                    array('/processDevis/devisA/view', 'id'=>$devisA->primaryKey)); ?>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                <?php endif; ?>

                            </ul>
                        </li>
                    </ul>
                </li>



                <li class="purple dropdown-modal">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <strong style="font-size: 20px;">DevD</strong>
                        <span class="badge badge-important"><?php
                            if(Yii::app()->user->checkAccess('admin')) echo count(ValidationController::getAllDevisDNonValider());
                            else{
                                if(Yii::app()->user->checkAccess('DG')) echo count(ValidationController::getDevisDDgNonValider());
                                if(Yii::app()->user->checkAccess('DD')) echo count(ValidationController::getDevisDDDNonValider());
                                if(Yii::app()->user->checkAccess('RTT')) echo count(ValidationController::getDevisDRTTNonValider());
                                if(Yii::app()->user->checkAccess('Caissier')) echo count(ValidationController::getDevisDCaissierNonValider());
                            }
                            ?></span>
                    </a>

                    <ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
                        <li class="dropdown-header">
                            <i class="ace-icon fa fa-exclamation-triangle"></i>
                            <?php
                            if(Yii::app()->user->checkAccess('admin')) echo count(ValidationController::getAllDevisDNonValider());
                            else{
                                if(Yii::app()->user->checkAccess('DG')) echo count(ValidationController::getDevisDDgNonValider());
                                if(Yii::app()->user->checkAccess('DD')) echo count(ValidationController::getDevisDDDNonValider());
                                if(Yii::app()->user->checkAccess('RTT')) echo count(ValidationController::getDevisDRTTNonValider());
                                if(Yii::app()->user->checkAccess('Caissier')) echo count(ValidationController::getDevisDCaissierNonValider());
                            }
                            ?> Devis D non validé(s)
                        </li>

                        <li class="dropdown-content">
                            <ul class="dropdown-menu dropdown-navbar navbar-pink">
                                <?php if(Yii::app()->user->checkAccess('admin')) : ?>
                                    <?php foreach(ValidationController::getAllDevisDNonValider() as $devisA) : ?>
                                        <li>
                                            <?php echo CHtml::link('
                                                <div class="clearfix">
                                                    <span class="pull-left">'.CHtml::encode($devisA->numero).'</span>
                                                    <span class="pull-right label label-warning arrowed-in-right arrowed"><i class="ace-icon fa fa-exclamation-triangle bigger-120"></i> Non validé</span>
                                                </div>',
                                                array('/processDevis/devisD/view', 'id'=>$devisA->primaryKey)); ?>
                                        </li>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <?php if(Yii::app()->user->checkAccess('DG')) : ?>
                                        <?php foreach(ValidationController::getDevisDDgNonValider() as $devisA) : ?>
                                            <li>
                                                <?php echo CHtml::link('
                                                <div class="clearfix">
                                                    <span class="pull-left">'.CHtml::encode($devisA->numero).'</span>
                                                    <span class="pull-right label label-warning arrowed-in-right arrowed"><i class="ace-icon fa fa-exclamation-triangle bigger-120"></i> Non validé</span>
                                                </div>',
                                                    array('/processDevis/devisD/view', 'id'=>$devisA->primaryKey)); ?>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                    <?php if(Yii::app()->user->checkAccess('DD')) : ?>
                                        <?php foreach(ValidationController::getDevisDDDNonValider() as $devisA) : ?>
                                            <li>
                                                <?php echo CHtml::link('
                                                <div class="clearfix">
                                                    <span class="pull-left">'.CHtml::encode($devisA->numero).'</span>
                                                    <span class="pull-right label label-warning arrowed-in-right arrowed"><i class="ace-icon fa fa-exclamation-triangle bigger-120"></i> Non validé</span>
                                                </div>',
                                                    array('/processDevis/devisD/view', 'id'=>$devisA->primaryKey)); ?>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                    <?php if(Yii::app()->user->checkAccess('RTT')) : ?>
                                        <?php foreach(ValidationController::getDevisDRTTNonValider() as $devisA) : ?>
                                            <li>
                                                <?php echo CHtml::link('
                                                <div class="clearfix">
                                                    <span class="pull-left">'.CHtml::encode($devisA->numero).'</span>
                                                    <span class="pull-right label label-warning arrowed-in-right arrowed"><i class="ace-icon fa fa-exclamation-triangle bigger-120"></i> Non validé</span>
                                                </div>',
                                                    array('/processDevis/devisD/view', 'id'=>$devisA->primaryKey)); ?>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                    <?php if(Yii::app()->user->checkAccess('Caissier')) : ?>
                                        <?php foreach(ValidationController::getDevisDCaissierNonValider() as $devisA) : ?>
                                            <li>
                                                <?php echo CHtml::link('
                                                <div class="clearfix">
                                                    <span class="pull-left">'.CHtml::encode($devisA->numero).'</span>
                                                    <span class="pull-right label label-warning arrowed-in-right arrowed"><i class="ace-icon fa fa-exclamation-triangle bigger-120"></i> Non validé</span>
                                                </div>',
                                                    array('/processDevis/devisD/view', 'id'=>$devisA->primaryKey)); ?>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </ul>
                        </li>
                    </ul>
                </li>

                <?php endif; ?>

                <?php if(Yii::app()->user->checkAccess('DD') || Yii::app()->user->checkAccess('DG')) : ?>
                    <li class="green dropdown-modal">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <strong style="font-size: 20px;">Besoin</strong>
                        <span class="badge badge-success"><?php
                            if(Yii::app()->user->checkAccess('admin')) echo count(ValidationController::getAllBesoin_NonValider());
                            else{
                                if(Yii::app()->user->checkAccess('DD')) echo count(ValidationController::getBesoin_DDNonValider());
                                if(Yii::app()->user->checkAccess('DG')) echo count(ValidationController::getBesoin_DgNonValider());
                            }
                            ?></span>
                        </a>

                        <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                            <li class="dropdown-header">
                                <i class="ace-icon fa fa-envelope-o"></i>
                                <?php
                                if(Yii::app()->user->checkAccess('admin')) echo count(ValidationController::getAllBesoin_NonValider());
                                else{
                                    if(Yii::app()->user->checkAccess('DD')) echo count(ValidationController::getBesoin_DDNonValider());
                                    if(Yii::app()->user->checkAccess('DG')) echo count(ValidationController::getBesoin_DgNonValider());
                                }
                                ?> Etat de Besoin non validé(s)
                            </li>

                            <li class="dropdown-content">
                                <ul class="dropdown-menu dropdown-navbar">
                                    <?php if(Yii::app()->user->checkAccess('admin')) : ?>
                                        <?php foreach(ValidationController::getAllBesoin_NonValider() as $bc) : ?>
                                            <li>
                                                <?php echo CHtml::link('
                                                <div class="clearfix">
                                                    <span class="pull-left">'.CHtml::encode($bc->numero).'</span>
                                                    <span class="pull-right label label-warning arrowed-in-right arrowed"><i class="ace-icon fa fa-exclamation-triangle bigger-120"></i> Non validé</span>
                                                </div>',
                                                    array('/processNeeds/besoin/view', 'id'=>$bc->primaryKey)); ?>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <?php if(Yii::app()->user->checkAccess('DD')) : ?>
                                            <?php foreach(ValidationController::getBesoin_DDNonValider() as $bc) : ?>
                                                <li>
                                                    <?php echo CHtml::link('
                                                <div class="clearfix">
                                                    <span class="pull-left">'.CHtml::encode($bc->numero).'</span>
                                                    <span class="pull-right label label-warning arrowed-in-right arrowed"><i class="ace-icon fa fa-exclamation-triangle bigger-120"></i> Non validé</span>
                                                </div>',
                                                        array('/processNeeds/besoin/view', 'id'=>$bc->primaryKey)); ?>
                                                </li>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                        <?php if(Yii::app()->user->checkAccess('DG')) : ?>
                                            <?php foreach(ValidationController::getBesoin_DgNonValider() as $bc) : ?>
                                                <li>
                                                    <?php echo CHtml::link('
                                                <div class="clearfix">
                                                    <span class="pull-left">'.CHtml::encode($bc->numero).'</span>
                                                    <span class="pull-right label label-warning arrowed-in-right arrowed"><i class="ace-icon fa fa-exclamation-triangle bigger-120"></i> Non validé</span>
                                                </div>',
                                                        array('/processNeeds/besoin/view', 'id'=>$bc->primaryKey)); ?>
                                                </li>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </ul>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if(/*Yii::app()->user->checkAccess('RTT') ||*/ Yii::app()->user->checkAccess('Caissier')) : ?>
                <li class="green dropdown-modal">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <strong style="font-size: 20px;">BC</strong>
                        <span class="badge badge-success"><?php
                            if(Yii::app()->user->checkAccess('admin')) echo count(ValidationController::getAllBC_NonValider());
                            else{
                                //if(Yii::app()->user->checkAccess('RTT')) echo count(ValidationController::getBC_RTTNonValider());
                                if(Yii::app()->user->checkAccess('Caissier')) echo count(ValidationController::getBC_CaissierNonValider());
                            }
                            ?></span>
                    </a>

                    <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                        <li class="dropdown-header">
                            <i class="ace-icon fa fa-envelope-o"></i>
                            <?php
                            if(Yii::app()->user->checkAccess('admin')) echo count(ValidationController::getAllBC_NonValider());
                            else{
                                //if(Yii::app()->user->checkAccess('RTT')) echo count(ValidationController::getBC_RTTNonValider());
                                if(Yii::app()->user->checkAccess('Caissier')) echo count(ValidationController::getBC_CaissierNonValider());
                            }
                            ?> Bon de caisse non validé(s)
                        </li>

                        <li class="dropdown-content">
                            <ul class="dropdown-menu dropdown-navbar">
                                <?php if(Yii::app()->user->checkAccess('admin')) : ?>
                                    <?php foreach(ValidationController::getAllBC_NonValider() as $bc) : ?>
                                        <li>
                                            <?php echo CHtml::link('
                                                <div class="clearfix">
                                                    <span class="pull-left">'.CHtml::encode($bc->numero).'</span>
                                                    <span class="pull-right label label-warning arrowed-in-right arrowed"><i class="ace-icon fa fa-exclamation-triangle bigger-120"></i> Non validé</span>
                                                </div>',
                                                array('/processBC/bonCaisse/view', 'id'=>$bc->primaryKey)); ?>
                                        </li>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <?php /* ?>
                                    <?php if(Yii::app()->user->checkAccess('RTT')) : ?>
                                        <?php foreach(ValidationController::getBC_RTTNonValider() as $bc) : ?>
                                            <li>
                                                <?php echo CHtml::link('
                                                <div class="clearfix">
                                                    <span class="pull-left">'.CHtml::encode($bc->numero).'</span>
                                                    <span class="pull-right label label-warning arrowed-in-right arrowed"><i class="ace-icon fa fa-exclamation-triangle bigger-120"></i> Non validé</span>
                                                </div>',
                                                    array('/processBC/bonCaisse/view', 'id'=>$bc->primaryKey)); ?>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                    <?php */ ?>
                                    <?php if(Yii::app()->user->checkAccess('Caissier')) : ?>
                                        <?php foreach(ValidationController::getBC_CaissierNonValider() as $bc) : ?>
                                            <li>
                                                <?php echo CHtml::link('
                                                <div class="clearfix">
                                                    <span class="pull-left">'.CHtml::encode($bc->numero).'</span>
                                                    <span class="pull-right label label-warning arrowed-in-right arrowed"><i class="ace-icon fa fa-exclamation-triangle bigger-120"></i> Non validé</span>
                                                </div>',
                                                    array('/processBC/bonCaisse/view', 'id'=>$bc->primaryKey)); ?>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </ul>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
                <li class="light-blue dropdown-modal">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo" src="<?php echo Yii::app()->theme->baseUrl;  ?>/assets/images/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>Bienvenu,</small> <?php echo Yii::app()->user->name; ?>
								</span>

                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>
                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <li><?php echo CHtml::link('<i class="ace-icon fa fa-user"></i> Profile',array('/user/profile')); ?></li>
                        <li class="divider"></li>
                        <li><?php echo CHtml::link('<i class="ace-icon fa fa-power-off"></i> Deconnexion',array('/user/logout')); ?></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div><!-- /.navbar-container -->
</div>

<script>

    $(document).ready(function() {
        $("#relaod").click(function(){
            $.ajax({
                url: '<?php echo $this->createUrl('/processBC/bonEncaissement/refresh'); ?>',
                success: function(data) {
                    console.log(data);
                    if (data == "refresh"){
                        window.location.reload();
                    }
                }
            });
        });
    });


</script>
