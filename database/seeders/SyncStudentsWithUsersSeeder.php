<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;
use App\Models\User;

class SyncStudentsWithUsersSeeder extends Seeder
{
    public function run()
    {
        // Récupérer tous les élèves qui n'ont pas encore de user_id
        $students = Student::whereNull('user_id')->get();

        foreach ($students as $student) {
            // Créer un utilisateur pour chaque élève
            $user = User::create([
                'name' => $student->name,
                'email' => $student->email,
                'password' => Hash::make('123456'), // Mot de passe par défaut. Dans un contexte réel, $password = Str::random(12); et on envoie un mail à l'élève pour qu'il change son mot de passe
            ]);

            // Mettre à jour l'élève avec le user_id
            $student->update(['user_id' => $user->id]);
        }
        
    }
}
