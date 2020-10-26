	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Dashboard
			<small>Control panel</small>
            <a href="/" target="_blank"><span  class="badge bg-red-gradient">Preview</span></a>
            <a href="{{ url('/debug') }}" target="_blank"><span class="badge bg-blue-gradient">Debug assistant</span></a>
		</h1>

		<ol class="breadcrumb">
			<li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li class="active">@yield('currentPage')</li>
		</ol>
	</section>
