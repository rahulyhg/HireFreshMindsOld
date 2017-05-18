<?php
	session_start();
	if(isset($_SESSION['login_user'])){
		if($_SESSION['login_user'] != 0){
			session_destroy();
			$_SESSION['login_user']= ''; // Devalidating Session
			header("location: /HFM");
		}
	}else{
		session_destroy();
		header("location: /HFM");
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - Student</title>

	
    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Hire Fresh Minds</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="dashboard.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
						<li>
                            <a href="#" onclick="populateDiscover();" data-toggle="button"><i class="fa fa-files-o fa-fw"></i> Discover<span class="fa fa-arrow-right" style="float:right"></span></a>
                        </li>
						<li>
                            <a href="#" id="profileToggle" onclick="populateStudentProfile();" data-toggle="button"><i class="fa fa-files-o fa-fw"></i> My Profile<span class="fa fa-arrow-right" style="float:right"></span></a>
                        </li>
						<li>
                            <a href="#" onclick="populateJobs();" data-toggle="button"><i class="fa fa-files-o fa-fw"></i> Jobs<span class="fa fa-arrow-right" style="float:right"></span></a>
                        </li>
						<li>
                            <a href="#" onclick="populateMentoring();" data-toggle="button"><i class="fa fa-wrench fa-fw"></i> Mentoring<span class="fa fa-arrow-right" style="float:right"></span></a>
                        </li>
						<li>
                            <a href="#" onclick="populateCourses();" data-toggle="button"><i class="fa fa-wrench fa-fw"></i> Courses<span class="fa fa-arrow-right" style="float:right"></span></a>
                        </li>
						<li>
                            <a href="#" onclick="populateConnections();" data-toggle="button"><i class="fa fa-wrench fa-fw"></i> Connections<span class="fa fa-arrow-right" style="float:right"></span></a>
                        </li>
						<li>
                            <a href="#" onclick="populateTaskList();" data-toggle="button"><i class="fa fa-user fa-fw"></i> Task List<span class="fa fa-arrow-right" style="float:right"></span></a>
                        </li>
						<li>
                            <a href="#" onclick="populateCompanies();" data-toggle="button"><i class="fa fa-wrench fa-fw"></i> Companies<span class="fa fa-arrow-right" style="float:right"></span></a>
                        </li>
						<li>
                            <a href="#" onclick="populateAssessments();" data-toggle="button"><i class="fa fa-wrench fa-fw"></i> Assessments<span class="fa fa-arrow-right" style="float:right"></span></a>
                        </li>
						<li>
                            <a href="#" onclick="populateKnowledgeLibrary();" data-toggle="button"><i class="fa fa-wrench fa-fw"></i> Knowledge Library<span class="fa fa-arrow-right" style="float:right"></span></a>
                        </li>
						<li>
                            <a href="#" onclick="populateQA();" data-toggle="button"><i class="fa fa-wrench fa-fw"></i> Q/A<span class="fa fa-arrow-right" style="float:right"></span></a>
                        </li>
						<li>
                            <a href="#" onclick="populateInvite();" data-toggle="button"><i class="fa fa-wrench fa-fw"></i> Invite<span class="fa fa-arrow-right" style="float:right"></span></a>
                        </li>
						<!-- May need this in future
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Events<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="panels-wells.html">Panels and Wells</a>
                                </li>
                                <li>
                                    <a href="buttons.html">Buttons</a>
                                </li>
                                <li>
                                    <a href="notifications.html">Notifications</a>
                                </li>
                                <li>
                                    <a href="typography.html">Typography</a>
                                </li>
                                <li>
                                    <a href="icons.html"> Icons</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grid</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level --
                        </li>
						-->
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
			<div id="container">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">Dashboard</h1>
					</div>
					<!-- /.col-lg-12 -->
				</div>
				<!-- /.row -->
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-users fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge">26</div>
										<div>Matching Jobs</div>
									</div>
								</div>
							</div>
							<a href="#">
								<div class="panel-footer">
									<span class="pull-left">Views Details</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="panel panel-green">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-wpforms fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge">12</div>
										<div>Applied Jobs</div>
									</div>
								</div>
							</div>
							<a href="#">
								<div class="panel-footer">
									<span class="pull-left">View Details</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="panel panel-yellow">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-graduation-cap fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge">124</div>
										<div>Saved Jobs</div>
									</div>
								</div>
							</div>
							<a href="#">
								<div class="panel-footer">
									<span class="pull-left">View Details</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="panel panel-red">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-connectdevelop fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge">13</div>
										<div>Connections</div>
									</div>
								</div>
							</div>
							<a href="#">
								<div class="panel-footer">
									<span class="pull-left">View Details</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>
				</div>
				<!-- /.row -->
				
				<!-- /.row -->
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="panel panel-info">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-university fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge">26</div>
										<div>Alumni</div>
									</div>
								</div>
							</div>
							<a href="#">
								<div class="panel-footer">
									<span class="pull-left">Views Details</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="panel panel-warning">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-users fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge">12</div>
										<div>Employers</div>
									</div>
								</div>
							</div>
							<a href="#">
								<div class="panel-footer">
									<span class="pull-left">View Details</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="panel panel-danger">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-space-shuttle fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge">124</div>
										<div>Jobs</div>
									</div>
								</div>
							</div>
							<a href="#">
								<div class="panel-footer">
									<span class="pull-left">View Details</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-support fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge">13</div>
										<div>Job Applications</div>
									</div>
								</div>
							</div>
							<a href="#">
								<div class="panel-footer">
									<span class="pull-left">View Details</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>
				</div>
				<!-- /.row -->
				
				<!-- Add notice item Modal -->
				<div id="myModal" class="modal fade" role="dialog">
				  <div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
					  <div class="modal-header" style="background-color: darkgray;">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Add new Noticeboard item</h4>
					  </div>
					  <div class="modal-body" id="modalBody">
						<form>
						<div class="form-group row">
						  <label for="noticeTitle" class="col-2 col-form-label">Title</label>
						  <div class="col-8">
							<input class="form-control" type="text" placeholder="Notice title" id="noticeTitle">
						  </div>
						</div>
						<div class="form-group row">
						  <label for="noticeDesc" class="col-2 col-form-label">Description</label>
						  <div class="col-10">
							<input class="form-control" type="text" placeholder="Description" id="noticeDesc">
						  </div>
						</div>
					
						<div class="form-group row">
						  <label for="noticeDate" class="col-2 col-form-label">Date</label>
						  <div class="col-10">
							<input class="form-control" type="date" id="noticeDate">
						  </div>
						</div>
						<div class="form-group row">
						  <label for="noticeTime" class="col-2 col-form-label">Time</label>
						  <div class="col-10">
							<input class="form-control" type="time" value="13:45:00" id="noticeTime">
						  </div>
						</div>
						</form>
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default" id="addNotice" onclick="addNoticeItem();">Submit</button>
						<button type="button" class="btn btn-default" id="closeNotice" data-dismiss="modal">Close</button>
					  </div>
					</div>

				  </div>
				</div>
				<!-- ./Add notice item Modal -->
				
				<!-- Edit notice item Modal -->
				<div id="editModal" class="modal fade" role="dialog">
				  <div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
					  <div class="modal-header" style="background-color: darkgray;">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Add new Noticeboard item</h4>
					  </div>
					  <div class="modal-body" id="editModalBody">
						<form>
						<div class="form-group row">
						  <label for="editNoticeTitle" class="col-2 col-form-label">Title</label>
						  <div class="col-8">
							<input class="form-control" type="text" placeholder="Notice title" id="editNoticeTitle">
						  </div>
						</div>
						<div class="form-group row">
						  <label for="editNoticeDesc" class="col-2 col-form-label">Description</label>
						  <div class="col-10">
							<input class="form-control" type="text" placeholder="Description" id="editNoticeDesc">
						  </div>
						</div>
					
						<div class="form-group row">
						  <label for="editNoticeDate" class="col-2 col-form-label">Date</label>
						  <div class="col-10">
							<input class="form-control" type="date" id="editNoticeDate">
						  </div>
						</div>
						<div class="form-group row">
						  <label for="editNoticeTime" class="col-2 col-form-label">Time</label>
						  <div class="col-10">
							<input class="form-control" type="time" value="13:45:00" id="editNoticeTime">
						  </div>
						</div>
						<input id="finalID" type = "hidden" value=""/>
						</form>
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default" id="modifyNotice" onclick="updateNotice();">Modify</button>
						<button type="button" class="btn btn-default" id="deleteNotice" onclick="removeNotice();">Delete</button>
						<button type="button" class="btn btn-default" id="deleteNotice" data-dismiss="modal" style="display:none;">Close</button>
					  </div>
					</div>

				  </div>
				</div>
				<!-- ./Edit notice item Modal -->
				
				<div class="row">
					<div class="col-lg-8">
						<div class="panel panel-default">
							<div class="panel-heading">
								<i class="fa fa-bar-chart-o fa-fw"></i> Recommended Jobs
								<div class="pull-right">
									<div class="btn-group">
										<button type="button" class="btn btn-default btn-xs" data-toggle="button">
											View all
											
										</button>
									</div>
								</div>
							</div>
							<!-- /.panel-heading -->
							<div class="panel-body">
								<div class="list-group">
									<a href="#" class="list-group-item">
										<i class="fa fa-comment fa-fw"></i> Marketing students/interns
										<span class="pull-right text-muted small"><em>Images go here</em>
										</span>
									</a>
									<a href="#" class="list-group-item">
										<i class="fa fa-twitter fa-fw"></i> EE/CE/ME (Test Engineer)
										<span class="pull-right text-muted small"><em>Images go here</em>
										</span>
									</a>
									<a href="#" class="list-group-item">
										<i class="fa fa-envelope fa-fw"></i> CS/CE (Network Engineer)
										<span class="pull-right text-muted small"><em>Images go here</em>
										</span>
									</a>
									<a href="#" class="list-group-item">
										<i class="fa fa-envelope fa-fw"></i> CS/CE (Software Engineer)
										<span class="pull-right text-muted small"><em>Images go here</em>
										</span>
									</a>
									<a href="#" class="list-group-item">
										<i class="fa fa-envelope fa-fw"></i> CS/CE (Financial Analyst)
										<span class="pull-right text-muted small"><em>Images go here</em>
										</span>
									</a>
								</div>
							</div>
							<!-- /.panel-body -->
						</div>
						<!-- /.panel -->
						<div class="panel panel-default">
							<div class="panel-heading">
								<i class="fa fa-bar-chart-o fa-fw"></i> Recent Jobs
								<div class="pull-right">
									<div class="btn-group">
										<button type="button" class="btn btn-default btn-xs" data-toggle="button">
											View all
											
										</button>
									</div>
								</div>
							</div>
							<!-- /.panel-heading -->
							<div class="panel-body">
								<div class="list-group">
									<a href="#" class="list-group-item">
										<i class="fa fa-comment fa-fw"></i> Google
										<span class="pull-right text-muted small"><em>Images go here</em>
										</span>
									</a>
									<a href="#" class="list-group-item">
										<i class="fa fa-twitter fa-fw"></i> Apple Inc.
										<span class="pull-right text-muted small"><em>Images go here</em>
										</span>
									</a>
									<a href="#" class="list-group-item">
										<i class="fa fa-envelope fa-fw"></i> Microsoft
										<span class="pull-right text-muted small"><em>Images go here</em>
										</span>
									</a>
									<a href="#" class="list-group-item">
										<i class="fa fa-envelope fa-fw"></i> Cisco
										<span class="pull-right text-muted small"><em>Images go here</em>
										</span>
									</a>
									<a href="#" class="list-group-item">
										<i class="fa fa-envelope fa-fw"></i> CS/CE (Financial Analyst)
										<span class="pull-right text-muted small"><em>Images go here</em>
										</span>
									</a>
								</div>
							</div>
							<!-- /.panel-body -->
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<i class="fa fa-bar-chart-o fa-fw"></i> Saved Searches
								<div class="pull-right">
									<div class="btn-group">
										<button type="button" class="btn btn-default btn-xs" data-toggle="button">
											View all
											
										</button>
									</div>
								</div>
							</div>
							<!-- /.panel-heading -->
							<div class="panel-body">
								<div class="list-group">
									<a href="#" class="list-group-item">
										<i class="fa fa-comment fa-fw"></i> Google
										<span class="pull-right text-muted small"><em>Images go here</em>
										</span>
									</a>
									<a href="#" class="list-group-item">
										<i class="fa fa-twitter fa-fw"></i> Apple Inc.
										<span class="pull-right text-muted small"><em>Images go here</em>
										</span>
									</a>
									<a href="#" class="list-group-item">
										<i class="fa fa-envelope fa-fw"></i> Microsoft
										<span class="pull-right text-muted small"><em>Images go here</em>
										</span>
									</a>
									<a href="#" class="list-group-item">
										<i class="fa fa-envelope fa-fw"></i> Cisco
										<span class="pull-right text-muted small"><em>Images go here</em>
										</span>
									</a>
									<a href="#" class="list-group-item">
										<i class="fa fa-envelope fa-fw"></i> CS/CE (Financial Analyst)
										<span class="pull-right text-muted small"><em>Images go here</em>
										</span>
									</a>
								</div>
							</div>
							<!-- /.panel-body -->
						</div>
					</div>
					<!-- /.col-lg-8 -->
					<div class="col-lg-4">
						<div class="panel panel-default">
							<div class="panel-heading" style="background-color: lightsteelblue;">
								<i class="fa fa-bell fa-fw"></i> Notice Board
								<div class="pull-right">
                                    <div class="dropdown">
									  <button class="btn btn-success dropdown-toggle btn-xs" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="false">
										<span class="glyphicon glyphicon-cog"></span>
										<span class="caret"></span>
									  </button><div class="dropdown-backdrop"></div>
									  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
										<li role="presentation"><a role="menuitem" tabindex="-1" href="#" onclick="refreshNoticeboard();" data-toggle="button">Refresh</a></li>
										<li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#myModal">Add item to Noticeboard</a></li>
										<li role="presentation"><a role="menuitem" tabindex="-1" href="#" onclick="populateManageNoticeBoard();">Manage</a></li>
									  </ul>
									</div>
								</div>
							</div>
							<!-- /.panel-heading -->
							<div class="panel-body">
								<div id="spinner" style="display:none;">
									<center>
										<i class="fa fa-spinner fa-spin" style="font-size:100px;color:darkgray;padding-top:2%;"></i>
									</center>
								</div>

								<div class="list-group" id="noticeBoardList">
									
									<a href="#" class="list-group-item list-group-item-info" onclick="removeNotice();" data-toggle="button">
										<h4 class="list-group-item-heading"><strong>Dummy</strong>
										<span class="pull-right label label-success">10:00 AM</span></h4>
										<p class="list-group-item-text">Brief Description</p>
										<input type="hidden" value=""/>
									</a>
									
								</div>
								<!-- /.list-group -->
							</div>
							<!-- /.panel-body -->
						</div>
					</div>
					<!-- /.col-lg-4 -->
					<div class="col-lg-4">
						<div class="panel panel-default">
							<div class="panel-heading" style="background-color: lightsteelblue;">
								<i class="fa fa-bell fa-fw"></i> Upcoming Interviews
								<div class="pull-right">
                                    <div class="dropdown">
									  <button class="btn btn-success dropdown-toggle btn-xs" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="false">
										<span class="glyphicon glyphicon-cog"></span>
										<span class="caret"></span>
									  </button><div class="dropdown-backdrop"></div>
									  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
										<li role="presentation"><a role="menuitem" tabindex="-1" href="#" onclick="refreshNoticeboard();" data-toggle="button">Refresh</a></li>
										<li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#myModal">Add item to Noticeboard</a></li>
										<li role="presentation"><a role="menuitem" tabindex="-1" href="#" onclick="populateManageNoticeBoard();">Manage</a></li>
									  </ul>
									</div>
								</div>
							</div>
							<!-- /.panel-heading -->
							<div class="panel-body">
								<div id="spinner" style="display:none;">
									<center>
										<i class="fa fa-spinner fa-spin" style="font-size:100px;color:darkgray;padding-top:2%;"></i>
									</center>
								</div>

								<div class="list-group" id="noticeBoardList">
									
									<a href="#" class="list-group-item list-group-item-info" onclick="removeNotice();" data-toggle="button">
										<h4 class="list-group-item-heading"><strong>Dummy</strong>
										<span class="pull-right label label-success">10:00 AM</span></h4>
										<p class="list-group-item-text">Brief Description</p>
										<input type="hidden" value=""/>
									</a>
									
								</div>
								<!-- /.list-group -->
							</div>
							<!-- /.panel-body -->
						</div>
					</div> <!-- /.col-lg-4 -->
					<div class="col-lg-4">
						<div class="panel panel-default">
							<div class="panel-heading" style="background-color: lightsteelblue;">
								<i class="fa fa-bell fa-fw"></i> Upcoming Assessments
								<div class="pull-right">
                                    <div class="dropdown">
									  <button class="btn btn-success dropdown-toggle btn-xs" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="false">
										<span class="glyphicon glyphicon-cog"></span>
										<span class="caret"></span>
									  </button><div class="dropdown-backdrop"></div>
									  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
										<li role="presentation"><a role="menuitem" tabindex="-1" href="#" onclick="refreshNoticeboard();" data-toggle="button">Refresh</a></li>
										<li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#myModal">Add item to Noticeboard</a></li>
										<li role="presentation"><a role="menuitem" tabindex="-1" href="#" onclick="populateManageNoticeBoard();">Manage</a></li>
									  </ul>
									</div>
								</div>
							</div>
							<!-- /.panel-heading -->
							<div class="panel-body">
								<div id="spinner" style="display:none;">
									<center>
										<i class="fa fa-spinner fa-spin" style="font-size:100px;color:darkgray;padding-top:2%;"></i>
									</center>
								</div>

								<div class="list-group" id="noticeBoardList">
									
									<a href="#" class="list-group-item list-group-item-info" onclick="removeNotice();" data-toggle="button">
										<h4 class="list-group-item-heading"><strong>Dummy</strong>
										<span class="pull-right label label-success">10:00 AM</span></h4>
										<p class="list-group-item-text">Brief Description</p>
										<input type="hidden" value=""/>
									</a>
									
								</div>
								<!-- /.list-group -->
							</div>
							<!-- /.panel-body -->
						</div>
					</div> <!-- /.col-lg-4 -->
				
				</div> 
				<!-- /.row -->
				</div> <!-- /.container -->
			</div>
			<!-- /#page-wrapper -->
		
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
	<script src="lib/jquery-2.2.4.min.js"></script>
	
    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

   <!-- <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>-->

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
	<script src="dashboard.js"></script>
	
	
	<script src="lib/jquery-ui.js"></script>
	<link href="lib/jquery-ui.css" rel="Stylesheet"></link>
	<script src="lib/jquery.dataTables.min.js"></script>
	<script src="lib/dataTables.bootstrap.min.js"></script>
</body>

</html>
