
  <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?= base_url() ?>public/image/upload/gurustaf/<?= $this->session->userdata('foto_user'); ?>" alt="User Image" style="width: 50px; heigth: 75px;">
        <div>
          <p class="app-sidebar__user-name"><?= $this->session->userdata('name_user'); ?></p>
          <p class="app-sidebar__user-designation"><?= $this->session->userdata('level_user'); ?></p>
        </div>
      </div>
      <ul class="app-menu">
        <!-- <li><a class="app-menu__item" href="<?= base_url(); ?>admin/dashboard"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>

        <li><a class="app-menu__item" href="<?= base_url(); ?>" target="_blank"><i class="app-menu__icon fa fa-paper-plane"></i><span class="app-menu__label">Situs Web</span></a></li>

        <li class="treeview">
          <a class="app-menu__item" href="<?= base_url(); ?>admin/#" data-toggle="treeview"><i class="app-menu__icon fa fa-briefcase"></i><span class="app-menu__label">Artikel</span><i class="treeview-indicator fa fa-angle-right"></i>
          </a>
          <ul class="treeview-menu">
          
            <li><a class="treeview-item" href="<?= base_url(); ?>admin/artikel/draft"><i class="icon fa fa-circle-o"></i>Draft</a>
            </li>
            <li><a class="treeview-item" href="<?= base_url(); ?>admin/artikel/request"><i class="icon fa fa-circle-o"></i>Request</a>
            </li>
            <li><a class="treeview-item" href="<?= base_url(); ?>admin/artikel/publish"><i class="icon fa fa-circle-o"></i>Publish</a>
            </li>
            <li><a class="treeview-item" href="<?= base_url(); ?>admin/artikel/reject"><i class="icon fa fa-circle-o"></i>Reject</a>
            </li>
         
          </ul>
        </li> -->

      <?php
        if($this->session->userdata('level_user') == 'Admin'){
      ?>
        <!-- <li class="treeview">
          <a class="app-menu__item" href="<?= base_url(); ?>admin/#" data-toggle="treeview"><i class="app-menu__icon fa fa-briefcase"></i><span class="app-menu__label">Berita</span><i class="treeview-indicator fa fa-angle-right"></i>
          </a>
          <ul class="treeview-menu">
          
            <li><a class="treeview-item" href="<?= base_url(); ?>admin/berita/draft"><i class="icon fa fa-circle-o"></i>Draft</a>
            </li>
            <li><a class="treeview-item" href="<?= base_url(); ?>admin/berita/publish"><i class="icon fa fa-circle-o"></i>Publish</a>
            <li><a class="treeview-item" href="<?= base_url(); ?>admin/berita/unpublish"><i class="icon fa fa-circle-o"></i>Unpublish</a>
            </li>
         
          </ul>
        </li>-->

        <li class="treeview">
          <a class="app-menu__item" href="<?= base_url(); ?>admin/#" data-toggle="treeview"><i class="app-menu__icon fa fa-photo"></i><span class="app-menu__label">Menu Utama</span><i class="treeview-indicator fa fa-angle-right"></i>
          </a>
          <ul class="treeview-menu">
          
            <li><a class="treeview-item" href="<?= base_url(); ?>admin/slider"><i class="icon fa fa-circle-o"></i>Slider</a>
            </li>
            <li><a class="treeview-item" href="<?= base_url(); ?>admin/jurusan"><i class="icon fa fa-circle-o"></i>Jenjang Pendidikan</a>
            </li>
            <li><a class="treeview-item" href="<?= base_url(); ?>admin/testimoni"><i class="icon fa fa-circle-o"></i>Testimoni</a>
            </li> 
         
          </ul>
        </li>

        <li class="treeview">
          <a class="app-menu__item" href="<?= base_url(); ?>admin/#" data-toggle="treeview"><i class="app-menu__icon fa fa-briefcase"></i><span class="app-menu__label">PPDB</span><i class="treeview-indicator fa fa-angle-right"></i>
          </a>
          <ul class="treeview-menu">
          
            <li><a class="treeview-item" href="<?= base_url(); ?>admin/brosur"><i class="icon fa fa-circle-o"></i>Brosur</a>
            </li>
         
          </ul>
        </li>

        <li class="treeview">
          <a class="app-menu__item" href="<?= base_url(); ?>admin/#" data-toggle="treeview"><i class="app-menu__icon fa fa-cogs"></i><span class="app-menu__label">Pengaturan</span><i class="treeview-indicator fa fa-angle-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?= base_url(); ?>admin/kepalasekolah"><i class="icon fa fa-circle-o"></i> Tentang Kami</a></li>
            <li><a class="treeview-item" href="<?= base_url(); ?>admin/identitas"><i class="icon fa fa-circle-o"></i> Identitas Sekolah</a></li>
          </ul>
        </li>
      <?php
        }
      ?>

        <li><a class="app-menu__item" href="<?= base_url() ?>login/logout"><i class="app-menu__icon fa fa-sign-out"></i><span class="app-menu__label">Logout</span></a></li>
      </ul>
    </aside>