<?php

class CategoryController extends Controller
{
	public $layout = '//layouts/column2';

	private $_model;

    public function filters()
    {
        return array(
            'accessControl'
        );
    }

	public function accessRules()
	{
		return array(
			array('allow',
				'users' => array('@'),
			),
			array('deny',
				'users' => array('*'),
			),
		);
	}

    public function actionView()
    {
        $this->render('view', array(
			'model' => $this->loadModel()
        ));
    }
	
	public function actionCreate()
	{
        $model = new Category();

		if(isset($_POST['Category']))
		{
			$model->attributes = $_POST['Category'];
			$model->listorder = isset($model->listorder) ? $model->listorder : 0;
			
			if($model->save())
				$this->redirect(array('view', 'id' => $model->id));
		}
        
        $this->render('create', array(
			'model' => $model
        ));
	}

	public function actionUpdate()
	{
		$model = $this->loadModel();

		if(isset($_POST['Category']))
        {
            $model->attributes = $_POST['Category'];
			if($model->save())
				$this->redirect(array('view', 'id' => $model->id));
		}
        
        $this->render('update', array(
			'model' => $model
        ));
	}

    public function actionDelete()
    {
        if(Yii::app()->request->isPostRequest)
        {
            $this->loadModel()->delete();
            if(!isset($_GET['ajax']))
                $this->redirect(array('index'));
        }
        else
			throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

	public function actionIndex()
	{
		$dataProvider = new CActiveDataProvider('Category');
        $this->render('index', array(
			'dataProvider' => $dataProvider
        ));
	}

	public function actionAdmin()
	{
        $model = new Category('search');
        $model->unsetAttributes();
		if(isset($_GET['Category']))
			$model->attributes = $_GET['Category'];

		$this->render('admin',array(
			'model' => $model,
		));
	}

    public function loadModel()
    {
        if($this->_model === null)
        {
            if(isset($_GET['id']))
                $this->_model = Category::model()->findbyPk($_GET['id']);
            if($this->_model === null)
                throw new CHttpException(404,'The requested page does not exist.');
        }
        return $this->_model;
    }

    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax'] === 'category-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
