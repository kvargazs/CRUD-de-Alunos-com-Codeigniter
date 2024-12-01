<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\AlunoModel;

class AlunoController extends ResourceController {

    //carrega o modelo no construtor
    protected $model;

    public function __construct() {
        $this->model = new AlunoModel();
    }

    //lista todos os alunos
    public function index() {
        $model = new AlunoModel();
        $data = $model->findAll();
        
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Nenhum aluno encontrado.');
        }
    }





    //cria um aluno
    public function create() {
        $data = [
            'nome' => esc($this->request->getVar('nome')),
            'email' => esc($this->request->getVar('email')),
            'telefone' => esc($this->request->getVar('telefone')),
            'endereco' => esc($this->request->getVar('endereco')),
            'foto' => esc($this->request->getVar('foto'))
        ];

        //valida o modelo
        if (!$this->model->validate($data)) {
            return $this->failValidationErrors($this->model->errors());
        }

        //enviando para o banco
        try {
            if ($this->model->insert($data)) {
                $response = [
                    'id' => $this->model->getInsertID(),
                    'message' => 'Aluno adicionado com sucesso!',
                ];
                return $this->respondCreated($response);
            } else {
                return $this->failValidationErrors($this->model->errors());
            }
        } catch (\Exception $e) {
            //msg de erro inesperado
            return $this->failServerError('Erro interno no servidor: ' . $e->getMessage());
        }
    }
        // $this->model->insert([
        //     'nome' => esc($this->request->getVar('nome')),
        //     'email' => esc($this->request->getVar('email')),
        //     'telefone' => esc($this->request->getVar('telefone')),
        //     'endereco' => esc($this->request->getVar('endereco')),
        //     'foto' => esc($this->request->getVar('foto'))
        // ]);

        // $response = [
        //     'message' => 'Aluno adicionado com sucesso!'
        // ];

        // return $this->respondCreated($response);




    //mostra os detalhes de um aluno
    public function show($id = null) {
        if (is_null($id)) {
            return $this->failValidationErrors('ID do aluno não fornecido.');
        }
        $model = new AlunoModel();
        $data = $model->find($id);

        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Aluno não encontrado.');
        }
    }





    //atualiza os dados do aluno
    public function update($id = null) {
        if (is_null($id)) {
            return $this->failValidationErrors('ID do aluno não fornecido.');
        }
        //validacao
        if (!$this->validate($this->model->getValidationRules())) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $data = [
            'nome'     => $this->request->getVar('nome'),
            'email'    => $this->request->getVar('email'),
            'telefone' => $this->request->getVar('telefone'),
            'endereco' => $this->request->getVar('endereco'),
            'foto'     => $this->request->getVar('foto'),
        ];

        try {
            $updateResult = $this->model->update($id, $data);

            if (!$updateResult) {
                return $this->fail('Erro ao atualizar o aluno.');
            }

            //resposta com sucesso
            $response = [
                'id'      => $id,
                'message' => 'Update feito com sucesso!',
            ];

            return $this->respond($response, 200);
        } catch (\Exception $e) {
            //erro
            return $this->failServerError('Erro interno: ' . $e->getMessage());
        }
    }
    





    //exclui um aluno
    public function delete($id = null) {
        if (is_null($id)) {
            return $this->failValidationErrors('ID do aluno não fornecido.');
        }
        $model = new AlunoModel();

        if ($model->find($id)) {
            $model->delete($id);
            return $this->respondDeleted([
                'id' => $id,
                'message' => 'Aluno excluído com sucesso!',
            ]);
        } else {
            return $this->failNotFound('Aluno não encontrado.');
        }
    }
}