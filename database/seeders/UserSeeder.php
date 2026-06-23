<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //? DIRECTOR

        User::create([
        'name' => 'Juan Carlos Sempere Bomboí',
        'email' => 'bomboi@gmail.com',
        'password' => bcrypt('jcsb1234'),
        'is_active' => true,
        'instrument' => 'Batuta',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);
    
        //? PERCUSSIÓ
    
        User::create([
        'name' => 'Rafael Agulló Blasco',
        'email' => 'rafagu@gmail.com',
        'password' => bcrypt('rab1234'),
        'is_active' => true,
        'instrument' => 'Percussió',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Germán Agulló Albors',
        'email' => 'geragu@gmail.com',
        'password' => bcrypt('gaa1234'),
        'is_active' => true,
        'instrument' => 'Percussió',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Mario Coloma Cerver',
        'email' => 'marcol@gmail.com',
        'password' => bcrypt('mcc1234'),
        'is_active' => true,
        'instrument' => 'Percussió',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Francisco Valor Llorens',
        'email' => 'fraval@gmail.com',
        'password' => bcrypt('fvl1234'),
        'is_active' => true,
        'instrument' => 'Percussió',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Marcos Verdú Verdú',
        'email' => 'marver@gmail.com',
        'password' => bcrypt('mvv1234'),
        'is_active' => true,
        'instrument' => 'Percussió',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Carlos Sellés Richart',
        'email' => 'carsel@gmail.com',
        'password' => bcrypt('csr1234'),
        'is_active' => true,
        'instrument' => 'Percussió',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Christian Molines Castelló',
        'email' => 'chrmol@gmail.com',
        'password' => bcrypt('cmc1234'),
        'is_active' => true,
        'instrument' => 'Percussió',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Daniel Ferrandiz',
        'email' => 'danfer@gmail.com',
        'password' => bcrypt('df1234'),
        'is_active' => true,
        'instrument' => 'Percussió',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Arnau Torró',
        'email' => 'arntor@gmail.com',
        'password' => bcrypt('at1234'),
        'is_active' => true,
        'instrument' => 'Percussió',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Mauro Colomina López',
        'email' => 'maucol@gmail.com',
        'password' => bcrypt('mcl1234'),
        'is_active' => true,
        'instrument' => 'Percussió',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Pablo Jordà Torró',
        'email' => 'pabjor@gmail.com',
        'password' => bcrypt('pjt1234'),
        'is_active' => true,
        'instrument' => 'Percussió',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Andreu Valor Galdón',
        'email' => 'andval@gmail.com',
        'password' => bcrypt('avg1234'),
        'is_active' => true,
        'instrument' => 'Percussió',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Marc Oltra Tomás',
        'email' => 'marolt@gmail.com',
        'password' => bcrypt('mot1234'),
        'is_active' => true,
        'instrument' => 'Percussió',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Román Moratal Sanchis',
        'email' => 'rommor@gmail.com',
        'password' => bcrypt('rms1234'),
        'is_active' => true,
        'instrument' => 'Percussió',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Andreu Torró',
        'email' => 'andtor@gmail.com',
        'password' => bcrypt('at1234'),
        'is_active' => true,
        'instrument' => 'Percussió',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Àngel Francés',
        'email' => 'angfra@gmail.com',
        'password' => bcrypt('af1234'),
        'is_active' => true,
        'instrument' => 'Percussió',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);


        //? TUBES

        User::create([
        'name' => 'Joaquín Carchano González',
        'email' => 'joacar@gmail.com',
        'password' => bcrypt('jcg1234'),
        'is_active' => true,
        'instrument' => 'Tuba',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Ivàn Arjona Jover',
        'email' => 'ivaarj@gmail.com',
        'password' => bcrypt('iaj1234'),
        'is_active' => true,
        'instrument' => 'Tuba',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        //? BOMBARDINS

        User::create([
        'name' => 'Felipe Galera Mullor',
        'email' => 'felgal@gmail.com',
        'password' => bcrypt('fgm1234'),
        'is_active' => true,
        'instrument' => 'Bombardí',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Iván Martí',
        'email' => 'ivamar@gmail.com',
        'password' => bcrypt('im1234'),
        'is_active' => true,
        'instrument' => 'Bombardí',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        //? TROMBONS

        User::create([
        'name' => 'Reces Sellés Dominguez',
        'email' => 'recsel@gmail.com',
        'password' => bcrypt('rsd1234'),
        'is_active' => true,
        'instrument' => 'Trombó',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Francisco Mota Sansalvador',
        'email' => 'framot@gmail.com',
        'password' => bcrypt('fms1234'),
        'is_active' => true,
        'instrument' => 'Trombó',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Francisco Cortés Vicedo',
        'email' => 'fracor@gmail.com',
        'password' => bcrypt('fcv1234'),
        'is_active' => true,
        'instrument' => 'Trombó',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Germán Jover Sellés',
        'email' => 'gerjov@gmail.com',
        'password' => bcrypt('gjs1234'),
        'is_active' => true,
        'instrument' => 'Trombó',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Andrés Palaci Moncunill',
        'email' => 'andpal@gmail.com',
        'password' => bcrypt('apm1234'),
        'is_active' => true,
        'instrument' => 'Trombó',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Alejandro Espinosa',
        'email' => 'aleesp@gmail.com',
        'password' => bcrypt('ae1234'),
        'is_active' => true,
        'instrument' => 'Trombó',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Pau Martínez',
        'email' => 'paumar@gmail.com',
        'password' => bcrypt('pm1234'),
        'is_active' => true,
        'instrument' => 'Trombó',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Joan Oltra Tomás',
        'email' => 'joaolt@gmail.com',
        'password' => bcrypt('jot1234'),
        'is_active' => true,
        'instrument' => 'Trombó',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        //? TROMPES

        User::create([
        'name' => 'Pascual Sansalvador',
        'email' => 'passan@gmail.com',
        'password' => bcrypt('ps1234'),
        'is_active' => true,
        'instrument' => 'Trompa',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Montse Brotons Pascual',
        'email' => 'monbro@gmail.com',
        'password' => bcrypt('mbp1234'),
        'is_active' => true,
        'instrument' => 'Trompa',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Marina Brotons Pascual',
        'email' => 'marbro@gmail.com',
        'password' => bcrypt('mbp1234'),
        'is_active' => true,
        'instrument' => 'Trompa',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Arnau Pascual',
        'email' => 'arnpas@gmail.com',
        'password' => bcrypt('ap1234'),
        'is_active' => true,
        'instrument' => 'Trompa',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Thais Martí',
        'email' => 'thamar@gmail.com',
        'password' => bcrypt('tm1234'),
        'is_active' => true,
        'instrument' => 'Trompa',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'José Luis Álvarez Céspedes',
        'email' => 'joseluisalvarezcespedes@gmail.com',
        'password' => bcrypt('jlac1234'),
        'is_active' => true,
        'instrument' => 'Trompa',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        //? TROMPETES

        User::create([
        'name' => 'José Vicente Pons Tomás',
        'email' => 'josvic@gmail.com',
        'password' => bcrypt('jvpt1234'),
        'is_active' => true,
        'instrument' => 'Trompeta',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Toni Moltó Pérez',
        'email' => 'tonmol@gmail.com',
        'password' => bcrypt('tmp1234'),
        'is_active' => true,
        'instrument' => 'Trompeta',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Mª Dolores Navajas',
        'email' => 'madnav@gmail.com',
        'password' => bcrypt('mdn1234'),
        'is_active' => true,
        'instrument' => 'Trompeta',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Rubén Cardona Jover',
        'email' => 'rubcar@gmail.com',
        'password' => bcrypt('rcj1234'),
        'is_active' => true,
        'instrument' => 'Trompeta',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Manolo Torró Quinto',
        'email' => 'mantor@gmail.com',
        'password' => bcrypt('mtq1234'),
        'is_active' => true,
        'instrument' => 'Trompeta',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Manuel Rosa Téllez',
        'email' => 'manros@gmail.com',
        'password' => bcrypt('mrt1234'),
        'is_active' => true,
        'instrument' => 'Trompeta',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'José Luis Lucas Palaci',
        'email' => 'joslui@gmail.com',
        'password' => bcrypt('jllp1234'),
        'is_active' => true,
        'instrument' => 'Trompeta',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Jorge Moltó Navarro',
        'email' => 'jormol@gmail.com',
        'password' => bcrypt('jmn1234'),
        'is_active' => true,
        'instrument' => 'Trompeta',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Jose Atencia',
        'email' => 'josate@gmail.com',
        'password' => bcrypt('ja1234'),
        'is_active' => true,
        'instrument' => 'Trompeta',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Juanfrran Payà Pérez',
        'email' => 'juapay@gmail.com',
        'password' => bcrypt('jpp1234'),
        'is_active' => true,
        'instrument' => 'Trompeta',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        //? SAXOS TENORS

        User::create([
        'name' => 'Martí Moll Seguí',
        'email' => 'mmollsegui@gmail.com',
        'password' => bcrypt('mms1234'),
        'is_active' => true,
        'instrument' => 'Saxo Tenor',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Laura Martínez',
        'email' => 'laumar@gmail.com',
        'password' => bcrypt('lm1234'),
        'is_active' => true,
        'instrument' => 'Saxo Tenor',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        //? SAXOS ALTS

        User::create([
        'name' => 'Pablo Montaner',
        'email' => 'pabmon@gmail.com',
        'password' => bcrypt('pm1234'),
        'is_active' => true,
        'instrument' => 'Saxo Alt',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Rafael Agulló Albors',
        'email' => 'rafagu@gmail.com',
        'password' => bcrypt('raa1234'),
        'is_active' => true,
        'instrument' => 'Saxo Alt',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Paula Pascual',
        'email' => 'paupas@gmail.com',
        'password' => bcrypt('pp1234'),
        'is_active' => true,
        'instrument' => 'Saxo Alt',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Clara García Marin',
        'email' => 'clargar@gmail.com',
        'password' => bcrypt('cgm1234'),
        'is_active' => true,
        'instrument' => 'Saxo Alt',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Antonio Sirvent Juan',
        'email' => 'antsir@gmail.com',
        'password' => bcrypt('asj1234'),
        'is_active' => true,
        'instrument' => 'Saxo Alt',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Joan González',
        'email' => 'joagon@gmail.com',
        'password' => bcrypt('jg1234'),
        'is_active' => true,
        'instrument' => 'Saxo Alt',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Laura Ruiz',
        'email' => 'laurui@gmail.com',
        'password' => bcrypt('lr1234'),
        'is_active' => true,
        'instrument' => 'Saxo Alt',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Mireia Brotons',
        'email' => 'mirbro@gmail.com',
        'password' => bcrypt('mb1234'),
        'is_active' => true,
        'instrument' => 'Saxo Alt',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Marc Martínez',
        'email' => 'marmar@gmail.com',
        'password' => bcrypt('mm1234'),
        'is_active' => true,
        'instrument' => 'Saxo Alt',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Olga Simarro',
        'email' => 'olgsim@gmail.com',
        'password' => bcrypt('os1234'),
        'is_active' => true,
        'instrument' => 'Saxo Alt',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        //? FAGOTS

        User::create([
        'name' => 'Enrique Igual Blasco',
        'email' => 'enrigu@gmail.com',
        'password' => bcrypt('eib1234'),
        'is_active' => true,
        'instrument' => 'Fagot',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Eva Boronat Soler',
        'email' => 'evabor@gmail.com',
        'password' => bcrypt('ebs1234'),
        'is_active' => true,
        'instrument' => 'Fagot',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        //? OBOES

        User::create([
        'name' => 'Alicia Igual Blasco',
        'email' => 'aliigu@gmail.com',
        'password' => bcrypt('aib1234'),
        'is_active' => true,
        'instrument' => 'Oboe',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Javi Alonso Fenollar',
        'email' => 'javalo@gmail.com',
        'password' => bcrypt('jaf1234'),
        'is_active' => true,
        'instrument' => 'Oboe',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Anna M. Moncho',
        'email' => 'annmon@gmail.com',
        'password' => bcrypt('amm1234'),
        'is_active' => true,
        'instrument' => 'Oboe',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        //? CLARINETS

        User::create([
        'name' => 'Juan Antonio Sellés',
        'email' => 'juaant@gmail.com',
        'password' => bcrypt('jas1234'),
        'is_active' => true,
        'instrument' => 'Clarinet',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Miguel Ángel Rodríguez',
        'email' => 'migang@gmail.com',
        'password' => bcrypt('mar1234'),
        'is_active' => true,
        'instrument' => 'Clarinet',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Cristina Sellés Richart',
        'email' => 'crisel@gmail.com',
        'password' => bcrypt('csr1234'),
        'is_active' => true,
        'instrument' => 'Clarinet',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Anthony Pardo Pardo',
        'email' => 'antpar@gmail.com',
        'password' => bcrypt('app1234'),
        'is_active' => true,
        'instrument' => 'Clarinet',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Marta Solé Monllau',
        'email' => 'marsol@gmail.com',
        'password' => bcrypt('msm1234'),
        'is_active' => true,
        'instrument' => 'Clarinet',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Claudia Marin Jover',
        'email' => 'clamar@gmail.com',
        'password' => bcrypt('cmj1234'),
        'is_active' => true,
        'instrument' => 'Clarinet',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Iván Palmer Juan',
        'email' => 'ivapal@gmail.com',
        'password' => bcrypt('ipj1234'),
        'is_active' => true,
        'instrument' => 'Clarinet',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Alfredo Ruiz Martínez',
        'email' => 'alfrui@gmail.com',
        'password' => bcrypt('arm1234'),
        'is_active' => true,
        'instrument' => 'Clarinet',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Nélida Jover Sellés',
        'email' => 'neljov@gmail.com',
        'password' => bcrypt('njs1234'),
        'is_active' => true,
        'instrument' => 'Clarinet',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Zaira Arjona Jover',
        'email' => 'zaiarj@gmail.com',
        'password' => bcrypt('zaj1234'),
        'is_active' => true,
        'instrument' => 'Clarinet',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Gabriel Blanes',
        'email' => 'gabbla@gmail.com',
        'password' => bcrypt('gb1234'),
        'is_active' => true,
        'instrument' => 'Clarinet',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Alex Miñana',
        'email' => 'alemiñ@gmail.com',
        'password' => bcrypt('am1234'),
        'is_active' => true,
        'instrument' => 'Clarinet',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Laura Picher',
        'email' => 'laupic@gmail.com',
        'password' => bcrypt('lwp1234'),
        'is_active' => true,
        'instrument' => 'Clarinet',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Carla Reig Igual',
        'email' => 'carrei@gmail.com',
        'password' => bcrypt('cri1234'),
        'is_active' => true,
        'instrument' => 'Clarinet',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Tiago Raigal Ríos',
        'email' => 'tiarai@gmail.com',
        'password' => bcrypt('trr1234'),
        'is_active' => true,
        'instrument' => 'Clarinet',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        //? FLAUTES

        User::create([
        'name' => 'Begoña Sancho Rodríguez',
        'email' => 'begsan@gmail.com',
        'password' => bcrypt('bsr1234'),
        'is_active' => true,
        'instrument' => 'Flauta',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Laura Pérez Navarro',
        'email' => 'lauper@gmail.com',
        'password' => bcrypt('lpn1234'),
        'is_active' => true,
        'instrument' => 'Flauta',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Laura Sellés García',
        'email' => 'lausel@gmail.com',
        'password' => bcrypt('lsg1234'),
        'is_active' => true,
        'instrument' => 'Flauta',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Bea Sellés García',
        'email' => 'beasel@gmail.com',
        'password' => bcrypt('bsg1234'),
        'is_active' => true,
        'instrument' => 'Flauta',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Gemma Rodríguez García',
        'email' => 'gemrod@gmail.com',
        'password' => bcrypt('grg1234'),
        'is_active' => true,
        'instrument' => 'Flauta',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Sonia Verdú Ferreira',
        'email' => 'sonver@gmail.com',
        'password' => bcrypt('svf1234'),
        'is_active' => true,
        'instrument' => 'Flauta',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Lara Reig Igual',
        'email' => 'larrei@gmail.com',
        'password' => bcrypt('lri1234'),
        'is_active' => true,
        'instrument' => 'Flauta',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Paula Rodríguez Pérez',
        'email' => 'paurod@gmail.com',
        'password' => bcrypt('prp1234'),
        'is_active' => true,
        'instrument' => 'Flauta',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Marta Moltó García',
        'email' => 'marmol@gmail.com',
        'password' => bcrypt('mmg1234'),
        'is_active' => true,
        'instrument' => 'Flauta',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'María Simarro Sellés',
        'email' => 'marsim@gmail.com',
        'password' => bcrypt('mss1234'),
        'is_active' => true,
        'instrument' => 'Flauta',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        //? EXCEDÈNCIA

        User::create([
        'name' => 'Lydia Moyano Navarro',
        'email' => 'lydmoy@gmail.com',
        'password' => bcrypt('lmn1234'),
        'is_active' => false,
        'instrument' => 'Trompa',  // - ??
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Paloma Botella Faus',
        'email' => 'palbot@gmail.com',
        'password' => bcrypt('pbf1234'),
        'is_active' => false,
        'instrument' => 'Flauta',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Oscar Amezcua',
        'email' => 'oscame@gmail.com',
        'password' => bcrypt('oa1234'),
        'is_active' => false,
        'instrument' => 'Clarinet',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Anna María Flores G.',
        'email' => 'annmar@gmail.com',
        'password' => bcrypt('amfg1234'),
        'is_active' => false,
        'instrument' => '',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Rafa Micó',
        'email' => 'rafmic@gmail.com',
        'password' => bcrypt('rm1234'),
        'is_active' => false,
        'instrument' => 'Saxo Alt',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Sandra Cortés Reig',
        'email' => 'sancor@gmail.com',
        'password' => bcrypt('scr1234'),
        'is_active' => false,
        'instrument' => '',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Marta Agulló López',
        'email' => 'maragu@gmail.com',
        'password' => bcrypt('mal1234'),
        'is_active' => false,
        'instrument' => 'Trompeta', // - ?
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Joel Picornell',
        'email' => 'joepic@gmail.com',
        'password' => bcrypt('jp1234'),
        'is_active' => false,
        'instrument' => '',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => '',
        'email' => '@gmail.com',
        'password' => bcrypt('1234'),
        'is_active' => false,
        'instrument' => '',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        //? JUBILATS

        User::create([
        'name' => 'Antonio Moltó',
        'email' => 'antmol@gmail.com',
        'password' => bcrypt('am1234'),
        'is_active' => false,
        'instrument' => '',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Ramón Juan Verdú',
        'email' => 'ramjua@gmail.com',
        'password' => bcrypt('rjv1234'),
        'is_active' => false,
        'instrument' => '',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Jose Borrell',
        'email' => 'josbor@gmail.com',
        'password' => bcrypt('jb1234'),
        'is_active' => false,
        'instrument' => 'Trompeta',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Martí Gilabert',
        'email' => 'margil@gmail.com',
        'password' => bcrypt('mg1234'),
        'is_active' => false,
        'instrument' => 'Tuba',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Vicente Cortés',
        'email' => 'viccor@gmail.com',
        'password' => bcrypt('vc1234'),
        'is_active' => false,
        'instrument' => '',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

    }
}
