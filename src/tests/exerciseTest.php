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
        $result = $query->select("testExerciseIsCreatedWithTitle");
        $query->delete($result[0]->getId());
        $query->insert("testExerciseIsCreatedWithTitle");
        $this->assertStringContainsString($result[0]->getTitle(), "testExerciseIsCreatedWithTitle");

    }
    public function testExerciseIsDeleted(): void
    {
        $query = new Query();
        $result = $query->select("testExerciseIsDeleted");
        if(!isset($result)){
        $query->delete($result[0]->getId());
        }
        $query->insert("testExerciseIsDeleted");
        $result = $query->select("testExerciseIsDeleted");
        $query->delete($result[0]->getId());
        $result = $query->select("testExerciseIsDeleted");
        $this->assertCount(0, $result);
    }

    public function testSelectOneExercise(): void
    {
        $query = new Query();
        $result = $query->select("testSelectOneExercise");
        $query->delete($result[0]->getId());
        $query->insert("testSelectOneExercise");
        $result = $query->select("testSelectOneExercise");
        $this->assertCount(1, $result);

    }
    public function testSelectFourExercises(): void
    {
        $query = new Query();
        $result = $query->select("testSelectFourExercises1","testSelectFourExercises2","testSelectFourExercises3","testSelectFourExercises4");
        foreach($result as $entry){
            $query->delete($entry->getId());
        }
        $query->insert("testSelectFourExercises1");
        $query->insert("testSelectFourExercises2");
        $query->insert("testSelectFourExercises3");
        $query->insert("testSelectFourExercises4");
        $result = $query->select("testSelectFourExercises1","testSelectFourExercises2","testSelectFourExercises3","testSelectFourExercises4");
        $this->assertCount(4, $result);
    }
}