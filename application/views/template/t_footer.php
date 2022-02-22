      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>2022 - <a href="#">Sistem Informasi RSUD</a>.</strong> All rights reserved.
      </footer>


      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
      </div><!-- ./wrapper -->

      <!-- jQuery 2.1.4 -->
      <script src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script>
      <!-- jQuery UI 1.11.4 -->
      <script src="<?php echo base_url('assets/others/jquery-ui-1.11.4/jquery-ui.min.js'); ?>"></script>
      <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
      <script>
        $.widget.bridge('uibutton', $.ui.button);
      </script>
      <!-- Bootstrap 3.3.5 -->
      <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>

      <!-- DataTables -->
      <script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
      <script src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>

      <!--Select2 -->
      <script src="<?php echo base_url('assets/select2-master/dist/js/select2.min.js'); ?>"></script>
      <script>
        $(document).ready(function() {
          /** Membuat id dosenwali yang akan di panggil pada combobox / dropdown list */
          $("#dosenwali").select2({
            placeholder: "Pilih Dosen Wali"
          });

          /** Membuat id prodi yang akan di panggil pada combobox / dropdown list  */
          $("#prodi").select2({
            placeholder: "Pilih Program Studi"
          });

          /** Membuat id tahun ajaran yang akan di panggil pada combobox / dropdown list  */
          $("#ta").select2({
            placeholder: "Pilih Tahun Ajaran"
          });

          //mahasiswa
          $("#mahasiswa").select2({
            placeholder: "Pilih Nama Mahasiswa"
          })

          $("#thsms").select2({
            placeholder: "Pilih Tahun Semester"
          })

          $("#statusaktivitasmhs").select2({
            placeholder: "Pilih Status Aktivitas"
          })

          $("#kelas").select2({
            placeholder: "Pilih Kelas"
          })

          $("#dosen").select2({
            placeholder: "Pilih Dosen"
          })
          $("#codosen").select2({
            placeholder: "Pilih CO-Dosen"
          })
          $("#kelas").select2({
            placeholder: "Pilih Kelas"
          })
          $("#matakuliah").select2({
            placeholder: "Pilih Mata Kuliah"
          })
        });
      </script>
      <!-- page script -->
      <script>
        $(function() {
          $("#example1").DataTable();
          $('#tableGuru').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": true,
            "autoWidth": false
          });
        });
      </script>

      <!-- Script TABEL AJAX disini-->
      <script>
        $(function() {
          var t = $('#guruTable').DataTable({
            'language': {
              "decimal": "",
              "emptyTable": "Tidak ada data tersedia",
              "info": "Menampilkan _START_ hingga _END_ dari total _TOTAL_ data",
              "infoEmpty": "Menampilkan 0 hingga 0 dari total 0 data",
              "infoFiltered": "(Disaring dari total _MAX_ data)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Menampilkan _MENU_ data",
              "loadingRecords": "Memuat...",
              "processing": "Melakukan proses penarikan data...",
              "search": "Pencarian:",
              "zeroRecords": "Tidak ada hasil ditemukan",
              "paginate": {
                "first": "Pertama",
                "last": "Terakhir",
                "next": "Berikutnya",
                "previous": "Sebelumnya"
              },
              "aria": {
                "sortAscending": ": Klik untuk mengurutkan ke atas",
                "sortDescending": ": Klik untuk mengurutkan ke bawah"
              }
            },
            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            'ajax': {
              'url': '<?php echo base_url(); ?>index.php/c_guru/guruList'
            },
            'columns': [{
                "data": null,
                "sortable": false,
                render: function(data, type, row, meta) {
                  return meta.row + meta.settings._iDisplayStart + 1;
                }
              },
              {
                data: 'idpengguna'
              },
              {
                data: 'nik'
              },
              {
                data: 'namaguru'
              },
              {
                data: 'namaakt'
              },
              {
                data: 'useraction'
              }
            ],
            'columnDefs': [{
              'searchable': false,
              'orderable': false,
              'targets': 0
            }],
            'order': [
              [1, 'asc']
            ]
          });


        });
      </script>

      <script>
        $(function() {
          var s = $('#siswaTable').DataTable({
            'language': {
              "decimal": "",
              "emptyTable": "Tidak ada data tersedia",
              "info": "Menampilkan _START_ hingga _END_ dari total _TOTAL_ data",
              "infoEmpty": "Menampilkan 0 hingga 0 dari total 0 data",
              "infoFiltered": "(Disaring dari total _MAX_ data)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Menampilkan _MENU_ data",
              "loadingRecords": "Memuat...",
              "processing": "Melakukan proses penarikan data...",
              "search": "Pencarian:",
              "zeroRecords": "Tidak ada hasil ditemukan",
              "paginate": {
                "first": "Pertama",
                "last": "Terakhir",
                "next": "Berikutnya",
                "previous": "Sebelumnya"
              },
              "aria": {
                "sortAscending": ": Klik untuk mengurutkan ke atas",
                "sortDescending": ": Klik untuk mengurutkan ke bawah"
              }
            },
            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            'ajax': {
              'url': '<?php echo base_url(); ?>index.php/c_siswa/siswaList'
            },
            'columns': [{
                "data": null,
                "sortable": false,
                render: function(data, type, row, meta) {
                  return meta.row + meta.settings._iDisplayStart + 1;
                }
              },
              {
                data: 'nis'
              },
              {
                data: 'nisn'
              },
              {
                data: 'namasiswa'
              },
              {
                data: 'nmjurusan'
              },
              {
                data: 'jeniskelamin'
              },
              {
                data: 'useraction'
              }
            ],
            'columnDefs': [{
              'searchable': false,
              'orderable': false,
              'targets': 0
            }],
            'order': [
              [3, 'asc']
            ]
          });


        });
      </script>
      <!--Script Tabel Ajax-->



      <!-- Morris.js charts -->
      <script src="<?php echo base_url('assets/others/raphael-2.1.0/raphael-min.js'); ?>"></script>
      <script src="<?php echo base_url('assets/plugins/morris/morris.min.js'); ?>"></script>
      <!-- Sparkline -->
      <script src="<?php echo base_url('assets/plugins/sparkline/jquery.sparkline.min.js'); ?>"></script>
      <!-- jvectormap -->
      <script src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'); ?>"></script>
      <script src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'); ?>"></script>
      <!-- jQuery Knob Chart -->
      <script src="<?php echo base_url('assets/plugins/knob/jquery.knob.js'); ?>"></script>
      <!-- daterangepicker -->
      <script src="<?php echo base_url('assets/others/moment-2.10.2/min/moment.min.js'); ?>"></script>
      <script src="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.js'); ?>"></script>
      <!-- datepicker -->
      <!-- <script src="<?php echo base_url('assets/plugins/datepicker/js/bootstrap-datepicker.js'); ?>"></script>
      <script src="<?php echo base_url('assets/plugins/datepicker/locales/bootstrap-datepicker.id.min.js'); ?>" charset="UTF-8"></script> -->
      <!-- Page script -->
      <!-- <script>
        $(function() {
          //Date picker

          $('.dttgl').datepicker({
            format: 'dd-mm-yyyy',
            todayBtn: "linked",
            clearBtn: true,
            todayHighlight: true,
            showOnFocus: true,
            language: "id",
            autoclose: true,
            minDate: "+1D",
            maxDate: "+1W"
          });

        });
      </script> -->

      <!-- Bootstrap WYSIHTML5 -->
      <script src="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'); ?>"></script>
      <!-- Slimscroll -->
      <script src="<?php echo base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js'); ?>"></script>
      <!-- FastClick -->
      <script src="<?php echo base_url('assets/plugins/fastclick/fastclick.min.js'); ?>"></script>
      <!-- AdminLTE App -->
      <script src="<?php echo base_url('assets/dist/js/app.min.js'); ?>"></script>
      <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
      <script src="<?php echo base_url('assets/dist/js/pages/dashboard.js'); ?>"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="<?php echo base_url('assets/dist/js/demo.js'); ?>"></script>

      <script>
        //delete dialog for guru
        $(document).on('click', '.delbtnguru', function(e) {
          e.preventDefault();

          //ambil href dari link
          var self = jQuery(this);
          var orihref = self.attr('onclick');
          //alert(orihref);

          //ambil field nik,namaguru
          var custarr = [];
          var rowtr = jQuery(this).closest('tr');
          var coltd = rowtr.find('td');

          coltd.addClass('row-highlight');
          var nikguru = "";
          var namaguru = "";


          jQuery.each(coltd, function(i, item) {
            custarr.push($(this).text()); //masukkan data yg di klik ke dalam array
            //item.innerHTML;
          });

          nikguru = custarr[1];
          namaguru = custarr[3];
          //alert(CustCode);

          //munculkan konfirmasi hapus
          $('#myModal').modal('show');
          //$('#myModalLabel').html("<b>Deletion of Old CIF</b>");
          $('.modal-title').html("Penghapusan Data");
          $('.modal-body').html("<p>Data berikut akan <strong>DIHAPUS</strong>:<br /><br />ID Pengguna : <b>" + nikguru + "</b><br />Nama : <b>" + namaguru + "</b><br /><br />Lanjutkan?</p>");

          $('#delt').click(function() {
            location.href = orihref;
          });
        });


        //delete dialog for siswa
        $(document).on('click', '.delbtnsiswa', function(e) {
          e.preventDefault();

          //ambil href dari link
          var self = jQuery(this);
          var orihref = self.attr('onclick');
          //alert(orihref);

          //ambil field nik,namaguru
          var custarr = [];
          var rowtr = jQuery(this).closest('tr');
          var coltd = rowtr.find('td');

          coltd.addClass('row-highlight');
          var nis = "";
          var namasiswa = "";


          jQuery.each(coltd, function(i, item) {
            custarr.push($(this).text()); //masukkan data yg di klik ke dalam array
            //item.innerHTML;
          });

          nis = custarr[1];
          namasiswa = custarr[3];
          //alert(CustCode);

          //munculkan konfirmasi hapus
          $('#myModal').modal('show');
          //$('#myModalLabel').html("<b>Deletion of Old CIF</b>");
          $('.modal-title').html("Penghapusan Data");
          $('.modal-body').html("<p>Data berikut akan <strong>DIHAPUS</strong>:<br /><br />NIS : <b>" + nis + "</b><br />Nama : <b>" + namasiswa + "</b><br /><br />Lanjutkan?</p>");

          $('#delt').click(function() {
            location.href = orihref;
          });
        });


        //delete dialog for kelas
        $(document).on('click', '.delbtnkelas', function(e) {
          e.preventDefault();

          //ambil href dari link
          var self = jQuery(this);
          var orihref = self.attr('onclick');
          //alert(orihref);

          //ambil field nik,namaguru
          var custarr = [];
          var rowtr = jQuery(this).closest('tr');
          var coltd = rowtr.find('td');

          coltd.addClass('row-highlight');
          var data1 = "";
          var data2 = "";


          jQuery.each(coltd, function(i, item) {
            custarr.push($(this).text()); //masukkan data yg di klik ke dalam array
            //item.innerHTML;
          });

          data1 = custarr[3];
          data2 = custarr[4];
          //alert(CustCode);

          //munculkan konfirmasi hapus
          $('#myModal').modal('show');
          //$('#myModalLabel').html("<b>Deletion of Old CIF</b>");
          $('.modal-title').html("Penghapusan Data");
          $('.modal-body').html("<p>Data berikut akan <strong>DIHAPUS</strong>:<br /><br />Nama Kelas : <b>" + data1 + "</b><br />Jurusan : <b>" + data2 + "</b><br /><br />Lanjutkan?</p>");

          $('#delt').click(function() {
            location.href = orihref;
          });
        });

        //delete dialog for kurikulum
        $(document).on('click', '.delbtnpelajaran', function(e) {
          e.preventDefault();

          //ambil href dari link
          var self = jQuery(this);
          var orihref = self.attr('onclick');
          //alert(orihref);

          //ambil field nik,namaguru
          var custarr = [];
          var rowtr = jQuery(this).closest('tr');
          var coltd = rowtr.find('td');

          coltd.addClass('row-highlight');
          var data1 = "";
          var data2 = "";


          jQuery.each(coltd, function(i, item) {
            custarr.push($(this).text()); //masukkan data yg di klik ke dalam array
            //item.innerHTML;
          });

          data1 = custarr[1];
          data2 = custarr[3];
          //alert(CustCode);

          //munculkan konfirmasi hapus
          $('#myModal').modal('show');
          //$('#myModalLabel').html("<b>Deletion of Old CIF</b>");
          $('.modal-title').html("Reset Data");
          $('.modal-body').html("<p>Data berikut akan <strong>DIRESET</strong>:<br /><br />Nama Kelas : <b>" + data1 + "</b><br />Jurusan : <b>" + data2 + "</b><br /><br />Lanjutkan?</p>");

          $('#delt').click(function() {
            location.href = orihref;
          });
        });


        //delete dialog for mapel
        $(document).on('click', '.delbtnmapel', function(e) {
          e.preventDefault();

          //ambil href dari link
          var self = jQuery(this);
          var orihref = self.attr('onclick');
          //alert(orihref);

          //ambil field nik,namaguru
          var custarr = [];
          var rowtr = jQuery(this).closest('tr');
          var coltd = rowtr.find('td');

          coltd.addClass('row-highlight');
          var data1 = "";
          var data2 = "";


          jQuery.each(coltd, function(i, item) {
            custarr.push($(this).text()); //masukkan data yg di klik ke dalam array
            //item.innerHTML;
          });

          data1 = custarr[1];
          data2 = custarr[2];
          //alert(CustCode);

          //munculkan konfirmasi hapus
          $('#myModal').modal('show');
          //$('#myModalLabel').html("<b>Deletion of Old CIF</b>");
          $('.modal-title').html("Penghapusan Data");
          $('.modal-body').html("<p>Data berikut akan <strong>DIHAPUS</strong>:<br /><br />ID Pelajaran : <b>" + data1 + "</b><br />Mata Pelajaran : <b>" + data2 + "</b><br /><br />Lanjutkan?</p>");

          $('#delt').click(function() {
            location.href = orihref;
          });
        });


        //delete dialog for ALL
        $(document).on('click', '.delbtn', function(e) {
          e.preventDefault();

          //ambil href dari link
          var self = jQuery(this);
          var orihref = self.attr('onclick');
          //alert(orihref);

          //ambil field nik,namaguru
          var custarr = [];
          var rowtr = jQuery(this).closest('tr');
          var coltd = rowtr.find('td');

          coltd.addClass('row-highlight');
          var data1 = "";
          var data2 = "";


          jQuery.each(coltd, function(i, item) {
            custarr.push($(this).text()); //masukkan data yg di klik ke dalam array
            //item.innerHTML;
          });

          data1 = custarr[1];
          data2 = custarr[3];
          //alert(CustCode);

          //munculkan konfirmasi hapus
          $('#myModal').modal('show');
          //$('#myModalLabel').html("<b>Deletion of Old CIF</b>");
          $('.modal-title').html("Penghapusan Data");
          $('.modal-body').html("<p>Data berikut akan <strong>DIHAPUS</strong><br />Lanjutkan?</p>");

          $('#delt').click(function() {
            location.href = orihref;
          });
        });
      </script>
      <!--script delete til here -->


      <script type="text/javascript">
        $('#cbprovinsi').change(function() {
          var provinsiid = $(this).val();
          $.ajax({
            url: "<?php echo site_url('c_guru/ajaxkota'); ?>",
            method: "POST",
            data: {
              'provinsiid': provinsiid
            },
            async: true,
            dataType: 'json',
            success: function(data) {

              var html = '';
              var i;
              html = '<option value=""></option>';
              for (i = 0; i < data.length; i++) {
                html += '<option value=' + data[i].kabupatenkotaid + '>' + data[i].jeniskota + ' ' + data[i].namakota + '</option>';
              }
              $('#cbkabupaten').html(html);
              $('#cbkecamatan').html('<option value=""></option>');
              $('#cbkelurahan').html('<option value=""></option>');
              $('#txtkodepos').val('');

            }
          });
          return false;
        });
      </script>

      <script type="text/javascript">
        $('#cbkabupaten').change(function() {
          //var provinsiid = $(#cbprovinsi).val();
          var kabupatenkotaid = $(this).val();
          $.ajax({
            url: "<?php echo site_url('c_guru/ajaxkecamatan'); ?>",
            method: "POST",
            data: {
              'kabupatenkotaid': kabupatenkotaid
            },
            async: true,
            dataType: 'json',
            success: function(data) {

              var html = '';
              var i;
              html = '<option value=""></option>';
              for (i = 0; i < data.length; i++) {
                html += '<option value=' + data[i].kecamatanid + '>' + data[i].namakec + '</option>';
              }
              $('#cbkecamatan').html(html);
              $('#cbkelurahan').html('<option value=""></option>');
              $('#txtkodepos').val('');

            }
          });
          return false;
        });
      </script>

      <script type="text/javascript">
        $('#cbkecamatan').change(function() {
          //var provinsiid = $(#cbprovinsi).val();
          var kecamatanid = $(this).val();
          $.ajax({
            url: "<?php echo site_url('c_guru/ajaxkelurahan'); ?>",
            method: "POST",
            data: {
              'kecamatanid': kecamatanid
            },
            async: true,
            dataType: 'json',
            success: function(data) {

              var html = '';
              var i;
              html = '<option value=""></option>';
              for (i = 0; i < data.length; i++) {
                html += '<option value=' + data[i].kelurahanid + '>' + data[i].namakel + '</option>';
              }
              $('#cbkelurahan').html(html);
              $('#txtkodepos').val('');

            }
          });
          return false;
        });
      </script>


      <script type="text/javascript">
        $('#cbkelurahan').change(function() {
          //var provinsiid = $(#cbprovinsi).val();
          var kelurahanid = $(this).val();
          $.ajax({
            url: "<?php echo site_url('c_guru/ajaxkodepos'); ?>",
            method: "POST",
            data: {
              'kelurahanid': kelurahanid
            },
            async: true,
            dataType: 'json',
            success: function(data) {

              var tkodepos = '';
              var i;
              for (i = 0; i < data.length; i++) {
                tkodepos += data[i].kodepos;
              }
              $('#txtkodepos').val(tkodepos);

            }
          });
          return false;
        });
      </script>



      <!--ajax penilaian-->
      <script type="text/javascript">
        $(document).on('change', '.npengetahuan', function() {
          var pid = $('.pelajaranid').val();
          var np = parseInt($(this).val());
          var nk = parseInt($(this).closest("tr").find('.nketerampilan').val());
          var self = this;

          if (Number.isNaN(np)) {
            np = 0;
          }

          if (Number.isNaN(nk)) {
            nk = 0;
          }

          $.ajax({
            type: 'POST',
            url: '<?php echo site_url('c_nilaimapel/ajaxnilaiakhir') ?>',
            async: 'false',
            data: {
              'pelajaranid': pid,
              'nilaip': np,
              'nilaik': nk
            },
            dataType: 'html',
          }).done(function r(nakhir) {
            //console.log(retData);
            $(self).closest("tr").find("td:eq(5)").html('<input type="text" class="form-control" disabled="disabled" value="' + nakhir + '" />');
          });

          $.ajax({
            type: 'POST',
            url: '<?php echo site_url('c_nilaimapel/ajaxpredikat') ?>',
            async: 'false',
            data: {
              'pelajaranid': pid,
              'nilaip': np,
              'nilaik': nk
            },
            dataType: 'json',
          }).done(function r(predData) {
            //console.log(retData);
            $(self).closest("tr").find("td:eq(6)").html('<input type="text" class="form-control" disabled="disabled" value="' + predData[0].namapredikat + '" />');
          });


        })

        $(document).on('change', '.nketerampilan', function() {
          var pid = $('.pelajaranid').val();
          var np = parseInt($(this).closest("tr").find('.npengetahuan').val());
          var nk = parseInt($(this).val());
          var self = this;

          if (Number.isNaN(np)) {
            np = 0;
          }

          if (Number.isNaN(nk)) {
            nk = 0;
          }

          $.ajax({
            type: 'POST',
            url: '<?php echo site_url('c_nilaimapel/ajaxnilaiakhir') ?>',
            async: 'false',
            data: {
              'pelajaranid': pid,
              'nilaip': np,
              'nilaik': nk
            },
            dataType: 'html',
          }).done(function r(nakhir) {
            //console.log(retData);
            $(self).closest("tr").find("td:eq(5)").html('<input type="text" class="form-control" disabled="disabled" value="' + nakhir + '" />');
          });

          $.ajax({
            type: 'POST',
            url: '<?php echo site_url('c_nilaimapel/ajaxpredikat') ?>',
            async: 'false',
            data: {
              'pelajaranid': pid,
              'nilaip': np,
              'nilaik': nk
            },
            dataType: 'json',
          }).done(function r(predData) {
            //console.log(retData);
            $(self).closest("tr").find("td:eq(6)").html('<input type="text" class="form-control" disabled="disabled" value="' + predData[0].namapredikat + '" />');
          });
        })


        //on change nilai akhir ambil peringkat ajax
        /*
        $(document).on('change','.nakhir',function() {
                  var na = $(this).val();
                  var pid = $('.pelajaranid').val();
                  var self=this;
                  
                  
                  $.ajax({
                  type: 'POST',
                  url: '<?php echo site_url('c_nilaimapel/ajaxpredikat') ?>',
                          async: 'false',
                          data: {'pelajaranid': pid,'nilai': na},
                          dataType: 'json',
                }).done(function r(retData) {
              //console.log(retData);
                      $(self).closest("tr").find("td:eq(6)").html('<input type="text" class="form-control" readonly="readonly" value="'+retData[0].namapredikat+'" />');
                  });         
                  
                  
          })
          */
      </script>



      <script>
        $("#formpassword").submit(function() {
          if ($("#password").val() != $("#confirm_password").val()) {
            //alert("password should be same");
            //munculkan konfirmasi hapus
            $('#modalSandi').modal('show');
            //$('#myModalLabel').html("<b>Deletion of Old CIF</b>");
            $('.modal-title').html("Pengecekan Kata Sandi");
            $('.modal-body').html("<p>Kolom Sandi Baru dan Konfirmasi Sandi Baru harus sama.</p>");

            return false;
          }
        })
      </script>

      </body>

      </html>