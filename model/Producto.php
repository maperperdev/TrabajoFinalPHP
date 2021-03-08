<?php

class Producto {
	private $codigo; 
	private $nombre;
	private $nombre_corto;
	private $precio;

	public function __construct($codigo, $nombre, $nombre_corto, $precio) {
		$this->codigo = $codigo;
		$this->nombre = $nombre;
		$this->nombre_corto = $nombre_corto;
		$this->precio = $precio;
	}

	public function __get($property)
	{
		if (property_exists($this, $property)) {
			return $this->$property;
		}	
	}

	public function __set($property, $value)
	{
		if (property_exists($this, $property)) {
			$this->$property = $value;
		}	
	}

	public function toTable() {
		return "<td>$this->codigo</td><td>$this->nombre</td><td>$this->precio</td>";
	}	

}