
@extends('layouts.master')

@section('title')
    Dashboard - TA Sipil
@endsection

@section('page-head')
    <!-- Page header -->
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4>
					<i class="icon-arrow-left52 position-left"></i>
					<span class="text-semibold">Beranda </span>
				</h4>
			</div>

			<div class="heading-elements">
				<div class="heading-btn-group">
					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
				</div>
			</div>
		</div>
	</div>
	<!-- /page header -->
@endsection

@section('content')
    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Dashboard content -->
        <div class="row">
            <div class="col-lg-12">

                <!-- Quick stats boxes -->
                <div class="row">
                    <div class="col-lg-4">

                        <!-- Members online -->
                        <div class="panel bg-teal-400">
                            <div class="panel-body">
                                <div class="heading-elements">
                                    <span class="heading-text badge bg-teal-800">+53,6%</span>
                                </div>

                                <h3 class="no-margin">3,450</h3>
                                Members online
                                <div class="text-muted text-size-small">489 avg</div>
                            </div>

                            <div class="container-fluid">
                                <div id="members-online"></div>
                            </div>
                        </div>
                        <!-- /members online -->

                    </div>

                    <div class="col-lg-4">

                        <!-- Current server load -->
                        <div class="panel bg-pink-400">
                            <div class="panel-body">
                                <div class="heading-elements">
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i> <span class="caret"></span></a>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="#"><i class="icon-sync"></i> Update data</a></li>
                                                <li><a href="#"><i class="icon-list-unordered"></i> Detailed log</a></li>
                                                <li><a href="#"><i class="icon-pie5"></i> Statistics</a></li>
                                                <li><a href="#"><i class="icon-cross3"></i> Clear list</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>

                                <h3 class="no-margin">49.4%</h3>
                                Current server load
                                <div class="text-muted text-size-small">34.6% avg</div>
                            </div>

                            <div id="server-load"></div>
                        </div>
                        <!-- /current server load -->

                    </div>

                    <div class="col-lg-4">

                        <!-- Today's revenue -->
                        <div class="panel bg-blue-400">
                            <div class="panel-body">
                                <div class="heading-elements">
                                    <ul class="icons-list">
                                        <li><a data-action="reload"></a></li>
                                    </ul>
                                </div>

                                <h3 class="no-margin">$18,390</h3>
                                Today's revenue
                                <div class="text-muted text-size-small">$37,578 avg</div>
                            </div>

                            <div id="today-revenue"></div>
                        </div>
                        <!-- /today's revenue -->

                    </div>
                </div>
                <!-- /quick stats boxes -->


                <!-- Support tickets -->
                <div class="panel panel-flat">
                    <div class="table-responsive">
                        <table class="table table-xlg text-nowrap">
                            <tbody>
                                <tr>
                                    <td class="col-md-4">
                                        <div class="media-left media-middle">
                                            <div id="tickets-status"></div>
                                        </div>

                                        <div class="media-left">
                                            <h5 class="text-semibold no-margin">14,327 <small class="text-success text-size-base"><i class="icon-arrow-up12"></i> (+2.9%)</small></h5>
                                            <span class="text-muted"><span class="status-mark border-success position-left"></span> Jun 16, 10:00 am</span>
                                        </div>
                                    </td>

                                    <td class="col-md-3">
                                        <div class="media-left media-middle">
                                            <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-alarm-add"></i></a>
                                        </div>

                                        <div class="media-left">
                                            <h5 class="text-semibold no-margin">
                                                1,132 <small class="display-block no-margin">total tickets</small>
                                            </h5>
                                        </div>
                                    </td>

                                    <td class="col-md-3">
                                        <div class="media-left media-middle">
                                            <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-spinner11"></i></a>
                                        </div>

                                        <div class="media-left">
                                            <h5 class="text-semibold no-margin">
                                                06:25:00 <small class="display-block no-margin">response time</small>
                                            </h5>
                                        </div>
                                    </td>

                                    <td class="text-right col-md-2">
                                        <a href="#" class="btn bg-teal-400"><i class="icon-statistics position-left"></i> Report</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>	
                    </div>

                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th style="width: 50px">Due</th>
                                    <th style="width: 300px;">User</th>
                                    <th>Description</th>
                                    <th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="active border-double">
                                    <td colspan="3">Active tickets</td>
                                    <td class="text-right">
                                        <span class="badge bg-blue">24</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-center">
                                        <h6 class="no-margin">12 <small class="display-block text-size-small no-margin">hours</small></h6>
                                    </td>
                                    <td>
                                        <div class="media-left media-middle">
                                            <a href="#" class="btn bg-teal-400 btn-rounded btn-icon btn-xs">
                                                <span class="letter-icon"></span>
                                            </a>
                                        </div>

                                        <div class="media-body">
                                            <a href="#" class="display-inline-block text-default text-semibold letter-icon-title">Annabelle Doney</a>
                                            <div class="text-muted text-size-small"><span class="status-mark border-blue position-left"></span> Active</div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="text-default display-inline-block">
                                            <span class="text-semibold">[#1183] Workaround for OS X selects printing bug</span>
                                            <span class="display-block text-muted">Chrome fixed the bug several versions ago, thus rendering this...</span>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <ul class="icons-list">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a href="#"><i class="icon-undo"></i> Quick reply</a></li>
                                                    <li><a href="#"><i class="icon-history"></i> Full history</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="#"><i class="icon-checkmark3 text-success"></i> Resolve issue</a></li>
                                                    <li><a href="#"><i class="icon-cross2 text-danger"></i> Close issue</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-center">
                                        <h6 class="no-margin">16 <small class="display-block text-size-small no-margin">hours</small></h6>
                                    </td>
                                    <td>
                                        <div class="media-left media-middle">
                                            <a href="#"><img src="assets/images/placeholder.jpg" class="img-circle img-xs" alt=""></a>
                                        </div>

                                        <div class="media-body">
                                            <a href="#" class="display-inline-block text-default text-semibold letter-icon-title">Chris Macintyre</a>
                                            <div class="text-muted text-size-small"><span class="status-mark border-blue position-left"></span> Active</div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="text-default display-inline-block">
                                            <span class="text-semibold">[#1249] Vertically center carousel controls</span>
                                            <span class="display-block text-muted">Try any carousel control and reduce the screen width below...</span>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <ul class="icons-list">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a href="#"><i class="icon-undo"></i> Quick reply</a></li>
                                                    <li><a href="#"><i class="icon-history"></i> Full history</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="#"><i class="icon-checkmark3 text-success"></i> Resolve issue</a></li>
                                                    <li><a href="#"><i class="icon-cross2 text-danger"></i> Close issue</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-center">
                                        <h6 class="no-margin">20 <small class="display-block text-size-small no-margin">hours</small></h6>
                                    </td>
                                    <td>
                                        <div class="media-left media-middle">
                                            <a href="#" class="btn bg-blue btn-rounded btn-icon btn-xs">
                                                <span class="letter-icon"></span>
                                            </a>
                                        </div>

                                        <div class="media-body">
                                            <a href="#" class="display-inline-block text-default text-semibold letter-icon-title">Robert Hauber</a>
                                            <div class="text-muted text-size-small"><span class="status-mark border-blue position-left"></span> Active</div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="text-default display-inline-block">
                                            <span class="text-semibold">[#1254] Inaccurate small pagination height</span>
                                            <span class="display-block text-muted">The height of pagination elements is not consistent with...</span>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <ul class="icons-list">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a href="#"><i class="icon-undo"></i> Quick reply</a></li>
                                                    <li><a href="#"><i class="icon-history"></i> Full history</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="#"><i class="icon-checkmark3 text-success"></i> Resolve issue</a></li>
                                                    <li><a href="#"><i class="icon-cross2 text-danger"></i> Close issue</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-center">
                                        <h6 class="no-margin">40 <small class="display-block text-size-small no-margin">hours</small></h6>
                                    </td>
                                    <td>
                                        <div class="media-left media-middle">
                                            <a href="#" class="btn bg-warning-400 btn-rounded btn-icon btn-xs">
                                                <span class="letter-icon"></span>
                                            </a>
                                        </div>

                                        <div class="media-body">
                                            <a href="#" class="display-inline-block text-default text-semibold letter-icon-title">Dex Sponheim</a>
                                            <div class="text-muted text-size-small"><span class="status-mark border-blue position-left"></span> Active</div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="text-default display-inline-block">
                                            <span class="text-semibold">[#1184] Round grid column gutter operations</span>
                                            <span class="display-block text-muted">Left rounds up, right rounds down. should keep everything...</span>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <ul class="icons-list">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a href="#"><i class="icon-undo"></i> Quick reply</a></li>
                                                    <li><a href="#"><i class="icon-history"></i> Full history</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="#"><i class="icon-checkmark3 text-success"></i> Resolve issue</a></li>
                                                    <li><a href="#"><i class="icon-cross2 text-danger"></i> Close issue</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>

                                <tr class="active border-double">
                                    <td colspan="3">Resolved tickets</td>
                                    <td class="text-right">
                                        <span class="badge bg-success">42</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-center">
                                        <i class="icon-checkmark3 text-success"></i>
                                    </td>
                                    <td>
                                        <div class="media-left media-middle">
                                            <a href="#" class="btn bg-success-400 btn-rounded btn-icon btn-xs">
                                                <span class="letter-icon"></span>
                                            </a>
                                        </div>

                                        <div class="media-body">
                                            <a href="#" class="display-inline-block text-default letter-icon-title">Alan Macedo</a>
                                            <div class="text-muted text-size-small"><span class="status-mark border-success position-left"></span> Resolved</div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="text-default display-inline-block">
                                            [#1046] Avoid some unnecessary HTML string
                                            <span class="display-block text-muted">Rather than building a string of HTML and then parsing it...</span>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <ul class="icons-list">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a href="#"><i class="icon-undo"></i> Quick reply</a></li>
                                                    <li><a href="#"><i class="icon-history"></i> Full history</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="#"><i class="icon-plus3 text-blue"></i> Unresolve issue</a></li>
                                                    <li><a href="#"><i class="icon-cross2 text-danger"></i> Close issue</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-center">
                                        <i class="icon-checkmark3 text-success"></i>
                                    </td>
                                    <td>
                                        <div class="media-left media-middle">
                                            <a href="#" class="btn bg-pink-400 btn-rounded btn-icon btn-xs">
                                                <span class="letter-icon"></span>
                                            </a>
                                        </div>

                                        <div class="media-body">
                                            <a href="#" class="display-inline-block text-default letter-icon-title">Brett Castellano</a>
                                            <div class="text-muted text-size-small"><span class="status-mark border-success position-left"></span> Resolved</div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="text-default display-inline-block">
                                            [#1038] Update json configuration
                                            <span class="display-block text-muted">The <code>files</code> property is necessary to override the files property...</span>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <ul class="icons-list">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a href="#"><i class="icon-undo"></i> Quick reply</a></li>
                                                    <li><a href="#"><i class="icon-history"></i> Full history</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="#"><i class="icon-plus3 text-blue"></i> Unresolve issue</a></li>
                                                    <li><a href="#"><i class="icon-cross2 text-danger"></i> Close issue</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-center">
                                        <i class="icon-checkmark3 text-success"></i>
                                    </td>
                                    <td>
                                        <div class="media-left media-middle">
                                            <a href="#"><img src="assets/images/placeholder.jpg" class="img-circle img-xs" alt=""></a>
                                        </div>

                                        <div class="media-body">
                                            <a href="#" class="display-inline-block text-default">Roxanne Forbes</a>
                                            <div class="text-muted text-size-small"><span class="status-mark border-success position-left"></span> Resolved</div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="text-default display-inline-block">
                                            [#1034] Tooltip multiple event
                                            <span class="display-block text-muted">Fix behavior when using tooltips and popovers that are...</span>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <ul class="icons-list">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a href="#"><i class="icon-undo"></i> Quick reply</a></li>
                                                    <li><a href="#"><i class="icon-history"></i> Full history</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="#"><i class="icon-plus3 text-blue"></i> Unresolve issue</a></li>
                                                    <li><a href="#"><i class="icon-cross2 text-danger"></i> Close issue</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>

                                <tr class="active border-double">
                                    <td colspan="3">Closed tickets</td>
                                    <td class="text-right">
                                        <span class="badge bg-danger">37</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-center">
                                        <i class="icon-cross2 text-danger-400"></i>
                                    </td>
                                    <td>
                                        <div class="media-left media-middle">
                                            <a href="#"><img src="assets/images/placeholder.jpg" class="img-circle img-xs" alt=""></a>
                                        </div>

                                        <div class="media-body">
                                            <a href="#" class="display-inline-block text-default">Mitchell Sitkin</a>
                                            <div class="text-muted text-size-small"><span class="status-mark border-danger position-left"></span> Closed</div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="text-default display-inline-block">
                                            [#1040] Account for static form controls in form group
                                            <span class="display-block text-muted">Resizes control label's font-size and account for the standard...</span>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <ul class="icons-list">
                                            <li class="dropup">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a href="#"><i class="icon-undo"></i> Quick reply</a></li>
                                                    <li><a href="#"><i class="icon-history"></i> Full history</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="#"><i class="icon-reload-alt text-blue"></i> Reopen issue</a></li>
                                                    <li><a href="#"><i class="icon-cross2 text-danger"></i> Close issue</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-center">
                                        <i class="icon-cross2 text-danger"></i>
                                    </td>
                                    <td>
                                        <div class="media-left media-middle">
                                            <a href="#" class="btn bg-brown-400 btn-rounded btn-icon btn-xs">
                                                <span class="letter-icon"></span>
                                            </a>
                                        </div>

                                        <div class="media-body">
                                            <a href="#" class="display-inline-block text-default letter-icon-title">Katleen Jensen</a>
                                            <div class="text-muted text-size-small"><span class="status-mark border-danger position-left"></span> Closed</div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="text-default display-inline-block">
                                            [#1038] Proper sizing of form control feedback
                                            <span class="display-block text-muted">Feedback icon sizing inside a larger/smaller form-group...</span>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <ul class="icons-list">
                                            <li class="dropup">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a href="#"><i class="icon-undo"></i> Quick reply</a></li>
                                                    <li><a href="#"><i class="icon-history"></i> Full history</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="#"><i class="icon-plus3 text-blue"></i> Unresolve issue</a></li>
                                                    <li><a href="#"><i class="icon-cross2 text-danger"></i> Close issue</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /support tickets -->

            </div>
        </div>
        <!-- /dashboard content -->

    </div>
    <!-- /main content -->
@endsection