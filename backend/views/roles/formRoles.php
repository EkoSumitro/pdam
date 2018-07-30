<?php
use yii\helpers\Html;
//use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'PDAM - Tirta Asasta | Input Roles';
?>

<section class="content-header">
    <h1>
        Roles
        <small>Data Roles</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tambah Roles</li>
    </ol>
</section>

<div class="box box-primary">
	<div class="row">
		<div class="col-sm-3">
		        <div class="box-body">
    				<?php $form = ActiveForm::begin(['id' => 'roles-form']); ?>
		            <div class="form-group">
					<?= $form->field($model,'rolesname')->textInput() ?>
					</div>
	                <div class="checkbox">
					<?= $form->field($model,'isactive')->checkbox() ?>
	  				</div>
					<div class="form-group">
	        		<?= Html::submitButton('Simpan', ['class' => 'btn btn-success', 'name' => 'roles-button']) ?>
					</div>
				<?php
					ActiveForm::end();
				?>
	  			</div>
		</div>
	</div>
</div>