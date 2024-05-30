<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'index testimonial',
            'input testimonial',
            'delete testimonial',
            'edit testimonial',
            'index role',
            'input role',
            'delete role',
            'edit role',
            'index permission',
            'input permission',
            'delete permission',
            'edit permission',
            'index book',
            'input book',
            'delete book',
            'edit book',
            'index class',
            'input class',
            'delete class',
            'edit class',
            'index room',
            'input room',
            'delete room',
            'edit room',
            'index program',
            'input program',
            'delete program',
            'edit program',
            'index expenses',
            'input expenses',
            'delete expenses',
            'edit expenses',
            'index employee',
            'input employee',
            'delete employee',
            'edit employee',
            'index mistake',
            'input mistake',
            'delete mistake',
            'edit mistake',
            'index over-time',
            'input over-time',
            'delete over-time',
            'edit over-time',
            'index customer',
            'input customer',
            'delete customer',
            'edit customer',
            'index folup',
            'input folup',
            'delete folup',
            'edit folup',
            'index school-service-program',
            'input school-service-program',
            'delete school-service-program',
            'edit school-service-program',
            'index corporate',
            'input corporate',
            'delete corporate',
            'edit corporate',
            'index certificate',
            'input certificate',
            'delete certificate',
            'edit certificate',
            'index student-corporate',
            'input student-corporate',
            'delete student-corporate',
            'edit student-corporate',
            'tables',
            'Incoming',
            'layout',

        ];
        foreach ($permissions as $permission) {
            \Spatie\Permission\Models\Permission::firstOrCreate(['name' => $permission]);
        }
    }
}
