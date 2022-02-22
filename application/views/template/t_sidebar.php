          <!--init array bypass controller-->

          <!-- Left side column. contains the logo and sidebar -->
          <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
              <!-- Sidebar user panel -->
              <div class="user-panel">
                <div class="pull-left image">
                  <img src="<?php echo base_url('assets/dist/img/user.png'); ?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                  <p><?php if ($this->session->role == 'admin' || $this->session->role == 'super_admin') {
                        echo $this->session->nama;
                      } else {
                        echo $this->session->data;
                      } ?></p>
                  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
              </div>

              <!-- search form 
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          /.search form -->

              <!-- sidebar menu: : style can be found in sidebar.less -->

              <ul class="sidebar-menu">
                <li class="header">NAVIGASI UTAMA</li>
                <li class="active"><a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

                <?php
                if ($this->session->role == 'pasien') {
                ?>
                  <?php if (empty($status) || $status != 'Tidak Layak') { ?>
                    <li class="treeview">
                      <a href="#">
                        <i class="fa fa-edit"></i> <span>Input Data</span>
                        <i class="fa fa-angle-left pull-right"></i>
                      </a>
                      <ul class="treeview-menu">

                        <?php
                        if (empty($status) || $status == null) { ?>

                          <li><a href="<?php echo site_url('tujuan'); ?>"><i class="fa fa-circle-o"></i> Tambah Tujuan Berobat</a></li>
                        <?php
                        } elseif ($status == "Layak") { ?>
                          <li><a href="<?php echo site_url('tujuan/praru'); ?>"><i class="fa fa-circle-o"></i> Registrasi Ulang Tujuan</a></li>
                          <li><a href="<?php echo site_url('pembatalan'); ?>"><i class="fa fa-circle-o"></i> Ajukan Pembatalan</a></li>
                        <?php
                        } elseif ($status == "Menunggu") { ?>
                          <li><a href="<?php echo site_url('tujuan/ubah'); ?>"><i class="fa fa-circle-o"></i> Ubah Tujuan Berobat</a></li>
                          <li><a href="<?php echo site_url('pembatalan'); ?>"><i class="fa fa-circle-o"></i> Ajukan Pembatalan</a></li>
                        <?php
                        }
                        ?>

                      </ul>
                    </li>
                  <?php
                  } else { ?>
                    <li class="treeview">
                      <a href="#">
                        <i class="fa fa-edit"></i> <span>Input Data</span>
                        <i class="fa fa-angle-left pull-right"></i>
                      </a>
                      <ul class="treeview-menu">
                        <li><a href="<?php echo site_url('tujuan/praru'); ?>"><i class="fa fa-circle-o"></i> Registrasi Ulang Tujuan</a></li>
                      </ul>
                    </li>
                  <?php } ?>
                  <li class="treeview">
                    <a href="#">
                      <i class="fa fa-info"></i> <span>Informasi</span>
                      <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="<?php echo site_url('informasi/fasilitas'); ?>"><i class="fa fa-circle-o"></i> Fasilitas</a></li>
                      <li><a href="<?php echo site_url('informasi/prosedur'); ?>"><i class="fa fa-circle-o"></i> Prosedur Pasien</a></li>
                      <li><a href="<?php echo site_url('informasi/poli'); ?>"><i class="fa fa-circle-o"></i> Poli</a></li>
                    </ul>
                  </li>
                  <li class="treeview">
                    <a href="#">
                      <i class="fa fa-phone"></i> <span>Tentang Kami</span>
                      <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="<?php echo site_url('informasi/kojad'); ?>"><i class="fa fa-circle-o"></i> Kontak & Jadwal</a></li>
                    </ul>
                  </li>
                <?php
                }
                ?>


                <?php
                if ($this->session->role == 'admin' || $this->session->role == 'super_admin') {
                ?>

                  <li class="treeview">
                    <a href="#">
                      <i class="fa fa-edit"></i> <span>Input Data</span>
                      <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">

                      <li><a href="<?php echo site_url('verifikasi'); ?>"><i class="fa fa-circle-o"></i> Verifikasi Pasien</a></li>
                      <li><a href="<?php echo site_url('aktivasi'); ?>"><i class="fa fa-circle-o"></i> Aktivasi Pasien</a></li>


                    </ul>
                  </li>


                  <li class="treeview">
                    <a href="#">
                      <i class="fa fa-laptop"></i>
                      <span>Data Master</span>
                      <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">



                      <?php if ($this->session->role == 'super_admin') {
                      ?>
                        <li><a href="<?php echo site_url('admin'); ?>"><i class="fa fa-circle-o"></i> Admin</a></li>
                      <?php
                      } ?>

                      <li><a href="<?php echo site_url('pasien'); ?>"><i class="fa fa-circle-o"></i> Pasien</a></li>

                      <li><a href="<?php echo site_url('poli'); ?>"><i class="fa fa-circle-o"></i> Poli</a></li>


                    </ul>
                  </li>
                  <li class="treeview">
                    <a href="#">
                      <i class="fa fa-pie-chart"></i>
                      <span>Laporan</span>
                      <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="<?php echo site_url('tujuan/rrujukan'); ?>"><i class="fa fa-circle-o"></i> Registrasi Rujukan</a></li>
                      <li><a href="<?php echo site_url('verifikasi/rekap'); ?>"><i class="fa fa-circle-o"></i> Verifikasi Rujukan</a></li>
                      <li><a href="<?php echo site_url('aktivasi/rekap'); ?>"><i class="fa fa-circle-o"></i> Aktivasi Data Pasien</a></li>
                      <li><a href="<?php echo site_url('pembatalan/rekap'); ?>"><i class="fa fa-circle-o"></i> Pembatalan Pasien</a></li>
                    </ul>
                  </li>
                <?php
                }
                ?>
              </ul>
            </section>
            <!-- /.sidebar -->
          </aside>