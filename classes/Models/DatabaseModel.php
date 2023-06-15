<?php

class DatabaseModel
{
    private $name;
    private $characterSet;
    private $collation;
    private $tables;

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getCharacterSet() {
        return $this->characterSet;
    }

    public function setCharacterSet($characterSet) {
        $this->characterSet = $characterSet;
    }

    public function getCollation() {
        return $this->collation;
    }

    public function setCollation($collation) {
        $this->collation = $collation;
    }

    public function getTables() {
        return $this->tables;
    }

    public function setTables($tables) {
        $this->tables = $tables;
    }
}