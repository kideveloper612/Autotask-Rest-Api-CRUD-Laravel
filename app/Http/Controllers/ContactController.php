<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ContactController extends Controller
{
    protected $BASE_URL = 'https://webservices16.autotask.net/ATServicesRest/V1.0/Contacts';
    protected $COMPANY_URL = 'https://webservices16.autotask.net/ATServicesRest/V1.0/Companies/';
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
    public function companyLoop($initialURL) {
        $params = array(
            'search' => '{"MaxRecords":50, "filter":[{"op": "or", "items": [{"op":"eq", "field": "isActive", "value": "true"}, {"op": "noteq", "field": "isActive", "value": "false"}]}]}'
        );
        $url = $initialURL."/query?".http_build_query($params);

        return $this->Query($url);
    }

    /**
     * Query total records.
     *
     * @return array
     */
    public function initialQuery() {
        return $this->companyLoop($this->BASE_URL);
    }

    /**
     * Company List Query
     *
     * @return array
     * */
    public function companyQuery() {
        return $this->companyLoop($this->COMPANY_URL);
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
                "field" => "FirstName",
                "value" => $requestData['FirstName']
            ),
            array(
                "op" => "eq",
                "field" => "CompanyID",
                "value" => $requestData['CompanyID']
            ),
            array(
                "op" => "contains",
                "field" => "EMailAddress",
                "value" => $requestData['EMailAddress']
            ),
            array(
                "op" => "eq",
                "field" => "isPrimary",
                "value" => $requestData['isPrimary']
            ),
            array(
                "op" => "contains",
                "field" => "LastName",
                "value" => $requestData['LastName']
            ),
            array(
                "op" => "eq",
                "field" => "CountryID",
                "value" => $requestData['CountryID']
            ),
            array(
                "op" => "contains",
                "field" => "Phone",
                "value" => $requestData['Phone']
            ),
            array(
                "op" => "eq",
                "field" => "isActive",
                "value" => $requestData['isActive']
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
        //Contact Landing Control
        $requestArray = $request->all();
        if (empty($requestArray) && empty($this->items)) {
            $this->initialQuery();
        } else if (empty($this->items)) {
            $this->searchQuery($requestArray);
        }

        return view('contact/contact_query') -> with('items', $this->items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        //Contact Create Control
        $companyData = array();
        foreach ($this->companyQuery() as $item) {
            array_push($companyData, array($item->id, $item->companyName));
        }
        return view('contact/contact_create')->with('companyItems', $companyData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //Store new Contact to api
        $contactData = json_encode(
            array(
                "id" => '0',
                "additionalAddressInformation" => $request->get('additionalAddressInformation'),
                "addressLine" => $request->get('addressLine'),
                "addressLine1" => $request->get('addressLine1'),
                "alternatePhone" => $request->get('alternatePhone'),
                "city" => $request->get('city'),
                "CompanyID" => $request->get('CompanyID'),
                "companyLocationID" => $request->get('companyLocationID'),
                "countryID" => $request->get('countryID'),
                "emailAddress" => $request->get('emailAddress'),
                "emailAddress2" => $request->get('emailAddress2'),
                "emailAddress3" => $request->get('emailAddress3'),
                "extension" => $request->get('extension'),
                "externalID" => $request->get('externalID'),
                "facebookUrl" => $request->get('facebookUrl'),
                "faxNumber" => $request->get('faxNumber'),
                "firstName" => $request->get('firstName'),
                "isActive" => $request->get('isActive'),
                "isOptedOutFromBulkEmail" => $request->get('isOptedOutFromBulkEmail'),
                "lastName" => $request->get('lastName'),
                "linkedInUrl" => $request->get('linkedInUrl'),
                "middleInitial" => $request->get('middleInitial'),
                "mobilePhone" => $request->get('mobilePhone'),
                "namePrefix" => $request->get('namePrefix'),
                "nameSuffix" => $request->get('nameSuffix'),
                "note" => $request->get('note'),
                "receivesEmailNotifications" => $request->get('receivesEmailNotifications'),
                "phone" => $request->get('phone'),
                "primaryContact" => $request->get('primaryContact'),
                "roomNumber" => $request->get('roomNumber'),
                "state" => $request->get('state'),
                "title" => $request->get('title'),
                "twitterUrl" => $request->get('twitterUrl'),
                "zipCode" => $request->get('zipCode'),
                "userDefinedFields" => $request->get('userDefinedFields')
            )
        );

        $contactData = json_encode(
            array('restModelInput' =>
                array(
                    "CompanyID" => $request->get('CompanyID'),
                    "FirstName" => $request->get('FirstName'),
                    "Id" => $request->get('Id'),
                    "IsActive" => $request->get('IsActive'),
                    "LastName" => $request->get('LastName'),
                )
            )
        );

        dd($contactData);

        $this->CURL_Request($this->BASE_URL, $contactData, 'POST');
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|Response|View
     */
    public function show($id)
    {
        //Contact Update Control
        if(empty($this->items)) {
            $this->initialQuery();
        }

        return view('contact/contact_update') -> with('items', $this->items);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|Response|View
     */
    public function edit($id)
    {
        //Contact Edit Control for updating
        $editRecord = $this->getEditRecord($this->BASE_URL, $id);
        $companyIdData = $this->companyQuery();
        return view('contact/contact_update') -> with(array('editRecord'=>$editRecord, 'companyIdData'=>$companyIdData));
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
        //Update Contact
        $updateData = $request->all();
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        //Delete Contact

    }
}
