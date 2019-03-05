<?php $this->load->view('layout/header'); ?>
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title"> <?php echo $user_menu['page_title'] ?> </h1>
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        <!-- BEGIN DASHBOARD STATS 1-->
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                                    <div class="visual">
                                        <i class="fa fa-bar-chart-o"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number" id="avg_progress">
                                            <span data-counter="counterup" data-value="0">0</span>%
                                        </div>
                                        <div class="desc"> Percentage of Tasks Progress </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                                    <div class="visual">
                                        <i class="fa fa-tasks"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number" id="count_tasks">
                                            <span data-counter="counterup" data-value="0">0</span>/10
										</div>
                                        <div class="desc"> Tasks Completed </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                                    <div class="visual">
                                        <i class="fa fa-users"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number" id="count_member">
                                            <span data-counter="counterup" data-value="0">0</span>
                                        </div>
                                        <div class="desc"> Member </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                                    <div class="visual">
                                        <i class="fa fa-briefcase"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number" id="count_wp">
                                            <span data-counter="counterup" data-value="0"></span> </div>
                                        <div class="desc"> Work Package </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <!-- END DASHBOARD STATS 1-->
                        <div class="row" id="sortable_portlets">
                            <div class="col-lg-6 col-xs-12 col-sm-12 column sortable">
                                <!-- BEGIN PORTLET-->
                                <div class="portlet portlet-sortable light tasks-widget bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-share font-dark hide"></i>
                                            <span class="caption-subject font-dark bold uppercase">Tasks</span>
                                            <span class="caption-helper" id="tasks_caption"></span>
                                        </div>
                                        <div class="actions">
                                            <div class="btn-group">
                                                <a class="btn btn-sm blue btn-outline btn-circle" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Modul
                                                    <i class="fa fa-angle-down"></i>
                                                </a>
                                                <ul class="dropdown-menu pull-right" id="filter_modul"></ul>
                                            </div>
											<?php $is_admin = $this->cms_model->user_is_admin(); 
											if($is_admin){ ?>
											<div class="btn-group">
												<a class="btn btn-sm blue btn-circle" href="javascript:;" onClick="loadFormAddTask()" > 
													<i class="fa fa-plus"></i> Task
                                                </a>
											</div>
											<?php } ?>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <!--<div class="task-content" id="tasks-content">
                                        </div>-->
										<table class="table table-bordered" id="table_task">
											<thead>
												<tr>
													<th>#</th>
													<th>Nama Dokumen</th>
													<th>Status</th>
													<th><i class="fa fa-download"></i></th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
                                    </div>
                                </div>
                                <!-- END PORTLET-->
								
								<!-- BEGIN PORTLET-->
                                <div class="portlet portlet-sortable light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-share font-red-sunglo hide"></i>
                                            <span class="caption-subject font-dark bold uppercase">Drive</span>
											<span class="caption-helper" id="drive_caption"></span>
                                        </div>
										<div class="actions">
                                            <div class="btn-group">
                                                <a class="btn btn-sm blue btn-outline btn-circle" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Modul
                                                    <i class="fa fa-angle-down"></i>
                                                </a>
                                                <ul class="dropdown-menu pull-right" id="filter_modul_drive"></ul>
                                            </div>
											<div class="btn-group">
												<a class="btn btn-sm blue btn-circle" href="javascript:;" onClick="loadFormAttachFileDrive()" > 
													<i class="fa fa-plus"></i> Drive
                                                </a>
											</div>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
										<table class="table table-bordered" id="table_file_drive">
											<thead>
												<tr>
													<th>#</th>
													<th>Nama Dokumen</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
                                    </div>
                                </div>
                                <!-- END PORTLET-->
                                
								<!-- empty sortable porlet required for each columns! -->
                                <div class="portlet portlet-sortable-empty"> </div>
							</div>
                            <div class="col-lg-6 col-xs-12 col-sm-12 column sortable">
								<div class="portlet portlet-sortable light portlet-fit bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-directions font-green hide"></i>
                                            <span class="caption-subject bold font-dark uppercase "> Agenda</span>
                                            <span class="caption-helper"></span>
                                        </div>
										<div class="actions">
                                            <div class="btn-group btn-group-devided">
												<a class="btn btn-sm red btn-circle" href="javascript:;" onClick="loadFormAddAgenda()" > 
													<i class="fa fa-plus"></i> Agenda
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portlet-body" id="timeline-program"></div>
								</div>
								
								<!-- BEGIN PORTLET-->
                                <div class="portlet portlet-sortable light calendar bordered">
                                    <div class="portlet-title ">
                                        <div class="caption">
                                            <i class="icon-calendar font-dark hide"></i>
                                            <span class="caption-subject font-dark bold uppercase">Kalender</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div id="kalender"> </div>
                                    </div>
                                </div>
                                <!-- END PORTLET-->
								
								<!-- BEGIN PORTLET-->
                                <div class="portlet portlet-sortable light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-share font-red-sunglo hide"></i>
                                            <span class="caption-subject font-dark bold uppercase">Struktur Organisasi</span>
                                            <span class="caption-helper"></span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
										<div id="people"></div>
                                    </div>
                                </div>
                                <!-- END PORTLET-->
								<!-- empty sortable porlet required for each columns! -->
                                <div class="portlet portlet-sortable-empty"> </div>
                            </div>
                        </div>
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT --> 
				<!-- Modal BEGIN:ADD TASK-->
				<div id="modalFormAddTask" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<!-- Form starts.  -->
							  <div class="modal-header">			                        
								<h4 class="modal-title">Tambah</h4>
							  </div>
							  <div class="modal-body">									  		 											
									<form class="form-horizontal" role="form" id="add_form_task" action="#" autocomplete="nope">
										<input type="hidden" value="" name="id"/> 		
										<input type="hidden" value="" name="save_method"/> 										
										
										<div class="row">
											<div class="col-md-6">
												<div class="clearfix">
													<label class="control-label" for="nama">Modul</label>
													<select class="form-control" name="modul_id" id="filter_modul_form"></select>
												</div>
												
												<div class="clearfix">
													<label class="control-label" for="nama">Nama Task</label>
													<input type="text" name="nama_task" class="form-control">
												</div>
										  
												<div class="clearfix">
													<label class="control-label" for="nama">Deskripsi</label>
													<textarea class="form-control" name="deskripsi" rows="3"></textarea>							  
												</div>
										  
												<div class="clearfix">
													<label class="control-label" for="nama">Due Date</label>
													<div class="input-group date date-picker" data-date-format="yyyy-mm-dd" today-highlight="true">
														<input type="text" class="form-control" name="due_date" readonly>
														<span class="input-group-btn">
															<button class="btn default" type="button">
																<i class="fa fa-calendar"></i>
															</button>
														</span>
													</div>						  
												</div>
											</div>
											<div class="col-md-6">
												<div class="clearfix">
													<label class="control-label" for="nama">PIC</label>
													<select class="mt-multiselect btn btn-default" name="posisi_pic_id" id="filter_pic"></select>						  
												</div>
										
												<div class="clearfix">
													<label class="control-label" for="nama">AWO/ Approval</label>
													<select class="mt-multiselect btn btn-default" name="posisi_approval_id" id="filter_approval"></select>						  
												</div>
										  
												<div class="clearfix">
													<label class="col-lg-3 control-label" for="nama">Member</label>
													<select class="mt-multiselect btn btn-default" multiple="multiple" name="member_id[]" id="filter_member"></select>						  
												</div>
											</div>
										</div>
									</form>
																
									<div id="modal_message"></div>
									<div class="clearfix"></div>
							  </div>	<!--END modal-body-->
							  <div class="modal-footer">										
								<button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>	
								<button type="button" class="btn green" onClick="saveTask()">Save</button>
							  </div>
						</div>	<!--END modal-content-->
					</div>	<!--END modal-dialog-->
				</div>
				<!-- Modal END:ADD TASK-->
				<!-- Modal BEGIN:ADD AGENDA-->
				<div id="modalFormAddAgenda" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<!-- Form starts.  -->
							  <div class="modal-header">			                        
								<h4 class="modal-title">Tambah</h4>
							  </div>
							  <div class="modal-body">									  		 											
									<form class="form-horizontal" role="form" id="add_form_agenda" action="#" autocomplete="nope">
										<input type="hidden" value="" name="id"/> 	
										<input type="hidden" value="" name="save_method"/> 	

										<div class="form-group">
										  <label class="col-lg-4 control-label" for="nama">Nama Agenda</label>
										  <div class="col-lg-6">
											<input type="text" name="nama_agenda" class="form-control">
										  </div>							  
										</div>		

										<div class="form-group">
										  <label class="col-lg-4 control-label" for="nama">Kategori</label>
										  <div class="col-lg-6">
											<select class="form-control" name="kategori_agenda" id="filter_kategori_agenda"></select>
										  </div>							  
										</div>		

										<div class="form-group">
										  <label class="col-lg-4 control-label" for="nama">Lokasi</label>
										  <div class="col-lg-6">
											<input type="text" name="lokasi" class="form-control">
										  </div>							  
										</div>	

										<div class="form-group">
										  <label class="col-lg-4 control-label" for="nama">Deskripsi</label>
										  <div class="col-lg-6">
											<textarea class="form-control" name="deskripsi" rows="3"></textarea>	
										  </div>							  
										</div>

										<div class="form-group">
											<label class="col-lg-4 control-label" for="tanggal">Tanggal</label>
											<div class="col-lg-6">
												<div class="input-group">
													<input type="text" class="form-control" name="from" id="from" readonly >
													<span class="input-group-addon"> to </span>
													<input type="text" class="form-control" name="to" id="to" readonly >
												</div>
												<!-- /input-group -->
											</div>
										</div>	
										<div class="form-group">
										  <label class="col-lg-4 control-label" for="nama">Member</label>
										  <div class="col-lg-6">
											<select class="mt-multiselect btn btn-default" multiple="multiple" name="member_agenda[]" id="filter_member_agenda"></select>
										  </div>							  
										</div>		
									</form>
																
									<div id="modal_message"></div>
									<div class="clearfix"></div>
							  </div>	<!--END modal-body-->
							  <div class="modal-footer">										
								<button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>	
								<button type="button" class="btn green" onClick="saveAgenda()">Save</button>
							  </div>
						</div>	<!--END modal-content-->
					</div>	<!--END modal-dialog-->
				</div>
				<!-- Modal END:ADD AGENDA-->
				<!-- Modal BEGIN:DETAIL AGENDA-->
				<div id="modalDetailAgenda" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<!-- Form starts.  -->
							  <div class="modal-header">			                        
								<h4 class="modal-title">Detail</h4>
							  </div>
							  <div class="modal-body">	
									<div><b>Hari, Tanggal:</b> <span id="tanggal_agenda"></span></div>
									<div><b>Lokasi:</b> <span id="lokasi_agenda"></span></div>
									<div><b>Deskripsi:</b> <span id="deskripsi_agenda"></span></div>
									<hr>
									<table class="table table-bordered table-hover" id="table_file_detail_agenda">
										<thead class="bg-red bg-font-red">
											<tr>
												<th> # </th>
												<th> Jenis File </th>
												<th> File </th>
												<th> Tanggal </th>
												<th> Aksi </th>
											</tr>
										</thead>
									</table>
							  </div>	<!--END modal-body-->
							  <div class="modal-footer">										
								<button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>								
							  </div>
						</div>	<!--END modal-content-->
					</div>	<!--END modal-dialog-->
				</div>
				<!-- Modal END:DETAIL AGENDA-->
				<!-- Modal BEGIN:ATTACH FILE AGENDA-->
				<div id="modalFormAttachFileAgenda" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<!-- Form starts.  -->
							  <div class="modal-header">			                        
								<h4 class="modal-title">Tambah</h4>
							  </div>
							  <div class="modal-body">									  		 											
									<form class="form-horizontal" role="form" id="add_form_file_agenda" action="#" autocomplete="nope"  enctype="multipart/form-data">
										<input type="hidden" value="" name="id"/> 							
										<input type="hidden" value="" name="agenda_id"/> 							
										
										<div class="form-group">
										  <label class="col-lg-3 control-label" for="nama">Jenis File</label>
										  <div class="col-lg-5">
											<select name="jenis_file_agenda" id="jenis_file_agenda" class="form-control">
												<option value="1" >MOM</option>
												<option value="2" >Absensi</option>
												<option value="3" >Lainnya</option>
											</select>
										  </div>							  
										</div>
										
										<div class="form-group">
										  <label class="col-lg-3 control-label" for="singkatan">File</label>
										  <div class="col-lg-9">
											<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="input-group input-large">
													<div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
														<i class="fa fa-file fileinput-exists"></i>&nbsp;
														<span class="fileinput-filename"> </span>
													</div>
													<span class="input-group-addon btn default btn-file">
														<span class="fileinput-new"> Select file </span>
														<span class="fileinput-exists"> Change </span>
														<input type="file" name="filename" id="filename"> </span>
													<a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
												</div>
											</div>
											<div class="clearfix margin-top-10">
												<span class="label label-success">NOTE!</span> <b>File support:</b> <i><?php echo $this->config->item('files')['doc_file_type']; ?>.</i>
											</div>
										  </div>							  
										</div> 
										
										<div class="form-group">
											<div class="col-lg-9 col-lg-offset-3">
												<button type="button" class="btn btn-outline red" onClick="saveFileAgenda()">Tambah</button>
											</div>
										</div>
									</form>
																
									<div id="modal_message"></div>
									<div class="clearfix"></div>
										<table class="table table-bordered table-hover" id="table_file_agenda">
											<thead class="bg-red bg-font-red">
												<tr>
													<th> # </th>
													<th> Jenis File </th>
													<th> File </th>
													<th> Tanggal </th>
													<th> Aksi </th>
												</tr>
											</thead>
										</table>
							  </div>	<!--END modal-body-->
							  <div class="modal-footer">										
								<button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>								
							  </div>
						</div>	<!--END modal-content-->
					</div>	<!--END modal-dialog-->
				</div>
				<!-- Modal END:ATTACH FILE AGENDA-->
				<!-- Modal BEGIN:ATTACH FILE DRIVE-->
				<div id="modalFormAttachFileDrive" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<!-- Form starts.  -->
							  <div class="modal-header">			                        
								<h4 class="modal-title">Tambah</h4>
							  </div>
							  <div class="modal-body">									  		 											
									<form class="form-horizontal" role="form" id="add_form_file_drive" action="#" autocomplete="nope"  enctype="multipart/form-data">
										<input type="hidden" value="" name="id"/> 							
										<input type="hidden" value="" name="modul_id"/> 							
										
										<div class="form-group">
										  <label class="col-lg-3 control-label" for="nama">Modul</label>
										  <div class="col-lg-5">
											<select name="modul_id" id="filter_modul_drive_form" class="form-control"></select>
										  </div>							  
										</div>
										
										<div class="form-group">
										  <label class="col-lg-3 control-label" for="nama">Nama Dokumen</label>
										  <div class="col-lg-5">
											<input type="text" name="nama_dokumen" class="form-control">
										  </div>							  
										</div>	
										
										<div class="form-group">
										  <label class="col-lg-3 control-label" for="singkatan">File</label>
										  <div class="col-lg-9">
											<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="input-group input-large">
													<div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
														<i class="fa fa-file fileinput-exists"></i>&nbsp;
														<span class="fileinput-filename"> </span>
													</div>
													<span class="input-group-addon btn default btn-file">
														<span class="fileinput-new"> Select file </span>
														<span class="fileinput-exists"> Change </span>
														<input type="file" name="filename" id="filename"> </span>
													<a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
												</div>
											</div>
											<div class="clearfix margin-top-10">
												<span class="label label-success">NOTE!</span> <b>File support:</b> <i><?php echo $this->config->item('files')['doc_file_type']; ?>.</i>
											</div>
										  </div>							  
										</div> 
									</form>
																
									<div id="modal_message"></div>
							  </div>	<!--END modal-body-->
							  <div class="modal-footer">										
								<button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>		
								<button type="button" class="btn green" onClick="saveFileDrive()">Upload</button>								
							  </div>
						</div>	<!--END modal-content-->
					</div>	<!--END modal-dialog-->
				</div>
				<!-- Modal END:ATTACH FILE DRIVE-->
				<!-- Modal BEGIN:DELETE DATA-->										
				<div id="modalDeleteForm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">									
							<!-- Form starts.  -->	
							<form class="form-horizontal" role="form" id="delete_form" action="#">
							  <div class="modal-header">			                        
								<h4 class="modal-title">Hapus</h4>
							  </div>
							  <div class="modal-body">
									<input type="hidden" value="" name="id_delete_data"/> 																					
									<div class="form-group" align="center">
										<div class="col-lg-12">
											<div id="delete_text"></div>																	  
										</div>																							
									</div> 
									<div class="form-group" align="center">
										<div class="col-lg-12">
											<b >Anda yakin ?!</b>	
										</div>	
									</div> 
									 <div id="modal_delete_message"></div>
							  </div>	<!--END modal-body-->
							  <div class="modal-footer">										
								<button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>	
								<button type="button" id="btnDelete" onClick="data_delete('','')" class="btn btn-sm btn-success">Hapus</button>								
							  </div>
						  </form>
						</div>	<!--END modal-content-->
					</div>	<!--END modal-dialog-->
				</div>
				<!-- Modal END:DELETE DATA-->	
				<!-- Modal BEGIN:DELETE DATA DRIVE-->										
				<div id="modalDeleteDriveForm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">									
							<!-- Form starts.  -->	
							<form class="form-horizontal" role="form" id="delete_drive_form" action="#">
							  <div class="modal-header">			                        
								<h4 class="modal-title">Hapus</h4>
							  </div>
							  <div class="modal-body">
									<input type="hidden" value="" name="id_delete_data"/> 																					
									<div class="form-group" align="center">
										<div class="col-lg-12">
											<div id="delete_text"></div>																	  
										</div>																							
									</div> 
									<div class="form-group" align="center">
										<div class="col-lg-12">
											<b >Anda yakin ?!</b>	
										</div>	
									</div> 
									 <div id="modal_delete_message"></div>
							  </div>	<!--END modal-body-->
							  <div class="modal-footer">										
								<button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>	
								<button type="button" id="btnDelete" onClick="data_delete_drive('','')" class="btn btn-sm btn-success">Hapus</button>								
							  </div>
						  </form>
						</div>	<!--END modal-content-->
					</div>	<!--END modal-dialog-->
				</div>
				<!-- Modal END:DELETE DATA DRIVE-->				
	<?php $this->load->view('layout/quick_sidebar'); ?>	
<?php $this->load->view('layout/footer'); ?>	