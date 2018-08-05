<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use common\models\RolesList;
use common\models\RolesForm;
use common\models\M002Menu;
use app\controller\SiteController;
use himiklab\jqgrid\actions\JqGridActiveAction;

/**
 * Site controller
 */
class RolesController extends Controller
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
                        'actions' => ['login', 'error','form-roles'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','form-roles'],
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

    return [
        'jqgrid' => [
            'class' => JqGridActiveAction::className(),
            'model' => RolesList::className(),
            'columns' => ['rolesname', 'isactive']
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
        $this->layout = 'main';
        $roleslist = RolesList::find()->all();
 
        $dataProvider = new ActiveDataProvider([
            'query' => $roleslist,
            'pagination' => [
                'pageSize' => 10
            ]
        ]);
        // $dataProvider = new SqlDataProvider([
        //     'sql' => 'SELECT * FROM roles_S()',
        //     'pagination' => [
        //         'pageSize' => 2
        //     ],
        //     'sort' => ['attributes' => ['namaroles','status'],
        // //'options' => ['style' => ' color:blue'],
        //               ]
        // ]);
        // $query = Teams::find();
        // $dataRoles = RolesList::find()->orderBy('rolesid')->all();

         return $this->render('dataRoles', ['dataRoles'=>$roleslist]);
        //return $this->render('dataRoles',['dataProvider' => $dataProvider]);
    }

    /**
     * Displays Form Roles.
     *
     * @return string
     */
    public function actionFormRoles()
    {
        $this->layout = 'main';
        $model = new RolesForm();

        $data = array (
                'model'=>$model,
            );

        if($model->load(Yii::$app->request->post()) && $model->validate())
        {
            $request = Yii::$app->request;
            $roles = new RolesForm();
            $model->kode_role = $request->post('RolesForm')['kode_role'];
            $model->nama_role = $request->post('RolesForm')['nama_role'];
            $model->deskripsi = $request->post('RolesForm')['deskripsi'];
            $model->status_aktif = $request->post('RolesForm')['status_aktif'];

            //$model->save();
            $result = Yii::$app->db->createCommand("select * from roles_i(:srolesname, :bisactive)")->bindValue(':srolesname', $model->rolesname)->bindValue(':bisactive', $model->isactive)->execute();
            //tambah insert log aktifitas jika berhasil
            //tambah insert log error jika error
            
        // $this->layout = 'main';
        // $roleslist = RolesList::find();
 
        // $dataProvider = new ActiveDataProvider([
        //     'query' => $roleslist,
        //     'pagination' => [
        //         'pageSize' => 10
        //     ]
        // ]);
 
        // return $this->render('dataRoles',[
        //     'dataProvider' => $dataProvider
        // ]);
            $this->roleslist();
        }
        else
        {
            return $this->render('formRoles', $data);   
        }
    }

    /**
     * Login action.
     *
     * @return string
     */
    // public function actionLogin()
    // {
    //     if (!Yii::$app->user->isGuest) {
    //         return $this->goHome();
    //     }

    //     $model = new LoginForm();
    //     if ($model->load(Yii::$app->request->post()) && $model->login()) {
    //         return $this->goBack();
    //     } else {
    //         $model->password = '';

    //         return $this->render('login', [
    //             'model' => $model,
    //         ]);
    //     }
    // }

    /**
     * Logout action.
     *
     * @return string
     */
    // public function actionLogout()
    // {
    //     Yii::$app->user->logout();

    //     return $this->goHome();
    // }

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
 // public function actionsJqgrid()
 //    {

 //    return [
 //        'jqgrid' => [
 //            'class' => JqGridActiveAction::RolesList(),
 //            'model' => Page::RolesList(),
 //            'columns' => ['rolesname', 'isactive']
 //        ],
 //    ];
 //    }
 
}
