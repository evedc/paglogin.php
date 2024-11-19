<?php
requite_oce('DB.php');

class Crud extends DB {
    protected string $tabela;

    abstract public function insert();
    abstract public function update($id);

    public function find($id) {
        $sql = "SELECT * FROM $this->tabela WHERE id=?";
        $sql = DB::prepare($sql);
        $sql->execute(array($id));
        $valor = $sql->fetch();

        return $valor
    }
}