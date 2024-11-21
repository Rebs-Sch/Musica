<?php

require_once("modelo/Album.php");
require_once("modelo/Autor.php");
require_once("modelo/ExtendedPlay.php");
require_once("modelo/LongPlay.php");
require_once("modelo/Musica.php");
require_once("modelo/Single.php");

$autores = array();

$longplays = array();
$extendedplays = array();
$singles = array();

do{

echo"\n
+------------------------+\n
|          Menu          |\n
+------------------------+\n
| 1 - Cadastrar álbum    |\n 
| 2 - Cadastrar música   |\n
| 3 - Cadastrar autor    |\n
| 4 - Listar álbuns      |\n
| 5 - Ouvir álbum        |\n
| 0 - Sair               |\n
+------------------------+\n";
$esc = readline();

switch($esc){
    case 1:
        echo "\nQual é o tipo do Album que deseja cadastrar?\n1 - Long Play\n2 - Extended Play\n3 - Single\n";
        $escAlbum = readline();
        echo "\n";

        if ($escAlbum == 1) {
            $longplay = new LongPlay();

            //verificação para esse trem não cadastrar nulo caso não haja autor.
            $longplayC = cadastrarAlbum($longplay, $autores);

            if ($longplayC != null) {
                array_push($longplays, $longplayC);
            }

        }elseif($escAlbum == 2){
            $extendedplay = new ExtendedPlay();

            $extendedplayC = cadastrarAlbum($extendedplay, $autores);

            if ($extendedplayC != null) {
                array_push($extendedplays, $extendedplayC);
            }

        }elseif($escAlbum == 3){
            $single = new Single();

            $singleC = cadastrarAlbum($single, $autores);

            if ($singleC != null) {
                array_push($singles, $singleC);
            }

        }else {
            echo "\nOpção inválida.\n";
        }

        break;

    case 2:
        echo "Você deseja cadastrar essa música em:\n1 - Uma longplay\n2 - Uma extendedplay\n3 - Um single\n";
        $escTipo = readline();

        if ($escTipo == 1 && empty($longplays) != true){
            adicionarMusica($longplays);
        }elseif ($escTipo == 2 && empty($extendedplays) != true){
            adicionarMusica($extendedplays);
        }elseif ($escTipo == 3 && empty($singles) != true){
            adicionarMusica($singles);
        }else{
            echo "\nVocê não tem nenhum álbum cadastrado.";
        }

        break;

    case 3:
        array_push($autores, cadastrarAutor());

        break;

    case 4:
        if (empty($longplays) and empty($extendedplays) and empty($singles)){
            echo "Você não tem nenhum álbum cadastrado.\n";
        }else{
            echo "\nLongplays:\n\n";
            listarAlbuns($longplays);

            echo "\nExtendedplays:\n\n";
            listarAlbuns($extendedplays);

            echo "\nSingles:\n\n";
            listarAlbuns($singles);
        }

        break;

    case 5:
        echo "Você gostaria de tocar que tipo de álbum?\n1 - Longplay\n2 - Extendedplay\n3 - Single\n";
        $escTipo = readline();

        if ($escTipo == 1){
            listarAlbuns($longplays);

            echo "E qual das longplays que você deseja tocar?";
            $indice = readline();

            tocar($longplays, $indice);

        }elseif ($escTipo == 2){
            listarAlbuns($extendedplays);

            echo "E qual das extendedplays que você deseja tocar?";
            $indice = readline();

            tocar($extendedplays, $indice);

        }elseif ($escTipo == 3){
            listarAlbuns($singles);

            echo "\nE qual dos singles que você deseja tocar?";
            $indice = readline();

            tocar($singles, $indice);
        }else{
            echo "Opção inválida.\n";
        }
        
        break;

    case 0:
        die;

    default:
    echo "\nOpção inválida, tente novamente.\n";
    break;
}


}while($esc != 0);

//FUNÇÕES DE CADASTRO.

