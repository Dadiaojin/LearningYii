<?php

use \yii\helpers\Html;
use \yii\helpers\HtmlPurifier;

//过滤所有html的<>
//没有use \yii\helpers\Html时使用
//echo \yii\helpers\Html::encode($data['str']).'<br>';
echo Html::encode($data['str']);


//仅过滤script 推荐！！！
//没有use \yii\helpers\HtmlPurifier 时使用
// echo \yii\helpers\HtmlPurifier::process($data['str']);
echo HtmlPurifier::process($data['str']);
?>
