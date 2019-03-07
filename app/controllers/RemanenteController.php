<?php

class RemanenteController extends ControladorBase {


    public function registrar() {
        $saldoAnterior = $_REQUEST["saldoa"];
        $ingresoMes = $_REQUEST["ingreso"];
        $cuenta = $_REQUEST["cuenta"];
        $efectivo = $_REQUEST["efectivo"];
        $caja = $_REQUEST["caja"];
        $nuevoSaldo = $_REQUEST["saldo"];
        $mes = $_REQUEST["mes"];
        $anio = $_REQUEST["anio"];

        

        $dao = new DaoRemanente();
        $dao->objeto->setSaldoAnterior($saldoAnterior);
        $dao->objeto->setTotalSaldoIngresos($ingresoMes);
        $dao->objeto->setCuentaCorriente($cuenta);
        $dao->objeto->setEfectivo($efectivo);
        $dao->objeto->setCajaChica($caja);
        $dao->objeto->setNuevoSaldo($nuevoSaldo);
        $dao->objeto->setMes($mes);
        $dao->objeto->setAnio($anio);


        echo $dao->registrar();

    }

    public function saldoAnterior() {
        $dao = new DaoRemanente();
        $mes = $_REQUEST["mes"];
        $anio = $_REQUEST["anio"];
        $dao->objeto->setMes($mes);
        $dao->objeto->setAnio($anio);

        echo $dao->saldoAnterior();
    }
}



