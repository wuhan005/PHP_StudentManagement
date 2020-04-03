<?php
/**
 * database.php
 *
 * Created in 2020/4/3 3:22 下午
 * Created by johnwu
 */

class DB
{
    private function __construct()
    {
    }

    private static $DB;

    public static function getInstance()
    {
        if (self::$DB == NULL) {
            $db = new mysqli(
                Config::Get("DB_HOST"),
                Config::Get("DB_USER"),
                Config::Get("DB_PASSWORD"),
                Config::Get("DB_NAME")
            );
            self::$DB = $db;
        }
        return self::$DB;
    }
}

class Database
{
    private $queryString;    // SQL query string
    private $queryData = array();      // SQL bind data
    private $mode = '';


    public function Select(string $tableName)
    {
        $this->mode = 's';
        $this->queryString = "SELECT * FROM `$tableName` ";
        return $this;
    }

    public function Insert(string $tableName, $data)
    {
        $this->mode = 'i';
        $keyString = implode(array_keys($data), ',');
        $valueMask = '';

        for ($i = 0; $i < count(array_values($data)); $i++) {
            $valueMask .= '?';
            if ($i !== count(array_values($data)) - 1) {
                $valueMask .= ',';
            }
        }

        $this->queryString = "INSERT INTO `$tableName` ($keyString) VALUES ($valueMask)";
        $db = DB::getInstance();
        $stmt = $db->prepare($this->queryString);

        $stmtType = '';
        foreach ($data as $value) {
            if (is_integer($value)) {
                $stmtType .= 'i';
            } else if (is_double($value)) {
                $stmtType .= 'd';
            } else {
                $stmtType .= 's';
            }
        }

        if ($stmt !== false) {
            if ($stmtType !== '') {
                $stmt->bind_param($stmtType, ...array_values($data));
            }
            $stmt->execute();
        }
    }

    public function Update(string $tableName)
    {
        $this->mode = 'u';
    }

    public function Delete(string $tableName)
    {
        $this->mode = 'd';
    }

    public function Where(string $query, $data = array())
    {
        $this->queryString .= "WHERE ($query)";
        array_merge($this->queryData, $data);
    }

    public function Fetch()
    {
        $this->queryString .= ';';
        $db = DB::getInstance();
        $stmt = $db->prepare($this->queryString);

        $stmtType = '';
        foreach ($this->queryData as $value) {
            if (is_integer($value)) {
                $stmtType .= 'i';
            } else if (is_double($value)) {
                $stmtType .= 'd';
            } else {
                $stmtType .= 's';
            }
        }
        $data = [];
        if ($stmt !== false) {
            if ($stmtType !== '') {
                $stmt->bind_param($stmtType, ...$this->queryData);
            }
            $stmt->execute();
            $result = $stmt->get_result();

            while ($r = $result->fetch_array(MYSQLI_ASSOC)) {
                array_push($data, $r);
            }
        }
        return $data;
    }
}