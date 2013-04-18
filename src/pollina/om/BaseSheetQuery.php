<?php


/**
 * Base class that represents a query for the 'sheet' table.
 *
 *
 *
 * @method SheetQuery orderById($order = Criteria::ASC) Order by the id column
 * @method SheetQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method SheetQuery orderByIdSize($order = Criteria::ASC) Order by the id_size column
 * @method SheetQuery orderByIdWeight($order = Criteria::ASC) Order by the id_weight column
 *
 * @method SheetQuery groupById() Group by the id column
 * @method SheetQuery groupByName() Group by the name column
 * @method SheetQuery groupByIdSize() Group by the id_size column
 * @method SheetQuery groupByIdWeight() Group by the id_weight column
 *
 * @method SheetQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method SheetQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method SheetQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method SheetQuery leftJoinSize($relationAlias = null) Adds a LEFT JOIN clause to the query using the Size relation
 * @method SheetQuery rightJoinSize($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Size relation
 * @method SheetQuery innerJoinSize($relationAlias = null) Adds a INNER JOIN clause to the query using the Size relation
 *
 * @method SheetQuery leftJoinWeight($relationAlias = null) Adds a LEFT JOIN clause to the query using the Weight relation
 * @method SheetQuery rightJoinWeight($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Weight relation
 * @method SheetQuery innerJoinWeight($relationAlias = null) Adds a INNER JOIN clause to the query using the Weight relation
 *
 * @method SheetQuery leftJoinDevis($relationAlias = null) Adds a LEFT JOIN clause to the query using the Devis relation
 * @method SheetQuery rightJoinDevis($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Devis relation
 * @method SheetQuery innerJoinDevis($relationAlias = null) Adds a INNER JOIN clause to the query using the Devis relation
 *
 * @method Sheet findOne(PropelPDO $con = null) Return the first Sheet matching the query
 * @method Sheet findOneOrCreate(PropelPDO $con = null) Return the first Sheet matching the query, or a new Sheet object populated from the query conditions when no match is found
 *
 * @method Sheet findOneByName(string $name) Return the first Sheet filtered by the name column
 * @method Sheet findOneByIdSize(int $id_size) Return the first Sheet filtered by the id_size column
 * @method Sheet findOneByIdWeight(int $id_weight) Return the first Sheet filtered by the id_weight column
 *
 * @method array findById(int $id) Return Sheet objects filtered by the id column
 * @method array findByName(string $name) Return Sheet objects filtered by the name column
 * @method array findByIdSize(int $id_size) Return Sheet objects filtered by the id_size column
 * @method array findByIdWeight(int $id_weight) Return Sheet objects filtered by the id_weight column
 *
 * @package    propel.generator.pollina.om
 */
