<?php
class TableModel {
    private $name;
    private $columns;
    private $data;

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function getColumns() {
        return $this->columns;
    }

    public function setColumns($columns) {
        $this->columns = $columns;
    }

    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
    }
}