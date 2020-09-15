<?php

interface Veiculo {

	public function acelerar($velocidade);
	public function frenar($velocidade);
	public function trocarMarcha($marcha);

}
//para implementar mais basta colocar vírgula "class Civic implements Veiculo, automovel... 

abstract class Automovel implements Veiculo {

	public function acelerar($velocidade)
	{

		echo "O veículo acelerou até " . $velocidade . "KM/h";

	}

	public function frenar($velocidade)
	{

		echo "O veículo frenou até " . $velocidade . "KM/h";

	}

	public function trocarMarcha($marcha)
	{

		echo "o veículo engatou a " . $marcha . "ª marcha.";

	}
}


class DelRey extends Automovel{

	public function empurrar(){


	}

}

$carro = new Automovel();

$carro->acelerar(200);


?>