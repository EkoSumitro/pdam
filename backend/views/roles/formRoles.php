
<!-- <script src="adminlte/js/plugins/jquery/jquery.min.js"></script> -->
<?php
use yii\helpers\Html;
//use yii\helpers\Url;
//use yii\widgets\ActiveForm;
use kartik\form\ActiveForm;

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

<div class="box box-warning">
	<div class="row">
		<div class="col-sm-3">
		        <div class="box-header with-border">
    				<?php $form = ActiveForm::begin([
    					'id' => 'roles-form' ,
				        'type' => ActiveForm::TYPE_HORIZONTAL, 
				      	'formConfig' => ['deviceSize' => ActiveForm::SIZE_LARGE]]); ?>
		            <div class="form-group">
					<?= $form->field($model, 'kode_role', ['labelSpan' => 5, 'deviceSize' => ActiveForm::SIZE_LARGE,
               'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control', 'width' =>'1000px']])->textInput(['style'=>'width:150px'])?>
					</div>
		            <div class="form-group">
					<?= $form->field($model, 'nama_role', ['labelSpan' => 5])->textInput(['style'=>'width:300px'])?>
					</div>
		            <div class="form-group">
					<?= $form->field($model, 'no_urut', ['labelSpan' => 5])->textInput(['style'=>'width:150px'])?>
					</div>
		            <div class="form-group">
					<?= $form->field($model, 'deskripsi', ['labelSpan' => 5])->textarea(['rows' => '3','style'=>'width:500px'])?>
					</div>
	                <div class="checkbox">
					<?= $form->field($model,'status_aktif', ['labelSpan' => 5])->dropDownList(
            		['1' => 'Ya', '0' => 'Tidak']); ?>
	  				</div>
	  			</div>
		        <div class="box-header with-border">
					<div class="form-group">
	        		<?= Html::submitButton('Simpan', ['class' => 'btn btn-success', 'name' => 'roles-button']) ?>
					</div>
				</div>
				<?php
					ActiveForm::end();
				?>
		</div>
	</div>
</div>
<!-- <div class="box box-primary">
<div class="box-header with-border">
	<h3>Tamah Roles</h3>
	<!--<a href="#">
		<span class="glyphicon fa fa-mail-reply"></span> <b>Kembali</b>
	</a> -->
   <div class="box-tools pull-right">
	<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	<!-- <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
  </div> 
<!-- </div>
<div class="box-body">
  <div class="row">
	<div class="col-md-12">
	  <form id="frm" method="post" class="form-horizontal" action="#" enctype="multipart/form-data">
		<div class="box-body">
			<div class="form-group">
				<label class="control-label col-sm-2" for="kode_agama">Kode Agama</label>
				<div class="col-sm-7">
				  <input type="text" class="form-control" id="kode_agama" name="kode_agama" placeholder="Kode Agama" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="nama_agama">Nama Agama</label>
				<div class="col-sm-7">
				  <input type="text" class="form-control" id="nama_agama" name="nama_agama" placeholder="Nama Agama" required>
				</div>
			</div>
			<div class="form-group"> 
				<div class="col-sm-offset-2 col-sm-10">
				  <button type="submit" id="btn-save" class="btn btn-md btn-primary">
				  <i class="ace-icon fa fa-save"></i> Save
				  </button>
				  <button type="button" class="btn btn-md btn-danger">
					<i class="ace-icon fa fa-ban"></i> Reset
				  </button>
				</div>
			</div>
		</div>
	  </form>
	</div>
  </div>
</div>
</div>  -->
