<!DOCTYPE html>
<html lang="en">
@include('dashboard.layouts.header')
@php
    $currentLang = app()->getLocale(); // or any other way to get current language
@endphp
<body   class="{{ $currentLang == 'ar' ? 'layout-mode-rtl' : 'ltr' }}">
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
							<a id="toggle_btn" href="{{ route('logout') }}" class="btn btn-menubar me-1" title="Logout">
								<i class="ti ti-arrow-bar-to-left"></i>
							</a>


						</div>


						<!-- /Horizontal Single -->

						<div class="d-flex align-items-center">
							<div class="me-1">
								<a href="#" class="btn btn-menubar btnFullscreen">
									<i class="ti ti-maximize"></i>
								</a>
							</div>
                            @php
                            use App\Models\Utility;
                            $users = \Auth::user();
                            $currantLang = $users->currentLanguage();
                            $languages = Utility::languages();
                            $profile = asset(Storage::url('uploads/avatar/'));
                             @endphp
                            <li class="dropdown">
                                <a class="dropdown-toggle count-info" href="#" id="languageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <!-- Increase size of the globe icon -->
                                    <i class="fa fa-globe text-warning fa-1x"></i> <!-- Increase icon size here -->
                                </a>
                            <ul class="dropdown-menu   {{ $currantLang == 'ar' ? 'dropdown-menu-left' : '' }}"
                                aria-labelledby="languageDropdown"
                                style="position: absolute; transform: translate3d(0px, 30px, 0px); top: 0px; right: 0px; width:  80px; min-width: 0; will-change: transform;">

                                <div class="dropdown-divider"></div> <!-- Divider after the first item -->

                                @foreach($languages as $key => $language)
                                    @if($language != 'urdu') <!-- Skip 'urdu' language -->
                                        <li>
                                            <a class="dropdown-item @if($language == $currantLang) text-danger @endif"
                                               href="{{ route('change.language', $language) }}">
                                                @if($language == 'ar')
                                                    العربية
                                                @else
                                                    English
                                                @endif
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                            </li>

                            </li>

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

		<!-- Horizontal Menu -->
		<div class="sidebar sidebar-horizontal" id="horizontal-menu">
			<div class="sidebar-menu">
				<div class="main-menu">
					<ul class="nav-menu">
						<li class="menu-title">
							<span>Main</span>
						</li>
						<li class="submenu">
							<a href="#"   class="active subdrop">
								<i class="ti ti-smart-home"></i><span>Dashboard</span>
								<span class="menu-arrow"></span>
							</a>
							<ul>
								<li><a href="https://smarthr.dreamstechnologies.com/html/template/index.html">Admin Dashboard</a></li>
								<li><a href="https://smarthr.dreamstechnologies.com/html/template/employee-dashboard.html" class="active">Employee Dashboard</a></li>
								<li><a href="https://smarthr.dreamstechnologies.com/html/template/deals-dashboard.html">Deals Dashboard</a></li>
								<li><a href="https://smarthr.dreamstechnologies.com/html/template/leads-dashboard.html">Leads Dashboard</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="#">
								<i class="ti ti-user-star"></i><span>Super Admin</span>
								<span class="menu-arrow"></span>
							</a>
							<ul>
								<li><a href="https://smarthr.dreamstechnologies.com/html/template/dashboard.html">Dashboard</a></li>
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
									<a href="https://smarthr.dreamstechnologies.com/html/template/call.html">Crm<span class="menu-arrow"></span></a>
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
					<div class="d-xl-flex align-items-center d-none">
						<a href="#" class="me-3 avatar avatar-sm">
							<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-07.jpg" alt="profile" class="rounded-circle">
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
					<a href="https://smarthr.dreamstechnologies.com/html/template/index.html" class="logo-small">
						<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/logo-small.svg" alt="Logo">
					</a>
					<div class="sidebar-left slimscroll">
						<div class="nav flex-column align-items-center nav-pills" id="sidebar-tabs" role="tablist"
							aria-orientation="vertical">
							<a href="#" class="nav-link active" title="Dashboard" data-bs-toggle="tab" data-bs-target="#dashboard">
								<i class="ti ti-smart-home"></i>
							</a>
							<a href="#" class="nav-link" title="Apps" data-bs-toggle="tab" data-bs-target="#application">
								<i class="ti ti-layout-grid-add"></i>
							</a>
							<a href="#" class="nav-link" title="Super Admin" data-bs-toggle="tab" data-bs-target="#super-admin">
								<i class="ti ti-user-star"></i>
							</a>
							<a href="#" class="nav-link" title="Layout" data-bs-toggle="tab" data-bs-target="#layout">
								<i class="ti ti-layout-board-split"></i>
							</a>
							<a href="#" class="nav-link" title="Projects" data-bs-toggle="tab" data-bs-target="#projects">
								<i class="ti ti-users-group"></i>
							</a>
							<a href="#" class="nav-link" title="Crm" data-bs-toggle="tab" data-bs-target="#crm">
								<i class="ti ti-user-shield"></i>
							</a>
							<a href="#" class="nav-link" title="Hrm" data-bs-toggle="tab" data-bs-target="#hrm">
								<i class="ti ti-user"></i>
							</a>
							<a href="#" class="nav-link" title="Finance" data-bs-toggle="tab" data-bs-target="#finance">
								<i class="ti ti-shopping-cart-dollar"></i>
							</a>
							<a href="#" class="nav-link" title="Administration" data-bs-toggle="tab" data-bs-target="#administration">
								<i class="ti ti-cash"></i>
							</a>
							<a href="#" class="nav-link" title="Content" data-bs-toggle="tab" data-bs-target="#content">
								<i class="ti ti-license"></i>
							</a>
							<a href="#" class="nav-link" title="Pages" data-bs-toggle="tab" data-bs-target="#pages">
								<i class="ti ti-page-break"></i>
							</a>
							<a href="#" class="nav-link" title="Authentication" data-bs-toggle="tab"
								data-bs-target="#authentication">
								<i class="ti ti-lock-check"></i>
							</a>
							<a href="#" class="nav-link " title="UI Elements" data-bs-toggle="tab"
								data-bs-target="#ui-elements">
								<i class="ti ti-ux-circle"></i>
							</a>
							<a href="#" class="nav-link" title="Extras" data-bs-toggle="tab" data-bs-target="#extras">
								<i class="ti ti-vector-triangle"></i>
							</a>
						</div>
					</div>
				</div>
				<div class="sidebar-right">
					<div class="sidebar-logo mb-4">
						<a href="https://smarthr.dreamstechnologies.com/html/template/index.html" class="logo logo-normal">
							<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/logo.svg" alt="Logo">
						</a>
						<a href="https://smarthr.dreamstechnologies.com/html/template/index.html" class="dark-logo">
							<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/logo-white.svg" alt="Logo">
						</a>
					</div>
					<div class="sidebar-scroll">
						<h6 class="mb-3">Welcome to SmartHR</h6>
						<div class="text-center rounded bg-light p-3 mb-4">
							<div class="avatar avatar-lg online mb-3">
								<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-02.jpg" alt="Img" class="img-fluid rounded-circle">
							</div>
							<h6 class="fs-12 fw-normal mb-1">Adrian Herman</h6>
							<p class="fs-10">System Admin</p>
						</div>
						<div class="tab-content" id="v-pills-tabContent">
							<div class="tab-pane fade show active" id="dashboard">
								<ul>
									<li class="menu-title"><span>MAIN MENU</span></li>
									<li><a href="https://smarthr.dreamstechnologies.com/html/template/index.html">Admin Dashboard</a></li>
									<li><a href="https://smarthr.dreamstechnologies.com/html/template/employee-dashboard.html" class="active">Employee Dashboard</a></li>
									<li><a href="https://smarthr.dreamstechnologies.com/html/template/deals-dashboard.html">Deals Dashboard</a></li>
									<li><a href="https://smarthr.dreamstechnologies.com/html/template/leads-dashboard.html">Leads Dashboard</a></li>
								</ul>
							</div>

							<div class="tab-pane fade" id="projects">
								<ul>
									<li class="menu-title"><span>PROJECTS</span></li>
									<li><a href="https://smarthr.dreamstechnologies.com/html/template/clients-grid.html">Clients</a></li>
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
					<a href="https://smarthr.dreamstechnologies.com/html/template/index.html" class="logo-small">
						<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/logo-small.svg" alt="Logo">
					</a>
					<div class="sidebar-left slimscroll">
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
								<a href="https://smarthr.dreamstechnologies.com/html/template/calendar.html" class="btn btn-menubar">
									<i class="ti ti-layout-grid-remove"></i>
								</a>
							</div>
							<div class="mb-1">
								<a href="https://smarthr.dreamstechnologies.com/html/template/chat.html" class="btn btn-menubar position-relative">
									<i class="ti ti-brand-hipchat"></i>
									<span class="badge bg-info rounded-pill d-flex align-items-center justify-content-center header-badge">5</span>
								</a>
							</div>
							<div class="mb-1">
								<a href="https://smarthr.dreamstechnologies.com/html/template/email.html" class="btn btn-menubar">
									<i class="ti ti-mail"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="sidebar-right d-flex justify-content-between flex-column">
					<div class="sidebar-scroll">
						<h6 class="mb-3">Welcome to SmartHR</h6>
						<div class="sidebar-profile text-center rounded bg-light p-3 mb-4">
							<div class="avatar avatar-lg online mb-3">
								<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-02.jpg" alt="Img" class="img-fluid rounded-circle">
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
										<a href="#menu-application" role="tab" class="nav-link" title="Apps" data-bs-toggle="tab" data-bs-target="#menu-application" aria-selected="false">
											<span><i class="ti ti-layout-grid-add"></i></span>
											<p>Applications</p>
										</a>
									</div>
									<div class="col-6">
										<a href="#menu-superadmin" role="tab" class="nav-link" title="Apps" data-bs-toggle="tab" data-bs-target="#menu-superadmin" aria-selected="false">
											<span><i class="ti ti-user-star"></i></span>
											<p>Super Admin</p>
										</a>
									</div>
									<div class="col-6">
										<a href="#menu-layout" role="tab" class="nav-link" title="Layout" data-bs-toggle="tab" data-bs-target="#menu-layout" aria-selected="false">
											<span><i class="ti ti-layout-board-split"></i></span>
											<p>Layouts</p>
										</a>
									</div>
									<div class="col-6">
										<a href="#menu-project" role="tab" class="nav-link" title="Projects" data-bs-toggle="tab" data-bs-target="#menu-project" aria-selected="false">
											<span><i class="ti ti-folder"></i></span>
											<p>Projects</p>
										</a>
									</div>
									<div class="col-6">
										<a href="#menu-crm" role="tab" class="nav-link" title="CRM" data-bs-toggle="tab" data-bs-target="#menu-crm" aria-selected="false">
											<span><i class="ti ti-user-shield"></i></span>
											<p>Crm</p>
										</a>
									</div>
									<div class="col-6">
										<a href="#menu-hrm" role="tab" class="nav-link" title="HRM" data-bs-toggle="tab" data-bs-target="#menu-hrm" aria-selected="false">
											<span><i class="ti ti-users"></i></span>
											<p>Hrm</p>
										</a>
									</div>
									<div class="col-6">
										<a href="#menu-finance" role="tab" class="nav-link" title="Finance & Accounts" data-bs-toggle="tab" data-bs-target="#menu-finance" aria-selected="false">
											<span><i class="ti ti-shopping-cart-dollar"></i></span>
											<p>Finance & Accounts</p>
										</a>
									</div>
									<div class="col-6">
										<a href="#menu-administration" role="tab" class="nav-link" title="Administration" data-bs-toggle="tab" data-bs-target="#menu-administration" aria-selected="false">
											<span><i class="ti ti-cash"></i></span>
											<p>Administration</p>
										</a>
									</div>
									<div class="col-6">
										<a href="#menu-content" role="tab" class="nav-link" title="Content" data-bs-toggle="tab" data-bs-target="#menu-content" aria-selected="false">
											<span><i class="ti ti-license"></i></span>
											<p>Contents</p>
										</a>
									</div>
									<div class="col-6">
										<a href="#menu-pages" role="tab" class="nav-link" title="Pages"
											data-bs-toggle="tab" data-bs-target="#menu-pages" aria-selected="false">
											<span><i class="ti ti-page-break"></i></span>
											<p>Pages</p>
										</a>
									</div>
									<div class="col-6">
										<a href="#menu-authentication" role="tab" class="nav-link" title="Authentication" data-bs-toggle="tab" data-bs-target="#menu-authentication" aria-selected="false">
											<span><i class="ti ti-lock-check"></i></span>
											<p>Authentication</p>
										</a>
									</div>
									<div class="col-6">
										<a href="#menu-ui-elements" role="tab" class="nav-link" title="UI Elements" data-bs-toggle="tab" data-bs-target="#menu-ui-elements" aria-selected="false">
											<span><i class="ti ti-ux-circle"></i></span>
											<p>Basic UI</p>
										</a>
									</div>
								</div>
							</div>
							<div class="tab-content">
								<div class="tab-pane fade show active" id="menu-dashboard">
									<ul class="stack-submenu">
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/index.html">Admin Dashboard</a></li>
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/employee-dashboard.html" class="active">Employee Dashboard</a></li>
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/deals-dashboard.html">Deals Dashboard</a></li>
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/leads-dashboard.html">Leads Dashboard</a></li>
									</ul>
								</div>
								<div class="tab-pane fade" id="menu-superadmin">
									<ul class="stack-submenu">
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/dashboard.html">Dashboard</a></li>
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/companies.html">Companies</a></li>
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/subscription.html">Subscriptions</a></li>
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/packages.html">Packages</a></li>
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/domain.html">Domain</a></li>
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/purchase-transaction.html">Purchase Transaction</a></li>
									</ul>
								</div>
								<div class="tab-pane fade" id="menu-application">
									<ul class="stack-submenu">
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
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/social-feed.html">Social Feed</a></li>
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/file-manager.html">File Manager</a></li>
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/kanban-view.html">Kanban</a></li>
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/invoices.html">Invoices</a></li>
									</ul>
								</div>
								<div class="tab-pane fade" id="menu-layout">
									<ul class="stack-submenu">
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/layout-horizontal.html">Horizontal</a></li>
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/layout-detached.html">Detached</a></li>
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/layout-modern.html">Modern</a></li>
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/layout-two-column.html">Two Column</a></li>
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/layout-hovered.html">Hovered</a></li>
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/layout-box.html">Boxed</a></li>
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/layout-horizontal-single.html">Horizontal Single</a></li>
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/layout-horizontal-overlay.html">Horizontal Overlay</a></li>
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/layout-horizontal-box.html">Horizontal Box</a></li>
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/layout-horizontal-sidemenu.html">Menu Aside</a></li>
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/layout-vertical-transparent.html">Transparent</a></li>
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/layout-without-header.html">Without Header</a></li>
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/layout-rtl.html">RTL</a></li>
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/layout-dark.html">Dark</a></li>
									</ul>
								</div>
								<div class="tab-pane fade" id="menu-project">
									<ul class="stack-submenu">
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/clients-grid.html"><span>Clients</span></a></li>
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
									</ul>
								</div>
								<div class="tab-pane fade" id="menu-crm">
									<ul class="stack-submenu">
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/contacts-grid.html"><span>Contacts</span></a></li>
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/companies-grid.html"><span>Companies</span></a></li>
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/deals-grid.html"><span>Deals</span></a></li>
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/leads-grid.html"><span>Leads</span></a></li>
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/pipeline.html"><span>Pipeline</span></a></li>
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/analytics.html"><span>Analytics</span></a></li>
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/activity.html"><span>Activities</span></a></li>
									</ul>
								</div>
								<div class="tab-pane fade" id="menu-hrm">
									<ul class="stack-submenu">
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
												<li class="submenu submenu-two">
													<a href="javascript:void(0);">Leaves<span
															class="menu-arrow inside-submenu"></span></a>
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
								</div>
								<div class="tab-pane fade" id="menu-finance">
									<ul class="stack-submenu">
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
									</ul>
								</div>
								<div class="tab-pane fade" id="menu-administration">
									<ul class="stack-submenu">
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
											<a href="javascript:void(0);">
												General Settings
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/profile-settings.html">Profile</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/security-settings.html">Security</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/notification-settings.html">Notifications</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/connected-apps.html">Connected Apps</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);">
												Website Settings
												<span class="menu-arrow"></span>
											</a>
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
											<a href="javascript:void(0);">
												System Settings
												<span class="menu-arrow"></span>
											</a>
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
											<a href="javascript:void(0);">
												Financial Settings
												<span class="menu-arrow"></span>
											</a>
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
								</div>
								<div class="tab-pane fade" id="menu-content">
									<ul class="stack-submenu">
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
								</div>
								<div class="tab-pane fade" id="menu-pages">
									<ul class="stack-submenu">
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/starter.html">Starter</a></li>
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/profile.html">Profile</a></li>
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/profile-settings.html">Profile Settings</a></li>
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/gallery.html">Gallery</a></li>
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/search-result.html">Search Results</a></li>
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/timeline.html">Timeline</a></li>
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/pricing.html">Pricing</a></li>
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/coming-soon.html">Coming Soon</a></li>
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/under-maintenance.html">Under Maintenance</a></li>
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/under-construction.html">Under Construction</a></li>
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/api-keys.html">API Keys</a></li>
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/privacy-policy.html">Privacy Policy</a></li>
										<li><a href="https://smarthr.dreamstechnologies.com/html/template/terms-condition.html">Terms & Conditions</a></li>
									</ul>
								</div>
								<div class="tab-pane fade" id="menu-authentication">
									<ul class="stack-submenu">
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
								</div>
								<div class="tab-pane fade" id="menu-ui-elements">
									<ul class="stack-submenu">
										<li class="submenu">
											<a href="javascript:void(0);">Base UI<span class="menu-arrow"></span></a>
											<ul>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/ui-alerts.html">Alerts</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/ui-accordion.html">Accordion</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/ui-avatar.html">Avatar</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/ui-badges.html">Badges</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/ui-borders.html">Border</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/ui-buttons.html">Buttons</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/ui-buttons-group.html">Button Group</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/ui-breadcrumb.html">Breadcrumb</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/ui-cards.html">Card</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/ui-carousel.html">Carousel</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/ui-colors.html">Colors</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/ui-dropdowns.html">Dropdowns</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/ui-grid.html">Grid</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/ui-images.html">Images</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/ui-lightbox.html">Lightbox</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/ui-media.html">Media</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/ui-modals.html">Modals</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/ui-offcanvas.html">Offcanvas</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/ui-pagination.html">Pagination</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/ui-popovers.html">Popovers</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/ui-progress.html">Progress</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/ui-placeholders.html">Placeholders</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/ui-spinner.html">Spinner</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/ui-sweetalerts.html">Sweet Alerts</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/ui-nav-tabs.html">Tabs</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/ui-toasts.html">Toasts</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/ui-tooltips.html">Tooltips</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/ui-typography.html">Typography</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/ui-video.html">Video</a></li>
											<li><a href="https://smarthr.dreamstechnologies.com/html/template/ui-sortable.html">Sortable</a></li>
											<li><a href="https://smarthr.dreamstechnologies.com/html/template/ui-swiperjs.html">Swiperjs</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);"> Advanced UI<span class="menu-arrow"></span></a>
											<ul>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/ui-ribbon.html">Ribbon</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/ui-clipboard.html">Clipboard</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/ui-drag-drop.html">Drag & Drop</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/ui-rangeslider.html">Range Slider</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/ui-rating.html">Rating</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/ui-text-editor.html">Text Editor</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/ui-counter.html">Counter</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/ui-scrollbar.html">Scrollbar</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/ui-stickynote.html">Sticky Note</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/ui-timeline.html">Timeline</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);">Forms<span class="menu-arrow"></span> </a>
											<ul>
												<li class="submenu submenu-two">
													<a href="javascript:void(0);">Form Elements<span class="menu-arrow inside-submenu"></span></a>
													<ul>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/form-basic-inputs.html">Basic Inputs</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/form-checkbox-radios.html">Checkbox & Radios</a> </li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/form-input-groups.html">Input Groups</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/form-grid-gutters.html">Grid & Gutters</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/form-select.html">Form Select</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/form-mask.html">Input Masks</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/form-fileupload.html">File Uploads</a></li>

													</ul>
												</li>
												<li class="submenu submenu-two">
													<a href="javascript:void(0);">Layouts<span class="menu-arrow inside-submenu"></span></a>
													<ul>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/form-horizontal.html">Horizontal Form</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/form-vertical.html">Vertical Form</a></li>
														<li><a href="https://smarthr.dreamstechnologies.com/html/template/form-floating-labels.html">Floating Labels</a></li>
													</ul>
												</li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/form-validation.html">Form Validation</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/form-select2.html">Select2</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/form-wizard.html">Form Wizard</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/form-pickers.html">Form Picker</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);">Tables<span class="menu-arrow"></span></a>
											<ul>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/tables-basic.html">Basic Tables </a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/data-tables.html">Data Table </a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);">Charts<span class="menu-arrow"></span> </a>
											<ul>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/chart-apex.html">Apex Charts</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/chart-c3.html">Chart C3</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/chart-js.html">Chart Js</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/chart-morris.html">Morris Charts</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/chart-flot.html">Flot Charts</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/chart-peity.html">Peity Charts</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);">Icons<span class="menu-arrow"></span> </a>
											<ul>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/icon-fontawesome.html">Fontawesome Icons</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/icon-tabler.html">Tabler Icons</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/icon-bootstrap.html">Bootstrap Icons</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/icon-remix.html">Remix Icons</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/icon-feather.html">Feather Icons</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/icon-ionic.html">Ionic Icons</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/icon-material.html">Material Icons</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/icon-pe7.html">Pe7 Icons</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/icon-simpleline.html">Simpleline Icons</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/icon-themify.html">Themify Icons</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/icon-weather.html">Weather Icons</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/icon-typicon.html">Typicon Icons</a></li>
												<li><a href="https://smarthr.dreamstechnologies.com/html/template/icon-flag.html">Flag Icons</a></li>
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
        <div class="page-wrapper" style="min-height: 1018px;">
			<div class="content">
            @include('dashboard.layouts._message')
            @yield('content')
            </div>
        </div>


		<!-- Add Leaves -->
		<div class="modal fade" id="add_leaves">
			<div class="modal-dialog modal-dialog-centered modal-md">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Add Leave</h4>
						<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
							<i class="ti ti-x"></i>
						</button>
					</div>
					<form action="https://smarthr.dreamstechnologies.com/html/template/employee-dashboard.html">
						<div class="modal-body pb-0">
							<div class="row">
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label">Employee Name</label>
										<select class="select">
											<option>Select</option>
											<option>Anthony Lewis</option>
											<option>Brian Villalobos</option>
											<option>Harvey Smith</option>
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label">Leave Type</label>
										<select class="select">
											<option>Select</option>
											<option>Medical Leave</option>
											<option>Casual Leave</option>
											<option>Annual Leave</option>
										</select>
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
										<input type="text" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Remaining Days</label>
										<input type="text" class="form-control">
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

		<!-- Edit Task -->
		<div class="modal fade" id="edit_task">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Edit Task  </h4>
						<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
							<i class="ti ti-x"></i>
						</button>
					</div>
					<form action="https://smarthr.dreamstechnologies.com/html/template/employee-dashboard.html">
						<div class="modal-body">
							<div class="row">
								<div class="col-12">
									<div class="mb-3">
										<label class="form-label">Todo Title</label>
										<input type="text" class="form-control" value="Patient appointment booking">
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Due Date</label>
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
										<label class="form-label">Project</label>
										<select class="select">
											<option>Select</option>
											<option selected>Office Management</option>
											<option>Clinic Management </option>
											<option>Educational Platform</option>
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label me-2">Team Members</label>
										<input class="input-tags form-control" placeholder="Add new" type="text" data-role="tagsinput"  name="Label" value="Jerald,Andrew,Philip,Davis">
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Tag</label>
										<select class="select">
											<option>Select</option>
											<option>Internal</option>
											<option selected>Projects</option>
											<option>Meetings</option>
											<option>Reminder</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Status</label>
										<select class="select">
											<option>Select</option>
											<option selected>Inprogress</option>
											<option>Completed</option>
											<option>Pending</option>
											<option>Onhold</option>
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label">Priority</label>
										<select class="select">
											<option>Select</option>
											<option selected>Medium</option>
											<option>High</option>
											<option>Low</option>
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<label class="form-label">Who Can See this Task?</label>
									<div class="d-flex align-items-center">
										<div class="form-check me-3">
											<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4">
											<label class="form-check-label text-dark" for="flexRadioDefault4">
												Public
											</label>
										</div>
										<div class="form-check me-3">
											<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault5" checked="">
											<label class="form-check-label text-dark" for="flexRadioDefault5">
												Private
											</label>
										</div>
										<div class="form-check ">
											<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault6">
											<label class="form-check-label text-dark" for="flexRadioDefault6">
												Admin Only
											</label>
										</div>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="mb-3">
										<label class="form-label">Descriptions</label>
										<div class="summernote"></div>
									</div>
								</div>
								<div class="col-md-12">
									<label class="form-label">Upload Attachment</label>
									<div class="bg-light rounded p-2">
										<div class="profile-uploader border-bottom mb-2 pb-2">
											<div class="drag-upload-btn btn btn-sm btn-white border px-3">
												Select File
												<input type="file" class="form-control image-sign" multiple="">
											</div>
										</div>
										<div class="d-flex align-items-center justify-content-between border-bottom mb-2 pb-2">
											<div class="d-flex align-items-center">
												<h6 class="fs-12 fw-medium me-1">Logo.zip</h6>
												<span class="badge badge-soft-info">21MB </span>
											</div>
											<a href="#" class="btn btn-sm btn-icon"><i class="ti ti-trash"></i></a>
										</div>
										<div class="d-flex align-items-center justify-content-between">
											<div class="d-flex align-items-center">
												<h6 class="fs-12 fw-medium me-1">Files.zip</h6>
												<span class="badge badge-soft-info">25MB </span>
											</div>
											<a href="#" class="btn btn-sm btn-icon"><i class="ti ti-trash"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-primary">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- /Edit Task -->

		<!-- Delete Modal -->
		<div class="modal fade" id="delete_modal">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body text-center">
						<span class="avatar avatar-xl bg-transparent-danger text-danger mb-3">
							<i class="ti ti-trash-x fs-36"></i>
						</span>
						<h4 class="mb-1">Confirm Delete</h4>
						<p class="mb-3">You want to delete all the marked items, this cant be undone once you delete.</p>
						<div class="d-flex justify-content-center">
							<a href="javascript:void(0);" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</a>
							<a href="https://smarthr.dreamstechnologies.com/html/template/employee-dashboard.html" class="btn btn-danger">Yes, Delete</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Delete Modal -->

	</div>
	<!-- /Main Wrapper -->
@include('dashboard.layouts.footer')
@yield('script')

@stack('scripts')
</html>
