<?php 

class Romanos{
    private $countMil = 0;
    private $countNovecentos = 0;
    private $countQuinhe = 0;
    private $countQuatrocentos = 0;
    private $countCem = 0;
    private $countNoventa = 0;
    private $countCinq = 0;
    private $countQuarenta = 0;
    private $countDez = 0;
    private $countNove = 0;
    private $countCinco = 0;
    private $countQuatro = 0;
    private $countUm = 0;
    private $romano;

    private $numero;
    private $numeroInteiro;

    private $stringRomana;

    private $resultadoStringToDecimal;


    public function __construct($valor) {
        if (is_numeric($valor)) {
            $this->numero = $valor;
            $this->numeroInteiro = $valor;
            $this->conversorDecimalToRoman();
        }
        // Verifica se o valor é uma string
        elseif (is_string($valor) && !empty($valor)) {
            $this->stringRomana = str_replace(' ', '', $valor);
            $this->conversorRomanToDecimal();
        } 
    }
    

        /* 
            Condiciona as contagens para a conversão correta. Por exemplo, apenas as letras I, X, C e M podem ser impressas até 3 vezes. Já as letras V, L e D podem ser impressas apenas 1 vez.
        */
    private function converter() {

        if($this->countUm > 3){
            $this->countCinco++;
            $this->countUm = 1;
        }
    
        if($this->countCinco > 1){
            $this->countDez++;
            $this->countCinco = 0;
        }

        if($this->countDez > 3){
            $this->countDez = 1;
            $this->countCinq = 1;
        }
 
        if($this->countCinq > 1){
            $this->countCem++;
            $this->countCinq = 0;
        }
  
        if($this->countCem > 3){
    
            $this->countQuinhe++;
            $this->countCem = 1;
        }

        if($this->countQuinhe > 1){

            $this->countMil++;
            $this->countQuinhe = 0;
        }
   

        $this->gerarRomano();
          
    }
    

    /*  Contas os Numeros para Gerar as Letras */
    private function conversorDecimalToRoman(){

        $n1 = $this->numero;

        while($n1 > 0){
            if($n1 >= 1000){
                $this->countMil = intdiv($n1,1000);
                $n1 = $n1 - ($this->countMil * 1000);
            }
            elseif($n1 >= 900){
                $this->countNovecentos = intdiv($n1,900);
                $n1 = $n1 - ($this->countNovecentos * 900);
            }
            elseif($n1 >= 500){
                $this->countQuinhe = intdiv($n1,500);
                $n1 = $n1 - ($this->countQuinhe * 500);
            }
            elseif($n1 >= 400){
                $this->countQuatrocentos = intdiv($n1,400);
                $n1 = $n1 - ($this->countQuatrocentos * 400);
            }
            elseif($n1 >= 100){
                $this->countCem = intdiv($n1 , 100);
                $n1 = $n1 - ($this->countCem * 100);
            }
            elseif($n1 >= 90){
                $this->countNoventa = intdiv($n1,90);
                $n1 = $n1 - ($this->countNoventa * 90);
            }
            elseif($n1>= 50){   
                $this->countCinq = intdiv($n1,50);
                $n1 = $n1 - ($this->countCinq * 50);
            }
            elseif($n1>= 40){   
                $this->countQuarenta = intdiv($n1,40);
                $n1 = $n1 - ($this->countQuarenta * 40);
            }
            elseif($n1>= 10){   
                $this->countDez = intdiv($n1,10);
                $n1 = $n1 - ($this->countDez * 10);
            }
            elseif($n1>= 9){   
                $this->countNove = intdiv($n1,9);
                $n1 = $n1 - ($this->countNove * 9);
            }
            elseif($n1>= 5){   
                $this->countCinco = intdiv($n1,5);
                $n1 = $n1 - ($this->countCinco * 5);
            }
            elseif($n1>= 4){   
                $this->countQuatro = intdiv($n1,4);
                $n1 = $n1 - ($this->countQuatro * 4);
            }
            elseif($n1 >= 1){   
                $this->countUm = intdiv($n1,1);
                $n1 = $n1 - ($this->countUm * 1);
            }
        }

        $this->converter();
    }



