<?php

use app\models\Instansi;
use dmstr\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use app\components\mazer\Tabs;

/**
 * @var yii\web\View $this
 * @var app\models\PelatihanJenis $model
 */

$this->title = 'Pelatihan Jenis ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pelatihan Jenis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="giiant-crud pelatihan-jenis-view">

    <!-- menu buttons -->
    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . 'Edit', ['update', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'Tambah Baru', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <p class="pull-right">
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> ' . 'Daftar Pelatihan Jenis', ['index'], ['class' => 'btn btn-default']) ?>
    </p>

    <div class="clearfix"></div>

    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <?= \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>

    <div class="card card-default">
        <div class="card-body">
            <?php $this->beginBlock('\app\models\PelatihanJenis'); ?>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'index',
                    'nama',
                    'sasaran',
                    'peserta',
                    'durasi',
                    [
                        'class' => yii\grid\DataColumn::className(),
                        'attribute' => 'instansi_id',
                        'value' => function ($model) {
                            $instansi = Instansi::find()
                                ->where(["in", "id", explode(",", $model->instansi_id)])
                                ->all();
                            $result = "";
                            foreach ($instansi as $i) {
                                $result .= "{$i->nama} <br/>";
                            }
                            return $result;
                        },
                        'format' => 'raw',
                    ],
                ],
            ]); ?>

            <hr />

            <?= Html::a(
                '<span class="glyphicon glyphicon-trash"></span> ' . 'Delete',
                ['delete', 'id' => $model->id],
                [
                    'class' => 'btn btn-danger',
                    'data-confirm' => '' . 'Are you sure to delete this item?' . '',
                    'data-method' => 'post',
                ]
            ); ?>
            <?php $this->endBlock(); ?>



            <?= Tabs::widget(
                [
                    'id' => 'relation-tabs',
                    'encodeLabels' => false,
                    'items' => [[
                        'label'   => '<b class=""># ' . $model->id . '</b>',
                        'content' => $this->blocks['\app\models\PelatihanJenis'],
                        'active'  => true,
                    ],]
                ]
            );
            ?>
        </div>
    </div>
</div>