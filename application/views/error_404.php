<?php $this->load->view('layout/header'); ?>
				<!-- BEGIN CONTENT -->		
                <div class="row">
					<div class="col-md-12 page-404">
						<div class="number font-red"> 404 </div>
						<div class="details">
							<h3>Oops! You're lost.</h3>
							<p> We can not find the page you're looking for.
								<br/>
								<a href="<?php echo site_url();?>"> Return home </a>. </p>
						</div>
					</div>
				</div>
                <!-- END CONTENT -->
<?php $this->load->view('layout/footer'); ?>
