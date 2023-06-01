    <div class="container" style="min-height: 480px;">
      <div class="row">
        <div class="span12">
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Today's Stats</h3>
            </div>
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content">
                  <div id="big_stats" class="cf">

                    <div class="stat">
                      <a href="<?= base_url()?>engineer/job/status/open" style="text-decoration:none;">
                        <h4>Ready to be Open Job</h4> 
                        <i class="icon-bullhorn" style="color: rgb(23, 127, 212)"></i>
                        <span class="value"><?php echo $j_jobopen ?></span>
                      </a>
                    </div>

                    <div class="stat">
                      <a href="<?= base_url()?>engineer/job/status/continue" style="text-decoration:none;">
                        <h4>On Process Job</h4> 
                        <i class="icon-dashboard" style="color: rgb(23, 127, 212)"></i> 
                        <span class="value"><?php echo $j_jobcontinue ?></span>
                      </a>
                    </div>

                    <div class="stat">
                      <a href="<?= base_url()?>engineer/job/status/finish" style="text-decoration:none;">
                        <h4>List Job Finish</h4> 
                        <i class="icon-thumbs-up" style="color: rgb(23, 127, 212)"></i> 
                        <span class="value"><?php echo $j_jobfinish ?></span> 
                      </a>
                    </div>

                    <div class="stat">
                      <a href="<?= base_url()?>engineer/job/status/close" style="text-decoration:none;">
                        <h4>List Job Close</h4> 
                        <i class="icon-ok" style="color: rgb(23, 127, 212)"></i> 
                        <span class="value"><?php echo $j_jobclose ?></span> 
                      </a>
                    </div>

                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>