<?php

/**
 * Class Upload
 */
class Upload
{

    private $file;

    //Para fazera validação com mimetypes, temos que ter os mimetypes que serão aceites.
    private $mimetypes;
    private $content_type;
    private $content_size;
    private $targetPath;
    private $allowedSize;

    public function __construct($file)
    {
        $this->file = $file;
        $this->allowedSize = 2097152;
        $this->targetPath = "./arquivos-carregados";

        //Carregando a lista com os mimetypes.
        $this->mimetypes = [
            'text/plain',
            'image/png',
            'image/jpeg'
        ];


    }


    /**
     * Faz o processamento do upload, valida e retorna um valor correspondente.
     * @return int
     */
    function upload(bool $renomea = false)
    {
        dd($this->file);

        //Recebo o resultado da validação, se for true validou e então $naoValidou sera false significando que é falso que não validou logo ele validou.
//        $naoValidou = !($this->validou());
        if ($this->validou() != 1)
            return $this->validou();

        $nome;
        if ($renomea) {

            $explode = explode( //Separa aí para mim essa string onde encontrar ponto.
                ".", //O separador
                $this->file['name'] // A String usada
            );//Retorna um array em que as posicoes são os valore separados pelo ponto

//            echo implode(", ", end($explode));
            $nome = uniqid(
                    'image_', // O prefixo do id, prefixo_id
                    true // Irá adicionar mais numero que vai tornar o id ainda mais unico.
                ) . "." .
                end($explode);//Pega o ultimo elemento do array.
        } else {

            $nome = preg_replace(
                "/[^a-zA-Z0-9._-]/", //Tudo que não está entre [a-zA-Z0-9] e também não é ._-
                '-', //ele vai substituir por -
                $this->file['name'] //Nesta String dada.
            ); // e vai retornar uma String nova modificada.

        }

        $dir = is_dir($this->targetPath);
        if ($dir){

           $moveu =  move_uploaded_file(
                $this->file['tmp_name'],
                $this->targetPath . "/" . $nome
            );

           if($moveu){
               return 1;
           }else{
               return -3;
           }

        }else{
            if(mkdir($this->targetPath)){
                return 2;
            }else{
                return -4;
            }
        }
    }


    /**
     * Verifica se o arquivo não viola as regras.
     * @return int
     */
    private function validou()
    {
        $this->content_type = mime_content_type($this->file['tmp_name']);
        $mimetypeValido = in_array($this->content_type, $this->mimetypes);
        if (!$mimetypeValido)
            return -1;

        $this->content_size = $this->file['size'];
        $sizeValido = $this->content_size <= $this->allowedSize;
        if (!$sizeValido)
            return -2;


        return 1;
    }


    /**
     * Retorna uma string com a mensagem a partir do seu codigo.
     * @param int $codigo
     * @return string
     */
    public function getMensagem(int $codigo)
    {
        switch ($codigo) {
            case 1:
            {
                return "Upload bem sucedido.";
                break;
            }

            case 2:
            {
                return "Directorio criado. volte a fazer o carregamento";
                break;
            }

            case -1:
            {
                return "O ficheiro que enviaste é inválido.\n" . "Esperamos: \n" . implode(", ", $this->mimetypes) . "\n e não " . $this->content_type;
                break;
            }

            case -2:
            {
                return "O ficheiro tem um tamanho que excede o permitido, tamanho máximo é 2MB.";
                break;
            }

            case -3:
            {
                return "Não foi possivel, fazer o upload, erro nos directories.";
                break;
            }

            case -4:
            {
                return "Falha ao mover o ficheiro.+";
                break;
            }
        }
    }

}





