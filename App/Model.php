<?php

namespace App;

abstract class Model
{
    const TABLE = '';
    const COLUMNS = [];
    const RELATIONS = [];

    public static function findAll()
    {
        $db = Db::instance();
        return $db->query(
            'SELECT * FROM ' . static::TABLE,
            static::class
        );
    }

    public static function findById($id)
    {
        $db = Db::instance();
        $res = $db->query_one_element(
            'SELECT * FROM ' . static::TABLE
            . ' WHERE id=:id',
            static::class,
            array('id' => $id)
        );
        return $res;
    }

    public function isNew()
    {
        return empty($this->id);
    }

    public function insert()
    {
        if (!$this->isNew()) {
            return;
        }

        $columns = [];
        $values = [];
        foreach ($this as $k => $v) {
            if ('id' == $k) {
                continue;
            }
            $columns[] = $k;
            $values[':' . $k] = $v;
        }
        $sql = '
            INSERT INTO ' . static::TABLE . '
            (' . implode(',', $columns) . ', created_at)
            VALUES
            (' . implode(',', array_keys($values)) . ', NOW())
            ';
        $db = Db::instance();
        $db->execute($sql, $values);
        $this->id = $db->getLastInsertId();
    }

    public function update()
    {
        if ($this->isNew()) {
            return;
        }
        $values = [];
        $sql = '
            UPDATE ' . static::TABLE . ' SET ';
        foreach ($this as $k => $v) {
            $values[':' . $k] = $v;
            if ($k == 'id') {
                continue;
            }
            $sql .= $k . '=:' . $k;
            $sql .= ', ';
        }
        $sql = substr($sql, 0, -2);
        $sql .= ' WHERE id=:id';
        $db = Db::instance();
        $db->execute($sql, $values);
    }

    public function delete()
    {
        if ($this->isNew()) {
            return;
        }
        $sql = '
            DELETE FROM ' . static::TABLE . '
            WHERE id=:id';
        $db = Db::instance();
        $db->execute($sql, array(':id' => $this->id));
    }

    public function save()
    {
        if ($this->isNew()) {
            $this->insert();
        } else {
            $this->update();
        }
    }

    public static function getLatest(int $count)
    {
        $db = Db::instance();
        $res = $db->query(
            'SELECT * FROM ' . static::TABLE
            . ' ORDER BY created_at DESC'
            . ' LIMIT 0,' . $count,
            static::class
        );
        if (count($res) == 0) {
            return [];
        }
        return $res;
    }

    private static function find_hasOne($linkId_name, $id_value)
    {
        $db = Db::instance();
        $res = $db->query_one_element(
            'SELECT * FROM ' . static::TABLE
            . ' WHERE ' . $linkId_name . '=:id',
            static::class,
            array('id' => $id_value)
        );

        return $res;
    }

    private static function find_hasMany($linkId_name, $id_value)
    {
        $db = Db::instance();
        $res = $db->query(
            'SELECT * FROM ' . static::TABLE
            . ' WHERE ' . $linkId_name . '=:id',
            static::class,
            array('id' => $id_value)
        );
        if (count($res) == 0) {
            return null;
        }
        return $res;
    }

    private static function find_manyToMany($links_model, $linkFrom_name, $linkTo_name, $id, $id_value)
    {
        $db = Db::instance();
        $res = $db->query(
            'SELECT * FROM ' . $links_model::TABLE
            . ' AS link_table '
            . ' LEFT JOIN ' . static::TABLE
            . ' AS data_table '
            . ' ON link_table.' . $linkFrom_name . '=data_table.' . $id
            . ' WHERE link_table.' . $linkTo_name . '=:id',
            static::class,
            array('id' => $id_value)
        );
        return $res;
    }

