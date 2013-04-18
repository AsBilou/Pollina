<?php



/**
 * This class defines the structure of the 'devis' table.
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
class DevisTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'pollina.map.DevisTableMap';

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
        $this->setName('devis');
        $this->setPhpName('Devis');
        $this->setClassname('Devis');
        $this->setPackage('pollina');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 200, null);
        $this->addForeignKey('id_sheet', 'IdSheet', 'INTEGER', 'sheet', 'id', true, null, null);
        $this->addColumn('number', 'Number', 'INTEGER', true, null, null);
        $this->addColumn('status', 'Status', 'VARCHAR', true, 30, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Sheet', 'Sheet', RelationMap::MANY_TO_ONE, array('id_sheet' => 'id', ), null, null);
    } // buildRelations()

} // DevisTableMap
