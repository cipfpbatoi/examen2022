<?php
use App\Objectes\Album;

class AlbumTest extends \Codeception\Test\Unit
{

    protected function _before()
    {
        require_once('./vendor/autoload.php');
    }

    public function testSuccesfulConstruct()
    {
        $album = new Album('Yellow',2003,'EMI Records','yellow.jpg','/album/yellow.php');
        $this->assertEquals('Yellow', $album->getTitle());
        $this->assertEquals(2003, $album->getYear());
        $this->assertEquals('EMI Records', $album->getLabel());
        $this->assertEquals('yellow.jpg', $album->getCover());
        $this->assertEquals('/album/yellow.php', $album->getLink());
    }

    public function testerrorSetStringToAlbum()
    {
        $album = new Album('Yellow',2003,'EMI Records','yellow.jpg','/album/yellow.php');
        $this->expectException(TypeError::class);
        $album->setYear('Hola');
    }

    public function testSuccesfultoString()
    {
        $album = new Album('Yellow',2003,'EMI Records','yellow.jpg','/album/yellow.php');
        $this->expectOutputString("<div style='clear:both'>
                <div class='picture' style='float:left;margin-right: 20px'><img src='yellow.jpg'/></div>
                <div><p>Title: <a href='/album/yellow.php' >Yellow</a> (2003)<br/>EMI Records</p></div>
                </div>");
        echo $album;
    }
}
