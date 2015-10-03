<?php

class PasienController extends Controller {

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
        $model = new Pasien;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['Pasien'])) {
            $model->attributes = $_POST['Pasien'];
            $user = Yii::app()->getComponent('user');
            $user->setFlash(
                    'success', "<strong>Well done!</strong> Data Pasien telah ditambahkan."
            );
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_pasien));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionAdminByDate($id) {
        $this->render('adminByDate', array('wew' => $id));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['Pasien'])) {
            $model->attributes = $_POST['Pasien'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_pasien));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

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

    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Pasien');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdmin2($nama) {
        $model = new Pasien('search');
        $model->unsetAttributes();
        // clear any default values

       if (isset($_POST['Pasien'])) {
            $id_pasien = $_POST['Pasien']["nama"];
            $this->redirect(array('admin2', 'nama' => $id_pasien));
        } 

        if (isset($_GET['Pasien']))
            $model->attributes = $_GET['Pasien'];

        $criteria = new CDbCriteria;
        $criteria->compare('nama', $nama, true);
        $dataProvider = new CActiveDataProvider(new Pasien, array(
            'criteria' => $criteria,
        ));
        $this->render('admin', array(
            'model' => $model,
            'dataProvider' => $dataProvider
        ));
    }
    
    public function actionAdmin() {
        $model = new Pasien('search');
        $model->unsetAttributes();
        // clear any default values

        if (isset($_POST['Pasien'])) {
            $id_pasien = $_POST['Pasien']["nama"];
            $this->redirect(array('admin2', 'nama' => $id_pasien));
        } else {
            $id_pasien = "";
        }

        if (isset($_GET['Pasien']))
            $model->attributes = $_GET['Pasien'];

        $criteria = new CDbCriteria;
        $criteria->compare('nama', $id_pasien, true);
        $dataProvider = new CActiveDataProvider(new Pasien, array(
            'criteria' => $criteria,
        ));
        $this->render('admin', array(
            'model' => $model,
            'dataProvider' => $dataProvider
        ));
    }

    public function loadModel($id) {
        $model = Pasien::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'pasien-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