    public function __get($k)
    {

        if ($k == 'count') {
            return self::count();
        }

        if ($k == 'countRes') {
            return count(self);
        }

        /*
        Обработка связей таблиц
         */
        if (key_exists($k, static::RELATIONS)) {
            /*
            @id - имя поля связанно объекта(таблицы)) с данными, по умолчанию id
             */
            $id_name = static::RELATIONS[$k]['id'] ?? 'id';
            /*
            Обработка hasOne
            @link_id - имя поля текущего объекта(таблицы), где находиться ID связанной таблицы. по-умолчанию ИМЯВЫЗЫВАЕМОГОСВОЙСТВА_id
            */
            $linkId_name = static::RELATIONS[$k]['link_id'] ?? $k . '_id';
            if (isset($this->{$linkId_name})) {
                if (static::RELATIONS[$k]['type'] == 'hasOne') {
                    return static::RELATIONS[$k]['model']::find_hasOne($id_name, $this->{$linkId_name});
                }
            };
            /*
            Обработка hasMany
            @link_id - имя поля связанного объекта(таблицы), где находиться ID записей. по-умолчанию ИМЯТЕКУЩЕГООБЪЕКТАБЕЗNAMESPACEИМАЛЕНЬКИМИБУКВАМИ_id
            */
            $linkId_name = static::RELATIONS[$k]['link_id'] ?? $this->getLinkId();
            if (isset($this->{$id_name})) {
                if (static::RELATIONS[$k]['type'] == 'hasMany') {
                    return static::RELATIONS[$k]['model']::find_hasMany($linkId_name, $this->{$id_name});
                }
            };
            /*
            Обработка manyToMany
            @links_model = модель(таблица) связей, связующие два объекта. По умолчанию ТЕКУЩАЯМОДЕЛЬ2МОДЕЛЬИЗКОТОРОЙБЕРЕМЗНАЧЕНИЕБЕЗNAMESPACE, если этот класс не существует, то ТЕКУЩАЯМОДЕЛЬБЕЗNAMESPACE2МОДЕЛЬИЗКОТОРОЙБЕРЕМЗНАЧЕНИЕ, если этот класс не существует, то null
            @link_from_id - имя поля в модели(таблице) связей, для текущего объекта, по умолчанию ИМЯТЕКУЩЕГООБЪЕКТАБЕЗNAMESPACEИМАЛЕНЬКИМИБУКВАМИ_id
            @link_to_id - имя поля в модели(таблице) связей, для получаемого объекта, по умолчанию ИМЯВЫЗЫВАЕМОГООБЪЕКТАБЕЗNAMESPACEИМАЛЕНЬКИМИБУКВАМИ_id
             */
            if (isset($this->{$id_name})) {
                if (static::RELATIONS[$k]['type'] == 'manyToMany') {
                    $links_model = static::RELATIONS[$k]['link_model'] ?? $this->getLinksModel($k);
                    $linkFrom_name = static::RELATIONS[$k]['link_from_id'] ?? $this->getLinkId();
                    $linkTo_name = static::RELATIONS[$k]['link_to_id'] ?? strtolower(preg_replace('#.+\\\#', '', static::RELATIONS[$k]['model'])) . '_id';
                    return static::RELATIONS[$k]['model']::find_manyToMany($links_model, $linkTo_name, $linkFrom_name, $id_name, $this->{$id_name});
                }
            };
            return false;
        }
        return NULL;
    }

    public function __isset($k)
    {
        return key_exists($k, static::RELATIONS);
    }

    private function getLinkId()
    {
        /*
        возвращает имя класса без namespace и маленькими буквами + "_id"
         */
        return strtolower(preg_replace('#.+\\\#', '', static::class)) . '_id';
    }

    private function getLinksModel($k)
    {
        if (class_exists($links_model = static::class . "_to_" . preg_replace('#.+\\\#', '', static::RELATIONS[$k]['model']))) return $links_model;
        if (class_exists($links_model = static::RELATIONS[$k]['model'] . "_to_" . preg_replace('#.+\\\#', '', static::class))) return $links_model;
        return null;
    }

