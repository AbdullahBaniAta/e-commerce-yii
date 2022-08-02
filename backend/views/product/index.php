<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'product_name',
            'image',
            'price',
            'category_id',
            'created_at',
            'updated_at',
            // [
            //     'class' => ActionColumn::className(),
            //     'urlCreator' => function ($action, Product $model, $key, $index, $column) {
            //         return Url::toRoute([$action, 'id' => $model->id]);
            //      }
            // ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{create} {view} {update} {delete}',
                'buttons' => [
                    'create' => function ($url, $model, $key) {
                         return Html::a('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>', $url);
                    }
                ],
            ],
        ],
    ]); ?>


</div>
