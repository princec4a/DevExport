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
    <tr>
        <td colspan="2" style="font-size: 20px; padding: 0 0 0 5px; text-align: center">Relevé de compte client N° : <strong><?php echo $model->code; ?></strong>  | Client : <strong><?php echo $model->nom_societe; ?></strong></td>
    </tr>
    <tr><td colspan="6">&nbsp;</td></tr>
    <tr>
        <td colspan="2" style="font-size: 20px; padding: 0 5px; text-align: center;">Relevé  du  <strong><?= ($du == 'null')? date('d/m/Y') : $du; ?></strong> au <strong><?= ($au == 'null')? '...' : $au; ?></strong></td>
    </tr>
    <tr><td colspan="6">&nbsp;</td></tr>
    <tr>
        <td colspan="2" style="font-size: 20px; text-align: center;">Tèl : <strong><?=$model->tel; ?></strong> - E-mail : <strong><?=$model->email; ?></strong></td>
    </tr>
    <tr><td colspan="6">&nbsp;</td></tr>
    <tr><td colspan="6">&nbsp;</td></tr>
    <tr>
        <td colspan="6">

            <?php if(count($dossiers)>0): ?>
                <table border="0" cellspacing=0 cellpadding=0 width="100%">
                    <tr>
                        <th style="border: 1px solid #000; ">Facture</th>
                        <th style="border: 1px solid #000;">Date</th>
                        <th style="border: 1px solid #000;">Montant</th>
                        <th style="border: 1px solid #000;">Accompte</th>
                        <th style="border: 1px solid #000;">Reste à payer</th>
                        <th style="border: 1px solid #000;">N° Booking</th>
                    </tr>
                    <?php foreach($dossiers as $dossier) {  ?>
                        <tr>
                            <td style="border-bottom: 1px solid #000; padding: 5px;"><?=$dossier->numero; ?></td>
                            <td style="border-bottom: 1px solid #000; padding: 5px;"><?=date('d-m-Y', strtotime($dossier->date_created)); ?></td>
                            <td style="border-bottom: 1px solid #000; padding: 5px;">
                                <table border="0" cellspacing=0 cellpadding=0 width="100%">
                                <?php foreach($dossier->bonEncaissements as $encaissement): ?>
                                    <tr>
                                        <td style="text-align: right; border-bottom: 1px dotted;padding: 0 5px 0 0;"><?php echo number_format($encaissement->montant,0,'',' '); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </table>
                            </td>
                            <td style="border-bottom: 1px solid #000;">
                               <table border="0" cellspacing=0 cellpadding=0 width="100%">
                                   <?php foreach($dossier->bonEncaissements as $encaissement): ?>
                                       <tr>
                                           <td style="text-align: right; border-bottom: 1px dotted;padding: 0 5px 0 0;"><?php echo number_format($encaissement->accompte,0,'',' '); ?></td>
                                       </tr>
                                   <?php endforeach; ?>
                               </table>
                            </td>
                            <td style="border-bottom: 1px solid #000;">
                                <table border="0" cellspacing=0 cellpadding=0 width="100%">
                                <?php foreach($dossier->bonEncaissements as $encaissement): ?>
                                    <tr>
                                        <td style="text-align: right; border-bottom: 1px dotted;padding: 0 5px 0 0;"><?php echo number_format($encaissement->reste,0,'',' '); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </table>
                            </td>
                            <td style="border-bottom: 1px solid #000; padding: 5px; text-align: right"><?=$dossier->num_booking; ?></td>
                        </tr>
                    <?php } ?>
                </table>
            <?php else : ?>
                <table border="0" cellspacing=0 cellpadding=0>
                    <tr>
                        <th style="border: 1px solid #000; ">Facture</th>
                        <th style="border: 1px solid #000;">Date</th>
                        <th style="border: 1px solid #000;">Montant</th>
                        <th style="border: 1px solid #000;">Accompte</th>
                        <th style="border: 1px solid #000;">Reste à payer</th>
                        <th style="border: 1px solid #000;">N° Booking</th>
                    </tr>
                    <?php foreach($model->dossiers as $dossier) {  ?>
                        <tr>
                            <td style="border-bottom: 1px solid #000; padding: 5px;"><?=$dossier->numero; ?></td>
                            <td style="border-bottom: 1px solid #000; padding: 5px;"><?=date('d-m-Y', strtotime($dossier->date_created)); ?></td>
                            <td style="border-bottom: 1px solid #000; padding: 5px;">
                                <table border="0" cellspacing=0 cellpadding=0 width="100%">
                                    <?php foreach($dossier->bonEncaissements as $encaissement): ?>
                                        <tr>
                                            <td style="text-align: right; border-bottom: 1px dotted; padding: 0 5px 0 0;"><?php echo number_format($encaissement->montant,0,'',' '); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </td>
                            <td style="border-bottom: 1px solid #000;">
                                <table border="0" cellspacing=0 cellpadding=0 width="100%">
                                    <?php foreach($dossier->bonEncaissements as $encaissement): ?>
                                        <tr>
                                            <td style="text-align: right; border-bottom: 1px dotted; padding: 0 5px 0 0;"><?php echo number_format($encaissement->accompte,0,'',' '); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </td>
                            <td style="border-bottom: 1px solid #000;">
                                <table border="0" cellspacing=0 cellpadding=0 width="100%">
                                    <?php foreach($dossier->bonEncaissements as $encaissement): ?>
                                        <tr>
                                            <td style="text-align: right; border-bottom: 1px dotted; padding: 0 5px 0 0;"><?php echo number_format($encaissement->reste,0,'',' '); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </td>
                        </tr>
                    <?php } ?>
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

