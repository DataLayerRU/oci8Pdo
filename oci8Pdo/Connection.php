<?php

namespace datalayerru\components\oci8Pdo;

use Yii;

class Connection extends \yii\db\Connection
{
    public $pdoClass = 'datalayerru\oci8Pdo\pdo\PDOoci';

    /**
     * Creates the PDO instance.
     * When some functionalities are missing in the pdo driver, we may use
     * an adapter class to provides them.
     * @return PDO the pdo instance
     */
    protected function createPdoInstance()
    {
        if (!empty($this->charset)) {
            Yii::trace('Error: Connection::$charset has been set to `'.$this->charset.'` in your config. The property is only used for MySQL and PostgreSQL databases. If you want to set the charset in Oracle to UTF8, add the following to the end of your Connection::$connectionString: ;charset=AL32UTF8;',
                    'datalayerru\components\oci8Pdo\Connection');
        }

        try {
            Yii::trace('Opening Oracle connection',
                    'datalayerru\components\oci8Pdo\Connection');
            $pdoClass = parent::createPdoInstance();
        } catch (PDOException $e) {
            throw $e;
        }
        return $pdoClass;
    }

    /**
     * Closes the currently active Oracle DB connection.
     * It does nothing if the connection is already closed.
     */
//    function close()
//    {
//        Yii::trace('Closing Oracle connection', 'ext.oci8Pdo.OciDbConnection');
//        parent::close();
//    }

    public function getConnection()
    {
        return $this->pdo->getConnection();
    }
}