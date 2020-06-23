 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="{{ url('/') }}" class="brand-link">
		<img src="{{ asset('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
				 style="opacity: .8">
		<span class="brand-text font-weight-light">{{ config('app.name', '') }}</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				

				<li class="nav-item has-treeview active">
					<a href="" class="nav-link">
						<i class="fas fa-envelope-open-text"></i>
						<p>Grades</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item ">
							<a href="{{route('admin.grades.index')}}" class="nav-link">
								<i class="fas fa-th-list"></i>
								<p>List All</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('admin.grades.create')}}" class="nav-link">
								<i class="far fa-plus-square"></i>
								<p>Add new Grade</p>
							</a>
						</li>
						
					</ul>
				</li>
				<li class="nav-item has-treeview active">
					<a href="" class="nav-link">
						<i class="fas fa-envelope-open-text"></i>
						<p>Subjects</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item ">
							<a href="{{route('admin.subjects.index')}}" class="nav-link">
								<i class="fas fa-th-list"></i>
								<p>List All</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('admin.subjects.create')}}" class="nav-link">
								<i class="far fa-plus-square"></i>
								<p>Add new Subject</p>
							</a>
						</li>
						
					</ul>
				</li>
				<li class="nav-item has-treeview active">
					<a href="" class="nav-link">
						<i class="fas fa-envelope-open-text"></i>
						<p>Qusetions</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item ">
							<a href="{{route('admin.questions.index')}}" class="nav-link">
								<i class="fas fa-th-list"></i>
								<p>List All</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('admin.questions.create')}}" class="nav-link">
								<i class="far fa-plus-square"></i>
								<p>Add new Question</p>
							</a>
						</li>
						
					</ul>
				</li>
				<li class="nav-item has-treeview active">
					<a href="" class="nav-link">
						<i class="fas fa-envelope-open-text"></i>
						<p>Lessons</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item ">
							<a href="{{route('admin.lessons.index')}}" class="nav-link">
								<i class="fas fa-th-list"></i>
								<p>List All</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('admin.lessons.create')}}" class="nav-link">
								<i class="far fa-plus-square"></i>
								<p>Add new Lesson</p>
							</a>
						</li>
						
					</ul>
				</li>

				<li class="nav-item has-treeview active">
					<a href="" class="nav-link">
						<i class="fas fa-user"></i>
						<p>Users</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item ">
							<a href="{{route('admin.users.index')}}" class="nav-link">
								<i class="fas fa-th-list"></i>
								<p>List All</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('admin.users.create')}}" class="nav-link">
								<i class="far fa-plus-square"></i>
								<p>Add new User</p>
							</a>
						</li>
						
					</ul>
				</li>

				 


				
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>