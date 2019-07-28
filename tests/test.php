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
		'contact' => ['firstname'=>'Juanita', 'lastname'=>'Mucho Dinero'],
		//'contact' => ['email'=>'juanita.mucho.disero2@gmail.com', 'firstname'=>'Juanita', 'lastname'=>'Mucho Dinero'],
		'listing' => 'Inmobiliaita de la dehesa',
	]);
}
catch (Exception $e) {
	echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}

try {
	$m->subscriber->create([
		'contact' => ['code'=>'12867478-0', 'firstname'=>'Christian3', 'lastname'=>'Oviedo2'],
		'custom_fields'   => ['fecha-tarjeta-vecino'=>'2019-01-03 10:59:24'],
		'listing' => 'Inmobiliaita de la dehesa',
	]);
}
catch (Exception $e) {
	echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}

try {
	$m->subscriber->create([
		'contact' => ['code'=>'76433976-2', 'firstname'=>'Chr2', 'lastname'=>'Ov2', 'email'=>'christian.oviedo@gmail.com'],
		'custom_fields'   => ['fecha-tarjeta-vecino'=>'2019-01-04 10:59:24'],
		'listing' => 'Inmobiliaita de la dehesa',
	]);
}
catch (Exception $e) {
	echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}

