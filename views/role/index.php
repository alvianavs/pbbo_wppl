<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\RoleSearch $searchModel
 */

$this->title = 'Hak Akses';
$this->params['breadcrumbs'][] = $this->title;
?>

<p>
    <?= Html::a('<i class="fa fa-plus"></i> Tambah', ['create'], ['class' => 'btn btn-success']) ?>
</p>

<div class="card card-default">
    <div class="card-body">
        <?php \yii\widgets\Pjax::begin(['id' => 'pjax-main', 'enableReplaceState' => false, 'linkSelector' => '#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']]) ?>

        <?= GridView::widget([
            'layout' => '{summary}{pager}{items}{pager}',
            'dataProvider' => $dataProvider,
            'pager' => [
                'class' => app\components\mazer\LinkPager::className(),
                'firstPageLabel' => 'First',
                'lastPageLabel' => 'Last'],
            'filterModel' => $searchModel,
            'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
            'headerRowOptions' => ['class' => 'x'],
            'columns' => [

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update} {delete} {role-menu}',
                    'buttons' => [
                        'view' => function ($url, $model, $key) {
                            return Html::a("<i class='fa fa-eye'></i>", ["view", "id" => $model->id], ["class" => "btn btn-success", "title" => "Lihat Data"]);
                        },
                        'update' => function ($url, $model, $key) {
                            return Html::a("<i class='fa fa-pencil'></i>", ["update", "id" => $model->id], ["class" => "btn btn-warning", "title" => "Edit Data"]);
                        },
                        'delete' => function ($url, $model, $key) {
                            return Html::a("<i class='fa fa-trash'></i>", ["delete", "id" => $model->id], [
                                "class" => "btn btn-danger",
                                "title" => "Hapus Data",
                                "data-confirm" => "Apakah Anda yakin ingin menghapus data ini ?",
                                //"data-method" => "GET"
                            ]);
                        },
                        'role-menu' => function ($url, $model, $key) {
                            return Html::a("<i class='fa fa-cog'></i>", ["detail", "id" => $model->id], ["class" => "btn btn-info", "title" => "Detail"]);
                        },
                    ],
                    'contentOptions' => ['nowrap' => 'nowrap', 'style' => 'text-align:center;width:140px']
                ],
                'name',
            ],
        ]); ?>
        <?php \yii\widgets\Pjax::end() ?>
    </div>
</div>
