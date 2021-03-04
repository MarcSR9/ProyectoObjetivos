@if(session('status-error'))
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		{{ session('status-error') }}
		<button type="button"
			class="close"
			data-dismiss="alert"
			aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
@elseif(session('status-success'))
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		{{ session('status-success') }}
		<button type="button"
			class="close"
			data-dismiss="alert"
			aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
@endif