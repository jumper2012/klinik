<?php
$this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs' => array(
        'Pembelian Obat Baru(Tidak Terdapat pada inventori)' => $this->renderPartial('usg_pasien', $model, true),
        'Pembelian Obat yang telah ada pada Inventori ' => $this->renderPartial('bersalin_pasien', $model, true),
    ),
    'options' => array(
        'collapsible' => true,
    ),
));
?>
