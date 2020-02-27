<?php

namespace App\Imports;

use App\Member;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class MembersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        $file = request()->file('file');
        $fileName = $file->getClientOriginalName();
        
        if($row['code']!=""){
            return Member::updateOrCreate([
                'code' => $row['code']],
            [
                'firstname'     => $row['first_name'],
                'lastname'     => $row['last_name'],
                'address1'     => $row['address1'],
                'address2'    => $row['deliveryaddress2'], 
                'city' => $row['deliverycity'],
                'state' => $row['deliverystateregion'],
                'postalcode' => $row['p_code'],
                'dispatch_date' => $row['dispatch_date'],
                'filename' => $fileName,
            ]);
        }
    }
    
    public function chunkSize(): int
    {
        return 500;
    }

    public function batchSize(): int
    {
        return 500;
    }

}
