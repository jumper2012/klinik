<?php

class ObatController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ), /*
                  array('deny', // deny all users
                  'users' => array('*'),
                  ), */
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Obat;
        $model2 = new Beli;
        $model3 = new Laporan;
// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['Obat'])) {
            $model->attributes = $_POST['Obat'];
            if ($model->save())
                $model2->id_obat = $model->id_obat;
            $model2->tgltrans = date('Y-m-d');
            $model2->no_faktur = $_POST['Beli']['no_faktur'];
            $model2->distributor = $_POST['Beli']['distributor'];
            $model2->jlh_beli = $_POST['Obat']['jumlah'];
            $model2->save();
            $model3->id_obat = $model->id_obat;
            $model3->tgl = date('Y-m-d');
            $model3->keluar = 0;
            $model3->masuk = $model->jumlah;
            $model3->sisa = $model->jumlah;
            $model3->untung = 0;
            $model3->save();
            $this->redirect(array('admin'));
        }

        $this->render('create', array(
            'model' => $model, 'model2' => $model2,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $model2 = new Beli;
        $model3 = new Laporan;
        $jumlah_before = $model->jumlah;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['Obat'])) {
            $model->attributes = $_POST['Obat'];
            $jumlah_after = $_POST['Obat']['jumlah'];
            $jumlah_total = $jumlah_after + $jumlah_before;
            $model->jumlah = $jumlah_total;
            $model2->id_obat = $id;
            $model2->tgltrans = date('Y-m-d');
            $model2->no_faktur = $_POST['Beli']['no_faktur'];
            $model2->distributor = $_POST['Beli']['distributor'];
            $model2->jlh_beli = $jumlah_after;
            $model3->tgl = date('Y-m-d');
            $model3->id_obat = $id;
            $model3->keluar = 0;
            $model3->masuk = $jumlah_after;
            $model3->sisa = $jumlah_total;
            $model3->untung = 0;
            $model3->save();
            $model2->save();
            
            if ($model->save())
                $this->redirect(array('pembelian'));
        }

        $this->render('update', array(
            'model' => $model, 'model2' => $model2,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
// we only allow deletion via POST request
            $this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Obat');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionPembelian() {
        $model = new Obat('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Obat']))
            $model->attributes = $_GET['Obat'];

        $this->render('pembelian', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Obat::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'obat-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionDeskripsi() {

        $id = $_POST['Obat']['nama'];
        //$nama = $_POST['model']['nama'];
        $sql = "SELECT hargajual FROM obat WHERE id_obat LIKE '$id'";
        $list = Yii::app()->db->createCommand($sql)->queryAll();

        $sql2 = "SELECT jumlah FROM obat WHERE id_obat LIKE '$id'";
        $list2 = Yii::app()->db->createCommand($sql2)->queryAll();
        echo "Harga barang Rp. " . ($list[0]['hargajual']) . ",-<br>";
//        var_dump($list2);
        echo "Sisa Stok Barang :" . ($list2[0]['jumlah']) . "<br>";
        //var_dump($list[0]);
    }

    public function actionDynamiccities() {
        $data = Obat::model()->findAll('satuan_brg', array('nama' => $_POST['model']['nama']));
//    var_dump($data);
        $data = CHtml::listData($data, 'id', 'name');
        foreach ($data as $value => $name) {
            echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
        }
    }

    public function actionSelectprodi() {
        $id = $_POST['Obat']['nama'];
        $list = Obat::model()->findAll('id_obat = :id_satuan', array(':id_satuan' => $id));
        $list = CHtml::listData($list, 'id', 'satuan_brg');

        echo CHtml::tag('option', array('value' => ''), '-- Pilih Satuan Obat --', true);

        foreach ($list as $value => $nama) {
            echo CHtml::tag('option', array('value' => $value), CHtml::encode($nama), true);
        }
    }

    public function prodiList() {
        $models = Obat::model()->findAll(array('condition' => 'jurusan_id = ' . $this->jurusan_id, 'order' => 'id'));

        foreach ($models as $model)
            $_items[$model->id] = $model->nama;

        return $_items;
    }

    public function actionAdmin() {
        $model = new Obat('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Obat']))
            $model->attributes = $_GET['Obat'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }


}
