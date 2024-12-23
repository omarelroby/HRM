<html lang="en" data-theme="light" data-sidebar="light" data-color="primary" data-topbar="white" data-layout="default" data-topbarcolor="white" data-card="bordered" data-size="default" data-width="fluid" data-loader="enable"><!-- Mirrored from smarthr.dreamstechnologies.com/html/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 22 Dec 2024 18:36:52 GMT --><head>

	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard | SmartHR - Advanced Bootstrap 5 Multipurpose Admin Dashboard Template for HRM, Payroll &amp; CRM</title>
	
	<meta name="description" content="SmartHR - An advanced Bootstrap 5 admin dashboard template for HRM and CRM. Ideal for managing employee records, payroll, attendance, recruitment, and team performance with an intuitive and responsive design. Perfect for HR teams and business managers looking to streamline workforce management.">
	<meta name="keywords" content="HR dashboard template, HRM admin template, Bootstrap 5 HR dashboard, workforce management dashboard, employee management system, payroll dashboard, HR analytics, admin dashboard, CRM admin template, human resources management, HR admin template, team management dashboard, recruitment dashboard, employee attendance system, performance management, HR CRM, HR dashboard HTML, Bootstrap HR template, employee engagement, HR software, project management dashboard">
	<meta name="author" content="Dreams Technologies">
	<meta name="robots" content="index, follow">

	<!-- Apple Touch Icon -->
	<link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-touch-icon.png">

	<!-- Favicon -->
	<link rel="icon" href="assets/img/favicon.png" type="image/x-icon">
	<link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

	<!-- Theme Script js -->
	<script src="assets/js/theme-script.js" type="text/javascript"></script>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<!-- Feather CSS -->
	<link rel="stylesheet" href="assets/plugins/icons/feather/feather.css">

	<!-- Tabler Icon CSS -->
	<link rel="stylesheet" href="assets/plugins/tabler-icons/tabler-icons.css">

	<!-- Select2 CSS -->
	<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

	<!-- Datetimepicker CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

	<!-- Bootstrap Tagsinput CSS -->
	<link rel="stylesheet" href="assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css">

	<!-- Summernote CSS -->
	<link rel="stylesheet" href="assets/plugins/summernote/summernote-lite.min.css">

	<!-- Daterangepikcer CSS -->
	<link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">

	<!-- Color Picker Css -->
	<link rel="stylesheet" href="assets/plugins/flatpickr/flatpickr.min.css">
	<link rel="stylesheet" href="assets/plugins/%40simonwep/pickr/themes/nano.min.css">

	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/css/style.css">

<style id="apexcharts-css">@keyframes opaque {
  0% {
    opacity: 0
  }

  to {
    opacity: 1
  }
}

@keyframes resizeanim {

  0%,
  to {
    opacity: 0
  }
}

.apexcharts-canvas {
  position: relative;
  direction: ltr !important;
  user-select: none
}

.apexcharts-canvas ::-webkit-scrollbar {
  -webkit-appearance: none;
  width: 6px
}

.apexcharts-canvas ::-webkit-scrollbar-thumb {
  border-radius: 4px;
  background-color: rgba(0, 0, 0, .5);
  box-shadow: 0 0 1px rgba(255, 255, 255, .5);
  -webkit-box-shadow: 0 0 1px rgba(255, 255, 255, .5)
}

.apexcharts-inner {
  position: relative
}

.apexcharts-text tspan {
  font-family: inherit
}

rect.legend-mouseover-inactive,
.legend-mouseover-inactive rect,
.legend-mouseover-inactive path,
.legend-mouseover-inactive circle,
.legend-mouseover-inactive line,
.legend-mouseover-inactive text.apexcharts-yaxis-title-text,
.legend-mouseover-inactive text.apexcharts-yaxis-label {
  transition: .15s ease all;
  opacity: .2
}

.apexcharts-legend-text {
  padding-left: 15px;
  margin-left: -15px;
}

.apexcharts-series-collapsed {
  opacity: 0
}

.apexcharts-tooltip {
  border-radius: 5px;
  box-shadow: 2px 2px 6px -4px #999;
  cursor: default;
  font-size: 14px;
  left: 62px;
  opacity: 0;
  pointer-events: none;
  position: absolute;
  top: 20px;
  display: flex;
  flex-direction: column;
  overflow: hidden;
  white-space: nowrap;
  z-index: 12;
  transition: .15s ease all
}

.apexcharts-tooltip.apexcharts-active {
  opacity: 1;
  transition: .15s ease all
}

.apexcharts-tooltip.apexcharts-theme-light {
  border: 1px solid #e3e3e3;
  background: rgba(255, 255, 255, .96)
}

.apexcharts-tooltip.apexcharts-theme-dark {
  color: #fff;
  background: rgba(30, 30, 30, .8)
}

.apexcharts-tooltip * {
  font-family: inherit
}

.apexcharts-tooltip-title {
  padding: 6px;
  font-size: 15px;
  margin-bottom: 4px
}

.apexcharts-tooltip.apexcharts-theme-light .apexcharts-tooltip-title {
  background: #eceff1;
  border-bottom: 1px solid #ddd
}

.apexcharts-tooltip.apexcharts-theme-dark .apexcharts-tooltip-title {
  background: rgba(0, 0, 0, .7);
  border-bottom: 1px solid #333
}

.apexcharts-tooltip-text-goals-value,
.apexcharts-tooltip-text-y-value,
.apexcharts-tooltip-text-z-value {
  display: inline-block;
  margin-left: 5px;
  font-weight: 600
}

.apexcharts-tooltip-text-goals-label:empty,
.apexcharts-tooltip-text-goals-value:empty,
.apexcharts-tooltip-text-y-label:empty,
.apexcharts-tooltip-text-y-value:empty,
.apexcharts-tooltip-text-z-value:empty,
.apexcharts-tooltip-title:empty {
  display: none
}

.apexcharts-tooltip-text-goals-label,
.apexcharts-tooltip-text-goals-value {
  padding: 6px 0 5px
}

.apexcharts-tooltip-goals-group,
.apexcharts-tooltip-text-goals-label,
.apexcharts-tooltip-text-goals-value {
  display: flex
}

.apexcharts-tooltip-text-goals-label:not(:empty),
.apexcharts-tooltip-text-goals-value:not(:empty) {
  margin-top: -6px
}

.apexcharts-tooltip-marker {
  width: 12px;
  height: 12px;
  position: relative;
  top: 0;
  margin-right: 10px;
  border-radius: 50%
}

.apexcharts-tooltip-series-group {
  padding: 0 10px;
  display: none;
  text-align: left;
  justify-content: left;
  align-items: center
}

.apexcharts-tooltip-series-group.apexcharts-active .apexcharts-tooltip-marker {
  opacity: 1
}

.apexcharts-tooltip-series-group.apexcharts-active,
.apexcharts-tooltip-series-group:last-child {
  padding-bottom: 4px
}

.apexcharts-tooltip-y-group {
  padding: 6px 0 5px
}

.apexcharts-custom-tooltip,
.apexcharts-tooltip-box {
  padding: 4px 8px
}

.apexcharts-tooltip-boxPlot {
  display: flex;
  flex-direction: column-reverse
}

.apexcharts-tooltip-box>div {
  margin: 4px 0
}

.apexcharts-tooltip-box span.value {
  font-weight: 700
}

.apexcharts-tooltip-rangebar {
  padding: 5px 8px
}

.apexcharts-tooltip-rangebar .category {
  font-weight: 600;
  color: #777
}

.apexcharts-tooltip-rangebar .series-name {
  font-weight: 700;
  display: block;
  margin-bottom: 5px
}

.apexcharts-xaxistooltip,
.apexcharts-yaxistooltip {
  opacity: 0;
  pointer-events: none;
  color: #373d3f;
  font-size: 13px;
  text-align: center;
  border-radius: 2px;
  position: absolute;
  z-index: 10;
  background: #eceff1;
  border: 1px solid #90a4ae
}

.apexcharts-xaxistooltip {
  padding: 9px 10px;
  transition: .15s ease all
}

.apexcharts-xaxistooltip.apexcharts-theme-dark {
  background: rgba(0, 0, 0, .7);
  border: 1px solid rgba(0, 0, 0, .5);
  color: #fff
}

.apexcharts-xaxistooltip:after,
.apexcharts-xaxistooltip:before {
  left: 50%;
  border: solid transparent;
  content: " ";
  height: 0;
  width: 0;
  position: absolute;
  pointer-events: none
}

.apexcharts-xaxistooltip:after {
  border-color: transparent;
  border-width: 6px;
  margin-left: -6px
}

.apexcharts-xaxistooltip:before {
  border-color: transparent;
  border-width: 7px;
  margin-left: -7px
}

.apexcharts-xaxistooltip-bottom:after,
.apexcharts-xaxistooltip-bottom:before {
  bottom: 100%
}

.apexcharts-xaxistooltip-top:after,
.apexcharts-xaxistooltip-top:before {
  top: 100%
}

.apexcharts-xaxistooltip-bottom:after {
  border-bottom-color: #eceff1
}

.apexcharts-xaxistooltip-bottom:before {
  border-bottom-color: #90a4ae
}

.apexcharts-xaxistooltip-bottom.apexcharts-theme-dark:after,
.apexcharts-xaxistooltip-bottom.apexcharts-theme-dark:before {
  border-bottom-color: rgba(0, 0, 0, .5)
}

.apexcharts-xaxistooltip-top:after {
  border-top-color: #eceff1
}

.apexcharts-xaxistooltip-top:before {
  border-top-color: #90a4ae
}

.apexcharts-xaxistooltip-top.apexcharts-theme-dark:after,
.apexcharts-xaxistooltip-top.apexcharts-theme-dark:before {
  border-top-color: rgba(0, 0, 0, .5)
}

.apexcharts-xaxistooltip.apexcharts-active {
  opacity: 1;
  transition: .15s ease all
}

.apexcharts-yaxistooltip {
  padding: 4px 10px
}

.apexcharts-yaxistooltip.apexcharts-theme-dark {
  background: rgba(0, 0, 0, .7);
  border: 1px solid rgba(0, 0, 0, .5);
  color: #fff
}

.apexcharts-yaxistooltip:after,
.apexcharts-yaxistooltip:before {
  top: 50%;
  border: solid transparent;
  content: " ";
  height: 0;
  width: 0;
  position: absolute;
  pointer-events: none
}

.apexcharts-yaxistooltip:after {
  border-color: transparent;
  border-width: 6px;
  margin-top: -6px
}

.apexcharts-yaxistooltip:before {
  border-color: transparent;
  border-width: 7px;
  margin-top: -7px
}

.apexcharts-yaxistooltip-left:after,
.apexcharts-yaxistooltip-left:before {
  left: 100%
}

.apexcharts-yaxistooltip-right:after,
.apexcharts-yaxistooltip-right:before {
  right: 100%
}

.apexcharts-yaxistooltip-left:after {
  border-left-color: #eceff1
}

.apexcharts-yaxistooltip-left:before {
  border-left-color: #90a4ae
}

.apexcharts-yaxistooltip-left.apexcharts-theme-dark:after,
.apexcharts-yaxistooltip-left.apexcharts-theme-dark:before {
  border-left-color: rgba(0, 0, 0, .5)
}

.apexcharts-yaxistooltip-right:after {
  border-right-color: #eceff1
}

.apexcharts-yaxistooltip-right:before {
  border-right-color: #90a4ae
}

.apexcharts-yaxistooltip-right.apexcharts-theme-dark:after,
.apexcharts-yaxistooltip-right.apexcharts-theme-dark:before {
  border-right-color: rgba(0, 0, 0, .5)
}

.apexcharts-yaxistooltip.apexcharts-active {
  opacity: 1
}

.apexcharts-yaxistooltip-hidden {
  display: none
}

.apexcharts-xcrosshairs,
.apexcharts-ycrosshairs {
  pointer-events: none;
  opacity: 0;
  transition: .15s ease all
}

.apexcharts-xcrosshairs.apexcharts-active,
.apexcharts-ycrosshairs.apexcharts-active {
  opacity: 1;
  transition: .15s ease all
}

.apexcharts-ycrosshairs-hidden {
  opacity: 0
}

.apexcharts-selection-rect {
  cursor: move
}

.svg_select_boundingRect,
.svg_select_points_rot {
  pointer-events: none;
  opacity: 0;
  visibility: hidden
}

.apexcharts-selection-rect+g .svg_select_boundingRect,
.apexcharts-selection-rect+g .svg_select_points_rot {
  opacity: 0;
  visibility: hidden
}

.apexcharts-selection-rect+g .svg_select_points_l,
.apexcharts-selection-rect+g .svg_select_points_r {
  cursor: ew-resize;
  opacity: 1;
  visibility: visible
}

.svg_select_points {
  fill: #efefef;
  stroke: #333;
  rx: 2
}

.apexcharts-svg.apexcharts-zoomable.hovering-zoom {
  cursor: crosshair
}

.apexcharts-svg.apexcharts-zoomable.hovering-pan {
  cursor: move
}

.apexcharts-menu-icon,
.apexcharts-pan-icon,
.apexcharts-reset-icon,
.apexcharts-selection-icon,
.apexcharts-toolbar-custom-icon,
.apexcharts-zoom-icon,
.apexcharts-zoomin-icon,
.apexcharts-zoomout-icon {
  cursor: pointer;
  width: 20px;
  height: 20px;
  line-height: 24px;
  color: #6e8192;
  text-align: center
}

.apexcharts-menu-icon svg,
.apexcharts-reset-icon svg,
.apexcharts-zoom-icon svg,
.apexcharts-zoomin-icon svg,
.apexcharts-zoomout-icon svg {
  fill: #6e8192
}

.apexcharts-selection-icon svg {
  fill: #444;
  transform: scale(.76)
}

.apexcharts-theme-dark .apexcharts-menu-icon svg,
.apexcharts-theme-dark .apexcharts-pan-icon svg,
.apexcharts-theme-dark .apexcharts-reset-icon svg,
.apexcharts-theme-dark .apexcharts-selection-icon svg,
.apexcharts-theme-dark .apexcharts-toolbar-custom-icon svg,
.apexcharts-theme-dark .apexcharts-zoom-icon svg,
.apexcharts-theme-dark .apexcharts-zoomin-icon svg,
.apexcharts-theme-dark .apexcharts-zoomout-icon svg {
  fill: #f3f4f5
}

.apexcharts-canvas .apexcharts-reset-zoom-icon.apexcharts-selected svg,
.apexcharts-canvas .apexcharts-selection-icon.apexcharts-selected svg,
.apexcharts-canvas .apexcharts-zoom-icon.apexcharts-selected svg {
  fill: #008ffb
}

.apexcharts-theme-light .apexcharts-menu-icon:hover svg,
.apexcharts-theme-light .apexcharts-reset-icon:hover svg,
.apexcharts-theme-light .apexcharts-selection-icon:not(.apexcharts-selected):hover svg,
.apexcharts-theme-light .apexcharts-zoom-icon:not(.apexcharts-selected):hover svg,
.apexcharts-theme-light .apexcharts-zoomin-icon:hover svg,
.apexcharts-theme-light .apexcharts-zoomout-icon:hover svg {
  fill: #333
}

.apexcharts-menu-icon,
.apexcharts-selection-icon {
  position: relative
}

.apexcharts-reset-icon {
  margin-left: 5px
}

.apexcharts-menu-icon,
.apexcharts-reset-icon,
.apexcharts-zoom-icon {
  transform: scale(.85)
}

.apexcharts-zoomin-icon,
.apexcharts-zoomout-icon {
  transform: scale(.7)
}

.apexcharts-zoomout-icon {
  margin-right: 3px
}

.apexcharts-pan-icon {
  transform: scale(.62);
  position: relative;
  left: 1px;
  top: 0
}

.apexcharts-pan-icon svg {
  fill: #fff;
  stroke: #6e8192;
  stroke-width: 2
}

.apexcharts-pan-icon.apexcharts-selected svg {
  stroke: #008ffb
}

.apexcharts-pan-icon:not(.apexcharts-selected):hover svg {
  stroke: #333
}

.apexcharts-toolbar {
  position: absolute;
  z-index: 11;
  max-width: 176px;
  text-align: right;
  border-radius: 3px;
  padding: 0 6px 2px;
  display: flex;
  justify-content: space-between;
  align-items: center
}

.apexcharts-menu {
  background: #fff;
  position: absolute;
  top: 100%;
  border: 1px solid #ddd;
  border-radius: 3px;
  padding: 3px;
  right: 10px;
  opacity: 0;
  min-width: 110px;
  transition: .15s ease all;
  pointer-events: none
}

.apexcharts-menu.apexcharts-menu-open {
  opacity: 1;
  pointer-events: all;
  transition: .15s ease all
}

.apexcharts-menu-item {
  padding: 6px 7px;
  font-size: 12px;
  cursor: pointer
}

.apexcharts-theme-light .apexcharts-menu-item:hover {
  background: #eee
}

.apexcharts-theme-dark .apexcharts-menu {
  background: rgba(0, 0, 0, .7);
  color: #fff
}

@media screen and (min-width:768px) {
  .apexcharts-canvas:hover .apexcharts-toolbar {
    opacity: 1
  }
}

.apexcharts-canvas .apexcharts-element-hidden,
.apexcharts-datalabel.apexcharts-element-hidden,
.apexcharts-hide .apexcharts-series-points {
  opacity: 0;
}

.apexcharts-hidden-element-shown {
  opacity: 1;
  transition: 0.25s ease all;
}

.apexcharts-datalabel,
.apexcharts-datalabel-label,
.apexcharts-datalabel-value,
.apexcharts-datalabels,
.apexcharts-pie-label {
  cursor: default;
  pointer-events: none
}

.apexcharts-pie-label-delay {
  opacity: 0;
  animation-name: opaque;
  animation-duration: .3s;
  animation-fill-mode: forwards;
  animation-timing-function: ease
}

.apexcharts-radialbar-label {
  cursor: pointer;
}

.apexcharts-annotation-rect,
.apexcharts-area-series .apexcharts-area,
.apexcharts-area-series .apexcharts-series-markers .apexcharts-marker.no-pointer-events,
.apexcharts-gridline,
.apexcharts-line,
.apexcharts-line-series .apexcharts-series-markers .apexcharts-marker.no-pointer-events,
.apexcharts-point-annotation-label,
.apexcharts-radar-series path:not(.apexcharts-marker),
.apexcharts-radar-series polygon,
.apexcharts-toolbar svg,
.apexcharts-tooltip .apexcharts-marker,
.apexcharts-xaxis-annotation-label,
.apexcharts-yaxis-annotation-label,
.apexcharts-zoom-rect {
  pointer-events: none
}

.apexcharts-tooltip-active .apexcharts-marker {
  transition: .15s ease all
}

.resize-triggers {
  animation: 1ms resizeanim;
  visibility: hidden;
  opacity: 0;
  height: 100%;
  width: 100%;
  overflow: hidden
}

.contract-trigger:before,
.resize-triggers,
.resize-triggers>div {
  content: " ";
  display: block;
  position: absolute;
  top: 0;
  left: 0
}

.resize-triggers>div {
  height: 100%;
  width: 100%;
  background: #eee;
  overflow: auto
}

.contract-trigger:before {
  overflow: hidden;
  width: 200%;
  height: 200%
}

.apexcharts-bar-goals-markers {
  pointer-events: none
}

.apexcharts-bar-shadows {
  pointer-events: none
}

.apexcharts-rangebar-goals-markers {
  pointer-events: none
}
</style></head>

<body>

	<div id="global-loader" style="display: none;">
		<div class="page-loader"></div>
	</div>

	<!-- Main Wrapper -->
	<div class="main-wrapper">

		<!-- Header -->
		<div class="header">
			<div class="main-header">

				<div class="header-left">
					<a href="index.html" class="logo">
						<img src="assets/img/logo.svg" alt="Logo">
					</a>
					<a href="index.html" class="dark-logo">
						<img src="assets/img/logo-white.svg" alt="Logo">
					</a>
				</div>

				<a id="mobile_btn" class="mobile_btn" href="#sidebar">
					<span class="bar-icon">
						<span></span>
						<span></span>
						<span></span>
					</span>
				</a>

				<div class="header-user">
					<div class="nav user-menu nav-list">

						<div class="me-auto d-flex align-items-center" id="header-search">
							<a id="toggle_btn" href="javascript:void(0);" class="btn btn-menubar me-1">
								<i class="ti ti-arrow-bar-to-left"></i>
							</a>
							<!-- Search -->
							<div class="input-group input-group-flat d-inline-flex me-1">
								<span class="input-icon-addon">
									<i class="ti ti-search"></i>
								</span>
								<input type="text" class="form-control" placeholder="Search in HRMS">
								<span class="input-group-text">
									<kbd>CTRL + / </kbd>
								</span>
							</div>
							<!-- /Search -->
							<div class="dropdown crm-dropdown">
								<a href="#" class="btn btn-menubar me-1" data-bs-toggle="dropdown">
									<i class="ti ti-layout-grid"></i>
								</a>
								<div class="dropdown-menu dropdown-lg dropdown-menu-start">
									<div class="card mb-0 border-0 shadow-none">
										<div class="card-header">
											<h4>CRM</h4>
										</div>
										<div class="card-body pb-1">		
											<div class="row">
												<div class="col-sm-6">							
													<a href="contacts.html" class="d-flex align-items-center justify-content-between p-2 crm-link mb-3">
														<span class="d-flex align-items-center me-3">
															<i class="ti ti-user-shield text-default me-2"></i>Contacts
														</span>
														<i class="ti ti-arrow-right"></i>
													</a>							
													<a href="deals-grid.html" class="d-flex align-items-center justify-content-between p-2 crm-link mb-3">
														<span class="d-flex align-items-center me-3">
															<i class="ti ti-heart-handshake text-default me-2"></i>Deals
														</span>
														<i class="ti ti-arrow-right"></i>
													</a>								
													<a href="pipeline.html" class="d-flex align-items-center justify-content-between p-2 crm-link mb-3">
														<span class="d-flex align-items-center me-3">
															<i class="ti ti-timeline-event-text text-default me-2"></i>Pipeline
														</span>
														<i class="ti ti-arrow-right"></i>
													</a>		
												</div>
												<div class="col-sm-6">							
													<a href="companies-grid.html" class="d-flex align-items-center justify-content-between p-2 crm-link mb-3">
														<span class="d-flex align-items-center me-3">
															<i class="ti ti-building text-default me-2"></i>Companies
														</span>
														<i class="ti ti-arrow-right"></i>
													</a>								
													<a href="leads-grid.html" class="d-flex align-items-center justify-content-between p-2 crm-link mb-3">
														<span class="d-flex align-items-center me-3">
															<i class="ti ti-user-check text-default me-2"></i>Leads
														</span>
														<i class="ti ti-arrow-right"></i>
													</a>								
													<a href="activity.html" class="d-flex align-items-center justify-content-between p-2 crm-link mb-3">
														<span class="d-flex align-items-center me-3">
															<i class="ti ti-activity text-default me-2"></i>Activities
														</span>
														<i class="ti ti-arrow-right"></i>
													</a>		
												</div>
											</div>		
										</div>
									</div>
								</div>
							</div>
							<a href="profile-settings.html" class="btn btn-menubar">
								<i class="ti ti-settings-cog"></i>
							</a>	
						</div>

						<!-- Horizontal Single -->
						<div class="sidebar sidebar-horizontal" id="horizontal-single">
							<div class="sidebar-menu">
								<div class="main-menu">
									<ul class="nav-menu">
										<li class="menu-title">
											<span>Main</span>
										</li>
										<li class="submenu">
											<a href="#" class="active">
												<i class="ti ti-smart-home"></i><span>Dashboard</span>
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li><a href="index.html" class="active">Admin Dashboard</a></li>
												<li><a href="employee-dashboard.html">Employee Dashboard</a></li>
												<li><a href="deals-dashboard.html">Deals Dashboard</a></li>
												<li><a href="leads-dashboard.html">Leads Dashboard</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="#">
												<i class="ti ti-user-star"></i><span>Super Admin</span>
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li><a href="dashboard.html">Dashboard</a></li>
												<li><a href="companies.html">Companies</a></li>
												<li><a href="subscription.html">Subscriptions</a></li>
												<li><a href="packages.html">Packages</a></li>
												<li><a href="domain.html">Domain</a></li>
												<li><a href="purchase-transaction.html">Purchase Transaction</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="#">
												<i class="ti ti-layout-grid-add"></i><span>Applications</span>
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li><a href="chat.html">Chat</a></li>
												<li class="submenu submenu-two">
													<a href="call.html">Calls<span class="menu-arrow inside-submenu"></span></a>
													<ul>
														<li><a href="voice-call.html">Voice Call</a></li>
														<li><a href="video-call.html">Video Call</a></li>
														<li><a href="outgoing-call.html">Outgoing Call</a></li>
														<li><a href="incoming-call.html">Incoming Call</a></li>
														<li><a href="call-history.html">Call History</a></li>
													</ul>
												</li>
												<li><a href="calendar.html">Calendar</a></li>
												<li><a href="email.html">Email</a></li>
												<li><a href="todo.html">To Do</a></li>
												<li><a href="notes.html">Notes</a></li>
												<li><a href="file-manager.html">File Manager</a></li>
												<li><a href="kanban-view.html">Kanban</a></li>
												<li><a href="invoices.html">Invoices</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="#">
												<i class="ti ti-layout-board-split"></i><span>Layouts</span>
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li>
													<a href="layout-horizontal.html">
														<span>Horizontal</span>
													</a>
												</li>
												<li>
													<a href="layout-detached.html">
														<span>Detached</span>
													</a>
												</li>
												<li>
													<a href="layout-modern.html">
														<span>Modern</span>
													</a>
												</li>
												<li>
													<a href="layout-two-column.html">
														<span>Two Column </span>
													</a>
												</li>
												<li>
													<a href="layout-hovered.html">
														<span>Hovered</span>
													</a>
												</li>
												<li>
													<a href="layout-box.html">
														<span>Boxed</span>
													</a>
												</li>
												<li>
													<a href="layout-horizontal-single.html">
														<span>Horizontal Single</span>
													</a>
												</li>
												<li>
													<a href="layout-horizontal-overlay.html">
														<span>Horizontal Overlay</span>
													</a>
												</li>
												<li>
													<a href="layout-horizontal-box.html">
														<span>Horizontal Box</span>
													</a>
												</li>
												<li>
													<a href="layout-horizontal-sidemenu.html">
														<span>Menu Aside</span>
													</a>
												</li>
												<li>
													<a href="layout-vertical-transparent.html">
														<span>Transparent</span>
													</a>
												</li>
												<li>
													<a href="layout-without-header.html">
														<span>Without Header</span>
													</a>
												</li>
												<li>
													<a href="layout-rtl.html">
														<span>RTL</span>
													</a>
												</li>
												<li>
													<a href="layout-dark.html">
														<span>Dark</span>
													</a>
												</li>
											</ul>
										</li>
										<li class="submenu">
											<a href="#">
												<i class="ti ti-user-star"></i><span>Projects</span>
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li>
													<a href="clients-grid.html"><span>Clients</span>
													</a>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);"><span>Projects</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="projects-grid.html">Projects</a></li>
														<li><a href="tasks.html">Tasks</a></li>
														<li><a href="task-board.html">Task Board</a></li>
													</ul>
												</li>		
												<li class="submenu">
													<a href="call.html">Crm<span class="menu-arrow"></span></a>
													<ul>
														<li><a href="contacts-grid.html"><span>Contacts</span></a></li>
														<li><a href="companies-grid.html"><span>Companies</span></a></li>
														<li><a href="deals-grid.html"><span>Deals</span></a></li>
														<li><a href="leads-grid.html"><span>Leads</span></a></li>
														<li><a href="pipeline.html"><span>Pipeline</span></a></li>
														<li><a href="analytics.html"><span>Analytics</span></a></li>
														<li><a href="activity.html"><span>Activities</span></a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);"><span>Employees</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="employees.html">Employee Lists</a></li>
														<li><a href="employees-grid.html">Employee Grid</a></li>
														<li><a href="employee-details.html">Employee Details</a></li>
														<li><a href="departments.html">Departments</a></li>
														<li><a href="designations.html">Designations</a></li>
														<li><a href="policy.html">Policies</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);"><span>Tickets</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="tickets.html">Tickets</a></li>
														<li><a href="ticket-details.html">Ticket Details</a></li>
													</ul>
												</li>
												<li><a href="holidays.html"><span>Holidays</span></a></li>
												<li class="submenu">
													<a href="javascript:void(0);"><span>Attendance</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li class="submenu">
															<a href="javascript:void(0);">Leaves<span class="menu-arrow"></span></a>
															<ul>
																<li><a href="leaves.html">Leaves (Admin)</a></li>
																<li><a href="leaves-employee.html">Leave (Employee)</a></li>
																<li><a href="leave-settings.html">Leave Settings</a></li>												
															</ul>												
														</li>
														<li><a href="attendance-admin.html">Attendance (Admin)</a></li>
														<li><a href="attendance-employee.html">Attendance (Employee)</a></li>
														<li><a href="timesheets.html">Timesheets</a></li>
														<li><a href="schedule-timing.html">Shift &amp; Schedule</a></li>
														<li><a href="overtime.html">Overtime</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);"><span>Performance</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="performance-indicator.html">Performance Indicator</a></li>
														<li><a href="performance-review.html">Performance Review</a></li>
														<li><a href="performance-appraisal.html">Performance Appraisal</a></li>
														<li><a href="goal-tracking.html">Goal List</a></li>
														<li><a href="goal-type.html">Goal Type</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);"><span>Training</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="training.html">Training List</a></li>
														<li><a href="trainers.html">Trainers</a></li>
														<li><a href="training-type.html">Training Type</a></li>
													</ul>
												</li>
												<li><a href="promotion.html"><span>Promotion</span></a></li>
												<li><a href="resignation.html"><span>Resignation</span></a></li>
												<li><a href="termination.html"><span>Termination</span></a></li>														
											</ul>
										</li>
										<li class="submenu">
											<a href="#">
												<i class="ti ti-user-star"></i><span>Administration</span>
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li class="submenu">
													<a href="javascript:void(0);"><span>Sales</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="estimates.html">Estimates</a></li>
														<li><a href="invoices.html">Invoices</a></li>
														<li><a href="payments.html">Payments</a></li>
														<li><a href="expenses.html">Expenses</a></li>
														<li><a href="provident-fund.html">Provident Fund</a></li>
														<li><a href="taxes.html">Taxes</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);"><span>Accounting</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="categories.html">Categories</a></li>
														<li><a href="budgets.html">Budgets</a></li>
														<li><a href="budget-expenses.html">Budget Expenses</a></li>
														<li><a href="budget-revenues.html">Budget Revenues</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);"><span>Payroll</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="employee-salary.html">Employee Salary</a></li>
														<li><a href="payslip.html">Payslip</a></li>
														<li><a href="payroll.html">Payroll Items</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);"><span>Assets</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="assets.html">Assets</a></li>
														<li><a href="asset-categories.html">Asset Categories</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);"><span>Help &amp; Supports</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="knowledgebase.html">Knowledge Base</a></li>
														<li><a href="activity.html">Activities</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);"><span>User Management</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="users.html">Users</a></li>
														<li><a href="roles-permissions.html">Roles &amp; Permissions</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);"><span>Reports</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="expenses-report.html">Expense Report</a></li>
														<li><a href="invoice-report.html">Invoice Report</a></li>
														<li><a href="payment-report.html">Payment Report</a></li>
														<li><a href="project-report.html">Project Report</a></li>
														<li><a href="task-report.html">Task Report</a></li>
														<li><a href="user-report.html">User Report</a></li>
														<li><a href="employee-report.html">Employee Report</a></li>
														<li><a href="payslip-report.html">Payslip Report</a></li>
														<li><a href="attendance-report.html">Attendance Report</a></li>
														<li><a href="leave-report.html">Leave Report</a></li>
														<li><a href="daily-report.html">Daily Report</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);"><span>Settings</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li class="submenu">
															<a href="javascript:void(0);">General Settings<span class="menu-arrow"></span></a>
															<ul>
																<li><a href="profile-settings.html">Profile</a></li>
																<li><a href="security-settings.html">Security</a></li>
																<li><a href="notification-settings.html">Notifications</a></li>
																<li><a href="connected-apps.html">Connected Apps</a></li>
															</ul>
														</li>
														<li class="submenu">
															<a href="javascript:void(0);">Website Settings<span class="menu-arrow"></span></a>
															<ul>
																<li><a href="bussiness-settings.html">Business Settings</a></li>
																<li><a href="seo-settings.html">SEO Settings</a></li>
																<li><a href="localization-settings.html">Localization</a></li>
																<li><a href="prefixes.html">Prefixes</a></li>
																<li><a href="preferences.html">Preferences</a></li>
																<li><a href="performance-appraisal.html">Appearance</a></li>
																<li><a href="language.html">Language</a></li>
																<li><a href="authentication-settings.html">Authentication</a></li>
																<li><a href="ai-settings.html">AI Settings</a></li>
															</ul>
														</li>
														<li class="submenu">
															<a href="javascript:void(0);">App Settings<span class="menu-arrow"></span></a>
															<ul>
																<li><a href="salary-settings.html">Salary Settings</a></li>
																<li><a href="approval-settings.html">Approval Settings</a></li>
																<li><a href="invoice-settings.html">Invoice Settings</a></li>
																<li><a href="leave-type.html">Leave Type</a></li>
																<li><a href="custom-fields.html">Custom Fields</a></li>
															</ul>
														</li>
														<li class="submenu">
															<a href="javascript:void(0);">System Settings<span class="menu-arrow"></span></a>
															<ul>
																<li><a href="email-settings.html">Email Settings</a></li>
																<li><a href="email-template.html">Email Templates</a></li>
																<li><a href="sms-settings.html">SMS Settings</a></li>
																<li><a href="sms-template.html">SMS Templates</a></li>
																<li><a href="otp-settings.html">OTP</a></li>
																<li><a href="gdpr.html">GDPR Cookies</a></li>
																<li><a href="maintenance-mode.html">Maintenance Mode</a></li>
															</ul>
														</li>
														<li class="submenu">
															<a href="javascript:void(0);">Financial Settings<span class="menu-arrow"></span></a>
															<ul>
																<li><a href="payment-gateways.html">Payment Gateways</a></li>
																<li><a href="tax-rates.html">Tax Rate</a></li>
																<li><a href="currencies.html">Currencies</a></li>
															</ul>
														</li>
														<li class="submenu">
															<a href="javascript:void(0);">Other Settings<span class="menu-arrow"></span></a>
															<ul>
																<li><a href="custom-css.html">Custom CSS</a></li>
																<li><a href="custom-js.html">Custom JS</a></li>
																<li><a href="cronjob.html">Cronjob</a></li>
																<li><a href="storage-settings.html">Storage</a></li>
																<li><a href="ban-ip-address.html">Ban IP Address</a></li>
																<li><a href="backup.html">Backup</a></li>
																<li><a href="clear-cache.html">Clear Cache</a></li>
															</ul>
														</li>
													</ul>
												</li>
											</ul>
										</li>
										<li class="submenu">
											<a href="#">
												<i class="ti ti-page-break"></i><span>Pages</span>
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li><a href="starter.html"><span>Starter</span></a></li>
												<li><a href="profile.html"><span>Profile</span></a></li>
												<li><a href="gallery.html"><span>Gallery</span></a></li>
												<li><a href="search-result.html"><span>Search Results</span></a></li>
												<li><a href="timeline.html"><span>Timeline</span></a></li>
												<li><a href="pricing.html"><span>Pricing</span></a></li>
												<li><a href="coming-soon.html"><span>Coming Soon</span></a></li>
												<li><a href="under-maintenance.html"><span>Under Maintenance</span></a></li>
												<li><a href="under-construction.html"><span>Under Construction</span></a></li>
												<li><a href="api-keys.html"><span>API Keys</span></a></li>
												<li><a href="privacy-policy.html"><span>Privacy Policy</span></a></li>
												<li><a href="terms-condition.html"><span>Terms &amp; Conditions</span></a></li>
												<li class="submenu">
													<a href="#"><span>Content</span> <span class="menu-arrow"></span></a>
													<ul>
														<li><a href="pages.html">Pages</a></li>
														<li class="submenu">
															<a href="javascript:void(0);">Blogs<span class="menu-arrow"></span></a>
															<ul>
																<li><a href="blogs.html">All Blogs</a></li>
																<li><a href="blog-categories.html">Categories</a></li>
																<li><a href="blog-comments.html">Comments</a></li>
																<li><a href="blog-tags.html">Tags</a></li>
															</ul>
														</li>
														<li class="submenu">
															<a href="javascript:void(0);">Locations<span class="menu-arrow"></span></a>
															<ul>
																<li><a href="countries.html">Countries</a></li>
																<li><a href="states.html">States</a></li>
																<li><a href="cities.html">Cities</a></li>
															</ul>
														</li>
														<li><a href="testimonials.html">Testimonials</a></li>
														<li><a href="faq.html">FAQ’S</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="#">
														<span>Authentication</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li class="submenu">
															<a href="javascript:void(0);" class="">Login<span class="menu-arrow"></span></a>
															<ul>
																<li><a href="login.html">Cover</a></li>
																<li><a href="login-2.html">Illustration</a></li>
																<li><a href="login-3.html">Basic</a></li>
															</ul>
														</li>
														<li class="submenu">
															<a href="javascript:void(0);" class="">Register<span class="menu-arrow"></span></a>
															<ul>
																<li><a href="register.html">Cover</a></li>
																<li><a href="register-2.html">Illustration</a></li>
																<li><a href="register-3.html">Basic</a></li>
															</ul>
														</li>
														<li class="submenu"><a href="javascript:void(0);">Forgot Password<span class="menu-arrow"></span></a>
															<ul>
																<li><a href="forgot-password.html">Cover</a></li>
																<li><a href="forgot-password-2.html">Illustration</a></li>
																<li><a href="forgot-password-3.html">Basic</a></li>
															</ul>
														</li>
														<li class="submenu">
															<a href="javascript:void(0);">Reset Password<span class="menu-arrow"></span></a>
															<ul>
																<li><a href="reset-password.html">Cover</a></li>
																<li><a href="reset-password-2.html">Illustration</a></li>
																<li><a href="reset-password-3.html">Basic</a></li>
															</ul>
														</li>
														<li class="submenu">
															<a href="javascript:void(0);">Email Verification<span class="menu-arrow"></span></a>
															<ul>
																<li><a href="email-verification.html">Cover</a></li>
																<li><a href="email-verification-2.html">Illustration</a></li>
																<li><a href="email-verification-3.html">Basic</a></li>
															</ul>
														</li>
														<li class="submenu">
															<a href="javascript:void(0);">2 Step Verification<span class="menu-arrow"></span></a>
															<ul>
																<li><a href="two-step-verification.html">Cover</a></li>
																<li><a href="two-step-verification-2.html">Illustration</a></li>
																<li><a href="two-step-verification-3.html">Basic</a></li>
															</ul>
														</li>
														<li><a href="lock-screen.html">Lock Screen</a></li>
														<li><a href="error-404.html">404 Error</a></li>
														<li><a href="error-500.html">500 Error</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="#">
														<span>UI Interface</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li class="submenu">
															<a href="javascript:void(0);">
																<i class="ti ti-hierarchy-2"></i>
																<span>Base UI</span>
																<span class="menu-arrow"></span>
															</a>
															<ul>
																<li>
																	<a href="ui-alerts.html">Alerts</a>
																</li>
																<li>
																	<a href="ui-accordion.html">Accordion</a>
																</li>
																<li>
																	<a href="ui-avatar.html">Avatar</a>
																</li>
																<li>
																	<a href="ui-badges.html">Badges</a>
																</li>
																<li>
																	<a href="ui-borders.html">Border</a>
																</li>
																<li>
																	<a href="ui-buttons.html">Buttons</a>
																</li>
																<li>
																	<a href="ui-buttons-group.html">Button Group</a>
																</li>
																<li>
																	<a href="ui-breadcrumb.html">Breadcrumb</a>
																</li>
																<li>
																	<a href="ui-cards.html">Card</a>
																</li>
																<li>
																	<a href="ui-carousel.html">Carousel</a>
																</li>
																<li>
																	<a href="ui-colors.html">Colors</a>
																</li>
																<li>
																	<a href="ui-dropdowns.html">Dropdowns</a>
																</li>
																<li>
																	<a href="ui-grid.html">Grid</a>
																</li>
																<li>
																	<a href="ui-images.html">Images</a>
																</li>
																<li>
																	<a href="ui-lightbox.html">Lightbox</a>
																</li>
																<li>
																	<a href="ui-media.html">Media</a>
																</li>
																<li>
																	<a href="ui-modals.html">Modals</a>
																</li>
																<li>
																	<a href="ui-offcanvas.html">Offcanvas</a>
																</li>
																<li>
																	<a href="ui-pagination.html">Pagination</a>
																</li>
																<li>
																	<a href="ui-popovers.html">Popovers</a>
																</li>
																<li>
																	<a href="ui-progress.html">Progress</a>
																</li>
																<li>
																	<a href="ui-placeholders.html">Placeholders</a>
																</li>
																<li>
																	<a href="ui-spinner.html">Spinner</a>
																</li>
																<li>
																	<a href="ui-sweetalerts.html">Sweet Alerts</a>
																</li>
																<li>
																	<a href="ui-nav-tabs.html">Tabs</a>
																</li>
																<li>
																	<a href="ui-toasts.html">Toasts</a>
																</li>
																<li>
																	<a href="ui-tooltips.html">Tooltips</a>
																</li>
																<li>
																	<a href="ui-typography.html">Typography</a>
																</li>
																<li>
																	<a href="ui-video.html">Video</a>
																</li>
																<li>
																	<a href="ui-sortable.html">Sortable</a>
																</li>
																<li>
																	<a href="ui-swiperjs.html">Swiperjs</a>
																</li>
															</ul>
														</li>
														<li class="submenu">
															<a href="javascript:void(0);">
																<i class="ti ti-hierarchy-3"></i>
																<span>Advanced UI</span>
																<span class="menu-arrow"></span>
															</a>
															<ul>
																<li>
																	<a href="ui-ribbon.html">Ribbon</a>
																</li>
																<li>
																	<a href="ui-clipboard.html">Clipboard</a>
																</li>
																<li>
																	<a href="ui-drag-drop.html">Drag &amp; Drop</a>
																</li>
																<li>
																	<a href="ui-rangeslider.html">Range Slider</a>
																</li>
																<li>
																	<a href="ui-rating.html">Rating</a>
																</li>
																<li>
																	<a href="ui-text-editor.html">Text Editor</a>
																</li>
																<li>
																	<a href="ui-counter.html">Counter</a>
																</li>
																<li>
																	<a href="ui-scrollbar.html">Scrollbar</a>
																</li>
																<li>
																	<a href="ui-stickynote.html">Sticky Note</a>
																</li>
																<li>
																	<a href="ui-timeline.html">Timeline</a>
																</li>
															</ul>
														</li>
														<li class="submenu">
															<a href="javascript:void(0);">
																<i class="ti ti-input-search"></i>
																<span>Forms</span>
																<span class="menu-arrow"></span>
															</a>
															<ul>
																<li class="submenu submenu-two">
																	<a href="javascript:void(0);">Form Elements <span class="menu-arrow inside-submenu"></span>
																	</a>
																	<ul>
																		<li>
																			<a href="form-basic-inputs.html">Basic Inputs</a>
																		</li>
																		<li>
																			<a href="form-checkbox-radios.html">Checkbox &amp; Radios</a>
																		</li>
																		<li>
																			<a href="form-input-groups.html">Input Groups</a>
																		</li>
																		<li>
																			<a href="form-grid-gutters.html">Grid &amp; Gutters</a>
																		</li>
																		<li>
																			<a href="form-select.html">Form Select</a>
																		</li>
																		<li>
																			<a href="form-mask.html">Input Masks</a>
																		</li>
																		<li>
																			<a href="form-fileupload.html">File Uploads</a>
																		</li>
																	</ul>
																</li>
																<li class="submenu submenu-two">
																	<a href="javascript:void(0);">Layouts <span class="menu-arrow inside-submenu"></span>
																	</a>
																	<ul>
																		<li>
																			<a href="form-horizontal.html">Horizontal Form</a>
																		</li>
																		<li>
																			<a href="form-vertical.html">Vertical Form</a>
																		</li>
																		<li>
																			<a href="form-floating-labels.html">Floating Labels</a>
																		</li>
																	</ul>
																</li>
																<li>
																	<a href="form-validation.html">Form Validation</a>
																</li>
																
																<li>
																	<a href="form-select2.html">Select2</a>
																</li>
																<li>
																	<a href="form-wizard.html">Form Wizard</a>
																</li>
																<li>
																	<a href="form-pickers.html">Form Pickers</a>
																</li>
																
															</ul>
														</li>
														<li class="submenu">
															<a href="javascript:void(0);">
																<i class="ti ti-table-plus"></i>
																<span>Tables</span>
																<span class="menu-arrow"></span>
															</a>
															<ul>
																<li>
																	<a href="tables-basic.html">Basic Tables </a>
																</li>
																<li>
																	<a href="data-tables.html">Data Table </a>
																</li>
															</ul>
														</li>
														<li class="submenu">
															<a href="javascript:void(0);">
																<i class="ti ti-chart-line"></i>
																<span>Charts</span>
																<span class="menu-arrow"></span>
															</a>
															<ul>
																<li>
																	<a href="chart-apex.html">Apex Charts</a>
																</li>
																<li>
																	<a href="chart-c3.html">Chart C3</a>
																</li>
																<li>
																	<a href="chart-js.html">Chart Js</a>
																</li>
																<li>
																	<a href="chart-morris.html">Morris Charts</a>
																</li>
																<li>
																	<a href="chart-flot.html">Flot Charts</a>
																</li>
																<li>
																	<a href="chart-peity.html">Peity Charts</a>
																</li>
															</ul>
														</li>
														<li class="submenu">
															<a href="javascript:void(0);">
																<i class="ti ti-icons"></i>
																<span>Icons</span>
																<span class="menu-arrow"></span>
															</a>
															<ul>
																<li>
																	<a href="icon-fontawesome.html">Fontawesome Icons</a>
																</li>
																<li>
																	<a href="icon-tabler.html">Tabler Icons</a>
																</li>
																<li>
																	<a href="icon-bootstrap.html">Bootstrap Icons</a>
																</li>
																<li>
																	<a href="icon-remix.html">Remix Icons</a>
																</li>
																<li>
																	<a href="icon-feather.html">Feather Icons</a>
																</li>
																<li>
																	<a href="icon-ionic.html">Ionic Icons</a>
																</li>
																<li>
																	<a href="icon-material.html">Material Icons</a>
																</li>
																<li>
																	<a href="icon-pe7.html">Pe7 Icons</a>
																</li>
																<li>
																	<a href="icon-simpleline.html">Simpleline Icons</a>
																</li>
																<li>
																	<a href="icon-themify.html">Themify Icons</a>
																</li>
																<li>
																	<a href="icon-weather.html">Weather Icons</a>
																</li>
																<li>
																	<a href="icon-typicon.html">Typicon Icons</a>
																</li>
																<li>
																	<a href="icon-flag.html">Flag Icons</a>
																</li>
															</ul>
														</li>
														<li class="submenu">
															<a href="javascript:void(0);">
																<i class="ti ti-table-plus"></i>
																<span>Maps</span>
																<span class="menu-arrow"></span>
															</a>
															<ul>
																<li>
																	<a href="maps-vector.html">Vector</a>
																</li>
																<li>
																	<a href="maps-leaflet.html">Leaflet</a>
																</li>
															</ul>
														</li>
													</ul>
												</li>
												<li><a href="#">Documentation</a></li>
												<li><a href="#">Change Log</a></li>
												<li class="submenu">
													<a href="javascript:void(0);"><span>Multi Level</span><span class="menu-arrow"></span></a>
													<ul>
														<li><a href="javascript:void(0);">Multilevel 1</a></li>
														<li class="submenu submenu-two">
															<a href="javascript:void(0);">Multilevel 2<span class="menu-arrow inside-submenu"></span></a>
															<ul>
																<li><a href="javascript:void(0);">Multilevel 2.1</a></li>
																<li class="submenu submenu-two submenu-three">
																	<a href="javascript:void(0);">Multilevel 2.2<span class="menu-arrow inside-submenu inside-submenu-two"></span></a>
																	<ul>
																		<li><a href="javascript:void(0);">Multilevel 2.2.1</a></li>
																		<li><a href="javascript:void(0);">Multilevel 2.2.2</a></li>
																	</ul>
																</li>
															</ul>
														</li>
														<li><a href="javascript:void(0);">Multilevel 3</a></li>
													</ul>
												</li>
											</ul>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- /Horizontal Single -->

						<div class="d-flex align-items-center">
							<div class="me-1">
								<a href="#" class="btn btn-menubar btnFullscreen">
									<i class="ti ti-maximize"></i>
								</a>
							</div>
							<div class="dropdown me-1">
								<a href="#" class="btn btn-menubar" data-bs-toggle="dropdown">
									<i class="ti ti-layout-grid-remove"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<div class="card mb-0 border-0 shadow-none">
										<div class="card-header">
											<h4>Applications</h4>
										</div>
										<div class="card-body">											
											<a href="calendar.html" class="d-block pb-2">
												<span class="avatar avatar-md bg-transparent-dark me-2"><i class="ti ti-calendar text-gray-9"></i></span>Calendar
											</a>										
											<a href="todo.html" class="d-block py-2">
												<span class="avatar avatar-md bg-transparent-dark me-2"><i class="ti ti-subtask text-gray-9"></i></span>To Do
											</a>										
											<a href="notes.html" class="d-block py-2">
												<span class="avatar avatar-md bg-transparent-dark me-2"><i class="ti ti-notes text-gray-9"></i></span>Notes
											</a>										
											<a href="file-manager.html" class="d-block py-2">
												<span class="avatar avatar-md bg-transparent-dark me-2"><i class="ti ti-folder text-gray-9"></i></span>File Manager
											</a>								
											<a href="kanban-view.html" class="d-block py-2">
												<span class="avatar avatar-md bg-transparent-dark me-2"><i class="ti ti-layout-kanban text-gray-9"></i></span>Kanban
											</a>								
											<a href="invoices.html" class="d-block py-2 pb-0">
												<span class="avatar avatar-md bg-transparent-dark me-2"><i class="ti ti-file-invoice text-gray-9"></i></span>Invoices
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="me-1">
								<a href="chat.html" class="btn btn-menubar position-relative">
									<i class="ti ti-brand-hipchat"></i>
									<span class="badge bg-info rounded-pill d-flex align-items-center justify-content-center header-badge">5</span>
								</a>
							</div>
							<div class="me-1">
								<a href="email.html" class="btn btn-menubar">
									<i class="ti ti-mail"></i>
								</a>
							</div>
							<div class="me-1 notification_item">
								<a href="#" class="btn btn-menubar position-relative me-1" id="notification_popup" data-bs-toggle="dropdown">
									<i class="ti ti-bell"></i>
									<span class="notification-status-dot"></span>
								</a>
								<div class="dropdown-menu dropdown-menu-end notification-dropdown p-4">
									<div class="d-flex align-items-center justify-content-between border-bottom p-0 pb-3 mb-3">
										<h4 class="notification-title">Notifications (2)</h4>
										<div class="d-flex align-items-center">
											<a href="#" class="text-primary fs-15 me-3 lh-1">Mark all as read</a>
											<div class="dropdown">
												<a href="javascript:void(0);" class="bg-white dropdown-toggle" data-bs-toggle="dropdown">
													<i class="ti ti-calendar-due me-1"></i>Today
												</a>
												<ul class="dropdown-menu mt-2 p-3">
													<li>
														<a href="javascript:void(0);" class="dropdown-item rounded-1">
															This Week
														</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item rounded-1">
															Last Week
														</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item rounded-1">
															Last Month
														</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
									<div class="noti-content">
										<div class="d-flex flex-column">
											<div class="border-bottom mb-3 pb-3">
												<a href="activity.html">
													<div class="d-flex">
														<span class="avatar avatar-lg me-2 flex-shrink-0">
															<img src="assets/img/profiles/avatar-27.jpg" alt="Profile">
														</span>
														<div class="flex-grow-1">
															<p class="mb-1"><span class="text-dark fw-semibold">Shawn</span>
																performance in Math is below the threshold.</p>
															<span>Just Now</span>
														</div>
													</div>
												</a>
											</div>
											<div class="border-bottom mb-3 pb-3">
												<a href="activity.html" class="pb-0">
													<div class="d-flex">
														<span class="avatar avatar-lg me-2 flex-shrink-0">
															<img src="assets/img/profiles/avatar-23.jpg" alt="Profile">
														</span>
														<div class="flex-grow-1">
															<p class="mb-1"><span class="text-dark fw-semibold">Sylvia</span> added
																appointment on 02:00 PM</p>
															<span>10 mins ago</span>
															<div class="d-flex justify-content-start align-items-center mt-1">
																<span class="btn btn-light btn-sm me-2">Deny</span>
																<span class="btn btn-primary btn-sm">Approve</span>
															</div>
														</div>
													</div>
												</a>
											</div>
											<div class="border-bottom mb-3 pb-3">
												<a href="activity.html">
													<div class="d-flex">
														<span class="avatar avatar-lg me-2 flex-shrink-0">
															<img src="assets/img/profiles/avatar-25.jpg" alt="Profile">
														</span>
														<div class="flex-grow-1">
															<p class="mb-1">New student record <span class="text-dark fw-semibold"> George</span> is created by <span class="text-dark fw-semibold">Teressa</span></p>
															<span>2 hrs ago</span>
														</div>
													</div>
												</a>
											</div>
											<div class="border-0 mb-3 pb-0">
												<a href="activity.html">
													<div class="d-flex">
														<span class="avatar avatar-lg me-2 flex-shrink-0">
															<img src="assets/img/profiles/avatar-01.jpg" alt="Profile">
														</span>
														<div class="flex-grow-1">
															<p class="mb-1">A new teacher record for <span class="text-dark fw-semibold">Elisa</span> </p>
															<span>09:45 AM</span>
														</div>
													</div>
												</a>
											</div>
										</div>
									</div>
									<div class="d-flex p-0">
										<a href="#" class="btn btn-light w-100 me-2">Cancel</a>
										<a href="activity.html" class="btn btn-primary w-100">View All</a>
									</div>
								</div>
							</div>
							<div class="dropdown profile-dropdown">
								<a href="javascript:void(0);" class="dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
									<span class="avatar avatar-sm online">
										<img src="assets/img/profiles/avatar-12.jpg" alt="Img" class="img-fluid rounded-circle">
									</span>
								</a>
								<div class="dropdown-menu shadow-none">
									<div class="card mb-0">
										<div class="card-header">
											<div class="d-flex align-items-center">
												<span class="avatar avatar-lg me-2 avatar-rounded">
													<img src="assets/img/profiles/avatar-12.jpg" alt="img">
												</span>
												<div>
													<h5 class="mb-0">Kevin Larry</h5>
													<p class="fs-12 fw-medium mb-0">warren@example.com</p>
												</div>
											</div>
										</div>
										<div class="card-body">
											<a class="dropdown-item d-inline-flex align-items-center p-0 py-2" href="profile.html">
												<i class="ti ti-user-circle me-1"></i>My Profile
											</a>
											<a class="dropdown-item d-inline-flex align-items-center p-0 py-2" href="bussiness-settings.html">
												<i class="ti ti-settings me-1"></i>Settings
											</a>
											
											<a class="dropdown-item d-inline-flex align-items-center p-0 py-2" href="profile-settings.html">
												<i class="ti ti-circle-arrow-up me-1"></i>My Account
											</a>
											<a class="dropdown-item d-inline-flex align-items-center p-0 py-2" href="knowledgebase.html">
												<i class="ti ti-question-mark me-1"></i>Knowledge Base
											</a>
										</div>
										<div class="card-footer">
											<a class="dropdown-item d-inline-flex align-items-center p-0 py-2" href="login.html">
												<i class="ti ti-login me-2"></i>Logout
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Mobile Menu -->
				<div class="dropdown mobile-user-menu">
					<a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
					<div class="dropdown-menu dropdown-menu-end">
						<a class="dropdown-item" href="profile.html">My Profile</a>
						<a class="dropdown-item" href="profile-settings.html">Settings</a>
						<a class="dropdown-item" href="login.html">Logout</a>
					</div>
				</div>
				<!-- /Mobile Menu -->

			</div>

		</div>
		<!-- /Header -->

		<!-- Sidebar -->
		<div class="sidebar" id="sidebar">
			<!-- Logo -->
			<div class="sidebar-logo">
				<a href="index.html" class="logo logo-normal">
					<img src="assets/img/logo.svg" alt="Logo">
				</a>
				<a href="index.html" class="logo-small">
					<img src="assets/img/logo-small.svg" alt="Logo">
				</a>
				<a href="index.html" class="dark-logo">
					<img src="assets/img/logo-white.svg" alt="Logo">
				</a>
			</div>
			<!-- /Logo -->
			<div class="modern-profile p-3 pb-0">
				<div class="text-center rounded bg-light p-3 mb-4 user-profile">
					<div class="avatar avatar-lg online mb-3">
						<img src="assets/img/profiles/avatar-02.jpg" alt="Img" class="img-fluid rounded-circle">
					</div>
					<h6 class="fs-12 fw-normal mb-1">Adrian Herman</h6>
					<p class="fs-10">System Admin</p>
				</div>
				<div class="sidebar-nav mb-3">
					<ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified bg-transparent" role="tablist">
						<li class="nav-item"><a class="nav-link active border-0" href="#">Menu</a></li>
						<li class="nav-item"><a class="nav-link border-0" href="chat.html">Chats</a></li>
						<li class="nav-item"><a class="nav-link border-0" href="email.html">Inbox</a></li>
					</ul>
				</div>
			</div>
			<div class="sidebar-header p-3 pb-0 pt-2">
				<div class="text-center rounded bg-light p-2 mb-4 sidebar-profile d-flex align-items-center">
					<div class="avatar avatar-md onlin">
						<img src="assets/img/profiles/avatar-02.jpg" alt="Img" class="img-fluid rounded-circle">
					</div>
					<div class="text-start sidebar-profile-info ms-2">
						<h6 class="fs-12 fw-normal mb-1">Adrian Herman</h6>
						<p class="fs-10">System Admin</p>
					</div>
				</div>
				<div class="input-group input-group-flat d-inline-flex mb-4">
					<span class="input-icon-addon">
						<i class="ti ti-search"></i>
					</span>
					<input type="text" class="form-control" placeholder="Search in HRMS">
					<span class="input-group-text">
						<kbd>CTRL + / </kbd>
					</span>
				</div>
				<div class="d-flex align-items-center justify-content-between menu-item mb-3">
					<div class="me-3">
						<a href="calendar.html" class="btn btn-menubar">
							<i class="ti ti-layout-grid-remove"></i>
						</a>
					</div>
					<div class="me-3">
						<a href="chat.html" class="btn btn-menubar position-relative">
							<i class="ti ti-brand-hipchat"></i>
							<span class="badge bg-info rounded-pill d-flex align-items-center justify-content-center header-badge">5</span>
						</a>
					</div>
					<div class="me-3 notification-item">
						<a href="activity.html" class="btn btn-menubar position-relative me-1">
							<i class="ti ti-bell"></i>
							<span class="notification-status-dot"></span>
						</a>
					</div>
					<div class="me-0">
						<a href="email.html" class="btn btn-menubar">
							<i class="ti ti-message"></i>
						</a>
					</div>
				</div>
			</div>
			<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: 100%; height: 990px;"><div class="sidebar-inner slimscroll" style="overflow: hidden; width: 100%; height: 958px;">
				<div id="sidebar-menu" class="sidebar-menu">
					<ul>
						<li class="menu-title"><span>MAIN MENU</span></li>
						<li>
							<ul>
								<li class="submenu">
									<a href="javascript:void(0);" class="active subdrop">
										<i class="ti ti-smart-home"></i>
										<span>Dashboard</span>
										<span class="badge badge-danger fs-10 fw-medium text-white p-1">Hot</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="index.html" class="active">Admin Dashboard</a></li>
										<li><a href="employee-dashboard.html">Employee Dashboard</a></li>
										<li><a href="deals-dashboard.html">Deals Dashboard</a></li>
										<li><a href="leads-dashboard.html">Leads Dashboard</a></li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">
										<i class="ti ti-layout-grid-add"></i><span>Applications</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="chat.html">Chat</a></li>
										<li class="submenu submenu-two">
											<a href="call.html">Calls<span class="menu-arrow inside-submenu"></span></a>
											<ul>
												<li><a href="voice-call.html">Voice Call</a></li>
												<li><a href="video-call.html">Video Call</a></li>
												<li><a href="outgoing-call.html">Outgoing Call</a></li>
												<li><a href="incoming-call.html">Incoming Call</a></li>
												<li><a href="call-history.html">Call History</a></li>
											</ul>
										</li>
										<li><a href="calendar.html">Calendar</a></li>
										<li><a href="email.html">Email</a></li>
										<li><a href="todo.html">To Do</a></li>
										<li><a href="notes.html">Notes</a></li>
										<li><a href="social-feed.html">Social Feed</a></li>
										<li><a href="file-manager.html">File Manager</a></li>
										<li><a href="kanban-view.html">Kanban</a></li>
										<li><a href="invoices.html">Invoices</a></li>
									</ul>
								</li>
								<li class="submenu">
									<a href="#">
										<i class="ti ti-user-star"></i><span>Super Admin</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="dashboard.html">Dashboard</a></li>
										<li><a href="companies.html">Companies</a></li>
										<li><a href="subscription.html">Subscriptions</a></li>
										<li><a href="packages.html">Packages</a></li>
										<li><a href="domain.html">Domain</a></li>
										<li><a href="purchase-transaction.html">Purchase Transaction</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li class="menu-title"><span>LAYOUT</span></li>
						<li>
							<ul>
								<li>
									<a href="layout-horizontal.html">
										<i class="ti ti-layout-navbar"></i><span>Horizontal</span>
									</a>
								</li>
								<li>
									<a href="layout-detached.html">
										<i class="ti ti-details"></i><span>Detached</span>
									</a>
								</li>
								<li>
									<a href="layout-modern.html">
										<i class="ti ti-layout-board-split"></i><span>Modern</span>
									</a>
								</li>
								<li>
									<a href="layout-two-column.html">
										<i class="ti ti-columns-2"></i><span>Two Column </span>
									</a>
								</li>
								<li>
									<a href="layout-hovered.html">
										<i class="ti ti-column-insert-left"></i><span>Hovered</span>
									</a>
								</li>
								<li>
									<a href="layout-box.html">
										<i class="ti ti-layout-align-middle"></i><span>Boxed</span>
									</a>
								</li>
								<li>
									<a href="layout-horizontal-single.html">
										<i class="ti ti-layout-navbar-inactive"></i><span>Horizontal Single</span>
									</a>
								</li>
								<li>
									<a href="layout-horizontal-overlay.html">
										<i class="ti ti-layout-collage"></i><span>Horizontal Overlay</span>
									</a>
								</li>
								<li>
									<a href="layout-horizontal-box.html">
										<i class="ti ti-layout-board"></i><span>Horizontal Box</span>
									</a>
								</li>
								<li>
									<a href="layout-horizontal-sidemenu.html">
										<i class="ti ti-table"></i><span>Menu Aside</span>
									</a>
								</li>
								<li>
									<a href="layout-vertical-transparent.html">
										<i class="ti ti-layout"></i><span>Transparent</span>
									</a>
								</li>
								<li>
									<a href="layout-without-header.html">
										<i class="ti ti-layout-sidebar"></i><span>Without Header</span>
									</a>
								</li>
								<li>
									<a href="layout-rtl.html">
										<i class="ti ti-text-direction-rtl"></i><span>RTL</span>
									</a>
								</li>
								<li>
									<a href="layout-dark.html">
										<i class="ti ti-moon"></i><span>Dark</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="menu-title"><span>PROJECTS</span></li>
						<li>
							<ul>
								<li>
									<a href="clients-grid.html">
										<i class="ti ti-users-group"></i><span>Clients</span>
									</a>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">
										<i class="ti ti-box"></i><span>Projects</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="projects-grid.html">Projects</a></li>
										<li><a href="tasks.html">Tasks</a></li>
										<li><a href="task-board.html">Task Board</a></li>
									</ul>
								</li>								
							</ul>
						</li>
						<li class="menu-title"><span>CRM</span></li>
						<li>
							<ul>
								<li>
									<a href="contacts-grid.html">
										<i class="ti ti-user-shield"></i><span>Contacts</span>
									</a>
								</li>
								<li>
									<a href="companies-grid.html">
										<i class="ti ti-building"></i><span>Companies</span>
									</a>
								</li>
								<li>
									<a href="deals-grid.html">
										<i class="ti ti-heart-handshake"></i><span>Deals</span>
									</a>
								</li>
								<li>
									<a href="leads-grid.html">
										<i class="ti ti-user-check"></i><span>Leads</span>
									</a>
								</li>
								<li>
									<a href="pipeline.html">
										<i class="ti ti-timeline-event-text"></i><span>Pipeline</span>
									</a>
								</li>
								<li>
									<a href="analytics.html">
										<i class="ti ti-graph"></i><span>Analytics</span>
									</a>
								</li>
								<li>
									<a href="activity.html">
										<i class="ti ti-activity"></i><span>Activities</span>
									</a>
								</li>
							</ul>							
						</li>
						<li class="menu-title"><span>HRM</span></li>
						<li>
							<ul>
								<li class="submenu">
									<a href="javascript:void(0);">
										<i class="ti ti-users"></i><span>Employees</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="employees.html">Employee Lists</a></li>
										<li><a href="employees-grid.html">Employee Grid</a></li>
										<li><a href="employee-details.html">Employee Details</a></li>
										<li><a href="departments.html">Departments</a></li>
										<li><a href="designations.html">Designations</a></li>
										<li><a href="policy.html">Policies</a></li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">
										<i class="ti ti-ticket"></i><span>Tickets</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="tickets.html">Tickets</a></li>
										<li><a href="ticket-details.html">Ticket Details</a></li>
									</ul>
								</li>
								<li>
									<a href="holidays.html">
										<i class="ti ti-calendar-event"></i><span>Holidays</span>
									</a>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">
										<i class="ti ti-file-time"></i><span>Attendance</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li class="submenu submenu-two">
											<a href="javascript:void(0);">Leaves<span class="menu-arrow inside-submenu"></span></a>
											<ul>
												<li><a href="leaves.html">Leaves (Admin)</a></li>
												<li><a href="leaves-employee.html">Leave (Employee)</a></li>
												<li><a href="leave-settings.html">Leave Settings</a></li>												
											</ul>												
										</li>
										<li><a href="attendance-admin.html">Attendance (Admin)</a></li>
										<li><a href="attendance-employee.html">Attendance (Employee)</a></li>
										<li><a href="timesheets.html">Timesheets</a></li>
										<li><a href="schedule-timing.html">Shift &amp; Schedule</a></li>
										<li><a href="overtime.html">Overtime</a></li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">
										<i class="ti ti-school"></i><span>Performance</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="performance-indicator.html">Performance Indicator</a></li>
										<li><a href="performance-review.html">Performance Review</a></li>
										<li><a href="performance-appraisal.html">Performance Appraisal</a></li>
										<li><a href="goal-tracking.html">Goal List</a></li>
										<li><a href="goal-type.html">Goal Type</a></li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">
										<i class="ti ti-edit"></i><span>Training</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="training.html">Training List</a></li>
										<li><a href="trainers.html">Trainers</a></li>
										<li><a href="training-type.html">Training Type</a></li>
									</ul>
								</li>
								<li>
									<a href="promotion.html">
										<i class="ti ti-speakerphone"></i><span>Promotion</span>
									</a>
								</li>
								<li>
									<a href="resignation.html">
										<i class="ti ti-external-link"></i><span>Resignation</span>
									</a>
								</li>
								<li>
									<a href="termination.html">
										<i class="ti ti-circle-x"></i><span>Termination</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="menu-title"><span>RECRUITMENT</span></li>
						<li>
							<ul>
								<li>
									<a href="job-grid.html">
										<i class="ti ti-timeline"></i><span>Jobs</span>
									</a>
								</li>
								<li>
									<a href="candidates-grid.html">
										<i class="ti ti-user-shield"></i><span>Candidates</span>
									</a>
								</li>
								<li>
									<a href="refferals.html">
										<i class="ti ti-ux-circle"></i><span>Referrals</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="menu-title"><span>FINANCE &amp; ACCOUNTS</span></li>
						<li>
							<ul>
								<li class="submenu">
									<a href="javascript:void(0);">
										<i class="ti ti-shopping-cart-dollar"></i><span>Sales</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="estimates.html">Estimates</a></li>
										<li><a href="invoices.html">Invoices</a></li>
										<li><a href="payments.html">Payments</a></li>
										<li><a href="expenses.html">Expenses</a></li>
										<li><a href="provident-fund.html">Provident Fund</a></li>
										<li><a href="taxes.html">Taxes</a></li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">
										<i class="ti ti-file-dollar"></i><span>Accounting</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="categories.html">Categories</a></li>
										<li><a href="budgets.html">Budgets</a></li>
										<li><a href="budget-expenses.html">Budget Expenses</a></li>
										<li><a href="budget-revenues.html">Budget Revenues</a></li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">
										<i class="ti ti-cash"></i><span>Payroll</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="employee-salary.html">Employee Salary</a></li>
										<li><a href="payslip.html">Payslip</a></li>
										<li><a href="payroll.html">Payroll Items</a></li>
									</ul>
								</li>
							</ul>
						</li>						
						<li class="menu-title"><span>ADMINISTRATION</span></li>
						<li>
							<ul>
								<li class="submenu">
									<a href="javascript:void(0);">
										<i class="ti ti-cash"></i><span>Assets</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="assets.html">Assets</a></li>
										<li><a href="asset-categories.html">Asset Categories</a></li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">
										<i class="ti ti-headset"></i><span>Help &amp; Supports</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="knowledgebase.html">Knowledge Base</a></li>
										<li><a href="activity.html">Activities</a></li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">
										<i class="ti ti-user-star"></i><span>User Management</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="users.html">Users</a></li>
										<li><a href="roles-permissions.html">Roles &amp; Permissions</a></li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">
										<i class="ti ti-user-star"></i><span>Reports</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="expenses-report.html">Expense Report</a></li>
										<li><a href="invoice-report.html">Invoice Report</a></li>
										<li><a href="payment-report.html">Payment Report</a></li>
										<li><a href="project-report.html">Project Report</a></li>
										<li><a href="task-report.html">Task Report</a></li>
										<li><a href="user-report.html">User Report</a></li>
										<li><a href="employee-report.html">Employee Report</a></li>
										<li><a href="payslip-report.html">Payslip Report</a></li>
										<li><a href="attendance-report.html">Attendance Report</a></li>
										<li><a href="leave-report.html">Leave Report</a></li>
										<li><a href="daily-report.html">Daily Report</a></li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">
										<i class="ti ti-settings"></i><span>Settings</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li class="submenu submenu-two">
											<a href="javascript:void(0);">General Settings<span class="menu-arrow inside-submenu"></span></a>
											<ul>
												<li><a href="profile-settings.html">Profile</a></li>
												<li><a href="security-settings.html">Security</a></li>
												<li><a href="notification-settings.html">Notifications</a></li>
												<li><a href="connected-apps.html">Connected Apps</a></li>
											</ul>
										</li>
										<li class="submenu submenu-two">
											<a href="javascript:void(0);">Website Settings<span class="menu-arrow inside-submenu"></span></a>
											<ul>
												<li><a href="bussiness-settings.html">Business Settings</a></li>
												<li><a href="seo-settings.html">SEO Settings</a></li>
												<li><a href="localization-settings.html">Localization</a></li>
												<li><a href="prefixes.html">Prefixes</a></li>
												<li><a href="preferences.html">Preferences</a></li>
												<li><a href="performance-appraisal.html">Appearance</a></li>
												<li><a href="language.html">Language</a></li>
												<li><a href="authentication-settings.html">Authentication</a></li>
												<li><a href="ai-settings.html">AI Settings</a></li>
											</ul>
										</li>
										<li class="submenu submenu-two">
											<a href="javascript:void(0);">App Settings<span class="menu-arrow inside-submenu"></span></a>
											<ul>
												<li><a href="salary-settings.html">Salary Settings</a></li>
												<li><a href="approval-settings.html">Approval Settings</a></li>
												<li><a href="invoice-settings.html">Invoice Settings</a></li>
												<li><a href="leave-type.html">Leave Type</a></li>
												<li><a href="custom-fields.html">Custom Fields</a></li>
											</ul>
										</li>
										<li class="submenu submenu-two">
											<a href="javascript:void(0);">System Settings<span class="menu-arrow inside-submenu"></span></a>
											<ul>
												<li><a href="email-settings.html">Email Settings</a></li>
												<li><a href="email-template.html">Email Templates</a></li>
												<li><a href="sms-settings.html">SMS Settings</a></li>
												<li><a href="sms-template.html">SMS Templates</a></li>
												<li><a href="otp-settings.html">OTP</a></li>
												<li><a href="gdpr.html">GDPR Cookies</a></li>
												<li><a href="maintenance-mode.html">Maintenance Mode</a></li>
											</ul>
										</li>
										<li class="submenu submenu-two">
											<a href="javascript:void(0);">Financial Settings<span class="menu-arrow inside-submenu"></span></a>
											<ul>
												<li><a href="payment-gateways.html">Payment Gateways</a></li>
												<li><a href="tax-rates.html">Tax Rate</a></li>
												<li><a href="currencies.html">Currencies</a></li>
											</ul>
										</li>
										<li class="submenu submenu-two">
											<a href="javascript:void(0);">Other Settings<span class="menu-arrow inside-submenu"></span></a>
											<ul>
												<li><a href="custom-css.html">Custom CSS</a></li>
												<li><a href="custom-js.html">Custom JS</a></li>
												<li><a href="cronjob.html">Cronjob</a></li>
												<li><a href="storage-settings.html">Storage</a></li>
												<li><a href="ban-ip-address.html">Ban IP Address</a></li>
												<li><a href="backup.html">Backup</a></li>
												<li><a href="clear-cache.html">Clear Cache</a></li>
											</ul>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li class="menu-title"><span>CONTENT</span></li>
						<li>
							<ul>
								<li>
									<a href="pages.html">
										<i class="ti ti-box-multiple"></i><span>Pages</span>
									</a>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">
										<i class="ti ti-brand-blogger"></i><span>Blogs</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="blogs.html">All Blogs</a></li>
										<li><a href="blog-categories.html">Categories</a></li>
										<li><a href="blog-comments.html">Comments</a></li>
										<li><a href="blog-tags.html">Blog Tags</a></li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">
										<i class="ti ti-map-pin-check"></i><span>Locations</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="countries.html">Countries</a></li>
										<li><a href="states.html">States</a></li>
										<li><a href="cities.html">Cities</a></li>
									</ul>
								</li>
								<li>
									<a href="testimonials.html">
										<i class="ti ti-message-2"></i><span>Testimonials</span>
									</a>
								</li>
								<li>
									<a href="faq.html">
										<i class="ti ti-question-mark"></i><span>FAQ’S</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="menu-title"><span>PAGES</span></li>
						<li>
							<ul>
								<li>
									<a href="starter.html">
										<i class="ti ti-layout-sidebar"></i><span>Starter</span>
									</a>
								</li>
								<li>
									<a href="profile.html">
										<i class="ti ti-user-circle"></i><span>Profile</span>
									</a>
								</li>
								<li>
									<a href="gallery.html">
										<i class="ti ti-photo"></i><span>Gallery</span>
									</a>
								</li>
								<li>
									<a href="search-result.html">
										<i class="ti ti-list-search"></i><span>Search Results</span>
									</a>
								</li>
								<li>
									<a href="timeline.html">
										<i class="ti ti-timeline"></i><span>Timeline</span>
									</a>
								</li>
								<li>
									<a href="pricing.html">
										<i class="ti ti-file-dollar"></i><span>Pricing</span>
									</a>
								</li>
								<li>
									<a href="coming-soon.html">
										<i class="ti ti-progress-bolt"></i><span>Coming Soon</span>
									</a>
								</li>
								<li>
									<a href="under-maintenance.html">
										<i class="ti ti-alert-octagon"></i><span>Under Maintenance</span>
									</a>
								</li>
								<li>
									<a href="under-construction.html">
										<i class="ti ti-barrier-block"></i><span>Under Construction</span>
									</a>
								</li>
								<li>
									<a href="api-keys.html">
										<i class="ti ti-api"></i><span>API Keys</span>
									</a>
								</li>
								<li>
									<a href="privacy-policy.html">
										<i class="ti ti-file-description"></i><span>Privacy Policy</span>
									</a>
								</li>
								<li>
									<a href="terms-condition.html">
										<i class="ti ti-file-check"></i><span>Terms &amp; Conditions</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="menu-title"><span>AUTHENTICATION</span></li>
						<li>
							<ul>
								<li class="submenu">
									<a href="javascript:void(0);">
										<i class="ti ti-login"></i><span>Login</span><span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="login.html">Cover</a></li>
										<li><a href="login-2.html">Illustration</a></li>
										<li><a href="login-3.html">Basic</a></li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">
										<i class="ti ti-forms"></i><span>Register</span><span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="register.html">Cover</a></li>
										<li><a href="register-2.html">Illustration</a></li>
										<li><a href="register-3.html">Basic</a></li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">
										<i class="ti ti-help-triangle"></i><span>Forgot Password</span><span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="forgot-password.html">Cover</a></li>
										<li><a href="forgot-password-2.html">Illustration</a></li>
										<li><a href="forgot-password-3.html">Basic</a></li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">
										<i class="ti ti-restore"></i><span>Reset Password</span><span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="reset-password.html">Cover</a></li>
										<li><a href="reset-password-2.html">Illustration</a></li>
										<li><a href="reset-password-3.html">Basic</a></li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">
										<i class="ti ti-mail-exclamation"></i><span>Email Verification</span><span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="email-verification.html">Cover</a></li>
										<li><a href="email-verification-2.html">Illustration</a></li>
										<li><a href="email-verification-3.html">Basic</a></li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">
										<i class="ti ti-password"></i><span>2 Step Verification</span><span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="two-step-verification.html">Cover</a></li>
										<li><a href="two-step-verification-2.html">Illustration</a></li>
										<li><a href="two-step-verification-3.html">Basic</a></li>
									</ul>
								</li>
								<li><a href="lock-screen.html"><i class="ti ti-lock-square"></i><span>Lock Screen</span></a></li>
								<li><a href="error-404.html"><i class="ti ti-error-404"></i><span>404 Error</span></a></li>
								<li><a href="error-500.html"><i class="ti ti-server"></i><span>500 Error</span></a></li>
							</ul>
						</li>
						<li class="menu-title"><span>UI INTERFACE</span></li>
						<li>
							<ul>
								<li class="submenu">
									<a href="javascript:void(0);">
										<i class="ti ti-hierarchy-2"></i>
										<span>Base UI</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li>
											<a href="ui-alerts.html">Alerts</a>
										</li>
										<li>
											<a href="ui-accordion.html">Accordion</a>
										</li>
										<li>
											<a href="ui-avatar.html">Avatar</a>
										</li>
										<li>
											<a href="ui-badges.html">Badges</a>
										</li>
										<li>
											<a href="ui-borders.html">Border</a>
										</li>
										<li>
											<a href="ui-buttons.html">Buttons</a>
										</li>
										<li>
											<a href="ui-buttons-group.html">Button Group</a>
										</li>
										<li>
											<a href="ui-breadcrumb.html">Breadcrumb</a>
										</li>
										<li>
											<a href="ui-cards.html">Card</a>
										</li>
										<li>
											<a href="ui-carousel.html">Carousel</a>
										</li>
										<li>
											<a href="ui-colors.html">Colors</a>
										</li>
										<li>
											<a href="ui-dropdowns.html">Dropdowns</a>
										</li>
										<li>
											<a href="ui-grid.html">Grid</a>
										</li>
										<li>
											<a href="ui-images.html">Images</a>
										</li>
										<li>
											<a href="ui-lightbox.html">Lightbox</a>
										</li>
										<li>
											<a href="ui-media.html">Media</a>
										</li>
										<li>
											<a href="ui-modals.html">Modals</a>
										</li>
										<li>
											<a href="ui-offcanvas.html">Offcanvas</a>
										</li>
										<li>
											<a href="ui-pagination.html">Pagination</a>
										</li>
										<li>
											<a href="ui-popovers.html">Popovers</a>
										</li>
										<li>
											<a href="ui-progress.html">Progress</a>
										</li>
										<li>
											<a href="ui-placeholders.html">Placeholders</a>
										</li>
										<li>
											<a href="ui-spinner.html">Spinner</a>
										</li>
										<li>
											<a href="ui-sweetalerts.html">Sweet Alerts</a>
										</li>
										<li>
											<a href="ui-nav-tabs.html">Tabs</a>
										</li>
										<li>
											<a href="ui-toasts.html">Toasts</a>
										</li>
										<li>
											<a href="ui-tooltips.html">Tooltips</a>
										</li>
										<li>
											<a href="ui-typography.html">Typography</a>
										</li>
										<li>
											<a href="ui-video.html">Video</a>
										</li>
										<li>
											<a href="ui-sortable.html">Sortable</a>
										</li>
										<li>
											<a href="ui-swiperjs.html">Swiperjs</a>
										</li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">
										<i class="ti ti-hierarchy-3"></i>
										<span>Advanced UI</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li>
											<a href="ui-ribbon.html">Ribbon</a>
										</li>
										<li>
											<a href="ui-clipboard.html">Clipboard</a>
										</li>
										<li>
											<a href="ui-drag-drop.html">Drag &amp; Drop</a>
										</li>
										<li>
											<a href="ui-rangeslider.html">Range Slider</a>
										</li>
										<li>
											<a href="ui-rating.html">Rating</a>
										</li>
										<li>
											<a href="ui-text-editor.html">Text Editor</a>
										</li>
										<li>
											<a href="ui-counter.html">Counter</a>
										</li>
										<li>
											<a href="ui-scrollbar.html">Scrollbar</a>
										</li>
										<li>
											<a href="ui-stickynote.html">Sticky Note</a>
										</li>
										<li>
											<a href="ui-timeline.html">Timeline</a>
										</li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">
										<i class="ti ti-input-search"></i>
										<span>Forms</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li class="submenu submenu-two">
											<a href="javascript:void(0);">Form Elements <span class="menu-arrow inside-submenu"></span>
											</a>
											<ul>
												<li>
													<a href="form-basic-inputs.html">Basic Inputs</a>
												</li>
												<li>
													<a href="form-checkbox-radios.html">Checkbox &amp; Radios</a>
												</li>
												<li>
													<a href="form-input-groups.html">Input Groups</a>
												</li>
												<li>
													<a href="form-grid-gutters.html">Grid &amp; Gutters</a>
												</li>
												<li>
													<a href="form-select.html">Form Select</a>
												</li>
												<li>
													<a href="form-mask.html">Input Masks</a>
												</li>
												<li>
													<a href="form-fileupload.html">File Uploads</a>
												</li>
											</ul>
										</li>
										<li class="submenu submenu-two">
											<a href="javascript:void(0);">Layouts <span class="menu-arrow inside-submenu"></span>
											</a>
											<ul>
												<li>
													<a href="form-horizontal.html">Horizontal Form</a>
												</li>
												<li>
													<a href="form-vertical.html">Vertical Form</a>
												</li>
												<li>
													<a href="form-floating-labels.html">Floating Labels</a>
												</li>
											</ul>
										</li>
										<li>
											<a href="form-validation.html">Form Validation</a>
										</li>
										
										<li>
											<a href="form-select2.html">Select2</a>
										</li>
										<li>
											<a href="form-wizard.html">Form Wizard</a>
										</li>
										<li>
											<a href="form-pickers.html">Form Picker</a>
										</li>
										
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">
										<i class="ti ti-table-plus"></i>
										<span>Tables</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li>
											<a href="tables-basic.html">Basic Tables </a>
										</li>
										<li>
											<a href="data-tables.html">Data Table </a>
										</li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">
										<i class="ti ti-chart-line"></i>
										<span>Charts</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li>
											<a href="chart-apex.html">Apex Charts</a>
										</li>
										<li>
											<a href="chart-c3.html">Chart C3</a>
										</li>
										<li>
											<a href="chart-js.html">Chart Js</a>
										</li>
										<li>
											<a href="chart-morris.html">Morris Charts</a>
										</li>
										<li>
											<a href="chart-flot.html">Flot Charts</a>
										</li>
										<li>
											<a href="chart-peity.html">Peity Charts</a>
										</li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">
										<i class="ti ti-icons"></i>
										<span>Icons</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li>
											<a href="icon-fontawesome.html">Fontawesome Icons</a>
										</li>
										<li>
											<a href="icon-tabler.html">Tabler Icons</a>
										</li>
										<li>
											<a href="icon-bootstrap.html">Bootstrap Icons</a>
										</li>
										<li>
											<a href="icon-remix.html">Remix Icons</a>
										</li>
										<li>
											<a href="icon-feather.html">Feather Icons</a>
										</li>
										<li>
											<a href="icon-ionic.html">Ionic Icons</a>
										</li>
										<li>
											<a href="icon-material.html">Material Icons</a>
										</li>
										<li>
											<a href="icon-pe7.html">Pe7 Icons</a>
										</li>
										<li>
											<a href="icon-simpleline.html">Simpleline Icons</a>
										</li>
										<li>
											<a href="icon-themify.html">Themify Icons</a>
										</li>
										<li>
											<a href="icon-weather.html">Weather Icons</a>
										</li>
										<li>
											<a href="icon-typicon.html">Typicon Icons</a>
										</li>
										<li>
											<a href="icon-flag.html">Flag Icons</a>
										</li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">
										<i class="ti ti-table-plus"></i>
										<span>Maps</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li>
											<a href="maps-vector.html">Vector</a>
										</li>
										<li>
											<a href="maps-leaflet.html">Leaflet</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li class="menu-title"><span>Extras</span></li>
						<li>
							<ul>
								<li>
									<a href="javascript:void(0);"><i class="ti ti-file-text"></i><span>Documentation</span></a>
								</li>
								<li>
									<a href="javascript:void(0);"><i class="ti ti-exchange"></i><span>Changelog</span><span class="badge bg-pink badge-xs text-white fs-10 ms-s">v4.0.2</span></a>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);"><i class="ti ti-menu-2"></i><span>Multi Level</span><span class="menu-arrow"></span></a>
									<ul>
										<li><a href="javascript:void(0);">Multilevel 1</a></li>
										<li class="submenu submenu-two">
											<a href="javascript:void(0);">Multilevel 2<span class="menu-arrow inside-submenu"></span></a>
											<ul>
												<li><a href="javascript:void(0);">Multilevel 2.1</a></li>
												<li class="submenu submenu-two submenu-three">
													<a href="javascript:void(0);">Multilevel 2.2<span class="menu-arrow inside-submenu inside-submenu-two"></span></a>
													<ul>
														<li><a href="javascript:void(0);">Multilevel 2.2.1</a></li>
														<li><a href="javascript:void(0);">Multilevel 2.2.2</a></li>
													</ul>
												</li>
											</ul>
										</li>
										<li><a href="javascript:void(0);">Multilevel 3</a></li>
									</ul>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><div class="slimScrollBar" style="background: rgb(204, 204, 204); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 222.812px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
		</div>
		<!-- /Sidebar -->

		<!-- Horizontal Menu -->
		<div class="sidebar sidebar-horizontal" id="horizontal-menu">
			<div class="sidebar-menu">
				<div class="main-menu">
					<ul class="nav-menu">
						<li class="menu-title">
							<span>Main</span>
						</li>
						<li class="submenu">
							<a href="#" class="active">
								<i class="ti ti-smart-home"></i><span>Dashboard</span>
								<span class="menu-arrow"></span>
							</a>
							<ul>
								<li><a href="index.html" class="active">Admin Dashboard</a></li>
								<li><a href="employee-dashboard.html">Employee Dashboard</a></li>
								<li><a href="deals-dashboard.html">Deals Dashboard</a></li>
								<li><a href="leads-dashboard.html">Leads Dashboard</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="#">
								<i class="ti ti-user-star"></i><span>Super Admin</span>
								<span class="menu-arrow"></span>
							</a>
							<ul>
								<li><a href="dashboard.html">Dashboard</a></li>
								<li><a href="companies.html">Companies</a></li>
								<li><a href="subscription.html">Subscriptions</a></li>
								<li><a href="packages.html">Packages</a></li>
								<li><a href="domain.html">Domain</a></li>
								<li><a href="purchase-transaction.html">Purchase Transaction</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="#">
								<i class="ti ti-layout-grid-add"></i><span>Applications</span>
								<span class="menu-arrow"></span>
							</a>
							<ul>
								<li><a href="chat.html">Chat</a></li>
								<li class="submenu submenu-two">
									<a href="call.html">Calls<span class="menu-arrow inside-submenu"></span></a>
									<ul>
										<li><a href="voice-call.html">Voice Call</a></li>
										<li><a href="video-call.html">Video Call</a></li>
										<li><a href="outgoing-call.html">Outgoing Call</a></li>
										<li><a href="incoming-call.html">Incoming Call</a></li>
										<li><a href="call-history.html">Call History</a></li>
									</ul>
								</li>
								<li><a href="calendar.html">Calendar</a></li>
								<li><a href="email.html">Email</a></li>
								<li><a href="todo.html">To Do</a></li>
								<li><a href="notes.html">Notes</a></li>
								<li><a href="file-manager.html">File Manager</a></li>
								<li><a href="kanban-view.html">Kanban</a></li>
								<li><a href="invoices.html">Invoices</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="#">
								<i class="ti ti-layout-board-split"></i><span>Layouts</span>
								<span class="menu-arrow"></span>
							</a>
							<ul>
								<li>
									<a href="layout-horizontal.html">
										<span>Horizontal</span>
									</a>
								</li>
								<li>
									<a href="layout-detached.html">
										<span>Detached</span>
									</a>
								</li>
								<li>
									<a href="layout-modern.html">
										<span>Modern</span>
									</a>
								</li>
								<li>
									<a href="layout-two-column.html">
										<span>Two Column </span>
									</a>
								</li>
								<li>
									<a href="layout-hovered.html">
										<span>Hovered</span>
									</a>
								</li>
								<li>
									<a href="layout-box.html">
										<span>Boxed</span>
									</a>
								</li>
								<li>
									<a href="layout-horizontal-single.html">
										<span>Horizontal Single</span>
									</a>
								</li>
								<li>
									<a href="layout-horizontal-overlay.html">
										<span>Horizontal Overlay</span>
									</a>
								</li>
								<li>
									<a href="layout-horizontal-box.html">
										<span>Horizontal Box</span>
									</a>
								</li>
								<li>
									<a href="layout-horizontal-sidemenu.html">
										<span>Menu Aside</span>
									</a>
								</li>
								<li>
									<a href="layout-vertical-transparent.html">
										<span>Transparent</span>
									</a>
								</li>
								<li>
									<a href="layout-without-header.html">
										<span>Without Header</span>
									</a>
								</li>
								<li>
									<a href="layout-rtl.html">
										<span>RTL</span>
									</a>
								</li>
								<li>
									<a href="layout-dark.html">
										<span>Dark</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="submenu">
							<a href="#">
								<i class="ti ti-user-star"></i><span>Projects</span>
								<span class="menu-arrow"></span>
							</a>
							<ul>
								<li>
									<a href="clients-grid.html"><span>Clients</span>
									</a>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);"><span>Projects</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="projects-grid.html">Projects</a></li>
										<li><a href="tasks.html">Tasks</a></li>
										<li><a href="task-board.html">Task Board</a></li>
									</ul>
								</li>		
								<li class="submenu">
									<a href="call.html">Crm<span class="menu-arrow"></span></a>
									<ul>
										<li><a href="contacts-grid.html"><span>Contacts</span></a></li>
										<li><a href="companies-grid.html"><span>Companies</span></a></li>
										<li><a href="deals-grid.html"><span>Deals</span></a></li>
										<li><a href="leads-grid.html"><span>Leads</span></a></li>
										<li><a href="pipeline.html"><span>Pipeline</span></a></li>
										<li><a href="analytics.html"><span>Analytics</span></a></li>
										<li><a href="activity.html"><span>Activities</span></a></li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);"><span>Employees</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="employees.html">Employee Lists</a></li>
										<li><a href="employees-grid.html">Employee Grid</a></li>
										<li><a href="employee-details.html">Employee Details</a></li>
										<li><a href="departments.html">Departments</a></li>
										<li><a href="designations.html">Designations</a></li>
										<li><a href="policy.html">Policies</a></li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);"><span>Tickets</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="tickets.html">Tickets</a></li>
										<li><a href="ticket-details.html">Ticket Details</a></li>
									</ul>
								</li>
								<li><a href="holidays.html"><span>Holidays</span></a></li>
								<li class="submenu">
									<a href="javascript:void(0);"><span>Attendance</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li class="submenu">
											<a href="javascript:void(0);">Leaves<span class="menu-arrow"></span></a>
											<ul>
												<li><a href="leaves.html">Leaves (Admin)</a></li>
												<li><a href="leaves-employee.html">Leave (Employee)</a></li>
												<li><a href="leave-settings.html">Leave Settings</a></li>												
											</ul>												
										</li>
										<li><a href="attendance-admin.html">Attendance (Admin)</a></li>
										<li><a href="attendance-employee.html">Attendance (Employee)</a></li>
										<li><a href="timesheets.html">Timesheets</a></li>
										<li><a href="schedule-timing.html">Shift &amp; Schedule</a></li>
										<li><a href="overtime.html">Overtime</a></li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);"><span>Performance</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="performance-indicator.html">Performance Indicator</a></li>
										<li><a href="performance-review.html">Performance Review</a></li>
										<li><a href="performance-appraisal.html">Performance Appraisal</a></li>
										<li><a href="goal-tracking.html">Goal List</a></li>
										<li><a href="goal-type.html">Goal Type</a></li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);"><span>Training</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="training.html">Training List</a></li>
										<li><a href="trainers.html">Trainers</a></li>
										<li><a href="training-type.html">Training Type</a></li>
									</ul>
								</li>
								<li><a href="promotion.html"><span>Promotion</span></a></li>
								<li><a href="resignation.html"><span>Resignation</span></a></li>
								<li><a href="termination.html"><span>Termination</span></a></li>														
							</ul>
						</li>
						<li class="submenu">
							<a href="#">
								<i class="ti ti-user-star"></i><span>Administration</span>
								<span class="menu-arrow"></span>
							</a>
							<ul>
								<li class="submenu">
									<a href="javascript:void(0);"><span>Sales</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="estimates.html">Estimates</a></li>
										<li><a href="invoices.html">Invoices</a></li>
										<li><a href="payments.html">Payments</a></li>
										<li><a href="expenses.html">Expenses</a></li>
										<li><a href="provident-fund.html">Provident Fund</a></li>
										<li><a href="taxes.html">Taxes</a></li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);"><span>Accounting</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="categories.html">Categories</a></li>
										<li><a href="budgets.html">Budgets</a></li>
										<li><a href="budget-expenses.html">Budget Expenses</a></li>
										<li><a href="budget-revenues.html">Budget Revenues</a></li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);"><span>Payroll</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="employee-salary.html">Employee Salary</a></li>
										<li><a href="payslip.html">Payslip</a></li>
										<li><a href="payroll.html">Payroll Items</a></li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);"><span>Assets</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="assets.html">Assets</a></li>
										<li><a href="asset-categories.html">Asset Categories</a></li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);"><span>Help &amp; Supports</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="knowledgebase.html">Knowledge Base</a></li>
										<li><a href="activity.html">Activities</a></li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);"><span>User Management</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="users.html">Users</a></li>
										<li><a href="roles-permissions.html">Roles &amp; Permissions</a></li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);"><span>Reports</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="expenses-report.html">Expense Report</a></li>
										<li><a href="invoice-report.html">Invoice Report</a></li>
										<li><a href="payment-report.html">Payment Report</a></li>
										<li><a href="project-report.html">Project Report</a></li>
										<li><a href="task-report.html">Task Report</a></li>
										<li><a href="user-report.html">User Report</a></li>
										<li><a href="employee-report.html">Employee Report</a></li>
										<li><a href="payslip-report.html">Payslip Report</a></li>
										<li><a href="attendance-report.html">Attendance Report</a></li>
										<li><a href="leave-report.html">Leave Report</a></li>
										<li><a href="daily-report.html">Daily Report</a></li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);"><span>Settings</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li class="submenu">
											<a href="javascript:void(0);">General Settings<span class="menu-arrow"></span></a>
											<ul>
												<li><a href="profile-settings.html">Profile</a></li>
												<li><a href="security-settings.html">Security</a></li>
												<li><a href="notification-settings.html">Notifications</a></li>
												<li><a href="connected-apps.html">Connected Apps</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);">Website Settings<span class="menu-arrow"></span></a>
											<ul>
												<li><a href="bussiness-settings.html">Business Settings</a></li>
												<li><a href="seo-settings.html">SEO Settings</a></li>
												<li><a href="localization-settings.html">Localization</a></li>
												<li><a href="prefixes.html">Prefixes</a></li>
												<li><a href="preferences.html">Preferences</a></li>
												<li><a href="performance-appraisal.html">Appearance</a></li>
												<li><a href="language.html">Language</a></li>
												<li><a href="authentication-settings.html">Authentication</a></li>
												<li><a href="ai-settings.html">AI Settings</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);">App Settings<span class="menu-arrow"></span></a>
											<ul>
												<li><a href="salary-settings.html">Salary Settings</a></li>
												<li><a href="approval-settings.html">Approval Settings</a></li>
												<li><a href="invoice-settings.html">Invoice Settings</a></li>
												<li><a href="leave-type.html">Leave Type</a></li>
												<li><a href="custom-fields.html">Custom Fields</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);">System Settings<span class="menu-arrow"></span></a>
											<ul>
												<li><a href="email-settings.html">Email Settings</a></li>
												<li><a href="email-template.html">Email Templates</a></li>
												<li><a href="sms-settings.html">SMS Settings</a></li>
												<li><a href="sms-template.html">SMS Templates</a></li>
												<li><a href="otp-settings.html">OTP</a></li>
												<li><a href="gdpr.html">GDPR Cookies</a></li>
												<li><a href="maintenance-mode.html">Maintenance Mode</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);">Financial Settings<span class="menu-arrow"></span></a>
											<ul>
												<li><a href="payment-gateways.html">Payment Gateways</a></li>
												<li><a href="tax-rates.html">Tax Rate</a></li>
												<li><a href="currencies.html">Currencies</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);">Other Settings<span class="menu-arrow"></span></a>
											<ul>
												<li><a href="custom-css.html">Custom CSS</a></li>
												<li><a href="custom-js.html">Custom JS</a></li>
												<li><a href="cronjob.html">Cronjob</a></li>
												<li><a href="storage-settings.html">Storage</a></li>
												<li><a href="ban-ip-address.html">Ban IP Address</a></li>
												<li><a href="backup.html">Backup</a></li>
												<li><a href="clear-cache.html">Clear Cache</a></li>
											</ul>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li class="submenu">
							<a href="#">
								<i class="ti ti-page-break"></i><span>Pages</span>
								<span class="menu-arrow"></span>
							</a>
							<ul>
								<li><a href="starter.html"><span>Starter</span></a></li>
								<li><a href="profile.html"><span>Profile</span></a></li>
								<li><a href="gallery.html"><span>Gallery</span></a></li>
								<li><a href="search-result.html"><span>Search Results</span></a></li>
								<li><a href="timeline.html"><span>Timeline</span></a></li>
								<li><a href="pricing.html"><span>Pricing</span></a></li>
								<li><a href="coming-soon.html"><span>Coming Soon</span></a></li>
								<li><a href="under-maintenance.html"><span>Under Maintenance</span></a></li>
								<li><a href="under-construction.html"><span>Under Construction</span></a></li>
								<li><a href="api-keys.html"><span>API Keys</span></a></li>
								<li><a href="privacy-policy.html"><span>Privacy Policy</span></a></li>
								<li><a href="terms-condition.html"><span>Terms &amp; Conditions</span></a></li>
								<li class="submenu">
									<a href="#"><span>Content</span> <span class="menu-arrow"></span></a>
									<ul>
										<li><a href="pages.html">Pages</a></li>
										<li class="submenu">
											<a href="javascript:void(0);">Blogs<span class="menu-arrow"></span></a>
											<ul>
												<li><a href="blogs.html">All Blogs</a></li>
												<li><a href="blog-categories.html">Categories</a></li>
												<li><a href="blog-comments.html">Comments</a></li>
												<li><a href="blog-tags.html">Tags</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);">Locations<span class="menu-arrow"></span></a>
											<ul>
												<li><a href="countries.html">Countries</a></li>
												<li><a href="states.html">States</a></li>
												<li><a href="cities.html">Cities</a></li>
											</ul>
										</li>
										<li><a href="testimonials.html">Testimonials</a></li>
										<li><a href="faq.html">FAQ’S</a></li>
									</ul>
								</li>
								<li class="submenu">
									<a href="#">
										<span>Authentication</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li class="submenu">
											<a href="javascript:void(0);" class="">Login<span class="menu-arrow"></span></a>
											<ul>
												<li><a href="login.html">Cover</a></li>
												<li><a href="login-2.html">Illustration</a></li>
												<li><a href="login-3.html">Basic</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);" class="">Register<span class="menu-arrow"></span></a>
											<ul>
												<li><a href="register.html">Cover</a></li>
												<li><a href="register-2.html">Illustration</a></li>
												<li><a href="register-3.html">Basic</a></li>
											</ul>
										</li>
										<li class="submenu"><a href="javascript:void(0);">Forgot Password<span class="menu-arrow"></span></a>
											<ul>
												<li><a href="forgot-password.html">Cover</a></li>
												<li><a href="forgot-password-2.html">Illustration</a></li>
												<li><a href="forgot-password-3.html">Basic</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);">Reset Password<span class="menu-arrow"></span></a>
											<ul>
												<li><a href="reset-password.html">Cover</a></li>
												<li><a href="reset-password-2.html">Illustration</a></li>
												<li><a href="reset-password-3.html">Basic</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);">Email Verification<span class="menu-arrow"></span></a>
											<ul>
												<li><a href="email-verification.html">Cover</a></li>
												<li><a href="email-verification-2.html">Illustration</a></li>
												<li><a href="email-verification-3.html">Basic</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);">2 Step Verification<span class="menu-arrow"></span></a>
											<ul>
												<li><a href="two-step-verification.html">Cover</a></li>
												<li><a href="two-step-verification-2.html">Illustration</a></li>
												<li><a href="two-step-verification-3.html">Basic</a></li>
											</ul>
										</li>
										<li><a href="lock-screen.html">Lock Screen</a></li>
										<li><a href="error-404.html">404 Error</a></li>
										<li><a href="error-500.html">500 Error</a></li>
									</ul>
								</li>
								<li class="submenu">
									<a href="#">
										<span>UI Interface</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li class="submenu">
											<a href="javascript:void(0);">
												<i class="ti ti-hierarchy-2"></i>
												<span>Base UI</span>
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li>
													<a href="ui-alerts.html">Alerts</a>
												</li>
												<li>
													<a href="ui-accordion.html">Accordion</a>
												</li>
												<li>
													<a href="ui-avatar.html">Avatar</a>
												</li>
												<li>
													<a href="ui-badges.html">Badges</a>
												</li>
												<li>
													<a href="ui-borders.html">Border</a>
												</li>
												<li>
													<a href="ui-buttons.html">Buttons</a>
												</li>
												<li>
													<a href="ui-buttons-group.html">Button Group</a>
												</li>
												<li>
													<a href="ui-breadcrumb.html">Breadcrumb</a>
												</li>
												<li>
													<a href="ui-cards.html">Card</a>
												</li>
												<li>
													<a href="ui-carousel.html">Carousel</a>
												</li>
												<li>
													<a href="ui-colors.html">Colors</a>
												</li>
												<li>
													<a href="ui-dropdowns.html">Dropdowns</a>
												</li>
												<li>
													<a href="ui-grid.html">Grid</a>
												</li>
												<li>
													<a href="ui-images.html">Images</a>
												</li>
												<li>
													<a href="ui-lightbox.html">Lightbox</a>
												</li>
												<li>
													<a href="ui-media.html">Media</a>
												</li>
												<li>
													<a href="ui-modals.html">Modals</a>
												</li>
												<li>
													<a href="ui-offcanvas.html">Offcanvas</a>
												</li>
												<li>
													<a href="ui-pagination.html">Pagination</a>
												</li>
												<li>
													<a href="ui-popovers.html">Popovers</a>
												</li>
												<li>
													<a href="ui-progress.html">Progress</a>
												</li>
												<li>
													<a href="ui-placeholders.html">Placeholders</a>
												</li>
												<li>
													<a href="ui-spinner.html">Spinner</a>
												</li>
												<li>
													<a href="ui-sweetalerts.html">Sweet Alerts</a>
												</li>
												<li>
													<a href="ui-nav-tabs.html">Tabs</a>
												</li>
												<li>
													<a href="ui-toasts.html">Toasts</a>
												</li>
												<li>
													<a href="ui-tooltips.html">Tooltips</a>
												</li>
												<li>
													<a href="ui-typography.html">Typography</a>
												</li>
												<li>
													<a href="ui-video.html">Video</a>
												</li>
												<li>
													<a href="ui-sortable.html">Sortable</a>
												</li>
												<li>
													<a href="ui-swiperjs.html">Swiperjs</a>
												</li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);">
												<i class="ti ti-hierarchy-3"></i>
												<span>Advanced UI</span>
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li>
													<a href="ui-ribbon.html">Ribbon</a>
												</li>
												<li>
													<a href="ui-clipboard.html">Clipboard</a>
												</li>
												<li>
													<a href="ui-drag-drop.html">Drag &amp; Drop</a>
												</li>
												<li>
													<a href="ui-rangeslider.html">Range Slider</a>
												</li>
												<li>
													<a href="ui-rating.html">Rating</a>
												</li>
												<li>
													<a href="ui-text-editor.html">Text Editor</a>
												</li>
												<li>
													<a href="ui-counter.html">Counter</a>
												</li>
												<li>
													<a href="ui-scrollbar.html">Scrollbar</a>
												</li>
												<li>
													<a href="ui-stickynote.html">Sticky Note</a>
												</li>
												<li>
													<a href="ui-timeline.html">Timeline</a>
												</li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);">
												<i class="ti ti-input-search"></i>
												<span>Forms</span>
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li class="submenu submenu-two">
													<a href="javascript:void(0);">Form Elements <span class="menu-arrow inside-submenu"></span>
													</a>
													<ul>
														<li>
															<a href="form-basic-inputs.html">Basic Inputs</a>
														</li>
														<li>
															<a href="form-checkbox-radios.html">Checkbox &amp; Radios</a>
														</li>
														<li>
															<a href="form-input-groups.html">Input Groups</a>
														</li>
														<li>
															<a href="form-grid-gutters.html">Grid &amp; Gutters</a>
														</li>
														<li>
															<a href="form-select.html">Form Select</a>
														</li>
														<li>
															<a href="form-mask.html">Input Masks</a>
														</li>
														<li>
															<a href="form-fileupload.html">File Uploads</a>
														</li>
													</ul>
												</li>
												<li class="submenu submenu-two">
													<a href="javascript:void(0);">Layouts <span class="menu-arrow inside-submenu"></span>
													</a>
													<ul>
														<li>
															<a href="form-horizontal.html">Horizontal Form</a>
														</li>
														<li>
															<a href="form-vertical.html">Vertical Form</a>
														</li>
														<li>
															<a href="form-floating-labels.html">Floating Labels</a>
														</li>
													</ul>
												</li>
												<li>
													<a href="form-validation.html">Form Validation</a>
												</li>
												<li>
													<a href="form-select2.html">Select2</a>
												</li>
												<li>
													<a href="form-wizard.html">Form Wizard</a>
												</li>
												<li>
													<a href="form-pickers.html">Form Pickers</a>
												</li>
												
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);">
												<i class="ti ti-table-plus"></i>
												<span>Tables</span>
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li>
													<a href="tables-basic.html">Basic Tables </a>
												</li>
												<li>
													<a href="data-tables.html">Data Table </a>
												</li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);">
												<i class="ti ti-chart-line"></i>
												<span>Charts</span>
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li>
													<a href="chart-apex.html">Apex Charts</a>
												</li>
												<li>
													<a href="chart-c3.html">Chart C3</a>
												</li>
												<li>
													<a href="chart-js.html">Chart Js</a>
												</li>
												<li>
													<a href="chart-morris.html">Morris Charts</a>
												</li>
												<li>
													<a href="chart-flot.html">Flot Charts</a>
												</li>
												<li>
													<a href="chart-peity.html">Peity Charts</a>
												</li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);">
												<i class="ti ti-icons"></i>
												<span>Icons</span>
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li>
													<a href="icon-fontawesome.html">Fontawesome Icons</a>
												</li>
												<li>
													<a href="icon-tabler.html">Tabler Icons</a>
												</li>
												<li>
													<a href="icon-bootstrap.html">Bootstrap Icons</a>
												</li>
												<li>
													<a href="icon-remix.html">Remix Icons</a>
												</li>
												<li>
													<a href="icon-feather.html">Feather Icons</a>
												</li>
												<li>
													<a href="icon-ionic.html">Ionic Icons</a>
												</li>
												<li>
													<a href="icon-material.html">Material Icons</a>
												</li>
												<li>
													<a href="icon-pe7.html">Pe7 Icons</a>
												</li>
												<li>
													<a href="icon-simpleline.html">Simpleline Icons</a>
												</li>
												<li>
													<a href="icon-themify.html">Themify Icons</a>
												</li>
												<li>
													<a href="icon-weather.html">Weather Icons</a>
												</li>
												<li>
													<a href="icon-typicon.html">Typicon Icons</a>
												</li>
												<li>
													<a href="icon-flag.html">Flag Icons</a>
												</li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);">
												<i class="ti ti-table-plus"></i>
												<span>Maps</span>
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li>
													<a href="maps-vector.html">Vector</a>
												</li>
												<li>
													<a href="maps-leaflet.html">Leaflet</a>
												</li>
											</ul>
										</li>
									</ul>
								</li>
								<li><a href="#">Documentation</a></li>
								<li><a href="#">Change Log</a></li>
								<li class="submenu">
									<a href="javascript:void(0);"><span>Multi Level</span><span class="menu-arrow"></span></a>
									<ul>
										<li><a href="javascript:void(0);">Multilevel 1</a></li>
										<li class="submenu submenu-two">
											<a href="javascript:void(0);">Multilevel 2<span class="menu-arrow inside-submenu"></span></a>
											<ul>
												<li><a href="javascript:void(0);">Multilevel 2.1</a></li>
												<li class="submenu submenu-two submenu-three">
													<a href="javascript:void(0);">Multilevel 2.2<span class="menu-arrow inside-submenu inside-submenu-two"></span></a>
													<ul>
														<li><a href="javascript:void(0);">Multilevel 2.2.1</a></li>
														<li><a href="javascript:void(0);">Multilevel 2.2.2</a></li>
													</ul>
												</li>
											</ul>
										</li>
										<li><a href="javascript:void(0);">Multilevel 3</a></li>
									</ul>
								</li>
							</ul>
						</li>
					</ul>
					<div class="d-xl-flex align-items-center d-none">
						<a href="#" class="me-3 avatar avatar-sm">
							<img src="assets/img/profiles/avatar-07.jpg" alt="profile" class="rounded-circle">
						</a>
						<a href="#" class="btn btn-icon btn-sm rounded-circle mode-toggle">
							<i class="ti ti-sun"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
		<!-- /Horizontal Menu -->

		<!-- Two Col Sidebar -->
		<div class="two-col-sidebar" id="two-col-sidebar">
			<div class="sidebar sidebar-twocol">
				<div class="twocol-mini">
					<a href="index.html" class="logo-small">
						<img src="assets/img/logo-small.svg" alt="Logo">
					</a>
					<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: 100%; height: 974px;"><div class="sidebar-left slimscroll" style="overflow: hidden; width: 100%; height: 958px;">
						<div class="nav flex-column align-items-center nav-pills" id="sidebar-tabs" role="tablist" aria-orientation="vertical">
							<a href="#" class="nav-link active" title="Dashboard" data-bs-toggle="tab" data-bs-target="#dashboard" aria-selected="true" role="tab">
								<i class="ti ti-smart-home"></i>
							</a>
							<a href="#" class="nav-link" title="Apps" data-bs-toggle="tab" data-bs-target="#application" aria-selected="false" tabindex="-1" role="tab">
								<i class="ti ti-layout-grid-add"></i>
							</a>
							<a href="#" class="nav-link" title="Super Admin" data-bs-toggle="tab" data-bs-target="#super-admin" aria-selected="false" tabindex="-1" role="tab">
								<i class="ti ti-user-star"></i>
							</a>
							<a href="#" class="nav-link" title="Layout" data-bs-toggle="tab" data-bs-target="#layout" aria-selected="false" tabindex="-1" role="tab">
								<i class="ti ti-layout-board-split"></i>
							</a>
							<a href="#" class="nav-link" title="Projects" data-bs-toggle="tab" data-bs-target="#projects" aria-selected="false" tabindex="-1" role="tab">
								<i class="ti ti-users-group"></i>
							</a>
							<a href="#" class="nav-link" title="Crm" data-bs-toggle="tab" data-bs-target="#crm" aria-selected="false" tabindex="-1" role="tab">
								<i class="ti ti-user-shield"></i>
							</a>
							<a href="#" class="nav-link" title="Hrm" data-bs-toggle="tab" data-bs-target="#hrm" aria-selected="false" tabindex="-1" role="tab">
								<i class="ti ti-user"></i>
							</a>
							<a href="#" class="nav-link" title="Finance" data-bs-toggle="tab" data-bs-target="#finance" aria-selected="false" tabindex="-1" role="tab">
								<i class="ti ti-shopping-cart-dollar"></i>
							</a>
							<a href="#" class="nav-link" title="Administration" data-bs-toggle="tab" data-bs-target="#administration" aria-selected="false" tabindex="-1" role="tab">
								<i class="ti ti-cash"></i>
							</a>
							<a href="#" class="nav-link" title="Content" data-bs-toggle="tab" data-bs-target="#content" aria-selected="false" tabindex="-1" role="tab">
								<i class="ti ti-license"></i>
							</a>
							<a href="#" class="nav-link" title="Pages" data-bs-toggle="tab" data-bs-target="#pages" aria-selected="false" tabindex="-1" role="tab">
								<i class="ti ti-page-break"></i>
							</a>
							<a href="#" class="nav-link" title="Authentication" data-bs-toggle="tab" data-bs-target="#authentication" aria-selected="false" tabindex="-1" role="tab">
								<i class="ti ti-lock-check"></i>
							</a>
							<a href="#" class="nav-link " title="UI Elements" data-bs-toggle="tab" data-bs-target="#ui-elements" aria-selected="false" tabindex="-1" role="tab">
								<i class="ti ti-ux-circle"></i>
							</a>
							<a href="#" class="nav-link" title="Extras" data-bs-toggle="tab" data-bs-target="#extras" aria-selected="false" tabindex="-1" role="tab">
								<i class="ti ti-vector-triangle"></i>
							</a>
						</div>
					</div><div class="slimScrollBar" style="background: rgb(204, 204, 204); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
				</div>
				<div class="sidebar-right">
					<div class="sidebar-logo mb-4">
						<a href="index.html" class="logo logo-normal">
							<img src="assets/img/logo.svg" alt="Logo">
						</a>
						<a href="index.html" class="dark-logo">
							<img src="assets/img/logo-white.svg" alt="Logo">
						</a>
					</div>
					<div class="sidebar-scroll">
						<h6 class="mb-3">Welcome to SmartHR</h6>
						<div class="text-center rounded bg-light p-3 mb-4">
							<div class="avatar avatar-lg online mb-3">
								<img src="assets/img/profiles/avatar-02.jpg" alt="Img" class="img-fluid rounded-circle">
							</div>
							<h6 class="fs-12 fw-normal mb-1">Adrian Herman</h6>
							<p class="fs-10">System Admin</p>
						</div>
						<div class="tab-content" id="v-pills-tabContent">
							<div class="tab-pane fade show active" id="dashboard" role="tabpanel">
								<ul>
									<li class="menu-title"><span>MAIN MENU</span></li>
									<li><a href="index.html" class="active">Admin Dashboard</a></li>
									<li><a href="employee-dashboard.html">Employee Dashboard</a></li>
									<li><a href="deals-dashboard.html">Deals Dashboard</a></li>
									<li><a href="leads-dashboard.html">Leads Dashboard</a></li>
								</ul>
							</div>
							<div class="tab-pane fade" id="application" role="tabpanel">
								<ul>
									<li class="menu-title"><span>APPLICATION</span></li>
									<li><a href="voice-call.html">Voice Call</a></li>
									<li><a href="video-call.html">Video Call</a></li>
									<li><a href="outgoing-call.html">Outgoing Call</a></li>
									<li><a href="incoming-call.html">Incoming Call</a></li>
									<li><a href="call-history.html">Call History</a></li>
									<li><a href="calendar.html">Calendar</a></li>
									<li><a href="email.html">Email</a></li>
									<li><a href="todo.html">To Do</a></li>
									<li><a href="notes.html">Notes</a></li>
									<li><a href="file-manager.html">File Manager</a></li>
									<li><a href="kanban-view.html">Kanban</a></li>
									<li><a href="invoices.html">Invoices</a></li>
								</ul>
							</div>
							<div class="tab-pane fade" id="super-admin" role="tabpanel">
								<ul>
									<li class="menu-title"><span>SUPER ADMIN</span></li>
									<li><a href="dashboard.html">Dashboard</a></li>
									<li><a href="companies.html">Companies</a></li>
									<li><a href="subscription.html">Subscriptions</a></li>
									<li><a href="packages.html">Packages</a></li>
									<li><a href="domain.html">Domain</a></li>
									<li><a href="purchase-transaction.html">Purchase Transaction</a></li>
								</ul>
							</div>
							<div class="tab-pane fade" id="layout" role="tabpanel">
								<ul>
									<li class="menu-title"><span>LAYOUT</span></li>
									<li><a href="layout-horizontal.html"><span>Horizontal</span></a></li>
									<li><a href="layout-detached.html"><span>Detached</span></a></li>
									<li><a href="layout-modern.html"><span>Modern</span></a></li>
									<li><a href="layout-two-column.html"><span>Two Column </span></a></li>
									<li><a href="layout-hovered.html"><span>Hovered</span></a></li>
									<li><a href="layout-box.html"><span>Boxed</span></a></li>
									<li><a href="layout-horizontal-single.html"><span>Horizontal Single</span></a></li>
									<li><a href="layout-horizontal-overlay.html"><span>Horizontal Overlay</span></a></li>
									<li><a href="layout-horizontal-box.html"><span>Horizontal Box</span></a></li>
									<li><a href="layout-horizontal-sidemenu.html"><span>Menu Aside</span></a></li>
									<li><a href="layout-vertical-transparent.html"><span>Transparent</span></a></li>
									<li><a href="layout-without-header.html"><span>Without Header</span></a></li>
									<li><a href="layout-rtl.html"><span>RTL</span></a></li>
									<li><a href="layout-dark.html"><span>Dark</span></a></li>
								</ul>
							</div>
							<div class="tab-pane fade" id="projects" role="tabpanel">
								<ul>
									<li class="menu-title"><span>PROJECTS</span></li>
									<li><a href="clients-grid.html">Clients</a></li>
									<li class="submenu">
										<a href="javascript:void(0);"><span>Projects</span>
											<span class="menu-arrow"></span>
										</a>
										<ul>
											<li><a href="projects-grid.html">Projects</a></li>
											<li><a href="tasks.html">Tasks</a></li>
											<li><a href="task-board.html">Task Board</a></li>
										</ul>
									</li>	
								</ul>
							</div>
							<div class="tab-pane fade" id="crm" role="tabpanel">
								<ul>
									<li class="menu-title"><span>CRM</span></li>
									<li><a href="contacts-grid.html"><span>Contacts</span></a></li>
									<li><a href="companies-grid.html"><span>Companies</span></a></li>
									<li><a href="deals-grid.html"><span>Deals</span></a></li>
									<li><a href="leads-grid.html"><span>Leads</span></a></li>
									<li><a href="pipeline.html"><span>Pipeline</span></a></li>
									<li><a href="analytics.html"><span>Analytics</span></a></li>
									<li><a href="activity.html"><span>Activities</span></a></li>
								</ul>
							</div>
							<div class="tab-pane fade" id="hrm" role="tabpanel">
								<ul>
									<li class="menu-title"><span>HRM</span></li>
									<li class="submenu">
										<a href="javascript:void(0);"><span>Employees</span>
											<span class="menu-arrow"></span>
										</a>
										<ul>
											<li><a href="employees.html">Employee Lists</a></li>
											<li><a href="employees-grid.html">Employee Grid</a></li>
											<li><a href="employee-details.html">Employee Details</a></li>
											<li><a href="departments.html">Departments</a></li>
											<li><a href="designations.html">Designations</a></li>
											<li><a href="policy.html">Policies</a></li>
										</ul>
									</li>
									<li class="submenu">
										<a href="javascript:void(0);"><span>Tickets</span>
											<span class="menu-arrow"></span>
										</a>
										<ul>
											<li><a href="tickets.html">Tickets</a></li>
											<li><a href="ticket-details.html">Ticket Details</a></li>
										</ul>
									</li>
									<li><a href="holidays.html"><span>Holidays</span></a></li>
									<li class="submenu">
										<a href="javascript:void(0);"><span>Attendance</span>
											<span class="menu-arrow"></span>
										</a>
										<ul>
											<li class="submenu submenu-two">
												<a href="javascript:void(0);">Leaves<span class="menu-arrow inside-submenu"></span></a>
												<ul>
													<li><a href="leaves.html">Leaves (Admin)</a></li>
													<li><a href="leaves-employee.html">Leave (Employee)</a></li>
													<li><a href="leave-settings.html">Leave Settings</a></li>												
												</ul>												
											</li>
											<li><a href="attendance-admin.html">Attendance (Admin)</a></li>
											<li><a href="attendance-employee.html">Attendance (Employee)</a></li>
											<li><a href="timesheets.html">Timesheets</a></li>
											<li><a href="schedule-timing.html">Shift &amp; Schedule</a></li>
											<li><a href="overtime.html">Overtime</a></li>
										</ul>
									</li>
									<li class="submenu">
										<a href="javascript:void(0);"><span>Performance</span>
											<span class="menu-arrow"></span>
										</a>
										<ul>
											<li><a href="performance-indicator.html">Performance Indicator</a></li>
											<li><a href="performance-review.html">Performance Review</a></li>
											<li><a href="performance-appraisal.html">Performance Appraisal</a></li>
											<li><a href="goal-tracking.html">Goal List</a></li>
											<li><a href="goal-type.html">Goal Type</a></li>
										</ul>
									</li>
									<li class="submenu">
										<a href="javascript:void(0);"><span>Training</span>
											<span class="menu-arrow"></span>
										</a>
										<ul>
											<li><a href="training.html">Training List</a></li>
											<li><a href="trainers.html">Trainers</a></li>
											<li><a href="training-type.html">Training Type</a></li>
										</ul>
									</li>
									<li><a href="promotion.html"><span>Promotion</span></a></li>
									<li><a href="resignation.html"><span>Resignation</span></a></li>
									<li><a href="termination.html"><span>Termination</span></a></li>
								</ul>
							</div>
							<div class="tab-pane fade" id="finance" role="tabpanel">
								<ul>
									<li class="menu-title"><span>FINANCE &amp; ACCOUNTS</span></li>
									<li class="submenu">
										<a href="javascript:void(0);"><span>Sales</span>
											<span class="menu-arrow"></span>
										</a>
										<ul>
											<li><a href="estimates.html">Estimates</a></li>
											<li><a href="invoices.html">Invoices</a></li>
											<li><a href="payments.html">Payments</a></li>
											<li><a href="expenses.html">Expenses</a></li>
											<li><a href="provident-fund.html">Provident Fund</a></li>
											<li><a href="taxes.html">Taxes</a></li>
										</ul>
									</li>
									<li class="submenu">
										<a href="javascript:void(0);"><span>Accounting</span>
											<span class="menu-arrow"></span>
										</a>
										<ul>
											<li><a href="categories.html">Categories</a></li>
											<li><a href="budgets.html">Budgets</a></li>
											<li><a href="budget-expenses.html">Budget Expenses</a></li>
											<li><a href="budget-revenues.html">Budget Revenues</a></li>
										</ul>
									</li>
									<li class="submenu">
										<a href="javascript:void(0);"><span>Payroll</span>
											<span class="menu-arrow"></span>
										</a>
										<ul>
											<li><a href="employee-salary.html">Employee Salary</a></li>
											<li><a href="payslip.html">Payslip</a></li>
											<li><a href="payroll.html">Payroll Items</a></li>
										</ul>
									</li>									
								</ul>
							</div>
							<div class="tab-pane fade" id="administration" role="tabpanel">
								<ul>
									<li class="menu-title"><span>ADMINISTRATION</span></li>
									<li class="submenu">
										<a href="javascript:void(0);"><span>Assets</span>
											<span class="menu-arrow"></span>
										</a>
										<ul>
											<li><a href="assets.html">Assets</a></li>
											<li><a href="asset-categories.html">Asset Categories</a></li>
										</ul>
									</li>
									<li class="submenu">
										<a href="javascript:void(0);"><span>Help &amp; Supports</span>
											<span class="menu-arrow"></span>
										</a>
										<ul>
											<li><a href="knowledgebase.html">Knowledge Base</a></li>
											<li><a href="activity.html">Activities</a></li>
										</ul>
									</li>
									<li class="submenu">
										<a href="javascript:void(0);"><span>User Management</span>
											<span class="menu-arrow"></span>
										</a>
										<ul>
											<li><a href="users.html">Users</a></li>
											<li><a href="roles-permissions.html">Roles &amp; Permissions</a></li>
										</ul>
									</li>
									<li class="submenu">
										<a href="javascript:void(0);"><span>Reports</span>
											<span class="menu-arrow"></span>
										</a>
										<ul>
											<li><a href="expenses-report.html">Expense Report</a></li>
											<li><a href="invoice-report.html">Invoice Report</a></li>
											<li><a href="payment-report.html">Payment Report</a></li>
											<li><a href="project-report.html">Project Report</a></li>
											<li><a href="task-report.html">Task Report</a></li>
											<li><a href="user-report.html">User Report</a></li>
											<li><a href="employee-report.html">Employee Report</a></li>
											<li><a href="payslip-report.html">Payslip Report</a></li>
											<li><a href="attendance-report.html">Attendance Report</a></li>
											<li><a href="leave-report.html">Leave Report</a></li>
											<li><a href="daily-report.html">Daily Report</a></li>
										</ul>
									</li>
									<li class="submenu">
										<a href="javascript:void(0);">
											General Settings
											<span class="menu-arrow"></span>
										</a>
										<ul>
											<li><a href="profile-settings.html">Profile</a></li>
											<li><a href="security-settings.html">Security</a></li>
											<li><a href="notification-settings.html">Notifications</a></li>
											<li><a href="connected-apps.html">Connected Apps</a></li>
										</ul>
									</li>
									<li class="submenu">
										<a href="javascript:void(0);">
											Website Settings
											<span class="menu-arrow"></span>
										</a>
										<ul>
											<li><a href="bussiness-settings.html">Business Settings</a></li>
											<li><a href="seo-settings.html">SEO Settings</a></li>
											<li><a href="localization-settings.html">Localization</a></li>
											<li><a href="prefixes.html">Prefixes</a></li>
											<li><a href="preferences.html">Preferences</a></li>
											<li><a href="performance-appraisal.html">Appearance</a></li>
											<li><a href="language.html">Language</a></li>
											<li><a href="authentication-settings.html">Authentication</a></li>
											<li><a href="ai-settings.html">AI Settings</a></li>
										</ul>
									</li>
									<li class="submenu">
										<a href="javascript:void(0);">App Settings<span class="menu-arrow"></span></a>
										<ul>
											<li><a href="salary-settings.html">Salary Settings</a></li>
											<li><a href="approval-settings.html">Approval Settings</a></li>
											<li><a href="invoice-settings.html">Invoice Settings</a></li>
											<li><a href="leave-type.html">Leave Type</a></li>
											<li><a href="custom-fields.html">Custom Fields</a></li>
										</ul>
									</li>
									<li class="submenu">
										<a href="javascript:void(0);">
											System Settings
											<span class="menu-arrow"></span>
										</a>
										<ul>
											<li><a href="email-settings.html">Email Settings</a></li>
											<li><a href="email-template.html">Email Templates</a></li>
											<li><a href="sms-settings.html">SMS Settings</a></li>
											<li><a href="sms-template.html">SMS Templates</a></li>
											<li><a href="otp-settings.html">OTP</a></li>
											<li><a href="gdpr.html">GDPR Cookies</a></li>
											<li><a href="maintenance-mode.html">Maintenance Mode</a></li>
										</ul>
									</li>
									<li class="submenu">
										<a href="javascript:void(0);">
											Financial Settings
											<span class="menu-arrow"></span>
										</a>
										<ul>
											<li><a href="payment-gateways.html">Payment Gateways</a></li>
											<li><a href="tax-rates.html">Tax Rate</a></li>
											<li><a href="currencies.html">Currencies</a></li>
										</ul>
									</li>
									<li class="submenu">
										<a href="javascript:void(0);">Other Settings<span class="menu-arrow"></span></a>
										<ul>
											<li><a href="custom-css.html">Custom CSS</a></li>
											<li><a href="custom-js.html">Custom JS</a></li>
											<li><a href="cronjob.html">Cronjob</a></li>
											<li><a href="storage-settings.html">Storage</a></li>
											<li><a href="ban-ip-address.html">Ban IP Address</a></li>
											<li><a href="backup.html">Backup</a></li>
											<li><a href="clear-cache.html">Clear Cache</a></li>
										</ul>
									</li>
								</ul>
							</div>
							<div class="tab-pane fade" id="content" role="tabpanel">
								<ul>
									<li class="menu-title"><span>CONTENT</span></li>
									<li><a href="pages.html">Pages</a></li>
									<li class="submenu">
										<a href="javascript:void(0);">
											Blogs
											<span class="menu-arrow"></span>
										</a>
										<ul>
											<li><a href="blogs.html">All Blogs</a></li>
											<li><a href="blog-categories.html">Categories</a></li>
											<li><a href="blog-comments.html">Comments</a></li>
											<li><a href="blog-tags.html">Blog Tags</a></li>
										</ul>
									</li>
									<li class="submenu">
										<a href="javascript:void(0);">
											Locations
											<span class="menu-arrow"></span>
										</a>
										<ul>
											<li><a href="countries.html">Countries</a></li>
											<li><a href="states.html">States</a></li>
											<li><a href="cities.html">Cities</a></li>
										</ul>
									</li>
									<li><a href="testimonials.html">Testimonials</a></li>
									<li><a href="faq.html">FAQ’S</a></li>
								</ul>
							</div>
							<div class="tab-pane fade" id="pages" role="tabpanel">
								<ul>
									<li class="menu-title"><span>PAGES</span></li>
									<li><a href="starter.html"><span>Starter</span></a></li>
									<li><a href="profile.html"><span>Profile</span></a></li>
									<li><a href="gallery.html"><span>Gallery</span></a></li>
									<li><a href="search-result.html"><span>Search Results</span></a></li>
									<li><a href="timeline.html"><span>Timeline</span></a></li>
									<li><a href="pricing.html"><span>Pricing</span></a></li>
									<li><a href="coming-soon.html"><span>Coming Soon</span></a></li>
									<li><a href="under-maintenance.html"><span>Under Maintenance</span></a></li>
									<li><a href="under-construction.html"><span>Under Construction</span></a></li>
									<li><a href="api-keys.html"><span>API Keys</span></a></li>
									<li><a href="privacy-policy.html"><span>Privacy Policy</span></a></li>
									<li><a href="terms-condition.html"><span>Terms &amp; Conditions</span></a></li>
								</ul>
							</div>
							<div class="tab-pane fade" id="authentication" role="tabpanel">
								<ul>
									<li class="menu-title"><span>AUTHENTICATION</span></li>
									<li class="submenu">
										<a href="javascript:void(0);">
											Login<span class="menu-arrow"></span>
										</a>
										<ul>
											<li><a href="login.html">Cover</a></li>
											<li><a href="login-2.html">Illustration</a></li>
											<li><a href="login-3.html">Basic</a></li>
										</ul>
									</li>
									<li class="submenu">
										<a href="javascript:void(0);">
											Register<span class="menu-arrow"></span>
										</a>
										<ul>
											<li><a href="register.html">Cover</a></li>
											<li><a href="register-2.html">Illustration</a></li>
											<li><a href="register-3.html">Basic</a></li>
										</ul>
									</li>
									<li class="submenu">
										<a href="javascript:void(0);">
											Forgot Password<span class="menu-arrow"></span>
										</a>
										<ul>
											<li><a href="forgot-password.html">Cover</a></li>
											<li><a href="forgot-password-2.html">Illustration</a></li>
											<li><a href="forgot-password-3.html">Basic</a></li>
										</ul>
									</li>
									<li class="submenu">
										<a href="javascript:void(0);">
											Reset Password<span class="menu-arrow"></span>
										</a>
										<ul>
											<li><a href="reset-password.html">Cover</a></li>
											<li><a href="reset-password-2.html">Illustration</a></li>
											<li><a href="reset-password-3.html">Basic</a></li>
										</ul>
									</li>
									<li class="submenu">
										<a href="javascript:void(0);">
											Email Verification<span class="menu-arrow"></span>
										</a>
										<ul>
											<li><a href="email-verification.html">Cover</a></li>
											<li><a href="email-verification-2.html">Illustration</a></li>
											<li><a href="email-verification-3.html">Basic</a></li>
										</ul>
									</li>
									<li class="submenu">
										<a href="javascript:void(0);">
											2 Step Verification<span class="menu-arrow"></span>
										</a>
										<ul>
											<li><a href="two-step-verification.html">Cover</a></li>
											<li><a href="two-step-verification-2.html">Illustration</a></li>
											<li><a href="two-step-verification-3.html">Basic</a></li>
										</ul>
									</li>
									<li><a href="lock-screen.html">Lock Screen</a></li>
									<li><a href="error-404.html">404 Error</a></li>
									<li><a href="error-500.html">500 Error</a></li>
								</ul>
							</div>
							<div class="tab-pane fade" id="ui-elements" role="tabpanel">
								<ul>
									<li class="menu-title"><span>UI INTERFACE</span></li>
									<li class="submenu">
										<a href="javascript:void(0);">Base UI<span class="menu-arrow"></span>
										</a>
										<ul>
											<li><a href="ui-alerts.html">Alerts</a></li>
											<li><a href="ui-accordion.html">Accordion</a></li>
											<li><a href="ui-avatar.html">Avatar</a></li>
											<li><a href="ui-badges.html">Badges</a></li>
											<li><a href="ui-borders.html">Border</a></li>
											<li><a href="ui-buttons.html">Buttons</a></li>
											<li><a href="ui-buttons-group.html">Button Group</a></li>
											<li><a href="ui-breadcrumb.html">Breadcrumb</a></li>
											<li><a href="ui-cards.html">Card</a></li>
											<li><a href="ui-carousel.html">Carousel</a></li>
											<li><a href="ui-colors.html">Colors</a></li>
											<li><a href="ui-dropdowns.html">Dropdowns</a></li>
											<li><a href="ui-grid.html">Grid</a></li>
											<li><a href="ui-images.html">Images</a></li>
											<li><a href="ui-lightbox.html">Lightbox</a></li>
											<li><a href="ui-media.html">Media</a></li>
											<li><a href="ui-modals.html">Modals</a></li>
											<li><a href="ui-offcanvas.html">Offcanvas</a></li>
											<li><a href="ui-pagination.html">Pagination</a></li>
											<li><a href="ui-popovers.html">Popovers</a></li>
											<li><a href="ui-progress.html">Progress</a></li>
											<li><a href="ui-placeholders.html">Placeholders</a></li>
											<li><a href="ui-spinner.html">Spinner</a></li>
											<li><a href="ui-sweetalerts.html">Sweet Alerts</a></li>
											<li><a href="ui-nav-tabs.html">Tabs</a></li>
											<li><a href="ui-toasts.html">Toasts</a></li>
											<li><a href="ui-tooltips.html">Tooltips</a></li>
											<li><a href="ui-typography.html">Typography</a></li>
											<li><a href="ui-video.html">Video</a></li>
											<li><a href="ui-sortable.html">Sortable</a></li>
											<li><a href="ui-swiperjs.html">Swiperjs</a></li>						
										</ul>
									</li>
									<li class="submenu">
										<a href="javascript:void(0);"> Advanced UI <span class="menu-arrow"></span> </a>
										<ul>
											<li><a href="ui-ribbon.html">Ribbon</a></li>
											<li><a href="ui-clipboard.html">Clipboard</a></li>
											<li><a href="ui-drag-drop.html">Drag &amp; Drop</a></li>
											<li><a href="ui-rangeslider.html">Range Slider</a></li>
											<li><a href="ui-rating.html">Rating</a></li>
											<li><a href="ui-text-editor.html">Text Editor</a></li>
											<li><a href="ui-counter.html">Counter</a></li>
											<li><a href="ui-scrollbar.html">Scrollbar</a></li>
											<li><a href="ui-stickynote.html">Sticky Note</a></li>
											<li><a href="ui-timeline.html">Timeline</a></li>
										</ul>
									</li>
									<li class="submenu">
										<a href="javascript:void(0);"> Forms <span class="menu-arrow"></span>
										</a>
										<ul>
											<li class="submenu submenu-two">
												<a href="javascript:void(0);">Form Elements<span class="menu-arrow inside-submenu"></span></a>
												<ul>
													<li><a href="form-basic-inputs.html">Basic Inputs</a></li>
													<li><a href="form-checkbox-radios.html">Checkbox &amp; Radios</a></li>
													<li><a href="form-input-groups.html">Input Groups</a></li>
													<li><a href="form-grid-gutters.html">Grid &amp; Gutters</a></li>
													<li><a href="form-select.html">Form Select</a></li>
													<li><a href="form-mask.html">Input Masks</a></li>
													<li><a href="form-fileupload.html">File Uploads</a></li>
												</ul>
											</li>
											<li class="submenu submenu-two">
												<a href="javascript:void(0);">Layouts<span class="menu-arrow inside-submenu"></span></a>
												<ul>
													<li><a href="form-horizontal.html">Horizontal Form</a></li>
													<li><a href="form-vertical.html">Vertical Form</a></li>
													<li><a href="form-floating-labels.html">Floating Labels</a></li>
												</ul>
											</li>
											<li><a href="form-validation.html">Form Validation</a></li>
											<li><a href="form-select2.html">Select2</a></li>
											<li><a href="form-wizard.html">Form Wizard</a></li>
											<li><a href="form-pickers.html">Form Picker</a></li>
										</ul>
									</li>
									<li class="submenu">
										<a href="javascript:void(0);">Tables <span class="menu-arrow"></span></a>
										<ul>
											<li><a href="tables-basic.html">Basic Tables </a></li>
											<li><a href="data-tables.html">Data Table </a></li>
										</ul>
									</li>
									<li class="submenu">
										<a href="javascript:void(0);">Charts<span class="menu-arrow"></span> </a>
										<ul>
											<li><a href="chart-apex.html">Apex Charts</a></li>
											<li><a href="chart-c3.html">Chart C3</a></li>
											<li><a href="chart-js.html">Chart Js</a></li>
											<li><a href="chart-morris.html">Morris Charts</a></li>
											<li><a href="chart-flot.html">Flot Charts</a></li>
											<li><a href="chart-peity.html">Peity Charts</a></li>
										</ul>
									</li>
									<li class="submenu">
										<a href="javascript:void(0);">Icons<span class="menu-arrow"></span> </a>
										<ul>
											<li><a href="icon-fontawesome.html">Fontawesome Icons</a></li>
											<li><a href="icon-tabler.html">Tabler Icons</a></li>
											<li><a href="icon-bootstrap.html">Bootstrap Icons</a></li>
											<li><a href="icon-remix.html">Remix Icons</a></li>
											<li><a href="icon-feather.html">Feather Icons</a></li>
											<li><a href="icon-ionic.html">Ionic Icons</a></li>
											<li><a href="icon-material.html">Material Icons</a></li>
											<li><a href="icon-pe7.html">Pe7 Icons</a></li>
											<li><a href="icon-simpleline.html">Simpleline Icons</a></li>
											<li><a href="icon-themify.html">Themify Icons</a></li>
											<li><a href="icon-weather.html">Weather Icons</a></li>
											<li><a href="icon-typicon.html">Typicon Icons</a></li>
											<li><a href="icon-flag.html">Flag Icons</a></li>
											
										</ul>
									</li>
									<li class="submenu">
										<a href="javascript:void(0);">
											<i class="ti ti-table-plus"></i>
											<span>Maps</span>
											<span class="menu-arrow"></span>
										</a>
										<ul>
											<li>
												<a href="maps-vector.html">Vector</a>
											</li>
											<li>
												<a href="maps-leaflet.html">Leaflet</a>
											</li>
										</ul>
									</li>
								</ul>
							</div>
							<div class="tab-pane fade" id="extras" role="tabpanel">
								<ul>
									<li class="menu-title"><span>EXTRAS</span></li>
									<li><a href="#">Documentation</a></li>
									<li><a href="#">Change Log</a></li>
									<li class="submenu">
										<a href="javascript:void(0);"><span>Multi Level</span><span class="menu-arrow"></span></a>
										<ul>
											<li><a href="javascript:void(0);">Multilevel 1</a></li>
											<li class="submenu submenu-two">
												<a href="javascript:void(0);">Multilevel 2<span class="menu-arrow inside-submenu"></span></a>
												<ul>
													<li><a href="javascript:void(0);">Multilevel 2.1</a></li>
													<li class="submenu submenu-two submenu-three">
														<a href="javascript:void(0);">Multilevel 2.2<span class="menu-arrow inside-submenu inside-submenu-two"></span></a>
														<ul>
															<li><a href="javascript:void(0);">Multilevel 2.2.1</a></li>
															<li><a href="javascript:void(0);">Multilevel 2.2.2</a></li>
														</ul>
													</li>
												</ul>
											</li>
											<li><a href="javascript:void(0);">Multilevel 3</a></li>
										</ul>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Two Col Sidebar -->

		<!-- Stacked Sidebar -->
		<div class="stacked-sidebar" id="stacked-sidebar">
			<div class="sidebar sidebar-stacked" style="display: flex !important;">
				<div class="stacked-mini">
					<a href="index.html" class="logo-small">
						<img src="assets/img/logo-small.svg" alt="Logo">
					</a>
					<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: 100%; height: 974px;"><div class="sidebar-left slimscroll" style="overflow: hidden; width: 100%; height: 958px;">
						<div class="d-flex align-items-center flex-column">
							<div class="mb-1 notification-item">
								<a href="#" class="btn btn-menubar position-relative">
									<i class="ti ti-bell"></i>
									<span class="notification-status-dot"></span>
								</a>
							</div>
							<div class="mb-1">
								<a href="#" class="btn btn-menubar btnFullscreen">
									<i class="ti ti-maximize"></i>
								</a>
							</div>
							<div class="mb-1">
								<a href="calendar.html" class="btn btn-menubar">
									<i class="ti ti-layout-grid-remove"></i>
								</a>
							</div>
							<div class="mb-1">
								<a href="chat.html" class="btn btn-menubar position-relative">
									<i class="ti ti-brand-hipchat"></i>
									<span class="badge bg-info rounded-pill d-flex align-items-center justify-content-center header-badge">5</span>
								</a>
							</div>
							<div class="mb-1">
								<a href="email.html" class="btn btn-menubar">
									<i class="ti ti-mail"></i>
								</a>
							</div>
						</div>
					</div><div class="slimScrollBar" style="background: rgb(204, 204, 204); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
				</div>
				<div class="sidebar-right d-flex justify-content-between flex-column">
					<div class="sidebar-scroll">
						<h6 class="mb-3">Welcome to SmartHR</h6>
						<div class="sidebar-profile text-center rounded bg-light p-3 mb-4">
							<div class="avatar avatar-lg online mb-3">
								<img src="assets/img/profiles/avatar-02.jpg" alt="Img" class="img-fluid rounded-circle">
							</div>
							<h6 class="fs-12 fw-normal mb-1">Adrian Herman</h6>
							<p class="fs-10">System Admin</p>
						</div>
						<div class="stack-menu">
							<div class="nav flex-column align-items-center nav-pills" role="tablist" aria-orientation="vertical">
								<div class="row g-2">
									<div class="col-6">
										<a href="#menu-dashboard" role="tab" class="nav-link active" title="Dashboard" data-bs-toggle="tab" data-bs-target="#menu-dashboard" aria-selected="true">
											<span><i class="ti ti-smart-home"></i></span>
											<p>Dashboard</p>
										</a>
									</div>
									<div class="col-6">
										<a href="#menu-application" role="tab" class="nav-link" title="Apps" data-bs-toggle="tab" data-bs-target="#menu-application" aria-selected="false" tabindex="-1">
											<span><i class="ti ti-layout-grid-add"></i></span>
											<p>Applications</p>
										</a>
									</div>
									<div class="col-6">
										<a href="#menu-superadmin" role="tab" class="nav-link" title="Apps" data-bs-toggle="tab" data-bs-target="#menu-superadmin" aria-selected="false" tabindex="-1">
											<span><i class="ti ti-user-star"></i></span>
											<p>Super Admin</p>
										</a>
									</div>
									<div class="col-6">
										<a href="#menu-layout" role="tab" class="nav-link" title="Layout" data-bs-toggle="tab" data-bs-target="#menu-layout" aria-selected="false" tabindex="-1">
											<span><i class="ti ti-layout-board-split"></i></span>
											<p>Layouts</p>
										</a>
									</div>
									<div class="col-6">
										<a href="#menu-project" role="tab" class="nav-link" title="Projects" data-bs-toggle="tab" data-bs-target="#menu-project" aria-selected="false" tabindex="-1">
											<span><i class="ti ti-folder"></i></span>
											<p>Projects</p>
										</a>
									</div>
									<div class="col-6">
										<a href="#menu-crm" role="tab" class="nav-link" title="CRM" data-bs-toggle="tab" data-bs-target="#menu-crm" aria-selected="false" tabindex="-1">
											<span><i class="ti ti-user-shield"></i></span>
											<p>Crm</p>
										</a>
									</div>
									<div class="col-6">
										<a href="#menu-hrm" role="tab" class="nav-link" title="HRM" data-bs-toggle="tab" data-bs-target="#menu-hrm" aria-selected="false" tabindex="-1">
											<span><i class="ti ti-users"></i></span>
											<p>Hrm</p>
										</a>
									</div>
									<div class="col-6">
										<a href="#menu-finance" role="tab" class="nav-link" title="Finance &amp; Accounts" data-bs-toggle="tab" data-bs-target="#menu-finance" aria-selected="false" tabindex="-1">
											<span><i class="ti ti-shopping-cart-dollar"></i></span>
											<p>Finance &amp; Accounts</p>
										</a>
									</div>
									<div class="col-6">
										<a href="#menu-administration" role="tab" class="nav-link" title="Administration" data-bs-toggle="tab" data-bs-target="#menu-administration" aria-selected="false" tabindex="-1">
											<span><i class="ti ti-cash"></i></span>
											<p>Administration</p>
										</a>
									</div>
									<div class="col-6">
										<a href="#menu-content" role="tab" class="nav-link" title="Content" data-bs-toggle="tab" data-bs-target="#menu-content" aria-selected="false" tabindex="-1">
											<span><i class="ti ti-license"></i></span>
											<p>Contents</p>
										</a>
									</div>
									<div class="col-6">
										<a href="#menu-pages" role="tab" class="nav-link" title="Pages" data-bs-toggle="tab" data-bs-target="#menu-pages" aria-selected="false" tabindex="-1">
											<span><i class="ti ti-page-break"></i></span>
											<p>Pages</p>
										</a>
									</div>
									<div class="col-6">
										<a href="#menu-authentication" role="tab" class="nav-link" title="Authentication" data-bs-toggle="tab" data-bs-target="#menu-authentication" aria-selected="false" tabindex="-1">
											<span><i class="ti ti-lock-check"></i></span>
											<p>Authentication</p>
										</a>
									</div>
									<div class="col-6">
										<a href="#menu-ui-elements" role="tab" class="nav-link" title="UI Elements" data-bs-toggle="tab" data-bs-target="#menu-ui-elements" aria-selected="false" tabindex="-1">
											<span><i class="ti ti-ux-circle"></i></span>
											<p>Basic UI</p>
										</a>
									</div>
								</div>
							</div>
							<div class="tab-content">
								<div class="tab-pane fade show active" id="menu-dashboard" role="tabpanel">
									<ul class="stack-submenu">
										<li><a href="index.html" class="active">Admin Dashboard</a></li>
										<li><a href="employee-dashboard.html">Employee Dashboard</a></li>
										<li><a href="deals-dashboard.html">Deals Dashboard</a></li>
										<li><a href="leads-dashboard.html">Leads Dashboard</a></li>
									</ul>
								</div>
								<div class="tab-pane fade" id="menu-superadmin" role="tabpanel">
									<ul class="stack-submenu">
										<li><a href="dashboard.html">Dashboard</a></li>
										<li><a href="companies.html">Companies</a></li>
										<li><a href="subscription.html">Subscriptions</a></li>
										<li><a href="packages.html">Packages</a></li>
										<li><a href="domain.html">Domain</a></li>
										<li><a href="purchase-transaction.html">Purchase Transaction</a></li>
									</ul>
								</div>
								<div class="tab-pane fade" id="menu-application" role="tabpanel">
									<ul class="stack-submenu">
										<li><a href="chat.html">Chat</a></li>
										<li class="submenu submenu-two">
											<a href="call.html">Calls<span class="menu-arrow inside-submenu"></span></a>
											<ul>
												<li><a href="voice-call.html">Voice Call</a></li>
												<li><a href="video-call.html">Video Call</a></li>
												<li><a href="outgoing-call.html">Outgoing Call</a></li>
												<li><a href="incoming-call.html">Incoming Call</a></li>
												<li><a href="call-history.html">Call History</a></li>
											</ul>
										</li>
										<li><a href="calendar.html">Calendar</a></li>
										<li><a href="email.html">Email</a></li>
										<li><a href="todo.html">To Do</a></li>
										<li><a href="notes.html">Notes</a></li>
										<li><a href="social-feed.html">Social Feed</a></li>
										<li><a href="file-manager.html">File Manager</a></li>
										<li><a href="kanban-view.html">Kanban</a></li>
										<li><a href="invoices.html">Invoices</a></li>
									</ul>
								</div>
								<div class="tab-pane fade" id="menu-layout" role="tabpanel">
									<ul class="stack-submenu">
										<li><a href="layout-horizontal.html">Horizontal</a></li>
										<li><a href="layout-detached.html">Detached</a></li>
										<li><a href="layout-modern.html">Modern</a></li>
										<li><a href="layout-two-column.html">Two Column</a></li>
										<li><a href="layout-hovered.html">Hovered</a></li>
										<li><a href="layout-box.html">Boxed</a></li>
										<li><a href="layout-horizontal-single.html">Horizontal Single</a></li>
										<li><a href="layout-horizontal-overlay.html">Horizontal Overlay</a></li>
										<li><a href="layout-horizontal-box.html">Horizontal Box</a></li>
										<li><a href="layout-horizontal-sidemenu.html">Menu Aside</a></li>
										<li><a href="layout-vertical-transparent.html">Transparent</a></li>
										<li><a href="layout-without-header.html">Without Header</a></li>
										<li><a href="layout-rtl.html">RTL</a></li>
										<li><a href="layout-dark.html">Dark</a></li>
									</ul>
								</div>
								<div class="tab-pane fade" id="menu-project" role="tabpanel">
									<ul class="stack-submenu">
										<li><a href="clients-grid.html"><span>Clients</span></a></li>
										<li class="submenu">
											<a href="javascript:void(0);"><span>Projects</span>
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li><a href="projects-grid.html">Projects</a></li>
												<li><a href="tasks.html">Tasks</a></li>
												<li><a href="task-board.html">Task Board</a></li>
											</ul>
										</li>	
									</ul>
								</div>
								<div class="tab-pane fade" id="menu-crm" role="tabpanel">
									<ul class="stack-submenu">
										<li><a href="contacts-grid.html"><span>Contacts</span></a></li>
										<li><a href="companies-grid.html"><span>Companies</span></a></li>
										<li><a href="deals-grid.html"><span>Deals</span></a></li>
										<li><a href="leads-grid.html"><span>Leads</span></a></li>
										<li><a href="pipeline.html"><span>Pipeline</span></a></li>
										<li><a href="analytics.html"><span>Analytics</span></a></li>
										<li><a href="activity.html"><span>Activities</span></a></li>
									</ul>
								</div>
								<div class="tab-pane fade" id="menu-hrm" role="tabpanel">
									<ul class="stack-submenu">
										<li class="submenu">
											<a href="javascript:void(0);"><span>Employees</span>
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li><a href="employees.html">Employee Lists</a></li>
												<li><a href="employees-grid.html">Employee Grid</a></li>
												<li><a href="employee-details.html">Employee Details</a></li>
												<li><a href="departments.html">Departments</a></li>
												<li><a href="designations.html">Designations</a></li>
												<li><a href="policy.html">Policies</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);"><span>Tickets</span>
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li><a href="tickets.html">Tickets</a></li>
												<li><a href="ticket-details.html">Ticket Details</a></li>
											</ul>
										</li>
										<li><a href="holidays.html"><span>Holidays</span></a></li>
										<li class="submenu">
											<a href="javascript:void(0);"><span>Attendance</span>
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li class="submenu submenu-two">
													<a href="javascript:void(0);">Leaves<span class="menu-arrow inside-submenu"></span></a>
													<ul>
														<li><a href="leaves.html">Leaves (Admin)</a></li>
														<li><a href="leaves-employee.html">Leave (Employee)</a></li>
														<li><a href="leave-settings.html">Leave Settings</a></li>												
													</ul>												
												</li>
												<li><a href="attendance-admin.html">Attendance (Admin)</a></li>
												<li><a href="attendance-employee.html">Attendance (Employee)</a></li>
												<li><a href="timesheets.html">Timesheets</a></li>
												<li><a href="schedule-timing.html">Shift &amp; Schedule</a></li>
												<li><a href="overtime.html">Overtime</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);"><span>Performance</span>
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li><a href="performance-indicator.html">Performance Indicator</a></li>
												<li><a href="performance-review.html">Performance Review</a></li>
												<li><a href="performance-appraisal.html">Performance Appraisal</a></li>
												<li><a href="goal-tracking.html">Goal List</a></li>
												<li><a href="goal-type.html">Goal Type</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);"><span>Training</span>
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li><a href="training.html">Training List</a></li>
												<li><a href="trainers.html">Trainers</a></li>
												<li><a href="training-type.html">Training Type</a></li>
											</ul>
										</li>
										<li><a href="promotion.html"><span>Promotion</span></a></li>
										<li><a href="resignation.html"><span>Resignation</span></a></li>
										<li><a href="termination.html"><span>Termination</span></a></li>
									</ul>
								</div>
								<div class="tab-pane fade" id="menu-finance" role="tabpanel">
									<ul class="stack-submenu">
										<li class="submenu">
											<a href="javascript:void(0);"><span>Sales</span>
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li><a href="estimates.html">Estimates</a></li>
												<li><a href="invoices.html">Invoices</a></li>
												<li><a href="payments.html">Payments</a></li>
												<li><a href="expenses.html">Expenses</a></li>
												<li><a href="provident-fund.html">Provident Fund</a></li>
												<li><a href="taxes.html">Taxes</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);"><span>Accounting</span>
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li><a href="categories.html">Categories</a></li>
												<li><a href="budgets.html">Budgets</a></li>
												<li><a href="budget-expenses.html">Budget Expenses</a></li>
												<li><a href="budget-revenues.html">Budget Revenues</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);"><span>Payroll</span>
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li><a href="employee-salary.html">Employee Salary</a></li>
												<li><a href="payslip.html">Payslip</a></li>
												<li><a href="payroll.html">Payroll Items</a></li>
											</ul>
										</li>
									</ul>
								</div>
								<div class="tab-pane fade" id="menu-administration" role="tabpanel">
									<ul class="stack-submenu">
										<li class="submenu">
											<a href="javascript:void(0);"><span>Assets</span>
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li><a href="assets.html">Assets</a></li>
												<li><a href="asset-categories.html">Asset Categories</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);"><span>Help &amp; Supports</span>
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li><a href="knowledgebase.html">Knowledge Base</a></li>
												<li><a href="activity.html">Activities</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);"><span>User Management</span>
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li><a href="users.html">Users</a></li>
												<li><a href="roles-permissions.html">Roles &amp; Permissions</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);"><span>Reports</span>
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li><a href="expenses-report.html">Expense Report</a></li>
												<li><a href="invoice-report.html">Invoice Report</a></li>
												<li><a href="payment-report.html">Payment Report</a></li>
												<li><a href="project-report.html">Project Report</a></li>
												<li><a href="task-report.html">Task Report</a></li>
												<li><a href="user-report.html">User Report</a></li>
												<li><a href="employee-report.html">Employee Report</a></li>
												<li><a href="payslip-report.html">Payslip Report</a></li>
												<li><a href="attendance-report.html">Attendance Report</a></li>
												<li><a href="leave-report.html">Leave Report</a></li>
												<li><a href="daily-report.html">Daily Report</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);">
												General Settings
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li><a href="profile-settings.html">Profile</a></li>
												<li><a href="security-settings.html">Security</a></li>
												<li><a href="notification-settings.html">Notifications</a></li>
												<li><a href="connected-apps.html">Connected Apps</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);">
												Website Settings
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li><a href="bussiness-settings.html">Business Settings</a></li>
												<li><a href="seo-settings.html">SEO Settings</a></li>
												<li><a href="localization-settings.html">Localization</a></li>
												<li><a href="prefixes.html">Prefixes</a></li>
												<li><a href="preferences.html">Preferences</a></li>
												<li><a href="performance-appraisal.html">Appearance</a></li>
												<li><a href="language.html">Language</a></li>
												<li><a href="authentication-settings.html">Authentication</a></li>
												<li><a href="ai-settings.html">AI Settings</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);">App Settings<span class="menu-arrow"></span></a>
											<ul>
												<li><a href="salary-settings.html">Salary Settings</a></li>
												<li><a href="approval-settings.html">Approval Settings</a></li>
												<li><a href="invoice-settings.html">Invoice Settings</a></li>
												<li><a href="leave-type.html">Leave Type</a></li>
												<li><a href="custom-fields.html">Custom Fields</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);">
												System Settings
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li><a href="email-settings.html">Email Settings</a></li>
												<li><a href="email-template.html">Email Templates</a></li>
												<li><a href="sms-settings.html">SMS Settings</a></li>
												<li><a href="sms-template.html">SMS Templates</a></li>
												<li><a href="otp-settings.html">OTP</a></li>
												<li><a href="gdpr.html">GDPR Cookies</a></li>
												<li><a href="maintenance-mode.html">Maintenance Mode</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);">
												Financial Settings
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li><a href="payment-gateways.html">Payment Gateways</a></li>
												<li><a href="tax-rates.html">Tax Rate</a></li>
												<li><a href="currencies.html">Currencies</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);">Other Settings<span class="menu-arrow"></span></a>
											<ul>
												<li><a href="custom-css.html">Custom CSS</a></li>
												<li><a href="custom-js.html">Custom JS</a></li>
												<li><a href="cronjob.html">Cronjob</a></li>
												<li><a href="storage-settings.html">Storage</a></li>
												<li><a href="ban-ip-address.html">Ban IP Address</a></li>
												<li><a href="backup.html">Backup</a></li>
												<li><a href="clear-cache.html">Clear Cache</a></li>
											</ul>
										</li>
									</ul>
								</div>
								<div class="tab-pane fade" id="menu-content" role="tabpanel">
									<ul class="stack-submenu">
										<li class="submenu">
											<a href="javascript:void(0);">Blogs<span class="menu-arrow"></span></a>
											<ul>
												<li><a href="blogs.html">All Blogs</a></li>
												<li><a href="blog-categories.html">Categories</a></li>
												<li><a href="blog-comments.html">Comments</a></li>
												<li><a href="blog-tags.html">Tags</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);">Locations<span class="menu-arrow"></span></a>
											<ul>
												<li><a href="countries.html">Countries</a></li>
												<li><a href="states.html">States</a></li>
												<li><a href="cities.html">Cities</a></li>
											</ul>
										</li>
										<li><a href="testimonials.html">Testimonials</a></li>
										<li><a href="faq.html">FAQ’S</a></li>
									</ul>
								</div>
								<div class="tab-pane fade" id="menu-pages" role="tabpanel">
									<ul class="stack-submenu">
										<li><a href="starter.html">Starter</a></li>
										<li><a href="profile.html">Profile</a></li>
										<li><a href="profile-settings.html">Profile Settings</a></li>
										<li><a href="gallery.html">Gallery</a></li>
										<li><a href="search-result.html">Search Results</a></li>
										<li><a href="timeline.html">Timeline</a></li>
										<li><a href="pricing.html">Pricing</a></li>
										<li><a href="coming-soon.html">Coming Soon</a></li>
										<li><a href="under-maintenance.html">Under Maintenance</a></li>
										<li><a href="under-construction.html">Under Construction</a></li>
										<li><a href="api-keys.html">API Keys</a></li>
										<li><a href="privacy-policy.html">Privacy Policy</a></li>
										<li><a href="terms-condition.html">Terms &amp; Conditions</a></li>
									</ul>
								</div>
								<div class="tab-pane fade" id="menu-authentication" role="tabpanel">
									<ul class="stack-submenu">
										<li class="submenu">
											<a href="javascript:void(0);" class="">Login<span class="menu-arrow"></span></a>
											<ul>
												<li><a href="login.html">Cover</a></li>
												<li><a href="login-2.html">Illustration</a></li>
												<li><a href="login-3.html">Basic</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);" class="">Register<span class="menu-arrow"></span></a>
											<ul>
												<li><a href="register.html">Cover</a></li>
												<li><a href="register-2.html">Illustration</a></li>
												<li><a href="register-3.html">Basic</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);">Reset Password<span class="menu-arrow"></span></a>
											<ul>
												<li><a href="reset-password.html">Cover</a></li>
												<li><a href="reset-password-2.html">Illustration</a></li>
												<li><a href="reset-password-3.html">Basic</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);">Email Verification<span class="menu-arrow"></span></a>
											<ul>
												<li><a href="email-verification.html">Cover</a></li>
												<li><a href="email-verification-2.html">Illustration</a></li>
												<li><a href="email-verification-3.html">Basic</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);">2 Step Verification<span class="menu-arrow"></span></a>
											<ul>
												<li><a href="two-step-verification.html">Cover</a></li>
												<li><a href="two-step-verification-2.html">Illustration</a></li>
												<li><a href="two-step-verification-3.html">Basic</a></li>
											</ul>
										</li>
										<li><a href="lock-screen.html">Lock Screen</a></li>
										<li><a href="error-404.html">404 Error</a></li>
										<li><a href="error-500.html">500 Error</a></li>
									</ul>
								</div>
								<div class="tab-pane fade" id="menu-ui-elements" role="tabpanel">
									<ul class="stack-submenu">
										<li class="submenu">
											<a href="javascript:void(0);">Base UI<span class="menu-arrow"></span></a>
											<ul>
												<li><a href="ui-alerts.html">Alerts</a></li>
												<li><a href="ui-accordion.html">Accordion</a></li>
												<li><a href="ui-avatar.html">Avatar</a></li>
												<li><a href="ui-badges.html">Badges</a></li>
												<li><a href="ui-borders.html">Border</a></li>
												<li><a href="ui-buttons.html">Buttons</a></li>
												<li><a href="ui-buttons-group.html">Button Group</a></li>
												<li><a href="ui-breadcrumb.html">Breadcrumb</a></li>
												<li><a href="ui-cards.html">Card</a></li>
												<li><a href="ui-carousel.html">Carousel</a></li>
												<li><a href="ui-colors.html">Colors</a></li>
												<li><a href="ui-dropdowns.html">Dropdowns</a></li>
												<li><a href="ui-grid.html">Grid</a></li>
												<li><a href="ui-images.html">Images</a></li>
												<li><a href="ui-lightbox.html">Lightbox</a></li>
												<li><a href="ui-media.html">Media</a></li>
												<li><a href="ui-modals.html">Modals</a></li>
												<li><a href="ui-offcanvas.html">Offcanvas</a></li>
												<li><a href="ui-pagination.html">Pagination</a></li>
												<li><a href="ui-popovers.html">Popovers</a></li>
												<li><a href="ui-progress.html">Progress</a></li>
												<li><a href="ui-placeholders.html">Placeholders</a></li>
												<li><a href="ui-spinner.html">Spinner</a></li>
												<li><a href="ui-sweetalerts.html">Sweet Alerts</a></li>
												<li><a href="ui-nav-tabs.html">Tabs</a></li>
												<li><a href="ui-toasts.html">Toasts</a></li>
												<li><a href="ui-tooltips.html">Tooltips</a></li>
												<li><a href="ui-typography.html">Typography</a></li>
												<li><a href="ui-video.html">Video</a></li>
											<li><a href="ui-sortable.html">Sortable</a></li>
											<li><a href="ui-swiperjs.html">Swiperjs</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);"> Advanced UI<span class="menu-arrow"></span></a>
											<ul>
												<li><a href="ui-ribbon.html">Ribbon</a></li>
												<li><a href="ui-clipboard.html">Clipboard</a></li>
												<li><a href="ui-drag-drop.html">Drag &amp; Drop</a></li>
												<li><a href="ui-rangeslider.html">Range Slider</a></li>
												<li><a href="ui-rating.html">Rating</a></li>
												<li><a href="ui-text-editor.html">Text Editor</a></li>
												<li><a href="ui-counter.html">Counter</a></li>
												<li><a href="ui-scrollbar.html">Scrollbar</a></li>
												<li><a href="ui-stickynote.html">Sticky Note</a></li>
												<li><a href="ui-timeline.html">Timeline</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);">Forms<span class="menu-arrow"></span> </a>
											<ul>
												<li class="submenu submenu-two">
													<a href="javascript:void(0);">Form Elements<span class="menu-arrow inside-submenu"></span></a>
													<ul>
														<li><a href="form-basic-inputs.html">Basic Inputs</a></li>
														<li><a href="form-checkbox-radios.html">Checkbox &amp; Radios</a> </li>
														<li><a href="form-input-groups.html">Input Groups</a></li>
														<li><a href="form-grid-gutters.html">Grid &amp; Gutters</a></li>
														<li><a href="form-select.html">Form Select</a></li>
														<li><a href="form-mask.html">Input Masks</a></li>
														<li><a href="form-fileupload.html">File Uploads</a></li>
														
													</ul>
												</li>
												<li class="submenu submenu-two">
													<a href="javascript:void(0);">Layouts<span class="menu-arrow inside-submenu"></span></a>
													<ul>
														<li><a href="form-horizontal.html">Horizontal Form</a></li>
														<li><a href="form-vertical.html">Vertical Form</a></li>
														<li><a href="form-floating-labels.html">Floating Labels</a></li>
													</ul>
												</li>
												<li><a href="form-validation.html">Form Validation</a></li>
												<li><a href="form-select2.html">Select2</a></li>
												<li><a href="form-wizard.html">Form Wizard</a></li>
												<li><a href="form-pickers.html">Form Picker</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);">Tables<span class="menu-arrow"></span></a>
											<ul>
												<li><a href="tables-basic.html">Basic Tables </a></li>
												<li><a href="data-tables.html">Data Table </a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);">Charts<span class="menu-arrow"></span> </a>
											<ul>
												<li><a href="chart-apex.html">Apex Charts</a></li>
												<li><a href="chart-c3.html">Chart C3</a></li>
												<li><a href="chart-js.html">Chart Js</a></li>
												<li><a href="chart-morris.html">Morris Charts</a></li>
												<li><a href="chart-flot.html">Flot Charts</a></li>
												<li><a href="chart-peity.html">Peity Charts</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);">Icons<span class="menu-arrow"></span> </a>
											<ul>
												<li><a href="icon-fontawesome.html">Fontawesome Icons</a></li>
												<li><a href="icon-tabler.html">Tabler Icons</a></li>
												<li><a href="icon-bootstrap.html">Bootstrap Icons</a></li>
												<li><a href="icon-remix.html">Remix Icons</a></li>
												<li><a href="icon-feather.html">Feather Icons</a></li>
												<li><a href="icon-ionic.html">Ionic Icons</a></li>
												<li><a href="icon-material.html">Material Icons</a></li>
												<li><a href="icon-pe7.html">Pe7 Icons</a></li>
												<li><a href="icon-simpleline.html">Simpleline Icons</a></li>
												<li><a href="icon-themify.html">Themify Icons</a></li>
												<li><a href="icon-weather.html">Weather Icons</a></li>
												<li><a href="icon-typicon.html">Typicon Icons</a></li>
												<li><a href="icon-flag.html">Flag Icons</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);">
												<i class="ti ti-table-plus"></i>
												<span>Maps</span>
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li>
													<a href="maps-vector.html">Vector</a>
												</li>
												<li>
													<a href="maps-leaflet.html">Leaflet</a>
												</li>
											</ul>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="p-3">
						<a href="javascript:void(0);" class="d-flex align-items-center fs-12 mb-3">Documentation</a>
						<a href="javascript:void(0);" class="d-flex align-items-center fs-12">Change Log<span class="badge bg-pink badge-xs text-white fs-10 ms-2">v4.0.2</span></a>
					</div>
				</div>
			</div>
		</div>
		<!-- /Stacked Sidebar -->

		<!-- Page Wrapper -->
		<div class="page-wrapper" style="min-height: 1018px;">
			<div class="content">

				<!-- Breadcrumb -->
				<div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
					<div class="my-auto mb-2">
						<h2 class="mb-1">Admin Dashboard</h2>
						<nav>
							<ol class="breadcrumb mb-0">
								<li class="breadcrumb-item">
									<a href="index.html"><i class="ti ti-smart-home"></i></a>
								</li>
								<li class="breadcrumb-item">
									Dashboard
								</li>
								<li class="breadcrumb-item active" aria-current="page">Admin Dashboard</li>
							</ol>
						</nav>
					</div>
					<div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
						<div class="me-2 mb-2">
							<div class="dropdown">
								<a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
									<i class="ti ti-file-export me-1"></i>Export
								</a>
								<ul class="dropdown-menu  dropdown-menu-end p-3">
									<li>
										<a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-file-type-pdf me-1"></i>Export as PDF</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-file-type-xls me-1"></i>Export as Excel </a>
									</li>
								</ul>
							</div>
						</div>
						<div class="mb-2">
							<div class="input-icon w-120 position-relative">
								<span class="input-icon-addon">
									<i class="ti ti-calendar text-gray-9"></i>
								</span>
								<input type="text" class="form-control yearpicker" value="2025">
							</div>
						</div>
						<div class="ms-2 head-icons">
							<a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Collapse" id="collapse-header">
								<i class="ti ti-chevrons-up"></i>
							</a>
						</div>
					</div>
				</div>
				<!-- /Breadcrumb -->

				<!-- Welcome Wrap -->
				<div class="card border-0">
					<div class="card-body d-flex align-items-center justify-content-between flex-wrap pb-1">
						<div class="d-flex align-items-center mb-3">
							<span class="avatar avatar-xl flex-shrink-0">
								<img src="assets/img/profiles/avatar-31.jpg" class="rounded-circle" alt="img">
							</span>
							<div class="ms-3">
								<h3 class="mb-2">Welcome Back, Adrian <a href="javascript:void(0);" class="edit-icon"><i class="ti ti-edit fs-14"></i></a></h3>
								<p>You have <span class="text-primary text-decoration-underline">21</span> Pending Approvals &amp; <span class="text-primary text-decoration-underline">14</span> Leave Requests</p>
							</div>
						</div>
						<div class="d-flex align-items-center flex-wrap mb-1">
							<a href="#" class="btn btn-secondary btn-md me-2 mb-2" data-bs-toggle="modal" data-bs-target="#add_project"><i class="ti ti-square-rounded-plus me-1"></i>Add Project</a>
							<a href="#" class="btn btn-primary btn-md mb-2" data-bs-toggle="modal" data-bs-target="#add_leaves"><i class="ti ti-square-rounded-plus me-1"></i>Add Requests</a>
						</div>
					</div>
				</div>
				<!-- /Welcome Wrap -->

				<div class="row">

					<!-- Widget Info -->
					<div class="col-xxl-8 d-flex">
						<div class="row flex-fill">
							<div class="col-md-3 d-flex">
								<div class="card flex-fill">
									<div class="card-body">
										<span class="avatar rounded-circle bg-primary mb-2">
											<i class="ti ti-calendar-share fs-16"></i>
										</span>
										<h6 class="fs-13 fw-medium text-default mb-1">Attendance Overview</h6>
										<h3 class="mb-3">120/154 <span class="fs-12 fw-medium text-success"><i class="fa-solid fa-caret-up me-1"></i>+2.1%</span></h3>
										<a href="attendance-employee.html" class="link-default">View Details</a>
									</div>
								</div>
							</div>
							<div class="col-md-3 d-flex">
								<div class="card flex-fill">
									<div class="card-body">
										<span class="avatar rounded-circle bg-secondary mb-2">
											<i class="ti ti-browser fs-16"></i>
										</span>
										<h6 class="fs-13 fw-medium text-default mb-1">Total No of Project's</h6>
										<h3 class="mb-3">90/125 <span class="fs-12 fw-medium text-danger"><i class="fa-solid fa-caret-down me-1"></i>-2.1%</span></h3>
										<a href="projects.html" class="link-default">View All</a>
									</div>
								</div>
							</div>
							<div class="col-md-3 d-flex">
								<div class="card flex-fill">
									<div class="card-body">
										<span class="avatar rounded-circle bg-info mb-2">
											<i class="ti ti-users-group fs-16"></i>
										</span>
										<h6 class="fs-13 fw-medium text-default mb-1">Total No of Clients</h6>
										<h3 class="mb-3">69/86 <span class="fs-12 fw-medium text-danger"><i class="fa-solid fa-caret-down me-1"></i>-11.2%</span></h3>
										<a href="clients.html" class="link-default">View All</a>
									</div>
								</div>
							</div>
							<div class="col-md-3 d-flex">
								<div class="card flex-fill">
									<div class="card-body">
										<span class="avatar rounded-circle bg-pink mb-2">
											<i class="ti ti-checklist fs-16"></i>
										</span>
										<h6 class="fs-13 fw-medium text-default mb-1">Total No of Tasks</h6>
										<h3 class="mb-3">225/28 <span class="fs-12 fw-medium text-success"><i class="fa-solid fa-caret-down me-1"></i>+11.2%</span></h3>
										<a href="tasks.html" class="link-default">View All</a>
									</div>
								</div>
							</div>
							<div class="col-md-3 d-flex">
								<div class="card flex-fill">
									<div class="card-body">
										<span class="avatar rounded-circle bg-purple mb-2">
											<i class="ti ti-moneybag fs-16"></i>
										</span>
										<h6 class="fs-13 fw-medium text-default mb-1">Earnings</h6>
										<h3 class="mb-3">$21445 <span class="fs-12 fw-medium text-success"><i class="fa-solid fa-caret-up me-1"></i>+10.2%</span></h3>
										<a href="expenses.html" class="link-default">View All</a>
									</div>
								</div>
							</div>
							<div class="col-md-3 d-flex">
								<div class="card flex-fill">
									<div class="card-body">
										<span class="avatar rounded-circle bg-danger mb-2">
											<i class="ti ti-browser fs-16"></i>
										</span>
										<h6 class="fs-13 fw-medium text-default mb-1">Profit This Week</h6>
										<h3 class="mb-3">$5,544 <span class="fs-12 fw-medium text-success"><i class="fa-solid fa-caret-up me-1"></i>+2.1%</span></h3>
										<a href="purchase-transaction.html" class="link-default">View All</a>
									</div>
								</div>
							</div>
							<div class="col-md-3 d-flex">
								<div class="card flex-fill">
									<div class="card-body">
										<span class="avatar rounded-circle bg-success mb-2">
											<i class="ti ti-users-group fs-16"></i>
										</span>
										<h6 class="fs-13 fw-medium text-default mb-1">Job Applicants</h6>
										<h3 class="mb-3">98 <span class="fs-12 fw-medium text-success"><i class="fa-solid fa-caret-up me-1"></i>+2.1%</span></h3>
										<a href="job-list.html" class="link-default">View All</a>
									</div>
								</div>
							</div>
							<div class="col-md-3 d-flex">
								<div class="card flex-fill">
									<div class="card-body">
										<span class="avatar rounded-circle bg-dark mb-2">
											<i class="ti ti-user-star fs-16"></i>
										</span>
										<h6 class="fs-13 fw-medium text-default mb-1">New Hire</h6>
										<h3 class="mb-3">45/48 <span class="fs-12 fw-medium text-danger"><i class="fa-solid fa-caret-down me-1"></i>-11.2%</span></h3>
										<a href="candidates.html" class="link-default">View All</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Widget Info -->

					<!-- Employees By Department -->
					<div class="col-xxl-4 d-flex">
						<div class="card flex-fill">
							<div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
								<h5 class="mb-2">Employees By Department</h5>
								<div class="dropdown mb-2">
									<a href="javascript:void(0);" class="btn btn-white border btn-sm d-inline-flex align-items-center" data-bs-toggle="dropdown">
										<i class="ti ti-calendar me-1"></i>This Week
									</a>
									<ul class="dropdown-menu  dropdown-menu-end p-3">
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">This Month</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">This Week</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">Last Week</a>
										</li>
									</ul>
								</div>
							</div>
							<div class="card-body">
								<div id="emp-department" style="min-height: 235px;"><div id="apexchartsugoveyd" class="apexcharts-canvas apexchartsugoveyd apexcharts-theme-" style="width: 991px; height: 220px;"><svg id="SvgjsSvg1271" width="991" height="220" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"><foreignObject x="0" y="0" width="991" height="220"><div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 110px;"></div><style type="text/css">
      .apexcharts-flip-y {
        transform: scaleY(-1) translateY(-100%);
        transform-origin: top;
        transform-box: fill-box;
      }
      .apexcharts-flip-x {
        transform: scaleX(-1);
        transform-origin: center;
        transform-box: fill-box;
      }
      .apexcharts-legend {
        display: flex;
        overflow: auto;
        padding: 0 10px;
      }
      .apexcharts-legend.apx-legend-position-bottom, .apexcharts-legend.apx-legend-position-top {
        flex-wrap: wrap
      }
      .apexcharts-legend.apx-legend-position-right, .apexcharts-legend.apx-legend-position-left {
        flex-direction: column;
        bottom: 0;
      }
      .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left, .apexcharts-legend.apx-legend-position-top.apexcharts-align-left, .apexcharts-legend.apx-legend-position-right, .apexcharts-legend.apx-legend-position-left {
        justify-content: flex-start;
      }
      .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center, .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
        justify-content: center;
      }
      .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right, .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
        justify-content: flex-end;
      }
      .apexcharts-legend-series {
        cursor: pointer;
        line-height: normal;
        display: flex;
        align-items: center;
      }
      .apexcharts-legend-text {
        position: relative;
        font-size: 14px;
      }
      .apexcharts-legend-text *, .apexcharts-legend-marker * {
        pointer-events: none;
      }
      .apexcharts-legend-marker {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        margin-right: 1px;
      }

      .apexcharts-legend-series.apexcharts-no-click {
        cursor: auto;
      }
      .apexcharts-legend .apexcharts-hidden-zero-series, .apexcharts-legend .apexcharts-hidden-null-series {
        display: none !important;
      }
      .apexcharts-inactive-legend {
        opacity: 0.45;
      }</style></foreignObject><g id="SvgjsG1273" class="apexcharts-inner apexcharts-graphical" transform="translate(80.7568359375, 10)"><defs id="SvgjsDefs1272"><linearGradient id="SvgjsLinearGradient1276" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1277" stop-opacity="0.4" stop-color="rgba(216,227,240,0.4)" offset="0"></stop><stop id="SvgjsStop1278" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop><stop id="SvgjsStop1279" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop></linearGradient><clipPath id="gridRectMaskugoveyd"><rect id="SvgjsRect1281" width="898.8744134902954" height="171.70079907417298" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="gridRectBarMaskugoveyd"><rect id="SvgjsRect1282" width="902.8744134902954" height="175.70079907417298" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="gridRectMarkerMaskugoveyd"><rect id="SvgjsRect1283" width="898.8744134902954" height="171.70079907417298" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMaskugoveyd"></clipPath><clipPath id="nonForecastMaskugoveyd"></clipPath></defs><rect id="SvgjsRect1280" width="0" height="171.70079907417298" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke-dasharray="3" fill="url(#SvgjsLinearGradient1276)" class="apexcharts-xcrosshairs" y2="171.70079907417298" filter="none" fill-opacity="0.9"></rect><line id="SvgjsLine1307" x1="0" y1="171.70079907417298" x2="0" y2="177.70079907417298" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1308" x1="81.71585577184504" y1="171.70079907417298" x2="81.71585577184504" y2="177.70079907417298" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1309" x1="163.43171154369008" y1="171.70079907417298" x2="163.43171154369008" y2="177.70079907417298" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1310" x1="245.14756731553513" y1="171.70079907417298" x2="245.14756731553513" y2="177.70079907417298" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1311" x1="326.86342308738017" y1="171.70079907417298" x2="326.86342308738017" y2="177.70079907417298" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1312" x1="408.5792788592252" y1="171.70079907417298" x2="408.5792788592252" y2="177.70079907417298" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1313" x1="490.29513463107025" y1="171.70079907417298" x2="490.29513463107025" y2="177.70079907417298" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1314" x1="572.0109904029152" y1="171.70079907417298" x2="572.0109904029152" y2="177.70079907417298" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1315" x1="653.7268461747603" y1="171.70079907417298" x2="653.7268461747603" y2="177.70079907417298" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1316" x1="735.4427019466054" y1="171.70079907417298" x2="735.4427019466054" y2="177.70079907417298" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1317" x1="817.1585577184505" y1="171.70079907417298" x2="817.1585577184505" y2="177.70079907417298" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1318" x1="898.8744134902956" y1="171.70079907417298" x2="898.8744134902956" y2="177.70079907417298" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><g id="SvgjsG1303" class="apexcharts-grid"><g id="SvgjsG1304" class="apexcharts-gridlines-horizontal"><line id="SvgjsLine1320" x1="0" y1="28.616799845695496" x2="898.8744134902954" y2="28.616799845695496" stroke="#e5e7eb" stroke-dasharray="5" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1321" x1="0" y1="57.23359969139099" x2="898.8744134902954" y2="57.23359969139099" stroke="#e5e7eb" stroke-dasharray="5" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1322" x1="0" y1="85.85039953708649" x2="898.8744134902954" y2="85.85039953708649" stroke="#e5e7eb" stroke-dasharray="5" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1323" x1="0" y1="114.46719938278198" x2="898.8744134902954" y2="114.46719938278198" stroke="#e5e7eb" stroke-dasharray="5" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1324" x1="0" y1="143.08399922847747" x2="898.8744134902954" y2="143.08399922847747" stroke="#e5e7eb" stroke-dasharray="5" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG1305" class="apexcharts-gridlines-vertical"></g><line id="SvgjsLine1327" x1="0" y1="171.70079907417298" x2="898.8744134902954" y2="171.70079907417298" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine1326" x1="0" y1="1" x2="0" y2="171.70079907417298" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1306" class="apexcharts-grid-borders"><line id="SvgjsLine1319" x1="0" y1="0" x2="898.8744134902954" y2="0" stroke="#e5e7eb" stroke-dasharray="5" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1325" x1="0" y1="171.70079907417295" x2="898.8744134902954" y2="171.70079907417295" stroke="#e5e7eb" stroke-dasharray="5" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1368" x1="0" y1="171.70079907417298" x2="898.8744134902954" y2="171.70079907417298" stroke="#e0e0e0" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"></line><line id="SvgjsLine1389" x1="0" y1="1" x2="0" y2="171.70079907417298" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1286" class="apexcharts-bar-series apexcharts-plot-series"><g id="SvgjsG1287" class="apexcharts-series" rel="1" seriesName="Employee" data:realIndex="0"><path id="SvgjsPath1292" d="M 5.101 9.300459949851035 L 648.8278461747602 9.300459949851035 C 651.3278461747602 9.300459949851035 653.8278461747602 11.800459949851035 653.8278461747602 14.300459949851035 L 653.8278461747602 14.316339895844457 C 653.8278461747602 16.816339895844457 651.3278461747602 19.316339895844457 648.8278461747602 19.316339895844457 L 5.101 19.316339895844457 C 2.601 19.316339895844457 0.101 16.816339895844457 0.101 14.316339895844457 L 0.101 14.300459949851035 C 0.101 11.800459949851035 2.601 9.300459949851035 5.101 9.300459949851035 Z " fill="rgba(255,111,40,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area undefined" index="0" clip-path="url(#gridRectBarMaskugoveyd)" pathTo="M 5.101 9.300459949851035 L 648.8278461747602 9.300459949851035 C 651.3278461747602 9.300459949851035 653.8278461747602 11.800459949851035 653.8278461747602 14.300459949851035 L 653.8278461747602 14.316339895844457 C 653.8278461747602 16.816339895844457 651.3278461747602 19.316339895844457 648.8278461747602 19.316339895844457 L 5.101 19.316339895844457 C 2.601 19.316339895844457 0.101 16.816339895844457 0.101 14.316339895844457 L 0.101 14.300459949851035 C 0.101 11.800459949851035 2.601 9.300459949851035 5.101 9.300459949851035 Z " pathFrom="M 0.101 9.300459949851035 L 0.101 9.300459949851035 L 0.101 19.316339895844457 L 0.101 19.316339895844457 L 0.101 19.316339895844457 L 0.101 19.316339895844457 L 0.101 19.316339895844457 L 0.101 9.300459949851035 Z" cy="37.91725979554653" cx="653.8268461747602" j="0" val="80" barHeight="10.015879945993424" barWidth="653.7268461747602"></path><path id="SvgjsPath1294" d="M 5.101 37.91725979554653 L 893.9754134902954 37.91725979554653 C 896.4754134902954 37.91725979554653 898.9754134902954 40.41725979554653 898.9754134902954 42.91725979554653 L 898.9754134902954 42.933139741539954 C 898.9754134902954 45.433139741539954 896.4754134902954 47.933139741539954 893.9754134902954 47.933139741539954 L 5.101 47.933139741539954 C 2.601 47.933139741539954 0.101 45.433139741539954 0.101 42.933139741539954 L 0.101 42.91725979554653 C 0.101 40.41725979554653 2.601 37.91725979554653 5.101 37.91725979554653 Z " fill="rgba(255,111,40,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area undefined" index="0" clip-path="url(#gridRectBarMaskugoveyd)" pathTo="M 5.101 37.91725979554653 L 893.9754134902954 37.91725979554653 C 896.4754134902954 37.91725979554653 898.9754134902954 40.41725979554653 898.9754134902954 42.91725979554653 L 898.9754134902954 42.933139741539954 C 898.9754134902954 45.433139741539954 896.4754134902954 47.933139741539954 893.9754134902954 47.933139741539954 L 5.101 47.933139741539954 C 2.601 47.933139741539954 0.101 45.433139741539954 0.101 42.933139741539954 L 0.101 42.91725979554653 C 0.101 40.41725979554653 2.601 37.91725979554653 5.101 37.91725979554653 Z " pathFrom="M 0.101 37.91725979554653 L 0.101 37.91725979554653 L 0.101 47.933139741539954 L 0.101 47.933139741539954 L 0.101 47.933139741539954 L 0.101 47.933139741539954 L 0.101 47.933139741539954 L 0.101 37.91725979554653 Z" cy="66.53405964124202" cx="898.9744134902954" j="1" val="110" barHeight="10.015879945993424" barWidth="898.8744134902954"></path><path id="SvgjsPath1296" d="M 5.101 66.53405964124202 L 648.8278461747602 66.53405964124202 C 651.3278461747602 66.53405964124202 653.8278461747602 69.03405964124202 653.8278461747602 71.53405964124202 L 653.8278461747602 71.54993958723544 C 653.8278461747602 74.04993958723544 651.3278461747602 76.54993958723544 648.8278461747602 76.54993958723544 L 5.101 76.54993958723544 C 2.601 76.54993958723544 0.101 74.04993958723544 0.101 71.54993958723544 L 0.101 71.53405964124202 C 0.101 69.03405964124202 2.601 66.53405964124202 5.101 66.53405964124202 Z " fill="rgba(255,111,40,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area undefined" index="0" clip-path="url(#gridRectBarMaskugoveyd)" pathTo="M 5.101 66.53405964124202 L 648.8278461747602 66.53405964124202 C 651.3278461747602 66.53405964124202 653.8278461747602 69.03405964124202 653.8278461747602 71.53405964124202 L 653.8278461747602 71.54993958723544 C 653.8278461747602 74.04993958723544 651.3278461747602 76.54993958723544 648.8278461747602 76.54993958723544 L 5.101 76.54993958723544 C 2.601 76.54993958723544 0.101 74.04993958723544 0.101 71.54993958723544 L 0.101 71.53405964124202 C 0.101 69.03405964124202 2.601 66.53405964124202 5.101 66.53405964124202 Z " pathFrom="M 0.101 66.53405964124202 L 0.101 66.53405964124202 L 0.101 76.54993958723544 L 0.101 76.54993958723544 L 0.101 76.54993958723544 L 0.101 76.54993958723544 L 0.101 76.54993958723544 L 0.101 66.53405964124202 Z" cy="95.15085948693752" cx="653.8268461747602" j="2" val="80" barHeight="10.015879945993424" barWidth="653.7268461747602"></path><path id="SvgjsPath1298" d="M 5.101000000000001 95.15085948693752 L 158.53271154369006 95.15085948693752 C 161.03271154369006 95.15085948693752 163.53271154369006 97.65085948693752 163.53271154369006 100.15085948693752 L 163.53271154369006 100.16673943293094 C 163.53271154369006 102.66673943293094 161.03271154369006 105.16673943293094 158.53271154369006 105.16673943293094 L 5.101000000000001 105.16673943293094 C 2.6010000000000004 105.16673943293094 0.101 102.66673943293094 0.101 100.16673943293094 L 0.101 100.15085948693752 C 0.101 97.65085948693752 2.6010000000000004 95.15085948693752 5.101000000000001 95.15085948693752 Z " fill="rgba(255,111,40,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area undefined" index="0" clip-path="url(#gridRectBarMaskugoveyd)" pathTo="M 5.101000000000001 95.15085948693752 L 158.53271154369006 95.15085948693752 C 161.03271154369006 95.15085948693752 163.53271154369006 97.65085948693752 163.53271154369006 100.15085948693752 L 163.53271154369006 100.16673943293094 C 163.53271154369006 102.66673943293094 161.03271154369006 105.16673943293094 158.53271154369006 105.16673943293094 L 5.101000000000001 105.16673943293094 C 2.6010000000000004 105.16673943293094 0.101 102.66673943293094 0.101 100.16673943293094 L 0.101 100.15085948693752 C 0.101 97.65085948693752 2.6010000000000004 95.15085948693752 5.101000000000001 95.15085948693752 Z " pathFrom="M 0.101 95.15085948693752 L 0.101 95.15085948693752 L 0.101 105.16673943293094 L 0.101 105.16673943293094 L 0.101 105.16673943293094 L 0.101 105.16673943293094 L 0.101 105.16673943293094 L 0.101 95.15085948693752 Z" cy="123.76765933263302" cx="163.53171154369005" j="3" val="20" barHeight="10.015879945993424" barWidth="163.43171154369006"></path><path id="SvgjsPath1300" d="M 5.101 123.76765933263302 L 485.3961346310702 123.76765933263302 C 487.8961346310702 123.76765933263302 490.3961346310702 126.267659332633 490.3961346310702 128.767659332633 L 490.3961346310702 128.78353927862645 C 490.3961346310702 131.28353927862645 487.8961346310702 133.78353927862645 485.3961346310702 133.78353927862645 L 5.101 133.78353927862645 C 2.601 133.78353927862645 0.101 131.28353927862645 0.101 128.78353927862645 L 0.101 128.767659332633 C 0.101 126.267659332633 2.601 123.76765933263302 5.101 123.76765933263302 Z " fill="rgba(255,111,40,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area undefined" index="0" clip-path="url(#gridRectBarMaskugoveyd)" pathTo="M 5.101 123.76765933263302 L 485.3961346310702 123.76765933263302 C 487.8961346310702 123.76765933263302 490.3961346310702 126.267659332633 490.3961346310702 128.767659332633 L 490.3961346310702 128.78353927862645 C 490.3961346310702 131.28353927862645 487.8961346310702 133.78353927862645 485.3961346310702 133.78353927862645 L 5.101 133.78353927862645 C 2.601 133.78353927862645 0.101 131.28353927862645 0.101 128.78353927862645 L 0.101 128.767659332633 C 0.101 126.267659332633 2.601 123.76765933263302 5.101 123.76765933263302 Z " pathFrom="M 0.101 123.76765933263302 L 0.101 123.76765933263302 L 0.101 133.78353927862645 L 0.101 133.78353927862645 L 0.101 133.78353927862645 L 0.101 133.78353927862645 L 0.101 133.78353927862645 L 0.101 123.76765933263302 Z" cy="152.3844591783285" cx="490.3951346310702" j="4" val="60" barHeight="10.015879945993424" barWidth="490.2951346310702"></path><path id="SvgjsPath1302" d="M 5.101 152.3844591783285 L 812.2595577184503 152.3844591783285 C 814.7595577184503 152.3844591783285 817.2595577184503 154.8844591783285 817.2595577184503 157.3844591783285 L 817.2595577184503 157.40033912432193 C 817.2595577184503 159.90033912432193 814.7595577184503 162.40033912432193 812.2595577184503 162.40033912432193 L 5.101 162.40033912432193 C 2.601 162.40033912432193 0.101 159.90033912432193 0.101 157.40033912432193 L 0.101 157.3844591783285 C 0.101 154.8844591783285 2.601 152.3844591783285 5.101 152.3844591783285 Z " fill="rgba(255,111,40,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area undefined" index="0" clip-path="url(#gridRectBarMaskugoveyd)" pathTo="M 5.101 152.3844591783285 L 812.2595577184503 152.3844591783285 C 814.7595577184503 152.3844591783285 817.2595577184503 154.8844591783285 817.2595577184503 157.3844591783285 L 817.2595577184503 157.40033912432193 C 817.2595577184503 159.90033912432193 814.7595577184503 162.40033912432193 812.2595577184503 162.40033912432193 L 5.101 162.40033912432193 C 2.601 162.40033912432193 0.101 159.90033912432193 0.101 157.40033912432193 L 0.101 157.3844591783285 C 0.101 154.8844591783285 2.601 152.3844591783285 5.101 152.3844591783285 Z " pathFrom="M 0.101 152.3844591783285 L 0.101 152.3844591783285 L 0.101 162.40033912432193 L 0.101 162.40033912432193 L 0.101 162.40033912432193 L 0.101 162.40033912432193 L 0.101 162.40033912432193 L 0.101 152.3844591783285 Z" cy="181.00125902402402" cx="817.2585577184503" j="5" val="100" barHeight="10.015879945993424" barWidth="817.1585577184503"></path><g id="SvgjsG1289" class="apexcharts-bar-goals-markers"><g id="SvgjsG1291" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskugoveyd)"></g><g id="SvgjsG1293" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskugoveyd)"></g><g id="SvgjsG1295" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskugoveyd)"></g><g id="SvgjsG1297" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskugoveyd)"></g><g id="SvgjsG1299" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskugoveyd)"></g><g id="SvgjsG1301" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskugoveyd)"></g></g><g id="SvgjsG1290" class="apexcharts-bar-shadows apexcharts-hidden-element-shown"></g></g><g id="SvgjsG1288" class="apexcharts-datalabels apexcharts-hidden-element-shown" data:realIndex="0"></g></g><line id="SvgjsLine1328" x1="0" y1="0" x2="898.8744134902954" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1329" x1="0" y1="0" x2="898.8744134902954" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1369" class="apexcharts-yaxis apexcharts-xaxis-inversed" rel="0"><g id="SvgjsG1370" class="apexcharts-yaxis-texts-g apexcharts-xaxis-inversed-texts-g" transform="translate(0, 0)"><text id="SvgjsText1372" font-family="Helvetica, Arial, sans-serif" x="-15" y="15.609163552197545" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1373">UI/UX</tspan><title>UI/UX</title></text><text id="SvgjsText1375" font-family="Helvetica, Arial, sans-serif" x="-15" y="44.22596339789304" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1376">Development</tspan><title>Development</title></text><text id="SvgjsText1378" font-family="Helvetica, Arial, sans-serif" x="-15" y="72.84276324358854" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1379">Management</tspan><title>Management</title></text><text id="SvgjsText1381" font-family="Helvetica, Arial, sans-serif" x="-15" y="101.45956308928403" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1382">HR</tspan><title>HR</title></text><text id="SvgjsText1384" font-family="Helvetica, Arial, sans-serif" x="-15" y="130.07636293497953" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1385">Testing</tspan><title>Testing</title></text><text id="SvgjsText1387" font-family="Helvetica, Arial, sans-serif" x="-15" y="158.69316278067504" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1388">Marketing</tspan><title>Marketing</title></text></g></g><g id="SvgjsG1330" class="apexcharts-xaxis apexcharts-yaxis-inversed"><g id="SvgjsG1331" class="apexcharts-xaxis-texts-g" transform="translate(0, -8.666666666666666)"><text id="SvgjsText1332" font-family="Helvetica, Arial, sans-serif" x="898.8744134902954" y="201.70079907417298" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#111827" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1334">110</tspan><title>110</title></text><text id="SvgjsText1335" font-family="Helvetica, Arial, sans-serif" x="817.0585577184504" y="201.70079907417298" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#111827" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1337">100</tspan><title>100</title></text><text id="SvgjsText1338" font-family="Helvetica, Arial, sans-serif" x="735.2427019466054" y="201.70079907417298" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#111827" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1340">90</tspan><title>90</title></text><text id="SvgjsText1341" font-family="Helvetica, Arial, sans-serif" x="653.4268461747603" y="201.70079907417298" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#111827" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1343">80</tspan><title>80</title></text><text id="SvgjsText1344" font-family="Helvetica, Arial, sans-serif" x="571.6109904029153" y="201.70079907417298" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#111827" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1346">70</tspan><title>70</title></text><text id="SvgjsText1347" font-family="Helvetica, Arial, sans-serif" x="489.79513463107025" y="201.70079907417298" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#111827" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1349">60</tspan><title>60</title></text><text id="SvgjsText1350" font-family="Helvetica, Arial, sans-serif" x="407.97927885922525" y="201.70079907417298" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#111827" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1352">50</tspan><title>50</title></text><text id="SvgjsText1353" font-family="Helvetica, Arial, sans-serif" x="326.16342308738024" y="201.70079907417298" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#111827" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1355">40</tspan><title>40</title></text><text id="SvgjsText1356" font-family="Helvetica, Arial, sans-serif" x="244.34756731553523" y="201.70079907417298" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#111827" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1358">30</tspan><title>30</title></text><text id="SvgjsText1359" font-family="Helvetica, Arial, sans-serif" x="162.53171154369022" y="201.70079907417298" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#111827" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1361">20</tspan><title>20</title></text><text id="SvgjsText1362" font-family="Helvetica, Arial, sans-serif" x="80.71585577184521" y="201.70079907417298" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#111827" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1364">10</tspan><title>10</title></text><text id="SvgjsText1365" font-family="Helvetica, Arial, sans-serif" x="-1.0999999999997954" y="201.70079907417298" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#111827" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1367">0</tspan><title>0</title></text></g></g><g id="SvgjsG1390" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1391" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1392" class="apexcharts-point-annotations"></g></g><g id="SvgjsG1284" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)"></g><g id="SvgjsG1285" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)"></g></svg><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group apexcharts-tooltip-series-group-0" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(255, 111, 40);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
								<p class="fs-13"><i class="ti ti-circle-filled me-2 fs-8 text-primary"></i>No of
									Employees increased by <span class="text-success fw-bold">+20%</span> from last Week
								</p>
							</div>
						</div>
					</div>
					<!-- /Employees By Department -->

				</div>

				<div class="row">

					<!-- Total Employee -->
					<div class="col-xxl-4 d-flex">
						<div class="card flex-fill">
							<div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
								<h5 class="mb-2">Employee Status</h5>
								<div class="dropdown mb-2">
									<a href="javascript:void(0);" class="btn btn-white border btn-sm d-inline-flex align-items-center" data-bs-toggle="dropdown">
										<i class="ti ti-calendar me-1"></i>This Week
									</a>
									<ul class="dropdown-menu  dropdown-menu-end p-3">
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">This Month</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">This Week</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">Today</a>
										</li>
									</ul>
								</div>
							</div>
							<div class="card-body">
								<div class="d-flex align-items-center justify-content-between mb-1">
									<p class="fs-13 mb-3">Total Employee</p>
									<h3 class="mb-3">154</h3>
								</div>
								<div class="progress-stacked emp-stack mb-3">
									<div class="progress" role="progressbar" aria-label="Segment one" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
										<div class="progress-bar bg-warning"></div>
									</div>
									<div class="progress" role="progressbar" aria-label="Segment two" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
										<div class="progress-bar bg-secondary"></div>
									</div>
									<div class="progress" role="progressbar" aria-label="Segment three" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 10%">
										<div class="progress-bar bg-danger"></div>
									</div>
									<div class="progress" role="progressbar" aria-label="Segment four" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
										<div class="progress-bar bg-pink"></div>
									</div>
								</div>
								<div class="border mb-3">
									<div class="row gx-0">
										<div class="col-6">
											<div class="p-2 flex-fill border-end border-bottom">
												<p class="fs-13 mb-2"><i class="ti ti-square-filled text-primary fs-12 me-2"></i>Fulltime <span class="text-gray-9">(48%)</span></p>
												<h2 class="display-1">112</h2>
											</div>
										</div>
										<div class="col-6">
											<div class="p-2 flex-fill border-bottom text-end">
												<p class="fs-13 mb-2"><i class="ti ti-square-filled me-2 text-secondary fs-12"></i>Contract <span class="text-gray-9">(20%)</span></p>
												<h2 class="display-1">112</h2>
											</div>
										</div>
										<div class="col-6">
											<div class="p-2 flex-fill border-end">
												<p class="fs-13 mb-2"><i class="ti ti-square-filled me-2 text-danger fs-12"></i>Probation <span class="text-gray-9">(22%)</span></p>
												<h2 class="display-1">12</h2>
											</div>
										</div>
										<div class="col-6">
											<div class="p-2 flex-fill text-end">
												<p class="fs-13 mb-2"><i class="ti ti-square-filled text-pink me-2 fs-12"></i>WFH <span class="text-gray-9">(20%)</span></p>
												<h2 class="display-1">04</h2>
											</div>
										</div>
									</div>
								</div>
								<h6 class="mb-2">Top Performer</h6>
								<div class="p-2 d-flex align-items-center justify-content-between border border-primary bg-primary-100 br-5 mb-4">
									<div class="d-flex align-items-center overflow-hidden">
										<span class="me-2">
											<i class="ti ti-award-filled text-primary fs-24"></i>
										</span>
										<a href="employee-details.html" class="avatar avatar-md me-2">
											<img src="assets/img/profiles/avatar-24.jpg" class="rounded-circle border border-white" alt="img">
										</a>
										<div>
											<h6 class="text-truncate mb-1 fs-14 fw-medium"><a href="employee-details.html">Daniel Esbella</a></h6>
											<p class="fs-13">IOS Developer</p>
										</div>
									</div>
									<div class="text-end">
										<p class="fs-13 mb-1">Performance</p>
										<h5 class="text-primary">99%</h5>
									</div>
								</div>
								<a href="employees.html" class="btn btn-light btn-md w-100">View All Employees</a>
							</div>
						</div>
					</div>
					<!-- /Total Employee -->

					<!-- Attendance Overview -->
					<div class="col-xxl-4 col-xl-6 d-flex">
						<div class="card flex-fill">
							<div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
								<h5 class="mb-2">Attendance Overview</h5>
								<div class="dropdown mb-2">
									<a href="javascript:void(0);" class="btn btn-white border btn-sm d-inline-flex align-items-center" data-bs-toggle="dropdown">
										<i class="ti ti-calendar me-1"></i>Today
									</a>
									<ul class="dropdown-menu  dropdown-menu-end p-3">
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">This Month</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">This Week</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">Today</a>
										</li>
									</ul>
								</div>
							</div>
							<div class="card-body">
								<div class="chartjs-wrapper-demo position-relative mb-4">
									<canvas id="attendance" height="250" width="578" style="display: block; box-sizing: border-box; height: 200px; width: 462px;"></canvas>
									<div class="position-absolute text-center attendance-canvas">
										<p class="fs-13 mb-1">Total Attendance</p>
										<h3>120</h3>
									</div>
								</div>
								<h6 class="mb-3">Status</h6>
								<div class="d-flex align-items-center justify-content-between">
									<p class="f-13 mb-2"><i class="ti ti-circle-filled text-success me-1"></i>Present</p>
									<p class="f-13 fw-medium text-gray-9 mb-2">59%</p>
								</div>
								<div class="d-flex align-items-center justify-content-between">
									<p class="f-13 mb-2"><i class="ti ti-circle-filled text-secondary me-1"></i>Late</p>
									<p class="f-13 fw-medium text-gray-9 mb-2">21%</p>
								</div>
								<div class="d-flex align-items-center justify-content-between">
									<p class="f-13 mb-2"><i class="ti ti-circle-filled text-warning me-1"></i>Permission</p>
									<p class="f-13 fw-medium text-gray-9 mb-2">2%</p>
								</div>
								<div class="d-flex align-items-center justify-content-between mb-2">
									<p class="f-13 mb-2"><i class="ti ti-circle-filled text-danger me-1"></i>Absent</p>
									<p class="f-13 fw-medium text-gray-9 mb-2">15%</p>
								</div>
								<div class="bg-light br-5 box-shadow-xs p-2 pb-0 d-flex align-items-center justify-content-between flex-wrap">
									<div class="d-flex align-items-center">
										<p class="mb-2 me-2">Total Absenties</p>
										<div class="avatar-list-stacked avatar-group-sm mb-2">
											<span class="avatar avatar-rounded">
												<img class="border border-white" src="assets/img/profiles/avatar-27.jpg" alt="img">
											</span>
											<span class="avatar avatar-rounded">
												<img class="border border-white" src="assets/img/profiles/avatar-30.jpg" alt="img">
											</span>
											<span class="avatar avatar-rounded">
												<img src="assets/img/profiles/avatar-14.jpg" alt="img">
											</span>
											<span class="avatar avatar-rounded">
												<img src="assets/img/profiles/avatar-29.jpg" alt="img">
											</span>
											<a class="avatar bg-primary avatar-rounded text-fixed-white fs-10" href="javascript:void(0);">
												+1
											</a>
										</div>
									</div>
									<a href="leaves.html" class="fs-13 link-primary text-decoration-underline mb-2">View Details</a>
								</div>
							</div>
						</div>
					</div>
					<!-- /Attendance Overview -->

					<!-- Clock-In/Out -->
					<div class="col-xxl-4 col-xl-6 d-flex">
						<div class="card flex-fill">
							<div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
								<h5 class="mb-2">Clock-In/Out</h5>
								<div class="d-flex align-items-center">
									<div class="dropdown mb-2">
										<a href="javascript:void(0);" class="dropdown-toggle btn btn-white btn-sm d-inline-flex align-items-center border-0 fs-13 me-2" data-bs-toggle="dropdown">
											All Departments
										</a>
										<ul class="dropdown-menu  dropdown-menu-end p-3">
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">Finance</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">Development</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">Marketing</a>
											</li>
										</ul>
									</div>
									<div class="dropdown mb-2">
										<a href="javascript:void(0);" class="btn btn-white border btn-sm d-inline-flex align-items-center" data-bs-toggle="dropdown">
											<i class="ti ti-calendar me-1"></i>Today
										</a>
										<ul class="dropdown-menu  dropdown-menu-end p-3">
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">This Month</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">This Week</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">Today</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div>
									<div class="d-flex align-items-center justify-content-between mb-3 p-2 border border-dashed br-5">
										<div class="d-flex align-items-center">
											<a href="javascript:void(0);" class="avatar flex-shrink-0">
												<img src="assets/img/profiles/avatar-24.jpg" class="rounded-circle border border-2" alt="img">
											</a>
											<div class="ms-2">
												<h6 class="fs-14 fw-medium text-truncate">Daniel Esbella</h6>
												<p class="fs-13">UI/UX Designer</p>
											</div>
										</div>
										<div class="d-flex align-items-center">
											<a href="javascript:void(0);" class="link-default me-2"><i class="ti ti-clock-share"></i></a>
											<span class="fs-10 fw-medium d-inline-flex align-items-center badge badge-success"><i class="ti ti-circle-filled fs-5 me-1"></i>09:15</span>
										</div>
									</div>
									<div class="d-flex align-items-center justify-content-between mb-3 p-2 border br-5">
										<div class="d-flex align-items-center">
											<a href="javascript:void(0);" class="avatar flex-shrink-0">
												<img src="assets/img/profiles/avatar-23.jpg" class="rounded-circle border border-2" alt="img">
											</a>
											<div class="ms-2">
												<h6 class="fs-14 fw-medium">Doglas Martini</h6>
												<p class="fs-13">Project Manager</p>
											</div>
										</div>
										<div class="d-flex align-items-center">
											<a href="javascript:void(0);" class="link-default me-2"><i class="ti ti-clock-share"></i></a>
											<span class="fs-10 fw-medium d-inline-flex align-items-center badge badge-success"><i class="ti ti-circle-filled fs-5 me-1"></i>09:36</span>
										</div>
									</div>
									<div class="mb-3 p-2 border br-5">
										<div class="d-flex align-items-center justify-content-between">
											<div class="d-flex align-items-center">
												<a href="javascript:void(0);" class="avatar flex-shrink-0">
													<img src="assets/img/profiles/avatar-27.jpg" class="rounded-circle border border-2" alt="img">
												</a>
												<div class="ms-2">
													<h6 class="fs-14 fw-medium text-truncate">Brian Villalobos</h6>
													<p class="fs-13">PHP Developer</p>
												</div>
											</div>
											<div class="d-flex align-items-center">
												<a href="javascript:void(0);" class="link-default me-2"><i class="ti ti-clock-share"></i></a>
												<span class="fs-10 fw-medium d-inline-flex align-items-center badge badge-success"><i class="ti ti-circle-filled fs-5 me-1"></i>09:15</span>
											</div>
										</div>
										<div class="d-flex align-items-center justify-content-between flex-wrap mt-2 border br-5 p-2 pb-0">
											<div>
												<p class="mb-1 d-inline-flex align-items-center"><i class="ti ti-circle-filled text-success fs-5 me-1"></i>Clock In</p>
												<h6 class="fs-13 fw-normal mb-2">10:30 AM</h6>
											</div>
											<div>
												<p class="mb-1 d-inline-flex align-items-center"><i class="ti ti-circle-filled text-danger fs-5 me-1"></i>Clock Out</p>
												<h6 class="fs-13 fw-normal mb-2">09:45 AM</h6>
											</div>
											<div>
												<p class="mb-1 d-inline-flex align-items-center"><i class="ti ti-circle-filled text-warning fs-5 me-1"></i>Production</p>
												<h6 class="fs-13 fw-normal mb-2">09:21 Hrs</h6>
											</div>
										</div>
									</div>
								</div>
								<h6 class="mb-2">Late</h6>
								<div class="d-flex align-items-center justify-content-between mb-3 p-2 border border-dashed br-5">
									<div class="d-flex align-items-center">
										<span class="avatar flex-shrink-0">
											<img src="assets/img/profiles/avatar-29.jpg" class="rounded-circle border border-2" alt="img">
										</span>
										<div class="ms-2">
											<h6 class="fs-14 fw-medium text-truncate">Anthony Lewis <span class="fs-10 fw-medium d-inline-flex align-items-center badge badge-success"><i class="ti ti-clock-hour-11 me-1"></i>30 Min</span></h6>
											<p class="fs-13">Marketing Head</p>
										</div>
									</div>
									<div class="d-flex align-items-center">
										<a href="javascript:void(0);" class="link-default me-2"><i class="ti ti-clock-share"></i></a>
										<span class="fs-10 fw-medium d-inline-flex align-items-center badge badge-danger"><i class="ti ti-circle-filled fs-5 me-1"></i>08:35</span>
									</div>
								</div>
								<a href="attendance-report.html" class="btn btn-light btn-md w-100">View All Attendance</a>
							</div>
						</div>
					</div>
					<!-- /Clock-In/Out -->

				</div>

				<div class="row">

					<!-- Jobs Applicants -->
					<div class="col-xxl-4 d-flex">
						<div class="card flex-fill">
							<div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
								<h5 class="mb-2">Jobs Applicants</h5>
								<a href="job-list.html" class="btn btn-light btn-md mb-2">View All</a>
							</div>
							<div class="card-body">
								<ul class="nav nav-tabs tab-style-1 nav-justified d-sm-flex d-block p-0 mb-4" role="tablist">
									<li class="nav-item" role="presentation">
										<a class="nav-link fw-medium" data-bs-toggle="tab" data-bs-target="#openings" aria-current="page" href="#openings" aria-selected="false" role="tab" tabindex="-1">Openings</a>
									</li>
									<li class="nav-item" role="presentation">
										<a class="nav-link fw-medium active" data-bs-toggle="tab" data-bs-target="#applicants" href="#applicants" aria-selected="true" tabindex="-1" role="tab">Applicants</a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade" id="openings" role="tabpanel">
										<div class="d-flex align-items-center justify-content-between mb-4">
											<div class="d-flex align-items-center">
												<a href="#" class="avatar overflow-hidden flex-shrink-0 bg-gray-100">
													<img src="assets/img/icons/apple.svg" class="img-fluid rounded-circle w-auto h-auto" alt="img">
												</a>
												<div class="ms-2 overflow-hidden">
													<p class="text-dark fw-medium text-truncate mb-0"><a href="javascript:void(0);">Senior IOS Developer</a></p>
													<span class="fs-12">No of Openings : 25 </span>
												</div>
											</div>
											<a href="javascript:void(0);" class="btn btn-light btn-sm p-0 btn-icon d-flex align-items-center justify-content-center"><i class="ti ti-edit"></i></a>
										</div>
										<div class="d-flex align-items-center justify-content-between mb-4">
											<div class="d-flex align-items-center">
												<a href="#" class="avatar overflow-hidden flex-shrink-0 bg-gray-100">
													<img src="assets/img/icons/php.svg" class="img-fluid w-auto h-auto" alt="img">
												</a>
												<div class="ms-2 overflow-hidden">
													<p class="text-dark fw-medium text-truncate mb-0"><a href="javascript:void(0);">Junior PHP Developer</a></p>
													<span class="fs-12">No of Openings : 20 </span>
												</div>
											</div>
											<a href="javascript:void(0);" class="btn btn-light btn-sm p-0 btn-icon d-flex align-items-center justify-content-center"><i class="ti ti-edit"></i></a>
										</div>
										<div class="d-flex align-items-center justify-content-between mb-4">
											<div class="d-flex align-items-center">
												<a href="#" class="avatar overflow-hidden flex-shrink-0 bg-gray-100">
													<img src="assets/img/icons/react.svg" class="img-fluid w-auto h-auto" alt="img">
												</a>
												<div class="ms-2 overflow-hidden">
													<p class="text-dark fw-medium text-truncate mb-0"><a href="javascript:void(0);">Junior React Developer </a></p>
													<span class="fs-12">No of Openings : 30 </span>
												</div>
											</div>
											<a href="javascript:void(0);" class="btn btn-light btn-sm p-0 btn-icon d-flex align-items-center justify-content-center"><i class="ti ti-edit"></i></a>
										</div>
										<div class="d-flex align-items-center justify-content-between mb-0">
											<div class="d-flex align-items-center">
												<a href="#" class="avatar overflow-hidden flex-shrink-0 bg-gray-100">
													<img src="assets/img/icons/laravel-icon.svg" class="img-fluid w-auto h-auto" alt="img">
												</a>
												<div class="ms-2 overflow-hidden">
													<p class="text-dark fw-medium text-truncate mb-0"><a href="javascript:void(0);">Senior Laravel Developer</a></p>
													<span class="fs-12">No of Openings : 40 </span>
												</div>
											</div>
											<a href="javascript:void(0);" class="btn btn-light btn-sm p-0 btn-icon d-flex align-items-center justify-content-center"><i class="ti ti-edit"></i></a>
										</div>
									</div>
									<div class="tab-pane fade show active" id="applicants" role="tabpanel">
										<div class="d-flex align-items-center justify-content-between mb-4">
											<div class="d-flex align-items-center">
												<a href="#" class="avatar overflow-hidden flex-shrink-0">
													<img src="assets/img/users/user-09.jpg" class="img-fluid rounded-circle" alt="img">
												</a>
												<div class="ms-2 overflow-hidden">
													<p class="text-dark fw-medium text-truncate mb-0"><a href="#">Brian Villalobos</a></p>
													<span class="fs-13 d-inline-flex align-items-center">Exp : 5+ Years<i class="ti ti-circle-filled fs-4 mx-2 text-primary"></i>USA</span>
												</div>
											</div>
											<span class="badge badge-secondary badge-xs">UI/UX Designer</span>
										</div>
										<div class="d-flex align-items-center justify-content-between mb-4">
											<div class="d-flex align-items-center">
												<a href="#" class="avatar overflow-hidden flex-shrink-0">
													<img src="assets/img/users/user-32.jpg" class="img-fluid rounded-circle" alt="img">
												</a>
												<div class="ms-2 overflow-hidden">
													<p class="text-dark fw-medium text-truncate mb-0"><a href="#">Anthony Lewis</a></p>
													<span class="fs-13 d-inline-flex align-items-center">Exp : 4+ Years<i class="ti ti-circle-filled fs-4 mx-2 text-primary"></i>USA</span>
												</div>
											</div>
											<span class="badge badge-info badge-xs">Python Developer</span>
										</div>
										<div class="d-flex align-items-center justify-content-between mb-4">
											<div class="d-flex align-items-center">
												<a href="#" class="avatar overflow-hidden flex-shrink-0">
													<img src="assets/img/users/user-32.jpg" class="img-fluid rounded-circle" alt="img">
												</a>
												<div class="ms-2 overflow-hidden">
													<p class="text-dark fw-medium text-truncate mb-0"><a href="#">Stephan Peralt</a></p>
													<span class="fs-13 d-inline-flex align-items-center">Exp : 6+ Years<i class="ti ti-circle-filled fs-4 mx-2 text-primary"></i>USA</span>
												</div>
											</div>
											<span class="badge badge-pink badge-xs">Android Developer</span>
										</div>
										<div class="d-flex align-items-center justify-content-between mb-0">
											<div class="d-flex align-items-center">
												<a href="javascript:void(0);" class="avatar overflow-hidden flex-shrink-0">
													<img src="assets/img/users/user-34.jpg" class="img-fluid rounded-circle" alt="img">
												</a>
												<div class="ms-2 overflow-hidden">
													<p class="text-dark fw-medium text-truncate mb-0"><a href="javascript:void(0);">Doglas Martini</a></p>
													<span class="fs-13 d-inline-flex align-items-center">Exp : 2+ Years<i class="ti ti-circle-filled fs-4 mx-2 text-primary"></i>USA</span>
												</div>
											</div>
											<span class="badge badge-purple badge-xs">React Developer</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Jobs Applicants -->
					
					<!-- Employees -->
					<div class="col-xxl-4 col-xl-6 d-flex">
						<div class="card flex-fill">
							<div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
								<h5 class="mb-2">Employees</h5>
								<a href="employees.html" class="btn btn-light btn-md mb-2">View All</a>
							</div>
							<div class="card-body p-0">
								<div class="table-responsive">	
									<table class="table table-nowrap mb-0">
										<thead>
											<tr>
												<th>Name</th>
												<th>Department</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<div class="d-flex align-items-center">
														<a href="javascript:void(0);" class="avatar">
															<img src="assets/img/users/user-32.jpg" class="img-fluid rounded-circle" alt="img">
														</a>
														<div class="ms-2">
															<h6 class="fw-medium"><a href="javascript:void(0);">Anthony Lewis</a></h6>
															<span class="fs-12">Finance</span>
														</div>
													</div>
												</td>
												<td>
													<span class="badge badge-secondary-transparent badge-xs">
														Finance
													</span>
												</td>
											</tr>
											<tr>
												<td>
													<div class="d-flex align-items-center">
														<a href="#" class="avatar">
															<img src="assets/img/users/user-09.jpg" class="img-fluid rounded-circle" alt="img">
														</a>
														<div class="ms-2">
															<h6 class="fw-medium"><a href="#">Brian Villalobos</a></h6>
															<span class="fs-12">PHP Developer</span>
														</div>
													</div>
												</td>
												<td>
													<span class="badge badge-danger-transparent badge-xs">Development</span>
												</td>
											</tr>
											<tr>
												<td>
													<div class="d-flex align-items-center">
														<a href="#" class="avatar">
															<img src="assets/img/users/user-01.jpg" class="img-fluid rounded-circle" alt="img">
														</a>
														<div class="ms-2">
															<h6 class="fw-medium"><a href="#">Stephan Peralt</a></h6>
															<span class="fs-12">Executive</span>
														</div>
													</div>
												</td>
												<td>
													<span class="badge badge-info-transparent badge-xs">Marketing</span>
												</td>
											</tr>
											<tr>
												<td>
													<div class="d-flex align-items-center">
														<a href="javascript:void(0);" class="avatar">
															<img src="assets/img/users/user-34.jpg" class="img-fluid rounded-circle" alt="img">
														</a>
														<div class="ms-2">
															<h6 class="fw-medium"><a href="javascript:void(0);">Doglas Martini</a></h6>
															<span class="fs-12">Project Manager</span>
														</div>
													</div>
												</td>
												<td>
													<span class="badge badge-purple-transparent badge-xs">Manager</span>
												</td>
											</tr>
											<tr>
												<td class="border-0">
													<div class="d-flex align-items-center">
														<a href="javascript:void(0);" class="avatar">
															<img src="assets/img/users/user-37.jpg" class="img-fluid rounded-circle" alt="img">
														</a>
														<div class="ms-2">
															<h6 class="fw-medium"><a href="javascript:void(0);">Anthony Lewis</a></h6>
															<span class="fs-12">UI/UX Designer</span>
														</div>
													</div>
												</td>
												<td class="border-0">
													<span class="badge badge-pink-transparent badge-xs">UI/UX Design</span>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!-- /Employees -->
					
					<!-- Todo -->
					<div class="col-xxl-4 col-xl-6 d-flex">
						<div class="card flex-fill">
							<div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
								<h5 class="mb-2">Todo</h5>
								<div class="d-flex align-items-center">
									<div class="dropdown mb-2 me-2">
										<a href="javascript:void(0);" class="btn btn-white border btn-sm d-inline-flex align-items-center" data-bs-toggle="dropdown">
											<i class="ti ti-calendar me-1"></i>Today
										</a>
										<ul class="dropdown-menu  dropdown-menu-end p-3">
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">This Month</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">This Week</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">Today</a>
											</li>
										</ul>
									</div>
									<a href="#" class="btn btn-primary btn-icon btn-xs rounded-circle d-flex align-items-center justify-content-center p-0 mb-2" data-bs-toggle="modal" data-bs-target="#add_todo"><i class="ti ti-plus fs-16"></i></a>
								</div>
							</div>
							<div class="card-body">
								<div class="d-flex align-items-center todo-item border p-2 br-5 mb-2">
									<i class="ti ti-grid-dots me-2"></i>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" id="todo1">
										<label class="form-check-label fw-medium" for="todo1">Add Holidays</label>
									</div>
								</div>
								<div class="d-flex align-items-center todo-item border p-2 br-5 mb-2">
									<i class="ti ti-grid-dots me-2"></i>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" id="todo2">
										<label class="form-check-label fw-medium" for="todo2">Add Meeting  to Client</label>
									</div>
								</div>
								<div class="d-flex align-items-center todo-item border p-2 br-5 mb-2">
									<i class="ti ti-grid-dots me-2"></i>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" id="todo3">
										<label class="form-check-label fw-medium" for="todo3">Chat with Adrian</label>
									</div>
								</div>
								<div class="d-flex align-items-center todo-item border p-2 br-5 mb-2">
									<i class="ti ti-grid-dots me-2"></i>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" id="todo4">
										<label class="form-check-label fw-medium" for="todo4">Management Call</label>
									</div>
								</div>
								<div class="d-flex align-items-center todo-item border p-2 br-5 mb-2">
									<i class="ti ti-grid-dots me-2"></i>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" id="todo5">
										<label class="form-check-label fw-medium" for="todo5">Add Payroll</label>
									</div>
								</div>
								<div class="d-flex align-items-center todo-item border p-2 br-5 mb-0">
									<i class="ti ti-grid-dots me-2"></i>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" id="todo6">
										<label class="form-check-label fw-medium" for="todo6">Add Policy for Increment </label>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Todo -->

				</div>

				<div class="row">
					
					<!-- Sales Overview -->
					<div class="col-xl-7 d-flex">
						<div class="card flex-fill">
							<div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
								<h5 class="mb-2">Sales Overview</h5>
								<div class="d-flex align-items-center">
									<div class="dropdown mb-2">
										<a href="javascript:void(0);" class="dropdown-toggle btn btn-white border-0 btn-sm d-inline-flex align-items-center fs-13 me-2" data-bs-toggle="dropdown">
											All Departments
										</a>
										<ul class="dropdown-menu  dropdown-menu-end p-3">
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">UI/UX Designer</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">HR Manager</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">Junior Tester</a>
											</li>
										</ul>
									</div>	
								</div>
							</div>
							<div class="card-body pb-0">
								<div class="d-flex align-items-center justify-content-between flex-wrap">
									<div class="d-flex align-items-center mb-1">
										<p class="fs-13 text-gray-9 me-3 mb-0"><i class="ti ti-square-filled me-2 text-primary"></i>Income</p>
										<p class="fs-13 text-gray-9 mb-0"><i class="ti ti-square-filled me-2 text-gray-2"></i>Expenses</p>
									</div>
									<p class="fs-13 mb-1">Last Updated at 11:30PM</p>
								</div>
								<div id="sales-income" style="min-height: 305px;"><div id="apexchartsklaub2faj" class="apexcharts-canvas apexchartsklaub2faj apexcharts-theme-" style="width: 551px; height: 290px;"><svg id="SvgjsSvg1393" width="551" height="290" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"><foreignObject x="0" y="0" width="551" height="290"><div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 145px;"></div><style type="text/css">
      .apexcharts-flip-y {
        transform: scaleY(-1) translateY(-100%);
        transform-origin: top;
        transform-box: fill-box;
      }
      .apexcharts-flip-x {
        transform: scaleX(-1);
        transform-origin: center;
        transform-box: fill-box;
      }
      .apexcharts-legend {
        display: flex;
        overflow: auto;
        padding: 0 10px;
      }
      .apexcharts-legend.apx-legend-position-bottom, .apexcharts-legend.apx-legend-position-top {
        flex-wrap: wrap
      }
      .apexcharts-legend.apx-legend-position-right, .apexcharts-legend.apx-legend-position-left {
        flex-direction: column;
        bottom: 0;
      }
      .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left, .apexcharts-legend.apx-legend-position-top.apexcharts-align-left, .apexcharts-legend.apx-legend-position-right, .apexcharts-legend.apx-legend-position-left {
        justify-content: flex-start;
      }
      .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center, .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
        justify-content: center;
      }
      .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right, .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
        justify-content: flex-end;
      }
      .apexcharts-legend-series {
        cursor: pointer;
        line-height: normal;
        display: flex;
        align-items: center;
      }
      .apexcharts-legend-text {
        position: relative;
        font-size: 14px;
      }
      .apexcharts-legend-text *, .apexcharts-legend-marker * {
        pointer-events: none;
      }
      .apexcharts-legend-marker {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        margin-right: 1px;
      }

      .apexcharts-legend-series.apexcharts-no-click {
        cursor: auto;
      }
      .apexcharts-legend .apexcharts-hidden-zero-series, .apexcharts-legend .apexcharts-hidden-null-series {
        display: none !important;
      }
      .apexcharts-inactive-legend {
        opacity: 0.45;
      }</style></foreignObject><g id="SvgjsG1406" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)"></g><g id="SvgjsG1407" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)"></g><g id="SvgjsG1530" class="apexcharts-yaxis" rel="0" transform="translate(3.700000762939453, 0)"><g id="SvgjsG1531" class="apexcharts-yaxis-texts-g"><text id="SvgjsText1533" font-family="Helvetica, Arial, sans-serif" x="20" y="34.333333333333336" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#6b7280" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1534">120</tspan><title>120</title></text><text id="SvgjsText1536" font-family="Helvetica, Arial, sans-serif" x="20" y="71.28346651236217" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#6b7280" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1537">100</tspan><title>100</title></text><text id="SvgjsText1539" font-family="Helvetica, Arial, sans-serif" x="20" y="108.23359969139099" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#6b7280" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1540">80</tspan><title>80</title></text><text id="SvgjsText1542" font-family="Helvetica, Arial, sans-serif" x="20" y="145.18373287041982" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#6b7280" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1543">60</tspan><title>60</title></text><text id="SvgjsText1545" font-family="Helvetica, Arial, sans-serif" x="20" y="182.13386604944864" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#6b7280" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1546">40</tspan><title>40</title></text><text id="SvgjsText1548" font-family="Helvetica, Arial, sans-serif" x="20" y="219.08399922847747" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#6b7280" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1549">20</tspan><title>20</title></text><text id="SvgjsText1551" font-family="Helvetica, Arial, sans-serif" x="20" y="256.0341324075063" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#6b7280" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1552">0</tspan><title>0</title></text></g></g><g id="SvgjsG1395" class="apexcharts-inner apexcharts-graphical" transform="translate(28.700000762939453, 30)"><defs id="SvgjsDefs1394"><linearGradient id="SvgjsLinearGradient1398" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1399" stop-opacity="0.4" stop-color="rgba(216,227,240,0.4)" offset="0"></stop><stop id="SvgjsStop1400" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop><stop id="SvgjsStop1401" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop></linearGradient><clipPath id="gridRectMaskklaub2faj"><rect id="SvgjsRect1403" width="499.3909168243408" height="221.700799074173" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="gridRectBarMaskklaub2faj"><rect id="SvgjsRect1404" width="503.3909168243408" height="225.700799074173" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="gridRectMarkerMaskklaub2faj"><rect id="SvgjsRect1405" width="499.3909168243408" height="221.700799074173" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMaskklaub2faj"></clipPath><clipPath id="nonForecastMaskklaub2faj"></clipPath></defs><rect id="SvgjsRect1402" width="29.131136814753212" height="221.700799074173" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke-dasharray="3" fill="url(#SvgjsLinearGradient1398)" class="apexcharts-xcrosshairs" y2="221.700799074173" filter="none" fill-opacity="0.9"></rect><line id="SvgjsLine1467" x1="0" y1="221.700799074173" x2="0" y2="227.700799074173" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1468" x1="41.61590973536173" y1="221.700799074173" x2="41.61590973536173" y2="227.700799074173" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1469" x1="83.23181947072347" y1="221.700799074173" x2="83.23181947072347" y2="227.700799074173" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1470" x1="124.8477292060852" y1="221.700799074173" x2="124.8477292060852" y2="227.700799074173" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1471" x1="166.46363894144693" y1="221.700799074173" x2="166.46363894144693" y2="227.700799074173" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1472" x1="208.07954867680866" y1="221.700799074173" x2="208.07954867680866" y2="227.700799074173" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1473" x1="249.69545841217038" y1="221.700799074173" x2="249.69545841217038" y2="227.700799074173" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1474" x1="291.3113681475321" y1="221.700799074173" x2="291.3113681475321" y2="227.700799074173" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1475" x1="332.92727788289386" y1="221.700799074173" x2="332.92727788289386" y2="227.700799074173" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1476" x1="374.5431876182556" y1="221.700799074173" x2="374.5431876182556" y2="227.700799074173" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1477" x1="416.15909735361737" y1="221.700799074173" x2="416.15909735361737" y2="227.700799074173" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1478" x1="457.7750070889791" y1="221.700799074173" x2="457.7750070889791" y2="227.700799074173" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1479" x1="499.3909168243409" y1="221.700799074173" x2="499.3909168243409" y2="227.700799074173" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><g id="SvgjsG1463" class="apexcharts-grid"><g id="SvgjsG1464" class="apexcharts-gridlines-horizontal"><line id="SvgjsLine1481" x1="0" y1="36.95013317902883" x2="499.3909168243408" y2="36.95013317902883" stroke="#e5e7eb" stroke-dasharray="5" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1482" x1="0" y1="73.90026635805766" x2="499.3909168243408" y2="73.90026635805766" stroke="#e5e7eb" stroke-dasharray="5" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1483" x1="0" y1="110.8503995370865" x2="499.3909168243408" y2="110.8503995370865" stroke="#e5e7eb" stroke-dasharray="5" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1484" x1="0" y1="147.80053271611533" x2="499.3909168243408" y2="147.80053271611533" stroke="#e5e7eb" stroke-dasharray="5" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1485" x1="0" y1="184.75066589514415" x2="499.3909168243408" y2="184.75066589514415" stroke="#e5e7eb" stroke-dasharray="5" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1486" x1="0" y1="221.70079907417298" x2="499.3909168243408" y2="221.70079907417298" stroke="#e5e7eb" stroke-dasharray="5" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG1465" class="apexcharts-gridlines-vertical"></g><line id="SvgjsLine1488" x1="0" y1="221.700799074173" x2="499.3909168243408" y2="221.700799074173" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine1487" x1="0" y1="1" x2="0" y2="221.700799074173" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1466" class="apexcharts-grid-borders"><line id="SvgjsLine1480" x1="0" y1="0" x2="499.3909168243408" y2="0" stroke="#e5e7eb" stroke-dasharray="5" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1529" x1="0" y1="221.700799074173" x2="499.3909168243408" y2="221.700799074173" stroke="#e0e0e0" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"></line></g><g id="SvgjsG1408" class="apexcharts-bar-series apexcharts-plot-series"><g id="SvgjsG1409" class="apexcharts-series" seriesName="Income" rel="1" data:realIndex="0"><path id="SvgjsPath1413" d="M 6.24238646030426 221.701799074173 L 6.24238646030426 152.80153271611533 C 6.24238646030426 150.30153271611533 8.74238646030426 147.80153271611533 11.24238646030426 147.80153271611533 L 30.373523275057472 147.80153271611533 C 32.87352327505747 147.80153271611533 35.37352327505747 150.30153271611533 35.37352327505747 152.80153271611533 L 35.37352327505747 221.701799074173 z " fill="rgba(255,111,40,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area " index="0" clip-path="url(#gridRectBarMaskklaub2faj)" pathTo="M 6.24238646030426 221.701799074173 L 6.24238646030426 152.80153271611533 C 6.24238646030426 150.30153271611533 8.74238646030426 147.80153271611533 11.24238646030426 147.80153271611533 L 30.373523275057472 147.80153271611533 C 32.87352327505747 147.80153271611533 35.37352327505747 150.30153271611533 35.37352327505747 152.80153271611533 L 35.37352327505747 221.701799074173 z " pathFrom="M 6.24238646030426 221.701799074173 L 6.24238646030426 221.701799074173 L 35.37352327505747 221.701799074173 L 35.37352327505747 221.701799074173 L 35.37352327505747 221.701799074173 L 35.37352327505747 221.701799074173 L 35.37352327505747 221.701799074173 L 6.24238646030426 221.701799074173 z" cy="147.80053271611533" cx="47.85829619566599" j="0" val="40" barHeight="73.90026635805768" barWidth="29.131136814753212"></path><path id="SvgjsPath1415" d="M 47.85829619566599 221.701799074173 L 47.85829619566599 171.27659930562976 C 47.85829619566599 168.77659930562976 50.35829619566599 166.27659930562976 52.85829619566599 166.27659930562976 L 71.9894330104192 166.27659930562976 C 74.4894330104192 166.27659930562976 76.9894330104192 168.77659930562976 76.9894330104192 171.27659930562976 L 76.9894330104192 221.701799074173 z " fill="rgba(255,111,40,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area " index="0" clip-path="url(#gridRectBarMaskklaub2faj)" pathTo="M 47.85829619566599 221.701799074173 L 47.85829619566599 171.27659930562976 C 47.85829619566599 168.77659930562976 50.35829619566599 166.27659930562976 52.85829619566599 166.27659930562976 L 71.9894330104192 166.27659930562976 C 74.4894330104192 166.27659930562976 76.9894330104192 168.77659930562976 76.9894330104192 171.27659930562976 L 76.9894330104192 221.701799074173 z " pathFrom="M 47.85829619566599 221.701799074173 L 47.85829619566599 221.701799074173 L 76.9894330104192 221.701799074173 L 76.9894330104192 221.701799074173 L 76.9894330104192 221.701799074173 L 76.9894330104192 221.701799074173 L 76.9894330104192 221.701799074173 L 47.85829619566599 221.701799074173 z" cy="166.27559930562975" cx="89.47420593102773" j="1" val="30" barHeight="55.42519976854325" barWidth="29.131136814753212"></path><path id="SvgjsPath1417" d="M 89.47420593102773 221.701799074173 L 89.47420593102773 143.56399942135815 C 89.47420593102773 141.06399942135815 91.97420593102773 138.56399942135815 94.47420593102773 138.56399942135815 L 113.60534274578094 138.56399942135815 C 116.10534274578094 138.56399942135815 118.60534274578094 141.06399942135815 118.60534274578094 143.56399942135815 L 118.60534274578094 221.701799074173 z " fill="rgba(255,111,40,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area " index="0" clip-path="url(#gridRectBarMaskklaub2faj)" pathTo="M 89.47420593102773 221.701799074173 L 89.47420593102773 143.56399942135815 C 89.47420593102773 141.06399942135815 91.97420593102773 138.56399942135815 94.47420593102773 138.56399942135815 L 113.60534274578094 138.56399942135815 C 116.10534274578094 138.56399942135815 118.60534274578094 141.06399942135815 118.60534274578094 143.56399942135815 L 118.60534274578094 221.701799074173 z " pathFrom="M 89.47420593102773 221.701799074173 L 89.47420593102773 221.701799074173 L 118.60534274578094 221.701799074173 L 118.60534274578094 221.701799074173 L 118.60534274578094 221.701799074173 L 118.60534274578094 221.701799074173 L 118.60534274578094 221.701799074173 L 89.47420593102773 221.701799074173 z" cy="138.56299942135814" cx="131.09011566638947" j="2" val="45" barHeight="83.13779965281488" barWidth="29.131136814753212"></path><path id="SvgjsPath1419" d="M 131.09011566638947 221.701799074173 L 131.09011566638947 78.90126635805765 C 131.09011566638947 76.40126635805765 133.59011566638947 73.90126635805765 136.09011566638947 73.90126635805765 L 155.22125248114267 73.90126635805765 C 157.72125248114267 73.90126635805765 160.22125248114267 76.40126635805765 160.22125248114267 78.90126635805765 L 160.22125248114267 221.701799074173 z " fill="rgba(255,111,40,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area " index="0" clip-path="url(#gridRectBarMaskklaub2faj)" pathTo="M 131.09011566638947 221.701799074173 L 131.09011566638947 78.90126635805765 C 131.09011566638947 76.40126635805765 133.59011566638947 73.90126635805765 136.09011566638947 73.90126635805765 L 155.22125248114267 73.90126635805765 C 157.72125248114267 73.90126635805765 160.22125248114267 76.40126635805765 160.22125248114267 78.90126635805765 L 160.22125248114267 221.701799074173 z " pathFrom="M 131.09011566638947 221.701799074173 L 131.09011566638947 221.701799074173 L 160.22125248114267 221.701799074173 L 160.22125248114267 221.701799074173 L 160.22125248114267 221.701799074173 L 160.22125248114267 221.701799074173 L 160.22125248114267 221.701799074173 L 131.09011566638947 221.701799074173 z" cy="73.90026635805765" cx="172.7060254017512" j="3" val="80" barHeight="147.80053271611536" barWidth="29.131136814753212"></path><path id="SvgjsPath1421" d="M 172.7060254017512 221.701799074173 L 172.7060254017512 69.66373306330044 C 172.7060254017512 67.16373306330044 175.2060254017512 64.66373306330044 177.7060254017512 64.66373306330044 L 196.8371622165044 64.66373306330044 C 199.3371622165044 64.66373306330044 201.8371622165044 67.16373306330044 201.8371622165044 69.66373306330044 L 201.8371622165044 221.701799074173 z " fill="rgba(255,111,40,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area " index="0" clip-path="url(#gridRectBarMaskklaub2faj)" pathTo="M 172.7060254017512 221.701799074173 L 172.7060254017512 69.66373306330044 C 172.7060254017512 67.16373306330044 175.2060254017512 64.66373306330044 177.7060254017512 64.66373306330044 L 196.8371622165044 64.66373306330044 C 199.3371622165044 64.66373306330044 201.8371622165044 67.16373306330044 201.8371622165044 69.66373306330044 L 201.8371622165044 221.701799074173 z " pathFrom="M 172.7060254017512 221.701799074173 L 172.7060254017512 221.701799074173 L 201.8371622165044 221.701799074173 L 201.8371622165044 221.701799074173 L 201.8371622165044 221.701799074173 L 201.8371622165044 221.701799074173 L 201.8371622165044 221.701799074173 L 172.7060254017512 221.701799074173 z" cy="64.66273306330044" cx="214.32193513711292" j="4" val="85" barHeight="157.03806601087257" barWidth="29.131136814753212"></path><path id="SvgjsPath1423" d="M 214.32193513711292 221.701799074173 L 214.32193513711292 60.42619976854325 C 214.32193513711292 57.92619976854325 216.82193513711292 55.42619976854325 219.32193513711292 55.42619976854325 L 238.45307195186612 55.42619976854325 C 240.95307195186612 55.42619976854325 243.45307195186612 57.92619976854325 243.45307195186612 60.42619976854325 L 243.45307195186612 221.701799074173 z " fill="rgba(255,111,40,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area " index="0" clip-path="url(#gridRectBarMaskklaub2faj)" pathTo="M 214.32193513711292 221.701799074173 L 214.32193513711292 60.42619976854325 C 214.32193513711292 57.92619976854325 216.82193513711292 55.42619976854325 219.32193513711292 55.42619976854325 L 238.45307195186612 55.42619976854325 C 240.95307195186612 55.42619976854325 243.45307195186612 57.92619976854325 243.45307195186612 60.42619976854325 L 243.45307195186612 221.701799074173 z " pathFrom="M 214.32193513711292 221.701799074173 L 214.32193513711292 221.701799074173 L 243.45307195186612 221.701799074173 L 243.45307195186612 221.701799074173 L 243.45307195186612 221.701799074173 L 243.45307195186612 221.701799074173 L 243.45307195186612 221.701799074173 L 214.32193513711292 221.701799074173 z" cy="55.42519976854325" cx="255.93784487247464" j="5" val="90" barHeight="166.27559930562975" barWidth="29.131136814753212"></path><path id="SvgjsPath1425" d="M 255.93784487247464 221.701799074173 L 255.93784487247464 78.90126635805765 C 255.93784487247464 76.40126635805765 258.43784487247467 73.90126635805765 260.93784487247467 73.90126635805765 L 280.06898168722785 73.90126635805765 C 282.56898168722785 73.90126635805765 285.06898168722785 76.40126635805765 285.06898168722785 78.90126635805765 L 285.06898168722785 221.701799074173 z " fill="rgba(255,111,40,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area " index="0" clip-path="url(#gridRectBarMaskklaub2faj)" pathTo="M 255.93784487247464 221.701799074173 L 255.93784487247464 78.90126635805765 C 255.93784487247464 76.40126635805765 258.43784487247467 73.90126635805765 260.93784487247467 73.90126635805765 L 280.06898168722785 73.90126635805765 C 282.56898168722785 73.90126635805765 285.06898168722785 76.40126635805765 285.06898168722785 78.90126635805765 L 285.06898168722785 221.701799074173 z " pathFrom="M 255.93784487247464 221.701799074173 L 255.93784487247464 221.701799074173 L 285.06898168722785 221.701799074173 L 285.06898168722785 221.701799074173 L 285.06898168722785 221.701799074173 L 285.06898168722785 221.701799074173 L 285.06898168722785 221.701799074173 L 255.93784487247464 221.701799074173 z" cy="73.90026635805765" cx="297.55375460783637" j="6" val="80" barHeight="147.80053271611536" barWidth="29.131136814753212"></path><path id="SvgjsPath1427" d="M 297.55375460783637 221.701799074173 L 297.55375460783637 78.90126635805765 C 297.55375460783637 76.40126635805765 300.05375460783637 73.90126635805765 302.55375460783637 73.90126635805765 L 321.6848914225896 73.90126635805765 C 324.1848914225896 73.90126635805765 326.6848914225896 76.40126635805765 326.6848914225896 78.90126635805765 L 326.6848914225896 221.701799074173 z " fill="rgba(255,111,40,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area " index="0" clip-path="url(#gridRectBarMaskklaub2faj)" pathTo="M 297.55375460783637 221.701799074173 L 297.55375460783637 78.90126635805765 C 297.55375460783637 76.40126635805765 300.05375460783637 73.90126635805765 302.55375460783637 73.90126635805765 L 321.6848914225896 73.90126635805765 C 324.1848914225896 73.90126635805765 326.6848914225896 76.40126635805765 326.6848914225896 78.90126635805765 L 326.6848914225896 221.701799074173 z " pathFrom="M 297.55375460783637 221.701799074173 L 297.55375460783637 221.701799074173 L 326.6848914225896 221.701799074173 L 326.6848914225896 221.701799074173 L 326.6848914225896 221.701799074173 L 326.6848914225896 221.701799074173 L 326.6848914225896 221.701799074173 L 297.55375460783637 221.701799074173 z" cy="73.90026635805765" cx="339.1696643431981" j="7" val="80" barHeight="147.80053271611536" barWidth="29.131136814753212"></path><path id="SvgjsPath1429" d="M 339.1696643431981 221.701799074173 L 339.1696643431981 78.90126635805765 C 339.1696643431981 76.40126635805765 341.6696643431981 73.90126635805765 344.1696643431981 73.90126635805765 L 363.30080115795135 73.90126635805765 C 365.80080115795135 73.90126635805765 368.30080115795135 76.40126635805765 368.30080115795135 78.90126635805765 L 368.30080115795135 221.701799074173 z " fill="rgba(255,111,40,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area " index="0" clip-path="url(#gridRectBarMaskklaub2faj)" pathTo="M 339.1696643431981 221.701799074173 L 339.1696643431981 78.90126635805765 C 339.1696643431981 76.40126635805765 341.6696643431981 73.90126635805765 344.1696643431981 73.90126635805765 L 363.30080115795135 73.90126635805765 C 365.80080115795135 73.90126635805765 368.30080115795135 76.40126635805765 368.30080115795135 78.90126635805765 L 368.30080115795135 221.701799074173 z " pathFrom="M 339.1696643431981 221.701799074173 L 339.1696643431981 221.701799074173 L 368.30080115795135 221.701799074173 L 368.30080115795135 221.701799074173 L 368.30080115795135 221.701799074173 L 368.30080115795135 221.701799074173 L 368.30080115795135 221.701799074173 L 339.1696643431981 221.701799074173 z" cy="73.90026635805765" cx="380.7855740785599" j="8" val="80" barHeight="147.80053271611536" barWidth="29.131136814753212"></path><path id="SvgjsPath1431" d="M 380.7855740785599 221.701799074173 L 380.7855740785599 69.66373306330044 C 380.7855740785599 67.16373306330044 383.2855740785599 64.66373306330044 385.7855740785599 64.66373306330044 L 404.9167108933131 64.66373306330044 C 407.4167108933131 64.66373306330044 409.9167108933131 67.16373306330044 409.9167108933131 69.66373306330044 L 409.9167108933131 221.701799074173 z " fill="rgba(255,111,40,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area " index="0" clip-path="url(#gridRectBarMaskklaub2faj)" pathTo="M 380.7855740785599 221.701799074173 L 380.7855740785599 69.66373306330044 C 380.7855740785599 67.16373306330044 383.2855740785599 64.66373306330044 385.7855740785599 64.66373306330044 L 404.9167108933131 64.66373306330044 C 407.4167108933131 64.66373306330044 409.9167108933131 67.16373306330044 409.9167108933131 69.66373306330044 L 409.9167108933131 221.701799074173 z " pathFrom="M 380.7855740785599 221.701799074173 L 380.7855740785599 221.701799074173 L 409.9167108933131 221.701799074173 L 409.9167108933131 221.701799074173 L 409.9167108933131 221.701799074173 L 409.9167108933131 221.701799074173 L 409.9167108933131 221.701799074173 L 380.7855740785599 221.701799074173 z" cy="64.66273306330044" cx="422.40148381392163" j="9" val="85" barHeight="157.03806601087257" barWidth="29.131136814753212"></path><path id="SvgjsPath1433" d="M 422.40148381392163 221.701799074173 L 422.40148381392163 189.75166589514416 C 422.40148381392163 187.25166589514416 424.90148381392163 184.75166589514416 427.40148381392163 184.75166589514416 L 446.53262062867486 184.75166589514416 C 449.03262062867486 184.75166589514416 451.53262062867486 187.25166589514416 451.53262062867486 189.75166589514416 L 451.53262062867486 221.701799074173 z " fill="rgba(255,111,40,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area " index="0" clip-path="url(#gridRectBarMaskklaub2faj)" pathTo="M 422.40148381392163 221.701799074173 L 422.40148381392163 189.75166589514416 C 422.40148381392163 187.25166589514416 424.90148381392163 184.75166589514416 427.40148381392163 184.75166589514416 L 446.53262062867486 184.75166589514416 C 449.03262062867486 184.75166589514416 451.53262062867486 187.25166589514416 451.53262062867486 189.75166589514416 L 451.53262062867486 221.701799074173 z " pathFrom="M 422.40148381392163 221.701799074173 L 422.40148381392163 221.701799074173 L 451.53262062867486 221.701799074173 L 451.53262062867486 221.701799074173 L 451.53262062867486 221.701799074173 L 451.53262062867486 221.701799074173 L 451.53262062867486 221.701799074173 L 422.40148381392163 221.701799074173 z" cy="184.75066589514415" cx="464.0173935492834" j="10" val="20" barHeight="36.95013317902884" barWidth="29.131136814753212"></path><path id="SvgjsPath1435" d="M 464.0173935492834 221.701799074173 L 464.0173935492834 78.90126635805765 C 464.0173935492834 76.40126635805765 466.5173935492834 73.90126635805765 469.0173935492834 73.90126635805765 L 488.1485303640366 73.90126635805765 C 490.6485303640366 73.90126635805765 493.1485303640366 76.40126635805765 493.1485303640366 78.90126635805765 L 493.1485303640366 221.701799074173 z " fill="rgba(255,111,40,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area " index="0" clip-path="url(#gridRectBarMaskklaub2faj)" pathTo="M 464.0173935492834 221.701799074173 L 464.0173935492834 78.90126635805765 C 464.0173935492834 76.40126635805765 466.5173935492834 73.90126635805765 469.0173935492834 73.90126635805765 L 488.1485303640366 73.90126635805765 C 490.6485303640366 73.90126635805765 493.1485303640366 76.40126635805765 493.1485303640366 78.90126635805765 L 493.1485303640366 221.701799074173 z " pathFrom="M 464.0173935492834 221.701799074173 L 464.0173935492834 221.701799074173 L 493.1485303640366 221.701799074173 L 493.1485303640366 221.701799074173 L 493.1485303640366 221.701799074173 L 493.1485303640366 221.701799074173 L 493.1485303640366 221.701799074173 L 464.0173935492834 221.701799074173 z" cy="73.90026635805765" cx="505.63330328464514" j="11" val="80" barHeight="147.80053271611536" barWidth="29.131136814753212"></path><g id="SvgjsG1411" class="apexcharts-bar-goals-markers"><g id="SvgjsG1412" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskklaub2faj)"></g><g id="SvgjsG1414" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskklaub2faj)"></g><g id="SvgjsG1416" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskklaub2faj)"></g><g id="SvgjsG1418" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskklaub2faj)"></g><g id="SvgjsG1420" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskklaub2faj)"></g><g id="SvgjsG1422" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskklaub2faj)"></g><g id="SvgjsG1424" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskklaub2faj)"></g><g id="SvgjsG1426" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskklaub2faj)"></g><g id="SvgjsG1428" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskklaub2faj)"></g><g id="SvgjsG1430" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskklaub2faj)"></g><g id="SvgjsG1432" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskklaub2faj)"></g><g id="SvgjsG1434" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskklaub2faj)"></g></g></g><g id="SvgjsG1436" class="apexcharts-series" seriesName="Expenses" rel="2" data:realIndex="1"><path id="SvgjsPath1440" d="M 6.24238646030426 147.80253271611534 L 6.24238646030426 41.95213317902883 C 6.24238646030426 39.45213317902883 8.74238646030426 36.95213317902883 11.24238646030426 36.95213317902883 L 30.373523275057472 36.95213317902883 C 32.87352327505747 36.95213317902883 35.37352327505747 39.45213317902883 35.37352327505747 41.95213317902883 L 35.37352327505747 147.80253271611534 z " fill="rgba(248,249,250,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area " index="1" clip-path="url(#gridRectBarMaskklaub2faj)" pathTo="M 6.24238646030426 147.80253271611534 L 6.24238646030426 41.95213317902883 C 6.24238646030426 39.45213317902883 8.74238646030426 36.95213317902883 11.24238646030426 36.95213317902883 L 30.373523275057472 36.95213317902883 C 32.87352327505747 36.95213317902883 35.37352327505747 39.45213317902883 35.37352327505747 41.95213317902883 L 35.37352327505747 147.80253271611534 z " pathFrom="M 6.24238646030426 147.80253271611534 L 6.24238646030426 147.80253271611534 L 35.37352327505747 147.80253271611534 L 35.37352327505747 147.80253271611534 L 35.37352327505747 147.80253271611534 L 35.37352327505747 147.80253271611534 L 35.37352327505747 147.80253271611534 L 6.24238646030426 147.80253271611534 z" cy="36.95113317902883" cx="47.85829619566599" j="0" val="60" barHeight="110.8503995370865" barWidth="29.131136814753212"></path><path id="SvgjsPath1442" d="M 47.85829619566599 166.27759930562976 L 47.85829619566599 41.95213317902883 C 47.85829619566599 39.45213317902883 50.35829619566599 36.95213317902883 52.85829619566599 36.95213317902883 L 71.9894330104192 36.95213317902883 C 74.4894330104192 36.95213317902883 76.9894330104192 39.45213317902883 76.9894330104192 41.95213317902883 L 76.9894330104192 166.27759930562976 z " fill="rgba(248,249,250,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area " index="1" clip-path="url(#gridRectBarMaskklaub2faj)" pathTo="M 47.85829619566599 166.27759930562976 L 47.85829619566599 41.95213317902883 C 47.85829619566599 39.45213317902883 50.35829619566599 36.95213317902883 52.85829619566599 36.95213317902883 L 71.9894330104192 36.95213317902883 C 74.4894330104192 36.95213317902883 76.9894330104192 39.45213317902883 76.9894330104192 41.95213317902883 L 76.9894330104192 166.27759930562976 z " pathFrom="M 47.85829619566599 166.27759930562976 L 47.85829619566599 166.27759930562976 L 76.9894330104192 166.27759930562976 L 76.9894330104192 166.27759930562976 L 76.9894330104192 166.27759930562976 L 76.9894330104192 166.27759930562976 L 76.9894330104192 166.27759930562976 L 47.85829619566599 166.27759930562976 z" cy="36.95113317902883" cx="89.47420593102773" j="1" val="70" barHeight="129.32546612660093" barWidth="29.131136814753212"></path><path id="SvgjsPath1444" d="M 89.47420593102773 138.56499942135815 L 89.47420593102773 41.95213317902884 C 89.47420593102773 39.45213317902884 91.97420593102773 36.95213317902884 94.47420593102773 36.95213317902884 L 113.60534274578094 36.95213317902884 C 116.10534274578094 36.95213317902884 118.60534274578094 39.45213317902884 118.60534274578094 41.95213317902884 L 118.60534274578094 138.56499942135815 z " fill="rgba(248,249,250,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area " index="1" clip-path="url(#gridRectBarMaskklaub2faj)" pathTo="M 89.47420593102773 138.56499942135815 L 89.47420593102773 41.95213317902884 C 89.47420593102773 39.45213317902884 91.97420593102773 36.95213317902884 94.47420593102773 36.95213317902884 L 113.60534274578094 36.95213317902884 C 116.10534274578094 36.95213317902884 118.60534274578094 39.45213317902884 118.60534274578094 41.95213317902884 L 118.60534274578094 138.56499942135815 z " pathFrom="M 89.47420593102773 138.56499942135815 L 89.47420593102773 138.56499942135815 L 118.60534274578094 138.56499942135815 L 118.60534274578094 138.56499942135815 L 118.60534274578094 138.56499942135815 L 118.60534274578094 138.56499942135815 L 118.60534274578094 138.56499942135815 L 89.47420593102773 138.56499942135815 z" cy="36.951133179028844" cx="131.09011566638947" j="2" val="55" barHeight="101.6128662423293" barWidth="29.131136814753212"></path><path id="SvgjsPath1446" d="M 131.09011566638947 73.90226635805766 L 131.09011566638947 41.95213317902881 C 131.09011566638947 39.45213317902881 133.59011566638947 36.95213317902881 136.09011566638947 36.95213317902881 L 155.22125248114267 36.95213317902881 C 157.72125248114267 36.95213317902881 160.22125248114267 39.45213317902881 160.22125248114267 41.95213317902881 L 160.22125248114267 73.90226635805766 z " fill="rgba(248,249,250,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area " index="1" clip-path="url(#gridRectBarMaskklaub2faj)" pathTo="M 131.09011566638947 73.90226635805766 L 131.09011566638947 41.95213317902881 C 131.09011566638947 39.45213317902881 133.59011566638947 36.95213317902881 136.09011566638947 36.95213317902881 L 155.22125248114267 36.95213317902881 C 157.72125248114267 36.95213317902881 160.22125248114267 39.45213317902881 160.22125248114267 41.95213317902881 L 160.22125248114267 73.90226635805766 z " pathFrom="M 131.09011566638947 73.90226635805766 L 131.09011566638947 73.90226635805766 L 160.22125248114267 73.90226635805766 L 160.22125248114267 73.90226635805766 L 160.22125248114267 73.90226635805766 L 160.22125248114267 73.90226635805766 L 160.22125248114267 73.90226635805766 L 131.09011566638947 73.90226635805766 z" cy="36.951133179028815" cx="172.7060254017512" j="3" val="20" barHeight="36.95013317902884" barWidth="29.131136814753212"></path><path id="SvgjsPath1448" d="M 172.7060254017512 64.66473306330045 L 172.7060254017512 41.95213317902881 C 172.7060254017512 39.45213317902881 175.2060254017512 36.95213317902881 177.7060254017512 36.95213317902881 L 196.8371622165044 36.95213317902881 C 199.3371622165044 36.95213317902881 201.8371622165044 39.45213317902881 201.8371622165044 41.95213317902881 L 201.8371622165044 64.66473306330045 z " fill="rgba(248,249,250,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area " index="1" clip-path="url(#gridRectBarMaskklaub2faj)" pathTo="M 172.7060254017512 64.66473306330045 L 172.7060254017512 41.95213317902881 C 172.7060254017512 39.45213317902881 175.2060254017512 36.95213317902881 177.7060254017512 36.95213317902881 L 196.8371622165044 36.95213317902881 C 199.3371622165044 36.95213317902881 201.8371622165044 39.45213317902881 201.8371622165044 41.95213317902881 L 201.8371622165044 64.66473306330045 z " pathFrom="M 172.7060254017512 64.66473306330045 L 172.7060254017512 64.66473306330045 L 201.8371622165044 64.66473306330045 L 201.8371622165044 64.66473306330045 L 201.8371622165044 64.66473306330045 L 201.8371622165044 64.66473306330045 L 201.8371622165044 64.66473306330045 L 172.7060254017512 64.66473306330045 z" cy="36.951133179028815" cx="214.32193513711292" j="4" val="15" barHeight="27.712599884271626" barWidth="29.131136814753212"></path><path id="SvgjsPath1450" d="M 214.32193513711292 55.42719976854325 L 214.32193513711292 41.95213317902883 C 214.32193513711292 39.45213317902883 216.82193513711292 36.95213317902883 219.32193513711292 36.95213317902883 L 238.45307195186612 36.95213317902883 C 240.95307195186612 36.95213317902883 243.45307195186612 39.45213317902883 243.45307195186612 41.95213317902883 L 243.45307195186612 55.42719976854325 z " fill="rgba(248,249,250,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area " index="1" clip-path="url(#gridRectBarMaskklaub2faj)" pathTo="M 214.32193513711292 55.42719976854325 L 214.32193513711292 41.95213317902883 C 214.32193513711292 39.45213317902883 216.82193513711292 36.95213317902883 219.32193513711292 36.95213317902883 L 238.45307195186612 36.95213317902883 C 240.95307195186612 36.95213317902883 243.45307195186612 39.45213317902883 243.45307195186612 41.95213317902883 L 243.45307195186612 55.42719976854325 z " pathFrom="M 214.32193513711292 55.42719976854325 L 214.32193513711292 55.42719976854325 L 243.45307195186612 55.42719976854325 L 243.45307195186612 55.42719976854325 L 243.45307195186612 55.42719976854325 L 243.45307195186612 55.42719976854325 L 243.45307195186612 55.42719976854325 L 214.32193513711292 55.42719976854325 z" cy="36.95113317902883" cx="255.93784487247464" j="5" val="10" barHeight="18.47506658951442" barWidth="29.131136814753212"></path><path id="SvgjsPath1452" d="M 255.93784487247464 73.90226635805766 L 255.93784487247464 41.95213317902881 C 255.93784487247464 39.45213317902881 258.43784487247467 36.95213317902881 260.93784487247467 36.95213317902881 L 280.06898168722785 36.95213317902881 C 282.56898168722785 36.95213317902881 285.06898168722785 39.45213317902881 285.06898168722785 41.95213317902881 L 285.06898168722785 73.90226635805766 z " fill="rgba(248,249,250,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area " index="1" clip-path="url(#gridRectBarMaskklaub2faj)" pathTo="M 255.93784487247464 73.90226635805766 L 255.93784487247464 41.95213317902881 C 255.93784487247464 39.45213317902881 258.43784487247467 36.95213317902881 260.93784487247467 36.95213317902881 L 280.06898168722785 36.95213317902881 C 282.56898168722785 36.95213317902881 285.06898168722785 39.45213317902881 285.06898168722785 41.95213317902881 L 285.06898168722785 73.90226635805766 z " pathFrom="M 255.93784487247464 73.90226635805766 L 255.93784487247464 73.90226635805766 L 285.06898168722785 73.90226635805766 L 285.06898168722785 73.90226635805766 L 285.06898168722785 73.90226635805766 L 285.06898168722785 73.90226635805766 L 285.06898168722785 73.90226635805766 L 255.93784487247464 73.90226635805766 z" cy="36.951133179028815" cx="297.55375460783637" j="6" val="20" barHeight="36.95013317902884" barWidth="29.131136814753212"></path><path id="SvgjsPath1454" d="M 297.55375460783637 73.90226635805766 L 297.55375460783637 41.95213317902881 C 297.55375460783637 39.45213317902881 300.05375460783637 36.95213317902881 302.55375460783637 36.95213317902881 L 321.6848914225896 36.95213317902881 C 324.1848914225896 36.95213317902881 326.6848914225896 39.45213317902881 326.6848914225896 41.95213317902881 L 326.6848914225896 73.90226635805766 z " fill="rgba(248,249,250,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area " index="1" clip-path="url(#gridRectBarMaskklaub2faj)" pathTo="M 297.55375460783637 73.90226635805766 L 297.55375460783637 41.95213317902881 C 297.55375460783637 39.45213317902881 300.05375460783637 36.95213317902881 302.55375460783637 36.95213317902881 L 321.6848914225896 36.95213317902881 C 324.1848914225896 36.95213317902881 326.6848914225896 39.45213317902881 326.6848914225896 41.95213317902881 L 326.6848914225896 73.90226635805766 z " pathFrom="M 297.55375460783637 73.90226635805766 L 297.55375460783637 73.90226635805766 L 326.6848914225896 73.90226635805766 L 326.6848914225896 73.90226635805766 L 326.6848914225896 73.90226635805766 L 326.6848914225896 73.90226635805766 L 326.6848914225896 73.90226635805766 L 297.55375460783637 73.90226635805766 z" cy="36.951133179028815" cx="339.1696643431981" j="7" val="20" barHeight="36.95013317902884" barWidth="29.131136814753212"></path><path id="SvgjsPath1456" d="M 339.1696643431981 73.90226635805766 L 339.1696643431981 41.95213317902881 C 339.1696643431981 39.45213317902881 341.6696643431981 36.95213317902881 344.1696643431981 36.95213317902881 L 363.30080115795135 36.95213317902881 C 365.80080115795135 36.95213317902881 368.30080115795135 39.45213317902881 368.30080115795135 41.95213317902881 L 368.30080115795135 73.90226635805766 z " fill="rgba(248,249,250,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area " index="1" clip-path="url(#gridRectBarMaskklaub2faj)" pathTo="M 339.1696643431981 73.90226635805766 L 339.1696643431981 41.95213317902881 C 339.1696643431981 39.45213317902881 341.6696643431981 36.95213317902881 344.1696643431981 36.95213317902881 L 363.30080115795135 36.95213317902881 C 365.80080115795135 36.95213317902881 368.30080115795135 39.45213317902881 368.30080115795135 41.95213317902881 L 368.30080115795135 73.90226635805766 z " pathFrom="M 339.1696643431981 73.90226635805766 L 339.1696643431981 73.90226635805766 L 368.30080115795135 73.90226635805766 L 368.30080115795135 73.90226635805766 L 368.30080115795135 73.90226635805766 L 368.30080115795135 73.90226635805766 L 368.30080115795135 73.90226635805766 L 339.1696643431981 73.90226635805766 z" cy="36.951133179028815" cx="380.7855740785599" j="8" val="20" barHeight="36.95013317902884" barWidth="29.131136814753212"></path><path id="SvgjsPath1458" d="M 380.7855740785599 64.66473306330045 L 380.7855740785599 41.95213317902881 C 380.7855740785599 39.45213317902881 383.2855740785599 36.95213317902881 385.7855740785599 36.95213317902881 L 404.9167108933131 36.95213317902881 C 407.4167108933131 36.95213317902881 409.9167108933131 39.45213317902881 409.9167108933131 41.95213317902881 L 409.9167108933131 64.66473306330045 z " fill="rgba(248,249,250,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area " index="1" clip-path="url(#gridRectBarMaskklaub2faj)" pathTo="M 380.7855740785599 64.66473306330045 L 380.7855740785599 41.95213317902881 C 380.7855740785599 39.45213317902881 383.2855740785599 36.95213317902881 385.7855740785599 36.95213317902881 L 404.9167108933131 36.95213317902881 C 407.4167108933131 36.95213317902881 409.9167108933131 39.45213317902881 409.9167108933131 41.95213317902881 L 409.9167108933131 64.66473306330045 z " pathFrom="M 380.7855740785599 64.66473306330045 L 380.7855740785599 64.66473306330045 L 409.9167108933131 64.66473306330045 L 409.9167108933131 64.66473306330045 L 409.9167108933131 64.66473306330045 L 409.9167108933131 64.66473306330045 L 409.9167108933131 64.66473306330045 L 380.7855740785599 64.66473306330045 z" cy="36.951133179028815" cx="422.40148381392163" j="9" val="15" barHeight="27.712599884271626" barWidth="29.131136814753212"></path><path id="SvgjsPath1460" d="M 422.40148381392163 184.75266589514416 L 422.40148381392163 41.9521331790288 C 422.40148381392163 39.4521331790288 424.90148381392163 36.9521331790288 427.40148381392163 36.9521331790288 L 446.53262062867486 36.9521331790288 C 449.03262062867486 36.9521331790288 451.53262062867486 39.4521331790288 451.53262062867486 41.9521331790288 L 451.53262062867486 184.75266589514416 z " fill="rgba(248,249,250,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area " index="1" clip-path="url(#gridRectBarMaskklaub2faj)" pathTo="M 422.40148381392163 184.75266589514416 L 422.40148381392163 41.9521331790288 C 422.40148381392163 39.4521331790288 424.90148381392163 36.9521331790288 427.40148381392163 36.9521331790288 L 446.53262062867486 36.9521331790288 C 449.03262062867486 36.9521331790288 451.53262062867486 39.4521331790288 451.53262062867486 41.9521331790288 L 451.53262062867486 184.75266589514416 z " pathFrom="M 422.40148381392163 184.75266589514416 L 422.40148381392163 184.75266589514416 L 451.53262062867486 184.75266589514416 L 451.53262062867486 184.75266589514416 L 451.53262062867486 184.75266589514416 L 451.53262062867486 184.75266589514416 L 451.53262062867486 184.75266589514416 L 422.40148381392163 184.75266589514416 z" cy="36.9511331790288" cx="464.0173935492834" j="10" val="80" barHeight="147.80053271611536" barWidth="29.131136814753212"></path><path id="SvgjsPath1462" d="M 464.0173935492834 73.90226635805766 L 464.0173935492834 41.95213317902881 C 464.0173935492834 39.45213317902881 466.5173935492834 36.95213317902881 469.0173935492834 36.95213317902881 L 488.1485303640366 36.95213317902881 C 490.6485303640366 36.95213317902881 493.1485303640366 39.45213317902881 493.1485303640366 41.95213317902881 L 493.1485303640366 73.90226635805766 z " fill="rgba(248,249,250,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area " index="1" clip-path="url(#gridRectBarMaskklaub2faj)" pathTo="M 464.0173935492834 73.90226635805766 L 464.0173935492834 41.95213317902881 C 464.0173935492834 39.45213317902881 466.5173935492834 36.95213317902881 469.0173935492834 36.95213317902881 L 488.1485303640366 36.95213317902881 C 490.6485303640366 36.95213317902881 493.1485303640366 39.45213317902881 493.1485303640366 41.95213317902881 L 493.1485303640366 73.90226635805766 z " pathFrom="M 464.0173935492834 73.90226635805766 L 464.0173935492834 73.90226635805766 L 493.1485303640366 73.90226635805766 L 493.1485303640366 73.90226635805766 L 493.1485303640366 73.90226635805766 L 493.1485303640366 73.90226635805766 L 493.1485303640366 73.90226635805766 L 464.0173935492834 73.90226635805766 z" cy="36.951133179028815" cx="505.63330328464514" j="11" val="20" barHeight="36.95013317902884" barWidth="29.131136814753212"></path><g id="SvgjsG1438" class="apexcharts-bar-goals-markers"><g id="SvgjsG1439" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskklaub2faj)"></g><g id="SvgjsG1441" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskklaub2faj)"></g><g id="SvgjsG1443" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskklaub2faj)"></g><g id="SvgjsG1445" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskklaub2faj)"></g><g id="SvgjsG1447" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskklaub2faj)"></g><g id="SvgjsG1449" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskklaub2faj)"></g><g id="SvgjsG1451" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskklaub2faj)"></g><g id="SvgjsG1453" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskklaub2faj)"></g><g id="SvgjsG1455" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskklaub2faj)"></g><g id="SvgjsG1457" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskklaub2faj)"></g><g id="SvgjsG1459" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskklaub2faj)"></g><g id="SvgjsG1461" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskklaub2faj)"></g></g></g><g id="SvgjsG1410" class="apexcharts-datalabels" data:realIndex="0"></g><g id="SvgjsG1437" class="apexcharts-datalabels" data:realIndex="1"></g></g><line id="SvgjsLine1489" x1="0" y1="0" x2="499.3909168243408" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1490" x1="0" y1="0" x2="499.3909168243408" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1491" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1492" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"><text id="SvgjsText1494" font-family="Helvetica, Arial, sans-serif" x="20.807954867680866" y="249.700799074173" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#6b7280" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1495">Jan</tspan><title>Jan</title></text><text id="SvgjsText1497" font-family="Helvetica, Arial, sans-serif" x="62.4238646030426" y="249.700799074173" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#6b7280" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1498">Feb</tspan><title>Feb</title></text><text id="SvgjsText1500" font-family="Helvetica, Arial, sans-serif" x="104.03977433840434" y="249.700799074173" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#6b7280" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1501">Mar</tspan><title>Mar</title></text><text id="SvgjsText1503" font-family="Helvetica, Arial, sans-serif" x="145.65568407376605" y="249.700799074173" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#6b7280" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1504">Apr</tspan><title>Apr</title></text><text id="SvgjsText1506" font-family="Helvetica, Arial, sans-serif" x="187.27159380912778" y="249.700799074173" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#6b7280" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1507">May</tspan><title>May</title></text><text id="SvgjsText1509" font-family="Helvetica, Arial, sans-serif" x="228.8875035444895" y="249.700799074173" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#6b7280" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1510">Jun</tspan><title>Jun</title></text><text id="SvgjsText1512" font-family="Helvetica, Arial, sans-serif" x="270.50341327985126" y="249.700799074173" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#6b7280" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1513">Jul</tspan><title>Jul</title></text><text id="SvgjsText1515" font-family="Helvetica, Arial, sans-serif" x="312.119323015213" y="249.700799074173" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#6b7280" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1516">Aug</tspan><title>Aug</title></text><text id="SvgjsText1518" font-family="Helvetica, Arial, sans-serif" x="353.73523275057477" y="249.700799074173" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#6b7280" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1519">Sep</tspan><title>Sep</title></text><text id="SvgjsText1521" font-family="Helvetica, Arial, sans-serif" x="395.3511424859365" y="249.700799074173" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#6b7280" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1522">Oct</tspan><title>Oct</title></text><text id="SvgjsText1524" font-family="Helvetica, Arial, sans-serif" x="436.9670522212983" y="249.700799074173" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#6b7280" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1525">Nov</tspan><title>Nov</title></text><text id="SvgjsText1527" font-family="Helvetica, Arial, sans-serif" x="478.58296195666003" y="249.700799074173" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#6b7280" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1528">Dec</tspan><title>Dec</title></text></g></g><g id="SvgjsG1553" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1554" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1555" class="apexcharts-point-annotations"></g></g></svg><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group apexcharts-tooltip-series-group-0" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(255, 111, 40);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group apexcharts-tooltip-series-group-1" style="order: 2;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(248, 249, 250);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
							</div>
						</div>
					</div>
					<!-- /Sales Overview -->
					
					<!-- Invoices -->
					<div class="col-xl-5 d-flex">
						<div class="card flex-fill">
							<div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
								<h5 class="mb-2">Invoices</h5>
								<div class="d-flex align-items-center">
									<div class="dropdown mb-2">
										<a href="javascript:void(0);" class="dropdown-toggle btn btn-white btn-sm d-inline-flex align-items-center fs-13 me-2 border-0" data-bs-toggle="dropdown">
											Invoices
										</a>
										<ul class="dropdown-menu  dropdown-menu-end p-3">
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">Invoices</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">Paid</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">Unpaid</a>
											</li>
										</ul>
									</div>
									<div class="dropdown mb-2">
										<a href="javascript:void(0);" class="btn btn-white border btn-sm d-inline-flex align-items-center" data-bs-toggle="dropdown">
											<i class="ti ti-calendar me-1"></i>This Week
										</a>
										<ul class="dropdown-menu  dropdown-menu-end p-3">
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">This Month</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">This Week</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">Today</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="card-body pt-2">
								<div class="table-responsive pt-1">	
									<table class="table table-nowrap table-borderless mb-0">
										<tbody>
											<tr>
												<td class="px-0">
													<div class="d-flex align-items-center">
														<a href="invoice-details.html" class="avatar">
															<img src="assets/img/users/user-39.jpg" class="img-fluid rounded-circle" alt="img">
														</a>
														<div class="ms-2">
															<h6 class="fw-medium"><a href="invoice-details.html">Redesign Website</a></h6>
															<span class="fs-13 d-inline-flex align-items-center">#INVOO2<i class="ti ti-circle-filled fs-4 mx-1 text-primary"></i>Logistics</span>
														</div>
													</div>
												</td>
												<td>
													<p class="fs-13 mb-1">Payment</p>
													<h6 class="fw-medium">$3560</h6>
												</td>
												<td class="px-0 text-end">
													<span class="badge badge-danger-transparent badge-xs d-inline-flex align-items-center"><i class="ti ti-circle-filled fs-5 me-1"></i>Unpaid</span>
												</td>
											</tr>
											<tr>
												<td class="px-0">
													<div class="d-flex align-items-center">
														<a href="invoice-details.html" class="avatar">
															<img src="assets/img/users/user-40.jpg" class="img-fluid rounded-circle" alt="img">
														</a>
														<div class="ms-2">
															<h6 class="fw-medium"><a href="invoice-details.html">Module Completion</a></h6>
															<span class="fs-13 d-inline-flex align-items-center">#INVOO5<i class="ti ti-circle-filled fs-4 mx-1 text-primary"></i>Yip Corp</span>
														</div>
													</div>
												</td>
												<td>
													<p class="fs-13 mb-1">Payment</p>
													<h6 class="fw-medium">$4175</h6>
												</td>
												<td class="px-0 text-end">
													<span class="badge badge-danger-transparent badge-xs d-inline-flex align-items-center"><i class="ti ti-circle-filled fs-5 me-1"></i>Unpaid</span>
												</td>
											</tr>
											<tr>
												<td class="px-0">
													<div class="d-flex align-items-center">
														<a href="invoice-details.html" class="avatar">
															<img src="assets/img/users/user-55.jpg" class="img-fluid rounded-circle" alt="img">
														</a>
														<div class="ms-2">
															<h6 class="fw-medium"><a href="invoice-details.html">Change on Emp Module</a></h6>
															<span class="fs-13 d-inline-flex align-items-center">#INVOO3<i class="ti ti-circle-filled fs-4 mx-1 text-primary"></i>Ignis LLP</span>
														</div>
													</div>
												</td>
												<td>
													<p class="fs-13 mb-1">Payment</p>
													<h6 class="fw-medium">$6985</h6>
												</td>
												<td class="px-0 text-end">
													<span class="badge badge-danger-transparent badge-xs d-inline-flex align-items-center"><i class="ti ti-circle-filled fs-5 me-1"></i>Unpaid</span>
												</td>
											</tr>
											<tr>
												<td class="px-0">
													<div class="d-flex align-items-center">
														<a href="invoice-details.html" class="avatar">
															<img src="assets/img/users/user-42.jpg" class="img-fluid rounded-circle" alt="img">
														</a>
														<div class="ms-2">
															<h6 class="fw-medium"><a href="invoice-details.html">Changes on the Board</a></h6>
															<span class="fs-13 d-inline-flex align-items-center">#INVOO2<i class="ti ti-circle-filled fs-4 mx-1 text-primary"></i>Ignis LLP</span>
														</div>
													</div>
												</td>
												<td>
													<p class="fs-13 mb-1">Payment</p>
													<h6 class="fw-medium">$1457</h6>
												</td>
												<td class="px-0 text-end">
													<span class="badge badge-danger-transparent badge-xs d-inline-flex align-items-center"><i class="ti ti-circle-filled fs-5 me-1"></i>Unpaid</span>
												</td>
											</tr>
											<tr>
												<td class="px-0">
													<div class="d-flex align-items-center">
														<a href="invoice-details.html" class="avatar">
															<img src="assets/img/users/user-44.jpg" class="img-fluid rounded-circle" alt="img">
														</a>
														<div class="ms-2">
															<h6 class="fw-medium"><a href="invoice-details.html">Hospital Management</a></h6>
															<span class="fs-13 d-inline-flex align-items-center">#INVOO6<i class="ti ti-circle-filled fs-4 mx-1 text-primary"></i>HCL Corp</span>
														</div>
													</div>
												</td>
												<td>
													<p class="fs-13 mb-1">Payment</p>
													<h6 class="fw-medium">$6458</h6>
												</td>
												<td class="px-0 text-end">
													<span class="badge badge-success-transparent badge-xs d-inline-flex align-items-center"><i class="ti ti-circle-filled fs-5 me-1"></i>Paid</span>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								<a href="invoice.html" class="btn btn-light btn-md w-100 mt-2">View All</a>
							</div>
						</div>
					</div>
					<!-- /Invoices -->

				</div>

				<div class="row">
					
					<!-- Projects -->
					<div class="col-xxl-8 col-xl-7 d-flex">
						<div class="card flex-fill">
							<div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
								<h5 class="mb-2">Projects</h5>
								<div class="d-flex align-items-center">
									<div class="dropdown mb-2">
										<a href="javascript:void(0);" class="btn btn-white border btn-sm d-inline-flex align-items-center" data-bs-toggle="dropdown">
											<i class="ti ti-calendar me-1"></i>This Week
										</a>
										<ul class="dropdown-menu  dropdown-menu-end p-3">
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">This Month</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">This Week</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">Today</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="card-body p-0">
								<div class="table-responsive">	
									<table class="table table-nowrap mb-0">
										<thead>
											<tr>
												<th>ID</th>
												<th>Name</th>
												<th>Team</th>
												<th>Hours</th>
												<th>Deadline</th>
												<th>Priority</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><a href="project-details.html" class="link-default">PRO-001</a></td>
												<td><h6 class="fw-medium"><a href="project-details.html">Office Management App</a></h6></td>
												<td>
													<div class="avatar-list-stacked avatar-group-sm">
														<span class="avatar avatar-rounded">
															<img class="border border-white" src="assets/img/profiles/avatar-02.jpg" alt="img">
														</span>
														<span class="avatar avatar-rounded">
															<img class="border border-white" src="assets/img/profiles/avatar-03.jpg" alt="img">
														</span>
														<span class="avatar avatar-rounded">
															<img class="border border-white" src="assets/img/profiles/avatar-05.jpg" alt="img">
														</span>
													</div>
												</td>
												<td>
													<p class="mb-1">15/255 Hrs</p>
													<div class="progress progress-xs w-100" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
														<div class="progress-bar bg-primary" style="width: 40%"></div>
													</div>
												</td>
												<td>12 Sep 2024</td>
												<td>
													<span class="badge badge-danger d-inline-flex align-items-center badge-xs">
														<i class="ti ti-point-filled me-1"></i>High
													</span>
												</td>
											</tr>
											<tr>
												<td><a href="project-details.html" class="link-default">PRO-002</a></td>
												<td><h6 class="fw-medium"><a href="project-details.html">Clinic Management </a></h6></td>
												<td>
													<div class="avatar-list-stacked avatar-group-sm">
														<span class="avatar avatar-rounded">
															<img class="border border-white" src="assets/img/profiles/avatar-06.jpg" alt="img">
														</span>
														<span class="avatar avatar-rounded">
															<img class="border border-white" src="assets/img/profiles/avatar-07.jpg" alt="img">
														</span>
														<span class="avatar avatar-rounded">
															<img class="border border-white" src="assets/img/profiles/avatar-08.jpg" alt="img">
														</span>
														<a class="avatar bg-primary avatar-rounded text-fixed-white fs-10 fw-medium" href="javascript:void(0);">
															+1
														</a>
													</div>
												</td>
												<td>
													<p class="mb-1">15/255 Hrs</p>
													<div class="progress progress-xs w-100" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
														<div class="progress-bar bg-primary" style="width: 40%"></div>
													</div>
												</td>
												<td>24 Oct 2024</td>
												<td>
													<span class="badge badge-success d-inline-flex align-items-center badge-xs">
														<i class="ti ti-point-filled me-1"></i>Low
													</span>
												</td>
											</tr>
											<tr>
												<td><a href="project-details.html" class="link-default">PRO-003</a></td>
												<td><h6 class="fw-medium"><a href="project-details.html">Educational Platform</a></h6></td>
												<td>
													<div class="avatar-list-stacked avatar-group-sm">
														<span class="avatar avatar-rounded">
															<img class="border border-white" src="assets/img/profiles/avatar-06.jpg" alt="img">
														</span>
														<span class="avatar avatar-rounded">
															<img class="border border-white" src="assets/img/profiles/avatar-08.jpg" alt="img">
														</span>
														<span class="avatar avatar-rounded">
															<img class="border border-white" src="assets/img/profiles/avatar-09.jpg" alt="img">
														</span>
													</div>
												</td>
												<td>
													<p class="mb-1">40/255 Hrs</p>
													<div class="progress progress-xs w-100" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
														<div class="progress-bar bg-primary" style="width: 50%"></div>
													</div>
												</td>
												<td>18 Feb 2024</td>
												<td>
													<span class="badge badge-pink d-inline-flex align-items-center badge-xs">
														<i class="ti ti-point-filled me-1"></i>Medium
													</span>
												</td>
											</tr>
											<tr>
												<td><a href="project-details.html" class="link-default">PRO-004</a></td>
												<td><h6 class="fw-medium"><a href="project-details.html">Chat &amp; Call Mobile App</a></h6></td>
												<td>
													<div class="avatar-list-stacked avatar-group-sm">
														<span class="avatar avatar-rounded">
															<img class="border border-white" src="assets/img/profiles/avatar-11.jpg" alt="img">
														</span>
														<span class="avatar avatar-rounded">
															<img class="border border-white" src="assets/img/profiles/avatar-12.jpg" alt="img">
														</span>
														<span class="avatar avatar-rounded">
															<img class="border border-white" src="assets/img/profiles/avatar-13.jpg" alt="img">
														</span>
													</div>
												</td>
												<td>
													<p class="mb-1">35/155 Hrs</p>
													<div class="progress progress-xs w-100" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
														<div class="progress-bar bg-primary" style="width: 50%"></div>
													</div>
												</td>
												<td>19 Feb 2024</td>
												<td>
													<span class="badge badge-danger d-inline-flex align-items-center badge-xs">
														<i class="ti ti-point-filled me-1"></i>High
													</span>
												</td>
											</tr>
											<tr>
												<td><a href="project-details.html" class="link-default">PRO-005</a></td>
												<td><h6 class="fw-medium"><a href="project-details.html">Travel Planning Website</a></h6></td>
												<td>
													<div class="avatar-list-stacked avatar-group-sm">
														<span class="avatar avatar-rounded">
															<img class="border border-white" src="assets/img/profiles/avatar-17.jpg" alt="img">
														</span>
														<span class="avatar avatar-rounded">
															<img class="border border-white" src="assets/img/profiles/avatar-18.jpg" alt="img">
														</span>
														<span class="avatar avatar-rounded">
															<img class="border border-white" src="assets/img/profiles/avatar-19.jpg" alt="img">
														</span>
													</div>
												</td>
												<td>
													<p class="mb-1">50/235 Hrs</p>
													<div class="progress progress-xs w-100" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
														<div class="progress-bar bg-primary" style="width: 50%"></div>
													</div>
												</td>
												<td>18 Feb 2024</td>
												<td>
													<span class="badge badge-pink d-inline-flex align-items-center badge-xs">
														<i class="ti ti-point-filled me-1"></i>Medium
													</span>
												</td>
											</tr>
											<tr>
												<td><a href="project-details.html" class="link-default">PRO-006</a></td>
												<td><h6 class="fw-medium"><a href="project-details.html">Service Booking Software</a></h6></td>
												<td>
													<div class="avatar-list-stacked avatar-group-sm">
														<span class="avatar avatar-rounded">
															<img class="border border-white" src="assets/img/profiles/avatar-06.jpg" alt="img">
														</span>
														<span class="avatar avatar-rounded">
															<img class="border border-white" src="assets/img/profiles/avatar-08.jpg" alt="img">
														</span>
														<span class="avatar avatar-rounded">
															<img class="border border-white" src="assets/img/profiles/avatar-09.jpg" alt="img">
														</span>
													</div>
												</td>
												<td>
													<p class="mb-1">40/255 Hrs</p>
													<div class="progress progress-xs w-100" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
														<div class="progress-bar bg-primary" style="width: 50%"></div>
													</div>
												</td>
												<td>20 Feb 2024</td>
												<td>
													<span class="badge badge-success d-inline-flex align-items-center badge-xs">
														<i class="ti ti-point-filled me-1"></i>Low
													</span>
												</td>
											</tr>
											<tr>
												<td class="border-0"><a href="project-details.html" class="link-default">PRO-008</a></td>
												<td class="border-0"><h6 class="fw-medium"><a href="project-details.html">Travel Planning Website</a></h6></td>
												<td class="border-0">
													<div class="avatar-list-stacked avatar-group-sm">
														<span class="avatar avatar-rounded">
															<img class="border border-white" src="assets/img/profiles/avatar-15.jpg" alt="img">
														</span>
														<span class="avatar avatar-rounded">
															<img class="border border-white" src="assets/img/profiles/avatar-16.jpg" alt="img">
														</span>
														<span class="avatar avatar-rounded">
															<img class="border border-white" src="assets/img/profiles/avatar-17.jpg" alt="img">
														</span>
														<a class="avatar bg-primary avatar-rounded text-fixed-white fs-10 fw-medium" href="javascript:void(0);">
															+2
														</a>
													</div>
												</td>
												<td class="border-0">
													<p class="mb-1">15/255 Hrs</p>
													<div class="progress progress-xs w-100" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">
														<div class="progress-bar bg-primary" style="width: 45%"></div>
													</div>
												</td>
												<td class="border-0">17 Oct 2024</td>
												<td class="border-0">
													<span class="badge badge-pink d-inline-flex align-items-center badge-xs">
														<i class="ti ti-point-filled me-1"></i>Medium
													</span>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!-- /Projects -->

					<!-- Tasks Statistics -->
					<div class="col-xxl-4 col-xl-5 d-flex">
						<div class="card flex-fill">
							<div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
								<h5 class="mb-2">Tasks Statistics</h5>
								<div class="d-flex align-items-center">
									<div class="dropdown mb-2">
										<a href="javascript:void(0);" class="btn btn-white border btn-sm d-inline-flex align-items-center" data-bs-toggle="dropdown">
											<i class="ti ti-calendar me-1"></i>This Week
										</a>
										<ul class="dropdown-menu  dropdown-menu-end p-3">
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">This Month</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">This Week</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">Today</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="chartjs-wrapper-demo position-relative mb-4">
									<canvas id="mySemiDonutChart" height="237" width="468" style="display: block; box-sizing: border-box; height: 190px; width: 374px;"></canvas>
									<div class="position-absolute text-center attendance-canvas">
										<p class="fs-13 mb-1">Total Tasks</p>
										<h3>124/165</h3>
									</div>
								</div>
								<div class="d-flex align-items-center flex-wrap">
									<div class="border-end text-center me-2 pe-2 mb-3">
										<p class="fs-13 d-inline-flex align-items-center mb-1"><i class="ti ti-circle-filled fs-10 me-1 text-warning"></i>Ongoing</p>
										<h5>24%</h5>
									</div>
									<div class="border-end text-center me-2 pe-2 mb-3">
										<p class="fs-13 d-inline-flex align-items-center mb-1"><i class="ti ti-circle-filled fs-10 me-1 text-info"></i>On Hold </p>
										<h5>10%</h5>
									</div>
									<div class="border-end text-center me-2 pe-2 mb-3">
										<p class="fs-13 d-inline-flex align-items-center mb-1"><i class="ti ti-circle-filled fs-10 me-1 text-danger"></i>Overdue</p>
										<h5>16%</h5>
									</div>
									<div class="text-center me-2 pe-2 mb-3">
										<p class="fs-13 d-inline-flex align-items-center mb-1"><i class="ti ti-circle-filled fs-10 me-1 text-success"></i>Ongoing</p>
										<h5>40%</h5>
									</div>
								</div>
								<div class="bg-dark br-5 p-3 pb-0 d-flex align-items-center justify-content-between">
									<div class="mb-2">
										<h4 class="text-success">389/689 hrs</h4>
										<p class="fs-13 mb-0">Spent on Overall Tasks This Week</p>
									</div>
									<a href="tasks.html" class="btn btn-sm btn-light mb-2 text-nowrap">View All</a>
								</div>
							</div>
						</div>
					</div>
					<!-- /Tasks Statistics -->

				</div>

				<div class="row">

					<!-- Schedules -->
					<div class="col-xxl-4 d-flex">
						<div class="card flex-fill">
							<div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
								<h5 class="mb-2">Schedules</h5>
								<a href="candidates.html" class="btn btn-light btn-md mb-2">View All</a>
							</div>
							<div class="card-body">
								<div class="bg-light p-3 br-5 mb-4">
									<span class="badge badge-secondary badge-xs mb-1">UI/ UX Designer</span>
									<h6 class="mb-2 text-truncate">Interview Candidates - UI/UX Designer</h6>
									<div class="d-flex align-items-center flex-wrap">
										<p class="fs-13 mb-1 me-2"><i class="ti ti-calendar-event me-2"></i>Thu, 15 Feb 2025</p>
										<p class="fs-13 mb-1"><i class="ti ti-clock-hour-11 me-2"></i>01:00 PM - 02:20 PM</p>
									</div>
									<div class="d-flex align-items-center justify-content-between border-top mt-2 pt-3">
										<div class="avatar-list-stacked avatar-group-sm">
											<span class="avatar avatar-rounded">
												<img class="border border-white" src="assets/img/users/user-49.jpg" alt="img">
											</span>
											<span class="avatar avatar-rounded">
												<img class="border border-white" src="assets/img/users/user-13.jpg" alt="img">
											</span>
											<span class="avatar avatar-rounded">
												<img class="border border-white" src="assets/img/users/user-11.jpg" alt="img">
											</span>
											<span class="avatar avatar-rounded">
												<img class="border border-white" src="assets/img/users/user-22.jpg" alt="img">
											</span>
											<span class="avatar avatar-rounded">
												<img class="border border-white" src="assets/img/users/user-58.jpg" alt="img">
											</span>
											<a class="avatar bg-primary avatar-rounded text-fixed-white fs-10 fw-medium" href="javascript:void(0);">
												+3
											</a>
										</div>
										<a href="#" class="btn btn-primary btn-xs">Join Meeting</a>
									</div>
								</div>
								<div class="bg-light p-3 br-5 mb-0">
									<span class="badge badge-dark badge-xs mb-1">IOS Developer</span>
									<h6 class="mb-2 text-truncate">Interview Candidates - IOS Developer</h6>
									<div class="d-flex align-items-center flex-wrap">
										<p class="fs-13 mb-1 me-2"><i class="ti ti-calendar-event me-2"></i>Thu, 15 Feb 2025</p>
										<p class="fs-13 mb-1"><i class="ti ti-clock-hour-11 me-2"></i>02:00 PM - 04:20 PM</p>
									</div>
									<div class="d-flex align-items-center justify-content-between border-top mt-2 pt-3">
										<div class="avatar-list-stacked avatar-group-sm">
											<span class="avatar avatar-rounded">
												<img class="border border-white" src="assets/img/users/user-49.jpg" alt="img">
											</span>
											<span class="avatar avatar-rounded">
												<img class="border border-white" src="assets/img/users/user-13.jpg" alt="img">
											</span>
											<span class="avatar avatar-rounded">
												<img class="border border-white" src="assets/img/users/user-11.jpg" alt="img">
											</span>
											<span class="avatar avatar-rounded">
												<img class="border border-white" src="assets/img/users/user-22.jpg" alt="img">
											</span>
											<span class="avatar avatar-rounded">
												<img class="border border-white" src="assets/img/users/user-58.jpg" alt="img">
											</span>
											<a class="avatar bg-primary avatar-rounded text-fixed-white fs-10 fw-medium" href="javascript:void(0);">
												+3
											</a>
										</div>
										<a href="#" class="btn btn-primary btn-xs">Join Meeting</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Schedules -->

					<!-- Recent Activities -->
					<div class="col-xxl-4 col-xl-6 d-flex">
						<div class="card flex-fill">
							<div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
								<h5 class="mb-2">Recent Activities</h5>
								<a href="activity.html" class="btn btn-light btn-md mb-2">View All</a>
							</div>
							<div class="card-body">
								<div class="recent-item">
									<div class="d-flex justify-content-between">
										<div class="d-flex align-items-center w-100">
											<a href="javscript:void(0);" class="avatar  flex-shrink-0">
												<img src="assets/img/users/user-38.jpg" class="rounded-circle" alt="img">
											</a>
											<div class="ms-2 flex-fill">
												<div class="d-flex align-items-center justify-content-between">
													<h6 class="fs-medium text-truncate"><a href="javscript:void(0);">Matt Morgan</a></h6>
													<p class="fs-13">05:30 PM</p>
												</div>
												<p class="fs-13">Added New Project <span class="text-primary">HRMS Dashboard</span></p>
											</div>
										</div>
									</div>
								</div>
								<div class="recent-item">
									<div class="d-flex justify-content-between">
										<div class="d-flex align-items-center w-100">
											<a href="javscript:void(0);" class="avatar  flex-shrink-0">
												<img src="assets/img/users/user-01.jpg" class="rounded-circle" alt="img">
											</a>
											<div class="ms-2 flex-fill">
												<div class="d-flex align-items-center justify-content-between">
													<h6 class="fs-medium text-truncate"><a href="javscript:void(0);">Jay Ze</a></h6>
													<p class="fs-13">05:00 PM</p>
												</div>
												<p class="fs-13">Commented on Uploaded Document</p>
											</div>
										</div>
									</div>
								</div>
								<div class="recent-item">
									<div class="d-flex justify-content-between">
										<div class="d-flex align-items-center w-100">
											<a href="javscript:void(0);" class="avatar  flex-shrink-0">
												<img src="assets/img/users/user-19.jpg" class="rounded-circle" alt="img">
											</a>
											<div class="ms-2 flex-fill">
												<div class="d-flex align-items-center justify-content-between">
													<h6 class="fs-medium text-truncate"><a href="javscript:void(0);">Mary Donald</a></h6>
													<p class="fs-13">05:30 PM</p>
												</div>
												<p class="fs-13">Approved Task Projects</p>
											</div>
										</div>
									</div>
								</div>
								<div class="recent-item">
									<div class="d-flex justify-content-between">
										<div class="d-flex align-items-center w-100">
											<a href="javscript:void(0);" class="avatar  flex-shrink-0">
												<img src="assets/img/users/user-11.jpg" class="rounded-circle" alt="img">
											</a>
											<div class="ms-2 flex-fill">
												<div class="d-flex align-items-center justify-content-between">
													<h6 class="fs-medium text-truncate"><a href="javscript:void(0);">George David</a></h6>
													<p class="fs-13">06:00 PM</p>
												</div>
												<p class="fs-13">Requesting Access to Module Tickets</p>
											</div>
										</div>
									</div>
								</div>
								<div class="recent-item">
									<div class="d-flex justify-content-between">
										<div class="d-flex align-items-center w-100">
											<a href="javscript:void(0);" class="avatar  flex-shrink-0">
												<img src="assets/img/users/user-20.jpg" class="rounded-circle" alt="img">
											</a>
											<div class="ms-2 flex-fill">
												<div class="d-flex align-items-center justify-content-between">
													<h6 class="fs-medium text-truncate"><a href="javscript:void(0);">Aaron Zeen</a></h6>
													<p class="fs-13">06:30 PM</p>
												</div>
												<p class="fs-13">Downloaded App Reportss</p>
											</div>
										</div>
									</div>
								</div>
								<div class="recent-item">
									<div class="d-flex justify-content-between">
										<div class="d-flex align-items-center w-100">
											<a href="javscript:void(0);" class="avatar  flex-shrink-0">
												<img src="assets/img/users/user-08.jpg" class="rounded-circle" alt="img">
											</a>
											<div class="ms-2 flex-fill">
												<div class="d-flex align-items-center justify-content-between">
													<h6 class="fs-medium text-truncate"><a href="javscript:void(0);">Hendry Daniel</a></h6>
													<p class="fs-13">05:30 PM</p>
												</div>
												<p class="fs-13">Completed New Project <span>HMS</span></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Recent Activities -->

					<!-- Birthdays -->
					<div class="col-xxl-4 col-xl-6 d-flex">
						<div class="card flex-fill">
							<div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
								<h5 class="mb-2">Birthdays</h5>
								<a href="javascript:void(0);" class="btn btn-light btn-md mb-2">View All</a>
							</div>
							<div class="card-body pb-1">
								<h6 class="mb-2">Today</h6>
								<div class="bg-light p-2 border border-dashed rounded-top mb-3">
									<div class="d-flex align-items-center justify-content-between">
										<div class="d-flex align-items-center">
											<a href="javascript:void(0);" class="avatar">
												<img src="assets/img/users/user-38.jpg" class="rounded-circle" alt="img">
											</a>
											<div class="ms-2 overflow-hidden">
												<h6 class="fs-medium ">Andrew Jermia</h6>
												<p class="fs-13">IOS Developer</p>
											</div>
										</div>
										<a href="javascript:void(0);" class="btn btn-secondary btn-xs"><i class="ti ti-cake me-1"></i>Send</a>
									</div>
								</div>
								<h6 class="mb-2">Tomorow</h6>
								<div class="bg-light p-2 border border-dashed rounded-top mb-3">
									<div class="d-flex align-items-center justify-content-between">
										<div class="d-flex align-items-center">
											<a href="javascript:void(0);" class="avatar">
												<img src="assets/img/users/user-10.jpg" class="rounded-circle" alt="img">
											</a>
											<div class="ms-2 overflow-hidden">
												<h6 class="fs-medium"><a href="javascript:void(0);">Mary Zeen</a></h6>
												<p class="fs-13">UI/UX Designer</p>
											</div>
										</div>
										<a href="javascript:void(0);" class="btn btn-secondary btn-xs"><i class="ti ti-cake me-1"></i>Send</a>
									</div>
								</div>
								<div class="bg-light p-2 border border-dashed rounded-top mb-3">
									<div class="d-flex align-items-center justify-content-between">
										<div class="d-flex align-items-center">
											<a href="javascript:void(0);" class="avatar">
												<img src="assets/img/users/user-09.jpg" class="rounded-circle" alt="img">
											</a>
											<div class="ms-2 overflow-hidden">
												<h6 class="fs-medium "><a href="javascript:void(0);">Antony Lewis</a></h6>
												<p class="fs-13">Android Developer</p>
											</div>
										</div>
										<a href="javascript:void(0);" class="btn btn-secondary btn-xs"><i class="ti ti-cake me-1"></i>Send</a>
									</div>
								</div>
								<h6 class="mb-2">25 Jan 2025</h6>
								<div class="bg-light p-2 border border-dashed rounded-top mb-3">
									<div class="d-flex align-items-center justify-content-between">
										<div class="d-flex align-items-center">
											<span class="avatar">
												<img src="assets/img/users/user-12.jpg" class="rounded-circle" alt="img">
											</span>
											<div class="ms-2 overflow-hidden">
												<h6 class="fs-medium ">Doglas Martini</h6>
												<p class="fs-13">.Net Developer</p>
											</div>
										</div>
										<a href="javascript:void(0);" class="btn btn-secondary btn-xs"><i class="ti ti-cake me-1"></i>Send</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Birthdays -->

				</div>

			</div>

			<div class="footer d-sm-flex align-items-center justify-content-between border-top bg-white p-3">
				<p class="mb-0">2014 - 2025 © SmartHR.</p>
				<p>Designed &amp; Developed By <a href="javascript:void(0);" class="text-primary">Dreams</a></p>
			</div>

		</div>
		<!-- /Page Wrapper -->

		<!-- Add Todo -->
		<div class="modal fade" id="add_todo">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Add New Todo</h4>
						<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
							<i class="ti ti-x"></i>
						</button>
					</div>
					<form action="https://smarthr.dreamstechnologies.com/html/template/index.html">
						<div class="modal-body">
							<div class="row">
								<div class="col-12">
									<div class="mb-3">
										<label class="form-label">Todo Title</label>
										<input type="text" class="form-control">
									</div>
								</div>
								<div class="col-6">
									<div class="mb-3">
										<label class="form-label">Tag</label>
										<select class="select select2-hidden-accessible" data-select2-id="select2-data-1-2g0b" tabindex="-1" aria-hidden="true">
											<option data-select2-id="select2-data-3-13pj">Select</option>
											<option>Internal</option>
											<option>Projects</option>
											<option>Meetings</option>
											<option>Reminder</option> 	 
										</select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-2-jj6p" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-99h0-container" aria-controls="select2-99h0-container"><span class="select2-selection__rendered" id="select2-99h0-container" role="textbox" aria-readonly="true" title="Select">Select</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
									</div>
								</div>
								<div class="col-6">
									<div class="mb-3">
										<label class="form-label">Priority</label>
										<select class="select select2-hidden-accessible" data-select2-id="select2-data-4-rxqy" tabindex="-1" aria-hidden="true">
											<option data-select2-id="select2-data-6-w4jn">Select</option>
											<option>Medium</option>
											<option>High</option>
											<option>Low</option>
										</select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-5-7u6b" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-6prt-container" aria-controls="select2-6prt-container"><span class="select2-selection__rendered" id="select2-6prt-container" role="textbox" aria-readonly="true" title="Select">Select</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="mb-3">
										<label class="form-label">Descriptions</label>
										<div class="summernote" style="display: none;"></div><div class="note-editor note-frame"><div class="note-dropzone"><div class="note-dropzone-message"></div></div><div class="note-toolbar" role="toolbar"><div class="note-btn-group note-fontsize"><div class="note-btn-group"><button type="button" class="note-btn dropdown-toggle" tabindex="-1" data-toggle="dropdown" aria-label="Font Size"><span class="note-current-fontsize">14</span> <span class="note-icon-caret"></span></button><div class="note-dropdown-menu note-check dropdown-fontsize" role="list" aria-label="Font Size"><a class="note-dropdown-item" href="#" data-value="8" role="listitem" aria-label="8"><i class="note-icon-menu-check"></i> 8</a><a class="note-dropdown-item" href="#" data-value="9" role="listitem" aria-label="9"><i class="note-icon-menu-check"></i> 9</a><a class="note-dropdown-item" href="#" data-value="10" role="listitem" aria-label="10"><i class="note-icon-menu-check"></i> 10</a><a class="note-dropdown-item" href="#" data-value="11" role="listitem" aria-label="11"><i class="note-icon-menu-check"></i> 11</a><a class="note-dropdown-item" href="#" data-value="12" role="listitem" aria-label="12"><i class="note-icon-menu-check"></i> 12</a><a class="note-dropdown-item checked" href="#" data-value="14" role="listitem" aria-label="14"><i class="note-icon-menu-check"></i> 14</a><a class="note-dropdown-item" href="#" data-value="18" role="listitem" aria-label="18"><i class="note-icon-menu-check"></i> 18</a><a class="note-dropdown-item" href="#" data-value="24" role="listitem" aria-label="24"><i class="note-icon-menu-check"></i> 24</a><a class="note-dropdown-item" href="#" data-value="36" role="listitem" aria-label="36"><i class="note-icon-menu-check"></i> 36</a></div></div></div><div class="note-btn-group note-font"><button type="button" class="note-btn note-btn-bold" tabindex="-1" aria-label="Bold (CTRL+B)"><i class="note-icon-bold"></i></button><button type="button" class="note-btn note-btn-italic" tabindex="-1" aria-label="Italic (CTRL+I)"><i class="note-icon-italic"></i></button><button type="button" class="note-btn note-btn-underline" tabindex="-1" aria-label="Underline (CTRL+U)"><i class="note-icon-underline"></i></button><button type="button" class="note-btn" tabindex="-1" aria-label="Remove Font Style (CTRL+\)"><i class="note-icon-eraser"></i></button><button type="button" class="note-btn note-btn-strikethrough" tabindex="-1" aria-label="Strikethrough (CTRL+SHIFT+S)"><i class="note-icon-strikethrough"></i></button></div><div class="note-btn-group note-insert"><button type="button" class="note-btn" tabindex="-1" aria-label="Picture"><i class="note-icon-picture"></i></button></div></div><div class="note-editing-area"><div class="note-handle"><div class="note-control-selection"><div class="note-control-selection-bg"></div><div class="note-control-holder note-control-nw"></div><div class="note-control-holder note-control-ne"></div><div class="note-control-holder note-control-sw"></div><div class="note-control-sizing note-control-se"></div><div class="note-control-selection-info"></div></div></div><textarea class="note-codable" aria-multiline="true"></textarea><div class="note-editable" contenteditable="true" role="textbox" aria-multiline="true" spellcheck="true" autocorrect="true" style="height: 100px;"><p><br></p></div></div><output class="note-status-output" role="status" aria-live="polite"></output><div class="note-statusbar" role="status"><div class="note-resizebar" aria-label="resize"><div class="note-icon-bar"></div><div class="note-icon-bar"></div><div class="note-icon-bar"></div></div></div><div class="note-modal link-dialog" aria-hidden="false" tabindex="-1" role="dialog" aria-label="Insert Link"><div class="note-modal-content"><div class="note-modal-header"><button type="button" class="close" aria-label="Close" aria-hidden="true"><i class="note-icon-close"></i></button><h4 class="note-modal-title">Insert Link</h4></div><div class="note-modal-body"><div class="form-group note-form-group"><label for="note-dialog-link-txt-17349067661101" class="note-form-label">Text to display</label><input id="note-dialog-link-txt-17349067661101" class="note-link-text form-control note-form-control note-input" type="text"></div><div class="form-group note-form-group"><label for="note-dialog-link-url-17349067661101" class="note-form-label">To what URL should this link go?</label><input id="note-dialog-link-url-17349067661101" class="note-link-url form-control note-form-control note-input" type="text" value="http://"></div><div class="checkbox sn-checkbox-open-in-new-window"><label><input role="checkbox" type="checkbox" checked="" aria-checked="true">Open in new window</label></div><div class="checkbox sn-checkbox-use-protocol"><label><input role="checkbox" type="checkbox" checked="" aria-checked="true">Use default protocol</label></div></div><div class="note-modal-footer"><input type="button" href="#" class="btn btn-primary note-btn note-btn-primary note-link-btn" value="Insert Link" disabled=""></div></div></div><div class="note-popover bottom note-link-popover" style="display: none;"><div class="note-popover-arrow"></div><div class="popover-content note-children-container"><span><a target="_blank"></a>&nbsp;</span><div class="note-btn-group note-link"><button type="button" class="note-btn" tabindex="-1" aria-label="Edit"><i class="note-icon-link"></i></button><button type="button" class="note-btn" tabindex="-1" aria-label="Unlink"><i class="note-icon-chain-broken"></i></button></div></div></div><div class="note-modal" aria-hidden="false" tabindex="-1" role="dialog" aria-label="Insert Image"><div class="note-modal-content"><div class="note-modal-header"><button type="button" class="close" aria-label="Close" aria-hidden="true"><i class="note-icon-close"></i></button><h4 class="note-modal-title">Insert Image</h4></div><div class="note-modal-body"><div class="form-group note-form-group note-group-select-from-files"><label for="note-dialog-image-file-17349067661101" class="note-form-label">Select from files</label><input id="note-dialog-image-file-17349067661101" class="note-image-input form-control-file note-form-control note-input" type="file" name="files" accept="image/*" multiple="multiple"></div><div class="form-group note-group-image-url"><label for="note-dialog-image-url-17349067661101" class="note-form-label">Image URL</label><input id="note-dialog-image-url-17349067661101" class="note-image-url form-control note-form-control note-input" type="text"></div></div><div class="note-modal-footer"><input type="button" href="#" class="btn btn-primary note-btn note-btn-primary note-image-btn" value="Insert Image" disabled=""></div></div></div><div class="note-popover bottom note-image-popover" style="display: none;"><div class="note-popover-arrow"></div><div class="popover-content note-children-container"><div class="note-btn-group note-resize"><button type="button" class="note-btn" tabindex="-1" aria-label="Resize full"><span class="note-fontsize-10">100%</span></button><button type="button" class="note-btn" tabindex="-1" aria-label="Resize half"><span class="note-fontsize-10">50%</span></button><button type="button" class="note-btn" tabindex="-1" aria-label="Resize quarter"><span class="note-fontsize-10">25%</span></button><button type="button" class="note-btn" tabindex="-1" aria-label="Original size"><i class="note-icon-rollback"></i></button></div><div class="note-btn-group note-float"><button type="button" class="note-btn" tabindex="-1" aria-label="Float Left"><i class="note-icon-float-left"></i></button><button type="button" class="note-btn" tabindex="-1" aria-label="Float Right"><i class="note-icon-float-right"></i></button><button type="button" class="note-btn" tabindex="-1" aria-label="Remove float"><i class="note-icon-rollback"></i></button></div><div class="note-btn-group note-remove"><button type="button" class="note-btn" tabindex="-1" aria-label="Remove Image"><i class="note-icon-trash"></i></button></div></div></div><div class="note-popover bottom note-table-popover" style="display: none;"><div class="note-popover-arrow"></div><div class="popover-content note-children-container"><div class="note-btn-group note-add"><button type="button" class="note-btn btn-md" tabindex="-1" aria-label="Add row below"><i class="note-icon-row-below"></i></button><button type="button" class="note-btn btn-md" tabindex="-1" aria-label="Add row above"><i class="note-icon-row-above"></i></button><button type="button" class="note-btn btn-md" tabindex="-1" aria-label="Add column left"><i class="note-icon-col-before"></i></button><button type="button" class="note-btn btn-md" tabindex="-1" aria-label="Add column right"><i class="note-icon-col-after"></i></button></div><div class="note-btn-group note-delete"><button type="button" class="note-btn btn-md" tabindex="-1" aria-label="Delete row"><i class="note-icon-row-remove"></i></button><button type="button" class="note-btn btn-md" tabindex="-1" aria-label="Delete column"><i class="note-icon-col-remove"></i></button><button type="button" class="note-btn btn-md" tabindex="-1" aria-label="Delete table"><i class="note-icon-trash"></i></button></div></div></div><div class="note-modal" aria-hidden="false" tabindex="-1" role="dialog" aria-label="Insert Video"><div class="note-modal-content"><div class="note-modal-header"><button type="button" class="close" aria-label="Close" aria-hidden="true"><i class="note-icon-close"></i></button><h4 class="note-modal-title">Insert Video</h4></div><div class="note-modal-body"><div class="form-group note-form-group row-fluid"><label for="note-dialog-video-url-17349067661101" class="note-form-label">Video URL <small class="text-muted">(YouTube, Vimeo, Vine, Instagram, DailyMotion or Youku)</small></label><input id="note-dialog-video-url-17349067661101" class="note-video-url form-control note-form-control note-input" type="text"></div></div><div class="note-modal-footer"><input type="button" href="#" class="btn btn-primary note-btn note-btn-primary note-video-btn" value="Insert Video" disabled=""></div></div></div><div class="note-modal" aria-hidden="false" tabindex="-1" role="dialog" aria-label="Help"><div class="note-modal-content"><div class="note-modal-header"><button type="button" class="close" aria-label="Close" aria-hidden="true"><i class="note-icon-close"></i></button><h4 class="note-modal-title">Help</h4></div><div class="note-modal-body" style="max-height: 300px; overflow: scroll;"><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>ESC</kbd></label><span>Escape</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>ENTER</kbd></label><span>Insert Paragraph</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+Z</kbd></label><span>Undo the last command</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+Y</kbd></label><span>Redo the last command</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>TAB</kbd></label><span>Tab</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>SHIFT+TAB</kbd></label><span>Untab</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+B</kbd></label><span>Set a bold style</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+I</kbd></label><span>Set a italic style</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+U</kbd></label><span>Set a underline style</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+S</kbd></label><span>Set a strikethrough style</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+BACKSLASH</kbd></label><span>Clean a style</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+L</kbd></label><span>Set left align</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+E</kbd></label><span>Set center align</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+R</kbd></label><span>Set right align</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+J</kbd></label><span>Set full align</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+NUM7</kbd></label><span>Toggle unordered list</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+NUM8</kbd></label><span>Toggle ordered list</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+LEFTBRACKET</kbd></label><span>Outdent on current paragraph</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+RIGHTBRACKET</kbd></label><span>Indent on current paragraph</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM0</kbd></label><span>Change current block's format as a paragraph(P tag)</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM1</kbd></label><span>Change current block's format as H1</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM2</kbd></label><span>Change current block's format as H2</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM3</kbd></label><span>Change current block's format as H3</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM4</kbd></label><span>Change current block's format as H4</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM5</kbd></label><span>Change current block's format as H5</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM6</kbd></label><span>Change current block's format as H6</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+ENTER</kbd></label><span>Insert horizontal rule</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+K</kbd></label><span>Show Link Dialog</span></div><div class="note-modal-footer"><p class="text-center"><a href="http://summernote.org/" target="_blank">Summernote 0.8.18</a> · <a href="https://github.com/summernote/summernote" target="_blank">Project</a> · <a href="https://github.com/summernote/summernote/issues" target="_blank">Issues</a></p></div></div></div></div>
									</div>
								</div>
								<div class="col-12">
									<div class="mb-3">
										<label class="form-label">Add Assignee</label>
										<select class="select select2-hidden-accessible" data-select2-id="select2-data-7-4a0h" tabindex="-1" aria-hidden="true">
											<option data-select2-id="select2-data-9-1ppz">Select</option>
											<option>Sophie</option>
											<option>Cameron</option>
											<option>Doris</option>
											<option>Rufana</option>
										</select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-8-zd9f" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-6oo9-container" aria-controls="select2-6oo9-container"><span class="select2-selection__rendered" id="select2-6oo9-container" role="textbox" aria-readonly="true" title="Select">Select</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
									</div>
								</div>
								<div class="col-12">
									<div class="mb-0">
										<label class="form-label">Status</label>
										<select class="select select2-hidden-accessible" data-select2-id="select2-data-10-jfhf" tabindex="-1" aria-hidden="true">
											<option data-select2-id="select2-data-12-j53l">Select</option>
											<option>Completed</option>
											<option>Pending</option>
											<option>Onhold</option>
											<option>Inprogress</option>
										</select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-11-kuk6" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-f2wu-container" aria-controls="select2-f2wu-container"><span class="select2-selection__rendered" id="select2-f2wu-container" role="textbox" aria-readonly="true" title="Select">Select</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-primary">Add New Todo</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- /Add Todo -->

		<!-- Add Project -->
		<div class="modal fade" id="add_project" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header header-border align-items-center justify-content-between">
						<div class="d-flex align-items-center">
							<h5 class="modal-title me-2">Add Project </h5>
							<p class="text-dark">Project ID : PRO-0004</p>
						</div>
						<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
							<i class="ti ti-x"></i>
						</button>
					</div>
					<div class="add-info-fieldset">
						<div class="add-details-wizard p-3 pb-0">
							<ul class="progress-bar-wizard d-flex align-items-center border-bottom">
								<li class="active p-2 pt-0">
									<h6 class="fw-medium">Basic Information</h6>
								</li>
								<li class="p-2 pt-0">									
									<h6 class="fw-medium">Members</h6>
								</li>
							</ul>
						</div>
						<fieldset id="first-field-file">
							<form action="https://smarthr.dreamstechnologies.com/html/template/projects.html">
								<div class="modal-body">
									<div class="row">
										<div class="col-md-12">
											<div class="d-flex align-items-center flex-wrap row-gap-3 bg-light w-100 rounded p-3 mb-4">                                                
												<div class="d-flex align-items-center justify-content-center avatar avatar-xxl rounded-circle border border-dashed me-2 flex-shrink-0 text-dark frames">
													<i class="ti ti-photo text-gray-2 fs-16"></i>
												</div>                                              
												<div class="profile-upload">
													<div class="mb-2">
														<h6 class="mb-1">Upload Project Logo</h6>
														<p class="fs-12">Image should be below 4 mb</p>
													</div>
													<div class="profile-uploader d-flex align-items-center">
														<div class="drag-upload-btn btn btn-sm btn-primary me-2">
															Upload
															<input type="file" class="form-control image-sign" multiple="">
														</div>
														<a href="javascript:void(0);" class="btn btn-light btn-sm">Cancel</a>
													</div>
													
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="mb-3">
												<label class="form-label">Project Name</label>
												<input type="text" class="form-control">
											</div>
										</div>
										<div class="col-md-12">
											<div class="mb-3">
												<label class="form-label">Client</label>
												<select class="select select2-hidden-accessible" data-select2-id="select2-data-13-gabq" tabindex="-1" aria-hidden="true">
													<option data-select2-id="select2-data-15-61yx">Select</option>
													<option>Anthony Lewis</option>
													<option>Brian Villalobos</option>
												</select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-14-s8ga" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-dm8r-container" aria-controls="select2-dm8r-container"><span class="select2-selection__rendered" id="select2-dm8r-container" role="textbox" aria-readonly="true" title="Select">Select</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
											</div>
										</div>
										<div class="col-md-12">
											<div class="row">
												<div class="col-md-6">
													<div class="mb-3">
														<label class="form-label">Start Date</label>
														<div class="input-icon-end position-relative">
															<input type="text" class="form-control datetimepicker" placeholder="dd/mm/yyyy" value="02-05-2024">
															<span class="input-icon-addon">
																<i class="ti ti-calendar text-gray-7"></i>
															</span>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="mb-3">
														<label class="form-label">End Date</label>
														<div class="input-icon-end position-relative">
															<input type="text" class="form-control datetimepicker" placeholder="dd/mm/yyyy" value="02-05-2024">
															<span class="input-icon-addon">
																<i class="ti ti-calendar text-gray-7"></i>
															</span>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="mb-3">
														<label class="form-label">Priority</label>
														<select class="select select2-hidden-accessible" data-select2-id="select2-data-16-oi3q" tabindex="-1" aria-hidden="true">
															<option data-select2-id="select2-data-18-l4mm">Select</option>
															<option>High</option>
															<option>Medium</option>
															<option>Low</option>
														</select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-17-32no" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-0boz-container" aria-controls="select2-0boz-container"><span class="select2-selection__rendered" id="select2-0boz-container" role="textbox" aria-readonly="true" title="Select">Select</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="mb-3">
														<label class="form-label">Project Value</label>
														<input type="text" class="form-control" value="$">
													</div>
												</div>
												<div class="col-md-6">
													<div class="mb-3">
														<label class="form-label">Total Working Hours</label>
														<div class="input-icon-end position-relative">
															<input type="text" class="form-control timepicker" placeholder="-- : -- : --" value="02-05-2024">
															<span class="input-icon-addon">
																<i class="ti ti-clock-hour-3 text-gray-7"></i>
															</span>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="mb-3">
														<label class="form-label">Extra Time</label>
														<input type="text" class="form-control">
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="mb-0">
												<label class="form-label">Description</label>
												<div class="summernote" style="display: none;"></div><div class="note-editor note-frame"><div class="note-dropzone"><div class="note-dropzone-message"></div></div><div class="note-toolbar" role="toolbar"><div class="note-btn-group note-fontsize"><div class="note-btn-group"><button type="button" class="note-btn dropdown-toggle" tabindex="-1" data-toggle="dropdown" aria-label="Font Size"><span class="note-current-fontsize">14</span> <span class="note-icon-caret"></span></button><div class="note-dropdown-menu note-check dropdown-fontsize" role="list" aria-label="Font Size"><a class="note-dropdown-item" href="#" data-value="8" role="listitem" aria-label="8"><i class="note-icon-menu-check"></i> 8</a><a class="note-dropdown-item" href="#" data-value="9" role="listitem" aria-label="9"><i class="note-icon-menu-check"></i> 9</a><a class="note-dropdown-item" href="#" data-value="10" role="listitem" aria-label="10"><i class="note-icon-menu-check"></i> 10</a><a class="note-dropdown-item" href="#" data-value="11" role="listitem" aria-label="11"><i class="note-icon-menu-check"></i> 11</a><a class="note-dropdown-item" href="#" data-value="12" role="listitem" aria-label="12"><i class="note-icon-menu-check"></i> 12</a><a class="note-dropdown-item checked" href="#" data-value="14" role="listitem" aria-label="14"><i class="note-icon-menu-check"></i> 14</a><a class="note-dropdown-item" href="#" data-value="18" role="listitem" aria-label="18"><i class="note-icon-menu-check"></i> 18</a><a class="note-dropdown-item" href="#" data-value="24" role="listitem" aria-label="24"><i class="note-icon-menu-check"></i> 24</a><a class="note-dropdown-item" href="#" data-value="36" role="listitem" aria-label="36"><i class="note-icon-menu-check"></i> 36</a></div></div></div><div class="note-btn-group note-font"><button type="button" class="note-btn note-btn-bold" tabindex="-1" aria-label="Bold (CTRL+B)"><i class="note-icon-bold"></i></button><button type="button" class="note-btn note-btn-italic" tabindex="-1" aria-label="Italic (CTRL+I)"><i class="note-icon-italic"></i></button><button type="button" class="note-btn note-btn-underline" tabindex="-1" aria-label="Underline (CTRL+U)"><i class="note-icon-underline"></i></button><button type="button" class="note-btn" tabindex="-1" aria-label="Remove Font Style (CTRL+\)"><i class="note-icon-eraser"></i></button><button type="button" class="note-btn note-btn-strikethrough" tabindex="-1" aria-label="Strikethrough (CTRL+SHIFT+S)"><i class="note-icon-strikethrough"></i></button></div><div class="note-btn-group note-insert"><button type="button" class="note-btn" tabindex="-1" aria-label="Picture"><i class="note-icon-picture"></i></button></div></div><div class="note-editing-area"><div class="note-handle"><div class="note-control-selection"><div class="note-control-selection-bg"></div><div class="note-control-holder note-control-nw"></div><div class="note-control-holder note-control-ne"></div><div class="note-control-holder note-control-sw"></div><div class="note-control-sizing note-control-se"></div><div class="note-control-selection-info"></div></div></div><textarea class="note-codable" aria-multiline="true"></textarea><div class="note-editable" contenteditable="true" role="textbox" aria-multiline="true" spellcheck="true" autocorrect="true" style="height: 100px;"><p><br></p></div></div><output class="note-status-output" role="status" aria-live="polite"></output><div class="note-statusbar" role="status"><div class="note-resizebar" aria-label="resize"><div class="note-icon-bar"></div><div class="note-icon-bar"></div><div class="note-icon-bar"></div></div></div><div class="note-modal link-dialog" aria-hidden="false" tabindex="-1" role="dialog" aria-label="Insert Link"><div class="note-modal-content"><div class="note-modal-header"><button type="button" class="close" aria-label="Close" aria-hidden="true"><i class="note-icon-close"></i></button><h4 class="note-modal-title">Insert Link</h4></div><div class="note-modal-body"><div class="form-group note-form-group"><label for="note-dialog-link-txt-17349067661372" class="note-form-label">Text to display</label><input id="note-dialog-link-txt-17349067661372" class="note-link-text form-control note-form-control note-input" type="text"></div><div class="form-group note-form-group"><label for="note-dialog-link-url-17349067661372" class="note-form-label">To what URL should this link go?</label><input id="note-dialog-link-url-17349067661372" class="note-link-url form-control note-form-control note-input" type="text" value="http://"></div><div class="checkbox sn-checkbox-open-in-new-window"><label><input role="checkbox" type="checkbox" checked="" aria-checked="true">Open in new window</label></div><div class="checkbox sn-checkbox-use-protocol"><label><input role="checkbox" type="checkbox" checked="" aria-checked="true">Use default protocol</label></div></div><div class="note-modal-footer"><input type="button" href="#" class="btn btn-primary note-btn note-btn-primary note-link-btn" value="Insert Link" disabled=""></div></div></div><div class="note-popover bottom note-link-popover" style="display: none;"><div class="note-popover-arrow"></div><div class="popover-content note-children-container"><span><a target="_blank"></a>&nbsp;</span><div class="note-btn-group note-link"><button type="button" class="note-btn" tabindex="-1" aria-label="Edit"><i class="note-icon-link"></i></button><button type="button" class="note-btn" tabindex="-1" aria-label="Unlink"><i class="note-icon-chain-broken"></i></button></div></div></div><div class="note-modal" aria-hidden="false" tabindex="-1" role="dialog" aria-label="Insert Image"><div class="note-modal-content"><div class="note-modal-header"><button type="button" class="close" aria-label="Close" aria-hidden="true"><i class="note-icon-close"></i></button><h4 class="note-modal-title">Insert Image</h4></div><div class="note-modal-body"><div class="form-group note-form-group note-group-select-from-files"><label for="note-dialog-image-file-17349067661372" class="note-form-label">Select from files</label><input id="note-dialog-image-file-17349067661372" class="note-image-input form-control-file note-form-control note-input" type="file" name="files" accept="image/*" multiple="multiple"></div><div class="form-group note-group-image-url"><label for="note-dialog-image-url-17349067661372" class="note-form-label">Image URL</label><input id="note-dialog-image-url-17349067661372" class="note-image-url form-control note-form-control note-input" type="text"></div></div><div class="note-modal-footer"><input type="button" href="#" class="btn btn-primary note-btn note-btn-primary note-image-btn" value="Insert Image" disabled=""></div></div></div><div class="note-popover bottom note-image-popover" style="display: none;"><div class="note-popover-arrow"></div><div class="popover-content note-children-container"><div class="note-btn-group note-resize"><button type="button" class="note-btn" tabindex="-1" aria-label="Resize full"><span class="note-fontsize-10">100%</span></button><button type="button" class="note-btn" tabindex="-1" aria-label="Resize half"><span class="note-fontsize-10">50%</span></button><button type="button" class="note-btn" tabindex="-1" aria-label="Resize quarter"><span class="note-fontsize-10">25%</span></button><button type="button" class="note-btn" tabindex="-1" aria-label="Original size"><i class="note-icon-rollback"></i></button></div><div class="note-btn-group note-float"><button type="button" class="note-btn" tabindex="-1" aria-label="Float Left"><i class="note-icon-float-left"></i></button><button type="button" class="note-btn" tabindex="-1" aria-label="Float Right"><i class="note-icon-float-right"></i></button><button type="button" class="note-btn" tabindex="-1" aria-label="Remove float"><i class="note-icon-rollback"></i></button></div><div class="note-btn-group note-remove"><button type="button" class="note-btn" tabindex="-1" aria-label="Remove Image"><i class="note-icon-trash"></i></button></div></div></div><div class="note-popover bottom note-table-popover" style="display: none;"><div class="note-popover-arrow"></div><div class="popover-content note-children-container"><div class="note-btn-group note-add"><button type="button" class="note-btn btn-md" tabindex="-1" aria-label="Add row below"><i class="note-icon-row-below"></i></button><button type="button" class="note-btn btn-md" tabindex="-1" aria-label="Add row above"><i class="note-icon-row-above"></i></button><button type="button" class="note-btn btn-md" tabindex="-1" aria-label="Add column left"><i class="note-icon-col-before"></i></button><button type="button" class="note-btn btn-md" tabindex="-1" aria-label="Add column right"><i class="note-icon-col-after"></i></button></div><div class="note-btn-group note-delete"><button type="button" class="note-btn btn-md" tabindex="-1" aria-label="Delete row"><i class="note-icon-row-remove"></i></button><button type="button" class="note-btn btn-md" tabindex="-1" aria-label="Delete column"><i class="note-icon-col-remove"></i></button><button type="button" class="note-btn btn-md" tabindex="-1" aria-label="Delete table"><i class="note-icon-trash"></i></button></div></div></div><div class="note-modal" aria-hidden="false" tabindex="-1" role="dialog" aria-label="Insert Video"><div class="note-modal-content"><div class="note-modal-header"><button type="button" class="close" aria-label="Close" aria-hidden="true"><i class="note-icon-close"></i></button><h4 class="note-modal-title">Insert Video</h4></div><div class="note-modal-body"><div class="form-group note-form-group row-fluid"><label for="note-dialog-video-url-17349067661372" class="note-form-label">Video URL <small class="text-muted">(YouTube, Vimeo, Vine, Instagram, DailyMotion or Youku)</small></label><input id="note-dialog-video-url-17349067661372" class="note-video-url form-control note-form-control note-input" type="text"></div></div><div class="note-modal-footer"><input type="button" href="#" class="btn btn-primary note-btn note-btn-primary note-video-btn" value="Insert Video" disabled=""></div></div></div><div class="note-modal" aria-hidden="false" tabindex="-1" role="dialog" aria-label="Help"><div class="note-modal-content"><div class="note-modal-header"><button type="button" class="close" aria-label="Close" aria-hidden="true"><i class="note-icon-close"></i></button><h4 class="note-modal-title">Help</h4></div><div class="note-modal-body" style="max-height: 300px; overflow: scroll;"><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>ESC</kbd></label><span>Escape</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>ENTER</kbd></label><span>Insert Paragraph</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+Z</kbd></label><span>Undo the last command</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+Y</kbd></label><span>Redo the last command</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>TAB</kbd></label><span>Tab</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>SHIFT+TAB</kbd></label><span>Untab</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+B</kbd></label><span>Set a bold style</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+I</kbd></label><span>Set a italic style</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+U</kbd></label><span>Set a underline style</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+S</kbd></label><span>Set a strikethrough style</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+BACKSLASH</kbd></label><span>Clean a style</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+L</kbd></label><span>Set left align</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+E</kbd></label><span>Set center align</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+R</kbd></label><span>Set right align</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+J</kbd></label><span>Set full align</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+NUM7</kbd></label><span>Toggle unordered list</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+NUM8</kbd></label><span>Toggle ordered list</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+LEFTBRACKET</kbd></label><span>Outdent on current paragraph</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+RIGHTBRACKET</kbd></label><span>Indent on current paragraph</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM0</kbd></label><span>Change current block's format as a paragraph(P tag)</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM1</kbd></label><span>Change current block's format as H1</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM2</kbd></label><span>Change current block's format as H2</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM3</kbd></label><span>Change current block's format as H3</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM4</kbd></label><span>Change current block's format as H4</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM5</kbd></label><span>Change current block's format as H5</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM6</kbd></label><span>Change current block's format as H6</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+ENTER</kbd></label><span>Insert horizontal rule</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+K</kbd></label><span>Show Link Dialog</span></div><div class="note-modal-footer"><p class="text-center"><a href="http://summernote.org/" target="_blank">Summernote 0.8.18</a> · <a href="https://github.com/summernote/summernote" target="_blank">Project</a> · <a href="https://github.com/summernote/summernote/issues" target="_blank">Issues</a></p></div></div></div></div>
											</div>
										</div>
									</div>								
								</div>
								<div class="modal-footer">
									<div class="d-flex align-items-center justify-content-end">
										<button type="button" class="btn btn-outline-light border me-2" data-bs-dismiss="modal">Cancel</button>
										<button class="btn btn-primary wizard-next-btn" type="button">Add Team Member</button>
									</div>
								</div>
							</form>
						</fieldset>
						<fieldset>
							<form action="https://smarthr.dreamstechnologies.com/html/template/projects.html">
								<div class="modal-body">
									<div class="row">
										<div class="col-md-12">
											<div class="mb-3">
												<label class="form-label me-2">Team Members</label>
												<div class="bootstrap-tagsinput"><span class="tag label label-info">Jerald<span data-role="remove"></span></span> <span class="tag label label-info">Andrew<span data-role="remove"></span></span> <span class="tag label label-info">Philip<span data-role="remove"></span></span> <span class="tag label label-info">Davis<span data-role="remove"></span></span> <input type="text" placeholder="Add new"></div><input class="input-tags form-control" placeholder="Add new" type="text" data-role="tagsinput" name="Label" value="Jerald,Andrew,Philip,Davis" style="display: none;">
											</div>
										</div>
										<div class="col-md-12">
											<div class="mb-3">
												<label class="form-label me-2">Team Leader</label>
												<div class="bootstrap-tagsinput"><span class="tag label label-info">Hendry<span data-role="remove"></span></span> <span class="tag label label-info">James<span data-role="remove"></span></span> <input type="text" placeholder="Add new"></div><input class="input-tags form-control" placeholder="Add new" type="text" data-role="tagsinput" name="Label" value="Hendry,James" style="display: none;">
											</div>
										</div>
										<div class="col-md-12">
											<div class="mb-3">
												<label class="form-label me-2">Project Manager</label>
												<div class="bootstrap-tagsinput"><span class="tag label label-info">Dwight<span data-role="remove"></span></span> <input type="text" placeholder="Add new"></div><input class="input-tags form-control" placeholder="Add new" type="text" data-role="tagsinput" name="Label" value="Dwight" style="display: none;">
											</div>
										</div>
										<div class="col-md-12">
											<div class="mb-3">
												<label class="form-label">Status</label>
												<select class="select select2-hidden-accessible" data-select2-id="select2-data-19-28kx" tabindex="-1" aria-hidden="true">
													<option data-select2-id="select2-data-21-hxag">Select</option>
													<option>Active</option>
													<option>Inactive</option>
												</select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-20-gi6f" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-1d75-container" aria-controls="select2-1d75-container"><span class="select2-selection__rendered" id="select2-1d75-container" role="textbox" aria-readonly="true" title="Select">Select</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
											</div>
										</div>
										<div class="col-md-12">
											<div>
												<label class="form-label">Tags</label>
												<select class="select select2-hidden-accessible" data-select2-id="select2-data-22-j2ud" tabindex="-1" aria-hidden="true">
													<option data-select2-id="select2-data-24-6qt0">Select</option>
													<option>High</option>
													<option>Low</option>
													<option>Medium</option>
												</select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-23-dyb6" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-2idw-container" aria-controls="select2-2idw-container"><span class="select2-selection__rendered" id="select2-2idw-container" role="textbox" aria-readonly="true" title="Select">Select</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
											</div>
										</div>
									</div>								
								</div>
								<div class="modal-footer">
									<div class="d-flex align-items-center justify-content-end">
										<button type="button" class="btn btn-outline-light border me-2" data-bs-dismiss="modal">Cancel</button>
										<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#success_modal">Save</button>
									</div>
								</div>
							</form>
						</fieldset>
					</div>
				</div>
			</div>
		</div>
		<!-- /Add Project -->

		<!-- Add Leaves -->
		<div class="modal fade" id="add_leaves">
			<div class="modal-dialog modal-dialog-centered modal-md">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Add Leave Request</h4>
						<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
							<i class="ti ti-x"></i>
						</button>
					</div>
					<form action="https://smarthr.dreamstechnologies.com/html/template/index.html">
						<div class="modal-body pb-0">
							<div class="row">
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label">Employee Name</label>
										<select class="select select2-hidden-accessible" data-select2-id="select2-data-25-4ywn" tabindex="-1" aria-hidden="true">
											<option data-select2-id="select2-data-27-gr7w">Select</option>
											<option>Anthony Lewis</option>
											<option>Brian Villalobos</option>
											<option>Harvey Smith</option>
										</select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-26-ek40" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-7zz9-container" aria-controls="select2-7zz9-container"><span class="select2-selection__rendered" id="select2-7zz9-container" role="textbox" aria-readonly="true" title="Select">Select</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
									</div>	
								</div>
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label">Leave Type</label>
										<select class="select select2-hidden-accessible" data-select2-id="select2-data-28-ah28" tabindex="-1" aria-hidden="true">
											<option data-select2-id="select2-data-30-gctj">Select</option>
											<option>Medical Leave</option>
											<option>Casual Leave</option>
											<option>Annual Leave</option>
										</select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-29-woa2" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-al7i-container" aria-controls="select2-al7i-container"><span class="select2-selection__rendered" id="select2-al7i-container" role="textbox" aria-readonly="true" title="Select">Select</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
									</div>	
								</div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">From </label>
                                        <div class="input-icon-end position-relative">
                                            <input type="text" class="form-control datetimepicker" placeholder="dd/mm/yyyy">
                                            <span class="input-icon-addon">
                                                <i class="ti ti-calendar text-gray-7"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">To </label>
                                        <div class="input-icon-end position-relative">
                                            <input type="text" class="form-control datetimepicker" placeholder="dd/mm/yyyy">
                                            <span class="input-icon-addon">
                                                <i class="ti ti-calendar text-gray-7"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>   
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">No of Days</label>
										<input type="text" class="form-control" disabled="">
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Remaining Days</label>
										<input type="text" class="form-control" disabled="">
									</div>
								</div>
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label">Reason</label>
										<textarea class="form-control" rows="3"></textarea>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-primary">Add Leaves</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- /Add Leaves -->

	</div>
	<!-- /Main Wrapper -->

	<!-- jQuery -->
	<script src="assets/js/jquery-3.7.1.min.js" type="text/javascript"></script>

	<!-- Bootstrap Core JS -->
	<script src="assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>

	<!-- Feather Icon JS -->
	<script src="assets/js/feather.min.js" type="text/javascript"></script>

	<!-- Slimscroll JS -->
	<script src="assets/js/jquery.slimscroll.min.js" type="text/javascript"></script>

	<!-- Chart JS -->
	<script src="assets/plugins/apexchart/apexcharts.min.js" type="text/javascript"></script>
	<script src="assets/plugins/apexchart/chart-data.js" type="text/javascript"></script>

	<!-- Chart JS -->
	<script src="assets/plugins/chartjs/chart.min.js" type="text/javascript"></script>
	<script src="assets/plugins/chartjs/chart-data.js" type="text/javascript"></script>

	<!-- Datetimepicker JS -->
	<script src="assets/js/moment.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>

	<!-- Daterangepikcer JS -->
	<script src="assets/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>

	<!-- Summernote JS -->
	<script src="assets/plugins/summernote/summernote-lite.min.js" type="text/javascript"></script>

	<!-- Bootstrap Tagsinput JS -->
	<script src="assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js" type="text/javascript"></script>

	<!-- Select2 JS -->
	<script src="assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>

	<!-- Color Picker JS -->
	<script src="assets/plugins/%40simonwep/pickr/pickr.es5.min.js" type="text/javascript"></script>

	<!-- Custom JS -->
	<script src="assets/js/todo.js" type="text/javascript"></script>
	<script src="assets/js/theme-colorpicker.js" type="text/javascript"></script>
	<script src="assets/js/script.js" type="text/javascript"></script>





<div class="sidebar-overlay"></div>
<div class="sidebar-contact ">
    <div class="toggle-theme" data-bs-toggle="offcanvas" data-bs-target="#theme-setting"><i class="fa fa-cog fa-w-16 fa-spin"></i></div>
    </div>
    <div class="sidebar-themesettings offcanvas offcanvas-end" id="theme-setting">
    <div class="offcanvas-header d-flex align-items-center justify-content-between bg-dark">
        <div>
            <h3 class="mb-1 text-white">Theme Customizer</h3>
            <p class="text-light">Choose your themes &amp; layouts etc.</p>
        </div>
        <a href="#" class="custom-btn-close d-flex align-items-center justify-content-center text-white" data-bs-dismiss="offcanvas"><i class="ti ti-x"></i></a>
    </div>
    <div class="themesettings-inner offcanvas-body">
        <div class="accordion accordion-customicon1 accordions-items-seperate" id="settingtheme">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button text-dark fs-16" type="button" data-bs-toggle="collapse" data-bs-target="#layoutsetting" aria-expanded="true" aria-controls="collapsecustomicon1One">
                        Select Layouts
                    </button>
                </h2>
                <div id="layoutsetting" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                        <div class="row gx-3">
                            <div class="col-4">
                                <div class="theme-layout mb-3">
                                    <input type="radio" name="LayoutTheme" id="defaultLayout" value="default" checked="">
                                    <label for="defaultLayout">
                                        <span class="d-block mb-2 layout-img">
                                            <img src="assets/img/theme/default.svg" alt="img">
                                        </span>                                     
                                        <span class="layout-type">Default</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="theme-layout mb-3">
                                    <input type="radio" name="LayoutTheme" id="miniLayout" value="mini">
                                    <label for="miniLayout">
                                        <span class="d-block mb-2 layout-img">
                                            <img src="assets/img/theme/mini.svg" alt="img">
                                        </span>                                    
                                        <span class="layout-type">Mini</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="theme-layout mb-3">
                                    <input type="radio" name="LayoutTheme" id="horizontalLayout" value="horizontal">
                                    <label for="horizontalLayout">
                                        <span class="d-block mb-2 layout-img">
                                            <img src="assets/img/theme/horizontal.svg" alt="img">
                                        </span>                                    
                                        <span class="layout-type">Horizontal</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="theme-layout mb-3">
                                    <input type="radio" name="LayoutTheme" id="horizontal-singleLayout" value="horizontal-single">
                                    <label for="horizontal-singleLayout">
                                        <span class="d-block mb-2 layout-img">
                                            <img src="assets/img/theme/horizontal-single.svg" alt="img">
                                        </span>                                    
                                        <span class="layout-type">Horizontal Single</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="theme-layout mb-3">
                                    <input type="radio" name="LayoutTheme" id="detachedLayout" value="detached">
                                    <label for="detachedLayout">
                                        <span class="d-block mb-2 layout-img">
                                            <img src="assets/img/theme/horizontal-single.svg" alt="img">
                                        </span>                                    
                                        <span class="layout-type">Detached</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="theme-layout mb-3">
                                    <input type="radio" name="LayoutTheme" id="twocolumnLayout" value="twocolumn">
                                    <label for="twocolumnLayout">
                                        <span class="d-block mb-2 layout-img">
                                            <img src="assets/img/theme/two-column.svg" alt="img">
                                        </span>                                    
                                        <span class="layout-type">Two Column</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="theme-layout mb-3">
                                    <input type="radio" name="LayoutTheme" id="without-headerLayout" value="without-header">
                                    <label for="without-headerLayout">
                                        <span class="d-block mb-2 layout-img">
                                            <img src="assets/img/theme/without-header.svg" alt="img">
                                        </span>                                    
                                        <span class="layout-type">Without Header</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="theme-layout mb-3">
                                    <input type="radio" name="LayoutTheme" id="horizontal-overlayLayout" value="horizontal-overlay">
                                    <label for="horizontal-overlayLayout">
                                        <span class="d-block mb-2 layout-img">
                                            <img src="assets/img/theme/overlay.svg" alt="img">
                                        </span>                                    
                                        <span class="layout-type">Overlay</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="theme-layout mb-3">
                                    <input type="radio" name="LayoutTheme" id="horizontal-sidemenuLayout" value="horizontal-sidemenu">
                                    <label for="horizontal-sidemenuLayout">
                                        <span class="d-block mb-2 layout-img">
                                            <img src="assets/img/theme/menu-aside.svg" alt="img">
                                        </span>                                    
                                        <span class="layout-type">Menu Aside</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="theme-layout mb-3">
                                    <input type="radio" name="LayoutTheme" id="stackedLayout" value="stacked">
                                    <label for="stackedLayout">
                                        <span class="d-block mb-2 layout-img">
                                            <img src="assets/img/theme/stacked.svg" alt="img">
                                        </span>                                    
                                        <span class="layout-type">Menu Stacked</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="theme-layout mb-3">
                                    <input type="radio" name="LayoutTheme" id="modernLayout" value="modern">
                                    <label for="modernLayout">
                                        <span class="d-block mb-2 layout-img">
                                            <img src="assets/img/theme/modern.svg" alt="img">
                                        </span>                                    
                                        <span class="layout-type">Modern</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="theme-layout mb-3">
                                    <input type="radio" name="LayoutTheme" id="transparentLayout" value="transparent">
                                    <label for="transparentLayout">
                                        <span class="d-block mb-2 layout-img">
                                            <img src="assets/img/theme/transparent.svg" alt="img">
                                        </span>                                    
                                        <span class="layout-type">Transparent</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <a href="layout-rtl.html" class="theme-layout mb-3">
                                    <span class="d-block mb-2 layout-img">
                                        <img src="assets/img/theme/rtl.svg" alt="img">
                                    </span>                                    
                                    <span class="layout-type">RTL</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button text-dark fs-16" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarsetting" aria-expanded="true">
                        Layout Width
                    </button>
                </h2>
                <div id="sidebarsetting" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                        <div class="d-flex align-items-center">
                            <div class="theme-width m-1 me-2">
                                <input type="radio" name="width" id="fluidWidth" value="fluid" checked="">
                                <label for="fluidWidth" class="d-block rounded fs-12">Fluid Layout
                                </label>
                            </div>
                            <div class="theme-width m-1">
                                <input type="radio" name="width" id="boxWidth" value="box">
                                <label for="boxWidth" class="d-block rounded fs-12">Boxed Layout
                                </label>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button text-dark fs-16" type="button" data-bs-toggle="collapse" data-bs-target="#cardsetting" aria-expanded="true" aria-controls="collapsecustomicon1One">
                        Card Layout
                    </button>
                </h2>
                <div id="cardsetting" class="accordion-collapse collapse show">
                    <div class="accordion-body pb-0">
                        <div class="row gx-3">
                            <div class="col-4">
                                <div class="theme-layout mb-3">
                                    <input type="radio" name="card" id="borderedCard" value="bordered" checked="">
                                    <label for="borderedCard">
                                        <span class="d-block mb-2 layout-img">
                                            <img src="assets/img/theme/bordered.svg" alt="img">
                                        </span>                                     
                                        <span class="layout-type">Bordered</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="theme-layout mb-3">
                                    <input type="radio" name="card" id="borderlessCard" value="borderless">
                                    <label for="borderlessCard">
                                        <span class="d-block mb-2 layout-img">
                                            <img src="assets/img/theme/borderless.svg" alt="img">
                                        </span>                                    
                                        <span class="layout-type">Borderless</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="theme-layout mb-3">
                                    <input type="radio" name="card" id="shadowCard" value="shadow">
                                    <label for="shadowCard">
                                        <span class="d-block mb-2 layout-img">
                                            <img src="assets/img/theme/shadow.svg" alt="img">
                                        </span>                                    
                                        <span class="layout-type">Only Shadow</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button text-dark fs-16" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarsetting" aria-expanded="true">
                        Sidebar Color
                    </button>
                </h2>
                <div id="sidebarsetting" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                       <div class="d-flex align-items-center">
                            <div class="theme-colorselect m-1 me-2">
                                <input type="radio" name="sidebar" id="lightSidebar" value="light" checked="">
                                <label for="lightSidebar" class="d-block rounded mb-2">
                                </label>
                            </div>
                            <div class="theme-colorselect m-1 me-2">
                                <input type="radio" name="sidebar" id="darkgreenSidebar" value="darkgreen">
                                <label for="darkgreenSidebar" class="d-block rounded bg-darkgreen mb-2">
                                </label>
                            </div>
                            <div class="theme-colorselect m-1 me-2">
                                <input type="radio" name="sidebar" id="nightblueSidebar" value="nightblue">
                                <label for="nightblueSidebar" class="d-block rounded bg-nightblue mb-2">
                                </label>
                            </div>
                            <div class="theme-colorselect m-1 me-2">
                                <input type="radio" name="sidebar" id="darkgraySidebar" value="darkgray">
                                <label for="darkgraySidebar" class="d-block rounded bg-darkgray mb-2">
                                </label>
                            </div>
                            <div class="theme-colorselect m-1 me-2">
                                <input type="radio" name="sidebar" id="royalblueSidebar" value="royalblue">
                                <label for="royalblueSidebar" class="d-block rounded bg-royalblue mb-2">
                                </label>
                            </div>
                            <div class="theme-colorselect m-1 me-2">
                                <input type="radio" name="sidebar" id="indigoSidebar" value="indigo">
                                <label for="indigoSidebar" class="d-block rounded bg-indigo mb-2">
                                </label>
                            </div>                            
                            <div class="theme-colorselect m-1 mt-0">
                                <div class="theme-container-background"><button>nano</button></div>
                                <div class="pickr-container-background"><div class="pickr">

        <button type="button" class="pcr-button" role="button" aria-label="toggle color picker dialog" style="--pcr-color: rgba(84, 109, 254, 1);"></button>

        
      </div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button text-dark fs-16" type="button" data-bs-toggle="collapse" data-bs-target="#modesetting" aria-expanded="true">
                        Color Mode
                    </button>
                </h2>
                <div id="modesetting" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                       <div class="row gx-3">
                            <div class="col-6">
                                <div class="theme-mode">
                                    <input type="radio" name="theme" id="lightTheme" value="light" checked="">
                                    <label for="lightTheme" class="p-2 rounded fw-medium w-100">                            
                                        <span class="avatar avatar-md d-inline-flex rounded me-2"><i class="ti ti-sun-filled"></i></span>Light Mode
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="theme-mode">
                                    <input type="radio" name="theme" id="darkTheme" value="dark">
                                    <label for="darkTheme" class="p-2 rounded fw-medium w-100">                         
                                        <span class="avatar avatar-md d-inline-flex rounded me-2"><i class="ti ti-moon-filled"></i></span>Dark Mode
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button text-dark fs-16" type="button" data-bs-toggle="collapse" data-bs-target="#sizesetting" aria-expanded="true" aria-controls="collapsecustomicon1One">
                        Sidebar Size
                    </button>
                </h2>
                <div id="sizesetting" class="accordion-collapse collapse show">
                    <div class="accordion-body pb-0">
                        <div class="row gx-3">
                            <div class="col-4">
                                <div class="theme-layout mb-3">
                                    <input type="radio" name="size" id="defaultSize" value="default" checked="">
                                    <label for="defaultSize">
                                        <span class="d-block mb-2 layout-img">
                                            <img src="assets/img/theme/default.svg" alt="img">
                                        </span>                                     
                                        <span class="layout-type">Default</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="theme-layout mb-3">
                                    <input type="radio" name="size" id="compactSize" value="compact">
                                    <label for="compactSize">
                                        <span class="d-block mb-2 layout-img">
                                            <img src="assets/img/theme/compact.svg" alt="img">
                                        </span>                                    
                                        <span class="layout-type">Compact</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="theme-layout mb-3">
                                    <input type="radio" name="size" id="hoverviewSize" value="hoverview">
                                    <label for="hoverviewSize">
                                        <span class="d-block mb-2 layout-img">
                                            <img src="assets/img/theme/hoverview.svg" alt="img">
                                        </span>                                    
                                        <span class="layout-type">Hover View</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button text-dark fs-16" type="button" data-bs-toggle="collapse" data-bs-target="#colorsetting" aria-expanded="true">
                        Top Bar Color
                    </button>
                </h2>
                <div id="colorsetting" class="accordion-collapse collapse show">
                    <div class="accordion-body pb-1">
                       <div class="d-flex align-items-center flex-wrap">
                            <div class="theme-colorselect mb-3 me-3">
                                <input type="radio" name="topbar" id="whiteTopbar" value="white" checked="">
                                <label for="whiteTopbar" class="white-topbar"></label>
                            </div>
                            <div class="theme-colorselect mb-3 me-3">
                                <input type="radio" name="topbar" id="darkaquaTopbar" value="darkaqua">
                                <label for="darkaquaTopbar" class="darkaqua-topbar"></label>
                            </div>
                            <div class="theme-colorselect mb-3 me-3">
                                <input type="radio" name="topbar" id="whiterockTopbar" value="whiterock">
                                <label for="whiterockTopbar" class="whiterock-topbar"></label>
                            </div>
                            <div class="theme-colorselect mb-3 me-3">
                                <input type="radio" name="topbar" id="rockblueTopbar" value="rockblue">
                                <label for="rockblueTopbar" class="rockblue-topbar"></label>
                            </div>
                            <div class="theme-colorselect mb-3 me-3">
                                <input type="radio" name="topbar" id="bluehazeTopbar" value="bluehaze">
                                <label for="bluehazeTopbar" class="bluehaze-topbar"></label>
                            </div>                   
                            <div class="theme-colorselect mb-3 me-3">
                                <input type="radio" name="topbar" id="orangeGradientTopbar" value="orangegradient">
                                <label for="orangeGradientTopbar" class="orange-gradient-topbar"></label>
                            </div>                   
                            <div class="theme-colorselect mb-3 me-3">
                                <input type="radio" name="topbar" id="purpleGradientTopbar" value="purplegradient">
                                <label for="purpleGradientTopbar" class="purple-gradient-topbar"></label>
                            </div>                   
                            <div class="theme-colorselect mb-3 me-3">
                                <input type="radio" name="topbar" id="blueGradientTopbar" value="bluegradient">
                                <label for="blueGradientTopbar" class="blue-gradient-topbar"></label>
                            </div>                   
                            <div class="theme-colorselect mb-3 me-3">
                                <input type="radio" name="topbar" id="maroonGradientTopbar" value="maroongradient">
                                <label for="maroonGradientTopbar" class="maroon-gradient-topbar"></label>
                            </div>                   
                            <div class="theme-colorselect mb-3 mt-0">
                                <div class="theme-topbar"><button>nano</button></div>
                                <div class="pickr-topbar"><div class="pickr">

        <button type="button" class="pcr-button" role="button" aria-label="toggle color picker dialog" style="--pcr-color: rgba(84, 109, 254, 1);"></button>

        
      </div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button text-dark fs-16" type="button" data-bs-toggle="collapse" data-bs-target="#topcolorsetting" aria-expanded="true">
                        Top Bar Background
                    </button>
                </h2>
                <div id="topcolorsetting" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                        <h6 class="mb-1 fw-medium">Pattern</h6>
                         <div class="d-flex align-items-center">
                            <div class="theme-topbarbg me-3 mb-2">
                                <input type="radio" name="topbarbg" id="pattern1" value="pattern1" checked="">
                                <label for="pattern1" class="d-block rounded">
                                    <img src="assets/img/theme/pattern-01.svg" alt="img" class="rounded">
                                </label>
                            </div>
                            <div class="theme-topbarbg me-3 mb-2">
                                <input type="radio" name="topbarbg" id="pattern2" value="pattern2">
                                <label for="pattern2" class="d-block rounded">
                                    <img src="assets/img/theme/pattern-02.svg" alt="img" class="rounded">
                                </label>
                            </div>
                            <div class="theme-topbarbg me-3 mb-2">
                                <input type="radio" name="topbarbg" id="pattern3" value="pattern3">
                                <label for="pattern3" class="d-block rounded">
                                    <img src="assets/img/theme/pattern-03.svg" alt="img" class="rounded">
                                </label>
                            </div>
                        </div>
                        <h6 class="mb-1 fw-medium">Colors</h6>
                         <div class="d-flex align-items-center">
                            <div class="theme-colorselect m-1 me-3">
                                <input type="radio" name="topbarcolor" id="whiteTopbarcolor" value="white" checked="">
                                <label for="whiteTopbarcolor" class="white-topbar"></label>
                            </div>
                            <div class="theme-colorselect m-1 me-3">
                                <input type="radio" name="topbarcolor" id="primaryTopbarcolor" value="primary">
                                <label for="primaryTopbarcolor" class="primary-topbar"></label>
                            </div>
                            <div class="theme-colorselect m-1 me-3">
                                <input type="radio" name="topbarcolor" id="blackpearlTopbarcolor" value="blackpearl">
                                <label for="blackpearlTopbarcolor" class="blackpearl-topbar"></label>
                            </div>
                            <div class="theme-colorselect m-1 me-3">
                                <input type="radio" name="topbarcolor" id="maroonTopbarcolor" value="maroon">
                                <label for="maroonTopbarcolor" class="maroon-topbar"></label>
                            </div>
                            <div class="theme-colorselect m-1 me-3">
                                <input type="radio" name="topbarcolor" id="bluegemTopbarcolor" value="bluegem">
                                <label for="bluegemTopbarcolor" class="bluegem-topbar"></label>
                            </div>
                            <div class="theme-colorselect m-1 me-3">
                                <input type="radio" name="topbarcolor" id="fireflyTopbarcolor" value="firefly">
                                <label for="fireflyTopbarcolor" class="firefly-topbar"></label>
                            </div>                                           
                            <div class="theme-colorselect m-1 mt-0">
                                <div class="theme-topbarcolor"><button>nano</button></div>
                                <div class="pickr-topbarcolor"><div class="pickr">

        <button type="button" class="pcr-button" role="button" aria-label="toggle color picker dialog" style="--pcr-color: rgba(84, 109, 254, 1);"></button>

        
      </div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 			    
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button text-dark fs-16" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarbgsetting" aria-expanded="true">
                        Sidebar Background
                    </button>
                </h2>
                <div id="sidebarbgsetting" class="accordion-collapse collapse show">
                    <div class="accordion-body pb-1">
                       <div class="d-flex align-items-center flex-wrap">
                            <div class="theme-sidebarbg me-3 mb-3">
                                <input type="radio" name="sidebarbg" id="sidebarBg1" value="sidebarbg1">
                                <label for="sidebarBg1" class="d-block rounded">
                                    <img src="assets/img/theme/sidebar-bg-01.svg" alt="img" class="rounded">
                                </label>
                            </div>
                            <div class="theme-sidebarbg me-3 mb-3">
                                <input type="radio" name="sidebarbg" id="sidebarBg2" value="sidebarbg2">
                                <label for="sidebarBg2" class="d-block rounded">
                                    <img src="assets/img/theme/sidebar-bg-02.svg" alt="img" class="rounded">
                                </label>
                            </div>
                            <div class="theme-sidebarbg me-3 mb-3">
                                <input type="radio" name="sidebarbg" id="sidebarBg3" value="sidebarbg3">
                                <label for="sidebarBg3" class="d-block rounded">
                                    <img src="assets/img/theme/sidebar-bg-03.svg" alt="img" class="rounded">
                                </label>
                            </div>
                            <div class="theme-sidebarbg me-3 mb-3">
                                <input type="radio" name="sidebarbg" id="sidebarBg4" value="sidebarbg4">
                                <label for="sidebarBg4" class="d-block rounded">
                                    <img src="assets/img/theme/sidebar-bg-04.svg" alt="img" class="rounded">
                                </label>
                            </div>
                            <div class="theme-sidebarbg me-3 mb-3">
                                <input type="radio" name="sidebarbg" id="sidebarBg5" value="sidebarbg5">
                                <label for="sidebarBg5" class="d-block rounded">
                                    <img src="assets/img/theme/sidebar-bg-05.svg" alt="img" class="rounded">
                                </label>
                            </div>
                            <div class="theme-sidebarbg me-3 mb-3">
                                <input type="radio" name="sidebarbg" id="sidebarBg6" value="sidebarbg6">
                                <label for="sidebarBg6" class="d-block rounded">
                                    <img src="assets/img/theme/sidebar-bg-06.svg" alt="img" class="rounded">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button text-dark fs-16" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarcolor" aria-expanded="true">
                        Theme Colors
                    </button>
                </h2>
                <div id="sidebarcolor" class="accordion-collapse collapse show">
                    <div class="accordion-body pb-2">
                       <div class="d-flex align-items-center flex-wrap">
                            <div class="theme-colorsset me-2 mb-2">
                                <input type="radio" name="color" id="primaryColor" value="primary" checked="">
                                <label for="primaryColor" class="primary-clr"></label>
                            </div>
                            <div class="theme-colorsset me-2 mb-2">
                                <input type="radio" name="color" id="brightblueColor" value="brightblue">
                                <label for="brightblueColor" class="brightblue-clr"></label>
                            </div>
                            <div class="theme-colorsset me-2 mb-2">
                                <input type="radio" name="color" id="lunargreenColor" value="lunargreen">
                                <label for="lunargreenColor" class="lunargreen-clr"></label>
                            </div>
                            <div class="theme-colorsset me-2 mb-2">
                                <input type="radio" name="color" id="lavendarColor" value="lavendar">
                                <label for="lavendarColor" class="lavendar-clr"></label>
                            </div>
                            <div class="theme-colorsset me-2 mb-2">
                                <input type="radio" name="color" id="magentaColor" value="magenta">
                                <label for="magentaColor" class="magenta-clr"></label>
                            </div>
                            <div class="theme-colorsset me-2 mb-2">
                                <input type="radio" name="color" id="chromeyellowColor" value="chromeyellow">
                                <label for="chromeyellowColor" class="chromeyellow-clr"></label>
                            </div>  
                            <div class="theme-colorsset me-2 mb-2">
                                <input type="radio" name="color" id="lavaredColor" value="lavared">
                                <label for="lavaredColor" class="lavared-clr"></label>
                            </div>  
                           <div class="theme-colorsset mb-2">                                
                                <div class="pickr-container-primary" onchange="updateChartColor(this.value)"><div class="pickr">

        <button type="button" class="pcr-button" role="button" aria-label="toggle color picker dialog" style="--pcr-color: rgba(84, 109, 254, 1);"></button>

        
      </div></div>
                                <div class="theme-container-primary"><button class="">nano</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button text-dark fs-16" type="button" data-bs-toggle="collapse" data-bs-target="#loadersetting" aria-expanded="true">
                        Preloader
                    </button>
                </h2>
                <div id="loadersetting" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                        <div class="d-flex align-items-center">
                            <div class="theme-width me-2">
                                <input type="radio" name="loader" id="enableLoader" value="enable" checked="">
                                <label for="enableLoader" class="d-block rounded fs-12">With Preloader
                                </label>
                            </div>
                            <div class="theme-width">
                                <input type="radio" name="loader" id="disableLoader" value="disable">
                                <label for="disableLoader" class="d-block rounded fs-12">Without Preloader
                                </label>
                            </div>
                        </div>  
                    </div>
                </div>
            </div> 
        </div> 
    </div>
        <div class="p-3 pt-0">
            <div class="row gx-3">
                <div class="col-6">
                    <a href="#" id="resetbutton" class="btn btn-light close-theme w-100"><i class="ti ti-restore me-1"></i>Reset</a>
                </div>
                <div class="col-6">
                    <a href="#" class="btn btn-primary w-100" data-bs-dismiss="offcanvas"><i class="ti ti-shopping-cart-plus me-1"></i>Buy Product</a>
                </div>
            </div>
        </div>    
    </div>
            <svg id="SvgjsSvg1266" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;"><defs id="SvgjsDefs1267"></defs><polyline id="SvgjsPolyline1268" points="0,0"></polyline><path id="SvgjsPath1269" d="M0 0 "></path></svg><div class="pcr-app " data-theme="nano" aria-label="color picker dialog" role="window" style="top: 410.562px; left: 924.25px;">
          <div class="pcr-selection">
            <div class="pcr-color-preview">
              <button type="button" class="pcr-last-color" aria-label="use previous color" style="--pcr-color: rgba(84, 109, 254, 1);"></button>
              <div class="pcr-current-color" style="--pcr-color: rgba(84, 109, 254, 1);"></div>
            </div>

            <div class="pcr-color-palette">
              <div class="pcr-picker" style="left: calc(66.9291% - 9px); top: calc(0.392157% - 9px); background: rgb(84, 109, 254);"></div>
              <div class="pcr-palette" tabindex="0" aria-label="color selection area" role="listbox" style="background: linear-gradient(to top, rgb(0, 0, 0), transparent), linear-gradient(to left, rgb(0, 38, 255), rgb(255, 255, 255));"></div>
            </div>

            <div class="pcr-color-chooser">
              <div class="pcr-picker" style="left: calc(64.2157% - 9px); background-color: rgb(0, 38, 255);"></div>
              <div class="pcr-hue pcr-slider" tabindex="0" aria-label="hue selection slider" role="slider"></div>
            </div>

            <div class="pcr-color-opacity" style="display:none" hidden="">
              <div class="pcr-picker"></div>
              <div class="pcr-opacity pcr-slider" tabindex="0" aria-label="selection slider" role="slider"></div>
            </div>
          </div>

          <div class="pcr-swatches "></div>

          <div class="pcr-interaction">
            <input class="pcr-result" type="text" spellcheck="false" aria-label="color input field">

            <input class="pcr-type" data-type="HEXA" value="HEXA" type="button" style="display:none" hidden="">
            <input class="pcr-type active" data-type="RGBA" value="RGBA" type="button">
            <input class="pcr-type" data-type="HSLA" value="HSLA" type="button" style="display:none" hidden="">
            <input class="pcr-type" data-type="HSVA" value="HSVA" type="button" style="display:none" hidden="">
            <input class="pcr-type" data-type="CMYK" value="CMYK" type="button" style="display:none" hidden="">

            <input class="pcr-save" value="Save" type="button" style="display:none" hidden="" aria-label="save and close">
            <input class="pcr-cancel" value="Cancel" type="button" style="display:none" hidden="" aria-label="cancel and close">
            <input class="pcr-clear" value="Clear" type="button" style="display:none" hidden="" aria-label="clear and close">
          </div>
        </div><div class="pcr-app " data-theme="nano" aria-label="color picker dialog" role="window" style="top: 410.562px; left: 924.25px;">
          <div class="pcr-selection">
            <div class="pcr-color-preview">
              <button type="button" class="pcr-last-color" aria-label="use previous color" style="--pcr-color: rgba(84, 109, 254, 1);"></button>
              <div class="pcr-current-color" style="--pcr-color: rgba(84, 109, 254, 1);"></div>
            </div>

            <div class="pcr-color-palette">
              <div class="pcr-picker" style="left: calc(66.9291% - 9px); top: calc(0.392157% - 9px); background: rgb(84, 109, 254);"></div>
              <div class="pcr-palette" tabindex="0" aria-label="color selection area" role="listbox" style="background: linear-gradient(to top, rgb(0, 0, 0), transparent), linear-gradient(to left, rgb(0, 38, 255), rgb(255, 255, 255));"></div>
            </div>

            <div class="pcr-color-chooser">
              <div class="pcr-picker" style="left: calc(64.2157% - 9px); background-color: rgb(0, 38, 255);"></div>
              <div class="pcr-hue pcr-slider" tabindex="0" aria-label="hue selection slider" role="slider"></div>
            </div>

            <div class="pcr-color-opacity" style="display:none" hidden="">
              <div class="pcr-picker"></div>
              <div class="pcr-opacity pcr-slider" tabindex="0" aria-label="selection slider" role="slider"></div>
            </div>
          </div>

          <div class="pcr-swatches "></div>

          <div class="pcr-interaction">
            <input class="pcr-result" type="text" spellcheck="false" aria-label="color input field">

            <input class="pcr-type" data-type="HEXA" value="HEXA" type="button" style="display:none" hidden="">
            <input class="pcr-type active" data-type="RGBA" value="RGBA" type="button">
            <input class="pcr-type" data-type="HSLA" value="HSLA" type="button" style="display:none" hidden="">
            <input class="pcr-type" data-type="HSVA" value="HSVA" type="button" style="display:none" hidden="">
            <input class="pcr-type" data-type="CMYK" value="CMYK" type="button" style="display:none" hidden="">

            <input class="pcr-save" value="Save" type="button" style="display:none" hidden="" aria-label="save and close">
            <input class="pcr-cancel" value="Cancel" type="button" style="display:none" hidden="" aria-label="cancel and close">
            <input class="pcr-clear" value="Clear" type="button" style="display:none" hidden="" aria-label="clear and close">
          </div>
        </div><div class="pcr-app " data-theme="nano" aria-label="color picker dialog" role="window" style="top: 410.562px; left: 924.25px;">
          <div class="pcr-selection">
            <div class="pcr-color-preview">
              <button type="button" class="pcr-last-color" aria-label="use previous color" style="--pcr-color: rgba(84, 109, 254, 1);"></button>
              <div class="pcr-current-color" style="--pcr-color: rgba(84, 109, 254, 1);"></div>
            </div>

            <div class="pcr-color-palette">
              <div class="pcr-picker" style="left: calc(66.9291% - 9px); top: calc(0.392157% - 9px); background: rgb(84, 109, 254);"></div>
              <div class="pcr-palette" tabindex="0" aria-label="color selection area" role="listbox" style="background: linear-gradient(to top, rgb(0, 0, 0), transparent), linear-gradient(to left, rgb(0, 38, 255), rgb(255, 255, 255));"></div>
            </div>

            <div class="pcr-color-chooser">
              <div class="pcr-picker" style="left: calc(64.2157% - 9px); background-color: rgb(0, 38, 255);"></div>
              <div class="pcr-hue pcr-slider" tabindex="0" aria-label="hue selection slider" role="slider"></div>
            </div>

            <div class="pcr-color-opacity" style="display:none" hidden="">
              <div class="pcr-picker"></div>
              <div class="pcr-opacity pcr-slider" tabindex="0" aria-label="selection slider" role="slider"></div>
            </div>
          </div>

          <div class="pcr-swatches "></div>

          <div class="pcr-interaction">
            <input class="pcr-result" type="text" spellcheck="false" aria-label="color input field">

            <input class="pcr-type" data-type="HEXA" value="HEXA" type="button" style="display:none" hidden="">
            <input class="pcr-type active" data-type="RGBA" value="RGBA" type="button">
            <input class="pcr-type" data-type="HSLA" value="HSLA" type="button" style="display:none" hidden="">
            <input class="pcr-type" data-type="HSVA" value="HSVA" type="button" style="display:none" hidden="">
            <input class="pcr-type" data-type="CMYK" value="CMYK" type="button" style="display:none" hidden="">

            <input class="pcr-save" value="Save" type="button" style="display:none" hidden="" aria-label="save and close">
            <input class="pcr-cancel" value="Cancel" type="button" style="display:none" hidden="" aria-label="cancel and close">
            <input class="pcr-clear" value="Clear" type="button" style="display:none" hidden="" aria-label="clear and close">
          </div>
        </div><div class="pcr-app " data-theme="nano" aria-label="color picker dialog" role="window" style="top: 410.562px; left: 924.25px;">
          <div class="pcr-selection">
            <div class="pcr-color-preview">
              <button type="button" class="pcr-last-color" aria-label="use previous color" style="--pcr-color: rgba(84, 109, 254, 1);"></button>
              <div class="pcr-current-color" style="--pcr-color: rgba(84, 109, 254, 1);"></div>
            </div>

            <div class="pcr-color-palette">
              <div class="pcr-picker" style="left: calc(66.9291% - 9px); top: calc(0.392157% - 9px); background: rgb(84, 109, 254);"></div>
              <div class="pcr-palette" tabindex="0" aria-label="color selection area" role="listbox" style="background: linear-gradient(to top, rgb(0, 0, 0), transparent), linear-gradient(to left, rgb(0, 38, 255), rgb(255, 255, 255));"></div>
            </div>

            <div class="pcr-color-chooser">
              <div class="pcr-picker" style="left: calc(64.2157% - 9px); background-color: rgb(0, 38, 255);"></div>
              <div class="pcr-hue pcr-slider" tabindex="0" aria-label="hue selection slider" role="slider"></div>
            </div>

            <div class="pcr-color-opacity" style="display:none" hidden="">
              <div class="pcr-picker"></div>
              <div class="pcr-opacity pcr-slider" tabindex="0" aria-label="selection slider" role="slider"></div>
            </div>
          </div>

          <div class="pcr-swatches "></div>

          <div class="pcr-interaction">
            <input class="pcr-result" type="text" spellcheck="false" aria-label="color input field">

            <input class="pcr-type" data-type="HEXA" value="HEXA" type="button" style="display:none" hidden="">
            <input class="pcr-type active" data-type="RGBA" value="RGBA" type="button">
            <input class="pcr-type" data-type="HSLA" value="HSLA" type="button" style="display:none" hidden="">
            <input class="pcr-type" data-type="HSVA" value="HSVA" type="button" style="display:none" hidden="">
            <input class="pcr-type" data-type="CMYK" value="CMYK" type="button" style="display:none" hidden="">

            <input class="pcr-save" value="Save" type="button" style="display:none" hidden="" aria-label="save and close">
            <input class="pcr-cancel" value="Cancel" type="button" style="display:none" hidden="" aria-label="cancel and close">
            <input class="pcr-clear" value="Clear" type="button" style="display:none" hidden="" aria-label="clear and close">
          </div>
        </div></body><!-- Mirrored from smarthr.dreamstechnologies.com/html/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 22 Dec 2024 18:38:09 GMT --></html>