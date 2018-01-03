<?php
/**
 * Created by PhpStorm.
 * User: Prince TSATY
 * Date: 30/11/16
 * Time: 02:56
 */
?>
<div id="sidebar" class="sidebar responsive ace-save-state">
    <script type="text/javascript">
        try{ace.settings.loadState('sidebar')}catch(e){}
    </script>

    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
                <i class="ace-icon fa fa-signal"></i>
            </button>

            <button class="btn btn-info">
                <i class="ace-icon fa fa-pencil"></i>
            </button>

            <button class="btn btn-warning">
                <i class="ace-icon fa fa-users"></i>
            </button>

            <button class="btn btn-danger">
                <i class="ace-icon fa fa-cogs"></i>
            </button>
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div><!-- /.sidebar-shortcuts -->

    <?php $this->widget('zii.widgets.CMenu',array(
        'htmlOptions'=>array('class'=>'nav nav-list'),
        'submenuHtmlOptions'=>array('class'=>'submenu'),
        'itemCssClass'=>'',
        'encodeLabel'=>false,
        'items'=>array(
            array('label'=>'<i class="menu-icon fa fa-tachometer"></i> <span class="menu-text">Client</span><b class="arrow fa fa-angle-down"></b>',  'url'=>array('#'),'linkOptions'=>array("class"=>"dropdown-toggle"),
                'items'=>array(
                array('label'=>'<i class="menu-icon fa fa-caret-right"></i> Nouveau Dossier <b class="arrow"></b>', 'url'=>array('/processCustomer/client/create',)),
                array('label'=>'<i class="menu-icon fa fa-caret-right"></i> Rechercher un Dossier <b class="arrow"></b>', 'url'=>array('/processCustomer/dossierClient/search',)),
                array('label'=>'<i class="menu-icon fa fa-caret-right"></i> Tous les Dossiers <b class="arrow"></b>', 'url'=>array('/processCustomer/client/index',)),
                //array('label'=>'<i class="menu-icon fa fa-caret-right"></i> Lancer un Boocking <b class="arrow"></b>', 'url'=>array('/processCustomer/client/booking',)),
                array('label'=>'<i class="menu-icon fa fa-caret-right"></i> Relevé de compte client <b class="arrow"></b>', 'url'=>array('/processCustomer/client/searchReleveCmpt',)),
            ), 'visible'=>(Yii::app()->user->checkAccess('DD') || Yii::app()->user->checkAccess('DG') || Yii::app()->user->checkAccess('Caissier') || Yii::app()->user->checkAccess('CMPT'))),
            array('label'=>'<i class="menu-icon fa fa-desktop"></i> <span class="menu-text">Caisse</span><b class="arrow fa fa-angle-down"></b>',  'url'=>array('#'),'linkOptions'=>array("class"=>"dropdown-toggle"),
                'items'=>array(
                    array('label'=>'<i class="menu-icon fa fa-caret-right"></i> Sorite Caisse<b class="arrow"></b>', 'url'=>array('/processBC/bonCaisse/create',)),
                    array('label'=>'<i class="menu-icon fa fa-caret-right"></i> Entrée Caisse<b class="arrow"></b>', 'url'=>array('/processBC/bonEncaissement/create',)),
                ), 'visible'=>(Yii::app()->user->checkAccess('Caissier') || Yii::app()->user->checkAccess('DG') || Yii::app()->user->checkAccess('CMPT'))),
            array('label'=>'<i class="menu-icon fa fa-list"></i> <span class="menu-text">Devis</span><b class="arrow fa fa-angle-down"></b>', 'url'=>array('#'),'linkOptions'=>array("class"=>"dropdown-toggle"),
                'items'=>array(
                    array('label'=>'<i class="menu-icon fa fa-caret-right"></i> Devis Administratifs<b class="arrow"></b>', 'url'=>array('/processDevis/devisA/index',)),
                    array('label'=>'<i class="menu-icon fa fa-caret-right"></i> Devis Douane<b class="arrow"></b>', 'url'=>array('/processDevis/devisD/index',)),
                ), 'visible'=>(Yii::app()->user->checkAccess('RTT') || Yii::app()->user->checkAccess('DG'))),
            array('label'=>'<i class="menu-icon fa fa-pencil-square-o"></i> <span class="menu-text">Inter-Change</span><b class="arrow fa fa-angle-down"></b>', 'url'=>array('#'),'linkOptions'=>array("class"=>"dropdown-toggle"),
                'items'=> array(
                    array('label'=>'<i class="menu-icon fa fa-caret-right"></i> Sortie Contrneurs <b class="arrow"></b>', 'url'=>array('/processIC/sortieConteneur/index')),
                    array('label'=>'<i class="menu-icon fa fa-caret-right"></i> Entrée Conteneurs <b class="arrow"></b>', 'url'=>array('/processIC/entreeConteneur/index')),
                ), 'visible'=>(Yii::app()->user->checkAccess('RTT') || Yii::app()->user->checkAccess('DG') || Yii::app()->user->checkAccess('CO') || Yii::app()->user->checkAccess('Informatique'))),
            array('label'=>'<i class="menu-icon fa fa-shopping-cart"></i> <span class="menu-text">Besoin</span><b class="arrow fa fa-angle-down"></b>',  'url'=>array('#'),'linkOptions'=>array("class"=>"dropdown-toggle"),
                'items'=>array(
                    array('label'=>'<i class="menu-icon fa fa-caret-right"></i> Nouvel Etat de Besoins<b class="arrow"></b>', 'url'=>array('/processNeeds/besoin/create',)),
                    array('label'=>'<i class="menu-icon fa fa-caret-right"></i> Consulter les Etats de Besoins<b class="arrow"></b>', 'url'=>array('/processNeeds/besoin/index',)),
                ), 'visible'=>(Yii::app()->user->checkAccess('Caissier') || Yii::app()->user->checkAccess('DG') || Yii::app()->user->checkAccess('DD') || Yii::app()->user->checkAccess('RTT') || Yii::app()->user->checkAccess('CMPT') || Yii::app()->user->checkAccess('Informatique'))),
            array('label'=>'<i class="menu-icon fa fa-tag"></i> <span class="menu-text">Administration</span><b class="arrow fa fa-angle-down"></b>', 'url'=>array('#'),'linkOptions'=>array("class"=>"dropdown-toggle"),
                'items'=> array(
                array('label'=>'<i class="menu-icon fa fa-caret-right"></i> Utilisateurs <b class="arrow"></b>', 'url'=>array('/user/admin')),
                array('label'=>'<i class="menu-icon fa fa-caret-right"></i> Droits <b class="arrow"></b>', 'url'=>array('/rights')),
            ), 'visible'=>(Yii::app()->user->checkAccess('admin') || Yii::app()->user->checkAccess('DG'))),

        ),
    )); ?>

    <!-- <ul class="nav nav-list">
        <li class="">
            <a href="index.html">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Dashboard </span>
            </a>

            <b class="arrow"></b>
        </li>

        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								UI &amp; Elements
							</span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Layouts
                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="">
                            <a href="top-menu.html">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Top Menu
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="">
                            <a href="two-menu-1.html">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Two Menus 1
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="">
                            <a href="two-menu-2.html">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Two Menus 2
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="">
                            <a href="mobile-menu-1.html">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Default Mobile Menu
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="">
                            <a href="mobile-menu-2.html">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Mobile Menu 2
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="">
                            <a href="mobile-menu-3.html">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Mobile Menu 3
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>

                <li class="">
                    <a href="typography.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Typography
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="elements.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Elements
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="buttons.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Buttons &amp; Icons
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="content-slider.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Content Sliders
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="treeview.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Treeview
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="jquery-ui.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        jQuery UI
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="nestable-list.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Nestable Lists
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>

                        Three Level Menu
                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="">
                            <a href="#">
                                <i class="menu-icon fa fa-leaf green"></i>
                                Item #1
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="">
                            <a href="#" class="dropdown-toggle">
                                <i class="menu-icon fa fa-pencil orange"></i>

                                4th level
                                <b class="arrow fa fa-angle-down"></b>
                            </a>

                            <b class="arrow"></b>

                            <ul class="submenu">
                                <li class="">
                                    <a href="#">
                                        <i class="menu-icon fa fa-plus purple"></i>
                                        Add Product
                                    </a>

                                    <b class="arrow"></b>
                                </li>

                                <li class="">
                                    <a href="#">
                                        <i class="menu-icon fa fa-eye pink"></i>
                                        View Products
                                    </a>

                                    <b class="arrow"></b>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>

        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-list"></i>
                <span class="menu-text"> Tables </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="">
                    <a href="tables.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Simple &amp; Dynamic
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="jqgrid.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        jqGrid plugin
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-pencil-square-o"></i>
                <span class="menu-text"> Forms </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="">
                    <a href="form-elements.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Form Elements
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="form-elements-2.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Form Elements 2
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="form-wizard.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Wizard &amp; Validation
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="wysiwyg.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Wysiwyg &amp; Markdown
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="dropzone.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Dropzone File Upload
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        <li class="">
            <a href="widgets.html">
                <i class="menu-icon fa fa-list-alt"></i>
                <span class="menu-text"> Widgets </span>
            </a>

            <b class="arrow"></b>
        </li>

        <li class="">
            <a href="calendar.html">
                <i class="menu-icon fa fa-calendar"></i>

							<span class="menu-text">
								Calendar

								<span class="badge badge-transparent tooltip-error" title="2 Important Events">
									<i class="ace-icon fa fa-exclamation-triangle red bigger-130"></i>
								</span>
							</span>
            </a>

            <b class="arrow"></b>
        </li>

        <li class="">
            <a href="gallery.html">
                <i class="menu-icon fa fa-picture-o"></i>
                <span class="menu-text"> Gallery </span>
            </a>

            <b class="arrow"></b>
        </li>

        <li class="active open">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-tag"></i>
                <span class="menu-text"> More Pages </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="active">
                    <a href="profile.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        User Profile
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="inbox.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Inbox
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="pricing.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Pricing Tables
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="invoice.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Invoice
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="timeline.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Timeline
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="search.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Search Results
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="email.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Email Templates
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="login.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Login &amp; Register
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-file-o"></i>

							<span class="menu-text">
								Other Pages

								<span class="badge badge-primary">5</span>
							</span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="">
                    <a href="faq.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        FAQ
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="error-404.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Error 404
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="error-500.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Error 500
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="grid.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Grid
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="blank.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Blank Page
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
    </ul><!-- /.nav-list -->

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>
