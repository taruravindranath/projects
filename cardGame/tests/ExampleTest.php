<?php
namespace Test;
use Mockery as m;
class ExampleTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
    }
    public function tearDown()
    {
        m::close();
    }
    public function testMyTest()
    {
        // Arrange
        $a = array();
        
        // Act
        $a[] = 45;
        // Assert
        $this->assertEquals(1, count($a));
    }
    
    /**
     * @dataProvider dataProvider
     */
    public function testMyTestTo($a, $b, $expected)
    {
        $this->assertEquals($expected, $a + $b);
    }
    public function dataProvider()
    {
        return array(
          array(0, 0, 0),
          array(0, 1, 1),
          array(1, 0, 1),
          array(1, 1, 2)
        );
    }
}
