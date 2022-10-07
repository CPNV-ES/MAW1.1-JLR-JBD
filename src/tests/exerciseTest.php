<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

require_once 'src/model/query.php';

final class exerciseTest extends TestCase
{
    protected $query;
    protected $exerciceHandler; //TODO static class

    protected function setUp()
    {
        $this->query = new Query();
        $this->exerciceHandler = new ExerciceHandler($query);//TODO static class
    }

    public function test_CreateNominalCase_Success(): void
    {
        //given
        $exercice = new Exercice("test_CreateNominalCase_Success");
        //assert exist

        //when
        $exerciceHanlder->create($exercie);

        //then
        $this->assertIsTrue($exerciceHandler->exists($exercice));
    }

    public function test_CreateNewExeciceDuplicateTitle_ThrowException(): void
    {
        //given
        $exercice = new Exercice("test_CreateNewExeciceDuplicateTitle_ThrowException");
        $exerciceHanlder->create($exercie);
        //assert exist

        //when
        //Event is called by assertion directly

        //then
        $this->expectException(PDOException::class);
        $exerciceDuplicate = new Exercice("Title");
    }

    public function test_CreateNewExercice_Success(): void
    {
        //given
        $previousExerice = $exerciceHandler->getExerice("test_CreateNewExercice_Success")->getTitle();
        $exerciceHandler->delete($previousExerice);
        $query = new Query();
        $exercice = new Exercice("test_CreateNewExercice_Success");
        $exerciceHanlder->create($exercie);
        //assert doesn't exist

        //when
        //Event is called by assertion directly

        //then
        $this->assertIsTrue($exerciceHandler->exists($exercice));

    }
    public function test_DeleteExercise_Success(): void
    {
        //given
        $previousExerice = $exerciceHandler->getExerice("test_DeleteExercise_Success")->getTitle();
        $exerciceHandler->delete($previousExerice);
        $query = new Query();
        $exercice = new Exercice("test_DeleteExercise_Success");
        $exerciceHanlder->create($exercie);
        $exerciceHanlder->delete($exercie);
        //delete Exercise

 
        //when
        //Event is called by assertion directly
 
        //then
        $this->assertCount(0, $exerciceHandler->getExerice($exercice)->getTitle());
    }

   
    public function test_SelectFourExercises_Success(): void
    {
        $previousExerice = $exerciceHandler->getExerice("test_DeleteExercise_Success");
        foreach($previousExerice as $entry){

            $query->delete($entry->getId());
        }
        //assert 4 exerices

 
        //when
        //Event is called by assertion directly
 
        //then
      
        $exerciceHanlder->create("testSelectFourExercises1","testSelectFourExercises2","testSelectFourExercises3","testSelectFourExercises4");
        $this->assertCount(4, $exerciceHandler->getExerice("testSelectFourExercises1","testSelectFourExercises2","testSelectFourExercises3","testSelectFourExercises4"));
    }
}