<?php
   $numeros = array("-", "Un", "Dos", "Tres", "Cuatro", "Cinco", "Seis", "Siete", "Ocho", "Nueve");
   $numerosX = array("-", "Un", "Dos", "Tres", "Cuatro", "Cinco", "Seis", "Siete", "Ocho", "Nueve");
   $numeros100 = array("-", "Ciento", "Doscientos", "Trecientos", "Cuatrocientos", "Quinientos", "Seicientos", "Setecientos", "Ochocientos", "Novecientos");
   $numeros11 = array("-", "Once", "Doce", "Trece", "Catorce", "Quince", "Dieciseis", "Diecisiete", "Dieciocho", "Diecinueve");
   $numeros10 = array("-", "-", "-", "Treinta", "Cuarenta", "Cincuenta", "Sesenta", "Setenta", "Ochenta", "Noventa");
   
   function tresnumeros($n, $last) {
   global $numeros100, $numeros10, $numeros11, $numeros, $numerosX;
   if ($n == 100) return "Cien ";
   if ($n == 0) return "Cero ";
   $r = "";
   $cen = floor($n / 100);
   $dec = floor(($n % 100) / 10);
   $uni = $n % 10;
   if ($cen > 0) $r .= $numeros100[$cen] . " " ;
   
   switch ($dec) {
   case 0: $special = 0; break;
   case 1: $special = 10; break;
   case 2: $special = 20; break;
   default: $r .= $numeros10[$dec] . " "; $special = 30; break;
   }
   if ($uni == 0) {
   if ($special==30);
   else if ($special==20) $r .= "Veinte" ;
   else if ($special==10) $r .= "Diez" ;
   else if ($special==0);
   } else {
   if ($special == 30 && !$last) $r .= "y " . $numerosX[$n%10] . " ";
   else if ($special == 30) $r .= " y " . $numeros[$n%10] . " ";
   else if ($special == 20) {
   if ($uni == 3) $r .= "Veintitres" ;
   else if (!$last) $r .= "Veinti" . $numerosX[$n%10] . " ";
   else $r .= "Veinti" . $numeros[$n%10] . " ";
   } else if ($special == 10) $r .= $numeros11[$n%10] . " ";
   else if ($special == 0 && !$last) $r .= $numerosX[$n%10] . " ";
   else if ($special == 0) $r .= $numeros[$n%10] ." ";
   }
   return $r;
   }
   
   function seisnumeros($n, $last) {
   if ($n == 0) return "Cero" ;
   $miles = floor($n / 1000);
   $units = $n % 1000;
   $r = "";
   if ($miles == 1) $r .= "Mil " ;
   else if ($miles > 1) $r .= tresnumeros($miles, false) . "Mil " ;
   if ($units > 0) $r .= tresnumeros($units, $last);
   return $r;
   }
   
   function docenumeros($n) {
   if ($n == 0) return "Cero" ;
   $millo = floor($n / 1000000);
   $units = $n % 1000000;
   $r = "";
   if ($millo == 1) $r .= "un millon" ;
   else if ($millo > 1) $r .= seisnumeros($millo, false) . "millones" ;
   if ($units > 0) $r .= seisnumeros($units, true);
   return $r;
   }
   
   function convertirNumero($num){
   
   $numerito = $num;
   $entero = intval($numerito);
   $decimales = (($numerito) - ($entero)) * 100;
   
   return round($decimales);
   }
   
   function NumeroLetra($num){
       if( convertirNumero($num)==0){
        return $rpta = docenumeros($num).' dólares';
       }
       else if(convertirNumero($num)==01){

        return $rpta = docenumeros($num).' dólares y un centavos.';
       }
       else if(convertirNumero($num)==02){

        return $rpta = docenumeros($num).' dólares y dos centavos.';
       }
       else if(convertirNumero($num)==03){

        return $rpta = docenumeros($num).' dólares y tres centavos.';
       }
       else if(convertirNumero($num)==04){

        return $rpta = docenumeros($num).' dólares y cuatro centavos.';
       }
       else if(convertirNumero($num)==05){

        return $rpta = docenumeros($num).' dólares y cinco centavos.';
       }
       else if(convertirNumero($num)==06){

        return $rpta = docenumeros($num).' dólares y seis centavos.';
       }
       else if(convertirNumero($num)==07){

        return $rpta = docenumeros($num).' dólares y siete centavos.';
       }
       else if(convertirNumero($num) == 8){

        return $rpta = docenumeros($num).' dólares y ocho centavos.';
       }
       else if(convertirNumero($num)== 9){

        return $rpta = docenumeros($num).' dólares y nueve centavos.';
       }
       else if(convertirNumero($num)==10){

        return $rpta = docenumeros($num).' dólares y diez centavos.';
       }
       else if(convertirNumero($num)==11){

        return $rpta = docenumeros($num).' dólares y once centavos.';
       }
       else if(convertirNumero($num)==12){

        return $rpta = docenumeros($num).' dólares y doce centavos.';
       }
       else if(convertirNumero($num)==13){

        return $rpta = docenumeros($num).' dólares y trece centavos.';
       }
       else if(convertirNumero($num)==14){

        return $rpta = docenumeros($num).' dólares y catorce centavos.';
       }
       else if(convertirNumero($num)==15){

        return $rpta = docenumeros($num).' dólares y quince centavos.';
       }
       else if(convertirNumero($num)==16){

        return $rpta = docenumeros($num).' dólares y dieciséis centavos.';
       }
       else if(convertirNumero($num)==17){

        return $rpta = docenumeros($num).' dólares y diecisiete centavos.';
       }
       else if(convertirNumero($num)==18){

        return $rpta = docenumeros($num).' dólares y dieciocho centavos.';
       }
       else if(convertirNumero($num)==19){

        return $rpta = docenumeros($num).' dólares y diecinueve centavos.';
       }
       else if(convertirNumero($num)==20){

        return $rpta = docenumeros($num).' dólares y veinte centavos.';
       }
       else if(convertirNumero($num)==21){

        return $rpta = docenumeros($num).' dólares y veintiun centavos.';
       }
       else if(convertirNumero($num)==22){

        return $rpta = docenumeros($num).' dólares y veintidos centavos.';
       }
       else if(convertirNumero($num)==23){

        return $rpta = docenumeros($num).' dólares y veintitres centavos.';
       }
       else if(convertirNumero($num)==24){

        return $rpta = docenumeros($num).' dólares y veinticuatro centavos.';
       }
       else if(convertirNumero($num)==25){

        return $rpta = docenumeros($num).' dólares y veinticinco centavos.';
       }
       else if(convertirNumero($num)==26){

        return $rpta = docenumeros($num).' dólares y veintiseis centavos.';
       }
       else if(convertirNumero($num)==27){

        return $rpta = docenumeros($num).' dólares y veintisiete centavos.';
       }
       else if(convertirNumero($num)==28){

        return $rpta = docenumeros($num).' dólares y veintiocho centavos.';
       }
       else if(convertirNumero($num)==29){

        return $rpta = docenumeros($num).' dólares y veintinueve centavos.';
       }
       else if(convertirNumero($num)==30){

        return $rpta = docenumeros($num).' dólares y treinta centavos.';
       }
       else if(convertirNumero($num)==31){

        return $rpta = docenumeros($num).' dólares y treinta y un centavos.';
       }
       else if(convertirNumero($num)==32){

        return $rpta = docenumeros($num).' dolares y treinta y dos centavos.';
       }
       else if(convertirNumero($num)==33){

        return $rpta = docenumeros($num).' dólares y treinta y tres centavos.';
       }
       else if(convertirNumero($num)==34){

        return $rpta = docenumeros($num).' dólares y treinta y cuatro centavos.';
       }
       else if(convertirNumero($num)==35){

        return $rpta = docenumeros($num).' dólares y treinta y cinco centavos.';
       }
       else if(convertirNumero($num)==36){

        return $rpta = docenumeros($num).' dólares y treinta y seis centavos.';
       }
       else if(convertirNumero($num)==37){

        return $rpta = docenumeros($num).' dólares y treinta y siete centavos.';
       }
       else if(convertirNumero($num)==38){

        return $rpta = docenumeros($num).' dólares y treinta y ocho centavos.';
       }
       else if(convertirNumero($num)==39){

        return $rpta = docenumeros($num).' dólares y treinta y nueve centavos.';
       }
       else if(convertirNumero($num)==40){

        return $rpta = docenumeros($num).' dólares y cuarenta  centavos.';
       }
       else if(convertirNumero($num)==41){

        return $rpta = docenumeros($num).' dólares y cuarenta y un centavos.';
       }
       else if(convertirNumero($num)==42){

        return $rpta = docenumeros($num).' dólares y cuarenta y dos centavos.';
       }
       else if(convertirNumero($num)==43){

        return $rpta = docenumeros($num).' dólares y cuarenta y tres centavos.';
       }
       else if(convertirNumero($num)==44){

        return $rpta = docenumeros($num).' dólares y cuarenta y cuatro centavos.';
       }
       else if(convertirNumero($num)==45){

        return $rpta = docenumeros($num).' dólares y cuarenta y cinco centavos.';
       }
       else if(convertirNumero($num)==46){

        return $rpta = docenumeros($num).' dólares y cuarenta y seis centavos.';
       }
       else if(convertirNumero($num)==47){

        return $rpta = docenumeros($num).' dólares y cuarenta y siete centavos.';
       }
       else if(convertirNumero($num)==48){

        return $rpta = docenumeros($num).' dólares y cuarenta y ocho centavos.';
       }
       else if(convertirNumero($num)==49){

        return $rpta = docenumeros($num).' dólares y cuarenta y nueve centavos.';
       }
       else if(convertirNumero($num)==50){

        return $rpta = docenumeros($num).' dólares y cincuenta centavos.';
       }
       else if(convertirNumero($num)==51){

        return $rpta = docenumeros($num).' dólares y cincuenta y un centavos.';
       }
       else if(convertirNumero($num)==52){

        return $rpta = docenumeros($num).' dólares y cincuenta y dos centavos.';
       }
       else if(convertirNumero($num)==53){

        return $rpta = docenumeros($num).' dólares y cincuenta  y tres centavos.';
       }
       else if(convertirNumero($num)==54){

        return $rpta = docenumeros($num).' dólares y cincuenta y cuatro centavos.';
       }
       else if(convertirNumero($num)==55){

        return $rpta = docenumeros($num).' dólares y cincuenta y cinco centavos.';
       }
       else if(convertirNumero($num)==56){

        return $rpta = docenumeros($num).' dólares y cincuenta y seis centavos.';
       }
       else if(convertirNumero($num)==57){

        return $rpta = docenumeros($num).' dólares y cincuenta y siete centavos.';
       }
       else if(convertirNumero($num)==58){

        return $rpta = docenumeros($num).' dólares y cincuenta y ocho centavos.';
       }
       else if(convertirNumero($num)==59){

        return $rpta = docenumeros($num).' dólares y cincuenta y nueve centavos.';
       }
       else if(convertirNumero($num)==60){

        return $rpta = docenumeros($num).' dólares y sesenta centavos.';
       }
       else if(convertirNumero($num)==61){

        return $rpta = docenumeros($num).' dólares y sesenta y un centavos.';
       }
       else if(convertirNumero($num)==62){

        return $rpta = docenumeros($num).' dólares y sesenta y dos centavos.';
       }
       else if(convertirNumero($num)==63){

        return $rpta = docenumeros($num).' dólares y sesenta y tres centavos.';
       }
       else if(convertirNumero($num)==64){

        return $rpta = docenumeros($num).' dólares y sesenta y cuatro centavos.';
       }
       else if(convertirNumero($num)==65){

        return $rpta = docenumeros($num).' dólares y sesenta y cinco centavos.';
       }
       else if(convertirNumero($num)==66){

        return $rpta = docenumeros($num).' dólares y sesenta y seis centavos.';
       }
       else if(convertirNumero($num)==67){

        return $rpta = docenumeros($num).' dólares y sesenta y siete centavos.';
       }
       else if(convertirNumero($num)==68){

        return $rpta = docenumeros($num).' dólares y sesenta y ocho centavos.';
       }
       else if(convertirNumero($num)==69){

        return $rpta = docenumeros($num).' dólares y sesenta y nueve centavos.';
       }
       else if(convertirNumero($num)==70){

        return $rpta = docenumeros($num).' dólares y setenta centavos.';
       }
       else if(convertirNumero($num)==71){

        return $rpta = docenumeros($num).' dólares y setenta y un centavos.';
       }
       else if(convertirNumero($num)==72){

        return $rpta = docenumeros($num).' dólares y setenta y dos centavos.';
       }
       else if(convertirNumero($num)==73){

        return $rpta = docenumeros($num).' dólares y setenta y tres centavos.';
       }
       else if(convertirNumero($num)==74){

        return $rpta = docenumeros($num).' dólares y setenta y cuatro centavos.';
       }
       else if(convertirNumero($num)==75){

        return $rpta = docenumeros($num).' dólares y setenta y cinco centavos.';
       }
       else if(convertirNumero($num)==76){

        return $rpta = docenumeros($num).' dólares y setenta y seis centavos.';
       }
       else if(convertirNumero($num)==77){

        return $rpta = docenumeros($num).' dólares y setenta y siete centavos.';
       }
       else if(convertirNumero($num)==78){

        return $rpta = docenumeros($num).' dólares y setenta y ocho centavos.';
       }
       else if(convertirNumero($num)==79){

        return $rpta = docenumeros($num).' dólares y setenta y nueve centavos.';
       }
       else if(convertirNumero($num)==80){

        return $rpta = docenumeros($num).' dólares y ochenta centavos.';
       }
       else if(convertirNumero($num)==81){

        return $rpta = docenumeros($num).' dólares y ochenta y un centavos.';
       }
       else if(convertirNumero($num)==82){

        return $rpta = docenumeros($num).' dólares y ochenta y dos centavos.';
       }
       else if(convertirNumero($num)==83){

        return $rpta = docenumeros($num).' dólares y ochenta y tres centavos.';
       }
       else if(convertirNumero($num)==84){

        return $rpta = docenumeros($num).' dólares y ochenta y cuatro centavos.';
       }
       else if(convertirNumero($num)==85){

        return $rpta = docenumeros($num).' dólares y ochenta y cinco centavos.';
       }
       else if(convertirNumero($num)==86){

        return $rpta = docenumeros($num).' dólares y ochenta y seis centavos.';
       }
       else if(convertirNumero($num)==87){

        return $rpta = docenumeros($num).' dólares y ochenta y siete centavos.';
       }
       else if(convertirNumero($num)==88){

        return $rpta = docenumeros($num).' dólares y ochenta y ocho centavos.';
       }
       else if(convertirNumero($num)==89){

        return $rpta = docenumeros($num).' dólares y ochenta y nueve centavos.';
       }

       else if(convertirNumero($num)==90){

        return $rpta = docenumeros($num).' dólares y noventa centavos.';
       }
       else if(convertirNumero($num)==91){

        return $rpta = docenumeros($num).' dólares y noventa y un centavos.';
       }
       else if(convertirNumero($num)==92){

        return $rpta = docenumeros($num).' dólares y noventa y dos centavos.';
       }
       else if(convertirNumero($num)==93){

        return $rpta = docenumeros($num).' dólares y noventa y tres centavos.';
       }
       else if(convertirNumero($num)==94){

        return $rpta = docenumeros($num).' dólares y noventa y cuatro centavos.';
       }
       else if(convertirNumero($num)==95){

        return $rpta = docenumeros($num).' dólares y noventa y cinco centavos.';
       }
       else if(convertirNumero($num)==96){

        return $rpta = docenumeros($num).' dólares y noventa y seis centavos.';
       }
       else if(convertirNumero($num)==97){

        return $rpta = docenumeros($num).' dólares y noventa y siete centavos.';
       }
       else if(convertirNumero($num)==98){

        return $rpta = docenumeros($num).' dólares y noventa y ocho centavos.';
       }
       else if(convertirNumero($num)==99){

        return $rpta = docenumeros($num).' dólares y noventa y nueve centavos.';
       }
       
   
   }
   
    
  
   
   function redondeado ($numero, $decimales) { 
   $factor = pow(10, $decimales); 
   return (round($numero*$factor)/$factor); }
   
    ?>