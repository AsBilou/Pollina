<?php


/**
 * Base class that represents a query for the 'menu' table.
 *
 *
 *
 * @method MenuQuery orderById($order = Criteria::ASC) Order by the id column
 * @method MenuQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method MenuQuery orderByParent($order = Criteria::ASC) Order by the parent column
 * @method MenuQuery orderByLang($order = Criteria::ASC) Order by the lang column
 *
 * @method MenuQuery groupById() Group by the id column
 * @method MenuQuery groupByName() Group by the name column
 * @method MenuQuery groupByParent() Group by the parent column
 * @method MenuQuery groupByLang() Group by the lang column
 *
 * @method MenuQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method MenuQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method MenuQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method MenuQuery leftJoinMenuRelatedByParent($relationAlias = null) Adds a LEFT JOIN clause to the query using the MenuRelatedByParent relation
 * @method MenuQuery rightJoinMenuRelatedByParent($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MenuRelatedByParent relation
 * @method MenuQuery innerJoinMenuRelatedByParent($relationAlias = null) Adds a INNER JOIN clause to the query using the MenuRelatedByParent relation
 *
 * @method MenuQuery leftJoinMenuRelatedById($relationAlias = null) Adds a LEFT JOIN clause to the query using the MenuRelatedById relation
 * @method MenuQuery rightJoinMenuRelatedById($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MenuRelatedById relation
 * @method MenuQuery innerJoinMenuRelatedById($relationAlias = null) Adds a INNER JOIN clause to the query using the MenuRelatedById relation
 *
 * @method Menu findOne(PropelPDO $con = null) Return the first Menu matching the query
 * @method Menu findOneOrCreate(PropelPDO $con = null) Return the first Menu matching the query, or a new Menu object populated from the query conditions when no match is found
 *
 * @method Menu findOneByName(string $name) Return the first Menu filtered by the name column
 * @method Menu findOneByParent(int $parent) Return the first Menu filtered by the parent column
 * @method Menu findOneByLang(string $lang) Return the first Menu filtered by the lang column
 *
 * @method array findById(int $id) Return Menu objects filtered by the id column
 * @method array findByName(string $name) Return Menu objects filtered by the name column
 * @method array findByParent(int $parent) Return Menu objects filtered by the parent column
 * @method array findByLang(string $lang) Return Menu objects filtered by the lang column
 *
 * @package    propel.generator.pollina.om
 */
abstract class BaseMenuQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseMenuQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pollina', $modelName = 'Menu', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new MenuQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   MenuQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return MenuQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof MenuQuery) {
            return $criteria;
        }
        $query = new MenuQuery();
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
     * @return   Menu|Menu[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MenuPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(MenuPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Menu A model object, or null if the key is not found
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
     * @return                 Menu A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `name`, `parent`, `lang` FROM `menu` WHERE `id` = :p0';
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
            $obj = new Menu();
            $obj->hydrate($row);
            MenuPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Menu|Menu[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Menu[]|mixed the list of results, formatted by the current formatter
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
     * @return MenuQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MenuPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return MenuQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MenuPeer::ID, $keys, Criteria::IN);
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
     * @return MenuQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(MenuPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(MenuPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MenuPeer::ID, $id, $comparison);
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
     * @return MenuQuery The current query, for fluid interface
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

        return $this->addUsingAlias(MenuPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the parent column
     *
     * Example usage:
     * <code>
     * $query->filterByParent(1234); // WHERE parent = 1234
     * $query->filterByParent(array(12, 34)); // WHERE parent IN (12, 34)
     * $query->filterByParent(array('min' => 12)); // WHERE parent >= 12
     * $query->filterByParent(array('max' => 12)); // WHERE parent <= 12
     * </code>
     *
     * @see       filterByMenuRelatedByParent()
     *
     * @param     mixed $parent The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MenuQuery The current query, for fluid interface
     */
    public function filterByParent($parent = null, $comparison = null)
    {
        if (is_array($parent)) {
            $useMinMax = false;
            if (isset($parent['min'])) {
                $this->addUsingAlias(MenuPeer::PARENT, $parent['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($parent['max'])) {
                $this->addUsingAlias(MenuPeer::PARENT, $parent['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MenuPeer::PARENT, $parent, $comparison);
    }

    /**
     * Filter the query on the lang column
     *
     * Example usage:
     * <code>
     * $query->filterByLang('fooValue');   // WHERE lang = 'fooValue'
     * $query->filterByLang('%fooValue%'); // WHERE lang LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lang The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MenuQuery The current query, for fluid interface
     */
    public function filterByLang($lang = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lang)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $lang)) {
                $lang = str_replace('*', '%', $lang);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MenuPeer::LANG, $lang, $comparison);
    }

    /**
     * Filter the query by a related Menu object
     *
     * @param   Menu|PropelObjectCollection $menu The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MenuQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMenuRelatedByParent($menu, $comparison = null)
    {
        if ($menu instanceof Menu) {
            return $this
                ->addUsingAlias(MenuPeer::PARENT, $menu->getId(), $comparison);
        } elseif ($menu instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MenuPeer::PARENT, $menu->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByMenuRelatedByParent() only accepts arguments of type Menu or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MenuRelatedByParent relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MenuQuery The current query, for fluid interface
     */
    public function joinMenuRelatedByParent($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MenuRelatedByParent');

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
            $this->addJoinObject($join, 'MenuRelatedByParent');
        }

        return $this;
    }

    /**
     * Use the MenuRelatedByParent relation Menu object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   MenuQuery A secondary query class using the current class as primary query
     */
    public function useMenuRelatedByParentQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinMenuRelatedByParent($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MenuRelatedByParent', 'MenuQuery');
    }

    /**
     * Filter the query by a related Menu object
     *
     * @param   Menu|PropelObjectCollection $menu  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MenuQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMenuRelatedById($menu, $comparison = null)
    {
        if ($menu instanceof Menu) {
            return $this
                ->addUsingAlias(MenuPeer::ID, $menu->getParent(), $comparison);
        } elseif ($menu instanceof PropelObjectCollection) {
            return $this
                ->useMenuRelatedByIdQuery()
                ->filterByPrimaryKeys($menu->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMenuRelatedById() only accepts arguments of type Menu or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MenuRelatedById relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MenuQuery The current query, for fluid interface
     */
    public function joinMenuRelatedById($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MenuRelatedById');

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
            $this->addJoinObject($join, 'MenuRelatedById');
        }

        return $this;
    }

    /**
     * Use the MenuRelatedById relation Menu object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   MenuQuery A secondary query class using the current class as primary query
     */
    public function useMenuRelatedByIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinMenuRelatedById($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MenuRelatedById', 'MenuQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Menu $menu Object to remove from the list of results
     *
     * @return MenuQuery The current query, for fluid interface
     */
    public function prune($menu = null)
    {
        if ($menu) {
            $this->addUsingAlias(MenuPeer::ID, $menu->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
