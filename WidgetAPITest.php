<?php

require 'vendor/autoload.php';

class WidgetAPITest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function callAndStoreApiWorksCorrectly()
    {
        /**
         * Set up your dependencies
         *
         * (I have ommitted the shouldReceive() examples...)
         */
        $widgetApi = \Mockery::mock('WidgetAPI');
        $WidgetModel = \Mockery::mock('WidgetModel');

        /**
         * Write code like things are already working...
         */
        $response = $widgetApi->getData('grumpy-learning');
        $data = json_decode($response);

        /**
         * Make your assertion that a record was correctly saved
         */
        $this->assertTrue($WidgetModel->save($data));
    }
}
