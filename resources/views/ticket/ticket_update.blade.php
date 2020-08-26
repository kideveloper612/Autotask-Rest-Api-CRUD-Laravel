@extends('./../base/base')

@section('content')
	<div class="page-content">

        @if($items ?? '')
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
                        <th>Update | Delete</th>
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
			            <td>
			            	<a href="/ticket/{{$item->id}}/edit">
			            		<button class="btn btn-secondary">Edit</button>
			            	</a>
			            </td>
			        </tr>
                @endforeach
			    </tbody>
			</table>
		</div>
        @endif

		<!-- Update Form -->
		@if ($editRecord ?? '')
		<form class="form-horizontal" action="/ticket/update" method="POST">
			@csrf
            <input name="_method" type="hidden" value="PUT">
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="ApiVendorID">ApiVendorID(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->apiVendorID}}" id="ApiVendorID" name="ApiVendorID" placeholder="Enter ApiVendorID">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="AssignedResourceID">AssignedResourceID(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->assignedResourceID}}" id="AssignedResourceID" name="AssignedResourceID" placeholder="Enter AssignedResourceID">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="AssignedResourceRoleID">AssignedResourceRoleID(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->assignedResourceRoleID}}" id="AssignedResourceRoleID" name="AssignedResourceRoleID" placeholder="Enter AssignedResourceRoleID">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="BillingCodeID">BillingCodeID(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->billingCodeID}}" id="BillingCodeID" name="BillingCodeID" placeholder="Enter BillingCodeID">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="ChangeApprovalBoard">ChangeApprovalBoard(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->changeApprovalBoard}}" id="ChangeApprovalBoard" name="ChangeApprovalBoard" placeholder="Enter ChangeApprovalBoard">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="ChangeApprovalStatus">ChangeApprovalStatus(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->changeApprovalStatus}}" id="ChangeApprovalStatus" name="ChangeApprovalStatus" placeholder="Enter ChangeApprovalStatus">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="ChangeApprovalType">ChangeApprovalType(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->changeApprovalType}}" id="ChangeApprovalType" name="ChangeApprovalType" placeholder="Enter ChangeApprovalType">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="ChangeInfoField1">ChangeInfoField1(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->changeInfoField1}}" id="ChangeInfoField1" name="ChangeInfoField1" maxlength="8000" placeholder="Enter ChangeInfoField1">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="ChangeInfoField2">ChangeInfoField2(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->changeInfoField2}}" id="ChangeInfoField2" name="ChangeInfoField2" maxlength="8000" placeholder="Enter ChangeInfoField2">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="ChangeInfoField3">ChangeInfoField3(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->changeInfoField3}}" id="ChangeInfoField3" name="ChangeInfoField3" maxlength="8000" placeholder="Enter ChangeInfoField3">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="ChangeInfoField4">ChangeInfoField4(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->changeInfoField4}}" id="ChangeInfoField4" name="ChangeInfoField4" maxlength="8000" placeholder="Enter ChangeInfoField4">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="ChangeInfoField5">ChangeInfoField5(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->changeInfoField5}}" id="ChangeInfoField5" name="ChangeInfoField5" maxlength="8000" placeholder="Enter ChangeInfoField5">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="CompanyID">CompanyID<span>*</span></label>
						<div class="col-sm-12">
                            <input class="form-control" value="{{$editRecord->companyID}}" id="CompanyID" name="CompanyID" required readonly>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="CompanyLocationID">CompanyLocationID(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->companyLocationID}}" id="CompanyLocationID" name="CompanyLocationID" placeholder="Enter CompanyLocationID">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="CompletedByResourceID">CompletedByResourceID(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->completedByResourceID}}" id="CompletedByResourceID" name="CompletedByResourceID" placeholder="Enter CompletedByResourceID">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="CompletedDate">CompletedDate(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="datepicker form-control" value="{{$editRecord->completedDate}}" id="CompletedDate" name="CompletedDate" data-provide="datepicker" placeholder="Enter CompletedDate">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="ConfigurationItemID">ConfigurationItemID(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->configurationItemID}}" id="ConfigurationItemID" name="ConfigurationItemID" placeholder="Enter ConfigurationItemID">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="ContactID">ContactID(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->contactID}}" id="ContactID" name="ContactID" placeholder="Enter ContactID">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="ContractID">ContractID(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->contractID}}" id="ContractID" name="ContractID" placeholder="Enter ContractID">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="ContractServiceBundleID">ContractServiceBundleID(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->contractServiceBundleID}}" id="ContractServiceBundleID" name="ContractServiceBundleID" placeholder="Enter ContractServiceBundleID">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="ContractServiceID">ContractServiceID(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->contractServiceID}}" id="ContractServiceID" name="ContractServiceID" placeholder="Enter ContractServiceID">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="CreateDate">CreateDate(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="datepicker form-control" value="{{$editRecord->createDate}}" id="CreateDate" name="CreateDate" data-provide="datepicker" placeholder="Enter CreateDate">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="CreatorResourceID">CreatorResourceID(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->creatorResourceID}}" id="CreatorResourceID" name="CreatorResourceID" placeholder="Enter CreatorResourceID">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="CreatorType">CreatorType(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->creatorType}}" id="CreatorType" name="CreatorType" placeholder="Enter CreatorType">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="CurrentServiceThermometerRating">CurrentServiceThermometerRating(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->currentServiceThermometerRating}}" id="CurrentServiceThermometerRating" name="CurrentServiceThermometerRating" placeholder="Enter CurrentServiceThermometerRating">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="Description">Description(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->description}}" id="Description" name="Description" maxlength="8000" placeholder="Enter Description">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="DueDateTime">DueDateTime<span>*</span></label>
						<div class="col-sm-12">
						  	<input type="text" class="datepicker form-control" value="{{$editRecord->dueDateTime}}" id="DueDateTime" name="DueDateTime" data-provide="datepicker" placeholder="Enter DueDateTime" required>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="EstimatedHours">EstimatedHours(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->estimatedHours}}" id="EstimatedHours" name="EstimatedHours" placeholder="Enter EstimatedHours">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="ExternalID">ExternalID(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->externalID}}" id="ExternalID" name="ExternalID" maxlength="50" placeholder="Enter ExternalID">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="FirstResponseAssignedResourceID">FirstResponseAssignedResourceID(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->firstResponseAssignedResourceID}}" id="FirstResponseAssignedResourceID" name="FirstResponseAssignedResourceID" placeholder="Enter FirstResponseAssignedResourceID">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="FirstResponseDateTime">FirstResponseDateTime(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="datepicker form-control" value="{{$editRecord->firstResponseDateTime}}" id="FirstResponseDateTime" name="FirstResponseDateTime" data-provide="datepicker" placeholder="Enter FirstResponseDateTime">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="FirstResponseDueDateTime">FirstResponseDueDateTime(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="datepicker form-control" value="{{$editRecord->firstResponseDueDateTime}}" id="FirstResponseDueDateTime" name="FirstResponseDueDateTime" data-provide="datepicker" placeholder="Enter FirstResponseDueDateTime">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="FirstResponseInitiatingResourceID">FirstResponseInitiatingResourceID(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->firstResponseInitiatingResourceID}}" id="FirstResponseInitiatingResourceID" name="FirstResponseInitiatingResourceID" placeholder="Enter FirstResponseInitiatingResourceID">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="HoursToBeScheduled">HoursToBeScheduled(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->hoursToBeScheduled}}" id="HoursToBeScheduled" name="HoursToBeScheduled" placeholder="Enter HoursToBeScheduled">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="Id">Id<span>*</span></label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->id}}" id="Id" name="Id" placeholder="Enter Id" required>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="ImpersonatorCreatorResourceID">ImpersonatorCreatorResourceID(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->impersonatorCreatorResourceID}}" id="ImpersonatorCreatorResourceID" name="ImpersonatorCreatorResourceID" placeholder="Enter ImpersonatorCreatorResourceID">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="IssueType">IssueType(Optional)</label>
						<div class="col-sm-12">
                            <select class="form-control" value="{{$editRecord->issueType}}" id="IssueType" name="IssueType">
                                <option value=""></option>
                                <option value="12">Break/Fix</option>
                                <option value="10">Computer</option>
                                <option value="13">Maintenance</option>
                                <option value="14">Monitoring Alert</option>
                                <option value="11">Network</option>
                                <option value="15">New Install</option>
                                <option value="7">Server</option>
                                <option value="6">Service</option>
                                <option value="4">Upgrade</option>
                            </select>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="LastActivityDate">LastActivityDate(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="datepicker form-control" value="{{$editRecord->lastActivityDate}}" id="LastActivityDate" name="LastActivityDate" data-provide="datepicker" placeholder="Enter LastActivityDate">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="LastActivityPersonType">LastActivityPersonType(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->lastActivityPersonType}}" id="LastActivityPersonType" name="LastActivityPersonType" placeholder="Enter LastActivityPersonType">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="LastActivityResourceID">LastActivityResourceID(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->lastActivityResourceID}}" id="LastActivityResourceID" name="LastActivityResourceID" placeholder="Enter LastActivityResourceID">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="LastCustomerNotificationDateTime">LastCustomerNotificationDateTime(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="datepicker form-control" value="{{$editRecord->lastCustomerNotificationDateTime}}" id="LastCustomerNotificationDateTime" name="LastCustomerNotificationDateTime" data-provide="datepicker" placeholder="Enter LastCustomerNotificationDateTime">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="LastCustomerVisibleActivityDateTime">LastCustomerVisibleActivityDateTime(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="datepicker form-control" value="{{$editRecord->lastCustomerVisibleActivityDateTime}}" id="LastCustomerVisibleActivityDateTime" name="LastCustomerVisibleActivityDateTime" data-provide="datepicker" placeholder="Enter LastCustomerVisibleActivityDateTime">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="LastTrackedModificationDateTime">LastTrackedModificationDateTime(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="datepicker form-control" value="{{$editRecord->lastTrackedModificationDateTime}}" id="LastTrackedModificationDateTime" name="LastTrackedModificationDateTime" data-provide="datepicker" placeholder="Enter LastTrackedModificationDateTime">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="MonitorID">MonitorID(Datto RMM integration only)(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->monitorID}}" id="MonitorID" name="MonitorID" placeholder="Enter MonitorID">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="MonitorTypeID">MonitorTypeID(Datto RMM integration only)(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->monitorTypeID}}" id="MonitorTypeID" name="MonitorTypeID" placeholder="Enter MonitorTypeID">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="OpportunityID">OpportunityID(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->opportunityID}}" id="OpportunityID" name="OpportunityID" placeholder="Enter OpportunityID">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="PreviousServiceThermometerRating">PreviousServiceThermometerRating(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->previousServiceThermometerRating}}" id="PreviousServiceThermometerRating" name="PreviousServiceThermometerRating" placeholder="Enter PreviousServiceThermometerRating">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="Priority">Priority<span>*</span></label>
						<div class="col-sm-12">
                            <select class="form-control" value="{{$editRecord->priority}}" id="Priority" name="Priority" required>
                                <option value="4">Critical</option>
                                <option value="1">High</option>
                                <option value="2">Medium</option>
                                <option value="3">Low</option>
                            </select>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="ProblemTicketId">ProblemTicketId(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->problemTicketId}}" id="ProblemTicketId" name="ProblemTicketId" placeholder="Enter ProblemTicketId">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="ProjectID">ProjectID(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->projectID}}" id="ProjectID" name="ProjectID" placeholder="Enter ProjectID">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="PurchaseOrderNumber">PurchaseOrderNumber(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->purchaseOrderNumber}}" id="PurchaseOrderNumber" name="PurchaseOrderNumber" maxlength="50" placeholder="Enter PurchaseOrderNumber">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="QueueID">QueueID(Optional)</label>
						<div class="col-sm-12">
                            <select class="form-control" value="{{$editRecord->queueID}}" id="QueueID" name="QueueID" required>
                                <option value="29683378">Administration</option>
                                <option value="5">Client Portal</option>
                                <option value="29682833">Level I Support</option>
                                <option value="29682969">Level II Support</option>
                                <option value="8">Monitoring Alert</option>
                                <option value="6">Post Sale</option>
                                <option value="29683354">Recurring Tickets</option>
                            </select>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="Resolution">Resolution(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->resolution}}" id="Resolution" name="Resolution" maxlength="32000" placeholder="Enter Resolution">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="ResolutionPlanDateTime">ResolutionPlanDateTime(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="datepicker form-control" value="{{$editRecord->resolutionPlanDateTime}}" id="ResolutionPlanDateTime" name="ResolutionPlanDateTime" data-provide="datepicker" placeholder="Enter ResolutionPlanDateTime">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="ResolutionPlanDueDateTime">ResolutionPlanDueDateTime(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="datepicker form-control" value="{{$editRecord->resolutionPlanDueDateTime}}" id="ResolutionPlanDueDateTime" name="ResolutionPlanDueDateTime" data-provide="datepicker" placeholder="Enter ResolutionPlanDueDateTime">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="ResolvedDateTime">ResolvedDateTime(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="datepicker form-control" value="{{$editRecord->resolvedDateTime}}" id="ResolvedDateTime" name="ResolvedDateTime" data-provide="datepicker" placeholder="Enter ResolvedDateTime">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="ResolvedDueDateTime">ResolvedDueDateTime(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="datepicker form-control" value="{{$editRecord->resolvedDueDateTime}}" id="ResolvedDueDateTime" name="ResolvedDueDateTime" data-provide="datepicker" placeholder="Enter ResolvedDueDateTime">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="RmaStatus">RmaStatus(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->rmaStatus}}" id="RmaStatus" name="RmaStatus" placeholder="Enter RmaStatus">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="RmaType">RmaType(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->rmaType}}" id="RmaType" name="RmaType" placeholder="Enter RmaType">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="RMMAlertID">RMMAlertID(Datto RMM integration only)(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->rmmAlertID}}" id="RMMAlertID" name="RMMAlertID" maxlength="50" placeholder="Enter RMMAlertID">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="ServiceLevelAgreementHasBeenMet">ServiceLevelAgreementHasBeenMet(Optional)</label>
						<div class="col-sm-12">
							<select class="form-control" value="{{$editRecord->serviceLevelAgreementHasBeenMet}}" id="ServiceLevelAgreementHasBeenMet" name="ServiceLevelAgreementHasBeenMet">
								<option value=""></option>
								<option value="True" title="Yes">Yes</option>
								<option value="False" title="No">No</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="ServiceLevelAgreementID">ServiceLevelAgreementID(Optional)</label>
						<div class="col-sm-12">
                            <select class="form-control" value="{{$editRecord->serviceLevelAgreementID}}" id="ServiceLevelAgreementID" name="ServiceLevelAgreementID">
                                <option value=""></option>
                                <option value="1">Standard SLA</option>
                            </select>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="ServiceLevelAgreementPausedNextEventHours">ServiceLevelAgreementPausedNextEventHours(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->serviceLevelAgreementPausedNextEventHours}}" id="ServiceLevelAgreementPausedNextEventHours" name="ServiceLevelAgreementPausedNextEventHours" placeholder="Enter ServiceLevelAgreementPausedNextEventHours">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="ServiceThermometerTemperature">ServiceThermometerTemperature(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->serviceThermometerTemperature}}" id="ServiceThermometerTemperature" name="ServiceThermometerTemperature" placeholder="Enter ServiceThermometerTemperature">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="Source">Source(Optional)</label>
						<div class="col-sm-12">
                            <select class="form-control" value="{{$editRecord->source}}" id="Source" name="Source">
                                <option value=""></option>
                                <option value="-2">Insourced</option>
                                <option value="-1">Client Portal</option>
                                <option value="2">Phone</option>
                                <option value="6">In Person/Onsite</option>
                                <option value="4">Email</option>
                                <option value="8">Monitoring Alert</option>
                                <option value="5">Web Portal</option>
                                <option value="1">Voice Mail</option>
                                <option value="11">Verbal</option>
                                <option value="12">Website</option>
                            </select>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="Status">Status<span>*</span></label>
						<div class="col-sm-12">
                            <select class="form-control" value="{{$editRecord->status}}" id="Status" name="Status" required>
                                <option value="1">New</option>
                                <option value="13">Waiting Approval</option>
                                <option value="10">Dispatched</option>
                                <option value="15">Change Order</option>
                                <option value="19">Customer Note Added</option>
                                <option value="8">In Progress</option>
                                <option value="11">Escalate</option>
                                <option value="9">Waiting Materials</option>
                                <option value="7">Waiting Customer</option>
                                <option value="12">Waiting Vendor</option>
                                <option value="17">On Hold</option>
                                <option value="14">Billed</option>
                                <option value="16">Inactive</option>
                                <option value="18">Ready to Bill</option>
                                <option value="5">Complete</option>
                            </select>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="SubIssueType">SubIssueType(Optional)</label>
						<div class="col-sm-12">
                            <select class="form-control" value="{{$editRecord->subIssueType}}" id="SubIssueType" name="SubIssueType">
                                <option value=""></option>
                            </select>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="TicketCategory">TicketCategory(Optional)</label>
						<div class="col-sm-12">
                            <select class="form-control" value="{{$editRecord->ticketCategory}}" id="TicketCategory" name="TicketCategory">
                                <option value="3">Standard</option>
                                <option value="2">AEM Alert</option>
                                <option value="2">Datto Alert</option>
                            </select>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="TicketNumber">TicketNumber(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->ticketNumber}}" id="TicketNumber" name="TicketNumber" maxlength="50" placeholder="Enter TicketNumber">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="TicketType">TicketType(Optional)</label>
						<div class="col-sm-12">
                            <select class="form-control" value="{{$editRecord->ticketType}}" id="TicketType" name="TicketType">
                                <option value="1">Service Request</option>
                                <option value="2">Incident</option>
                                <option value="3">Problem</option>
                                <option value="4">Change Request</option>
                                <option value="5">Alert</option>
                            </select>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-10" for="Title">Title<span>*</span></label>
				<div class="col-sm-12">
				  	<input type="text" class="form-control" value="{{$editRecord->title}}" id="Title" name="Title" maxlength="255" placeholder="Enter Title" required>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-12">
				  	<button type="submit" class="btn btn-success">Update</button>
                    <a href="/ticket/update"><button type="button" class="btn btn-warning">Return</button></a>
				</div>
			</div>
		</form>
        @else
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-12">
                    <button type="button" class="btn btn-warning" onclick="toLanding();">Return</button>
                </div>
            </div>
		@endif
	</div>
@endsection
