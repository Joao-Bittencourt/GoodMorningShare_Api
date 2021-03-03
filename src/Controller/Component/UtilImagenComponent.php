<?php

namespace App\Controller\Component;

use Cake\Controller\Component;

class UtilImagenComponent extends Component {

    public $url;
    public $urlParam;

    public function initialize(array $config): void {
        parent::initialize($config);
//        $this->http = new Client();
    }

    public function buscaDados() {
        error_reporting(0);

        $this->url = 'https://www.mensagensdebomdia.com.br';
        $this->urlParam = '/whatsapp';

        $response = file_get_contents($this->url . $this->urlParam);

        if (!empty($response)) {
            $dados_salvar = $this->montaLinksSalvar($response);
            $dados_salvar = $this->montaNameSalvar($dados_salvar);
          
            return $dados_salvar;
        }
        
        return false;
    }
    public function buscaDadosMany($contador = 0) {
        error_reporting(0);
        
        $this->url = 'https://www.mensagensdebomdia.com.br';
        $this->urlParam = '/page/';
     
        
        $response = file_get_contents($this->url . $this->urlParam . $contador);

        if (!empty($response)) {
            $dados_salvar = $this->montaLinksSalvar($response);
            $dados_salvar = $this->montaNameSalvar($dados_salvar);
          
            return $dados_salvar;
        }
        
        return false;
    }

    public function montaLinksSalvar($params = []) {

        if (!empty($params)) {
            $dom = new \DOMDocument();
            $dom->loadHTML($params);
            $arrLinks = [];

            $imgTagList = $dom->getElementsByTagName('img');

            foreach ($imgTagList as $imgTag) {
                $ImagenSrc = $imgTag->getAttribute('src');

                if (substr($ImagenSrc, 0, 4) == 'http') {
                    $arrLinks[] = $ImagenSrc;
                }

//                if (substr($ImagenSrc, 0, 4) == '/wp-') {
//                    $arrLinks[] = $this->url . $ImagenSrc;
//                }
            }
            return $arrLinks;
        }
        return $params;
    }

    public function montaNameSalvar($params = []) {

        if (!empty($params)) {
            $dados_salvar = [];
            foreach ($params as $key => $dado) {
                $arrayImagenLink = explode("/", $dado);
                $dados_salvar[$key]['nome'] = end($arrayImagenLink);
                $dados_salvar[$key]['url'] = $dado;
                $dados_salvar[$key]['status'] = 3;
            }
            return $dados_salvar;
        }

        return $params;
    }

}
