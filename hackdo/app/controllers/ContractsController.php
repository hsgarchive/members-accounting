<?php

class ContractsController extends \BaseController {

	/**
	 * Display a listing of contracts
	 *
	 * @return Response
	 */
	public function index()
	{
		$contracts = Contract::all();

		return View::make('contracts.index', compact('contracts'));
	}

	/**
	 * Show the form for creating a new contract
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('contracts.create');
	}

	/**
	 * Store a newly created contract in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Contract::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Contract::create($data);

		return Redirect::route('contracts.index');
	}

	/**
	 * Display the specified contract.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$contract = Contract::findOrFail($id);

		return View::make('contracts.show', compact('contract'));
	}

	/**
	 * Show the form for editing the specified contract.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$contract = Contract::find($id);

		return View::make('contracts.edit', compact('contract'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$contract = Contract::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Contract::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$contract->update($data);

		return Redirect::route('contracts.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Contract::destroy($id);

		return Redirect::route('contracts.index');
	}

}