<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class TicketController extends Controller
{
    protected $BASE_URL = 'https://webservices16.autotask.net/ATServicesRest/V1.0/Tickets';
    protected $COMPANY_URL = 'https://webservices16.autotask.net/ATServicesRest/V1.0/Companies';
    protected $items = array();

    /**
     * Query using params
     *
     * @return array
     * */
    public function Query($url){
        while (true) {
            $curlResponse = json_decode($this->CURL_Request($url, "", "GET"));
            if ($curlResponse === null) {
                break;
            }
            foreach ($curlResponse->items as $append) {
                array_push($this->items, $append);
            }
            if ($curlResponse->pageDetails->nextPageUrl === null) {
                break;
            } else {
                $url = $curlResponse->pageDetails->nextPageUrl;
            }
        }

        return $this->items;
    }

    /**
     * Loop Request
     *
     * @param $initialURL
     * @return array
     */
    public function companyLoop($initialURL, $params) {
        $url = $initialURL."/query?".http_build_query($params);

        return $this->Query($url);
    }

    /**
     * Query total records.
     *
     * @return array
     */
    public function initialQuery() {
        $params = array(
            'search' => '{"filter": [{"op": "gt", "field": "Id", "value": "-100"}]}'
        );
        return $this->companyLoop($this->BASE_URL, $params);
    }

    /**
     * Company List Query
     *
     * @return array
     * */
    public function companyQuery() {
        $params = array(
            'search' => '{"MaxRecords":50, "filter":[{"op": "or", "items": [{"op":"eq", "field": "isActive", "value": "true"}, {"op": "noteq", "field": "isActive", "value": "false"}]}]}'
        );
        return $this->companyLoop($this->COMPANY_URL, $params);
    }

    /**
     * Search using params
     *
     * @return void
     * */
    public function searchQuery($requestData) {
        $searchArray = array(
            array(
                "op" => "contains",
                "field" => "Title",
                "value" => $requestData['Title']
            ),
            array(
                "op" => "eq",
                "field" => "CompanyID",
                "value" => $requestData['CompanyID']
            ),
            array(
                "op" => "eq",
                "field" => "CreateDate",
                "value" => $requestData['CreateDate']
            ),
            array(
                "op" => "contains",
                "field" => "Description",
                "value" => $requestData['Description']
            ),
            array(
                "op" => "eq",
                "field" => "TicketNumber",
                "value" => $requestData['TicketNumber']
            ),
            array(
                "op" => "eq",
                "field" => "ContactID",
                "value" => $requestData['ContactID']
            ),
            array(
                "op" => "eq",
                "field" => "CompletedDate",
                "value" => $requestData['CompletedDate']
            ),
            array(
                "op" => "eq",
                "field" => "Status",
                "value" => $requestData['Status']
            )
        );

        $filter = array();
        foreach ($searchArray as $key => $value) {
            if ($value['value'] !== null) {
                array_push($filter, $value);
            }
        }

        if (empty($filter)) {
            $this->initialQuery();
        } else {
            $searchParam = array(
                'search' => json_encode(array(
                    'MaxRecords' => 50,
                    'filter' => $filter
                ))
            );
            $url = $this->BASE_URL."/query?".http_build_query($searchParam);
            $this->Query($url);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|Response|View
     */
    public function index(Request $request)
    {
        //Ticket Landing Control
        $requestArray = $request->all();
        if (empty($requestArray) && empty($this->items)) {
            $this->initialQuery();
        } else if (empty($this->items)) {
            $this->searchQuery($requestArray);
        }

        return view('ticket/ticket_query') -> with('items', $this->items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        //Ticket Create Control
        $companyData = array();
        foreach ($this->companyQuery() as $item) {
            array_push($companyData, array($item->id, $item->companyName));
        }

        return view('ticket/ticket_create')->with('companyData', $companyData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //Store new Ticket to api
        $ticketData = json_encode(
            array(
                "AssignedResourceRoleID" => $request->get('AssignedResourceRoleID'),
                "BillingCodeID" => $request->get('BillingCodeID'),
                "ChangeApprovalBoard" => $request->get('ChangeApprovalBoard'),
                "ChangeApprovalStatus" => $request->get('ChangeApprovalStatus'),
                "ChangeApprovalType" => $request->get('ChangeApprovalType'),
                "ChangeInfoFields" => $request->get('ChangeInfoFields'),
                "CompanyID" => $request->get('CompanyID'),
                "ContactID" => $request->get('ContactID'),
                "CreatorResourceID" => $request->get('CreatorResourceID'),
                "DueDateTime" => $request->get('DueDateTime'),
                "ConfigurationItemID" => $request->get('ConfigurationItemID'),
                "IssueType" => $request->get('IssueType'),
                "SubIssueType" => $request->get('SubIssueType'),
                "LastActivityPersonType" => $request->get('LastActivityPersonType'),
                "LastTrackedModificationDateTime" => $request->get('LastTrackedModificationDateTime'),
                "OpportunityID" => $request->get('OpportunityID'),
                "Priority" => $request->get('Priority'),
                "ProblemTicketID" => $request->get('ProblemTicketID'),
                "ProjectID" => $request->get('ProjectID'),
                "Queue" => $request->get('Queue'),
                "QueueID" => $request->get('QueueID'),
                "RMAStatus" => $request->get('RMAStatus'),
                "RMAType" => $request->get('RMAType'),
                "ServiceLevelAgreementID" => $request->get('ServiceLevelAgreementID'),
                "ServiceLevelAgreementPausedNextEventHours" => $request->get('ServiceLevelAgreementPausedNextEventHours'),
                "Source" => $request->get('Source'),
                "TicketCategory" => $request->get('TicketCategory'),
                "TicketNumber" => $request->get('TicketNumber'),
                "TicketType" => $request->get('TicketType'),
                "Title" => $request->get('Title'),
                "Id" => $request->get('Id'),
                "Status" => $request->get('Status'),
            )
        );

        $this->CURL_Request($this->BASE_URL, $ticketData, 'POST');
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @return Application|Factory|Response|View
     */
    public function show()
    {
        //Ticket Update Control
        if(empty($this->items)) {
            $this->initialQuery();
        }

        return view('ticket/ticket_update') -> with('items', $this->items);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|Response|View
     */
    public function edit($id)
    {
        //Ticket Edit Control for updating
        $editRecord = $this->getEditRecord($this->BASE_URL, $id);
        $companyIdData = $this->companyQuery();
        return view('ticket/ticket_update') -> with(array('editRecord'=>$editRecord, 'companyIdData'=>$companyIdData));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //Update Ticket
        $ticketData = json_encode(
            array(
                "AssignedResourceRoleID" => $request->get('AssignedResourceRoleID'),
                "BillingCodeID" => $request->get('BillingCodeID'),
                "ChangeApprovalBoard" => $request->get('ChangeApprovalBoard'),
                "ChangeApprovalStatus" => $request->get('ChangeApprovalStatus'),
                "ChangeApprovalType" => $request->get('ChangeApprovalType'),
                "ChangeInfoFields" => $request->get('ChangeInfoFields'),
                "CompanyID" => $request->get('CompanyID'),
                "ContactID" => $request->get('ContactID'),
                "CreatorResourceID" => $request->get('CreatorResourceID'),
                "DueDateTime" => $request->get('DueDateTime'),
                "ConfigurationItemID" => $request->get('ConfigurationItemID'),
                "IssueType" => $request->get('IssueType'),
                "SubIssueType" => $request->get('SubIssueType'),
                "LastActivityPersonType" => $request->get('LastActivityPersonType'),
                "LastTrackedModificationDateTime" => $request->get('LastTrackedModificationDateTime'),
                "OpportunityID" => $request->get('OpportunityID'),
                "Priority" => $request->get('Priority'),
                "ProblemTicketID" => $request->get('ProblemTicketID'),
                "ProjectID" => $request->get('ProjectID'),
                "Queue" => $request->get('Queue'),
                "QueueID" => $request->get('QueueID'),
                "RMAStatus" => $request->get('RMAStatus'),
                "RMAType" => $request->get('RMAType'),
                "ServiceLevelAgreementID" => $request->get('ServiceLevelAgreementID'),
                "ServiceLevelAgreementPausedNextEventHours" => $request->get('ServiceLevelAgreementPausedNextEventHours'),
                "Source" => $request->get('Source'),
                "TicketCategory" => $request->get('TicketCategory'),
                "TicketNumber" => $request->get('TicketNumber'),
                "TicketType" => $request->get('TicketType'),
                "Title" => $request->get('Title'),
                "Id" => $request->get('Id'),
                "Status" => $request->get('Status'),
            )
        );
        $this->CURL_Request($this->BASE_URL, $ticketData, 'PUT');

        return $this->show();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
