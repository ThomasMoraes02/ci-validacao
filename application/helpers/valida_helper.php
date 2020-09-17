<?php

function validaCEP($cep)
{
	if(strlen($cep) == 8) {
		$regex_cep = "/^[0-9]{2}[0-9]{3}[0-9]{3}$/";
		return preg_match($regex_cep, $cep);
	} else {
		return false;
	}
}

function validaTelefone($telefone)
{
	if(strlen($telefone) == 11) {
		$regex_telefone = "/^[0-9]{2}[0-9]{5}[0-9]{4}$/";
		return preg_match($regex_telefone, $telefone);
	} else {
		return false;
	}
}

function validaEmail($email)
{
	if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
		return true;
	} else {
		return false;
	}
}

function validaCPF($cpf)
{
	// Verifica se é diferente de 11 caracteres ou não é número
	if((!strlen($cpf) == 11 ) || (!is_numeric($cpf))) { 
		return false;
	} else {
		//Verifica se nessa cadeia de 11 caracteres possui numeros repetidos
		for($i = 0; $i<=11; $i++) {
			if(preg_match('/(\d)\1{10}/', $cpf)) { //str_repeat($i, 11) == $cpf
				return false;	
			} else {
				//Verifica o resultado do cáculo dos dígitos verificadores
				$primeiroDigito = 0;
				$segundoDigito = 0;

				for($i = 0, $peso = 10; $i <= 8; $i++, $peso--) {
					$primeiroDigito += $cpf[$i] * $peso;
					}

				for($i = 0, $peso = 11; $i <= 9; $i++, $peso--) {
					$segundoDigito += $cpf[$i] * $peso;
					}

				$calculo_um = (($primeiroDigito % 11) < 2) ? 0 : 11 - ($primeiroDigito % 11);
				$calculo_dois = (($segundoDigito % 11) < 2) ? 0 : 11 - ($segundoDigito % 11);
				
				//Verifica se os dígitos são correspondentes à suas posições
				if($calculo_um <> $cpf[9] || $calculo_dois <> $cpf[10]) {
					return false;
				} else {
					//CPF Válido
					return true;
				}
			}
		}
	}
}

/*
Validação de CPF

123.456.789-10 -> Ultimos dois dígitos são os dígitos indicadores;


1 - O primeiro passo é multiplicar os 9 dígitos pela base 
inversa a partir de 10 para descobrir o décimo dígito
-----------------------------------
1    2   3   4   5   6   7   8   9 
10   9   8   7   6   5   4   3   2
-----------------------------------
10   18  24  28  30  30  28  24  18
-----------------------------------
A soma da multiplicação é = 210 

2 - O resultado da soma é divido por 11 
PS: O resultado não é a divisão em si, mas sim o resto
210 / 11 = 19 - resto = 1 

3 - Subtrair 11 pelo resto da divisão -> 11 - 1 = 10 
IMPORTANTE !!!
SE o resultado da subtração form maior que 9, o dígito verificador é ZERO
SE não, o dígito verificador é o resultado dessa subtração 

Nesse caso, o primeiro dígito verificador é ZERO.
R: 123.456.789-0X 



3 - Para descobrir o segundo dígito verificador é feita a mesma operação
acrescentando o primeiro dígito descoberto
-----------------------------------
1    2   3   4   5   6   7   8   9  0
11  10   9   8   7   6   5   4   3  2
-----------------------------------
11   20  27  32  35  36  35  32  27 0
-----------------------------------
A soma da multiplicação é = 255

4 - O resultado da soma é divido por 11 
PS: O resultado não é a divisão em si, mas sim o resto
255 / 11 = 23 - resto = 2

5 - Subtrair 11 pelo resto da divisão -> 11 - 2 = 9 
SE o resultado da subtração form maior que 9, o dígito verificador é ZERO
SE não, o dígito verificador é o resultado dessa subtração 

Nesse caso, o segundo dígito verificador é 9.
R: 123.456.789-09 


//$regex_cpf = "/^[0-9]{3}[0-9]{3}[0-9]{3}[0-9]{2}$/"; 
		//return preg_match($regex_cpf, $cpf);
*/










































/*
 function validaCPF($cpf)
{
	if(strlen($cpf) == 11) {
		return true;
	} else {
		return false;


	} if($cpf) {
		for($i = 0; $i = 11; $i++) {
			if(str_repeat($i, 11) == $cpf) {
				return false;	
			} else {
				return true;
			}
		}  
	
		if($cpf) {

			$primeiroDigito = 0;
			$segundoDigito = 0;

			for($i = 0, $peso = 10; $i <= 8; $i++, $peso--) {
				$primeiroDigito += $cpf[$i] * $peso;
			}

			for($i = 0, $peso = 11; $i <= 9; $i++, $peso--) {
				$segundoDigito += $cpf[$i] * $peso;
			}

			$calculo_um = (($primeiroDigito % 11) < 2) ? 0 : 11 - ($primeiroDigito % 11);
			$calculo_dois = (($segundoDigito % 11) < 2) ? 0 : 11 - ($segundoDigito % 11);

			if($calculo_um <> $cpf[9] || $calculo_dois <> $cpf[10]) {
				return false;
			} else {
				return true;
			}
		} 
	}
}	
*/

/* 
funcionando

if(!strlen($cpf) == 11) {
		return false;
	} else {
		for($i = 0; $i = 11; $i++) {
			if(str_repeat($i, 11) == $cpf) {
				return false;	
			} else {
				$primeiroDigito = 0;
				$segundoDigito = 0;

				for($i = 0, $peso = 10; $i <= 8; $i++, $peso--) {
					$primeiroDigito += $cpf[$i] * $peso;
					}

				for($i = 0, $peso = 11; $i <= 9; $i++, $peso--) {
					$segundoDigito += $cpf[$i] * $peso;
					}

				$calculo_um = (($primeiroDigito % 11) < 2) ? 0 : 11 - ($primeiroDigito % 11);
				$calculo_dois = (($segundoDigito % 11) < 2) ? 0 : 11 - ($segundoDigito % 11);

				if($calculo_um <> $cpf[9] || $calculo_dois <> $cpf[10]) {
					return false;
				} else {
					return true;
				}
			}
		}
	}
*/






?>