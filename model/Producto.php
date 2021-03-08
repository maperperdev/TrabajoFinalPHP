<?php 
/*  
	Clase producto a la cual se le ha añadido un atributo más para controlar la cantidad
	de un producto que adquiere el usuario.
*/
class Producto {
	private $codigo; 
	private $nombre;
	private $nombre_corto;
	private $precio;
	private $cantidad;

	public function __construct($codigo, $nombre, $nombre_corto, $precio, $cantidad) {
		$this->codigo = $codigo;
		$this->nombre = $nombre;
		$this->nombre_corto = $nombre_corto;
		$this->precio = $precio;
		$this->cantidad = $cantidad;

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
		return "<td>$this->codigo</td><td>$this->nombre</td><td>$this->precio</td><td>$this->cantidad</td>";
	}	

}