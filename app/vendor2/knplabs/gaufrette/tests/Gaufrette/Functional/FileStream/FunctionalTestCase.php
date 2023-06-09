<?php

namespace Gaufrette\Functional\FileStream;

use Gaufrette\StreamWrapper;
use PHPUnit\Framework\TestCase;

abstract class FunctionalTestCase extends TestCase
{
    protected $filesystem;

    /**
     * @test
     */
    public function shouldCheckIsFile()
    {
        $this->filesystem->write('test.txt', 'some content');
        $this->assertTrue(is_file('gaufrette://filestream/test.txt'));

        $this->filesystem->delete('test.txt');
        $this->assertFalse(is_file('gaufrette://filestream/test.txt'));
    }

    /**
     * @test
     */
    public function shouldCheckFileExists()
    {
        $this->filesystem->write('test.txt', 'some content');
        $this->assertFileExists('gaufrette://filestream/test.txt');

        $this->filesystem->delete('test.txt');
        $this->assertFileNotExists('gaufrette://filestream/test.txt');
    }

    /**
     * @test
     */
    public function shouldWriteAndReadFile()
    {
        file_put_contents('gaufrette://filestream/test.txt', 'test content');

        $this->assertEquals('test content', file_get_contents('gaufrette://filestream/test.txt'));
        $this->filesystem->delete('test.txt');
    }

    /**
     * @test
     */
    public function shouldNotReadWhenOpenInWriteMode()
    {
        $this->expectException(\LogicException::class);
        $this->expectExceptionMessage('The stream does not allow read.');
        $this->filesystem->write('test.txt', 'test content');

        $fileHandler = fopen('gaufrette://filestream/test.txt', 'w');
        fread($fileHandler, 10);
        fclose($fileHandler);

        $this->filesystem->delete('test.txt');
    }

    /**
     * @test
     */
    public function shouldNotWriteWhenOpenInReadMode()
    {
        $this->expectException(\LogicException::class);
        $this->expectExceptionMessage('The stream does not allow write.');
        $this->filesystem->write('test.txt', 'test content');

        $fileHandler = fopen('gaufrette://filestream/test.txt', 'r');
        fwrite($fileHandler, 'test content2');
        fclose($fileHandler);

        $this->filesystem->delete('test.txt');
    }

    /**
     * @test
     */
    public function shouldWriteFromSettedPosition()
    {
        $fileHandler = fopen('gaufrette://filestream/test.txt', 'w');
        fseek($fileHandler, 1, SEEK_SET);
        fwrite($fileHandler, 'est');
        fseek($fileHandler, 0, SEEK_SET);
        fwrite($fileHandler, 't');
        fclose($fileHandler);

        $this->assertEquals('test', $this->filesystem->read('test.txt'));

        $fileHandler = fopen('gaufrette://filestream/test.txt', 'w');
        fseek($fileHandler, 0, SEEK_SET);
        fwrite($fileHandler, 't');
        fseek($fileHandler, 1, SEEK_SET);
        fwrite($fileHandler, 'est');
        fseek($fileHandler, 0, SEEK_SET);
        fwrite($fileHandler, 'f');
        fclose($fileHandler);

        $this->assertEquals('fest', $this->filesystem->read('test.txt'));
    }

    /**
     * @test
     */
    public function shouldWriteEmptyContent()
    {
        $bytes = file_put_contents('gaufrette://filestream/test.txt', '');

        $this->assertEquals('', file_get_contents('gaufrette://filestream/test.txt'));
        $this->filesystem->delete('test.txt');

        $this->assertSame(0, $bytes);
    }

    /**
     * @test
     */
    public function shouldSetAndGetPosition()
    {
        file_put_contents('gaufrette://filestream/test.txt', 'test content');

        $fileHandler = fopen('gaufrette://filestream/test.txt', 'r+');
        fseek($fileHandler, 1, SEEK_SET);
        $this->assertEquals(1, ftell($fileHandler));
        fseek($fileHandler, 1, SEEK_CUR);
        $this->assertEquals(2, ftell($fileHandler));
        fclose($fileHandler);

        $fileHandler = fopen('gaufrette://filestream/test.txt', 'r+');
        fseek($fileHandler, 1, SEEK_CUR);
        $this->assertEquals(1, ftell($fileHandler));
        fclose($fileHandler);

        $fileHandler = fopen('gaufrette://filestream/test.txt', 'r+');
        fseek($fileHandler, -2, SEEK_END);
        $this->assertEquals(10, ftell($fileHandler));
        fclose($fileHandler);
    }

    /**
     * @test
     */
    public function shouldNotSeekWhenWhenceParameterIsInvalid()
    {
        file_put_contents('gaufrette://filestream/test.txt', 'test content');

        $fileHandler = fopen('gaufrette://filestream/test.txt', 'r+');
        $this->assertEquals(-1, fseek($fileHandler, 1, 666));
    }

    /**
     * @test
     */
    public function shouldHandlesSubDir()
    {
        file_put_contents('gaufrette://filestream/subdir/test.txt', 'test content');

        $this->assertTrue(is_file('gaufrette://filestream/subdir/test.txt'));

        $this->filesystem->delete('subdir/test.txt');
        $this->assertFalse(is_file('gaufrette://filestream/subdir/test.txt'));
    }

    /**
     * @test
     */
    public function shouldUnlinkFile()
    {
        if (strtolower(substr(PHP_OS, 0, 3)) === 'win') {
            $this->markTestSkipped('Flaky test on windows.');
        }

        $this->filesystem->write('test.txt', 'some content');
        unlink('gaufrette://filestream/test.txt');

        $this->assertFalse($this->filesystem->has('test.txt'));
    }

    /**
     * @test
     */
    public function shouldCopyFile()
    {
        file_put_contents('gaufrette://filestream/copy1.txt', 'test content');

        $this->assertTrue(is_file('gaufrette://filestream/copy1.txt'));
        $this->assertFalse(is_file('gaufrette://filestream/copy2.txt'));

        copy('gaufrette://filestream/copy1.txt', 'gaufrette://filestream/copy2.txt');

        $this->assertTrue(is_file('gaufrette://filestream/copy1.txt'));
        $this->assertTrue(is_file('gaufrette://filestream/copy2.txt'));
    }

    /**
     * @test
     * @dataProvider modesProvider
     */
    public function shouldCreateNewFile($mode)
    {
        $fileHandler = fopen('gaufrette://filestream/test.txt', $mode);
        $this->assertFileExists('gaufrette://filestream/test.txt');
    }

    public static function modesProvider()
    {
        return [
            ['w'],
            ['a+'],
            ['w+'],
            ['ab+'],
            ['wb'],
            ['wb+'],
        ];
    }

    protected function registerLocalFilesystemInStream()
    {
        $filesystemMap = StreamWrapper::getFilesystemMap();
        $filesystemMap->set('filestream', $this->filesystem);
        StreamWrapper::register();
    }
}
