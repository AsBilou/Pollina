<?php


/**
 * Base class that represents a query for the 'weight' table.
 *
 *
 *
 * @method WeightQuery orderById($order = Criteria::ASC) Order by the id column
 * @method WeightQuery orderByWeight($order = Criteria::ASC) Order by the weight column
 *
 * @method WeightQuery groupById() Group by the id column
 * @method WeightQuery groupByWeight() Group by the weight column
 *
 * @method WeightQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method WeightQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method WeightQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method WeightQuery leftJoinSheet($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sheet relation
 * @method WeightQuery rightJoinSheet($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sheet relation
 * @method WeightQuery innerJoinSheet($relationAlias = null) Adds a INNER JOIN clause to the query using the Sheet relation
 *
 * @method Weight findOne(PropelPDO $con = null) Return the first Weight matching the query
 * @method Weight findOneOrCreate(PropelPDO $con = null) Return the first Weight matching the query, or a new Weight object populated from the query conditions when no match is found
 *
 * @method Weight findOneByWeight(string $weight) Return the first Weight filtered by the weight column
 *
 * @method array findById(int $id) Return Weight objects filtered by the id column
 * @method array findByWeight(string $weight) Return Weight objects filtered by the weight column
 *
 * @package    propel.generator.pollina.om
 */
abstract class BaseWeightQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseWeightQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pollina', $modelName = 'Weight', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new WeightQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   WeightQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return WeightQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof WeightQuery) {
            return $criteria;
        }
        $query = new WeightQuery();
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
     * @return   Weight|Weight[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = WeightPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(WeightPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Weight A model object, or null if the key is not found
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
     * @return                 Weight A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `weight` FROM `weight` WHERE `id` = :p0';
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
            $obj = new Weight();
            $obj->hydrate($row);
            WeightPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Weight|Weight[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Weight[]|mixed the list of results, formatted by the current formatter
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
     * @return WeightQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(WeightPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return WeightQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(WeightPeer::ID, $keys, Criteria::IN);
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
     * @return WeightQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(WeightPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(WeightPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WeightPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the weight column
     *
     * Example usage:
     * <code>
     * $query->filterByWeight('fooValue');   // WHERE weight = 'fooValue'
     * $query->filterByWeight('%fooValue%'); // WHERE weight LIKE '%fooValue%'
     * </code>
     *
     * @param     string $weight The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return WeightQuery The current query, for fluid interface
     */
    public function filterByWeight($weight = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($weight)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $weight)) {
                $weight = str_replace('*', '%', $weight);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(WeightPeer::WEIGHT, $weight, $comparison);
    }

    /**
     * Filter the query by a related Sheet object
     *
     * @param   Sheet|PropelObjectCollection $sheet  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 WeightQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySheet($sheet, $comparison = null)
    {
        if ($sheet instanceof Sheet) {
            return $this
                ->addUsingAlias(WeightPeer::ID, $sheet->getIdWeight(), $comparison);
        } elseif ($sheet instanceof PropelObjectCollection) {
            return $this
                ->useSheetQuery()
                ->filterByPrimaryKeys($sheet->getPrimaryKeys())
                ->endUse();
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
     * @return WeightQuery The current query, for fluid interface
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
     * @param   Weight $weight Object to remove from the list of results
     *
     * @return WeightQuery The current query, for fluid interface
     */
    public function prune($weight = null)
    {
        if ($weight) {
            $this->addUsingAlias(WeightPeer::ID, $weight->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
