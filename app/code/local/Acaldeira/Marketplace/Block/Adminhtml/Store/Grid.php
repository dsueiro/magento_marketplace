<?php
/**
 * Acaldeira_Marketplace
 *
 * @category    Acaldeira
 * @package     Acaldeira_Marketplace
 * @copyright   Copyright (c) 2017 Acaldeira. (http://www.acaldeira.com.br)
 */
class Acaldeira_Marketplace_Block_Adminhtml_Store_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    /**
     * Acaldeira_Marketplace_Block_Adminhtml_Store_Grid constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('storemanagerGrid');
        $this->setDefaultSort('entity_id');
        $this->setDefaultDir('asc');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    /**
     * @return Mage_Adminhtml_Block_Widget_Grid
     */
    protected function _prepareCollection()
    {
        $collection = Mage::getModel('acmarketplace/store')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    /**
     * @return $this
     * @throws Exception
     */
    protected function _prepareColumns()
    {
        $this->addColumn('entity_id', array(
            'header'    => __('ID'),
            'index'     => 'entity_id',
            'type'      => 'int'
        ));

        $this->addColumn('name', array(
            'header'    => __('Name'),
            'index'     => 'name',
            'type'      => 'text',
        ));

        $this->addColumn('email', array(
            'header'    => __('Email'),
            'index'     => 'email',
            'type'      => 'text',
        ));

        $this->addColumn('url_name', array(
            'header'    => __('Url'),
            'index'     => 'name',
            'type'      => 'text',
        ));

        $this->addColumn('fee', array(
            'header'    => __('Fee'),
            'index'     => 'fee',
            'type'      => 'text',
        ));

        $this->addColumn('is_active', array(
            'header'    => __('Is Active'),
            'index'     => 'is_active',
            'type'      => 'options',
            'options'   => Mage::getSingleton('adminhtml/system_config_source_yesno')->toArray()
        ));

        return parent::_prepareColumns(); // TODO: Change the autogenerated stub
    }

    /**
     * @return string
     */
    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current'=>true));
    }

    /**
     * @param $row
     * @return string
     * @throws Exception
     */
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array(
                'store'=>$this->getRequest()->getParam('store'),
                'id'=>$row->getId())
        );
    }
}