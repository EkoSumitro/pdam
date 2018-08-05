<?php
use yii\grid\GridView;
use yii\grid\DataColumn;
use yii\grid\Column;
use himiklab\jqgrid\JqGridWidget;

use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'PDAM - Tirta Asasta | Data Roles';
?>

<section class="content-header">
    <h1>
        Roles
        <small>Data Roles</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Roles</li>
    </ol>
</section>

<section class="content">
<div class="box box-warning">
  <div class="box-header box-warning">
	<div class="col-md-12">
        <div class="list-group">
          <a href="<?php echo Url::to(['roles/form-roles']); ?>" class="btn btn-primary" style="color:#ffffff"><i style="color:#ffffff" class="fa fa-plus"></i> Tambah Roles</a>
        </div>
    </div>
    <div class="box-body ">
     <div class="col-md-8">
<!--  -->
         <table id="example1" name="example1" class="table table-striped">
            <thead>
              <tr>
                <th></th>
                <th>No.</th>
                <th>Kode Roles</th>
                <th>Nama Roles</th>
                <th>No. Urut</th>
                <th>Deskripsi</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
            <?php if (count($dataRoles) > 0) 
            { $no = 1; ?>
                <?php foreach ($dataRoles as $valRoles): ?>
                <tr>
                    <td style="width:15%;text-align:center;">
                        <a href="<?php echo Url::to(['roles/delete', 'id'=>$valRoles['id_role']]); ?>"><i class="fa fa-search" style="color:blue"></i></a>  
                        <a href="<?php echo Url::to(['roles/edit', 'id'=>$valRoles['id_role']]); ?>"><i class="fa fa-edit" style="color:green"></i></a>
                        <a href="<?php echo Url::to(['roles/detail', 'id'=>$valRoles['id_role']]); ?>"><i class="fa fa-close" style="color:red"></i></a> 
                    </td>
                    <td><?php echo $no ?></td>
                    <td><?= Html::encode("{$valRoles['kode_role']}") ?></td>
                    <td><?= Html::encode("{$valRoles['nama_role']}") ?></td>
                    <td><?= Html::encode("{$valRoles['no_urut']}") ?></td>
                    <td><?= Html::encode("{$valRoles['deskripsi']}") ?></td>
                    <td><?php 
                            if($valRoles['status_aktif'] == 1)
                            {
                            	echo "Aktif";
                            }
                            else
                            {
                            	echo "Tidak Aktif";
                            } 
                            //Html::encode("{$valRoles['isactive']}") 
                        ?>
                    </td>
                  </tr>
            <?php $no++ ;
            endforeach; ?>
            <?php } else { ?>
            <tr>
                <td style="text-align:center;font-size:15px;padding:25px;" colspan="5">No data found...</td>
            </tr>
            <?php } ?>

            </tbody>
          </table>
          <!-- <?= JqGridWidget::widget([
    'requestUrl' => 'roles/jqgrid',
    'gridSettings' => [
        'colNames' => ['rolesname', 'isactive'],
        'colModel' => [
            ['name' => 'rolesname', 'index' => 'rolesname', 'editable' => true],
            ['name' => 'isactive', 'index' => 'isactive', 'editable' => true]
        ],
        'rowNum' => 15,
        'autowidth' => true,
        'height' => 'auto',
    ],
    'pagerSettings' => [
        'edit' => true,
        'add' => true,
        'del' => true,
        'search' => ['multipleSearch' => true]
    ],
    'enableFilterToolbar' => true
]); ?> -->
          <br/>
          <br/>
    </div>
    </div>
   </div>
</div>
</section>
<!-- <script src="adminlte/js/plugins/jquery/jquery.min.js"></script>
 
  <script type="text/javascript">
var user;
$(document).ready(function() {

    user = $('#example1').DataTable({ 
        'serching':false,
        "oLanguage": {
        "sProcessing": ""
        },
        "processing": true, 
        "serverSide": false, 
        "order": [], 
        "columnDefs": [
        { 
            "targets": [ 0 ],
            "orderable": true,
            "width": "5%",
            "targets": 0,
        },
        // { 
        //     "targets": [ 0 ],
        //     "orderable": false,
        //     "width": "5%",
        //     //"targets": 5,
        // },
        ],

    });

});
</script> -->
