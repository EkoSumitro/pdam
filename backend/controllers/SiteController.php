<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use yii\data\ActiveDataProvider;
use common\models\RolesList;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Roles List action.
     *
     * @return string
     */
    public function actionRoleslist()
    { 
        $this->layout = 'main';
        $roleslist = RolesList::find();
 
        $dataProvider = new ActiveDataProvider([
            'query' => $roleslist,
            'pagination' => [
                'pageSize' => 10
            ]
        ]);
 
        return $this->render('dataRoles',[
            'dataProvider' => $dataProvider
        ]);
    }
    
    public static function getMenu()
    {
       $items = M002Menu::find()->all();
       $menuItems = [];
       foreach ($items as $value) {
                   $menuItems[] = ['label' =>'<span class="'.$value['icon'].'"></span> '.$value['namaMenu'] , 'url' => $value['urlMenu']];
              };
        return $menuItems;

       //parent::init();
              //$this->render('left',array('$menuItems'=>$menuItems));
    }
}
