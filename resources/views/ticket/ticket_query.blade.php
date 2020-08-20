@extends('./../base/base')

@section('content')
	<div class="page-content">
		<form action="/ticket" method="GET">
			@csrf
			<div class="row">
				<div class="col-12">
					<div class="form-group pull-right">
						<a href="/ticket/create"><button type="button" class="btn btn-secondary">New</button></a>
						<button type="submit" class="btn btn-info">Search</button>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-3">
					<div class="form-group">
						<label class="control-label" for="Title">Title</label>
					  	<input type="text" class="form-control" id="Title" name="Title" placeholder="Enter Title">
					</div>
				</div>
				<div class="col-3">
					<div class="form-group">
						<label class="control-label" for="CompanyID">CompanyID</label>
					  	<input type="text" class="form-control" id="CompanyID" name="CompanyID" placeholder="Enter CompanyID">
					</div>
				</div>
				<div class="col-3">
					<div class="form-group">
						<label class="control-label" for="CreateDate">CreateDate</label>
						<input type="text" class="form-control" id="CreateDate" name="CreateDate" placeholder="Enter CreateDate">
					</div>
				</div>
				<div class="col-3">
					<div class="form-group">
						<label class="control-label" for="Description">Description</label>
						<input type="text" class="form-control" id="Description" name="Description" placeholder="Enter Description">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-3">
					<div class="form-group">
						<label class="control-label" for="TicketNumber">TicketNumber</label>
					  	<input type="text" class="form-control" id="TicketNumber" name="TicketNumber" placeholder="Enter TicketNumber">
					</div>
				</div>
				<div class="col-3">
					<div class="form-group">
						<label class="control-label" for="ContactID">ContactID</label>
					  	<input type="text" class="form-control" id="ContactID" name="ContactID" placeholder="Enter ContactID">
					</div>
				</div>
				<div class="col-3">
					<div class="form-group">
						<label class="control-label" for="CompletedDate">CompletedDate</label>
					  	<input type="text" class="form-control" id="CompletedDate" name="CompletedDate" placeholder="Enter CompletedDate">
					</div>
				</div>
				<div class="col-3">
					<div class="form-group">
						<label class="control-label" for="Status">Status</label>
						<input type="text" class="form-control" id="Status" name="Status" placeholder="Enter Status">
					</div>
				</div>
			</div>
		</form>
	</div>
@endsection