            <?php
            $nama = CHtml::listData(Obat::model()->findAll(), 'id_obat', 'nama');
            //var_dump($nama);
            
            ?>
            <?php
            $this->widget('ext.select2.ESelect2', array(
                'model' => $model2,
                'attribute' => 'id_obat',
//                'name' => 'selectInput',
                'data' => $nama,
                'htmlOptions' => array(
//                'wrapperHtmlOptions' => array(
//                    'class' => 'col-sm-5',
//                ),
                    'style' => 'width:330px',
                    'prompt' => '-- Pilih Obat --',
//                    'ajax' => array(
//                        'type' => 'POST',
//                        'url' => CController::createUrl('Beli/SelectKetersedian'),
//                        'class' => 'span5',
//                        'update' => '#' . CHtml::activeId($model2, 'jumlah'), //jurusan_id = field jurusan_id
//                        //'update' => "#kode",
//                        'beforeSend' => 'function() {$("#Beli_jumlah").find("option").remove();}',
//                    )
                ),)
            );
            ?>
