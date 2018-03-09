<?php

namespace App\Entity\Tests;

use App\Entity\Worker;
use PHPUnit\Framework\TestCase;

class WorkerTest extends TestCase
{
    public function testCreate(): Worker
    {
        $worker = new Worker();
        
        $this->assertInstanceOf(
            Worker::class,
            $worker,
            '$worker is not an instance of Worker.'
        );
        
        return $worker;
    }
    
    /**
     * @dataProvider provideAccessorValues
     * @depends testCreate
     */
    public function testFill(string $name, string $value, Worker $worker)
    {
        $getter = "get$name";
        $setter = "set$name";
        
        $worker->$setter($value);
        $this->assertSame($value, $worker->$getter());
    }
    
    public function provideAccessorValues(): array
    {
        return [
            ['LastName', 'Gruh'],
            ['FirstName', 'Jean'],
            ['WorkingTime', '23.5'],
        ];
    }
}