    public static function search($data = ['1' => '1'], int $start = 0, int $limit = 0)
    {
        $db = Db::instance();
        $sql = '
            SELECT * FROM ' . static::TABLE;
        if (!is_null($data)) {
            $sql .= ' WHERE ';
            $values = [];
            foreach ($data as $k => $v) {
                $values[':' . $k] = '%' . $v . '%';
                $sql .= $k . ' LIKE :' . $k;
                $sql .= ' AND ';
            }
            $sql = substr($sql, 0, -5);
        };
        if ($limit > 0) {
            $sql .= ' LIMIT ' . $start . ',' . $limit;
        }
        $res = $db->query(
            $sql,
            static::class,
            $values
        );
        return $res;
    }

    public static function extendedSearch($data = ['1' => '1'])
    {
        foreach ($data as $k => $v) {
            $data[$k] = str_replace(' ', '%', $v);
        }
        return self::search($data);
    }

    public static function count()
    {
        $db = Db::instance();
        return (int)$db->count(static::TABLE);
    }

    public static function page($data = ['1' => '1'], int $page = 1, int $record_per_page = 5)
    {
        $start_record = ($page - 1) * $record_per_page;
        return self::search($data, $start_record, $record_per_page);
    }

    public static function searchOneElement($data)
    {
        $res = self::search($data);
        if (is_array($res)) {
            return $res[0];
        } else {
            return $res;
        }
    }

    public static function where($data = ['1=1'], int $start = 0, int $limit = 0)
    {
        $db = Db::instance();
        $sql = '
            SELECT * FROM ' . static::TABLE;
        if (!is_null($data)) {
            $sql .= ' WHERE ';
            $values = [];
            foreach ($data as $k => $v) {
                $k = trim($k);
                if (preg_match('/^\w+/i', $k, $match)) {
                    $key = $match[0];
                } else {
                    //ошибка обработки паттерна регулярки
                }
                $key = rtrim($key, ' <>=');
                $values[':' . $key] = $v;
                $sql .= $k . ' :' . $key;
                $sql .= ' AND ';
            }
            $sql = substr($sql, 0, -5);
        };
        if ($limit > 0) {
            $sql .= ' LIMIT ' . $start . ',' . $limit;
        }
        $res = $db->query(
            $sql,
            static::class,
            $values
        );
        return $res;
    }

    public static function whereOneElement($data = ['1=1'])
    {
        $res = self::where($data);
        if (is_array($res) && isset($res[0])) {
            return $res[0];
        } else {
            return null;
        }
    }

    public static function drop()
    {
        $db = Db::instance();
        $sql = 'DROP TABLE ' . static::TABLE;
        $res = $db->execute($sql);
        return $res;
    }

    public static function empty()
    {
        $db = Db::instance();
        $sql = 'TRUNCATE TABLE ' . static::TABLE;
        $res = $db->execute($sql);
        return $res;
    }

    public static function create()
    {
        $db = Db::instance();
        $values = [];
        $sql = 'CREATE TABLE ' . static::TABLE . '
                (id SERIAL NOT NULL, ';
        foreach (static::COLUMNS as $k => $v) {
            $null_attr = "";
            $default_attr = "";
            if (isset($v['null'])) {
                $null_attr = (true === $v['null']) ? 'NULL' : 'NOT NULL';
            } else {
                $null_attr = 'NOT NULL';
            }
            if (isset($v['default'])){
                if ($v['default'] == 'null') {
                    $null_attr = 'NULL';
                    $default_attr = ' DEFAULT NULL';
                } else {
                    $default_attr = ' DEFAULT :' . $k . '_default';
                    $values[':' . $k . '_default'] = $v['default'];
                }
            }
            switch ($v['type']) {
                case 'text':
                    $sql .= $k . ' TEXT ' . $null_attr . $default_attr  . ', ';
                    break;
                case 'int':
                    $length = $v['length'] ?? 20;
                    $sql .= $k . ' BIGINT(' . $length . ') ' . $null_attr . $default_attr  . ', ';
                    break;
                case 'string':
                default:
                    $length = $v['length'] ?? 255;
                    $sql .= $k . ' VARCHAR(' . $length . ') ' . $null_attr . $default_attr  . ', ';
                    break;
            }
        }
        $sql .= 'created_at TIMESTAMP NULL, modified_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP )';
        return $db->execute($sql, $values);
    }

}
