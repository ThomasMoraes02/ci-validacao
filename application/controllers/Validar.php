<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validar extends CI_Controller
{
	public function index()
	{
		$this->load->view("index");
	}

	public function Validacao()
	{
		$this->load->helper("valida");

		try {
			$cep = $_POST['cep'];
			if(!validaCEP($cep)) throw new Exception("CEP no formato inválido");

			$telefone = $_POST['telefone'];
			if(!validaTelefone($telefone)) throw new Exception("Telefone no formato inválido");

			$email = $_POST['email'];
			if(!validaEmail($email)) throw new Exception("Email no formato inválido");

			$cpf = $_POST['cpf'];
			if(!validaCPF($cpf)) throw new Exception("CPF no formato inválido");

		$this->index();

		} catch (Exception $error) {
			echo "<script> alert('" . $error->getMessage() . "') </script>";
			echo "<script>history.back()</script>";
		}
		
	}
}
