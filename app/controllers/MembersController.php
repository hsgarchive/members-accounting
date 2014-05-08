<?php

class MembersController extends \BaseController {

	/**
	 * Display a listing of members
	 *
	 * @return Response
	 */
	public function index()
	{
		$members = Member::listAll();
		return View::make('members.index', compact('members'));
	}

	/**
	 * Show the form for creating a new member
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('members.create');
	}

	/**
	 * Store a newly created member in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Member::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Member::create($data);

		return Redirect::route('members.index');
	}

	/**
	 * Display the specified member.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// $member = Member::findOrFail($id);
	    $member = Member::search($id);
	    list($paypal, $stanchart) = $this->getTransactions($id, $member);
		return View::make('members.show', compact('member', 'paypal', 'stanchart'));
	}
	
	private function getTransactions($id, $member)
	{

// 	    "Date",
// 	    "Transaction",
// 	    "Currency",
// 	    "Deposit",
// 	    "Withdrawal",
// 	    "Running Balance",
// 	    "SGD Equivalent Balance",
// 	    "Balance"
	    $stanchart = new Spreadsheet('stanchart');
	    $csv = $stanchart->readCSV();
	    $stanchart = array();
	    foreach ($csv as $data)
	    {
            if (stripos($data['Transaction'], $id) !== false)
            {
                $stanchart[] = $data;
            }
	    }


// 	    "Date",
// 	    "Time",
// 	    "Time Zone",
// 	    "Name",
// 	    "Type",
// 	    "Status",
// 	    "Currency",
// 	    "Gross",
// 	    "Fee",
// 	    "Net",
// 	    "From Email Address",
// 	    "To Email Address",
// 	    "Transaction ID",
// 	    "Counterparty Status",
// 	    "Item Title",
// 	    "Address Line 1",
// 	    "Address Line 2/District/Neighbourhood",
// 	    "Town/City",
// 	    "State/Province/Region/County/Territory/Prefecture/Republic",
// 	    "Postcode",
// 	    "Country",
// 	    "Contact Phone Number",
// 	    "Balance"
	  
	    $paypal = new Spreadsheet('paypal');
	    $csv = $paypal->readCSV();
	    $paypal = array();
	    foreach ($csv as $data)
	    {
	        if (stripos($data['Name'], $id) !== false
	            || stripos($data["From Email Address"], $id) !== false)
	        {
	            $paypal[] = $data;
	        }
	    }
	    
	    return array($paypal, $stanchart);
	}

	/**
	 * Show the form for editing the specified member.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$member = Member::find($id);

		return View::make('members.edit', compact('member'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$member = Member::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Member::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$member->update($data);

		return Redirect::route('members.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Member::destroy($id);

		return Redirect::route('members.index');
	}

}