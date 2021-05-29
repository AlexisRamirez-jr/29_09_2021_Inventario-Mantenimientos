<?php

require_once "conexion.php";

class ModeloFinanzas{

	/*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

	static public function mdlMostrarFinanzas($tabla, $item, $valor, $orden){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $orden DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	REGISTRO DE PRODUCTO
	=============================================*/
	static public function mdlIngresarFinanzas($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(fecha, nombre_responsable, ingreso_diario, egreso_diario, salario_diario, ganancia_neta) VALUES (:fecha, :nombre_responsable, :ingreso_diario, :egreso_diario, :salario_diario, :ganancia_neta)");

		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre_responsable", $datos["nombre_responsable"], PDO::PARAM_STR);
		$stmt->bindParam(":ingreso_diario", $datos["ingreso_diario"], PDO::PARAM_STR);
		$stmt->bindParam(":egreso_diario", $datos["egreso_diario"], PDO::PARAM_STR);
		$stmt->bindParam(":salario_diario", $datos["salario_diario"], PDO::PARAM_STR);
		$stmt->bindParam(":ganancia_neta", $datos["ganancia_neta"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	EDITAR PRODUCTO
	=============================================*/
	static public function mdlEditarFinanzas($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET fecha = :fecha, nombre_responsable = :nombre_responsable, ingreso_diario = :ingreso_diario, egreso_diario = :egreso_diario, salario_diario  = :salario_diario, ganancia_neta = :ganancia_neta WHERE id = :id");
		
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre_responsable", $datos["nombre_responsable"], PDO::PARAM_STR);
		$stmt->bindParam(":ingreso_diario", $datos["ingreso_diario"], PDO::PARAM_STR);
		$stmt->bindParam(":egreso_diario", $datos["egreso_diario"], PDO::PARAM_STR);
		$stmt->bindParam(":salario_diario", $datos["salario_diario"], PDO::PARAM_STR);
		$stmt->bindParam(":ganancia_neta", $datos["ganancia_neta"], PDO::PARAM_STR);
		

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR PRODUCTO
	=============================================*/

	static public function mdlEliminarFinanzas($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	ACTUALIZAR PRODUCTO
	=============================================*/

	static public function mdlActualizarFinanzas($tabla, $item1, $valor1, $valor){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE id = :id");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":id", $valor, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR SUMA VENTAS
	=============================================*/	

	static public function mdlMostrarSumaFinanzas($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT SUM(ventas) as total FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;
	}


}