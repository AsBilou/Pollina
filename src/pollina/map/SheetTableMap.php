<?php



/**
 * This class defines the structure of the 'sheet' table.
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
class SheetTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'pollina.map.SheetTableMap';

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
        $this->setName('sheet');
        $this->setPhpName('Sheet');
        $this->setClassname('Sheet');
        $this->setPackage('pollina');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 100, null);
        $this->addForeignKey('id_size', 'IdSize', 'INTEGER', 'size', 'id', true, null, null);
        $this->addForeignKey('id_weight', 'IdWeight', 'INTEGER', 'weight', 'id', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Size', 'Size', RelationMap::MANY_TO_ONE, array('id_size' => 'id', ), null, null);
        $this->addRelation('Weight', 'Weight', RelationMap::MANY_TO_ONE, array('id_weight' => 'id', ), null, null);
        $this->addRelation('Devis', 'Devis', RelationMap::ONE_TO_MANY, array('id' => 'id_sheet', ), null, null, 'Deviss');
    } // buildRelations()

} // SheetTableMap
