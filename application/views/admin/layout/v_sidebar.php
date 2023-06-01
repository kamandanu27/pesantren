
  <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?= base_url() ?>public/image/upload/gurustaf/<?= $this->session->userdata('foto_user'); ?>" alt="User Image" style="width: 50px; heigth: 75px;">
        <div>
          <p class="app-sidebar__user-name"><?= $this->session->userdata('name_user'); ?></p>
          <p class="app-sidebar__user-designation"><?= $this->session->userdata('level_user'); ?></p>
        </div>
      </div>
      <ul class="app-menu">


      <?php
        if($this->session->userdata('level_user') == 'Admin'){
      ?>

        <li class="treeview">
          <a class="app-menu__item" href="<?= base_url(); ?>admin/#" data-toggle="treeview"><i class="app-menu__icon fa fa-cogs"></i><span class="app-menu__label">Pengaturan</span><i class="treeview-indicator fa fa-angle-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?= base_url(); ?>admin/identitas"><i class="icon fa fa-circle-o"></i> Identitas Sekolah</a></li>
          </ul>
        </li>
      <?php
        }
      ?>

        <li><a class="app-menu__item" href="<?= base_url() ?>login/logout"><i class="app-menu__icon fa fa-sign-out"></i><span class="app-menu__label">Logout</span></a></li>
      </ul>
    </aside>