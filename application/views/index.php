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
                                        <i class="fa fa-comments"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="45">0</span>%
                                        </div>
                                        <div class="desc"> Percentage of Tasks Progress </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                                    <div class="visual">
                                        <i class="fa fa-bar-chart-o"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="6">0</span>/10 </div>
                                        <div class="desc"> Tasks Completed </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                                    <div class="visual">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number" id="count_member">
                                            <span data-counter="counterup" data-value="26">0</span>
                                        </div>
                                        <div class="desc"> Member </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                                    <div class="visual">
                                        <i class="fa fa-globe"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number" id="count_wp">
                                            <span data-counter="counterup" data-value="5"></span> </div>
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
                                            <span class="caption-helper">Dokumen Program LSU-05</span>
                                        </div>
                                        <div class="actions">
                                            <div class="btn-group">
                                                <a class="btn blue-oleo btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> More
                                                    <i class="fa fa-angle-down"></i>
                                                </a>
                                                <ul class="dropdown-menu pull-right">
                                                    <li>
                                                        <a href="javascript:;"> All Project </a>
                                                    </li>
                                                    <li class="divider"> </li>
                                                    <li>
                                                        <a href="javascript:;"> AirAsia </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;"> Cruise </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;"> HSBC </a>
                                                    </li>
                                                    <li class="divider"> </li>
                                                    <li>
                                                        <a href="javascript:;"> Pending
                                                            <span class="badge badge-danger"> 4 </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;"> Completed
                                                            <span class="badge badge-success"> 12 </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;"> Overdue
                                                            <span class="badge badge-warning"> 9 </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="task-content">
                                            <div class="scroller" style="height: 400px;" data-always-visible="1" data-rail-visible1="1">
                                                <!-- START TASK LIST -->
                                                <ul class="task-list">
                                                    <li>
                                                        <div class="task-checkbox">
                                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                <input type="checkbox" class="checkboxes" value="1" />
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <div class="task-title">
                                                            <span class="task-title-sp"> Present 2013 Year IPO Statistics at Board Meeting </span>
                                                            <span class="label label-sm label-success">Company</span>
                                                            <span class="task-bell">
                                                                <i class="fa fa-bell-o"></i>
                                                            </span>
                                                        </div>
                                                        <div class="task-config">
                                                            <div class="task-config-btn btn-group">
                                                                <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                                    <i class="fa fa-cog"></i>
                                                                    <i class="fa fa-angle-down"></i>
                                                                </a>
                                                                <ul class="dropdown-menu pull-right">
                                                                    <li>
                                                                        <a href="javascript:;">
                                                                            <i class="fa fa-check"></i> Complete </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:;">
                                                                            <i class="fa fa-pencil"></i> Edit </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:;">
                                                                            <i class="fa fa-trash-o"></i> Cancel </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="task-checkbox">
                                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                <input type="checkbox" class="checkboxes" value="1" />
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <div class="task-title">
                                                            <span class="task-title-sp"> Hold An Interview for Marketing Manager Position </span>
                                                            <span class="label label-sm label-danger">Marketing</span>
                                                        </div>
                                                        <div class="task-config">
                                                            <div class="task-config-btn btn-group">
                                                                <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                                    <i class="fa fa-cog"></i>
                                                                    <i class="fa fa-angle-down"></i>
                                                                </a>
                                                                <ul class="dropdown-menu pull-right">
                                                                    <li>
                                                                        <a href="javascript:;">
                                                                            <i class="fa fa-check"></i> Complete </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:;">
                                                                            <i class="fa fa-pencil"></i> Edit </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:;">
                                                                            <i class="fa fa-trash-o"></i> Cancel </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="task-checkbox">
                                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                <input type="checkbox" class="checkboxes" value="1" />
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <div class="task-title">
                                                            <span class="task-title-sp"> AirAsia Intranet System Project Internal Meeting </span>
                                                            <span class="label label-sm label-success">AirAsia</span>
                                                            <span class="task-bell">
                                                                <i class="fa fa-bell-o"></i>
                                                            </span>
                                                        </div>
                                                        <div class="task-config">
                                                            <div class="task-config-btn btn-group">
                                                                <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                                    <i class="fa fa-cog"></i>
                                                                    <i class="fa fa-angle-down"></i>
                                                                </a>
                                                                <ul class="dropdown-menu pull-right">
                                                                    <li>
                                                                        <a href="javascript:;">
                                                                            <i class="fa fa-check"></i> Complete </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:;">
                                                                            <i class="fa fa-pencil"></i> Edit </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:;">
                                                                            <i class="fa fa-trash-o"></i> Cancel </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="task-checkbox">
                                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                <input type="checkbox" class="checkboxes" value="1" />
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <div class="task-title">
                                                            <span class="task-title-sp"> Technical Management Meeting </span>
                                                            <span class="label label-sm label-warning">Company</span>
                                                        </div>
                                                        <div class="task-config">
                                                            <div class="task-config-btn btn-group">
                                                                <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                                    <i class="fa fa-cog"></i>
                                                                    <i class="fa fa-angle-down"></i>
                                                                </a>
                                                                <ul class="dropdown-menu pull-right">
                                                                    <li>
                                                                        <a href="javascript:;">
                                                                            <i class="fa fa-check"></i> Complete </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:;">
                                                                            <i class="fa fa-pencil"></i> Edit </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:;">
                                                                            <i class="fa fa-trash-o"></i> Cancel </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="task-checkbox">
                                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                <input type="checkbox" class="checkboxes" value="1" />
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <div class="task-title">
                                                            <span class="task-title-sp"> Kick-off Company CRM Mobile App Development </span>
                                                            <span class="label label-sm label-info">Internal Products</span>
                                                        </div>
                                                        <div class="task-config">
                                                            <div class="task-config-btn btn-group">
                                                                <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                                    <i class="fa fa-cog"></i>
                                                                    <i class="fa fa-angle-down"></i>
                                                                </a>
                                                                <ul class="dropdown-menu pull-right">
                                                                    <li>
                                                                        <a href="javascript:;">
                                                                            <i class="fa fa-check"></i> Complete </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:;">
                                                                            <i class="fa fa-pencil"></i> Edit </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:;">
                                                                            <i class="fa fa-trash-o"></i> Cancel </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="task-checkbox">
                                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                <input type="checkbox" class="checkboxes" value="1" />
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <div class="task-title">
                                                            <span class="task-title-sp"> Prepare Commercial Offer For SmartVision Website Rewamp </span>
                                                            <span class="label label-sm label-danger">SmartVision</span>
                                                        </div>
                                                        <div class="task-config">
                                                            <div class="task-config-btn btn-group">
                                                                <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                                    <i class="fa fa-cog"></i>
                                                                    <i class="fa fa-angle-down"></i>
                                                                </a>
                                                                <ul class="dropdown-menu pull-right">
                                                                    <li>
                                                                        <a href="javascript:;">
                                                                            <i class="fa fa-check"></i> Complete </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:;">
                                                                            <i class="fa fa-pencil"></i> Edit </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:;">
                                                                            <i class="fa fa-trash-o"></i> Cancel </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="task-checkbox">
                                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                <input type="checkbox" class="checkboxes" value="1" />
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <div class="task-title">
                                                            <span class="task-title-sp"> Sign-Off The Comercial Agreement With AutoSmart </span>
                                                            <span class="label label-sm label-default">AutoSmart</span>
                                                            <span class="task-bell">
                                                                <i class="fa fa-bell-o"></i>
                                                            </span>
                                                        </div>
                                                        <div class="task-config">
                                                            <div class="task-config-btn btn-group dropup">
                                                                <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                                    <i class="fa fa-cog"></i>
                                                                    <i class="fa fa-angle-down"></i>
                                                                </a>
                                                                <ul class="dropdown-menu pull-right">
                                                                    <li>
                                                                        <a href="javascript:;">
                                                                            <i class="fa fa-check"></i> Complete </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:;">
                                                                            <i class="fa fa-pencil"></i> Edit </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:;">
                                                                            <i class="fa fa-trash-o"></i> Cancel </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="task-checkbox">
                                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                <input type="checkbox" class="checkboxes" value="1" />
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <div class="task-title">
                                                            <span class="task-title-sp"> Company Staff Meeting </span>
                                                            <span class="label label-sm label-success">Cruise</span>
                                                            <span class="task-bell">
                                                                <i class="fa fa-bell-o"></i>
                                                            </span>
                                                        </div>
                                                        <div class="task-config">
                                                            <div class="task-config-btn btn-group dropup">
                                                                <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                                    <i class="fa fa-cog"></i>
                                                                    <i class="fa fa-angle-down"></i>
                                                                </a>
                                                                <ul class="dropdown-menu pull-right">
                                                                    <li>
                                                                        <a href="javascript:;">
                                                                            <i class="fa fa-check"></i> Complete </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:;">
                                                                            <i class="fa fa-pencil"></i> Edit </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:;">
                                                                            <i class="fa fa-trash-o"></i> Cancel </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="last-line">
                                                        <div class="task-checkbox">
                                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                <input type="checkbox" class="checkboxes" value="1" />
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <div class="task-title">
                                                            <span class="task-title-sp"> KeenThemes Investment Discussion </span>
                                                            <span class="label label-sm label-warning">KeenThemes </span>
                                                        </div>
                                                        <div class="task-config">
                                                            <div class="task-config-btn btn-group dropup">
                                                                <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                                    <i class="fa fa-cog"></i>
                                                                    <i class="fa fa-angle-down"></i>
                                                                </a>
                                                                <ul class="dropdown-menu pull-right">
                                                                    <li>
                                                                        <a href="javascript:;">
                                                                            <i class="fa fa-check"></i> Complete </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:;">
                                                                            <i class="fa fa-pencil"></i> Edit </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:;">
                                                                            <i class="fa fa-trash-o"></i> Cancel </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <!-- END START TASK LIST -->
                                            </div>
                                        </div>
                                        <div class="task-footer">
                                            <div class="btn-arrow-link pull-right">
                                                <a href="javascript:;">See All Records</a>
                                                <i class="icon-arrow-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END PORTLET-->
								<!-- BEGIN PORTLET-->
                                <div class="portlet portlet-sortable light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-share font-red-sunglo hide"></i>
                                            <span class="caption-subject font-dark bold uppercase">Struktur Organisasi</span>
                                            <span class="caption-helper">Program LSU-05</span>
                                        </div>
                                        <div class="actions">
                                            <div class="btn-group">
                                                <a href="" class="btn dark btn-outline btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Filter Range
                                                    <span class="fa fa-angle-down"> </span>
                                                </a>
                                                <ul class="dropdown-menu pull-right">
                                                    <li>
                                                        <a href="javascript:;"> Q1 2014
                                                            <span class="label label-sm label-default"> past </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;"> Q2 2014
                                                            <span class="label label-sm label-default"> past </span>
                                                        </a>
                                                    </li>
                                                    <li class="active">
                                                        <a href="javascript:;"> Q3 2014
                                                            <span class="label label-sm label-success"> current </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;"> Q4 2014
                                                            <span class="label label-sm label-warning"> upcoming </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
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
                            <div class="col-lg-6 col-xs-12 col-sm-12 column sortable">
								<div class="portlet portlet-sortable light portlet-fit bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-directions font-green hide"></i>
                                            <span class="caption-subject bold font-dark uppercase "> Agenda</span>
                                            <span class="caption-helper">Program LSU-05</span>
                                        </div>
                                        <div class="actions">
                                            <div class="btn-group">
                                                <a class="btn blue btn-outline btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Actions
                                                    <i class="fa fa-angle-down"></i>
                                                </a>
                                                <ul class="dropdown-menu pull-right">
                                                    <li>
                                                        <a href="javascript:;"> Action 1</a>
                                                    </li>
                                                    <li class="divider"> </li>
                                                    <li>
                                                        <a href="javascript:;">Action 2</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">Action 3</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">Action 4</a>
                                                    </li>
                                                </ul>
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
								<!-- empty sortable porlet required for each columns! -->
                                <div class="portlet portlet-sortable-empty"> </div>
                            </div>
                        </div>
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT --> 
	<?php $this->load->view('layout/quick_sidebar'); ?>	
<?php $this->load->view('layout/footer'); ?>	