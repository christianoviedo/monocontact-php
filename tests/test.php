<?php 

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use Monocontact\Monocontact;

$m = new Monocontact('t-token-key', 's-secret-key');

print_r($m->listing->listing());

// print_r($m->listing->view(71));

// print_r($m->listing->find(['name'=>'Contactos Oviedo']));

// print_r($m->listing->create(['name'=>'Mono']));

// print_r($m->contact->list());

// print_r($m->contact->view(7493));

// print_r($m->contact->find(['email'=>'coviedo@tallerdigital.cl']));

/*print_r($m->subscriber->create([
	'contact' => ['email'=>'juanita.mucho.disero@gmail.com', 'firstname'=>'Juanita', 'lastname'=>'Mucho Dinero'],
	'listing' => 'Inmobiliaita de la dehesa',
]));*/