//função de cadastrar album independente do tipo, porque deus me livre repetir esse código 3 vezes. Se tem uma maneira de fazer o cadastro sem repetir o código e sem usar a função, eu desconheço.
function cadastrarAlbum($album, $autores){
    //é obrigatório cadastrar o autor junto do álbum, já que ele precisa obrigatóriamente estar no nome de alguém. Não o fiz com as músicas porque elas poderiam facilmente ser adicionadas depois em qualquer caso.
    if (empty($autores)){
        echo "\nAparentemente você não cadastrou nenhum autor até o momento. Cadastre um antes de cadastrar o álbum\n";

        return null;
    }else{
        $album->setTitulo(readline("Informe o título do álbum que deseja cadastrar: "));
        $album->setGravadora(readline("Informe a gravadora do álbum que deseja cadastrar: "));
        echo "\n";
        foreach ($autores as $i => $autor) {
            echo $i." - ".$autor->getNome()."\n";
        }

        $indice = readline("Esses são os autores que você tem cadastrado. Escolha um deles para cadastar o álbum: ");
        $album->setAutor($autores[$indice]);

        echo "\n\nDeseja já cadastrar as músicas do álbum?\n1 - Sim\n0 - Não\n";
        $escMusica = readline();

        //MUSICAS
        if ($escMusica == 1){
            for ($i=0; $i < $album->getMaximo(); $i++){
                $album->setMusicas(cadastrarMusica($album));
            }
            $album->setCompleto(1);

        } elseif($escMusica == 0){
            echo "\n Seu álbum foi cadastrado com sucesso! Entretanto, ele está vazio, assim não exibirá nenhuma música quando for descrito. Caso deseje cadastrar uma música a ele, basta escolher no menu a opção de cadastrar música.\n";
            $album->setCompleto(0);
        }

        return $album;
    }
}

function cadastrarMusica($album){
    $musica = new Musica();
    $musica->setTitulo(readline("Informe o título da música que está cadastrando: "));
    $musica->setGenero(readline("Informe o gênero da música que está cadastrando: "));
    $musica->setDuracao(readline("Informe a duração da música que está cadastrando, no formato \"mm:ss\" : "));

    return $musica;
}

function cadastrarAutor(){
    $autor = new Autor();
    $autor->setNome(readline("Informe o nome do autor que deseja cadastrar: "));
    $autor->setNacionalidade(readline("Informe a nacionalidade do autor que deseja cadastrar: "));
    $autor->setNumOuvintes(readline("Informe o número de ouvintes do autor que deseja cadastrar: "));
    
    return $autor;
}

//FUNÇÃO DE ADICIONAR A MÚSICA A UM ÁLBUM.

function adicionarMusica($albuns){
    $albunsPossiveis = array();
    foreach ($albuns as $a) {
        if($a->getCompleto() == 0){
            array_push($albunsPossiveis, $a);
        }
    }

    if (empty($albunsPossiveis)) {
        echo "\nNão há álbum disponível para adicionar música.\n";
    }else{
        echo "\n";
        foreach($albunsPossiveis as $i => $a){
            echo $i." - ".$a->getTitulo()."\n";
        }

        $indice = readline("Escolha entre os álbuns disponíveis para adicionar a música: ");
        $albunsPossiveis[$indice]->setMusicas(cadastrarMusica($albunsPossiveis[$indice]));
        
        //verifica se já está cheio ou não, e caso esteja, muda o atributo completo para true
        if (count($albunsPossiveis[$indice]->getMusicas()) == $albunsPossiveis[$indice]->getMaximo()) {
            $albunsPossiveis[$indice]->setCompleto(1);
        }
    }
}

//FUNÇÃO DE LISTAR.

function listarAlbuns($albuns){
    foreach ($albuns as $i => $a){
        echo $i." - ";
        echo $a->listar();
    }
}

//FUNÇÃO TOCAR.

function tocar($albuns, $indice){
    $numFaixa = 0;

    do{
        $albuns[$indice]->tocarFaixa($numFaixa);

        echo "1 - Pausar    2 - Pular   0 - Parar de tocar\n";
        $esc = readline();

        switch($esc){
            case 1:
                $albuns[$indice]->pausarFaixa($numFaixa);
                echo "Deseja despausar?\n1 - Sim\n";
                readline(); //esse readline não faz nada a não ser segurar a ação até a pessoa digitar alguma coisa. Assim que ela digita, o negócio já despausa.

                break;

            case 2:
                if($numFaixa+1 == $albuns[$indice]->getMaximo()){
                    $numFaixa = 0;
                }else{
                    $numFaixa++;
                }
                
                break;

            case 0:
                break;

            default:
                echo "Opção inválida.\n";
                
                break;
        }
    }while($esc !=0);
}