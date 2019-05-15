<div class="row">
  <div class="col-md-12">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li onclick="location.href='settings?manage=data'" class="breadcrumb-item <?php if (!(isset($_GET['manage'])) or $_GET['manage']=='data') echo 'active'; ?>">Data</li>
        <li onclick="location.href='settings?manage=pages'" class="breadcrumb-item <?php if ((isset($_GET['manage'])) and $_GET['manage']=='pages') echo 'active'; ?>" aria-current="page">Pages</li>
      </ol>
    </nav>
  </div>
</div>
<?php
  if (!(isset($_GET['manage'])) or $_GET['manage']=='data') {
?>
<div class="row">
 <div class="col-md-12">
   <div class="card mb-3">
     <div class="card-body">
       <div class="table-responsive">
         <table class="table table-borderless" width="100%" cellspacing="0">
           <thead>
             <tr>
               <th>Sr.</th>
               <th>Name</th>
               <th>Value</th>
               <th>Type</th>
               <th>Action</th>
             </tr>
           </thead>
           <tbody>
             <?php
             if($result = mysqli_query($mysqli, "SELECT * From settings"))
             while($res = mysqli_fetch_array($result)){
               $id=$res['id'];

               echo '<tr>';
               echo '<td><p class="mb-0">'.$res['id'].'</p></td>';
               echo '<td><p class="mb-0">'.$res['name'].'</p></td>';
               if ($res['type']=='pass') {
                 echo '<td><p class="mb-0">XXXXXXXXXXXXXXX</p></td>';
               } else {
                 echo '<td><p class="mb-0">'.$res['value'].'</p></td>';
               }
               echo '<td><p class="mb-0">'.$res['type'].'</p></td>';

               echo '<td><p class="mb-0" class="text-center">';
               echo '<a href="javascript:void(0);" onclick="editsettings('.$res['id'].');" data-toggle="tooltip" data-placement="top" title="Edit Setting"><i class="fa fa-edit" style="color:green;"></i></a>';
               echo '&nbsp;&nbsp;';

               echo '</td></tr>';

             }

              ?>
           </tbody>
           <tfoot>
             <tr>
               <th>Sr.</th>
               <th>Name</th>
               <th>Value</th>
               <th>Type</th>
               <th>Action</th>
             </tr>
           </tfoot>
         </table>
       </div>
     </div>
   </div>
 </div>
</div>

<?php
} else if ($_GET['manage']=='pages') {
?>
<div class="row">
 <div class="col-md-6">
   <div class="card mb-3">
     <div class="card-header">
      Websie Pages
     </div>
     <div class="card-body">
       <div class="table-responsive">
         <table class="table table-borderless" width="100%" cellspacing="0">
           <thead>
             <tr>
               <th>Sr.</th>
               <th>Name</th>
               <th>Action</th>
             </tr>
           </thead>
           <tbody>
             <?php
             if($result = mysqli_query($mysqli, "SELECT * From pages where shown=1"))
             while($res = mysqli_fetch_array($result)){
               $id=$res['id'];

               echo '<tr>';
               echo '<td><p class="mb-0">'.$res['id'].'</p></td>';
               echo '<td><p class="mb-0">'.$res['name'].'</p></td>';
               echo '<td><p class="mb-0" class="text-center">';
               echo '<a href="javascript:void(0);" onclick="editpage('.$res['id'].');" data-toggle="tooltip" data-placement="top" title="Edit Page Content"><i class="fa fa-edit" style="color:green;"></i></a>';
               echo '&nbsp;&nbsp;';

               echo '</p></td></tr>';

             }

              ?>
           </tbody>
           <tfoot>
             <tr>
               <th>Sr.</th>
               <th>Name</th>
               <th>Action</th>
             </tr>
           </tfoot>
         </table>
       </div>
     </div>
   </div>
 </div>
 <div class="col-md-6">
   <div class="card mb-3">
     <div class="card-header">
      Website Images
     </div>
     <div class="card-body">
       <div class="table-responsive">
         <table class="table table-borderless" width="100%" cellspacing="0">
           <thead>
             <tr>
               <th>Sr.</th>
               <th>Photo</th>
               <th>Name</th>
               <th>Alt</th>
               <th>WxH</th>
               <th>Action</th>
             </tr>
           </thead>
           <tbody>
             <?php
             if($result = mysqli_query($mysqli, "SELECT * From pictures"))
             while($res = mysqli_fetch_array($result)){
               $id=$res['id'];

               echo '<tr>';
               echo '<td><p class="mb-0">'.$res['id'].'</p></td>';
               echo '<td><p class="mb-0"> </p></td>';
               echo '<td><p class="mb-0">'.$res['filename'].'.'.$res['format'].'</p></td>';
               echo '<td><p class="mb-0">'.$res['alt'].'</p></td>';
               echo '<td><p class="mb-0">'.$res['width'].' X '.$res['height'].'</p></td>';
               echo '<td><p class="mb-0" class="text-center">';
               echo '<a href="javascript:void(0);" onclick="editimagedata('.$res['id'].');" data-toggle="tooltip" data-placement="top" title="Edit Image Details"><i class="fa fa-edit" style="color:green;"></i></a>';
               echo '&nbsp;&nbsp;';
               echo '<a href="javascript:void(0);" onclick="editimage('.$res['id'].');" data-toggle="tooltip" data-placement="top" title="Upload/Update Image"><i class="fa fa-cloud-upload" style="color:indigo;"></i></a>';
               echo '&nbsp;&nbsp;';
               echo '</td></p></tr>';

             }

              ?>
           </tbody>
           <tfoot>
             <tr>
               <th>Sr.</th>
               <th>Photo</th>
               <th>Name</th>
               <th>Alt</th>
               <th>WxH</th>
               <th>Action</th>
             </tr>
           </tfoot>
         </table>
       </div>
     </div>
   </div>
 </div>
</div>

<?php
}
?>
