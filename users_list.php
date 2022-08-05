<?php
include('data/connection.php');
include('data/header.php');
include('data/menu.php');


$kullanicisor = $db->prepare("SELECT * FROM users WHERE is_active=1");
$kullanicisor->execute();

$kullanici_listesi = $kullanicisor->fetchALL(PDO::FETCH_ASSOC);
//$kullaniciupdate = $db->query("UPDATE users SET `first_name`= '".$_POST['name']."', `last_name` = '".$_POST['surname']."' WHERE `users_id` = 4");


?>

<!-- kullanici Wrapper. Contains page kullanici -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kullanıcı Listesi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
                        <li class="breadcrumb-item active">Kullanıcı Listesi</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Kullanıcı Düzenle/Sil </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>İsim</th>
                        <th>Soyisim</th>
                        <th>E-mail</th>
                        <th>Parola</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>



                <tbody>

                    <?php

                    foreach ($kullanici_listesi as $kullanici) {

                    ?>
                        <tr>
                            
                            <td><?php echo $kullanici['first_name'] ?></td>
                            <td><?php echo $kullanici['last_name'] ?></td>
                            <td><?php echo $kullanici['email'] ?></td>
                            <td><?php echo $kullanici['password'] ?></td>
                            
                            <td>
                            <center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $kullanici['id'] ?>" onclick="editorFunc(<?php echo $kullanici['id'] ?>)">Düzenle</button></center>
                            </td>
                            <form action="/include/functions.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $kullanici['id'] ?>">
                                <td>
                                    <center><button type='submit' class="btn btn-danger btn-xs" name="user_sil">Sil</button></center>
                            </td>
                            </form>
                        </tr>
                        <!--modal -->
                        
                        

<!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo $kullanici['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kişiyi Düzenle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/include/functions.php" method="POST">
        <div class="modal-body">
            <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $kullanici['id'] ?>">
                <label for="exampleInputEmail1">İsim:</label>
                <input type="text" class="form-control" value="<?php echo $kullanici['first_name']?>" name="first_name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Soyisim :</label>
                <input type="text" class="form-control" value="<?php echo $kullanici['last_name']?>" name="last_name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">E-mail :</label>
                <input type="email" class="form-control" value="<?php echo $kullanici['email']?>" name="email">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Parola :</label>
                <input type="password" class="form-control" value="<?php echo $kullanici['password']?>" name="password">
            </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
        <button type="submit" class="btn btn-primary" name="user_update">Değişiklikleri Kaydet</button>
      </div>
      </form>
    </div>
  </div>
</div>
                        <!--/modal -->


                    <?php } ?>
                </tbody>

                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.kullanici -->
</div>
<!-- /.kullanici-wrapper -->


<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>

 function editorFunc(id){
      $('#summernote'+id).summernote()
    }


/*

    $(document).ready(function () {
    $('#example1').DataTable({
        language: {
            lengthMenu: 'Görüntüle _MENU_ Kayıt / Sayfa',
            zeroRecords: 'Bulunamadı. - Üzgünüz :(',
            info: 'Görüntülenen sayfa _PAGE_ / _PAGES_',
            infoEmpty: 'Henüz bir kayıt bulunmamaktadır.',
            infoFiltered: '(Maksimum _MAX_ kayıt filtrelendi.)',
        },
        
        
    });
});
*/
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });


</script>
<?php include('data/footer.php'); ?>
</body>

</html>