abstract class BaseSheetQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseSheetQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pollina', $modelName = 'Sheet', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new SheetQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   SheetQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return SheetQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof SheetQuery) {
            return $criteria;
        }
        $query = new SheetQuery();
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
     * @return   Sheet|Sheet[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SheetPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(SheetPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Sheet A model object, or null if the key is not found
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
     * @return                 Sheet A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `name`, `id_size`, `id_weight` FROM `sheet` WHERE `id` = :p0';
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
            $obj = new Sheet();
            $obj->hydrate($row);
            SheetPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Sheet|Sheet[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Sheet[]|mixed the list of results, formatted by the current formatter
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
     * @return SheetQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SheetPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return SheetQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SheetPeer::ID, $keys, Criteria::IN);
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
     * @return SheetQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(SheetPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(SheetPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SheetPeer::ID, $id, $comparison);
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
     * @return SheetQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SheetPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the id_size column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSize(1234); // WHERE id_size = 1234
     * $query->filterByIdSize(array(12, 34)); // WHERE id_size IN (12, 34)
     * $query->filterByIdSize(array('min' => 12)); // WHERE id_size >= 12
     * $query->filterByIdSize(array('max' => 12)); // WHERE id_size <= 12
     * </code>
     *
     * @see       filterBySize()
     *
     * @param     mixed $idSize The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SheetQuery The current query, for fluid interface
     */
    public function filterByIdSize($idSize = null, $comparison = null)
    {
        if (is_array($idSize)) {
            $useMinMax = false;
            if (isset($idSize['min'])) {
                $this->addUsingAlias(SheetPeer::ID_SIZE, $idSize['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSize['max'])) {
                $this->addUsingAlias(SheetPeer::ID_SIZE, $idSize['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SheetPeer::ID_SIZE, $idSize, $comparison);
    }

    /**
     * Filter the query on the id_weight column
     *
     * Example usage:
     * <code>
     * $query->filterByIdWeight(1234); // WHERE id_weight = 1234
     * $query->filterByIdWeight(array(12, 34)); // WHERE id_weight IN (12, 34)
     * $query->filterByIdWeight(array('min' => 12)); // WHERE id_weight >= 12
     * $query->filterByIdWeight(array('max' => 12)); // WHERE id_weight <= 12
     * </code>
     *
     * @see       filterByWeight()
     *
     * @param     mixed $idWeight The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SheetQuery The current query, for fluid interface
     */
    public function filterByIdWeight($idWeight = null, $comparison = null)
    {
        if (is_array($idWeight)) {
            $useMinMax = false;
            if (isset($idWeight['min'])) {
                $this->addUsingAlias(SheetPeer::ID_WEIGHT, $idWeight['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idWeight['max'])) {
                $this->addUsingAlias(SheetPeer::ID_WEIGHT, $idWeight['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SheetPeer::ID_WEIGHT, $idWeight, $comparison);
    }

    /**
     * Filter the query by a related Size object
     *
     * @param   Size|PropelObjectCollection $size The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SheetQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySize($size, $comparison = null)
    {
        if ($size instanceof Size) {
            return $this
                ->addUsingAlias(SheetPeer::ID_SIZE, $size->getId(), $comparison);
        } elseif ($size instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SheetPeer::ID_SIZE, $size->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterBySize() only accepts arguments of type Size or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Size relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SheetQuery The current query, for fluid interface
     */
    public function joinSize($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Size');

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
            $this->addJoinObject($join, 'Size');
        }

        return $this;
    }

    /**
     * Use the Size relation Size object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SizeQuery A secondary query class using the current class as primary query
     */
    public function useSizeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSize($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Size', 'SizeQuery');
    }

    /**
     * Filter the query by a related Weight object
     *
     * @param   Weight|PropelObjectCollection $weight The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SheetQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByWeight($weight, $comparison = null)
    {
        if ($weight instanceof Weight) {
            return $this
                ->addUsingAlias(SheetPeer::ID_WEIGHT, $weight->getId(), $comparison);
        } elseif ($weight instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SheetPeer::ID_WEIGHT, $weight->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByWeight() only accepts arguments of type Weight or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Weight relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SheetQuery The current query, for fluid interface
     */
    public function joinWeight($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Weight');

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
            $this->addJoinObject($join, 'Weight');
        }

        return $this;
    }

    /**
     * Use the Weight relation Weight object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   WeightQuery A secondary query class using the current class as primary query
     */
    public function useWeightQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinWeight($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Weight', 'WeightQuery');
    }

    /**
     * Filter the query by a related Devis object
     *
     * @param   Devis|PropelObjectCollection $devis  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SheetQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDevis($devis, $comparison = null)
    {
        if ($devis instanceof Devis) {
            return $this
                ->addUsingAlias(SheetPeer::ID, $devis->getIdSheet(), $comparison);
        } elseif ($devis instanceof PropelObjectCollection) {
            return $this
                ->useDevisQuery()
                ->filterByPrimaryKeys($devis->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDevis() only accepts arguments of type Devis or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Devis relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SheetQuery The current query, for fluid interface
     */
    public function joinDevis($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Devis');

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
            $this->addJoinObject($join, 'Devis');
        }

        return $this;
    }

    /**
     * Use the Devis relation Devis object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   DevisQuery A secondary query class using the current class as primary query
     */
    public function useDevisQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDevis($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Devis', 'DevisQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Sheet $sheet Object to remove from the list of results
     *
     * @return SheetQuery The current query, for fluid interface
     */
    public function prune($sheet = null)
    {
        if ($sheet) {
            $this->addUsingAlias(SheetPeer::ID, $sheet->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
