<?php
use yii\grid\GridView;
use yii\grid\DataColumn;
use yii\grid\Column;

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
<div class="box box-primary">
  <div class="box-header with-border">
	<div class="col-md-12">
        <div class="list-group">
          <a href="<?php echo Url::to(['roles/form-roles']); ?>" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah Roles</a>
        </div>
    </div>
    <div class="box-body">
     <div class="col-md-12">
<!--  -->
         <table id="example1" name="example1" class="table table-striped">
            <thead>
              <tr>
                <th></th>
                <th>No</th>
                <th>Nama Roles</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
            <?php if (count($dataRoles) > 0) 
            { $no = 1; ?>
                <?php foreach ($dataRoles as $valRoles): ?>
                <tr>
                    <td style="width:15%;text-align:center;">
                        <a class="btn btn-success btn-sm" href="<?php echo Url::to(['hello-crud/detail', 'id'=>$team['id']]); ?>"><i class="glyphicon glyphicon-eye-open"></i></a> 
                    </td>
                    <td><?php echo $no ?></td>
                    <td><?= Html::encode("{$valRoles['rolesname']}") ?></td>
                    <td><?php 
                            if($valRoles['isactive'] == 1)
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
          <br/>
          <br/>
    </div>
    </div>
   </div>
</div>
</section>
<script src="adminlte/js/plugins/jquery/jquery.min.js"></script>
 
  <script type="text/javascript">
var user;
$(document).ready(function() {

    user = $('#example1').DataTable({ 

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
</script>
    </script>
