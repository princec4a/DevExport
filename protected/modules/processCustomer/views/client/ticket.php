
<p style="text-align: center"><strong>TICKET</strong></p>
<table border="0" cellspacing=0 cellpadding=0 style="width: 100%; border-collapse:collapse; font-family: 'Book Antiqua'; font-size: 12pt; border-top: 1px solid;">
    <tr>
        <td rowspan="3" colspan="2"><img src="<?php echo Yii::app()->request->baseUrl ?>/images/logo.jpg" width="30%" /></td>
        <td style="background-color: #000; color: #ffffff; text-align: center; padding: 5px;"><?php echo date('d/m/Y'); ?></td>
    </tr>
    <tr><td colspan="6">&nbsp;</td></tr>
    <tr><td colspan="6">&nbsp;</td></tr>
    <tr>
        <td>Booking N°</td>
        <td style="border-bottom: 1px solid #000; background-color: #F5F5F5; padding: 5px;"><strong><?php echo $model->getNumBooking($model->primarykey); ?></strong></td>
    </tr>
    <tr><td colspan="6">&nbsp;</td></tr>
    <tr>
        <td>Dossier enregistré sous le N°</td>
        <td style="border-bottom: 1px solid #000;"><?php echo $model->code; ?></td>
    </tr>
    <tr><td colspan="6">&nbsp;</td></tr>
    <tr>
        <td>Client </td>
        <td style="border-bottom: 1px solid #000;"><?php echo $model->nom.' '.$model->prenom; ?></td>
    </tr>
    <tr><td colspan="6">&nbsp;</td></tr>
    <tr>
        <td>Destination </td>
        <td style="border-bottom: 1px solid #000;">SERVICE TRANSITE ET TRANSPORT</td>
    </tr>
    <tr><td colspan="6">&nbsp;</td></tr>
    <tr>
        <td>Edité par le Directeur Départemental</td>
        <td style="border-bottom: 1px solid #000;"><?php echo User::model()->getUserProfileFields(Yii::app()->user->id); ?></td>
    </tr>
    <tr><td colspan="6">&nbsp;</td></tr>
    <tr>
        <td style="border-top: 2px solid; font-size: 9px;" ><?php echo date('H:i:s'); ?></td>
        <td style="border-top: 2px solid;" colspan="2">&nbsp;</td>
        <td style="border-top: 2px solid;" colspan="3"></td>
    </tr>
</table>

