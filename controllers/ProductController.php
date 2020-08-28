<?php
namespace app\controllers;

use app\models\Products;
use yii\data\ActiveDataProvider;
use yii\filters\ContentNegotiator;
use yii\filters\Cors;
use yii\helpers\ArrayHelper;
use yii\rest\ActiveController;
use yii\web\Response;

class ProductController extends ActiveController
{
    public $modelClass = 'app\models\Products';

    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'products',
    ];

    public function actions(){
        $actions = parent::actions();
        unset($actions['index']);
        return $actions;
    }

    public static function allowedDomains() {
        return [$_SERVER["REMOTE_ADDR"], 'http://localhost:3000'];
    }

    /*public function behaviors()
    {
        return array_merge(parent::behaviors(), [

            // For cross-domain AJAX request
            'corsFilter'  => [
                'class' => \yii\filters\Cors::className(),
                'cors'  => [
                    // restrict access to domains:
                    'Origin'                           => ['*'],
                    'Access-Control-Request-Method'    => ['POST','GET','OPTIONS'],
                    'Access-Control-Allow-Credentials' => true,
                    'Access-Control-Max-Age'           => 3600,                 // Cache (seconds)

                ],
            ],

        ]);Pr
    }*/

    public function behaviors()
    {
        return ArrayHelper::merge([
            [
                'class' => Cors::className(),
                'cors' => [
                    'Origin' => ['http://localhost:8080','http://localhost:3000'],
                    'Access-Control-Request-Method' => ['GET', 'HEAD', 'OPTIONS',"POST","DELETE","PATCH"],
                ],
            ],
        ], parent::behaviors());
    }



    public function actionIndex(){
        $activeData = new ActiveDataProvider([
            'query' => Products::find(),
            'pagination' => [
                'defaultPageSize' => 5,
            ],
            'sort'  =>  [
                'defaultOrder'  =>  [
                    'created_date'    =>  SORT_ASC
                ]
            ]
        ]);
        return $activeData;
    }

}