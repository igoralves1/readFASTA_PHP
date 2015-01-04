<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        class separateFASTA {

         static function separete_n_FASTA_Seqs_InsideDir($path,$min,$max) {
          
         //Baseado na definição de fasta pelo NCBI http://blast.ncbi.nlm.nih.gov/blastcgihelp.shtml
         //Como identificar 2 sequencias diferentes se pode não existir o caracter ">" em alguns arquivos FASTA?
         //Suponho que quando não há o identificador ">" trata-se somente de uma seuquencia => perguntar no biostar.org
      
      $seq=NULL;
      $arrSeq=NULL;
      $arrFInal=NULL;
      
          $h=  opendir($path);//Se $dir é um diretório e já existe, então abre.
          while($file = readdir($h)){//Vai ler cada arquivo dentro do diretório
           
               if($file !="." && $file != ".."){//Para cada arquivo do diretório
                    
                   
                    
                    $fh= fopen($path."/".$file, "r");
                    while (!feof($fh)) {//Para cada linha de um arquivo
                          
                          
                          $line= trim(fgets($fh), "\t\n\r\0\x0B");
                          $firstCar=substr($line, 0, 1);    
                          $ordnb=ord($firstCar);
                          
                          if(ord($firstCar) === 62){//Inicia-se uma sequencia    
                                 
                                if(count($arrSeq)>0){
                                     if($arrSeq[length]<$min){
                                          $arrFInal[left][]=$arrSeq;//Sequência abaixo do intervela
                                     }
                                     elseif ($arrSeq[length]>$max) {
                                          $arrFInal[wright][]=$arrSeq;//Sequência acima do intervalo
                                    }
                                    else{
                                           $arrFInal[center][]=$arrSeq;//Sequência no intervalo
                                    }
                                      $arrSeq=NULL;
                                }
                                $arrSeq[header]=$line."\n";
                          }                         
                          else{                           
                                 if(ord($firstCar)<>0){
                                      $lenght=strlen($line);
                                      $arrSeq[seq].=$line."\n";    
                                      $arrSeq[length]= $arrSeq[length]+$lenght ;
                                 }
                          }
                          
                    }//FIm    while (!feof($fh))
                     if(count($arrSeq)>0){
                                     if($arrSeq[length]<$min){
                                          $arrFInal[left][]=$arrSeq;//Sequência abaixo do intervela
                                     }
                                     elseif ($arrSeq[length]>$max) {
                                          $arrFInal[wright][]=$arrSeq;//Sequência acima do intervalo
                                    }
                                    else{
                                           $arrFInal[center][]=$arrSeq;//Sequência no intervalo
                                    }
                                      $arrSeq=NULL;
                                }
                    fclose($fh);
                    xdebug_break();
               }
           }
          closedir($h);  
          if(!is_dir($path."/result")){
            mkdir($path."/result");
       }
          foreach ($arrFInal as $key => $arrSeq) {
                if($key==="left"){//Se existe seq menores q o intervalo
                      $nbSeq=  count($arrSeq);
                      foreach ($arrSeq as $value) {
                            $strMin.=$value[header].$value[seq];
                      } 
                      $name = $path."/result/lessThan_".$min."_".$nbSeq."_elem.fasta";
                      if (!($handMin = fopen($name, "w"))) {
                          die("Cannot open the file");
                      }
                      else{
                       fwrite($handMin, $strMin);
                       fclose($handMin); 
                      }
                }
                 if($key==="center"){//Se existe seq no intervalo
                       $nbSeq=  count($arrSeq);
                       foreach ($arrSeq as $value) {
                            $strInt.=$value[header].$value[seq];
                      }
                      $name = $path."/result/inTheInterval_".$nbSeq."_elem.fasta";
                      if (!($handInt = fopen($name, "w"))) {
                          die("Cannot open the file");
                      }
                      else{
                       fwrite($handInt, $strInt);
                       fclose($handInt); 
                      }
                }
                 if($key==="wright"){//Se existe seq maiores q o intervalo
                       $nbSeq=  count($arrSeq);
                      foreach ($arrSeq as $value) {
                            $strMax.=$value[header].$value[seq];                            
                      } 
                      $name = $path."/result/moreThan_".$max."_".$nbSeq."_elem.fasta";
                      if (!($handMax = fopen($name, "w"))) {
                          die("Cannot open the file");
                      }
                      else{
                       fwrite($handMax, $strMax);
                       fclose($handMax); 
                      }
                }
               
          }
          
     
    }

}

        separateFASTA::separete_n_FASTA_Seqs_InsideDir("./dirseq",250 ,380);

        ?>
    </body>
</html>
