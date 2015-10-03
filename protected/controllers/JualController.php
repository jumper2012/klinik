<?php

class JualController extends Controller {

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

    public function actionSukses($id) {
        //$this->render('sukses');
        Yii::app()->user->setFlash('pembelian', 'Pembelian Berhasil dilakukan');
        $result_nama = Yii::app()->db->createCommand("SELECT * FROM list_penjualan WHERE `id_jual`= '$id'")->queryAll();
        $this->render('sukses', array('result' => $result_nama));
        //$this->redirect(array('beli/create'));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreateKeterangan() {
        $model = new Jual;
        $model2 = new Obat;
        $model3 = new ListPenjualan;

        if (isset($_POST['Obat'])) {
            if ($_POST['Obat']['jumlah'] == 0) {
                $this->redirect(array('create'));
            }
            $model->tgltrans = date('Y-m-d');
            $model->save();
            $model3->id_jual = $model->id_jual;
            $id_obat = $_POST['Obat']['id_obat'];
            $keterangan = $_POST['ListPenjualan']['keterangan'];
            $result_nama = Yii::app()->db->createCommand("SELECT nama FROM obat WHERE `id_obat`= '$id_obat'")->queryAll();
            $nama = $result_nama["0"]["nama"];

            $result_harga_satuan = Yii::app()->db->createCommand("SELECT hargajual FROM obat WHERE `id_obat`= '$id_obat'")->queryAll();
            $harga_satuan = $result_harga_satuan["0"]["hargajual"];

            $total_harga = $_POST['Obat']['jumlah'] * $harga_satuan;

            $model3->nama_obat = $nama;

            $model3->qty = $_POST['Obat']['jumlah'];
            $model3->harga_satuan = $harga_satuan;
            $model3->total = $total_harga;
            $model3->id_obat = $id_obat;
            $model3->keterangan = $keterangan;
            if ($model3->save())
            $connection_delete = Yii::app()->db;
            $connection_delete->createCommand("DELETE FROM dummy_list_obat WHERE id_obat='$id_obat'")->execute();
            $this->redirect(array('createKeteranganExisting', 'id' => $model->id_jual,'keterangan'=>$keterangan));
        }
        $this->render('createKeterangan', array(
            'model' => $model, 'model2' => $model2,'model3'=>$model3
        ));
    }
    public function actionCreate() {
        $model = new Jual;
        $model2 = new Obat;
        $model3 = new ListPenjualan;

        if (isset($_POST['Obat'])) {
            if ($_POST['Obat']['jumlah'] == 0) {
                $this->redirect(array('create'));
            }
            $model->tgltrans = date('Y-m-d');
            $model->save();
            $model3->id_jual = $model->id_jual;
            $id_obat = $_POST['Obat']['id_obat'];
            $result_nama = Yii::app()->db->createCommand("SELECT nama FROM obat WHERE `id_obat`= '$id_obat'")->queryAll();
            $nama = $result_nama["0"]["nama"];

            $result_harga_satuan = Yii::app()->db->createCommand("SELECT hargajual FROM obat WHERE `id_obat`= '$id_obat'")->queryAll();
            $harga_satuan = $result_harga_satuan["0"]["hargajual"];

            $total_harga = $_POST['Obat']['jumlah'] * $harga_satuan;

            $model3->nama_obat = $nama;

            $model3->qty = $_POST['Obat']['jumlah'];
            $model3->harga_satuan = $harga_satuan;
            $model3->total = $total_harga;
            $model3->id_obat = $id_obat;
            if ($model3->save())
                $connection_delete = Yii::app()->db;
            $connection_delete->createCommand("DELETE FROM dummy_list_obat WHERE id_obat='$id_obat'")->execute();
            $this->redirect(array('createExisting', 'id' => $model->id_jual));
        }
        $this->render('create', array(
            'model' => $model, 'model2' => $model2,
        ));
    }

    public function actionCreateExisting($id) {
        $model = new Jual;
        $model2 = new Obat;
        $model3 = new ListPenjualan;
// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['Obat'])) {
            if ($_POST['Obat']['jumlah'] == 0) {
                $this->redirect(array('createExisting', 'id' => $id));
            }
            $model3->id_jual = $id;
            $id_obat = $_POST['Obat']['id_obat'];
            $result_nama = Yii::app()->db->createCommand("SELECT nama FROM obat WHERE `id_obat`= '$id_obat'")->queryAll();
            $nama = $result_nama["0"]["nama"];

            $result_harga_satuan = Yii::app()->db->createCommand("SELECT hargajual FROM obat WHERE `id_obat`= '$id_obat'")->queryAll();
            $harga_satuan = $result_harga_satuan["0"]["hargajual"];

            $total_harga = $_POST['Obat']['jumlah'] * $harga_satuan;

            $model3->nama_obat = $nama;

            $model3->qty = $_POST['Obat']['jumlah'];
            $model3->harga_satuan = $harga_satuan;
            $model3->total = $total_harga;
            $model3->id_obat = $id_obat;
            if ($model3->save())
                $connection_delete = Yii::app()->db;
            $connection_delete->createCommand("DELETE FROM dummy_list_obat WHERE id_obat='$id_obat'")->execute();
            //$this->redirect(array('createExisting','id'=>$model->id_jual));                
            $this->redirect(array('createExisting', 'id' => $id));
        }

