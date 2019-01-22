<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'chefUnite']);
        Role::create(['name' => 'chefDiretion']);
        Role::create(['name' => 'chefLaboratoire']);
        Role::create(['name' => 'chefSection']);
        Role::create(['name' => 'chefDepartement']);
		    	
    }
}
