<!DOCTYPE html>
<html lang="en">
@extends('dashboard.layouts.header')


<body>

	<div id="global-loader">
		<div class="page-loader"></div>
	</div>

	<!-- Main Wrapper -->
	<div class="main-wrapper">

		<!-- Header -->
		<div class="header">
			<div class="main-header">

				<div class="header-left">
					<a href="https://smarthr.dreamstechnologies.com/html/template/index.html" class="logo">
						<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/logo.svg" alt="Logo">
					</a>
					<a href="https://smarthr.dreamstechnologies.com/html/template/index.html" class="dark-logo">
						<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/logo-white.svg" alt="Logo">
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
													<a href="https://smarthr.dreamstechnologies.com/html/template/contacts.html" class="d-flex align-items-center justify-content-between p-2 crm-link mb-3">
														<span class="d-flex align-items-center me-3">
															<i class="ti ti-user-shield text-default me-2"></i>Contacts
														</span>
														<i class="ti ti-arrow-right"></i>
													</a>
													<a href="https://smarthr.dreamstechnologies.com/html/template/deals-grid.html" class="d-flex align-items-center justify-content-between p-2 crm-link mb-3">
														<span class="d-flex align-items-center me-3">
															<i class="ti ti-heart-handshake text-default me-2"></i>Deals
														</span>
														<i class="ti ti-arrow-right"></i>
													</a>
													<a href="https://smarthr.dreamstechnologies.com/html/template/pipeline.html" class="d-flex align-items-center justify-content-between p-2 crm-link mb-3">
														<span class="d-flex align-items-center me-3">
															<i class="ti ti-timeline-event-text text-default me-2"></i>Pipeline
														</span>
														<i class="ti ti-arrow-right"></i>
													</a>
												</div>
												<div class="col-sm-6">
													<a href="https://smarthr.dreamstechnologies.com/html/template/companies-grid.html" class="d-flex align-items-center justify-content-between p-2 crm-link mb-3">
														<span class="d-flex align-items-center me-3">
															<i class="ti ti-building text-default me-2"></i>Companies
														</span>
														<i class="ti ti-arrow-right"></i>
													</a>
													<a href="https://smarthr.dreamstechnologies.com/html/template/leads-grid.html" class="d-flex align-items-center justify-content-between p-2 crm-link mb-3">
														<span class="d-flex align-items-center me-3">
															<i class="ti ti-user-check text-default me-2"></i>Leads
														</span>
														<i class="ti ti-arrow-right"></i>
													</a>
													<a href="https://smarthr.dreamstechnologies.com/html/template/activity.html" class="d-flex align-items-center justify-content-between p-2 crm-link mb-3">
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
							<a href="https://smarthr.dreamstechnologies.com/html/template/profile-settings.html" class="btn btn-menubar">
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
											<a href="#">
												<i class="ti ti-smart-home"></i><span>Dashboard</span>
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/index.html">Admin Dashboard</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/employee-dashboard.html">Employee Dashboard</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/deals-dashboard.html">Deals Dashboard</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/leads-dashboard.html">Leads Dashboard</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="#" class="active">
												<i class="ti ti-user-star"></i><span>Super Admin</span>
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/dashboard.html" class="active">Dashboard</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/companies.html">Companies</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/subscription.html">Subscriptions</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/packages.html">Packages</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/domain.html">Domain</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/purchase-transaction.html">Purchase Transaction</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="#">
												<i class="ti ti-layout-grid-add"></i><span>Applications</span>
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/chat.html">Chat</a></li>
												<li class="submenu submenu-two">
													<a href="https://smarthr.dreamstechnologies.com/html/template/call.html">Calls<span
															class="menu-arrow inside-submenu"></span></a>
													<ul>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/voice-call.html">Voice Call</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/video-call.html">Video Call</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/outgoing-call.html">Outgoing Call</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/incoming-call.html">Incoming Call</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/call-history.html">Call History</a></li>
													</ul>
												</li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/calendar.html">Calendar</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/email.html">Email</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/todo.html">To Do</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/notes.html">Notes</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/file-manager.html">File Manager</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/kanban-view.html">Kanban</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/invoices.html">Invoices</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="#">
												<i class="ti ti-layout-board-split"></i><span>Layouts</span>
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li>
													<a href="https://smarthr.dreamstechnologies.com/html/template/layout-horizontal.html">
														<span>Horizontal</span>
													</a>
												</li>
												<li>
													<a href="https://smarthr.dreamstechnologies.com/html/template/layout-detached.html">
														<span>Detached</span>
													</a>
												</li>
												<li>
													<a href="https://smarthr.dreamstechnologies.com/html/template/layout-modern.html">
														<span>Modern</span>
													</a>
												</li>
												<li>
													<a href="https://smarthr.dreamstechnologies.com/html/template/layout-two-column.html">
														<span>Two Column </span>
													</a>
												</li>
												<li>
													<a href="https://smarthr.dreamstechnologies.com/html/template/layout-hovered.html">
														<span>Hovered</span>
													</a>
												</li>
												<li>
													<a href="https://smarthr.dreamstechnologies.com/html/template/layout-box.html">
														<span>Boxed</span>
													</a>
												</li>
												<li>
													<a href="https://smarthr.dreamstechnologies.com/html/template/layout-horizontal-single.html">
														<span>Horizontal Single</span>
													</a>
												</li>
												<li>
													<a href="https://smarthr.dreamstechnologies.com/html/template/layout-horizontal-overlay.html">
														<span>Horizontal Overlay</span>
													</a>
												</li>
												<li>
													<a href="https://smarthr.dreamstechnologies.com/html/template/layout-horizontal-box.html">
														<span>Horizontal Box</span>
													</a>
												</li>
												<li>
													<a href="https://smarthr.dreamstechnologies.com/html/template/layout-horizontal-sidemenu.html">
														<span>Menu Aside</span>
													</a>
												</li>
												<li>
													<a href="https://smarthr.dreamstechnologies.com/html/template/layout-vertical-transparent.html">
														<span>Transparent</span>
													</a>
												</li>
												<li>
													<a href="https://smarthr.dreamstechnologies.com/html/template/layout-without-header.html">
														<span>Without Header</span>
													</a>
												</li>
												<li>
													<a href="https://smarthr.dreamstechnologies.com/html/template/layout-rtl.html">
														<span>RTL</span>
													</a>
												</li>
												<li>
													<a href="https://smarthr.dreamstechnologies.com/html/template/layout-dark.html">
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
													<a href="https://smarthr.dreamstechnologies.com/html/template/clients-grid.html"><span>Clients</span>
													</a>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);"><span>Projects</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/projects-grid.html">Projects</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/tasks.html">Tasks</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/task-board.html">Task Board</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="https://smarthr.dreamstechnologies.com/html/template/call.html">Crm<span
															class="menu-arrow"></span></a>
													<ul>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/contacts-grid.html"><span>Contacts</span></a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/companies-grid.html"><span>Companies</span></a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/deals-grid.html"><span>Deals</span></a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/leads-grid.html"><span>Leads</span></a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/pipeline.html"><span>Pipeline</span></a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/analytics.html"><span>Analytics</span></a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/activity.html"><span>Activities</span></a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);"><span>Employees</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/employees.html">Employee Lists</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/employees-grid.html">Employee Grid</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/employee-details.html">Employee Details</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/departments.html">Departments</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/designations.html">Designations</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/policy.html">Policies</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);"><span>Tickets</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/tickets.html">Tickets</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/ticket-details.html">Ticket Details</a></li>
													</ul>
												</li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/holidays.html"><span>Holidays</span></a></li>
												<li class="submenu">
													<a href="javascript:void(0);"><span>Attendance</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li class="submenu">
															<a href="javascript:void(0);">Leaves<span
																	class="menu-arrow"></span></a>
															<ul>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/leaves.html">Leaves (Admin)</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/leaves-employee.html">Leave (Employee)</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/leave-settings.html">Leave Settings</a></li>
															</ul>
														</li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/attendance-admin.html">Attendance (Admin)</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/attendance-employee.html">Attendance (Employee)</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/timesheets.html">Timesheets</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/schedule-timing.html">Shift & Schedule</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/overtime.html">Overtime</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);"><span>Performance</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/performance-indicator.html">Performance Indicator</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/performance-review.html">Performance Review</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/performance-appraisal.html">Performance Appraisal</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/goal-tracking.html">Goal List</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/goal-type.html">Goal Type</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);"><span>Training</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/training.html">Training List</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/trainers.html">Trainers</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/training-type.html">Training Type</a></li>
													</ul>
												</li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/promotion.html"><span>Promotion</span></a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/resignation.html"><span>Resignation</span></a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/termination.html"><span>Termination</span></a></li>
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
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/estimates.html">Estimates</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/invoices.html">Invoices</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/payments.html">Payments</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/expenses.html">Expenses</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/provident-fund.html">Provident Fund</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/taxes.html">Taxes</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);"><span>Accounting</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/categories.html">Categories</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/budgets.html">Budgets</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/budget-expenses.html">Budget Expenses</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/budget-revenues.html">Budget Revenues</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);"><span>Payroll</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/employee-salary.html">Employee Salary</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/payslip.html">Payslip</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/payroll.html">Payroll Items</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);"><span>Assets</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/assets.html">Assets</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/asset-categories.html">Asset Categories</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);"><span>Help & Supports</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/knowledgebase.html">Knowledge Base</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/activity.html">Activities</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);"><span>User Management</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/users.html">Users</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/roles-permissions.html">Roles & Permissions</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);"><span>Reports</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/expenses-report.html">Expense Report</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/invoice-report.html">Invoice Report</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/payment-report.html">Payment Report</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/project-report.html">Project Report</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/task-report.html">Task Report</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/user-report.html">User Report</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/employee-report.html">Employee Report</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/payslip-report.html">Payslip Report</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/attendance-report.html">Attendance Report</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/leave-report.html">Leave Report</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/daily-report.html">Daily Report</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);"><span>Settings</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li class="submenu">
															<a href="javascript:void(0);">General Settings<span
																	class="menu-arrow"></span></a>
															<ul>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/profile-settings.html">Profile</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/security-settings.html">Security</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/notification-settings.html">Notifications</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/connected-apps.html">Connected Apps</a></li>
															</ul>
														</li>
														<li class="submenu">
															<a href="javascript:void(0);">Website Settings<span
																	class="menu-arrow"></span></a>
															<ul>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/bussiness-settings.html">Business Settings</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/seo-settings.html">SEO Settings</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/localization-settings.html">Localization</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/prefixes.html">Prefixes</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/preferences.html">Preferences</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/performance-appraisal.html">Appearance</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/language.html">Language</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/authentication-settings.html">Authentication</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/ai-settings.html">AI Settings</a></li>
															</ul>
														</li>
														<li class="submenu">
															<a href="javascript:void(0);">App Settings<span
																	class="menu-arrow"></span></a>
															<ul>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/salary-settings.html">Salary Settings</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/approval-settings.html">Approval Settings</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/invoice-settings.html">Invoice Settings</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/leave-type.html">Leave Type</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/custom-fields.html">Custom Fields</a></li>
															</ul>
														</li>
														<li class="submenu">
															<a href="javascript:void(0);">System Settings<span
																	class="menu-arrow"></span></a>
															<ul>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/email-settings.html">Email Settings</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/email-template.html">Email Templates</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/sms-settings.html">SMS Settings</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/sms-template.html">SMS Templates</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/otp-settings.html">OTP</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/gdpr.html">GDPR Cookies</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/maintenance-mode.html">Maintenance Mode</a></li>
															</ul>
														</li>
														<li class="submenu">
															<a href="javascript:void(0);">Financial Settings<span
																	class="menu-arrow"></span></a>
															<ul>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/payment-gateways.html">Payment Gateways</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/tax-rates.html">Tax Rate</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/currencies.html">Currencies</a></li>
															</ul>
														</li>
														<li class="submenu">
															<a href="javascript:void(0);">Other Settings<span
																	class="menu-arrow"></span></a>
															<ul>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/custom-css.html">Custom CSS</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/custom-js.html">Custom JS</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/cronjob.html">Cronjob</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/storage-settings.html">Storage</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/ban-ip-address.html">Ban IP Address</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/backup.html">Backup</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/clear-cache.html">Clear Cache</a></li>
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
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/starter.html"><span>Starter</span></a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/profile.html"><span>Profile</span></a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/gallery.html"><span>Gallery</span></a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/search-result.html"><span>Search Results</span></a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/timeline.html"><span>Timeline</span></a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/pricing.html"><span>Pricing</span></a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/coming-soon.html"><span>Coming Soon</span></a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/under-maintenance.html"><span>Under Maintenance</span></a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/under-construction.html"><span>Under Construction</span></a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/api-keys.html"><span>API Keys</span></a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/privacy-policy.html"><span>Privacy Policy</span></a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/terms-condition.html"><span>Terms & Conditions</span></a></li>
												<li class="submenu">
													<a href="#"><span>Content</span> <span class="menu-arrow"></span></a>
													<ul>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/pages.html">Pages</a></li>
														<li class="submenu">
															<a href="javascript:void(0);">Blogs<span class="menu-arrow"></span></a>
															<ul>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/blogs.html">All Blogs</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/blog-categories.html">Categories</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/blog-comments.html">Comments</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/blog-tags.html">Tags</a></li>
															</ul>
														</li>
														<li class="submenu">
															<a href="javascript:void(0);">Locations<span class="menu-arrow"></span></a>
															<ul>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/countries.html">Countries</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/states.html">States</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/cities.html">Cities</a></li>
															</ul>
														</li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/testimonials.html">Testimonials</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/faq.html">FAQ’S</a></li>
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
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/login.html">Cover</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/login-2.html">Illustration</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/login-3.html">Basic</a></li>
															</ul>
														</li>
														<li class="submenu">
															<a href="javascript:void(0);" class="">Register<span class="menu-arrow"></span></a>
															<ul>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/register.html">Cover</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/register-2.html">Illustration</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/register-3.html">Basic</a></li>
															</ul>
														</li>
														<li class="submenu"><a href="javascript:void(0);">Forgot Password<span class="menu-arrow"></span></a>
															<ul>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/forgot-password.html">Cover</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/forgot-password-2.html">Illustration</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/forgot-password-3.html">Basic</a></li>
															</ul>
														</li>
														<li class="submenu">
															<a href="javascript:void(0);">Reset Password<span class="menu-arrow"></span></a>
															<ul>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/reset-password.html">Cover</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/reset-password-2.html">Illustration</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/reset-password-3.html">Basic</a></li>
															</ul>
														</li>
														<li class="submenu">
															<a href="javascript:void(0);">Email Verification<span class="menu-arrow"></span></a>
															<ul>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/email-verification.html">Cover</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/email-verification-2.html">Illustration</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/email-verification-3.html">Basic</a></li>
															</ul>
														</li>
														<li class="submenu">
															<a href="javascript:void(0);">2 Step Verification<span class="menu-arrow"></span></a>
															<ul>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/two-step-verification.html">Cover</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/two-step-verification-2.html">Illustration</a></li>
																<li><a href="https://smarthr.dreamstechnologies.com/html/template/two-step-verification-3.html">Basic</a></li>
															</ul>
														</li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/lock-screen.html">Lock Screen</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/error-404.html">404 Error</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/error-500.html">500 Error</a></li>
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
																	<a href="https://smarthr.dreamstechnologies.com/html/template/ui-alerts.html">Alerts</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/ui-accordion.html">Accordion</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/ui-avatar.html">Avatar</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/ui-badges.html">Badges</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/ui-borders.html">Border</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/ui-buttons.html">Buttons</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/ui-buttons-group.html">Button Group</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/ui-breadcrumb.html">Breadcrumb</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/ui-cards.html">Card</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/ui-carousel.html">Carousel</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/ui-colors.html">Colors</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/ui-dropdowns.html">Dropdowns</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/ui-grid.html">Grid</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/ui-images.html">Images</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/ui-lightbox.html">Lightbox</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/ui-media.html">Media</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/ui-modals.html">Modals</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/ui-offcanvas.html">Offcanvas</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/ui-pagination.html">Pagination</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/ui-popovers.html">Popovers</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/ui-progress.html">Progress</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/ui-placeholders.html">Placeholders</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/ui-spinner.html">Spinner</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/ui-sweetalerts.html">Sweet Alerts</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/ui-nav-tabs.html">Tabs</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/ui-toasts.html">Toasts</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/ui-tooltips.html">Tooltips</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/ui-typography.html">Typography</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/ui-video.html">Video</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/ui-sortable.html">Sortable</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/ui-swiperjs.html">Swiperjs</a>
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
																	<a href="https://smarthr.dreamstechnologies.com/html/template/ui-ribbon.html">Ribbon</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/ui-clipboard.html">Clipboard</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/ui-drag-drop.html">Drag & Drop</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/ui-rangeslider.html">Range Slider</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/ui-rating.html">Rating</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/ui-text-editor.html">Text Editor</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/ui-counter.html">Counter</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/ui-scrollbar.html">Scrollbar</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/ui-stickynote.html">Sticky Note</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/ui-timeline.html">Timeline</a>
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
																			<a href="https://smarthr.dreamstechnologies.com/html/template/form-basic-inputs.html">Basic Inputs</a>
																		</li>
																		<li>
																			<a href="https://smarthr.dreamstechnologies.com/html/template/form-checkbox-radios.html">Checkbox & Radios</a>
																		</li>
																		<li>
																			<a href="https://smarthr.dreamstechnologies.com/html/template/form-input-groups.html">Input Groups</a>
																		</li>
																		<li>
																			<a href="https://smarthr.dreamstechnologies.com/html/template/form-grid-gutters.html">Grid & Gutters</a>
																		</li>
																		<li>
																			<a href="https://smarthr.dreamstechnologies.com/html/template/form-select.html">Form Select</a>
																		</li>
																		<li>
																			<a href="https://smarthr.dreamstechnologies.com/html/template/form-mask.html">Input Masks</a>
																		</li>
																		<li>
																			<a href="https://smarthr.dreamstechnologies.com/html/template/form-fileupload.html">File Uploads</a>
																		</li>
																	</ul>
																</li>
																<li class="submenu submenu-two">
																	<a href="javascript:void(0);">Layouts <span class="menu-arrow inside-submenu"></span>
																	</a>
																	<ul>
																		<li>
																			<a href="https://smarthr.dreamstechnologies.com/html/template/form-horizontal.html">Horizontal Form</a>
																		</li>
																		<li>
																			<a href="https://smarthr.dreamstechnologies.com/html/template/form-vertical.html">Vertical Form</a>
																		</li>
																		<li>
																			<a href="https://smarthr.dreamstechnologies.com/html/template/form-floating-labels.html">Floating Labels</a>
																		</li>
																	</ul>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/form-validation.html">Form Validation</a>
																</li>

																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/form-select2.html">Select2</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/form-wizard.html">Form Wizard</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/form-pickers.html">Form Pickers</a>
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
																	<a href="https://smarthr.dreamstechnologies.com/html/template/tables-basic.html">Basic Tables </a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/data-tables.html">Data Table </a>
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
																	<a href="https://smarthr.dreamstechnologies.com/html/template/chart-apex.html">Apex Charts</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/chart-c3.html">Chart C3</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/chart-js.html">Chart Js</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/chart-morris.html">Morris Charts</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/chart-flot.html">Flot Charts</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/chart-peity.html">Peity Charts</a>
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
																	<a href="https://smarthr.dreamstechnologies.com/html/template/icon-fontawesome.html">Fontawesome Icons</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/icon-tabler.html">Tabler Icons</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/icon-bootstrap.html">Bootstrap Icons</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/icon-remix.html">Remix Icons</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/icon-feather.html">Feather Icons</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/icon-ionic.html">Ionic Icons</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/icon-material.html">Material Icons</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/icon-pe7.html">Pe7 Icons</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/icon-simpleline.html">Simpleline Icons</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/icon-themify.html">Themify Icons</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/icon-weather.html">Weather Icons</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/icon-typicon.html">Typicon Icons</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/icon-flag.html">Flag Icons</a>
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
																	<a href="https://smarthr.dreamstechnologies.com/html/template/maps-vector.html">Vector</a>
																</li>
																<li>
																	<a href="https://smarthr.dreamstechnologies.com/html/template/maps-leaflet.html">Leaflet</a>
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
															<a href="javascript:void(0);">Multilevel 2<span
																	class="menu-arrow inside-submenu"></span></a>
															<ul>
																<li><a href="javascript:void(0);">Multilevel 2.1</a></li>
																<li class="submenu submenu-two submenu-three">
																	<a href="javascript:void(0);">Multilevel 2.2<span
																			class="menu-arrow inside-submenu inside-submenu-two"></span></a>
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
											<a href="https://smarthr.dreamstechnologies.com/html/template/calendar.html" class="d-block pb-2">
												<span class="avatar avatar-md bg-transparent-dark me-2"><i class="ti ti-calendar text-gray-9"></i></span>Calendar
											</a>
											<a href="https://smarthr.dreamstechnologies.com/html/template/todo.html" class="d-block py-2">
												<span class="avatar avatar-md bg-transparent-dark me-2"><i class="ti ti-subtask text-gray-9"></i></span>To Do
											</a>
											<a href="https://smarthr.dreamstechnologies.com/html/template/notes.html" class="d-block py-2">
												<span class="avatar avatar-md bg-transparent-dark me-2"><i class="ti ti-notes text-gray-9"></i></span>Notes
											</a>
											<a href="https://smarthr.dreamstechnologies.com/html/template/file-manager.html" class="d-block py-2">
												<span class="avatar avatar-md bg-transparent-dark me-2"><i class="ti ti-folder text-gray-9"></i></span>File Manager
											</a>
											<a href="https://smarthr.dreamstechnologies.com/html/template/kanban-view.html" class="d-block py-2">
												<span class="avatar avatar-md bg-transparent-dark me-2"><i class="ti ti-layout-kanban text-gray-9"></i></span>Kanban
											</a>
											<a href="https://smarthr.dreamstechnologies.com/html/template/invoices.html" class="d-block py-2 pb-0">
												<span class="avatar avatar-md bg-transparent-dark me-2"><i class="ti ti-file-invoice text-gray-9"></i></span>Invoices
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="me-1">
								<a href="https://smarthr.dreamstechnologies.com/html/template/chat.html" class="btn btn-menubar position-relative">
									<i class="ti ti-brand-hipchat"></i>
									<span class="badge bg-info rounded-pill d-flex align-items-center justify-content-center header-badge">5</span>
								</a>
							</div>
							<div class="me-1">
								<a href="https://smarthr.dreamstechnologies.com/html/template/email.html" class="btn btn-menubar">
									<i class="ti ti-mail"></i>
								</a>
							</div>
							<div class="me-1 notification_item">
								<a href="#" class="btn btn-menubar position-relative me-1" id="notification_popup"
									data-bs-toggle="dropdown">
									<i class="ti ti-bell"></i>
									<span class="notification-status-dot"></span>
								</a>
								<div class="dropdown-menu dropdown-menu-end notification-dropdown p-4">
									<div class="d-flex align-items-center justify-content-between border-bottom p-0 pb-3 mb-3">
										<h4 class="notification-title">Notifications (2)</h4>
										<div class="d-flex align-items-center">
											<a href="#" class="text-primary fs-15 me-3 lh-1">Mark all as read</a>
											<div class="dropdown">
												<a href="javascript:void(0);" class="bg-white dropdown-toggle"
													data-bs-toggle="dropdown">
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
												<a href="https://smarthr.dreamstechnologies.com/html/template/activity.html">
													<div class="d-flex">
														<span class="avatar avatar-lg me-2 flex-shrink-0">
															<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-27.jpg" alt="Profile">
														</span>
														<div class="flex-grow-1">
															<p class="mb-1"><span
																	class="text-dark fw-semibold">Shawn</span>
																performance in Math is below the threshold.</p>
															<span>Just Now</span>
														</div>
													</div>
												</a>
											</div>
											<div class="border-bottom mb-3 pb-3">
												<a href="https://smarthr.dreamstechnologies.com/html/template/activity.html" class="pb-0">
													<div class="d-flex">
														<span class="avatar avatar-lg me-2 flex-shrink-0">
															<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-23.jpg" alt="Profile">
														</span>
														<div class="flex-grow-1">
															<p class="mb-1"><span
																	class="text-dark fw-semibold">Sylvia</span> added
																appointment on 02:00 PM</p>
															<span>10 mins ago</span>
															<div
																class="d-flex justify-content-start align-items-center mt-1">
																<span class="btn btn-light btn-sm me-2">Deny</span>
																<span class="btn btn-primary btn-sm">Approve</span>
															</div>
														</div>
													</div>
												</a>
											</div>
											<div class="border-bottom mb-3 pb-3">
												<a href="https://smarthr.dreamstechnologies.com/html/template/activity.html">
													<div class="d-flex">
														<span class="avatar avatar-lg me-2 flex-shrink-0">
															<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-25.jpg" alt="Profile">
														</span>
														<div class="flex-grow-1">
															<p class="mb-1">New student record <span class="text-dark fw-semibold"> George</span>
																is created by <span class="text-dark fw-semibold">Teressa</span>
															</p>
															<span>2 hrs ago</span>
														</div>
													</div>
												</a>
											</div>
											<div class="border-0 mb-3 pb-0">
												<a href="https://smarthr.dreamstechnologies.com/html/template/activity.html">
													<div class="d-flex">
														<span class="avatar avatar-lg me-2 flex-shrink-0">
															<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-01.jpg" alt="Profile">
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
										<a href="https://smarthr.dreamstechnologies.com/html/template/activity.html" class="btn btn-primary w-100">View All</a>
									</div>
								</div>
							</div>
							<div class="dropdown profile-dropdown">
								<a href="javascript:void(0);" class="dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
									<span class="avatar avatar-sm online">
										<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-12.jpg" alt="Img" class="img-fluid rounded-circle">
									</span>
								</a>
								<div class="dropdown-menu shadow-none">
									<div class="card mb-0">
										<div class="card-header">
											<div class="d-flex align-items-center">
												<span class="avatar avatar-lg me-2 avatar-rounded">
													<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-12.jpg" alt="img">
												</span>
												<div>
													<h5 class="mb-0">Kevin Larry</h5>
													<p class="fs-12 fw-medium mb-0"><a href="https://smarthr.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="cabdabb8b8afa48aafb2aba7baa6afe4a9a5a7">[email&#160;protected]</a></p>
												</div>
											</div>
										</div>
										<div class="card-body">
											<a class="dropdown-item d-inline-flex align-items-center p-0 py-2"
												href="https://smarthr.dreamstechnologies.com/html/template/profile.html">
												<i class="ti ti-user-circle me-1"></i>My Profile
											</a>
											<a class="dropdown-item d-inline-flex align-items-center p-0 py-2" href="https://smarthr.dreamstechnologies.com/html/template/bussiness-settings.html">
												<i class="ti ti-settings me-1"></i>Settings
											</a>

											<a class="dropdown-item d-inline-flex align-items-center p-0 py-2"
												href="https://smarthr.dreamstechnologies.com/html/template/profile-settings.html">
												<i class="ti ti-circle-arrow-up me-1"></i>My Account
											</a>
											<a class="dropdown-item d-inline-flex align-items-center p-0 py-2" href="https://smarthr.dreamstechnologies.com/html/template/knowledgebase.html">
												<i class="ti ti-question-mark me-1"></i>Knowledge Base
											</a>
										</div>
										<div class="card-footer py-1">
											<a class="dropdown-item d-inline-flex align-items-center p-0 py-2" href="https://smarthr.dreamstechnologies.com/html/template/login.html"><i class="ti ti-login me-2"></i>Logout</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Mobile Menu -->
				<div class="dropdown mobile-user-menu">
					<a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
						<i class="fa fa-ellipsis-v"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-end">
						<a class="dropdown-item" href="https://smarthr.dreamstechnologies.com/html/template/profile.html">My Profile</a>
						<a class="dropdown-item" href="https://smarthr.dreamstechnologies.com/html/template/profile-settings.html">Settings</a>
						<a class="dropdown-item" href="https://smarthr.dreamstechnologies.com/html/template/login.html">Logout</a>
					</div>
				</div>
				<!-- /Mobile Menu -->

			</div>

		</div>
		<!-- /Header -->

	@include('dashboard.layouts.sidebar')
    @




	</div>
	<!-- /Main Wrapper -->

	<!-- jQuery -->
	<script data-cfasync="false" src="https://smarthr.dreamstechnologies.com/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://smarthr.dreamstechnologies.com/html/template/assets/js/jquery-3.7.1.min.js" type="8839293e20295dfe9c85554d-text/javascript"></script>

	<!-- Bootstrap Core JS -->
	<script src="https://smarthr.dreamstechnologies.com/html/template/assets/js/bootstrap.bundle.min.js" type="8839293e20295dfe9c85554d-text/javascript"></script>

	<!-- Feather Icon JS -->
	<script src="https://smarthr.dreamstechnologies.com/html/template/assets/js/feather.min.js" type="8839293e20295dfe9c85554d-text/javascript"></script>

	<!-- Slimscroll JS -->
	<script src="https://smarthr.dreamstechnologies.com/html/template/assets/js/jquery.slimscroll.min.js" type="8839293e20295dfe9c85554d-text/javascript"></script>

	<!-- Chart JS -->
	<script src="https://smarthr.dreamstechnologies.com/html/template/assets/plugins/apexchart/apexcharts.min.js" type="8839293e20295dfe9c85554d-text/javascript"></script>
	<script src="https://smarthr.dreamstechnologies.com/html/template/assets/plugins/apexchart/chart-data.js" type="8839293e20295dfe9c85554d-text/javascript"></script>

	<!-- Chart JS -->
	<script src="https://smarthr.dreamstechnologies.com/html/template/assets/plugins/chartjs/chart.min.js" type="8839293e20295dfe9c85554d-text/javascript"></script>
	<script src="https://smarthr.dreamstechnologies.com/html/template/assets/plugins/chartjs/chart-data.js" type="8839293e20295dfe9c85554d-text/javascript"></script>

	<!-- Datetimepicker JS -->
	<script src="https://smarthr.dreamstechnologies.com/html/template/assets/js/moment.js" type="8839293e20295dfe9c85554d-text/javascript"></script>
	<script src="https://smarthr.dreamstechnologies.com/html/template/assets/js/bootstrap-datetimepicker.min.js" type="8839293e20295dfe9c85554d-text/javascript"></script>

	<!-- Daterangepikcer JS -->
	<script src="https://smarthr.dreamstechnologies.com/html/template/assets/plugins/daterangepicker/daterangepicker.js" type="8839293e20295dfe9c85554d-text/javascript"></script>

	<!-- Summernote JS -->
	<script src="https://smarthr.dreamstechnologies.com/html/template/assets/plugins/summernote/summernote-lite.min.js" type="8839293e20295dfe9c85554d-text/javascript"></script>

	<!-- Select2 JS -->
	<script src="https://smarthr.dreamstechnologies.com/html/template/assets/plugins/select2/js/select2.min.js" type="8839293e20295dfe9c85554d-text/javascript"></script>

	<!-- Chart JS -->
	<script src="https://smarthr.dreamstechnologies.com/html/template/assets/plugins/peity/jquery.peity.min.js" type="8839293e20295dfe9c85554d-text/javascript"></script>
	<script src="https://smarthr.dreamstechnologies.com/html/template/assets/plugins/peity/chart-data.js" type="8839293e20295dfe9c85554d-text/javascript"></script>

	<!-- Color Picker JS -->
	<script src="https://smarthr.dreamstechnologies.com/html/template/assets/plugins/@simonwep/pickr/pickr.es5.min.js" type="8839293e20295dfe9c85554d-text/javascript"></script>

	<!-- Custom JS -->
	<script src="https://smarthr.dreamstechnologies.com/html/template/assets/js/theme-colorpicker.js" type="8839293e20295dfe9c85554d-text/javascript"></script>
	<script src="https://smarthr.dreamstechnologies.com/html/template/assets/js/script.js" type="8839293e20295dfe9c85554d-text/javascript"></script>

<script src="https://smarthr.dreamstechnologies.com/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="8839293e20295dfe9c85554d-|49" defer></script></body>


<!-- Mirrored from smarthr.dreamstechnologies.com/html/template/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 22 Dec 2024 18:38:21 GMT -->
</html>
