<?php



/**
 * This class defines the structure of the 'configuration' table.
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
class ConfigurationTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'pollina.map.ConfigurationTableMap';

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
        $this->setName('configuration');
        $this->setPhpName('Configuration');
        $this->setClassname('Configuration');
        $this->setPackage('pollina');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('key', 'Key', 'VARCHAR', true, 45, null);
        $this->addColumn('value', 'Value', 'VARCHAR', true, 300, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // ConfigurationTableMap
