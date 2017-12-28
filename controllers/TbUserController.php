<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backend\controllers;
use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
/**
 * Description of TbUserController
 *
 * @author damasa
 */
class TbUserController extends Controller{
    //put your code here
    public function actionIndex(){
        $model = \common\models\User::find();
        
        $dataProvider = new ActiveDataProvider([
            'query' => $model
        ]);
        return $this->render("index",[
            "dataProvider"=>$dataProvider
        ]);
    }
    
    public function actionUserProfile(){
        $id = $_GET["id"];
        $model = \common\models\UserProfile::find()
                ->where(['user_id'=>$id])
                ->one();
        return $this->renderAjax("user-profile",[
            "model"=>$model
        ]);
    }
}
