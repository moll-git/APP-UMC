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
        'email' => 'Mario.coloma.cerver@gmail.com',
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
        'email' => 'marcos_happymallets@hotmail.com',
        'password' => bcrypt('mvv1234'),
        'is_active' => true,
        'instrument' => 'Percussió',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Carlos Sellés Richart',
        'email' => 'carlosselles197@gmail.com',
        'password' => bcrypt('csr1234'),
        'is_active' => true,
        'instrument' => 'Percussió',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Christian Molines Castelló',
        'email' => 'christianmolines1992@gmail.com',
        'password' => bcrypt('cmc1234'),
        'is_active' => true,
        'instrument' => 'Percussió',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Daniel Ferrandiz Romero',
        'email' => 'daniferrandizromero@gmail.com',
        'password' => bcrypt('df1234'),
        'is_active' => true,
        'instrument' => 'Percussió',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Arnau Torró Llopis',
        'email' => 'atllopis2009@gmail.com',
        'password' => bcrypt('at1234'),
        'is_active' => true,
        'instrument' => 'Percussió',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Mauro Colomina López',
        'email' => 'maurocolomina7@gmial.com',
        'password' => bcrypt('mcl1234'),
        'is_active' => true,
        'instrument' => 'Percussió',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Pablo Jordà Torró',
        'email' => 'pablojordatorro@gmail.com',
        'password' => bcrypt('pjt1234'),
        'is_active' => true,
        'instrument' => 'Percussió',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Andreu Valor Galdón',
        'email' => 'avalor2010@gmail.com',
        'password' => bcrypt('avg1234'),
        'is_active' => true,
        'instrument' => 'Percussió',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Marc Oltra Tomás',
        'email' => 'moltratomas@gmail.com',
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
        'name' => 'Ángel Francés',
        'email' => 'angelfran9311@gmailcom',
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
        'email' => 'arjonaivan97@gmail.com',
        'password' => bcrypt('iaj1234'),
        'is_active' => true,
        'instrument' => 'Tuba',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        //? BOMBARDINS

        User::create([
        'name' => 'Felipe Galera Mullor',
        'email' => 'felipegaleramullor@hotmail.com',
        'password' => bcrypt('fgm1234'),
        'is_active' => true,
        'instrument' => 'Bombardí',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Iván Martí Cardona',
        'email' => 'Ivanmarticardona@gmail.com',
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
        'email' => 'pakomota@hotmail.com',
        'password' => bcrypt('fms1234'),
        'is_active' => true,
        'instrument' => 'Trombó',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Francisco Cortés Vicedo',
        'email' => 'vicedo1978@gmail.com',
        'password' => bcrypt('fcv1234'),
        'is_active' => true,
        'instrument' => 'Trombó',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Germán Jover Sellés',
        'email' => 'germanjover50@gmail.com',
        'password' => bcrypt('gjs1234'),
        'is_active' => true,
        'instrument' => 'Trombó',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Andrés Palaci Moncunill',
        'email' => 'andrespalaci17@gmail.com',
        'password' => bcrypt('apm1234'),
        'is_active' => true,
        'instrument' => 'Trombó',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Alejandro Espinosa',
        'email' => 'alejandroespinosacambra@gmail.com',
        'password' => bcrypt('ae1234'),
        'is_active' => true,
        'instrument' => 'Trombó',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Pau Martínez Pascual',
        'email' => 'paumartinezpascual0@gmail.com',
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
        'name' => 'Pascual Sansalvador Albors',
        'email' => 'pasqualsansalb@gmail.com',
        'password' => bcrypt('ps1234'),
        'is_active' => true,
        'instrument' => 'Trompa',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Montserrat Brotons Pascual',
        'email' => 'montserratbrotons@gmail.com',
        'password' => bcrypt('mbp1234'),
        'is_active' => true,
        'instrument' => 'Trompa',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Marina Brotons Pascual',
        'email' => 'marbrobpascualmarina@gmail.com',
        'password' => bcrypt('mbp1234'),
        'is_active' => true,
        'instrument' => 'Trompa',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Arnau Pascual',
        'email' => 'arnaupasnava@gmail.com',
        'password' => bcrypt('ap1234'),
        'is_active' => true,
        'instrument' => 'Trompa',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Thais Martí Cardona',
        'email' => 'tmarticardona@gmail.com',
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
        'email' => 'josevicenteponstomas@gmail.com',
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
        'email' => 'maidonavajas@gmail.com',
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
        'email' => 'matorqui@gmail.com',
        'password' => bcrypt('mtq1234'),
        'is_active' => true,
        'instrument' => 'Trompeta',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Manuel Rosa Téllez',
        'email' => 'mrosa77@hotmail.es',
        'password' => bcrypt('mrt1234'),
        'is_active' => true,
        'instrument' => 'Trompeta',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'José Luis Lucas Palaci',
        'email' => 'jolucpal@gmail.com',
        'password' => bcrypt('jllp1234'),
        'is_active' => true,
        'instrument' => 'Trompeta',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Jorge Moltó Navarro',
        'email' => 'jorgemolto.n@gmail.com',
        'password' => bcrypt('jmn1234'),
        'is_active' => true,
        'instrument' => 'Trompeta',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Jose Atencia Gisbert',
        'email' => 'joatgis@gmail.com',
        'password' => bcrypt('ja1234'),
        'is_active' => true,
        'instrument' => 'Trompeta',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Juanfrran Payà Pérez',
        'email' => 'juanfranpaya@gmail.com',
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
        'name' => 'Laura Martínez Pascual',
        'email' => 'pepipascual15@gmail.com',
        'password' => bcrypt('lm1234'),
        'is_active' => true,
        'instrument' => 'Saxo Tenor',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        //? SAXOS ALTS

        User::create([
        'name' => 'Pablo Montaner Brotons',
        'email' => 'pablococentaina@gmail.com',
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
        'name' => 'Paula Pascual Castelló',
        'email' => 'paaulapascual98@gmail.com',
        'password' => bcrypt('pp1234'),
        'is_active' => true,
        'instrument' => 'Saxo Alt',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Clara García Marin',
        'email' => 'cl.marin99@gmail.com',
        'password' => bcrypt('cgm1234'),
        'is_active' => true,
        'instrument' => 'Saxo Alt',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Antonio Sirvent Juan',
        'email' => 'ansirjua@gmail.com',
        'password' => bcrypt('asj1234'),
        'is_active' => true,
        'instrument' => 'Saxo Alt',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Joan González',
        'email' => 'jgb4548@gmail.com',
        'password' => bcrypt('jg1234'),
        'is_active' => true,
        'instrument' => 'Saxo Alt',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Laura Ruiz Martínez',
        'email' => 'lauraruiiz285@gmail.com',
        'password' => bcrypt('lr1234'),
        'is_active' => true,
        'instrument' => 'Saxo Alt',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Mireia Brotons Masanet',
        'email' => 'mireiabrotonss@gmail.com',
        'password' => bcrypt('mb1234'),
        'is_active' => true,
        'instrument' => 'Saxo Alt',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Marc Martínez Perez',
        'email' => 'marcmartinez02006@gmail.com',
        'password' => bcrypt('mm1234'),
        'is_active' => true,
        'instrument' => 'Saxo Alt',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Olga Simarro Sellés',
        'email' => 'aglorramis08@gmail.com',
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
        'email' => 'evaboronatsoler@gmail.com',
        'password' => bcrypt('ebs1234'),
        'is_active' => true,
        'instrument' => 'Fagot',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        //? OBOES

        User::create([
        'name' => 'Alicia Igual Blasco',
        'email' => 'reigigual@yahoo.es',
        'password' => bcrypt('aib1234'),
        'is_active' => true,
        'instrument' => 'Oboe',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Javi Alonso Fenollar',
        'email' => 'javialo93@gmail.com',
        'password' => bcrypt('jaf1234'),
        'is_active' => true,
        'instrument' => 'Oboe',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Anna Maria Moncho',
        'email' => 'annamoncho19@gmail.com',
        'password' => bcrypt('amm1234'),
        'is_active' => true,
        'instrument' => 'Oboe',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        //? CLARINETS

        User::create([
        'name' => 'Juan Antonio Sellés Pérez',
        'email' => 'juanantoniocabanya@gmail.com',
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
        'email' => 'criselri83@gmail.com',
        'password' => bcrypt('csr1234'),
        'is_active' => true,
        'instrument' => 'Clarinet',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Anthony Pardo Pardo',
        'email' => 'tonin.pardo@gmail.com',
        'password' => bcrypt('app1234'),
        'is_active' => true,
        'instrument' => 'Clarinet',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Marta Solé Monllau',
        'email' => 'masolemon@gmail.com',
        'password' => bcrypt('msm1234'),
        'is_active' => true,
        'instrument' => 'Clarinet',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Claudia Marin Jover',
        'email' => 'claudiamarin209@gmail.com',
        'password' => bcrypt('cmj1234'),
        'is_active' => true,
        'instrument' => 'Clarinet',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Iván Palmer Juan',
        'email' => 'clarinetiste93@gmail.com',
        'password' => bcrypt('ipj1234'),
        'is_active' => true,
        'instrument' => 'Clarinet',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Alfredo Ruiz Martínez',
        'email' => 'alfredo.ruiz.martinez.clarinet@gmail.com',
        'password' => bcrypt('arm1234'),
        'is_active' => true,
        'instrument' => 'Clarinet',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Nélida Jover Sellés',
        'email' => 'nutyhorus@hotmail.com',
        'password' => bcrypt('njs1234'),
        'is_active' => true,
        'instrument' => 'Clarinet',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Zaira Arjona Jover',
        'email' => 'zahira1027@gmail.com',
        'password' => bcrypt('zaj1234'),
        'is_active' => true,
        'instrument' => 'Clarinet',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Gabriel Blanes',
        'email' => 'gabrielbelda2001@gmail.com',
        'password' => bcrypt('gb1234'),
        'is_active' => true,
        'instrument' => 'Clarinet',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Alex Miñana',
        'email' => 'alex.rnx@gmail.com',
        'password' => bcrypt('am1234'),
        'is_active' => true,
        'instrument' => 'Clarinet',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Laura Weile Picher Garcia',
        'email' => 'lauraweilepicher@gmail.com',
        'password' => bcrypt('lwp1234'),
        'is_active' => true,
        'instrument' => 'Clarinet',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Carla Reig Igual',
        'email' => 'Creigigual@gmail.com',
        'password' => bcrypt('cri1234'),
        'is_active' => true,
        'instrument' => 'Clarinet',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Tiago Raigal Ríos',
        'email' => 'tiagoraigalrios@gmail.com',
        'password' => bcrypt('trr1234'),
        'is_active' => true,
        'instrument' => 'Clarinet',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        //? FLAUTES

        User::create([
        'name' => 'Begoña Sancho Rodríguez',
        'email' => 'bsanchoflautista@hotmail.com',
        'password' => bcrypt('bsr1234'),
        'is_active' => true,
        'instrument' => 'Flauta',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Laura Pérez Navarro',
        'email' => 'laura.perez.cocen@gmail.com',
        'password' => bcrypt('lpn1234'),
        'is_active' => true,
        'instrument' => 'Flauta',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Laura Sellés García',
        'email' => 'laureta_4_7@hotmail.com',
        'password' => bcrypt('lsg1234'),
        'is_active' => true,
        'instrument' => 'Flauta',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Bea Sellés García',
        'email' => 'beaselles30@gmail.com',
        'password' => bcrypt('bsg1234'),
        'is_active' => true,
        'instrument' => 'Flauta',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Gemma Rodríguez García',
        'email' => 'gerodgar1998@gmail.com',
        'password' => bcrypt('grg1234'),
        'is_active' => true,
        'instrument' => 'Flauta',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Sonia Verdú Ferreira',
        'email' => 'soniavf9@gmail.com',
        'password' => bcrypt('svf1234'),
        'is_active' => true,
        'instrument' => 'Flauta',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Lara Reig Igual',
        'email' => 'reigual09@gmail.com',
        'password' => bcrypt('lri1234'),
        'is_active' => true,
        'instrument' => 'Flauta',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Paula Rodríguez Pérez',
        'email' => 'paularope2004@gmail.com',
        'password' => bcrypt('prp1234'),
        'is_active' => true,
        'instrument' => 'Flauta',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Marta Moltó García',
        'email' => 'martamoltogarcia@gmail.com',
        'password' => bcrypt('mmg1234'),
        'is_active' => true,
        'instrument' => 'Flauta',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'María Simarro Sellés',
        'email' => 'vamestra@yahoo.es',
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
        'name' => 'Oscar Amezcua Fernandez',
        'email' => 'oscaraf99@hotmail.com',
        'password' => bcrypt('oa1234'),
        'is_active' => false,
        'instrument' => 'Clarinet',
        'avatar_url' => fake()->imageUrl(200, 200, 'people', true),
        ]);

        User::create([
        'name' => 'Anna María Flores García',
        'email' => 'annafloresgarcia@gmail.com',
        'password' => bcrypt('amfg1234'),
        'is_active' => false,
        'instrument' => 'Clarinet',
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
        'name' => 'José Antonio Moltó Perez',
        'email' => 'socatoin@gmail.com',
        'password' => bcrypt('am1234'),
        'is_active' => false,
        'instrument' => 'Trompeta',
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
