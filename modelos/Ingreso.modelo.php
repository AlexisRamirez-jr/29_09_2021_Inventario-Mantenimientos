<?php

require_once "conexion.php";

class ModeloIngreso{

	/*=============================================
	MOSTRAR INGRESOS
	=============================================*/

static public function mdlMostrarIngresos($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	REGISTRO DE INGRESO
	=============================================*/
	static public function mdlIngresarIngresos($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(placa, sede, conductor, encargado_jefe, monto, hora, fecha) VALUES (:placa, :sede, :conductor, :encargado_jefe, :monto, :hora, :fecha)");

	//	$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":placa", $datos["placa"], PDO::PARAM_STR);
		$stmt->bindParam(":sede", $datos["sede"], PDO::PARAM_STR);
		$stmt->bindParam(":conductor", $datos["conductor"], PDO::PARAM_STR);
		$stmt->bindParam(":encargado_jefe", $datos["encargado_jefe"], PDO::PARAM_STR);
		$stmt->bindParam(":monto", $datos["monto"], PDO::PARAM_STR);
		$stmt->bindParam(":hora", $datos["hora"], PDO::PARAM_STR);
    $stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	EDITAR INGRESO
	=============================================*/
	static public function mdlEditarIngreso($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET placa = :placa, sede = :sede, conductor = :conductor, encargado_jefe = :encargado_jefe, monto = :monto, hora = :hora, fecha = :fecha WHERE id = :id");
        
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":placa", $datos["placa"], PDO::PARAM_STR);
		$stmt->bindParam(":sede", $datos["sede"], PDO::PARAM_STR);
		$stmt->bindParam(":conductor", $datos["conductor"], PDO::PARAM_STR);
		$stmt->bindParam(":encargado_jefe", $datos["encargado_jefe"], PDO::PARAM_STR);
		$stmt->bindParam(":monto", $datos["monto"], PDO::PARAM_STR);
		$stmt->bindParam(":hora", $datos["hora"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR INGRESO
	=============================================*/

	static public function mdlEliminarIngresos($tabla, $datos){

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
	ACTUALIZAR INGRESO
	=============================================

	static public function mdlActualizarIngreso($tabla, $item1, $valor1, $valor){

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
*/
	/*=============================================
	MOSTRAR SUMA INGRESO
	=============================================

	static public function mdlMostrarSumaIngresos($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT SUM(monto) as total FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;
	}
*/

}
