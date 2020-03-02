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
    public function index(Request $request)
    {

        if ( auth()->user()->hasPermissionTo('view members')){
            // $members = Member::all();
            // $members = Member::orderBy('lastname', 'desc')->get();
            // $members = Member::where('lastname', 'search_item');
            // $members = DB::select('SELECT * FROM members');
            $q = $request->input('q');
            
            if($q!=""){
                $members = Member::where('lastname', 'LIKE', $q)
                ->orWhere('firstname', $q)
                ->orWhere('code', $q)->paginate(20);
            } else{
                $members = Member::orderBy('id', 'desc')->paginate(20);
            }
            return view('members.index')->with('members', $members);
        } else{
            return redirect()->route('dashboard')->withError(__('You have no permission to access that page.') );
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if ( auth()->user()->hasPermissionTo('publish members') ){
            return view('members.create');
        } else{
            return redirect()->route('dashboard')->withError(__('You have no permission to access that page.') );
        }
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
        if ( auth()->user()->hasPermissionTo('edit members')){
            $member = Member::find($member->id);
            return view('members.edit')->with('member', $member);
        }
        else{
            return redirect()->route('dashboard')->withError(__('You have no permission to access that page.') );
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        if ( auth()->user()->hasPermissionTo('edit members')){
            return view('members.edit', compact('member'));
        }
        else{
            return redirect()->route('dashboard')->withError(__('You have no permission to access that page.') );
        }
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

    public function mass_remove(Request $request)
    {
        $data_ids = $request->input('dataid');
        $data = Member::whereIn('id', $data_ids);
        if($data->delete()){
            return 1;
        }
    }

    public function search(Request $request)
    {
        $q = $request->input('q');
        return route('members.index', ['q' => $q]);
    }

    public function run_import()
    {
        Excel::import(new MembersImport,request()->file('file'));
           
        return redirect('/members/import')->withStatus(__('Members successfully imported.'));
    }
    
    public function import()
    {
        if ( auth()->user()->hasPermissionTo('import members')){
            return view('members.import');
        }
        else{
            return redirect()->route('dashboard')->withError(__('You have no permission to access that page.') );
        }
    }
    
    public function export()
    {
        return Excel::download(new MembersExport, 'members.xlsx');
    }
}
