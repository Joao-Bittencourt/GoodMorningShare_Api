<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Model\Entity\Device;

class ImagensController extends AppController {

    public function initialize(): void {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('UtilImagen');
//        $this->loadComponent('UtilArquivo');
    }

    public function detalhar($id = null) {

        if (empty($id)) {
            $retorno['mensage'] = ['Invalid request.'];
            $retorno['error'] = ['99'];
            $response = $this->response
                    ->withType('application/json')
                    ->withStatus(400)
                    ->withStringBody(json_encode($retorno));
            return $response;
        }
        $imagem = $this->Imagens->find()
                ->where(['id' => $id])
                ->first()
                ->toArray();

        $this->set('imagem', $imagem);
        $this->viewBuilder()->setLayout('empy');
    }

    public function listar() {
        $imagens = $this->Imagens->find('all')->toArray();
        $response = $this->response
                ->withType('application/json')
                ->withStatus(200)
                ->withStringBody(json_encode($imagens));
        return $response;
    }

    public function adicionar() {
        $imagens = $this->Imagens->newEmptyEntity();

        if ($this->request->is('post')) {
        // -----------------------------------------------------
            if (empty($this->request->getData())) {
                echo "Go back and Select file to upload.";
                return;
            }
           $fileImagen = $this->request->getData('arquivo');
           
            $file_name = $fileImagen->getClientFilename();
           
            $path = WWW_ROOT.'uploads' .DS. $file_name;
            $fileImagen->moveTo($path);
            
            $this->loadComponent('UtilArquivo');
            $folder_id = $this->UtilArquivo->create_folder("google-drive-test-folder");
            $success = $this->UtilArquivo->insert_file_to_drive($path, $file_name, $folder_id);
        // ----------------------------------------
            
            $imagens = $this->Imagens->patchEntity($imagens, $this->request->getData());

            if ($this->Imagens->save($imagens)) {
                $retorno['mensage'] = 'Dados inseridos com sucesso';
                $retorno['error'] = '0';
                $response = $this->response
                        ->withType('application/json')
                        ->withStatus(200)
                        ->withStringBody(json_encode($retorno));
                return $response;
            }
            $retorno['errors'] = $Imagens->getErrors();

            $response = $this->response
                    ->withType('application/json')
                    ->withStatus(400)
                    ->withStringBody(json_encode($retorno));
            return $response;
        }

//        $retorno['mensage'] = ['type of request not expected'];
//        $retorno['error'] = ['97'];
//        $response = $this->response
//                ->withType('application/json')
//                ->withStatus(400)
//                ->withStringBody(json_encode($retorno));
//        return $response;
           $this->set(compact('imagens'));
    }

    public function importar() {

        $dados = $this->UtilImagen->buscaDados();

        if ($dados) {

            $Imagens = TableRegistry::getTableLocator()->get('Imagens');
            $entities = $Imagens->newEntities($dados);
            $result = $Imagens->saveMany($entities);

            if ($result) {

                $retorno['mensage'] = 'Dados inseridos com sucesso';
                $retorno['error'] = '0';
                $response = $this->response
                        ->withType('application/json')
                        ->withStatus(200)
                        ->withStringBody(json_encode($retorno));
                return $response;
            }
        }
    }

    public function importarMany() {

        $contador = 0;
        while ($contador < 6) {
            $dados = $this->UtilImagen->buscaDadosMany($contador);

            if ($dados) {
                $Imagens = TableRegistry::getTableLocator()->get('Imagens');
                $entities = $Imagens->newEntities($dados);
                $Imagens->saveMany($entities);
            }
            $contador++;
        }

        $retorno['mensage'] = 'Dados inseridos com sucesso';
        $retorno['error'] = '0';
        $response = $this->response
                ->withType('application/json')
                ->withStatus(200)
                ->withStringBody(json_encode($retorno));
        return $response;
    }

}
