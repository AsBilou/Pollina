<?php


/**
 * Base class that represents a query for the 'articles' table.
 *
 *
 *
 * @method ArticlesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ArticlesQuery orderByLang($order = Criteria::ASC) Order by the lang column
 * @method ArticlesQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method ArticlesQuery orderByContenu($order = Criteria::ASC) Order by the contenu column
 *
 * @method ArticlesQuery groupById() Group by the id column
 * @method ArticlesQuery groupByLang() Group by the lang column
 * @method ArticlesQuery groupByTitle() Group by the title column
 * @method ArticlesQuery groupByContenu() Group by the contenu column
 *
 * @method ArticlesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ArticlesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ArticlesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Articles findOne(PropelPDO $con = null) Return the first Articles matching the query
 * @method Articles findOneOrCreate(PropelPDO $con = null) Return the first Articles matching the query, or a new Articles object populated from the query conditions when no match is found
 *
 * @method Articles findOneById(int $id) Return the first Articles filtered by the id column
 * @method Articles findOneByLang(string $lang) Return the first Articles filtered by the lang column
 * @method Articles findOneByTitle(string $title) Return the first Articles filtered by the title column
 * @method Articles findOneByContenu(string $contenu) Return the first Articles filtered by the contenu column
 *
 * @method array findById(int $id) Return Articles objects filtered by the id column
 * @method array findByLang(string $lang) Return Articles objects filtered by the lang column
 * @method array findByTitle(string $title) Return Articles objects filtered by the title column
 * @method array findByContenu(string $contenu) Return Articles objects filtered by the contenu column
 *
 * @package    propel.generator.pollina.om
 */
abstract class BaseArticlesQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseArticlesQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pollina', $modelName = 'Articles', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ArticlesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ArticlesQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ArticlesQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ArticlesQuery) {
            return $criteria;
        }
        $query = new ArticlesQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array $key Primary key to use for the query
                         A Primary key composition: [$id, $lang]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Articles|Articles[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ArticlesPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ArticlesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Articles A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `lang`, `title`, `contenu` FROM `articles` WHERE `id` = :p0 AND `lang` = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Articles();
            $obj->hydrate($row);
            ArticlesPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return Articles|Articles[]|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Articles[]|mixed the list of results, formatted by the current formatter
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
     * @return ArticlesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(ArticlesPeer::ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(ArticlesPeer::LANG, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ArticlesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(ArticlesPeer::ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(ArticlesPeer::LANG, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
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
     * @return ArticlesQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ArticlesPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ArticlesPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArticlesPeer::ID, $id, $comparison);
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
     * @return ArticlesQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ArticlesPeer::LANG, $lang, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%'); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ArticlesQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $title)) {
                $title = str_replace('*', '%', $title);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ArticlesPeer::TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the contenu column
     *
     * Example usage:
     * <code>
     * $query->filterByContenu('fooValue');   // WHERE contenu = 'fooValue'
     * $query->filterByContenu('%fooValue%'); // WHERE contenu LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contenu The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ArticlesQuery The current query, for fluid interface
     */
    public function filterByContenu($contenu = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contenu)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $contenu)) {
                $contenu = str_replace('*', '%', $contenu);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ArticlesPeer::CONTENU, $contenu, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Articles $articles Object to remove from the list of results
     *
     * @return ArticlesQuery The current query, for fluid interface
     */
    public function prune($articles = null)
    {
        if ($articles) {
            $this->addCond('pruneCond0', $this->getAliasedColName(ArticlesPeer::ID), $articles->getId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(ArticlesPeer::LANG), $articles->getLang(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
