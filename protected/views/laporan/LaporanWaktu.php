<h1>Lapet</h1>
<?php
$model = new Laporan();
if ($_POST['Laporan']->tgl != "0") {
    $model->tgl = $_POST['Laporan']->tgl;
    $tanggal = $model->tgl;
    $_POST['Laporan']->tgl = 0;
    $this->render(array('LaporanWaktu', 'data' => $tanggal));
} else {
    ?>
    <legen>Sort berdasarkan tanggal </legen>
    <?php
    var_dump($data);
    $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
        'id' => 'Laporan',
        'type' => 'inline',
        'enableAjaxValidation' => false,
    ));
    ?>
    <div class="form-actions">
    <?php
    echo $form->datePickerGroup($model, 'tgl', array('widgetOptions' => array('options' => array(
                'showButtonPanel' => true,
                'format' => 'yyyy-mm-dd',
                'viewformat' => 'yyyy-mm-dd',
                'todayHighlight' => true,
                'todayBtn' => "linked",
            ), 'htmlOptions' => array('class' => 'span5', 'maxlength' => 20))));
    ?>
        <?php
        $this->widget('booster.widgets.TbButton', array(
            'buttonType' => 'submit',
            'context' => 'primary',
            'label' => 'Search',
        ));
        ?>
    </div>
        <?php $this->endWidget(); ?>
        <?php
        var_dump($data);



        $gridDataProvider = new CActiveDataProvider('Laporan', array(
            'criteria' => array(
                'condition' => "tgl LIKE '$data'",
            ),
        ));
        $this->widget(
                'booster.widgets.TbGridView', array(
            'dataProvider' => $gridDataProvider,
            'emptyText' => 'Tidak ada laporan :)',
            'template' => "{summary}{items}{pager}",
            'enablePagination' => true,
            'columns' => array(
                array(
                    'header' => 'No',
                    'value' => '$this->grid->dataProvider->pagination->offset + $row+1', //  row is zero based
                ),
                'id_obat',
                'masuk',
                'keluar',
                'sisa',
                'untung',
                'keterangan',
            ),
                )
        );
    }

    $result = Yii::app()->db->createCommand("SELECT untung FROM laporan WHERE `tgl`= '$data'")->queryAll();
    var_dump($result);
    ?>
