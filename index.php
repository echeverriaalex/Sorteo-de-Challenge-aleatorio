<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <?php
            $participantesHombres = [
                ['Rodrigo Gascón', "https://www.clarin.com/img/2023/02/13/rodrigo-gascon-en-the-challenge___RgEf8cJiW_720x0__1.jpg"],
                ['Octavio Oky Appo', "https://www.elcolectivo.com.ar/u/fotografias/m/2023/2/14/f768x1-113887_114014_79.jpg"],
                ['Rodrigo Mora', "https://telefe-static.akamaized.net/media/18245382/tlf_thechallenge_fotos-carrusel-mora.jpg?width=198&height=250&mode=crop&anchor=top"],
                ['Lizardo Ponce', "https://www.clarin.com/img/2023/02/13/hcU1x3V53_720x0__1.jpg"],
                ['Adrián Cormillot', "https://fotos.perfil.com/2023/02/17/trim/950/534/adrian-cormillot-1511588.jpg"],
                ['Lionel Ferro', "https://www.clarin.com/img/2023/02/13/lionel-ferro-en-the-challenge___HKeeAZ3j3_720x0__1.jpg"], 
                ['Benjamín Alfonso', "https://www.clarin.com/img/2023/02/13/benjamin-alfonso-participante-de-the___U-5FaUk_H_720x0__1.jpg"],
                ['Yeyo de Gregorio', "https://scontent.faep9-2.fna.fbcdn.net/v/t39.30808-6/328692543_525718433000250_3569177840311197148_n.jpg?_nc_cat=106&ccb=1-7&_nc_sid=730e14&_nc_aid=0&_nc_ohc=sg7cXfhdB5MAX8s6ftp&_nc_ht=scontent.faep9-2.fna&oh=00_AfAo_6cud0AyKz-Cpc2p77kkZzHLbGKVZgQFlKyBYA7KeA&oe=63F7173D"],
                ['Fernando Burlando', "https://www.elcolectivo.com.ar/u/fotografias/m/2023/2/15/f768x1-114062_114189_79.jpg"]
            ];
            
            $participantesMujeres = [
                ['Eva Bargiela', "https://scontent.faep9-3.fna.fbcdn.net/v/t39.30808-6/328125778_700196251832771_8459887949727075693_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=730e14&_nc_ohc=Q6oKicDO_2sAX8A2EVr&_nc_ht=scontent.faep9-3.fna&oh=00_AfBrreGpbThF-hum5-67vU_WTB0ndlwiVCzhcpUBumdaag&oe=63F64E5E"],
                ['Sofía Jujuy Jiménez', "https://www.ahoraargentina.com.ar/u/fotografias/m/2023/2/16/f768x1-84426_84553_122.jpeg"], 
                ['Virginia Elizalde', "https://www.clarin.com/img/2023/02/13/LDDgXUeWc_720x0__1.jpg"], 
                ['Carolina Duer', "https://www.clarin.com/img/2023/02/13/carolina-duer-the-challenge-argentina___ydYc8w7Fo_720x0__1.jpg"],
                ['Floppy Tesouro', "https://fotos.perfil.com//2023/02/13/900/0/the-challenge-argentina-asi-fue-el-debut-del-reality-mas-extremo-1508829.jpg"], 
                ['Julieta Puente', "https://www.estiloytendencia.com/u/fotografias/m/2023/2/18/f768x1-18679_18806_5050.jpg"], 
                ['María Fernanda Callejón', "https://www.elesquiu.com/u/fotografias/m/2023/2/17/f768x1-456509_456636_130.jpeg"], 
                ['Sol Pérez', "https://www.cronica.com.ar/__export/1676147155510/sites/cronica/img/2023/02/11/dsc_1903_x1x_crop1676147154707.jpg_652087360.jpg"],
                ['Claudia Albertario', "https://www.clarin.com/img/2023/02/13/Vy4TDfn9F_720x0__1.jpg"]
            ];

            $parejasConfirmadas = array();

            function getRandom($arrayParticipantes){
                return random_int(0, count($arrayParticipantes)-1);
            }

            function checkArrays($arrayParticipantes){
                if(count($arrayParticipantes) != null){
                    return true;
                }
                return false;
            }

            function getParticipante($arrayParticipantes, $posicion){
                $nombre = $arrayParticipantes[$posicion];
                return $nombre;
            }

            while(checkArrays($participantesHombres) && checkArrays($participantesMujeres)){

                $pareja = array();

                $posicion = getRandom($participantesHombres);
                array_push($pareja, getParticipante($participantesHombres, $posicion));            
                unset($participantesHombres[$posicion]);

                $newArrayHombres = array();    

                foreach($participantesHombres as $key=> $value){
                    array_push($newArrayHombres, $value);
                }

                $participantesHombres = $newArrayHombres;

                $posicion = getRandom($participantesMujeres);
                array_push($pareja, getParticipante($participantesMujeres, $posicion));
                unset($participantesMujeres[$posicion]);
                $newArrayMujeres= array();

                foreach($participantesMujeres as $key=> $value){
                    array_push($newArrayMujeres, $value);
                }

                $participantesMujeres = $newArrayMujeres;
                array_push($parejasConfirmadas, $pareja);
            }
            ?>

            <?php 
                foreach($parejasConfirmadas as $pareja){
                    echo "<h1> SIGUIENTE PAREJA </h1>"; 
                    foreach($pareja as $participante){
            ?>                 
                        <div style="display: inline-block; margin-right: 5%; margin-left: 5%; width: 90%; background-color: blanchedalmond;">
                            <img src=" <?php echo $participante[1]; ?>" style="width: 30%; height: 60%;"> 
                            <h1> <?php echo $participante[0]; ?> </h1>
                        </div>
            <?php   
                    }
                }
            ?>
    </body>
</html>