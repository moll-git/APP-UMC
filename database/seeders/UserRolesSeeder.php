<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;

class UserRolesSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Recuperar todos los roles
        $roles = Role::all()->pluck('id', 'name');

        // =========================================================================
        // JUNTA DIRECTIVA Y CARGOS
        // =========================================================================

        // PRESIDENT - TONI MOLTÓ
        $user = User::where('email', 'tonmol@gmail.com')->first();
        if ($user) {
            $user->roles()->sync([
                $roles['president'],
                $roles['member'],
            ]);
        }

        // VICEPRESIDENTES - BEGONYA SANCHO I BEA SELLÉS
        $vicepresidentes = [
            'begsan@gmail.com', // Begonya Sancho
            'beasel@gmail.com', // Bea Sellés
        ];
        foreach ($vicepresidentes as $email) {
            $user = User::where('email', $email)->first();
            if ($user) {
                $user->roles()->sync([
                    $roles['vice_president'],
                    $roles['member'],
                ]);
            }
        }

        // DELEGAT - IVÁN ARJONA
        $user = User::where('email', 'ivaarj@gmail.com')->first();
        if ($user) {
            $user->roles()->sync([
                $roles['delegat'],
            ]);
        }

        // SECRETARIA I CRONISTE - MARTA SOLÉ I ANTHONY
        $secretariaCroniste = [
            'marsol@gmail.com', // Marta Solé
            'antpar@gmail.com', // Anthony Pardo
        ];
        foreach ($secretariaCroniste as $email) {
            $user = User::where('email', $email)->first();
            if ($user) {
                $user->roles()->sync([
                    $roles['secretary'],
                    $roles['chronicler'],
                    $roles['member'],
                ]);
            }
        }

        // TRESORERIA I PAGAMENTS - MARINA I PONS
        $tresoreriaPagaments = [
            'marbro@gmail.com', // Marina Brotons
            'josvic@gmail.com', // José Vicente Pons
        ];
        foreach ($tresoreriaPagaments as $email) {
            $user = User::where('email', $email)->first();
            if ($user) {
                $user->roles()->sync([
                    $roles['treasurer'],
                    $roles['payments'],
                    $roles['member'],
                ]);
            }
        }

        // ESCOLA I TRESORERIA ESCOLA - BEGONYA, CRISTINA SATORRE I CRISTINA SELLÉS
        $escola = [
            'begsan@gmail.com', // Begonya Sancho
            // 'cristina.satorre@gmail.com', // Cristina Satorre - NO ENCONTRADA en UserSeeder
            'crisel@gmail.com', // Cristina Sellés
        ];
        foreach ($escola as $email) {
            $user = User::where('email', $email)->first();
            if ($user) {
                $user->roles()->sync([
                    $roles['school'],
                    $roles['school_treasurer'],
                    $roles['member'],
                ]);
            }
        }

        // XARXES BANDA - CLAUDIA I THAIS
        $xarxesBanda = [
            'clamar@gmail.com', // Claudia Marin
            'thamar@gmail.com', // Thais Martí
        ];
        foreach ($xarxesBanda as $email) {
            $user = User::where('email', $email)->first();
            if ($user) {
                $user->roles()->sync([
                    $roles['social_media'],
                    $roles['member'],
                ]);
            }
        }

        // XARXES ESCOLA - JAVI ALONSO I LAURA PICHER
        $xarxesEscola = [
            'javalo@gmail.com', // Javi Alonso
            'laupic@gmail.com', // Laura Picher
        ];
        foreach ($xarxesEscola as $email) {
            $user = User::where('email', $email)->first();
            if ($user) {
                $user->roles()->sync([
                    $roles['social_media'],
                    $roles['member'],
                ]);
            }
        }

        // ROPERÍA - LAURA SELLÉS
        $user = User::where('email', 'lausel@gmail.com')->first();
        if ($user) {
            $user->roles()->sync([
                $roles['wardrobe'],
                $roles['member'],
            ]);
        }

        // INSTRUMENTS - JORGE MOLTÓ
        $user = User::where('email', 'jormol@gmail.com')->first();
        if ($user) {
            $user->roles()->sync([
                $roles['instruments'],
                $roles['member'],
            ]);
        }

        // MANTENIMENT - CHRISTIAN MOLINES, CARLOS SELLÉS I JOSE BORRELL
        $manteniment = [
            'chrmol@gmail.com', // Christian Molines
            'carsel@gmail.com', // Carlos Sellés
            'josbor@gmail.com', // Jose Borrell (jubilat, is_active => false)
        ];
        foreach ($manteniment as $email) {
            $user = User::where('email', $email)->first();
            if ($user) {
                $user->roles()->sync([
                    $roles['maintenance'],
                    $roles['member'],
                ]);
            }
        }

        // ASSESSORIA ARTÍSTICA - FRANCISCO VALOR, FELIPE, BOMBOI
        $assessoriaArtistica = [
            'fraval@gmail.com', // Francisco Valor
            'felgal@gmail.com', // Felipe Galera
            'bomboi@gmail.com', // Juan Carlos Sempere (Bomboi)
        ];
        foreach ($assessoriaArtistica as $email) {
            $user = User::where('email', $email)->first();
            if ($user) {
                $user->roles()->sync([
                    $roles['artistic_advisory'],
                    $roles['member'],
                ]);
            }
        }

        // COMISSIÓ D'EVENTS - MARC MARTINEZ, MIREIA BROTONS I LAURA RUIZ
        $comissioEvents = [
            'marmar@gmail.com', // Marc Martínez
            'mirbro@gmail.com', // Mireia Brotons
            'laurui@gmail.com', // Laura Ruiz
        ];
        foreach ($comissioEvents as $email) {
            $user = User::where('email', $email)->first();
            if ($user) {
                $user->roles()->sync([
                    $roles['events'],
                    $roles['member'],
                ]);
            }
        }

        // LOTERIA - JUAN ANTONIO I PASQUAL
        $loteria = [
            'juaant@gmail.com', // Juan Antonio Sellés
            'passan@gmail.com', // Pascual Sansalvador
        ];
        foreach ($loteria as $email) {
            $user = User::where('email', $email)->first();
            if ($user) {
                $user->roles()->sync([
                    $roles['lottery'],
                    $roles['member'],
                ]);
            }
        }

        // ARXIU - NELI I FELIPE
        $arxiu = [
            'neljov@gmail.com', // Nélida Jover
            'felgal@gmail.com', // Felipe Galera
        ];
        foreach ($arxiu as $email) {
            $user = User::where('email', $email)->first();
            if ($user) {
                $user->roles()->sync([
                    $roles['archive'],
                    $roles['member'],
                ]);
            }
        }

        // SOCIS I RELACIONS INSTITUCIONALS - VICEDO I GABRI
        $socisRelacions = [
            'fracor@gmail.com', // Francisco Cortés Vicedo
            'gabbla@gmail.com', // Gabriel Blanes
        ];
        foreach ($socisRelacions as $email) {
            $user = User::where('email', $email)->first();
            if ($user) {
                $user->roles()->sync([
                    $roles['members_manager'],
                    $roles['institutional_relations'],
                    $roles['member'],
                ]);
            }
        }

        // =========================================================================
        // RESTO DE MÚSICOS ACTIVOS - Solo rol MEMBER
        // =========================================================================
        
        // Lista de emails que YA tienen roles asignados arriba
        $emailsConCargos = [
            'tonmol@gmail.com', 'begsan@gmail.com', 'beasel@gmail.com',
            'ivaarj@gmail.com', 'marsol@gmail.com', 'antpar@gmail.com',
            'marbro@gmail.com', 'josvic@gmail.com', 'crisel@gmail.com',
            'clamar@gmail.com', 'thamar@gmail.com', 'javalo@gmail.com',
            'laupic@gmail.com', 'lausel@gmail.com', 'jormol@gmail.com',
            'carsel@gmail.com', 'josbor@gmail.com', 'fraval@gmail.com',
            'felgal@gmail.com', 'bomboi@gmail.com', 'marmar@gmail.com',
            'mirbro@gmail.com', 'laurui@gmail.com', 'juaant@gmail.com',
            'passan@gmail.com', 'neljov@gmail.com', 'fracor@gmail.com',
            'gabbla@gmail.com', 'chrmol@gmail.com',
        ];

        // Todos los músicos activos del UserSeeder
        $todosLosMusicosActivos = [
            // PERCUSSIÓ
            'rafagu@gmail.com', 'geragu@gmail.com', 'marcol@gmail.com',
            'fraval@gmail.com', 'marver@gmail.com', 'carsel@gmail.com',
            'danfer@gmail.com', 'arntor@gmail.com', 'maucol@gmail.com',
            'pabjor@gmail.com', 'andval@gmail.com', 'marolt@gmail.com',
            'rommor@gmail.com', 'andtor@gmail.com', 'angfra@gmail.com',
            // TUBES
            'joacar@gmail.com', 'ivaarj@gmail.com',
            // BOMBARDINS
            'felgal@gmail.com', 'ivamar@gmail.com',
            // TROMBONS
            'recsel@gmail.com', 'framot@gmail.com', 'fracor@gmail.com',
            'gerjov@gmail.com', 'andpal@gmail.com', 'aleesp@gmail.com',
            'paumar@gmail.com', 'joaolt@gmail.com',
            // TROMPES
            'passan@gmail.com', 'monbro@gmail.com', 'marbro@gmail.com',
            'arnpas@gmail.com', 'thamar@gmail.com', 'joseluisalvarezcespedes@gmail.com',
            // TROMPETES
            'josvic@gmail.com', 'tonmol@gmail.com', 'madnav@gmail.com',
            'rubcar@gmail.com', 'mantor@gmail.com', 'manros@gmail.com',
            'joslui@gmail.com', 'jormol@gmail.com', 'josate@gmail.com',
            'juapay@gmail.com',
            // SAXOS TENORS
            'laumar@gmail.com', 'mmollsegui@gmail.com',
            // SAXOS ALTS
            'pabmon@gmail.com', 'paupas@gmail.com', 'clargar@gmail.com',
            'antsir@gmail.com', 'joagon@gmail.com', 'laurui@gmail.com',
            'mirbro@gmail.com', 'marmar@gmail.com', 'olgsim@gmail.com',
            // FAGOTS
            'enrigu@gmail.com', 'evabor@gmail.com',
            // OBOES
            'aliigu@gmail.com', 'javalo@gmail.com', 'annmon@gmail.com',
            // CLARINETS
            'juaant@gmail.com', 'migang@gmail.com', 'crisel@gmail.com',
            'antpar@gmail.com', 'marsol@gmail.com', 'clamar@gmail.com',
            'ivapal@gmail.com', 'alfrui@gmail.com', 'neljov@gmail.com',
            'zaiarj@gmail.com', 'gabbla@gmail.com', 'alemiñ@gmail.com',
            'laupic@gmail.com', 'carrei@gmail.com', 'tiarai@gmail.com',
            // FLAUTES
            'begsan@gmail.com', 'lauper@gmail.com', 'lausel@gmail.com',
            'beasel@gmail.com', 'gemrod@gmail.com', 'sonver@gmail.com',
            'larrei@gmail.com', 'paurod@gmail.com', 'marmol@gmail.com',
            'marsim@gmail.com',
        ];

        // Filtramos los que ya tienen cargos
        $musicosSinCargo = array_diff($todosLosMusicosActivos, $emailsConCargos);
        $musicosSinCargo = array_unique($musicosSinCargo); // Eliminar duplicados

        // Asignar solo rol 'member' a los músicos sin cargo específico
        $usuariosSinCargo = User::whereIn('email', $musicosSinCargo)->get();
        foreach ($usuariosSinCargo as $usuario) {
            $usuario->roles()->sync([$roles['member']]);
        }
    }
}