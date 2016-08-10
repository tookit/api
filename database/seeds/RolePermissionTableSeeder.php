<?php


use Illuminate\Database\Seeder;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $adminId = 1;
        $permissionIds = Permission::all()->pluck('id')->toArray();

        foreach($permissionIds as $pid)
        {
            DB::table('role_permission')->insert([
                'role_id' => $adminId,
                'permission_id'=>$pid
            ]);
        }
    }
}
