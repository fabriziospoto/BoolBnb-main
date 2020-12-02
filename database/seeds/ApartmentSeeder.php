<?php

use App\Apartment;
use App\Category;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class ApartmentSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker) {
        $users = User::all();
        $categories = Category::all();

        $coordinate = [
            [41.89193, 12.51133],
            [45.46427, 9.18951],
            [40.85216, 14.26811],
            [45.07049, 7.68682],
            [38.13205, 13.33561],
            [44.40478, 8.94439],
            [44.49381, 11.33875],
            [43.77925, 11.24626],
            [37.49223, 15.07041],
            [41.12066, 16.86982],
            [45.43719, 12.33458],
        ];

        $coordinate2 = [
            [41.89972, 12.48361],
            [45.47265, 9.17398],
            [40.84758, 14.24141],
            [45.06721, 7.65923],
            [38.11794, 13.36000],
            [44.41661, 8.90173],
            [44.50030, 11.32830],
            [43.77283, 11.24470],
            [37.51149, 15.07944],
            [41.13057, 16.83622],
            [45.43074, 12.35459],
        ];

        $city = [
            'Roma',
            'Milano',
            'Napoli',
            'Torino',
            'Palermo',
            'Genova',
            'Bologna',
            'Firenze',
            'Catania',
            'Bari',
            'Venezia',
        ];

        for ($i = 0; $i < 11; $i++) {
            $newApartment = new Apartment;
            $newApartment->address = $faker->streetAddress() . ", " . $city[$i];
            $newApartment->latitude = $coordinate[$i][0];
            $newApartment->longitude = $coordinate[$i][1];
            $newApartment->title = 'Appartamento ' . ($i + 1);
            $newApartment->user_id = $users->random()->id;
            $newApartment->room_number = $faker->randomDigitNot(0);
            $newApartment->bath_number = $faker->randomDigitNot(0);
            $newApartment->bed_number = $faker->randomDigitNot(0);
            $newApartment->size = $faker->numberBetween($min = 20, $max = 180);
            $newApartment->description = 'Confortevole bilocale di circa 40mq sito al 1 piano (con ascensore) di un edificio storico della città, con il Duomo raggiungibile facilmente a piedi e vicinissimo alla fermata di metropolitana Crocetta della linea gialla.<br>
Questo bilocale è dotato di una camera da letto matrimoniale ed un ampio bagno. Entrando ci si ritrova nella zona giorno che si compone di un salotto con divano letto da una piazza e mezza (200x140cm comodo anche per due persone o 2 bambini) e mobile TV con televisore dotato di antenna satellitare per vedere i canali free internazionali e una cucina a vista con moderni elettrodomestici (tra cui lavastoviglie, microonde e piastra ad induzione) e un tavolo da pranzo con sedie abbinati. Le finestre della zona giorno si affacciano su un terrazzino a disposizione, circondato da piante di gelsomino e dotato di tavolo e sedie per goderne al massimo nella bella stagione. Il terrazzino si affaccia in una corte interna.
La zona notte è segue la zona giorno: la stanza da letto è arredata con letto matrimoniale (200x160), un comodo armadio, due comodini con lampada da lettura completano le dotazioni. Il bagno è provvisto di box doccia, molto ampia, ed di un lavabo doppio, specchio e WC. I pavimenti dell’appartamento sono in gres porcellanato che riprende i colori del legno trattato.
Taaac!';
            $newApartment->category_id = $categories->random()->id;
            $newApartment->visible = true;
            $newApartment->save();
        }

        for ($i = 0; $i < 11; $i++) {
            $newApartment = new Apartment;
            $newApartment->address = $faker->streetAddress() . ", " . $city[$i];
            $newApartment->latitude = $coordinate2[$i][0];
            $newApartment->longitude = $coordinate2[$i][1];
            $newApartment->title = 'Appartamento ' . ($i + 1);
            $newApartment->user_id = $users->random()->id;
            $newApartment->room_number = $faker->randomDigitNot(0);
            $newApartment->bath_number = $faker->randomDigitNot(0);
            $newApartment->bed_number = $faker->randomDigitNot(0);
            $newApartment->size = $faker->numberBetween($min = 20, $max = 180);
            $newApartment->description = 'L’appartamento si trova al primo piano a 150 metri dal centro di Cortina e a cinque minuti a piedi dalla stazione. E’ molto comodo anche per chi volesse sciare: ci troviamo a pochi passi dalla Funivia delle Tofane e a pochi minuti dalla Funivia Faloria.
L’appartamento, dotato di terrazza, è confortevole e silenzioso. E ri-Taaac!';
            $newApartment->category_id = $categories->random()->id;
            $newApartment->visible = true;
            $newApartment->save();
        }

    }
}
