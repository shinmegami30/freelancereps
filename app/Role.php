<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends \Spatie\Permission\Models\Role
{
    public function defaultRoles()
    {
        return [
            'super-admin',
            'admin',
            'editor',
            'viewer',
        ];
    }
}
