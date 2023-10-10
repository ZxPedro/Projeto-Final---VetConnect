<?php

namespace Database\Seeders;

use App\Models\AnimalBreed;
use Illuminate\Database\Seeder;

class AnimalBreedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AnimalBreed::truncate();



        $data = [
            [
                "id" => 1,
                "especie" => 0,
                "name" => "AFGHAN HOUND",
            ],
            [
                "id" => 2,
                "especie" => 0,
                "name" => "Affenpinscher",
            ],
            [
                "id" => 3,
                "especie" => 0,
                "name" => "Airedale Terrier",
            ],
            [
                "id" => 4,
                "especie" => 0,
                "name" => "Akita",
            ],
            [
                "id" => 5,
                "especie" => 0,
                "name" => "American Staffordshire Terrier",
            ],
            [
                "id" => 6,
                "especie" => 0,
                "name" => "Antigo Cão de Pastor Inglês",
            ],
            [
                "id" => 7,
                "especie" => 0,
                "name" => "Basset Azul da Gasconha ",
            ],
            [
                "id" => 8,
                "especie" => 0,
                "name" => "Basset Fulvo da Bretanha",
            ],
            [
                "id" => 9,
                "especie" => 0,
                "name" => "Basset Hound ",
            ],
            [
                "id" => 10,
                "especie" => 0,
                "name" => "Beagle ",
            ],
            [
                "id" => 11,
                "especie" => 0,
                "name" => "Bearded Collie ",
            ],
            [
                "id" => 12,
                "especie" => 0,
                "name" => "Bichon Maltês ",
            ],
            [
                "id" => 13,
                "especie" => 0,
                "name" => "Bobtail ",
            ],
            [
                "id" => 14,
                "especie" => 0,
                "name" => "Border Collie ",
            ],
            [
                "id" => 15,
                "especie" => 0,
                "name" => "Boston Terrier ",
            ],
            [
                "id" => 16,
                "especie" => 0,
                "name" => "Boxer ",
            ],
            [
                "id" => 17,
                "especie" => 0,
                "name" => "Bull Terrier ",
            ],
            [
                "id" => 18,
                "especie" => 0,
                "name" => "Bullmastiff",
            ],
            [
                "id" => 19,
                "especie" => 0,
                "name" => "Bulldog frances",
            ],
            [
                "id" => 20,
                "especie" => 0,
                "name" => "Cão de Montanha dos Pirinéus",
            ],
            [
                "id" => 21,
                "especie" => 0,
                "name" => "Caniche ",
            ],
            [
                "id" => 22,
                "especie" => 0,
                "name" => "Chihuahua",
            ],
            [
                "id" => 23,
                "especie" => 0,
                "name" => "Cirneco do Etna",
            ],
            [
                "id" => 24,
                "especie" => 0,
                "name" => "Chow Chow ",
            ],
            [
                "id" => 25,
                "especie" => 0,
                "name" => "Cocker Spaniel (Americano ou Inglês]",
            ],
            [
                "id" => 26,
                "especie" => 0,
                "name" => "Dálmata ",
            ],
            [
                "id" => 27,
                "especie" => 0,
                "name" => "Dobermann ",
            ],
            [
                "id" => 28,
                "especie" => 0,
                "name" => "Dogue Alemão",
            ],
            [
                "id" => 29,
                "especie" => 0,
                "name" => "Dogue Argentino",
            ],
            [
                "id" => 30,
                "especie" => 0,
                "name" => "Dogue Canário",
            ],
            [
                "id" => 31,
                "especie" => 0,
                "name" => "Fox Terrier ",
            ],
            [
                "id" => 32,
                "especie" => 0,
                "name" => "Foxhound",
            ],
            [
                "id" => 33,
                "especie" => 0,
                "name" => "Galgo",
            ],
            [
                "id" => 34,
                "especie" => 0,
                "name" => "Golden Retriever ",
            ],
            [
                "id" => 35,
                "especie" => 0,
                "name" => "Gos d'Atura ",
            ],
            [
                "id" => 36,
                "especie" => 0,
                "name" => "Husky Siberiano",
            ],
            [
                "id" => 37,
                "especie" => 0,
                "name" => "Laika ",
            ],
            [
                "id" => 38,
                "especie" => 0,
                "name" => "Labrador Retriever",
            ],
            [
                "id" => 39,
                "especie" => 0,
                "name" => "Malamute-do-Alasca",
            ],
            [
                "id" => 40,
                "especie" => 0,
                "name" => "Mastin dos Pirenéus",
            ],
            [
                "id" => 41,
                "especie" => 0,
                "name" => "Mastin do Tibete",
            ],
            [
                "id" => 42,
                "especie" => 0,
                "name" => "Mastin Espanhol",
            ],
            [
                "id" => 43,
                "especie" => 0,
                "name" => "Mastín Napolitano",
            ],
            [
                "id" => 44,
                "especie" => 0,
                "name" => "Pastor Alemão",
            ],
            [
                "id" => 45,
                "especie" => 0,
                "name" => "Pastor Belga ",
            ],
            [
                "id" => 46,
                "especie" => 0,
                "name" => "Pastor de Brie",
            ],
            [
                "id" => 47,
                "especie" => 0,
                "name" => "Pastor dos Pirenéus de Cara Rosa ",
            ],
            [
                "id" => 48,
                "especie" => 0,
                "name" => "Pequinês",
            ],
            [
                "id" => 49,
                "especie" => 0,
                "name" => "Perdigueiro",
            ],
            [
                "id" => 50,
                "especie" => 0,
                "name" => "Pitbull ",
            ],
            [
                "id" => 51,
                "especie" => 0,
                "name" => "Podengo",
            ],
            [
                "id" => 52,
                "especie" => 0,
                "name" => "Pointer ",
            ],
            [
                "id" => 53,
                "especie" => 0,
                "name" => "Pug",
            ],
            [
                "id" => 54,
                "especie" => 0,
                "name" => "Rhodesian Ridgeback",
            ],
            [
                "id" => 55,
                "especie" => 0,
                "name" => "Rottweiller",
            ],
            [
                "id" => 56,
                "especie" => 0,
                "name" => "Rough Collie",
            ],
            [
                "id" => 57,
                "especie" => 0,
                "name" => "Sabueso (Espanhol ou Italiano]",
            ],
            [
                "id" => 58,
                "especie" => 0,
                "name" => "Saluki",
            ],
            [
                "id" => 59,
                "especie" => 0,
                "name" => "Samoiedo ",
            ],
            [
                "id" => 60,
                "especie" => 0,
                "name" => "São Bernardo ",
            ],
            [
                "id" => 61,
                "especie" => 0,
                "name" => "Scottish Terrier ",
            ],
            [
                "id" => 62,
                "especie" => 0,
                "name" => "Setter Irlandés ",
            ],
            [
                "id" => 63,
                "especie" => 0,
                "name" => "Shar-Pei ",
            ],
            [
                "id" => 64,
                "especie" => 0,
                "name" => "Shiba Inu ",
            ],
            [
                "id" => 65,
                "especie" => 0,
                "name" => "Smooth Collie",
            ],
            [
                "id" => 66,
                "especie" => 0,
                "name" => "Staffordshire Bull Terrier",
            ],
            [
                "id" => 67,
                "especie" => 0,
                "name" => "Teckel",
            ],
            [
                "id" => 68,
                "especie" => 0,
                "name" => "Terra-nova ",
            ],
            [
                "id" => 69,
                "especie" => 0,
                "name" => "Terrier Australiano",
            ],
            [
                "id" => 70,
                "especie" => 0,
                "name" => "Terrier Escocês ",
            ],
            [
                "id" => 71,
                "especie" => 0,
                "name" => "Terrier Irlandês ",
            ],
            [
                "id" => 72,
                "especie" => 0,
                "name" => "Terrier Japonês",
            ],
            [
                "id" => 73,
                "especie" => 0,
                "name" => "Terrier Negro Russo",
            ],
            [
                "id" => 74,
                "especie" => 0,
                "name" => "Terrier Norfolk",
            ],
            [
                "id" => 75,
                "especie" => 0,
                "name" => "Terrier Norwich",
            ],
            [
                "id" => 76,
                "especie" => 0,
                "name" => "Terrier Tibetano",
            ],
            [
                "id" => 77,
                "especie" => 0,
                "name" => "Welhs Terrier",
            ],
            [
                "id" => 78,
                "especie" => 0,
                "name" => "West Highland T.",
            ],
            [
                "id" => 79,
                "especie" => 0,
                "name" => "Wolfspitz",
            ],
            [
                "id" => 80,
                "especie" => 0,
                "name" => "Yorkshire Terrier",
            ],
            [
                "id" => 99,
                "especie" => 0,
                "name" => "SRD",
            ],
            [
                "id" => 100,
                "especie" => 0,
                "name" => "SHIH TZU",
            ],
            [
                "id" => 101,
                "especie" => 0,
                "name" => "Lhasa Apso",
            ],
            [
                "id" => 102,
                "especie" => 0,
                "name" => "Pastor de shetland",
            ],
            [
                "id" => 103,
                "especie" => 0,
                "name" => "Weimaraner",
            ],
            [
                "id" => 104,
                "especie" => 0,
                "name" => "Cane corso",
            ],
            [
                "id" => 105,
                "especie" => 0,
                "name" => "Cão d'água",
            ],
            [
                "id" => 106,
                "especie" => 0,
                "name" => "Dachshund",
            ],
            [
                "id" => 107,
                "especie" => 0,
                "name" => "Fila Brasileira",
            ],
            [
                "id" => 108,
                "especie" => 0,
                "name" => "Jack Russell",
            ],
            [
                "id" => 109,
                "especie" => 0,
                "name" => "Lulu da pomerânia",
            ],
            [
                "id" => 110,
                "especie" => 0,
                "name" => "Maltês",
            ],
            [
                "id" => 111,
                "especie" => 0,
                "name" => "Whippet",
            ],
            [
                "id" => 112,
                "especie" => 0,
                "name" => "Pincher",
            ],
            [
                "id" => 113,
                "especie" => 0,
                "name" => "Poodle",
            ],
            [
                "id" => 114,
                "especie" => 0,
                "name" => "Pastor Canadense",
            ],
            [
                "id" => 115,
                "especie" => 0,
                "name" => "Schnauzer",
            ],
            [
                "id" => 116,
                "especie" => 0,
                "name" => "Bulldog ingles",
            ],
            [
                "id" => 1000,
                "especie" => 1,
                "name" => "Abissínio",
            ],
            [
                "id" => 1001,
                "especie" => 1,
                "name" => "American Shorthair",
            ],
            [
                "id" => 1002,
                "especie" => 1,
                "name" => "Angorá",
            ],
            [
                "id" => 1003,
                "especie" => 1,
                "name" => "Azul Russo",
            ],
            [
                "id" => 1004,
                "especie" => 1,
                "name" => "Bengal",
            ],
            [
                "id" => 1005,
                "especie" => 1,
                "name" => "Brazilian Shorthair",
            ],
            [
                "id" => 1006,
                "especie" => 1,
                "name" => "British Shorthair",
            ],
            [
                "id" => 1007,
                "especie" => 1,
                "name" => "Burmese",
            ],
            [
                "id" => 1008,
                "especie" => 1,
                "name" => "Chartreux",
            ],
            [
                "id" => 1009,
                "especie" => 1,
                "name" => "Cornish Rex",
            ],
            [
                "id" => 1010,
                "especie" => 1,
                "name" => "Devon Rex",
            ],
            [
                "id" => 1011,
                "especie" => 1,
                "name" => "Egyptian Mau",
            ],
            [
                "id" => 1012,
                "especie" => 1,
                "name" => "European Shorthair",
            ],
            [
                "id" => 1013,
                "especie" => 1,
                "name" => "Exótico",
            ],
            [
                "id" => 1014,
                "especie" => 1,
                "name" => "Himalaio",
            ],
            [
                "id" => 1015,
                "especie" => 1,
                "name" => "Maine Coon",
            ],
            [
                "id" => 1016,
                "especie" => 1,
                "name" => "Munchkin",
            ],
            [
                "id" => 1017,
                "especie" => 1,
                "name" => "Norwegian Forest",
            ],
            [
                "id" => 1018,
                "especie" => 1,
                "name" => "Oriental",
            ],
            [
                "id" => 1019,
                "especie" => 1,
                "name" => "Persa",
            ],
            [
                "id" => 1020,
                "especie" => 1,
                "name" => "Ragdoll",
            ],
            [
                "id" => 1021,
                "especie" => 1,
                "name" => "Sagrado da Birmânia",
            ],
            [
                "id" => 1022,
                "especie" => 1,
                "name" => "Savannah",
            ],
            [
                "id" => 1023,
                "especie" => 1,
                "name" => "Scottish Fold",
            ],
            [
                "id" => 1024,
                "especie" => 1,
                "name" => "Siamês",
            ],
            [
                "id" => 1025,
                "especie" => 1,
                "name" => "Sphynx",
            ],
            [
                "id" => 1026,
                "especie" => 1,
                "name" => "SRD",
            ],
            [
                "id" => 2000,
                "especie" => 2,
                "name" => "Periquito Australiano",
            ],
            [
                "id" => 2001,
                "especie" => 2,
                "name" => "Calopsita",
            ],
            [
                "id" => 2002,
                "especie" => 2,
                "name" => "Agapornis",
            ],
            [
                "id" => 2003,
                "especie" => 2,
                "name" => "Manon",
            ],
            [
                "id" => 2004,
                "especie" => 2,
                "name" => "Mandarim",
            ],
            [
                "id" => 2005,
                "especie" => 2,
                "name" => "Rolinha diamante",
            ],
            [
                "id" => 2006,
                "especie" => 2,
                "name" => "Rolinha Portuguesa",
            ],
            [
                "id" => 2007,
                "especie" => 2,
                "name" => "Diamond Gold",
            ],
            [
                "id" => 2008,
                "especie" => 2,
                "name" => "Calafae",
            ],
            [
                "id" => 3001,
                "especie" => 3,
                "name" => "Hamster Sírio",
            ],
            [
                "id" => 3002,
                "especie" => 3,
                "name" => "Hamster Anão Russo",
            ],
            [
                "id" => 3003,
                "especie" => 3,
                "name" => "Topolino",
            ],
            [
                "id" => 3004,
                "especie" => 3,
                "name" => "Gerbil - Esquilo da Mongólia",
            ],
            [
                "id" => 3005,
                "especie" => 3,
                "name" => "camundungo",
            ],
            [
                "id" => 3006,
                "especie" => 3,
                "name" => "Mecol - Twister",
            ],
            [
                "id" => 3007,
                "especie" => 3,
                "name" => "Cinchila",
            ],
            [
                "id" => 3008,
                "especie" => 3,
                "name" => "Porquinho da Índica",
            ],
            [
                "id" => 4001,
                "especie" => 4,
                "name" => "Cágados",
            ],
            [
                "id" => 4002,
                "especie" => 4,
                "name" => "Tartarugas",
            ],
            [
                "id" => 4003,
                "especie" => 4,
                "name" => "Jabutis",
            ],
            [
                "id" => 4004,
                "especie" => 4,
                "name" => "Lagartos",
            ],
            [
                "id" => 4005,
                "especie" => 4,
                "name" => "Cobras",
            ],
            [
                "id" => 5001,
                "especie" => 5,
                "name" => "Poecilídeos",
            ],
            [
                "id" => 5002,
                "especie" => 5,
                "name" => "Bettas",
            ],
            [
                "id" => 5003,
                "especie" => 5,
                "name" => "Kinguio",
            ],
            [
                "id" => 5004,
                "especie" => 5,
                "name" => "Carpa",
            ],
            [
                "id" => 5005,
                "especie" => 5,
                "name" => "Barbos",
            ],
            [
                "id" => 5006,
                "especie" => 5,
                "name" => "Peixe-palhaço",
            ],
            [
                "id" => 5007,
                "especie" => 5,
                "name" => "Tetras",
            ],
            [
                "id" => 5008,
                "especie" => 5,
                "name" => "Acarás",
            ],
            [
                "id" => 5009,
                "especie" => 5,
                "name" => "Oscar",
            ],
            [
                "id" => 5010,
                "especie" => 5,
                "name" => "Cirurgiões",
            ],
            [
                "id" => 5011,
                "especie" => 5,
                "name" => "Cascudos",
            ],
            [
                "id" => 5012,
                "especie" => 5,
                "name" => "Coridoras",
            ],
            [
                "id" => 6001,
                "especie" => 6,
                "name" => "Sapos",
            ],
            [
                "id" => 6002,
                "especie" => 6,
                "name" => "Pererecas",
            ],
            [
                "id" => 6003,
                "especie" => 6,
                "name" => "Salamandras",
            ],
            [
                "id" => 7001,
                "especie" => 7,
                "name" => "Tarântulas ",
            ],
            [
                "id" => 7002,
                "especie" => 7,
                "name" => "Caramujos",
            ],
            [
                "id" => 7003,
                "especie" => 7,
                "name" => "Caranguejos",
            ],
        ];

        foreach ($data as $item) {
            AnimalBreed::create($item);
        }
    }
}
