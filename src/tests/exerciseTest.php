<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

require_once 'src/model/query.php';

final class exerciseTest extends TestCase
{
 
    public function testExerciseTitleCannotBeNull(): void
    {
        $this->expectException(PDOException::class);
        $query = new Query();
        $query->insert("");
        
        
    }
    public function testExerciseIsCreatedWithTitle(): void
    {
        $query = new Query();
       
        $query->insert("testExerciseIsCreatedWithTitle");
        $result = $query->select();
        $this->assertStringContainsString($result, "testExerciseIsCreatedWithTitle");

    }
    public function testExerciseIsDeleted(): void
    {
        $query = new Query();
       
        $query->insert("testExerciseIsDeleted");
        $query->delete("testExerciseIsDeleted");
        $result = $query->select();
        $this->assertStringNotContainsString($result, "testExerciseIsDeleted");
    }

    public function testSelectOneExercise(): void
    {
        $query = new Query();
       
        $query->insert("testSelectOneExercise");
        $result = $query->select("testSelectOneExercise");
        $this->assertCount(1, $result);

    }
    public function testSelectFourExercises(): void
    {
        $query = new Query();
       
        $query->insert("testSelectFourExercises1");
        $query->insert("testSelectFourExercises2");
        $query->insert("testSelectFourExercises3");
        $query->insert("testSelectFourExercises4");
        $result = $query->select("testSelectFourExercises1","testSelectFourExercises2","testSelectFourExercises3","testSelectFourExercises4");
        $this->assertCount(1, $result);
    }
}