    private function conversorRomanToDecimal(){

        $string = $this->stringRomana;

        $valores = [
           "M" => 1000,
           "CM" => 900,
           "D" => 500,
           "CD" => 400,
           "C" => 100,
           "XC" => 90,
           "L" => 50,
           "XL" => 40,
           "X" => 10,
           "IX" => 9,
           "V" => 5,
           "IV" => 4,
           "I" => 1,
        ];

        //Divide as cada letra em um index de array
        $array = str_split($string);
     /*    echo "<pre>";
        print_r($array);
        echo "</pre>"; */

        $valorAtual = 0;

        $resultado = 0;
        foreach($array as $letras){

            if (array_key_exists($letras, $valores)) {

                if($valorAtual == 0){
                    $valorAtual = $valores[$letras];
                    $resultado += $valorAtual;
    
                }
                // 100 > 1000 ?
                elseif($valores[$letras] > $valorAtual){
                    //valor atual = 500 - 100    
                    // RESULTADO = 1100 + 400
                    $valorAtual =  $valores[$letras] - (2 * $valorAtual);
                    $resultado += $valorAtual;
                }
                // valor atual = 100
                // resultado = 1000 + 100
                else{
                    $valorAtual = $valores[$letras];
                    $resultado +=$valorAtual;
                }
            }
            else{
                $resultado = 0;
                break;
            }


        }
        $this->resultadoStringToDecimal = $resultado;
    }

    /* Armazena as Letras na Variável */
    private function gerarRomano() {
        $this->romano = '';
        $this->romano .= str_repeat("M", $this->countMil);
        $this->romano .= str_repeat("CM", $this->countNovecentos);
        $this->romano .= str_repeat("D", $this->countQuinhe);
        $this->romano .= str_repeat("CD", $this->countQuatrocentos);
        $this->romano .= str_repeat("C", $this->countCem);
        $this->romano .= str_repeat("XC", $this->countNoventa);
        $this->romano .= str_repeat("L", $this->countCinq);
        $this->romano .= str_repeat("XL", $this->countQuarenta);
        $this->romano .= str_repeat("X", $this->countDez);
        $this->romano .= str_repeat("IX", $this->countNove);
        $this->romano .= str_repeat("V", $this->countCinco);
        $this->romano .= str_repeat("IV", $this->countQuatro);
        $this->romano .= str_repeat("I", $this->countUm);
        
    }


    /**
     * Get the value of romano
     */ 
    public function getRomano()
    {
        return $this->romano;
    }

    /**
     * Set the value of romano
     *
     * @return  self
     */ 
    public function setRomano($romano)
    {
        $this->romano = $romano;

        return $this;
    }

    /**
     * Get the value of numeroInteiro
     */ 
    public function getNumeroInteiro()
    {
        return $this->numeroInteiro;
    }

    /**
     * Set the value of numeroInteiro
     *
     * @return  self
     */ 
    public function setNumeroInteiro($numeroInteiro)
    {
        $this->numeroInteiro = $numeroInteiro;

        return $this;
    }

    /**
     * Get the value of stringRomana
     */ 
    public function getStringRomana()
    {
        return $this->stringRomana;
    }

    /**
     * Set the value of stringRomana
     *
     * @return  self
     */ 
    public function setStringRomana($stringRomana)
    {
        $this->stringRomana = $stringRomana;

        return $this;
    }

    /**
     * Get the value of resultadoStringToDecimal
     */ 
    public function getResultadoStringToDecimal()
    {
        return $this->resultadoStringToDecimal;
    }

    /**
     * Set the value of resultadoStringToDecimal
     *
     * @return  self
     */ 
    public function setResultadoStringToDecimal($resultadoStringToDecimal)
    {
        $this->resultadoStringToDecimal = $resultadoStringToDecimal;

        return $this;
    }
}