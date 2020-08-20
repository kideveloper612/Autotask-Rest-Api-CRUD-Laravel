@extends('./../base/base')

@section('content')
    <div class="page-content">
		<form class="form-horizontal" action="/ticket" method="POST">
			@csrf
			<div class="form-group">
				<label class="control-label col-sm-2" for="ApiVendorID">ApiVendorID</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="ApiVendorID" name="ApiVendorID" placeholder="Enter ApiVendorID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="AssignedResourceID">AssignedResourceID</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="AssignedResourceID" name="AssignedResourceID" placeholder="Enter AssignedResourceID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="AssignedResourceRoleID">AssignedResourceRoleID</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="AssignedResourceRoleID" name="AssignedResourceRoleID" placeholder="Enter AssignedResourceRoleID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="BillingCodeID">BillingCodeID</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="BillingCodeID" name="BillingCodeID" placeholder="Enter BillingCodeID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="ChangeApprovalBoard">ChangeApprovalBoard</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="ChangeApprovalBoard" name="ChangeApprovalBoard" placeholder="Enter ChangeApprovalBoard">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="ChangeApprovalStatus">ChangeApprovalStatus</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="ChangeApprovalStatus" name="ChangeApprovalStatus" placeholder="Enter ChangeApprovalStatus">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="ChangeApprovalType">ChangeApprovalType</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="ChangeApprovalType" name="ChangeApprovalType" placeholder="Enter ChangeApprovalType">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="ChangeInfoField1">ChangeInfoField1</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="ChangeInfoField1" name="ChangeInfoField1" placeholder="Enter ChangeInfoField1">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="ChangeInfoField2">ChangeInfoField2</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="ChangeInfoField2" name="ChangeInfoField2" placeholder="Enter ChangeInfoField2">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="ChangeInfoField3">ChangeInfoField3</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="ChangeInfoField3" name="ChangeInfoField3" placeholder="Enter ChangeInfoField3">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="ChangeInfoField4">ChangeInfoField4</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="ChangeInfoField4" name="ChangeInfoField4" placeholder="Enter ChangeInfoField4">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="ChangeInfoField5">ChangeInfoField5</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="ChangeInfoField5" name="ChangeInfoField5" placeholder="Enter ChangeInfoField5">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="CompanyID">CompanyID</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="CompanyID" name="CompanyID" placeholder="Enter CompanyID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="CompanyLocationID">CompanyLocationID</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="CompanyLocationID" name="CompanyLocationID" placeholder="Enter CompanyLocationID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="CompletedByResourceID">CompletedByResourceID</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="CompletedByResourceID" name="CompletedByResourceID" placeholder="Enter CompletedByResourceID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="CompletedDate">CompletedDate</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="CompletedDate" name="CompletedDate" placeholder="Enter CompletedDate">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="ConfigurationItemID">ConfigurationItemID</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="ConfigurationItemID" name="ConfigurationItemID" placeholder="Enter ConfigurationItemID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="ContactID">ContactID</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="ContactID" name="ContactID" placeholder="Enter ContactID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="ContractID">ContractID</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="ContractID" name="ContractID" placeholder="Enter ContractID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="ContractServiceBundleID">ContractServiceBundleID</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="ContractServiceBundleID" name="ContractServiceBundleID" placeholder="Enter ContractServiceBundleID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="ContractServiceID">ContractServiceID</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="ContractServiceID" name="ContractServiceID" placeholder="Enter ContractServiceID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="CreateDate">CreateDate</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="CreateDate" name="CreateDate" placeholder="Enter CreateDate">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="CreatorResourceID">CreatorResourceID</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="CreatorResourceID" name="CreatorResourceID" placeholder="Enter CreatorResourceID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="CreatorType">CreatorType</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="CreatorType" name="CreatorType" placeholder="Enter CreatorType">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="CurrentServiceThermometerRating">CurrentServiceThermometerRating</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="CurrentServiceThermometerRating" name="CurrentServiceThermometerRating" placeholder="Enter CurrentServiceThermometerRating">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="Description">Description</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="Description" name="Description" placeholder="Enter Description">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="DueDateTime">DueDateTime</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="DueDateTime" name="DueDateTime" placeholder="Enter DueDateTime">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="EstimatedHours">EstimatedHours</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="EstimatedHours" name="EstimatedHours" placeholder="Enter EstimatedHours">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="ExternalID">ExternalID</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="ExternalID" name="ExternalID" placeholder="Enter ExternalID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="FirstResponseAssignedResourceID">FirstResponseAssignedResourceID</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="FirstResponseAssignedResourceID" name="FirstResponseAssignedResourceID" placeholder="Enter FirstResponseAssignedResourceID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="FirstResponseDateTime">FirstResponseDateTime</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="FirstResponseDateTime" name="FirstResponseDateTime" placeholder="Enter FirstResponseDateTime">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="FirstResponseDueDateTime">FirstResponseDueDateTime</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="FirstResponseDueDateTime" name="FirstResponseDueDateTime" placeholder="Enter FirstResponseDueDateTime">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="FirstResponseInitiatingResourceID">FirstResponseInitiatingResourceID</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="FirstResponseInitiatingResourceID" name="FirstResponseInitiatingResourceID" placeholder="Enter FirstResponseInitiatingResourceID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="HoursToBeScheduled">HoursToBeScheduled</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="HoursToBeScheduled" name="HoursToBeScheduled" placeholder="Enter HoursToBeScheduled">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="Id">Id</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="Id" name="Id" placeholder="Enter Id">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="ImpersonatorCreatorResourceID">ImpersonatorCreatorResourceID</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="ImpersonatorCreatorResourceID" name="ImpersonatorCreatorResourceID" placeholder="Enter ImpersonatorCreatorResourceID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="IssueType">IssueType</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="IssueType" name="IssueType" placeholder="Enter IssueType">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="LastActivityDate">LastActivityDate</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="LastActivityDate" name="LastActivityDate" placeholder="Enter LastActivityDate">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="LastActivityPersonType">LastActivityPersonType</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="LastActivityPersonType" name="LastActivityPersonType" placeholder="Enter LastActivityPersonType">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="LastActivityResourceID">LastActivityResourceID</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="LastActivityResourceID" name="LastActivityResourceID" placeholder="Enter LastActivityResourceID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="LastCustomerNotificationDateTime">LastCustomerNotificationDateTime</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="LastCustomerNotificationDateTime" name="LastCustomerNotificationDateTime" placeholder="Enter LastCustomerNotificationDateTime">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="LastCustomerVisibleActivityDateTime">LastCustomerVisibleActivityDateTime</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="LastCustomerVisibleActivityDateTime" name="LastCustomerVisibleActivityDateTime" placeholder="Enter LastCustomerVisibleActivityDateTime">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="LastTrackedModificationDateTime">LastTrackedModificationDateTime</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="LastTrackedModificationDateTime" name="LastTrackedModificationDateTime" placeholder="Enter LastTrackedModificationDateTime">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="MonitorID">MonitorID(Datto RMM integration only)</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="MonitorID" name="MonitorID" placeholder="Enter MonitorID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="MonitorTypeID">MonitorTypeID(Datto RMM integration only)</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="MonitorTypeID" name="MonitorTypeID" placeholder="Enter MonitorTypeID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="OpportunityID">OpportunityID</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="OpportunityID" name="OpportunityID" placeholder="Enter OpportunityID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="PreviousServiceThermometerRating">PreviousServiceThermometerRating</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="PreviousServiceThermometerRating" name="PreviousServiceThermometerRating" placeholder="Enter PreviousServiceThermometerRating">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="Priority">Priority</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="Priority" name="Priority" placeholder="Enter Priority">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="ProblemTicketId">ProblemTicketId</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="ProblemTicketId" name="ProblemTicketId" placeholder="Enter ProblemTicketId">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="ProjectID">ProjectID</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="ProjectID" name="ProjectID" placeholder="Enter ProjectID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="PurchaseOrderNumber">PurchaseOrderNumber</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="PurchaseOrderNumber" name="PurchaseOrderNumber" placeholder="Enter PurchaseOrderNumber">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="QueueID">QueueID</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="QueueID" name="QueueID" placeholder="Enter QueueID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="Resolution">Resolution</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="Resolution" name="Resolution" placeholder="Enter Resolution">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="ResolutionPlanDateTime">ResolutionPlanDateTime</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="ResolutionPlanDateTime" name="ResolutionPlanDateTime" placeholder="Enter ResolutionPlanDateTime">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="ResolutionPlanDueDateTime">ResolutionPlanDueDateTime</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="ResolutionPlanDueDateTime" name="ResolutionPlanDueDateTime" placeholder="Enter ResolutionPlanDueDateTime">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="ResolvedDateTime">ResolvedDateTime</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="ResolvedDateTime" name="ResolvedDateTime" placeholder="Enter ResolvedDateTime">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="ResolvedDueDateTime">ResolvedDueDateTime</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="ResolvedDueDateTime" name="ResolvedDueDateTime" placeholder="Enter ResolvedDueDateTime">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="RmaStatus">RmaStatus</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="RmaStatus" name="RmaStatus" placeholder="Enter RmaStatus">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="RmaType">RmaType</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="RmaType" name="RmaType" placeholder="Enter RmaType">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="RMMAlertID">RMMAlertID(Datto RMM integration only)</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="RMMAlertID" name="RMMAlertID" placeholder="Enter RMMAlertID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="ServiceLevelAgreementHasBeenMet">ServiceLevelAgreementHasBeenMet</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="ServiceLevelAgreementHasBeenMet" name="ServiceLevelAgreementHasBeenMet" placeholder="Enter ServiceLevelAgreementHasBeenMet">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="ServiceLevelAgreementID">ServiceLevelAgreementID</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="ServiceLevelAgreementID" name="ServiceLevelAgreementID" placeholder="Enter ServiceLevelAgreementID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="ServiceLevelAgreementPausedNextEventHours">ServiceLevelAgreementPausedNextEventHours</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="ServiceLevelAgreementPausedNextEventHours" name="ServiceLevelAgreementPausedNextEventHours" placeholder="Enter ServiceLevelAgreementPausedNextEventHours">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="ServiceThermometerTemperature">ServiceThermometerTemperature</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="ServiceThermometerTemperature" name="ServiceThermometerTemperature" placeholder="Enter ServiceThermometerTemperature">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="Source">Source</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="Source" name="Source" placeholder="Enter Source">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="Status">Status</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="Status" name="Status" placeholder="Enter Status">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="SubIssueType">SubIssueType</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="SubIssueType" name="SubIssueType" placeholder="Enter SubIssueType">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="TicketCategory">TicketCategory</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="TicketCategory" name="TicketCategory" placeholder="Enter TicketCategory">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="TicketNumber">TicketNumber</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="TicketNumber" name="TicketNumber" placeholder="Enter TicketNumber">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="TicketType">TicketType</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="TicketType" name="TicketType" placeholder="Enter TicketType">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="Title">Title</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="Title" name="Title" placeholder="Enter Title">
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				  	<button type="submit" class="btn btn-success">Submit</button>
				  	<button type="button" class="btn btn-warning" onclick="toLanding();">Return</button>
				</div>
			</div>
		</form>
	</div>
@endsection