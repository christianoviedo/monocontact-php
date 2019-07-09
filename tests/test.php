<?php 

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

$apiurl = 'http://manager.monocontact.test/api';

use Monocontact\Monocontact;

$m = new Monocontact('t-token-key', 's-secret-key', $apiurl);

// print_r($m->listing->listing());

// print_r($m->listing->view(71));

// print_r($m->listing->find(['name'=>'Contactos Oviedo']));

// print_r($m->listing->create(['name'=>'Mono']));

// print_r($m->contact->list());

// print_r($m->contact->view(7493));

// print_r($m->contact->find(['email'=>'coviedo@tallerdigital.cl']));

try {
	$m->subscriber->create([
		'contact' => ['email'=>'juanita.mucho.disero@gmail.com', 'firstname'=>'Juanita', 'lastname'=>'Mucho Dinero'],
		'listing' => 'Inmobiliaita de la dehesa',
	]);
}
catch (Exception $e) {
	echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}

try {
	$m->subscriber->create([
		'contact' => ['email'=>'juanito.poco.dinero@gmail.com', 'firstname'=>'Juanito', 'lastname'=>'Poco Dinero'],
		'listing' => 'Inmobiliaita de la dehesa',
	]);
}
catch (Exception $e) {
	echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}

