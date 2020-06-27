<?php

/*Classe e funcao em PHP*/
class Artigo{

    private $mysql;

    public function __construct(mysqli $mysql){
        $this->mysql = $mysql;
    }

    public function exibirTodos(): array{
        /*Select dos artigos do banco para jogar no site*/
        return $this->mysql->query('SELECT id, titulo, conteudo FROM artigos')->fetch_all(MYSQLI_ASSOC);
    }

    public function encontrarPorId(string $id): array{
        /*'prepare' prepara para vincular o ? com o id*/
        $selecionaArtigo = $this->mysql->prepare("SELECT id, titulo, conteudo FROM artigos WHERE id = ?");
        /*Vincula o ? com o id (s por ser string)*/
        $selecionaArtigo->bind_param('s', $id);
        /*Executa o Select*/
        $selecionaArtigo->execute();
        /*Pega o resultado da Query e transforma em um array associativo e retorna*/
        return $selecionaArtigo->get_result()->fetch_assoc();
    }

    public function adicionarArtigo(string $titulo, string $conteudo): void {
        $insereArtigo = $this->mysql->prepare('INSERT INTO artigos (titulo, conteudo) VALUES (?,?)');
        $insereArtigo->bind_param('ss', $titulo, $conteudo);
        $insereArtigo->execute();
    }

    public function editarArtigo(string $id, string $titulo, string $conteudo): void {
        $insereArtigo = $this->mysql->prepare('UPDATE artigos SET titulo = ?, conteudo = ? WHERE id = ?');
        $insereArtigo->bind_param('sss', $titulo, $conteudo, $id);
        $insereArtigo->execute();
    }

    public function remover(string $id): void{
        $resultado = $this->mysql->prepare('DELETE FROM artigos WHERE id = ?');
        $resultado->bind_param('s', $id);
        $resultado->execute();
    }
}

?>