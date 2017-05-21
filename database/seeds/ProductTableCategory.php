<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('products')->insert([
            [
            'PRDNUM' => 1,
            'PRDIDCATEGORY' => 9,
            'PRDNAME' => 'MSI H110M PRO-D',
            'PRDDESCRIPTION' => 'Et presentem la  H110M PRO-D de MSI, una placa amb un socket Intel 1151 i chisep H110.',
            'PRDIMG' => 'img/product1.png',
            'PRDSTOCK' => '10',
            'PRDPRICE' => '49.95',
            'PRDSTATUS' => true,
            ],
            [
            'PRDNUM' => 2,
            'PRDIDCATEGORY' => 9,
            'PRDNAME' => 'WD Blue 1TB SATA3',
            'PRDDESCRIPTION' => 'La seva informació és important per a la seva vida personal i professional. Feu el mateix que altres milions de persones fan: confiï en Western Digital per mantenir segures les seves dades.',
            'PRDIMG' => 'img/product2.png',
            'PRDSTOCK' => '5',
            'PRDPRICE' => '50.95',
            'PRDSTATUS' => true,
            ],
            [
            'PRDNUM' => 3,
            'PRDIDCATEGORY' => 9,
            'PRDNAME' => 'Asus Dual GTX 1060 OC 6GB GDDR5',
            'PRDDESCRIPTION' => "Acabada d'arribar l'Asus Dual GTX 1060 OC, tercera de la nova família de targetes gràfiques Nvidia sota la tecnologia Pascal, ens trobem amb una potent gràfica que ve a competir directament amb la seva competència més directa, les RX 480 de AMD.",
            'PRDIMG' => 'img/product3.png',
            'PRDSTOCK' => '3',
            'PRDPRICE' => '329',
            'PRDSTATUS' => true,
            ],
            [
            'PRDNUM' => 4,
            'PRDIDCATEGORY' => 9,
            'PRDNAME' => 'Kingston ValueRAM DDR4 2133 PC4-17000 4GB CL15',
            'PRDDESCRIPTION' => "Els mòduls de memòria ValueRAM ECC de Kingston Technology destaquen per la fiabilitat, garantia excepcional i assistència tècnica gratuïta que només Kingston pot oferir.",
            'PRDIMG' => 'img/product4.png',
            'PRDSTOCK' => '2',
            'PRDPRICE' => '34.95',
            'PRDSTATUS' => true,
            ],
            [
            'PRDNUM' => 5,
            'PRDIDCATEGORY' => 10,
            'PRDNAME' => 'Nox Hummer MC USB 3.0 Zero Edition Blanca',
            'PRDDESCRIPTION' => "Hummer MC és el xassís més especial de tot el catàleg de la marca, una semitorre amb 7 colors d'il luminació LED diferents en un sol xassís. Disponible en blanca i negra amb una gran finestra lateral que permetrà veure tot l'interior del PC al costat de tots els components il·luminats pels LEDs que incorpora.",
            'PRDIMG' => 'img/product5.png',
            'PRDSTOCK' => '2',
            'PRDPRICE' => '49.95',
            'PRDSTATUS' => true,
            ],
            [
            'PRDNUM' => 6,
            'PRDIDCATEGORY' => 10,
            'PRDNAME' => 'Owlotech EVO USB 3.0 500W',
            'PRDDESCRIPTION' => "Et presentem la EVO d'Owlotech, una torre en format ATX que no et deixarà impassible. Construïda amb els millors materials i amb una connectivitat USB 3.0 en la seva part frontal, la primera torre de la marca Owlotech es presenta com una torre amb un preu increïble.",
            'PRDIMG' => 'img/product6.png',
            'PRDSTOCK' => '3',
            'PRDPRICE' => '39.95',
            'PRDSTATUS' => true,
            ],
            [
            'PRDNUM' => 7,
            'PRDIDCATEGORY' =>10,
            'PRDNAME' => 'Phanteks Eclipse P400S Negra amb finestra',
            'PRDDESCRIPTION' => "La torre P400S permet als usuaris crear un sistema net i bonic. Amb il·luminació RGB que afegeix caràcter ambiental. Mentre que l'exterior de metall sòlid, dóna un disseny elegant i simple.",
            'PRDIMG' => 'img/product7.png',
            'PRDSTOCK' => '2',
            'PRDPRICE' => '49.95',
            'PRDSTATUS' => true,
            ],
            [
            'PRDNUM' => 8,
            'PRDIDCATEGORY' => 10,
            'PRDNAME' => 'Thermaltake View 27 USB 3.0 amb Finestra',
            'PRDDESCRIPTION' => "Configura el teu sistema de refrigeració líquida amb l'últim producte de la línia de caixes de Thermaltake -El xassís de semi torre View 27 Finestra d'ala de gavina -. A diferència d'altres caixes que es troben al mercat, el disseny de la finestra d'ala de gavina permet als usuaris mostrar el seu sistema per complet al mateix temps que es manté l'interior lliure de pols.",
            'PRDIMG' => 'img/product8.png',
            'PRDSTOCK' => '5',
            'PRDPRICE' => '49.95',
            'PRDSTATUS' => true,
            ],
            [
            'PRDNUM' => 9,
            'PRDIDCATEGORY' => 11,
            'PRDNAME' => 'Lenovo Essential V110-15ISK',
            'PRDDESCRIPTION' => "Et presentem el portàtil Essential V110-15ISK de Lenovo. Amb la seva teclat que millora el sistema, processadors i targeta gràfica d'avantguarda i fiabilitat integrada, el Lenovo V110 pot ajudar a la teva empresa avui i en el futur.",
            'PRDIMG' => 'img/product9.png',
            'PRDSTOCK' => '2',
            'PRDPRICE' => '349',
            'PRDSTATUS' => true,
            ],
            [
            'PRDNUM' => 10,
            'PRDIDCATEGORY' => 11,
            'PRDNAME' => 'Acer TravelMate P259-MG-549Q',
            'PRDDESCRIPTION' => "Et presentem la gamma TravelMate de Acer. Els PC sèrie TravelMate P2 d'Acer vénen en models de 15,6 polzades per cobrir les teves necessitats laborals del dia a dia mitjançant una combinació de funcions, rendiment i un disseny únic que aporta frescor al treball diari.",
            'PRDIMG' => 'img/product10.png',
            'PRDSTOCK' => '2',
            'PRDPRICE' => '349',
            'PRDSTATUS' => true,
            ],
            [
            'PRDNUM' => 11,
            'PRDIDCATEGORY' => 11,
            'PRDNAME' => 'Asus VivoBook X540SA-XX311T',
            'PRDDESCRIPTION' => "Et presentem el portàtil VivoBook X540SA-XX311T d'Asus. La sèrie VivoBook X540SA incorpora processadors Intel Celeron per posar al teu servei rendiment informàtic fluid i amb gran capacitat de resposta. Amb una avançada controladora de memòria i Windows 10, el X540SA és una plataforma ideal per a la informàtica diària.",
            'PRDIMG' => 'img/product11.png',
            'PRDSTOCK' => '1',
            'PRDPRICE' => '299',
            'PRDSTATUS' => true,
            ],
            [
            'PRDNUM' => 12,
            'PRDIDCATEGORY' => 11,
            'PRDNAME' => 'HP Stream 14-AX003NS',
            'PRDDESCRIPTION' => "Dissenyat per a la vida sempre connectat, aquest portàtil lleuger et permet canviar amb facilitat dels deures als teus programes favorits. Amb el seu disseny portàtil i la seva potent antena Wi-Fi, ofereix la productivitat i les característiques essencials que desitges, sense ni tan sols disminuir la velocitat.",
            'PRDIMG' => 'img/product12.png',
            'PRDSTOCK' => '1',
            'PRDPRICE' => '279',
            'PRDSTATUS' => true,
            ],
            [
            'PRDNUM' => 13,
            'PRDIDCATEGORY' => 12,
            'PRDNAME' => 'Unotec Cable DVI-D Mascle a DVI-D Mascle 1.4M',
            'PRDDESCRIPTION' => "Cable DVI-D de 1.4 metres de longitud reforçat amb malla de niló trenada que li dóna una alta resistència. Preparat per connectar monitors amb connexió DVI a les noves targetes gràfiques que incorporin connectors DVI.",
            'PRDIMG' => 'img/product13.png',
            'PRDSTOCK' => '9',
            'PRDPRICE' => '7.95',
            'PRDSTATUS' => true,
            ],
            [
            'PRDNUM' => 14,
            'PRDIDCATEGORY' => 12,
            'PRDNAME' => 'Cable HDMI 2.0 3D Mascle/Mascle Alta Qualitat 3m',
            'PRDDESCRIPTION' => "Et presentem el cable HDMI 2.0 de Equip, amb el qual podràs connectar tots els teus dispositius amb la màxima qualitat possible.",
            'PRDIMG' => 'img/product14.png',
            'PRDSTOCK' => '10',
            'PRDPRICE' => '10.95',
            'PRDSTATUS' => true,
            ],
            [
            'PRDNUM' => 15,
            'PRDIDCATEGORY' => 13,
            'PRDNAME' => 'Epson Cartutx de tinta C13T79114010 - Negre',
            'PRDDESCRIPTION' => "Et presentem el cartutx Claria Premium 33 C13T33644010 XLAmarillo d'Epson.",
            'PRDIMG' => 'img/product15.png',
            'PRDSTOCK' => '10',
            'PRDPRICE' => '19',
            'PRDSTATUS' => true,
            ],
            [
            'PRDNUM' => 16,
            'PRDIDCATEGORY' => 13,
            'PRDNAME' => 'Epson Claria Premium 33 - Groc',
            'PRDDESCRIPTION' => "Et presentem el cartutx Claria Premium 33 C13T33644010 XLAmarillo d'Epson.",
            'PRDIMG' => 'img/product16.png',
            'PRDSTOCK' => '5',
            'PRDPRICE' => '19.98',
            'PRDSTATUS' => true,
            ]
        ]);
    }
}