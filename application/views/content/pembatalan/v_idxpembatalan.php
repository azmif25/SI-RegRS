<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Ajukan Pembatalan
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Ajukan Pembatalan</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Horizontal Form -->
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Batalkan</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form method="post" enctype="multipart/form-data" action="<?php echo site_url('pembatalan/procadd'); ?>" class="form-horizontal">
                <div class="box-body">
                    <input type="hidden" name="id_tujuan" value="<?php echo $id_tujuan ?>">
                    <input type="hidden" name="id_verif" value="<?php echo $id_verif ?>">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Alasan Mengajukan Pembatalan</label>
                        <label class="col-sm-1 control-label">:</label>
                        <div class="col-sm-7">
                            <textarea name="alasan_batal" class="form-control" cols="30" rows="10" placeholder="Masukan Alasan..."></textarea>
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