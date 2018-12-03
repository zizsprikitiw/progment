<?php $this->load->view('layout/header'); ?>
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="<?php echo site_url(); ?>">
                <img src="<?php echo base_url($this->config->item('assets')['custom_img']); ?>/logo-big.png" alt="" /> </a>
				<h3 class="font-white uppercase">Program Management Pustekbang</h3>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
			<?php echo $message; ?>
			<form class="login-form" id="loginform" name="loginform" action="login" method="post" accept-charset="utf-8">
                <h3 class="form-title font-green"><?php echo lang('login_heading');?></h3>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> <?php echo lang('login_subheading');?> </span>
                </div>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9"><?php echo lang('login_identity_label');?></label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username"  id="identity" name="identity" value="<?php $this->form_validation->set_value('identity'); ?>" /> </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" id="password" name="password" /> </div>
                <div class="form-actions">
                    <button type="submit" class="btn green uppercase"><?php echo lang('login_submit_btn');?></button>
                </div>
            </form>
            <!-- END LOGIN FORM -->
        </div>
        <div class="copyright"> 2018 © Program Management Pustekbang </div>
<?php $this->load->view('layout/footer'); ?>	