<button class="btn btn-app btn-light btn-xs" onclick="print();">
    <i class="ace-icon fa fa-print bigger-160"></i> Imprimer
</button>
<div id="ticket">
<table border="0" cellspacing=0 cellpadding=0 style="width: 100%; border-collapse:collapse; font-family: 'Book Antiqua'; font-size: 12pt;">
    <tr>
        <td colspan="6" style="text-align: center;"><img src="<?php echo Yii::app()->request->baseUrl ?>/images/logo.jpg" width="35%" /></td>
    </tr>
    <tr><td colspan="6">&nbsp;</td></tr>
    <tr><td colspan="6">&nbsp;</td></tr>
    <tr><td colspan="6">&nbsp;</td></tr>
    <tr><td colspan="6" style="text-align: center; font-size: 25px; font-weight: bold; border-bottom: 1px solid">TABLEAU DE SUIVI DES TCS DE POINTE NOIRE</td></tr>
    <tr><td colspan="6">&nbsp;</td></tr>
    <tr><td colspan="6">&nbsp;</td></tr>
    <tr>
        <td colspan="2" style="font-size: 20px; padding: 0 0 0 5px; text-align: center">N° Booking : <strong><?=$booking; ?></strong>  | Client : <strong><?php echo $client->idClient->nom_societe; ?></strong></td>
    </tr>
    <tr><td colspan="6">&nbsp;</td></tr>
    <tr>
        <td colspan="2" style="font-size: 20px; padding: 0 5px; text-align: center;">Du  <strong><?= ($du == 'null')? date('d/m/Y') : $du; ?></strong> Au <strong><?= ($au == 'null')? '...' : $au; ?></strong></td>
    </tr>
    <tr><td colspan="6">&nbsp;</td></tr>
    <tr>
        <td colspan="2" style="font-size: 20px; text-align: center;">Tèl : <strong><?=$client->idClient->tel; ?></strong> - E-mail : <strong><?=$client->idClient->email; ?></strong></td>
    </tr>
    <tr><td colspan="6">&nbsp;</td></tr>
    <tr><td colspan="6">&nbsp;</td></tr>
    <tr>
        <td colspan="6">

            <?php if(count($entrees) > 0): ?>
                <table border="0" cellspacing=0 cellpadding=0 width="100%">
                    <tr>
                        <th style="border: 1px solid #000; ">N°</th>
                        <th style="border: 1px solid #000;">N° Entree</th>
                        <th style="border: 1px solid #000;">TYPE TCs</th>
                        <th style="border: 1px solid #000;">N° TCS</th>
                        <th style="border: 1px solid #000;">DATE D'ENTREE</th>
                        <th style="border: 1px solid #000;">N° EIR D'ENTREE</th>
                        <th style="border: 1px solid #000;">ETAT</th>
                        <th style="border: 1px solid #000;">BON</th>
                    </tr>
                    <?php foreach($entrees as $key => $entree) {  ?>
                        <tr>
                            <td style="border-bottom: 1px solid #000; padding: 5px; text-align: center;"><?=$key+1; ?></td>
                            <td style="border-bottom: 1px solid #000; padding: 5px; text-align: center;"><?=$entree->numero; ?></td>
                            <td style="border-bottom: 1px solid #000; padding: 5px; text-align: center;"><?=TypeTc::model()->findByPk($entree->idSortieConteneur->id_type_tc)->libelle; ?></td>
                            <td style="border-bottom: 1px solid #000; padding: 5px; text-align: center;"><?=$entree->idSortieConteneur->num_tc; ?></td>
                            <td style="border-bottom: 1px solid #000; padding: 5px; text-align: center;"><?=$entree->date_entree_tc; ?></td>
                            <td style="border-bottom: 1px solid #000; text-align: center;"><?=$entree->num_eir; ?></td>
                            <td style="border-bottom: 1px solid #000; padding: 5px; text-align: center"><?=EtatTc::model()->findByPk($entree->idSortieConteneur->etat)->libelle; ?></td>
                            <td style="border-bottom: 1px solid #000; padding: 5px; text-align: center"><?=TypeBon::model()->findByPk($entree->idSortieConteneur->id_type_bon)->libelle; ?></td>
                        </tr>
                    <?php } ?>
                </table>
            <?php else : ?>
                <table border="0" cellspacing=0 cellpadding=0>
                    <tr>
                        <th style="border: 1px solid #000; " colspan="8">&nbsp;</th>
                    </tr>
                </table>
            <?php endif; ?>
        </td>
    </tr>
</table>
    <?php echo date('H:i:s'); ?>
</div>

<style type="text/css">
    @media print {
        body * {
            visibility: hidden;
        }
        #ticket, #ticket * {
            visibility: visible;
        }
        #ticket {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            margin-top: 30px;
            padding: 0 20px;
        }

        @page {
            size: auto;   /* auto is the initial value */
            margin: 0;  /* this affects the margin in the printer settings */
        }
    }
</style>

<script type="text/javascript">
    jQuery(function($) {
        function print(){
            document.title = "";
            w=window.open();
            w.document.write($('.report_left_inner').html());
            w.print();
            w.close();
        }
    })
</script>

