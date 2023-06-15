<?php
require_once 'Models/TableModel.php';
require_once 'Models/DatabaseModel.php';
require_once 'Connection.php';

class Database extends Connection {
    public function getDatabases() {
        $conn = $this->mysqlConnection();

        $query = "
        SELECT
            SCHEMA_NAME AS database_name,
            DEFAULT_CHARACTER_SET_NAME AS character_set,
            DEFAULT_COLLATION_NAME AS collation
        FROM information_schema.SCHEMATA;
    ";

        $result = $conn->query($query);
        $databases = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $database = new DatabaseModel();
                $database->setName($row['database_name']);
                $database->setCharacterSet($row['character_set']);
                $database->setCollation($row['collation']);

                $tablesQuery = "
                SELECT TABLE_NAME
                FROM information_schema.TABLES
                WHERE TABLE_SCHEMA = '{$row['database_name']}';
            ";
                $tablesResult = $conn->query($tablesQuery);
                $tables = [];

                if ($tablesResult->num_rows > 0) {
                    while ($tableRow = $tablesResult->fetch_assoc()) {
                        $table = new TableModel($tableRow['TABLE_NAME']);
                        $tables[] = $table;
                    }
                }

                $database->setTables($tables);
                $databases[] = $database;
            }
        }

        $conn->close();

        return $databases;
    }

    public function createDatabase($databaseName) {
        $conn = $this->mysqlConnection();

        $query = "CREATE SCHEMA " . $databaseName;

        return $conn->query($query);
    }

    public function getTables($database) {
        $conn = $this->mysqlConnection($database);

        $result = $conn->query("SHOW TABLES");
        $tables = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_row()) {
                $tables[] = new TableModel($row[0]);
            }
        }

        $conn->close();

        return $tables;
    }


    public function getTable($database, $tableName) {
        $conn = $this->mysqlConnection($database);

        // Получаем столбцы
        $result = $conn->query("SHOW COLUMNS FROM $tableName");
        $columns = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $columns[] = $row['Field'];
            }
        }

        // Получаем данные (записи)
        $result = $conn->query("SELECT * FROM $tableName");
        $data = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        $table = new TableModel($tableName);
        $table->setColumns($columns);
        $table->setData($data); // Добавляем данные в объект TableModel

        $conn->close();

        return $table;
    }
}