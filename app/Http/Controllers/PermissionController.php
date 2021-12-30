<?php
namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    public function Permission()
    {
        $dev_permission = Permission::where('slug','add-users')->first();
        $manager_permission = Permission::where('slug', 'edit-users')->first();
        $agent_permission = Permission::where('slug', 'add-prospect')->first();

        //RoleTableSeeder.php
        $dev_role = new Role();
        $dev_role->slug = 'developer';
        $dev_role->name = 'Developer';
        $dev_role->save();
        $dev_role->permissions()->attach($dev_permission);

        $manager_role = new Role();
        $manager_role->slug = 'manager';
        $manager_role->name = 'Manager';
        $manager_role->save();
        $manager_role->permissions()->attach($manager_permission);

        $agent_role = new Role();
        $agent_role->slug = 'agent';
        $agent_role->name = 'Agent';
        $agent_role->save();
        $agent_role->permissions()->attach($agent_permission);

        $dev_role = Role::where('slug','developer')->first();
        $manager_role = Role::where('slug', 'manager')->first();
        $agent_role = Role::where('slug', 'agent')->first();

        $addProspect = new Permission();
        $addProspect->slug = 'add-prospect';
        $addProspect->name = 'Create Prospect';
        $addProspect->save();
        $addProspect->roles()->attach($manager_role);
        $addProspect->roles()->attach($agent_role);

        $editProspect = new Permission();
        $editProspect->slug = 'edit-prospect';
        $editProspect->name = 'Edit Prospect';
        $editProspect->save();
        $editProspect->roles()->attach($manager_role);

        $dev_role = Role::where('slug','developer')->first();
        $manager_role = Role::where('slug', 'manager')->first();
        $agent_role = Role::where('slug', 'agent')->first();

        $dev_perm = Permission::where('slug','create-tasks')->first();
        $manager_perm = Permission::where('slug','edit-users')->first();
        $agent_perm = Permission::where('slug','add-prospect')->first();

        $developer = new User();
        $developer->name = 'Admin';
        $developer->email = 'admin@stc.crm';
        $developer->password = bcrypt('password');
        $developer->save();
        $developer->roles()->attach($dev_role);
        $developer->permissions()->attach($dev_perm);

        $manager = new User();
        $manager->name = 'Manager';
        $manager->email = 'manager@stc.crm';
        $manager->password = bcrypt('manager');
        $manager->save();
        $manager->roles()->attach($manager_role);
        $manager->permissions()->attach($manager_perm);

        $agent = new User();
        $agent->name = 'Agent';
        $agent->email = 'agent@stc.crm';
        $agent->password = bcrypt('agent');
        $agent->save();
        $agent->roles()->attach($agent_role);
        $agent->permissions()->attach($agent_perm);


        return redirect()->back();
    }
}
