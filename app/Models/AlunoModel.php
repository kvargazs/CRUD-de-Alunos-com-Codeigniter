<?php
//C:\xampp\php\php.exe spark serve
namespace App\Models;

use CodeIgniter\Model;

class AlunoModel extends Model {
    protected $table = 'informacoes_alunos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nome', 'email', 'telefone', 'endereco', 'foto'];

    protected $validationRules = [
        'nome'     => 'required|min_length[3]|max_length[100]',
        'email'    => 'required|valid_email|is_unique[informacoes_alunos.email]',
        'telefone' => 'required|min_length[10]|max_length[15]',
        'endereco' => 'required|min_length[5]|max_length[255]',
        'foto'     => 'permit_empty|string',
    ];

    protected $validationMessages = [
        'nome' => [
            'required'    => 'O nome é obrigatório.',
            'min_length'  => 'O nome deve ter pelo menos 3 caracteres.',
            'max_length'  => 'O nome não pode ter mais que 100 caracteres.',
        ],
        'email' => [
            'required'    => 'O email é obrigatório.',
            'valid_email' => 'Por favor, forneça um email válido.',
            'is_unique'   => 'Este email já está em uso.',
        ],
        'telefone' => [
            'required'    => 'O telefone é obrigatório.',
            'min_length'  => 'O telefone deve ter pelo menos 10 caracteres.',
            'max_length'  => 'O telefone não pode ter mais que 15 caracteres.',
        ],
        'endereco' => [
            'required'    => 'O endereço é obrigatório.',
            'min_length'  => 'O endereço deve ter pelo menos 5 caracteres.',
            'max_length'  => 'O endereço não pode ter mais que 255 caracteres.',
        ],
        'foto' => [
            'permit_empty' => 'A foto é opcional, mas se fornecida, deve ser uma string.',
        ],
    ];
    protected $skipValidation = false;
}