<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Create roles
        $superAdmin = Role::create(['name' => 'superadmin']);
        $kepalaSMP = Role::create(['name' => 'kepala_sekolah_smp']);
        $kepalaSD = Role::create(['name' => 'kepala_sekolah_sd']);
        $adminYayasan = Role::create(['name' => 'admin_yayasan']);
        $adminTKIT = Role::create(['name' => 'admin_tkit']);
        $adminSDIT = Role::create(['name' => 'admin_sdit']);
        $adminSMPIT = Role::create(['name' => 'admin_smpit']);
        $guruSD = Role::create(['name' => 'guru_sd']);
        $guruSMP = Role::create(['name' => 'guru_smp']);
        $staff = Role::create(['name' => 'staf']);

        // Create users and assign roles
        $superAdminUser = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('password123'),
            'role' => 'superadmin' // Tambahkan nilai untuk kolom role
        ]);
        $superAdminUser->assignRole($superAdmin);

        $kepalaSMPUser = User::create([
            'name' => 'Kepala SMP',
            'email' => 'kepala_smp@example.com',
            'password' => Hash::make('password123'),
            'role' => 'kepala_sekolah_smp' // Tambahkan nilai untuk kolom role
        ]);
        $kepalaSMPUser->assignRole($kepalaSMP);

        $kepalaSDUser = User::create([
            'name' => 'Kepala SD',
            'email' => 'kepala_sd@example.com',
            'password' => Hash::make('password123'),
            'role' => 'kepala_sekolah_sd' // Tambahkan nilai untuk kolom role
        ]);
        $kepalaSDUser->assignRole($kepalaSD);

        $adminYayasanUser = User::create([
            'name' => 'Admin Yayasan',
            'email' => 'admin_yayasan@example.com',
            'password' => Hash::make('password123'),
            'role' => 'admin_yayasan' // Tambahkan nilai untuk kolom role
        ]);
        $adminYayasanUser->assignRole($adminYayasan);

        $adminTKITUser = User::create([
            'name' => 'Admin TKIT',
            'email' => 'admin_tkit@example.com',
            'password' => Hash::make('password123'),
            'role' => 'admin_tkit' // Tambahkan nilai untuk kolom role
        ]);
        $adminTKITUser->assignRole($adminTKIT);

        $adminSDITUser = User::create([
            'name' => 'Admin SDIT',
            'email' => 'admin_sdit@example.com',
            'password' => Hash::make('password123'),
            'role' => 'admin_sdit' // Tambahkan nilai untuk kolom role
        ]);
        $adminSDITUser->assignRole($adminSDIT);

        $adminSMPITUser = User::create([
            'name' => 'Admin SMPIT',
            'email' => 'admin_smpit@example.com',
            'password' => Hash::make('password123'),
            'role' => 'admin_smpit' // Tambahkan nilai untuk kolom role
        ]);
        $adminSMPITUser->assignRole($adminSMPIT);

        $guruSDUser = User::create([
            'name' => 'Guru SD',
            'email' => 'guru_sd@example.com',
            'password' => Hash::make('password123'),
            'role' => 'guru_sd' // Tambahkan nilai untuk kolom role
        ]);
        $guruSDUser->assignRole($guruSD);

        $guruSMPUser = User::create([
            'name' => 'Guru SMP',
            'email' => 'guru_smp@example.com',
            'password' => Hash::make('password123'),
            'role' => 'guru_smp' // Tambahkan nilai untuk kolom role
        ]);
        $guruSMPUser->assignRole($guruSMP);

        $staffUser = User::create([
            'name' => 'Staff',
            'email' => 'staff@example.com',
            'password' => Hash::make('password123'),
            'role' => 'staf' // Tambahkan nilai untuk kolom role
        ]);
        $staffUser->assignRole($staff);
    }
}
