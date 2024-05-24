<?php
include_once("Categoria.php");
include_once("Torneo.php");
include_once("Equipo.php");
include_once("Partido.php");
include_once("PartidoFutbol.php");
include_once("PartidoBasket.php");

$catMayores = neW Categoria(1,'Mayores');
$catJuveniles = neW Categoria(2,'juveniles');
$catMenores = neW Categoria(1,'Menores');

$objE1 = neW Equipo("Equipo Uno", "Cap.Uno",1,$catMayores);
$objE2 = neW Equipo("Equipo Dos", "Cap.Dos",2,$catMayores);

$objE3 = neW Equipo("Equipo Tres", "Cap.Tres",3,$catJuveniles);
$objE4 = neW Equipo("Equipo Cuatro", "Cap.Cuatro",4,$catJuveniles);

$objE5 = neW Equipo("Equipo Cinco", "Cap.Cinco",5,$catMayores);
$objE6 = neW Equipo("Equipo Seis", "Cap.Seis",6,$catMayores);

$objE7 = neW Equipo("Equipo Siete", "Cap.Siete",7,$catJuveniles);
$objE8 = neW Equipo("Equipo Ocho", "Cap.Ocho",8,$catJuveniles);

$objE9 = neW Equipo("Equipo Nueve", "Cap.Nueve",9,$catMenores);
$objE10 = neW Equipo("Equipo Diez", "Cap.Diez",9,$catMenores);

$objE11 = neW Equipo("Equipo Once", "Cap.Once",11,$catMayores);
$objE12 = neW Equipo("Equipo Doce", "Cap.Doce",11,$catMayores);

// Crear colección de partidos
$partidos = [];

// Crear 3 objetos partidos de Básquet
$partidos[] = new PartidoBasket(11, '2024-05-05', $objE7, 80, $objE8, 120, 7);
$partidos[] = new PartidoBasket(12, '2024-05-06', $objE9, 81, $objE10, 110, 8);
$partidos[] = new PartidoBasket(13, '2024-05-07', $objE11, 115, $objE12, 85, 9);

// Crear 3 objetos partidos de Fútbol
$partidos[] = new PartidoFutbol(14, '2024-05-07', $objE1, 3, $objE2, 2);
$partidos[] = new PartidoFutbol(15, '2024-05-08', $objE3, 0, $objE4, 1);
$partidos[] = new PartidoFutbol(16, '2024-05-09', $objE5, 2, $objE6, 3);

// Crear el objeto Torneo con los partidos y monto inicial
$torneo = new Torneo(100000, $partidos);

// 3. Invocar métodos del torneo
$respuesta1 = $torneo->ingresarPartido($objE5, $objE11, '2024-05-23', 'Futbol');
echo "Respuesta ingreso partido 1: $respuesta1\n";
echo "Cantidad de equipos: " . $torneo->darCantidadEquipos() . "\n";

$respuesta2 = $torneo->ingresarPartido($objE11, $objE11, '2024-05-23', 'basquetbol');
echo "Respuesta ingreso partido 2: $respuesta2\n";
echo "Cantidad de equipos: " . $torneo->darCantidadEquipos() . "\n";

$respuesta3 = $torneo->ingresarPartido($objE9, $objE10, '2024-05-25', 'basquetbol');
echo "Respuesta ingreso partido 3: $respuesta3\n";
echo "Cantidad de equipos: " . $torneo->darCantidadEquipos() . "\n";

// 3d. Visualizar ganadores de basquetbol
$ganadoresBasket = $torneo->darEquiposGanadores('basquet');
echo "Ganadores de Básquet:". colToString($ganadoresBasket)."\n";

// 3e. Visualizar ganadores de futbol
$ganadoresFutbol = $torneo->darEquiposGanadores('futbol');
echo "Ganadores de Fútbol:". colToString($ganadoresFutbol)."\n";

function colToString($col)
    {
        $retorno = "";

        foreach ($col as $mark) {
            $retorno .= $mark . "\n--------------------\n";
        }
        return $retorno;
    }


// 4. Realizar un echo del objeto Torneo
echo $torneo;

?>
