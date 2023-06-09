<?php

namespace Gaufrette\Functional\FileStream;

use Gaufrette\Filesystem;
use Gaufrette\Adapter\InMemory as InMemoryAdapter;

class InMemoryBufferTest extends FunctionalTestCase
{
    protected function setUp(): void
    {
        $this->filesystem = new Filesystem(new InMemoryAdapter([]));

        $this->registerLocalFilesystemInStream();
    }
}
