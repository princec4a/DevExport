<?php
/**
 * Created by PhpStorm.
 * User: Prince TSATY
 * Date: 04/12/16
 * Time: 11:57
 */
/* @var $this ClientController */
/* @var $model Client */

$this->breadcrumbs=array(
    'Client'=>array('index'),
    'Recherche Booking'
);

$this->menu=array(
    array('label'=>'<i class="menu-icon fa fa-list-alt"></i> <span class="menu-text">Rechercher un Dossier</span>', 'url'=>array('dossierClient/search')),
    array('label'=>'<i class="menu-icon fa fa-floppy-o"></i> <span class="menu-text">Nouveau Dossier</span>', 'url'=>array('create')),
);
?>
<div class="col-xs-12">
    <iframe src="https://www.cma-cgm.fr" width="800" height="300"></iframe>
    <iframe src="https://www.pilship.com/" width="800" height="300"></iframe>
</div><!-- /.span -->
