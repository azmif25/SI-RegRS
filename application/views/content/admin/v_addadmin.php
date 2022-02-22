      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Admin
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Data Master</li>
            <li class="active">Data Admin</li>
            <li class="active">Tambah</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Horizontal Form -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Data</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="<?php echo site_url('admin/procadd'); ?>" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Username</label>
                  <label class="col-sm-1 control-label">:</label>
                  <div class="col-sm-7">
                    <input type="text" name="username" class="form-control" required="required" />
                  </div>
                </div>
                <div style="clear: both;"></div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Password</label>
                  <label class="col-sm-1 control-label">:</label>
                  <div class="col-sm-7">
                    <input type="password" name="password" class="form-control" required="required" />
                  </div>
                </div>
                <div style="clear: both;"></div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Admin</label>
                  <label class="col-sm-1 control-label">:</label>
                  <div class="col-sm-7">
                    <input type="text" name="nama_admin" class="form-control" />
                  </div>
                </div>
                <div style="clear: both;"></div>


              </div><!-- /.box-body -->
              <div class="box-footer">
                <div class="pull-right">
                  <div class="col-sm-6">
                    <input type="submit" class="btn btn-info" value="Simpan" />
                  </div>
                  <div class="col-sm-6">
                    <input type="button" onclick="javascript:history.go(-1)" class="btn btn-default" value="Batal" />
                  </div>
                </div>
              </div><!-- /.box-footer -->
            </form>

          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->