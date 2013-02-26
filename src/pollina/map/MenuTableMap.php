<?php



/**
 * This class defines the structure of the 'menu' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.pollina.map
 */
class MenuTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'pollina.map.MenuTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('menu');
        $this->setPhpName('Menu');
        $this->setClassname('Menu');
        $this->setPackage('pollina');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 45, null);
        $this->addForeignKey('parent', 'Parent', 'INTEGER', 'menu', 'id', false, null, null);
        $this->addColumn('langugae', 'Langugae', 'VARCHAR', true, 2, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('MenuRelatedByParent', 'Menu', RelationMap::MANY_TO_ONE, array('parent' => 'id', ), null, null);
        $this->addRelation('MenuRelatedById', 'Menu', RelationMap::ONE_TO_MANY, array('id' => 'parent', ), null, null, 'MenusRelatedById');
    } // buildRelations()

} // MenuTableMap
