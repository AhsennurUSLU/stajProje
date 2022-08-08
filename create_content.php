<?php 
include('data/header.php');
include('data/menu.php');

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>İçerik Oluştur</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
              <li class="breadcrumb-item active">İçerik Oluştur</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
      
    </section>


    <!-- Main content -->

    <section class="content">
      <form action="include/functions.php" method="POST">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                İçerik Ekle
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="form-group">
                <label>Başlık</label>
                <input type="text" name="title" class="form-control">
              </div>
              <div class="form-group">
                  <label>İçerik</label>
                  <textarea id="summernote" name="content" rows="10"></textarea>
              </div>
            </div>
            
          </div>
        </div>
        <!-- /.col-->
      </div>
      
  
      <!-- ./row -->
    </section>
    <div class="col-md-2"><button type="submit" name="kaydet" class="btn btn-block btn-primary btn-flat">Kaydet</button></div></form>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include('data/footer.php');?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- Summernote -->
<script src="../../plugins/summernote/summernote-bs4.min.js"></script>
<!-- CodeMirror -->
<script src="../../plugins/codemirror/codemirror.js"></script>
<script src="../../plugins/codemirror/mode/css/css.js"></script>
<script src="../../plugins/codemirror/mode/xml/xml.js"></script>
<script src="../../plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  /*$('#summernote').summernote({
  height: 150, 
});*/

  $(function () {
    // Summernote
    $('#summernote').summernote({
      height: 150,
    });

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>
</body>
</html>
