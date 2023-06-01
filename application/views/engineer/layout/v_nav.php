<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="<?= base_url() ?>admin/dashboard">PT. Ditek Jaya <br><p>Analytical and Measuring Instrument</p></a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i> <?= $getengineer->name_engineer ?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="<?= base_url() ?>login/logout">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li class="<?php if($this->uri->segment(2)=="dashboard"){ echo "active" ;}?>"><a href="<?= base_url() ?>engineer/dashboard"><i class="icon-dashboard"></i><span>Home</span> </a> </li>
        <li class="<?php if($this->uri->segment(2)=="job"){ echo "active" ;}?>"><a href="<?php echo base_url() ?>engineer/job"><i class="icon-suitcase"></i><span>Job</span> </a> </li>
      </ul>
    </div>
  </div>
</div>