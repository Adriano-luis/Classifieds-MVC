<?php
namespace tests\controllers;

use PHPUnit\Framework\TestCase;
use Controllers\NotFoundController;

class NotFoundControllerTest extends TestCase {

    /**
     * test for NotFoundController function index
     * @covers Controllers\NotFoundController
     */
    public function testIndex(){
        $test = new NotFoundController();
        $test->index();

        $this->expectOutputString('<h1>Page not found :/</h1>');
    }
}