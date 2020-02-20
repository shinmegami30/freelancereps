<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use App\Exports\MembersExport;
use App\Imports\MembersImport;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $members = Member::all();
        // $members = Member::orderBy('lastname', 'desc')->get();
        // $member = Member::where('lastname', 'search_item');
        // $members = DB::select('SELECT * FROM members');
        $members = Member::orderBy('id', 'desc')->paginate(10);
        return view('members.index')->with('members', $members);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'address1' => 'required',
            'address2' => 'required',
            'city' => 'required',
            'state' => 'required',
            'postalcode' => 'required',
            'code' => 'required'
        ]);

        $member = new Member;
        $member->firstname = $request->input('firstname');
        $member->lastname = $request->input('lastname');
        $member->address1 = $request->input('address1');
        $member->address2 = $request->input('address2');
        $member->city = $request->input('city');
        $member->state = $request->input('state');
        $member->postalcode = $request->input('postalcode');
        $member->code = $request->input('code');
        $member->dispatch_date = $request->input('dispatch_date');
        $member->save();

        return redirect('/members')->withStatus(__('Member successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        $member = Member::find($member->id);
        return view('members.edit')->with('member', $member);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'address1' => 'required',
            'address2' => 'required',
            'city' => 'required',
            'state' => 'required',
            'postalcode' => 'required',
            'code' => 'required'
        ]);

        $member = Member::find($member->id);
        $member->firstname = $request->input('firstname');
        $member->lastname = $request->input('lastname');
        $member->address1 = $request->input('address1');
        $member->address2 = $request->input('address2');
        $member->city = $request->input('city');
        $member->state = $request->input('state');
        $member->postalcode = $request->input('postalcode');
        $member->code = $request->input('code');
        $member->dispatch_date = $request->input('dispatch_date');
        $member->save();

        return redirect()->route('members.index')->withStatus(__('Member successfully updated.'));
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();

        return redirect()->route('members.index')->withStatus(__('Member successfully deleted.'));
    }

    public function run_import()
    {
        Excel::import(new MembersImport,request()->file('file'));
           
        return redirect('/members/import')->withStatus(__('Members successfully imported.'));
    }
    
    public function import()
    {
        return view('members.import');
    }
    
    public function export()
    {
        return Excel::download(new MembersExport, 'members.xlsx');
    }
}
