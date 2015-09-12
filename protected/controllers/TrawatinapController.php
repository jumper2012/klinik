<?php

class TrawatinapController extends Controller {

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
            ),/*
            array('deny', // deny all users
                'users' => array('*'),
            ),*/
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
        $model = new Trawatinap;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['Trawatinap'])) {
            $model->attributes = $_POST['Trawatinap'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_rawat_inap));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

        public function actionCreateExisting($id, $id_pasien) {
        $model = new Trawatinap;

        if (isset($_POST['Trawatinap'])) {
            $model->attributes = $_POST['Trawatinap'];
            $model->id_kri = $id;
            //var_dump($_POST['Tbersalin']->tgl);
            if ($model->save())
                $this->redirect(array('pasien/view', 'id' => $id_pasien));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionCreateNotExisting($id) {
        $model = new Trawatinap;
        $modelkartu = new KartuRawatInap;
        $modelkartu->id_pasien = $id;
        if (isset($_POST['Trawatinap'])) {
            $modelkartu->save();
            $kartu = KartuRawatInap::model()->findByAttributes(array('id_pasien' => $id));
            $model->attributes = $_POST['Trawatinap'];
            $model->id_kri = $kartu->id_kri;

            if ($model->save())
                $this->redirect(array('pasien/view', 'id' => $id));
        }
        $this->render('create', array(
            'model' => $model,
        ));
    }
    
    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id, $id_pasien) {
        $model = $this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['Trawatinap'])) {
            $model->attributes = $_POST['Trawatinap'];
            if ($model->save())
                $this->redirect(array('pasien/view', 'id' => $id_pasien));
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
    public function actionDelete($id, $id_pasien) {
        $this->loadModel($id)->delete();
        $this->redirect(array('pasien/view', 'id' => $id_pasien));
    }
    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Trawatinap');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Trawatinap('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Trawatinap']))
            $model->attributes = $_GET['Trawatinap'];

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
        $model = Trawatinap::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'trawatinap-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
