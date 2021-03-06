<?php


/**
 * Base class that represents a row from the 'menu' table.
 *
 *
 *
 * @package    propel.generator.pollina.om
 */
abstract class BaseMenu extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'MenuPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        MenuPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id field.
     * @var        int
     */
    protected $id;

    /**
     * The value for the lang field.
     * @var        string
     */
    protected $lang;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the parent field.
     * @var        int
     */
    protected $parent;

    /**
     * @var        Menu
     */
    protected $aMenuRelatedByParent;

    /**
     * @var        PropelObjectCollection|Menu[] Collection to store aggregation of Menu objects.
     */
    protected $collMenusRelatedById;
    protected $collMenusRelatedByIdPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInSave = false;

    /**
     * Flag to prevent endless validation loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInValidation = false;

    /**
     * Flag to prevent endless clearAllReferences($deep=true) loop, if this object is referenced
     * @var        boolean
     */
    protected $alreadyInClearAllReferencesDeep = false;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $menusRelatedByIdScheduledForDeletion = null;

    /**
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [lang] column value.
     *
     * @return string
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * Get the [name] column value.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the [parent] column value.
     *
     * @return int
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Menu The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = MenuPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [lang] column.
     *
     * @param string $v new value
     * @return Menu The current object (for fluent API support)
     */
    public function setLang($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->lang !== $v) {
            $this->lang = $v;
            $this->modifiedColumns[] = MenuPeer::LANG;
        }


        return $this;
    } // setLang()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return Menu The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = MenuPeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [parent] column.
     *
     * @param int $v new value
     * @return Menu The current object (for fluent API support)
     */
    public function setParent($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->parent !== $v) {
            $this->parent = $v;
            $this->modifiedColumns[] = MenuPeer::PARENT;
        }

        if ($this->aMenuRelatedByParent !== null && $this->aMenuRelatedByParent->getId() !== $v) {
            $this->aMenuRelatedByParent = null;
        }


        return $this;
    } // setParent()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return true
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
     * @param int $startcol 0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->lang = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->parent = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 4; // 4 = MenuPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Menu object", $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {

        if ($this->aMenuRelatedByParent !== null && $this->parent !== $this->aMenuRelatedByParent->getId()) {
            $this->aMenuRelatedByParent = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param boolean $deep (optional) Whether to also de-associated any related objects.
     * @param PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getConnection(MenuPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = MenuPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aMenuRelatedByParent = null;
            $this->collMenusRelatedById = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param PropelPDO $con
     * @return void
     * @throws PropelException
     * @throws Exception
     * @see        BaseObject::setDeleted()
     * @see        BaseObject::isDeleted()
     */
    public function delete(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(MenuPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = MenuQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $con->commit();
                $this->setDeleted(true);
            } else {
                $con->commit();
            }
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @throws Exception
     * @see        doSave()
     */
    public function save(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(MenuPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                MenuPeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see        save()
     */
    protected function doSave(PropelPDO $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aMenuRelatedByParent !== null) {
                if ($this->aMenuRelatedByParent->isModified() || $this->aMenuRelatedByParent->isNew()) {
                    $affectedRows += $this->aMenuRelatedByParent->save($con);
                }
                $this->setMenuRelatedByParent($this->aMenuRelatedByParent);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                $this->resetModified();
            }

            if ($this->menusRelatedByIdScheduledForDeletion !== null) {
                if (!$this->menusRelatedByIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->menusRelatedByIdScheduledForDeletion as $menuRelatedById) {
                        // need to save related object because we set the relation to null
                        $menuRelatedById->save($con);
                    }
                    $this->menusRelatedByIdScheduledForDeletion = null;
                }
            }

            if ($this->collMenusRelatedById !== null) {
                foreach ($this->collMenusRelatedById as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[] = MenuPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . MenuPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(MenuPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(MenuPeer::LANG)) {
            $modifiedColumns[':p' . $index++]  = '`lang`';
        }
        if ($this->isColumnModified(MenuPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(MenuPeer::PARENT)) {
            $modifiedColumns[':p' . $index++]  = '`parent`';
        }

        $sql = sprintf(
            'INSERT INTO `menu` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id`':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case '`lang`':
                        $stmt->bindValue($identifier, $this->lang, PDO::PARAM_STR);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`parent`':
                        $stmt->bindValue($identifier, $this->parent, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', $e);
        }
        $this->setId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param PropelPDO $con
     *
     * @see        doSave()
     */
    protected function doUpdate(PropelPDO $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();
        BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
    }

    /**
     * Array of ValidationFailed objects.
     * @var        array ValidationFailed[]
     */
    protected $validationFailures = array();

    /**
     * Gets any ValidationFailed objects that resulted from last call to validate().
     *
     *
     * @return array ValidationFailed[]
     * @see        validate()
     */
    public function getValidationFailures()
    {
        return $this->validationFailures;
    }

    /**
     * Validates the objects modified field values and all objects related to this table.
     *
     * If $columns is either a column name or an array of column names
     * only those columns are validated.
     *
     * @param mixed $columns Column name or an array of column names.
     * @return boolean Whether all columns pass validation.
     * @see        doValidate()
     * @see        getValidationFailures()
     */
    public function validate($columns = null)
    {
        $res = $this->doValidate($columns);
        if ($res === true) {
            $this->validationFailures = array();

            return true;
        }

        $this->validationFailures = $res;

        return false;
    }

    /**
     * This function performs the validation work for complex object models.
     *
     * In addition to checking the current object, all related objects will
     * also be validated.  If all pass then <code>true</code> is returned; otherwise
     * an aggreagated array of ValidationFailed objects will be returned.
     *
     * @param array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            // We call the validate method on the following object(s) if they
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aMenuRelatedByParent !== null) {
                if (!$this->aMenuRelatedByParent->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aMenuRelatedByParent->getValidationFailures());
                }
            }


            if (($retval = MenuPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collMenusRelatedById !== null) {
                    foreach ($this->collMenusRelatedById as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }


            $this->alreadyInValidation = false;
        }

        return (!empty($failureMap) ? $failureMap : true);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param string $name name
     * @param string $type The type of fieldname the $name is of:
     *               one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *               BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *               Defaults to BasePeer::TYPE_FIELDNAME
     * @return mixed Value of field.
     */
    public function getByName($name, $type = BasePeer::TYPE_FIELDNAME)
    {
        $pos = MenuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getLang();
                break;
            case 2:
                return $this->getName();
                break;
            case 3:
                return $this->getParent();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                    Defaults to BasePeer::TYPE_FIELDNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to true.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_FIELDNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {
        if (isset($alreadyDumpedObjects['Menu'][serialize($this->getPrimaryKey())])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Menu'][serialize($this->getPrimaryKey())] = true;
        $keys = MenuPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getLang(),
            $keys[2] => $this->getName(),
            $keys[3] => $this->getParent(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aMenuRelatedByParent) {
                $result['MenuRelatedByParent'] = $this->aMenuRelatedByParent->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collMenusRelatedById) {
                $result['MenusRelatedById'] = $this->collMenusRelatedById->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param string $name peer name
     * @param mixed $value field value
     * @param string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_FIELDNAME
     * @return void
     */
    public function setByName($name, $value, $type = BasePeer::TYPE_FIELDNAME)
    {
        $pos = MenuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

        $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @param mixed $value field value
     * @return void
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setLang($value);
                break;
            case 2:
                $this->setName($value);
                break;
            case 3:
                $this->setParent($value);
                break;
        } // switch()
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     * The default key type is the column's BasePeer::TYPE_FIELDNAME
     *
     * @param array  $arr     An array to populate the object from.
     * @param string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_FIELDNAME)
    {
        $keys = MenuPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setLang($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setParent($arr[$keys[3]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(MenuPeer::DATABASE_NAME);

        if ($this->isColumnModified(MenuPeer::ID)) $criteria->add(MenuPeer::ID, $this->id);
        if ($this->isColumnModified(MenuPeer::LANG)) $criteria->add(MenuPeer::LANG, $this->lang);
        if ($this->isColumnModified(MenuPeer::NAME)) $criteria->add(MenuPeer::NAME, $this->name);
        if ($this->isColumnModified(MenuPeer::PARENT)) $criteria->add(MenuPeer::PARENT, $this->parent);

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = new Criteria(MenuPeer::DATABASE_NAME);
        $criteria->add(MenuPeer::ID, $this->id);
        $criteria->add(MenuPeer::LANG, $this->lang);

        return $criteria;
    }

    /**
     * Returns the composite primary key for this object.
     * The array elements will be in same order as specified in XML.
     * @return array
     */
    public function getPrimaryKey()
    {
        $pks = array();
        $pks[0] = $this->getId();
        $pks[1] = $this->getLang();

        return $pks;
    }

    /**
     * Set the [composite] primary key.
     *
     * @param array $keys The elements of the composite key (order must match the order in XML file).
     * @return void
     */
    public function setPrimaryKey($keys)
    {
        $this->setId($keys[0]);
        $this->setLang($keys[1]);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return (null === $this->getId()) && (null === $this->getLang());
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Menu (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setLang($this->getLang());
        $copyObj->setName($this->getName());
        $copyObj->setParent($this->getParent());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getMenusRelatedById() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMenuRelatedById($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return Menu Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Returns a peer instance associated with this om.
     *
     * Since Peer classes are not to have any instance attributes, this method returns the
     * same instance for all member of this class. The method could therefore
     * be static, but this would prevent one from overriding the behavior.
     *
     * @return MenuPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new MenuPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Menu object.
     *
     * @param             Menu $v
     * @return Menu The current object (for fluent API support)
     * @throws PropelException
     */
    public function setMenuRelatedByParent(Menu $v = null)
    {
        if ($v === null) {
            $this->setParent(NULL);
        } else {
            $this->setParent($v->getId());
        }

        $this->aMenuRelatedByParent = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Menu object, it will not be re-added.
        if ($v !== null) {
            $v->addMenuRelatedById($this);
        }


        return $this;
    }


    /**
     * Get the associated Menu object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Menu The associated Menu object.
     * @throws PropelException
     */
    public function getMenuRelatedByParent(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aMenuRelatedByParent === null && ($this->parent !== null) && $doQuery) {
            $this->aMenuRelatedByParent = MenuQuery::create()
                ->filterByMenuRelatedById($this) // here
                ->findOne($con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aMenuRelatedByParent->addMenusRelatedById($this);
             */
        }

        return $this->aMenuRelatedByParent;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('MenuRelatedById' == $relationName) {
            $this->initMenusRelatedById();
        }
    }

    /**
     * Clears out the collMenusRelatedById collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Menu The current object (for fluent API support)
     * @see        addMenusRelatedById()
     */
    public function clearMenusRelatedById()
    {
        $this->collMenusRelatedById = null; // important to set this to null since that means it is uninitialized
        $this->collMenusRelatedByIdPartial = null;

        return $this;
    }

    /**
     * reset is the collMenusRelatedById collection loaded partially
     *
     * @return void
     */
    public function resetPartialMenusRelatedById($v = true)
    {
        $this->collMenusRelatedByIdPartial = $v;
    }

    /**
     * Initializes the collMenusRelatedById collection.
     *
     * By default this just sets the collMenusRelatedById collection to an empty array (like clearcollMenusRelatedById());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMenusRelatedById($overrideExisting = true)
    {
        if (null !== $this->collMenusRelatedById && !$overrideExisting) {
            return;
        }
        $this->collMenusRelatedById = new PropelObjectCollection();
        $this->collMenusRelatedById->setModel('Menu');
    }

    /**
     * Gets an array of Menu objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Menu is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Menu[] List of Menu objects
     * @throws PropelException
     */
    public function getMenusRelatedById($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collMenusRelatedByIdPartial && !$this->isNew();
        if (null === $this->collMenusRelatedById || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMenusRelatedById) {
                // return empty collection
                $this->initMenusRelatedById();
            } else {
                $collMenusRelatedById = MenuQuery::create(null, $criteria)
                    ->filterByMenuRelatedByParent($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collMenusRelatedByIdPartial && count($collMenusRelatedById)) {
                      $this->initMenusRelatedById(false);

                      foreach($collMenusRelatedById as $obj) {
                        if (false == $this->collMenusRelatedById->contains($obj)) {
                          $this->collMenusRelatedById->append($obj);
                        }
                      }

                      $this->collMenusRelatedByIdPartial = true;
                    }

                    $collMenusRelatedById->getInternalIterator()->rewind();
                    return $collMenusRelatedById;
                }

                if($partial && $this->collMenusRelatedById) {
                    foreach($this->collMenusRelatedById as $obj) {
                        if($obj->isNew()) {
                            $collMenusRelatedById[] = $obj;
                        }
                    }
                }

                $this->collMenusRelatedById = $collMenusRelatedById;
                $this->collMenusRelatedByIdPartial = false;
            }
        }

        return $this->collMenusRelatedById;
    }

    /**
     * Sets a collection of MenuRelatedById objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $menusRelatedById A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Menu The current object (for fluent API support)
     */
    public function setMenusRelatedById(PropelCollection $menusRelatedById, PropelPDO $con = null)
    {
        $menusRelatedByIdToDelete = $this->getMenusRelatedById(new Criteria(), $con)->diff($menusRelatedById);

        $this->menusRelatedByIdScheduledForDeletion = unserialize(serialize($menusRelatedByIdToDelete));

        foreach ($menusRelatedByIdToDelete as $menuRelatedByIdRemoved) {
            $menuRelatedByIdRemoved->setMenuRelatedByParent(null);
        }

        $this->collMenusRelatedById = null;
        foreach ($menusRelatedById as $menuRelatedById) {
            $this->addMenuRelatedById($menuRelatedById);
        }

        $this->collMenusRelatedById = $menusRelatedById;
        $this->collMenusRelatedByIdPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Menu objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Menu objects.
     * @throws PropelException
     */
    public function countMenusRelatedById(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collMenusRelatedByIdPartial && !$this->isNew();
        if (null === $this->collMenusRelatedById || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMenusRelatedById) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getMenusRelatedById());
            }
            $query = MenuQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMenuRelatedByParent($this)
                ->count($con);
        }

        return count($this->collMenusRelatedById);
    }

    /**
     * Method called to associate a Menu object to this object
     * through the Menu foreign key attribute.
     *
     * @param    Menu $l Menu
     * @return Menu The current object (for fluent API support)
     */
    public function addMenuRelatedById(Menu $l)
    {
        if ($this->collMenusRelatedById === null) {
            $this->initMenusRelatedById();
            $this->collMenusRelatedByIdPartial = true;
        }
        if (!in_array($l, $this->collMenusRelatedById->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddMenuRelatedById($l);
        }

        return $this;
    }

    /**
     * @param	MenuRelatedById $menuRelatedById The menuRelatedById object to add.
     */
    protected function doAddMenuRelatedById($menuRelatedById)
    {
        $this->collMenusRelatedById[]= $menuRelatedById;
        $menuRelatedById->setMenuRelatedByParent($this);
    }

    /**
     * @param	MenuRelatedById $menuRelatedById The menuRelatedById object to remove.
     * @return Menu The current object (for fluent API support)
     */
    public function removeMenuRelatedById($menuRelatedById)
    {
        if ($this->getMenusRelatedById()->contains($menuRelatedById)) {
            $this->collMenusRelatedById->remove($this->collMenusRelatedById->search($menuRelatedById));
            if (null === $this->menusRelatedByIdScheduledForDeletion) {
                $this->menusRelatedByIdScheduledForDeletion = clone $this->collMenusRelatedById;
                $this->menusRelatedByIdScheduledForDeletion->clear();
            }
            $this->menusRelatedByIdScheduledForDeletion[]= $menuRelatedById;
            $menuRelatedById->setMenuRelatedByParent(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->lang = null;
        $this->name = null;
        $this->parent = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references to other model objects or collections of model objects.
     *
     * This method is a user-space workaround for PHP's inability to garbage collect
     * objects with circular references (even in PHP 5.3). This is currently necessary
     * when using Propel in certain daemon or large-volumne/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;
            if ($this->collMenusRelatedById) {
                foreach ($this->collMenusRelatedById as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aMenuRelatedByParent instanceof Persistent) {
              $this->aMenuRelatedByParent->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collMenusRelatedById instanceof PropelCollection) {
            $this->collMenusRelatedById->clearIterator();
        }
        $this->collMenusRelatedById = null;
        $this->aMenuRelatedByParent = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(MenuPeer::DEFAULT_STRING_FORMAT);
    }

    /**
     * return true is the object is in saving state
     *
     * @return boolean
     */
    public function isAlreadyInSave()
    {
        return $this->alreadyInSave;
    }

}
