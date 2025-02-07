<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \app\components\mazer\Tabs;

/**
* @var yii\web\View $this
* @var app\models\PelatihanPeserta $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="card card-default">
    <div class="card-body">
        <?php $form = ActiveForm::begin([
        'id' => 'PelatihanPeserta',
        'layout' => 'horizontal',
        'enableClientValidation' => true,
        'errorSummaryCssClass' => 'error-summary alert alert-error'
        ]
        );
        ?>
        
			<?= $form->field($model, 'id')->textInput() ?>
			<?= // generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::activeField
$form->field($model, 'pelatihan_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(app\models\Pelatihan::find()->all(), 'id', 'id'),
    [
        'prompt' => 'Select',
        'disabled' => (isset($relAttributes) && isset($relAttributes['pelatihan_id'])),
    ]
); ?>
			<?= $form->field($model, 'nik')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'no_telp')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'tanggal_lahir')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>
			<?= // generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::activeField
$form->field($model, 'jenis_kelamin_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(app\models\MasterJenisKelamin::find()->all(), 'id', 'id'),
    [
        'prompt' => 'Select',
        'disabled' => (isset($relAttributes) && isset($relAttributes['jenis_kelamin_id'])),
    ]
); ?>
			<?= // generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::activeField
$form->field($model, 'pendidikan_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(app\models\MasterPendidikan::find()->all(), 'id', 'id'),
    [
        'prompt' => 'Select',
        'disabled' => (isset($relAttributes) && isset($relAttributes['pendidikan_id'])),
    ]
); ?>
			<?= // generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::activeField
$form->field($model, 'pekerjaan_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(app\models\MasterPekerjaan::find()->all(), 'id', 'id'),
    [
        'prompt' => 'Select',
        'disabled' => (isset($relAttributes) && isset($relAttributes['pekerjaan_id'])),
    ]
); ?>
			<?= $form->field($model, 'rt')->textInput() ?>
			<?= $form->field($model, 'rw')->textInput() ?>
			<?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>
			<?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'peserta_konfirmasi')->textInput() ?>
			<?= $form->field($model, 'nilai_pretest')->textInput() ?>
			<?= $form->field($model, 'nilai_posttest')->textInput() ?>
			<?= $form->field($model, 'nilai_praktek')->textInput() ?>
			<?= $form->field($model, 'komentar')->textarea(['rows' => 6]) ?>
			<?= $form->field($model, 'kesibukan_pasca_pelatihan')->textInput() ?>
			<?= $form->field($model, 'nama_usaha')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'jenis_usaha')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'lokasi')->textarea(['rows' => 6]) ?>
			<?= $form->field($model, 'jenis_izin_usaha')->textarea(['rows' => 6]) ?>
			<?= $form->field($model, 'nib')->textarea(['rows' => 6]) ?>
			<?= $form->field($model, 'masa_berlaku')->textInput() ?>
			<?= $form->field($model, 'lanjut')->textInput() ?>        <hr/>
        <?php echo $form->errorSummary($model); ?>
        <div class="row">
            <div class="col-md-offset-3 col-md-10">
                <?=  Html::submitButton('<i class="fa fa-save"></i> Simpan', ['class' => 'btn btn-success']); ?>
                <?=  Html::a('<i class="fa fa-chevron-left"></i> Kembali', ['index'], ['class' => 'btn btn-default']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>