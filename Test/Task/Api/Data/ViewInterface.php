<?php
namespace Test\Task\Api\Data;

interface ViewInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
//    const ATTRIBUTE_ID                 = 'attribute_id';
//    const STORE_ID               = 'store_id';
//    const ENTITY_ID            = 'entity_id ';
    const VALUE            = 'value ';
    /**#@-*/



//    /**
//     * Get Attribute_id
//     *
//     * @return int/0
//     */
//    public function getAttribute_id();
//
//    /**
//     * Get Store_id
//     *
//     * @return int/0
//     */
//    public function getStore_id();
//
//    /**
//     * Get Entity_id
//     *
//     * @return int|0
//     */
//    public function geEntity_id();

    /**
     * Get Value
     *
     * @return string|null
     */
    public function geValue();

//    /**
//     * Set Attribute_id
//     *
//     * @param int $Attribute_id
//     * @return $this
//     */
//    public function setAttribute_id($Attribute_id);
//
//    /**
//     * Set Store_id
//     *
//     * @param int $Store_id
//     * @return $this
//     */
//    public function setStore_id($Store_id);
//
//    /**
//     * Set Entity_id
//     *
//     * @param int $Entity_id
//     * @return $this
//     */
//    public function setEntity_id($Entity_id);

    /**
     * Set $Value
     *
     * @param string $Value
     * @return $this
     */
    public function setValue($Value);
}
