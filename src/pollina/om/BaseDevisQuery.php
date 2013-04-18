<?php


/**
 * Base class that represents a query for the 'devis' table.
 *
 *
 *
 * @method DevisQuery orderById($order = Criteria::ASC) Order by the id column
 * @method DevisQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method DevisQuery orderByIdSheet($order = Criteria::ASC) Order by the id_sheet column
 * @method DevisQuery orderByNumber($order = Criteria::ASC) Order by the number column
 * @method DevisQuery orderByStatus($order = Criteria::ASC) Order by the status column
 *
 * @method DevisQuery groupById() Group by the id column
 * @method DevisQuery groupByName() Group by the name column
 * @method DevisQuery groupByIdSheet() Group by the id_sheet column
 * @method DevisQuery groupByNumber() Group by the number column
 * @method DevisQuery groupByStatus() Group by the status column
 *
 * @method DevisQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method DevisQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method DevisQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method DevisQuery leftJoinSheet($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sheet relation
 * @method DevisQuery rightJoinSheet($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sheet relation
 * @method DevisQuery innerJoinSheet($relationAlias = null) Adds a INNER JOIN clause to the query using the Sheet relation
 *
 * @method Devis findOne(PropelPDO $con = null) Return the first Devis matching the query
 * @method Devis findOneOrCreate(PropelPDO $con = null) Return the first Devis matching the query, or a new Devis object populated from the query conditions when no match is found
 *
 * @method Devis findOneByName(string $name) Return the first Devis filtered by the name column
 * @method Devis findOneByIdSheet(int $id_sheet) Return the first Devis filtered by the id_sheet column
 * @method Devis findOneByNumber(int $number) Return the first Devis filtered by the number column
 * @method Devis findOneByStatus(string $status) Return the first Devis filtered by the status column
 *
 * @method array findById(int $id) Return Devis objects filtered by the id column
 * @method array findByName(string $name) Return Devis objects filtered by the name column
 * @method array findByIdSheet(int $id_sheet) Return Devis objects filtered by the id_sheet column
 * @method array findByNumber(int $number) Return Devis objects filtered by the number column
 * @method array findByStatus(string $status) Return Devis objects filtered by the status column
 *
 * @package    propel.generator.pollina.om
 */
abstract class BaseDevisQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseDevisQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pollina', $modelName = 'Devis', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new DevisQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   DevisQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return DevisQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof DevisQuery) {
            return $criteria;
        }
        $query = new DevisQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Devis|Devis[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = DevisPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(DevisPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Devis A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneById($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Devis A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `name`, `id_sheet`, `number`, `status` FROM `devis` WHERE `id` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Devis();
            $obj->hydrate($row);
            DevisPeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return Devis|Devis[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Devis[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return DevisQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DevisPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return DevisQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DevisPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id >= 12
     * $query->filterById(array('max' => 12)); // WHERE id <= 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DevisQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(DevisPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(DevisPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DevisPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DevisQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $name)) {
                $name = str_replace('*', '%', $name);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DevisPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the id_sheet column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSheet(1234); // WHERE id_sheet = 1234
     * $query->filterByIdSheet(array(12, 34)); // WHERE id_sheet IN (12, 34)
     * $query->filterByIdSheet(array('min' => 12)); // WHERE id_sheet >= 12
     * $query->filterByIdSheet(array('max' => 12)); // WHERE id_sheet <= 12
     * </code>
     *
     * @see       filterBySheet()
     *
     * @param     mixed $idSheet The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DevisQuery The current query, for fluid interface
     */
    public function filterByIdSheet($idSheet = null, $comparison = null)
    {
        if (is_array($idSheet)) {
            $useMinMax = false;
            if (isset($idSheet['min'])) {
                $this->addUsingAlias(DevisPeer::ID_SHEET, $idSheet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSheet['max'])) {
                $this->addUsingAlias(DevisPeer::ID_SHEET, $idSheet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DevisPeer::ID_SHEET, $idSheet, $comparison);
    }

    /**
     * Filter the query on the number column
     *
     * Example usage:
     * <code>
     * $query->filterByNumber(1234); // WHERE number = 1234
     * $query->filterByNumber(array(12, 34)); // WHERE number IN (12, 34)
     * $query->filterByNumber(array('min' => 12)); // WHERE number >= 12
     * $query->filterByNumber(array('max' => 12)); // WHERE number <= 12
     * </code>
     *
     * @param     mixed $number The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DevisQuery The current query, for fluid interface
     */
    public function filterByNumber($number = null, $comparison = null)
    {
        if (is_array($number)) {
            $useMinMax = false;
            if (isset($number['min'])) {
                $this->addUsingAlias(DevisPeer::NUMBER, $number['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($number['max'])) {
                $this->addUsingAlias(DevisPeer::NUMBER, $number['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DevisPeer::NUMBER, $number, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus('fooValue');   // WHERE status = 'fooValue'
     * $query->filterByStatus('%fooValue%'); // WHERE status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $status The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DevisQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $status)) {
                $status = str_replace('*', '%', $status);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DevisPeer::STATUS, $status, $comparison);
    }

    /**
     * Filter the query by a related Sheet object
     *
     * @param   Sheet|PropelObjectCollection $sheet The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DevisQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySheet($sheet, $comparison = null)
    {
        if ($sheet instanceof Sheet) {
            return $this
                ->addUsingAlias(DevisPeer::ID_SHEET, $sheet->getId(), $comparison);
        } elseif ($sheet instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DevisPeer::ID_SHEET, $sheet->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterBySheet() only accepts arguments of type Sheet or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Sheet relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DevisQuery The current query, for fluid interface
     */
    public function joinSheet($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Sheet');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Sheet');
        }

        return $this;
    }

    /**
     * Use the Sheet relation Sheet object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SheetQuery A secondary query class using the current class as primary query
     */
    public function useSheetQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSheet($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Sheet', 'SheetQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Devis $devis Object to remove from the list of results
     *
     * @return DevisQuery The current query, for fluid interface
     */
    public function prune($devis = null)
    {
        if ($devis) {
            $this->addUsingAlias(DevisPeer::ID, $devis->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
