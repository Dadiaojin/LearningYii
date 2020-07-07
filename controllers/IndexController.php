<?php

namespace app\controllers;

use app\models\Article;
use  \yii\base\Controller;

class IndexController extends Controller
{
    public function actionIndex()
    {
        $request = \Yii::$app->request;
        //遇到get[id] (接收名.默认值) 相当于 if(!empty($_GET['id'])) return $_GET['id'] else  return null
        $id = $request->get('id', 1);
        $username = $request->post('username');//遇到post[username]
        //输出
        //echo $id;
        //var_dump($username);
        //var_dump($request->isGet); //是否有get
        //var_dump($request->isPost);   //是否有post
        $userip = $request->userIP; //接收客户端ip地址
        $data = [
            'userip' => $userip,
            'webname' => 'Dadjin.top'
        ];
        //compact 就是array组合常量 下标是常量名称
        //vd(compact('data','userip'));

        //return $this->renderPartial('index',['webname'=>'Dadjin','userip'=>$userip,'data'=>$data]);//视图+传参数[''=>'',]的格式
        return $this->renderPartial('index', compact('data', 'userip'));
    }

    //T1 防xss攻击
    public function actionT1()
    {
        $data = [
            'str' => "<p style='color: #ff0000'>hello world</p> <h1>Good</h1><script>alert('xss隔绝')</script>",
        ];


        return $this->render('t1', compact('data'));

    }

    //t2 render和rederPartial区别
    //重新设置父模板在views/layouts/home.php 且在这个class里使用
    public $layout = "home";

    //测试
    public function actionT2()
    {
        // $this->renderPartial 和 $this->render 的区别是一个renderPartial是不渲染父模板而 render渲染
        //父模板在views/layouts/main.php

        $echo = "OK!Go~";
        return $this->render('t2', compact('echo'));
    }

    //试验在view调用其他的同Controller方法
    public function actionT3()
    {
        // $this->renderPartial 和 $this->render 的区别是一个renderPartial是不渲染父模板而 render渲染
        //父模板在views/layouts/main.php


        return $this->render('t3');
    }

    //T4 Model模型调用
    public function actionT4(){
        $requset=\Yii::$app->request;
        $id=$requset->get("id",1);
        $sql="select * from article where id=:id";
        //调用Model的Article并继承父类ActiveRecord Article::findBySql(语句，替换)替换可有效阻止sql注入
       $r=Article::findBySql($sql,[':id'=>$id])->all();
       vd($r);
    }
    //T5 框架数据库查询操作
    public function actionT5()
    {
        //查询单条数据
        echo '<br>查询单条数据';
       $data=Article::find()->where(['id'=>1])->all();
       var_dump($data);

       //查询大于小于数据
        echo '<br>查询大于小于条件数据';
        $data=Article::find()->where(['>=','id',2])->all();
        var_dump($data);
        //查询在2到4之间的数 2<=id<=4
        echo '<br>查询在2到4之间的数 2<=id<=4';
        $data=Article::find()->where(['between','id',2,4])->all();
        var_dump($data);
        //查询like % 某 %
        echo "查询like %%,多结果";
        $data=Article::find()->where(['like','title','睡前消息'])->all();
        vd($data);
    }

}