        $this->render('createExisting', array(
            'model' => $model, 'model2' => $model2, 'id' => $id,
        ));
    }

    public function actionCreateKeteranganExisting($id, $keterangan) {
        $model = new Jual;
        $model2 = new Obat;
        $model3 = new ListPenjualan;
// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['Obat'])) {
            if ($_POST['Obat']['jumlah'] == 0) {
                $this->redirect(array('CreateKeteranganExisting', 'id' => $id, 'keterangan' => $keterangan));
            }
            $model3->id_jual = $id;
            $id_obat = $_POST['Obat']['id_obat'];
            $result_nama = Yii::app()->db->createCommand("SELECT nama FROM obat WHERE `id_obat`= '$id_obat'")->queryAll();
            $nama = $result_nama["0"]["nama"];

            $result_harga_satuan = Yii::app()->db->createCommand("SELECT hargajual FROM obat WHERE `id_obat`= '$id_obat'")->queryAll();
            $harga_satuan = $result_harga_satuan["0"]["hargajual"];

            $total_harga = $_POST['Obat']['jumlah'] * $harga_satuan;

            $model3->nama_obat = $nama;

            $model3->qty = $_POST['Obat']['jumlah'];
            $model3->harga_satuan = $harga_satuan;
            $model3->total = $total_harga;
            $model3->id_obat = $id_obat;
            $model3->keterangan = $keterangan;
            if ($model3->save())
                $connection_delete = Yii::app()->db;
            $connection_delete->createCommand("DELETE FROM dummy_list_obat WHERE id_obat='$id_obat'")->execute();
            $this->redirect(array('CreateKeteranganExisting', 'id' => $id, 'keterangan' => $keterangan));
        }

        $this->render('createKeteranganExisting', array(
            'model' => $model, 'model2' => $model2, 'id' => $id, 'keterangan' => $keterangan
        ));
    }
    
    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['Beli'])) {
            $model->attributes = $_POST['Beli'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_beli));
        }

        $this->render('update', array(
            'model' => $model,
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
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Beli');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Beli('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Beli']))
            $model->attributes = $_GET['Beli'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Beli::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function actionSelectKetersedian() {
        $id_obat = $_POST['Obat']['id_obat'];
        $result = Yii::app()->db->createCommand("SELECT jumlah FROM obat WHERE `id_obat`= '$id_obat'")->queryAll();
        //var_dump($result);
        $ketersediaan = $result["0"]["jumlah"];
        $list = array();
        $list[0] = "0";
        for ($i = 1; $i <= $ketersediaan; $i++) {

            $list[$i] = $i;
            echo CHtml::tag('option', array('value' => $list[$i - 1]), CHtml::encode($list[$i - 1]), true);
        }
    }

    public function actionSelectHarga() {
        $id_obat = $_POST['Obat']['id_obat'];
        $result = Yii::app()->db->createCommand("SELECT hargajual FROM obat WHERE `id_obat`= '$id_obat'")->queryAll();
        $harga = $result["0"]["hargajual"];
        $banyak = $_POST['Obat']['jumlah'];
        $totalpembayaran = $harga * $banyak;
        ?><FONT SIZE="5"><B>Harga persatuan : Rp <?php echo $harga; ?> ,- &nbspX <?php echo $banyak; ?><br><br>
            Total Harga    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : Rp <?php echo $totalpembayaran; ?> ,-</B>
        </FONT><?php
    }

    public function actionSelectKeterangan() {
        $keterangan = $_POST['ListPenjualan']['keterangan'];
        $banyak = $_POST['Obat']['jumlah'];
        ?><FONT SIZE="5"><B>Banyak Pembelian : <?php echo($banyak);?><br><br>Keterangan&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <br><br><i><u><?php echo $keterangan; ?><i></u></B>
        </FONT><?php
    }
    
        public function actionSelectKeteranganparam($keterangan) {
        $keterangan = $keterangan;
        $banyak = $_POST['Obat']['jumlah'];
        ?><FONT SIZE="5"><B>Banyak Pembelian : <?php echo($banyak);?><br><br>Keterangan&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <br><br><i><u><?php echo $keterangan; ?><i></u></B>
        </FONT><?php
    }

    
    public function actionCheckboxUpdate($id) {
        if (Yii::app()->request->isPostRequest) {
            if (isset($_POST['my_checkbox'])) {
                $model_ket = Jual::model()->findByPk($id);
                $model_ket->keterangan = "Pembelian Dokter";
                $model_ket->save();
            }
            else{
                $model_ket = Jual::model()->findByPk($id);
                $model_ket->keterangan = "Pembelian Normal";
                $model_ket->save();                
            }
        } else
            throw new CHttpException(400, Yii::t('app', 'Invalid request. Please do not repeat this request again.'));
        $this->redirect(array('Jual/createExisting', 'id' => $id));
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'beli-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
