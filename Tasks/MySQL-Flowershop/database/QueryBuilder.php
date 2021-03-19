<?php

namespace Shop\database;

use PDO;

class QueryBuilder
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll(string $table): array
    {
        $s = $this->pdo->query("select * from {$table}");

        return $s->fetchAll(PDO::FETCH_ASSOC);
    }
}