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
					  	<input type="text" class="form-control" id="Title" name="Title" maxlength="255" placeholder="Enter Title">
					</div>
				</div>
				<div class="col-3">
					<div class="form-group">
						<label class="control-label" for="CompanyID">CompanyID</label>
					  	<input type="number" class="form-control" id="CompanyID" name="CompanyID" placeholder="Enter CompanyID">
					</div>
				</div>
				<div class="col-3">
					<div class="form-group">
						<label class="control-label" for="CreateDate">CreateDate</label>
						<input type="text" class="datepicker form-control" id="CreateDate" name="CreateDate" data-provide="datepicker" placeholder="Enter CreateDate">
					</div>
				</div>
				<div class="col-3">
					<div class="form-group">
						<label class="control-label" for="Description">Description</label>
						<input type="text" class="form-control" id="Description" name="Description" maxlength="8000" placeholder="Enter Description">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-3">
					<div class="form-group">
						<label class="control-label" for="TicketNumber">TicketNumber</label>
					  	<input type="text" class="form-control" id="TicketNumber" name="TicketNumber" maxlength="50" placeholder="Enter TicketNumber">
					</div>
				</div>
				<div class="col-3">
					<div class="form-group">
						<label class="control-label" for="ContactID">ContactID</label>
					  	<input type="number" class="form-control" id="ContactID" name="ContactID" placeholder="Enter ContactID">
					</div>
				</div>
				<div class="col-3">
					<div class="form-group">
						<label class="control-label" for="CompletedDate">CompletedDate</label>
					  	<input type="text" class="datepicker form-control" id="CompletedDate" name="CompletedDate" data-provide="datepicker" placeholder="Enter CompletedDate">
					</div>
				</div>
				<div class="col-3">
					<div class="form-group">
						<label class="control-label" for="Status">Status</label>
						<input type="number" class="form-control" id="Status" name="Status" placeholder="Enter Status">
					</div>
				</div>
			</div>
		</form>

        <!-- Show Tickets -->
        <div class="table-responsive mt-4">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>CompanyID</th>
                    <th>ContactID</th>
                    <th>Priority</th>
                    <th>DueDateTime</th>
                    <th>LastActivityDate</th>
                    <th>QueueID</th>
                    <th>TicketCategory</th>
                    <th>TicketNumber</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{$item -> title}}</td>
                        <td>{{$item -> companyID}}</td>
                        <td>{{$item -> contactID}}</td>
                        <td>{{$item -> priority}}</td>
                        <td>{{$item -> dueDateTime}}</td>
                        <td>{{$item -> lastActivityDate}}</td>
                        <td>{{$item -> queueID}}</td>
                        <td>{{$item -> ticketCategory}}</td>
                        <td>{{$item -> ticketNumber}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <!-- Return to Landing Page -->
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-12">
                <button type="button" class="btn btn-warning" onclick="toLanding();">Return</button>
            </div>
        </div>
	</div>
@endsection
